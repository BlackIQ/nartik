<?php
session_start();

$prop = array();
$tik = array();
$ansary = array();
$send = array();
$com_tik = array();
$errors = array();

$company = $_SESSION["uid"];

// Nartik configuration
include("../../pack/configs/config.php");

if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "نام کاربری الزامیست");
    }
    if (empty($password)) {
        array_push($errors, "رمز ورود الزامیست");
    }

    if (count($errors) == 0) {
        if ($username == "admin" && $password == "admin") {
            $_SESSION['status'] = true;
            $_SESSION["who"] = "support";
            ?>
            <script>
                window.location.replace("index.php")
            </script>
            <?php
        } else {
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
    } else {
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

        $add_company = "INSERT INTO company (id, name) VALUES ('$id', '$company_name')";
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
    } else {
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
    } else {
        ?>
        <script>
            window.alert("<?php echo mysqli_error($connection); ?>");
            window.location.replace(".");
        </script>
        <?php
    }
}

?>
