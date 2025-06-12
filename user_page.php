<?php

session_start();

if (!isset($_SESSION['email'])) {
    header("Location: index.php"); 
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ROYAL HERITAGE</title>

  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet" />
  <link rel="icon" type="image/jpg" href="./img/logo.jpg" />
  <link href="https://cdn.boxicons.com/fonts/basic/boxicons.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="hotel.css" />
</head>

<body>

  <nav>
    <div class="navContainer">
      <div class="navLeft">
        <div class="navItem">
          <img src="./img/logo.jpg" alt="Royal Heritage Logo" class="navLogo" />
        </div>
      </div>

      <div class="navCenter">
      <div class="menuItem" data-room="deluxe">Deluxe Room</div>
      <div class="menuItem" data-room="executive">Executive Suite</div>
      <div class="menuItem" data-room="standard">Standard Room</div>
      <div class="menuItem" data-room="family">Family Suite</div>
      <div class="menuItem" data-room="presidential">Presidential Suite</div>
      <div class="menuItem" data-room="junior">Junior Suite</div>
      </div>

      <div class="navRight">
        <button class="logoutButton" onclick="window.location.href='index.php'">Log Out</button>
      </div>
    </div>
  </nav>

  <section class="slider">
    <div class="sliderContent">
      <h1 class="sliderTitle">Welcome to<br>Royal Heritage</h1>
      <p class="sliderSubtitle">Experience elegance and comfort like never before</p>
    </div>
    <button class="buyButton">View Rooms</button>
  </section>

  <section class="features">
    <div class="feature">
      <i class="bx bxs-wifi"></i>
      <span class="featureTitle">FREE WIFI</span>
      <span class="featureDesc">High-speed internet throughout the hotel.</span>
    </div>
    <div class="feature">
      <i class="bx bxs-sandwich"></i>
      <span class="featureTitle">BREAKFAST INCLUDED</span>
      <span class="featureDesc">Enjoy a variety of meals to start your day.</span>
    </div>
    <div class="feature">
      <i class="bx bxs-swimming-pool"></i>
      <span class="featureTitle">SWIMMING POOL</span>
      <span class="featureDesc">Relax in our outdoor infinity pool.</span>
    </div>
    <div class="feature">
      <i class="bx bxs-hot-tub"></i>
      <span class="featureTitle">SPA & WELLNESS</span>
      <span class="featureDesc">Rejuvenate with our premium spa services.</span>
    </div>
  </section>

  <section class="products" id="rooms">

    <div class="product" id="deluxe">
      <img src="./img/deluxe.webp" alt="Deluxe Room" class="productImg" />
      <div class="productDetails">
        <h1 class="productTitle">Deluxe Room</h1>
        <h2 class="productPrice">From RM299/night</h2>
        <p class="productDesc">A cozy room with sea view, king-sized bed, free Wi-Fi, and breakfast included.</p>
        <button class="productButton">BOOK NOW</button>
      </div>
    </div>

    <div class="product" id="executive">
      <img src="./img/excutive.jpg" alt="Executive Suite" class="productImg" />
      <div class="productDetails">
        <h1 class="productTitle">Executive Suite</h1>
        <h2 class="productPrice">From RM499/night</h2>
        <p class="productDesc">Elegant suite with living area and luxury amenities.</p>
        <button class="productButton">BOOK NOW</button>
      </div>
    </div>

    <div class="product" id="standard">
      <img src="./img/standard.jpg" alt="Standard Room" class="productImg" />
      <div class="productDetails">
        <h1 class="productTitle">Standard Room</h1>
        <h2 class="productPrice">From RM199/night</h2>
        <p class="productDesc">Comfortable room with essential amenities.</p>
        <button class="productButton">BOOK NOW</button>
      </div>
    </div>

    <div class="product" id="family">
      <img src="./img/family.jpg" alt="Family Suite" class="productImg" />
      <div class="productDetails">
        <h1 class="productTitle">Family Suite</h1>
        <h2 class="productPrice">From RM399/night</h2>
        <p class="productDesc">Spacious suite perfect for families, with multiple bedrooms and living space.</p>
        <button class="productButton">BOOK NOW</button>
      </div>
    </div>

    <div class="product" id="presidential">
      <img src="./img/presidential.jpg" alt="Presidential Suite" class="productImg" />
      <div class="productDetails">
        <h1 class="productTitle">Presidential Suite</h1>
        <h2 class="productPrice">From RM999/night</h2>
        <p class="productDesc">Ultimate luxury suite with private pool, panoramic views, and exclusive services.</p>
        <button class="productButton">BOOK NOW</button>
      </div>
    </div>

    <div class="product" id="junior">
      <img src="./img/junior.jpg" alt="Junior Suite" class="productImg" />
      <div class="productDetails">
        <h1 class="productTitle">Junior Suite</h1>
        <h2 class="productPrice">From RM349/night</h2>
        <p class="productDesc">Modern suite with a cozy sitting area and city views.</p>
        <button class="productButton">BOOK NOW</button>
      </div>
    </div>

  </section>

  <section class="gallery">
    <div class="galleryItem">
      <h1 class="galleryTitle">Relax & Unwind</h1>
      <img src="./img/spa.jpg" alt="Spa" class="galleryImg" />
    </div>
    <div class="galleryItem">
      <img src="./img/restaurant.jpg" alt="Restaurant" class="galleryImg" />
      <h1 class="galleryTitle">Dine in Elegance</h1>
    </div>
    <div class="galleryItem">
      <h1 class="galleryTitle">Breathtaking Views</h1>
      <img src="./img/view.jpg" alt="View" class="galleryImg" />
    </div>
  </section>

  <section class="newSeason">
    <div class="nsItem">
      <h1 class="nsTitle">Rhythm of the dance</h1>
      <img src="./img/events.jpg" alt="Event" class="nsImg" />
    </div>
    <div class="nsItem">
      <h3 class="nsTitleSm">EXCLUSIVE OFFERS</h3>
      <h1 class="nsTitle">New Experiences</h1>
      <h1 class="nsTitle">Await You</h1>
      <a href="#nav">
        <button class="nsButton">DISCOVER MORE</button>
      </a>
    </div>
    <div class="nsItem">
      <h1 class="nsTitle">Cool breeze</h1>
      <img src="./img/pool.jpg" alt="Pool" class="nsImg" />
    </div>
  </section>

  <footer>
    <div class="footerLeft">
      <div class="footerMenus">
        <div class="footerMenu">
          <h1 class="fMenuTitle">Hotel Info</h1>
          <ul class="fList">
            <li class="fListItem">About Us</li>
            <li class="fListItem">Contact</li>
            <li class="fListItem">Careers</li>
            <li class="fListItem">Gallery</li>
            <li class="fListItem">Location</li>
          </ul>
        </div>
        <div class="footerMenu">
          <h1 class="fMenuTitle">Services</h1>
          <ul class="fList">
            <li class="fListItem">Room Service</li>
            <li class="fListItem">Spa</li>
            <li class="fListItem">Dining</li>
            <li class="fListItem">Events</li>
            <li class="fListItem">Transport</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="footerRight">
      <div class="footerRightMenu">
        <h1 class="fMenuTitle">Subscribe to Our Channel</h1>
        <div class="fMail">
          <input type="text" placeholder="your@email.com" class="fInput" />
          <button class="fButton">Subscribe</button>
        </div>
      </div>
      <div class="footerRightMenu">
        <h1 class="fMenuTitle">Follow Us</h1>
        <div class="fIcons">
          <img src="./img/bird (1).jpeg" alt="Facebook" class="fIcon" />
          <img src="./img/bird (2).jpeg" alt="Twitter" class="fIcon" />
          <img src="./img/bird (3).jpeg" alt="Instagram" class="fIcon" />
          <img src="./img/bird (4).jpeg" alt="WhatsApp" class="fIcon" />
        </div>
      </div>
      <div class="footerRightMenu">
        <span class="copyright">&copy; Royal Heritage. All rights reserved. 2025.</span>
      </div>
    </div>
  </footer>

  <script src="app.js"></script>
</body>

</html>