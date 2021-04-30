<?php
    session_start();
    
    // variable declaration
    $username = "";
    $email    = "";
    $errors = array();
    $_SESSION['success'] = "";

    // MySQL Data
    $mysqlserver = "localhost";
    $mysqluser = "narbon";
    $mysqlpassword = "narbon";
    $mysqldatabase = "nartik";

    // Create Connection
    $connection = mysqli_connect($mysqlserver, $mysqluser, $mysqlpassword, $mysqldatabase);
    
    // REGISTER USER
    if (isset($_POST['reg_user'])) {
        // receive all input values from the form
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
            array_push($errors, "The two passwords do not match");
        }

        // register user if there are no errors in the form
        if (count($errors) == 0) {
//            $password = md5($pass); // encrypt the password before saving in the database
            $query = "INSERT INTO people (id, firstname, lastname, phone, email, username, dt, company, password, type) VALUES ('$id', '$name', '$lastname', '$phone', '$email', '$username', 'Date and Time', '$company', '$pass', 'pending')";
            if (mysqli_query($connection, $query)) {
                header('location: http://office.narbon.ir:4488/NarTik');
            }
            else {
                array_push($errors, mysqli_error($connection));
            }
        }

    }

    // ...

    // LOGIN USER
    if (isset($_POST['login_user'])) {
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        
        if (empty($email)) {
            array_push($errors, "لطفا ایمیل را وارد کنید");
        }
        if (empty($password)) {
            array_push($errors, "لطفا رمز را وارد کنید");
        }

        if (count($errors) == 0) {
//            $password = md5($password);
            $query = "SELECT * FROM people WHERE type='user' AND email='$email' AND password='$password'";
            $results = mysqli_query($connection, $query);

            if (mysqli_num_rows($results) == 1) {
                $_SESSION['status'] = true;
                $_SESSION['id'] = $email;
                $_SESSION['directory'] = 'nartik';
                header('location: http://office.narbon.ir:4488/NarTik');
            }
            else {
                array_push($errors, "ایمیل یا رمز عبور درست نیست. لطفادوباره امتحان کنید");
            }
        }
    }

?>
