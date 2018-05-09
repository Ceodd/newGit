<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {
                margin: 0;
                background: url("bakgrunn.jpg");
                background-size: 100%;
                background-repeat:no-repeat;
                background-attachment: fixed;
                display: compact;
                font: 13px/18px "Helvetica Neue", Helvetica, Arial, sans-serif;
            }
            .col-centered{
                float: none;
                margin: 2em auto;
                background:rgb(255,255,255);
                border-radius: 10px; 
                border: 3px solid black;

            }
            .col-md-8 {
                display: inline-block;
                float: none;
                margin: 2em auto;
                background:rgb(255,255,255);
                border-radius: 10px;

            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand">Ski VM!</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Hjem</a></li>
                    <li><a href="Side4.php">Se Øvelse Data!</a></li>
                    <?php
                    if (!isset($_SESSION["verifisering"])) {
                        echo '<li class="active"><a href="innlogging.php">Logg inn</a></li>';
                    }
                    ?>
                    <?php
                    if (isset($_SESSION["verifisering"])) {
                        if ($_SESSION["verifisering"] == true) {
                            echo '<li><a href="OvelseRedigering.php">Rediger Øvelser</a></li>';
                        }
                    }
                    ?>
                    <?php
                    if (isset($_SESSION["verifisering"])) {
                        if ($_SESSION["verifisering"] == true) {
                            echo '<li><a href="UtoverRedigering.php">Rediger Utøvere</a></li>';
                        }
                    }
                    ?>
                    <?php
                    if (isset($_SESSION["verifisering"])) {
                        if ($_SESSION["verifisering"] == true) {
                            echo '<li><a href="PublikumRedigering.php">Rediger Publikum</a></li>';
                        }
                    }
                    ?>
                    <?php
                    if (isset($_SESSION["verifisering"])) {
                        if ($_SESSION["verifisering"] == true) {
                            echo '<li><a href="loggut.php">Logg ut</a></li>';
                        }
                    }
                    ?>
                    <?php
                    if (!isset($_SESSION["verifisering"])) {
                        echo '<li><a href="Side3.php">Ny Administrator</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </nav>
        <div class="col-centered">    
            <div class="col-md-8">
                <?php
                include "Klasser.php";
                if (isset($_POST["logginn"])) {
                    $nyadmin = new admin();
                    $nyadmin->set_brukernavn($_POST["brukernavn"]);
                    $nyadmin->set_passord($_POST["passord"]);

                    if ($nyadmin->logginn()) {
                        $_SESSION["verifisering"] = true;
                        header("location:index.php");
                    } else {
                        if (isset($_SESSION["verifisering"])) {
                            unset($_SESSION["verifisering"]);
                        }
                    }
                }
                ?>
                <form action="" name="loginnSkjema" method="post" onsubmit="return valider_alle()">
                    <h1>Administrator log inn</h1>
                    <table class="table table-striped">
                        <tr>
                            <td>Brukernavn:</td>

                            <td><input type="text" name="brukernavn"/></td>

                            <td><div id="feilBrukernavn" style="color:red;"></div></td>
                        </tr>

                        <tr>
                            <td>Passord:</td>
                            <td><input type="password" name="passord"/></td>
                            <td><div id="feilPassord" style="color:red;"></div></td>
                        </tr>

                        <tr>
                            <td><input type="submit" value="Logg inn"
                                       name="logginn" class="btn btn-primary"/></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>