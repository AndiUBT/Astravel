
<?php 
include './Product.php';
session_start();
$user_id = $_SESSION['Id'];
if(!isset($_SESSION['Id'])){
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
        <li><a href="bookJourneyAdmin.php">Book your journey</a></li>
        <li><a href="contactUs.php">Contact us</a></li>
        <li id="rightnavel"><a href="logout.php?logout">Logout</a></li>
        <li><a href="admin.php">Insights</a></li>
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
        <h1>Ratings & Reviews</h1> 
    </div>

    <div class="container4">
        <div class="aveMsg"> 
            <div class="averageRat">
                <div class="star">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                    </svg>
                </div>
                <div class="starAverage">
                    4.6
                </div>
            </div>
            <div class="commentRating">
                <div class="nameDateStars">
                    <div class="name">
                        <h3>John Doe</h3>
                    </div>
                    <div class="date">
                        <p>1/31/2023</p>
                    </div>  
                    <div class="stars">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>  
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>  
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>  
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>  
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>  
                        </svg>
                    </div>
                </div>
                <div class="userMsg">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda possimus corrupti odit eveniet, fugiat, numquam delectus quidem minima iusto laboriosam nisi tempora. Ipsa repellendus quaerat sapiente laudantium nisi repellat tempore, neque temporibus quae. Eligendi deserunt ipsa voluptas iure numquam laboriosam officia totam harum doloremque ex, eaque sunt at magnam quis ratione delectus? Quod iusto, laudantium numquam maiores est hic asperiores quis quibusdam delectus facere natus laborum repellendus dolorum nisi aliquam?
                    </p>
                </div>
            </div>
            <div class="nextBtn">
                <button class="nextComment">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                        <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                    </svg>
                </button>
            </div>
        </div>
        <div class="rate">
            <h1>Have you visited space? If so please give your experience a review, it will help us out a lot!</h1>
        </div>
        <div class="rateStars">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>  
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>  
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>  
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>  
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>  
            </svg>
        </div>
        <form>
            <textarea placeholder="Your review here"></textarea>
        </form>
        <div class="sbmBtn">
            <button id="submitBtn">Submit</button>
        </div>
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
        <li><a href="#">Book a Journey</a></li>
        <li><a href="#">Visit shop</a></li>
        <li><a href="#">Contact us</a></li>
        <li><a href="#">Terms & Conditions</a></li>
        <li><a href="#">Log in</a></li>
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