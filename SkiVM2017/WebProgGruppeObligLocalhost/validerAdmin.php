<?php

function validerAdmin($admin) {

    $feilstring = null; // bygg evt. feilmelding(er) inn i denne variablen

    if ($admin->valider_anavn($_POST["fornavn"])) {
        $admin->set_afornavn($_POST["fornavn"]);
        ;
    } else {
        $feilstring .= "Fornavn: " . $_POST["fornavn"] . " er ikke gyldig <br/>";
    }
    if ($admin->valider_anavn($_POST["etternavn"])) {
        $admin->set_aetternavn($_POST["etternavn"]);
        ;
    } else {
        $feilstring .= "Etternavn: " . $_POST["etternavn"] . " er ikke gyldig <br/>";
    }
    if ($admin->valider_atelefonnummer($_POST["telefonnummer"])) {
        $admin->set_atelefonnummer($_POST["telefonnummer"]);
    } else {
        $feilstring .= "Telefonnummer: " . $_POST["telefonnummer"] . " er ikke gyldig <br/>";
    }
    if ($admin->valider_passord($_POST["passord"])) {
        $admin->set_passord($_POST["passord"]);
    } else {
        $feilstring .= "Passord: " . $_POST["passord"] . " er ikke gyldig <br/>";
    }
    if ($admin->valider_brukernavn($_POST["brukernavn"])) {
        $admin->set_brukernavn($_POST["brukernavn"]);
    } else {
        $feilstring .= "Brukernavn: " . $_POST["brukernavn"] . " er ikke gyldig <br/>";
    }

    return $feilstring;
}
