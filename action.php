<?php
    session_start();
    
    $tik = array();
    $send = array();
    $profile = array();

    // MySQL Data
    $mysqlserver = "localhost";
    $mysqluser = "narbon";
    $mysqlpassword = "narbon";
    $mysqldatabase = "nartik";

    // Create Connection
    $connection = mysqli_connect($mysqlserver, $mysqluser, $mysqlpassword, $mysqldatabase);

    $id = $_SESSION['id'];

    $getdata = "SELECT * FROM people WHERE type='user' AND id='$id'";
    $ressult = mysqli_query($connection, $getdata);

    if (mysqli_num_rows($ressult) > 0) {
        while ($row = mysqli_fetch_assoc($ressult)) {
            $fname = $row['firstname'];
            $lname = $row['lastname'];
            $phone = $row['phone'];
            $email = $row['email'];
            $username = $row['username'];
            $password = $row["password"];
            $userid = $row['id'];
            $company = $row['company'];
        }
    }

    // Get data of ticket
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
            
            $query = "INSERT INTO tiks (userid, tikid, title, explane, company, dt, dl, file, total, answer, status) VALUES ('$userid', '$tikid', '$title', '$text','$company', '$dt', '$dl','file', '4:00', 'ny', false)";
            if (mysqli_query($connection, $query)) {
                ?>
                    <script>
                        window.alert("تیکت شما با موفقیت ارسال شد");
                        window.location.replace("http://office.narbon.ir:4488/NarTik");
                    </script>
                <?php
            }
            else {
                ?>
                    <script>
                        window.alert("<?php echo mysqli_error($connection); ?>");
                        window.location.replace("http://office.narbon.ir:4488/NarTik");
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
        }
        else {
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
                            window.location.replace("http://office.narbon.ir:4488/NarTik");
                        </script>
                    <?php
                }
                else {
                    ?>
                        <script>
                            window.alert("<?php echo mysqli_error($connection); ?>");
                            window.location.replace("http://office.narbon.ir:4488/NarTik");
                        </script>
                    <?php
                }
            }
            else {
                ?>
                    <script>
                        window.alert("رمز جدید با تایید رمز تفاوت دارد");
                        window.location.replace("http://office.narbon.ir:4488/NarTik");
                    </script>
                <?php
            }
        }
        else {
            ?>
                <script>
                    window.alert("رمز کنونی با رمز شما متفاوت است");
                    window.location.replace("http://office.narbon.ir:4488/NarTik");
                </script>
            <?php
        }
    }
    
    // Get profile data

    
?>
