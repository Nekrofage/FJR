<?php
/***************************************************************************
 *                     admin_quest_teleports.php
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
	$module['Quest MOD']['Map_-_Teleport_Editor'] = $file;
	return;
}

//
// [START] General Variables
//
$file = "";
$title = "Quest MOD - Teleport Editor";
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
// [START] Get list of TELEPORTS
//
if($action == "")
{
	if(!isset($sort))
	{ $sort = "id"; }
	if(!isset($order))
	{ $order = "ASC"; }

	$sql = "SELECT * FROM ".$table_prefix."quest_teleports ORDER BY ".$sort." ".$order;
	if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	
	$list = "";
	
	for( $i = 0; $i < mysql_num_rows($result); $i++ )
	{
		$row = mysql_fetch_array($result);
	
		// Get FROM Map Info
		$Fsql = "SELECT * FROM ".$table_prefix."quest_maps WHERE id = '".$row['from_id']."' ";
		if ( !($Fresult = $db->sql_query($Fsql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
			$Frow = mysql_fetch_array($Fresult);
	
		// Get TARGET Map Info
			$Tsql = "SELECT * FROM ".$table_prefix."quest_maps WHERE id = '".$row['target_id']."' ";
		if ( !($Tresult = $db->sql_query($Tsql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
		$Trow = mysql_fetch_array($Tresult);
	
		$list .= '
			<form action="'.$file.'" method="post"><tr>
			<td class="row2" align="center"><span class="gen"><b>'.$lang['lister'].$row['id'].'</b></span></td>
			<td class="row1" align="center"><span class="gen">'.$Frow['map_name'].'</span></td>
			<td class="row1" align="center"><span class="gen">'.$row['from_x'].' x '.$row['from_y'].'</span></td>
			<td class="row2" align="center"><span class="gen">'.$Trow['map_name'].'</span></td>
			<td class="row2" align="center"><span class="gen">'.$row['target_x'].' x '.$row['target_y'].'</span></td>
			<td class="row1" align="center"><span class="gensmall">'.$row['text'].'</span></td>
			<td class="row1" align="center"><span class="gensmall">'.$row['url'].'</span></td>
			<td class="row2" align="center"><span class="gen">
				<input type="hidden" name="action" value="edit">
				<input type="hidden" name="teleport" value="'.$row['id'].'">
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
						<td class="row1" align="center" colspan=8><span class="gen"><input type="hidden" name="action" value="new"><input type="submit" class="mainoption" value="'.$lang['new_teleport'].'"></b></span></td>
						</form>
					</tr>
					<tr>
						<form action="'.$file.'" method="post">
						<td class="row1" align="right" colspan=8><span class="gen">
							'.$lang['sort_list'].' 
							<select name="sort">
								<option value="id">'.$lang['order_by_npc_id'].'</option>
								<option value="from_id">'.$lang['order_by_from_map'].'</option>
								<option value="target_id">'.$lang['order_by_target_map'].'</option>
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
						<td class="row2" align="center"><span class="gen"><b>'.$lang['map_from'].'</b></span></td>
						<td class="row2" align="center"><span class="gen"><b>'.$lang['coordinates_hv'].'</b></span></td>
						<td class="row2" align="center"><span class="gen"><b>'.$lang['map_to'].'</b></span></td>
						<td class="row2" align="center"><span class="gen"><b>'.$lang['coordinates_hv'].'</b></span></td>
						<td class="row2" align="center"><span class="gen"><b>'.$lang['map_text'].'</b></span></td>
						<td class="row2" align="center"><span class="gen"><b>'.$lang['url'].'</b></span></td>
						<td class="row2" align="center"><span class="gen"><b>'.$lang['edit'].'</b></span></td>
					</tr>

					'.$list.'

					<tr>
						<td class="row2" align="center"><span class="gen"></span></td>
						<td class="row2" align="center"><span class="gen"><b>'.$lang['map_from'].'</b></span></td>
						<td class="row2" align="center"><span class="gen"><b>'.$lang['coordinates_hv'].'</b></span></td>
						<td class="row2" align="center"><span class="gen"><b>'.$lang['map_to'].'</b></span></td>
						<td class="row2" align="center"><span class="gen"><b>'.$lang['coordinates_hv'].'</b></span></td>
						<td class="row2" align="center"><span class="gen"><b>'.$lang['map_text'].'</b></span></td>
						<td class="row2" align="center"><span class="gen"><b>'.$lang['url'].'</b></span></td>
						<td class="row2" align="center"><span class="gen"><b>'.$lang['edit'].'</b></span></td>
					</tr>
					<tr>
						<form action="'.$file.'" method="post">
						<td class="row1" align="center" colspan=8><span class="gen"><input type="hidden" name="action" value="new"><input type="submit" class="mainoption" value="'.$lang['new_teleport'].'"></b></span></td>
						</form>
					</tr>
				</table>
			</span></td></tr>
		';
}
//
// [END] Get list of TELEPORTS
//

//
// [START] Edit a Teleport
//
if($action == "edit")
{
	if(!isset($teleport))
	{ message_die(GENERAL_MESSAGE, "<b>".$lang['error'].":</b>".$lang['no_teleport_id_specified']); }

	// Get info of the Teleport we're going to edit!
	$sql = "SELECT * FROM ".$table_prefix."quest_teleports WHERE id = '".$teleport."' ";
	if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	$row = mysql_fetch_array($result);

	// Get FROM Map Info
	$Fsql = "SELECT * FROM ".$table_prefix."quest_maps WHERE id = '".$row['from_id']."' ";
	if ( !($Fresult = $db->sql_query($Fsql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	$Frow = mysql_fetch_array($Fresult);

	// Get TARGET Map Info
	$Tsql = "SELECT * FROM ".$table_prefix."quest_maps WHERE id = '".$row['target_id']."' ";
	if ( !($Tresult = $db->sql_query($Tsql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	$Trow = mysql_fetch_array($Tresult);

	// Make list with all map names!
	$Msql = "SELECT id,map_name FROM ".$table_prefix."quest_maps";
	if ( !($Mresult = $db->sql_query($Msql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }

	for($m=0; $m < mysql_num_rows($Mresult); $m++)
	{
		$Mrow = mysql_fetch_array($Mresult);
		$mlist .= '<option value="'.$Mrow['id'].'">'.$Mrow['map_name'].'</option>';
	}

	$select_from = '<option value="'.$Frow['id'].'">'.$Frow['map_name'].'</option>'.$mlist;
	$select_to = '<option value="'.$Trow['id'].'">'.$Trow['map_name'].'</option>'.$mlist;

	$useaction = 	'
			<tr><td class="row1" align="center"><span class="gen">
				<br />
				<b>'.$lang['edit_teleport'].'</b><br />
				<br />
				<table width="60%">
				<form action="'.$file.'" method="post">
				<tr>
					<td class="row2" align="left"><span class="gen"><b>'.$lang['map_from'].'</b></span></td>
					<td class="row2" align="left"><span class="gen"><select name="from_id">'.$select_from.'</select></span></td>
				</tr>
				<tr>
					<td class="row2" align="left"><span class="gen"><b>'.$lang['coordinates_hv'].'</b></span></td>
					<td class="row2" align="left"><span class="gen"><input type="text" name="from_x" class="post" type="numeric" size="2" maxlength="2" value="'.$row['from_x'].'"> x <input type="text" name="from_y" class="post" type="numeric" size="2" maxlength="2" value="'.$row['from_y'].'"></span></td>
				</tr>
				<tr>
					<td class="row2" align="left"><span class="gen"><b>'.$lang['map_to'].'</b></span></td>
					<td class="row2" align="left"><span class="gen"><select name="target_id">'.$select_to.'</select></span></td>
				</tr>
				<tr>
					<td class="row2" align="left"><span class="gen"><b>'.$lang['coordinates_hv'].'</b></span></td>
					<td class="row2" align="left"><span class="gen"><input type="text" name="target_x" class="post" type="numeric" size="2" maxlength="2" value="'.$row['target_x'].'"> x <input type="text" name="target_y" class="post" type="numeric" size="2" maxlength="2" value="'.$row['target_y'].'"></span></td>
				</tr>
				<tr>
					<td class="row2" align="left" width="60%"><span class="gen"><b>'.$lang['url'].'</b></span><br /><span class="gensmall">'.$lang['url_explain'].'</span></td>
					<td class="row2" align="left"><span class="gen"><input type="text" value="'.$row['url'].'" name="url"></span></td>
				</tr>
				<tr>
					<td class="row2" align="left" width="60%"><span class="gen"><b>'.$lang['map_text'].'</b></span><br /><span class="gensmall">'.$lang['teleport_text_explain'].'</span></td>
					<td class="row2" align="left"><span class="gen"><input type="text" value="'.$row['text'].'" name="text" maxlength="32"></span></td>
				</tr>
				<tr>
					<td class="row2" align="center" colspan=2><span class="gen"><input type="hidden" name="teleport" value="'.$teleport.'"><input type="hidden" name="action" value="doedit"><input class="mainoption" type="submit" value="'.$lang['edit'].'"></span></td>
				</tr>
				</form>
				<form action="'.$file.'" method="post">
				<tr>
				<td class="row2" align="center" colspan=2><span class="gen"><input type="hidden" name="teleport" value="'.$teleport.'"><input type="hidden" name="action" value="delete"><input class="mainoption" type="submit" value="'.$lang['delete'].'"></span></td>
				</tr>
				</form>
				</table>
				<br />
			</span></td></tr>
			';
}
//
// [END] Edit a Teleport
//

//
// [START] Do edits!
//
if($action == "doedit")
{
	if(!isset($teleport))
	{ message_die(GENERAL_MESSAGE, "<b>".$lang['error'].":</b>".$lang['no_teleport_id_specified']); }

	// Insert new data!
	$sql = "UPDATE ".$table_prefix."quest_teleports SET 
		from_id='".$from_id."', 
		from_x='".$from_x."', 
		from_y='".$from_y."', 
		target_id='".$target_id."', 
		target_x='".$target_x."', 
		target_y='".$target_y."', 
		text='".$text."',
		url = '".$url."' 
		WHERE id = '".$teleport."' ";
	if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }

	$useaction = '
			<tr><td class="row1" align="center"><span class="gen"><form action="'.$file.'" method="post">
				<br />
				<b>'.$lang['edit_teleport_succesful'].'</b><br />
				<br />
				<input type="submit" class="mainoption" value="'.$lang['go_back'].'">
			</form></span></td></tr>
	';
}
//
// [END] Do edits!
//

//
// [START] Delete
//
if($action == "delete")
{
	if(!isset($teleport))
	{ message_die(GENERAL_MESSAGE, "<b>".$lang['error'].":</b>".$lang['no_teleport_id_specified']); }

	// Insert new data!
	$sql = "DELETE FROM ".$table_prefix."quest_teleports WHERE id = '".$teleport."' ";
	if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }

	$useaction = '
			<tr><td class="row1" align="center"><span class="gen"><form action="'.$file.'" method="post">
				<br />
				<b>'.$lang['delete_teleport_succesful'].'</b><br />
				<br />
				<input type="submit" class="mainoption" value="'.$lang['go_back'].'">
			</form></span></td></tr>
	';
}
//
// [END] Delete
//

//
// [START] Create a Teleport
//
if($action == "new")
{
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
				<b>'.$lang['create_new_teleport'].'</b><br />
				<br />
				<table width="60%"><form action="'.$file.'" method="post">
				<tr>
					<td class="row2" align="left"><span class="gen"><b>'.$lang['map_from'].'</b></span></td>
					<td class="row2" align="left"><span class="gen"><select name="from_id">'.$mlist.'</select></span></td>
				</tr>
				<tr>
					<td class="row2" align="left"><span class="gen"><b>'.$lang['coordinates_hv'].'</b></span></td>
					<td class="row2" align="left"><span class="gen"><input type="text" name="from_x" class="post" value="1" type="numeric" size="2" maxlength="2"> x <input type="text" name="from_y" class="post" value="1" type="numeric" size="2" maxlength="2"></span></td>
				</tr>
				<tr>
					<td class="row2" align="left"><span class="gen"><b>'.$lang['map_to'].'</b></span></td>
					<td class="row2" align="left"><span class="gen"><select name="target_id">'.$mlist.'</select></span></td>
				</tr>
				<tr>
					<td class="row2" align="left"><span class="gen"><b>'.$lang['coordinates_hv'].'</b></span></td>
					<td class="row2" align="left"><span class="gen"><input type="text" name="target_x" class="post" value="1" type="numeric" size="2" maxlength="2"> x <input type="text" name="target_y" class="post" value="1" type="numeric" size="2" maxlength="2"></span></td>
				</tr>
				<tr>
					<td class="row2" align="left" width="60%"><span class="gen"><b>'.$lang['url'].'</b></span><br /><span class="gensmall">'.$lang['url_explain'].'</span></td>
					<td class="row2" align="left"><span class="gen"><input type="text" value="'.$row['url'].'" name="url"></span></td>
				</tr>
				<tr>
					<td class="row2" align="left" width="60%"><span class="gen"><b>'.$lang['map_text'].'</b></span><br /><span class="gensmall">'.$lang['teleport_text_explain'].'</span></td>
					<td class="row2" align="left"><span class="gen"><input type="text" value="'.$row['text'].'" name="text" maxlength="32"></span></td>
				</tr>
				<tr>
					<td class="row2" align="center" colspan=2><span class="gen"><input type="hidden" name="action" value="createnew"><input class="mainoption" type="submit" value="'.$lang['create_new_teleport_button'].'"></span></td>
				</tr>
				</form></table>
				<br />
			</span></td></tr>
			';
}
//
// [END] Create a Teleport
//

// [START] Do create!
//
if($action == "createnew")
{
	if(($from_id == "") OR ($from_x == "") OR ($from_y == "") OR ($target_id == "") OR ($target_x == "") OR ($target_y == ""))
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
	// Insert new data!
	$sql = "INSERT INTO ".$table_prefix."quest_teleports (from_id,from_x,from_y,target_id,target_x,target_y,text,url) VALUES ('".$from_id."','".$from_x."','".$from_y."','".$target_id."','".$target_x."','".$target_y."','".$text."','".$url."') "; 
	if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }

	$useaction = '
			<tr><td class="row1" align="center"><span class="gen"><form action="'.$file.'" method="post">
				<br />
				<b>'.$lang['create_teleport_succesful'].'</b><br />
				<br />
				<input type="submit" class="mainoption" value="'.$lang['go_back'].'">
			</form></span></td></tr>
	';
	}
}
//
// [END] Do create!
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