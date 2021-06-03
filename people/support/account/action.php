<?php
    session_start();
    
    $errors = array();

    // MySQL Data
    include("../../../pack/config.php");
    $mysqlserver = "localhost";
    $mysqluser = $dbuser;
    $mysqlpassword = $dbpassword;
    $mysqldatabase = $dbname;

    // Create Connection
    $connection = mysqli_connect($mysqlserver, $mysqluser, $mysqlpassword, $mysqldatabase);
    
    // LOGIN USER
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
//            $password = md5($password);
            
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
                header("location: http://$serverip/NarTik/people/support");
            }
            else {
                array_push($errors, "ایمیل با رمز اشتباه است");
            }
        }
    }

?>
