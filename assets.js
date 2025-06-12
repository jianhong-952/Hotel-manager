// Theme change logic
const themes = ['default', 'light', 'blue', 'green', 'pink'];
const changeBtn = document.getElementById('change-theme');
const body = document.body;

let currentTheme = localStorage.getItem('theme') || 'default';
let themeIndex = themes.indexOf(currentTheme);
if (themeIndex === -1) themeIndex = 0;

function applyTheme(theme) {
    body.className = theme + '-theme';
    localStorage.setItem('theme', theme);
}
applyTheme(currentTheme);

changeBtn?.addEventListener('click', () => {
    themeIndex = (themeIndex + 1) % themes.length;
    applyTheme(themes[themeIndex]);
});

// Search functionality
document.getElementById('search')?.addEventListener('input', function () {
    const query = this.value.toLowerCase();
    document.querySelectorAll('#user-table tbody tr').forEach(row => {
        row.style.display = row.innerText.toLowerCase().includes(query) ? '' : 'none';
    });
});

// ✅ Show Summary button
document.getElementById('summary-button')?.addEventListener('click', () => {
    const rows = document.querySelectorAll('#user-table tbody tr');
    let total = 0;
    const roles = {};

    rows.forEach(row => {
        if (row.style.display !== 'none' && !row.classList.contains('no-data')) {
            total++;
            const role = row.children[3].innerText.trim();
            roles[role] = (roles[role] || 0) + 1;
        }
    });

    let summary = `Total Users: ${total}\n`;
    for (const [role, count] of Object.entries(roles)) {
        summary += `- ${role}: ${count}\n`;
    }

    alert(summary);
});