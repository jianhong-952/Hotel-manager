<?php

session_start();

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];
$activeForm = $_SESSION['active_form'] ?? 'login';

unset($_SESSION['login_error'], $_SESSION['register_error'], $_SESSION['active_form']);

function showError($error){
    return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}

function isActiveForm($formName, $activeForm) {
    return $formName === $activeForm ? 'active' : '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Royal Heritage</title>
  <link rel="icon" type="image/jpg" href="img/logo.jpg" />
  <link href="https://cdn.boxicons.com/fonts/basic/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div class="container">

    <div class="wrapper <?= isActiveForm('login', $activeForm); ?>" id="login-form">
      <form action="royal_heritage.php" method="post">
        <h2>Login</h2>
         <?= showError($errors['login']); ?>
        <div class="input-box">
          <input type="text" name="email" placeholder="Email" required autocomplete="off" />
          <i class="bx bx-mail-open"></i>
        </div>
        <div class="input-box">
          <input type="password" name="password" placeholder="Password" required autocomplete="off" />
          <i class="bx bx-lock"></i>
        </div>
        <button type="submit" name="login" class="btn">Login</button>
        <div class="register-link">
          <p>Don't have an account? <a href="#" onclick="showForm('register-form')">Register</a></p>
        </div>
      </form>
    </div>

    <div class="wrapper <?= isActiveForm('register', $activeForm); ?>" id="register-form">
      <form action="royal_heritage.php" method="post">
        <h2>Register</h2>
        <?= showError($errors['register']); ?>
        <div class="input-box">
          <input type="text" name="name" placeholder="Username" required autocomplete="off"/>
          <i class="bx bx-user"></i>
        </div>
        <div class="input-box">
          <input type="email" name="email" placeholder="Email" required autocomplete="off" />
          <i class="bx bx-mail-open"></i>
        </div>
        <div class="input-box">
          <input type="password" name="password" placeholder="Password" required autocomplete="off" />
          <i class="bx bx-lock"></i>
        </div>
        <div class="input-box">
          <select name="role" required>
            <option value="user">User</option>
            <option value="admin">Admin</option>
          </select>
          <i class="bx bx-arrow-out-up-right-square"></i>
        </div>
        <button type="submit" name="register" class="btn">Register</button>
        <div class="register-link">
          <p>Already have an account? <a href="#" onclick="showForm('login-form')">Login</a></p>
        </div>
      </form>
    </div>
  </div>


  <script>
    function showForm(formId) {
      document.getElementById('login-form').classList.remove('active');
      document.getElementById('register-form').classList.remove('active');
      document.getElementById(formId).classList.add('active');
    }
  </script>
</body>
</html>
