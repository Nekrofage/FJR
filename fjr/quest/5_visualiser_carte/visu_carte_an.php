<html>
<head>
</head>
<body>
<center><b>Visualisation de AngQuest</b></center><br>
<br>
Ligne de 0 à 23 soit 24 lignes<br>
Ligne de 0 à 20 soit 21 colonnes<br>
<br>
<br>
<script language="javascript">

document.write("<table border=0>");

for(i=0;i<24;i++)
	{
	document.write("<tr>");
	for(j=0;j<21;j++)
		{
		num_image = i * 21 + j;
		document.write("<td border=0>");
		document.write('<center><a href="#"><img src="../3_generation_angquest/cartes/'+num_image+'_mini.png" border=0  >'+num_image+'</a></center>');
		document.write("</td>");
		}
	document.write("</tr>");
	}
document.write("</table>");
</script>

</body>
</html>
