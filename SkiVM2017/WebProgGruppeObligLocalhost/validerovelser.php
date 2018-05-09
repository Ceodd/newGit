<?php

function validerRegistrering($ovelse) {
    $feilstring = null; // bygg evt. feilmelding(er) inn i denne variablen
    if ($ovelse->valider_type($_POST["type"])) {
        $ovelse->set_type($_POST["type"]);
    } else {
        $feilstring .= "Type: " . $_POST["type"] . " er ikke gyldig <br/>";
    }
    if ($ovelse->valider_sted($_POST["sted"])) {
        $ovelse->set_sted($_POST["sted"]);
    } else {
        $feilstring .= "Sted: " . $_POST["sted"] . " er ikke gyldig <br/>";
    }
    if ($ovelse->valider_dato($_POST["dato"])) {
        $ovelse->set_dato($_POST["dato"]);
    } else {
        $feilstring .= "Dato: " . $_POST["dato"] . " er ikke gyldig <br/>";
    }
    if ($ovelse->valider_tid($_POST["tid"])) {
        $ovelse->set_tid($_POST["tid"]);
    } else {
        $feilstring .= "Tid: " . $_POST["tid"] . "er ikke gyldig <br/>";
    }
    return $feilstring;
}

function validerEndring($ovelse, $tabell, $radnummer) {
    $feilstring = null; // bygg evt. feilmelding(er) inn i denne variablen
    if ($ovelse->valider_type($tabell[$radnummer][0])) {
        $ovelse->set_type($tabell[$radnummer][0]);
    } else {
        $feilstring .= "Type: " . $tabell[$radnummer][0] . " er ikke gyldig <br/>";
    }
    if ($ovelse->valider_sted($tabell[$radnummer][1])) {
        $ovelse->set_sted($tabell[$radnummer][1]);
    } else {
        $feilstring .= "Sted: " . $tabell[$radnummer][1] . " er ikke gyldig <br/>";
    }
    if ($ovelse->valider_dato($tabell[$radnummer][2])) {
        $ovelse->set_dato($tabell[$radnummer][2]);
    } else {
        $feilstring .= "Dato: " . $tabell[$radnummer][2] . " er ikke gyldig <br/>";
    }
    if ($ovelse->valider_tid($tabell[$radnummer][3])) {
        $ovelse->set_tid($tabell[$radnummer][3]);
    } else {
        $feilstring .= "Tid: " . $tabell[$radnummer][3] . "er ikke gyldig <br/>";
    }
    return $feilstring;
}

?>