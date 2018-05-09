<?php
session_start();
include "Klasser.php";
include "validerPublikum.php";

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
                            echo '<li class="active"><a href="PublikumRedigering.php">Rediger Publikum</a></li>';
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
                if (isset($_POST["PublikumRegistrer"])) {
                    $nyPublikum = new Publikum();
                    $feilString = validerRegistrering($nyPublikum);
                    if ($feilString != null) {
                        echo "<font color=red><br/>Valideringsfeil:</font> <br/><font color=red>$feilString</font>";
                    } else {
                        $nyPublikum->set_povelseid($_POST["regOvelseid"]);
                        $nyPublikum->registrer_Publikum();
                    }
                }
                //Radteller er en verdi jeg trenger å sette for å finne ut hvor mange rader 
                //Med input felt som blir satt inn.
                $radteller = 0;

                $db = mysqli_connect("student.cs.hioa.no", "s315692", "", "s315692");
                if (!$db) {
                    die("<br/> Kunne ikke knytte til server" . mysqli_error($db) . "<br/");
                }
                
                //Dette er en spørring som lagrer det som finnes i databasen i en tabell
                //Jeg kaller denne tabellen for uendret for å understreke at den inneholder
                //Den orginale informasjonen fra databasen.
                $sql = "SELECT fornavn, etternavn, epost, adresse, telefonnummer, ovelseid FROM publikum";

                $resultat = mysqli_query($db, $sql);

                if (!$resultat) {
                    trigger_error(mysqli_error($db));
                    echo "<br/> Feil, klarte ikke å registrere Publikum!";
                }

                if ($resultat->num_rows > 0) {
                    while ($rad = $resultat->fetch_assoc()) {
                        $uendret[] = array($rad["fornavn"], $rad["etternavn"], $rad["epost"], $rad["adresse"],
                            $rad["telefonnummer"], $rad["ovelseid"]);
                    }
                }

                if (!$resultat) {
                    trigger_error(mysqli_error($db));
                    echo "<br/> Feil, klarte ikke å registrere data!";
                }

                //--------------------------------------------------
                //Dette er en spørring som lagrer IDen til radene i databasen i en tabell
                //Dette er nødvendig fordi om man har radID 1,2,3,4 og fjerner 3
                //Så vil ikke en teller i en løkke ta hensyn til at radID 3 ikke finnes.
                $sql = "SELECT Publikumid FROM publikum";

                $resultat = mysqli_query($db, $sql);

                if (!$resultat) {
                    trigger_error(mysqli_error($db));
                    echo "<br/> Feil, klarte ikke å hente ovelse data!";
                }

                $Publikumid = array();

                if ($resultat->num_rows > 0) {
                    while ($rad = $resultat->fetch_assoc()) {
                        $Publikumid[] = $rad["Publikumid"];
                    }
                }

                if (!$resultat) {
                    trigger_error(mysqli_error($db));
                    echo "<br/> Feil, klarte ikke å lagre ovelse data!";
                }
                
                //Slettefunksjonen vil gå igjennom check list tabellen og se om den har blitt satt
                //Her bruker vi IDtabellen vår til å passe på at vi sletter riktig ID
                if (isset($_POST["slett"])) {
                    $sqlSlett = "";
                    if (!empty($_POST['check_list'])) {
                        foreach ($_POST['check_list'] as $check) {
                            $sqlSlett .= "DELETE FROM publikum ";
                            $sqlSlett .= "WHERE publikumid=" . $Publikumid[$check] . ";";
                        }
                    }
                    if ($sqlSlett == "") {
                        echo "<br/> Ingen rader er valgt for sletting";
                    } else {
                        if ($db->multi_query($sqlSlett)) {
                            echo "<br/> Valgte rader har blitt slettet!";
                            do {
                                if ($resultat = $db->store_result()) {
                                    while ($row = $result->fetch_row()) {
                                        
                                    }
                                    $resultat->free();
                                }
                                if ($db->more_results()) {
                                    
                                }
                            } while ($db->next_result());
                        }
                    }
                }
                //------------------------
                //Dette er selve oppdateringsfunksjonen.
                //Den starter med å lagre en tabell med alle verdiene som ligger i skjema
                //Navnene på hver input vil alltid være verdinavn etterfulgt av radnummert.
                //feks sted i førstre rad vil ha navnet sted0
                if (isset($_POST["oppdater"])) {
                    for ($i = 0; $i < $_SESSION["PublikumRadteller"]; $i++) {
                        $endret[] = array($_POST["fornavn" . $i], $_POST["etternavn" . $i], $_POST["epost" . $i],
                            $_POST["adresse" . $i], $_POST["telefonnummer" . $i], $_POST["ovelseid" . $i]);
                    }
                    //Nå som vi har en tabell med endret verdier og uendret verdier kan vi sammenligne
                    //Og oppdatere der det ikke er likt
                    if ($uendret == $endret) {
                        echo "<br/> Ingen rader er endret!";
                    } else {
                        for ($i = 0; $i < $_SESSION["PublikumRadteller"]; $i++) {
                            if ($uendret[$i] != $endret[$i]) {
                                $nyPublikum = new Publikum();
                                $feilString = validerEndring($nyPublikum, $endret, $i);
                                if ($feilString != null) {
                                    echo "<font color=red><br/>Valideringsfeil:</font> <br/><font color=red>$feilString</font>";
                                } else {
                                    $nyPublikum->set_povelseid($endret[$i][5]);
                                    $nyPublikum->set_publikumid($Publikumid[$i]);
                                    $nyPublikum->oppdater_Publikum();
                                }
                            }
                        }
                    }
                }
                
                // Her starter inputskjemaet vårt
                // Den inneholder en spørring for å hente data og en løkke for gå igjennom den.
                // Her er det mye HTML som blir echoet ut fra PHP. 
                // Verdiene fra spørringen blir satt inn i input feltene i skjemaet.
                // Det blir også echoet javascript valideringsfunskjoner
                // Hver rad får sin id som blir lagt på hvert inputfelt sitt navn

                $sqlDropdown = "SELECT ovelseid, type FROM ovelse";
                $resultatDropdown = mysqli_query($db, $sqlDropdown);

                $sql = "SELECT fornavn, etternavn, epost, adresse, telefonnummer, ovelseid FROM publikum";

                $resultat = mysqli_query($db, $sql);

                if ($resultat->num_rows > 0) {
                    echo '<form action="" name="skjema" method="post" onsubmit="return valider_alle()">'
                    . '<table width="auto" class="table table-striped">'
                    . '<tr><th>Fornavn</th><th></th><th>Etternavn</th><th></th><th>Epost</th><th></th><th>Adresse</th><th></th>'
                    . '<th>Telefonnummer</th><th></th><th>Ovelse</th><th>SLETT RAD?</th></tr>';
                    while ($rad = $resultat->fetch_assoc()) {
                        echo '<tr><td> <input type="text" value="' . $rad["fornavn"] . '" name="fornavn' . $radteller . '" onchange="valider_fornavn' . $radteller . '()"> </td>
                    <td><div id="feilfornavn' . $radteller . '" style="color:red;"></div></td>
                    <td> <input type="text" value="' . $rad["etternavn"] . '" name="etternavn' . $radteller . '" onchange="valider_etternavn' . $radteller . '()"> </td>
                    <td><div id="feiletternavn' . $radteller . '" style="color:red;"></div></td>
                    <td> <input type="text" value="' . $rad["epost"] . '" name="epost' . $radteller . '" onchange="valider_epost' . $radteller . '()"> </td>
                    <td><div id="feilepost' . $radteller . '" style="color:red;"></div></td>
                    <td> <input type="text" value="' . $rad["adresse"] . '" name="adresse' . $radteller . '" onchange="valider_adresse' . $radteller . '()"> </td>
                    <td><div id="feiladresse' . $radteller . '" style="color:red;"></div></td>
                    <td> <input type="text" value="' . $rad["telefonnummer"] . '" name="telefonnummer' . $radteller . '" onchange="valider_telefonnummer' . $radteller . '()"> </td>
                    <td><div id="feiltelefonnummer' . $radteller . '" style="color:red;"></div></td>';
                        echo '<td><select name="ovelseid' . $radteller . '">
                     <option value ="' . $rad["ovelseid"] . '">Uendret</option>';
                        $resultatDropdown = mysqli_query($db, $sqlDropdown);
                        while ($optionValg = mysqli_fetch_array($resultatDropdown)) {
                            echo "<option value='" . $optionValg['ovelseid'] . "'>" . $optionValg['type'] . "</option>";
                        }
                        echo "</select></td>";
                        echo "</select></td>";
                        echo '<td><input type="checkbox" name="check_list[]" value="' . $radteller . '"></td></tr>';
                        $radteller++;
                    }
                    echo "<tr>"
                    . "<td><input type = \"submit\" value=\"Oppdater\" name=\"oppdater\"/></td>"
                    . "<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>"
                    . "<td><input type=\"submit\" value=\"SLETT valgte rader\" name=\"slett\"/></td>"
                    . "</tr>"
                    . "</table>"
                    . "</form>";
                } else {
                    echo "Ingen verdier i databasen";
                }

                $_SESSION["PublikumRadteller"] = $radteller;
                
                // Her starter javascript valideringen vår
                // I likhet med skjemaet blir det her echoet mye som script
                // Dette er så vi kan opprette en valideringsfunksjon for hvert eneste felt som ble opprettet i skjemaet
                
                echo '<script type="text/javascript">';

                for ($i = 0; $i < $radteller; $i++) {
                    echo 'function valider_fornavn' . $i . '() {
                regEx = /^[a-zA-ZæøåÆØÅ .\-]{2,20}$/;
                OK = regEx.test(document.skjema.fornavn' . $i . '.value);
                if (!OK) {
                    document.getElementById("feilfornavn' . $i . '").innerHTML = "Feil i fornavn!";
                    return false;
                }
                document.getElementById("feilfornavn' . $i . '").innerHTML = "";
                return true;
            }
            ';
                }

                for ($i = 0; $i < $radteller; $i++) {
                    echo 'function valider_etternavn' . $i . '() {
                regEx = /^[a-zA-ZæøåÆØÅ .\-]{2,20}$/;
                OK = regEx.test(document.skjema.etternavn' . $i . '.value);
                if (!OK) {
                    document.getElementById("feiletternavn' . $i . '").innerHTML = "Feil i etternavn!";
                    return false;
                }
                document.getElementById("feiletternavn' . $i . '").innerHTML = "";
                return true;
            }
            ';
                }

                for ($i = 0; $i < $radteller; $i++) {
                    echo 'function valider_epost' . $i . '() {
                regEx = /^[a-zA-ZæøåÆØÅ0-9._-]+@[a-zA-ZæøåÆØÅ0-9.-]+\.[a-zA-Z]{2,20}$/;
                OK = regEx.test(document.skjema.epost' . $i . '.value);
                if (!OK) {
                    document.getElementById("feilepost' . $i . '").innerHTML = "Feil i epost!";
                    return false;
                }
                document.getElementById("feilepost' . $i . '").innerHTML = "";
                return true;
            }
            ';
                }

                for ($i = 0; $i < $radteller; $i++) {
                    echo 'function valider_adresse' . $i . '() {
                regEx = /^[a-zA-ZæøåÆØÅ0-9 .\-]{2,20}$/;
                OK = regEx.test(document.skjema.adresse' . $i . '.value);
                if (!OK) {
                    document.getElementById("feiladresse' . $i . '").innerHTML = "Feil i adresse!";
                    return false;
                }
                document.getElementById("feiladresse' . $i . '").innerHTML = "";
                return true;
            }
            ';
                }

                for ($i = 0; $i < $radteller; $i++) {
                    echo 'function valider_telefonnummer' . $i . '() {
                regEx = /^[0-9]{8}$/;
                OK = regEx.test(document.skjema.telefonnummer' . $i . '.value);
                if (!OK) {
                    document.getElementById("feiltelefonnummer' . $i . '").innerHTML = "Feil i telefonnummer!";
                    return false;
                }
                document.getElementById("feiltelefonnummer' . $i . '").innerHTML = "";
                return true;
            }
            ';
                }

                echo 'function valider_alle() {
             validering = true;';
                for ($i = 0; $i < $radteller; $i++) {
                    echo'fornavnOK = valider_fornavn' . $i . '();
             etternavnOK = valider_etternavn' . $i . '();
             epostOK = valider_epost' . $i . '();
             adresseOK = valider_adresse' . $i . '();
             telefonnumerOK = valider_telefonnummer' . $i . '();
                if (!fornavnOK || !etternavnOK || !epostOK || !adresseOK || !telefonnummerOK) {
                    validering = false;
                }
                ';
                }
                echo 'return validering;}';
                echo '</script>';
                ?>

                <script type="text/javascript">

                    function valider_fornavn() {
                        regEx = /^[a-zA-ZæøåÆØÅ .\-]{2,20}$/;
                        OK = regEx.test(document.PublikumReg.fornavn.value);
                        if (!OK) {
                            document.getElementById("feilfornavn").innerHTML = "Feil i fornavn!";
                            return false;
                        }
                        document.getElementById("feilfornavn").innerHTML = "";
                        return true;
                    }

                    function valider_etternavn() {
                        regEx = /^[a-zA-ZæøåÆØÅ .\-]{2,20}$/;
                        OK = regEx.test(document.PublikumReg.etternavn.value);
                        if (!OK) {
                            document.getElementById("feiletternavn").innerHTML = "Feil i etternavn!";
                            return false;
                        }
                        document.getElementById("feiletternavn").innerHTML = "";
                        return true;
                    }

                    function valider_epost() {
                        regEx = /^[a-zA-ZæøåÆØÅ0-9._-]+@[a-zA-ZæøåÆØÅ0-9.-]+\.[a-zA-Z]{2,20}$/;
                        OK = regEx.test(document.PublikumReg.epost.value);
                        if (!OK) {
                            document.getElementById("feilepost").innerHTML = "Feil i epost!";
                            return false;
                        }
                        document.getElementById("feilepost").innerHTML = "";
                        return true;
                    }

                    function valider_adresse() {
                        regEx = /^[a-zA-ZæøåÆØÅ0-9 .\-]{2,20}$/;
                        OK = regEx.test(document.PublikumReg.adresse.value);
                        if (!OK) {
                            document.getElementById("feiladresse").innerHTML = "Feil i adresse!";
                            return false;
                        }
                        document.getElementById("feiladresse").innerHTML = "";
                        return true;
                    }

                    function valider_telefonnummer() {
                        regEx = /^[0-9]{8}$/;
                        OK = regEx.test(document.PublikumReg.telefnr.value);
                        if (!OK) {
                            document.getElementById("feiltelfonnummer").innerHTML = "Feil i telefonnumer!";
                            return false;
                        }
                        document.getElementById("feiltelefonnumer").innerHTML = "";
                        return true;
                    }

                    function valider_utreg() {
                        fornavnOK = valider_fornavn();
                        etternavnOK = valider_etternavn();
                        epostOK = valider_epost();
                        adresseOK = valider_adresse();
                        telefonnummerOK = valider_telefonnummer();
                        if (fornavnOK && etternavnOK && epostOK && adresseOK && telefonnummerOK) {
                            return true;
                        }
                        return false;
                    }

                </script>

                <form action="" name="PublikumReg" method="post" onsubmit="return valider_utreg()">
                    <table width="auto" class="table table-striped">
                        <tr><th>Fornavn</th><th></th><th>Etternavn</th><th></th><th>Epost</th><th></th><th>Adresse</th><th></th><th>Telefonnummer</th><th></th><th>Ovelse</th><th></th></tr>
                        <tr><td> <input type="text" name="fornavn" onchange="valider_fornavn()"> </td>
                            <td><div id="feilfornavn" style="color:red;"></div></td>
                            <td> <input type="text" name="etternavn" onchange="valider_etternavn()" > </td>
                            <td><div id="feiletternavn" style="color:red;"></div></td>
                            <td> <input type="text" name="epost" onchange="valider_epost()" > </td>
                            <td><div id="feilepost" style="color:red;"></div></td>
                            <td> <input type="text" name="adresse" onchange="valider_adresse()" > </td>
                            <td><div id="feiladresse" style="color:red;"></div></td> 
                            <td> <input type="text" name="telefnr" onchange="valider_telefonnummer()" > </td>
                            <td><div id="feiltelefonnummer" style="color:red;"></div></td>
                            <td>
                                <select name="regOvelseid">
                                    <?php
                                    $resultatDropdown = mysqli_query($db, $sqlDropdown);
                                    while ($row = mysqli_fetch_array($resultatDropdown)) {
                                        echo "<option value='" . $row["ovelseid"] . "'>" . $row["type"] . "</option>";
                                    }
                                    echo "</select></td>";
                                    ?>
                                    <tr/>
                                    <tr>
                                        <td><input type="submit" value="Registrer" name="PublikumRegistrer"/></td>
                                    </tr>
                    </table>
                </form>

                </body>