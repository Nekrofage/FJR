<?php

//
// English Language File for Quest MOD - Map Editor
// Author: Nuladion (Guido Kessels) < http://www.nuladion.tk >
//

// General Settings!
$lang['change'] = "Submit";
$lang['submit_changes'] = "Submit Changes";
$lang['go_back'] = "Go back";
$lang['settings_saved_succesfully'] = "Settings saved succesfully!";

$lang['settings_title_general'] = "General Configuration";
$lang['settings_title_map'] = "Map Editor";
$lang['settings_title_scripts'] = "Scripts Editor";
$lang['settings_title_users'] = "User Configuration";

$lang['settings_session_time'] = "<b>Session Time</b><br /><span class=\"gensmall\">Online time in seconds. Works just like the 'Who Is Online' block at your forum index page! Set to 300 for 5 minutes!</span>";
$lang['settings_tile_dimension'] = "<b>Tile dimension</b><br /><span class=\"gensmall\">Set this to your tiles' height and width (both have to be the same value).</span>";
$lang['settings_mod_title'] = "<b>MOD title</b><br /><span class=\"gensmall\">This will appear in your browser's title bar!</span>";
$lang['settings_default_tile'] = "<b>Default tile</b><br /><span class=\"gensmall\">The Map Editor will use this tile to create a new map when you first acces it.</span>";
$lang['settings_default_map_height'] = "<b>Default map height</b><br /><span class=\"gensmall\">The Map Editor will create a new map using this many tiles vertically when you first acces it.</span>";
$lang['settings_default_map_width'] = "<b>Default map width</b><br /><span class=\"gensmall\">The Map Editor will create a new map using this many tiles horizontally when you first acces it.</span>";
$lang['settings_script_length'] = "<b>Script Length</b><br /><span class=\"gensmall\">If the text in your script is longer then this value, the Script Editor will automatically cut of the text after this amount of characters, and place 3 periods (...) to indicate the text has been shortened. <br /><b>Note:</b> It will only do this in the Editor, <u>not</u> on the map!</span>";
$lang['settings_grid'] = "<b>Show Map Grid</b><br /><span class=\"gensmall\">If set to 'Yes', there will be some space between the tiles in the Map Editor. This makes it easier to see each tile. Set to 'No' to show the map like it appears to your users when they walk on it! <br /><b>Note:</b> It will only do this in the Editor, <u>not</u> on the map!</span>";
$lang['settings_grid_Yes'] = "Yes";
$lang['settings_grid_No'] = "No";
$lang['settings_default_map'] = "<b>Default map ID</b><br /><span class=\"gensmall\">New users will automatically be placed on this map.<br /><b>Note:</b> Make sure to fill in the map's ID, not the name!</span>";
$lang['settings_default_map_x'] = "<b>Default map X</b><br /><span class=\"gensmall\">New users will automatically be placed on this tile horizontally.</span>";
$lang['settings_default_map_y'] = "<b>Default map Y</b><br /><span class=\"gensmall\">New users will automatically be placed on this tile vertically.</span>";

// v2.2.0
$lang['settings_exportmaps_No'] = "No";
$lang['settings_exportmaps_Yes'] = "Yes";
$lang['settings_exportmaps'] = "<b>Export Maps</b><br /><span class=\"gensmall\">If enabled, a button will be added to the Map Editor, which enables you to export your map tiles into one .png image. Loading this image instead of all the different tiles will greatly speed up the loading time for map.php, but the GD Library is required!<br /><i>If exporting maps gives your problems, try turning this off!</i></span>";
$lang['settings_imagetype_gif'] = "GIF";
$lang['settings_imagetype_jpeg'] = "JPEG";
$lang['settings_imagetype'] = "<b>Tiles Image Type</b><br /><span class=\"gensmall\">If you have set <b>Export Maps</b> to 'Yes', the script needs to know if you're using .gif or .jpg images! If you want to use .gif images, make sure you have the GD Library installed with 'GIF Read Support' enabled!</span>";

// --- v2.4.0 ---
// Headers
$lang['settings_title_chat'] = "Chatbox";

// Settings
$lang['settings_chat_show'] = "<b>Show Amount</b><br /><span class=\"gensmall\">How many messages the chatbox should display</span>";
$lang['settings_chat_away'] = "<b>Away Time</b><br /><span class=\"gensmall\">Time in seconds before someone is listed as 'Away'.</span>";
$lang['settings_chat_offline'] = "<b>Offline Time</b><br /><span class=\"gensmall\">Time in seconds before someone is considered 'Offline' (and thus not displayed on the online/away list anymore).</span>";
$lang['settings_chat_refresh'] = "<b>Refresh Time</b><br /><span class=\"gensmall\">Time in seconds between each refresh of the chatbox.</span>";
$lang['settings_chat_refreshlist'] = "<b>Online List Refresh Time</b><br /><span class=\"gensmall\">Time in seconds between each refresh of the list with online/away users.</span>";

//$lang[''] = '';

?>