<?php if( !defined('ADMIN') ) exit(); ?>

<?php
require_once 'head-html.php';
?>
<body>
    <?php require_once 'header-html.php'; ?>

    <main id="main">

    <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>
            <?php echo $blog->titles ?>
          </h2>
          <ol>
            <li><a href="/">Home</a></li>
            <li>
              <?php echo $blog->titles ?>
            </li>
          </ol>
        </div>

      </div>
    </div>
    <!-- ======= Blog Section ======= -->
    <section class="inner-page">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Редакция на блога</h2>
        </div>

        <div class="col-lg-12">
        <form action="" method="post" role="form" >
            <input type="hidden" name="ids" value="<?= $blog->ids ?>" >
            <input type="hidden" name="edit-submited" value="2" >
              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-2">
                  <input type="text" class="form-control" name="titles" id="titles" value="<?= $blog->titles ?>" placeholder="Въведете заглавие" required>
                </div>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-2">
                <input type="text" class="form-control" name="usernames" id="usernames" value="<?= $blog->usernames ?>" placeholder="Въведете Username" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-2">
                <input type="text" class="form-control" name="subtitles" id="subtitles" value="<?= $blog->subtitles ?>" placeholder="Въведете подзаглавие" >
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-2">
                <input type="text" class="form-control" name="images" id="images" value="<?= $blog->images ?>" placeholder="Въведете път до картинката" >
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-2">
                <textarea class="form-control" name="texts" id="exampleFormControlTextarea1" rows="4" placeholder="Въведете текст"><?= $blog->texts ?></textarea>
              </div>
              <div class="text-left mt-3"><button type="submit"  onclick="document.getElementById('edit-submited').value=1; ">Запис</button></div>
            </form>
            <div class="col-lg-12">
            
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