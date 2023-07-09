<?php
// Podaci za povezivanje s bazom podataka
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'knjizara';

// Povezivanje s bazom podataka
$conn = new mysqli($host, $username, $password, $dbname);

// Provjerite jesu li podaci obrađeni nakon slanja obrasca
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Dohvaćanje vrijednosti e-pošte i lozinke iz obrasca
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Provjerite postoje li korisnički podaci u bazi podataka
    $sql = "SELECT * FROM korisnici WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Ako postoje korisnički podaci, prijavite se
        session_start();
        $_SESSION['email'] = $email;
        header("Location: ".$_SERVER['HTTP_REFERER']); // preusmjeri na stranicu za dobrodošlicu
        exit();
    } else {
        // Ako korisnički podaci ne postoje, prikažite pogrešku
        header("Location: index.php?login_error=1"); // preusmjeri na index.php s parametrom za prikazivanje pogreške
        exit();
    }
}

// Zatvorite vezu s bazom podataka
$conn->close();
?>