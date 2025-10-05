<?php
// Transaction History
session_start();
if (!isset($_SESSION['expenses'])) {
    $_SESSION['expenses'] = [];
}

// Delete transaction
if (isset($_GET['delete'])) {
    $deleteIndex = (int) $_GET['delete'];
    if (isset($_SESSION['expenses'][$deleteIndex])) {
        unset($_SESSION['expenses'][$deleteIndex]);
        $_SESSION['expenses'] = array_values($_SESSION['expenses']); // reindex
    }
    header("Location: history.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transactions</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .delete-btn { 
      color: #fff; 
      background: #e74c3c; 
      padding: 4px 8px; 
      border-radius: 4px; 
      text-decoration: none; 
      font-size: 0.85em; 
      transition: background 0.3s ease;
    }
    .delete-btn:hover { background: #c0392b; }
    table { width: 100%; border-collapse: collapse; margin-top: 15px; }
    th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
    th { background: #f4f4f4; }

    /* ====== Responsive Sidebar + Overlay Integration ====== */
    @media (max-width: 900px) {
      .sidebar {
        position: fixed;
        top: 0;
        left: -250px;
        width: 250px;
        height: 100%;
        background: #ffffff;
        transition: left 0.3s ease;
        z-index: 1000;
      }

      .sidebar.active {
        left: 0;
      }

      /* Overlay effect when sidebar open */
      body::before {
        content: "";
        display: none;
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: rgba(0, 0, 0, 0.4);
        z-index: 900;
      }

      .sidebar.active + .main::before {
        content: "";
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: rgba(0, 0, 0, 0.4);
        z-index: 900;
      }

      .main {
        width: 100%;
        overflow-x: hidden;
      }

      header {
        justify-content: flex-start;
        gap: 15px;
      }

      .header-right {
        display: none;
      }

      .menu-toggle {
        display: inline-block;
        cursor: pointer;
        font-size: 22px;
        margin-right: 10px;
      }
    }
  </style>
</head>
<body>
  <div class="sidebar" id="sidebar">
    <div class="logo"><img src="images/CS LOGO.png" alt="CSS Tracker Logo"><h1>CSS Tracker</h1></div>
    <ul class="menu">
       <li><a class="nav-link" href="index.php">
          <img src="statcard/home.png" alt="Home" width="18" height="18"> Home
       </a></li>
       <li><a class="nav-link" href="transaction.php">
          <img src="statcard/transaction.png" alt="Transaction" width="25" height="25"> Transaction
       </a></li>
       <li><a class="nav-link active" href="history.php">
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
      <h2>Transaction History</h2>
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

    <section class="expense-table">
      <h3>Transaction History</h3>
      <table>
        <thead>
          <tr>
            <th>Date</th>
            <th>Description</th>
            <th>Type</th>
            <th>Amount</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($_SESSION['expenses'])): ?>
            <tr><td colspan="5">No transactions yet.</td></tr>
          <?php else: ?>
            <?php foreach ($_SESSION['expenses'] as $i => $exp): ?>
              <tr>
                <td><?php echo $exp['date']; ?></td>
                <td><?php echo htmlspecialchars($exp['description']); ?></td>
                <td><?php echo ucfirst($exp['type']); ?></td>
                <td>₱<?php echo number_format($exp['amount'], 2); ?></td>
                <td>
                  <a href="history.php?delete=<?php echo $i; ?>" 
                     onclick="return confirm('Delete this transaction?')" 
                     class="delete-btn">🗑️ Delete</a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </section>
  </div>

  <!-- Sidebar Toggle Script -->
  <script>
    const menuToggle = document.getElementById("menu-toggle");
    const sidebar = document.getElementById("sidebar");

    menuToggle.addEventListener("click", () => {
      sidebar.classList.toggle("active");
    });
  </script>
</body>
</html>
