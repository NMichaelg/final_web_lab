<div class="container mt-5">
    <h1 class="text-center mb-4">Delete Product</h1>
    
    <!-- Form to delete a product -->
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
        <button type="submit" class="btn btn-danger w-100">Delete Product</button>
        <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          // Include database connection
          require_once 'db_exercise/db_connect.php';
          $database = new Database();
          
          // Get the product ID from the form
          $product_id = $_POST['product_id'];
      
          if ($product_id) {
              // Delete the product from the database
              $deleted = $database->deleteProduct($product_id);
      
              if ($deleted) {
                  echo '<div class="alert alert-success">Product deleted successfully!</div>';
              } else {
                  echo '<div class="alert alert-danger">Failed to delete product.</div>';
              }
          }
      }
      ?>  
      </div>
    </form>
  </div>

  