<?php

$id = $_GET["ovelseid"];
$db = mysqli_connect("localhost", "root", "", "skivm");
if (!$db) {
    die("Kunne ikke knytte til server" . mysqli_error($db));
}
if ($db->connect_error) {
    $feil["feil"] = "Feil i db!";
    echo json_encode($feil);
    die();
}


$sql = "SELECT fornavn, etternavn, epost, adresse, telefonnummer from utover WHERE ovelseid=" . $id;

$resultat = mysqli_query($db, $sql);

$jsontabell = array();

while ($rad = $resultat->fetch_object()) {

    $jsontabell[] = $rad;
}

$json = json_encode($jsontabell);
echo $json;

?>