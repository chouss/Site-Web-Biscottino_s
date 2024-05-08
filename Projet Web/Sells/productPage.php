<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="./productPage.css">
    <link rel="icon" href="../assets/biscottinos.ico">

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">


</head>
<body>
    <nav>
        <img src="../assets/biscottinos.png" class="logo">
        <div class="naaav">
            <a href="../../Home_Page/home.html"><b>Home</b></a>
            <a href="../Menu/Menu.html"><b>Menu</b></a>
            <a href="../Sells/productPage.php"><b>Products</b></a>
            <a href="../Cart/cartPage.php"><b>Your Cart</b></a>
            <a href="../Contact/Contact.php"><b>Contact Us</b></a>
            <a href="../../login/login.html"><button class="myaccount_btn"><b>My Account</b></button></a>
        </div>
    </nav>

    <h1>Available Products</h1>

    <section>
        <?php
            include("../DataBase/DataBase.php");

            try {
                $sql = "SELECT ProductID, ProductName, Description, Price, ImageURL FROM product";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (count($result) > 0) {
                    foreach ($result as $row) {
                        echo '<div class="card">';
                        echo '<img src="' . htmlspecialchars($row['ImageURL']) . '" alt="Product Image" style="width:100%">';
                        echo '<h1>' . htmlspecialchars($row['ProductName']) . '</h1>';
                        echo '<p class="price">' . number_format($row['Price'], 2) . 'DT</p>';
                        echo '<p>' . htmlspecialchars($row['Description']) . '</p>';
                        echo '<form action="add_to_cart.php" method="post">';
                        echo '<input type="hidden" name="product_id" value="' . $row['ProductID'] . '">';
                        echo '<input type="number" name="quantity" value="1" min="1" style="width: 50px;">';
                        echo '<button type="submit">Add to Cart</button>';
                        echo '</form>';
                        echo '</div>';
                    }
                } else {
                    echo "0 results";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        ?>
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

