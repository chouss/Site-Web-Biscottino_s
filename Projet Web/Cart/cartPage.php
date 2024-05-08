<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your shop</title>
    <link rel="stylesheet" href="cartPage.css">
    <link rel="icon" href="../assets/biscottinos.ico">

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">


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
    
    <section>
    <?php
        include("../DataBase/DataBase.php");

        try {
            $sql = "SELECT p.ProductName, p.ImageURL, od.Quantity, od.Subtotal, p.Price 
                    FROM orderdetail od 
                    JOIN product p ON od.ProductID = p.ProductID";
            $stmt = $conn->query($sql);
            $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $grandTotal = array_sum(array_column($orders, 'Subtotal'));

            if (empty($orders)) {
                echo "<p>Your cart is empty.</p>";
            } else {
                echo "<h2>Your Cart</h2>";
                echo "<table border='1'>";
                echo "<tr><th>Product Image</th><th>Product Name</th><th>Quantity</th><th>Price Per Item</th><th>Total Price</th></tr>";
                foreach ($orders as $order) {
                    echo "<tr>";
                    echo "<td><img src='{$order['ImageURL']}' alt='Product Image' style='width:100px;'></td>";
                    echo "<td>{$order['ProductName']}</td>";
                    echo "<td>{$order['Quantity']}</td>";
                    echo "<td>" . number_format($order['Price'], 2) . "DT</td>";
                    echo "<td>" . number_format($order['Subtotal'], 2) . "DT</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "<p><strong>Grand Total: " . number_format($grandTotal, 2) . "DT</strong></p>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    ?>

        <form action="cartPage.php" method="post">
            <h3>Select Payment Method:</h3>
            <input type="radio" id="credit_card" name="payment_method" value="Credit Card" checked>
            <label for="credit_card">Credit Card</label><br>
            <input type="radio" id="paypal" name="payment_method" value="PayPal">
            <label for="paypal">PayPal</label><br>
            <button type="submit" name="submit_payment" class="payement_btn">Proceed to Payment</button>
        </form>
    </section>
            <!-- hetha footer -->

            <footer class="footer-container">
            <div class="footer-section">
                <img src="./assets/biscottinos.png" alt="Logo" class="footer-logo">
            </div>
            <div class="footer-section">
                <ul class="footer-menu"><b>
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
                <a href="https://www.instagram.com/biscottino_s/"><img src="./assets/facebook BLANC.png" alt="Facebook" class="footer-icon">
                    <a href="https://www.facebook.com/biscottinos/"><img src="./assets/instagram BLANC.png" alt="Instagram" class="footer-icon">
            </div>
        </footer>
        
        <!-- footer youfa hne -->

    
</body>

</html>

<?php
    if (isset($_POST['submit_payment'])) {
        try {
            $conn->beginTransaction();
            $sql = "TRUNCATE TABLE orderdetail";
            $conn->exec($sql);
            $conn->commit();
            echo "<script>alert('Payment successful!');</script>";
        } catch (PDOException $e) {
            $conn->rollBack();
            echo "<script>alert('Payment failed: " . $e->getMessage() . "');</script>";
        }
    }
?>