<html>
<head>
<script language="javascript">
function selection(num_case)
	{
	chaine="./editer.php?num_carte="+num_case;
	//alert(chaine);
	location.href=chaine;
	}
</script>
</head>
<body>
<b>Le monde</b><br>
<br>
Aprés la génération du monde, insérer le fichier requetes.sql.gz dans la base de donnée avec phpMyAdmin.
<br>
<?php

$chemin="./";
$repertoire=dir($chemin);
$compteur=0;



echo "<table border=0>\n";
for($i=0;$i<24;$i++)
	{
	echo "<tr>\n";
	for($j=0;$j<21;$j++)
		{
		$num_case=($i*21)+$j;
		echo "<td >";
		echo "<a href=\"javascript:selection($num_case)\">";
		echo "<img src=\"../../images/carte_paves/iso_1.png\" width=15 height=10>";
		echo "</a>";
		echo "</td>";
		}
	echo "</tr>\n";
	}

echo "</table>";
?>
<br>
<br>
<br>
Fonctionne sous Firefox 1.5
</body>
</html>
