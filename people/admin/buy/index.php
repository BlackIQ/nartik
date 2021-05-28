<?php

session_start();

if ($_SESSION['status'] == true) {
    $who = $_SESSION['who'];
    header("Location: http://127.0.0.1/NarTik/people/$who");
}
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
                font-family: 'nazanin';
                src: url('http://127.0.0.1/NarTik/pack/fonts/nazanin.TTF');
                font-style: normal;
            }
            body {
                padding: 56px;
                font-family: 'nazanin';
            }
            * {
                color: darkgreen;
            }
            
            .offer1 {
                text-align: center;
                border: solid 1px darkblue;
                border-radius: 10px;
                padding: 20px;
            }
            .offer1 h1 {
                color: darkblue;
            }
            .offer1 hr {
                color: darkblue;
                background: darkblue;
                height: 1px;
            }
        </style>
    </head>
    <body class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="offer1">
                        <h1>سرویس ساده</h1>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>