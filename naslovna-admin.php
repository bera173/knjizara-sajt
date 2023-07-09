
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
      
      <ul class="nav-menu">
        <li><a href="naslovna-admin.php">НАСЛОВНА</a></li>
        <li><a href="dodaj-knjigu.php">КЊИГЕ</a></li>
        <li><a href="dodaj-igracku.php">ИГРАЧКЕ</a></li>
        <li><a href="dodaj-novost.php">НОВОСТИ</a></li>
      </ul>
      <?php
        session_start();
        if (isset($_SESSION['username'])) {
          // Prikazujemo dugme za odjavu
          echo '<form method="post" action="logout-admin.php">';
          echo '<button type="submit" class="btn-l"><i class="fa-solid fa-user"></i>ОДЈАВИ СЕ</button>';
          echo '</form>';
        } else {
          header("Location: index-admin.php");
          exit;
        }
      ?>


    </nav>

    
<br>
<br>
<br>


      
    <footer style="position: absolute;">
        <div class="row">
            <img src="styles/slike/logo-bijela.png" class="logo-f">
            <h1>Администраторска страница</h1>
          </div>
      <hr>
        <p class="copyright">Srđan Stupar  © 2023 - All Rights Reserved </p>

</footer>
  

  </div>
  
  
  
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>