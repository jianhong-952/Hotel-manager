<?php
session_start();
require_once 'config.php';

$result = $conn->query("SELECT name, email, room, night, guest FROM customers");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Reservation Summary</title>
  <link rel="stylesheet" href="user.css" />
   <link rel="icon" type="image/jpg" href="./img/logo.jpg" />
  <script src="https://unpkg.com/lucide@latest" defer></script>
  <script src="assets.js" defer></script>
</head>
<body class="default-theme">

<header>
  <h1>
    <i data-lucide="calendar-heart" class="icon-inline"></i>
    Reservation Summary
  </h1>
<div class="top-controls">
  <div class="input-wrapper">
    <input type="text" id="search" placeholder="Search users..." />
  </div>

  <button id="change-theme" class="primary-button">
    <i data-lucide="brush" class="icon-inline"></i>
    🎨Change Theme
  </button>

  <form action="admin_page.php" method="get" style="display:inline;">
    <button type="submit" class="primary-button">
      <i data-lucide="arrow-left-circle" class="icon-inline"></i>
      📊Back
    </button>
  </form>

  <form action="logout.php" method="post" style="display:inline;">
    <button type="submit" class="primary-button">
      <i data-lucide="log-out" class="icon-inline"></i>
      🔓Logout
    </button>
  </form>
</div>
</header>

<main class="container">
    
  <table id="reservation-table">
    <thead>
      <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Room</th>
        <th>Total Nights</th>
        <th>Guests</th>
        <th>Total Price ($)</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch_assoc()): ?>
        <?php
          $room = strtolower(trim($row['room']));
          $nights = (int) $row['night'];
          $guests = (int) $row['guest'];

          if ($room === 'Deluxe Room') {
              $rate = 299;
              $roomName = "Deluxe Room";
          } elseif ($room === 'executive') {
              $rate = 499;
              $roomName = "Executive Suite";
          } elseif ($room === 'standard') {
              $rate = 199;
              $roomName = "Standard Room";
          } elseif ($room === 'family') {
              $rate = 399;
              $roomName = "Family Suite";
          } elseif ($room === 'presidential') {
              $rate = 999;
              $roomName = "Presidential Suite";
          } elseif ($room === 'junior') {
              $rate = 349;
              $roomName = "Junior Suite";
          } else {
              $rate = 60;
              $roomName = "Unknown Room";
          }

          $price = $rate * $nights * $guests;
        ?>
        <tr>
          <td><?= htmlspecialchars($row['name']) ?></td>
          <td><?= htmlspecialchars($row['email']) ?></td>
          <td><?= htmlspecialchars($roomName) ?></td>
          <td><?= $nights ?></td>
          <td><?= $guests ?></td>
          <td><?= number_format($price, 2) ?></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</main>

</body>
</html>

