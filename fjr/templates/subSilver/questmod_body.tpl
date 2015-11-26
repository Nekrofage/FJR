<html>
<head>
<title>{WINDOW_TITLE}</title>

{HEAD}

<script language="JavaScript1.2"> 
function nsmove(hitkey) { 
if (hitkey.which == 37) { 
document.map.west.click() 
} 
if (hitkey.which == 38) { 
document.map.north.click() 
} 
if (hitkey.which == 39) { 
document.map.east.click() 
} 
if (hitkey.which == 40) { 
document.map.south.click() 
} 
if (hitkey.which == 32) { 
document.teleport.teleport_click.click() 
} 
} 
function move() { 
if (event.keyCode == 37) { 
document.map.west.click() 
} 
if (event.keyCode == 38) { 
document.map.north.click() 
} 
if (event.keyCode == 39) { 
document.map.east.click() 
} 
if (event.keyCode == 40) { 
document.map.south.click() 
} 
if (event.keyCode == 32) { 
document.teleport.teleport_click.click() 
} 
if (navigator.appName == 'Netscape') { 
window.captureEvents(Event.KEYPRESS); 
window.onKeyPress = nsmove; 
} 
} 
</script>

<link rel="stylesheet" href="templates/subSilver/subSilver.css" type="text/css">
<script type="text/javascript" src="overlib.js"><!-- overLIB (c) Erik Bosrup --></script>
</head>
<body bgcolor="{BODY_BGCOLOR}" text="{BODY_TEXT}" OnKeyDown="move()" {QM_BODY}>
<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
<table  width=100%>
{USEACTION}
</table>
</body>
</html>