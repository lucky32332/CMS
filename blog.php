<?php
session_start();
define("USER", true);
require_once '../includes/db.php';
require_once 'views/blog-html.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">



<body>
  <!-- Blog Latest -->

  <div class="blog-latest">
    <div class="container">
      <h1 class="blog-secondary-heading text-dark">
        Latest Blogs</h1>

      <div class="main-carousel p-2 " id="latestCarousel">
        <div class="row">

          <?php

          for ($x = 0; $x < 4; $x++) {

            // This is the loop to display all
            // the stored blog posts
            if (isset($x)) {
              $query = mysqli_query(
                $conn,
                "SELECT * FROM `blog` WHERE id = '$idarray[$x]'"
              );

              $res = mysqli_fetch_array($query);

              $image = $res['image'];
              $blog_title = $res['title'];
              $blog_text = $res['text'];
              $blog_id = $res['id'];
              ?>
              <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="post-box">
                  <div class="post-img"> <img class="card-img-top" src="<?php echo $image; ?>" alt="Card image cap"></div>
                  <div class="meta">
                    <span class="post-date">Tue, December 12</span>
                    <span class="post-author"> / Julia Parker</span>
                  </div>
                  <h3 class="post-title">
                    <?php
                    echo $blog_title;
                    ?>
                  </h3>
                  <p>
                    <?php
                    echo $blog_text;
                    ?>
                  </p>
                  <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
                      class="bi bi-arrow-right"></i></a>
                </div>
              </div>

              <?php
            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>

  <?php require_once 'views/footer-html.php'; ?>

</body>

</html>