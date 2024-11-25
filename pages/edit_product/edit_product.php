
<form action="" method="POST" class="p-4 border rounded shadow-sm">
    <div class="mb-3">
    <label for="productId" class="form-label">Select Product</label>
    <select name="product_id" id="productId" class="form-select" required>
        <option value="" disabled selected>-- Choose a product --</option>
        <?php
        // PHP code to fetch products from the database
        require_once 'db_exercise/db_connect.php';
        $database = new Database();
        $products = $database->getAll('products');

        foreach ($products as $product) {
        echo '<option value="' . htmlspecialchars($product['id']) . '">' . htmlspecialchars($product['name']) . '</option>';
        }
        ?>
        
    </select>
    </div>

    <div class="text-center">
    <button type="submit" class="btn btn-danger w-100">Edit Product</button>
    </div>
<?php
// Include database connection
echo "<style>
#edit_form{
    display:none;
};
</style>";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Include database connection
    
    // Get the product ID from the form
    $product_id = $_POST['product_id'];

    if ($product_id) {
        echo "<style>
        #edit_form{
            display:block;
        };
        </style>";      
    }
    $product = $database->getProductById($product_id);
}
?>
</form>
<div class="container mt-5" id = "edit_form">
    <h1 class="mb-4 text-center">Edit Product</h1>
    <form action="./pages/edit_product/update_product.php" method="POST" enctype="multipart/form-data" class="p-4 border rounded bg-white shadow-sm">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id']); ?>">
        <!-- Product Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo htmlspecialchars($product['name']); ?>" required>
        </div>
        <!-- Price -->
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control" step="0.01" value="<?php echo htmlspecialchars($product['price']); ?>" required>
        </div>
        <!-- Stock -->
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" name="stock" id="stock" class="form-control" value="<?php echo htmlspecialchars($product['stock']); ?>" required>
        </div>
        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required><?php echo htmlspecialchars($product['description']); ?></textarea>
        </div>
        <!-- Image URL -->
        <div class="mb-3">
            <label for="img_url" class="form-label">Image URL</label>
            <input type="url" name="img_url" id="img_url" class="form-control" value="<?php echo htmlspecialchars($product['img_url']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Update Product</button>
    </form>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

