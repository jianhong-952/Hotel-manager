<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "user_hotel";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $room = $_POST['room'] ?? '';
    $nights = $_POST['nights'] ?? '';
    $guests = $_POST['guests'] ?? '';

    if ($name && $email && $room && $nights && $guests) {
        $stmt = $conn->prepare("INSERT INTO customers (name, email, room, night, guest) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssii", $name, $email, $room, $nights, $guests);

        if ($stmt->execute()) {
       
            header("Location: success.php");
            exit();
        } else {
            $errorMsg = "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $errorMsg = "Please fill in all fields.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Royal Heritage Hotel Booking</title>
  <link rel="stylesheet" href="booking.css" />
  <link rel="icon" type="image/jpg" href="./img/logo.jpg" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body class="theme-default">

<!-- Theme Switch Button -->
<button class="theme-button" onclick="cycleTheme()">🎨</button>

<header>
  <h1>Royal Heritage Hotel Booking</h1>
  <h4>Experience the pinnacle of comfort and sophistication in our luxury hotel room</h4>
</header>

<main>
  <section class="booking-container">
    <form method="post" action="">
      <div class="input-group">
        <i class="icon fa fa-user"></i>
        <input type="text" name="username" id="username" placeholder=" " required>
        <label for="username">Full Name</label>
      </div>

      <div class="input-group">
        <i class="icon fa fa-envelope"></i>
        <input type="email" name="email" id="email" placeholder=" " required>
        <label for="email">Email Address</label>
      </div>

      <div class="input-group">
        <i class="icon fa fa-bed"></i>
        <select name="room" id="room" required>
          <option value="" disabled selected>-- Select Room --</option>
          <option value="Standard Room">Standard Room</option>
          <option value="Deluxe Room">Deluxe Room</option>
          <option value="Executive Suite">Executive Suite</option>
          <option value="Family Suite">Family Suite</option>
          <option value="Presidential Suite">Presidential Suite</option>
          <option value="Junior Suite">Junior Suite</option>
        </select>
        <label for="room">Room Type</label>
      </div>

      <div class="image-preview">
        <img id="roomImage" src="" alt="Room Preview">
      </div>

      <div class="input-group">
        <i class="icon fa fa-moon"></i>
        <input type="number" name="nights" id="nights" placeholder=" " min="1" required>
        <label for="nights">Number of Nights</label>
      </div>

      <div class="input-group">
        <i class="icon fa fa-users"></i>
        <input type="number" name="guests" id="guests" placeholder=" " min="1" required>
        <label for="guests">Number of Guests</label>
      </div>

      <div class="input-group">
        <i class="icon fa fa-dollar-sign"></i>
        <input type="text" id="totalPrice" readonly placeholder=" " />
        <label for="totalPrice">Total Price</label>
      </div>
      <div class="hello">
      <button class="book-now" type="submit">Book Now</button>
      <button class="book-now" onclick="window.location.href='user_page.php'">Back</button>
</form>
      
</div>
    
  </section>
</main>

<script src="booking.js"></script>
</body>
</html>