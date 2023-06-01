<?php

class LoginContr extends Login {

    private $username;
    private $psw;

    public function __construct($username, $psw) {

        $this->username = $username;
        $this->psw = $psw;
    }

    public function logUser() {
        if($this->emptyInput() == false) {
            // mesazhi "empty input!"
            header("location: ../signUp.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->username, $this->psw);
    }

    //me shti userin mi mush hapsirat

    private function emptyInput() {
        $result = true;
        if(empty($this->username) || empty($this->psw)) {
            $result = false;
        } else{
            $result = true;
        }
        return $result;
    }

}

