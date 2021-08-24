<?php

session_start();

if ($_SESSION['status'] == true) {
    $who = $_SESSION['who'];
    ?>
    <script>
        window.location.replace("people/<?php echo $who; ?>");
    </script>
    <?php
}

?>

<!doctype html>
<html>
    <head>
        <style>
            @font-face {
                font-family: vazir;
                src: url("pack/fonts/vazir/Vazir.ttf");
            }

            .main {
                font-family: vazir, sans-serif;
                /*background: url('https://wallpapercave.com/wp/wp3797593.jpg') no-repeat center center;*/
                background: url('https://wallpapercave.com/wp/wp8272239.jpg') no-repeat center center;
                text-align: right;
                direction: rtl;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                background-size: cover;
                -o-background-size: cover;
                height: 100vh;
                padding: 5%;
                color: white;
            }
            .text {
                color: white;
                text-align: right;
            }
            .mbtn {
                width: 25%;
            }
        </style>
        <title>نارتیک</title>
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    </head>
    <body>
    <div class="main">
        <div class="text">
            <h1>به سامانه ثبت درخواست سرویس شرکت ناربن خوش آمدید</h1>
            <br>
            <br>
            <br>
            <button type="button" class="btn btn-primary mbtn" data-bs-toggle="modal" data-bs-target="#loginuser">
                ورود کاربر
            </button>
            <br>
            <br>
            <button type="button" class="btn btn-info mbtn" style="color: white" data-bs-toggle="modal" data-bs-target="#create">
                ساخت حساب کاربری
            </button>
            <br>
            <br>
            <button type="button" class="btn btn-success mbtn" data-bs-toggle="modal" data-bs-target="#loginsupport">
                ورود پشتیبان
            </button>
            <br>
            <br>
            <br>
        </div>
    </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
            crossorigin="anonymous"></script>
</html>

<div class="modal fade" id="loginuser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="loginsupport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>