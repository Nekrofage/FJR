



// G�n�rateur de Scripts r�alis� par SanDream
document.write('<style type=text/css>') ;
document.write('body {') ;
document.write('background-attachment: fixed; background-repeat: no-repeat; background-position: top right;') ;
document.write('}') ;
document.write('a:link,a:active,a:visited {') ;
document.write('text-decoration: none;') ;
document.write('}') ;
document.write('th {') ;
document.write('font-variant: small-caps; ') ;
document.write('}') ;
document.write('th.thLeft,th.thRight, {') ;
document.write('font-variant: normal; height: 25px; ') ;
document.write('}') ;
document.write('.cattitle {') ;
document.write('font-variant: small-caps; color : #222222;') ;
document.write('}') ;
document.write('a.cattitle {') ;
document.write('font-variant: small-caps; color : #222222;') ;
document.write('}') ;
document.write('</style>') ;






// Correctly handle PNG transparency in Win IE 5.5 or higher.
// http://homepage.ntlworld.com/bobosola. Updated 02-March-2004

function correctPNG() 
   {
   for(var i=0; i<document.images.length; i++)
      {
	  var img = document.images[i]
	  var imgName = img.src.toUpperCase()
	  if (imgName.substring(imgName.length-3, imgName.length) == "PNG")
	     {
		 var imgID = (img.id) ? "id='" + img.id + "' " : ""
		 var imgClass = (img.className) ? "class='" + img.className + "' " : ""
		 var imgTitle = (img.title) ? "title='" + img.title + "' " : "title='" + img.alt + "' "
		 var imgStyle = "display:inline-block;" + img.style.cssText 
		 if (img.align == "left") imgStyle = "float:left;" + imgStyle
		 if (img.align == "right") imgStyle = "float:right;" + imgStyle
		 if (img.parentElement.href) imgStyle = "cursor:hand;" + imgStyle		
		 var strNewHTML = "<span " + imgID + imgClass + imgTitle
		 + " style=\"" + "width:" + img.width + "px; height:" + img.height + "px;" + imgStyle + ";"
	     + "filter:progid:DXImageTransform.Microsoft.AlphaImageLoader"
		 + "(src=\'" + img.src + "\', sizingMethod='scale');\"></span>" 
		 img.outerHTML = strNewHTML
		 i = i-1
	     }
      }
   }
window.attachEvent("onload", correctPNG);

