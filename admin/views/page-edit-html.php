<?php if( !defined('ADMIN') ) exit(); ?>

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
          <h2>Редакция на страница</h2>
        </div>

        <div class="col-lg-12">
            <form action="" method="post" role="form" >
            <input type="hidden" name="id" value="<?= $page->id ?>" >
            <input type="hidden" name="submited" value="2" >
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-2">
                  <input type="text" class="form-control" name="title" id="title" value="<?= $page->title ?>" placeholder="Въведете заглавие" required>
                </div>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-2">
                <input type="text" class="form-control" name="subtitle" id="subtitle" value="<?= $page->subtitle ?>" placeholder="Въведете подзаглавие" >
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-2">
                <input type="text" class="form-control" name="image" id="image" value="<?= $page->image ?>" placeholder="Въведете път до картинката" >
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-2">
                <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="4" placeholder="Въведете текст"><?= $page->text ?></textarea>
              </div>
              <div class="text-left mt-3"><button type="submit" value="1">Запис</button></div>
            </form>
        </div><!-- End Contact Form -->
        
      </div>
    </section><!-- End Inner Page -->

  </main><!-- End #main -->

  <?php require_once 'footer-html.php'; ?>

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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