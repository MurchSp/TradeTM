<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trade TM</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Kanit:wght@600&display=swap" rel="stylesheet">
</head>
<body>
<?php 
ob_start(); 
session_start(); 
?>
<header>
    <h1 class="logo">
        Trade TM 
        <a href="index.html">
            <img src="https://img.icons8.com/?size=96&amp;id=0BUscq2ZXA2j&amp;format=png" alt="Steam Icon" style="width: 30px;">
        </a>
    </h1>
    <nav>
        <a href="pagethree.html">Trade</a>
        <a href="pagefour.html">History</a>
        <a href="pagetwo.html">Rent a Bot</a>
        <?php
        require 'steamauth/steamauth.php';
        if (!isset($_SESSION['steamid'])) {
            loginbutton();
        } else {
            require 'steamauth/userInfo.php';
            echo "<a href='steamauth/logout.php'>Logout</a>";
        }
        ?>
    </nav>
</header>
<div class="online-container">
    Online: <span id="online-count">27</span>
</div>    
<main>
    <section class="about">
        <div class="text-wrapper">
            <h2>About TRADETM</h2>
            <div class="intro-container">
                <p class="intro-text">
                    <strong>TradeTM</strong> is a new service for renting bots to modernize and simplify your trading. Our service offers several types of bots for automatic trading at a low cost, allowing you to delve into trading with ease and comfort. Additionally, you can trade through our website without having your own bot. This feature is still being refined but is already active.
                </p>
            </div>
        </div>
        <div class="person-img">
            <img src="https://steamuserimages-a.akamaihd.net/ugc/2493389006249597334/53499684DD5B8393C60FB7389C9318656FEA178A/?imw=5000&imh=5000&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=false" alt="Person Image">
        </div>
    </section>
</main>
<footer>
    <p class="copyright-text">Copyrights © 2024 TRADETM</p>
    <nav>
        <a href="pagefive.html">Terms</a>
        <a href="pagesix.html">Privacy</a>
        <a href="pageseven.html">Support</a>
    </nav>
</footer>
<script src="script.js"></script>    
</body>
</html>
