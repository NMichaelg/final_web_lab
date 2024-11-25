<?php

require_once 'db_exercise/db_connect.php'; // Adjust the path as necessary

$database = new Database();
$db = $database->getConnection();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Get user input
    $name = $_POST['prod_name'];
    $des = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $img_url=$_POST['img_url'];
    $store_address = $_POST['store_address'];
    echo $store_address;

    // Prepare an SQL statement to prevent SQL injection
    $query = "INSERT INTO products (name, description, price,stock,store_location,img_url) VALUES (:name, :des, :price,:stock,:store_address,:img_url)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':des', $des);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':stock', $stock);
    $stmt->bindParam(':store_address',$store_address);
    $stmt->bindParam(':img_url',$img_url);

    // Execute the query
    if ($stmt->execute()) {
        echo "<script>alert('Thank you for add product, $name!')</script>";
        echo "<script>window.location.href = 'index.php?page=add_product';</script>";
    } else {
        echo "<script>alert('Error: Unable to add product.')</script>";
    }   
}

?>
<div class="container mt-5">
    <h1 class="text-center mb-4">Add New Product</h1>
    <form action="" action="" method="POST" >
        <div class="mb-3">
            <label for="productName" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="productName" name="prod_name" placeholder="Enter product name" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Enter product price" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" placeholder="Enter product stock quantity" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter product description" required></textarea>
        </div>
        <div class="mb-3">
            <label for="img_url"><b>image path</b></label>
            <textarea class="form-control" id="img_path" name="img_url" rows="1" placeholder="Enter product image url" required></textarea>
        </div>
        <div class="mb-3">
            <label for="store_address"><b>Store link</b></label>
            <textarea class="form-control" id="img_path" name="store_address" rows="1" placeholder="Enter store address url" required></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Add Product</button>
        </div>
    </form>
</div>

