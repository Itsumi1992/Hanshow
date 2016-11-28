<?php
session_start();
include 'dbconnect.php';
$_SESSION['postdata']   = $_POST;
$bedrijf                = $_POST["bedrijf"];
$kvk_nummer             = $_POST["kvk_nummer"];
$btw_nummer             = $_POST["btw_nummer"];
$plaats                 = $_POST["stad"];
$straat                 = $_POST["straat"];
$huisnummer             = $_POST["huisnummer"];
$huisnummertoevoeging   = $_POST["huisnummertoevoeging"];
$postcode               = $_POST["postcode"];
$email                  = $_POST["email"];
$voornaam               = $_POST["voornaam"];
$tussenvoegsel          = $_POST["tussenvoegsel"];
$achternaam             = $_POST["achternaam"];
$wachtwoord             = $_POST["wachtwoord"];
$wachtwoord_bevestiging = $_POST["wachtwoord_bevestiging"];
if ($wachtwoord != $wachtwoord_bevestiging) {
    header('Location: ./index.php?p=registeren&e=3');
    exit;
}
//controlleren of alle velden zijn ingevuld
foreach ($_POST as $DATA) {
    if ($DATA == "") {
        header('Location: ./index.php?p=registeren&e=1');
        exit;
    }
}
//controlleren of email klopt
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ./index.php?p=registeren&e=2');
    exit;
}

//controlleren of email al in gebruik is
$conn = DBConnect();
$stmt = $conn->prepare('SELECT Email from Klant WHERE Email = ?');
$stmt->bind_param('s', $email);
$stmt->execute();
$results = $stmt->get_result();
if (mysqli_num_rows($results) == 0) {
    //Email is nog niet in gebruik en registratie gaat van start
    $adres_id = '';
    
begin:
    //check of adres al bestaat en voegd wanneer bekent het ID van het adres bij.
    $valuesadres = adres_exists($postcode, $huisnummer, $huisnummertoevoeging);
    if (!$valuesadres['exists']) {
        //Adres is niet gevonden en zal worden toegevoegd
        $query = 'INSERT INTO Adres (Straat, Huisnummer, Huisnummer_toevoeging, Postcode, Plaats) VALUES (?, ?, ?, ?, ?)';
        $stmt  = $conn->prepare($query);
        $stmt->bind_param('sisss', $straat, $huisnummer, $huisnummertoevoeging, $postcode, $plaats);
        $stmt->execute();
        printf("Errormessage: %s\n", $stmt->error);
        $stmt->close();
        //Adres is toegevoegd en gaat weer de if statement herhalen + functie heralen
        goto begin;
    } else {
        
        $adres_id = $valuesadres['adres_id'];
    }
    //haal ID op van adres
    print($adres_id);
    //hash password
    $passwordhash = hash_password($wachtwoord);
    //prepare query
    $stmt         = $conn->prepare('INSERT INTO Klant VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?);');
    //bind parameters met de query
    $stmt->bind_param('sssssiiis', $email, $voornaam, $tussenvoegsel, $achternaam, $bedrijf, $kvk_nummer, $btw_nummer, $adres_id, $passwordhash);
    //add user to database
    $stmt->execute();
    printf("Errormessage: %s\n", $stmt->error);
    //
    $stmt->close();
    //afsluiten
    echo "<script>alert('');</script>";
} else {
    //Error E-mail is al in gebruik
    header('Location: ./index.php?p=registeren&e=4');
    exit;
}

function adres_exists($postcode, $huisnummer, $huisnummertoevoeging)
{
    $conn  = DBConnect();
    $query = 'SELECT Adres_id FROM Adres WHERE Postcode = ? && Huisnummer = ? && Huisnummer_toevoeging = ?';
    $stmt  = $conn->prepare($query);
    $stmt->bind_param('sis', $postcode, $huisnummer, $huisnummertoevoeging);
    $stmt->execute();
    $result = $stmt->get_result();
    
    
    if (mysqli_num_rows($result) == 0) {
        $stmt->close();
        return $values = array(
            "exists" => false
        );
        
    }
    $row      = $result->fetch_assoc();
    $adres_id = $row['Adres_id'];
    $stmt->close();
    return $values = array(
        "exists" => true,
        "adres_id" => $adres_id
    );
}
function hash_password($wachtwoord)
{
    $hash = $wachtwoord;
    return $hash;
}
?>