<?php
session_start();
include "Klasser.php";
include "validerAdmin.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript">
            function valider_fornavn() {
                regEx = /^[a-zA-ZæøåÆØÅ .\-]{2,20}$/;
                OK = regEx.test(document.adminRegistrering.fornavn.value);
                if (!OK) {
                    document.getElementById("feilFornavn").innerHTML = "Feil i fornavnet";
                    return false;
                }
                document.getElementById("feilFornavn").innerHTML = "";
                return true;
            }
            function valider_etternavn() {
                regEx = /^[a-zA-ZæøåÆØÅ .\-]{2,20}$/;
                OK = regEx.test(document.adminRegistrering.etternavn.value);
                if (!OK) {
                    document.getElementById("feilEtternavn").innerHTML = "Feil i etternavnet";
                    return false;
                }
                document.getElementById("feilEtternavn").innerHTML = "";
                return true;
            }


            function valider_tlf() {
                regEx = /^[0-9]{8}$/;
                OK = regEx.test(document.adminRegistrering.telefonnummer.value);
                if (!OK) {
                    document.getElementById("feilTlf").innerHTML = "Feil i telefonnummeret";
                    return false;
                }
                document.getElementById("feilTlf").innerHTML = "";
                return true;
            }

            function valider_alle() {
                fornavnOK = valider_fornavn();
                etternavnOK = valider_etternavn();
                tlfOK = valider_tlf();
                brukernavnOK = valider_brukernavn();
                passordOK = valider_passord();
                gjentaPassordOK = valider_gjentaPassord();
                if (fornavnOK && etternavnOK && tlfOK && brukernavnOK && passordOK && gjentaPassordOK) {
                    return true;
                }
                return false;
            }

            function valider_brukernavn() {
                regEx = /^[a-zA-ZæøåÆØÅ0-9 .\-]{2,20}$/;
                OK = regEx.test(document.adminRegistrering.brukernavn.value);
                if (!OK) {
                    document.getElementById("feilBrukernavn").innerHTML = "Feil i brukernavn! Minst to bokstaver.";
                    return false;
                }
                document.getElementById("feilBrukernavn").innerHTML = "";
                return true;
            }
            function valider_passord() {
                regEx = /^[a-zA-ZæøåÆØÅ0-9 .\-]{2,20}$/;
                OK = regEx.test(document.adminRegistrering.passord.value);
                if (!OK) {
                    document.getElementById("feilPassord").innerHTML = "Minst to bokstaver! Spesialtegn støttes ikke i passord!";
                    return false;
                }
                document.getElementById("feilPassord").innerHTML = "";
                return true;
            }
            var check = function valider_gjentaPassord() {
                if (document.getElementById('passord').value ==
                        document.getElementById('gjentaPassord').value) {
                    document.getElementById('feilGjentaPassord').style.color = 'green';
                    document.getElementById('feilGjentaPassord').innerHTML = 'Passordet er likt!';
                } else {
                    document.getElementById('feilGjentaPassord').style.color = 'red';
                    document.getElementById('feilGjentaPassord').innerHTML = 'Passordet er ikke likt!';
                }
            }

        </script>
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
                        echo '<li><a href="innlogging.php">Logg inn</a></li>';
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
                        echo '<li class="active"><a href="Side3.php">Ny Administrator</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </nav>
        <div class="col-centered">    
            <div class="col-md-8">
                <h1>Registering av Administrerende:</h1>
                <form action="" name="adminRegistrering" method="post" onsubmit="return valider_alle();"> 
                    <table class="table table-striped">
                        <tr>
                            <td>Fornavn:</td>
                            <td><input type="text" name="fornavn" onchange="valider_fornavn()"/></td>
                            <td><div id="feilFornavn" style="color:red;"></div></td>
                        </tr>
                        <tr>
                            <td>Etternavn:</td>
                            <td><input type="text" name="etternavn" onchange="valider_etternavn()"/></td>
                            <td><div id="feilEtternavn" style="color:red;"></div></td>
                        </tr>
                        <tr>
                            <td>Telefonnummer:</td>
                            <td><input type="text" name="telefonnummer" onchange="valider_tlf()"/></td>
                            <td><div id="feilTlf" style="color:red;"></div></td>
                        </tr>
                        <tr>
                            <td>     
                                <br/>
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                Brukernavn:
                            </td> 
                            <td><input type="text" name="brukernavn" onchange="valider_brukernavn()"></td> 
                            <td><div id="feilBrukernavn" style="color:red;"></div></td>
                        </tr> 
                        <tr>
                            <td>
                                Passord:
                            </td>
                            <td><input type="password" id="passord" name="passord" onchange="valider_passord()" onkeyup='check();'></td> 
                            <td><div id="feilPassord" style="color:red;"></div></td>
                        </tr>
                        <tr><td>
                                Gjenta passord:


                            </td>
                            <td><input type="password" id="gjentaPassord" name="gjentaPassord" onchange="valider_gjentaPassord()" onkeyup='check();' required></td> 
                            <td><div id="feilGjentaPassord" style="color:red;"></div></td>

                        </tr>
                        <tr>
                            <td> 
                                <input type="submit" value="Registrer"
                                       name="registrer" class="btn btn-primary"/> 
                            </td>
                        </tr> 
                    </table> 
                </form>
                <?php
                if (isset($_POST["registrer"])) {
                    if ($_POST["passord"] == $_POST["gjentaPassord"]) {
                        $nyadmin = new admin();
                        $feilString = validerAdmin($nyadmin);
                        if ($feilString != null) {
                            echo "<font color=red><br/>Valideringsfeil:</font> <br/><font color=red>$feilString</font>";
                        } else {
                            $nyadmin->registrer_admin();
                        }
                    } else {
                        echo"Passordene må være like!";
                    }
                }
                ?>
            </div>
        </div>
    </body>
</html>

