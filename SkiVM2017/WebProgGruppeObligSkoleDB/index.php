<?php
session_start();
include("validerPublikum.php");
include("Klasser.php");
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
                OK = regEx.test(document.publikumSkjema.fornavn.value);
                if (!OK) {
                    document.getElementById("feilfornavn").innerHTML = "Feil i fornavnet";
                    return false;
                }
                document.getElementById("feilfornavn").innerHTML = "";
                return true;
            }
            function valider_etternavn() {
                regEx = /^[a-zA-ZæøåÆØÅ .\-]{2,20}$/;
                OK = regEx.test(document.publikumSkjema.etternavn.value);
                if (!OK) {
                    document.getElementById("feiletternavn").innerHTML = "Feil i etternavnet";
                    return false;
                }
                document.getElementById("feiletternavn").innerHTML = "";
                return true;
            }

            function valider_epost() {
                regEx = /^[a-zA-ZæøåÆØÅ0-9._-]+@[a-zA-ZæøåÆØÅ0-9.-]+\.[a-zA-Z]{2,20}$/;
                OK = regEx.test(document.publikumSkjema.epost.value);
                if (!OK) {
                    document.getElementById("feilepost").innerHTML = "Feil i E-post";
                    return false;
                }
                document.getElementById("feilepost").innerHTML = "";
                return true;
            }
            function valider_tlf() {
                regEx = /^[0-9]{8}$/;
                OK = regEx.test(document.publikumSkjema.telefnr.value);
                if (!OK) {
                    document.getElementById("feiltlf").innerHTML = "Feil i telefonnummeret";
                    return false;
                }
                document.getElementById("feiltlf").innerHTML = "";
                return true;
            }
            function valider_adresse() {
                regEx = /^[a-zA-ZæøåÆØÅ0-9 .\-]{2,20}$/;
                OK = regEx.test(document.publikumSkjema.adresse.value);
                if (!OK) {
                    document.getElementById("feiladresse").innerHTML = "Feil i adressen";
                    return false;
                }
                document.getElementById("feiladresse").innerHTML = "";
                return true;
            }
            function valider_alle() {
                navnOK = valider_navn();
                tlfOK = valider_tlf();
                epostOK = valider_epost();
                adresseOK = valider_adresse();
                if (navnOK && tlfOK && epostOK && adresseOK) {
                    return true;
                }
                return false;
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
                    <li class="active"><a href="index.php">Hjem</a></li>
                    <li><a href="Side4.php">Se Øvelse Data!</a></li>
                    <?php
//----------------- Navigerinsbaren sjekker om verifiserins session har blitt satt.
//----------------- Og viser relevante linker ettersom man er logget inn eller ikke.
//----------------- Vi bruker om den er satt istedenfor "false" for å unngå undifined index errors.
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
                        echo '<li><a href="Side3.php">Ny Administrator</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </nav>

        <div class="col-centered">    
            <div class="col-md-8">                
                <h1>Publikum Registrering</h1>
                <form action="" name="publikumSkjema" method="post" onsubmit="return valider_alle()">
                    <table  class="table table-striped">
                        <tr>
                            <td>Fornavn:</td>
                            <td><input type="text" name="fornavn" onchange="valider_fornavn()"/></td>
                            <td><div id="feilfornavn" style="color:red;"></div></td>
                        </tr>
                        <tr>
                            <td>Etternavn:</td>
                            <td><input type="text" name="etternavn" onchange="valider_etternavn()"/></td>
                            <td><div id="feiletternavn" style="color:red;"></div></td>
                        </tr>

                        <tr>
                            <td>Epost:</td>
                            <td><input type="text" name="epost" onchange="valider_epost()"/></td>
                            <td><div id="feilepost" style="color:red;"></div></td>
                        </tr>

                        <tr>
                            <td>Adresse:</td>
                            <td><input type="text" name="adresse" onchange="valider_adresse()"/></td>
                            <td><div id="feiladresse" style="color:red;"></div></td>
                        </tr>

                        <tr>
                            <td>Telefnr:</td>
                            <td><input type="text" name="telefnr" onchange="valider_tlf()"/></td>
                            <td><div id="feiltlf" style="color:red;"></div></td>
                        </tr>

                        <tr>
                            <td>Øvelse:</td>
                            <?php
                            $db = mysqli_connect("student.cs.hioa.no", "s315692", "", "s315692");
                            if (!$db) {
                                die("Kunne ikke knytte til server" . mysqli_error($db));
                            }

                            $sql = "SELECT type, ovelseid FROM ovelse";
                            $resultat = mysqli_query($db, $sql);

                            echo "<td><select name='regOvelseid'>";
                            while ($row = mysqli_fetch_array($resultat)) {
                                echo "<option value='" . $row['ovelseid'] . "'>" . $row['type'] . "</option>";
                            }
                            echo "</select></td>";
                            ?>
                        </tr>

                        <tr>
                            <td><input type="submit" value="Registrer"
                                       name="registrer" class="btn btn-primary"/></td>
                        </tr>
                    </table>
                </form>
                <?php
                if (isset($_POST["registrer"])) {
                    $nypublikum = new publikum();
                    $feilString = validerRegistrering($nypublikum);
                    if ($feilString != null) {

                        echo "<font color=red>Valideringsfeil:</font> <br/><font color=red>$feilString</font></div>";
                    } else {
                        $nypublikum->set_povelseid($_POST["regOvelseid"]);
                        $nypublikum->registrer_publikum();
                    }
                }
                ?>
            </div>
        </div>
    </body>
</html>

