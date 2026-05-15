<?php
// File: send_mail.php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "../config/connect.php";

// Composer autoloader
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Set JSON response header
header('Content-Type: application/json');

// Function to sanitize input
function clean_input($data)
{
    global $conn;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return mysqli_real_escape_string($conn, $data);
}

try {
    // Check if form was submitted via POST
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        throw new Exception("Invalid request method.");
    }

    // Validate required fields
    $required = ['fname', 'phone', 'email', 'subject', 'message'];
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            throw new Exception("Please fill all required fields.");
        }
    }

    // Sanitize inputs
    $name = clean_input($_POST['fname']);
    $email = clean_input($_POST['email']);
    $phone = clean_input($_POST['phone']);
    $subject = clean_input($_POST['subject']);
    $message = clean_input($_POST['message']);

    if (!preg_match('/^\d{10}$/', $phone)) {
        throw new Exception("Please enter a valid 10-digit number!");
    }

    // Fetch contact information from database
    $contactInfo = [];
    $contactQuery = "SELECT * FROM contacts LIMIT 1";
    $contactResult = mysqli_query($conn, $contactQuery);
    if ($contactResult && mysqli_num_rows($contactResult) > 0) {
        $contactInfo = mysqli_fetch_assoc($contactResult);
    }

    // Store inquiry in database
    $sql = "INSERT INTO inquiries (name, email, phone, subject, message, created_at) 
            VALUES (?, ?, ?, ?, ?, NOW())";

    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssiss", $name, $email, $phone, $subject, $message);
        mysqli_stmt_execute($stmt);
        $inquiryId = mysqli_insert_id($conn);
        mysqli_stmt_close($stmt);
    }

    // Initialize PHPMailer
    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Or your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'nik007guptadu@gmail.com'; // Your email
        $mail->Password = 'ltmnhrwacmwmcrni'; // Your app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';

        // Sender & Recipient
        $mail->setFrom('no-reply@codewithnikhil.in', 'Code With Nikhil');
        $mail->addReplyTo($email, $name);
        $mail->addAddress($contactInfo['email'] ?? 'nik007guptadu@gmail.com');
        if (!empty($contactInfo['contact_email'])) {
            $mail->addAddress($contactInfo['contact_email']);
        }

        // Email Subject & Body
        $mail->Subject = "New Contact Form Submission: " . substr($subject, 0, 50);
        $mail->isHTML(true);

        $mail->Body = "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>New Contact Form Submission - Code With Nikhil</title>
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
                
                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                }
                
                body { 
                    font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
                    line-height: 1.6; 
                    color: #333333; 
                    background-color: #f8fafc; 
                    margin: 0; 
                    padding: 0; 
                }
                
                .container { 
                    max-width: 600px; 
                    margin: 0 auto; 
                    background: #ffffff; 
                    border-radius: 12px; 
                    overflow: hidden; 
                    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
                }
                
                .header { 
                    background: linear-gradient(135deg, #ADFE1C 0%, #8ED50C 100%); 
                    color: #1a1a1a; 
                    padding: 30px 20px; 
                    text-align: center; 
                }
                
                .header h1 { 
                    font-size: 28px; 
                    font-weight: 700; 
                    margin-bottom: 8px; 
                    letter-spacing: -0.5px;
                }
                
                .header h2 { 
                    font-size: 18px; 
                    font-weight: 500; 
                    opacity: 0.9;
                }
                
                .content { 
                    padding: 30px; 
                    background-color: #ffffff; 
                }
                
                .info-card {
                    background: #f8fafc;
                    border-radius: 8px;
                    padding: 20px;
                    margin-bottom: 25px;
                    border-left: 4px solid #ADFE1C;
                }
                
                table { 
                    width: 100%; 
                    border-collapse: collapse; 
                    margin-bottom: 25px; 
                }
                
                th { 
                    background-color: #f1f5f9; 
                    text-align: left; 
                    padding: 12px 15px; 
                    font-weight: 600;
                    color: #475569;
                    border-bottom: 1px solid #e2e8f0;
                }
                
                td { 
                    padding: 12px 15px; 
                    border-bottom: 1px solid #e2e8f0; 
                    background: #ffffff;
                }
                
                tr:last-child td {
                    border-bottom: none;
                }
                
                .message-container {
                    background: #f8fafc;
                    padding: 15px;
                    border-radius: 8px;
                    margin-top: 5px;
                    border: 1px solid #e2e8f0;
                }
                
                .action-buttons { 
                    text-align: center; 
                    margin-top: 30px; 
                }
                
                .button { 
                    display: inline-block; 
                    padding: 12px 24px; 
                    background: linear-gradient(135deg, #ADFE1C 0%, #8ED50C 100%); 
                    color: #1a1a1a; 
                    text-decoration: none; 
                    border-radius: 6px; 
                    font-weight: 600;
                    margin: 0 8px;
                    transition: all 0.3s ease;
                    box-shadow: 0 2px 4px rgba(173, 254, 28, 0.3);
                }
                
                .button:hover {
                    transform: translateY(-2px);
                    box-shadow: 0 4px 8px rgba(173, 254, 28, 0.4);
                }
                
                .footer { 
                    margin-top: 30px; 
                    font-size: 13px; 
                    color: #64748b; 
                    text-align: center; 
                    padding: 20px;
                    background: #f8fafc;
                    border-top: 1px solid #e2e8f0;
                }
                
                .inquiry-id {
                    display: inline-block;
                    background: #ADFE1C;
                    color: #1a1a1a;
                    padding: 4px 12px;
                    border-radius: 20px;
                    font-weight: 600;
                    font-size: 12px;
                    margin-bottom: 10px;
                }
                
                .highlight {
                    color: #ADFE1C;
                    font-weight: 600;
                }
                
                @media (max-width: 480px) {
                    .content { padding: 20px; }
                    .header { padding: 25px 15px; }
                    .header h1 { font-size: 24px; }
                    .button { display: block; margin: 10px 0; }
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h1>Code With Nikhil</h1>
                    <h2>New Contact Form Submission</h2>
                </div>
                
                <div class='content'>
                    <div class='info-card'>
                        <p>You have received a new contact form submission from your website. Here are the details:</p>
                    </div>
                    
                    <table>
                        <tr>
                            <th width='120'>Name</th>
                            <td><strong>$name</strong></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><a href='mailto:$email' style='color: #ADFE1C; text-decoration: none;'>$email</a></td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td><a href='tel:$phone' style='color: #ADFE1C; text-decoration: none;'>$phone</a></td>
                        </tr>
                        <tr>
                            <th>Subject</th>
                            <td>$subject</td>
                        </tr>
                        <tr>
                            <th>Message</th>
                            <td>
                                <div class='message-container'>
                                    " . nl2br($message) . "
                                </div>
                            </td>
                        </tr>
                    </table>
                    
                    <div class='action-buttons'>
                        <a href='mailto:$email' class='button'>📧 Reply to Customer</a>
                        <a href='tel:$phone' class='button'>📞 Call Customer</a>
                    </div>
                </div>
                
                <div class='footer'>
                    <div class='inquiry-id'>Inquiry ID: #$inquiryId</div>
                    <p>&copy; " . date('Y') . " <span class='highlight'>Code With Nikhil</span>. All rights reserved.</p>
                    <p>" . ($contactInfo['address'] ?? "Transforming ideas into digital reality") . "</p>
                </div>
            </div>
        </body>
        </html>";

        // Send Email
        $mail->send();

        // Return success response
        echo json_encode([
            'success' => true,
            'message' => 'Thank you for your message! We will contact you soon.'
        ]);

    } catch (Exception $e) {
        echo json_encode([
            'success' => false,
            'message' => "INNER CATCH: Mailer Error: " . $mail->ErrorInfo
        ]);
        exit;
    }

} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' =>  $e->getMessage()
    ]);
    exit;
}

// Close database connection
mysqli_close($conn);
?>