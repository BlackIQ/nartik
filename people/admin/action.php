<?php
    session_start();
    
    $tik = array();

    // MySQL Data
    include("../../pack/config.php");
    $mysqlserver = "localhost";
    $mysqluser = $dbuser;
    $mysqlpassword = $dbpassword;
    $mysqldatabase = $dbname;

    // Create Connection
    $connection = mysqli_connect($mysqlserver, $mysqluser, $mysqlpassword, $mysqldatabase);
    
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
        }
        else {
            array_push($tik, false);
        }
    }
    
?>
