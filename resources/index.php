<?php

session_start();

if ($_SESSION['status'] == true) {
    $who = $_SESSION['who'];
    ?>
    <script>
        window.location.replace("../people/<?php echo $who; ?>");
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