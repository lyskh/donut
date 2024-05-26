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

// Retrieve the product information from the database
$sql = "SELECT * FROM products WHERE product_id = $product_id";
$result = mysqli_query($connection, $sql);

// Check if the product exists
if (mysqli_num_rows($result) != 1) {
  header("Location: display_products.php");
  exit();
}

// Fetch product data
$row = mysqli_fetch_assoc($result);

// Close the database connection
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <title>Edit Product</title>
</head>
<style>
  body {
  margin-left: 500px;
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 20px;
  background-color: #fff;
  align-items: center;
  height: 100vh; /* Set height to viewport height */
}

h2 {
  margin-bottom: 20px;
  justify-content: center;
  align-items: center;
}
.container {
        display: flex;
        
      }

.sidebar {
        width: 200px;
        margin-right: 100px;
      }

form {
  background-color: #fff;
  width: 500px;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  justify-content: center;
  align-items: center;
}

label {
  display: block;
  margin-bottom: 10px;
}

input[type="text"],
input[type="number"] {
  width: 95%;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

input[type="submit"] {
  background-color: #007bff;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #0056b3;
}

</style>
<body>
  <div class="container">
<div class="sidebar">
    <?php include 'sidebar.php'; ?>
    </div>

  <div class="col-lg-12">
  <h2>Edit Product</h2>
  <form  action="update_product_process.php" method="POST">
    <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
    <label for="product_name">Product Name:</label>
    <input type="text" id="product_name" name="product_name" value="<?php echo $row['product_name']; ?>" required><br><br>
    <label for="category">Category:</label>
    <input type="text" id="category" name="category" value="<?php echo $row['category']; ?>" required><br><br>
    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" name="quantity" value="<?php echo $row['quantity']; ?>" required><br><br>
    <label for="price">Price:</label>
    <input type="number" id="price" name="price" step="0.01" value="<?php echo $row['price']; ?>" required><br><br>
    <input type="submit" value="Update">
  </form>
  </div>
  </div>
</body>
</html>
