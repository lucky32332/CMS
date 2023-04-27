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

        <body class="bg-primary">
          <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
              <main>
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-lg-5">
                      <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                          <h3 class="text-center font-weight-light my-4">Login</h3>
                        </div>
                        <div class="card-body">
                          
                          <form action="login.php" method="post" role="form" class="php-email-formmm" id="login-form">
                            <input type="hidden" name="login" value="0" id="login">
                            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                            <div class="form-floating mb-3">
                              <input class="form-control" name="email" id="email" type="email"
                                placeholder="name@example.com" />
                              <label for="email">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                              <input class="form-control" name="password" id="password" type="password"
                                placeholder="password" />
                              <label for="password">Password</label>
                            </div>
                            <div class="form-check mb-3">
                              <input class="form-check-input" id="inputRememberpassword" type="checkbox" value="" />
                              <label class="form-check-label" for="inputRememberpassword">Remember password</label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                              <button type="submit" class="btn btn-primary"
                                onclick="document.getElementById('login').value=1;">Вход</button>


                              <?php
                              if (isset($_GET["newpwd"])) {

                                if (isset($_GET["newpwd"]) == "success") {
                                  echo '<p class="signupsuccess">Check your email</p>';
                                }
                              }

                              ?>
                               <a href="#" onclick="document.getElementById('login-form').style.display = 'none';document.getElementById('forgoten-pass-back').style.display = 'block'; return false;">Забравена Парола</a>
                        
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </main>
            </div>
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