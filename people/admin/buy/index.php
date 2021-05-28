<?php

session_start();

if ($_SESSION['status'] == true) {
    $who = $_SESSION['who'];
    header("Location: http://127.0.0.1/NarTik/people/$who");
}
else {
}

?>


<!DOCTYPE html>
<html>
<head>
    <style>
        @font-face {
            font-family: 'nazanin';
            src: url('http://127.0.0.1/NarTik/pack/fonts/nazanin.TTF');
            font-style: normal;
        }

        * {
            font-family: "nazanin";
        }
        
        .main {
            background: #f4f4f4;
        }
        
        textarea {
            resize: none;
            text-align: right;
        }
        input {
            text-align: right;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>نارتیک - <?php echo $company_name; ?></title>
    <link href="http://127.0.0.1/NarTik/pack/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://127.0.0.1/NarTik/pack/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://127.0.0.1/NarTik/pack/css/datepicker3.css" rel="stylesheet">
    <link href="http://127.0.0.1/NarTik/pack/css/styles.css" rel="stylesheet">
</head>
<body class="main" style="text-align: right;">
    <div class="col-sm-offset-0 col-lg-offset-0 col-sm-12 col-lg-12">
        <div class="row">
            
        </div>
        <div class="row">
            
        </div>
        <div class="row">
            
        </div>
        <footer class="">
            <div class="container-fluid">
                <p class="back-link"><a class="text-danger" href="../">NarFirm</a></p>
                <p class="back-link">Created by <a class="text-danger" href="https://www.github.com/BlackIQ">Amirhossein Mohammadi</a></p>
                <p class="back-link">Powered By <a class="text-danger" href="https://www.linkedin.com/company/neotrinost">Neotrinost</a> <i class="fa fa-copyright"></i> <?php echo date("Y"); ?></p>
                <p class="back-link">
                    <i class="fa fa-lg fa-linkedin-square text-danger"></i>
                    &nbsp;
                    <i class="fa fa-lg fa-github"></i>
                    &nbsp;
                    <i class="fa fa-lg fa-telegram text-primary"></i>
                    &nbsp;
                    <i class="fa fa-lg fa-instagram text-danger"></i>
                </p>
            </div>
        </footer>
    </div>
    <script src="http://127.0.0.1/NarTik/pack/js/jquery-1.11.1.min.js"></script>
    <script src="http://127.0.0.1/NarTik/pack/js/bootstrap.min.js"></script>
    <script src="http://127.0.0.1/NarTik/pack/js/bootstrap-datepicker.js"></script>
    <script src="http://127.0.0.1/NarTik/pack/js/custom.js"></script>
</body>
</html>
