<?php include 'includes/header.php'; ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
  
        <div class="col-md-12">
        <?php alertMessage(); ?>
            <h1 class="mt-4"><i class="fas fa-tachometer-alt"></i> Dashboard</h1>
         
        </div>
        <div class="col-md-3 mb-3">
            <div class="card card-body p-3">
                <p class="text-sm mb-0 text-capitalize" ><i class="fas fa-list"></i> <a href="categories.php">Total Categories</a></p>
                <h5 class="fw-bold mb-0">
                    <?= getCount('categories'); ?>
                </h5>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card card-body p-3">
                <p class="text-sm mb-0 text-capitalize"  ><i class="fas fa-box" ></i> <a href="product.php">Total Products</a></p>
                <h5 class="fw-bold mb-0">
                    <?= getCount('products'); ?>
                </h5>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card card-body p-3">
                <p class="text-sm mb-0 text-capitalize"><i class="fas fa-box"></i> <a href="service.php">Total Services</a></p>
                <h5 class="fw-bold mb-0">
                    <?= getCount('services'); ?>
                </h5>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card card-body p-3">
                <p class="text-sm mb-0 text-capitalize"><i class="fas fa-user-shield"></i> <a href="admins.php">Total Admins</a></p>
                <h5 class="fw-bold mb-0">
                    <?= getCount('admins'); ?>
                </h5>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card card-body p-3">
                <p class="text-sm mb-0 text-capitalize"><i class="fas fa-users"></i> Total Customers</p>
                <h5 class="fw-bold mb-0">
                    <?= getCount('bookings'); ?>
                </h5>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h1 class="mt-4"><i class="fas fa-shopping-cart"></i> Booking</h1>
            <?php alertMessage(); ?>
        </div>
      
        <div class="col-md-3 mb-3">
            <div class="card card-body p-3">
                <p class="text-sm mb-0 text-capitalize"><i class="fas fa-shopping-bag"></i> <a href="booking.php">Total Pending</a></p>
                <h5 class="fw-bold mb-0">
                    <?= getCount1('bookings', "status = 'pending'"); ?>
                </h5>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card card-body p-3">
                <p class="text-sm mb-0 text-capitalize"><i class="fas fa-shopping-bag"></i> <a href="booking.php">Total Approved</a></p>
                <h5 class="fw-bold mb-0">
                    <?= getCount1('bookings', "status = 'approved'"); ?>
                </h5>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card card-body p-3">
                <p class="text-sm mb-0 text-capitalize"><i class="fas fa-shopping-bag"></i> <a href="booking.php">Total Booking</a></p>
                <h5 class="fw-bold mb-0">
                    <?= getCount('bookings'); ?>
                </h5>
            </div>
        </div>
    </div>
    
</div>

<?php include 'includes/footer.php'; ?>