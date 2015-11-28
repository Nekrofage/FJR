<?php
/***************************************************************************
 *                                card_duel_game_messages.php
 *                            -------------------
 *   begin                : 8/02/2006
 *   copyright            : (C) 2006 William Hughes aka Sim
 *   email                : william@po2mob.com
 *
 *
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

/*	game status 0 = game over
	game status 1 = accepted
	game status 2 = global challenge
	game status 3 = challenged 
*/

define('IN_PHPBB', true);
$phpbb_root_path = './';
include($phpbb_root_path . 'extension.inc');
include($phpbb_root_path . 'common.'.$phpEx);
include($phpbb_root_path . 'includes/card_duel_constants.'.$phpEx);
include($phpbb_root_path . 'includes/card_duel_functions.'.$phpEx);
include($phpbb_root_path . 'language/lang_english/lang_duel_cards.php');

//sql command get cards in hand
$sql = "SELECT * FROM " . CARD_DUELS_GAMES_MESSAGES_TABLE . " WHERE user_id='" . $HTTP_GET_VARS['user_id'] . "' AND game_id='" . $HTTP_GET_VARS['game_id'] . "' ORDER BY id DESC"; 

//if didn't succeed
if ( ! ( $result = $db->sql_query($sql) ) ) 
{ 
   message_die(GENERAL_ERROR, 'Error retrieving decks data ', '', __LINE__, __FILE__, $sql); 
} 

//get all records
while ( $row = $db->sql_fetchrow($result) ) 
{ 
	print $row['message'].'<br>';
}
?>