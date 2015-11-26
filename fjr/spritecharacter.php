<?php
/***************************************************************************
 *                              spritecharacter.php
 *                            -------------------
 *   Version            : 1.0.0
 *   began              : Sunday, May 9th, 2004
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
include($phpbb_root_path . 'language/lang_' . $board_config['default_lang'] . '/lang_quest_admin.php');
include($phpbb_root_path . 'language/lang_' . $board_config['default_lang'] . '/lang_quest_map.php');

$userdata = session_pagestart($user_ip, PAGE_INDEX);
init_userprefs($userdata);

//
//check if logged in
//
if( !$userdata['session_logged_in'] )
{
	header('Location: ' . append_sid("login.$phpEx?redirect=spritecharacter.php", true));
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

if(!isset($in_char))
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

$width = $img_size[1] * 4;
$height = $img_size[0];

$file = "spritecharacter.php";
$sprites_path = "images/map_sprites";
$chars_path = "images/map_chars";

$mod_title = $lang['character_editor'];
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
// [START] Save it! :)
//
if($action == "save")
{
	// Check if user has a character yet! If not, create one!
	$sql = "SELECT * FROM ".$table_prefix."quest_sprite_userchars WHERE user = '".$userdata['user_id']."' ";
	if ( !($result = $db->sql_query($sql)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }

	$tot_users = mysql_num_rows($result);

	if($tot_users < 1)
	{
		$sql2 = "SELECT * FROM ".$table_prefix."quest_sprite_layers ORDER BY position DESC";
		if ( !($result2 = $db->sql_query($sql2)) )
		{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }

		$tot_layers = mysql_num_rows($result2);

		$insert_values = '';
		$insert_layers = '';

		for( $i = 0; $i < $tot_layers; $i++ )
		{
				$row2 = mysql_fetch_array($result2); 
				$insert_layers .= ','.$row2['name']; 
				$insert_values .= ",'' ";
		}

		// Create character!
		$sql3 = "INSERT INTO ".$table_prefix."quest_sprite_userchars (user".$insert_layers.") VALUES ('".$userdata['user_id']."'".$insert_values.")";
		if ( !($result3 = $db->sql_query($sql3)) )
		{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
	}

	// Now that they got a character, insert the selected images into the db!
	$sql = "SELECT * FROM ".$table_prefix."quest_sprite_layers ORDER BY position DESC";
	if ( !($result = $db->sql_query($sql)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }

	$tot_layers = mysql_num_rows($result);

	$insert_values = '';
	$insert_layers = '';
	$dontshow = '';
	$no_show_list = '';
	$dont_show_these_layers = '';

	for( $i = 0; $i < $tot_layers; $i++ )
	{
			$row = mysql_fetch_array($result); 

			$insert_layers .= ','.$row2['name']; 

			if($insert_values != "")
			{ $insert_values .= ', '; }

			$insert_values .= $row['name']." = '".$HTTP_POST_VARS[$row['name']]."'";

			//
			// [START] Check for DONTSHOW layers :)
			//
			$IMsql = "SELECT * FROM ".$table_prefix."quest_sprite_images WHERE image = '".$HTTP_POST_VARS[$row['name']]."' ";
			if ( !($IMresult = $db->sql_query($IMsql)) )
			{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }

			$IMrow = mysql_fetch_array($IMresult); 

			if(($IMrow['dontshowlayer'] != '0') && ($IMrow['dontshowlayer'] != ''))
			{
				// Image has a NOSHOW layer! --- Need to check the name of the layer!
				$ILsql = "SELECT name FROM ".$table_prefix."quest_sprite_layers WHERE id = '".$IMrow['dontshowlayer']."' ";
				if ( !($ILresult = $db->sql_query($ILsql)) )
				{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }
				$ILrow = mysql_fetch_array($ILresult); 

				$dontshow .= '
					<tr>
						<td class="row1" align="center"><span class="gen">&nbsp;'.$IMrow['name'].'&nbsp;</span></td>
						<td class="row1" align="center"><span class="gen">&nbsp;'.$row['name'].'&nbsp;</span></td>
						<td class="row1" align="center"><span class="gen">&nbsp;'.$ILrow['name'].'&nbsp;</span></td>
					</tr>
				';

				$dont_show_these_layers .= 'Q'.$IMrow['dontshowlayer'].'M';
			}

			if (substr_count($dont_show_these_layers,'Q'.$row['id'].'M') > 0)
			{
				$no_show_list .= '<input type="hidden" name="'.$row['name'].'" value="spacer.gif">';
			}
			else
			{
				$no_show_list .= '<input type="hidden" name="'.$row['name'].'" value="'.$HTTP_POST_VARS[$row['name']].'">';
			}
			//
			// [END] Check for DONTSHOW layers :)
			//
	}

	if(($dontshow != '') && ($pass_check != "yes"))
	{
		$useaction = '
			<center>
			<table border="0" cellspacing="0" cellpadding="0" width="95%">
			<tr>
				<th class="catHead">&nbsp;'.$lang['noshow_warning_header'].'&nbsp;</th>
			</tr>
			<tr>
				<td class="row2" align="center"><span class="gen"><br />'.$lang['noshow_warning'].'<br /><br />
					<table border="0" cellspacing="0" cellpadding="0" width="70%">
						<tr>
							<th class="catHead">&nbsp;'.$lang['this_image'].'&nbsp;</th>
							<th class="catHead">&nbsp;'.$lang['at_layer'].'&nbsp;</th>
							<th class="catHead">&nbsp;'.$lang['will_hide_this_layer'].'&nbsp;</th>
						</tr>
						'.$dontshow.'
						<form method="post" action="">
						<tr>
							<td class="row2" align="center" colspan=3><span class="gen"><br />'.$no_show_list.'<input type="hidden" name="action" value="save"><input type="hidden" name="pass_check" value="yes"><input type="submit" value="'.$lang['proceed'].'" class="mainoption"></span></td>
						</tr>
						</form>
						<form method="post" action="">
						<tr>
							<td class="row2" align="center" colspan=3><span class="gen"><input type="hidden" name="action" value=""><input type="submit" value="'.$lang['go_back'].'" class="mainoption"></span></td>
						</tr>
						</form>
					</table>
				<br />
				</span></td>
			</tr>
			</table>
			<br />
			</center>
		';
	}
	else
	{

	// Update character!
	$sql = "UPDATE ".$table_prefix."quest_sprite_userchars SET ".$insert_values." WHERE user = '".$userdata['user_id']."' ";
	if ( !($result = $db->sql_query($sql)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }

	//
	// [START] At last, create the PNG image!
	//
	$tot_width = $width;
	$tot_height = $height;

	// Get all layers in the correct order!
	$Lsql = "SELECT * FROM `".$table_prefix."quest_sprite_layers` ORDER BY position ASC";
	if ( !($Lresult = $db->sql_query($Lsql)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }

	$tot_layers = mysql_num_rows($Lresult);

	$sprite_1 = @imagecreatefromgif($phpbb_root_path.$sprites_path.'/spacer.gif');
	$sprite_2 = @imagecreatefromgif($phpbb_root_path.$sprites_path.'/spacer.gif');
	$sprite_3 = @imagecreatefromgif($phpbb_root_path.$sprites_path.'/spacer.gif');
	$sprite_4 = @imagecreatefromgif($phpbb_root_path.$sprites_path.'/spacer.gif');

	$pos1 = (0 - ($img_size[1]*2));
	$pos2 = (0 - $img_size[1]);
	$pos3 = 0;
	$pos4 = (0 - ($img_size[1]*3));

	for( $iii = 0; $iii < $tot_layers; $iii++ )
	{
			$Lrow = mysql_fetch_array($Lresult); 
			if($HTTP_POST_VARS[$Lrow['name']] != 'spacer.gif')
			{
				$image = @imagecreatefromgif($phpbb_root_path.$sprites_path.'/'.$HTTP_POST_VARS[$Lrow['name']]);
				@imagecopy ($sprite_1, $image, $pos1, 0, 0, 0, $tot_width, $tot_height);
				@imagecopy ($sprite_2, $image, $pos2, 0, 0, 0, $tot_width, $tot_height);
				@imagecopy ($sprite_3, $image, $pos3, 0, 0, 0, $tot_width, $tot_height);
				@imagecopy ($sprite_4, $image, $pos4, 0, 0, 0, $tot_width, $tot_height);
				@ImageDestroy($image);
			}
	}
	$save1 = $userdata['user_id'].'_1';
	$save2 = $userdata['user_id'].'_2';
	$save3 = $userdata['user_id'].'_3';
	$save4 = $userdata['user_id'].'_4';
	@imagepng($sprite_1, $phpbb_root_path . $chars_path . '/' . $save1 . '.png');
	@imagepng($sprite_2, $phpbb_root_path . $chars_path . '/' . $save2 . '.png');
	@imagepng($sprite_3, $phpbb_root_path . $chars_path . '/' . $save3 . '.png');
	@imagepng($sprite_4, $phpbb_root_path . $chars_path . '/' . $save4 . '.png');
	@imagedestroy($sprite_1);
	@imagedestroy($sprite_2);
	@imagedestroy($sprite_3);
	@imagedestroy($sprite_4);
	//
	// [END] At last, create the PNG image!
	//

	$useaction = "
		<center>
		<table width=\"60%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\">
			<tr>
				<td class=\"row2\" align=\"center\"><span class=\"gen\">
					<b>".$lang['sprite_created_succesfully']."</b><br />&nbsp;
				</td>
			</tr>
			<tr>
				<td class=\"row2\" align=\"center\"><span class=\"gen\">
				<form method=\"post\" action=\"\">
					<input type=\"hidden\" name=\"action\" value=\"\"><input type=\"submit\" value=\"".$lang['go_back']."\" class=\"mainoption\">
				</form>
				</td>
			</tr>
			<tr>
				<td class=\"row2\" align=\"center\"><span class=\"gen\">
				<form method=\"post\" action=\"\">
					<input type=\"submit\" value=\"".$lang['close_window']."\" class=\"mainoption\" onClick=\"window.close();\">
				</form>
				</td>
			</tr>
		</table>
		<br />
		</center>
	";

	}
}
//
// [END] Save it! :)
//

//
// [START] Get Layers + Images!
//
if($action == "")
{
	$sql = "SELECT * FROM ".$table_prefix."quest_sprite_layers ORDER BY position DESC";
	if ( !($result = $db->sql_query($sql)) )
	{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br><br>".mysql_error()); }

	$tot_layers = mysql_num_rows($result);
	$preview_img = '';
	$zindex = $tot_layers;

	for( $i = 0; $i < $tot_layers; $i++ )
	{
		$row = mysql_fetch_array($result); 

		$compulsive = $lang['No'];
		if($row['compulsive'] == 1)
		{ $compulsive = $lang['Yes']; }

		//
		// [START] Get images for this layer!
		//
		$Usql = "SELECT ".$row['name']." FROM ".$table_prefix."quest_sprite_userchars WHERE user = '".$userdata['user_id']."' ";
		if ( !($Uresult = $db->sql_query($Usql)) )
		{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }

		$Urow = mysql_fetch_array($Uresult);

		$sql2 = "SELECT * FROM ".$table_prefix."quest_sprite_images WHERE layer = '".$row['id']."' ORDER BY name ASC";
		if ( !($result2 = $db->sql_query($sql2)) )
		{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }

		$i_list = '';
		$firstimage = '';

		if($row['compulsive'] == 0)
		{ $i_list = '<option value="spacer.gif">' . $lang['sprites_dont_use_nolayer'] . '</option>'; $firstimage = "spacer.gif"; }

		for( $z = 0; $z < mysql_num_rows($result2); $z++ )
		{
			$row2 = mysql_fetch_array($result2); 

			$checked = '';
			if($Urow[$row['name']] == $row2['image'])
			{ $checked = "SELECTED";}

			// check for item, if itemneeded is set to Yes(=1)!
			if($row2['itemneeded'] != "")
			{
				$Usql = "SELECT user_items FROM ".USERS_TABLE." WHERE user_id = '".$userdata['user_id']."' ";
				if ( !($Uresult = $db->sql_query($Usql)) )
				{ message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }
				$Urow = mysql_fetch_array($Uresult); 

				if (substr_count($Urow['user_items'],"ß".$row2['itemneeded']."Þ") > 0)
				{
					$i_list .= '<option value="' . $row2['image'] . '" '.$checked.'>' . $row2['name'] . '</option>'; 

					if(($firstimage == '') OR ($checked != ''))
					{ $firstimage = $row2['image']; }
				}
			}
			else
			{
				$i_list .= '<option value="' . $row2['image'] . '" '.$checked.'>' . $row2['name'] . '</option>'; 

				if(($firstimage == '') OR ($checked != ''))
				{ $firstimage = $row2['image']; }
			}
		}
		//
		// [END] Get images for this layer!
		//

		$imagename = "preview".$i;

		$list .= '
			<tr>
				<td class="row2" align="center"><span class="gen">'.$row['name'].'</span></td>
				<td class="row2" align="center"><span class="gen">'.$compulsive.'</span></td>
				<td class="row2" align="left"><span class="gen"><select name="'.$row['name'].'" onChange="document.images[\''.$imagename.'\'].src = \''.$phpbb_root_path.$sprites_path.'/\'+ this.value;">'.$i_list.'</select></td>
			</tr>
		';

		$preview_img .= '
			<DIV style="position:absolute;width:'.$width.'px;height:'.$height.'px;z-index:'.$zindex.';">
				<img width="'.$width.'" height="'.$height.'" src="'.$phpbb_root_path.$sprites_path.'/'.$firstimage.'" name="'.$imagename.'">
			</DIV>
		';
		$zindex = $zindex - 1;
	}

	$spritegen = '
		<tr>
			<th class="catHead">&nbsp;'.$lang['name'].'&nbsp;</th>
			<th class="catHead">&nbsp;'.$lang['sprites_compulsive'].'&nbsp;</th>
			<th class="catHead">&nbsp;'.$lang['image'].'&nbsp;</th>
		</tr>
	'.$list;

	$button = '<input type="submit" value=" '.$lang['go'].' " class="mainoption"><input type="hidden" name="action" value="save"><input type="hidden" name="tot_layers" value="'.$tot_layers.'">';

	$useaction = "
		<center>
		<b>".$userdata['username'].$lang['character_sprite']."</b><br />
		<table width=\"".$width."\" height=\"".$height."\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
		<tr>
			<td width=\"".$width."\" height=\"".$height."\" class=\"row1\">
				".$preview_img."
			</td>
		</tr>
		</table>
		<br />
		<table width=\"40%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
			<form method=\"post\" action=\"\">
			".$spritegen."
			<tr>
				<td class=\"row2\" colspan=\"3\" align=\"center\"><span class=\"gen\">".$button."</span></td>
			</tr>
			</form>
		</table>
		<br />
		</center>
	";

}
//
// [END] Get Layers + Images!
//

//
// [START] Output
//
$useaction = "
	<tr>
	     <td class=\"row1\" height=\"100%\">
		<span class=\"gen\">
			".$useaction."
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

?>