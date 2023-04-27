<?php 
if (!defined('CMS'))
    exit(); ?>

?>
<form method="post">
    <input type="hidden" name="logout" value="0" id="logout">
    <button type="submit" onclick="document.getElementById('logout').value=1;">Logout</button>
</form>
