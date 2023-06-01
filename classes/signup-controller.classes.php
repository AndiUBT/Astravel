<?php

class SignupContr extends Signup {

    private $username;
    private $email;
    private $psw;
    private $pswrepeat;

    public function __construct($username, $email, $psw, $pswrepeat) {

        $this->username = $username;
        $this->email = $email;
        $this->psw = $psw;
        $this->pswrepeat = $pswrepeat;
    }

    public function signUpUser() {
        if($this->emptyInput() == false) {
            // mesazhi "empty input!"
            header("location: ../signUp.php?error=emptyinput");
            exit();
        }
        if($this->invalidUsername() == false) {
            // mesazhi "invalid username"
            header("location: ../signUp.php?error=username");
            exit();
        }
        if($this->invalidEmail() == false) {
            // mesazhi "invalid email"
            header("location: ../signUp.php?error=email");
            exit();
        }
        if($this->pswMatch() == false) {
            // mesazhi "password does not match"
            header("location: ../signUp.php?error=passwordmatch");
            exit();
        }
        if($this->usernameTakenCheck() == false) {
            // mesazhi "Username or email is taken"
            header("location: ../signUp.php?error=useremailtaken");
            exit();
        }

        $this->setUser($this->username, $this->psw, $this->email);
    }

    //me shti userin mi mush hapsirat

    private function emptyInput() {
        $result = true;
        if(empty($this->username) || empty($this->email) || empty($this->psw) || empty($this->pswrepeat)) {
            $result = false;
        } else{
            $result = true;
        }
        return $result;
    }

    //me kqyr mos je tu perdor shkronja palidhje n'emer

    private function invalidUsername() {
        $result = true;
        if(!preg_match("/^[a-zA-Z0-9]*$/" , $this->username)){
            $result = false;
        } else{
            $result = true;
        }
        return $result;
    }

    //me kqyr a je tu e shenu mir emailin

    private function invalidEmail() {
        $result = true;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        } else{
            $result = true;
        }
        return $result;
    }

    //me kqyr paswordi a esht e njejt me pswrepeat 

    private function pswMatch() {
        $result = true;
        if($this->psw !== $this->pswrepeat){
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    } 

    private function usernameTakenCheck() {
        $result = true;
        if(!$this->checkUser($this->username, $this->email)){
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    } 
}

