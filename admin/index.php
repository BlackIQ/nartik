<?php

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

$_SESSION['person'] = "admin";

if ($_SESSION['person'] != "admin") {
    header("Location: http://$ip/NarTik/dashboard");
}

$sql = "SELECT * FROM pending";
$result = mysqli_query($conn, $sql);

?>

<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.rtl.min.css" integrity="sha384-trxYGD5BY4TyBTvU5H23FalSCYwpLA0vWEvXXGm5eytyztxb+97WzzY+IWDOSbav" crossorigin="anonymous">
        <title>Admin Page</title>
    </head>
    <body>
        <div class="container">
            <h1><?php echo $_SESSION['confirm']; ?></h1>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Company</th>
                        <th>Accept or Reject</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $mail = $row['email'];
                                ?>
                                <tr>
                                    <th><?php echo $row['firstname']; ?></th>
                                    <td><?php echo $row['lastnama']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['company']; ?></td>
                                    <td>
                                        <a href="confirm.php?email=<?php echo $mail; ?>">+</a>
                                        |
                                        <a href="confirm.php?email=<?php echo $mail; ?>">-</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>