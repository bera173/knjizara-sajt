<!DOCTYPE html>
<html lang="sr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Администраторска страница</title>
  <link rel="stylesheet" href="styles/admin.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a47266d986.js" crossorigin="anonymous"></script>
</head>
<body>

  <div class="container">
    <nav>
      <img src="styles/slike/logo-bijela.png" class="logo">
      
      <?php
        session_start();
        if (isset($_SESSION['username'])) {
          // Prikazujemo dugme za odjavu
          echo '<form method="post" action="logout-admin.php">';
          echo '<button type="submit" class="btn-l"><i class="fa-solid fa-user"></i>ОДЈАВИ СЕ</button>';
          echo '</form>';
        } else {
            
        }
      ?>
    </nav>

    
<br>
<br>
<br>

<div class="admin-wrapper">
      <div class="form-box login">
        <h2>Пријавите се</h2>
        <?php if (isset($_GET['login_error']) && $_GET['login_error'] == 1) : ?>
  <h3 class="error-message" style="font-size: 1em;
  color: #f5168d;
  text-align: center;">Погрешно корисничко име или лозинка</h3>
<?php endif; ?>
        <form action="login-admin.php" method="post">
          <div class="input-box">
            <span class="icon"><ion-icon name="mail"></ion-icon></span>
            <input type="username" name="username" required>
            <label>Корисничко име</label>
          </div>
          <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
            <input type="password" name="password" required>
            <label>Лозинка</label>
          </div>
          <div class="remember-forgot">
            <a href="#">Заборављена лозинка?</a>
          </div>
          <button type="submit" name="login" class="btn">Пријави се</button>

        </form>
      </div>

      
    </div>
      
    <footer style="position: fixed; ">
        <div class="row">
            <img src="styles/slike/logo-bijela.png" class="logo-f">
            <h1>Администраторска страница</h1>
          </div>
      <hr>
        <p class="copyright">Srđan Stupar  © 2023 - All Rights Reserved </p>

</footer>
  

  </div>
  
  
  <script src="script-admin.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>