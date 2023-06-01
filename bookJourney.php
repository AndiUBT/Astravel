<?php 
include './Product.php';
session_start();

if (isset($_SESSION['IsAdmin'])) {
    // Check if the user is logged in
    if ($_SESSION['IsAdmin'] == 1) {
        // Check if the user is an admin
        header("location: bookJourneyAdmin.php");
        exit();
    } 
}
else {
    
    header("location: login.php");
    exit();
}
$products = Product::getAllProducts();


?>
<?php

$db = new Dbh();

if (isset($_POST['purchase'])) {
    $productId = $_POST['product_id'];
    
    $query = "SELECT count FROM products WHERE id = :productId";
    $stmt = $db->connect()->prepare($query);
    $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
    $stmt->execute();
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $currentCount = $row['count'];
    if ($currentCount == 0) {
        echo '<script>alert("There\'s no place for reservation, :(");</script>';
    } else {
        $newCount = $currentCount - 1;
        
        $updateQuery = "UPDATE products SET count = :newCount WHERE id = :productId";
        $stmt = $db->connect()->prepare($updateQuery);
        $stmt->bindParam(':newCount', $newCount, PDO::PARAM_INT);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->execute();
        
        echo '<script>alert("Ticket purchased successfully!");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bookJourney.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Book Your Journey</title>
</head>
<body>
    <div class="start">
    <ul id="navbar">
        <li id="logoli"> <a href="index.php"><img src="images/Logo.png" id="logo"></a></li>
        <li><a href="bookJourney.php">Book your journey</a></li>
        <li><a href="contactUs.php">Contact us</a></li>
        <li id="rightnavel"><a href="logout.php?logout">Logout</a></li>
    </ul>
        <h1 class="titleMain">Lorem Ipsum</h1>
        <p class="descMain">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio temporibus pariatur praesentium cum facere consequatur quod distinctio hic adipisci eaque nam velit ducimus, vitae natus cumque possimus voluptatibus tenetur dignissimos! lore</p>
    </div>   

        <div class="container2">
            <div class="informator">
                <h1>REACH FOR THE STARS</h1>
                <p>Earth is a place filled with mistery, but space is even more so. The journey you will be taking will not only leave you amazed at the sights, but it will also leave you astonished at what humanity is capable of doing.</p>
            </div>
            <div class="imageSide">
                <img src="images/solar-system.png">
            </div>
        </div> 

        <div class="container3">
    <?php foreach ($products as $product): ?>
        <div class="con3check">
            <div class="ttl">
                <h1><?php echo $product->title; ?></h1>
            </div>
            <div class="dsc">
                <p><?php echo $product->description; ?></p>
            </div>
            <div class="lst">
                <ul class="offersOf">
                    <li>Tasty & Nutritious food</li>
                    <li>Comfortable residence</li>
                    <li>Infinite access to anything desired</li>
                    <li>Unlimited internet connection</li>
                    <li>Medical assistance for any injuries</li>
                    <li>Cool views</li>
                </ul>
            </div>
            <div class="buy">
                <div class="prc">
                    <h2>$<?php echo $product->price; ?></h2>
                </div>
                    <form class="purchase-form" method="POST" action="bookJourney.php">
                        <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
                        <div class="prcBtn">

                        <button type="submit" class="purchase" id="purchase" name="purchase">Purchase ticket</button>
                        </div>

                    </form>
            </div>
            <div class="final">
                <p>The ticket will appear in your shopping cart.</p>
            </div>
        </div>
    <?php endforeach; ?>
    </div>

    <div class="ratings">
        <h1>Having issues?</h1> 
        <p>Contact us here for any issues, information or feedback and we will be sure to reply as soon as possible.</p>
        <a href="contactUs.php"><button class="contactBtn" href="contactUs.php">Contact us now</button></a>
    </div>

    <div class="container1"> 
        <img class="mainImg" src="images/CupolaFinal.jpg"> 
    </div>

    <footer>
        <div class="footer">
        <div class="row">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
        <a href="#"><i class="fa fa-youtube"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        </div>
        
        <div class="row">
        <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="contactUs.php">Contact us</a></li>
        <li><a href="#">Terms & Conditions</a></li>
        <li><a href="login.php">Log in</a></li>
        </ul>
        </div>
        
        <div class="row">
        Astravel Copyright © 2023 UBT - All rights reserved 
        </div>
        </div>
        </footer>
    
    
</body>

<script>
    document.getElementById("purchase-form").addEventListener("submit", function(e) {
        e.preventDefault();
        fetch(this.action, {
            method: this.method,
            body: new FormData(this)
        });
    });
</script>
</html>

