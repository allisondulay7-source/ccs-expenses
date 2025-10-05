<?php
// Dashboard (Stats + Charts only)
session_start();
if (!isset($_SESSION['expenses'])) {
    $_SESSION['expenses'] = [];
}

$income = 0;
$outcome = 0;

// Compute totals from session
foreach ($_SESSION['expenses'] as $exp) {
    if ($exp['type'] === 'income') {
        $income += $exp['amount'];
    } else {
        $outcome += $exp['amount'];
    }
}

$profit = $income - $outcome;
$total_balance = $income - $outcome;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <div class="logo">
        <img src="images/CS LOGO.png" alt="CSS Tracker Logo">
        <h1>CSS Tracker</h1>
    </div>
    <ul class="menu">
      <li><a class="nav-link active" href="index.php">
        <img src="statcard/home.png" alt="Home" width="18" height="18"> Home
      </a></li>
      <li><a class="nav-link" href="transaction.php">
        <img src="statcard/transaction.png" alt="Transaction" width="25" height="25"> Transaction
      </a></li>
      <li><a class="nav-link" href="history.php">
        <img src="statcard/history.png" alt="History" width="25" height="25"> History
      </a></li>
      <li><a class="nav-link" href="settings.php">
        <img src="statcard/settings.png" alt="Settings" width="18" height="18"> Settings
      </a></li>
    </ul>
  </div>

  <!-- Main -->
  <div class="main">
    <header>
      <div class="menu-toggle" id="menu-toggle">☰</div>
      <h2>Dashboard</h2>
      <div class="search-bar">
        <input type="text" placeholder="Type here to search">
        <i class="search-icon">🔍</i>
      </div>
      <div class="header-right">
        <i class="notif">🔔</i>
        <div class="profile">
          <img src="https://i.pravatar.cc/40" alt="Profile">
          <span>Jaka</span>
        </div>
        <button class="dropdown">Monthly ⌄</button>
      </div>
    </header>

    <!-- Stats Cards -->
    <section class="stats">
      <div class="card income">
        <div class="card-icon"><img src="grenpic/inc.png" alt="Income"></div>
        <div class="card-info">
          <p>Income</p>
          <h3>₱<?php echo number_format($income, 2); ?></h3>
        </div>
      </div>
      <div class="card outcome">
        <div class="card-icon"><img src="grenpic/outcome.png" alt="Outcome"></div>
        <div class="card-info">
          <p>Outcome</p>
          <h3>₱<?php echo number_format($outcome, 2); ?></h3>
        </div>
      </div>
      <div class="card profit">
        <div class="card-icon"><img src="grenpic/profits.png" alt="Profit"></div>
        <div class="card-info">
          <p>Profit</p>
          <h3>₱<?php echo number_format($profit, 2); ?></h3>
        </div>
      </div>
      <div class="card balance">
        <div class="card-icon"><img src="grenpic/wallet.png" alt="Balance"></div>
        <div class="card-info">
          <p>Total Balance</p>
          <h3>₱<?php echo number_format($total_balance, 2); ?></h3>
        </div>
      </div>
    </section>

    <!-- Charts -->
    <section class="charts">
      <div class="chart-box">
        <h3>Expense Chart</h3>
        <canvas id="expenseChart"></canvas>
      </div>
      <div class="chart-box">
        <h3>Total Expense</h3>
        <canvas id="totalExpenseChart"></canvas>
      </div>
    </section>
  </div>

  <!-- PHP values -->
  <script>
    const incomeValue = <?php echo $income; ?>;
    const outcomeValue = <?php echo $outcome; ?>;

    // Toggle Sidebar on Mobile
    const menuToggle = document.getElementById("menu-toggle");
    const sidebar = document.getElementById("sidebar");

    menuToggle.addEventListener("click", () => {
      sidebar.classList.toggle("active");
    });
  </script>
  <script src="script.js"></script>
</body>
</html>
