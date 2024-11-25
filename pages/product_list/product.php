<style>
  
/*Product page*/
.products-list {
  padding: 20px; /* Adds padding around the product list */
  background-color: #f9f9f9; /* Optional: background color for main container */
}

.products-grid {
  display: flex; /* Enables horizontal layout */
  gap: 20px; /* Adds space between product items */
  flex-wrap: wrap; /* Allows wrapping to a new line if there's no space */
  justify-content: center; /* Centers items horizontally within the container */
}

.product-item {
  background-color: #fff; /* Background for each product item */
  border: 1px solid #ddd; /* Border around each product item */
  border-radius: 8px; /* Optional: rounded corners */
  padding: 15px; /* Space inside each product item */
  width: 200px; /* Fixed width for each product item */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Optional: shadow effect */
  text-align: center; /* Centers text inside each product */
}

.product-item img {
  max-width: 100%; /* Ensures the image fits within product item */
  height: auto; /* Maintains aspect ratio */
  border-radius: 5px; /* Optional: round image corners */
}

.product-description {
  font-size: 0.9rem; /* Smaller font for description */
  color: #666; /* Lighter color for description text */
}
</style>
<h1 name = "hi" class = "hi" >Our Products</h1>
<p>Here you will find a list of our products.</p>

<main class="products-list">
    <!-- Search Bar -->
    <!-- Products Grid -->
    <form>
          <input type="text" onkeyup="showResult(this.value)"/>
          <div id="livesearch"></div>
    </form>
    <section class="products-grid">
      <!-- Additional product items can be added here -->
      <?php
        require_once 'db_exercise/db_connect.php';
        $database = new Database();

        if (isset($_GET['query'])) {
          $searchTerm = $_GET['query'];
          if ($searchTerm != ''){
            $products = $database->get_search($searchTerm);
  
            foreach ($products as $product) {
              echo '
              <div class="product-item" data-name="' . htmlspecialchars($product["name"]) . '">
                  <img src="' . htmlspecialchars($product["img_url"]) . '" alt="' . htmlspecialchars($product["name"]) . '">
                  <h2>' . htmlspecialchars($product["name"]) . '</h2>
                  <p class="product-description">' . htmlspecialchars($product["description"]) . '</p>
                  <p class="product-price">$' . htmlspecialchars($product["price"]) . '</p>
                  <p class="product-stock">Stock: ' . htmlspecialchars($product["stock"]) . '</p>
                  <a href="?id=' . htmlspecialchars($product["id"]) . '" class="product-link">View Details</a>
              </div>';
            }
          }
            if ($searchTerm == ''){
              $products = $database->getAll("products");

              foreach ($products as $product) {
                echo '
                <div class="product-item" data-name="' . htmlspecialchars($product["name"]) . '">
                    <img src="' . htmlspecialchars($product["img_url"]) . '" alt="' . htmlspecialchars($product["name"]) . '">
                    <h2>' . htmlspecialchars($product["name"]) . '</h2>
                    <p class="product-description">' . htmlspecialchars($product["description"]) . '</p>
                    <p class="product-price">$' . htmlspecialchars($product["price"]) . '</p>
                    <p class="product-stock">Stock: ' . htmlspecialchars($product["stock"]) . '</p>
                    <a href=?id=' . htmlspecialchars($product["id"]) . '" class="product-link">View Details</a>
                </div>';
            }
          }
        }else {
          $products = $database->getAll("products");
  
          foreach ($products as $product) {
            echo '
            <div class="product-item" data-name="' . htmlspecialchars($product["name"]) . '">
                <img src="' . htmlspecialchars($product["img_url"]) . '" alt="' . htmlspecialchars($product["name"]) . '">
                <h2>' . htmlspecialchars($product["name"]) . '</h2>
                <p class="product-description">' . htmlspecialchars($product["description"]) . '</p>
                <p class="product-price">$' . htmlspecialchars($product["price"]) . '</p>
                <p class="product-stock">Stock: ' . htmlspecialchars($product["stock"]) . '</p>
                <a href="?id=' . htmlspecialchars($product["id"]) . '" class="product-link">View Details</a>
            </div>';
          }
        }    
        ?>
    </section>
  </main>