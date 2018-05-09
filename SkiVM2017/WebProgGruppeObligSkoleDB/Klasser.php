<?php

Class utover {

    private $utoverid;
    private $fornavn;
    private $etternavn;
    private $epost;
    private $adresse;
    private $telefonnummer;
    private $ovelseid;

    public function set_ufornavn($innNavn) {
        $this->fornavn = $innNavn;
    }

    //validering av navn
    public function valider_unavn($innNavn) {
        return preg_match("/^[a-zA-ZæøåÆØÅ .\-]{2,20}$/", $innNavn);
    }

    public function set_uetternavn($innNavn) {
        $this->etternavn = $innNavn;
    }

    public function set_uadresse($innAdresse) {
        $this->adresse = $innAdresse;
    }

//validering av adresse
    public function valider_uadresse($innAdresse) {
        return preg_match("/^[a-zA-ZæøåÆØÅ0-9 .\-]{2,30}$/", $innAdresse);
    }

    public function set_utelefonnummer($innNummer) {
        $this->telefonnummer = $innNummer;
    }

//validering av telefonnummer
    public function valider_utelefonnummer($innNummer) {
        return preg_match("/^[0-9]{8}$/", $innNummer);
    }

    public function set_uepost($innEpost) {
        $this->epost = $innEpost;
    }

//validering av epost
    public function valider_uepost($innEpost) {
        return preg_match("/[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/", $innEpost);
    }

    public function set_uovelseid($innOvelseid) {
        $this->ovelseid = $innOvelseid;
    }

    public function set_utoverid($innUtoverid) {
        $this->utoverid = $innUtoverid;
    }

    public function registrer_utover() {

        $db = mysqli_connect("student.cs.hioa.no", "s315692", "", "s315692");
        if (!$db) {
            die("Kunne ikke knytte til server" . mysqli_error($db));
        }

        $fornavnESC = $db->real_escape_string($this->fornavn);
        $etternavnESC = $db->real_escape_string($this->etternavn);
        $epostESC = $db->real_escape_string($this->epost);
        $adresseESC = $db->real_escape_string($this->adresse);
        $telefonnummerESC = $db->real_escape_string($this->telefonnummer);

        $sql = "Insert INTO utover (fornavn,etternavn,epost,adresse,telefonnummer,ovelseid)";
        $sql .= "Values('$fornavnESC','$etternavnESC','$epostESC','$adresseESC','$telefonnummerESC','$this->ovelseid')";

        $resultat = mysqli_query($db, $sql);
        if (!$resultat) {
            trigger_error(mysqli_error($db));
            echo "Feil, klarte ikke å sette inn data";
        } elseif (mysqli_affected_rows($db) == 0) {
            echo "Feil, ingen rader er satt inn";
        } else {
            echo "Utøver er lagret!";
        }
    }

    public function oppdater_utover() {

        $db = mysqli_connect("student.cs.hioa.no", "s315692", "", "s315692");
        if (!$db) {
            die("<br/> Kunne ikke knytte til server" . mysqli_error($db));
        }

        $fornavnESC = $db->real_escape_string($this->fornavn);
        $etternavnESC = $db->real_escape_string($this->etternavn);
        $epostESC = $db->real_escape_string($this->epost);
        $adresseESC = $db->real_escape_string($this->adresse);
        $telefonnummerESC = $db->real_escape_string($this->telefonnummer);

        $sqlOppdater = "UPDATE utover SET fornavn='" . $fornavnESC . "', etternavn='" . $etternavnESC . "',";
        $sqlOppdater .= " epost='" . $epostESC . "', adresse='" . $epostESC . "', ";
        $sqlOppdater .= "telefonnummer='" . $telefonnummerESC . "', ovelseid='" . $this->ovelseid . "' ";
        $sqlOppdater .= "WHERE utoverid=" . $this->utoverid . ";";

        $resultat = mysqli_query($db, $sqlOppdater);
        if (!$resultat) {
            trigger_error(mysqli_error($db));
            echo "<br/> Feil, klarte ikke å oppdatere data";
        } else {
            echo "<br/> Data har blitt oppdatert!";
        }
    }

}

