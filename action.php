<?php
    session_start();
    
    // variable declaration
    $username = "";
    $email    = "";
    $tik = array();
    $send = array();

    // MySQL Data
    $mysqlserver = "localhost";
    $mysqluser = "narbon";
    $mysqlpassword = "narbon";
    $mysqldatabase = "nartik";

    // Create Connection
    $connection = mysqli_connect($mysqlserver, $mysqluser, $mysqlpassword, $mysqldatabase);
    
    // Get data of ticket
    if (isset($_POST['sendtik'])) {
        $title = mysqli_real_escape_string($connection, $_POST["title"]);
        $text = mysqli_real_escape_string($connection, $_POST["text"]);
        
        if (empty($title)) {
            array_push($send, "موضوع تیکت الزامیست");
        }
        if (empty($text)) {
            array_push($send, "متن تیکت الزامیست");
        }
        
        if (count($send) == 0) {
            $dt = date("M , d , Y");
            $tikid = rand(1000, 9999);
            
            $query = "INSERT INTO tiks (userid, tikid, title, explane, company, dt, file, total, answer, status) VALUES ('$userid', '$tikid', '$title', '$text','$company', '$dt', 'file2', '4:00', 'ny', false)";
            if (mysqli_query($connection, $query)) {
                array_push($send, true);
                header('location: http://office.narbon.ir:4488/NarTik');
            }
            else {
                array_push($send, mysqli_error($connection));
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
        }
        else {
            array_push($tik, false);
        }
    }
    
?>
