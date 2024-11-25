<?php
// Include database connection
require_once 'db_exercise/db_connect.php';

// Fetch the product ID from the URL
$product_id = $_GET['id'] ?? null;

// Initialize the database
$database = new Database();
// Fetch the product details by ID
$product = $database->getProductById($product_id); // Assuming getById() is a method to fetch a record by ID

// If product is not found, show a 404 message
if (!$product) {
    echo "<h1>404 - Product not found</h1>";
    exit;
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <!-- Product Image -->
                <?php echo '<img src="' . htmlspecialchars($product["img_url"]) . '" alt="' . htmlspecialchars($product["name"]) . '" class="card-img-top img-fluid rounded" height="500">'; ?>

                <div class="card-body">
                    <!-- Product Name -->
                    <h1 class="card-title text-primary"><?php echo htmlspecialchars($product['name']); ?></h1>

                    <!-- Product Price -->
                    <p class="card-text price fs-4 text-success fw-bold">$<?php echo htmlspecialchars(number_format($product['price'], 2)); ?></p>

                    <!-- Stock -->
                    <p class="card-text stock text-danger fs-5">
                        <strong>Stock:</strong> <?php echo htmlspecialchars($product['stock']); ?>
                    </p>

                    <!-- Product Description -->
                    <p class="card-text text-muted"><?php echo htmlspecialchars($product['description']); ?></p>

                    <?php echo '<a href="'.htmlspecialchars($product['store_location']).'"> Store address </a>' ; ?></p>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>




