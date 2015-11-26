<?php

//
// English Language File for Quest MOD - Map Editor
// Author: Nuladion (Guido Kessels) < http://www.nuladion.tk >
//

// General Settings!
$lang['change'] = "Soumettre";
$lang['submit_changes'] = "Soumettre changements";
$lang['go_back'] = "Retour";
$lang['settings_saved_succesfully'] = "Configurations sauvées avec succes!";

$lang['settings_title_general'] = "Configuration générale";
$lang['settings_title_map'] = "Editeur de cartes";
$lang['settings_title_scripts'] = "Editeurs de Scripts";
$lang['settings_title_users'] = "Configuration utilisateurs";

$lang['settings_session_time'] = "<b>Session Temps</b><br /><span class=\"gensmall\"> 'Online time' en secondes. Fonctionne comme le 'Qui est en ligne' sur l'index du forum! Configurer a 300 pour 5 minutes!</span>";
$lang['settings_tile_dimension'] = "<b>Dimensions tuiles</b><br /><span class=\"gensmall\">Configurer cela pour les tuiles ' hauteur et largeur (doivent avoir la meme valeur).</span>";
$lang['settings_mod_title'] = "<b>MOD tuile</b><br /><span class=\"gensmall\">Cela apparaitra dans votre bar de taches!</span>";
$lang['settings_default_tile'] = "<b>Tuile par defaut</b><br /><span class=\"gensmall\">L'editeur de cartes utilisera cette tuile pour les nouvelles cartes lorsque vous l'utiliserez pour la première fois.</span>";
$lang['settings_default_map_height'] = "<b>Hauteur carte par defaut</b><br /><span class=\"gensmall\">L'editeur de cartes créera une nouvelle carte en utilisant cette hauteur en nombre de tuiles verticalement lorsque vous l'utiliserez pour la première fois.</span>";
$lang['settings_default_map_width'] = "<b>Largeur carte par defaut</b><br /><span class=\"gensmall\">L'editeur de cartes créera une nouvelle carte en utilisant cette largeur en nombre de tuiles horizontalement lorsque vous l'utiliserez pour la première fois.</span>";
$lang['settings_script_length'] = "<b>Longueur Script</b><br /><span class=\"gensmall\">Si le texte dans votre script est plus long que cette valeur, l'editeur de script coupera automatiquement ce qu'il y aapres le nombre de caractères indiqué, et placera (...) pour indiquer que le texte a été raccourci. <br /><b>Note:</b> Cela fonctionne uniquement dans l'editeur de cartes, <u>pas</u> sur la carte!</span>";
$lang['settings_grid'] = "<b>Montrer la grille de carte</b><br /><span class=\"gensmall\">Si configuré sur 'Oui', il y aura un petit espace entre chaque tuile dans l'editeur de cartes. Cela rendra les tuile plus visibles. Configurer sur 'Non' pour faire apparaitre la carte comme les utilisateur la verront! <br /><b>Note:</b> Cela fonctionne uniquement dans l'editeur de cartes, <u>pas</u> sur la carte!</span>";
$lang['settings_grid_Yes'] = "Oui";
$lang['settings_grid_No'] = "Non";
$lang['settings_default_map'] = "<b>ID de la carte par defaut</b><br /><span class=\"gensmall\">Les nouveaux utilisateurs seront automatiquement placés sur cette carte.<br /><b>Note:</b> Soyez sur de remplir l'ID de la carte, et pas le nom!</span>";
$lang['settings_default_map_x'] = "<b>Carte par defaut X</b><br /><span class=\"gensmall\">Les nouveaux utilisateurs seront placés automatiquement sur cette tuile horizontalement.</span>";
$lang['settings_default_map_y'] = "<b>Carte par defaut Y</b><br /><span class=\"gensmall\">Les nouveaux utilisateurs seront placés automatiquement sur cette tuile verticalement.</span>";

// v2.2.0
$lang['settings_exportmaps_No'] = "Non";
$lang['settings_exportmaps_Yes'] = "Oui";
$lang['settings_exportmaps'] = "<b>Exporter cartes</b><br /><span class=\"gensmall\">Si activé, un bouton sera ajouté dans l'editeur de cartes, qui vous permettra d'exporter votre carte en une image en format .png. Charger cette carte au lieu des différentes tuiles accelerera considérablement map.php, mais le GD Library est requis!<br /><i>Si l'exportation des cartes vous pose problème, essayez de désactiver cette option!</i></span>";
$lang['settings_imagetype_gif'] = "GIF";
$lang['settings_imagetype_jpeg'] = "JPEG";
$lang['settings_imagetype'] = "<b>Type d'images des tuiles</b><br /><span class=\"gensmall\">Si vous avez configuré <b>Exporter cartes</b> sur 'Oui', le script aura besoin de savoir si vous utilisez des images en .gif ou .jpg! Si vous voulez utiliser des images en .gif , soyez sur d'avoir GD Library installé avec 'GIF Read Support' activé!</span>";

// --- v2.4.0 ---
// Headers
$lang['settings_title_chat'] = "Chatbox";

// Settings
$lang['settings_chat_show'] = "<b>Montrer quantité</b><br /><span class=\"gensmall\">Combien de messages le chatbox pourra afficher</span>";
$lang['settings_chat_away'] = "<b>Temps absence</b><br /><span class=\"gensmall\">Temps en seconde avant que quelqu'un soit mis en 'Absent'.</span>";
$lang['settings_chat_offline'] = "<b>Temps hors ligne</b><br /><span class=\"gensmall\">Temps en secondes avant qu'un utilisateur soit considéré comme 'Hors ligne' (et donc plus affiché dans la liste des En ligne/Absent).</span>";
$lang['settings_chat_refresh'] = "<b>Temps rafraichissement</b><br /><span class=\"gensmall\">Temps en secondes avant le raffraichissement du chatbox.</span>";
$lang['settings_chat_refreshlist'] = "<b>Temps rafraichissement liste des en Ligne</b><br /><span class=\"gensmall\">Temps en seconde avant chaque rafraichissement de la liste des utilisateurs En ligne/Absent.</span>";

//$lang[''] = '';

?>