Class publikum {

    private $publikumid;
    private $fornavn;
    private $etternavn;
    private $epost;
    private $adresse;
    private $telefonnummer;
    private $ovelseid;

    public function set_pfornavn($innNavn) {
        $this->fornavn = $innNavn;
    }

    //validering av navn
    public function valider_pnavn($innNavn) {
        return preg_match("/^[a-zA-ZæøåÆØÅ .\-]{2,20}$/", $innNavn);
    }

    public function set_petternavn($innNavn) {
        $this->etternavn = $innNavn;
    }

    public function set_padresse($innAdresse) {
        $this->adresse = $innAdresse;
    }

//validering av adresse
    public function valider_padresse($innAdresse) {
        return preg_match("/^[a-zA-ZæøåÆØÅ0-9 .\-]{2,30}$/", $innAdresse);
    }

    public function set_ptelefonnummer($innNummer) {
        $this->telefonnummer = $innNummer;
    }

//validering av telefonnummer
    public function valider_ptelefonnummer($innNummer) {
        return preg_match("/^[0-9]{8}$/", $innNummer);
    }

    public function set_pepost($innEpost) {
        $this->epost = $innEpost;
    }

//validering av epost
    public function valider_pepost($innEpost) {
        return preg_match("/[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/", $innEpost);
    }

    public function set_povelseid($innOvelseid) {
        $this->ovelseid = $innOvelseid;
    }

    public function set_publikumid($innPublikumid) {
        $this->publikumid = $innPublikumid;
    }

    public function registrer_publikum() {

        $db = mysqli_connect("student.cs.hioa.no", "s315692", "", "s315692");
        if (!$db) {
            die("Kunne ikke knytte til server" . mysqli_error($db));
        }

        $fornavnESC = $db->real_escape_string($this->fornavn);
        $etternavnESC = $db->real_escape_string($this->etternavn);
        $epostESC = $db->real_escape_string($this->epost);
        $adresseESC = $db->real_escape_string($this->adresse);
        $telefonnummerESC = $db->real_escape_string($this->telefonnummer);

        $sql = "Insert INTO publikum (fornavn,etternavn,epost,adresse,telefonnummer,ovelseid)";
        $sql .= "Values('$fornavnESC','$etternavnESC','$epostESC','$adresseESC','$telefonnummerESC','$this->ovelseid')";

        $resultat = mysqli_query($db, $sql);
        if (!$resultat) {
            trigger_error(mysqli_error($db));
            echo "Feil, klarte ikke å sette inn data";
        } elseif (mysqli_affected_rows($db) == 0) {
            echo "Feil, ingen rader er satt inn";
        } else {
            echo "Publikum er lagret!";
        }
    }

    public function oppdater_publikum() {

        $db = mysqli_connect("student.cs.hioa.no", "s315692", "", "s315692");
        if (!$db) {
            die("<br/> Kunne ikke knytte til server" . mysqli_error($db));
        }

        $fornavnESC = $db->real_escape_string($this->fornavn);
        $etternavnESC = $db->real_escape_string($this->etternavn);
        $epostESC = $db->real_escape_string($this->epost);
        $adresseESC = $db->real_escape_string($this->adresse);
        $telefonnummerESC = $db->real_escape_string($this->telefonnummer);

        $sqlOppdater = "UPDATE publikum SET fornavn='" . $fornavnESC . "', etternavn='" . $etternavnESC . "',";
        $sqlOppdater .= " epost='" . $epostESC . "', adresse='" . $adresseESC . "', ";
        $sqlOppdater .= "telefonnummer='" . $telefonnummerESC . "', ovelseid='" . $this->ovelseid . "' ";
        $sqlOppdater .= "WHERE publikumid=" . $this->publikumid . ";";

        $resultat = mysqli_query($db, $sqlOppdater);
        if (!$resultat) {
            trigger_error(mysqli_error($db));
            echo "<br/> Feil, klarte ikke å oppdatere data";
        } else {
            echo "<br/> Data har blitt oppdatert!";
        }
    }

}

