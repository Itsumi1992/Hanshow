<?phpdbcreate();function dbcreate(){	$servername = "localhost";	$username = "root";	$password = "usbw";	$dbname = "aretail";	$conn = new mysqli($servername, $username, $password);
$queries = array();
$queries[0] = "CREATE DATABASE aretail;";
$queries[1] = 
"CREATE TABLE factuur(
Factuur_id int NOT NULL,
Klant_id int NOT NULL,
Datum_toegevoegd DATETIME NOT NULL,
Datum_verzonden DATETIME,
Trackingcode VARCHAR(45),
Adres_id INT NOT NULL,
PRIMARY KEY (Factuur_id));";

$queries[2] =
"CREATE TABLE Adres (
Adres_id INT NOT NULL,
Straat VARCHAR(45) NOT NULL,
Huisnummer INT NOT NULL,
Huisnummer_toevoeging VARCHAR(45),
Postcode VARCHAR(7) NOT NULL,
Plaats VARCHAR(45) NOT NULL,
PRIMARY KEY (Adres_id));";
$queries[3]=
"CREATE TABLE Factuurregel (
Klant_id INT NOT NULL,
Factuur_id INT NOT NULL,
Product_id INT NOT NULL,
Aantal INT NOT NULL,
PRIMARY KEY (Klant_id, Factuur_id, Product_id));";

$queries[4]=
"CREATE TABLE Product (
Product_id INT NOT NULL,
Product_naam VARCHAR(45) NOT NULL,
Product_beschrijving VARCHAR(45) NOT NULL,
Product_prijs INT NOT NULL,
PRIMARY KEY (Product_id));";
$queries[5]=
"CREATE TABLE Cart (
Cart_ID INT NOT NULL,
Klant_id INT NOT NULL,
Datum_toegevoegd DATETIME NOT NULL,
Product_id INT NOT NULL,
Aantal INT NOT NULL,
PRIMARY KEY (Cart_ID, Klant_id, Datum_toegevoegd));";
$queries[6]=
"CREATE TABLE Klant (Email VARCHAR(45) NOT NULL,
Voornaam VARCHAR(45) NOT NULL,
Tussenvoegsel VARCHAR(45),
Achternaam VARCHAR(45) NOT NULL,
Bedrijfsnaam VARCHAR(45) NOT NULL,
KVKnummer INT NOT NULL,
BTWnummer INT NOT NULL,
Adres_id INT NOT NULL,
Wachtwoord VARCHAR(45) NOT NULL,
PRIMARY KEY (Email));";
$queries[7]=
"CREATE TABLE Admin (
Admin_naam VARCHAR(45) NOT NULL,
Voornaam VARCHAR(45) NOT NULL,
Tussenvoegsel VARCHAR(45),
Achternaam VARCHAR(45) NOT NULL,
Email VARCHAR(45) NOT NULL,
Wachtwoord VARCHAR(45) NOT NULL,
PRIMARY KEY (Admin_naam));";

foreach($queries as $query){
	mysqli_query($conn, $query);	$conn->select_db($dbname);	print("Query executed: <br>". $query . "<br><br>");
	}print("Database build");}
?>