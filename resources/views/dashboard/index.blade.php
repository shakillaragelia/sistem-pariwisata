<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ChartJS Dashboard</title>
  <link rel="stylesheet" href="../../assets/css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <div class="container">
    <h2>ChartJS Overview</h2>
    <div class="chart-section">
      <h3>Line Chart</h3>
      <canvas id="lineChart" height="100"></canvas>
    </div>
    <div class="chart-section">
      <h3>Bar Chart</h3>
      <canvas id="barChart" height="100"></canvas>
    </div>
    <div class="chart-section">
      <h3>Doughnut Chart</h3>
      <canvas id="doughnutChart" height="100"></canvas>
    </div>
  </div>

  <script>
    // Line Chart
    const lineCtx = document.getElementById('lineChart').getContext('2d');
    new Chart(lineCtx, {
      type: 'line',
      data: {
        labels: ['January', 'February', 'March', 'April'],
        datasets: [{
          label: 'Traffic',
          data: [150, 200, 180, 220],
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 2,
          fill: false
        }]
      },
      options: {
        responsive: true
      }
    });

    // Bar Chart
    const barCtx = document.getElementById('barChart').getContext('2d');
    new Chart(barCtx, {
      type: 'bar',
      data: {
        labels: ['Product A', 'Product B', 'Product C', 'Product D'],
        datasets: [{
          label: 'Sales',
          data: [300, 250, 400, 320],
          backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e']
        }]
      },
      options: {
        responsive: true
      }
    });

    // Doughnut Chart
    const doughnutCtx = document.getElementById('doughnutChart').getContext('2d');
    new Chart(doughnutCtx, {
      type: 'doughnut',
      data: {
        labels: ['Desktop', 'Mobile', 'Tablet'],
        datasets: [{
          label: 'Device Usage',
          data: [60, 25, 15],
          backgroundColor: ['#007bff', '#28a745', '#ffc107']
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom'
          }
        }
      }
    });
  </script>
</body>
</html>
