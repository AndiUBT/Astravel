<?php
include "./Users.php";

$users = new Users();

$id = $_POST['id'];

$users->deleteUser($id);

header('Location: admin.php');
exit;
?>
