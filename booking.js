const roomPrices = {
  "Standard Room": 199,
  "Deluxe Room": 299,
  "Executive Suite": 499,
  "Family Suite": 399,
  "Presidential Suite": 999,
  "Junior Suite": 349
};

function updateImage() {
  const room = document.getElementById("room").value;
  const img = document.getElementById("roomImage");
  const roomMap = {
    "Standard Room": "img/standard.jpg",
    "Deluxe Room": "img/deluxe.webp",
    "Executive Suite": "img/executive.jpg",
    "Family Suite": "img/family.jpg",
    "Presidential Suite": "img/presidential.jpg",
    "Junior Suite": "img/junior.jpg"
  };

  if (roomMap[room]) {
    img.src = roomMap[room];
    img.style.display = "block";
  } else {
    img.style.display = "none";
  }

  calculatePrice();
}

function calculatePrice() {
  const room = document.getElementById("room").value;
  const nights = parseInt(document.getElementById("nights").value);
  const guests = parseInt(document.getElementById("guests").value);
  const priceDisplay = document.getElementById("totalPrice");

  if (room && nights && guests) {
    const basePrice = roomPrices[room] || 0;
    const total = basePrice * nights + (guests - 1) * 20;
    priceDisplay.value = `$${total.toFixed(2)}`;
  } else {
    priceDisplay.value = "";
  }
}

document.getElementById("room").addEventListener("change", updateImage);
document.getElementById("nights").addEventListener("input", calculatePrice);
document.getElementById("guests").addEventListener("input", calculatePrice);

// Theme switching
const themes = ['theme-default', 'theme-dark', 'theme-ocean', 'theme-rose'];
let currentThemeIndex = 0;

function cycleTheme() {
  currentThemeIndex = (currentThemeIndex + 1) % themes.length;
  document.body.className = themes[currentThemeIndex];
  localStorage.setItem('luxuryTheme', themes[currentThemeIndex]);
}

window.onload = () => {
  const savedTheme = localStorage.getItem('luxuryTheme');
  if (savedTheme && themes.includes(savedTheme)) {
    document.body.className = savedTheme;
    currentThemeIndex = themes.indexOf(savedTheme);
  }
};