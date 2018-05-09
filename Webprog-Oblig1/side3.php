<?php
session_start();
include("Class_Kunde.php");
//include("Class_Bestilling.php");
include("ValiderKunde.php");
        
        $navn=$_SESSION["navn"];
        $adresse=$_SESSION["adresse"];
        $postnr=$_SESSION["postnr"];
        $poststed=$_SESSION["poststed"];
        $epost=$_SESSION["epost"];
        $telefonnummer=$_SESSION["telefonnummer"];
        $type=$_SESSION["type"];
        $antall=$_SESSION["antall"];
        $kunde = new Kunde();
        $feilString = valider($kunde);
        if($feilString!=null)
        {
            // Det er en valideringsfeil i kunderegistrering!
            echo "Valideringsfeil : <br/>";
            echo $feilString;
        }
        else
        {

            echo "Data har blitt lagret! </br>";
            echo "Her følger all data lagret om bestillinger: </br>";
            $db=new mysqli("localhost","root","","bestilling");
            if($db->connect_error)
            {
                return "Feil i databaseknyttningen!";
                trigger_error($db->connect_error);
            }

            $db->autocommit(false);
            $ok=true;
            $sql = "Insert into kunde (epost,navn,adresse,telnr,postnr,poststed)";
            $sql.= "Values ('$epost','$navn','$adresse','$telefonnummer','$postnr','$poststed')";
            $resultat=$db->query($sql);
            if(!$resultat)
            {
                echo "Feil i databseinnsetting!<br/>";
                trigger_error($db->error);
                $ok=false;
            }
            else
            {
                $antallRader = $db->affected_rows;
                if($antallRader==0)
                {
                    trigger_error("Insert return 0 rows");
                    echo "Kunne ikke sette inn dataene i databasen!";
                    $ok=false;
                }
            }
            $sql = "Insert into bestilling (antall,type,epost)";
            $sql.= "Values ('$antall','$type','$epost')";
            $resultat=$db->query($sql);
            if(!$resultat)
            {
                echo "Feil i databseinnsetting!<br/>";
                trigger_error($db->error);
                $ok=false;
            }
            else
            {
                $antallRader = $db->affected_rows;
                if($antallRader==0)
                {
                    trigger_error("Insert return 0 rows");
                    echo "Kunne ikke sette inn dataene i databasen!";
                    $ok=false;
                }
            }
            if($ok)
            {
                $db->commit();
            }
            else
            {
                $db->rollback();
            }
            $db->close();
            }
            
        $db=new mysqli("localhost","root","","bestilling");
        if($db->connect_error)
        {
            echo "Feil i databaseknyttningen!";
            trigger_error($db->connect_error);
        }
         $sql = "Select * from kunde as k, bestilling as b where k.epost=b.epost";
         $resultat=$db->query($sql);
         if(!$resultat)
         {
            echo "Feil i lesning fra databse!<br/>";
            trigger_error($db->error);
         }
         else
         {
            $antallRader = $db->affected_rows;
            echo "<table border = '1.0'><tr><td>E-post<td/><td>Navn<td/><td>Adresse<td/><td>Telnr<td/>";
            echo "<td>Postnr<td/><td>Poststed<td/><td>Tid<td/><td>Antall<td/><td>Type<td/>";
            for ($i=0;$i<$antallRader;$i++)
            {
                echo "<tr><td>";
                $rad=$resultat->fetch_object();
                echo $rad->epost."<td/><td>".$rad->navn."<td/><td>".$rad->adresse."<td/><td>".$rad->telnr."<td/><td>";
                echo $rad->postnr."<td/><td>".$rad->poststed."<td/><td>".$rad->tid."<td/><td>".$rad->antall."<td/><td>".$rad->type."<td/>";
            }   echo "<tr/>";
            echo "<table/>";
         }
         $db->close();
?>
