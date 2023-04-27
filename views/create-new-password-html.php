<?php if (!defined('CMS'))
  exit(); ?>

<div class='wrapper-main'>
    <section class="section-default">

        <?php
        $selector = $_GET["selector"];
        $validator = $_GET["validator"];

        if (empty($selector) || empty($validator)) {
            echo "Coud not validate your request";

        } else {
            if (ctype_xdigit($selector) !== false && ctype_xdigit($selector) !== false !== false) {
                ?>


                <form action="views/forgotenpass-html.php" method="post">
                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                    <input type="hidden" name="selector" value="<?= $selector ?>">
                    <input type="hidden" name="validator" value="<?= $validator ?>">
                    <input type="password" name="pwd" placeholder="Enter your password">
                    <input type="password" name="pwd-repeat" placeholder="Repeat your password">
                    <button type="submit" name="reset-password-submit">Reset Password</button>

                </form>
                <?php
            }
        }