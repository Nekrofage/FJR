<html>
<head>
</head>
<body>

<?php

function generer_carte($carte_mini_x, $carte_mini_y, $carte_lettre)
	{
	$lettre_x = 0;
	$lettre_y = 0;
	$lettre_z = 0;

	$lettre_y_depart = ( ( 640 * 20 ) * $carte_mini_y ) + (30 * $carte_mini_x);

	for($y=0;$y<20;$y++)
		{
		$lettre_y = $lettre_y_depart + (640 * $y) ;
		for($x=0;$x<30;$x++)
			{
			$lettre_x = $x  ;
			$lettre_z = $lettre_y + $lettre_x;
		
			if(strcmp(".",$carte_lettre[$lettre_z])==0)
				$carte_mini .= "grass.png,";
			else
				$carte_mini .= "dirt.png,";
			}
		}

	return $carte_mini;
	}

function sauvegarder_carte($carte_mini_num, $carte_mini)
	{
	if($fp=fopen("./cartes/$carte_mini_num.txt","w+"))
		{
		$carte_a_enregistrer = substr($carte_mini,0,-1);
		fwrite($fp,$carte_a_enregistrer);
		}
	else
		echo "Fichier carte impossible à sauvegarder.<br>";
	fclose($fp);
	}

// Taille d'un "Tile = 25 x 25 px

function sauvegarder_carte_image($carte_mini_num,$carte_mini )
	{
	$pave = explode(",", $carte_mini);

	$destination = @ImageCreateTrueColor(750,500); 

	$r = 0 ;
	$c = 0 ;

	for($i=0;$i<(20*30);$i++)
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
		@imagecopy($destination, $source, $destination_x, $destination_y, 0, 0, 25, 25);
		}

	$image_carte = "./cartes/".$carte_mini_num.".png";
	@imagepng($destination, $image_carte); // on enregistre l'image 
	}

function inserer_bdd($carte_mini_num,$carte_mini )
	{

	$table = "fjr";
	include("../../config.php");
	@mysql_connect("$dbhost","$dbuser","$dbpasswd");
	$select_base=@mysql_selectdb("$dbname"); 
	echo "Serveur : $dbhost <br> Nom de la base de donnée : $dbname <br><br>";
	$carte_mini = substr($carte_mini, 0, strlen($carte_mini)-1);
 
	if (!$select_base) 
		{
		echo "<br><br><font color=\"#CC0000\"><b>Mauvaise configuration!!! </b></font><br>  
Vérifiez que votre login et mot de passe sont bien saisi pour la connexion 
à la base <b>$base</b>"; 
		}
	else 
		{
		$result = mysql_db_query($dbname,"UPDATE ".$table."_quest_maps SET map_data='$carte_mini' WHERE id= $carte_mini_num ");

		echo "Requete : <br>";
		echo "UPDATE ".$table."_quest_maps SET map_data='$carte_mini' WHERE id=$carte_mini_num ";
		echo "<br>";

		if ($result < 1)
			{
			echo "<br>Pas de mise-à-jour de le carte $carte_mini_num dans la table fjr <br>";
			echo "requete : <br>";
			echo "";
			}
		else
			{
			echo "<br>Mise-à-jour de la carte $carte_mini_num de la table fjr de la base de donnée fjr<br>";
			echo "Donnees à insérer : <br>";
			}
		}
	mysql_close();
	}


// Hauteur
for($i=0;$i<480;$i++)
	{
	// Largeur
	for($j=0;$j<640;$j++)
		{
		$carte_lettre[$i*640+$j]=".";
		}
	}

$fichier = "monde.txt";

$mode="r";

if ($fp=fopen($fichier,$mode))
	{
	while ($chaine=fgets($fp,30))
		{
		$tableau = explode(":",$chaine);
		$position = 640 * $tableau[2] + $tableau[1];
		$carte_lettre[$position]="@";
		if(strcmp($tableau[0],"h")==0)
			{
			$carte_lettre[$position+1]="@";
			$carte_lettre[$position+2]="@";
			}
		if(strcmp($tableau[0],"v")==0)
			{
			$carte_lettre[$position+640]="@";
			$carte_lettre[$position+1280]="@";
			$carte_lettre[$position+1920]="@";
			}

		}
	}

fclose($fp);


$y=$_GET['y'];

echo "Traitement de la ligne $y<br><br>";

echo "Attendre 5 secondes ...<br><br>";

// 21 = nombre de colonne dans le Monde
for($x=0;$x<21;$x++)
	{

	$carte_mini_x = $x;
	$carte_mini_y = $y;

	$carte_mini_num = $carte_mini_y * 21 + $carte_mini_x;
	$carte_mini = generer_carte($carte_mini_x, $carte_mini_y, $carte_lettre);
	sauvegarder_carte($carte_mini_num, $carte_mini);
	sauvegarder_carte_image($carte_mini_num,$carte_mini );
	inserer_bdd($carte_mini_num,$carte_mini );	
	}

echo "Création de la ligne $y du monde AngQuest terminé<br>";

// 24 = nombre de ligne dans le Monde

if($y<23)
	{	
	$y=$y+1;

	echo "<a href='./generation_cartes.php?y=$y'>Continuer</a>";

	echo "<SCRIPT Language='JavaScript'>";
	echo "function GoPage()";
	echo "	{";
	echo "window.location.href='./generation_cartes.php?y=$y';";
	echo "	}";
	echo "setTimeout('GoPage()',9000);";
	echo "</SCRIPT>";
	}
else
	{
	echo "Fin de la création de la carte<br>";
	echo "Executer le script de copie de carte du serveur local vers le serveur distant : copier_carte_local_distant.sh <br>";
	echo "ou<br>";
	echo "Executer le script de copie de carte du serveur local vers le serveur local : copier_carte_local_local.sh <br>";
	echo "(Copie des images de la carte angquest/carte/ dans le répertoire images/map_maps) <br>";
	echo "Executer le script de redimensionnement des images pour créer la carte de visualisation : redimensionner_image.sh <br>";
	echo '<a href="visu_carte_sn.php">Visualiser la carte AngQuest</a>';
	}

?>

</body>
</html>
