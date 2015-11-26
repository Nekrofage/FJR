<?php
/***************************************************************************
 *                              map.php
 *                            -------------------
 *   Version            : 1.0.0
 *   began              : Wednesday, February 25th, 2004
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
// [START] General Variables
//
$img_size[0] = $questmod_config['tile_dimension'];
$img_size[1] = $questmod_config['tile_dimension'];

$file = "map.php";
$tiles_path = "images/map_tiles";
$export_path = "images/map_maps";

$session_time = $questmod_config['session_time'];

$mod_title = $questmod_config['mod_title'];

// Added in v2.2.0 --- Check if exporting is enabled!
	if($questmod_config['exportmaps'] == "Yes")
	{ $exporting = 1; } else { $exporting = 0; } 

//
// [END] General Variables
//

//
// [START] Update user's status!
//
	// Get current time!
	$timestamp = time();

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
//
// [END] Update user's status!
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
// [START] TELEPORT!!!
//
if(isset($teleport))
{
$sql = "SELECT * FROM ".$table_prefix."quest_teleports WHERE id='".$teleport."' ";
if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
$row = mysql_fetch_array($result); 

$sql = "UPDATE ".USERS_TABLE." SET user_map='".$row['target_id']."', user_map_x='".$row['target_x']."', user_map_y='".$row['target_y']."' WHERE user_id='".$userdata['user_id']."' ";
if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
}
//
// [END] TELEPORT!!!
//

//
// [START] Load map
//
$Usql = "SELECT user_map_x,user_map_y,user_map FROM ". USERS_TABLE ." WHERE user_id = '".$userdata['user_id']."' ";
if ( !($Uresult = $db->sql_query($Usql)) )
{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
$Urow = mysql_fetch_array($Uresult); 

$sql = "SELECT * FROM ".$table_prefix."quest_maps WHERE id = '".$Urow['user_map']."' ";
if ( !($result = $db->sql_query($sql)) )
{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
$row = mysql_fetch_array($result); 

$map_id = $row['id'];
$map_name = $row['map_name'];
$map_x = $row['map_x'];
$map_y = $row['map_y'];
$map_data = $row['map_data'];
$map_bg = $phpbb_root_path . $export_path . "/" . $map_id . ".png";

$tot_width = $img_size[0]*$map_x;
$tot_height = $img_size[1]*$map_y;

// Added in v2.2.0
// If map exporting is enabled, get the map from the images/map_maps folder!
$show_png = '';
$show_png_divs = '';
if($exporting == 1)
{	$show_png_divs = "<DIV style=\"position:absolute;width:".$tot_width."px;height:".$tot_height."px;z-index:2;\">";
	$show_png = "	</DIV>
			<DIV style=\"position:relative;width:".$tot_width."px;height:".$tot_height."px;z-index:1;\">
				<img src=\"".$map_bg."\" width=\"".$tot_width."\" height=\"".$tot_height."\" border=0>
			</DIV>
	";
}

//
// [END] Load map
//

//
// [START] Move!
//
if ((isset($west)) OR (isset($east)) OR (isset($north)) OR (isset($south)))
{

	$move = true;

	if (isset($north))
	{ $newy = ($userdata['user_map_y']-1); $newx = $userdata['user_map_x']; $direction=1;}
	if (isset($south))
	{ $newy = ($userdata['user_map_y']+1); $newx = $userdata['user_map_x']; $direction=3;}
	if (isset($west))
	{ $newx = ($userdata['user_map_x']-1); $newy = $userdata['user_map_y']; $direction=4;}
	if (isset($east))
	{ $newx = ($userdata['user_map_x']+1); $newy = $userdata['user_map_y']; $direction=2;}
	
	if ($newx <= 0)
	{ $newx = 1; }
	if ($newx > $map_x)
	{ $newx = $map_x; }
	if ($newy <= 0)
	{ $newy = 1; }
	if ($newy > $map_y)
	{ $newy = $map_y; }

	$tiles = explode(",", $map_data); 
	
	$pos = (($newy * $map_x) -1) - ($map_x - $newx);

	$sql = "SELECT * FROM ".$table_prefix."quest_tiles WHERE filename = '".$tiles[$pos]."' ";
	if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	$row = mysql_fetch_array($result); 

	if ($row['walkable'] == '0')
	{
		$move = false;
	}

	$Nsql = "SELECT * FROM ".$table_prefix."quest_npcs WHERE npc_map_id = '".$userdata['user_map']."' AND npc_map_x = '".$newx."' AND npc_map_y = '".$newy."' ";
	if ( !($Nresult = $db->sql_query($Nsql)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	$Nrow = mysql_fetch_array($Nresult); 

	if (mysql_num_rows($Nresult) > 0)
	{
		$move = false;
	}
	
	if($move == true)
	{
		$sql = "UPDATE ". USERS_TABLE ." SET user_map_x = '".$newx."', user_map_y='".$newy."', user_map_direction='".$direction."' WHERE user_id = '".$userdata['user_id']."' ";
		if ( !($result = $db->sql_query($sql)) )
		{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	}
	if($move == false)
	{
		$sql = "UPDATE ". USERS_TABLE ." SET user_map_direction='".$direction."' WHERE user_id = '".$userdata['user_id']."' ";
		if ( !($result = $db->sql_query($sql)) )
		{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	}

}
//
// [END] Move!
//

//
// [START] Check for TELEPORT
//
$teleport = '';

$Usql = "SELECT user_map_x,user_map_y,user_map FROM ". USERS_TABLE ." WHERE user_id = '".$userdata['user_id']."' ";
if ( !($Uresult = $db->sql_query($Usql)) )
{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
$Urow = mysql_fetch_array($Uresult); 

$sql = "SELECT * FROM ".$table_prefix."quest_teleports WHERE from_id = '".$map_id."' AND from_x = '".$Urow['user_map_x']."' AND from_y = '".$Urow['user_map_y']."' ";
if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
$row = mysql_fetch_array($result); 

if(mysql_num_rows($result) > 0)
{
	$sql2 = "SELECT map_name FROM ".$table_prefix."quest_maps WHERE id = '".$row['target_id']."' ";
	if ( !($result2 = $db->sql_query($sql2)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	$row2 = mysql_fetch_array($result2); 
	
	if($row['text'] == "")
	{ 
		if($row['url'] == "") { $teleport_title = $row2['map_name']; }
		else { $teleport_title = $row['url']; }
	}
	else
	{ $teleport_title = $row['text']; }

	if($row['url'] == "")
	{
		$teleport = '	<form action="'.$file.'" method="post" name="teleport">
				<input type="hidden" name="teleport" value="'.$row['id'].'">
				<input type="submit" name="teleport_click" value="'.$lang['go_to'].' '.$teleport_title.'">
				</form>
		';
	}
	else
	{
		$teleport = '	<form action="'.$file.'" method="post" name="teleport">
				<input type="submit" name="teleport_click" value="'.$lang['go_to'].' '.$teleport_title.'" onClick="javascript:window.open(\''.$row['url'].'\');">
				</form>
		';
	}
}

//
// [END] Check for TELEPORT
//

//
// [START] Check for NPC
//
$npc_talk = '';

$Usql = "SELECT user_map_x,user_map_y,user_map,user_map_direction FROM ". USERS_TABLE ." WHERE user_id = '".$userdata['user_id']."' ";
if ( !($Uresult = $db->sql_query($Usql)) )
{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
$Urow = mysql_fetch_array($Uresult); 

$Nsql = "SELECT * FROM ".$table_prefix."quest_npcs WHERE npc_map_id = '".$Urow['user_map']."' AND 
			(
			(npc_map_x = '".($Urow['user_map_x']+1)."' AND npc_map_y = '".$Urow['user_map_y']."') OR
			(npc_map_x = '".($Urow['user_map_x']-1)."' AND npc_map_y = '".$Urow['user_map_y']."') OR
			(npc_map_x = '".$Urow['user_map_x']."' AND npc_map_y = '".($Urow['user_map_y']+1)."') OR
			(npc_map_x = '".$Urow['user_map_x']."' AND npc_map_y = '".($Urow['user_map_y']-1)."')
			)
	";

if ( !($Nresult = $db->sql_query($Nsql)) )
{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
$Nrow = mysql_fetch_array($Nresult); 

if(mysql_num_rows($Nresult) > 0)
{
	$npc_talk = '	<br />
			<input type="submit" name="teleport_click" value="'.$Nrow['npc_action'].' '.$Nrow['npc_name'].'" onClick="javascript:window.open(\'./npc.php?in_npc=1&npc_id='.$Nrow['id'].'\', \'NPC\', \'height=240,width=400\', false);">
		';
}
//
// [END] Check for NPC
//

//
// [START] Build map & Get users :)
//
$tiles = explode(",", $map_data); 
$tiles_count = count($tiles); 
$x = 1;
$y = 1;

$Usql = "SELECT user_map_x,user_map_y,user_map,user_map_direction FROM ". USERS_TABLE ." WHERE user_id = '".$userdata['user_id']."' ";
if ( !($Uresult = $db->sql_query($Usql)) )
{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
$Urow = mysql_fetch_array($Uresult); 

$map = "<tr>";
for ($no = 0; $no < $tiles_count; $no++) 
{ 
	if ($x > $map_x)
	{ $map .= "</tr><tr>"; $x = 1; $y++; }

	$player = "no";
	$npc = "no";

	if (($x == $Urow['user_map_x']) && ($y == $Urow['user_map_y']))
	{
		if(file_exists($phpbb_root_path.'images/map_chars/'.$userdata['user_id'].'_'.$Urow['user_map_direction'].'.png'))
		{ $char_img = $phpbb_root_path.'images/map_chars/'.$userdata['user_id'].'_'.$Urow['user_map_direction'].'.png'; }
		else { $char_img = $phpbb_root_path.'images/map_chars/character_'.$Urow['user_map_direction'].'.gif'; }

		if($exporting == 0)
		{ $background = "background=\"".$phpbb_root_path.$tiles_path."/".$tiles[$no]."\" "; } else { $background = ''; }
		$map .= "<td ".$background." width=".$img_size[0]." height=".$img_size[1]."  align=\"center\" valign=\"middle\">
			<a href=\"javascript:void(0);\" onmouseover=\"return overlib(' ".$lang['HP']." ".$userdata['user_hp']." / ".$userdata['user_hpmax']."<br>".$lang['MP']." ".$userdata['user_mp']." / ".$userdata['user_mpmax']."<br>".$lang['level']." ".$userdata['user_statlevel']."<br>".$lang['class']." ".$userdata['user_class']."<br>".$points_name.": ".$userdata['user_points']." ', CAPTION, '".$lang['user_stats_for']." ".$userdata['username']."');\"
						onclick=\"return overlib(' ".$lang['HP']." ".$userdata['user_hp']." / ".$userdata['user_hpmax']."<br>".$lang['MP']." ".$userdata['user_mp']." / ".$userdata['user_mpmax']."<br>".$lang['level']." ".$userdata['user_statlevel']."<br>".$lang['class']." ".$userdata['user_class']."<br>".$points_name.": ".$userdata['user_points']." ', CAPTION, '".$lang['user_stats_for']." ".$userdata['username']."', STICKY, CLOSECLICK);\" onmouseout=\"return nd();\">
			<img src=\"".$char_img."\" border=0></a></td>";
		$player = "yes";
	}
	else
	{
		$Psql = "SELECT u.*, s.session_logged_in, s.session_ip
			FROM ".USERS_TABLE." u, ".SESSIONS_TABLE." s
			WHERE 	u.user_id = s.session_user_id
				AND s.session_time >= ".( time() - $session_time ) . "
				AND u.user_id > 1
				AND u.user_map = '".$Urow['user_map']."' AND u.user_map_x = '".$x."' AND u.user_map_y = '".$y."'
				LIMIT 0,1
		";
		if ( !($Presult = $db->sql_query($Psql)) )
		{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
		$Prow = mysql_fetch_array($Presult); 

		if (mysql_num_rows($Presult) > 0)
		{
			if(file_exists($phpbb_root_path.'images/map_chars/'.$Prow['user_id'].'_'.$Prow['user_map_direction'].'.png')) 
			{ $char_img = $phpbb_root_path.'images/map_chars/'.$Prow['user_id'].'_'.$Prow['user_map_direction'].'.png'; } 
			else { $char_img = $phpbb_root_path.'images/map_chars/character_'.$Prow['user_map_direction'].'.gif'; } 

			if($exporting == 0)
			{ $background = "background=\"".$phpbb_root_path.$tiles_path."/".$tiles[$no]."\" "; } else { $background = ''; }
			$map .= "<td ".$background." width=".$img_size[0]." height=".$img_size[1]."  align=\"center\" valign=\"middle\">
				<a href=\"javascript:void(0);\" onmouseover=\"return overlib(' ".$lang['HP']." ".$Prow['user_hp']." / ".$Prow['user_hpmax']."<br>".$lang['MP']." ".$Prow['user_mp']." / ".$Prow['user_mpmax']."<br>".$lang['level']." ".$Prow['user_statlevel']."<br>".$lang['class']." ".$Prow['user_class']."<br>".$points_name.": ".$Prow['user_points']." ', CAPTION, '".$lang['user_stats_for']." ".$Prow['username']."');\"
							onclick=\"return overlib(' ".$lang['HP']." ".$Prow['user_hp']." / ".$Prow['user_hpmax']."<br>".$lang['MP']." ".$Prow['user_mp']." / ".$Prow['user_mpmax']."<br>".$lang['level']." ".$Prow['user_statlevel']."<br>".$lang['class']." ".$Prow['user_class']."<br>".$points_name.": ".$Prow['user_points']." ', CAPTION, '".$lang['user_stats_for']." ".$Prow['username']."', STICKY, CLOSECLICK);\" onmouseout=\"return nd();\">
				<img src=\"".$char_img."\" border=0></a></td>";
			$player = "yes";
		}
	}

	if ($player == "no")
	{
		$Nsql = "SELECT * FROM ".$table_prefix."quest_npcs WHERE npc_map_id = '".$Urow['user_map']."' AND npc_map_x = '".$x."' AND npc_map_y = '".$y."' ";
		if ( !($Nresult = $db->sql_query($Nsql)) )
		{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
		$Nrow = mysql_fetch_array($Nresult); 

		if (mysql_num_rows($Nresult) > 0)
		{
			if($exporting == 0)
			{ $background = "background=\"".$phpbb_root_path.$tiles_path."/".$tiles[$no]."\" "; } else { $background = ''; }
			$map .= "<td ".$background." width=".$img_size[0]." height=".$img_size[1]."  align=\"center\" valign=\"middle\">
				<a href=\"javascript:void(0);\" onmouseover=\"return overlib('".$Nrow['npc_description']." ', CAPTION, '".$Nrow['npc_name']."');\"
							onclick=\"return overlib('".$Nrow['npc_description']." ', CAPTION, '".$Nrow['npc_name']."', STICKY, CLOSECLICK);\" onmouseout=\"return nd();\">
				<img src=\"images/map_npcs/".$Nrow['npc_image']."\" border=0></a></td>";
			$npc = "yes";
		}
	}

	if (($player == "no") && ($npc == "no"))
	{
		if($exporting == 0)
		{ $background = "background=\"".$phpbb_root_path.$tiles_path."/".$tiles[$no]."\" "; } else { $background = ''; }
		$map .= "<td ".$background." width=".$img_size[0]." height=".$img_size[1]." ></td>";
	}
	$x++;
}
$map .= "</tr>";
$user_map = $Urow['user_map'];
//
// [END] Build map & Get users :)
//

//
// Show user's sprite and link to sprite system [START]
//
if(file_exists($phpbb_root_path.'images/map_chars/'.$userdata['user_id'].'_3.png'))
{ $char_img = $phpbb_root_path.'images/map_chars/'.$userdata['user_id'].'_3.png'; }
else { $char_img = $phpbb_root_path.'images/map_chars/character_3.gif'; }

$character = '	<table width="100%">
		<tr>
			<td width="100%" class="row1" align="center"><span class="gen"><a href="#" onClick="javascript:window.open(\'./spritecharacter.php?in_char=1\', \'CHAR\', false);"><img src="'.$char_img.'" border=0 alt="'.$lang['click_to_change_appearance'].'"></a><br /><b>'.$userdata['username'].'</b></span></td>
		</tr>
		</table>
';
//
// Show user's sprite and link to sprite system [END]
//

//
// Make movement table! [START]
//
$movement = '	<form action="'.$file.'" method="post" name="map">
		<table width=50>
		<tr>
			<td></td>
			<td><input type="submit" name="north" value="'.$lang['North'].'"></td>
			<td></td>
		</tr>
		<tr>
			<td><input type="submit" name="west" value="'.$lang['West'].'"></td>
			<td></td>
			<td><input type="submit" name="east" value="'.$lang['East'].'"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="south" value="'.$lang['South'].'"></td>
			<td></td>
		</tr>
		</table>
		</form>
';
//
// Make movement table! [END]
//

//
// [START] Output
//
$useaction = "
	<tr>
	     <td class=\"row1\">
		<span class=\"gen\">
		<center>

		<br />
		<b>".$map_name."</b><br />
		<br />

		<table cellpadding=0 cellspacing=0>
		<tr>
			<td>
			".$show_png_divs."
				<table cellpadding=0 cellspacing=0 width=\"".$tot_width."\" height=\"".$tot_height."\">".$map."</table>
			".$show_png."
			</td>
			<td align=\"center\" valign=\"top\">".$character."<br /><br />".$movement."<br />".$npc_talk."<br />".$teleport."</td>
		</tr>
		</table>

		<br />

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