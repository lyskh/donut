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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($connection->query($sql) === TRUE) {
        echo "Registration successful!";
        header("Location: login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        /* Your provided CSS here */
        body {
            background-image: url(img/login.png);
            min-width: none;
            min-height: 100vh;
            background-size: cover;
            font-family: 'Quicksand', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .welcome-card {
            background: rgba(255, 255, 255, 0.8); /* Adjust opacity to your preference */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        .welcome-card h1 {
            margin-bottom: 20px;
            color: #343a40;
        }

        .welcome-card p {
            margin-bottom: 20px;
            color: #6c757d;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
            padding: 0 20px;
        }

        .form-group.input {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
            padding: 0 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .buttons {
            text-align: center;
            display: flex;
            justify-content: center;
            padding: 20px 10px;
        }

        .btn {
            width: 200px;
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 10px;
            font-size: 16px;
            color: #fff;
            background-color: #000;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
      <div class="welcome-card">
        <h2>Register</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        <button onclick="goBack()" class="btn btn-secondary mt-3">Go Back</button>
      </div>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }

        const form = document.getElementById('loginForm');

        form.addEventListener('submit', function(event) {
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value.trim();

            if (username === '' || password === '') {
                event.preventDefault();
                alert('Please enter both username and password.');
            }
        });
    </script>
</body>
</html>
