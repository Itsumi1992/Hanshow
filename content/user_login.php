<?php
$errormessage = "";
if (isset($_GET['e'])) {
    switch ($_GET['e']) {
        case 1:
            $errormessage = "Probeer het opnieuw";
            break;
            
    }
}
?>
<form class="form-horizontal" action='./function/user_login.php' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Login</legend>
	  
    </div>
      <!-- Button -->
	  <input type="text" name="email" placeholder="E-mail">
	  <input type="text" name="password" placeholder="Wachtwoord">
      <div class="controls">
	  <br>
        <button class="btn btn-success">Login</button>
			  <?php
print($errormessage);
?>
      </div>
    </div>
  </fieldset>
</form>