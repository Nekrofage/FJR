<html>
<head>
</head>
<body>
<b>Le Monde</b><br>
<br>
<?php
// Taille du Monde : 640 * 480 = 307200 
//
// ici 30 et 20 sont les dimensions d'une carte type 
// 640/30=21
// 480/20=24

// Nombre de carte : 21 * 24 = 504 cartes dans le Monde

// Taille d'une carte : largeur 21 et hauteur : 24


// 30 * 20 = 600 pavés dans une carte



// initialisation du monde avec des points.

for($i=0;$i<480;$i++)
	{
	for($j=0;$j<640;$j++)
		{
		$monde_lettre[$i*640+$j]=".";
		}
	}


echo "Lecture du fichier : monde.txt<br><br>";

$fichier = "monde.txt";

$mode="r";

if ($fp=fopen($fichier,$mode))
	{
	while ($chaine=fgets($fp,30))
		{
		$tableau = explode(":",$chaine);
		//echo $tableau[0] . " " . $tableau[1]. " " . $tableau[2]." ";
		$position = 640 * $tableau[2] + $tableau[1];
		//echo $position . "<br>";
		$monde_lettre[$position]="@";
		if(strcmp($tableau[0],"h")==0)
			{
			$monde_lettre[$position+1]="@";
			$monde_lettre[$position+2]="@";
			}
		if(strcmp($tableau[0],"v")==0)
			{
			$monde_lettre[$position+640]="@";
			$monde_lettre[$position+1280]="@";
			$monde_lettre[$position+1920]="@";
			}

		}
	}

fclose($fp);


for($i=0;$i<480;$i++)
	{
	for($j=0;$j<640;$j++)
		{
		if(($i*640+$j)%640==0)
			$monde .= "\n";
		$monde .= $monde_lettre[$i*640+$j];
		}
	}


$fichier_sortie = "monde_carto.txt";

$mode="w";

echo "Création du fichier monde_carto.txt<br><br>";

if ($fp=fopen($fichier_sortie,$mode))
	{
	fwrite($fp,$monde);
	}

fclose($fp);


?>

<a href="./monde_carto.txt">Voir la cartographie du Monde</a><br>
<br>
<a href="./index.php">Retour au menu</a>
</body>
</html>
