<?php
    session_start();
    
    // variable declaration
    $errors = array();

    // MySQL Data
    include("../../../pack/config.php");
    $mysqlserver = "localhost";
    $mysqluser = $dbuser;
    $mysqlpassword = $dbpassword;
    $mysqldatabase = $dbname;

    // Create Connection
    $connection = mysqli_connect($mysqlserver, $mysqluser, $mysqlpassword, $mysqldatabase);
    
    function sendpending ($user) {
        echo 'This is a function for $user';
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

        // register user if there are no errors in the form
        if (count($errors) == 0) {
//            $password = md5($pass); // encrypt the password before saving in the database
            $dt = date("M , d , Y");
            
            $select_company = "SELECT * FROM company WHERE id = '$company'";
            $rescompany = mysqli_query($connection, $select_company);
            
            if (mysqli_num_rows($rescompany) == 1) {
                $row = mysqli_fetch_assoc($rescompany);
                
                $company_name = $row["name"];
                $uid = $row['uid'];
            }
            
            $query = "INSERT INTO people (id, firstname, lastname, phone, email, username, dt, company, uid, password, type) VALUES ('$id', '$name', '$lastname', '$phone', '$email', '$username', '$dt', '$company_name', '$uid', '$pass', 'pending')";
            if (mysqli_query($connection, $query)) {
                ?>
                    <script>
                        window.alert("درخواست شما با موفقیت ثبت شد");
                        window.location.replace("http://<?php echo $serverip; ?>/NarTik/people/user/account");
                    </script>
                <?php
            }
            else {
                ?>
                    <script>
                        window.alert("<?php echo mysqli_error($connection); ?>");
                        window.location.replace("http://<?php echo $serverip; ?>/NarTik/people/user/account");
                    </script>
                <?php
            }
        }
    }

    // ...

    // LOGIN USER
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
//            $password = md5($password);
            $query = "SELECT * FROM people WHERE type='user' AND id='$id' AND password='$password'";
            $results = mysqli_query($connection, $query);

            if (mysqli_num_rows($results) == 1) {
                $_SESSION['status'] = true;
                $_SESSION['who'] = "user";
                $_SESSION['id'] = $id;
                $_SESSION['directory'] = 'nartik';
                ?>
                    <script>
                        window.location.replace("http://<?php echo $serverip; ?>/NarTik/people/user");
                    </script>
                <?php
            }
            else {
                ?>
                    <script>
                        window.alert("کد ملی یا رمز عبور اشتباه است");
                        window.location.replace("http://<?php echo $serverip; ?>/NarTik/people/user/account");
                    </script>
                <?php
            }
        }
    }

?>
