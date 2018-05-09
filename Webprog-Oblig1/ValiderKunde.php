<?php
function valider($kunde)
        
{
        $feilstring = null; // bygg evt. feilmelding(er) inn i denne variablen
        if($kunde->valider_epost($_SESSION["epost"]))
        {
            $kunde->set_epost($_SESSION["epost"]);
            
        }
        else
        {
            $feilstring .="E-post er ikke gyldig <br/>";
        }
        if($kunde->valider_navn($_SESSION["navn"]))
        {
            $kunde->set_navn($_SESSION["navn"]);
        }
        else
        {
            $feilstring.= "Navnet må være mellom 2 og 50 tegn<br/>";
        }
        if($kunde->valider_adresse($_SESSION["adresse"]))
        {
            $kunde->set_adresse($_SESSION["adresse"]);
        }
        else
        {
            $feilstring .= "Adressen må være mellom 2 og 50 tegn<br/>";
        }
        if($kunde->valider_telnr($_SESSION["telefonnummer"]))
        {
            $kunde->set_telnr($_SESSION["telefonnummer"]);
        }
        else
        {
            $feilstring .= "Telefonnummeret må være på 8 siffer <br/>";
        }
        if($kunde->valider_postnr($_SESSION["postnr"]))
        {
            $kunde->set_postnr($_SESSION["postnr"]);
        }
        else
        {
            $feilstring .= "Postnummeret må være på fire siffer<br/>";
        }
        
        if($kunde->valider_poststed($_SESSION["poststed"]))
        {
            $kunde->set_poststed($_SESSION["poststed"]);
        }
        else
        {
            $feilstring .= "Poststed må være mellom 2 og 50 tegn<br/>";
        }
        return $feilstring;
}
?>
