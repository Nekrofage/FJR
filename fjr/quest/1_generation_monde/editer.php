<html>
<head>
<script language="javascript">



nc6 = (typeof(window.controllers) != 'undefined' && typeof(window.locationbar) != 'undefined')? true:false;
ns4 = (document.layers)? true:false
ie4 = (document.all)? true:false

var modifier="terrain";

largeur = 30;
hauteur = 20;


function editeur()
	{

	carte = "";
	
	
	document.write('<table  cellspacing="0" cellpadding="0" border="0">');
	for (i=0; i<20; i++) 
		{
		document.write('<tr>');
		for (j=0; j<30 ;j++) 
			{
			k=(i*30)+j;
			posy=i*25;
			posx=j*25;
				

			document.write("<td>");


			document.write(" <div name=terraindiv"+k+" id=terraindiv"+k+" style=\"position: absolute;  z-index: 10; visibility: visible; left: "+posx+"px ; top: "+posy+"px; \">   ");
			//document.write("<font size=-3>"+k+"</font>");
 	       		document.write('<img name="terrain_r'+i+'c'+j+'" src="../../images/carte_paves/grass.png" border="1" width=25 height=25>');
			document.write("</div>");

			document.write(" <div name=objetdiv"+k+" id=objetdiv"+k+" style=\"position: absolute;  z-index: 20; visibility: visible; left: "+posx+"px ; top: "+posy+"px; \">   ");
 	       		document.write('<a href="javascript://" onClick="clique_carte('+i+ ',' +j+')"><img name="objet_r'+i+'c'+j+'" src="../../images/carte_paves/no.png" border="1" width=25 height=25></a>');


			document.write("</div>");
			document.write("<td>");
			
 			}
 		document.write('</tr>');
		}
	document.write('</table><br>');
	for(i=0;i<25;i++)
		document.write("<br>");	
	}



function icones()
	{
	document.write('<table  cellspacing="0" cellpadding="0" border="1">');
	

	document.write('<tr>');


	<?php

	

	$i=0;
	$j=0;

	$repertoire=dir("../../images/carte_paves/");
	while($fichier = $repertoire->read())
		{
		if($fichier=="." || $fichier=="..")
			{
			continue;
			}
		else
			{
			$fichier = substr($fichier,0,-4);
			echo "afficher_icone(\"$fichier\") // $j \n";
			$i++;
			$j++;
			}

		if($i==40)
			{
			echo "document.write('</tr>');document.write('<tr>');";
			$i=0;
			}

		}

	$repertoire->close();

	echo "document.write('</tr>')";

	?>


	afficher_icone('iso_0');
	afficher_icone('iso_1');
	afficher_icone('iso_2');
	afficher_icone('iso_3');
	document.write('</tr>');
	document.write('<tr>');
	afficher_icone('iso_50');
	afficher_icone('iso_51');
	document.write('</tr>');
	document.write('<tr>');
	afficher_icone('iso_80');
	afficher_icone('iso_81');
	afficher_icone('iso_99');
	document.write('</tr>');
	
	document.write('</table>');

	}


function afficher_icone(graphisme) 
	{
 	document.write('<td><a href="javascript://" onClick="document.form_carte.icon.value=\'' + graphisme + '\'"><img src="../../images/carte_paves/' + graphisme + '.png" border="0"></a></td>');

	modifier="terrain";

	}

function clique_carte(i,j) 
	{
	nom_type_modifier=document.form_carte.icon.value;

	modifier="terrain";
	eval('document.terrain_r'+i+'c'+j+'.src="../../images/carte_paves/"+document.form_carte.icon.value + ".png"');
	}


function sauver_carte() 
	{
	nouvelle_carte="";
	position="";

	for(i = 0; i < 20; i++) 
		{
		for(j = 0; j < 30; j++) 
			{
			graphisme = eval('document.terrain_r' + i + 'c' + j + '.src');
    			graphisme = graphisme.split("/")[graphisme.split("/").length - 1] ;
			nouvelle_carte += graphisme +","; 
			}
		}

 	document.form_carte.carte.value = nouvelle_carte;

	}



</script>
</head>
<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">

<script language="javascript">
editeur();
icones();
</script>

<form name="form_carte" action="sauvegarder.php" method=post>

<input type="text" name="icon" value="no">
<br>
<br>

<textarea name="posx" rows=1 cols=2>
10
</textarea>

<textarea name="posy" rows=1 cols=2>
10
</textarea>
<input type="text" name="num_carte" value=<?php $num_carte=$_GET['num_carte']; echo $num_carte ?>>
<br>
<br>
<table>
 <tr>
  <td>
   <textarea name="carte" rows="10" cols="150">
Mettre à jour la carte pour la sauvegarder
</textarea>
  </td>

 <tr>
  <td>
  </td>



</tr>
  <td>
	<input type="button" value="Mise-à-jour Carte" onClick="sauver_carte()">
	<br>
	<input type="submit" value="Sauvegarder Carte" >
  </td>
 </tr>
</table>
</form>
<script language="javascript">
document.form_carte.icon.value="iso_1";
</script>
</body>
</html>
