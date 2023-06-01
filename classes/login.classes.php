<?php

class Login extends Dbh {

    protected function getUser($username, $psw) {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE UName = ? OR UEmail = ?;');
        $array = [$username, $username];
        if (!$stmt->execute($array)) {
            $stmt = null;
            header("location: ../signUp.php?error=stmtfailed");
            exit();
        }
    
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../login.php?error=usernotfound");
            exit();
        }
    
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $pswHashed = $user[0]["UPassword"];
        $checkPsw = password_verify($psw, $pswHashed);
    
        if ($checkPsw == false) {
            $stmt = null;
            header("location: ../login.php?error=incorrectpassword");
            exit();
        } else {
            session_start();
            $_SESSION["Id"] = $user[0]["Id"];
            $_SESSION["UName"] = $user[0]["UName"];
            $_SESSION["UEmail"] = $user[0]["UEmail"];
            $_SESSION["IsAdmin"] = $user[0]["IsAdmin"];
        }
    
        $stmt = null;
    }

}
