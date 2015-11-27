<?php
/***************************************************************************
 *                              admin_quest_sprites.php
 *                            -------------------
 *   Version            : 1.0.0
 *   began              : Saturday, May 8th, 2004
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
	$module['Quest MOD']['Character Sprites'] = $file;
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

$file = "admin_quest_sprites.php";
$title = "Quest MOD - Character Sprites";
$sprites_path = "images/map_sprites";

//
// [END] General Variables
//

//
// [START] Main Page
//
if($action == "")
{
$useaction = 	'
		<tr><td class="row1" align="center"><span class="gen">
			<br />
			<table width="80%" cellpadding=0 cellspacing=0>
				<tr>
					<th class="catHead" width="100%">'.$lang['sprites_character_sprites'].'</th>
				</tr>
				<tr>
					<td class="row2" align="center"><span class="gen">'.$lang['sprites_admin_help'].'</span></td>
				</tr>
				<form action="" method="post">
				<tr>
					<td width="100%" valign="middle" class="row2" align="center"><span class="gen"><br /><input type="hidden" name="action" value="layers"><input type="submit" class="mainoption" value="'.$lang['sprites_edit_layers'].'"></span></th>
				</tr>
				</form>
				<form action="" method="post">
				<tr>
					<td width="100%" valign="middle" class="row2" align="center"><span class="gen"><br /><input type="hidden" name="action" value="images"><input type="submit" class="mainoption" value="'.$lang['sprites_edit_images'].'"><br /><br /></span></th>
				</tr>
				</form>
			</table>
			<br /><br />
		</span></td></tr>
		';
}
//
// [END] Main Page
//

//
// [START] Layers Main Page
//
if($action == "layers")
{
	$sql = "SELECT * FROM ".$table_prefix."quest_sprite_layers ORDER BY position DESC";
	if ( !($result = $db->sql_query($sql)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }

	$list = '
		<tr>
			<th class="catHead">'.$lang['sprites_position'].'</th>
			<th class="catHead">'.$lang['name'].'</span></th>
			<th class="catHead">'.$lang['sprites_compulsive'].'</span></th>
			<th class="catHead" colspan="2">'.$lang['sprites_move'].'</span></th>
			<th class="catHead">'.$lang['edit'].'</span></th>
			<th class="catHead">'.$lang['delete'].'</span></th>
		</tr>
	';

	for( $i = 0; $i < mysql_num_rows($result); $i++ )
	{
		$row = mysql_fetch_array($result); 

		$compulsive = $lang['No'];
		if($row['compulsive'] == 1)
		{ $compulsive = $lang['Yes']; }

		$list .= '
			<tr>
				<td class="row2" align="center"><span class="gen">'.$row['position'].'</span></td>
				<td class="row1" align="center"><span class="gen">'.$row['name'].'</span></td>
				<td class="row2" align="center"><span class="gen">'.$compulsive.'</span></td>
				<form action="" method="post">
					<td class="row1" align="center"><span class="gen">

						<input type="hidden" name="action" value="movelayer">
						<input type="hidden" name="direction" value="up">
						<input type="hidden" name="layer" value="'.$row['id'].'">
						<input type="image" width="25" height="25" src="'.$phpbb_root_path.'images/map_misc/movelayers_up.gif" alt="'.$lang['sprites_move_up'].'">
					</td>
				</form>
				<form action="" method="post">
					<td class="row1" align="center"><span class="gen">
						<input type="hidden" name="action" value="movelayer">
						<input type="hidden" name="direction" value="down">
						<input type="hidden" name="layer" value="'.$row['id'].'">
						<input type="image" width="25" height="25" src="'.$phpbb_root_path.'images/map_misc/movelayers_down.gif" alt="'.$lang['sprites_move_down'].'">
					</span></td>
				</form>
				<form action="" method="post"><td class="row2" align="center"><span class="gen"><input type="hidden" name="action" value="editlayer"><input type="hidden" name="layer" value="'.$row['id'].'"><input type="submit" value="'.$lang['edit'].'" class="liteoption"></span></td></form>
				<form action="" method="post"><td class="row2" align="center"><span class="gen"><input type="hidden" name="action" value="deletelayer"><input type="hidden" name="layer" value="'.$row['id'].'"><input type="submit" value="'.$lang['delete'].'" class="liteoption"></span></td></form>
			</tr>
		';
	}

	$useaction = 	'
			<tr><td class="row1" align="center"><span class="gen">
				<br /><br />
				<table width="70%" cellpadding="0" cellspacing="0">
					'.$list.'
				</table>
				<br />
				<form action="" method="post">
				<input type="hidden" name="action" value="addlayer"><input type="submit" class="mainoption" value="'.$lang['sprites_newlayer'].'"><br /><br /></span></th>
				</form>
			</span></td></tr>
		';
}
//
// [END] Layers Main Page
//

//
// [START] New Layer
//
if($action == "addlayer")
{
	$useaction = 	'
			<tr><td class="row1" align="center"><span class="gen">
				<br /><b>'.$lang['sprites_createnewlayer'].'</b><br /><br />
				<form action="" method="post">
				<table width="60%" cellpadding="10" cellspacing="0">
					<tr>
						<td width="30%" class="row2"><span class="gen"><b>'.$lang['name'].'</b></span></td>
						<td width="70%" class="row2"><span class="gen"><input type="text" name="layername" value=""></span></td>
					</tr>
					<tr>
						<td width="30%" class="row2"><span class="gen"><b>'.$lang['sprites_compulsive'].'</b></span><br /><span class="gensmall">'.$lang['sprites_compulsive_explain'].'</span></td>
						<td width="70%" class="row2"><span class="gen">
							<input type="radio" value="0" name="compulsive" CHECKED>'.$lang['No'].'&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="radio" value="1" name="compulsive">'.$lang['Yes'].'
						</span></td>
					</tr>
				</table>
				<br />
				<input type="hidden" name="action" value="doaddlayer"><input type="submit" class="mainoption" value="'.$lang['create'].'"><br /><br /></span></th>
				</form>
			</span></td></tr>
		';
}
//
// [END] New Layer
//

//
// [START] Create new Layer
//
if($action == "doaddlayer")
{
	if(($layername == "") OR ($compulsive == ""))
	{
		$useaction = '
				<tr><td class="row1" align="center"><span class="gen"><form action="" method="post">
					<br />
					<b>'.$lang['error'].':</b><br />'.$lang['didnt_fill_all_fields'].'<br />
					<br />
					<input type="hidden" name="action" value="addlayer"><input type="submit" class="mainoption" value="'.$lang['go_back'].'">
				</form></span></td></tr>
		';
	}
	else
	{
	// Get max position!
	$sql = "SELECT position FROM ".$table_prefix."quest_sprite_layers ORDER BY position DESC LIMIT 0,1";
	if ( !($result = $db->sql_query($sql)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }
	$row = mysql_fetch_array($result); 

	$position = $row['position'] + 1;

	$sql = "INSERT INTO ".$table_prefix."quest_sprite_layers (name,position,compulsive) VALUES ('".$layername."','".$position."','".$compulsive."')";
	if ( !($result = $db->sql_query($sql)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }

	// Add column to quest_sprite_userchars table!
	$sql = "ALTER TABLE ".$table_prefix."quest_sprite_userchars ADD ".$layername." MEDIUMTEXT NOT NULL";
	if ( !($result = $db->sql_query($sql)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }

	$useaction = '
			<tr><td class="row1" align="center"><span class="gen"><form action="" method="post">
				<br />
				<b>'.$lang['sprites_newlayer_succesful'].'</b><br />
				<br />
				<input type="hidden" name="action" value="layers">
				<input type="submit" class="mainoption" value="'.$lang['go_back'].'">
			</form></span></td></tr>
	';
	}
}
//
// [END] Create new Layer
//

//
// [START] Delete Layer
//
if($action == "deletelayer")
{
	if($layer == "")
	{
		$useaction = '
				<tr><td class="row1" align="center"><span class="gen"><form action="" method="post">
					<br />
					<b>'.$lang['error'].':</b><br />'.$lang['sprites_nolayerselected'].'<br />
					<br />
					<input type="hidden" name="action" value="layers"><input type="submit" class="mainoption" value="'.$lang['go_back'].'">
				</form></span></td></tr>
		';
	}
	else
	{
	// Get the layer's position!
	$sql = "SELECT name,position FROM ".$table_prefix."quest_sprite_layers WHERE id = '".$layer."' ";
	if ( !($result = $db->sql_query($sql)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }
	$row = mysql_fetch_array($result); 

	$layername = $row['name'];
	$position = $row['position'];

	$sql = "DELETE FROM ".$table_prefix."quest_sprite_layers WHERE id = '".$layer."' ";
	if ( !($result = $db->sql_query($sql)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }

	$sql = "DELETE FROM ".$table_prefix."quest_sprite_images WHERE layer = '".$layer."' ";
	if ( !($result = $db->sql_query($sql)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }

	$sql3 = "UPDATE ".$table_prefix."quest_sprite_layers SET position = position - 1 WHERE position > '".$position."' ";
	if ( !($result3 = $db->sql_query($sql3)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }

	// Delete column from quest_sprite_userchars table!
	$sql2 = "ALTER TABLE ".$table_prefix."quest_sprite_userchars DROP `".$layername."` ";
	if ( !($result2 = $db->sql_query($sql2)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }

	$useaction = '
			<tr><td class="row1" align="center"><span class="gen"><form action="" method="post">
				<br />
				<b>'.$lang['sprites_layerdeleted_succesful'].'</b><br />
				<br />
				<input type="hidden" name="action" value="layers">
				<input type="submit" class="mainoption" value="'.$lang['go_back'].'">
			</form></span></td></tr>
	';
	}
}
//
// [END] Delete Layer
//

//
// [START] Move Layer
//
if($action == "movelayer")
{
	if(($layer == "") OR ($direction == ""))
	{
		$useaction = '
				<tr><td class="row1" align="center"><span class="gen"><form action="" method="post">
					<br />
					<b>'.$lang['error'].':</b><br />'.$lang['sprites_nolayerselected'].'<br />
					<br />
					<input type="hidden" name="action" value="layers"><input type="submit" class="mainoption" value="'.$lang['go_back'].'">
				</form></span></td></tr>
		';
	}
	else
	{
	// Get the layer's position!
	$sql = "SELECT position FROM ".$table_prefix."quest_sprite_layers WHERE id = '".$layer."' ";
	if ( !($result = $db->sql_query($sql)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }
	$row = mysql_fetch_array($result); 

	$position = $row['position'];
	if($direction == "up")
	{ $movepos = $position + 1; $order = "DESC"; }
	else
	{ $movepos = $position - 1; $order = "ASC"; }
	
	// Get the top/bottom layer's position!
	$sql = "SELECT position FROM ".$table_prefix."quest_sprite_layers ORDER BY position ".$order." LIMIT 0,1";
	if ( !($result = $db->sql_query($sql)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }
	$row = mysql_fetch_array($result); 

	$maxpos = $row['position'];
	if($position != $maxpos)
	{
		// Set Target Layer
		$sql = "UPDATE ".$table_prefix."quest_sprite_layers SET position = '".$position."' WHERE position = '".$movepos."' ";
		if ( !($result = $db->sql_query($sql)) )
		{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }

		// Set Selected Layer
		$sql = "UPDATE ".$table_prefix."quest_sprite_layers SET position = '".$movepos."' WHERE id = '".$layer."' ";
		if ( !($result = $db->sql_query($sql)) )
		{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }
	
		$useaction = '
				<tr><td class="row1" align="center"><span class="gen"><form action="" method="post">
					<br />
					<b>'.$lang['sprites_layer_moved_succesful'].'</b><br />
					<br />
					<input type="hidden" name="action" value="layers">
					<input type="submit" class="mainoption" value="'.$lang['go_back'].'">
				</form></span></td></tr>
		';
	}
	else
	{
		$useaction = '
				<tr><td class="row1" align="center"><span class="gen"><form action="" method="post">
					<br />
					<b>'.$lang['sprites_layer_move_error_'.$direction].'</b><br />
					'.$lang['sprites_layer_move_is_'.$direction].'<br />
					<br />
					<input type="hidden" name="action" value="layers">
					<input type="submit" class="mainoption" value="'.$lang['go_back'].'">
				</form></span></td></tr>
		';
	}
	}
}
//
// [END] Move Layer
//

//
// [START] Edit Layer
//
if($action == "editlayer")
{
	if($layer == "")
	{
		$useaction = '
				<tr><td class="row1" align="center"><span class="gen"><form action="" method="post">
					<br />
					<b>'.$lang['error'].':</b><br />'.$lang['sprites_nolayerselected'].'<br />
					<br />
					<input type="hidden" name="action" value="layers"><input type="submit" class="mainoption" value="'.$lang['go_back'].'">
				</form></span></td></tr>
		';
	}
	else
	{
	// Get the layer's info!
	$sql = "SELECT * FROM ".$table_prefix."quest_sprite_layers WHERE id = '".$layer."' ";
	if ( !($result = $db->sql_query($sql)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }
	$row = mysql_fetch_array($result); 

	if($row['compulsive'] == 0)
	{
	$radioboxes = '
		<input type="radio" value="0" name="compulsive" CHECKED>'.$lang['No'].'
		&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="radio" value="1" name="compulsive">'.$lang['Yes'].'
	'; 
	}
	else
	{
	$radioboxes = '
		<input type="radio" value="0" name="compulsive">'.$lang['No'].'
		&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="radio" value="1" name="compulsive" CHECKED>'.$lang['Yes'].'
	'; 
	}

	$useaction = 	'
			<tr><td class="row1" align="center"><span class="gen">
				<br /><b>'.$lang['sprites_editlayer'].'</b><br /><br />
				<form action="" method="post">
				<table width="60%" cellpadding="10" cellspacing="0">
					<tr>
						<td width="30%" class="row2"><span class="gen"><b>'.$lang['name'].'</b></span></td>
						<td width="70%" class="row2"><span class="gen"><input type="text" name="layername" value="'.$row['name'].'"></span></td>
					</tr>
					<tr>
						<td width="30%" class="row2"><span class="gen"><b>'.$lang['sprites_compulsive'].'</b></span><br /><span class="gensmall">'.$lang['sprites_compulsive_explain'].'</span></td>
						<td width="70%" class="row2"><span class="gen">
							'.$radioboxes.'
						</span></td>
					</tr>
				</table>
				<br />
				<input type="hidden" name="action" value="doeditlayer"><input type="hidden" name="layer" value="'.$layer.'"><input type="hidden" name="oldlayername" value="'.$row['name'].'"><input type="submit" class="mainoption" value="'.$lang['edit'].'"><br /><br /></span></th>
				</form>
			</span></td></tr>
		';
	}
}
//
// [END] Edit Layer
//

//
// [START] Do Edit Layer
//
if($action == "doeditlayer")
{
	if(($layername == "") OR ($compulsive == "") OR ($layer == "") OR ($oldlayername == ""))
	{
		$useaction = '
				<tr><td class="row1" align="center"><span class="gen"><form action="" method="post">
					<br />
					<b>'.$lang['error'].':</b><br />'.$lang['didnt_fill_all_fields'].'<br />
					<br />
					<input type="hidden" name="action" value="addlayer"><input type="submit" class="mainoption" value="'.$lang['go_back'].'">
				</form></span></td></tr>
		';
	}
	else
	{
	// Edit layer!
	$sql = "UPDATE ".$table_prefix."quest_sprite_layers SET name = '".$layername."', compulsive = '".$compulsive."' WHERE id = '".$layer."' ";
	if ( !($result = $db->sql_query($sql)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }

	// Edit column in quest_sprite_userchars table!
	$sql = "ALTER TABLE ".$table_prefix."quest_sprite_userchars CHANGE ".$oldlayername." ".$layername." MEDIUMTEXT NOT NULL";
	if ( !($result = $db->sql_query($sql)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }

	$useaction = '
			<tr><td class="row1" align="center"><span class="gen"><form action="" method="post">
				<br />
				<b>'.$lang['sprites_editlayer_succesful'].'</b><br />
				<br />
				<input type="hidden" name="action" value="layers">
				<input type="submit" class="mainoption" value="'.$lang['go_back'].'">
			</form></span></td></tr>
	';
	}
}
//
// [END] Do Edit Layer
//

//
// [START] Images Main Page
//
if($action == "images")
{
	$list = '
		<tr>
			<th class="catHead">'.$lang['sprites_layer'].'</th>
			<th class="catHead">'.$lang['name'].'</span></th>
			<th class="catHead">'.$lang['image'].'</span></th>
			<th class="catHead">'.$lang['sprites_itemneeded'].'</span></th>
			<th class="catHead">'.$lang['sprites_dontshowlayer'].'</span></th>
			<th class="catHead">'.$lang['edit'].'</span></th>
			<th class="catHead">'.$lang['delete'].'</span></th>
		</tr>
	';

	$Lsql = "SELECT * FROM ".$table_prefix."quest_sprite_layers ORDER BY position DESC";
	if ( !($Lresult = $db->sql_query($Lsql)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }

	for( $x = 0; $x < mysql_num_rows($Lresult); $x++ )
	{
	$Lrow = mysql_fetch_array($Lresult); 

	$sql = "SELECT * FROM ".$table_prefix."quest_sprite_images WHERE layer = '".$Lrow['id']."' ";
	if ( !($result = $db->sql_query($sql)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }


	for( $i = 0; $i < mysql_num_rows($result); $i++ )
	{
		$row = mysql_fetch_array($result); 

		$layername = $Lrow['name'];

		$dontshowlayer = "";
		if($row['dontshowlayer'] != "")
		{
			$sql2 = "SELECT name FROM ".$table_prefix."quest_sprite_layers WHERE id = '".$row['dontshowlayer']."' ";
			if ( !($result2 = $db->sql_query($sql2)) )
			{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }
			$row2 = mysql_fetch_array($result2); 
	
			$dontshowlayer = $row2['name'];
		}

		if($row['itemneeded'] != "")
		{ $itemneeded = $row['itemneeded']; }
		else
		{ $itemneeded = '<i>'.$lang['script_none'].'</i>'; }

		$list .= '
			<tr>
				<td class="row2" align="center"><span class="gen">'.$layername.'</span></td>
				<td class="row1" align="center"><span class="gen">'.$row['name'].'</span></td>
				<td class="row2" align="center"><span class="gen"><img src="'.$phpbb_root_path.$sprites_path.'/'.$row['image'].'"></span></td>
				<td class="row1" align="center"><span class="gen">'.$itemneeded.'</span></td>
				<td class="row2" align="center"><span class="gen">'.$dontshowlayer.'</span></td>
				<form action="" method="post"><td class="row1" align="center"><span class="gen"><input type="hidden" name="action" value="editimage"><input type="hidden" name="image" value="'.$row['id'].'"><input type="submit" value="'.$lang['edit'].'" class="liteoption"></span></td></form>
				<form action="" method="post"><td class="row2" align="center"><span class="gen"><input type="hidden" name="action" value="deleteimage"><input type="hidden" name="image" value="'.$row['id'].'"><input type="submit" value="'.$lang['delete'].'" class="liteoption"></span></td></form>
			</tr>
		';
	}
	}

	$useaction = 	'
			<tr><td class="row1" align="center"><span class="gen">
				<br /><br />
				<table width="85%" cellpadding="0" cellspacing="0">
					'.$list.'
				</table>
				<br />
				<form action="" method="post">
				<input type="hidden" name="action" value="addimage"><input type="submit" class="mainoption" value="'.$lang['sprites_addimage'].'"><br /><br /></span></th>
				</form>
			</span></td></tr>
		';
}
//
// [END] Images Main Page
//

//
// [START] Add image
//
if($action == "addimage")
{
	//
	// [START] Create list with images!
	//
	$dir = @opendir($phpbb_root_path . $sprites_path);
	
	$firstimage = '';
	
	while($file = @readdir($dir))
	{
		if( !@is_dir(phpbb_realpath($phpbb_root_path . $sprites_path . '/' . $file)) )
		{
			$img_size = @getimagesize($phpbb_root_path . $sprites_path . '/' . $file);
	
			if( $img_size[0] && $img_size[1] )
			{
				$sprite_images[] = $file;
			}
		}
	}
	
	@closedir($dir);
	
	sort($sprite_images);
	$i_list = "";
	
	for( $i = 0; $i < count($sprite_images); $i++ )
	{
		if ($firstimage == '')
		{ $firstimage = $sprite_images[$i]; }
		$i_list .= '<option value="' . $sprite_images[$i] . '">' . $sprite_images[$i] . '</option>';
	}
	//
	// [END] Create list with images!
	//

	$sql = "SELECT * FROM ".$table_prefix."quest_sprite_layers ORDER BY position DESC";
	if ( !($result = $db->sql_query($sql)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }

	$l_list = '';

	for( $i = 0; $i < mysql_num_rows($result); $i++ )
	{
		$row = mysql_fetch_array($result); 
		$l_list .= '<option value = "'.$row['id'].'">'.$row['name'].'</option>';
	}

	$noshow = '<option value = "">'.$lang['sprites_dont_use_nolayer'].'</option>';

	$useaction = 	'
			<tr><td class="row1" align="center"><span class="gen">
				<br /><b>'.$lang['sprites_addimage'].'</b><br /><br />
				<form action="" method="post">
				<table width="60%" cellpadding="10" cellspacing="0">
					<tr>
						<td width="40%" class="row2"><span class="gen"><b>'.$lang['name'].'</b></span></td>
						<td width="60%" class="row2"><span class="gen"><input type="text" name="name" value=""></span></td>
					</tr>
					<tr>
						<td width="40%" class="row2"><span class="gen"><b>'.$lang['image'].'</b></span></td>
						<td width="60%" class="row2"><span class="gen"><img src="'.$phpbb_root_path.$sprites_path.'/'.$firstimage.'" name="preview"><br /><select name="image" onChange="document.images[\'preview\'].src = \''.$phpbb_root_path.$sprites_path.'/\'+ this.value;">'.$i_list.'</select></span></td>
					</tr>
					<tr>
						<td width="40%" class="row2"><span class="gen"><b>'.$lang['sprites_layer'].'</b></span></td>
						<td width="60%" class="row2"><span class="gen"><select name="layer">'.$l_list.'</select></span></td>
					</tr>
					<tr>
						<td width="40%" class="row2"><span class="gen"><b>'.$lang['sprites_dontshowlayer'].'</b></span><span class="gensmall"><br />'.$lang['sprites_dontshowlayer_explain'].'</span></td>
						<td width="60%" class="row2"><span class="gen"><select name="dontshowlayer">'.$noshow.$l_list.'</select></span></td>
					</tr>
					<tr>
						<td width="40%" class="row2"><span class="gen"><b>'.$lang['sprites_itemneeded'].'</b></span><span class="gensmall"><br />'.$lang['sprites_itemneeded_explain'].'</span></td>
						<td width="60%" class="row2"><span class="gen"><input type="text" name="itemneeded" value=""></span></td>
					</tr>
				</table>
				<br />
				<input type="hidden" name="action" value="doaddimage"><input type="submit" class="mainoption" value="'.$lang['sprites_addimage'].'"><br /><br /></span></th>
				</form>
			</span></td></tr>
		';
}
//
// [END] Add image
//

//
// [START] Add new image
//
if($action == "doaddimage")
{
	if(($name == "") OR ($image == "") OR ($layer == ""))
	{
		$useaction = '
				<tr><td class="row1" align="center"><span class="gen"><form action="" method="post">
					<br />
					<b>'.$lang['error'].':</b><br />'.$lang['didnt_fill_all_fields'].'<br />
					<br />
					<input type="hidden" name="action" value="addlayer"><input type="submit" class="mainoption" value="'.$lang['go_back'].'">
				</form></span></td></tr>
		';
	}
	else
	{
	$sql = "INSERT INTO `".$table_prefix."quest_sprite_images` (name,image,layer,itemneeded,dontshowlayer) VALUES ('".$name."','".$image."','".$layer."','".$itemneeded."','".$dontshowlayer."')";
	if ( !($result = $db->sql_query($sql)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }

	$useaction = '
			<tr><td class="row1" align="center"><span class="gen"><form action="" method="post">
				<br />
				<b>'.$lang['sprites_addimage_succesful'].'</b><br />
				<br />
				<input type="hidden" name="action" value="images">
				<input type="submit" class="mainoption" value="'.$lang['go_back'].'">
			</form></span></td></tr>
	';
	}
}
//
// [END] Add new image
//

//
// [START] Delete Image
//
if($action == "deleteimage")
{
	if($image == "")
	{
		$useaction = '
				<tr><td class="row1" align="center"><span class="gen"><form action="" method="post">
					<br />
					<b>'.$lang['error'].':</b><br />'.$lang['sprites_noimageselected'].'<br />
					<br />
					<input type="hidden" name="action" value="layers"><input type="submit" class="mainoption" value="'.$lang['go_back'].'">
				</form></span></td></tr>
		';
	}
	else
	{
	$sql = "DELETE FROM ".$table_prefix."quest_sprite_images WHERE id = '".$image."' ";
	if ( !($result = $db->sql_query($sql)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }

	$useaction = '
			<tr><td class="row1" align="center"><span class="gen"><form action="" method="post">
				<br />
				<b>'.$lang['sprites_imagedeleted_succesful'].'</b><br />
				'.$lang['sprites_imagedeleted_succesful_explain'].'<br />
				<br />
				<input type="hidden" name="action" value="images">
				<input type="submit" class="mainoption" value="'.$lang['go_back'].'">
			</form></span></td></tr>
	';
	}
}
//
// [END] Delete Image
//

//
// [START] Edit image
//
if($action == "editimage")
{
	if($image == "")
	{
		$useaction = '
				<tr><td class="row1" align="center"><span class="gen"><form action="" method="post">
					<br />
					<b>'.$lang['error'].':</b><br />'.$lang['sprites_noimageselected'].'<br />
					<br />
					<input type="hidden" name="action" value="layers"><input type="submit" class="mainoption" value="'.$lang['go_back'].'">
				</form></span></td></tr>
		';
	}
	else
	{
	$imageid = $image;

	$sql = "SELECT * FROM ".$table_prefix."quest_sprite_images WHERE id = '".$image."' ";
	if ( !($result = $db->sql_query($sql)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }
	$imagerow = mysql_fetch_array($result); 

	//
	// [START] Create list with images!
	//
	$dir = @opendir($phpbb_root_path . $sprites_path);
	
	$firstimage = '';
	
	while($file = @readdir($dir))
	{
		if( !@is_dir(phpbb_realpath($phpbb_root_path . $sprites_path . '/' . $file)) )
		{
			$img_size = @getimagesize($phpbb_root_path . $sprites_path . '/' . $file);
	
			if( $img_size[0] && $img_size[1] )
			{
				$sprite_images[] = $file;
			}
		}
	}
	
	@closedir($dir);
	
	sort($sprite_images);
	$i_list = "";
	
	for( $i = 0; $i < count($sprite_images); $i++ )
	{
		if($imagerow['image'] == $sprite_images[$i])
		{ $checked = "SELECTED"; }
		else { $checked = ""; }
		$i_list .= '<option value="' . $sprite_images[$i] . '" '.$checked.'>' . $sprite_images[$i] . '</option>';
	}
	//
	// [END] Create list with images!
	//

	$sql = "SELECT * FROM ".$table_prefix."quest_sprite_layers ORDER BY position DESC";
	if ( !($result = $db->sql_query($sql)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }

	$l_list = '';
	$n_list = '<option value = "">'.$lang['sprites_dont_use_nolayer'].'</option>';

	for( $i = 0; $i < mysql_num_rows($result); $i++ )
	{
		$row = mysql_fetch_array($result); 
		if($imagerow['layer'] == $row['id'])
		{ $checked = "SELECTED"; }
		else { $checked = ""; }
		$l_list .= '<option value = "'.$row['id'].'" '.$checked.'>'.$row['name'].'</option>';

		if($imagerow['dontshowlayer'] == $row['id'])
		{ $checked = "SELECTED"; }
		else { $checked = ""; }
		$n_list .= '<option value = "'.$row['id'].'" '.$checked.'>'.$row['name'].'</option>';
	}

	$useaction = 	'
			<tr><td class="row1" align="center"><span class="gen">
				<br /><b>'.$lang['sprites_editimage'].'</b><br /><br />
				<form action="" method="post">
				<table width="60%" cellpadding="10" cellspacing="0">
					<tr>
						<td width="40%" class="row2"><span class="gen"><b>'.$lang['name'].'</b></span></td>
						<td width="60%" class="row2"><span class="gen"><input type="text" name="name" value="'.$imagerow['name'].'"></span></td>
					</tr>
					<tr>
						<td width="40%" class="row2"><span class="gen"><b>'.$lang['image'].'</b></span></td>
						<td width="60%" class="row2"><span class="gen"><img src="'.$phpbb_root_path.$sprites_path.'/'.$imagerow['image'].'" name="preview"><br /><select name="image" onChange="document.images[\'preview\'].src = \''.$phpbb_root_path.$sprites_path.'/\'+ this.value;">'.$i_list.'</select></span></td>
					</tr>
					<tr>
						<td width="40%" class="row2"><span class="gen"><b>'.$lang['sprites_layer'].'</b></span></td>
						<td width="60%" class="row2"><span class="gen"><select name="layer">'.$l_list.'</select></span></td>
					</tr>
					<tr>
						<td width="40%" class="row2"><span class="gen"><b>'.$lang['sprites_dontshowlayer'].'</b></span><span class="gensmall"><br />'.$lang['sprites_dontshowlayer_explain'].'</span></td>
						<td width="60%" class="row2"><span class="gen"><select name="dontshowlayer">'.$n_list.'</select></span></td>
					</tr>
					<tr>
						<td width="40%" class="row2"><span class="gen"><b>'.$lang['sprites_itemneeded'].'</b></span><span class="gensmall"><br />'.$lang['sprites_itemneeded_explain'].'</span></td>
						<td width="60%" class="row2"><span class="gen"><input type="text" name="itemneeded" value="'.$imagerow['itemneeded'].'"></span></td>
					</tr>
				</table>
				<br />
				<input type="hidden" name="action" value="doeditimage"><input type="hidden" name="imageid" value="'.$imageid.'"><input type="submit" class="mainoption" value="'.$lang['sprites_editimage'].'"><br /><br /></span></th>
				</form>
			</span></td></tr>
		';
	}
}
//
// [END] Edit image
//

//
// [START] Do Edit Image
//
if($action == "doeditimage")
{
	if(($name == "") OR ($layer == "") OR ($image == "") OR ($imageid == ""))
	{
		$useaction = '
				<tr><td class="row1" align="center"><span class="gen"><form action="" method="post">
					<br />
					<b>'.$lang['error'].':</b><br />'.$lang['didnt_fill_all_fields'].'<br />
					<br />
					<input type="hidden" name="action" value="addlayer"><input type="submit" class="mainoption" value="'.$lang['go_back'].'">
				</form></span></td></tr>
		';
	}
	else
	{
	// Edit image!
	$sql = "UPDATE ".$table_prefix."quest_sprite_images SET name = '".$name."', layer = '".$layer."', dontshowlayer= '".$dontshowlayer."', itemneeded = '".$itemneeded."', image = '".$image."' WHERE id = '".$imageid."' ";
	if ( !($result = $db->sql_query($sql)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }

	$useaction = '
			<tr><td class="row1" align="center"><span class="gen"><form action="" method="post">
				<br />
				<b>'.$lang['sprites_editimage_succesful'].'</b><br />
				<br />
				<input type="hidden" name="action" value="images">
				<input type="submit" class="mainoption" value="'.$lang['go_back'].'">
			</form></span></td></tr>
	';
	}
}
//
// [END] Do Edit Image
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