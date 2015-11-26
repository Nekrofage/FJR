<?php
/***************************************************************************
 *                              qm_midi.php
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

// Get language file :)
include($phpbb_root_path . 'language/lang_' . $board_config['default_lang'] . '/lang_quest_map.php');

$userdata = session_pagestart($user_ip, PAGE_INDEX);
init_userprefs($userdata);

//
//check if logged in
//
if( !$userdata['session_logged_in'] )
{
	header('Location: ' . append_sid("login.$phpEx?redirect=qm_midi.php", true));
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

$file = "qm_midi.php";
$misc_path = "images/map_misc";
$chars_path = "images/map_chars";
$midi_path = "images/map_midis";

//
// [END] General Variables
//

//
// [START] Get list of MIDIS
//
$dir = @opendir($phpbb_root_path . $midi_path);

while($file = @readdir($dir))
{
	if( !@is_dir(phpbb_realpath($phpbb_root_path . $midi_path . '/' . $file)) )
	{
		if($file != "index.htm")
		{
			$name = str_replace(".mid","",$file);
			$midis[] = $name;

			if(($midi == "") && ($action != "stop"))
			{ $midi = $file; $action = "change"; }
		}
	}
}

@closedir($dir);

sort($midis);
$list = "";

for( $i = 0; $i < count($midis); $i++ )
{
	$s = '';
	if($midis[$i] == $midi)
	{ $s = 'selected="SELECTED"'; }
	$list .= 	'<option value="'.$midis[$i].'.mid" '.$s.'>'.$midis[$i].'</option>';
}

$output = '<table width="100%" cellpadding=0 cellspacing=0 border=0>
	<tr>
		<td valign="top" width="50%" align="left"><span class="gen">
			&nbsp;'.$lang['midi_player'].'&nbsp;
		</span></td>
		<td width="40%" align="right">
			<form action="'.$file.'" method="post"><input type="hidden"name="action" value="change"><select name="midi" >'.$list.'</select>&nbsp;&nbsp;<input type="submit" value="Play" class="mainoption"></form>
		</td>
		<td width="10%" align="center">
			<form action="'.$file.'" method="post"><input type="hidden"name="action" value="stop"><input type="submit" value="Stop" class="mainoption"></form>
		</td>
	</tr>
	</table>
	';

//
// [END] Get list of MIDIS
//

//
// [START] Change MIDI
//
if($action == "change")
{
	$bgsound = '
			<SCRIPT TYPE="text/javascript">
			<!-- 
			var filename="'.$phpbb_root_path . $midi_path.'/'.$midi.'";
			if (navigator.appName == "Microsoft Internet Explorer")
			{ document.writeln (\'<BGSOUND SRC="\' + filename + \'" loop="infinite">\'); }
			else if (navigator.appName == "Netscape")
			{ document.writeln (\'<EMBED SRC="\' + filename + \'" AUTOSTART="TRUE" hidden="true" loop="true">\'); }
			// -->
			</SCRIPT>
			<NOSCRIPT>
			<BGSOUND SRC="'.$phpbb_root_path . $midi_path.'/'.$midi.'">
			</NOSCRIPT>
	';
}
//
// [END] Change MIDI
//

//
// [START] Stop MIDI
//
if($action == "stop")
{
	$bgsound = '';
}
//
// [END] Stop MIDI
//

//
// [START] Output
//
if($mode != "input")
{
	$useaction = "
		<tr>
		     <td class=\"row1\" height=\"100%\">
			<span class=\"gen\">
				".$bgsound."
				".$output."
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