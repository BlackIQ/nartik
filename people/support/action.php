<?php
session_start();

$prop = array();
$tik = array();
$ansary = array();
$send = array();
$com_tik = array();
$errors = array();

$company = $_SESSION["uid"];

// MySQL Data
include("../../pack/config.php");
$mysqlserver = $ip;
$mysqluser = "narbon";
$mysqlpassword = "narbon";
$mysqldatabase = "nartik";

// Create Connection
$connection = mysqli_connect($mysqlserver, $mysqluser, $mysqlpassword, $mysqldatabase);

if (isset($_POST['login_user'])) {
    $eid = mysqli_real_escape_string($connection, $_POST['eid']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $company = mysqli_real_escape_string($connection, $_POST['company']);

    if (empty($eid)) {
        array_push($errors, "کد ورود الزامیست");
    }
    if (empty($password)) {
        array_push($errors, "رمز الزامیست");
    }
    if (empty($company)) {
        array_push($errors, "شرکت الزامیست");
    }

    if (count($errors) == 0) {
        $select_company = "SELECT * FROM admin WHERE uid = '$company'";
        $rescompany = mysqli_query($connection, $select_company);

        if (mysqli_num_rows($rescompany) == 1) {
            $row = mysqli_fetch_assoc($rescompany);

            $company_name = $row["company"];
        }

        $query = "SELECT * FROM admin WHERE id = '$eid' AND password = '$password' AND company = '$company_name'";
        $results = mysqli_query($connection, $query);

        if (mysqli_num_rows($results) == 1) {
            $_SESSION['status'] = true;
            $_SESSION['eid'] = $eid;
            $_SESSION["who"] = "support";
            $_SESSION["uid"] = $company;
            $_SESSION['company'] = $company_name;
            ?>
            <script>
                window.location.replace("index.php")
            </script>
            <?php
        }
        else {
            array_push($errors, "ایمیل با رمز اشتباه است");
        }
    }
}

// Get user data
if (isset($_GET['user'])) {
    $id = $_GET['user'];
    $sql = "SELECT * FROM people WHERE id='$id'";
    $getpen = mysqli_query($connection, $sql);

    if (mysqli_num_rows($getpen) > 0) {
        while ($pen = mysqli_fetch_assoc($getpen)) {
            array_push($prop, $pen);
        }
    }
    else {
        array_push($prop, false);
    }
}

// Answer The Ticket
if (isset($_POST["ans"])) {
    $answer = mysqli_escape_string($connection, $_POST["answer"]);
    $tikid = $_SESSION['tikid'];

    if (isset($answer)) {
        $doanswer = "UPDATE tiks SET answer = '$answer' WHERE tikid = '$tikid'";
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

// Add company
if (isset($_POST["addcompany"])) {
    $company_name = mysqli_escape_string($connection, $_POST["company"]);

    if (isset($company_name)) {
        $id = rand(111, 999);

        $add_company = "INSERT INTO company (id, name, time, uid) VALUES ('$id', '$company_name', 2, '$company')";
        if (mysqli_query($connection, $add_company)) {
            ?>
                <script>
                    window.alert("شرکت اضافه شد");
                    window.location.replace(".");
                </script>
            <?php
        }
        else {
            ?>
            <script>
                window.alert("<?php echo mysqli_error($connection); ?>");
                window.location.replace(".");
            </script>
            <?php
        }
    }
}

// Insert new company ticket
if (isset($_POST['sendtik'])) {
    date_default_timezone_set('Iran');

    $title = mysqli_real_escape_string($connection, $_POST["title"]);
    $text = mysqli_real_escape_string($connection, $_POST["text"]);

    if (empty($title)) {
        array_push($send, "موضوع تیکت الزامیست");
    }
    if (empty($text)) {
        array_push($send, "متن تیکت الزامیست");
    }

    if (count($send) == 0) {
        $dt = date("M d, Y H:i:s");

        $tikid = rand(1000, 9999);

        $query = "INSERT INTO nartiks (tikid, title, explane, company, dt, answer) VALUES ('$tikid', '$title', '$text', '$company', '$dt', 'ny')";
        if (mysqli_query($connection, $query)) {
            ?>
            <script>
                window.alert("تیکت شما با موفقیت ارسال شد");
                window.location.replace("http://<?php echo $serverip; ?>/NarTik/people/user");
            </script>
            <?php
        }
        else {
            ?>
            <script>
                window.alert("<?php echo mysqli_error($connection); ?>");
                window.location.replace(".");
            </script>
            <?php
        }
    }

}

// Get company ticket data
if (isset($_GET['comtik'])) {
    $id = $_GET['comtik'];
    $sql = "SELECT * FROM nartiks WHERE tikid = $id";
    $getik = mysqli_query($connection, $sql);

    if (mysqli_num_rows($getik) > 0) {
        while ($pen = mysqli_fetch_assoc($getik)) {
            array_push($com_tik, $pen);
        }
    }
    else {
        array_push($com_tik, false);
    }
}

// Get ticket data
if (isset($_GET['ticket'])) {
    $id = $_GET['ticket'];
    $_SESSION['tikid'] = $id;
    $sql = "SELECT * FROM tiks WHERE tikid = $id";
    $getik = mysqli_query($connection, $sql);

    if (mysqli_num_rows($getik) > 0) {
        while ($pen = mysqli_fetch_assoc($getik)) {
            array_push($tik, $pen);
        }
    }
    else {
        array_push($tik, false);
    }
}

// Confirm Person
if (isset($_GET['confirm'])) {
    $id = $_GET['confirm'];
    $sql = "UPDATE people SET type='user' WHERE id='$id'";
    if (mysqli_query($connection, $sql)) {
        ?>
        <script>
            window.alert("کاربر با موفقیت ثبت شد");
            window.location.replace(",");
        </script>
        <?php
    }
    else {
        ?>
        <script>
            window.alert("<?php echo mysqli_error($connection); ?>");
            window.location.replace(".");
        </script>
        <?php
    }
}

// Reject Person
if (isset($_GET['reject'])) {
    $id = $_GET['reject'];
    $sql = "UPDATE people SET type='reject' WHERE id='$id'";
    if (mysqli_query($connection, $sql)) {
        ?>
        <script>
            window.alert("درخواست این کاربر قبول نشد");
            window.location.replace(".");
        </script>
        <?php
    }
    else {
        ?>
        <script>
            window.alert("<?php echo mysqli_error($connection); ?>");
            window.location.replace(".");
        </script>
        <?php
    }
}
    
?>
