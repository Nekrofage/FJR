<?php
/***************************************************************************
 *                     admin_quest_npcs.php
 *                            -------------------
 *   Version            : 1.0.0
 *   began              : Saturday, April 17th, 2004
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
	$module['Quest MOD']['NPC_-_NPCs_Editor'] = $file;
	return;
}

//
// [START] General Variables
//
$file = "";
$title = "Quest MOD - NPCs Editor";
$npc_path = "images/map_npcs";
//
// [END] General Variables
//

//
// Let's set the root dir for phpBB
//
$phpbb_root_path = '../';
require($phpbb_root_path . 'extension.inc');
require('pagestart.' . $phpEx);
include($phpbb_root_path . 'language/lang_' . $board_config['default_lang'] . '/lang_quest_admin.php');
include($phpbb_root_path . 'language/lang_' . $board_config['default_lang'] . '/lang_quest_map.php');
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
// [START] Get list of NPCs
//
if($action == "")
{
	if(!isset($sort))
	{ $sort = "id"; }
	if(!isset($order))
	{ $order = "ASC"; }

	$sql = "SELECT * FROM ".$table_prefix."quest_npcs ORDER BY ".$sort." ".$order;
	if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	
	$list = "";
	
	for( $i = 0; $i < mysql_num_rows($result); $i++ )
	{
		$row = mysql_fetch_array($result);
	
		// Get Map Info
		$Msql = "SELECT map_name FROM ".$table_prefix."quest_maps WHERE id = '".$row['npc_map_id']."' ";
		if ( !($Mresult = $db->sql_query($Msql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
		$Mrow = mysql_fetch_array($Mresult);
	
		$list .= '
			<form action="'.$file.'" method="post"><tr>
			<td class="row2" align="center"><span class="gen"><b>'.$lang['lister'].$row['id'].'</b></span></td>
			<td class="row1" align="center"><span class="gen">'.$row['npc_name'].'</span></td>
			<td class="row1" align="center"><span class="gensmall">'.$row['npc_description'].'</span></td>
			<td class="row1" align="center"><span class="gen">'.$row['npc_action'].'</span></td>
			<td class="row1" align="center"><span class="gensmall"><img src="'.$phpbb_root_path.'images/map_npcs/'.$row['npc_image'].'" border=0></span></td>
			<td class="row1" align="center"><span class="gensmall"><img src="'.$phpbb_root_path.'images/map_npcs/'.$row['npc_portrait'].'" border=0></span></td>
			<td class="row1" align="center"><span class="gen">'.$Mrow['map_name'].'</span></td>
			<td class="row1" align="center"><span class="gen">'.$row['npc_map_x'].' x '.$row['npc_map_y'].'</span></td>
			<td class="row1" align="center"><span class="gen">'.$row['npc_script'].'</span></td>
			<td class="row2" align="center"><span class="gen">
				<input type="hidden" name="action" value="edit">
				<input type="hidden" name="npc" value="'.$row['id'].'">
				<input type="submit" value="'.$lang['edit'].'" class="liteoption">
			</span></td>
			</tr></form>
		';
	}
	
	$useaction = '
			<tr><td class="row1" align="center"><span class="gen">
				<table width="100%">
					<tr>
						<form action="'.$file.'" method="post">
						<td class="row1" align="center" colspan=10><span class="gen"><input type="hidden" name="action" value="new"><input type="submit" class="mainoption" value="'.$lang['add_npc'].'"></b></span></td>
						</form>
					</tr>
					<tr>
						<form action="'.$file.'" method="post">
						<td class="row1" align="right" colspan=10><span class="gen">
							'.$lang['sort_list'].' 
							<select name="sort">
								<option value="id">'.$lang['order_by_npc_id'].'</option>
								<option value="npc_name">'.$lang['order_by_npc_name'].'</option>
							</select>
							<select name="order">
								<option value="ASC">'.$lang['sort_asc'].'</option>
								<option value="DESC">'.$lang['sort_desc'].'</option>
							</select>
							<input type="submit" class="mainoption" value=" '.$lang['go'].' "></b></span></td>
						</form>
					</tr>
					<tr>
						<td class="row2" align="center"><span class="gen"></span></td>
						<td class="row2" align="center"><span class="gen"><b>'.$lang['name'].'</b></span></td>
						<td class="row2" align="center"><span class="gen"><b>'.$lang['description'].'</b></span></td>
						<td class="row2" align="center"><span class="gen"><b>'.$lang['action'].'</b></span></td>
						<td class="row2" align="center"><span class="gen"><b>'.$lang['image'].'</b></span></td>
						<td class="row2" align="center"><span class="gen"><b>'.$lang['portrait'].'</b></span></td>
						<td class="row2" align="center"><span class="gen"><b>'.$lang['map_name'].'</b></span></td>
						<td class="row2" align="center"><span class="gen"><b>'.$lang['coordinates_hv'].'</b></span></td>
						<td class="row2" align="center"><span class="gen"><b>'.$lang['npc_script'].'</b></span></td>
						<td class="row2" align="center"><span class="gen"><b>'.$lang['edit'].'</b></span></td>
					</tr>

					'.$list.'

					<tr>
						<td class="row2" align="center"><span class="gen"></span></td>
						<td class="row2" align="center"><span class="gen"><b>'.$lang['name'].'</b></span></td>
						<td class="row2" align="center"><span class="gen"><b>'.$lang['description'].'</b></span></td>
						<td class="row2" align="center"><span class="gen"><b>'.$lang['action'].'</b></span></td>
						<td class="row2" align="center"><span class="gen"><b>'.$lang['image'].'</b></span></td>
						<td class="row2" align="center"><span class="gen"><b>'.$lang['portrait'].'</b></span></td>
						<td class="row2" align="center"><span class="gen"><b>'.$lang['map_name'].'</b></span></td>
						<td class="row2" align="center"><span class="gen"><b>'.$lang['coordinates_hv'].'</b></span></td>
						<td class="row2" align="center"><span class="gen"><b>'.$lang['npc_script'].'</b></span></td>
						<td class="row2" align="center"><span class="gen"><b>'.$lang['edit'].'</b></span></td>
					</tr>
					<tr>
						<form action="'.$file.'" method="post">
						<td class="row1" align="center" colspan=10><span class="gen"><input type="hidden" name="action" value="new"><input type="submit" class="mainoption" value="'.$lang['add_npc'].'"></b></span></td>
						</form>
					</tr>
				</table>
			</span></td></tr>
		';
}
//
// [END] Get list of NPCs
//

//
// [START] Edit a NPC
//
if($action == "edit")
{
	if(!isset($npc))
	{ message_die(GENERAL_MESSAGE, "<b>".$lang['error'].":</b>".$lang['no_npc_id_specified']); }

	// Get NPC info
	$sql = "SELECT * FROM ".$table_prefix."quest_npcs WHERE id = '".$npc."' ";
	if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	$row = mysql_fetch_array($result);

	//
	// [START] Get list of NPC IMAGES
	//
	$dir = @opendir($phpbb_root_path . $npc_path);
	
	$firstnpc = '';
	
	if (isset($tile))
	{ $firsttile = $tile; }
	
	while($file = @readdir($dir))
	{
		if( !@is_dir(phpbb_realpath($phpbb_root_path . $npc_path . '/' . $file)) )
		{
			$img_size = @getimagesize($phpbb_root_path . $npc_path . '/' . $file);
	
			if( $img_size[0] && $img_size[1] )
			{
				$npc_images[] = $file;
			}
		}
	}
	
	@closedir($dir);
	
	sort($npc_images);
	$npc_list = "";
	
	for( $i = 0; $i < count($npc_images); $i++ )
	{
		if ($firstnpc == '')
		{ $firstnpc = $npc_images[$i]; }
		$npc_list .= '<option value="' . $npc_images[$i] . '">' . $npc_images[$i] . '</option>';
	}
	//
	// [END] Get list of NPC IMAGES
	//

	$npc_image_list = '<option value="' . $row['npc_image'] . '">' . $row['npc_image'] . '</option>'.$npc_list;
	$npc_portrait_list = '<option value="' . $row['npc_portrait'] . '">' . $row['npc_portrait'] . '</option>'.$npc_list;

	// Make list with all map names!
	$Msql = "SELECT id,map_name FROM ".$table_prefix."quest_maps WHERE id != '".$row['npc_map_id']."' ";
	if ( !($Mresult = $db->sql_query($Msql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }

	for($m=0; $m < mysql_num_rows($Mresult); $m++)
	{
		$Mrow = mysql_fetch_array($Mresult);
		$mlist .= '<option value="'.$Mrow['id'].'">'.$Mrow['map_name'].'</option>';
	}

	// Get current map name + id
	$Zsql = "SELECT id,map_name FROM ".$table_prefix."quest_maps WHERE id = '".$row['npc_map_id']."' ";
	if ( !($Zresult = $db->sql_query($Zsql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	$Zrow = mysql_fetch_array($Zresult);
	$currentmap = '<option value="'.$Zrow['id'].'">'.$Zrow['map_name'].'</option>';

	$useaction = 	'
			<tr><td class="row1" align="center"><span class="gen">
				<br />
				<b>'.$lang['edit_npc'].'</b><br />
				<br />
				<table width="80%">
				<form action="'.$file.'" method="post">
				<tr>
					<td class="row2" align="left"><span class="gen"><b>'.$lang['name'].'</b></span></td>
					<td class="row2" align="left"><span class="gen"><input type="text" name="npc_name" value="'.$row['npc_name'].'"></span></td>
				</tr>
				<tr>
					<td class="row2" align="left"><span class="gen"><b>'.$lang['description'].'</b></span></td>
					<td class="row2" align="left"><span class="gen"><textarea rows=5 cols=60 name="npc_description">'.$row['npc_description'].'</textarea></span></td>
				</tr>
				<tr>
					<td class="row2" align="left"><span class="gen"><b>'.$lang['map_name'].'</b></span></td>
					<td class="row2" align="left"><span class="gen"><select name="npc_map_id">'.$currentmap.$mlist.'</select></span></td>
				</tr>
				<tr>
					<td class="row2" align="left"><span class="gen"><b>'.$lang['coordinates_hv'].'</b></span></td>
					<td class="row2" align="left"><span class="gen"><input type="text" name="npc_map_x" class="post" value="'.$row['npc_map_x'].'" type="numeric" size="2" maxlength="2"> x <input type="text" name="npc_map_y" class="post" value="'.$row['npc_map_y'].'" type="numeric" size="2" maxlength="2"></span></td>
				</tr>
				<tr>
					<td class="row2" align="left"><span class="gen"><b>'.$lang['action'].'</b></span></td>
					<td class="row2" align="left"><span class="gen">
						'.$lang['use_from_list'].' 
						<select name="npc_action_list">
							<option value="'.$lang['speak_to'].'">'.$lang['speak_to'].'</option>
							<option value="'.$lang['read'].'">'.$lang['read'].'</option>
							<option value="'.$lang['pick_up'].'">'.$lang['pick_up'].'</option>
							<option value="'.$lang['look_at'].'">'.$lang['look_at'].'</option>
						</select>
						<br />'.$lang['or_type_custom'].' <input type="text" name="npc_action_custom" value="'.$row['npc_action'].'">
					</span></td>
				</tr>
				<tr>
					<td class="row2" align="left"><span class="gen"><b>'.$lang['image'].'</b></span></td>
					<td class="row2" align="left" valign="middle"><span class="gen"><select name="npc_image" onChange="document.images[\'image\'].src=\''.$phpbb_root_path.$npc_path.'/\'+ this.value;" >'.$npc_image_list.'</select> <img src="'.$phpbb_root_path.$npc_path.'/'.$row['npc_image'].'" name="image"></span></td>
				</tr>
				<tr>
					<td class="row2" align="left"><span class="gen"><b>'.$lang['portrait'].'</b></span></td>
					<td class="row2" align="left" valign="middle"><span class="gen"><select name="npc_portrait" onChange="document.images[\'portrait\'].src=\''.$phpbb_root_path.$npc_path.'/\'+ this.value;" >'.$npc_portrait_list.'</select> <img src="'.$phpbb_root_path.$npc_path.'/'.$row['npc_portrait'].'" name="portrait"></span></td>
				</tr>
				<tr>
					<td class="row2" align="left"><span class="gen"><b>'.$lang['npc_script'].'</b></span><br /><span class="gensmall">'.$lang['npc_script_explain'].'</span></td>
					<td class="row2" align="left"><span class="gen"><input type="text" name="npc_script" class="post" value="'.$row['npc_script'].'" type="numeric" size="4"></span></td>
				</tr>
				<tr>
					<td class="row2" align="center" colspan=2><span class="gen"><input type="hidden" name="action" value="doedit"><input type="hidden" name="npc" value="'.$row['id'].'"><input class="mainoption" type="submit" value="'.$lang['edit'].'"></span></td>
				</tr>
				</form>
				<form action="'.$file.'" method="post">
				<tr>
					<td class="row2" align="center" colspan=2><span class="gen"><input type="hidden" name="action" value="delete"><input type="hidden" name="npc" value="'.$row['id'].'"><input class="mainoption" type="submit" value="'.$lang['delete'].'"></span></td>
				</tr>
				</form></table>
				<br />
			</span></td></tr>
			';
}
//
// [END] Edit a NPC
//

//
// [START] Do edits!
//
if($action == "doedit")
{
	if(!isset($npc))
	{ message_die(GENERAL_MESSAGE, "<b>".$lang['error'].":</b>".$lang['no_teleport_id_specified']); }

	if(($npc_map_id == "") OR ($npc_map_x == "") OR ($npc_map_y == "") OR ($npc_script == "") OR ($npc_name == "") OR ($npc_description == "") OR (($npc_action_list == "") && ($npc_action_custom == "")) OR ($npc_image == "") OR ($npc_portrait == ""))
	{ 
		$useaction = '
				<tr><td class="row1" align="center"><span class="gen"><form action="'.$file.'" method="post">
					<br />
					<b>'.$lang['error'].':</b><br />'.$lang['didnt_fill_all_fields'].'<br />
					<br />
					<input type="hidden" name="action" value="edit"><input type="hidden" name="npc" value="'.$npc.'"><input type="submit" class="mainoption" value="'.$lang['go_back'].'">
				</form></span></td></tr>
		';
	}
	else
	{

	// Check if user typed a custom action. If so, use it. If not, use the action selected in the list.
	if($npc_action_custom != "")
	{ $npc_action = $npc_action_custom; }
	else
	{ $npc_action = $npc_action_list; }

	// Insert new data!
	$sql = "UPDATE ".$table_prefix."quest_npcs SET 
		npc_name = '".$npc_name."',
		npc_description = '".$npc_description."',
		npc_action = '".$npc_action."',
		npc_portrait = '".$npc_portrait."',
		npc_image = '".$npc_image."',
		npc_map_id = '".$npc_map_id."',
		npc_map_x = '".$npc_map_x."',
		npc_map_y = '".$npc_map_y."',
		npc_script = '".$npc_script."'
		WHERE id = '".$npc."' ";
	if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }

	$useaction = '
			<tr><td class="row1" align="center"><span class="gen"><form action="'.$file.'" method="post">
				<br />
				<b>'.$lang['edit_npc_succesful'].'</b><br />
				<br />
				<input type="submit" class="mainoption" value="'.$lang['go_back'].'">
			</form></span></td></tr>
	';
	}
}
//
// [END] Do edits!
//

//
// [START] Delete
//
if($action == "delete")
{
	if(!isset($npc))
	{ message_die(GENERAL_MESSAGE, "<b>".$lang['error'].":</b>".$lang['no_npc_id_specified']); }

	// Insert new data!
	$sql = "DELETE FROM ".$table_prefix."quest_npcs WHERE id = '".$npc."' ";
	if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }

	$useaction = '
			<tr><td class="row1" align="center"><span class="gen"><form action="'.$file.'" method="post">
				<br />
				<b>'.$lang['delete_npc_succesful'].'</b><br />
				<br />
				<input type="submit" class="mainoption" value="'.$lang['go_back'].'">
			</form></span></td></tr>
	';
}
//
// [END] Delete
//

//
// [START] Add a NPC
//
if($action == "new")
{

	//
	// [START] Get list of NPC IMAGES
	//
	$dir = @opendir($phpbb_root_path . $npc_path);
	
	$firstnpc = '';
	
	if (isset($tile))
	{ $firsttile = $tile; }
	
	while($file = @readdir($dir))
	{
		if( !@is_dir(phpbb_realpath($phpbb_root_path . $npc_path . '/' . $file)) )
		{
			$img_size = @getimagesize($phpbb_root_path . $npc_path . '/' . $file);
	
			if( $img_size[0] && $img_size[1] )
			{
				$npc_images[] = $file;
			}
		}
	}
	
	@closedir($dir);
	
	sort($npc_images);
	$npc_list = "";
	
	for( $i = 0; $i < count($npc_images); $i++ )
	{
		if ($firstnpc == '')
		{ $firstnpc = $npc_images[$i]; }
		$npc_list .= '<option value="' . $npc_images[$i] . '">' . $npc_images[$i] . '</option>';
	}
	//
	// [END] Get list of NPC IMAGES
	//

	// Make list with all map names!
	$Msql = "SELECT id,map_name FROM ".$table_prefix."quest_maps";
	if ( !($Mresult = $db->sql_query($Msql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }

	for($m=0; $m < mysql_num_rows($Mresult); $m++)
	{
		$Mrow = mysql_fetch_array($Mresult);
		$mlist .= '<option value="'.$Mrow['id'].'">'.$Mrow['map_name'].'</option>';
	}

	$useaction = 	'
			<tr><td class="row1" align="center"><span class="gen">
				<br />
				<b>'.$lang['add_npc'].'</b><br />
				<br />
				<table width="80%"><form action="'.$file.'" method="post">
				<tr>
					<td class="row2" align="left"><span class="gen"><b>'.$lang['name'].'</b></span></td>
					<td class="row2" align="left"><span class="gen"><input type="text" name="npc_name" value=""></span></td>
				</tr>
				<tr>
					<td class="row2" align="left"><span class="gen"><b>'.$lang['description'].'</b></span></td>
					<td class="row2" align="left"><span class="gen"><textarea rows=5 cols=60 name="npc_description"></textarea></span></td>
				</tr>
				<tr>
					<td class="row2" align="left"><span class="gen"><b>'.$lang['map_name'].'</b></span></td>
					<td class="row2" align="left"><span class="gen"><select name="npc_map_id">'.$mlist.'</select></span></td>
				</tr>
				<tr>
					<td class="row2" align="left"><span class="gen"><b>'.$lang['coordinates_hv'].'</b></span></td>
					<td class="row2" align="left"><span class="gen"><input type="text" name="npc_map_x" class="post" value="1" type="numeric" size="2" maxlength="2"> x <input type="text" name="npc_map_y" class="post" value="1" type="numeric" size="2" maxlength="2"></span></td>
				</tr>
				<tr>
					<td class="row2" align="left"><span class="gen"><b>'.$lang['action'].'</b></span></td>
					<td class="row2" align="left"><span class="gen">
						'.$lang['use_from_list'].' 
						<select name="npc_action_list">
							<option value="'.$lang['speak_to'].'">'.$lang['speak_to'].'</option>
							<option value="'.$lang['read'].'">'.$lang['read'].'</option>
							<option value="'.$lang['pick_up'].'">'.$lang['pick_up'].'</option>
							<option value="'.$lang['look_at'].'">'.$lang['look_at'].'</option>
						</select>
						<br />'.$lang['or_type_custom'].' <input type="text" name="npc_action_custom" value="">
					</span></td>
				</tr>
				<tr>
					<td class="row2" align="left"><span class="gen"><b>'.$lang['image'].'</b></span></td>
					<td class="row2" align="left" valign="middle"><span class="gen"><select name="npc_image" onChange="document.images[\'image\'].src=\''.$phpbb_root_path.$npc_path.'/\'+ this.value;" >'.$npc_list.'</select> <img src="'.$phpbb_root_path.$npc_path.'/'.$firstnpc.'" name="image"></span></td>
				</tr>
				<tr>
					<td class="row2" align="left"><span class="gen"><b>'.$lang['portrait'].'</b></span></td>
					<td class="row2" align="left" valign="middle"><span class="gen"><select name="npc_portrait" onChange="document.images[\'portrait\'].src=\''.$phpbb_root_path.$npc_path.'/\'+ this.value;" >'.$npc_list.'</select> <img src="'.$phpbb_root_path.$npc_path.'/'.$firstnpc.'" name="portrait"></span></td>
				</tr>
				<tr>
					<td class="row2" align="left"><span class="gen"><b>'.$lang['npc_script'].'</b></span><br /><span class="gensmall">'.$lang['npc_script_explain'].'</span></td>
					<td class="row2" align="left"><span class="gen"><input type="text" name="npc_script" class="post" value="" type="numeric" size="4"></span></td>
				</tr>
				<tr>
					<td class="row2" align="center" colspan=2><span class="gen"><input type="hidden" name="action" value="createnew"><input class="mainoption" type="submit" value="'.$lang['add_npc_button'].'"></span></td>
				</tr>
				</form></table>
				<br />
			</span></td></tr>
			';
}
//
// [END] Add a NPC
//

// [START] Do Add!
//
if($action == "createnew")
{
	if(($npc_map_id == "") OR ($npc_map_x == "") OR ($npc_map_y == "") OR ($npc_script == "") OR ($npc_name == "") OR ($npc_description == "") OR (($npc_action_list == "") && ($npc_action_custom == "")) OR ($npc_image == "") OR ($npc_portrait == ""))
	{ 
		$useaction = '
				<tr><td class="row1" align="center"><span class="gen"><form action="'.$file.'" method="post">
					<br />
					<b>'.$lang['error'].':</b><br />'.$lang['didnt_fill_all_fields'].'<br />
					<br />
					<input type="hidden" name="action" value="new"><input type="submit" class="mainoption" value="'.$lang['go_back'].'">
				</form></span></td></tr>
		';
	}
	else
	{

	// Check if user typed a custom action. If so, use it. If not, use the action selected in the list.
	if($npc_action_custom != "")
	{ $npc_action = $npc_action_custom; }
	else
	{ $npc_action = $npc_action_list; }

	// Insert new data!
	$sql = "INSERT INTO ".$table_prefix."quest_npcs (npc_name,npc_description,npc_action,npc_portrait,npc_image,npc_map_id,npc_map_x,npc_map_y,npc_script) 
		VALUES ('".$npc_name."','".$npc_description."','".$npc_action."','".$npc_portrait."','".$npc_image."','".$npc_map_id."','".$npc_map_x."','".$npc_map_y."','".$npc_script."') "; 
	if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }

	$useaction = '
			<tr><td class="row1" align="center"><span class="gen"><form action="'.$file.'" method="post">
				<br />
				<b>'.$lang['add_npc_succesful'].'</b><br />
				<br />
				<input type="submit" class="mainoption" value="'.$lang['go_back'].'">
			</form></span></td></tr>
	';
	}
}
//
// [END] Do Add!
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