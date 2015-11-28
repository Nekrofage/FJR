<?php
/***************************************************************************
 *                                house_index.php
 *                              -------------------
 *     begin                : Sat Dec 16 2000
 *     copyright            : (C) 2001 The phpBB Group
 *     email                : support@phpbb.com
 *
 *     $Id: lang_main.php,v 1.85.2.15 2003/06/10 00:31:19 psotfx Exp $
 *
 ****************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/


if ( !defined('IN_PHPBB') )
{
	die('Hacking attempt');
}

$template->set_filenames( array( 'house_index' => 'house_index_body.tpl' ) );

$template->pparse('house_index');
?>
