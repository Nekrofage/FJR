<?php
/***************************************************************************
 *                     admin_quest_scripts.php
 *                            -------------------
 *   Version            : 1.0.0
 *   began              : Sunday, April 25th, 2004
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
	$module['Quest MOD']['NPC_-_Scripts_Editor'] = $file;
	return;
}

//
// [START] General Variables
//
$file = "";
$title = "Quest MOD - Scripts Editor";
$npc_path = "images/map_npcs";
$script_length = 50;
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
// [START] Get list of Scripts
//
if($action == "")
{
	if(!isset($sort))
	{ $sort = "npc_id,script_id"; }
	if(!isset($order))
	{ $order = "ASC"; }

	$sql = "SELECT * FROM ".$table_prefix."quest_scripts ORDER BY ".$sort." ".$order;
	if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	
	$list = "";
	
	for( $i = 0; $i < mysql_num_rows($result); $i++ )
	{
		$row = mysql_fetch_array($result);
	
		// Get NPC Info
		$Nsql = "SELECT npc_name,npc_portrait,npc_action FROM ".$table_prefix."quest_npcs WHERE id = '".$row['npc_id']."' ";
		if ( !($Nresult = $db->sql_query($Nsql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
		$Nrow = mysql_fetch_array($Nresult);

		if($row['image'] == '')
		{ $pic = $Nrow['npc_portrait']; }
		else
		{ $pic = $row['image']; }

		// If the text is longer then $script_length, cut it of and put some periods at the end
		if(strlen($row['text']) > $script_length)	
		{ $text = substr($row['text'], 0, $script_length) . '...'; }
		else { $text = $row['text']; }

		$text = str_replace("\n", '<br />', $text);

		// For each answer, check answer length and if there's an answer at all
		$answer_list = '';
		$num_of_answers = 4;	// Increase this if you want more then 4 answers! Make sure to do the required SQL edits!
		for($x = 1; $x <= $num_of_answers; $x++)
		{
			// Check for text length!
			if(strlen($row['answer'.$x.'_text']) > $script_length)	
			{ $answer = substr($row['answer'.$x.'_text'], 0, $script_length) . '...'; }
			else { $answer = $row['answer'.$x.'_text']; }

			// Check if script is a Close command ( when the answer script ID is set to 0 )
			if ($row['answer'.$x.'_script'] == 0)
			{ $answer_id = $lang['script_close']; }
			else { $answer_id = $row['answer'.$x.'_script']; }

			// check if answer is a URL! (answer_url != "")
			if ($row['answer'.$x.'_url'] != "")
			{ $answer_id = $row['answer'.$x.'_url']; }

			if($row['answer'.$x.'_script'] != '')
			{ $answer_script = '('.$answer_id.')'; }
			else 
			// { $answer_script = '<i>'.$lang['script_none'].'</i>'; }    // Uncomment this if you want it to show 'None' in italic if there's no answer (leave it commented to show nothing)
			{ $answer_script = ''; }

			// check if answer is a URL! (answer_url != "")
			if ($row['answer'.$x.'_url'] != "")
			{ $answer_script = '('.$row['answer'.$x.'_url'].')'; }

			$answer = str_replace("\n", '<br />', $answer);

			$answer_list .= '<td class="row1" align="left"><span class="gensmall">'.$answer.' '.$answer_script.'</span></td>';
		}

		// Check if the script has a custom Action. If not, use the NPC's Action! :)
		if($row['action'] != '')
		{ $script_action = $row['action']; } 
		else { $script_action = $Nrow['npc_action']; } 

		$list .= '
			<form action="'.$file.'" method="post"><tr>
			<td class="row2" align="center"><span class="gensmall"><b>'.$lang['lister'].$row['script_id'].'</b></span></td>
			<td class="row1" align="center"><span class="gensmall">'.$Nrow['npc_name'].'</span></td>
			<td class="row1" align="center"><span class="gensmall"><img src="'.$phpbb_root_path.$npc_path.'/'.$pic.'" alt="'.$Nrow['npc_name'].'"></span></td>
			<td class="row1" align="left"><span class="gensmall">'.$text.'</span></td>
			<td class="row1" align="center"><span class="gensmall">'.$script_action.'</span></td>
					'.$answer_list.'
			<td class="row2" align="center"><span class="gensmall">
				<input type="hidden" name="action" value="edit">
				<input type="hidden" name="script" value="'.$row['script_id'].'">
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
						<td class="row1" align="center" colspan=10><span class="gen"><input type="hidden" name="action" value="new"><input type="submit" class="mainoption" value="'.$lang['add_script'].'"></b></span></td>
						</form>
					</tr>
					<tr>
						<form action="'.$file.'" method="post">
						<td class="row1" align="right" colspan=10><span class="gen">
							'.$lang['sort_list'].' 
							<select name="sort">
								<option value="npc_id,script_id">'.$lang['order_by_both'].'</option>
								<option value="npc_id">'.$lang['order_by_npc'].'</option>
								<option value="script_id">'.$lang['order_by_script'].'</option>
							</select>
							<select name="order">
								<option value="ASC">'.$lang['sort_asc'].'</option>
								<option value="DESC">'.$lang['sort_desc'].'</option>
							</select>
							<input type="submit" class="mainoption" value=" '.$lang['go'].' "></b></span></td>
						</form>
					</tr>
					<tr>
						<td class="row2" align="center"><span class="gensmall"></span></td>
						<td class="row2" align="center"><span class="gensmall"><b>'.$lang['npc_name'].'</b></span></td>
						<td class="row2" align="center"><span class="gensmall"><b>'.$lang['image'].'</b></span></td>
						<td class="row2" align="center"><span class="gensmall"><b>'.$lang['script_text'].'</b></span></td>
						<td class="row2" align="center"><span class="gensmall"><b>'.$lang['action'].'</b></span></td>
						<td class="row2" align="center"><span class="gensmall"><b>'.$lang['script_answer'].' 1<br />('.$lang['goto_script_number'].')</b></span></td>
						<td class="row2" align="center"><span class="gensmall"><b>'.$lang['script_answer'].' 2<br />('.$lang['goto_script_number'].')</b></span></td>
						<td class="row2" align="center"><span class="gensmall"><b>'.$lang['script_answer'].' 3<br />('.$lang['goto_script_number'].')</b></span></td>
						<td class="row2" align="center"><span class="gensmall"><b>'.$lang['script_answer'].' 4<br />('.$lang['goto_script_number'].')</b></span></td>
						<td class="row2" align="center"><span class="gensmall"><b>'.$lang['edit'].'</b></span></td>
					</tr>

					'.$list.'

					<tr>
						<td class="row2" align="center"><span class="gensmall"></span></td>
						<td class="row2" align="center"><span class="gensmall"><b>'.$lang['npc_name'].'</b></span></td>
						<td class="row2" align="center"><span class="gensmall"><b>'.$lang['image'].'</b></span></td>
						<td class="row2" align="center"><span class="gensmall"><b>'.$lang['script_text'].'</b></span></td>
						<td class="row2" align="center"><span class="gensmall"><b>'.$lang['action'].'</b></span></td>
						<td class="row2" align="center"><span class="gensmall"><b>'.$lang['script_answer'].' 1<br />('.$lang['goto_script_number'].')</b></span></td>
						<td class="row2" align="center"><span class="gensmall"><b>'.$lang['script_answer'].' 2<br />('.$lang['goto_script_number'].')</b></span></td>
						<td class="row2" align="center"><span class="gensmall"><b>'.$lang['script_answer'].' 3<br />('.$lang['goto_script_number'].')</b></span></td>
						<td class="row2" align="center"><span class="gensmall"><b>'.$lang['script_answer'].' 4<br />('.$lang['goto_script_number'].')</b></span></td>
						<td class="row2" align="center"><span class="gensmall"><b>'.$lang['edit'].'</b></span></td>
					</tr>
					<tr>
						<form action="'.$file.'" method="post">
						<td class="row1" align="center" colspan=10><span class="gen"><input type="hidden" name="action" value="new"><input type="submit" class="mainoption" value="'.$lang['add_script'].'"></b></span></td>
						</form>
					</tr>
				</table>
			</span></td></tr>
		';
}
//
// [END] Get list of Scripts
//

//
// [START] Update NPC Info
//
if(isset($update))
{
	$action = $oldaction;
}
//
// [END] Update NPC Info
//

//
// [START] Edit a Script
//
if($action == "edit")
{
	if(!isset($script))
	{ message_die(GENERAL_MESSAGE, "<b>".$lang['error'].":</b>".$lang['no_script_id_specified']); }

	// Get Script info
	$sql = "SELECT * FROM ".$table_prefix."quest_scripts WHERE script_id = '".$script."' ";
	if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	$row = mysql_fetch_array($result);

	if ( (isset($update)) && ($npc_id != $row['npc_id']) )
	{ $get_npc = $npc_id; }
	else
	{ $get_npc = $row['npc_id']; }

	// Get NPC Info
	$Nsql = "SELECT npc_name,npc_portrait,npc_action FROM ".$table_prefix."quest_npcs WHERE id = '".$get_npc."' ";
	if ( !($Nresult = $db->sql_query($Nsql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	$Nrow = mysql_fetch_array($Nresult);

	//
	// [START] Get list of NPC IMAGES
	//
	$dir = @opendir($phpbb_root_path . $npc_path);
	
	$firstnpc = '';
	
	while($file = @readdir($dir))
	{
		if( !@is_dir(phpbb_realpath($phpbb_root_path . $npc_path . '/' . $file)) )
		{
			$img_size = @getimagesize($phpbb_root_path . $npc_path . '/' . $file);
	
			if( $img_size[0] && $img_size[1] )
			{
				if($image != $Nrow['npc_portrait'])
				{
					if( $file != $image )
					{
						$npc_images[] = $file;
					}
				}
				else
				{
					$npc_images[] = $file;
				}
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

	if($row['image'] != '')
	{ $script_image = '<option value="' . $row['image'] . '">' . $row['image'] . '</option>'; $script_picture = $row['image'];}
	else
	{ $script_image = ''; $script_picture = $Nrow['npc_portrait']; }

	if(($image != '') && ($image != $Nrow['npc_portrait']))
	{ $script_image = '<option value="' . $image . '">' . $image . '</option>'; $script_picture = $image;}

	$script_image_list = $script_image.'<option value="'.$Nrow['npc_portrait'].'">' . $lang['npc_default'] . '</option>'.$npc_list;

	// Make list with all NPC names!
	$Msql = "SELECT id,npc_name FROM ".$table_prefix."quest_npcs WHERE id != '".$get_npc."' ";
	if ( !($Mresult = $db->sql_query($Msql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }

	for($m=0; $m < mysql_num_rows($Mresult); $m++)
	{
		$Mrow = mysql_fetch_array($Mresult);
		$mlist .= '<option value="'.$Mrow['id'].'">'.$Mrow['npc_name'].'</option>';
	}

	// Get current NPC name + id
	$Zsql = "SELECT id,npc_name,npc_action FROM ".$table_prefix."quest_npcs WHERE id = '".$get_npc."' ";
	if ( !($Zresult = $db->sql_query($Zsql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	$Zrow = mysql_fetch_array($Zresult);
	$currentnpc = '<option value="'.$Zrow['id'].'">'.$Zrow['npc_name'].'</option>';

	if(isset($text)) { $dtext = $text; } else { $dtext = $row['text']; }
	if(isset($answer1_text)) { $danswer1_text = $answer1_text; } else { $danswer1_text = $row['answer1_text']; }
	if(isset($answer2_text)) { $danswer2_text = $answer2_text; } else { $danswer2_text = $row['answer2_text']; }
	if(isset($answer3_text)) { $danswer3_text = $answer3_text; } else { $danswer3_text = $row['answer3_text']; }
	if(isset($answer4_text)) { $danswer4_text = $answer4_text; } else { $danswer4_text = $row['answer4_text']; }
	if(isset($answer1_script)) { $danswer1_script = $answer1_script; } else { $danswer1_script= $row['answer1_script']; }
	if(isset($answer2_script)) { $danswer2_script = $answer2_script; } else { $danswer2_script= $row['answer2_script']; }
	if(isset($answer3_script)) { $danswer3_script = $answer3_script; } else { $danswer3_script= $row['answer3_script']; }
	if(isset($answer4_script)) { $danswer4_script = $answer4_script; } else { $danswer4_script= $row['answer4_script']; }
	if(isset($script_action_custom)) { $daction = $script_action_custom; } else { $daction = $row['action']; }
	// NPC Urls (added in v2.4.0)
	if(isset($answer1_url)) { $danswer1_url = $answer1_url; } else { $danswer1_url= $row['answer1_url']; }
	if(isset($answer2_url)) { $danswer2_url = $answer2_url; } else { $danswer2_url= $row['answer2_url']; }
	if(isset($answer3_url)) { $danswer3_url = $answer3_url; } else { $danswer3_url= $row['answer3_url']; }
	if(isset($answer4_url)) { $danswer4_url = $answer4_url; } else { $danswer4_url= $row['answer4_url']; }

	if((($daction == '') && ( $script_action_list != '')) && ($script_action_list != $Nrow['npc_action']))
	{ $daction = $script_action_list; }

	// Get out those nifty ' and " !
	$dtext = stripslashes($dtext);
	$daction = stripslashes($daction);
	$danswer1_text = stripslashes($danswer1_text);
	$danswer2_text = stripslashes($danswer2_text);
	$danswer3_text = stripslashes($danswer3_text);
	$danswer4_text = stripslashes($danswer4_text);

	$useaction = 	'
			<tr><td class="row1" align="center"><span class="gen">
				<br />
				<b>'.$lang['edit_script'].'</b><br />
				<br />
				<table width="80%">
				<form action="'.$file.'" method="post">
				<tr>
					<td class="row2" valign="top" width="20%" align="left"><span class="gen"><b>'.$lang['npc_name'].'</b></span></td>
					<td class="row2" align="left"><span class="gen"><select name="npc_id">'.$currentnpc.$mlist.'</select> <input type="hidden" name="oldaction" value="edit"><input class="liteoption" type="submit" name="update" value="'.$lang['update'].'"></span><br /><span class="gensmall">'.$lang['update_explain'].'</span></td>
				</tr>
				<tr>
					<td class="row2" valign="top" width="20%" align="left"><span class="gen"><b>'.$lang['script_text'].'</b></span></td>
					<td class="row2" align="left"><span class="gen"><textarea rows=5 cols=60 name="text">'.$dtext.'</textarea></span></td>
				</tr>
				<tr>
					<td class="row2" valign="top" width="20%" align="left"><span class="gen"><b>'.$lang['script_answer'].' 1</b></span></td>
					<td class="row2" align="left"><span class="gen"><textarea rows=2 cols=30 name="answer1_text" size=30>'.$danswer1_text.'</textarea><br />'.$lang['goto_script'].' <input type="text" name="answer1_script" size=4 value="'.$danswer1_script.'"></span> <span class="gensmall">'.$lang['user_zero_for_closing'].'<br /></span><span class="gen">'.$lang['script_goto_url'].' <input type="text" name="answer1_url" value="'.$danswer1_url.'"></span></td>
				</tr>
				<tr>
					<td class="row2" valign="top" width="20%" align="left"><span class="gen"><b>'.$lang['script_answer'].' 2</b></span></td>
					<td class="row2" align="left"><span class="gen"><textarea rows=2 cols=30 name="answer2_text" size=30>'.$danswer2_text.'</textarea><br />'.$lang['goto_script'].' <input type="text" name="answer2_script" size=4 value="'.$danswer2_script.'"></span> <span class="gensmall">'.$lang['user_zero_for_closing'].'<br /></span><span class="gen">'.$lang['script_goto_url'].' <input type="text" name="answer2_url" value="'.$danswer2_url.'"></span></td>
				</tr>
				<tr>
					<td class="row2" valign="top" width="20%" align="left"><span class="gen"><b>'.$lang['script_answer'].' 3</b></span></td>
					<td class="row2" align="left"><span class="gen"><textarea rows=2 cols=30 name="answer3_text" size=30>'.$danswer3_text.'</textarea><br />'.$lang['goto_script'].' <input type="text" name="answer3_script" size=4 value="'.$danswer3_script.'"></span> <span class="gensmall">'.$lang['user_zero_for_closing'].'<br /></span><span class="gen">'.$lang['script_goto_url'].' <input type="text" name="answer3_url" value="'.$danswer3_url.'"></span></td>
				</tr>
				<tr>
					<td class="row2" valign="top" width="20%" align="left"><span class="gen"><b>'.$lang['script_answer'].' 4</b></span></td>
					<td class="row2" align="left"><span class="gen"><textarea rows=2 cols=30 name="answer4_text" size=30>'.$danswer4_text.'</textarea><br />'.$lang['goto_script'].' <input type="text" name="answer4_script" size=4 value="'.$danswer4_script.'"></span> <span class="gensmall">'.$lang['user_zero_for_closing'].'<br /></span><span class="gen">'.$lang['script_goto_url'].' <input type="text" name="answer4_url" value="'.$danswer4_url.'"></span></td>
				</tr>
				<tr>
					<td class="row2" valign="top" width="20%" align="left"><span class="gen"><b>'.$lang['action'].'</b></span></td>
					<td class="row2" align="left"><span class="gen">
						'.$lang['use_from_list'].' 
						<select name="script_action_list">
							<option value="'.$Nrow['npc_action'].'">'.$lang['npc_default_action'].' ('.$Nrow['npc_action'].')</option>
							<option value="'.$lang['speak_to'].'">'.$lang['speak_to'].'</option>
							<option value="'.$lang['read'].'">'.$lang['read'].'</option>
							<option value="'.$lang['pick_up'].'">'.$lang['pick_up'].'</option>
							<option value="'.$lang['look_at'].'">'.$lang['look_at'].'</option>
						</select>
						<br />'.$lang['or_type_custom'].' <textarea rows=2 cols=30 name="script_action_custom" size=30>'.$daction.'</textarea>
					</span></td>
				</tr>
				<tr>
					<td class="row2" valign="top" width="20%" align="left"><span class="gen"><b>'.$lang['image'].'</b></span></td>
					<td class="row2" align="left" valign="middle"><span class="gen"><select name="image" onChange="document.images[\'image\'].src=\''.$phpbb_root_path.$npc_path.'/\'+ this.value;" >'.$script_image_list.'</select> <img src="'.$phpbb_root_path.$npc_path.'/'.$script_picture.'" name="image"></span></td>
				</tr>
				<tr>
					<td class="row2" align="center" colspan=2><span class="gen"><input type="hidden" name="action" value="doedit"><input type="hidden" name="script" value="'.$row['script_id'].'"><input class="mainoption" type="submit" value="'.$lang['edit'].'"></span></td>
				</tr>
				</form>
				<form action="'.$file.'" method="post">
				<tr>
					<td class="row2" align="center" colspan=2><span class="gen"><input type="hidden" name="action" value="delete"><input type="hidden" name="script" value="'.$row['script_id'].'"><input class="mainoption" type="submit" value="'.$lang['delete'].'"></span></td>
				</tr>
				</form></table>
				<br />
			</span></td></tr>
			';
}
//
// [END] Edit a Script
//

//
// [START] Do edits!
//
if($action == "doedit")
{
	if(!isset($script))
	{ message_die(GENERAL_MESSAGE, "<b>".$lang['error'].":</b>".$lang['no_script_id_specified']); }

	if(($npc_id == "") OR (($script_action_list == "") && ($script_action_custom == "")) OR ($text == ""))
	{ 
		$useaction = '
				<tr><td class="row1" align="center"><span class="gen"><form action="'.$file.'" method="post">
					<br />
					<b>'.$lang['error'].':</b><br />'.$lang['didnt_fill_all_fields'].'<br />
					<br />
					<input type="hidden" name="action" value="edit"><input type="hidden" name="script" value="'.$script.'"><input type="submit" class="mainoption" value="'.$lang['go_back'].'">
				</form></span></td></tr>
		';
	}
	else
	{

	// Get NPC Info and check if the chosen  image is the same as the NPC's portrait! Do the same for the action!
	$Nsql = "SELECT npc_portrait,npc_action FROM ".$table_prefix."quest_npcs WHERE id = '".$npc_id."' ";
	if ( !($Nresult = $db->sql_query($Nsql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	$Nrow = mysql_fetch_array($Nresult);

	if($image == $Nrow['npc_portrait'])
	{ $image = ''; }

	// Check if user typed a custom action. If so, use it. If not, use the action selected in the list.
	if($script_action_custom != "")
	{ $action = $script_action_custom; }
	else
	{ $action = $script_action_list; }

	if($action == $Nrow['npc_action'])
	{ $action = ''; }

	// Get out those nifty ' and " !
	$text = stripslashes($text);
	$text = addslashes($text);
	$action = stripslashes($action);
	$action = addslashes($action);
	$answer1_text = stripslashes($answer1_text);
	$answer1_text = addslashes($answer1_text);
	$answer2_text = stripslashes($answer2_text);
	$answer2_text = addslashes($answer2_text);
	$answer3_text = stripslashes($answer3_text);
	$answer3_text = addslashes($answer3_text);
	$answer4_text = stripslashes($answer4_text);
	$answer4_text = addslashes($answer4_text);

	// Insert new data!
	$sql = "UPDATE ".$table_prefix."quest_scripts SET 
		npc_id = '".$npc_id."',
		text = '".$text."',
		answer1_text = '".$answer1_text."',
		answer2_text = '".$answer2_text."',
		answer3_text = '".$answer3_text."',
		answer4_text = '".$answer4_text."',
		answer1_script = '".$answer1_script."',
		answer2_script = '".$answer2_script."',
		answer3_script = '".$answer3_script."',
		answer4_script = '".$answer4_script."',
		answer1_url = '".$answer1_url."',
		answer2_url = '".$answer2_url."',
		answer3_url = '".$answer3_url."',
		answer4_url = '".$answer4_url."',
		action = '".$action."',
		image = '".$image."'
		WHERE script_id = '".$script."' ";
	if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }

	$useaction = '
			<tr><td class="row1" align="center"><span class="gen"><form action="'.$file.'" method="post">
				<br />
				<b>'.$lang['edit_script_succesful'].'</b><br />
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
	if(!isset($script))
	{ message_die(GENERAL_MESSAGE, "<b>".$lang['error'].":</b>".$lang['no_script_id_specified']); }

	// Insert new data!
	$sql = "DELETE FROM ".$table_prefix."quest_scripts WHERE script_id = '".$script."' ";
	if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }

	$useaction = '
			<tr><td class="row1" align="center"><span class="gen"><form action="'.$file.'" method="post">
				<br />
				<b>'.$lang['delete_script_succesful'].'</b><br />
				<br />
				<input type="submit" class="mainoption" value="'.$lang['go_back'].'">
			</form></span></td></tr>
	';
}
//
// [END] Delete
//

//
// [START] Add a new Script
//
if($action == "new")
{
	$get_npc = $npc_id;

	// Get NPC Info
	$Nsql = "SELECT npc_name,npc_portrait,npc_action FROM ".$table_prefix."quest_npcs WHERE id = '".$get_npc."' ";
	if ( !($Nresult = $db->sql_query($Nsql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	$Nrow = mysql_fetch_array($Nresult);

	//
	// [START] Get list of NPC IMAGES
	//
	$dir = @opendir($phpbb_root_path . $npc_path);
	
	$firstnpc = '';
	
	while($file = @readdir($dir))
	{
		if( !@is_dir(phpbb_realpath($phpbb_root_path . $npc_path . '/' . $file)) )
		{
			$img_size = @getimagesize($phpbb_root_path . $npc_path . '/' . $file);
	
			if( $img_size[0] && $img_size[1] )
			{
				if($image != $Nrow['npc_portrait'])
				{
					if( $file != $image )
					{
						$npc_images[] = $file;
					}
				}
				else
				{
					$npc_images[] = $file;
				}
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

	// Make list with all NPC names!
	$Msql = "SELECT id,npc_name FROM ".$table_prefix."quest_npcs WHERE id != '".$get_npc."' ";
	if ( !($Mresult = $db->sql_query($Msql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }

	$getfirstnpc = '';

	for($m=0; $m < mysql_num_rows($Mresult); $m++)
	{
		$Mrow = mysql_fetch_array($Mresult);
		if(($getfirstnpc == '') && ($get_npc == ''))
		{ $getfirstnpc = $Mrow['id']; }
		else
		{ $mlist .= '<option value="'.$Mrow['id'].'">'.$Mrow['npc_name'].'</option>'; }
	}

	if($get_npc == '')
	{ $get_npc = $getfirstnpc; }

	// Get current NPC name + id
	$Zsql = "SELECT id,npc_name,npc_action,npc_portrait FROM ".$table_prefix."quest_npcs WHERE id = '".$get_npc."' ";
	if ( !($Zresult = $db->sql_query($Zsql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	$Zrow = mysql_fetch_array($Zresult);
	$currentnpc = '<option value="'.$Zrow['id'].'">'.$Zrow['npc_name'].'</option>';

	$script_image = ''; $script_picture = $Zrow['npc_portrait']; 

	if(($image != '') && ($image != $Zrow['npc_portrait']))
	{ $script_image = '<option value="' . $image . '">' . $image . '</option>'; $script_picture = $image;}

	$script_image_list = $script_image.'<option value="'.$Zrow['npc_portrait'].'">' . $lang['npc_default'] . '</option>'.$npc_list;

	if(isset($text)) { $dtext = $text; } else { $dtext = $row['text']; }
	if(isset($answer1_text)) { $danswer1_text = $answer1_text; } else { $danswer1_text = $row['answer1_text']; }
	if(isset($answer2_text)) { $danswer2_text = $answer2_text; } else { $danswer2_text = $row['answer2_text']; }
	if(isset($answer3_text)) { $danswer3_text = $answer3_text; } else { $danswer3_text = $row['answer3_text']; }
	if(isset($answer4_text)) { $danswer4_text = $answer4_text; } else { $danswer4_text = $row['answer4_text']; }
	if(isset($answer1_script)) { $danswer1_script = $answer1_script; } else { $danswer1_script= $row['answer1_script']; }
	if(isset($answer2_script)) { $danswer2_script = $answer2_script; } else { $danswer2_script= $row['answer2_script']; }
	if(isset($answer3_script)) { $danswer3_script = $answer3_script; } else { $danswer3_script= $row['answer3_script']; }
	if(isset($answer4_script)) { $danswer4_script = $answer4_script; } else { $danswer4_script= $row['answer4_script']; }
	if(isset($script_action_custom)) { $daction = $script_action_custom; } else { $daction = $row['action']; }
	// NPC Urls (added in v2.4.0)
	if(isset($answer1_url)) { $danswer1_url = $answer1_url; } else { $danswer1_url= $row['answer1_url']; }
	if(isset($answer2_url)) { $danswer2_url = $answer2_url; } else { $danswer2_url= $row['answer2_url']; }
	if(isset($answer3_url)) { $danswer3_url = $answer3_url; } else { $danswer3_url= $row['answer3_url']; }
	if(isset($answer4_url)) { $danswer4_url = $answer4_url; } else { $danswer4_url= $row['answer4_url']; }

	if((($daction == '') && ( $script_action_list != '')) && ($script_action_list != $Zrow['npc_action']))
	{ $daction = $script_action_list; }

	// Get out those nifty ' and " !
	$dtext = stripslashes($dtext);
	$daction = stripslashes($daction);
	$danswer1_text = stripslashes($danswer1_text);
	$danswer2_text = stripslashes($danswer2_text);
	$danswer3_text = stripslashes($danswer3_text);
	$danswer4_text = stripslashes($danswer4_text);

	$useaction = 	'
			<tr><td class="row1" align="center"><span class="gen">
				<br />
				<b>'.$lang['add_script'].'</b><br />
				<br />
				<table width="80%">
				<form action="'.$file.'" method="post">
				<tr>
					<td class="row2" valign="top" width="20%" align="left"><span class="gen"><b>'.$lang['npc_name'].'</b></span></td>
					<td class="row2" align="left"><span class="gen"><select name="npc_id">'.$currentnpc.$mlist.'</select> <input type="hidden" name="oldaction" value="new"><input class="liteoption" type="submit" name="update" value="'.$lang['update'].'"></span><br /><span class="gensmall">'.$lang['update_explain'].'</span></td>
				</tr>
				<tr>
					<td class="row2" valign="top" width="20%" align="left"><span class="gen"><b>'.$lang['script_text'].'</b></span></td>
					<td class="row2" align="left"><span class="gen"><textarea rows=5 cols=60 name="text">'.$dtext.'</textarea></span></td>
				</tr>
				<tr>
					<td class="row2" valign="top" width="20%" align="left"><span class="gen"><b>'.$lang['script_answer'].' 1</b></span></td>
					<td class="row2" align="left"><span class="gen"><textarea rows=2 cols=30 name="answer1_text" size=30>'.$danswer1_text.'</textarea><br />'.$lang['goto_script'].' <input type="text" name="answer1_script" size=4 value="'.$danswer1_script.'"></span> <span class="gensmall">'.$lang['user_zero_for_closing'].'<br /></span><span class="gen">'.$lang['script_goto_url'].' <input type="text" name="answer1_url" value="'.$danswer1_url.'"></span></td>
				</tr>
				<tr>
					<td class="row2" valign="top" width="20%" align="left"><span class="gen"><b>'.$lang['script_answer'].' 2</b></span></td>
					<td class="row2" align="left"><span class="gen"><textarea rows=2 cols=30 name="answer2_text" size=30>'.$danswer2_text.'</textarea><br />'.$lang['goto_script'].' <input type="text" name="answer2_script" size=4 value="'.$danswer2_script.'"></span> <span class="gensmall">'.$lang['user_zero_for_closing'].'<br /></span><span class="gen">'.$lang['script_goto_url'].' <input type="text" name="answer2_url" value="'.$danswer2_url.'"></span></td>
				</tr>
				<tr>
					<td class="row2" valign="top" width="20%" align="left"><span class="gen"><b>'.$lang['script_answer'].' 3</b></span></td>
					<td class="row2" align="left"><span class="gen"><textarea rows=2 cols=30 name="answer3_text" size=30>'.$danswer3_text.'</textarea><br />'.$lang['goto_script'].' <input type="text" name="answer3_script" size=4 value="'.$danswer3_script.'"></span> <span class="gensmall">'.$lang['user_zero_for_closing'].'<br /></span><span class="gen">'.$lang['script_goto_url'].' <input type="text" name="answer3_url" value="'.$danswer3_url.'"></span></td>
				</tr>
				<tr>
					<td class="row2" valign="top" width="20%" align="left"><span class="gen"><b>'.$lang['script_answer'].' 4</b></span></td>
					<td class="row2" align="left"><span class="gen"><textarea rows=2 cols=30 name="answer4_text" size=30>'.$danswer4_text.'</textarea><br />'.$lang['goto_script'].' <input type="text" name="answer4_script" size=4 value="'.$danswer4_script.'"></span> <span class="gensmall">'.$lang['user_zero_for_closing'].'<br /></span><span class="gen">'.$lang['script_goto_url'].' <input type="text" name="answer4_url" value="'.$danswer4_url.'"></span></td>
				</tr>
				<tr>
					<td class="row2" valign="top" width="20%" align="left"><span class="gen"><b>'.$lang['action'].'</b></span></td>
					<td class="row2" align="left"><span class="gen">
						'.$lang['use_from_list'].' 
						<select name="script_action_list">
							<option value="'.$Nrow['npc_action'].'">'.$lang['npc_default_action'].' ('.$Zrow['npc_action'].')</option>
							<option value="'.$lang['speak_to'].'">'.$lang['speak_to'].'</option>
							<option value="'.$lang['read'].'">'.$lang['read'].'</option>
							<option value="'.$lang['pick_up'].'">'.$lang['pick_up'].'</option>
							<option value="'.$lang['look_at'].'">'.$lang['look_at'].'</option>
						</select>
						<br />'.$lang['or_type_custom'].' <textarea rows=2 cols=30 name="script_action_custom" size=30>'.$daction.'</textarea>
					</span></td>
				</tr>
				<tr>
					<td class="row2" valign="top" width="20%" align="left"><span class="gen"><b>'.$lang['image'].'</b></span></td>
					<td class="row2" align="left" valign="middle"><span class="gen"><select name="image" onChange="document.images[\'image\'].src=\''.$phpbb_root_path.$npc_path.'/\'+ this.value;" >'.$script_image_list.'</select> <img src="'.$phpbb_root_path.$npc_path.'/'.$script_picture.'" name="image"></span></td>
				</tr>
				<tr>
					<td class="row2" align="center" colspan=2><span class="gen"><input type="hidden" name="action" value="createnew"><input type="hidden" name="script" value="'.$row['script_id'].'"><input class="mainoption" type="submit" value="'.$lang['add_script_button'].'"></span></td>
				</tr>
				</form></table>
				<br />
			</span></td></tr>
			';
}
//
// [END] Add a new Script
//

// [START] Do Add!
//
if($action == "createnew")
{

	if(($npc_id == "") OR (($script_action_list == "") && ($script_action_custom == "")) OR ($text == ""))
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

	// Get NPC Info and check if the chosen  image is the same as the NPC's portrait! Do the same for the action!
	$Nsql = "SELECT npc_portrait,npc_action FROM ".$table_prefix."quest_npcs WHERE id = '".$npc_id."' ";
	if ( !($Nresult = $db->sql_query($Nsql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	$Nrow = mysql_fetch_array($Nresult);

	if($image == $Nrow['npc_portrait'])
	{ $image = ''; }

	// Check if user typed a custom action. If so, use it. If not, use the action selected in the list.
	if($script_action_custom != "")
	{ $action = $script_action_custom; }
	else
	{ $action = $script_action_list; }

	if($action == $Nrow['npc_action'])
	{ $action = ''; }

	// Get out those nifty ' and " !
	$text = stripslashes($text);
	$text = addslashes($text);
	$action = stripslashes($action);
	$action = addslashes($action);
	$answer1_text = stripslashes($answer1_text);
	$answer1_text = addslashes($answer1_text);
	$answer2_text = stripslashes($answer2_text);
	$answer2_text = addslashes($answer2_text);
	$answer3_text = stripslashes($answer3_text);
	$answer3_text = addslashes($answer3_text);
	$answer4_text = stripslashes($answer4_text);
	$answer4_text = addslashes($answer4_text);

	// Insert new data!
	$sql = "INSERT INTO `".$table_prefix."quest_scripts` (npc_id,text,answer1_text,answer1_script,answer2_text,answer2_script,answer3_text,answer3_script,answer4_text,answer4_script,image,action,answer1_url,answer2_url,answer3_url,answer4_url) VALUES 
		('".$npc_id."','".$text."','".$answer1_text."','".$answer1_script."','".$answer2_text."','".$answer2_script."','".$answer3_text."','".$answer3_script."','".$answer4_text."','".$answer4_script."','".$image."','".$action."','".$answer1_url."','".$answer2_url."','".$answer3_url."','".$answer4_url."')";
	if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }

	$useaction = '
			<tr><td class="row1" align="center"><span class="gen"><form action="'.$file.'" method="post">
				<br />
				<b>'.$lang['add_script_succesful'].'</b><br />
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