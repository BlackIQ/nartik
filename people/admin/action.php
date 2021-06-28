<?php
    session_start();
    
    $tik = array();

    // MySQL Data
    include("../../../pack/config.php");
    $mysqlserver = $ip;
    $mysqluser = "narbon";
    $mysqlpassword = "narbon";
    $mysqldatabase = "nartik";

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

    // Add company
    if (isset($_POST["addcompany"])) {
        $company_name = mysqli_escape_string($connection, $_POST["company"]);
        $eid = mysqli_escape_string($connection, $_POST["eid"]);
        $password = mysqli_escape_string($connection, $_POST["password"]);

        if (isset($company_name)) {
            $uid = rand(111, 999);

            $add_company = "INSERT INTO admin (id, password, company, uid) VALUES ('$eid', '$password', '$company_name', '$uid')";
            if (mysqli_query($connection, $add_company)) {
                ?>
                <script>
                    window.alert("شرکت اضافه شد");
                    window.location.replace(".");
                </script>
                <?php
            }
            else {
                ?>
                <script>
                    window.alert("<?php echo mysqli_error($connection); ?>");
                    window.location.replace(".");
                </script>
                <?php
            }
        }
    }
    
?>
