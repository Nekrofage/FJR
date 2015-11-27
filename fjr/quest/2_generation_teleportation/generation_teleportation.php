<html>
<head>
<body>
<center><b>Génération de téléporteur</b></center>
<br>
<br>
<?php

$id_carte = 0;

$requetes = "";

$table="fjr";

// ne pas prendre en cote les cartes de côtés
for($i=1;$i<23;$i++)
	{
	for($j=1;$j<20;$j++)
		{
		
		$num_carte = ($i*21) + $j ;

		// bord haut 
		$vers_num_carte = $num_carte - 21;
		$texte_carte = "Carte " . $vers_num_carte;
		for($k=0;$k<30;$k++)
			{
			$id_carte++;
			//  id    from_id  	  from_x   	  from_y   	  target_id   	  target_x   	  target_y   	  url   	  text
			$requete .= "INSERT INTO `".$table."_quest_teleports` VALUES ($id_carte, $num_carte, $k, 1, $vers_num_carte, $k, 20, '', '$texte_carte');\n";
			}

		// bord bas
		$vers_num_carte = $num_carte + 21;
		$texte_carte = "Carte " . $vers_num_carte;
		for($k=0;$k<30;$k++)
			{
			$id_carte++;
			$requete .= "INSERT INTO `".$table."_quest_teleports` VALUES ($id_carte, $num_carte, $k, 20, $vers_num_carte, $k, 1, '', '$texte_carte');\n";
			}

		// bord gauche

		$vers_num_carte = $num_carte - 1;
		$texte_carte = "Carte " . $vers_num_carte;
		for($k=0;$k<20;$k++)
			{
			$id_carte++;
			$requete .= "INSERT INTO `".$table."_quest_teleports` VALUES ($id_carte, $num_carte, 1, $k, $vers_num_carte, 30, $k, '', '$texte_carte');\n";
			}

		// bord droit 
		
		$vers_num_carte = $num_carte +  1;
		$texte_carte = "Carte " . $vers_num_carte;
		for($k=0;$k<20;$k++)
			{
			$id_carte++;
			$requete .= "INSERT INTO `".$table."_quest_teleports` VALUES ($id_carte, $num_carte, 30, $k, $vers_num_carte, 1, $k, '', '$texte_carte');\n";
			}

		}
	}

if($fp=fopen("./requetes_teleportation.sql","w+"))
	{
	
	fwrite($fp,$requete);
	}
else
	{
	echo "Fichier requeste impossible à sauvegarder.<br>";
	}

?>
<br>
<br>
<a href="./index.php">Retour au menu</a>
<br>
</body>
</head>
</html>