Class ovelse {

    private $dato;
    private $tid;
    private $type;
    private $sted;
    private $ovelseid;

    public function set_dato($innDato) {
        $this->dato = $innDato;
    }

//validering av dato
    public function valider_dato($innDato) {
        return preg_match("/^\d{2}[.]\d{2}[.]\d{4}$/", $innDato);
    }

    public function set_tid($innTid) {
        $this->tid = $innTid;
    }

//validering av tid
    public function valider_tid($innTid) {
        return preg_match("/(2[0-3]|[01][0-9]):([0-5][0-9])/", $innTid);
    }

    public function set_type($innType) {
        $this->type = $innType;
    }

//validering av type
    public function valider_type($innType) {
        return preg_match("/^[a-zA-ZæøåÆØÅ .\-]{2,20}$/", $innType);
    }

    public function set_sted($innSted) {
        $this->sted = $innSted;
    }

//validering av sted
    public function valider_sted($innSted) {
        return preg_match("/^[a-zA-ZæøåÆØÅ .\-]{2,20}$/", $innSted);
    }

    public function set_ovelseid($innOvelseid) {
        $this->ovelseid = $innOvelseid;
    }

    public function registrer_ovelse() {

        $db = mysqli_connect("student.cs.hioa.no", "s315692", "", "s315692");
        if (!$db) {
            die("Kunne ikke knytte til server" . mysqli_error($db));
        }

        $typeESC = $db->real_escape_string($this->type);
        $stedESC = $db->real_escape_string($this->sted);
        $datoESC = $db->real_escape_string($this->dato);
        $tidESC = $db->real_escape_string($this->tid);

        $sql = "Insert INTO ovelse (dato,tid,type,sted)";
        $sql .= "Values('$datoESC','$tidESC','$typeESC','$stedESC')";

        $resultat = mysqli_query($db, $sql);
        if (!$resultat) {
            trigger_error(mysqli_error($db));
            echo "<br/> Feil, klarte ikke å sette inn data";
        } elseif (mysqli_affected_rows($db) == 0) {
            echo "<br/> Feil, ingen rader er satt inn";
        } else {
            echo "<br/> Øvelse er lagret!";
        }
    }

    public function oppdater_ovelse() {

        $db = mysqli_connect("student.cs.hioa.no", "s315692", "", "s315692");
        if (!$db) {
            die("<br/> Kunne ikke knytte til server" . mysqli_error($db));
        }

        $typeESC = $db->real_escape_string($this->type);
        $stedESC = $db->real_escape_string($this->sted);
        $datoESC = $db->real_escape_string($this->dato);
        $tidESC = $db->real_escape_string($this->tid);

        $sqlOppdater = "UPDATE ovelse SET type='" . $typeESC . "', sted='" . $stedESC . "',";
        $sqlOppdater .= " dato='" . $datoESC . "', tid='" . $tidESC . "' ";
        $sqlOppdater .= "WHERE ovelseid=" . $this->ovelseid . ";";


        $resultat = mysqli_query($db, $sqlOppdater);
        if (!$resultat) {
            trigger_error(mysqli_error($db));
            echo "<br/> Feil, klarte ikke å oppdatere data";
        } else {
            echo "<br/> Data har blitt oppdatert!";
        }
    }

}

