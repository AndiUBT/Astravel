<?php 

session_start();

if (isset($_SESSION['IsAdmin'])) {
    // Check if the user is logged in
    if ($_SESSION['IsAdmin'] == 1) {
        // Check if the user is an admin
        header("location: indexAdmin.php");
        exit();
    }
}
 else {
    // Redirect the user to the login page
    header("location: login.php");
    exit();
}

$sql = "SELECT * FROM users";

?>



<!-- color pallete: https://colorhunt.co/palette/16213e0f3460533483e94560 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astravel</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

    <ul id="navbar">
        
        <li id="logoli"> <a href="index.php"><img src="images/Logo.png" id="logo"></a></li>
        <li><a href="bookJourney.php">Book your journey</a></li>
        <li><a href="contactUs.php">Contact us</a></li>
        <li id="rightnavel"><a href="logout.php?logout">Logout</a></li>
    </ul>

    <div class="container1"> 
        <div class="con1con1">
            <h1 id="header1"> Explore beyond the limitations with <b><span id="header">Astravel</span></b> </h1>
            <h3 id="header3"> Experience the wonders beyond earth with the very first commercial space travel agency. We promise safe, relaxing, enjoyable travels... and stunning views that are "priceless" according our very own costumers.</h3>
        </div>

        <div class="earthRimage">
            <img id="earthHigh" src="images/EarthHighRes.jpg">   
        </div>
    </div>

    <h1 class="header1">Whats happening currently</h1>
    <div class="container2">
        <div class="main-info" id="mainInfo" onmouseover="readMore()" onmouseout="readLess()">
            <h2 class="main-info-t">Minotaur Nine: The countdown has begun</h2>
            <p class="main-info-p">
                Watch live: countdown of the 
                Minotaur nine launch has  <span id="dots">...</span><span id="more">
                begun "History once again: We are bringing 
                the first motorcycle to space"  </span>
            </p>
            <button id="readMoreBtn">Read more about this</button>
        </div>
        <div class="main-small-info">
            <div class="north-info">
                <div class="sinfo1" onmouseover="readMoreSinfoOne()" onmouseout="readLessSinfoOne()">
                    <h2 class="main-info-t-sinfoOne">Meet Ground Control</h2>
                    <p class="main-info-p-sinfoOne">
                    Meet Astravel's main Ground Control
                    <span id="dots-sinfoOne">...</span><span id="more-sinfoOne">
                    Team, Albin Dana: "Coffee is the greatest fuel" he says.
                    </span>
                    </p>    
                    <button id="sinfoOneBtn">Read more</button>
                </div>
                <div class="sinfo2" onmouseover="readMoreSinfoTwo()" onmouseout="readLessSinfoTwo()">
                    <h2 class="main-info-t-sinfoTwo">Two World Records</h2>
                    <p class="main-info-p-sinfoTwo">
                    Astravel residents break two World
                    <span id="dots-sinfoTwo">...</span><span id="more-sinfoTwo">
                    Records at a time... longest time a man has stayed in space 
                    and most people breaking a World Record at the same time.
                    </span>
                    </p>    
                    <button id="sinfoTwoBtn">Read more</button>
                </div>
            </div>
            <div class="south-info">
                <div class="sinfo3" onmouseover="readMoreSinfoThree()" onmouseout="readLessSinfoThree()">
                    <h2 class="main-info-t-sinfoThree">First Contact?</h2>
                    <p class="main-info-p-sinfoThree">
                    Astravel's satellites picked up a very
                    <span id="dots-sinfoThree">...</span><span id="more-sinfoThree">
                    interesting signal 40 lightyears away, suggesting
                    that we may not be alone. Elon Musk: "Seems Fermi was just impatient..."
                    </span>
                    </p>    
                    <button id="sinfoThreeBtn">Read more</button>
                </div>
                <div class="sinfo4" onmouseover="readMoreSinfoFour()" onmouseout="readLessSinfoFour()">
                    <h2 class="main-info-t-sinfoFour">They make their own food now</h2>
                    <p class="main-info-p-sinfoFour">
                    Astravel's 400th successful launch streak last 
                    <span id="dots-sinfoFour">...</span><span id="more-sinfoFour"> 
                    year marked a big stepping stone in space travel... that it has become easy!  
                    </span>
                    </p>    
                    <button id="sinfoFourBtn">Read more</button>
                </div>
            </div>
        </div>
    </div>
    <p class="subscription"> Want to get notified? <a class="subs" href="">Subscribe</a> your email now and get updated on everything that happens</p>

    <div class="container3">
        <div class="con3left">
            <h1>Join us</h1>
            <p class="entry"> Astravel is responsible for the creation of
                civilisations, but no more than you are, for
                without you we are only fuel and fuselages. Join us and become
                the next stepstone for humanity.
            </p>
            <p class="entryHelp">
                If you are serious about taking part on an Astravel mission,
                please take some time to complete an online eligibility questionaire below to see
                if you are physically fit to travel.
            </p>
            <p class="quote">
                Individual commitment to a group effort - that is what makes a team work,
                what makes a company work, a society work, a civilisation work. - Vince Lombardi
            </p>
        </div>
        <div class="con3right">
            <div class="earth">
                <h3>Earth population: </h3> 
                <h3>8B</h3>
            </div>
            <div class="space">
                <h3>Space population: </h3> 
                <h3>?</h3>
            </div>
            <div class="moon">
                <h3>Moon population: </h3> 
                <h3>?</h3>
            </div>
            <div class="mars">
                <h3>Mars population: </h3> 
                <h3>?</h3>
            </div>
        </div>
    </div>
    <div class="eliDiv">
        <button class="eliBtn">
            Eligibility test
        </button>
    </div>

    <div class="container4" id="con4">
        <div class="hap">
                <div class="hapTxt">
                    <h2><a href="bookJourney.php">Gravity too heavy?</a></h2>
                </div>
            <div class="hapImg">
                
            </div>
        </div>
        <div class="plan">
            <div class="planTxt">
                <h2><a href="bookJourney.php"> Out of this world.</a></h2>
            </div>
            <div class="planImg">

            </div>
        </div>
        <div class="shop">
            <div class="shopTxt">
                <h2><a href="bookJourney.php">Afraid of heights? </a></h2>
            </div>
            <div class="shopImg">

            </div>
        </div>
        <div class="end">
            <a class="endDiv" href="#navbar">
                Launch to top 
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-rocket" viewBox="0 0 16 16">
                    <stop class="main-stop" offset="0%" />
                    <stop class="alt-stop" offset="100%" />
                    <path d="M8 8c.828 0 1.5-.895 1.5-2S8.828 4 8 4s-1.5.895-1.5 2S7.172 8 8 8Z"/>
                    <path d="M11.953 8.81c-.195-3.388-.968-5.507-1.777-6.819C9.707 1.233 9.23.751 8.857.454a3.495 3.495 0 0 0-.463-.315A2.19 2.19 0 0 0 8.25.064.546.546 0 0 0 8 0a.549.549 0 0 0-.266.073 2.312 2.312 0 0 0-.142.08 3.67 3.67 0 0 0-.459.33c-.37.308-.844.803-1.31 1.57-.805 1.322-1.577 3.433-1.774 6.756l-1.497 1.826-.004.005A2.5 2.5 0 0 0 2 12.202V15.5a.5.5 0 0 0 .9.3l1.125-1.5c.166-.222.42-.4.752-.57.214-.108.414-.192.625-.281l.198-.084c.7.428 1.55.635 2.4.635.85 0 1.7-.207 2.4-.635.067.03.132.056.196.083.213.09.413.174.627.282.332.17.586.348.752.57l1.125 1.5a.5.5 0 0 0 .9-.3v-3.298a2.5 2.5 0 0 0-.548-1.562l-1.499-1.83ZM12 10.445v.055c0 .866-.284 1.585-.75 2.14.146.064.292.13.425.199.39.197.8.46 1.1.86L13 14v-1.798a1.5 1.5 0 0 0-.327-.935L12 10.445ZM4.75 12.64C4.284 12.085 4 11.366 4 10.5v-.054l-.673.82a1.5 1.5 0 0 0-.327.936V14l.225-.3c.3-.4.71-.664 1.1-.861.133-.068.279-.135.425-.199ZM8.009 1.073c.063.04.14.094.226.163.284.226.683.621 1.09 1.28C10.137 3.836 11 6.237 11 10.5c0 .858-.374 1.48-.943 1.893C9.517 12.786 8.781 13 8 13c-.781 0-1.517-.214-2.057-.607C5.373 11.979 5 11.358 5 10.5c0-4.182.86-6.586 1.677-7.928.409-.67.81-1.082 1.096-1.32.09-.076.17-.135.236-.18Z"/>
                    <!-- <path d="M9.479 14.361c-.48.093-.98.139-1.479.139-.5 0-.999-.046-1.479-.139L7.6 15.8a.5.5 0 0 0 .8 0l1.079-1.439Z"/> -->
                </svg>
            </a>
        </div>
    
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
        <li><a href="bookJourney.html">Book a Journey</a></li>
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

    <script src="home.js"></script>
</body>
</html>
