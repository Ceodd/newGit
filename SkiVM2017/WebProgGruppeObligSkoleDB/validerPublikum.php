<?php

function validerRegistrering($publikum) {
    $feilstring = null; // bygg evt. feilmelding(er) inn i denne variablen
    if ($publikum->valider_pepost($_POST["epost"])) {
        $publikum->set_pepost($_POST["epost"]);
    } else {
        $feilstring .= "E-post er ikke gyldig <br/>";
    }
    if ($publikum->valider_pnavn($_POST["fornavn"])) {
        $publikum->set_pfornavn($_POST["fornavn"]);
    } else {
        $feilstring .= "Navnet må være mellom 2 og 50 tegn<br/>";
    }
    if ($publikum->valider_pnavn($_POST["etternavn"])) {
        $publikum->set_petternavn($_POST["etternavn"]);
    } else {
        $feilstring .= "Navnet må være mellom 2 og 50 tegn<br/>";
    }
    if ($publikum->valider_padresse($_POST["adresse"])) {
        $publikum->set_padresse($_POST["adresse"]);
    } else {
        $feilstring .= "Adressen må være mellom 2 og 50 tegn<br/>";
    }
    if ($publikum->valider_ptelefonnummer($_POST["telefnr"])) {
        $publikum->set_ptelefonnummer($_POST["telefnr"]);
    } else {
        $feilstring .= "Telefonnummeret må være på 8 siffer <br/>";
    }

    return $feilstring;
}

function validerEndring($publikum, $tabell, $radnummer) {

    $feilstring = null; // bygg evt. feilmelding(er) inn i denne variablen

    if ($publikum->valider_pnavn($tabell[$radnummer][0])) {
        $publikum->set_pfornavn($tabell[$radnummer][0]);
    } else {
        $feilstring .= "Fornavn: " . $tabell[$radnummer][0] . " er ikke gyldig <br/>";
    }
    if ($publikum->valider_pnavn($tabell[$radnummer][1])) {
        $publikum->set_petternavn($tabell[$radnummer][1]);
    } else {
        $feilstring .= "Etternavn: " . $tabell[$radnummer][1] . " er ikke gyldig <br/>";
    }
    if ($publikum->valider_pepost($tabell[$radnummer][2])) {
        $publikum->set_pepost($tabell[$radnummer][2]);
    } else {
        $feilstring .= "Epost: " . $tabell[$radnummer][2] . " er ikke gyldig <br/>";
    }
    if ($publikum->valider_padresse($tabell[$radnummer][3])) {
        $publikum->set_padresse($tabell[$radnummer][3]);
    } else {
        $feilstring .= "Adresse: " . $tabell[$radnummer][3] . " er ikke gyldig <br/>";
    }
    if ($publikum->valider_ptelefonnummer($tabell[$radnummer][4])) {
        $publikum->set_ptelefonnummer($tabell[$radnummer][4]);
    } else {
        $feilstring .= "Telefonnummer: " . $tabell[$radnummer][4] . " er ikke gyldig <br/>";
    }
    return $feilstring;
}

?>
