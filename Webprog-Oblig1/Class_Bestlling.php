<?php
class Bestilling
{
    private $tid;
    private $type;
    private $antall;
    private $epost;

    
    public function set_tid($tid) {$this->tid = $tid;}
    public function get_tid() {return $this->tid;}
    
   
    public function set_type($type) {$this->type = $type;}
    public function get_type() {return $this->type;}
    
    public function set_antall($antall) {$this->antall = $antall;}
    public function get_antall() {return $this->antall;}
    
    public function set_epost($epost) {$this->epost = $epost;}
    public function get_epost() {return $this->epost;}
 
    

}
?>