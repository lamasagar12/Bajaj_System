<?php include 'includes/header.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Add your CSS links here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Add your custom styles here */
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            height: 200px; /* Set a fixed height */
        }
        .card:hover {
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
        }
        .card-body {
            background-color: #f8f9fa; /* Light gray background */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            height: 100%; 
        }
        .text-sm {
            font-size: 20px; 
        }
        .text-capitalize {
            text-transform: capitalize; 
        }
        .fw-bold {
            font-weight: bold;
            font-size: 32px; 
            margin-top: 10px;
        }

    </style>
</head>
<body>
<?php alertMessage(); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mt-4"><i class="fas fa-chart-pie"></i> Overview</h1>
            </div>
            <!-- Total Pending -->
            <div class="col-md-3 mb-3">
                <div class="card card-body p-3">
                    <p class="text-sm mb-0 text-capitalize"><i class="fas fa-hourglass-half"></i> <a href="booking.php">Total Pending</a></p>
                    <h5 class="fw-bold mb-0">
                        <?= getCount1('bookings', "status = 'pending'"); ?>
                    </h5>
                </div>
            </div>
            <!-- Total Followed up -->
            <div class="col-md-3 mb-3">
                <div class="card card-body p-3">
                    <p class="text-sm mb-0 text-capitalize"><i class="fas fa-handshake"></i> <a href="booking.php">Total Followed up</a></p>
                    <h5 class="fw-bold mb-0">
                        <?= getCount1('bookings', "status = 'follow-up'"); ?>
                    </h5>
                </div>
            </div>
            <!-- Total Rejected -->
            <div class="col-md-3 mb-3">
                <div class="card card-body p-3">
                    <p class="text-sm mb-0 text-capitalize"><i class="fas fa-times-circle"></i> <a href="booking.php">Total Rejected</a></p>
                    <h5 class="fw-bold mb-0">
                        <?= getCount1('bookings', "status = 'reject'"); ?>
                    </h5>
                </div>
            </div>
            <!-- Total Inquiries -->
            <div class="col-md-3 mb-3">
                <div class="card card-body p-3">
                    <p class="text-sm mb-0 text-capitalize"><i class="fas fa-envelope"></i> <a href="message.php">Total Inquiries</a></p>
                    <h5 class="fw-bold mb-0">
                        <?= getCount('messages'); ?>
                    </h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1 class="mt-4"><i class="fas fa-tachometer-alt"></i> Dashboard</h1>
            </div>
            <!-- Total Categories -->
            <div class="col-md-3 mb-3">
                <div class="card card-body p-3">
                    <p class="text-sm mb-0 text-capitalize"><i class="fas fa-list"></i> <a href="categories.php">Total Categories</a></p>
                    <h5 class="fw-bold mb-0">
                        <?= getCount('categories'); ?>
                    </h5>
                </div>
            </div>
            <!-- Total Products -->
            <div class="col-md-3 mb-3">
                <div class="card card-body p-3">
                    <p class="text-sm mb-0 text-capitalize"><i class="fas fa-motorcycle"></i> <a href="product.php">Total Products</a></p>
                    <h5 class="fw-bold mb-0">
                        <?= getCount('products'); ?>
                    </h5>
                </div>
            </div>
            <!-- Total Services -->
            <div class="col-md-3 mb-3">
                <div class="card card-body p-3">
                    <p class="text-sm mb-0 text-capitalize"><i class="fas fa-wrench"></i> <a href="service.php">Total Services</a></p>
                    <h5 class="fw-bold mb-0">
                        <?= getCount('services'); ?>
                    </h5>
                </div>
            </div>
            <!-- Total Admins -->
            <div class="col-md-3 mb-3">
                <div class="card card-body p-3">
                    <p class="text-sm mb-0 text-capitalize"><i class="fas fa-user-shield"></i> <a href="admins.php">Total Admins</a></p>
                    <h5 class="fw-bold mb-0">
                        <?= getCount('admins'); ?>
                    </h5>
                </div>
            </div>
            <!-- Total Customers -->
            <div class="col-md-3 mb-3">
                <div class="card card-body p-3">
                    <p class="text-sm mb-0 text-capitalize"><i class="fas fa-users"></i> <a href="customer.php">Total Customers</a></p>
                    <h5 class="fw-bold mb-0">
                        <?= getCount('bookings'); ?>
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Include your footer -->
    <?php include 'includes/footer.php'; ?>
    <!-- Add your JavaScript links here -->
</body>
</html>
