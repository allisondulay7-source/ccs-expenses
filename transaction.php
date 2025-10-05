<?php
// Transaction page (Add + List transactions)
session_start();
if (!isset($_SESSION['expenses'])) {
    $_SESSION['expenses'] = [];
}

$success = null;

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $desc = trim($_POST['description'] ?? '');
    $amount = (float) ($_POST['amount'] ?? 0);
    $type = $_POST['type'] ?? 'outcome';

    if ($desc && $amount > 0) {
        $_SESSION['expenses'][] = [
            'description' => $desc,
            'amount' => $amount,
            'type' => $type,
            'date' => date("Y-m-d H:i")
        ];
        $success = true;
    } else {
        $success = false;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transaction</title>
  <link rel="stylesheet" href="style.css">
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <div class="logo">
        <img src="images/CS LOGO.png" alt="CSS Tracker Logo">
        <h1>CSS Tracker</h1>
    </div>
    <ul class="menu">
      <li><a class="nav-link" href="index.php">
        <img src="statcard/home.png" alt="Home" width="18" height="18"> Home
      </a></li>
      <li><a class="nav-link active" href="transaction.php">
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
      <h2>Transaction</h2>
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

    <!-- Add Transaction Form -->
    <section class="add-expense">
      <h3>Add Transaction</h3>
      <form method="POST">
        <input type="text" name="description" placeholder="Description" required>
        <input type="number" step="0.01" name="amount" placeholder="Amount" required>
        <select name="type">
          <option value="income">Income</option>
          <option value="outcome">Expense</option>
        </select>
        <button type="submit">➕ Add</button>
      </form>
    </section>
  </div>

  <!-- JavaScript -->
  <script>
    // Toggle Sidebar on Mobile
    const menuToggle = document.getElementById("menu-toggle");
    const sidebar = document.getElementById("sidebar");

    menuToggle.addEventListener("click", () => {
      sidebar.classList.toggle("active");
    });
  </script>

  <?php if ($success === true): ?>
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Transaction Added!',
        text: 'Your transaction was successfully recorded.',
        confirmButtonColor: '#141a15'
      });
    </script>
  <?php elseif ($success === false): ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Failed!',
        text: 'Please enter valid description and amount.',
        confirmButtonColor: '#d33'
      });
    </script>
  <?php endif; ?>
</body>
</html>
