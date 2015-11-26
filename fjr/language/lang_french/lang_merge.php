<?php
/***************************************************************************
 *                         lang_merge.php [french]
 *                            -------------------
 *   begin                : Wednesday Apr 28, 2004
 *   copyright            : (C) 2004 Xpert
 *   email                : xpert@phpbbguru.net
 *
 *   $Id: lang_merge.php,v 1.2.0 2004/12/14 8:54 xpert Exp $
 *
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/

/* 
	Important note:
	If you want to customize message separator, be sure that you use \r\n as a new line.
	Using \n will cause problems with smilies parsing. I've found no explanation for this
	phenomena, but text data at database dumps contains \r\n, so i think that's ok.  	
*/

// For Admin Center

$lang['Merge_time_limit'] = 'Dur�e limite du temps de fusion des posts';
$lang['Merge_time_limit_explain'] = 'Dur�e (en heures) pendant laquelle seront fusionn�s les posts d\'un membre. Laisser vide ou mettre 0 pour d�sactiver la fusion.';

$lang['Merge_flood_interval'] = 'Intervalle de flood pour la fusion';
$lang['Merge_flood_interval_explain'] = 'Nombre de secondes d\'attente d\'un membre entre les posts d\'un m�me topic.';


// Basic language variables

// The string that separates original message and added one. 
// Parametres %s are: day, hour, minute and second strings. 
// For example, %s%s%s%s will give you, 1 day 3 hours 5 minutes
// 27 seconds.

$lang['Merge_separator'] = "\r\n\r\n[color=red][size=9][b]Post� apr�s%s%s%s%s :[/b][/size][/color]\r\n\r\n";

// Subject of the added message 

$lang['Merge_post_subject'] = "[i]%s[/i]\r\n\r\n";


// Next 4 functions are lexical analysers. 
// They are specific for every language, that's why they are here.

function seconds_st($nm)
{
	switch ($nm)
	{
		case 1: $st = 'seconde'; break;
		default: $st = 'secondes'; break;
	}
	return ' ' . $nm . ' ' . $st;
}

function minutes_st($nm)
{
	switch ($nm)
	{
		case 1: $st = 'minute'; break;
		default: $st = 'minutes'; break;
	}
	return ' ' . $nm . ' ' . $st;
}

function hours_st($nm)
{
	switch ($nm)
	{
		case 1: $st = 'heure'; break;
		default: $st = 'heures'; break;
	}
	return ' ' . $nm . ' ' . $st;
}

function days_st($nm)
{
	switch ($nm)
	{
		case 1: $st = 'jour'; break;
		default: $st = 'jours'; break;
	}
	return ' ' . $nm . ' ' . $st;
}

?>