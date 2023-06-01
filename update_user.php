<?php 
include "./Users.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_POST['id'];
  
  $users = new Users();
  $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
  $users->changeAuthorization($id);
  header('Location: admin.php');
  exit;
}
?>