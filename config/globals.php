<?php
    // Initial session
    session_start();

    // Global variable
    $BASE_URL = "http://" . $_SERVER["SERVER_NAME"] . dirname($_SERVER["REQUEST_URI"]."?") . "/";

?>