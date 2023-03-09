<?php
// config
$server= "localhost";
$user="admin";
$password="admin";
$dbname="login";

$conn = new mysqli($server, $user, $password);

// checking connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// creating and checking whether database is created or not
$createdb = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($createdb) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}
$conn->select_db($dbname);

// creating and checking whether table is created or not
$createtb = "CREATE TABLE IF NOT EXISTS login_info (
              id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              username VARCHAR(15),
              password VARCHAR(15))";

if ($conn->query($createtb) === TRUE) {
  echo "Table created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// inserting values in table
$inserttb = "INSERT INTO login_info(username, password) VALUES ('admin', 'admin')";
if ($conn->query($inserttb) === TRUE) {
  echo "Data inserted into table";
} else {
  echo "Error inserting data: " . $conn->error;
}


// validating username and password from database
    $username   = $_POST['username'];
     $password   = $_POST['password'];

    $query      = "select * from login_info where username = '$username'";
    $resultSet  = mysqli_query($conn, $query); 
   
    if(mysqli_num_rows($resultSet) > 0){
        $row    = mysqli_fetch_assoc($resultSet);
        if($row['password'] == $password){ 
            // echo "<h1>"."Good, Logged In!"."<h1>";
            header("Location:  ./view.php");
        }else{
            echo "<h1>"."ohh no, password not correct"."<h1>";
        }
    }else{
        echo "<h1>"."Username not correct"."<h1>";
    }
   

?>