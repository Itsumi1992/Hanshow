
<form class="form-horizontal" action='/groep1/function/user_register.php' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Register</legend>
    </div>
<?php
if (!isset($_SESSION['postdata'])) {
    $_SESSION['postdata']['bedrijf']              = "";
    $_SESSION['postdata']['kvk_nummer']           = "";
    $_SESSION['postdata']['btw_nummer']           = "";
    $_SESSION['postdata']['voornaam']             = "";
    $_SESSION['postdata']['tussenvoegsel']        = "";
    $_SESSION['postdata']['achternaam']           = "";
    $_SESSION['postdata']['telefoonnummer']       = "";
    $_SESSION['postdata']['straat']               = "";
    $_SESSION['postdata']['huisnummer']           = "";
    $_SESSION['postdata']['huisnummertoevoeging'] = "";
    $_SESSION['postdata']['postcode']             = "";
    $_SESSION['postdata']['stad']                 = "";
    $_SESSION['postdata']['email']                = "";
    
}
$errormessage = "";
if (isset($_GET['e'])) {
    switch ($_GET['e']) {
        case 1:
            $errormessage = "Vul alstublieft alle velden in";
            break;
        case 2:
            $errormessage = "Uw e-mail is incorrect";
            break;
        case 3:
            $errormessage = "Uw wachtwoord kwam niet overeen";
            break;
        case 4:
            $errormessage = "Uw e-mail adres is al in gebruik";
            break;
    }
}
?>

      <!-- Button -->

	<input type="text" name="bedrijf" placeholder="Bedrijfsnaam" value="<?php print($_SESSION['postdata']['bedrijf']);?>" required><br>
	<input type="text" name="kvk_nummer" placeholder="KVK nummer" value="<?php print($_SESSION['postdata']['kvk_nummer']);?>" required><br>
	<input type="text" name="btw_nummer" placeholder="BTW nummer" value="<?php print($_SESSION['postdata']['btw_nummer']);?>" required><br>
	<input type="text" name="voornaam" placeholder="Voornaam" value="<?php print($_SESSION['postdata']['voornaam']);?>" required><br>
	<input type="text" name="tussenvoegsel" placeholder="Tussenvoegsel" value="<?php print($_SESSION['postdata']['tussenvoegsel']);?>" required><br>
	<input type="text" name="achternaam" placeholder="Achternaam" value="<?php print($_SESSION['postdata']['achternaam']);?>" required><br>
	<input type="text" name="telefoonnummer" placeholder="Telefoonnummer" value="<?php print($_SESSION['postdata']['telefoonnummer']);?>" required><br>
	Adres gegevens<br>
	<input type="text" name="straat" placeholder="Straat" value="<?php print($_SESSION['postdata']['straat']);?>" required><br>
	<input type="text" name="huisnummer" placeholder="Huisnummer" value="<?php print($_SESSION['postdata']['huisnummer']);?>" required><br>
	<input type="text" name="huisnummertoevoeging" placeholder="Huisnummertoevoeging" value="<?php print($_SESSION['postdata']['huisnummertoevoeging']);?>" required><br>
	<input type="text" name="postcode" placeholder="Postcode" value="<?php print($_SESSION['postdata']['postcode']);?>" required><br>
	<input type="text" name="stad" placeholder="Stad" value="<?php print($_SESSION['postdata']['stad']);?>" required><br>
	Login gegevens<br>
	  <input type="text" name="email" placeholder="E-mail" value="<?php print($_SESSION['postdata']['email']);?>" required><br>
	  <input type="text" name="wachtwoord" placeholder="Wachtwoord" required><br>
  	  <input type="text" name="wachtwoord_bevestiging" placeholder="bevestiging wachtwoord" required><br>

	  
      <div class="controls">
	  <br>

        <button class="btn btn-success">Register</button>
			  <?php print($errormessage);?>
      </div>
    </div>
	<?php session_destroy();?>
  </fieldset>
</form>