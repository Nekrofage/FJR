<html>
<head>
<script language="javascript">
function selection(num_case)
	{
	chaine="./editeur_carte.php?num_carte="+num_case;
	location.href=chaine;
	}
</script>
</head>
<body>
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
		echo "<img src=\"../../images/carte_paves/grass.png\" width=25 height=25>";
		echo "</a>";
		echo "</td>";
		}
	echo "</tr>\n";
	}

echo "</table>";
?>

<br>
<font size=+2>
Choisir la carte à éditer en cliquant sur le plan général du Monde.
</font>

</body>
</html>
