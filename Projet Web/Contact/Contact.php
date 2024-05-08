<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="contact.css">
</head>
<body>
    <nav>
        <img src="./assets/biscottinos.png" class="logo">
        <div class="naaav">
            <a href="../../Home_Page/home.html"><b>Home</b></a>
            <a href="../Menu/Menu.html"><b>Menu</b></a>
            <a href="../Sells/productPage.php"><b>Products</b></a>
            <a href="../Cart/cartPage.php"><b>Your Cart</b></a>
            <a href="../Contact/Contact.php"><b>Contact Us</b></a>
            <a href="../../login/login.html"><button class="myaccount_btn"><b>My Account</b></button></a>
        </div>
    </nav>
    <h1>Contact Us</h1>
    <section class="contact-us">
        
        <form id="contact-form">
            <input type="text" id="name" placeholder="Your Name">
            <input type="email" id="email" placeholder="Your Email">
            <textarea id="message" placeholder="Your Message"></textarea>
            <button type="submit" class="button_sub">Send Message</button>
            <div id="selected-input"></div>
        </form>
        
    </section>

    <footer class="footer-container">
        <div class="footer-section">
            <img src="./assets/biscottinos.png" alt="Logo" class="footer-logo">
        </div>
        <div class="footer-section">
            <ul class="footer-menu">
                <b>
                    <li><span class="circle"></span><a href="../../Home_Page/home.html">Home</a></li>
                    <li><span class="circle"></span><a href="../Menu/Menu.html">Menu</a></li>
                    <li><span class="circle"></span><a href="../Sells/productPage.php">Products</a></li>
                    <li><span class="circle"></span><a href="../Contact/Contact.php">Contact Us</a></li>
                    <li><span class="circle"></span><a href="../../login/login.html">My Account</a></li>
                </b>
            </ul>
        </div>
        <div class="work">
            <p><b>Work Hours: </b>Monday-Sunday 7am-11pm</p>
            <p><b>Location:</b> Avenue Ali Bourguiba, Monastir, Monastir Governorate 5000</p>
        </div>
        <div class="footer-section">
            <a href="https://www.instagram.com/biscottino_s/"><img src="./assets/facebook BLANC.png" alt="Facebook" class="footer-icon"></a>
            <a href="https://www.facebook.com/biscottinos/"><img src="./assets/instagram BLANC.png" alt="Instagram" class="footer-icon"></a>
        </div>
    </footer>

    <script src="contact.js"></script>
</body>
</html>

<?php

include("../DataBase/DataBase.php");

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

try {
    $sql = "INSERT INTO contact_us (name, email, message) VALUES (:name, :email, :message)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':message', $message, PDO::PARAM_STR);

    $stmt->execute();

    
    $to = "oussama.chaabane05@gmail.com"; 
    $body = "Name: $name\nEmail: $email\nMessage: $message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send email.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$stmt = null;
$conn = null;
?>


<script src="contact.js" ></script>