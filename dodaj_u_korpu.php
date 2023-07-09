<?php
// Uspostavi vezu s bazom podataka
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "knjizara";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Dohvati vrijednosti iz zahtjeva
$proizvod = $_POST['proizvod'];
$cijena = $_POST['cijena'];
$slika  = $_POST['slika'];

// Dohvati email iz sesije
session_start();
$email = $_SESSION['email'];

// Provjeri postoji li već unos za dati email i proizvod
$sql = "SELECT * FROM korpa WHERE email='$email' AND proizvod='$proizvod'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "Proizvod već postoji u korpi!";
} else {
  // Ne postoji unos, dodaj novi
  // Pripremi SQL upit za umetanje u bazu podataka
  $sql = "INSERT INTO korpa (email, proizvod, cijena) VALUES ('$email', '$proizvod', '$cijena')";

  // Izvrši upit
  if ($conn->query($sql) === TRUE) {
    echo "Proizvod uspješno dodan u korpu!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Zatvori vezu s bazom podataka
$conn->close();
?>
