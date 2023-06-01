<?php

if(isset($_POST["submit"])){
    
    //mi marr te dhenat
    $username = $_POST['username'];
    $psw = $_POST['password'];

    //controlleri per login (klase)

    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-controller.classes.php";

    $login = new LoginContr($username, $psw);

    //kapsit e errorave dhe user signup

    $login->logUser();

    // mu kthy ne front page

    header("location: ../index.php");

}