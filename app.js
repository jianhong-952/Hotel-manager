document.querySelectorAll('.menuItem').forEach(item => {
  item.addEventListener('click', () => {
    const room = item.getAttribute('data-room');
    const target = document.getElementById(room);
    if (target) {
      target.scrollIntoView({ behavior: 'smooth' });
    }
  });
});

document.querySelector('.buyButton').addEventListener('click', () => {
  const roomsSection = document.getElementById('rooms');
  if (roomsSection) {
    roomsSection.scrollIntoView({ behavior: 'smooth' });
  }
});

document.querySelector('.nsButton').addEventListener('click', (e) => {
  e.preventDefault(); // prevent default anchor jump
  const roomsSection = document.getElementById('rooms');
  if (roomsSection) {
    roomsSection.scrollIntoView({ behavior: 'smooth' });
  }
});

document.querySelector('.fButton').addEventListener('click', (e) => {
  e.preventDefault(); // Prevent default form submission or button behavior
  window.scrollTo({ top: 0, behavior: 'smooth' });
});

document.querySelectorAll('.productButton').forEach(button => {
  button.addEventListener('click', () => {
    window.location.href = 'booking.php';  // change 'booking.html' to your target page
  });
});

