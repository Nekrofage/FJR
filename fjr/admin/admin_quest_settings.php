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
	$module['Quest MOD']['General_Settings'] = $file;
	return;
}

//
// [START] General Variables
//
$file = "";
$title = "Quest MOD - General Settings";

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
// [START] Get settings
//
if ($action != "change")
{

$list = '';

$sql2 = "SELECT * FROM ".$table_prefix."quest_settings WHERE config_value = '' AND config_type = 'header' ORDER BY config_name ASC";
if ( !($result2 = $db->sql_query($sql2)) )
{ message_die(GENERAL_MESSAGE, "<b>Fatal Error:</b><br />".mysql_error()); }

for($y = 0; $y < mysql_num_rows($result2); $y++)
{
	$row2 = mysql_fetch_array($result2); 
	$list .= '
		<tr>
			<th colspan=2 width="100%" class="catHead">'.$lang['settings_title_'.$row2['config_name']].'</th>
		</tr>
		';
	
	$sql = "SELECT * FROM ".$table_prefix."quest_settings WHERE config_type = '".$row2['config_name']."' AND config_type != 'header' ORDER BY config_name";
	if ( !($result = $db->sql_query($sql)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error:</b><br />".mysql_error()); }
	
	for($x = 0; $x < mysql_num_rows($result); $x++)
	{
		$row = mysql_fetch_array($result); 

		if($row['config_isradio'] != 1)
		{
			$list .= '
			<tr>
				<td width="40%" class="row2"><span class="gen">'.$lang['settings_'.$row['config_name']].'</span></td>
				<td width="60%" class="row2"><span class="gen"><input type="text" value="'.$row['config_value'].'" size=32 name="'.$row['config_name'].'"></span></td>
			</tr>
			';
		}
		else
		{
			$radio = explode(",", $row['config_radio_choices']); 
			$radio_count = count($radio); 

			$radioboxes = '';

			for ($xradio = 0; $xradio < $radio_count; $xradio++) 
			{ 
				$radio_text = $lang['settings_'.$row['config_name'].'_'.$radio[$xradio]];
				$radio_value = $radio[$xradio];

				if($radio[$xradio] == $row['config_value'])
				{ $checked = 'CHECKED'; }
				else
				{ $checked = ''; }

				$radioboxes .= '<input type="radio" value="'.$radio_value.'" '.$checked.' name="'.$row['config_name'].'"> '.$radio_text.'&nbsp;&nbsp;&nbsp;&nbsp;';
			}

			$list .= '
			<tr>
				<td width="40%" class="row2"><span class="gen">'.$lang['settings_'.$row['config_name']].'</span></td>
				<td width="60%" class="row2" align="center"><span class="gen">'.$radioboxes.'</span></td>
			</tr>
			';
		}
	}
}

$useaction = '<tr><td class="row1" align="center">
	<br />
	<table width="80%">
	<form action="'.$file.'" method="post">
		'.$list.'
		<tr>
			<th colspan=2 width="100%" class="catHead">'.$lang['submit_changes'].'</th>
		</tr>
		<tr>
			<td colspan=2 width="100%" class="row2" align="center"><span class="gen"><input type="hidden" name="action" value="change"><input type="submit" class="mainoption" value="'.$lang['change'].'"></span></th>
		</tr>
	</form>
	</table>
	<br />
	</td></tr>
	';
}
//
// [END] Get settings
//

//
// [START] Save settings
//
if ($action == "change")
{

	// Do SQL updates!
	//
	//	NEED TO MAKE THIS AUTOMATED!
	//		Don't want to update this everytime I add a config value to the table!
	//		Have to make some sort of automated system ......
	//
	$sql = "UPDATE ".$table_prefix."quest_settings SET config_value = '".$session_time."' WHERE config_name = 'session_time' ";
		if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error:</b><br />".mysql_error()); }
	$sql = "UPDATE ".$table_prefix."quest_settings SET config_value = '".$tile_dimension."' WHERE config_name = 'tile_dimension' ";
		if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error:</b><br />".mysql_error()); }
	$sql = "UPDATE ".$table_prefix."quest_settings SET config_value = '".$mod_title."' WHERE config_name = 'mod_title' ";
		if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error:</b><br />".mysql_error()); }
	$sql = "UPDATE ".$table_prefix."quest_settings SET config_value = '".$default_tile."' WHERE config_name = 'default_tile' ";
		if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error:</b><br />".mysql_error()); }
	$sql = "UPDATE ".$table_prefix."quest_settings SET config_value = '".$script_length."' WHERE config_name = 'script_length' ";
		if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error:</b><br />".mysql_error()); }
	$sql = "UPDATE ".$table_prefix."quest_settings SET config_value = '".$default_map_height."' WHERE config_name = 'default_map_height' ";
		if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error:</b><br />".mysql_error()); }
	$sql = "UPDATE ".$table_prefix."quest_settings SET config_value = '".$default_map_width."' WHERE config_name = 'default_map_width' ";
		if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error:</b><br />".mysql_error()); }
	$sql = "UPDATE ".$table_prefix."quest_settings SET config_value = '".$grid."' WHERE config_name = 'grid' ";
		if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error:</b><br />".mysql_error()); }
	$sql = "UPDATE ".$table_prefix."quest_settings SET config_value = '".$default_map."' WHERE config_name = 'default_map' ";
		if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error:</b><br />".mysql_error()); }
	$sql = "UPDATE ".$table_prefix."quest_settings SET config_value = '".$default_map_x."' WHERE config_name = 'default_map_x' ";
		if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error:</b><br />".mysql_error()); }
	$sql = "UPDATE ".$table_prefix."quest_settings SET config_value = '".$default_map_y."' WHERE config_name = 'default_map_y' ";
		if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error:</b><br />".mysql_error()); }

	$sql = "ALTER TABLE ". USERS_TABLE ." CHANGE user_map user_map INT NOT NULL DEFAULT '".$default_map."' ";
		if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error:</b><br />".mysql_error()); }
	$sql = "ALTER TABLE ". USERS_TABLE ." CHANGE user_map_x user_map_x INT NOT NULL DEFAULT '".$default_map_x."' ";
		if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error:</b><br />".mysql_error()); }
	$sql = "ALTER TABLE ". USERS_TABLE ." CHANGE user_map_y user_map_y INT NOT NULL DEFAULT '".$default_map_y."' ";
		if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error:</b><br />".mysql_error()); }

	// Added in v2.2.0
	$sql = "UPDATE ".$table_prefix."quest_settings SET config_value = '".$exportmaps."' WHERE config_name = 'exportmaps' ";
		if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error:</b><br />".mysql_error()); }
	$sql = "UPDATE ".$table_prefix."quest_settings SET config_value = '".$imagetype."' WHERE config_name = 'imagetype' ";
		if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error:</b><br />".mysql_error()); }

	// Added in v2.4.0
	$sql = "UPDATE ".$table_prefix."quest_settings SET config_value = '".$chat_show."' WHERE config_name = 'chat_show' ";
		if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error:</b><br />".mysql_error()); }
	$sql = "UPDATE ".$table_prefix."quest_settings SET config_value = '".$chat_away."' WHERE config_name = 'chat_away' ";
		if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error:</b><br />".mysql_error()); }
	$sql = "UPDATE ".$table_prefix."quest_settings SET config_value = '".$chat_offline."' WHERE config_name = 'chat_offline' ";
		if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error:</b><br />".mysql_error()); }
	$sql = "UPDATE ".$table_prefix."quest_settings SET config_value = '".$chat_refresh."' WHERE config_name = 'chat_refresh' ";
		if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error:</b><br />".mysql_error()); }
	$sql = "UPDATE ".$table_prefix."quest_settings SET config_value = '".$chat_refreshlist."' WHERE config_name = 'chat_refreshlist' ";
		if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error:</b><br />".mysql_error()); }

$useaction = '<tr><td class="row1" align="center"><span class="gen"><form action="'.$file.'" method="post">
	<br />
	<b>'.$lang['settings_saved_succesfully'].'</b><br />
	<br />
	<input type="submit" value="'.$lang['go_back'].'" class="mainoption">
	<br />
	</form></span></td></tr>
	';

}
//
// [END] Save settings
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