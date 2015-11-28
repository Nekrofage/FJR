<?php
/***************************************************************************
 *                              map.php
 *                            -------------------
 *   Version            : 1.0.0
 *   began              : Wednesday, January 14th, 2003
 *   released           : N/A
 *   email                : guidokessels@hotmail.com
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   Copyright (C) 2003/2004  Guido Kessels (aka Nuladion)
 *
 *   This program is free software; you can redistribute it and/or
 *   modify it under the terms of the GNU General Public License
 *   as published by the Free Software Foundation; either version 2
 *   of the License, or (at your option) any later version.
 *
 *   This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   http://www.gnu.org/copyleft/gpl.html
 *
 ***************************************************************************/

define('IN_PHPBB', 1);

// [START] Fix for register_globals! Thanks alot Mav! ^_^
if(is_array($_GET))
{
extract($_GET, EXTR_PREFIX_SAME, "get");
}
if(is_array($_POST))
{
extract($_POST, EXTR_PREFIX_SAME, "post");
}
// [END] Fix for register_globals!

if(!empty($setmodules) )
{
	$file = basename(__FILE__);
	$module['Quest MOD']['Map_-_Map_Editor'] = $file;
	return;
}

//
// Let's set the root dir for phpBB
//
$phpbb_root_path = '../';
require($phpbb_root_path . 'extension.inc');
require('pagestart.' . $phpEx);
include($phpbb_root_path . 'language/lang_' . $board_config['default_lang'] . '/lang_quest_admin.php');
//
//check for userlevel
//
if( !$userdata['session_logged_in'] )
{
	header('Location: ' . append_sid("login.$phpEx?redirect=admin/".$file, true));
}

if( $userdata['user_level'] != ADMIN )
{
	message_die(GENERAL_MESSAGE, $lang['Not_Authorised']);
}
//end check

   $template->set_filenames(array( 
      'body' => 'admin/questmod_admin_body.tpl') 
   );

//
// Start MOD Code
//


//
// [START] General Variables
//
$sqlconfig = "SELECT * FROM ".$table_prefix."quest_settings WHERE config_name = 'tile_dimension' ";
if ( !($resultconfig = $db->sql_query($sqlconfig)) )
{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }
$config_row = mysql_fetch_array($resultconfig); 
$img_size[0] = $config_row['config_value'];
$img_size[1] = $config_row['config_value'];

$sqlconfig = "SELECT * FROM ".$table_prefix."quest_settings WHERE config_name = 'default_tile' ";
if ( !($resultconfig = $db->sql_query($sqlconfig)) )
{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }
$config_row = mysql_fetch_array($resultconfig); 
$base_tile_new = $config_row['config_value'];

$sqlconfig = "SELECT * FROM ".$table_prefix."quest_settings WHERE config_name = 'default_map_height' ";
if ( !($resultconfig = $db->sql_query($sqlconfig)) )
{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }
$config_row = mysql_fetch_array($resultconfig); 
$base_map_height = $config_row['config_value'];

$sqlconfig = "SELECT * FROM ".$table_prefix."quest_settings WHERE config_name = 'default_map_width' ";
if ( !($resultconfig = $db->sql_query($sqlconfig)) )
{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }
$config_row = mysql_fetch_array($resultconfig); 
$base_map_width = $config_row['config_value'];

$sqlconfig = "SELECT * FROM ".$table_prefix."quest_settings WHERE config_name = 'grid' ";
if ( !($resultconfig = $db->sql_query($sqlconfig)) )
{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }
$config_row = mysql_fetch_array($resultconfig); 
if($config_row['config_value'] == "No") { $map_grid = 'cellspacing="0" cellpadding="0"'; }
else {$map_grid = ''; }

