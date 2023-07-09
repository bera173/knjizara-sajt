<!DOCTYPE html>
<html lang="sr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Књижара Ћирилица</title>
  <link rel="stylesheet" href="styles/korpa.css">
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
        <li><a href="kontakt.php">КОНТАКТ</a></li>
      </ul>
      <?php
        session_start();
        if (isset($_SESSION['email'])) {
          // Ako je korisnik prijavljen   
          // Prikazujemo dugme za odjavu
          echo '<form method="post" action="logout.php">';
          echo '<button type="submit" class="btn-l"><i class="fa-solid fa-user"></i>ОДЈАВИ СЕ</button>';
          echo '</form>';
        } else {
          // Ako korisnik nije prijavljen, prikazujemo dugme za prijavu
          header("Location: index.php");
          exit;
        }
      ?>
    </nav>

    <br>

    <?php
// Povezivanje na bazu podataka
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "knjizara";
$conn = new mysqli($servername, $username, $password, $dbname);

// Provjera da li je došlo do greške u povezivanju
if ($conn->connect_error) {
    die("Грешка у повезивању са базом података: " . $conn->connect_error);
}

// Dohvaćanje email-a iz sesije
$email = $_SESSION['email'];

// Izvršavanje upita za dohvaćanje podataka iz tabele korpa za određeni email
$sql = "SELECT * FROM korpa WHERE email = '$email'";
$result = $conn->query($sql);

?>



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
      
    <section class="korpa">
  <div class="korpa-heading">
    <h1>Ваша корпа</h1>
    <hr>
  </div>

  <div class="korpa-content">
    <table>
      <thead>
        <tr>
          <th class="naziv-p">Назив производа</th>
          <th class="cijena-p">Цијена</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Povezivanje na bazu podataka
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "knjizara";
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Provjera da li je došlo do greške u povezivanju
        if ($conn->connect_error) {
            die("Грешка у повезивању са базом података: " . $conn->connect_error);
        }

        // Dohvaćanje email-a iz sesije
        $email = $_SESSION['email'];

        // Izvršavanje upita za dohvaćanje podataka iz tabele korpa za određeni email
        $sql = "SELECT * FROM korpa WHERE email = '$email'";
        $result = $conn->query($sql);

        // Provjera da li postoji rezultat
        if ($result->num_rows > 0) {
            // Inicijalizacija ukupne cijene
            $ukupno = 0;

            // Prikazivanje podataka za svaki redak rezultata
            while ($row = $result->fetch_assoc()) {
                $nazivProizvoda = $row['proizvod'];
                $cijena = $row['cijena'];

                // Dodavanje cijene na ukupnu cijenu
                $ukupno += $cijena;
                ?>
                <tr>
                  <td class="naziv"><?php echo $nazivProizvoda; ?></td>
                  <td class="cijena"><?php echo $cijena; ?>  КМ</td>
                </tr>
                <?php
            }
        } else {
            // Nema rezultata, prikaži poruku da je korpa prazna
            echo "<tr><td colspan='2'>Корпа је празна.</td></tr>";
        }

        // Zatvaranje konekcije s bazom podataka
        $conn->close();
        ?>
      </tbody>
    </table>
    <hr>

    <?php if ($result->num_rows > 0) { ?>
      <div class="ukupno">
        <div class="cijena-ukupno">
          <h1>Укупно: <?php echo $ukupno; ?> КМ</h1>
        </div>
      </div>
    <?php } ?>
  </div>
</section>



        <div class="porudzbina">
          <form action="poruci.php">
            <button class="btn">Поручи</button>
          </form>
        </div>


    

  </div>
  
  
  <script src="script.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>