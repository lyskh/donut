<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <style>
    /* Custom font */
    body, h1, h2, h3, h4, h5, h6, .card-header, .card-body, .card-title, .card-text {
      font-family: 'Poppins', sans-serif;
      font-size: 1em; /* Adjust the font size as needed */
    }
    .text-justify {
      text-align: justify;
    }
    .text-center {
      text-align: center;
    }
    .number {
      font-size: 1.2em; /* Adjust the font size of numbers */
    }
    .data-card {
      margin-bottom: 20px;
    }
    .data-card-header {
      background-color: #223020; /* Industrialized color for data card headers */
      color: #fff;
      padding: 10px;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }
    .data-card-body {
      padding: 60px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .small-chart {
      width: 300px !important; /* Adjust the size as needed */
      height: 100px !important; /* Adjust the size as needed */
    }
  </style>
</head>
<body>
  <div class="container-fluid mt-4" style="margin-left: 228px;">
    <h1 class="mb-4">Admin Dashboard</h1>
    <div class="row">
      <div class="col-lg-5">
        <div class="card dashboard-card">
          <div class="card-header dashboard-card-header">
            Inventory Chart
          </div>
          <div class="card-body dashboard-card-body">
            <canvas id="inventoryChart"></canvas>
          </div>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="card dashboard-card">
          <div class="card-header dashboard-card-header">
            Stocks Chart
          </div>
          <div class="card-body dashboard-card-body">
            <canvas id="stocksChart"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-lg-10">
        <div class="card dashboard-card">
          <div class="card-header dashboard-card-header">
            Shop Sales
          </div>
          <div class="card-body dashboard-card-body">
            <div class="row">
              <!-- Donuts Sold Card -->
              <div class="col-lg-3">
                <div class="card data-card">
                  <div class="card-header text-center">
                    Donuts Sold
                  </div>
                  <div class="card-body data-card-body">
                    <p class="number">100</p>
                    <canvas class="small-chart" id="donutsChart"></canvas>
                  </div>
                </div>
              </div>
              <!-- Coffee Sold Card -->
              <div class="col-lg-3">
                <div class="card data-card">
                  <div class="card-header text-center">
                    Coffee Sold
                  </div>
                  <div class="card-body data-card-body">
                    <p class="number">150</p>
                    <canvas class="small-chart" id="coffeeChart"></canvas>
                  </div>
                </div>
              </div>
              <!-- Pastries Sold Card -->
              <div class="col-lg-3">
                <div class="card data-card">
                  <div class="card-header text-center">
                    Pastries Sold
                  </div>
                  <div class="card-body data-card-body">
                    <p class="number">200</p>
                    <canvas class="small-chart" id="pastriesChart"></canvas>
                  </div>
                </div>
              </div>
              <!-- Non-coffee Sold Card -->
              <div class="col-lg-3">
                <div class="card data-card">
                  <div class="card-header text-center">
                    Non-coffee Sold
                  </div>
                  <div class="card-body data-card-body">
                    <p class="number">60</p>
                    <canvas class="small-chart" id="nonCoffeeChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/dayjs"></script>
  <script>
    // Function to create small line charts with different colors
    function createSmallChart(ctx, data, color) {
      return new Chart(ctx, {
        type: 'line',
        data: {
          labels: data.map((item) => item.date),
          datasets: [{
            data: data.map((item) => item.value),
            borderColor: color,
            backgroundColor: color.replace('1)', '0.2)'),
            borderWidth: 1,
            fill: true,
            tension: 0.4, // Smooth the line
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            x: {
              display: false
            },
            y: {
              display: false
            }
          },
          plugins: {
            legend: {
              display: false
            }
          }
        }
      });
    }

    // Example sales data for each product
    const donutsSalesData = [
      { date: dayjs().subtract(4, 'month').format('MMM'), value: 42 },
      { date: dayjs().subtract(3, 'month').format('MMM'), value: 55 },
      { date: dayjs().subtract(2, 'month').format('MMM'), value: 25 },
      { date: dayjs().subtract(1, 'month').format('MMM'), value: 80 },
      { date: dayjs().format('MMM'), value: 100 }
    ];

    const coffeeSalesData = [
      { date: dayjs().subtract(4, 'month').format('MMM'), value: 60 },
      { date: dayjs().subtract(3, 'month').format('MMM'), value: 42 },
      { date: dayjs().subtract(2, 'month').format('MMM'), value: 75 },
      { date: dayjs().subtract(1, 'month').format('MMM'), value: 90 },
      { date: dayjs().format('MMM'), value: 150 }
    ];

    const pastriesSalesData = [
      { date: dayjs().subtract(4, 'month').format('MMM'), value: 70 },
      { date: dayjs().subtract(3, 'month').format('MMM'), value: 60 },
      { date: dayjs().subtract(2, 'month').format('MMM'), value: 110 },
      { date: dayjs().subtract(1, 'month').format('MMM'), value: 130 },
      { date: dayjs().format('MMM'), value: 200 }
    ];

    const nonCoffeeSalesData = [
      { date: dayjs().subtract(4, 'month').format('MMM'), value: 20 },
      { date: dayjs().subtract(3, 'month').format('MMM'), value: 13 },
      { date: dayjs().subtract(2, 'month').format('MMM'), value: 20 },
      { date: dayjs().subtract(1, 'month').format('MMM'), value: 50 },
      { date: dayjs().format('MMM'), value: 60 }
    ];

/*     const totalSalesData = [
      { date: dayjs().subtract(4, 'month').format('MMM'), value: 192 },
      { date: dayjs().subtract(3, 'month').format('MMM'), value: 235 },
      { date: dayjs().subtract(2, 'month').format('MMM'), value: 265 },
      { date: dayjs().subtract(1, 'month').format('MMM'), value: 325 },
      { date: dayjs().format('MMM'), value: 510 }
    ]; */

    // Colors for the charts
    const colors = {
      donuts: 'rgba(255, 99, 132, 1)',
      coffee: 'rgba(54, 162, 235, 1)',
      pastries: 'rgba(75, 192, 192, 1)',
      nonCoffee: 'rgba(153, 102, 255, 1)',
      total: 'rgba(255, 159, 64, 1)'
    };

    // Create small charts for each product with different colors
    createSmallChart(document.getElementById('donutsChart').getContext('2d'), donutsSalesData, colors.donuts);
    createSmallChart(document.getElementById('coffeeChart').getContext('2d'), coffeeSalesData, colors.coffee);
    createSmallChart(document.getElementById('pastriesChart').getContext('2d'), pastriesSalesData, colors.pastries);
    createSmallChart(document.getElementById('nonCoffeeChart').getContext('2d'), nonCoffeeSalesData, colors.nonCoffee);
/*     createSmallChart(document.getElementById('totalChart').getContext('2d'), totalSalesData, colors.total); */
  </script>
</body>
</html>
