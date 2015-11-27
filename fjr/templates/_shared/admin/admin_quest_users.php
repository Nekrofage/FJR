<?php
/***************************************************************************
 *                              admin_quest_users.php
 *                            -------------------
 *   Version            : 1.0.0
 *   began              : Saturday, May 1st, 2004
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
	$module['Quest MOD']['User_Admin'] = $file;
	return;
}

//
// [START] General Variables
//
$file = "";
$title = "Quest MOD - User Admin";

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
include($phpbb_root_path . 'language/lang_' . $board_config['default_lang'] . '/lang_quest_settings_admin.php');
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
// [START] Main page
//
if ($action == "")
{
$useaction = '<tr><td class="row1" align="center">
	<br />
	<table width="80%" cellpadding=0 cellspacing=0>
		<tr>
			<th width="100%" class="catHead">'.$lang['user_admin'].'</th>
		</tr>
		<tr>
			<td width="100%" class="row2" align="center"><span class="gen">'.$lang['users_explain'].'</span></th>
		</tr>
		<form action="'.$file.'" method="post">
		<tr>
			<td width="100%" valign="middle" class="row2" align="center"><span class="gen"><br /><input type="hidden" name="action" value="user"><input type="submit" class="mainoption" value="'.$lang['users_set_single'].'"></span></th>
		</tr>
		</form>
		<form action="'.$file.'" method="post">
		<tr>
			<td width="100%" valign="middle" class="row2" align="center"><span class="gen"><br /><input type="hidden" name="action" value="allusers"><input type="submit" class="mainoption" value="'.$lang['users_set_all'].'"><br /><br /></span></th>
		</tr>
		</form>

	</table>
	<br />
	</td></tr>
	';
}
//
// [END] Main page
//

//
// [START] Move all users
//
if ($action == "allusers")
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
				<b>'.$lang['users_set_all'].'</b><br />
				<br />
				<table width="60%"><form action="'.$file.'" method="post">
				<tr>
					<td class="row2" align="left"><span class="gen"><b>'.$lang['map_name'].'</b></span></td>
					<td class="row2" align="left"><span class="gen"><select name="user_map">'.$mlist.'</select></span></td>
				</tr>
				<tr>
					<td class="row2" align="left"><span class="gen"><b>'.$lang['coordinates_hv'].'</b></span></td>
					<td class="row2" align="left"><span class="gen"><input type="text" name="user_map_x" class="post" value="1" type="numeric" size="2" maxlength="2"> x <input type="text" name="user_map_y" class="post" value="1" type="numeric" size="2" maxlength="2"></span></td>
				</tr>
				<tr>
					<td class="row2" align="center" colspan=2><span class="gen"><input type="hidden" name="action" value="doall"><input class="mainoption" type="submit" value="'.$lang['users_do_all'].'"></span></td>
				</tr>
				</form></table>
				<br />
			</span></td></tr>
			';
}
//
// [END] Move all users
//

//
// [START] Do move all users
//
if ($action == "doall")
{
	if(($user_map == "") OR ($user_map_x == "") OR ($user_map_y == ""))
	{ 
		$useaction = '
				<tr><td class="row1" align="center"><span class="gen"><form action="'.$file.'" method="post">
					<br />
					<b>'.$lang['error'].':</b><br />'.$lang['didnt_fill_all_fields'].'<br />
					<br />
					<input type="hidden" name="action" value="allusers"><input type="submit" class="mainoption" value="'.$lang['go_back'].'">
				</form></span></td></tr>
		';
	}
	else
	{
	// Update all users' position
	$Msql = "UPDATE ". USERS_TABLE ." set user_map = '".$user_map."', user_map_x = '".$user_map_x."', user_map_y = '".$user_map_y."' ";
	if ( !($Mresult = $db->sql_query($Msql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }

	$useaction = 	'
			<tr><td class="row1" align="center"><form action="'.$file.'" method="post"><span class="gen">
				<br />
				<b>'.$lang['users_all_move_succesful'].'</b><br />
				<br />
				<input type="hidden" name="action" value=""><input class="mainoption" type="submit" value="'.$lang['go_back'].'">
				<br />
			</span></form></td></tr>
			';
	}
}
//
// [END] Do move all users
//

//
// [START] Move single user
//
if ($action == "user")
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
				<b>'.$lang['users_set_single'].'</b><br />
				<br />
				<table width="60%"><form action="'.$file.'" method="post">
				<tr>
					<td class="row2" align="left"><span class="gen"><b>'.$lang['users_username'].'</b></span><br /><span class="gensmall">'.$lang['users_username_explain'].'</span></td>
					<td class="row2" align="left"><span class="gen"><input type="text" value="" name="username"></span></td>
				</tr>
				<tr>
					<td class="row2" align="left"><span class="gen"><b>'.$lang['map_name'].'</b></span></td>
					<td class="row2" align="left"><span class="gen"><select name="user_map">'.$mlist.'</select></span></td>
				</tr>
				<tr>
					<td class="row2" align="left"><span class="gen"><b>'.$lang['coordinates_hv'].'</b></span></td>
					<td class="row2" align="left"><span class="gen"><input type="text" name="user_map_x" class="post" value="1" type="numeric" size="2" maxlength="2"> x <input type="text" name="user_map_y" class="post" value="1" type="numeric" size="2" maxlength="2"></span></td>
				</tr>
				<tr>
					<td class="row2" align="center" colspan=2><span class="gen"><input type="hidden" name="action" value="dosingle"><input class="mainoption" type="submit" value="'.$lang['users_do_move'].'"></span></td>
				</tr>
				</form></table>
				<br />
			</span></td></tr>
			';
}
//
// [END] Move single user
//

// 
// [START] Do move single user 
// 
if ($action == "dosingle") 
{ 
   if(($username =="") OR ($user_map == "") OR ($user_map_x == "") OR ($user_map_y == "")) 
   { 
      $useaction = ' 
            <tr><td class="row1" align="center"><span class="gen"><form action="'.$file.'" method="post"> 
               <br /> 
               <b>'.$lang['error'].':</b><br />'.$lang['didnt_fill_all_fields'].'<br /> 
               <br /> 
               <input type="hidden" name="action" value="allusers"><input type="submit" class="mainoption" value="'.$lang['go_back'].'"> 
            </form></span></td></tr> 
      '; 
   } 
   else 
   { 
   // Check if user exists! If so, get his/her ID 
   $Msql = "SELECT user_id FROM ". USERS_TABLE ." WHERE username = '".$username."' "; 
   if ( !($Mresult = $db->sql_query($Msql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); } 

   if(mysql_num_rows($Mresult) < 1) 
   { 
      $useaction = ' 
            <tr><td class="row1" align="center"><span class="gen"><form action="'.$file.'" method="post"> 
               <br /> 
               <b>'.$lang['error'].':</b><br />'.$lang['users_doesnt_exist'].'<br /> 
               <br /> 
               <input type="hidden" name="action" value="user"><input type="submit" class="mainoption" value="'.$lang['go_back'].'"> 
            </form></span></td></tr> 
      '; 
   } 
   else 
   { 

   $Mrow = mysql_fetch_array($Mresult); 

   // Update single user's position 
   $Msql = "UPDATE ". USERS_TABLE ." set user_map = '".$user_map."', user_map_x = '".$user_map_x."', user_map_y = '".$user_map_y."' WHERE user_id = '".$Mrow['user_id']."' "; 
   if ( !($Mresult = $db->sql_query($Msql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); } 

   $useaction =    ' 
         <tr><td class="row1" align="center"><form action="'.$file.'" method="post"><span class="gen"> 
            <br /> 
            <b>'.$lang['users_move_succesful'].'</b><br /> 
            <br /> 
            <input type="hidden" name="action" value=""><input class="mainoption" type="submit" value="'.$lang['go_back'].'"> 
            <br /> 
         </span></form></td></tr> 
         '; 
   } 
   } 
} 
// 
// [END] Do move single user 
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