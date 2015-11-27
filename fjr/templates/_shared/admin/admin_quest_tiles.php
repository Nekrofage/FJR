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
	$module['Quest MOD']['Map_-_Tiles_Editor'] = $file;
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

$file = "admin_quest_tiles.php";
$title = "Quest MOD - Tiles Editor";
$tiles_path = "images/map_tiles";

//
// [END] General Variables
//


//
// [START] Tile change
//
if($action == "change")
{
	if(!isset($tile))
	{ message_die(GENERAL_MESSAGE, "<b>Error!</b><br><br>".$lang['no_tile_selected']); }

	$sql = "SELECT * FROM ".$table_prefix."quest_tiles WHERE filename = '".$tile."' ";
	if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }

	if (mysql_num_rows($result) != 0)
	{
		$now_walkable = "<img src=\"" .$phpbb_root_path . $tiles_path . "/" .$tile ."\"> <b>".$tile."</b> ".$lang['is_now_walkable']; 
		$sql = "DELETE FROM ".$table_prefix."quest_tiles WHERE filename = '".$tile."' ";
		if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	}
	else
	{
		$now_walkable = "<img src=\"" .$phpbb_root_path . $tiles_path . "/" .$tile ."\"> <b>".$tile."</b> ".$lang['is_now_non_walkable']; 
		$sql = "INSERT INTO ".$table_prefix."quest_tiles (filename,walkable) VALUES('".$tile."','0') ";
		if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	}
}
//
// [END] Tile change
//

//
// [START] Get list of TILES
//
$dir = @opendir($phpbb_root_path . $tiles_path);

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
$list = "";

for( $i = 0; $i < count($tile_images); $i++ )
{
	$sql = "SELECT * FROM ".$table_prefix."quest_tiles WHERE filename = '".$tile_images[$i]."' ";
	if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	$row = mysql_fetch_array($result);

	if (mysql_num_rows($result) != 0)
	{ $walkable = "No"; }
	else
	{ $walkable = "Yes"; }

	$list .= 	'
		<tr><form action="'.$file.'" method="post">
			<td class="row2" align="center"><span class="gen"><img src="' .$phpbb_root_path . $tiles_path . '/' .$tile_images[$i] .'"></span></td>
			<td class="row1" align="center"><span class="gen">'.$tile_images[$i].'</span></td>
			<td class="row2" align="center"><span class="gen"><b>'.$walkable.'</b></span></td>
			<td class="row1" align="center"><span class="gen"><input type="hidden" name="action" value="change"><input type="hidden" name="tile" value="'.$tile_images[$i].'"><input type="submit" value="'.$lang['change'].'" class="liteoption"></span></td>
		</form></tr>
		';
}

// If a tile has been changed, put up the message ;)
if(isset($now_walkable))
{
	$change_message = '
		<table width="60%">
			<tr>
				<th class="catHead" width="100%">'.$lang['tile_changed_succesfully'].'</th>
			</tr>
			<tr>
				<td class="row2" align="center" valign="middle"><span class="gen">'.$now_walkable.'</span></td>
			</tr>	
		</table>
		<br />
	';
}
else
{
	$change_message = '';
}

$useaction = 	'
		<tr><td class="row1" align="center"><span class="gen">
			'.$change_message.'
			<table width="100%">
				<tr>
					<td class="row2" align="center"><span class="gen"><b>'.$lang['image'].'</b></span></td>
					<td class="row2" align="center"><span class="gen"><b>'.$lang['name'].'</b></span></td>
					<td class="row2" align="center"><span class="gen"><b>'.$lang['walkable'].'</b></span></td>
					<td class="row2" align="center"><span class="gen"><b>'.$lang['change'].'</b></span></td>
				</tr>
				'.$list.'
				<tr>
					<td class="row2" align="center"><span class="gen"><b>'.$lang['image'].'</b></span></td>
					<td class="row2" align="center"><span class="gen"><b>'.$lang['name'].'</b></span></td>
					<td class="row2" align="center"><span class="gen"><b>'.$lang['walkable'].'</b></span></td>
					<td class="row2" align="center"><span class="gen"><b>'.$lang['change'].'</b></span></td>
				</tr>
			</table>
		</span></td></tr>
		';
//
// [END] Get list of TILES
//

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