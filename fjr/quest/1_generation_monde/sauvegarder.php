<html>
<head>
</head>
<body>
<center><b>Génération du monde</b></center>
<br>
<br>
<br>
<?php

$carte=$_POST['carte'];

$carte=StripSlashes($carte);

echo "Génération des cartes au format .txt  <br><br>";

echo "Carte de base :<br><br>";
echo "> $carte <";

$nb_carte = 21*24;

$requetes = "";

for($i=0;$i<$nb_carte;$i++)
	{
	$requetes .=  "INSERT INTO `fjr_quest_maps` VALUES ($i, 'carte$i', 30, 20,'" . substr($carte,0,-1) . "');\n";


	if($fp=fopen("./cartes/$i.txt","w+"))
		{
		$carte_a_enregistrer = substr($carte,0,-1);
		fwrite($fp,$carte_a_enregistrer);
		echo "$i-";
		}
	else
		{
		echo "Fichier carte impossible à sauvegarder.<br>";
		}


	fclose($fp);

	}




if($fp=fopen("./requetes.sql","w+"))
	{
	
	fwrite($fp,$requetes);
	}
else
	{
	echo "Fichier requeste impossible à sauvegarder.<br>";
	}


fclose($fp);

$pave = explode(",", $carte);

$destination = @imagecreatefrompng("./cartes/carte_blanche.png"); 

$r = 0 ;
$c = 0 ;

for($i=0;$i<(30*20);$i++)
	{
	$nom_image_source = "../../images/carte_paves/".trim($pave[$i]);
	$source = @imagecreatefrompng($nom_image_source);
	if($i%30==0)
		{
		$destination_y = $r*25;
		$r++;
		$c=0;
		}
	$destination_x = $c * 25;
	$c++;
	imagecopy($destination, $source, $destination_x, $destination_y, 0, 0, 25, 25);
	}

$image_carte = "./cartes/".$num_carte.".png";
imagepng($destination, $image_carte); // on enregistre l'image 


?>
<br>
<br>
Génération des cartes au format .png :
<br>
<br>
<?php

@copy("./cartes/".$num_carte.".png", "./cartes/carte_base.png");

$nb_carte = 21*24;



for($i=0;$i<$nb_carte;$i++)
	{
	$carte_destination = "./cartes/".$i.".png";
	if(@copy("./cartes/carte_base.png", $carte_destination))
		{
		echo "$i-";
		}
	else 
		echo "Erreur";
	}


?>
<br>
<br>
Compresser le fichier requetes.sql en requetes.sql.gz<br>
Importer le fichier requetes.sql.gz dans la base de donnée <br>
<br>
<br>
<a href="./index.php">Retour</a>
<br>
<br>
Remarque : <br>
- Ne pas oubliez de modifier le fichier graphique carte_blanche.png<br>
- Enlevez le auto-increment dans le champs id de la table phpbb_quest_maps<br>
</body>
</html>
