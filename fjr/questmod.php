<?php
/***************************************************************************
 *                              questmod.php
 *                            -------------------
 *   Version            : 1.0.0
 *   began              : Monday, July 12th, 2004
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

$file = "questmod.php";
$misc_path = "images/map_misc";

$qm_body = 'onUnload="javascript:window.open(\'./qm_chat.php?mode=logout\', \'QM_EXIT\', \'scrollbars=no, width=225, height=100\')"';

//
// [END] General Variables
//

$useaction = '

<center>
<table width="100%" height="100%" cellpadding="0" cellspacing="0">
<!--
<tr>
	<td class="row1" align="center">
		<img src="'.$phpbb_root_path.'images/map_misc/banner.gif">
	</td>
</tr>
-->
<tr>
	<td class="row1" align="center">
		<iframe src="./map.php" height="700" width="1024" scrolling="no" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" name="map"></iframe>
	</td>
</tr>
<!--
<tr>
	<td class="row1" width="100%" align="center"><span class="gen">
		<b>'.$lang['qm_chatbox'].'</b>
	</span></td>
</tr>
-->
<tr>
	<td width="100%" align="center" height="100%" class="row1">
		<table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td class="row1">
				<iframe src="./qm_chat.php?mode=getonlinelist" height="130" width="130" scrolling="yes" frameborder="0" marginwidth="0" marginheight="0" name="chatbox_onlinelist"></iframe>
			</td>
			<td class="row1">
				<iframe src="./qm_chat.php" height="130" width="510" scrolling="yes" frameborder="0" marginwidth="0" marginheight="0" name="chatbox"></iframe>
			</td>
		</tr>
		</table>
	</td>
</tr>
<tr>
	<td class="row1" align="center">
		<iframe src="./qm_chat.php?mode=input" height="25" width="640" scrolling="no" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" name="chatbox_input"></iframe>
	</td>
</tr>
<!--
<tr>
	<td class="row1" width="100%" align="center"><span class="gen">
		<b>'.$lang['qm_midiplayer'].'</b>
	</span></td>
</tr>

<tr>
	<td class="row1" align="center">
		<iframe src="./qm_midi.php" height="25" width="640" scrolling="no" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" name="midi"></iframe>
	</td>
</tr>
-->
</table>

';


//
// General thingies
//
   $template->assign_vars(array( 
	      	'USEACTION' => $useaction,
		'HEAD' => $head,
		'WINDOW_TITLE' => $questmod_config['mod_title'],
		'QM_BODY' => $qm_body
		   )); 
   $template->assign_block_vars('', array()); 

$template->pparse('body');

?>
