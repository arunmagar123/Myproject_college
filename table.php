<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Onlineshopping";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
} else {
    echo "Connected";
}
$sql = "CREATE TABLE User(
    id INT(11)  AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(50) NOT NULL,
    Email VARCHAR(50) NOT NULL,
    Password VARCHAR(50) NOT NULL,
    Cpassword VARCHAR(50) NOT NULL,
    Gender VARCHAR(50) NOT NULL)";
if (mysqli_query($conn, $sql)) {
    echo "Successfully created table";
} else {
    echo "error in creating table";
}

$sql = "CREATE TABLE Admin(
        Username VARCHAR(50) NOT NULL,
        Email VARCHAR(50) NOT NULL,
        Password VARCHAR(50) NOT NULL)";

if (mysqli_query($conn, $sql)) {
    echo "Successfully created table";
} else {
    echo "error in creating table";
}

$sql = "CREATE TABLE products (
            id INT(11)  AUTO_INCREMENT PRIMARY KEY,
            product_name VARCHAR(255) NOT NULL,
            price DECIMAL(10, 2) NOT NULL,
            image VARCHAR(255),
            category VARCHAR(50)
        )";
$sql = "CREATE TABLE cart(
    id INT PRIMARY KEY AUTO_INCREMENT,
    product_name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255),
    quantity INT NOT NULL
  )";

$sql = "CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    customer_id INT(11) PRIMARY KEY,
    customer_name VARCHAR(255) NOT NULL,
    customer_address VARCHAR(255) NOT NULL,
    customer_phone VARCHAR(20) NOT NULL,
    customer_email VARCHAR(255) NOT NULL,
    total_order DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (customer_id) REFERENCES user(id)
)";



$sql = "CREATE TABLE order_items (
    order_item_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    product_name VARCHAR(255),
    product_image VARCHAR(255),
    product_price DECIMAL(10, 2),
    product_quantity INT,
    FOREIGN KEY (order_id) REFERENCES orders(order_id)
  )";


if (mysqli_query($conn, $sql)) {
    echo "Successfully created table";
} else {
    echo "error in creating table";
}

$sql = "CREATE TABLE category (
    id INT PRIMARY KEY AUTO_INCREMENT,
    Men Varchar(255),
    Women VARCHAR(255),
    PopularProduct VARCHAR(255)
)";

if (mysqli_query($conn, $sql)) {
    echo "Successfully created table";
} else {
    echo "error in creating table";
}


mysqli_close($conn);
?>