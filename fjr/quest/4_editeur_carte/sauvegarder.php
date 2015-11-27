<html>
<head>
</head>
<body>
<?php

$carte = $_POST['carte'];
$num_carte = $_POST['num_carte'];



$carte=StripSlashes($carte);

echo "Carte en format .txt : <br><br>";

echo "Numéro de la carte à modifier : $num_carte <br><br>";
echo "<b>" . $carte ."</b>" ;


if($fp=fopen("../../images/map_maps/$num_carte.txt","w+"))
	{
	$carte_a_enregistrer = substr($carte,0,-1);
	fwrite($fp,$carte_a_enregistrer);
	}
else
	{
	echo "Fichier carte impossible à sauvegarder.<br>";
	}


fclose($fp);

$pave = explode(",", $carte);

$destination = ImageCreateTrueColor(750,500); 

$r = 0 ;
$c = 0 ;

for($i=0;$i<600;$i++)
	{
	$nom_image_source = "../../images/carte_paves/".trim($pave[$i]);
	$source = imagecreatefrompng($nom_image_source);
	if($i%30==0)
		{
		$destination_y = $r*25;
		$r++;
		$c=0;
		}
	$destination_x = $c * 25;
	$c++;
	//echo "$destination_x $destination_y <br>";
	imagecopy($destination, $source, $destination_x, $destination_y, 0, 0, 25, 25);
	}

$image_carte = "../../images/map_maps/".$num_carte.".png";
imagepng($destination, $image_carte); // on enregistre l'image 

echo "<br><br>Carte en format .png : <br><br>";
echo "<img src='$image_carte'>";



//////////////////////////////////////////////
// Copie du fichier image de la carte       //
//////////////////////////////////////////////

if (copy($image_carte,"../../images/map_maps/$num_carte.png"))
	{
	echo "<br>Copie du fichier images réussi<br>";
	}

//////////////////////////////////////////////
// Traitement au niveau de ma base de donné //
//////////////////////////////////////////////

	include("../../config.php");

	@mysql_connect("$dbhost","$dbuser","$dbpasswd");
 
	$select_base=@mysql_selectdb("$dbname"); 


	//echo "$dbhost $dbuser $dbname $dbpasswd ";
	
	$carte = substr($carte,0,-1);

 
	if (!$select_base) 
		{
		echo "<br><br><font color=\"#CC0000\"><b>Mauvaise configuration!!! </b></font><br>  
Vérifiez que votre login et mot de passe sont bien saisi pour la connexion 
à la base <b>$base</b>"; 
		}
	else 
		{

		$result = mysql_db_query($dbname,"update fjr_quest_maps set map_data = '$carte' where id = $num_carte ");
		if ($result < 1)
			{
			echo "<br>Pas de mise-à-jour de le carte $num_carte <br>";
			}
		else
			{
			echo "<br>Mise-à-jour de la carte $num_carte dans la base de donnée<br>";
			}
		
			

		$result = mysql_db_query($dbname,"select * from fjr_quest_maps where id = $num_carte");
		if ($result > 0) 
			{
			while($row = mysql_fetch_array($result)) 
				{
			        echo $row["id"] . "<br>\n". $row["map_name"] . "<br>\n" . "<b>". $row["map_data"]."</b><br>\n";
				}
			}
		}

	mysql_close();


?>
<br>
<br>
<a href="../index.php">Retour au menu principal</a>
</body>
</html>
