<?php
header('Content-Type: application/json');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once dirname(dirname(__DIR__)) . '/config/connect.php';

$action = $_REQUEST['action'] ?? 'list';

function getGuestSessionId() {
    if (!isset($_SESSION['tool_guest_id'])) {
        $_SESSION['tool_guest_id'] = 'guest_' . bin2hex(random_bytes(16));
    }
    return $_SESSION['tool_guest_id'];
}

$user_id = isset($_SESSION['tool_user']['id']) ? (int)$_SESSION['tool_user']['id'] : null;
$guest_id = getGuestSessionId();

switch ($action) {
    case 'save':
        // Read JSON input or POST fields
        $raw_input = file_get_contents('php://input');
        $data = json_decode($raw_input, true);
        if (!$data) {
            $data = $_POST;
        }

        $tool_type = trim($data['tool_type'] ?? '');
        $title = trim($data['title'] ?? '');
        $summary = trim($data['summary_text'] ?? '');
        $payload = is_array($data['payload_json'] ?? null) ? json_encode($data['payload_json']) : trim($data['payload_json'] ?? '{}');
        $preview = trim($data['preview_data'] ?? '');

        if (empty($tool_type) || empty($title)) {
            echo json_encode(['status' => 'error', 'message' => 'Tool type and title are required.']);
            exit;
        }

        $stmt = $conn->prepare("INSERT INTO tool_user_history (user_id, guest_session_id, tool_type, title, summary_text, payload_json, preview_data, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("issssss", $user_id, $guest_id, $tool_type, $title, $summary, $payload, $preview);
        
        if ($stmt->execute()) {
            $history_id = $conn->insert_id;
            $stmt->close();
            echo json_encode([
                'status' => 'success',
                'message' => 'Saved to your history!',
                'history_id' => $history_id,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to save history: ' . $conn->error]);
        }
        break;

    case 'list':
        $filter_tool = trim($_GET['tool_type'] ?? '');
        $search = trim($_GET['search'] ?? '');
        $limit = isset($_GET['limit']) ? min(100, max(1, (int)$_GET['limit'])) : 40;

        $where = [];
        $params = [];
        $types = "";

        if ($user_id) {
            $where[] = "(user_id = ? OR (guest_session_id = ? AND user_id IS NULL))";
            $params[] = $user_id;
            $params[] = $guest_id;
            $types .= "is";
        } else {
            $where[] = "guest_session_id = ?";
            $params[] = $guest_id;
            $types .= "s";
        }

        if (!empty($filter_tool) && $filter_tool !== 'all') {
            $where[] = "tool_type = ?";
            $params[] = $filter_tool;
            $types .= "s";
        }

        if (!empty($search)) {
            $where[] = "(title LIKE ? OR summary_text LIKE ?)";
            $s_param = '%' . $search . '%';
            $params[] = $s_param;
            $params[] = $s_param;
            $types .= "ss";
        }

        $where_sql = implode(" AND ", $where);
        $query = "SELECT id, user_id, tool_type, title, summary_text, preview_data, payload_json, created_at FROM tool_user_history WHERE $where_sql ORDER BY id DESC LIMIT $limit";

        $stmt = $conn->prepare($query);
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        $res = $stmt->get_result();

        $items = [];
        while ($row = $res->fetch_assoc()) {
            // Include decoded payload summary
            $row['created_formatted'] = date('M d, Y h:i A', strtotime($row['created_at']));
            $row['time_ago'] = time_elapsed_string($row['created_at']);
            $items[] = $row;
        }
        $stmt->close();

        // Total count
        $count_query = "SELECT COUNT(*) as total FROM tool_user_history WHERE $where_sql";
        $count_stmt = $conn->prepare($count_query);
        if (!empty($params)) {
            $count_stmt->bind_param($types, ...$params);
        }
        $count_stmt->execute();
        $total_count = $count_stmt->get_result()->fetch_assoc()['total'] ?? 0;
        $count_stmt->close();

        echo json_encode([
            'status' => 'success',
            'count' => count($items),
            'total' => (int)$total_count,
            'items' => $items,
            'is_logged_in' => !empty($user_id)
        ]);
        break;

    case 'get':
        $id = (int)($_GET['id'] ?? 0);
        if ($id <= 0) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid ID']);
            exit;
        }

        $stmt = $conn->prepare("SELECT * FROM tool_user_history WHERE id = ? LIMIT 1");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $item = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        if ($item) {
            // Check ownership
            $can_access = false;
            if ($user_id && $item['user_id'] == $user_id) {
                $can_access = true;
            } elseif ($item['guest_session_id'] === $guest_id) {
                $can_access = true;
            }

            if ($can_access) {
                echo json_encode(['status' => 'success', 'item' => $item]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Access denied']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'History item not found']);
        }
        break;

    case 'delete':
        $id = (int)($_POST['id'] ?? $_GET['id'] ?? 0);
        if ($id <= 0) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid ID']);
            exit;
        }

        $stmt = $conn->prepare("DELETE FROM tool_user_history WHERE id = ? AND (user_id = ? OR guest_session_id = ?)");
        $stmt->bind_param("iis", $id, $user_id, $guest_id);
        $stmt->execute();
        $affected = $stmt->affected_rows;
        $stmt->close();

        if ($affected > 0) {
            echo json_encode(['status' => 'success', 'message' => 'Item deleted from history.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Could not delete item.']);
        }
        break;

    case 'clear_all':
        if ($user_id) {
            $stmt = $conn->prepare("DELETE FROM tool_user_history WHERE user_id = ?");
            $stmt->bind_param("i", $user_id);
        } else {
            $stmt = $conn->prepare("DELETE FROM tool_user_history WHERE guest_session_id = ?");
            $stmt->bind_param("s", $guest_id);
        }
        $stmt->execute();
        $stmt->close();

        echo json_encode(['status' => 'success', 'message' => 'All history cleared.']);
        break;

    default:
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
        break;
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'min',
        's' => 'sec',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
