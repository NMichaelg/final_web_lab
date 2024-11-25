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
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example3c">Your Email</label>
                        <input type="email" id="form3Example3c" class="form-control" placeholder="Enter Email" name="email" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example4c">Password</label>
                      <input type="password" id="form3Example4c" class="form-control" placeholder="Enter Password" name ="password" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example4cd">Repeat your password</label>
                      <input type="password" id="form3Example4cd" class="form-control" placeholder="Re-enter Password" name="re_password" />
                    </div>
                  </div>    
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Register</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                <img src="images/Sign_up_pic.webp" style="margin-top:20px;"
                  class="img-responsive" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<<?php



require_once 'db_exercise/db_connect.php'; // Adjust the path as necessary

$database = new Database();
$db = $database->getConnection();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Get user input
    $username = $_POST['username'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];
    $email = $_POST['email'];
    $user_level = "viewer";
    if ($password == $re_password) {
      $query = "INSERT INTO users (username, password_hash, email, user_level) VALUES (:username, :password, :email , :user_level)";
      $stmt = $db->prepare($query);
      $stmt->bindParam(':username', $username);
      $hashedPassword = $password;
      $stmt->bindParam(':password', $hashedPassword);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':user_level', $user_level);
      // Execute the query
      if ($stmt->execute()) {
          echo "<script>alert('Thank you for signing up, $username!')</script>";
          echo "<script>window.location.href = 'index.php?page=login';</script>";
      } else {
          echo "<script>alert('Error: Unable to create user.')</script>";
      }
    }
    if ($re_password != $password){
      echo "<script>alert('Unmatch password, please try again')</script>";
    }
    // Prepare an SQL statement to prevent SQL injection

}
?>