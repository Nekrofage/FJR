<html>
<head>
</head>
<body>
<?

$cpt=$_GET['cpt'];
$nbf=$_GET['nbf'];

include("../../config.php");


@mysql_connect($dbhost,$dbuser,$dbpasswd)  or die("Impossible de se connecter au serveur MySQL, hôte : $dbhost");
@mysql_select_db("$dbname") or die("Base de données introuvable $dbname");


function insertion_requete($fichier_requete)
	{
	echo "Début insertion : $fichier_requete <br><br>";
	
	$TheFile=gzopen($fichier_requete, 'rb');

	$LigneSQL='';


	while (!gzeof($TheFile))
		{
		$Ligne=trim(gzgets($TheFile,65535));
		if (!($Ligne=='' || $Ligne{0}=='-' || $Ligne{0}=='#'))
			{
			$LigneSQL.=$Ligne;
			if (strlen($Ligne)>0 && $Ligne{strlen($Ligne)-1}==';')
				{
				//echo $LigneSQL;
				mysql_query($LigneSQL) or print($LigneSQL.'->'.mysql_error()."<br>");
				$LigneSQL='';
				}
   			}
		}	
	gzclose($TheFile);
	
	echo "Fin insertion : $fichier_requete<br>";
	}

if($cpt>-1 && $cpt<10)
	$cpt1 = "00".$cpt;
if($cpt>9 && $cpt<100)
	$cpt1 = "0".$cpt;
if($cpt>99)
	$cpt1=$cpt;
	
$fichier_requete = "rt_$cpt1.gz";


if($cpt<$nbf)
	{
	insertion_requete($fichier_requete);
	
	$cpt++;

	echo "<SCRIPT Language='JavaScript'>";
	echo "function GoPage()";
	echo "	{";
	echo "window.location.href='insertion_requete.php?cpt=$cpt&nbf=$nbf';";
	echo "	}";
	echo "setTimeout('GoPage()',2000);";
	echo "</SCRIPT>";
	}
else
	{
	echo "Fin insertion<br>";
	echo "<a href=index.php>Retour index</a>";
	}

?>

</body>
</html>
