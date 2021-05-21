<?php
    session_start();
    
    $errors = array();

    // MySQL Data
    $mysqlserver = "localhost";
    $mysqluser = "narbon";
    $mysqlpassword = "narbon";
    $mysqldatabase = "nartik";

    // Create Connection
    $connection = mysqli_connect($mysqlserver, $mysqluser, $mysqlpassword, $mysqldatabase);
    
    // LOGIN USER
    if (isset($_POST['login_user'])) {
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        
        if (empty($email)) {
            array_push($errors, "ایمیل الزامیست");
        }
        if (empty($password)) {
            array_push($errors, "رمز الزامیست");
        }

        if (count($errors) == 0) {
//            $password = md5($password);
            $query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
            $results = mysqli_query($connection, $query);

            if (mysqli_num_rows($results) == 1) {
                $_SESSION['status'] = true;
                $_SESSION['email'] = $email;
                $_SESSION["who"] = "support";
                $_SESSION['success'] = "You are now logged in";
                header('location: http://127.0.0.1/NarTik/people/support');
            }
            else {
                array_push($errors, "ایمیل با رمز اشتباه است");
            }
        }
    }

?>
