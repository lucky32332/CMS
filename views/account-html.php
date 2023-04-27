<!DOCTYPE html>
<html>

<head>
    <title> My Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">

            </div>
            <div class="col-sm-6">
                <div class="login_form">
                    <img src="https://technosmarter.com/assets/images/logo.png" alt="Techno Smarter"
                        class="logo img-fluid"> <br>

                    <div class="row">
                        <div class="col"></div>
                        <div class="col-6">
                            <center>
                                <tr>
                                    <h1> Welcome! </h1>
                            </center>


                        </div>
                        <div class="col">
                            <p><a href="logout.php"><button type="button" class="btn btn-primary">Logout</button></a>
                            </p>
                            <p><a href="index.php"><button type="button" class="btn btn-primary">Back</button> </a></p>
                        </div>
                    </div>

                    <table class="table">
                        <tr>
                            <th>First Name </th>
                            <th> Family </th>
                            <th>Username </th>
                            <th>Email </th>

                            <?php


                            foreach ($rows as $k => $row) {

                                echo " <tr><td>" . $row['name'] . "</td><td>" . $row['family'] . "</td><td>" . $row['username'] . "</td><td>" .
                                    $row['email'] . "</td></tr>";
                                ?>

                                <center> <img src="./uploads/<?php echo $row['image']; ?> " style="width:100%;"></center>

                                <?php
                            }
                            echo "</table>";
                            ; ?>
                    </table>
                    <?php

                    echo "<a href='account.php?id=" . $row['id'] . "'><button type='button' class='btn btn-primary' id='submit'>Edit
                        Profile</button></a>";
                    ?>




</body>

</html>