Class admin {

    private $brukernavn;
    private $passord;
    private $fornavn;
    private $etternavn;
    private $telefonnummer;

    // validering av fornavn og etternavn
    public function valider_anavn($innNavn) {
        return preg_match("/^[a-zA-ZæøåÆØÅ .\-]{2,20}$/", $innNavn);
    }

    public function set_afornavn($innFornavn) {
        $this->fornavn = $innFornavn;
    }

    public function set_aetternavn($innEtternavn) {
        $this->etternavn = $innEtternavn;
    }

    public function set_atelefonnummer($innTelefonnummer) {
        $this->telefonnummer = $innTelefonnummer;
    }

    //validering av telefonnummer
    public function valider_atelefonnummer($innNummer) {
        return preg_match("/^[0-9]{8}$/", $innNummer);
    }

    public function set_brukernavn($innBrukernavn) {
        $this->brukernavn = $innBrukernavn;
    }

//validerbrukernavn
    public function valider_brukernavn($innBrukernavn) {
        return preg_match("/^[a-zA-ZæøåÆØÅ0-9 .\-]{2,20}$/", $innBrukernavn);
    }

    public function set_passord($innPassord) {
        $this->passord = $innPassord;
    }

//valider passord
    public function valider_passord($innPassord) {
        return preg_match("/^[a-zA-ZæøåÆØÅ0-9 .\-]{2,20}$/", $innPassord);
    }

    public function registrer_admin() {

        $db = new mysqli("student.cs.hioa.no", "s315692", "", "s315692");
        if (!$db) {
            die("<br/> Kunne ikke knytte til server" . mysqli_error($db));
        }

        $fornavnESC = $db->real_escape_string($this->fornavn);
        $etternavnESC = $db->real_escape_string($this->etternavn);
        $telefonnummerESC = $db->real_escape_string($this->telefonnummer);
        $brukernavnESC = $db->real_escape_string($this->brukernavn);


        $phpsalt = "eirinerkulyomacaflow";
        $passord = $this->passord . $phpsalt;
        $hashPassord = sha1($passord);


        $sqlSjekkBruker = "Select brukernavn From admin Where brukernavn ='$this->brukernavn'";
        $resultatSjekkBruker = mysqli_query($db, $sqlSjekkBruker);
        if ($db->affected_rows >= 1) {
            echo "Brukernavnet finnes allerede! Bruk et annet navn";
            die();
        }

        $sql = "Insert INTO admin (fornavn,etternavn,telefonnummer,brukernavn,passord)";
        $sql .= "Values('$fornavnESC','$etternavnESC','$telefonnummerESC','$brukernavnESC','$hashPassord')";

        $resultat = mysqli_query($db, $sql);
        if (!$resultat) {
            trigger_error(mysqli_error($db));
            echo "Feil, klarte ikke å registrere admin";
        } elseif (mysqli_affected_rows($db) == 0) {
            echo "Feil, klarte ikke å registrere admin";
        } else {
            echo "Admin registrert!";
        }
    }

    public function logginn() {

        $db = new mysqli("student.cs.hioa.no", "s315692", "", "s315692");
        if (!$db) {
            die("<br/> Kunne ikke knytte til server" . mysqli_error($db));
        }

        $brukernavnESC = $db->real_escape_string($this->brukernavn);

        $phpsalt = "eirinerkulyomacaflow";
        $saltetPassord = $this->passord . $phpsalt;
        $ok = false;

        $sql = "Select passord From admin Where brukernavn ='$brukernavnESC'";
        $resultat = mysqli_query($db, $sql);
        if ($db->affected_rows >= 1) {
            $rad = $resultat->fetch_object();
            $passordHash = $rad->passord;
            $hashjetSaltetPassord = sha1($saltetPassord);
            if ($hashjetSaltetPassord == $passordHash) {
                $ok = true;
            }
            if ($ok) {
                echo "Passordet er korrekt!";
                return $ok;
            } else {
                echo "Passordet er IKKE korrekt!";
                return $ok;
            }
        } else {
            echo "Fant ingen bruker med det navnet";
            return $ok;
        }
    }

}
