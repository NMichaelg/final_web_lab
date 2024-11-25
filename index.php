<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Win Iphone 16 Pro Max </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
  </head>

  <body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/Apple_logo_white.svg/505px-Apple_logo_white.svg.png?20220821122232" width="30" height="30" alt="">
        </a>
      </div>
      <ul class="nav navbar-nav">
        <li ><a href="?page=home">Home</a></li>
        <li class="dropdown">
                <a  class="btn text-white" data-bs-container="body" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="bottom" data-bs-content="Bottom popover">
                    Products
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?page=products">All Product</a></li>
                    <li><a id = "admin_only"  class="dropdown-item" href="?page=add_product">Add Product</a></li>
                    <li><a id = "admin_only"  class="dropdown-item" href="?page=edit_product">Edit Product</a></li>
                    <li><a id = "admin_only"  class="dropdown-item" href="?page=del_product">Delete Product</a></li>
                </ul>
        </li>
        <li><a href="?page=contact">Contact Us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li id="pre_login"><a href="?page=sign_up"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li id="pre_login"><a href="?page=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <li id="post_login"><a href="?page=logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </nav>
      </div>
    </nav>
    <?php
        if (isset($_GET['page']) & !isset($_GET['id'])){
            $page = $_GET['page'];

            switch($page){
                case 'home';
                    include 'home.php';
                    break;
                case 'contact':
                    include './pages/contact/contact.php';
                    break;
                case 'products':
                    include './pages/product_list/product.php';
                    break;
                case 'login':
                    include './pages/login/login.php';
                    break;
                case 'sign_up':
                    include './pages/sign_up/sign_up.php';
                    break;
                case 'add_product':
                    include './pages/add_product/add_product.php';
                    break;
                case 'del_product':
                    include './pages/delete_product/delete_product.php';
                    break;
                case 'edit_product':
                    include './pages/edit_product/edit_product.php';
                    break;
                case 'logout':
                    echo"hello";
                    setcookie('username','',time() - 3600,'/');
                    echo "<script>alert('Succesfully log out');</script>";
                    echo "<script>window.location.href = 'index.php?page=home';</script>";
                    break;
            }
        }
        elseif(isset($_GET['id'])){
          include 'each_product.php';
        }
        else {
            // Default content if no 'page' is specified
            include 'home.php';
        }
    ?>
    <!-- Footer -->
<footer class="text-center text-lg-start bg-body-tertiary text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <!-- Left -->

    <!-- Right -->
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Tesla-Shop 2.0
          </h6>
          <p>
            About us : To infinity and Beyongggggg
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Connect with us
          </h6>
          <p>
          <a href="https://x.com/elonmusk" class="social-icon">Twitter</a>
          </p>
          <p>
            <a href="https://youtu.be/dQw4w9WgXcQ" class="social-icon">Youtube</a>
          </p>
          <p>
          <a href="#" class="https://www.instagram.com/p/BsOGulcndj-/">Instagram</a>
          </p>
          <p>
          <a href="#" class="https://www.twitch.tv/">Twitch </a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4 ">Contact</h6>
          <p ><i class="fas fa-home me-3 fs-5"></i> New York, NY 10012, US</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            Email: realapple@gmail.com          
          </p>
          <p><i class="fas fa-phone me-3"></i> Phone: +1202 456 6213 (plz dont call)</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->
</footer>
<!-- Footer -->
    <script src="ultis/ajax.js"></script>
    <?php include "ultis/cookie_handling.php";?>
  </body>
  
</html>
