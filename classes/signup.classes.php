<?php

class Signup extends Dbh{

protected function setUser($username, $psw, $email){

    $stmt = $this->connect()->prepare('INSERT INTO users (UName, UPassword, UEmail) VALUES (?,?,?);');

    $hashedPwd = password_hash($psw, PASSWORD_DEFAULT);

    if(!$stmt->execute(array($username, $hashedPwd, $email))){
        $stmt = null;
        header("location: ../signUp.php?error=stmtfailed");
        exit();
    }
    $stmt = null;
}

protected function checkUser($username, $email){

    $stmt = $this->connect()->prepare('SELECT UName FROM users WHERE UName = ? OR UEmail = ?;');

    if(!$stmt->execute(array($username, $email))){
        $stmt = null;
        header("location: ../signUp.php?error=stmtfailed");
        exit();
    }

    $resultCheck = true;

    if($stmt->rowCount() > 0){
        $resultCheck = false;
    }
    else{
        $resultCheck = true;
    }
    return $resultCheck;

}

}



