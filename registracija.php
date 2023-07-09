<?php
//Podaci za povezivanje s bazom podataka
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'knjizara';

//Povezivanje s bazom podataka
$conn = new mysqli('localhost', 'root', '', 'knjizara');

// Provjerite jesu li podaci obrađeni nakon slanja obrasca
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Dohvaćanje vrijednosti iz obrasca
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Provjera je li korisnik s ovom email adresom već registriran
    $sql = "SELECT * FROM korisnici WHERE email='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $error = "Korisnik s ovom email adresom je već registriran.";
    } else {
        // Ako korisnik nije registriran, dodajte novi redak u tablicu korisnici
        $sql = "INSERT INTO korisnici (firstName, lastName, email, password) VALUES ('$firstName', '$lastName', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            // Ako je novi korisnik uspješno dodan, prijavite se i preusmjerite na dobrodošlicu
            session_start();
            $_SESSION['email'] = $email;
            header("Location: index.php ");
            exit();
        } else {
            $error = "Došlo je do pogreške prilikom registracije.";
        }
    }
}

// Zatvorite vezu s bazom podataka
$conn->close();
?>