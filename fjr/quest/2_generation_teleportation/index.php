<html>
<head>
</head>
<body>
<?php

$chemin=".";
$repertoire=dir($chemin);

$nbf=0;

while($fichier = $repertoire->read())
	{
	if (ereg(".gz",$fichier))
		{
		$nbf++;	
		}
	}

$nbf=$nbf-1;
	
$repertoire->close();
?>
<b><u>G�n�ration des t�l�porteurs</u></b><br>
<br>
<a href="./generation_teleportation.php">G�n�ration des requ�tes de t�l�portation</a><br><br>
Ex�cuter le fichier decouper.sh<br><br>
<a href="./insertion_requete.php?cpt=0&nbf=<?php echo "$nbf" ?>">Insertion des requ�tes de t�l�portation</a><br>
</body>
</html>
