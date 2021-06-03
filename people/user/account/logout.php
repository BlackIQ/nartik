<?php

include("../../../pack/config.php");

session_start();

session_destroy();

header("Location: http://$serverip/NarTik");