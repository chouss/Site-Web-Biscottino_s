<?php
include("../DataBase/DataBase.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productID = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;
    
    try {
        
        $sql = "SELECT Price FROM product WHERE ProductID = :productID";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':productID', $productID, PDO::PARAM_INT);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($product) {
            $subtotal = $product['Price'] * $quantity;
            
            
            $sql = "INSERT INTO orderdetail (ProductID, Quantity, Subtotal) VALUES (:productID, :quantity, :subtotal)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':productID', $productID, PDO::PARAM_INT);
            $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
            $stmt->bindParam(':subtotal', $subtotal);
            
            if ($stmt->execute()) {
                echo "<script>alert('Product added to cart successfully!'); window.location.href='productPage.php';</script>";
            } else {
                echo "Error: Unable to execute the insert statement.";
            }
        } else {
            echo "Product not found.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
