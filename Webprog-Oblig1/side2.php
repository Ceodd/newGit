<?php
session_start();
        
        echo "<h2>Her er informasjonen du har sendt oss:</h2>";
        date_default_timezone_set("Europe/Oslo"); 
        echo "Tid og dato: " . date("H:i:s d-m-Y");
        $tid = date("H:i:s d-m-Y");
        
                   echo     "<table border=1>";
                   echo     "<tr>";
                   echo     "<td>Navn:<br/></td>";
                   echo     "<td>" .$_REQUEST["navn"]."<br/></td>";
                   echo     "</tr>";
                   echo     "<tr>";
                   echo     "<td>Adresse:<br/></td>";
                   echo     "<td>" .$_REQUEST["adresse"]."<br/></td>";
                   echo     "</tr>";
                   echo     "<tr>";
                   echo     "<td>Postnummer:<br/></td>";
                   echo     "<td>" .$_REQUEST["postnr"]."<br/></td>";
                   echo     "</tr>";
                   echo     "<tr>";
                   echo     "<td>Poststed:<br/></td>";
                   echo     "<td>" .$_REQUEST["poststed"]."<br/></td>";
                   echo     "</tr>";
                   echo     "<tr>";
                   echo     "<td>Telefonnummer:<br/></td>";
                   echo     "<td>" .$_REQUEST["telefonnummer"]."<br/></td>";
                   echo     "</tr>";
                   echo     "<tr>";
                   echo     "<td>E-post adresse:<br/></td>";
                   echo     "<td>" .$_REQUEST["epost"]."<br/></td>";
                   echo     "</tr>"; 
                   echo     "</table><br>";

           $type = $_REQUEST["type"];
           echo "Du ønsker denne typen billett: <strong>$type</strong><br>";
           echo "<p>Antallet billetter du har valgt er:</p>";
           echo $_REQUEST["antall"];
           echo "<br>";
           


        $_SESSION["navn"] = $_REQUEST["navn"];
	$_SESSION["adresse"] = $_REQUEST["adresse"];
	$_SESSION["postnr"] = $_REQUEST["postnr"];
	$_SESSION["poststed"] = $_REQUEST["poststed"];
	$_SESSION["epost"] = $_REQUEST["epost"];
        $_SESSION["telefonnummer"] = $_REQUEST["telefonnummer"];
        $_SESSION["type"] = $_REQUEST["type"];
        $_SESSION["antall"] = $_REQUEST["antall"];
	    
          
     
?>
<form action ="side3.php">
    <p>Trykk for å bekrefte bestilling</p>
    <input type="submit" name ="bekreft" value="Bekreft" />
</form>

<form action ="index.php">
    <p>Trykk for å avbryte og gå tilbake til forrige side</p>
    <input type="submit" name ="avbryt" value="Avbryt" />
</form>

