<?php

// Create connection
$connection = mysqli_connect('localhost', 'amir', 'amir', 'nartik');

// Site
$path = 'http://' . $_SERVER['HTTP_HOST'] . '/nartik';