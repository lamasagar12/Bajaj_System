<?php include 'includer/header.php'; ?>
<style>
    .text-Primary a {
        text-decoration: none;
        /* Removes underline */
        color: black;
        /* Sets custom text color */
    }

    .text-Primary a:hover {
        text-decoration: none;
        /* Removes underline on hover */
        color: black;
        /* Sets custom text color on hover */
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid px-4">

    <!-- Row for Contact us Heading and Carousel -->
    <div class="row justify-content-center align-items-center mb-4">
        <div class="col-12 text-center">
        </div>
        <div class="col-12 text-center">
            <?php alertMessage(); ?>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" data-bs-interval="100">
                <div class="carousel-inner">
                    <?php
                    $contactus = getAll('locations');
                    if (mysqli_num_rows($contactus) > 0) {
                        $isActive = true; // To mark the first item as active
                        foreach ($contactus as $item) : ?>

                    <?php endforeach;
                    } else {
                        echo "<p>No contactus found.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact 6 - Bootstrap Brain Component -->
    <section class="py-3 py-md-5 py-xl-8">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                    <h2 class="mb-4 display-5 text-center">Need Help</h2>
                    <p class="text-secondary mb-5 text-center lead fs-4">Our team is available to provide prompt and helpful responses to all inquiries. You can reach us via phone, email, or by filling out the contact form below.</p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card  ">
                        <div class="card-body p-0">
                            <div class="row gy-3 gy-md-4 gy-lg-0">
                                <div class="col-12 col-lg-6 bsb-overlay background-position-center background-size-cover" style="--bsb-overlay-opacity: 0.7; background-image: url('./assets/img/contact-img-1.webp');">
                                    <div class="row align-items-lg-center justify-content-center h-100">
                                        <div class="col-11 col-xl-10">
                                            <div class="contact-info-wrapper py-4 py-xl-6">
                                                <h2 class="h1 mb-3 text-Primary">Get in touch</h2>
                                                <p class="lead fs-4 text-Primary opacity-75 mb-4 mb-xxl-5">We're always on the lookout to work with new clients. If you're interested in working with us, please get in touch in one of the following ways.</p>
                                                <div class="d-flex mb-4 mb-xxl-5">
                                                    <div class="me-4 text-primary">
                                                        <i class="fas fa-map-marker-alt fa-lg"></i>
                                                    </div>
                                                    <div>
                                                        <h4 class="mb-3 text-dark">Address</h4>
                                                        <address class="mb-0 " style="color:black;">
                                                            <a href="https://www.google.com/maps?q=S%26S+Enterprises+Bajaj+Showroom" target="_blank">
                                                                <!-- If $item['address'] is a PHP variable, ensure it's properly defined -->
                                                                <?= htmlspecialchars($item['address']) ?>
                                                            </a>
                                                        </address>
                                                    </div>
                                                </div>

                                                <div class="row mb-4 mb-xxl-5">
                                                    <div class="col-12 col-xxl-6">
                                                        <div class="d-flex mb-
                                                        4 mb-4 mb-xxl-0">
                                                            <div class="me-4 text-primary">
                                                                <i class="fas fa-phone-alt fa-lg"></i>

                                                            </div>
                                                            <div>
                                                                <h4 class="mb-3 text-Primary">Phone</h4>
                                                                <address class="mb-0 text-Primary opacity-75"><i> +977-<?= htmlspecialchars($item['phone']) ?></i></address>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-xxl-6">
                                                        <div class="d-flex">
                                                            <div class="me-4 text-primary">
                                                                <i class="fas fa-envelope fa-lg"></i>
                                                            </div>
                                                            <div>
                                                                <h4 class="mb-3 text-Dark">Email</h4>
                                                                <address class="mb-0 text-Dark opacity-75"><i><?= htmlspecialchars($item['email']) ?></i></address>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="me-4 text-primary">
                                                        <i class="fas fa-clock fa-lg"></i>
                                                    </div>
                                                    <div>
                                                        <h4 class="mb-3 text-dark">Opening Hours</h4>
                                                        <div class="d-flex mb-1">
                                                            <p class="text-dark fw-bold mb-0 me-5">Sun - Fri</p>
                                                            <p class="text-dark opacity-75 mb-0"> <?= htmlspecialchars($item['opentime']) ?> -<?= htmlspecialchars($item['closetime']) ?></p>

                                                        </div>(Saturday Closed )
                                                    </div>
                                                </div><br>
                                                <div class="d-grid d-sm-flex gap-3">
                                                    <a href="tel:9860463468" class="btn btn-primary btn-lg fs-5 px-5">Call us</a>
                                                    <a href="mailto:waiba223sagar@gmail.com" class="btn btn-outline-dark btn-lg fs-5 px-5">Email us</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <div class="p-4 p-lg-5 p-xxl-6">
                                        <form action="process-contact.php" method="POST">
                                            <h2 style="text-align:center;">Feel Free to Ask Questions</h2>
                                            <div class="row gx-3 gy-4">
                                                <div class="col-12">
                                                    <label for="name" class="form-label"><i class="fas fa-user"></i> Name:</label>
                                                    <input type="text" id="name" name="name" required class="form-control" pattern="^[A-Za-z]+(?: [A-Za-z]+){0,2}$" title="Please enter your name" />
                                                </div>
                                                <div class="col-12">
                                                    <label for="phone" class="form-label"><i class="fas fa-phone"></i> Phone:</label>
                                                    <input type="text" name="phone" required class="form-control" pattern="^(98|97|96)\d{8}$" title="Please enter a valid phone number" />
                                                </div>
                                                <div class="col-12">
                                                    <label for="email" class="form-label"><i class="fas fa-envelope"></i> Email:</label>
                                                    <input type="email" id="email" name="email" required class="form-control" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" title="Please enter a valid email address" />
                                                </div>
                                                <div class="col-12">
                                                    <label for="message" class="form-label"><i class="fas fa-comment"></i> Message:</label>
                                                    <textarea class="form-control form-control-lg" id="message" rows="8" name="message" required minlength="10"></textarea>
                                                </div>
                                                <div class="col-12 text-end">
                                                    <button type="submit" class="btn btn-primary btn-lg fs-5 px-5">Send message</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- End Page Content -->

<?php include 'includer/footer.php'; ?>