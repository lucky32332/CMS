<?php if (!defined('USER'))
  exit(); ?>

<?php
require_once 'head-html.php';
?>

<body>
  <?php require_once 'header-html.php'; ?>

  <main id="main">




    <section id="recent-blog-posts" class="recent-blog-posts">
      <?php
      require_once '../includes/db.php';
      $sql = "SELECT * FROM blog ORDER BY date desc limit 4 ";
      $result = $conn->query($sql);
      $sqlall = "SELECT * FROM blog ORDER BY date desc";
      $resultall = $conn->query($sqlall);

      $i = 0;

      if ($result->num_rows > 0) {

        // Output data of each row
        $idarray = array();
        while ($row = $result->fetch_assoc()) {
          echo "<br>";

          // Create an array to store the
          // id of the blogs        
          array_push($idarray, $row['id']);
        }
      } else {
        echo "0 results";
      }
      ?>

    </section>
  </main><!-- End #main -->



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
  <script src="
  https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" crossorigin="anonymous">
  </script>

  <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js">
  </script>
</body>

</html>