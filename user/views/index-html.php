<?php if (!defined('USER'))
  exit(); ?>
<?php
require_once 'head-html.php';
?>

<?php require_once 'header-html.php'; ?>

<section id="hero-animated" class="hero-animated d-flex align-items-center">
  <?php

  $sql = "SELECT  `text`, `image` FROM `pages` WHERE `id`=1;";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      echo $row["text"]. $row["image"];
    }
  } else {
    echo "0 results";
  }


  $conn->close();

  ?>
</section>




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