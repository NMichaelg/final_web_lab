<?php 
require_once '../../db_exercise/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get product data from POST request

    $product_id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $description = $_POST['description'];
    $img_url = $_POST['img_url'];

    // Validate data (optional but recommended)
    if (empty($name) || $price <= 0 || $stock < 0) {
        echo "<h1>Invalid input data.</h1>";
        exit;
    }

    // Initialize database
    $database = new Database();
    $connection = $database->getConnection();

    // Update query
    $query = "UPDATE products SET name = :name, price = :price, stock = :stock, description = :description, img_url = :img_url WHERE id = :id";
    $stmt = $connection->prepare($query);

    // Bind parameters
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':stock', $stock);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':img_url', $img_url);
    $stmt->bindParam(':id', $product_id);

    // Execute the query
    if ($stmt->execute()) {
        echo "<script>alert('Product $name updated successfully!');</script>";
        echo "<script>window.location.href = '../../index.php?page=products';</script>";
    } else {
        echo "<script>alert(Failed to update product);</script>";

    }
}
?>