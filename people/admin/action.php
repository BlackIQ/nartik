<?php
session_start();

$tik = array();
$errors = array();

// Nartik configuration
include("../../pack/config.php");

// Create Connection
$connection = mysqli_connect($mysqlserver, $mysqluser, $mysqlpassword, $mysqldatabase);

// Login User
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "نام کاربری الزامیست");
    }
    if (empty($password)) {
        array_push($errors, "رمز الزامیست");
    }

    if (count($errors) == 0) {
        if ($username == "admin" && $password == "admin") {
            $_SESSION['status'] = true;
            $_SESSION["who"] = "admin";
            ?>
            <script>
                window.location.replace("index.php")
            </script>
            <?php
        }
        else {
            array_push($errors, "نام کاربری یا رمز");
        }
    }
}

// Answer The Ticket
if (isset($_POST["ans"])) {
    $answer = mysqli_escape_string($connection, $_POST["answer"]);
    $tikid = $_SESSION['tikid'];

    if (isset($answer)) {
        $doanswer = "UPDATE nartiks SET answer = '$answer' WHERE tikid = '$tikid'";
        if (mysqli_query($connection, $doanswer)) {
            ?>
            <script>
                window.alert("به این تیکت جواب داده شد");
                window.location.replace(".");
            </script>
            <?php
        }
    }
}

// Get ticket data
if (isset($_GET['ticket'])) {
    $id = $_GET['ticket'];
    $_SESSION['tikid'] = $id;
    $sql = "SELECT * FROM nartiks WHERE tikid = $id";
    $getik = mysqli_query($connection, $sql);

    if (mysqli_num_rows($getik) > 0) {
        while ($pen = mysqli_fetch_assoc($getik)) {
            array_push($tik, $pen);
        }
    } else {
        array_push($tik, false);
    }
}

// Add company
if (isset($_POST["addcompany"])) {
    $company_name = mysqli_escape_string($connection, $_POST["company"]);
    $eid = mysqli_escape_string($connection, $_POST["eid"]);
    $password = mysqli_escape_string($connection, $_POST["password"]);

    if (isset($company_name)) {
        $uid = rand(111, 999);

        $add_company = "INSERT INTO admin (id, password, company, uid) VALUES ('$eid', '$password', '$company_name', '$uid')";
        if (mysqli_query($connection, $add_company)) {
            ?>
            <script>
                window.alert("شرکت اضافه شد");
                window.location.replace(".");
            </script>
            <?php
        } else {
            ?>
            <script>
                window.alert("<?php echo mysqli_error($connection); ?>");
                window.location.replace(".");
            </script>
            <?php
        }
    }
}

?>
