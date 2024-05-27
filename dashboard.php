<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doughnutery Inventory System</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      overflow-x: hidden; /* Hide the vertical scrollbar */
    }
  </style>
  
</head>
<body>
  <!-- Header -->
  <?php include 'header.php'; ?>
    
  <!-- Sidebar Card -->
  <?php include 'sidebar.php'; ?>

  <!-- Page content -->
  <?php include 'contents.php'; ?>


<script>

// Inventory Chart with customized colors and grid lines
var inventoryChart = new Chart(document.getElementById('inventoryChart').getContext('2d'), {
  type: 'bar',
  data: {
    labels: ['Donuts', 'Coffee', 'Pastries', 'Non-coffee'],
    datasets: [{
      label: 'Products Sold',
      data: [100, 150, 200, 60],
      backgroundColor: [
        'rgba(100, 100, 100, 0.5)',  // Dark gray with transparency
        'rgba(200, 100, 0, 0.5)',     // Dark orange with transparency
        'rgba(0, 100, 200, 0.5)',     // Dark blue with transparency
        'rgba(150, 0, 150, 0.5)'      // Dark purple with transparency
      ],
      borderColor: [
        'rgba(100, 100, 100, 1)',    // Dark gray
        'rgba(200, 100, 0, 1)',       // Dark orange
        'rgba(0, 100, 200, 1)',       // Dark blue
        'rgba(150, 0, 150, 1)'        // Dark purple
      ],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true,
        grid: {
          display: false // Remove grid lines for y-axis
        }
      },
      x: {
        grid: {
          display: true // Display grid lines for x-axis
        }
      }
    }
  }
});



  // Stocks Chart with industrialized colors
var stocksChart = new Chart(document.getElementById('stocksChart').getContext('2d'), {
  type: 'line',
  data: {
    labels: ['January', 'February', 'March', 'April', 'May'],
    datasets: [{
      label: 'Won Stocks',
      data: [100, 120, 90, 123, 140],
      backgroundColor: 'rgba(75, 101, 132, 0.2)', // Dark blue with transparency
      borderColor: 'rgba(75, 101, 132, 1)', // Dark blue
      borderWidth: 1,
      lineTension: 0.3, // Adjust the line tension for a smoother curve
      fill: {
        target: 'origin',
        above: 'rgba(75, 101, 132, 0.2)' // Transparent color above the line
      }
    },
    {
      label: 'Lost Stocks',
      data: [80, 110, 78, 90, 110],
      backgroundColor: 'rgba(255, 128, 0, 0.2)', // Orange with transparency
      borderColor: 'rgba(255, 128, 0, 1)', // Orange
      borderWidth: 1,
      lineTension: 0.3, // Adjust the line tension for a smoother curve
      fill: {
        target: 'origin',
        above: 'rgba(255, 128, 0, 0.2)' // Transparent color above the line
      }
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true,
        grid: {
          display: false // Remove grid lines except for x-axis
        }
      },
      x: {
        grid: {
          display: true // Display grid lines for x-axis
        }
      }
    }
  }
});



    
  </script>
</body>
</html>
