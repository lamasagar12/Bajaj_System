<?php include 'includer/header.php'; ?>
<style>
                                                    .text-Primary a {
    text-decoration: none; /* Removes underline */
    color: black; /* Sets custom text color */
}

.text-Primary a:hover {
    text-decoration: none; /* Removes underline on hover */
    color: black; /* Sets custom text color on hover */
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
                        foreach ($contactus as $item): ?>
                           
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
  <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
  <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
</svg>
                                                    </div>

                                                    <div>
                                                        <h4 class="mb-3 text-Primary">Address</h4>
                                                        <address class="mb-0 text-Primary">
                                                        <a href="https://www.google.com/maps?q=S%26S+Enterprises+Bajaj+Showroom" target="_blank">
                                                        <?= htmlspecialchars($item['address']) ?>
        </a></address>
                                                    </div>
                                                </div>
                                                <div class="row mb-4 mb-xxl-5">
                                                    <div class="col-12 col-xxl-6">
                                                        <div class="d-flex mb-
                                                        4 mb-4 mb-xxl-0">
                                                            <div class="me-4 text-primary">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-telephone-forward" viewBox="0 0 16 16">
  <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877zm10.762.135a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708"/>
</svg>
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
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
  <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
</svg>
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
  <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
</svg>
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
                                            <div class="row gx-3 gy-4">
                                                <div class="col-12">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input type="text" class="form-control form-control-lg" id="name" placeholder="Your name" name="name" required>
                                                </div>
                                                <div class="col-12">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control form-control-lg" id="email"  name="email" placeholder="Your email" required>
                                                </div>
                                                <div class="col-12">
                                                    <label for="message" class="form-label">Message</label>
                                                    <textarea class="form-control form-control-lg" id="message" rows="5" placeholder="Your message" name="message" required></textarea>
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