// Added in v2.2.0 --- Check for imagetype and if exporting is enabled!
	// Check if exporting is enabled!
	$sqlconfig = "SELECT * FROM ".$table_prefix."quest_settings WHERE config_name = 'exportmaps' ";
	if ( !($resultconfig = $db->sql_query($sqlconfig)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }
	$config_row = mysql_fetch_array($resultconfig); 
	if($config_row['config_value'] == "Yes")
	{ 
		$exportmaps = "	<td width=".$buttonwidth." valign=\"top\" class=\"row2\"><span class=\"gen\"><center>
				<input name=\"export\" value=\" ".$lang['export_map']." \" type=\"submit\" class=\"mainoption\"><br>
				</center></span></td>
		"; $buttonwidth="25%"; 
	}
	else
	{ 
		$exportmaps = ""; $buttonwidth="33%"; 
	}
	// Check for imagetype
	$sqlconfig = "SELECT * FROM ".$table_prefix."quest_settings WHERE config_name = 'imagetype' ";
	if ( !($resultconfig = $db->sql_query($sqlconfig)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }
	$config_row = mysql_fetch_array($resultconfig); 
	$imagetype = 'imagecreatefrom'.$config_row['config_value'];

$file = "admin_quest_map.php";
$title = "Quest MOD - Map Editor";
$tiles_path = "images/map_tiles";
$export_path = "images/map_maps";

if (!isset($vert))
{ $vert = 1; }
if (!isset($hori))
{ $hori = 1; }
//
// [END] General Variables
//


// [START] General things -- need to be done on every page load! :)
$map_name = stripslashes($map_name);

// [END] General things -- need to be done on every page load! :)



//
// [START] Create a new map if $map_data isn't specified yet (eg; at first run)!
//
if (($map_data == '') && (!isset($createnew)))
{
	$map_data = $base_tile_new;
	$map_name = $lang['unnamed_map'];
	$map_x = $base_map_width;
	$map_y = $base_map_height;

	for($c=0; $c < (($map_x*$map_y)-1); $c++)
	{
		$map_data .= ','.$base_tile_new;
	}
}
//
// [END] Create a new map if $map_data isn't specified yet (eg; at first run)!
//


//
// [START] fill
//
if (isset($fill))
{

$tiles = explode(",", $map_data); 
$tiles_count = count($tiles); 

for ($no = 0; $no < $tiles_count; $no++) 
{ 
	$tiles[$no] = $tile;
}

$map_data = implode(",",$tiles);

}
//
// [END] Fill
//


//
// [START] Tile Change
//
if (isset($tilechange))
{

// Check for invalid values!
$error = '';
if (($vert > $map_y) OR ($vert <= 0))
{ $error .= "<br>".$lang['inv_vert']." (<b>".$vert."</b>)"; }
if (($hori > $map_x) OR ($hori <= 0))
{ $error .= "<br>".$lang['inv_hori']." (<b>".$hori."</b>)"; }

if ($error != '')
{ message_die(GENERAL_MESSAGE, "<b>".$lang['error'].":</b>".$error); }

// Ok, the values are correct, now change the approriate tile!

$tiles = explode(",", $map_data); 
//$tiles_count = count($tiles); 

$pos = (($vert * $map_x) -1) - ($map_x - $hori);
$tiles[$pos] = $tile;
$map_data = implode(",",$tiles);

}
//
// [END] Tile Change
//


//
// [START] Get list of TILES
//
$dir = @opendir($phpbb_root_path . $tiles_path);

$firsttile = '';

if (isset($tile))
{ $firsttile = $tile; }

while($file = @readdir($dir))
{
	if( !@is_dir(phpbb_realpath($phpbb_root_path . $tiles_path . '/' . $file)) )
	{
		$img_size = @getimagesize($phpbb_root_path . $tiles_path . '/' . $file);

		if( $img_size[0] && $img_size[1] )
		{
			$tile_images[] = $file;
		}
	}
}

@closedir($dir);

sort($tile_images);
$filename_list = "";
if (isset($tile))
{ $filename_list = '<option value="' . $tile . '">' . $tile . '</option>'; }

for( $i = 0; $i < count($tile_images); $i++ )
{
	if ($firsttile == '')
	{ $firsttile = $tile_images[$i]; }
	$filename_list .= '<option value="' . $tile_images[$i] . '">' . $tile_images[$i] . '</option>';
}
//
// [END] Get list of TILES
//


//
// [START] Map name change
//
if (isset($namechange))
{

$useaction = "
	<tr>
	     <td class=\"row1\">
		<center>
		<span class=\"gen\">
		<br>
		<b>".$lang['change_map_name']."</b><br>
		<br>
		<form action=\"".$file."\" method=\"post\">
		<table>
		  <tr>

			<td width=120 valign=\"top\" class=\"row2\"><span class=\"gen\"><center>
			<b>".$lang['map_name']."</b><br>
			</center></span></td>

			<td width=120 valign=\"top\" class=\"row2\"><span class=\"gen\"><center>
			</center></span></td>
		  </tr>
		  <tr>

			<td width=120 valign=\"middle\" class=\"row2\"><span class=\"gen\"><center>
			<input name=\"map_name\" value=\"".$map_name."\" class=\"post\" type=\"text\" size=\"12\" maxlength=\"30\"><br><span class=\"gensmall\">".$lang['name_info']."</span>
			</center></span></td>

			<td width=120 valign=\"middle\" class=\"row2\"><span class=\"gensmall\"><center>
			<input type=\"hidden\" name=\"map_x\" value=\"".$map_x."\">
			<input type=\"hidden\" name=\"map_y\" value=\"".$map_y."\">
			<input type=\"hidden\" name=\"map_mapid\" value=\"".$map_mapid."\">
			<input type=\"hidden\" name=\"map_data\" value=\"".$map_data."\">
			<input name=\"changename\" value=\" ".$lang['change_map_name']." \" type=\"submit\" class=\"mainoption\"><br>
			</center></span></td>
		  </tr>
		</table>
		</form>
		</span>
		</center>
	     </td>
	</tr>
";

}
//
// [END] Map name change
//


//
// [START] New Map
//
if (isset($new))
{

$useaction = "
	<tr>
	     <td class=\"row1\">
		<center>
		<span class=\"gen\">
		<br>
		<b>".$lang['create_title']."</b><br>
		<br>
		<form action=\"".$file."\" method=\"post\">
		<table>
		  <tr>
			<td width=120 valign=\"top\" class=\"row2\"><span class=\"gen\"><center>
			<b>".$lang['base_tile']."</b><br>
			</center></span></td>

			<td width=120 valign=\"top\" class=\"row2\"><span class=\"gen\"><center>
			<b>".$lang['map_name']."</b><br>
			</center></span></td>

			<td width=120 valign=\"top\" class=\"row2\"><span class=\"gen\"><center>
			<b>".$lang['map_width']."</b><br>
			</center></span></td>

			<td width=120 valign=\"top\" class=\"row2\"><span class=\"gen\"><center>
			<b>".$lang['map_height']."</b><br>
			</center></span></td>

			<td width=120 valign=\"top\" class=\"row2\"><span class=\"gen\"><center>
			</center></span></td>
		  </tr>
		  <tr>

			<td width=120 valign=\"middle\" class=\"row2\"><span class=\"gen\"><center>
			<select name=\"tile\" onChange=\"document.images['preview'].src = '".$phpbb_root_path.$tiles_path."/'+ this.value;\" >
				".$filename_list."
			</select>
			<br>
			<img src=\"".$phpbb_root_path.$tiles_path."/".$firsttile."\" name=\"preview\">
			</center></span></td>

			<td width=120 valign=\"middle\" class=\"row2\"><span class=\"gen\"><center>
			<input name=\"map_name\" value=\"".$lang['unnamed_map']."\" class=\"post\" type=\"text\" size=\"12\" maxlength=\"30\"><br><span class=\"gensmall\">".$lang['name_info']."</span>
			</center></span></td>

			<td width=120 valign=\"middle\" class=\"row2\"><span class=\"gen\"><center>
			<input name=\"hori\" value=\"6\" class=\"post\" type=\"numeric\" size=\"2\" maxlength=\"2\"><br><span class=\"gensmall\">".$lang['width_info']."</span>
			</center></span></td>

			<td width=120 valign=\"middle\" class=\"row2\"><span class=\"gen\"><center>
			<input name=\"vert\" value=\"6\" class=\"post\" type=\"numeric\" size=\"2\" maxlength=\"2\"><br><span class=\"gensmall\">".$lang['height_info']."</span>
			</center></span></td>

			<td width=120 valign=\"middle\" class=\"row2\"><span class=\"gensmall\"><center>
			<input name=\"createnew\" value=\" ".$lang['create_map']." \" type=\"submit\" class=\"mainoption\"><br>
			</center></span></td>
		  </tr>
		</table>
		</form>
		</span>
		</center>
	     </td>
	</tr>
";

}
//
// [END] New Map
//


//
// [START] Create the new map
//
if (isset($createnew))
{

// Check for invalid values!
$error = '';
if ($vert <= 0)
{ $error .= "<br>".$lang['inv_vert']." (<b>".$vert."</b>)"; }
if ($hori <= 0)
{ $error .= "<br>".$lang['inv_hori']." (<b>".$hori."</b>)"; }

if ($error != '')
{ message_die(GENERAL_MESSAGE, "<b>".$lang['error'].":</b>".$error); }

// Ok, the values are correct, now create the map!

$number_of_tiles = $vert * $hori;
$map_x = $hori;
$map_y = $vert;

$map_data = "";

for ($no = 0; $no < $number_of_tiles; $no++) 
{ 
	if ($no < ($number_of_tiles - 1))
	{
		$map_data .= $tile.",";
	}
	else
	{
		$map_data .= $tile;
	}
} 
 
}
//
// [END] Create the new map
//


//
// [START] Delete ALL maps CHECK
//
if (isset($deleteall))
{

message_die(GENERAL_MESSAGE, "
	<tr>
	     <td class=\"row1\">
		<center>
		<span class=\"gen\">
		<br>
		".$lang['delete_all_check']."<br>
		<br>
		<form action=\"".$file."\" method=\"post\">
			<input type=\"hidden\" name=\"map_name\" value=\"".$map_name."\">
			<input type=\"hidden\" name=\"map_x\" value=\"".$map_x."\">
			<input type=\"hidden\" name=\"map_mapid\" value=\"".$map_mapid."\">
			<input type=\"hidden\" name=\"map_y\" value=\"".$map_y."\">
			<input type=\"hidden\" name=\"map_data\" value=\"".$map_data."\">
			<input name=\"deleteallmaps\" value=\" ".$lang['Yes']." \" type=\"submit\" class=\"mainoption\">
			 | 
			<input name=\"load\" value=\" ".$lang['No']." \" type=\"submit\" class=\"mainoption\"><br>
		</form>
		</span>
		</center>
	     </td>
	</tr>
");

}
//
// [END] Delete ALL maps CHECK
//


//
// [START] Delete map CHECK
//
if (isset($delete))
{

message_die(GENERAL_MESSAGE, "
	<tr>
	     <td class=\"row1\">
		<center>
		<span class=\"gen\">
		<br>
		".$lang['delete_check']."<br>
		<br>
		<form action=\"".$file."\" method=\"post\">
			<input type=\"hidden\" name=\"map_id\" value=\"".$map_id."\">
			<input type=\"hidden\" name=\"map_name\" value=\"".$map_name."\">
			<input type=\"hidden\" name=\"map_mapid\" value=\"".$map_mapid."\">
			<input type=\"hidden\" name=\"map_x\" value=\"".$map_x."\">
			<input type=\"hidden\" name=\"map_y\" value=\"".$map_y."\">
			<input type=\"hidden\" name=\"map_data\" value=\"".$map_data."\">
			<input name=\"deletemap\" value=\" ".$lang['Yes']." \" type=\"submit\" class=\"mainoption\">
			 | 
			<input name=\"load\" value=\" ".$lang['No']." \" type=\"submit\" class=\"mainoption\"><br>
		</form>
		</span>
		</center>
	     </td>
	</tr>
");

}
//
// [END] Delete map CHECK
//


//
// [START] Delete ALL maps
//
if (isset($deleteallmaps))
{


$sql = "DELETE FROM ".$table_prefix."quest_maps";
if ( !($result = $db->sql_query($sql)) )
{
message_die(GENERAL_MESSAGE, "
	<tr>
	     <td class=\"row1\">
		<center>
		<span class=\"gen\">
		<br>
		".$lang['delete_all_error']."<br>
		<br>
		".$lang['db_error']."<br>
		<span class=\"gensmall\"><i>".mysql_error()."</i></span>
		<br>
		<form action=\"".$file."\" method=\"post\">
			<input type=\"hidden\" name=\"map_name\" value=\"".$map_name."\">
			<input type=\"hidden\" name=\"map_mapid\" value=\"".$map_mapid."\">
			<input type=\"hidden\" name=\"map_x\" value=\"".$map_x."\">
			<input type=\"hidden\" name=\"map_y\" value=\"".$map_y."\">
			<input type=\"hidden\" name=\"map_data\" value=\"".$map_data."\">
			<input name=\"load\" value=\" ".$lang['go_back']." \" type=\"submit\" class=\"mainoption\"><br>
		</form>
		</span>
		</center>
	     </td>
	</tr>
");
}
else
{
$map_mapid = '';

message_die(GENERAL_MESSAGE, "
	<tr>
	     <td class=\"row1\">
		<center>
		<span class=\"gen\">
		<br>
		".$lang['delete_all_succesfully']."<br>
		<br>
		<form action=\"".$file."\" method=\"post\">
			<input type=\"hidden\" name=\"map_name\" value=\"".$map_name."\">
			<input type=\"hidden\" name=\"map_x\" value=\"".$map_x."\">
			<input type=\"hidden\" name=\"map_mapid\" value=\"".$map_mapid."\">
			<input type=\"hidden\" name=\"map_y\" value=\"".$map_y."\">
			<input type=\"hidden\" name=\"map_data\" value=\"".$map_data."\">
			<input name=\"load\" value=\" ".$lang['go_back']." \" type=\"submit\" class=\"mainoption\"><br>
		</form>
		</span>
		</center>
	     </td>
	</tr>
");
}

}
//
// [END] Delete ALL maps
//


//
// [START] Delete map
//
if (isset($deletemap))
{


$sql = "DELETE FROM ".$table_prefix."quest_maps WHERE id = '".$map_id."' ";
if ( !($result = $db->sql_query($sql)) )
{
message_die(GENERAL_MESSAGE, "
	<tr>
	     <td class=\"row1\">
		<center>
		<span class=\"gen\">
		<br>
		".$lang['delete_error']." <b>(".$lang['lister'].$map_id.")</b><br>
		<br>
		".$lang['db_error']."<br>
		<span class=\"gensmall\"><i>".mysql_error()."</i></span>
		<br>
		<form action=\"".$file."\" method=\"post\">
			<input type=\"hidden\" name=\"map_name\" value=\"".$map_name."\">
			<input type=\"hidden\" name=\"map_x\" value=\"".$map_x."\">
			<input type=\"hidden\" name=\"map_y\" value=\"".$map_y."\">
			<input type=\"hidden\" name=\"map_mapid\" value=\"".$map_mapid."\">
			<input type=\"hidden\" name=\"map_data\" value=\"".$map_data."\">
			<input name=\"load\" value=\" ".$lang['go_back']." \" type=\"submit\" class=\"mainoption\"><br>
		</form>
		</span>
		</center>
	     </td>
	</tr>
");
}
else
{
if ($map_id == $map_mapid)
{ $map_mapid = ''; }

message_die(GENERAL_MESSAGE, "
	<tr>
	     <td class=\"row1\">
		<center>
		<span class=\"gen\">
		<br>
		".$lang['delete_succesfully']."<br>
		<br>
		<form action=\"".$file."\" method=\"post\">
			<input type=\"hidden\" name=\"map_name\" value=\"".$map_name."\">
			<input type=\"hidden\" name=\"map_mapid\" value=\"".$map_mapid."\">
			<input type=\"hidden\" name=\"map_x\" value=\"".$map_x."\">
			<input type=\"hidden\" name=\"map_y\" value=\"".$map_y."\">
			<input type=\"hidden\" name=\"map_data\" value=\"".$map_data."\">
			<input name=\"load\" value=\" ".$lang['go_back']." \" type=\"submit\" class=\"mainoption\"><br>
		</form>
		</span>
		</center>
	     </td>
	</tr>
");
}

}
//
// [END] Delete map
//


//
// [START] Load map
//
if (isset($loadmap))
{


$sql = "SELECT * FROM ".$table_prefix."quest_maps WHERE id = '".$map_id."' ";
if ( !($result = $db->sql_query($sql)) )
{
message_die(GENERAL_MESSAGE, "
	<tr>
	     <td class=\"row1\">
		<center>
		<span class=\"gen\">
		<br>
		".$lang['load_error']." <b>(".$lang['lister'].$map_id.")</b><br>
		<br>
		".$lang['db_error']."<br>
		<span class=\"gensmall\"><i>".mysql_error()."</i></span>
		<br>
		<form action=\"".$file."\" method=\"post\">
			<input type=\"hidden\" name=\"map_name\" value=\"".$map_name."\">
			<input type=\"hidden\" name=\"map_mapid\" value=\"".$map_mapid."\">
			<input type=\"hidden\" name=\"map_x\" value=\"".$map_x."\">
			<input type=\"hidden\" name=\"map_y\" value=\"".$map_y."\">
			<input type=\"hidden\" name=\"map_data\" value=\"".$map_data."\">
			<input type=\"hidden\" name=\"load\" value=\"load\">
			<input name=\"\" value=\" ".$lang['go_back']." \" type=\"submit\" class=\"mainoption\"><br>
		</form>
		</span>
		</center>
	     </td>
	</tr>
");
}
else
{
$row = mysql_fetch_array($result); 

$map_mapid = $row['id'];
$map_name = $row['map_name'];
$map_x = $row['map_x'];
$map_y = $row['map_y'];
$map_data = $row['map_data'];

}

}
//
// [END] Load map
//


//
// [START] Load map list!
//
if (isset($load))
{


$sql = "SELECT * FROM ".$table_prefix."quest_maps ORDER BY map_name,id";
if ( !($result = $db->sql_query($sql)) )
{
message_die(GENERAL_MESSAGE, "
	<tr>
	     <td class=\"row1\">
		<center>
		<span class=\"gen\">
		<br>
		<b>".$lang['load_error']."</b><br>
		<br>
		".$lang['db_error']."<br>
		<span class=\"gensmall\"><i>".mysql_error()."</i></span>
		<br>
		<form action=\"".$file."\" method=\"post\">
			<input type=\"hidden\" name=\"map_name\" value=\"".$map_name."\">
			<input type=\"hidden\" name=\"map_x\" value=\"".$map_x."\">
			<input type=\"hidden\" name=\"map_y\" value=\"".$map_y."\">
			<input type=\"hidden\" name=\"map_mapid\" value=\"".$map_mapid."\">
			<input type=\"hidden\" name=\"map_data\" value=\"".$map_data."\">
			<input name=\"\" value=\" ".$lang['go_back']." \" type=\"submit\" class=\"mainoption\"><br>
		</form>
		</span>
		</center>
	     </td>
	</tr>
");
}
else
{

$map_list_title = "
	<tr>
	<td class=\"row1\"><span class=\"gensmall\"><b>".$lang['lister']."</b></span></td>
	<td class=\"row1\"><span class=\"gensmall\"><b>".$lang['name']."</b></span></td>
	<td class=\"row1\" align=\"center\"><span class=\"gensmall\"><b>".$lang['height']."</b></span></td>
	<td class=\"row1\" align=\"center\"><span class=\"gensmall\"><b>x</b></span></td>
	<td class=\"row1\" align=\"center\"><span class=\"gensmall\"><b>".$lang['width']."</b></span></td>
	<td class=\"row1\" width=10 align=\"center\"><span class=\"gensmall\"></span></td>
	<td class=\"row1\" align=\"center\"><span class=\"gensmall\"></span></td>
	</tr>
	";

$map_list = "";

for ($no = 0; $no < mysql_num_rows($result); $no++) 
{ 
	$row = mysql_fetch_array($result); 

	$name = addslashes($row['map_name']);
	$name = stripslashes($name);

	$map_list .= "
		<tr>
		<td class=\"row1\"><span class=\"gensmall\">".$row['id']."</span></td>
		<td class=\"row1\"><span class=\"gensmall\">".$name."</span></td>
		<td class=\"row1\" align=\"center\"><span class=\"gensmall\">".$row['map_y']."</span></td>
		<td class=\"row1\" align=\"center\"><span class=\"gensmall\">x</span></td>
		<td class=\"row1\" align=\"center\"><span class=\"gensmall\">".$row['map_x']."</span></td>
		<td class=\"row1\" width=10 align=\"center\"><span class=\"gensmall\"></span></td>
		<form action=\"".$file."\" method=\"post\">
		<td class=\"row1\" align=\"center\">
			<input type=\"hidden\" name=\"map_name\" value=\"".$map_name."\">
			<input type=\"hidden\" name=\"map_x\" value=\"".$map_x."\">
			<input type=\"hidden\" name=\"map_mapid\" value=\"".$map_mapid."\">
			<input type=\"hidden\" name=\"map_y\" value=\"".$map_y."\">
			<input type=\"hidden\" name=\"map_data\" value=\"".$map_data."\">

			<input type=\"hidden\" name=\"map_id\" value=\"".$row['id']."\" class=\"post\">
			<input name=\"loadmap\" value=\" ".$lang['load']." \" type=\"submit\" class=\"liteoption\">
			<input name=\"delete\" value=\" ".$lang['delete']." \" type=\"submit\" class=\"liteoption\">
		</td>
		</form>
		</tr>
		";
} 

if ($map_list == "")
{
	$map_list = "
		<tr>
		<td class=\"row1\"><span class=\"gen\"><i>".$lang['no_maps_found']."</i></span></td>
		</tr>
		";
	$load_title = "";
}
else
{
	$map_list .= "
		<tr>
		<td class=\"row1\" align=\"center\" colspan=6></td>
		<form action=\"".$file."\" method=\"post\">
		<td class=\"row1\">
			<input type=\"hidden\" name=\"map_name\" value=\"".$map_name."\">
			<input type=\"hidden\" name=\"map_x\" value=\"".$map_x."\">
			<input type=\"hidden\" name=\"map_mapid\" value=\"".$map_mapid."\">
			<input type=\"hidden\" name=\"map_y\" value=\"".$map_y."\">
			<input type=\"hidden\" name=\"map_data\" value=\"".$map_data."\">

			<input name=\"deleteall\" value=\" ".$lang['delete_all']." \" type=\"submit\" class=\"liteoption\">
		</td>
		</form>
		</tr>
		";


	$map_list = $map_list_title.$map_list;
	$load_title = "<br><b>".$lang['load_saved']."</b><br>";
}

message_die(GENERAL_MESSAGE, "
	<tr>
	     <td class=\"row1\">
		<center>
		<span class=\"gen\">
		".$load_title."
		<br>
		<table>".$map_list."</table>
		<br>
		<form action=\"".$file."\" method=\"post\">
			<input type=\"hidden\" name=\"map_name\" value=\"".$map_name."\">
			<input type=\"hidden\" name=\"map_x\" value=\"".$map_x."\">
			<input type=\"hidden\" name=\"map_mapid\" value=\"".$map_mapid."\">
			<input type=\"hidden\" name=\"map_y\" value=\"".$map_y."\">
			<input type=\"hidden\" name=\"map_data\" value=\"".$map_data."\">
			<input name=\"\" value=\" ".$lang['go_back']." \" type=\"submit\" class=\"mainoption\"><br>
		</form>
		</span>
		</center>
	     </td>
	</tr>
");
}
 
}
//
// [END] Load map list!
//


//
// [START] Save current map
//
if (isset($save))
{

$map_list = "";
$map_id_list = "";

$map_name = addslashes($map_name);
$name_or_id = 0;

// Check if map with same name already exists!
$sql2 = "SELECT * FROM ".$table_prefix."quest_maps WHERE map_name = '".$map_name."' ";
if ( !($result2 = $db->sql_query($sql2)) )
{
message_die(GENERAL_MESSAGE, "
	<tr>
	     <td class=\"row1\">
		<center>
		<span class=\"gen\">
		<br>
		<b>".$lang['saved_error']."</b><br>
		<br>
		".$lang['db_error']."<br>
		<span class=\"gensmall\"><i>".mysql_error()."</i></span>
		<br>
		<form action=\"".$file."\" method=\"post\">
			<input type=\"hidden\" name=\"map_name\" value=\"".$map_name."\">
			<input type=\"hidden\" name=\"map_x\" value=\"".$map_x."\">
			<input type=\"hidden\" name=\"map_y\" value=\"".$map_y."\">
			<input type=\"hidden\" name=\"map_mapid\" value=\"".$map_mapid."\">
			<input type=\"hidden\" name=\"map_data\" value=\"".$map_data."\">
			<input name=\"\" value=\" ".$lang['go_back']." \" type=\"submit\" class=\"mainoption\"><br>
		</form>
		</span>
		</center>
	     </td>
	</tr>
");
}
if (mysql_num_rows($result2) > 0)
{
	// There's a map with this name already! :)

	$map_list_title = "
		<tr>
		<td class=\"row1\"><span class=\"gensmall\"><b>".$lang['lister']."</b></span></td>
		<td class=\"row1\"><span class=\"gensmall\"><b>".$lang['name']."</b></span></td>
		<td class=\"row1\" align=\"center\"><span class=\"gensmall\"><b>".$lang['height']."</b></span></td>
		<td class=\"row1\" align=\"center\"><span class=\"gensmall\"><b>x</b></span></td>
		<td class=\"row1\" align=\"center\"><span class=\"gensmall\"><b>".$lang['width']."</b></span></td>
		<td class=\"row1\" width=10 align=\"center\"><span class=\"gensmall\"></span></td>
		<td class=\"row1\" align=\"center\"><span class=\"gensmall\"></span></td>
		</tr>
		";
	
	$map_list = "";
	
	for ($no = 0; $no < mysql_num_rows($result2); $no++) 
	{ 
		$row2 = mysql_fetch_array($result2); 
	
		$name = addslashes($row2['map_name']);
		$name = stripslashes($name);
	
		$map_list .= "
			<tr>
			<form action=\"".$file."\" method=\"post\">
			<td class=\"row1\"><span class=\"gensmall\">".$row2['id']."</span></td>
			<td class=\"row1\"><span class=\"gensmall\">".$name."</span></td>
			<td class=\"row1\" align=\"center\"><span class=\"gensmall\">".$row2['map_y']."</span></td>
			<td class=\"row1\" align=\"center\"><span class=\"gensmall\">x</span></td>
			<td class=\"row1\" align=\"center\"><span class=\"gensmall\">".$row2['map_x']."</span></td>
			<td class=\"row1\" width=10 align=\"center\"><span class=\"gensmall\"></span></td>
			<form action=\"".$file."\" method=\"post\">
			<td class=\"row1\" align=\"center\">
				<input type=\"hidden\" name=\"map_name\" value=\"".$map_name."\">
				<input type=\"hidden\" name=\"map_x\" value=\"".$map_x."\">
				<input type=\"hidden\" name=\"map_mapid\" value=\"".$map_mapid."\">
				<input type=\"hidden\" name=\"map_y\" value=\"".$map_y."\">
				<input type=\"hidden\" name=\"map_data\" value=\"".$map_data."\">
	
				<input type=\"hidden\" name=\"map_id\" value=\"".$row2['id']."\" class=\"post\">
				<input name=\"overwrite\" value=\" ".$lang['overwrite']." \" type=\"submit\" class=\"liteoption\">
			</td>
			</form>
			</tr>
			";
	} 

	$map_list .= "
		<tr>
		<form action=\"".$file."\" method=\"post\">
		<td colspan=7 class=\"row1\" align=\"right\">
			<input type=\"hidden\" name=\"map_name\" value=\"".$map_name."\">
			<input type=\"hidden\" name=\"map_x\" value=\"".$map_x."\">
			<input type=\"hidden\" name=\"map_y\" value=\"".$map_y."\">
			<input type=\"hidden\" name=\"map_mapid\" value=\"".$map_mapid."\">
			<input type=\"hidden\" name=\"map_data\" value=\"".$map_data."\">

			<input type=\"hidden\" name=\"map_id\" value=\"".$row2['id']."\" class=\"post\">
			<input name=\"saveasnew\" value=\" ".$lang['save_as_new']." \" type=\"submit\" class=\"liteoption\">
		</td>
		</form>
		</tr>
		";

	$name_or_id = 1;
}

// Check if map with same ID already exists!
$sql2 = "SELECT * FROM ".$table_prefix."quest_maps WHERE id = '".$map_mapid."' ";
if ( !($result2 = $db->sql_query($sql2)) )
{
message_die(GENERAL_MESSAGE, "
	<tr>
	     <td class=\"row1\">
		<center>
		<span class=\"gen\">
		<br>
		<b>".$lang['saved_error']."</b><br>
		<br>
		".$lang['db_error']."<br>
		<span class=\"gensmall\"><i>".mysql_error()."</i></span>
		<br>
		<form action=\"".$file."\" method=\"post\">
			<input type=\"hidden\" name=\"map_name\" value=\"".$map_name."\">
			<input type=\"hidden\" name=\"map_x\" value=\"".$map_x."\">
			<input type=\"hidden\" name=\"map_y\" value=\"".$map_y."\">
			<input type=\"hidden\" name=\"map_mapid\" value=\"".$map_mapid."\">
			<input type=\"hidden\" name=\"map_data\" value=\"".$map_data."\">
			<input name=\"\" value=\" ".$lang['go_back']." \" type=\"submit\" class=\"mainoption\"><br>
		</form>
		</span>
		</center>
	     </td>
	</tr>
");
}
if (mysql_num_rows($result2) > 0)
{
	// There's a map with this ID already! :)

	$map_id_list_title = "
		<tr>
		<td class=\"row1\"><span class=\"gensmall\"><b>".$lang['lister']."</b></span></td>
		<td class=\"row1\"><span class=\"gensmall\"><b>".$lang['name']."</b></span></td>
		<td class=\"row1\" align=\"center\"><span class=\"gensmall\"><b>".$lang['height']."</b></span></td>
		<td class=\"row1\" align=\"center\"><span class=\"gensmall\"><b>x</b></span></td>
		<td class=\"row1\" align=\"center\"><span class=\"gensmall\"><b>".$lang['width']."</b></span></td>
		<td class=\"row1\" width=10 align=\"center\"><span class=\"gensmall\"></span></td>
		<td class=\"row1\" align=\"center\"><span class=\"gensmall\"></span></td>
		</tr>
		";
	
	$map_id_list = "";
	
	for ($no = 0; $no < mysql_num_rows($result2); $no++) 
	{ 
		$row2 = mysql_fetch_array($result2); 
	
		$name = addslashes($row2['map_name']);
		$name = stripslashes($name);
	
		$map_id_list .= "
			<tr>
			<form action=\"".$file."\" method=\"post\">
			<td class=\"row1\"><span class=\"gensmall\">".$row2['id']."</span></td>
			<td class=\"row1\"><span class=\"gensmall\">".$name."</span></td>
			<td class=\"row1\" align=\"center\"><span class=\"gensmall\">".$row2['map_y']."</span></td>
			<td class=\"row1\" align=\"center\"><span class=\"gensmall\">x</span></td>
			<td class=\"row1\" align=\"center\"><span class=\"gensmall\">".$row2['map_x']."</span></td>
			<td class=\"row1\" width=10 align=\"center\"><span class=\"gensmall\"></span></td>
			<form action=\"".$file."\" method=\"post\">
			<td class=\"row1\" align=\"center\">
				<input type=\"hidden\" name=\"map_name\" value=\"".$map_name."\">
				<input type=\"hidden\" name=\"map_x\" value=\"".$map_x."\">
				<input type=\"hidden\" name=\"map_mapid\" value=\"".$map_mapid."\">
				<input type=\"hidden\" name=\"map_y\" value=\"".$map_y."\">
				<input type=\"hidden\" name=\"map_data\" value=\"".$map_data."\">
	
				<input type=\"hidden\" name=\"map_id\" value=\"".$row2['id']."\" class=\"post\">
				<input name=\"overwrite\" value=\" ".$lang['overwrite']." \" type=\"submit\" class=\"liteoption\">
			</td>
			</form>
			</tr>
			";
	} 

	$map_id_list .= "
		<tr>
		<form action=\"".$file."\" method=\"post\">
		<td colspan=7 class=\"row1\" align=\"right\">
			<input type=\"hidden\" name=\"map_name\" value=\"".$map_name."\">
			<input type=\"hidden\" name=\"map_x\" value=\"".$map_x."\">
			<input type=\"hidden\" name=\"map_y\" value=\"".$map_y."\">
			<input type=\"hidden\" name=\"map_mapid\" value=\"".$map_mapid."\">
			<input type=\"hidden\" name=\"map_data\" value=\"".$map_data."\">

			<input type=\"hidden\" name=\"map_id\" value=\"".$row2['id']."\" class=\"post\">
			<input name=\"saveasnew\" value=\" ".$lang['save_as_new']." \" type=\"submit\" class=\"liteoption\">
		</td>
		</form>
		</tr>
		";

	$name_or_id = 1;
}

if($name_or_id == 1)
{

if($map_id_list == '')
	{ $map_id_list_title = ''; }
	else { $id_exists = "	<b>".$lang['map_id_exists']."</b><br>
			".$lang['what_to_do']."<br>
			<br>
			<table>".$map_id_list_title.$map_id_list."</table>
	"; }
if($map_list == '')
	{ $map_list_title = ''; }
	else { $name_exists = "	<b>".$lang['map_name_exists']."</b><br>
			".$lang['what_to_do']."<br>
			<br>
			<table>".$map_list_title.$map_list."</table>
	"; }

if(($id_exists != "") && ($name_exists != ""))
{ $id_exists .= "<br /><br />"; }

message_die(GENERAL_MESSAGE, "
	<tr>
	     <td class=\"row1\">
		<center>
		<span class=\"gen\">
		<br>
		".$id_exists."
		".$name_exists."
		<form action=\"".$file."\" method=\"post\">
		<br>
			<input type=\"hidden\" name=\"map_name\" value=\"".$map_name."\">
			<input type=\"hidden\" name=\"map_x\" value=\"".$map_x."\">
			<input type=\"hidden\" name=\"map_mapid\" value=\"".$map_mapid."\">
			<input type=\"hidden\" name=\"map_y\" value=\"".$map_y."\">
			<input type=\"hidden\" name=\"map_data\" value=\"".$map_data."\">
			<input name=\"\" value=\" ".$lang['go_back']." \" type=\"submit\" class=\"mainoption\">
		<br>
		</form>
		</span>
		</center>
	     </td>
	</tr>
");
}
else
{
$sql = "INSERT INTO ".$table_prefix."quest_maps (map_name, map_x, map_y, map_data) VALUES ('".$map_name."','".$map_x."','".$map_y."','".$map_data."') ";
if ( !($result = $db->sql_query($sql)) )
{ $errorOne = 1; } else { $errorOne = 0; }

$sql2 = "SELECT id FROM ".$table_prefix."quest_maps ORDER BY id DESC LIMIT 0,1";
if ( !($result2 = $db->sql_query($sql2)) )
{ $errorTwo = 1; } else { $errorTwo = 0; }
$row2 = mysql_fetch_array($result2); 

$map_mapid = $row2['id'];

$map_name = stripslashes($map_name);

if (( $errorOne == 1) OR ( $errorTwo == 1 ))
{

message_die(GENERAL_MESSAGE, "
	<tr>
	     <td class=\"row1\">
		<center>
		<span class=\"gen\">
		<br>
		<b>".$lang['saved_error']."</b><br>
		<br>
		".$lang['db_error']."<br>
		<span class=\"gensmall\"><i>".mysql_error()."</i></span>
		<br>
		<form action=\"".$file."\" method=\"post\">
			<input type=\"hidden\" name=\"map_name\" value=\"".$map_name."\">
			<input type=\"hidden\" name=\"map_mapid\" value=\"".$map_mapid."\">
			<input type=\"hidden\" name=\"map_x\" value=\"".$map_x."\">
			<input type=\"hidden\" name=\"map_y\" value=\"".$map_y."\">
			<input type=\"hidden\" name=\"map_data\" value=\"".$map_data."\">
			<input name=\"\" value=\" ".$lang['go_back']." \" type=\"submit\" class=\"mainoption\"><br>
		</form>
		</span>
		</center>
	     </td>
	</tr>
");
}
else
{
if($exportmaps != "")
{
	$click2export = "	<i>".$lang['export_make_sure_to']."</i></br>
			<form action=\"".$file."\" method=\"post\">
				<input type=\"hidden\" name=\"map_name\" value=\"".$map_name."\">
				<input type=\"hidden\" name=\"map_x\" value=\"".$map_x."\">
				<input type=\"hidden\" name=\"map_mapid\" value=\"".$map_mapid."\">
				<input type=\"hidden\" name=\"map_y\" value=\"".$map_y."\">
				<input type=\"hidden\" name=\"map_data\" value=\"".$map_data."\">
				<input name=\"export\" value=\" ".$lang['export_map']." \" type=\"submit\" class=\"liteoption\"><br>
			</form>
	";
}
else { $click2export = ''; }

message_die(GENERAL_MESSAGE, "
	<tr>
	     <td class=\"row1\">
		<center>
		<span class=\"gen\">
		<br>
		<b>".$lang['saved_succesfully']."</b><br>
		".$click2export."
		<br>
		<form action=\"".$file."\" method=\"post\">
			<input type=\"hidden\" name=\"map_name\" value=\"".$map_name."\">
			<input type=\"hidden\" name=\"map_x\" value=\"".$map_x."\">
			<input type=\"hidden\" name=\"map_mapid\" value=\"".$map_mapid."\">
			<input type=\"hidden\" name=\"map_y\" value=\"".$map_y."\">
			<input type=\"hidden\" name=\"map_data\" value=\"".$map_data."\">
			<input name=\"\" value=\" ".$lang['go_back']." \" type=\"submit\" class=\"mainoption\"><br>
		</form>
		</span>
		</center>
	     </td>
	</tr>
");
}
}

}
//
// [END] Save current map
//


//
// [START] Save as New! (map with same name already exists!)
//
if (isset($saveasnew))
{

$map_name = addslashes($map_name);

$sql = "INSERT INTO ".$table_prefix."quest_maps (map_name, map_x, map_y, map_data) VALUES ('".$map_name."','".$map_x."','".$map_y."','".$map_data."') ";
if ( !($result = $db->sql_query($sql)) )
{ $errorOne = 1; } else { $errorOne = 0; }

$sql2 = "SELECT id FROM ".$table_prefix."quest_maps ORDER BY id DESC LIMIT 0,1";
if ( !($result2 = $db->sql_query($sql2)) )
{ $errorTwo = 1; } else { $errorTwo = 0; }
$row2 = mysql_fetch_array($result2); 

$map_mapid = $row2['id'];

$map_name = stripslashes($map_name);

if (( $errorOne == 1) OR ( $errorTwo == 1 ))
{

message_die(GENERAL_MESSAGE, "
	<tr>
	     <td class=\"row1\">
		<center>
		<span class=\"gen\">
		<br>
		<b>".$lang['saved_error']."</b><br>
		<br>
		".$lang['db_error']."<br>
		<span class=\"gensmall\"><i>".mysql_error()."</i></span>
		<br>
		<form action=\"".$file."\" method=\"post\">
			<input type=\"hidden\" name=\"map_name\" value=\"".$map_name."\">
			<input type=\"hidden\" name=\"map_x\" value=\"".$map_x."\">
			<input type=\"hidden\" name=\"map_y\" value=\"".$map_y."\">
			<input type=\"hidden\" name=\"map_mapid\" value=\"".$map_mapid."\">
			<input type=\"hidden\" name=\"map_data\" value=\"".$map_data."\">
			<input name=\"\" value=\" ".$lang['go_back']." \" type=\"submit\" class=\"mainoption\"><br>
		</form>
		</span>
		</center>
	     </td>
	</tr>
");
}
else
{
if($exportmaps != "")
{
	$click2export = "	<i>".$lang['export_make_sure_to']."</i></br>
			<form action=\"".$file."\" method=\"post\">
				<input type=\"hidden\" name=\"map_name\" value=\"".$map_name."\">
				<input type=\"hidden\" name=\"map_x\" value=\"".$map_x."\">
				<input type=\"hidden\" name=\"map_mapid\" value=\"".$map_mapid."\">
				<input type=\"hidden\" name=\"map_y\" value=\"".$map_y."\">
				<input type=\"hidden\" name=\"map_data\" value=\"".$map_data."\">
				<input name=\"export\" value=\" ".$lang['export_map']." \" type=\"submit\" class=\"liteoption\"><br>
			</form>
	";
}
else { $click2export = ''; }

message_die(GENERAL_MESSAGE, "
	<tr>
	     <td class=\"row1\">
		<center>
		<span class=\"gen\">
		<br>
		<b>".$lang['saved_succesfully']."</b><br>
		".$click2export."
		<br>
		<form action=\"".$file."\" method=\"post\">
			<input type=\"hidden\" name=\"map_name\" value=\"".$map_name."\">
			<input type=\"hidden\" name=\"map_x\" value=\"".$map_x."\">
			<input type=\"hidden\" name=\"map_y\" value=\"".$map_y."\">
			<input type=\"hidden\" name=\"map_mapid\" value=\"".$map_mapid."\">
			<input type=\"hidden\" name=\"map_data\" value=\"".$map_data."\">
			<input name=\"\" value=\" ".$lang['go_back']." \" type=\"submit\" class=\"mainoption\"><br>
		</form>
		</span>
		</center>
	     </td>
	</tr>
");
}

}
//
// [END] Save as New! (map with same name already exists!)
//

//
// [START] Overwrite (if map with same name already exists!)
//
if (isset($overwrite))
{

$map_name = addslashes($map_name);

$sql = "UPDATE ".$table_prefix."quest_maps SET map_name='".$map_name."', map_x='".$map_x."', map_y='".$map_y."', map_data='".$map_data."' WHERE id = '".$map_id."' ";

$map_name = stripslashes($map_name);

$map_mapid = $map_id;

if ( !($result = $db->sql_query($sql)) )
{
message_die(GENERAL_MESSAGE, "
	<tr>
	     <td class=\"row1\">
		<center>
		<span class=\"gen\">
		<br>
		<b>".$lang['saved_error']."</b><br>
		<br>
		".$lang['db_error']."<br>
		<span class=\"gensmall\"><i>".mysql_error()."</i></span>
		<br>
		<form action=\"".$file."\" method=\"post\">
			<input type=\"hidden\" name=\"map_name\" value=\"".$map_name."\">
			<input type=\"hidden\" name=\"map_x\" value=\"".$map_x."\">
			<input type=\"hidden\" name=\"map_mapid\" value=\"".$map_mapid."\">
			<input type=\"hidden\" name=\"map_y\" value=\"".$map_y."\">
			<input type=\"hidden\" name=\"map_data\" value=\"".$map_data."\">
			<input name=\"\" value=\" ".$lang['go_back']." \" type=\"submit\" class=\"mainoption\"><br>
		</form>
		</span>
		</center>
	     </td>
	</tr>
");
}
else
{
if($exportmaps != "")
{
	$click2export = "	<i>".$lang['export_make_sure_to']."</i></br>
			<form action=\"".$file."\" method=\"post\">
				<input type=\"hidden\" name=\"map_name\" value=\"".$map_name."\">
				<input type=\"hidden\" name=\"map_x\" value=\"".$map_x."\">
				<input type=\"hidden\" name=\"map_mapid\" value=\"".$map_mapid."\">
				<input type=\"hidden\" name=\"map_y\" value=\"".$map_y."\">
				<input type=\"hidden\" name=\"map_data\" value=\"".$map_data."\">
				<input name=\"export\" value=\" ".$lang['export_map']." \" type=\"submit\" class=\"liteoption\"><br>
			</form>
	";
}
else { $click2export = ''; }

message_die(GENERAL_MESSAGE, "
	<tr>
	     <td class=\"row1\">
		<center>
		<span class=\"gen\">
		<br>
		<b>".$lang['overwrite_succesfully']."</b><br>
		".$click2export."
		<br>
		<form action=\"".$file."\" method=\"post\">
			<input type=\"hidden\" name=\"map_name\" value=\"".$map_name."\">
			<input type=\"hidden\" name=\"map_x\" value=\"".$map_x."\">
			<input type=\"hidden\" name=\"map_y\" value=\"".$map_y."\">
			<input type=\"hidden\" name=\"map_mapid\" value=\"".$map_mapid."\">
			<input type=\"hidden\" name=\"map_data\" value=\"".$map_data."\">
			<input name=\"\" value=\" ".$lang['go_back']." \" type=\"submit\" class=\"mainoption\"><br>
		</form>
		</span>
		</center>
	     </td>
	</tr>
");
}

}
//
// [END] Overwrite (if map with same name already exists!)
//

//
// [START] Export Map
//
if (isset($export))
{
$errorEx = 0;

// Check if map has been saved yet, or that it is a new map.
if ($map_mapid == '')
{ $errorEx = 1; }

// Check if user saved before exporting!
$sqlEx = "SELECT * FROM ".$table_prefix."quest_maps WHERE id = '".$map_mapid."' ";
if ( !($resultEx = $db->sql_query($sqlEx)) )
{
message_die(GENERAL_MESSAGE, "
	<tr>
	     <td class=\"row1\">
		<center>
		<span class=\"gen\">
		<br>
		<b>".$lang['export_check_error']."</b><br>
		<br>
		".$lang['db_error']."<br>
		<span class=\"gensmall\"><i>".mysql_error()."</i></span>
		<br>
		<form action=\"".$file."\" method=\"post\">
			<input type=\"hidden\" name=\"map_name\" value=\"".$map_name."\">
			<input type=\"hidden\" name=\"map_x\" value=\"".$map_x."\">
			<input type=\"hidden\" name=\"map_mapid\" value=\"".$map_mapid."\">
			<input type=\"hidden\" name=\"map_y\" value=\"".$map_y."\">
			<input type=\"hidden\" name=\"map_data\" value=\"".$map_data."\">
			<input name=\"\" value=\" ".$lang['go_back']." \" type=\"submit\" class=\"mainoption\"><br>
		</form>
		</span>
		</center>
	     </td>
	</tr>
");
}
$rowEx = mysql_fetch_array($resultEx); 

if( $rowEx['map_data'] != $map_data )
{ $errorEx = 1; }

if($errorEx == 1)
{
message_die(GENERAL_MESSAGE, "
	<tr>
	     <td class=\"row1\">
		<center>
		<span class=\"gen\">
		<br>
		<b>".$lang['export_save_first']."</b><br>
		<br>
		<form action=\"".$file."\" method=\"post\">
			<input type=\"hidden\" name=\"map_name\" value=\"".$map_name."\">
			<input type=\"hidden\" name=\"map_x\" value=\"".$map_x."\">
			<input type=\"hidden\" name=\"map_y\" value=\"".$map_y."\">
			<input type=\"hidden\" name=\"map_mapid\" value=\"".$map_mapid."\">
			<input type=\"hidden\" name=\"map_data\" value=\"".$map_data."\">
			<input name=\"\" value=\" ".$lang['go_back']." \" type=\"submit\" class=\"mainoption\"><br>
		</form>
		</span>
		</center>
	     </td>
	</tr>
");
}

$tile = $phpbb_root_path.'images/map_misc/spacer.gif';

// Since both height and width are the same value, it doesn't matter which one we use :P
$img_size = $img_size[0];

$map_tiles = array();

$tiles = explode(",", $map_data); 
$tiles_count = count($tiles);

for($iii = 0 ; $iii < $tiles_count; $iii++)
{
	$map_tiles[] = $imagetype($phpbb_root_path . $tiles_path . '/' . $tiles[$iii]);
}

$tot_tiles = count($map_tiles);

$tot_width = $img_size*$map_x;
$tot_height = $img_size*$map_y;

$base = $imagetype($tile);
$map_export = ImageCreateTrueColor ($tot_width, $tot_height);

imagecopy ($map_export, $base, 0, 0, 0, 0, $img_size, $img_size);
ImageDestroy($base);

$h_pos = 0;
$v_pos = 0;

for($iz = 0 ; $iz < $tot_tiles; $iz++)
{
	$h_position = $h_pos * $img_size;
	if($h_pos >= $map_x)
	{
		$v_pos++;
		$h_pos = 0;
		$h_position = $h_pos * $img_size;
	}
	$v_position = $v_pos * $img_size;
	imagecopy ($map_export, $map_tiles[$iz], $h_position, $v_position, 0, 0, $img_size, $img_size);
	ImageDestroy($map_tiles[$iz]);

	$h_pos++;
}

imagePNG($map_export, $phpbb_root_path . $export_path . '/' . $map_mapid . '.png');
imagedestroy($map_export);

message_die(GENERAL_MESSAGE, "
	<tr>
	     <td class=\"row1\">
		<center>
		<span class=\"gen\">
		<br>
		<b>".$lang['export_succesfully']."</b><br>
		<br>
		<a href=\"".$phpbb_root_path . $export_path . "/" . $map_mapid . ".png\" target=\"_blank\"><i>".$lang['export_view']."</i></a><br>
		<br>
		<form action=\"".$file."\" method=\"post\">
			<input type=\"hidden\" name=\"map_name\" value=\"".$map_name."\">
			<input type=\"hidden\" name=\"map_x\" value=\"".$map_x."\">
			<input type=\"hidden\" name=\"map_y\" value=\"".$map_y."\">
			<input type=\"hidden\" name=\"map_mapid\" value=\"".$map_mapid."\">
			<input type=\"hidden\" name=\"map_data\" value=\"".$map_data."\">
			<input name=\"\" value=\" ".$lang['go_back']." \" type=\"submit\" class=\"mainoption\"><br>
		</form>
		</span>
		</center>
	     </td>
	</tr>
");
}
//
// [END] Export Map
//

// Check if user isn't creating a new map, loading a map, saving the current map or exporting it! :)
if ((!isset($new)) && (!isset($load)) && (!isset($namechange)) && (!isset($save)) && (!isset($load)) && (!isset($saveasnew)) && (!isset($overwrite)) && (!isset($export)))
{


//
// [START] Build map
//

$tiles = explode(",", $map_data); 
$tiles_count = count($tiles); 
$x = 1;
$y = 1;
$z = 1;

$map = "<tr><td width=".$img_size[0]." height=".$img_size[1]." align=\"center\" valign=\"middle\"><b> </b></td>";
for ($no = 0; $no < $map_x; $no++) 
{ 
	$map .= "<td width=".$img_size[0]." height=".$img_size[1]." align=\"center\" valign=\"middle\"><span class=\"gen\"><b>".$z."</b></span></td>";
	$z = $z + 1;
} 
$map .= "</tr>";

$map .= "<tr><td width=".$img_size[0]." height=".$img_size[1]." align=\"center\" valign=\"middle\"><span class=\"gen\"><b>".$y."</b></span></td>";
for ($no = 0; $no < $tiles_count; $no++) 
{ 
	if ($tiles[$no] != '')
	{
	$map .= "<td width=".$img_size[0]." height=".$img_size[1]."><img src=\"".$phpbb_root_path.$tiles_path."/".$tiles[$no]."\"></td>";
	}
	$x = $x + 1;
	if (($x > $map_x) && ($y < $map_y))
	{ $x=1; $y= $y+1; $map .= "</tr><tr><td width=".$img_size[0]." height=".$img_size[1]." align=\"center\" valign=\"middle\"><span class=\"gen\"><b>".$y."</b></a></td>"; }
} 
//
// [END] Build map
//


//
// [START] Output
//
$useaction = "
	<tr>
	     <td class=\"row1\">
		<span class=\"gen\">
		<br>
		<center>

		<form action=\"".$file."\" method=\"post\">
		<table width=460>
		  <tr>
			<td width=".$buttonwidth." valign=\"top\" class=\"row2\"><span class=\"gen\"><center>
			<input name=\"new\" value=\" ".$lang['new_map']." \" type=\"submit\" class=\"mainoption\"><br>
			</center></span></td>

			<td width=".$buttonwidth." valign=\"top\" class=\"row2\"><span class=\"gen\"><center>
			<input name=\"load\" value=\" ".$lang['load_map']." \" type=\"submit\" class=\"mainoption\"><br>
			</center></span></td>

			<td width=".$buttonwidth." valign=\"top\" class=\"row2\"><span class=\"gen\"><center>
			<input name=\"save\" value=\" ".$lang['save_map']." \" type=\"submit\" class=\"mainoption\"><br>
			</center></span></td>

			".$exportmaps."

		  </tr>
		</table>

		<br>

		<table width=460>
		  <tr>
			<td width=40% valign=\"top\" class=\"row2\"><span class=\"gen\"><center>
			<b>".$lang['tile']."</b><br>
			</center></span></td>

			<td width=30% valign=\"top\" class=\"row2\"><span class=\"gen\"><center>
			<b>".$lang['coordinates']."</b><br>
			</center></span></td>

			<td width=30% valign=\"top\" class=\"row2\"><span class=\"gen\"><center>
			</center></span></td>
		  </tr>
		  <tr>

			<td width=40% valign=\"top\" class=\"row2\"><span class=\"gen\"><center>
			<select name=\"tile\" onChange=\"document.images['preview'].src = '".$phpbb_root_path.$tiles_path."/'+ this.value;\" >
				".$filename_list."
			</select>
			<br>
			<img src=\"".$phpbb_root_path.$tiles_path."/".$firsttile."\" name=\"preview\">
			</center></span></td>

			<td width=30% valign=\"top\" class=\"row2\"><span class=\"gen\"><center>
			<input name=\"vert\" value=\"".$vert."\" class=\"post\" type=\"numeric\" size=\"2\" maxlength=\"2\"> <span class=\"gensmall\">".$lang['vert']."</span> <br>
			x <br>
			<input name=\"hori\" value=\"".$hori."\" class=\"post\" type=\"numeric\" size=\"2\" maxlength=\"2\"> <span class=\"gensmall\">".$lang['hori']."</span> <br>
			</center></span></td>

			<td width=30% valign=\"middle\" class=\"row2\"><span class=\"gensmall\"><center>
			<input type=\"hidden\" name=\"map_name\" value=\"".$map_name."\">
			<input type=\"hidden\" name=\"map_x\" value=\"".$map_x."\">
			<input type=\"hidden\" name=\"map_y\" value=\"".$map_y."\">
			<input type=\"hidden\" name=\"map_data\" value=\"".$map_data."\">

			<input type=\"hidden\" name=\"map_mapid\" value=\"".$map_mapid."\">

			<input name=\"tilechange\" value=\" ".$lang['change']." \" type=\"submit\" class=\"mainoption\"><br>
			".$lang['or']."<br>
			<input name=\"fill\" value=\" ".$lang['fill']." \" type=\"submit\" class=\"mainoption\"><br>
			".$lang['fill_info']."
			</center></span></td>
		  </tr>
		</table>

		<br><br>

		<font size=3><b>".$map_name."</b></font><br>
		<input name=\"namechange\" value=\" ".$lang['change_lowercase']." \" type=\"submit\" class=\"liteoption\">

		</form>

		<table ".$map_grid.">".$map."</table>

		<br>

		</center>	
		</span>
	     </td>
	</tr>";
//
// [END] Output
//


// End check for new map, loading map and saving map :)
}

//
// General thingies
//
   $template->assign_vars(array( 
	      	'USEACTION' => $useaction,
		'L_USE_TITLE' => $title,
		'VERSION' => $lang['version']
		   )); 
   $template->assign_block_vars('', array()); 

//
// Generate the page
//
$template->pparse('body');

include('page_footer_admin.' . $phpEx);

?>
