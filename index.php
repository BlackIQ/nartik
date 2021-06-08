<?php

session_start();

include("pack/config.php");

if ($_SESSION['status'] == true) {
    $who = $_SESSION['who'];
    header("Location : http://$serverip/NarTik/people/$who");
}

?>

<!doctype html>
<html>
    <head>
        <style>
            @font-face {
                font-family: 'nazanin';
                src: url('http://<?php echo $serverip; ?>/NarTik/pack/fonts/nazanin.TTF');
                font-style: normal;
            }

            body {
                background: #f1f1f1;
                text-align: center;
                direction: rtl;
            }
            
            * {
                font-family: 'nazanin';
            }
            
            .org {
                margin-top: 15%;
            }
        </style>
        <title>نارتیک</title>
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="http://<?php echo $serverip; ?>/NarTik/pack/css/bootstrap.min.css" rel="stylesheet">
        <link href="http://<?php echo $serverip; ?>/NarTik/pack/css/datepicker3.css" rel="stylesheet">
        <link href="http://<?php echo $serverip; ?>/NarTik/pack/css/styles.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="col-md-4">
                <br>
            </div>
            <div class="col-md-4 org">
                <h1><i class="fa fa-home"></i></h1>
                <h1>به نارتیک خوش آمدید</h1>
                <br>
                <button onclick="user()" class="btn btn-lg btn-primary"><b>ورود کاربر</b></button>
                &nbsp;
                <button onclick="support()" class="btn btn-lg btn-success"><b>ورود پشتیبان</b></button>
            </div>
            <div class="col-md-4">
                <br>
            </div>
        </div>
        <script>
            function user() {
                window.location.replace("http://<?php echo $serverip; ?>/NarTik/people/user");
            }
            
            function support() {
                window.location.replace("http://<?php echo $serverip; ?>/NarTik/people/support");
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>
