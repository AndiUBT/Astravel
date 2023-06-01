<?php 
include "./classes/dbh.classes.php";
class Users extends Dbh {
    
    public function createUser($name, $email, $password) {
        $conn = $this->connect();
        $stmt = $conn->prepare("INSERT INTO users (UName, UEmail, UPassword) VALUES (:name, :email, :password)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
    }
    
    public function getUser($id) {
        $conn = $this->connect();
        $stmt = $conn->prepare("SELECT * FROM users WHERE Id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    public function getAllUsers(){
        $conn = $this-> connect();
        $stmt = $conn -> prepare("SELECT * FROM users");
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;

    }
    public function updateUser($id, $name, $email, $password) {
        $conn = $this->connect();
        $stmt = $conn->prepare("UPDATE users SET UName=:name, UEmail=:email, UPassword=:password WHERE Id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
    }
    
    public function changeAuthorization($id){
        $conn = $this -> connect();
        $stmt = $conn -> prepare("UPDATE users SET IsAdmin = 1 WHERE Id =:id");
        $stmt -> bindParam(':id', $id);
        $stmt -> execute();
    }

    public function deleteUser($id) {
    $conn = $this->connect();
    $stmt = $conn->prepare("DELETE FROM users WHERE Id=:id AND IsAdmin = 0");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}
}

?>