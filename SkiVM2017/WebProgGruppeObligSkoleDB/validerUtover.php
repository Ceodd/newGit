<?php

function validerRegistrering($utover) {

    $feilstring = null; // bygg evt. feilmelding(er) inn i denne variablen

    if ($utover->valider_unavn($_POST["fornavn"])) {
        $utover->set_ufornavn($_POST["fornavn"]);
    } else {
        $feilstring .= "Fornavn: " . $_POST["fornavn"] . " er ikke gyldig <br/>";
    }
    if ($utover->valider_unavn($_POST["etternavn"])) {
        $utover->set_uetternavn($_POST["etternavn"]);
    } else {
        $feilstring .= "Etternavn: " . $_POST["etternavn"] . " er ikke gyldig <br/>";
    }
    if ($utover->valider_uepost($_POST["epost"])) {
        $utover->set_uepost($_POST["epost"]);
    } else {
        $feilstring .= "Epost: " . $_POST["epost"] . " er ikke gyldig <br/>";
    }
    if ($utover->valider_uadresse($_POST["adresse"])) {
        $utover->set_uadresse($_POST["adresse"]);
    } else {
        $feilstring .= "Adresse: " . $_POST["adresse"] . "er ikke gyldig <br/>";
    }
    if ($utover->valider_utelefonnummer($_POST["telefonnummer"])) {
        $utover->set_utelefonnummer($_POST["telefonnummer"]);
    } else {
        $feilstring .= "Telefonnummer: " . $_POST["telefonnummer"] . "er ikke gyldig <br/>";
    }
    return $feilstring;
}

function validerEndring($utover, $tabell, $radnummer) {

    $feilstring = null; // bygg evt. feilmelding(er) inn i denne variablen

    if ($utover->valider_unavn($tabell[$radnummer][0])) {
        $utover->set_ufornavn($tabell[$radnummer][0]);
    } else {
        $feilstring .= "Fornavn: " . $tabell[$radnummer][0] . " er ikke gyldig <br/>";
    }
    if ($utover->valider_unavn($tabell[$radnummer][1])) {
        $utover->set_uetternavn($tabell[$radnummer][1]);
    } else {
        $feilstring .= "Etternavn: " . $tabell[$radnummer][1] . " er ikke gyldig <br/>";
    }
    if ($utover->valider_uepost($tabell[$radnummer][2])) {
        $utover->set_uepost($tabell[$radnummer][2]);
    } else {
        $feilstring .= "Epost: " . $tabell[$radnummer][2] . " er ikke gyldig <br/>";
    }
    if ($utover->valider_uadresse($tabell[$radnummer][3])) {
        $utover->set_uadresse($tabell[$radnummer][3]);
    } else {
        $feilstring .= "Adresse: " . $tabell[$radnummer][3] . " er ikke gyldig <br/>";
    }
    if ($utover->valider_utelefonnummer($tabell[$radnummer][4])) {
        $utover->set_utelefonnummer($tabell[$radnummer][4]);
    } else {
        $feilstring .= "Telefonnummer: " . $tabell[$radnummer][4] . " er ikke gyldig <br/>";
    }
    return $feilstring;
}

?>