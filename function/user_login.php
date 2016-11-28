<?php
include_once 'dbconnect.php';
$email    = $_POST["email"];
$password = $_POST["password"];


$conn  = DBConnect();
$query = 'SELECT Email, Wachtwoord FROM Klant WHERE Email = ?';
$stmt  = $conn->prepare($query);
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();
if (!mysqli_num_rows($result) == 0) {
    $row   = $result->fetch_assoc();
    $email = $row['Email'];
    $hash  = $row['Wachtwoord'];
    if ($hash == $password) {
        print("login succesfull");
    } else {
        print("pwerror");
    }
} else {
    
    header('Location: /groep1/index.php?p=login&e=1');
    exit;
}

?>