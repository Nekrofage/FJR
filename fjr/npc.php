<?php
/***************************************************************************
 *                              npc.php
 *                            -------------------
 *   Version            : 1.0.0
 *   began              : Tuesday, April 6th, 2004
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

// Get language file :)
include($phpbb_root_path . 'language/lang_' . $board_config['default_lang'] . '/lang_quest_map.php');

$userdata = session_pagestart($user_ip, PAGE_INDEX);
init_userprefs($userdata);

//
//check if logged in
//
if( !$userdata['session_logged_in'] )
{
	header('Location: ' . append_sid("login.$phpEx?redirect=".$file, true));
}
//end check

   $template->set_filenames(array( 
      'body' => 'questmod_body.tpl') 
   );

//
// Start MOD Code
//

//
// Check if user came from map.php! If not, tell him to stop trying to hack my precious system ^_^
//
if(!isset($in_npc))
{ die($lang['not_in_QM']); }

//
// [START] General Variables
//
$sqlconfig = "SELECT * FROM ".$table_prefix."quest_settings WHERE config_name = 'tile_dimension' ";
if ( !($resultconfig = $db->sql_query($sqlconfig)) )
{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }
$config_row = mysql_fetch_array($resultconfig); 
$img_size[0] = $config_row['config_value'];
$img_size[1] = $config_row['config_value'];

$file = "npc.php";
$tiles_path = "images/map_tiles";

$sqlconfig = "SELECT * FROM ".$table_prefix."quest_settings WHERE config_name = 'session_time' ";
if ( !($resultconfig = $db->sql_query($sqlconfig)) )
{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }
$config_row = mysql_fetch_array($resultconfig); 
$session_time = $config_row['config_value']; // In seconds! Example: 300 = 5 minutes! :)

//
// [END] General Variables
//


//
// [START] Get Points Name!
//
$sql = "SELECT config_value FROM " . CONFIG_TABLE . " WHERE config_name='points_name' ";
if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
$row = mysql_fetch_array($result); 
$points_name = $row['config_value'];
//
// [END] Get Points Name!
//

//
// [START] Make sure NPC_id is set!!!!
//
if(!isset($npc_id))
{ die("<b>Error</b> No NPC specified!"); }
//
// [END] Make sure NPC_id is set!!!!
//

//
// [START] Get NPC Text + Answers!
//

$Nsql = "SELECT * FROM ".$table_prefix."quest_npcs WHERE id = '".$npc_id."' ";
if ( !($Nresult = $db->sql_query($Nsql)) )
{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
$Nrow = mysql_fetch_array($Nresult); 

if ($script == "")
{ $Ssql = "SELECT * FROM ".$table_prefix."quest_scripts WHERE script_id = '".$Nrow['npc_script']."' "; }
//		else { $Ssql = "SELECT * FROM ".$table_prefix."quest_scripts WHERE npc_id = '".$npc_id."' AND script_id = '".$script."' "; }
else { $Ssql = "SELECT * FROM ".$table_prefix."quest_scripts WHERE script_id = '".$script."' "; }
if ( !($Sresult = $db->sql_query($Ssql)) )
{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
$Srow = mysql_fetch_array($Sresult); 

$npc_id = $Srow['npc_id'];

$Xsql = "SELECT * FROM ".$table_prefix."quest_npcs WHERE id = '".$Srow['npc_id']."' ";
if ( !($Xresult = $db->sql_query($Xsql)) )
{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
$Xrow = mysql_fetch_array($Xresult); 

if($Srow['action'] != "")
{ $npc_action = $Srow['action']; }
else
{ $npc_action = $Xrow['npc_action']; }

$name = $Xrow['npc_name'];
$mod_title = $npc_action." ".$name;

if($Srow['image'] != "")
{ $image = '<img src="./images/map_npcs/'.$Srow['image'].'">'; }
else
{
	// Get NPC image
	// We can't use the image from the NPC info we got earlier in this script, because well, we just can't. Trust me on this ;)
	$image = '<img src="./images/map_npcs/'.$Xrow['npc_portrait'].'">';
}

$text = str_replace("\n", '<br />', $Srow['text']);

$answer1_text = str_replace("\n", '<br />', $Srow['answer1_text']);
$answer2_text = str_replace("\n", '<br />', $Srow['answer2_text']);
$answer3_text = str_replace("\n", '<br />', $Srow['answer3_text']);
$answer4_text = str_replace("\n", '<br />', $Srow['answer4_text']);

if($Srow['answer1_script'] == 0) { $answer1 = '<a href="#" OnClick="javascript:window.close()">'.$answer1_text.'</a>'; }
else { $answer1 = '<a href="./'.$file.'?npc_id='.$Nrow['id'].'&script='.$Srow['answer1_script'].'&in_npc=1">'.$answer1_text.'</a>'; }
if($Srow['answer1_url'] != "")
{ 
	if (substr_count($Srow['answer1_url'],"?") > 0)
	{ $answer1 = '<a href="./'.$Srow['answer1_url'].'&npc_id='.$Nrow['id'].'&script='.$script.'&in_npc=1" target="_blank">'.$answer1_text.'</a>'; }
	else { $answer1 = '<a href="./'.$Srow['answer1_url'].'?npc_id='.$Nrow['id'].'&script='.$script.'&in_npc=1" target="_blank">'.$answer1_text.'</a>'; }
}

if($Srow['answer2_script'] == 0) { $answer2 = '<a href="#" OnClick="javascript:window.close()">'.$answer2_text.'</a>'; }
else { $answer2 = '<a href="./'.$file.'?npc_id='.$Nrow['id'].'&script='.$Srow['answer2_script'].'&in_npc=1">'.$answer2_text.'</a>'; }
if($Srow['answer2_url'] != "")
{ 
	if (substr_count($Srow['answer2_url'],"?") > 0)
	{ $answer2 = '<a href="./'.$Srow['answer2_url'].'&npc_id='.$Nrow['id'].'&script='.$script.'&in_npc=1" target="_blank">'.$answer2_text.'</a>'; }
	else { $answer2 = '<a href="./'.$Srow['answer2_url'].'?npc_id='.$Nrow['id'].'&script='.$script.'&in_npc=1" target="_blank">'.$answer2_text.'</a>'; }
}

if($Srow['answer3_script'] == 0) { $answer3 = '<a href="#" OnClick="javascript:window.close()">'.$answer3_text.'</a>'; }
else { $answer3 = '<a href="./'.$file.'?npc_id='.$Nrow['id'].'&script='.$Srow['answer3_script'].'&in_npc=1">'.$answer3_text.'</a>'; }
if($Srow['answer3_url'] != "")
{ 
	if (substr_count($Srow['answer3_url'],"?") > 0)
	{ $answer3 = '<a href="./'.$Srow['answer3_url'].'&npc_id='.$Nrow['id'].'&script='.$script.'&in_npc=1" target="_blank">'.$answer3_text.'</a>'; }
	else { $answer3 = '<a href="./'.$Srow['answer3_url'].'?npc_id='.$Nrow['id'].'&script='.$script.'&in_npc=1" target="_blank">'.$answer3_text.'</a>'; }
}

if($Srow['answer4_script'] == 0) { $answer4 = '<a href="#" OnClick="javascript:window.close()">'.$answer4_text.'</a>'; }
else { $answer4 = '<a href="./'.$file.'?npc_id='.$Nrow['id'].'&script='.$Srow['answer4_script'].'&in_npc=1">'.$answer4_text.'</a>'; }
if($Srow['answer4_url'] != "")
{ 
	if (substr_count($Srow['answer4_url'],"?") > 0)
	{ $answer4 = '<a href="./'.$Srow['answer4_url'].'&npc_id='.$Nrow['id'].'&script='.$script.'&in_npc=1" target="_blank">'.$answer4_text.'</a>'; }
	else { $answer4 = '<a href="./'.$Srow['answer4_url'].'?npc_id='.$Nrow['id'].'&script='.$script.'&in_npc=1" target="_blank">'.$answer4_text.'</a>'; }
}

//
// [END] Get NPC Text + Answers!
//

//
// [START] Output
//
$useaction = "
	<tr>
	     <td class=\"row1\">
		<span class=\"gen\">
		<center>
		<table width=\"100%\" height=\"100%\" border=0>
		<tr>
			<td class=\"row1\" rowspan=2 align=\"center\" valign=\"middle\" width=\"30%\">".$image."</td>
			<td class=\"row1\" align=\"left\"><span class=\"gensmall\"><b>".$name."</b></span></td>
		</tr>
		<tr>
			<td class=\"row1\" colspan=2 align=\"left\"><span class=\"gensmall\">".$text."</span></td>
		</tr>
		<tr>
			<td class=\"row1\" colspan=2 align=\"center\"><span class=\"gensmall\">&nbsp;</span></td>
		</tr>
		<tr>
			<td class=\"row1\" colspan=2 align=\"left\"><span class=\"gensmall\"><b>".$npc_action.":</b></span></td>
		</tr>
		<tr>
			<td class=\"row1\" colspan=2 align=\"center\"><span class=\"gensmall\">".$answer1."</span></td>
		</tr>
		<tr>
			<td class=\"row1\" colspan=2 align=\"center\"><span class=\"gensmall\">".$answer2."</span></td>
		</tr>
		<tr>
			<td class=\"row1\" colspan=2 align=\"center\"><span class=\"gensmall\">".$answer3."</span></td>
		</tr>
		<tr>
			<td class=\"row1\" colspan=2 align=\"center\"><span class=\"gensmall\">".$answer4."</span></td>
		</tr>
		</table>
		</center>
		</span>
	     </td>
	</tr>";
//
// [END] Output
//

//
// General thingies
//
   $template->assign_vars(array( 
	      	'USEACTION' => $useaction,
		'WINDOW_TITLE' => $mod_title
		   )); 
   $template->assign_block_vars('', array()); 

$template->pparse('body');

////
//// Start output of page
////
//include($phpbb_root_path . 'includes/page_header.' . $phpEx);
//
////
//// Generate the page
////
//$template->pparse('body');
//
//include($phpbb_root_path . 'includes/page_tail.' . $phpEx);

?>