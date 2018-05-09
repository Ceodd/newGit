<?php
class Kunde
{
    private $epost;
    private $navn;
    private $adresse;
    private $postnr;
    private $poststed;
    private $telefonnr;

    public function set_epost($epost) {$this->epost = $epost;}
    public function get_epost() {return $this->epost;}
    public function valider_epost($epost) {return preg_match("/[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/", $epost);}
    
    public function set_navn($navn) {$this->navn = $navn;}
    public function get_navn() {return $this->navn;}
    public function valider_navn($navn) {return preg_match("/^[a-zA-ZæøåÆØÅ .\-]{2,50}$/", $navn);}
    
   
    public function set_adresse($adresse) {$this->adresse = $adresse;}
    public function get_adresse() {return $this->adresse;}
    public function valider_adresse($adresse) {return preg_match("/^[a-zA-ZæøåÆØÅ .\-]{2,50}/", $adresse);}
    
    public function set_postnr($postnr) {$this->postnr = $postnr;}
    public function get_postnr() {return $this->postnr;}
    public function valider_postnr($postnr) {return preg_match("/[0-9]{4}/",$postnr);}
    
    public function set_poststed($poststed) {$this->poststed = $poststed;}
    public function get_poststed() {return $this->poststed;}
    public function valider_poststed($poststed) {return preg_match("/^[a-zA-ZæøåÆØÅ .\-]{2,50}/",$poststed);}
   

    public function set_telnr($telnr) {$this->telnr = $telnr;}
    public function get_telnr() {return $this->telefonnr;}
    public function valider_telnr($telnr) {return preg_match("/[0-9]{8}/",$telnr);}
}
?>