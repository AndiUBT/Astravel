<?php
include "./Users.php";

$users = new Users();

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
$users->createUser($username, $email, $hashedPwd);

header('Location: admin.php');
exit;
?>
