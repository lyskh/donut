<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doughnutery</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

<style>
    body {
    background-image: url(img/bgdb.png);
    min-width: none;
    min-height: 100vh;
    background-size: cover;
    font-family: 'Quicksand', sans-serif;
    margin: 0;
    padding: 0;
    height: 100vh;
    overflow: hidden;
    }

    .background {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
      overflow: hidden;
      z-index: -1;
    }

  .background img {
      width: 200px;
      height: 200px;
      object-fit: cover;
      margin: 10px;
      opacity: 0.7;
      animation: float 2s infinite ease-in-out;
      border-radius: .5rem;
    } 

    @keyframes float {
      0% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-20px);
      }
      100% {
        transform: translateY(0);
      }
    }
 
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100%;
      position: relative;
      z-index: 1;
    }

    .welcome-card {
      color: white;
      background: #141617;
      height: 600px;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 10px 15px rgba(232, 232, 232, 0.1);
      max-width: 500px;
      width: 100%;
    }

    .welcome-card h1 {
      margin-bottom: 20px;
      color: #fff;
    }

    .welcome-card p {
      margin-bottom: 20px;
      color: #fff;
      text-align: justify;
    }

    .welcome-card ul {
      margin-bottom: 40px;
      color: #fff;
      text-align: justify;
      padding-left: 20px;
    }

    .welcome-card ul li {
      margin-bottom: 10px;
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
      margin: 0 10px;
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
      <h1>Doughnutery Inventory System</h1>
      <p>Manage your store's products efficiently with our web-based inventory system. Features include adding, editing, and deleting products, all displayed in a responsive, easy-to-use interface.</p>
      <ul>
        <li>Add new products with details like name, category, quantity, and price.</li>
        <li>Edit existing product information.</li>
        <li>Delete products with a confirmation prompt.</li>
        <li>View all products in a detailed table.</li>
        <li>Responsive design for various screen sizes.</li>
      </ul>
      <p>Technologies: HTML/CSS, JavaScript, PHP, MySQL, Bootstrap, Chart.js</p>
      <div class="buttons">
        <a href="login.php" class="btn">Login</a>
      </div>
      <div class="buttons">
        <a href="register.php" class="btn">Register</a>
      </div>
    </div>
  </div>
</body>
</html>
