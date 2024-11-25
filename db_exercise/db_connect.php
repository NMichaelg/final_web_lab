<?php
// db_connect.php
$hostname = "localhost"; // Database host
$username = "root";      // Database username
$password = "";          // Database password
$dbname = "my_store";    // Database name


class Database {
    private $host = "localhost";
    private $db_name = "my_store";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";port=3306;dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
    public function getAll($table) {
        // Ensure connection is established
        if ($this->conn === null) {
            $this->getConnection();
        }
        
        // Prepare the SQL statement
        $query = "SELECT * FROM " . $table;
        $stmt = $this->conn->prepare($query);
        
        // Execute the query
        $stmt->execute();
        
        // Fetch all records as an associative array
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }
    public function get_search($searchTerm) {
        // Ensure connection is established
        if ($this->conn === null) {
            $this->getConnection();
        }
        
        // Prepare the SQL statement
        $query = "SELECT * FROM products WHERE name LIKE :searchTerm";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%');
        // Execute the query
        $stmt->execute();
        // Fetch all records as an associative array
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }
    public function deleteProduct($product_id) {
        $query = 'DELETE FROM products WHERE id = :id';
        $stmt = $this->getConnection()->prepare($query);
        $stmt->bindParam(':id', $product_id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function getProductById($product_id) {
        // Ensure connection is established
        if ($this->conn === null) {
            $this->getConnection();
        }
        
        // Prepare the SQL statement
        $query = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $product_id);
        
        // Execute the query
        $stmt->execute();
        
        // Fetch the record as an associative array
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $result;
    }
}

function connectToDatabase() {

    // Create a connection
    $conn = mysqli_connect("localhost", "root", "", "my_store");

    // Check if the connection is successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn; // Return the connection object
}
function insert_user($in_username,$in_password,$in_user_level,$in_email) {
    // Prepare an SQL statement to insert data into the users table
    $stmt = $conn->prepare("INSERT INTO users (username, password, user_level, email) VALUES (?, ?, ?, ?)");

    // Bind parameters to the statement
    $stmt->bind_param("ssis", $username, $password, $user_level, $email);
    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}

function update_user($in_username, $in_password, $in_user_level, $in_email) {
    $sql = "UPDATE users SET email = 'updated_email@example.com' WHERE username = 'new_user'";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }    
}

function delete_user($in_username, $in_password, $in_user_level, $in_email) {
    $sql = "UPDATE users SET email = 'updated_email@example.com' WHERE username = 'new_user'";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }    
}
function show_table(){
    // Prepare an SQL statement to fetch data
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

    // Check if there are any results
    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "ID: " . $row["id"] . " - Name: " . $row["username"] . " - Email: " . $row["email"] . "<br>";
        }
    } else {
        echo "No records found";
    }
}

// Close the database connection
function exit_db(){
    mysqli_close($conn);
}
?>
