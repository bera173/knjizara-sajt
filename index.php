<!DOCTYPE html>
<html lang="sr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Књижара Ћирилица</title>
  <link rel="stylesheet" href="styles/style.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a47266d986.js" crossorigin="anonymous"></script>
</head>
<body>

  <div class="container">
    <nav>
      <img src="styles/slike/logo-bijela.png" class="logo">
      <ul>
        <li><a href="index.php">ПОЧЕТНА</a></li>
        <li><a href="knjige.php">КЊИГЕ</a></li>
        <li><a href="igračke.php">ИГРАЧКЕ</a></li>
        <li><a href="">КОНТАКТ</a></li>
      </ul>
      <?php
        session_start();
        if (isset($_SESSION['email'])) {
          // Ako je korisnik prijavljen, prikazujemo dugme za korpu (korpa.php)
          echo '<form method="post" action="korpa.php">';
          echo '<button type="submit" class="btn-k"><i class="fa-solid fa-basket-shopping"></i>КОРПА</button>';
          echo '</form>';
          // Prikazujemo dugme za odjavu
          echo '<form method="post" action="logout.php">';
          echo '<button type="submit" class="btn-l"><i class="fa-solid fa-user"></i>ОДЈАВИ СЕ</button>';
          echo '</form>';
        } else {
          // Ako korisnik nije prijavljen, prikazujemo dugme za prijavu
          echo '<button class="btn-l"><i class="fa-solid fa-user"></i>ПРИЈАВИ СЕ</button>';
          
        }
      ?>
    </nav>

    <div class="content">
      <h1>Зароните у свијет литературе</h1>
      <p>Добродошли у Књижару Ћирилица - место где се сусрећу љубитељи књига свих узраста и укуса! </p>
    <form>
      <input type="text" placeholder="Име књиге">
      <button type="submit" class="btn">Претражи</button>
    </form>
  </div>
<br>
<br>
<br>
    <div class="wrapper">
      <span class="icon-close">
        <ion-icon name="close-outline"></ion-icon>
    </span>
      <div class="form-box login">
        <h2>Пријавите се</h2>
        <?php if (isset($_GET['login_error']) && $_GET['login_error'] == 1) : ?>
  <h3 class="error-message" style="font-size: 1em;
  color: #f5168d;
  text-align: center;">Погрешан е-маил или лозинка</h3>
<?php endif; ?>
        <form action="login.php" method="post">
          <div class="input-box">
            <span class="icon"><ion-icon name="mail"></ion-icon></span>
            <input type="email" name="email" required>
            <label>E-Mail</label>
          </div>
          <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
            <input type="password" name="password" required>
            <label>Лозинка</label>
          </div>
          <div class="remember-forgot">
            <label><input type="checkbox">Запамти лозинку</label>
            <a href="#">Заборављена лозинка?</a>
          </div>
          <button type="submit" name="login" class="btn">Пријави се</button>
          <div class="login-register">
            <p>Нисте пријављени?<a href="#" class="register-link">Региструјте се</a></p>
          </div>
        </form>
      </div>

      <div class="form-box register">
        <h2>Региструјте се</h2>
        <form action="registracija.php" method="post">
          <div class="input-box">
            <span class="icon"><ion-icon name="person"></ion-icon></span>
            <input type="text" name="firstName" required>
            <label>Име</label>
          </div>
          <div class="input-box">
            <span class="icon"><ion-icon name="person"></ion-icon></span>
            <input type="text" name="lastName" required>
            <label>Презиме</label>
          </div>
          <div class="input-box">
            <span class="icon"><ion-icon name="mail"></ion-icon></span>
            <input type="email" name="email" required>
            <label>E-Mail</label>
          </div>
          <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
            <input type="password" name="password" required>
            <label>Лозинка</label>
          </div>
          <div class="remember-forgot">
            <label><input type="checkbox">Прихватате услове кориштења?</label>
          </div>
          <button type="submit" class="btn">Региструј се</button>
          <div class="login-register">
            <p>Већ сте регистровани?<a href="#" class="login-link">Пријавите се</a></p>
          </div>
        </form>
      </div>
    </div>
      
    
    
        <div class="novosti-heading">
          <h1>Новости</h1>
        </div>
<section id="novosti">
<div class="novosti-container">
      <?php 
        // Povezivanje na bazu podataka
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "knjizara";
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Provjera da li je došlo do greške u povezivanju
        if ($conn->connect_error) {
        die("Грешка у повезивању са базом пдоатака: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM novosti ORDER BY id DESC";
        $res = mysqli_query($conn, $sql );

        if(mysqli_num_rows($res) > 0){
            while ($novosti = mysqli_fetch_assoc($res)){ ?>
             
            

                    <!--novosti-1-->
              <div class="novosti-box">

                <div class="novosti-img">
                  <img src="slike/<?=$novosti['slika']?>" alt="Blog">
                </div>

                <div class="novosti-text">
                  <a href="#" class="novosti-title"><?=$novosti['naslov']?></a>
                  <h1><?=$novosti['podnaslov']?></h1>
                  <h4>Аутор:<?=$novosti['autor']?></h2>
                  <a class="link" href="">Прочитај више</a>
                  <span class="datum"><?=date("j.n.Y", strtotime($novosti['datum_objave']))?></span>
                </div>

              </div>

            
            
        <?php } }?>
        </div>
</section>        

        
    

    
      
    <footer>

      <div class="row">

        <div class="col">
          <img src="styles/slike/logo-bijela.png" class="logo-f">
          <p>Добродошли у књижару Ћирилица, ваше омиљено мјесто за проналазак нових књига и откривање нових свјетова. </p>
        </div> 
        <div class="col-office">
          <h3>Књижара Ћирилица</h3>
          <p>Бања Лука, Република Српска, Босна и Херцеговина</p>
          <p>Јована Рашковића 14</p>
          <p>08:00h - 20:00h</p>
          <p class="email-id">knjizaraćirilica@outlook.com</p>
          <h4>+387 052 654 788</h4>
        </div>
        <div class="col-info">
          <h3>Информације</h3>
          <ul>
            <li><a href="">Почетна</a></li>
            <li><a href="">Услуге</a></li>
            <li><a href="">Догађаји</a></li>
            <li><a href="">О нама</a></li>
            <li><a href="">Контакт</a></li>
          </ul>
        </div>
        <div class="col-news">
          <h3>Новости</h3>
          <form class="col-form-news">
            <ion-icon name="mail-outline"></ion-icon>
            <input type="email" placeholder="Унесите e-mail" required>
            <button type="submit"><i class="fa-solid fa-arrow-right"></i></button>
          </form>
          <div class="social-icons">
              <a href=""><i class="fa-brands fa-facebook"></i></a>
              <a href=""><i class="fa-brands fa-twitter"></i></a>
              <a href=""><i class="fa-brands fa-instagram"></i></a>
              <a href=""><i class="fa-brands fa-pinterest"></i></a>
          </div>
          
        </div>
        
        

      </div>
      <hr>
        <p class="copyright">Srđan Stupar  © 2023 - All Rights Reserved </p>

</footer>
  

  </div>
  
  
  <script src="script.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>