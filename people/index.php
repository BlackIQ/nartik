<?php

session_start();

include("../pack/config.php");

if ($_SESSION['status'] == true) {
    $who = $_SESSION['who'];
    ?>
    <script>
        window.location.replace("<?php echo $who; ?>");
    </script>
    <?php
}
else {
    ?>
    <script>
        window.location.replace("../");
    </script>
    <?php
}

?>