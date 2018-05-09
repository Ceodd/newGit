<?php
echo "<h1>Oppgave 1</h1>";
$teller = 0;
$sum = 0;
for ($i=3; $i<=100;$i+=3)
{
	echo $i. "</br>";
	$teller++;
	$sum=$sum+$i;
}
$snitt=$sum/$teller;
echo "</br>";
echo "Gjennomsnitt av tallene er: $snitt </br> ";
echo "</br>";


$teller=3;
while ($teller<=100)
{
	echo "$teller </br>";
	$teller+=3;
	
}


echo "<h1>Oppgave 2</h2>";
echo "<p><strong>a)</strong></p></br>";
$liste=array(1,4,8,1,4,10,5,6,2,4,6);

$over=0;

for($i=0;$i<count($liste);$i++)
{
	if ($liste[$i]>5)
	{
		$over+=1;
		echo $liste[$i]."</br> ";
		
	}
	
}
echo "<p><strong>b)</strong></p></br>";
$antall = 0;
for ($i=0;$i<count($liste);$i++)
{
	if($liste[$i]>5)
	{
		$antall+=1;
		
	}
}

echo "Antall tall som er større enn 5 er: " .$antall. "</br>";
echo "<p><strong>c)</strong></p></br>";

echo "Array i omvendt rekkefølge:";
for ($i=count($liste)-1;$i>=0;$i-=1)
{
	echo $liste[$i]. " ";
}
echo "</br>";

echo "<p><strong>d)</strong></p></br>";
echo "Minste tall er: ";

$antall = count($liste);
$tall = $liste[0];

foreach($liste as $minste)
{
	if($minste<$tall)
	{
	$tall=$minst;
	}
}
echo $tall;
echo "</br>";

echo "<p><strong>e)</strong></p></br>";
$tall = min($liste);
echo "Minste tallet i array funnet med innebygd funksjon er: $tall</br>";
echo "</br>";

echo "<p><strong>f)</strong></p></br>";

function TallOver5($array)
{
	
        $listeUT=array();
        

	for($i=0;$i<count($array);$i++)
	{
		if ($array[$i]>5)
		{
                    array_push($listeUT,$array[$i]);
		
		}
                
	}
        return $listeUT;
}
$fem = TallOver5($liste);

echo "Tallene over 5 er: </br>";

for($i=0;$i<count($fem);$i++)
{
    echo $fem[$i];
    echo "</br>";
    
}




echo "</br>";

function AntallOver5($array)
{
	$over=0;
        

	for($i=0;$i<count($array);$i++)
	{
		if ($array[$i]>5)
		{
                    $over++;
		
		}
                
	}
        return $over;
}
$fem = AntallOver5($liste);
echo "Antall tall over 5 er: $fem ";




?>