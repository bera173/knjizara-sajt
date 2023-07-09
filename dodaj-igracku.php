
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
    <div class="dodajknjigu">
        <h2>Додај играчку</h2>
	    <form method="post" action="dodaj-igracku.php" enctype="multipart/form-data">
                
            <label for="naziv">Назив:</label><br>
            <input type="text" id="naziv" name="naziv"><br>

            <label for="proizvodjac">Произвођач:</label><br>
            <input type="text" id="proizvodjac" name="proizvodjac"  maxlength="50"><br>

            <label for="opis">Опис:</label><br>
            <textarea id="opis" name="opis"></textarea><br>

            <label for="cijena">Цијена:</label><br>
            <input type="number" id="cijena" name="cijena"><br>

            <label for="kolicina">Количина:</label><br>
            <input type="number" id="kolicina" name="kolicina"><br>

            <label for="slika">Слика:</label>
            <input type="file" id="slika" name="slika">
           
            <br>

            <?php if (isset($_GET['error'])): ?>
              <p style="color:white;"><?php echo $_GET['error']; ?></p>
              <?php endif ?>
		    <input type="submit" value="Додај играчку">

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

                    // Provjera da li je forma podataka poslana metodom POST
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $naziv = $_POST['naziv'];
                    $proizvodjac = $_POST['proizvodjac'];
                    $opis = $_POST['opis'];
                    $cijena = $_POST['cijena'];
                    $kolicina = $_POST['kolicina'];

                    if (isset($_FILES['slika'])){
    
                      
                      $img_name = $_FILES['slika']['name'];
                      $img_size = $_FILES['slika']['size'];
                      $tmp_name = $_FILES['slika']['tmp_name'];
                      $error = $_FILES['slika']['error'];
                  
                      if($error === 0){
                        if($img_size > 1900000 ){
                          $em = "Слика је превелика.";
                          header("Location: dodaj-igracku.php?error=$em"); 
                        }else{
                          $img_ex = pathInfo($img_name, PATHINFO_EXTENSION);
                          $img_ex_lc = strtolower($img_ex);
                          
                          $allowed_exs = array("jpg", "jpeg", "png");

                          if(in_array($img_ex_lc, $allowed_exs)){
                            $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                            $img_upload_path = 'slike/'.$new_img_name;
                            move_uploaded_file($tmp_name, $img_upload_path);
                            
                            
                          }else{
                            $em = "Не можете додати овај формат фајла.";
                            header("Location: dodaj-igracku.php?error=$em"); 
                          }
                        }
                      }else{
                          $em = "Играчка није додана.";
                          header("Location: dodaj-igracku.php?error=$em"); 
                      }
                  
                  }else{
                      header("Location: dodaj-igracku.php");
                  }

                    // Kreiranje SQL upita za dodavanje novog zapisa u bazu podataka
                    $sql = "INSERT INTO igračke (naziv, proizvodjac, opis, cijena, kolicina, slika) 
                    VALUES ('$naziv', '$proizvodjac', '$opis', '$cijena', '$kolicina', '$new_img_name')";

                    // Izvršavanje SQL upita na bazi podataka
                    if ($conn->query($sql) === TRUE) {
                        echo "<p style='color: white; font-size: 16px; text-align: center;'>Играчка успјешно додана</p>";
                    } else {
                        echo "Грешка приликом додавања: " . $conn->error;
                    }
                    }

                    // Zatvaranje konekcije na bazu podataka
                    $conn->close();
                ?>
    </div>
    
<br>
<br>
<br>


      
    <footer>
        <div class="row">
            <img src="styles/slike/logo-bijela.png" class="logo-f">
            <h1>Администраторска страница</h1>
          </div>
      <hr>
        <p class="copyright">Srđan Stupar  © 2023 - All Rights Reserved </p>

</footer>
  

  </div>
  
  
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

    
</script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
  
  
  
