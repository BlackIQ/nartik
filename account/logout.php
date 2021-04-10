<?php

session_start();

$ip = "127.0.0.1";

session_destroy();

header("Location: http://$ip/NarTik");