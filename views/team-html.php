<?php if (!defined('CMS'))
  exit(); ?>

<?php
require_once 'head-html.php';
?>

<body>
  <?php require_once 'header-html.php'; ?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>
            <?php echo $page->title ?>
          </h2>
          <ol>
            <li><a href="/">Home</a></li>
            <li>
              <?php echo $page->title ?>
            </li>
          </ol>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->
    <section id="services" class="services">
      <?php
      //TO DO Да извадя съдържанието от базата с ПХП
      $sql = "SELECT  `text` FROM `pages` WHERE `id`=5;";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
          echo $row["text"];
        }
      } else {
        echo "0 results";
      }
      $conn->close();
      ?>
    
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