<?php

if(isset($_POST["submit"])){
    
    //mi marr te dhenat
    $username = $_POST['username'];
    $email = $_POST['email'];
    $psw = $_POST['psw'];
    $pswrepeat = $_POST['pswrepeat'];

    //controlleri per signup (klase)

    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-controller.classes.php";

    $signup = new SignupContr($username, $email, $psw, $pswrepeat);

    //kapsit e errorave dhe user signup

    $signup->signUpUser();

    // mu kthy ne front page

    header("location: ../index.php?error=none");

}