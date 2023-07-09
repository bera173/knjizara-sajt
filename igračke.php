<!DOCTYPE html>
<html lang="sr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Књижара Ћирилица</title>
  <link rel="stylesheet" href="styles/igracke.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a47266d986.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

  <div class="container">
    <nav>
      <img src="logo-bijela.png" class="logo">
      <ul>
        <li><a href="index.html">ПОЧЕТНА</a></li>
        <li><a href="knjige.html">КЊИГЕ</a></li>
        <li><a href="igračke.html">ИГРАЧКЕ</a></li>
        <li><a href="">КОНТАКТ</a></li>
      </ul>
          <button type="submit" class="btn-k"><i class="fa-solid fa-basket-shopping"></i>КОРПА</button>
    </nav>

    <div class="content">
      <h1>Зароните у свијет литературе</h1>
      <p>Добродошли у Књижару Ћирилица - место где се сусрећу љубитељи књига свих узраста и укуса! </p>
    <form >
      <input type="text" placeholder="Име књиге">
      <button type="submit" class="btn">Претражи</button>
    </form>
  </div>
<br>
<br>
<br>
   
       <section id="igracke">


      
        <div class="igracke-container">
          
                <!--igračke-1-->
                <div class="igracke-box">   
                    
                    <div class="igracke-img">
                      <img src="slike/<?php echo $igračke['slika']; ?>
                    </div>
                    <div class="igracke-text">
                      <a href="#" class="igracke-title"><?php echo $igračke['naziv']; ?></a>
                      <h1><?php echo $igračke['proizvodjac']; ?></h1>
                      <h4><?php echo $igračke['opis']; ?></h4>          
                      <h1 class="cijena"><?php echo $igračke['cijena']; ?>КМ</h1>         
                      <button class="dodaj-btn" name="dodajUKosaricu" data-id="<?php echo $igračke['id']; ?>" data-kolicina="kolicina_<?php echo $igračke['id']; ?>">Додај у корпу</button>                                             
                          
                    </div>      
                    
                </div>
        </div>

    </section>
      
    <footer>

      <div class="row">

        <div class="col">
          <img src="logo-bijela.png" class="logo-f">
          <p>Добродошли у књижару Ћирилица, ваше омиљено мјесто за проналазак нових књига и откривање нових свјетова.  </p>
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