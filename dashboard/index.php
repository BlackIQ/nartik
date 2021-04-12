<?php

session_start();

$server = "localhost";
$user = "narbon";
$passwd = "narbon";
$db = "nartik";

$conn = mysqli_connect($server, $user, $passwd, $db);

$getip = "SELECT * FROM development";
$res = mysqli_query($conn, $getip);

while ($row = mysqli_fetch_assoc($res)) {
    $ip = $row['ip'];
}

$email = $_SESSION['email'];

if ($_SESSION['status'] == true) {
    
}
else {
    header("Location: http://$ip/NarTik/account");
}

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $fname = $row['firstname'];
    }
}

?>

<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.rtl.min.css" integrity="sha384-trxYGD5BY4TyBTvU5H23FalSCYwpLA0vWEvXXGm5eytyztxb+97WzzY+IWDOSbav" crossorigin="anonymous">
    <title>داشبورد</title>
    <style>
        body {
            padding: 56px;
            background-color: #f6f6f6;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">خوش آمدید <?php echo $fname; ?></h4>
            <p>شما میتوانید از حساب خود هم اکنون استفاده کنید.</p>
            <hr>
            <p class="mb-0"><a href="../account/logout.php">خروج از حساب کاربری</a></p>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
