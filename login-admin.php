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
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Provjerite postoje li korisnički podaci u bazi podataka
    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Ako postoje korisnički podaci, prijavite se
        session_start();
        $_SESSION['username'] = $username;
        header("Location: naslovna-admin.php"); // preusmjeri na stranicu naslovna-admin.php nakon uspješne prijave
        exit();
    } else {
        // Ako korisnički podaci ne postoje, prikažite pogrešku
        header("Location: index-admin.php"); // preusmjeri na index-admin<y'šu6+ .php s parametrom za prikazivanje pogreške
        exit();
    }
}

// Zatvorite vezu s bazom podataka
$conn->close();
?>