<?php if (!defined('CMS'))
    exit(); ?>

<?php
require_once 'head-html.php';
?>

<body>
    <?php require_once 'header-html.php'; ?>

    <main id="main">

        <!-- ======= Blog Section ======= -->
        <section class="inner-page">
            <div class="container" data-aos="fade-up">

                <div class="section-header">

                    <body class="bg-primary">
                        <div id="layoutAuthentication">
                            <div id="layoutAuthentication_content">
                                <main>
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-7">
                                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                                    <div class="card-header">
                                                        <h3 class="text-center font-weight-light my-4">Create Account
                                                        </h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <form method="post" id="register-form">
                                                            <input type="hidden" name="register" value="0"
                                                                id="register">
                                                            <input type="hidden" name="csrf_token"
                                                                value="<?= $_SESSION['csrf_token'] ?>">
                                                            <div class="row mb-3">
                                                                <div class="col-md-6">
                                                                    <div class="form-floating mb-3 mb-md-0">
                                                                        <input class="form-control" name="register_name"
                                                                            id="register_name" type="text"
                                                                            placeholder="Enter your first name" />
                                                                        <label for="register_name">First name</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-floating">
                                                                        <input class="form-control"
                                                                            name="register_family" id="register_family"
                                                                            type="text"
                                                                            placeholder="Enter your last name" />
                                                                        <label for="register_family">Last name</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <input class="form-control" name="register_email"
                                                                    id="register_email" type="email"
                                                                    placeholder="name@example.com" />
                                                                <label for="register_email">Email address</label>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-md-6">
                                                                    <div class="form-floating mb-3 mb-md-0">
                                                                        <input class="form-control"
                                                                            name="register_password"
                                                                            id="register_password" type="password"
                                                                            placeholder="Create a password" />
                                                                        <label for="register_password">Password</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-floating mb-3 mb-md-0">
                                                                        <input class="form-control"
                                                                            name="register_password2"
                                                                            id="pregister_assword2" type="password"
                                                                            placeholder="Confirm password" />
                                                                        <label for="register_password2">Confirm
                                                                            Password</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mt-4 mb-0">

                                                                <div class="d-grid"> <button type="submit" id="submit"
                                                                        class="btn btn-primary btn-block"
                                                                        onclick="document.getElementById('register').value=1; ">Create
                                                                        Account</button></div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="card-footer text-center py-3">
                                                        <div class="small"><a href="login.php">Have an account? Go to
                                                                login</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </main>
                            </div>
        </section><!-- End Inner Page -->

    </main><!-- End #main -->

    <?php require_once 'footer-html.php'; ?>

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>