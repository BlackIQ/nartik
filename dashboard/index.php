<?php

if ($_SESSION['status'] == true) {
    echo $_SESSION['username'];
}
else {
    header("Location: http://192.168.1.6/NarTik");
}

?>