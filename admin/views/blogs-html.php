<?php if (!defined('ADMIN'))
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
          <h2>Блог</h2>
        </div>
        <form  method="post" action="blogs.php">
        <input type="hidden" name="blog_create" id="blog_create" value="" >
        <div class="text-left mt-3"><button type="submit"   onclick="document.getElementById('blog_create').value=4; ">Създай Блог</button></div>

        </form>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Заглавие</th>
              <th scope="col">Подзаглавие</th>
              <th scope="col">Username</th>
              <th scope="col">Редакция</th>
              <th scope="col">Изтрий</th>
            </tr>
          </thead>
          <tbody>
            <?php

            foreach ($blogs as $k => $blog) {
              echo "<tr>";
              echo "<th scope='row'>" . $blog['id'] . "</th>";
              echo "<td >" . $blog['title'] . "</td>";
              echo "<td >" . $blog['subtitle'] . "</td>";
              echo "<td >" . $blog['username'] . "</td>";
              echo "<td ><a href='blogs.php?id=" . $blog['id'] . "'>Редакция</a></td>";
              echo "<td ><a href='blogs.php?id=" . $blog['id'] . "'>Изтрий</a></td>";

            }
            ?>
          
          </tbody>
        </table>

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