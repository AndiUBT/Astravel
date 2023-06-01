<?php

session_start();

if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION["Id"]);
    unset($_SESSION["UName"]);
    unset($_SESSION["UEmail"]);
    unset($_SESSION["UPassword"]);
    unset($_SESSION["IsAdmin"]);
    header("location: login.php");
    exit();
}

