<?php
session_start();
require_once 'config.php';

$result = $conn->query("SELECT id, name, email, role FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Database</title>
     <link rel="icon" type="image/jpg" href="./img/logo.jpg" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="user.css">
</head>
<body class="default-theme">
    <header>
        <h1>👥 Registered Users</h1>
<div class="top-controls">
    <input type="text" id="search" placeholder="Search users...">

    <button id="change-theme" class="primary-button">🎨 Change Theme</button>

    <form action="summary.php" method="get" style="display:inline;">
        <button type="submit" class="primary-button">📊 Show Summary</button>
    </form>

    <form action="logout.php" method="post" style="display:inline;">
        <button type="submit" class="primary-button">🔓 Logout</button>
    </form>
</div>

    </header>

    <div class="container">
        <p class="user-summary">Total Users: <?= $result->num_rows ?></p>
        <table id="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id']) ?></td>
                            <td><?= htmlspecialchars($row['name']) ?></td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <td><?= htmlspecialchars($row['role']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="4" class="no-data">No users found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="assets/script.js"></script>
</body>
</html>

    <script>
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

        changeBtn.addEventListener('click', () => {
            themeIndex = (themeIndex + 1) % themes.length;
            applyTheme(themes[themeIndex]);
        });

        document.getElementById('search').addEventListener('input', function () {
            const query = this.value.toLowerCase();
            document.querySelectorAll('#user-table tbody tr').forEach(row => {
                row.style.display = row.innerText.toLowerCase().includes(query) ? '' : 'none';
            });
        });
    </script>
</body>
</html>