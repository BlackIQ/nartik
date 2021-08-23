<?php

session_start();

include("action.php");

if ($_SESSION['status'] == true) {
    $who = $_SESSION['who'];
    ?>
    <script>
        window.location.replace("../<?php echo $who; ?>")
    </script>
    <?php
}

$getc = "SELECT * FROM admin";
$resc = mysqli_query($connection, $getc);

?>

<!doctype html>
<html lang="fa" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.rtl.min.css" integrity="sha384-trxYGD5BY4TyBTvU5H23FalSCYwpLA0vWEvXXGm5eytyztxb+97WzzY+IWDOSbav" crossorigin="anonymous">
        <title>Login</title>
        <style>
            @font-face {
                font-family: vazir;
                src: url("../../pack/fonts/vazir/Vazir.ttf");
                font-style: normal;
            }

            body {
                padding: 56px;
            }

            * {
                font-size: 13px;
                font-family: vazir, serif;
                color: darkgreen;
            }

            .login {
                border: solid 1px darkgreen;
                border-radius: 10px;
                padding: 20px;
            }
        </style>
    </head>
    <body class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="login">
                        <h1 class="display-6 text-success">ورود به حساب</h1>
                        <hr class="border-success border">
                        <br>
                        <form action="account.php" method="post">
                            <?php
                            if (count($errors) > 0) {
                                ?>
                                <div class="alert alert-danger alert-dismissible fade show alrt" role="alert">
<!--                                    <p><strong>Maybe something important!</strong></p>-->
                                    <?php
                                    foreach ($errors as $error) {
                                        echo "<p>" . $error . "</p>";
                                    }
                                    ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="username" class="form-control bg-white border-success text-success" placeholder="نام کاربری"
                                           aria-label="نام کاربری">
                                    <br>
                                    <input type="password" name="password" class="form-control bg-white border-success text-success"
                                           placeholder="رمز ورود" aria-label="رمز ورود">
                                </div>
                            </div>
                            <br>
                            <button type="submit" name="login_user" class="btn btn-success text-white">ورود</button>
                        </form>
                        <br>
                        <hr class="border-success border">
                        <div>
                            <p><a class="text-success" style="text-decoration: none;" href="../../"><i class="fa fa-home"></i> برگشت به خانه</a></p>
                            <p><a class="text-success" style="text-decoration: none;"  href="../../people/user"><i class="fa fa-user"></i> ورود به عنوان کاربر</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>