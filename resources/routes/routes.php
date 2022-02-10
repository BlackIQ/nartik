<?php

include('../config/config.php');

$errors = array();

if (isset($_GET['logout'])) {
    session_destroy();
    header('location:' . $path);
}