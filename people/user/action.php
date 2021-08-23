<?php
session_start();

$tik = array();
$send = array();
$errors = array();
$profile = array();

// Nartik configuration
include("../../pack/config.php");

$userid = $_SESSION['id'];

$gd = "SELECT * FROM people WHERE type='user' AND id='$userid'";
$res_gd = mysqli_query($connection, $gd);
$row_gd = mysqli_fetch_assoc($res_gd);
$company_id = $row_gd["company"];

if (isset($_POST['reg_user'])) {
    $name = mysqli_real_escape_string($connection, $_POST['fname']);
    $lastname = mysqli_real_escape_string($connection, $_POST['lname']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $pass = mysqli_real_escape_string($connection, $_POST['pass']);
    $conpass = mysqli_real_escape_string($connection, $_POST['conpass']);
    $company = mysqli_real_escape_string($connection, $_POST['company']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $id = mysqli_real_escape_string($connection, $_POST['id']);

    if (empty($name)) {
        array_push($errors, "نام الزامیست");
    }
    if (empty($lastname)) {
        array_push($errors, "نام خانوادگی الزامیست");
    }
    if (empty($phone)) {
        array_push($errors, "شماره همراه الزامیست");
    }
    if (empty($email)) {
        array_push($errors, "ایمیل الزامیست");
    }
    if (empty($username)) {
        array_push($errors, "نام کاربری الزامیست");
    }
    if (empty($id)) {
        array_push($errors, "شماره ملی الزامیست");
    }
    if (empty($pass)) {
        array_push($errors, "رمز الزامیست");
    }
    if (empty($conpass)) {
        array_push($errors, "تایید رمز الزامیست");
    }
    if (empty($company)) {
        array_push($errors, "لطفا یک شرکت را انتخاب کنید");
    }

    if ($pass != $conpass) {
        array_push($errors, "رمز ها با هم تفاوت دارند");
    }

    if (count($errors) == 0) {
        $dt = date("M , d , Y");

        $query = "INSERT INTO people (id, firstname, lastname, phone, email, username, dt, company, password, type) VALUES ('$id', '$name', '$lastname', '$phone', '$email', '$username', '$dt', '$company', '$pass', 'pending')";
        if (mysqli_query($connection, $query)) {
            ?>
            <script>
                window.alert("درخواست شما با موفقیت ثبت شد");
                window.location.replace(".")
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

if (isset($_POST['login_user'])) {
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    if (empty($id)) {
        array_push($errors, "لطفا کد ملی را وارد کنید");
    }
    if (empty($password)) {
        array_push($errors, "لطفا رمز را وارد کنید");
    }

    if (count($errors) == 0) {
        $query = "SELECT * FROM people WHERE type='user' AND id='$id' AND password='$password'";
        $results = mysqli_query($connection, $query);

        if (mysqli_num_rows($results) == 1) {
            $_SESSION['status'] = true;
            $_SESSION['who'] = "user";
            $_SESSION['id'] = $id;
            ?>
            <script>
                window.location.replace(".")
            </script>
            <?php
        } else {
            ?>
            <script>
                window.alert("کد ملی یا رمز عبور اشتباه است");
                window.location.replace(".");
            </script>
            <?php
        }
    }
}

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

        $dlh = date("H") + 2;

        $dt = date("M d, Y H:i:s");
        $dl = date("M d, Y $dlh:i:s");

        $tikid = rand(1000, 9999);

        $query = "INSERT INTO tiks (userid, tikid, title, explane, company, dt, file, answer, status) VALUES ('$userid', '$tikid', '$title', '$text','$company_id', '$dt', 'file', 'ny', false)";
        if (mysqli_query($connection, $query)) {
            ?>
            <script>
                window.alert("تیکت شما با موفقیت ارسال شد");
                window.location.replace(".")
            </script>
            <?php
        } else {
            ?>
            <script>
                window.alert("<?php echo mysqli_error($connection); ?>");
                window.location.replace(".")
            </script>
            <?php
        }
    }

}

// Get ticket data
if (isset($_GET['ticket'])) {
    $id = $_GET['ticket'];
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

// Update Password
if (isset($_POST['upass'])) {
    $newpass = mysqli_real_escape_string($connection, $_POST["newpass"]);
    $conpass = mysqli_real_escape_string($connection, $_POST["conpass"]);
    $curpass = mysqli_real_escape_string($connection, $_POST["curpass"]);

    if ($password == $curpass) {
        if ($newpass == $conpass) {
            $updatepassword = "UPDATE people SET password='$newpass' WHERE id='$userid'";

            if (mysqli_query($connection, $updatepassword)) {
                ?>
                <script>
                    window.alert("رمز شما با موفقیت تغییر کرد");
                    window.location.replace(".")
                </script>
                <?php
            } else {
                ?>
                <script>
                    window.alert("<?php echo mysqli_error($connection); ?>");
                    window.location.replace(".")
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                window.alert("رمز جدید با تایید رمز تفاوت دارد");
                window.location.replace(".")
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            window.alert("رمز کنونی با رمز شما متفاوت است");
            window.location.replace(".")
        </script>
        <?php
    }
}

// Update username
if (isset($_POST["usernameupdate"])) {
    $n_username = mysqli_real_escape_string($connection, $_POST["username"]);

    if (isset($n_username)) {
        $u_username = "UPDATE people SET username='$n_username' WHERE id='$userid'";

        if (mysqli_query($connection, $u_username)) {
            ?>
            <script>
                window.alert("نام کاربری با موفقیت تغییر کرد");
                window.location.replace(".")
            </script>
            <?php
        } else {
            ?>
            <script>
                window.alert("<?php echo mysqli_error($connection); ?>");
                window.location.replace(".")
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            window.alert("نام کاربری را وارد کنید");
            window.location.replace(".")
        </script>
        <?php
    }
}

// Update phone
if (isset($_POST["phoneupdate"])) {
    $n_phone = mysqli_real_escape_string($connection, $_POST["phone"]);

    if (isset($n_phone)) {
        $u_phone = "UPDATE people SET phone='$n_phone' WHERE id='$userid'";

        if (mysqli_query($connection, $u_phone)) {
            ?>
            <script>
                window.alert("شماره تلفن با موفقیت تغییر کرد");
                window.location.replace(".")
            </script>
            <?php
        } else {
            ?>
            <script>
                window.alert("<?php echo mysqli_error($connection); ?>");
                window.location.replace(".")
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            window.alert("شماره تلفن را وارد کنید");
            window.location.replace(".")
        </script>
        <?php
    }
}

// Update email
if (isset($_POST["emailupdate"])) {
    $n_email = mysqli_real_escape_string($connection, $_POST["mail"]);

    if (isset($n_email)) {
        $u_email = "UPDATE people SET email='$n_email' WHERE id='$userid'";

        if (mysqli_query($connection, $u_email)) {
            ?>
            <script>
                window.alert("ایمیل شما با موفقیت تغییر کرد");
                window.location.replace(".")
            </script>
            <?php
        } else {
            ?>
            <script>
                window.alert("<?php echo mysqli_error($connection); ?>");
                window.location.replace(".")
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            window.alert("ایمیل را وارد کنید");
            window.location.replace(".")
        </script>
        <?php
    }
}

?>
