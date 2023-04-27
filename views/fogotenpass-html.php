<?php if (!defined('CMS'))
  exit(); ?>
<main>
    <div class='wrapper-main'>
        <section class="section-default">
            <h1>Reset your password</h1>
            <p>Instuction will be in your email</p>
        <form action='reset-request.php' method='post' id="forgoten-pass-back" >
        <input type="hidden" name="forgoten-pass" value="0" id="forgoten-pass">
        
            <input type="text" name="email" placeholder="Enter Your Email">
            <button type="submit" onclick="document.getElementById('forgoten-pass').value=1;">Изпрати</button>
           
            <a href="#" onclick="document.getElementById('forgoten-pass-back').style.display = 'none';document.getElementById('login-form').style.display = 'block'; return false;">Вход</a>
            
        </form>
            <?php
            if (isset($_GET["reset"])) {

                if (isset($_GET["reset"]) == "success") {
                    echo '<p class="signupsuccess">Check your email</p>';
                }
            }
            
            ?>
        </section>
        
    </div>
</main>
