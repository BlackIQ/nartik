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

    // Answer The Ticket
    if (isset($_POST["ans"])) {
        $answer = mysqli_escape_string($connection, $_POST["answer"]);
        $tikid = $_SESSION['tikid'];

        if (isset($answer)) {
            $doanswer = "UPDATE nartiks SET answer = '$answer' WHERE tikid = '$tikid'";
            if (mysqli_query($connection, $doanswer)) {
                ?>
                <script>
                    window.alert("به این تیکت جواب داده شد");
                    window.location.replace("http://<?php echo $serverip; ?>/NarTik/people/support");
                </script>
                <?php
            }
        }
    }

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
