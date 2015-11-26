<?php
/***************************************************************************
 *                              qm_chat.php
 *                            -------------------
 *   Version            : 1.0.0
 *   began              : Sunday, May 16th, 2004
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

//
// Let's set the root dir for phpBB
//
define('IN_PHPBB', true);

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

$phpbb_root_path = './';
include($phpbb_root_path . 'extension.inc');
include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/bbcode.'.$phpEx);

// Get language file :)
include($phpbb_root_path . 'language/lang_' . $board_config['default_lang'] . '/lang_quest_map.php');

//
// Get settings! [START]
//
$show_amount = $questmod_config['chat_show'] ;		// Amount of messages to show in chat
$away_time = $questmod_config['chat_away'];		// Seconds before someone is noted as away
$offline_time = $questmod_config['chat_offline'];		// Seconds before someone is noted as offline
$refresh_time = $questmod_config['chat_refresh'];		// Seconds to fresh the chat page
$refresh_time_list = $questmod_config['chat_refreshlist'];	// Seconds to fresh the Who's Online list
//
// Get settings! [END]
//

$userdata = session_pagestart($user_ip, PAGE_INDEX);
init_userprefs($userdata);

//
//check if logged in
//
if( !$userdata['session_logged_in'] )
{
	header('Location: ' . append_sid("login.$phpEx?redirect=qm_chat.php", true));
}
//end check

   $template->set_filenames(array( 
      'body' => 'questmod_body.tpl') 
   );

//
// Start MOD Code
//

//
// [START] General Variables
//

$file = "qm_chat.php";
$misc_path = "images/map_misc";
$chars_path = "images/map_chars";

//
// [END] General Variables
//

//
// [START] Add a message
//
if($action == "add")
{
	// Make sure user isn't posting a blank message!
	if($message != "")
	{

		$timestamp = time();
		$timemsg = create_date($board_config['default_dateformat'], $timestamp, $board_config['board_timezone']);

		if(($userdata['user_level'] == ADMIN) && ($message == "/clear"))
		{
			$sql = "DELETE FROM ".$table_prefix."quest_chat";
			if ( !($result = $db->sql_query($sql)) )
			{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
			$cleared_name = str_replace("%USERNAME%",$userdata['username'],$lang['qm_chat_cleared']);
			$cleared_text = str_replace("%TIME%",$timemsg,$cleared_name);
			$message = '<font color="red">'.$lang['qm_chat_systemmssg'].' '.$cleared_text.'</font>';
		}

		$message = stripslashes($message);
		$message = addslashes($message);

		// To prevent haxxorz!
		if(($userdata['user_level'] != ADMIN) && ($message != "/clear"))
		{
			$message = htmlspecialchars($message, ENT_QUOTES);
		}

		$sql = "INSERT INTO ".$table_prefix."quest_chat (poster,message,timestamp) VALUES ('".$userdata['user_id']."','".$message."','".$timestamp."')";
		if ( !($result = $db->sql_query($sql)) )
		{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	}

	// Change action to 'handlestatus', so we can update the user's status to ONLINE (he posted a message, afterall!)
	$action = "handlestatus";
}
//
// [END] Add a message
//

//
// [START] Handle user's status
//
if($action == "handlestatus")
{
	// Check if user is added to chat_session table yet!
	$sql = "SELECT * FROM ".$table_prefix."quest_chat_session WHERE user = '".$userdata['user_id']."' ";
	if ( !($result = $db->sql_query($sql)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	
	if(mysql_num_rows($result) < 1)
	{
		// User isn't in chat_session table yet! -- Add him!
		$sql = "INSERT INTO ".$table_prefix."quest_chat_session (user,status,time) VALUES ('".$userdata['user_id']."','online','".$timestamp."') ";
		if ( !($result = $db->sql_query($sql)) )
		{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	}
	else
	{
		$row = mysql_fetch_array($result); 

		// User is already in chat_session table! -- Set status to online!
		$sql = "UPDATE ".$table_prefix."quest_chat_session SET status = 'online', time = '".$timestamp."' WHERE user = '".$userdata['user_id']."' ";
		if ( !($result = $db->sql_query($sql)) )
		{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	}
}
//
// [END] Handle user's status
//

//
// [START] Default Chat Window
//
	$sql = "SELECT * FROM ".$table_prefix."quest_chat ORDER BY message_id DESC limit 0,".$show_amount;
	if ( !($result = $db->sql_query($sql)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }

	$place = "left";

	for($x=0;$x<mysql_num_rows($result);$x++)
	{
		$row = mysql_fetch_array($result); 

		$mssg = smilies_pass($row['message']);

		if(file_exists($phpbb_root_path.'images/map_chars/'.$row['poster'].'_3.png'))
		{ $char_img = $phpbb_root_path.'images/map_chars/'.$row['poster'].'_3.png'; }
		else { $char_img = $phpbb_root_path.'images/map_chars/character_3.gif'; }

		$sql2 = "SELECT username FROM ". USERS_TABLE ." WHERE user_id = '".$row['poster']."' ";
		if ( !($result2 = $db->sql_query($sql2)) )
		{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
		$row2 = mysql_fetch_array($result2); 

		if($place == "left")
		{
		$chatlist .= ' 
			<table border="0" cellpadding="0" cellspacing="0" width="100%"> 
			<tr>
			<td valign="top" align="center" width="10%">
				<span class="gensmall"><img src="'.$char_img.'" alt="'.$row2['username'].'" title="'.$row2['username'].'"><br /><b>'.$row2['username'].'</b></span>
			</td>
			<td valign="top" width="90%">
				<table border="0" cellpadding="0" cellspacing="0" width="100%"> 
				  <tr> 
				    <td width="10"><img src="'.$phpbb_root_path.$misc_path.'/bubble1.gif" width="26" height="12"></td> 
				    <td background="'.$phpbb_root_path.$misc_path.'/bubble2.gif"></td> 
				    <td width="10"><img src="'.$phpbb_root_path.$misc_path.'/bubble3.gif" width="26" height="12"></td> 
				  </tr> 
				  <tr> 
				    <td background="'.$phpbb_root_path.$misc_path.'/bubble5.gif" valign="top"><img src="'.$phpbb_root_path.$misc_path.'/bubble4.gif" width="26" height="20"></td> 
				    <td valign="top" bgcolor="#FFFFFF"><span class="postbody"><font size="2">
				     	'.$mssg.'
				     </font></span></td> 
				    <td background="'.$phpbb_root_path.$misc_path.'/bubble6.gif" valign="top"></td> 
				  </tr> 
				  <tr> 
				    <td><img src="'.$phpbb_root_path.$misc_path.'/bubble7.gif" width="26" height="12"></td> 
				    <td background="'.$phpbb_root_path.$misc_path.'/bubble8.gif"></td> 
				    <td><img src="'.$phpbb_root_path.$misc_path.'/bubble9.gif" width="26" height="12"></td> 
				  </tr> 
				</table>
			</td>
			</tr> 
			</table>
		';
		$place = "right";

		// We only want characters to the LEFT atm...
		// Comment out the following line to have LEFT & RIGHT messages (put // before it)
		$place = "left";
		// Comment out the line above to have LEFT & RIGHT messages!
		}
		else
		{
		$chatlist .= ' 
			<table border="0" cellpadding="0" cellspacing="0" width="100%"> 
			<tr>
			<td valign="top" width="90%">
				<table border="0" cellpadding="0" cellspacing="0" width="100%"> 
				  <tr> 
				    <td width="10"><img src="'.$phpbb_root_path.$misc_path.'/bubble1.gif" width="26" height="12"></td> 
				    <td background="'.$phpbb_root_path.$misc_path.'/bubble2.gif"></td> 
				    <td width="10"><img src="'.$phpbb_root_path.$misc_path.'/bubble3.gif" width="26" height="12"></td> 
				  </tr> 
				  <tr> 
				    <td background="'.$phpbb_root_path.$misc_path.'/bubble5.gif" valign="top"></td> 
				    <td valign="top" bgcolor="#FFFFFF"><span class="postbody">
				     	'.$mssg.'
				     </span></td> 
				    <td background="'.$phpbb_root_path.$misc_path.'/bubble6.gif" valign="top"><img src="'.$phpbb_root_path.$misc_path.'/bubble10.gif" width="26" height="20"></td> 
				  </tr> 
				  <tr> 
				    <td><img src="'.$phpbb_root_path.$misc_path.'/bubble7.gif" width="26" height="12"></td> 
				    <td background="'.$phpbb_root_path.$misc_path.'/bubble8.gif"></td> 
				    <td><img src="'.$phpbb_root_path.$misc_path.'/bubble9.gif" width="26" height="12"></td> 
				  </tr> 
				</table>
			</td>
			<td valign="top" align="center" width="10%">
				<span class="gensmall"><img src="'.$char_img.'" alt="'.$row2['username'].'" title="'.$row2['username'].'"><br /><b>'.$row2['username'].'</b></span>
			</td>
			</tr> 
			</table>
		';
		$place = "left";
		}

		$head= '<meta http-equiv="refresh" content="'.$refresh_time.'">';
	}

//
// [END] Default Chat Window
//

//
// [START] Input Window
//
if($mode == "input")
{
	$useaction = '
		<tr><form action="qm_chat.php" target="chatbox" method="post" name="inputbox">
		     <td class="row1" height="100%" align="left"  width="100%">
			<span class="gen">
				&nbsp;Message:&nbsp;
				<input type="hidden" value="add" name="action">
				<input type="text" size="60" name="message" value="">&nbsp;
				<input type="submit" value=" '.$lang['qm_chat_submit'].' " class="mainoption">
				<input type="submit" value=" '.$lang['qm_chat_clear'].' " class="mainoption" onClick="javascript:document.inputbox.message.value=\'\'">
			</span>
		     </td>
		</form></tr>
	';

	$head= '';
}
//
// [END] Input Window
//

//
// [START] Get online list!
//
if($mode == "getonlinelist")
{
	// Get current time
	$timestamp = time();

	$time_off = $timestamp - $offline_time;
	$time_aw = $timestamp - $away_time;

// ONLY REMOVE THE // IF YOU GET ERRORS AND NEED TO CHECK IF THE TIMESTAMPS ARE WORKING!
// [START]
	//echo $timestamp.'<br />';			// For debugging purposes.
	//echo $time_aw.'<br />';			// For debugging purposes.
	//echo $time_off.'<br /><br />';		// For debugging purposes.
// [END]

	// Prepare variables!
	$qm_online = '';
	$qm_away = '';

	// Get online users! [START]
	$sql = "SELECT * FROM ".$table_prefix."quest_chat_session WHERE time >= '".$time_off."' AND time >= '".$time_aw."' AND status != 'offline' ";
	if ( !($result = $db->sql_query($sql)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	
	for($i=0;$i < mysql_num_rows($result);$i++)
	{
		$row = mysql_fetch_array($result); 

		$sql2 = "SELECT username FROM ". USERS_TABLE ." WHERE user_id = '".$row['user']."' ";
		if ( !($result2 = $db->sql_query($sql2)) )
		{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
		$row2 = mysql_fetch_array($result2); 

		$qm_online .= '<tr><td class="row2" width="100%"><span class="gen">&nbsp;'.$row2['username'].'</span></td></tr>';
	}
	// Get online users! [END]

	// Get away users! [START]
	$sql = "SELECT * FROM ".$table_prefix."quest_chat_session WHERE time <= '".$time_aw."' AND time >= '".$time_off."'";
	if ( !($result = $db->sql_query($sql)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	
	for($i=0;$i < mysql_num_rows($result);$i++)
	{
		$row = mysql_fetch_array($result); 

		$sql2 = "SELECT username FROM ". USERS_TABLE ." WHERE user_id = '".$row['user']."' ";
		if ( !($result2 = $db->sql_query($sql2)) )
		{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
		$row2 = mysql_fetch_array($result2); 

		$qm_away .= '<tr><td class="row2" width="100%"><span class="gen">&nbsp;'.$row2['username'].'</span></td></tr>';
	}
	// Get away users! [END]

	// Now lets go make.... Teh List! Ph33r!!!
	$useaction = "
		<tr>
		     <td class=\"row2\" height=\"100%\" valign=\"top\">
			<span class=\"gen\">
			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
			<tr>
			     <th class=\"catHead\" height=\"100%\">".$lang['chat_online']."</th>
			</tr>
			".$qm_online."
			<tr><td class=\"row2\" width=\"100%\"><span class=\"gen\">&nbsp;</span></td></tr>
			<tr>
			     <th class=\"catHead\" height=\"100%\">".$lang['chat_away']."</th>
			</tr>
			".$qm_away."
			<tr><td class=\"row2\" width=\"100%\"><span class=\"gen\">&nbsp;</span></td></tr>

			</table>
			</span>
		     </td>
		</tr>";

		$head= '<meta http-equiv="refresh" content="'.$refresh_time_list.'; URL=qm_chat.php?mode=getonlinelist">';
}
//
// [END] Get online list!
//

//
// [START] Logout!
//
if($mode == "logout")
{
	// Check if user is added to chat_session table yet!
	$sql = "SELECT * FROM ".$table_prefix."quest_chat_session WHERE user = '".$userdata['user_id']."' ";
	if ( !($result = $db->sql_query($sql)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	
	if(mysql_num_rows($result) < 1)
	{
		// User isn't in chat_session table yet! -- Add him!
		$sql = "INSERT INTO ".$table_prefix."quest_chat_session (user,status,time) VALUES ('".$userdata['user_id']."','offline','".$timestamp."') ";
		if ( !($result = $db->sql_query($sql)) )
		{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	}
	else
	{
		$row = mysql_fetch_array($result); 

		// User is already in chat_session table! -- Set status to online!
		$sql = "UPDATE ".$table_prefix."quest_chat_session SET status = 'offline', time = '".$timestamp."' WHERE user = '".$userdata['user_id']."' ";
		if ( !($result = $db->sql_query($sql)) )
		{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	}

	$chatlist = $lang['qm_chat_logout'].'<br />&nbsp;';
	$mod_title = $lang['qm_chat_logout_title'];

	$mode = '';
}
//
// [END] Logout!
//

//
// [START] Output
//
if($mode == "")
{
	$useaction = "
		<tr>
		     <td class=\"row1\" height=\"100%\">
			<span class=\"gen\">
				".$chatlist."
			</span>
		     </td>
		</tr>";
}
//
// [END] Output
//

//
// General thingies
//
   $template->assign_vars(array( 
	      	'USEACTION' => $useaction,
		'HEAD' => $head,
		'WINDOW_TITLE' => $mod_title
		   )); 
   $template->assign_block_vars('', array()); 

$template->pparse('body');

?>