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
        <title>خرید سرویس</title>
        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="stylesheet" href="offer.css" type="text/css">
    </head>
    <body class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    
                </div>
                <div class="col-md-4">
                    <div class="navs">
                        <h1>خرید سرویس</h1>
                        <br>
                        <hr>
                    </div>
                </div>
                <div class="col-md-4">
                    
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <div class="offer">
                        <div class="offerheader1">
                            <h1>سرویس یک</h1>
                        </div>
                        <div class="offerbody1">
                            <h1>توضیحات</h1>
                        </div>
                        <div class="offerfooter1">
                            <h1>فوتر</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>