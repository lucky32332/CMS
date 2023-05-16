<?php
if (!defined('USER'))
    exit();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Profile</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6">

                <form action="" method="POST" enctype='multipart/form-data'>
                    <div class="login_form">

                        <img src="https://technosmarter.com/assets/images/logo.png" alt="Techno Smarter"
                            class="logo img-fluid"> <br>

                        <form action="upload.php" method="post" enctype='multipart/form-data' action="" id="edit-form">
                            <input type="hidden" name="edit-form" value="0" id="edit-form">
                            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                            <div class="row">
                                <div class="col"></div>
                                <div class="col-6">






                                    <center>
                                        <?php
                                        if (isset($_GET['error'])) {
                                        } ?>
                                        <p>
                                            <?php echo $_GET['error']; ?>
                                        </p>


                                        <div class="form-group">

                                            <label>Change Image &#8592;</label>
                                            <input type="file" name="my_image" style="width:100%;">



                                        </div>

                                    </center>
                                </div>
                                <div class="col">
                                    <p><a href="account.php"><button type="button" class="btn btn-primary">Back</button> </a></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                        <label>First Name</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" name="name" id='name' value="<?php echo $name; ?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                        <label>Last Name</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" name="family" id="family" value="<?php echo $family; ?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                        <label>Username</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" name="username" id="username" value="<?php echo $email; ?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                        <label>Email</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" name="email" id="email" value="<?php echo $email; ?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                        <label>Password</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" name="password" id="password"
                                            value="<?php echo $password; ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label>Repeat Password</label>
                            </div>
                            <div class="col">
                                <input type="text" name="password2" id="password2" value="<?php echo $password2; ?>"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success"
                                onclick="document.getElementById('edit-form').value=1;">Save Profile</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-3">
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</html>