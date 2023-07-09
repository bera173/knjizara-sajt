<?php
// Podaci za povezivanje na bazu podataka
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "knjizara";

// Povezivanje na bazu podataka
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Provjera uspostavljanja veze
if (!$connection) {
    die("Neuspjelo povezivanje na bazu podataka: " . mysqli_connect_error());
}

// Provjerite je li primljen email iz sesije ili obrasca
session_start(); // Otvorite sesiju prije korištenja
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Izvršite upit za brisanje redova s odgovarajućim emailom
    $query = "DELETE FROM korpa WHERE email = '$email'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        header("Location: korpa.php"); // Preusmjeravanje na korpa.php
        exit();
    } else {
        // Greška prilikom brisanja
        echo "Greška prilikom poručivanja: " . mysqli_error($connection);
    }
} else {
    // Email nije pronađen u sesiji
    echo "Email nije pronađen u sesiji.";
}

// Zatvaranje veze s bazom podataka
mysqli_close($connection);
?>
