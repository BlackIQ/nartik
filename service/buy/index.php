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
        <link rel="stylesheet" href="offer.css" type="text/css">
        <style>
            @font-face {
                font-family: 'nazanin';
                src: url('http://127.0.0.1/NarTik/pack/fonts/nazanin.TTF');
                font-style: normal;
            }
            
            .rght {
                float: right;
            }
            .lft {
                float: left;
            }

            .navs {
                text-align: center;
            }

            body {
                background: #f3f3f3;
                padding: 56px;
                font-family: 'nazanin';
            }
            
            .btn-green {
                background: green;
                color: white;
            }
            .btn-green:hover {
                color: white;
                background: #449d44;
            }
            
            .btn-red {
                background: red;
                color: white;
            }
            .btn-red:hover {
                color: white;
                background: tomato;
            }
            
            .btn-blue {
                background: blue;
                color: white;
            }
            .btn-blue:hover {
                color: white;
                background: #006dcc;
            }
            
            .btn-purple {
                background: purple;
                color: white;
            }
            .btn-purple:hover {
                color: white;
                background: blueviolet;
            }
        </style>
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
                            <h3>توضیحات</h3>
                        </div>
                        <div class="offerfooter1">
                            <h5>
                                <b class="rght">مدت زمان سرویس</b>
                                &nbsp;
                                <span class="lft">سه ماهه</span>
                            </h5>
                            <hr>
                            <p>کلیک روی خرید بیانگر قبول کردن شرایط ما توسط شماست</p>
                            <button class="btn btn-green">خرید</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="offer">
                        <div class="offerheader2">
                            <h1>سرویس دو</h1>
                        </div>
                        <div class="offerbody2">
                            <h3>توضیحات</h3>
                        </div>
                        <div class="offerfooter2">
                            <h5>
                                <b class="rght">مدت زمان سرویس</b>
                                &nbsp;
                                <span class="lft">شش ماهه</span>
                            </h5>
                            <hr>
                            <p>کلیک روی خرید بیانگر قبول کردن شرایط ما توسط شماست</p>
                            <button class="btn btn-red" disabled>خرید</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="offer">
                        <div class="offerheader3">
                            <h1>سرویس سه</h1>
                        </div>
                        <div class="offerbody3">
                            <h3>توضیحات</h3>
                        </div>
                        <div class="offerfooter3">
                            <h5>
                                <b class="rght">مدت زمان سرویس</b>
                                &nbsp;
                                <span class="lft">نه ماهه</span>
                            </h5>
                            <hr>
                            <p>کلیک روی خرید بیانگر قبول کردن شرایط ما توسط شماست</p>
                            <button class="btn btn-blue" disabled>خرید</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="offer">
                        <div class="offerheader4">
                            <h1>سرویس چهار</h1>
                        </div>
                        <div class="offerbody4">
                            <h3>توضیحات</h3>
                        </div>
                        <div class="offerfooter4">
                            <h5>
                                <b class="rght">مدت زمان سرویس</b>
                                &nbsp;
                                <span class="lft">دوازده ماهه</span>
                            </h5>
                            <hr>
                            <p>کلیک روی خرید بیانگر قبول کردن شرایط ما توسط شماست</p>
                            <button class="btn btn-purple" disabled>خرید</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>