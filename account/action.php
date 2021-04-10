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

    $getip = "SELECT * FROM development";
    $res = mysqli_query($connection, $getip);

    while ($row = mysqli_fetch_assoc($res)) {
        $ip = $row['ip'];
    }
    
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
        
       if ($pass != $conpass) {
            array_push($errors, "The two passwords do not match");
        }

        // register user if there are no errors in the form
        if (count($errors) == 0) {
            $password = md5($pass);//encrypt the password before saving in the database
            $query = "INSERT INTO pending (firstname, lastnama, phone, email, password, company) VALUES ('$name', '$lastname', '$phone', '$email', '$password', '$company')";
            if (mysqli_query($connection, $query)) {
                $_SESSION['status'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['success'] = "You are now logged in";
                header('location: http://$ip/NarTik');
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
            array_push($errors, "Email is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }

        if (count($errors) == 0) {
//            $password = md5($password);
            $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
            $results = mysqli_query($connection, $query);

            if (mysqli_num_rows($results) == 1) {
                $_SESSION['status'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['success'] = "You are now logged in";
                header('location: http://$ip/NarTik');
            }
            else {
                array_push($errors, "Wrong username/password combination");
            }
        }
    }

?>
