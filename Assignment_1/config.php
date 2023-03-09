<?php
// config
$server= "localhost";
$user="admin";
$password="admin";
$dbname="demo";

$link = new mysqli($server, $user, $password);

// checking connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
  }
  
  // creating and checking whether database is created or not
  $createdb = "CREATE DATABASE IF NOT EXISTS $dbname";
  if ($link->query($createdb) === TRUE) {
    // echo "Database created successfully";
  } else {
    echo "Error creating database: " . $link->error;
  }
  $link->select_db($dbname);
  
  // creating and checking whether table is created or not
  $createtb = "CREATE TABLE employees (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    address VARCHAR(255) NOT NULL,
    salary INT(10) NOT NULL
);";
  
  if ($link->query($createtb) === TRUE) {
    // echo "Table created successfully";
  } else {
    // echo "Error creating table: " . $link->error;
  }

  $inserttb = "INSERT INTO employees(id, name, address, salary) VALUES ('1', 'Geetansh' , 'naranpura' '100000')";
  $link->query($inserttb);
?>
