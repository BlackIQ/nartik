<?php

session_start();

// MySQL Data
$mysqlserver = "localhost";
$mysqluser = "narbon";
$mysqlpassword = "narbon";
$mysqldatabase = "nartik";

// Create Connection
$connection = mysqli_connect($mysqlserver, $mysqluser, $mysqlpassword, $mysqldatabase);

if ($_SESSION['status'] == true) {
    $mail = $_SESSION['email'];

    $getdata = "SELECT * FROM users WHERE email = '$mail'";
    $ressult = mysqli_query($connection, $getdata);

    if (mysqli_num_rows($ressult) > 0) {
        while ($row = mysqli_fetch_assoc($ressult)) {
            $fname = $row['firstname'];
            $lname = $row['lastname'];
            $phone = $row['phone'];
            $email = $row['email'];
            $username = $row['username'];
            $userid = $row['id'];
            $company = $row['company'];
        }
    }
    else {
        header("Location: http://office.narbon.ir:4488/NarTik");
    }

    $gettiks = "SELECT * FROM tiks WHERE userid = '$userid'";
    $tikres = mysqli_query($connection, $gettiks);

}
else {
    header("Location: http://office.narbon.ir:4488/NarTik");
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NarTik - Dashboard</title>
    <link href="http://office.narbon.ir:4488/pack/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://office.narbon.ir:4488/pack/css/datepicker3.css" rel="stylesheet">
    <link href="http://office.narbon.ir:4488/pack/css/styles.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>


    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://office.narbon.ir:4488/pack/js/html5shiv.js"></script>
    <script src="https://office.narbon.ir:4488/pack/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    
    <nav class="navbar bg-info navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="../">NarTik</a>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" href="../account/logout.php">
                            <em class="fa fa-sign-out"></em>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
<div class="col-sm-offset-0 col-lg-offset-0 col-sm-12 col-lg-12 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="../">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Dashboard</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
    </div><!--/.row-->
    

    <div class="panel panel-container">
        
        <div class="row">
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-bank color-blue"></em>
                        <div class="large"><?php echo $company; ?></div>
                        <br>
                        <div class="text-muted">Company</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-blue panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-envelope color-orange"></em>
                        <div class="large"><?php echo "8"; ?></div>
                        <br>
                        <div class="text-muted">Total Tickets</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-orange panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-check text-success"></em>
                        <div class="large"><?php echo "7"; ?></div>
                        <br>
                        <div class="text-muted">Answered Tickets</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-red panel-widget ">
                    <div class="row no-padding"><em class="fa fa-xl fa-times color-red"></em>
                        <div class="large"><?php echo "1"; ?></div>
                        <br>
                        <div class="text-muted">Not Seen Tickets</div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Ticket
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="">
                        <form class="">
                            <div class="form-group">
                                <label for="title">Title of Ticket</label>
                                <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="Title of report">
                            </div>
                            <div class="form-group">
                                <label for="des">Explanation</label>
                                <input type="text" class="form-control" id="des" aria-describedby="des" placeholder="Explanation">
                            </div>
                            <div class="form-group">
                                <label for="record">Record your voice</label>
                                <p class="text-primary"><i class="fa fa-microphone"></i> Click here to start recording</p>
                            </div>
                            <button type="submit" class="btn btn-primary">Send ticket</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
                <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    My Tickets
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="">
                        <?php
                            if (mysqli_num_rows($tikres) > 0) {
                                ?>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="">row</th>
                                        <th class="">Title</th>
                                        <th class="">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while ($tiks = mysqli_fetch_assoc($tikres)) {
                                        ?>
                                        <tr>
                                            <th class=""><?php echo $tiks['row']; ?></th>
                                            <td class=""><?php echo $tiks['title']; ?></td>
                                            <td class="">
                                                <?php
                                                if ($tiks['answer'] != "ny") {
                                                    echo "<i class='fa fa-check text-success'></i>";
                                                }
                                                else {
                                                    echo "<i class='fa fa-times text-danger'></i>";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <?php
                            }
                            else {
                                echo "<h2>You have no tickets yet !</h2>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tickets Review
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                </div>
                <div class="panel-body">
                    <div>
                        <h1>Select a ticket</h1>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Profile
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="">
                        <div class="profile-sidebar">
                            <div class="profile-userpic">
                                <img src="http://office.narbon.ir:4488/pack/pic.jpeg" class="img-responsive" alt="User Image">
                            </div>
                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name"><i class="fa fa-user color-blue"></i> <?php echo $username;?></div>
                                <div class="profile-usertitle-status"><i class="fa fa-id-card color-orange"></i> <?php echo $userid;?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div>
                            <h3 class="text-success"><i class="fa fa-user"></i>&nbsp;<?php echo $fname . "&nbsp;" . $lname;?></h3>
                            <h3 class="text-info"><i class="fa fa-bank"></i>&nbsp;<?php echo $company;?></h3>
                            <br>
                            <h4 class="text-primary"><i class="fa fa-at"></i>&nbsp;<?php echo $email;?></h4>
                            <h4 class="text-warning"><i class="fa fa-phone"></i>&nbsp;<?php echo $phone; ?></h4>
                        </div>
                        <br>
                        <div>
                            <p><a class="text-danger" href="../account/logout.php"><i class="fa fa-sign-out"></i> Logout</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Setting
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="">
                        <h3>Update Your profile</h3>
                        <br>
                        <form class="">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username">
                                <small>Your current username is <b><?php echo $username;?></b></small>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="E-Mail">
                                        <small>Your current E-Mail is <b><?php echo $email;?></b></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Phone">
                                        <small>Your current phone is <b><?php echo $phone;?></b></small>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </form>
                        <div>
                            <hr>
                        </div>
                        <h3>Change Password</h3>
                        <br>
                        <form class="">
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Current Password">
                                <small>Enter Your <b>current password</b></small>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="New Password">
                                        <small>Enter Your <b>new password</b></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Confirm Password">
                                        <small>Enter Your <b>new password again</b></small>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->

    <footer class="">
        <div class="container-fluid">
            <p class="back-link"><a href="../">NarTik</a></p>
            <p class="back-link">Created by <a href="https://www.github.com/BlackIQ">Amirhossein Mohammadi</a></p>
            <p class="back-link">Powered By <a href="https://www.linkedin.com/company/neotrinost">Neotrinost</a> <i class="fa fa-copyright"></i> <?php echo date("Y"); ?></p>
            <p class="back-link">
                <i class="fa fa-lg fa-linkedin-square text-info"></i>
                &nbsp;
                <i class="fa fa-lg fa-github"></i>
                &nbsp;
                <i class="fa fa-lg fa-telegram text-primary"></i>
                &nbsp;
                <i class="fa fa-lg fa-instagram text-danger"></i>
            </p>
        </div>
    </footer>
    
</div>    <!--/.main-->

<script src="http://office.narbon.ir:4488/pack/js/jquery-1.11.1.min.js"></script>
<script src="http://office.narbon.ir:4488/pack/js/bootstrap.min.js"></script>
<script src="http://office.narbon.ir:4488/pack/js/chart.min.js"></script>
<script src="http://office.narbon.ir:4488/pack/js/chart-data.js"></script>
<script src="http://office.narbon.ir:4488/pack/js/easypiechart.js"></script>
<script src="http://office.narbon.ir:4488/pack/js/easypiechart-data.js"></script>
<script src="http://office.narbon.ir:4488/pack/js/bootstrap-datepicker.js"></script>
<script src="http://office.narbon.ir:4488/pack/js/custom.js"></script>
<script>
    window.onload = function () {
        var chart1 = document.getElementById("line-chart").getContext("2d");
        window.myLine = new Chart(chart1).Line(lineChartData, {
            responsive: true,
            scaleLineColor: "rgba(0,0,0,.2)",
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleFontColor: "#c5c7cc"
        });
    };
</script>

</body>
</html>
