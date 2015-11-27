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
<b><u>Génération des téléporteurs</u></b><br>
<br>
<a href="./generation_teleportation.php">Génération des requêtes de téléportation</a><br><br>
Exécuter le fichier decouper.sh<br><br>
<a href="./insertion_requete.php?cpt=0&nbf=<?php echo "$nbf" ?>">Insertion des requêtes de téléportation</a><br>
</body>
</html>
