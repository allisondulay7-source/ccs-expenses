<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Settings</title>
  <link rel="stylesheet" href="style.css">
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

      <li><a class="nav-link" href="transaction.php">
        <img src="statcard/transaction.png" alt="Transaction" width="25" height="25"> Transaction
      </a></li>

      <li><a class="nav-link" href="history.php">
        <img src="statcard/history.png" alt="History" width="25" height="25"> History
      </a></li>

      <li><a class="nav-link active" href="settings.php">
        <img src="statcard/settings.png" alt="Settings" width="18" height="18"> Settings
      </a></li>
    </ul>
  </div>

  <!-- Main Content -->
  <div class="main">
    <header>
      <div class="menu-toggle" id="menu-toggle">☰</div>
      <h2>Settings</h2>
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

    <section class="settings-section">
      <h3>Settings</h3>
      <p>Settings page content goes here.</p>
    </section>
  </div>

  <!-- Sidebar Toggle JS -->
  <script>
    const menuToggle = document.getElementById("menu-toggle");
    const sidebar = document.getElementById("sidebar");

    menuToggle.addEventListener("click", () => {
      sidebar.classList.toggle("active");
    });
  </script>
</body>
</html>
