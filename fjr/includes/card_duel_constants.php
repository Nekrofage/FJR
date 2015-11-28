<?php
/***************************************************************************
 *                                 card_duel_constants.php
 *                            -------------------
 *   begin                : 07/20/2006
 *   copyright            : William Hughes aka Sim
 *
 *
 ***************************************************************************/
 
 
if ( !defined('IN_PHPBB') )
{
	die('Hacking attempt');
}


// Let's define the tables
define('CARD_DUELS_ELEMENTS_TABLE', $table_prefix.'card_duel_elements');
define('CARD_DUELS_SHOPS_TABLE', $table_prefix.'card_duel_shops');
define('CARD_DUELS_CARD_TYPES_TABLE', $table_prefix.'card_duel_card_types');
define('CARD_DUELS_CARDS_TABLE', $table_prefix.'card_duel_cards');

define('CARD_DUELS_USER_CARDS_TABLE', $table_prefix.'card_duel_user_cards');
define('CARD_DUELS_DECK_NAMES_TABLE', $table_prefix.'card_duel_deck_names');
define('CARD_DUELS_DECKS_TABLE', $table_prefix.'card_duel_decks');
define('CARD_DUELS_GAME_DECKS_TABLE', $table_prefix.'card_duel_game_decks');
define('CARD_DUELS_GAMES_TABLE', $table_prefix.'card_duel_games');
define('CARD_DUELS_GAMES_MESSAGES_TABLE', $table_prefix.'card_duel_game_messages');
define('CARD_DUELS_GAMER_STATS_TABLE', $table_prefix.'card_duel_gamer_stats');



define('CARD_DUELS_RESELL_CARD_PERC', 0.75);




?>