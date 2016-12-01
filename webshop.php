<?php
session_start();
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/frontend/style.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="/Hanshow/js/bootstrap.js"></script>
        <?php
        include 'config.php';
        retry:

        include (ROOT_DIR . '/function/dbconnect.php');

        $conn = dbconnect();
        if (!$conn) {
            print("DB not connected");
        }
        ?>

    </head>

    <body>



        <div class="shopheader">
            <div class="header-container">
                <div class="logo-container">
                </div>
                <div class="button-container">
                    <a href="./index.php?p=registeren">Mijn gegevens</a>
                    <a href="./index.php?p=registeren">Facturen</a>
                    <a href="./index.php?p=login">Afmelden</a>
                </div>


            </div> 

        </div>  

        <div class="content-container">

            <p>
                <?php
                if (!isset($_GET["p"])) {
                    //Startpagina

                    include (ROOT_DIR . '/content/webshop_overzicht.php');
                } elseif ($_GET["p"] == "registeren") {
                    //registratie pagina

                    include (ROOT_DIR . '/content/user_register.php');
                } elseif ($_GET["p"] == "login") {
                    //login pagina
                    include (ROOT_DIR . '/content/user_login.php');
                }
                ?>
        </div>
        <div class="footer">

            Copyright copyright inc 

        </div>



    </body>

</html>

