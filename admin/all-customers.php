<?php
session_start();
include "db-conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Customer Management | Sales Dashboard</title>
    <link rel="icon" href="assets/img/logo.png" type="image/png">
    
    <?php include "links.php"; ?>
    <style>
        .customer-table {
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.08);
            border-radius: 10px;
            overflow: hidden;
        }
        .table-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .table th {
            border-top: none;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
        }
        .table td {
            vertical-align: middle;
        }
        .action-icon {
            transition: all 0.3s ease;
            padding: 5px;
            border-radius: 50%;
        }
        .action-icon:hover {
            transform: scale(1.1);
            background: rgba(0,0,0,0.05);
        }
        .page-title {
            position: relative;
            margin-bottom: 30px;
            padding-bottom: 15px;
        }
        .page-title:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .badge-active {
            background-color: #e6f7ee;
            color: #28a745;
        }
        .badge-inactive {
            background-color: #fef0f0;
            color: #dc3545;
        }
    </style>
</head>

<body class="crm_body_bg">

    <?php include "header.php"; ?>
    <section class="main_content dashboard_part large_header_bg">

        <div class="container-fluid g-0">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <?php include "top_nav.php"; ?>
                </div>
            </div>
        </div>

        <div class="main_content_iner">
            <div class="container-fluid p-0">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="row align-items-center justify-content-between flex-wrap">
                                    <div class="col-lg-4">
                                        <h2 class="page-title">Customer Management</h2>
                                    </div>
                                    <div class="col-lg-4 text-lg-end">
                                        <button class="btn btn-primary">
                                            <i class="fas fa-plus me-2"></i>Add New Customer
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class="table-responsive customer-table">
                                    <table class="table table-hover">
                                        <thead class="table-header">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Customer</th>
                                                <th scope="col">Customer ID</th>
                                                <th scope="col">Contact</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Created At</th>
                                                <th scope="col">Address</th>
                                                <th scope="col" class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $sql = "SELECT * FROM `users`";
                                            $result = mysqli_query($conn, $sql);
                                            
                                            if(mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                    <tr>
                                                        <th scope="row"><?= $no++ ?></th>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="me-3">
                                                                    <div class="avatar avatar-sm">
                                                                        <span class="avatar-title rounded-circle bg-soft-warning text-primary">
                                                                            <?= strtoupper(substr($row['name'], 0, 1)) ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <h6 class="mb-0"><?= $row['name'] ?></h6>
                                                                    <small class="text-muted">Customer</small>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>#<?= $row['id'] ?></td>
                                                        <td><?= $row['mobile'] ?></td>
                                                        <td><?= $row['email'] ?></td>
                                                        <td><?= $row['created_at'] ?></td>
                                                        <!-- <td><?= $row['selling_price'] ? '$'.$row['selling_price'] : '$0' ?></td> -->
                                                        <td>
                                                            <!-- <span class="status-badge <?= $row['status'] == 1 ? 'badge-active' : 'badge-inactive' ?>">
                                                                <?= $row['status'] == 1 ? 'Active' : 'Inactive' ?>
                                                            </span> -->
                                                            <?=$row['address']?>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="d-flex justify-content-center">
                                                                <a href="edit_customer_details.php?edit_customer_details=<?= $row['id'] ?>" 
                                                                   class="action-icon me-2" 
                                                                   data-bs-toggle="tooltip" 
                                                                   title="Edit">
                                                                    <i class="fas fa-edit text-primary fs-5"></i>
                                                                </a>
                                                                <a href="product_delete.php?delete=<?= $row['id'] ?>" 
                                                                   class="action-icon text-danger" 
                                                                   data-bs-toggle="tooltip" 
                                                                   title="Delete"
                                                                   onclick="return confirm('Are you sure you want to delete this customer?');">
                                                                    <i class="fas fa-trash-alt fs-5"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan="8" class="text-center py-5">
                                                        <div class="d-flex flex-column align-items-center">
                                                            <img src="assets/img/no-data.svg" alt="No data" style="width: 120px; opacity: 0.7;">
                                                            <h5 class="mt-3 text-muted">No customers found</h5>
                                                            <p class="text-muted">Add new customers to get started</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <?php if(mysqli_num_rows($result) > 0): ?>
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <nav aria-label="Page navigation">
                                            <ul class="pagination justify-content-center">
                                                <li class="page-item disabled">
                                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                                </li>
                                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">Next</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include "footer.php"; ?>
        
        <script>
            // Initialize tooltips
            $(document).ready(function(){
                $('[data-bs-toggle="tooltip"]').tooltip();
            });
        </script>
</body>

</html>