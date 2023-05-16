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
          <h2>Файлове</h2>
        </div>

        <div class="row">
          <?php
              if($extensionError){
                echo "<p>Невалиден тип на разрешените файлове!</p>";
              }
              if($maxAllowedFileSizeError){
                echo "<p>Големина на файл над разрешената!</p>";
              }
              if($errors > 0){
                echo "<p>".$errors." грешки при качване на файловете!</p>";
              }
              if($success > 0){
                echo "<p>".$success." качени файлове!</p>";
              }
          ?>
          <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="submited" value="3" >
            <div class="mb-3">
              <label for="formFileMultiple" class="form-label">Качване на файлове</label>
              <input class="form-control" type="file" name="fileToUpload[]" id="formFileMultiple" multiple>
            </div>
            <input type="submit" value="Качи" name="submit">
          </form>
        </div>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">Заглавие</th>
              <th scope="col">Линк</th>
            </tr>
          </thead>
          <tbody>
            <?php
//print_r($files);die;
            foreach($files as $k=>$file){
              echo "<tr>";
              echo "<th scope='row'>".$file."</th>";
              echo "<td >".$base_target_dir . "/" . $file."</td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
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