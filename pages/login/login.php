<?php
// Include the database connection file
require_once 'db_exercise/db_connect.php'; // Adjust the path as necessary

// Create a new instance of the Database class
$database = new Database();
$db = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare an SQL statement to prevent SQL injection
    $query = "SELECT password_hash FROM users WHERE username = :username LIMIT 1";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    // Check if the user exists
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // Verify the password
        if ($password == $row['password_hash']) {
            setcookie('username', $username, time() + 7200, '/'); // Cookie expires in 2 hours
            echo "<script>alert('Login successfully, Welcome Back $username!');</script>";
            echo "<script>window.location.href = 'index.php?page=home';</script>";
            exit;  // Ensure no further code runs after the redirect
        } else {
            echo "<script>alert('Login Fail, incorrect password');</script>";
            echo "<script>window.location.href = 'index.php?page=login';</script>";
        }
    } else {
        echo "<script>alert('Login failed: User not found.')</script>";
        echo "<script>window.location.href = 'index.php?page=login';</script>";
    }
}
?>
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="d-flex align-content-between flex-wrap ">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                <form class="mx-1 mx-md-4" action="" method="POST" >
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c">Your Username</label>
                        <input type="text" id="form3Example1c" class="form-control" placeholder="Enter Username" name="username" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example4c">Password</label>
                      <input type="password" id="form3Example4c" class="form-control" placeholder="Enter Password" name ="password" />
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Log in</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                <img src="images/log_in_pic.webp" style="margin-top:20px;"
                  class="img-responsive" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

