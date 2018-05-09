<?php
session_start();
include "Klasser.php";
include "validerovelser.php";

if (!isset($_SESSION["verifisering"])) {
    echo 'Du er ikke innlogget! Du må være innlogget for å bruke denne delen av nettsiden! <br/>'
    . 'Gå tilbake til <b><a href="index.php">forsiden</a><b/>';
    die();
}
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
            table {
                table: table-striped table-inverse;
            }
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
                            echo '<li class="active"><a href="OvelseRedigering.php">Rediger Øvelser</a></li>';
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
                if (isset($_POST["ovelseregistrer"])) {
                    $nyovelse = new ovelse();
                    $feilString = validerRegistrering($nyovelse);
                    if ($feilString != null) {
                        echo "<font color=red><br/>Valideringsfeil:</font> <br/><font color=red>$feilString</font>";
                    } else {
                        $nyovelse->registrer_ovelse();
                    }
                }
                //Radteller er en verdi jeg trenger å sette for å finne ut hvor mange rader 
                //Med input felt som blir satt inn.
                $radteller = 0;

                $db = mysqli_connect("localhost", "root", "", "skivm");
                if (!$db) {
                    die("<br/> Kunne ikke knytte til server" . mysqli_error($db) . "<br/");
                }

                //Dette er en spørring som lagrer det som finnes i databasen i en tabell
                //Jeg kaller denne tabellen for uendret for å understreke at den inneholder
                //Den orginale informasjonen fra databasen.
                $sql = "SELECT type, sted, dato, tid FROM ovelse";

                $resultat = mysqli_query($db, $sql);

                if (!$resultat) {
                    trigger_error(mysqli_error($db));
                    echo "<br/> Feil, klarte ikke å registrere ovelse!";
                }

                if ($resultat->num_rows > 0) {
                    while ($rad = $resultat->fetch_assoc()) {
                        $uendret[] = array($rad["type"], $rad["sted"], $rad["dato"], $rad["tid"]);
                    }
                }

                if (!$resultat) {
                    trigger_error(mysqli_error($db));
                    echo "<br/> Feil, klarte ikke å lagre data!";
                }
                //--------------------------------------------------
                //Dette er en spørring som lagrer IDen til radene i databasen i en tabell
                //Dette er nødvendig fordi om man har radID 1,2,3,4 og fjerner 3
                //Så vil ikke en teller i en løkke ta hensyn til at radID 3 ikke finnes.
                $sql = "SELECT ovelseid FROM ovelse";

                $resultat = mysqli_query($db, $sql);

                if (!$resultat) {
                    trigger_error(mysqli_error($db));
                    echo "<br/> Feil, klarte ikke å hente ovelse data!";
                }

                $ovelseid = array();

                if ($resultat->num_rows > 0) {
                    while ($rad = $resultat->fetch_assoc()) {
                        $ovelseid[] = $rad["ovelseid"];
                    }
                }

                if (!$resultat) {
                    trigger_error(mysqli_error($db));
                    echo "<br/> Feil, klarte ikke å lagre ovelse data!";
                }
                //------------------------
                //Dette er selve oppdateringsfunksjonen.
                //Den starter med å lagre en tabell med alle verdiene som ligger i skjema
                //Navnene på hver input vil alltid være verdinavn etterfulgt av radnummert.
                //feks sted i førstre rad vil ha navnet sted0
                if (isset($_POST["oppdater"])) {
                    for ($i = 0; $i < $_SESSION["ovelseRadteller"]; $i++) {
                        $endret[] = array($_POST["type" . $i], $_POST["sted" . $i], $_POST["dato" . $i], $_POST["tid" . $i]);
                    }
                    //Nå som vi har en tabell med endret verdier og uendret verdier kan vi sammenligne
                    //Og oppdatere der det ikke er likt
                    if ($uendret == $endret) {
                        echo "<br/> Ingen rader er endret!";
                    } else {
                        for ($i = 0; $i < $_SESSION["ovelseRadteller"]; $i++) {
                            if ($uendret[$i] != $endret[$i]) {
                                $nyovelse = new ovelse();
                                $feilString = validerEndring($nyovelse, $endret, $i);
                                if ($feilString != null) {
                                    echo "<font color=red><br/>Valideringsfeil:</font> <br/><font color=red>$feilString</font>";
                                } else {
                                    $nyovelse->set_ovelseid($ovelseid[$i]);
                                    $nyovelse->oppdater_ovelse();
                                }
                            }
                        }
                    }
                }

                //Slettefunksjonen vil gå igjennom check list tabellen og se om den har blitt satt
                //Her bruker vi IDtabellen vår til å passe på at vi sletter riktig ID
                if (isset($_POST["slett"])) {
                    $sqlSlett = "";
                    if (!empty($_POST['check_list'])) {
                        foreach ($_POST['check_list'] as $check) {
                            $sqlSlett .= "DELETE FROM ovelse ";
                            $sqlSlett .= "WHERE ovelseid=" . $ovelseid[$check] . ";";
                            $sqlSlett .= "UPDATE utover SET ovelseid= NULL ";
                            $sqlSlett .= "WHERE ovelseid=" . $ovelseid[$check] . ";";
                            $sqlSlett .= "UPDATE publikum SET ovelseid= NULL ";
                            $sqlSlett .= "WHERE ovelseid=" . $ovelseid[$check] . ";";
                        }
                    }
                    if ($sqlSlett == "") {
                        echo "<br/> Ingen rader er valgt for sletting";
                    } else {
                        // Her bruker vi multi_query for å kjøre mange spørringer samtidig
                        if ($db->multi_query($sqlSlett)) {
                            echo "<br/> Valgte rader har blitt slettet!";
                            do {
                                if ($resultat = $db->store_result()) {
                                    while ($row = $resultat->fetch_row()) {
                                        
                                    }
                                    $resultat->free();
                                }
                                if ($db->more_results()) {
                                    
                                }
                            } while ($db->next_result());
                        }
                    }
                }
                
                // Her starter inputskjemaet vårt
                // Den inneholder en spørring for å hente data og en løkke for gå igjennom den.
                // Her er det mye HTML som blir echoet ut fra PHP. 
                // Verdiene fra spørringen blir satt inn i input feltene i skjemaet.
                // Det blir også echoet javascript valideringsfunskjoner
                // Hver rad får sin id som blir lagt på hvert inputfelt sitt navn.
                $sqlForm = "SELECT type, sted, dato, tid FROM ovelse";

                $resultatForm = mysqli_query($db, $sqlForm);

                if (!$resultatForm) {
                    trigger_error(mysqli_error($db));
                    echo "Feil, klarte ikke hente data";
                }

                if (mysqli_num_rows($resultatForm) > 0) {
                    echo '<form action="" name="skjema" method="post" onsubmit="return valider_alle()">'
                    . '<table width="auto" class="table table-striped">'
                    . '<tr><th>Type</th><th></th><th>Sted</th><th></th><th>Dato</th><th></th><th>Tid</th><th></th><th>SLETT RAD?</th></tr>';
                    while ($rad = $resultatForm->fetch_assoc()) {
                        echo '<tr><td> <input type="text" value="' . $rad["type"] . '" name="type' . $radteller . '" onchange="valider_type' . $radteller . '()"> </td>
                    <td><div id="feiltype' . $radteller . '" style="color:red;"></div></td>
                    <td> <input type="text" value="' . $rad["sted"] . '" name="sted' . $radteller . '" onchange="valider_sted' . $radteller . '()"> </td>
                    <td><div id="feilsted' . $radteller . '" style="color:red;"></div></td>
                    <td> <input type="text" value="' . $rad["dato"] . '" name="dato' . $radteller . '" onchange="valider_dato' . $radteller . '()"> </td>
                    <td><div id="feildato' . $radteller . '" style="color:red;"></div></td>
                    <td> <input type="text" value="' . $rad["tid"] . '" name="tid' . $radteller . '" onchange="valider_tid' . $radteller . '()"> </td>
                    <td><div id="feiltid' . $radteller . '" style="color:red;"></div></td>
                    <td><input type="checkbox" name="check_list[]" value="' . $radteller . '"></td></tr>';
                        $radteller++;
                    }
                    echo "<tr>"
                    . "<td><input type=\"submit\" value=\"Oppdater\" name=\"oppdater\"/></td>"
                    . "<td></td><td></td><td></td><td></td><td></td><td></td><td></td>"
                    . "<td><input type=\"submit\" value=\"SLETT valgte rader\" name=\"slett\"/></td>"
                    . "</tr>"
                    . "</table>"
                    . "</form>";
                } else {
                    echo "Ingen verdier i databasen";
                }

                $_SESSION["ovelseRadteller"] = $radteller;

                // Her starter javascript valideringen vår
                // I likhet med skjemaet blir det her echoet mye som script
                // Dette er så vi kan opprette en valideringsfunksjon for hvert eneste felt som ble opprettet i skjemaet
                
                echo '<script type="text/javascript">';

                for ($i = 0; $i < $radteller; $i++) {
                    echo 'function valider_type' . $i . '() {
                regEx = /^[a-zA-ZæøåÆØÅ .\-]{2,20}$/;
                OK = regEx.test(document.skjema.type' . $i . '.value);
                if (!OK) {
                    document.getElementById("feiltype' . $i . '").innerHTML = "Feil i type!";
                    return false;
                }
                document.getElementById("feiltype' . $i . '").innerHTML = "";
                return true;
            }
            ';
                }

                for ($i = 0; $i < $radteller; $i++) {
                    echo 'function valider_sted' . $i . '() {
                regEx = /^[a-zA-ZæøåÆØÅ .\-]{2,20}$/;
                OK = regEx.test(document.skjema.sted' . $i . '.value);
                if (!OK) {
                    document.getElementById("feilsted' . $i . '").innerHTML = "Feil i sted!";
                    return false;
                }
                document.getElementById("feilsted' . $i . '").innerHTML = "";
                return true;
            }
            ';
                }

                for ($i = 0; $i < $radteller; $i++) {
                    echo 'function valider_dato' . $i . '() {
                regEx = /^\d{2}[.]\d{2}[.]\d{4}$/;
                OK = regEx.test(document.skjema.dato' . $i . '.value);
                if (!OK) {
                    document.getElementById("feildato' . $i . '").innerHTML = "Feil i dato!";
                    return false;
                }
                document.getElementById("feildato' . $i . '").innerHTML = "";
                return true;
            }
            ';
                }

                for ($i = 0; $i < $radteller; $i++) {
                    echo 'function valider_tid' . $i . '() {
                regEx = /([01]\d|2[0-3]):([0-5]\d)/;
                OK = regEx.test(document.skjema.tid' . $i . '.value);
                if (!OK) {
                    document.getElementById("feiltid' . $i . '").innerHTML = "Feil i tid!";
                    return false;
                }
                document.getElementById("feiltid' . $i . '").innerHTML = "";
                return true;
            }
            ';
                }

                echo 'function valider_alle() {
        validering = true;';
                for ($i = 0; $i < $radteller; $i++) {
                    echo'typeOK = valider_type' . $i . '();
             stedOK = valider_sted' . $i . '();
             datoOK = valider_dato' . $i . '();
             tidOK = valider_tid' . $i . '();
                if (!typeOK || !stedOK || !datoOK || !tidOK) {
                    validering = false;
                }
                ';
                }
                echo 'return validering;}';
                echo '</script>';
                ?>

                <script type="text/javascript">

                    function valider_type() {
                        regEx = /^[a-zA-ZæøåÆØÅ .\-]{2,20}$/;
                        OK = regEx.test(document.ovelseReg.type.value);
                        if (!OK) {
                            document.getElementById("feiltype").innerHTML = "Feil i type!";
                            return false;
                        }
                        document.getElementById("feiltype").innerHTML = "";
                        return true;
                    }

                    function valider_sted() {
                        regEx = /^[a-zA-ZæøåÆØÅ .\-]{2,20}$/;
                        OK = regEx.test(document.ovelseReg.sted.value);
                        if (!OK) {
                            document.getElementById("feilsted").innerHTML = "Feil i sted!";
                            return false;
                        }
                        document.getElementById("feilsted").innerHTML = "";
                        return true;
                    }

                    function valider_dato() {
                        regEx = /^\d{2}[.]\d{2}[.]\d{4}$/;
                        OK = regEx.test(document.ovelseReg.dato.value);
                        if (!OK) {
                            document.getElementById("feildato").innerHTML = "Feil i dato!";
                            return false;
                        }
                        document.getElementById("feildato").innerHTML = "";
                        return true;
                    }

                    function valider_tid() {
                        regEx = /([01]\d|2[0-3]):([0-5]\d)/;
                        OK = regEx.test(document.ovelseReg.tid.value);
                        if (!OK) {
                            document.getElementById("feiltid").innerHTML = "Feil i tid!";
                            return false;
                        }
                        document.getElementById("feiltid").innerHTML = "";
                        return true;
                    }

                    function valider_ovreg() {
                        typeOK = valider_type();
                        stedOK = valider_sted();
                        datoOK = valider_dato();
                        tidOK = valider_tid();
                        if (typeOK && stedOK && datoOK && tidOK) {
                            return true;
                        }
                        return false;
                    }


                </script>

                <form action="" name="ovelseReg" method="post" onsubmit="return valider_ovreg()">
                    <table width="auto" class="table table-striped">
                        <tr><th>Type</th><th></th><th>Sted</th><th></th><th>Dato</th><th></th><th>Tid</th><th></th></tr>
                        <tr><td> <input type="text" name="type" onchange="valider_type()"> </td>
                            <td><div id="feiltype" style="color:red;"></div></td>
                            <td> <input type="text" name="sted" onchange="valider_sted()" > </td>
                            <td><div id="feilsted" style="color:red;"></div></td>
                            <td> <input type="text" name="dato" onchange="valider_dato()" > </td>
                            <td><div id="feildato" style="color:red;"></div></td>
                            <td> <input type="text" name="tid" onchange="valider_tid()" > </td>
                            <td><div id="feiltid" style="color:red;"></div></td> </tr>
                        <tr>
                            <td><input type="submit" value="Registrer" name="ovelseregistrer"/></td>
                        </tr>
                    </table>
                </form>