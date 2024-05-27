<?php
// Establish database connection
$servername = "127.0.0.1";
$username = "lux";
$password = "khera";
$database = "donut_db";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if product ID is provided
if (!isset($_GET['id'])) {
  header("Location: display_products.php");
  exit();
}

// Get the product ID from the URL
$product_id = $_GET['id'];

// Prepare a delete statement
$sql = "DELETE FROM products WHERE product_id = ?";

// Prepare statement
$stmt = $connection->prepare($sql);
if ($stmt === false) {
  die("Error preparing statement: " . $connection->error);
}

// Bind parameters
$stmt->bind_param("i", $product_id);

// Execute the statement
if ($stmt->execute() === true) {
  // Product deleted successfully, redirect to display_products.php
  header("Location: inventory.php");
  exit();
} else {
  // Error occurred while deleting product
  echo "Error deleting product: " . $connection->error;
}

// Close statement
$stmt->close();

// Close connection
$connection->close();
?>
