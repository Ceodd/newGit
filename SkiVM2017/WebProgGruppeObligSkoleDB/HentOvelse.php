<?php

$id = $_GET["ovelseid"];
$db = mysqli_connect("student.cs.hioa.no", "s315692", "", "s315692");
if (!$db) {
    die("Kunne ikke knytte til server" . mysqli_error($db));
}
if ($db->connect_error) {
    $feil["feil"] = "Feil i db!";
    echo json_encode($feil);
    die();
}

$sql = "SELECT type, sted, dato, tid from ovelse WHERE ovelseid=" . $id;

$resultat = mysqli_query($db, $sql);

$jsontabell = array();

while ($rad = $resultat->fetch_object()) {

    $jsontabell[] = $rad;
}

$json = json_encode($jsontabell);
echo $json;

?>