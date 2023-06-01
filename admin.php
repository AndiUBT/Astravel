<?php 
session_start();
$user_id = $_SESSION['IsAdmin'];
if ($_SESSION['IsAdmin'] == 0) {
    header("location: index.php");
    exit();
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css"> 
    <title>Admin Page</title>
</head>
<body>
    <div class="container">
        <div class="users">
    
    <?php
    include "./Users.php";
    // include "./Product.php";
    $users = new Users();
    // $products = new Product();
    
    $allUsers = $users->getAllUsers();

    $printedAdminsHeader = false;

// Close the connection
$conn = null;

    foreach ($allUsers as $user) {
        if ($user['IsAdmin'] == 0) {
            if (!$printedAdminsHeader) {
                echo '<h1>Users</h1>';
                $printedAdminsHeader = true;
            }
            echo '<p>';
            echo '<span>ID: </span>' . $user['Id'] . '<br>';
            echo '<span>Name: </span>' . $user['UName'] . '<br>';
            echo '<span>Email: </span>' . $user['UEmail'] . '<br>';
            echo '<span>Password: </span>' . $user['UPassword'] . '<br>';
            echo '</p>';
        }
    }
    

$printedAdminsHeader = false;

foreach ($allUsers as $user){

    if($user['IsAdmin'] == 1){

        if (!$printedAdminsHeader){
            echo '<h1>Admins</h1>';
            $printedAdminsHeader = true;
        }

    echo '<p>';
    echo '<span>ID: </span>' . $user['Id'] . '<br>';
    echo '<span>Name: </span>' . $user['UName'] . '<br>';
    echo '<span>Email: </span>' . $user['UEmail'] . '<br>';
    echo '<span>Password: </span>' . $user['UPassword'] . '<br>';
    echo '</p>';

    }
}

echo '<h1> Availability of Tickets </h1>';

$dbh = new Dbh();

$conn = $dbh->connect();

$sql = "SELECT title, count FROM products";
$result = $conn->query($sql);

if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

        $title = $row["title"];
        $count = $row["count"];

        echo '<h2>'. $title; 
        echo '</h2>';
        echo '<p>';
        echo "Remaining tickets: " . $count ;
        echo '</p>';
        echo "<br>";
    }
} else {
    echo "No results found.";
}
?>
</div>
<div class="crud">
<div class="create">
<h1>Create User</h1>

    <form action="create_user.php" method="post" class="createForm">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <br>
        <input type="submit" value="Create User" class="kisheButona1">
    </form>
</div>
<div class="update">
    <h1>Convert user to admin</h1>
    <form method="POST" action="update_user.php" class="updateForm">

    <label for="name">Id:</label>
  <input type="text" id="id" name="id">
  <br>
  <input type="submit" value="Update User" class="kisheButona2">
</form>
</div>

<div class="delete">
    <h1>Delete User</h1>
    <form method="POST" action="delete_user.php" class="deleteForm">

    <label for="name">Id:</label>
  <input type="text" id="id" name="id">
  <br>
  <input type="submit" value="Delete User" class="kisheButona3">
</form>
</div>
</div>
</body>
</html>
