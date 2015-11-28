<?php
/***************************************************************************
 *                                card_duel.php
 *                            -------------------
 *   begin                : 7/26/2006
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

//
// Start session management
//
$userdata = session_pagestart($user_ip, PAGE_INDEX);
init_userprefs($userdata);
//
// End session management
//



include($phpbb_root_path . 'includes/page_header.'.$phpEx);

// Sorry , only logged users ...
if ( !$userdata['session_logged_in'] )
{
	print '<center>You must be logged in!</center><br>';
	$template->set_filenames(array(
	"footer" => 'card_duel_footer.tpl')
	);
	$template->pparse("footer");
	exit();
}


$template->set_filenames(array(
	"header" => 'card_duel_header.tpl')
);

$template->assign_vars(array(
	"INDEX" => $lang['CD_Return_Card_Duel_Main'],
	"YOUR_CARD_DECKS" => $lang['CD_Your_Card_Decks'],
	"CARD_SHOPS" => $lang['CD_Card_Shops'],
	"YOUR_CARD_INV" => $lang['CD_Your_Card_Inv'],
	"RETURN_CARD_DUEL_MAIN" => $lang['CD_Return_Card_Duel_Main'])
);
//sending challenge to person
if ( isset($HTTP_POST_VARS['send_challenge']) || isset($HTTP_GET_VARS['send_challenge'])) 
{
	$template->set_filenames(array(
		"body" => 'card_duel_info_body.tpl')
	);
	
	
	if (check_deck($userdata['user_id'], $HTTP_POST_VARS['select3'],"Character") == true)
	{
		if(check_deck($userdata['user_id'], $HTTP_POST_VARS['select3'],"Card Backs") == true)
		{

			//cant challenge yourself.
			if ($HTTP_POST_VARS['select'] <> $userdata['user_id'])
			{
				//sql command
				$sql = "SELECT * FROM " . CARD_DUELS_GAMES_TABLE ." WHERE challenger_user_id='" . $userdata['user_id'] . "' AND oppoment_user_id='" . $HTTP_POST_VARS['select'] . "' AND game_status <>'0' AND game_status<>'1' AND game_status='3'";
			
					//if didn't succeed
				if ( ! ( $result = $db->sql_query($sql) ) ) 
				{ 
					  message_die(GENERAL_ERROR, 'Error retreiving game list data ', '', __LINE__, __FILE__, $sql); 
				} 
				
				$row = $db->sql_fetchrow($result);
				
				//user hasn't allerady challenged oppoment
				if ($row['id'] == "")
				{
					//sql command
					$sql = "INSERT INTO " . CARD_DUELS_GAMES_TABLE ." (challenger_user_id , oppoment_user_id, game_status) VALUES ('" . $userdata['user_id'] . "','" . $HTTP_POST_VARS['select'] . "','3')"; 
				
					//if didn't succeed
					if ( ! ( $result = $db->sql_query($sql) ) ) 
					{ 
						  message_die(GENERAL_ERROR, 'Error updating user data ', '', __LINE__, __FILE__, $sql); 
					} 
		
					//sql command (get game id)
					$sql = "SELECT * FROM " . CARD_DUELS_GAMES_TABLE ." WHERE challenger_user_id='" . $userdata['user_id'] . "' AND oppoment_user_id='" . $HTTP_POST_VARS['select'] . "' AND game_status='3'";
				
					//if didn't succeed
					if ( ! ( $result = $db->sql_query($sql) ) ) 
					{ 
						  message_die(GENERAL_ERROR, 'Error updating user data ', '', __LINE__, __FILE__, $sql); 
					} 
					
					$row = $db->sql_fetchrow($result);
					
					$template->assign_vars(array(
						"CD_BACK" => $lang['CD_Back'],
						"CD_INFO" => $lang['CD_Game_Challenge'])
					);
		
					shuffle_deck($userdata['user_id'], $row['id'],true,$HTTP_POST_VARS['select3']);
					set_start_hand($userdata['user_id'], $row['id']);
					//sql command
					$sql = "SELECT * FROM " . CARD_DUELS_GAMES_TABLE ." WHERE challenger_user_id='" . $userdata['user_id'] . "' AND oppoment_user_id='" . $HTTP_POST_VARS['select'] . "' AND game_status ='3'";
				
					//if didn't succeed
					if ( ! ( $result = $db->sql_query($sql) ) ) 
					{ 
						  message_die(GENERAL_ERROR, 'Error updating user data ', '', __LINE__, __FILE__, $sql); 
					} 
					//send user private message that challenge was sent.
					$pm_message = str_replace("%x",$userdata['username'],$lang['CD_Challnged_By']);
					insert_pm($HTTP_POST_VARS['select'], $pm_message, $lang['CD_Card_Challenge'], 2,1);
				}
				else
				{
					$template->assign_vars(array(
						"CD_BACK" => $lang['CD_Back'],
						"CD_INFO" => $lang['CD_Game_Not_Challenge'])
					);
				}
			}
			else
			{
				$template->assign_vars(array(
					"CD_BACK" => $lang['CD_Back'],
					"CD_INFO" => $lang['CD_Game_Cant_Challenge_Self'])
				);
			}
		
		}
		else
		{
			$template->assign_vars(array(
				"CD_BACK" => $lang['CD_Back'],
				"CD_INFO" => $lang['CD_Deck_Req_Back'] )
			);
		}
	}
	else
	{
		$template->assign_vars(array(
			"CD_BACK" => $lang['CD_Back'],
			"CD_INFO" => $lang['CD_Deck_Req_Char_Back'])
		);
	}
	
	$template->pparse("header");
	$template->pparse("body");
	
}
//declining challenge
elseif ( isset($HTTP_POST_VARS['decline'])|| isset($HTTP_GET_VARS['decline']) ) 
{

	$template->set_filenames(array(
		"body" => 'card_duel_info_body.tpl')
	);
	
	//sql command
	$sql = "SELECT * FROM " . CARD_DUELS_GAMES_TABLE . " WHERE id='" . $HTTP_POST_VARS['hidden'] . "'"; 

	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error deleting card game data ', '', __LINE__, __FILE__, $sql); 
	} 
	
	$row = $db->sql_fetchrow($result);

	//send user private message that challenge was declined

	$pm_message = $lang['CD_Challenge_Declined']  . $userdata['username'];
	insert_pm($row['challenger_user_id'], $pm_message, $lang['CD_Card_Challenge_Declined'], 2,1);
	
	
	//sql command
	$sql = "DELETE FROM " . CARD_DUELS_GAMES_TABLE . " WHERE id='" . $HTTP_POST_VARS['hidden'] . "' AND oppoment_user_id='" . $userdata['user_id']. "'"; 


	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error deleting card game data ', '', __LINE__, __FILE__, $sql); 
	} 
	
	$template->assign_vars(array(
		"CD_BACK" => $lang['CD_Back'],
		"CD_INFO" => $lang['CD_Game_Challenge_Declined'])
	);
		
	$template->pparse("header");
	$template->pparse("body");
}
//accepting challenge
elseif ( isset($HTTP_POST_VARS['accept'])|| isset($HTTP_GET_VARS['accept']) ) 
{
	$template->set_filenames(array(
		"body" => 'card_duel_info_body.tpl')
	);

	if (check_deck($userdata['user_id'], $HTTP_POST_VARS['select2'],"Character") == true)
	{
		if(check_deck($userdata['user_id'], $HTTP_POST_VARS['select2'],"Card Backs") == true)
		{
			//sql command
			$sql = "SELECT * FROM " . CARD_DUELS_GAMES_TABLE . " WHERE id='" . $HTTP_POST_VARS['hidden'] . "'";
		
			//if didn't succeed
			if ( ! ( $result = $db->sql_query($sql) ) ) 
			{ 
			   message_die(GENERAL_ERROR, 'Error retreiving card game data ', '', __LINE__, __FILE__, $sql); 
			} 

			$row = $db->sql_fetchrow($result);

			//set who's turn it is since game is begining by randomizing
			if ( rand(1,2) == 1)
			{
				$player_turn = $userdata['user_id'];
			}
			else
			{
				$player_turn = $row['challenger_user_id'];
			}
			$challenger_user_id = $row['challenger_user_id'];

			shuffle_deck($userdata['user_id'], $HTTP_POST_VARS['hidden'],false,$HTTP_POST_VARS['select2']);
			set_start_hand($userdata['user_id'], $HTTP_POST_VARS['hidden']);
			
			//sql command
			$sql = "UPDATE " . CARD_DUELS_GAMES_TABLE . " SET oppoment_user_id='" . $userdata['user_id'] . "', user_turn_id='" . $player_turn . "',game_status='1' WHERE id='" . $HTTP_POST_VARS['hidden'] . "' AND game_status <>'0' AND game_status<>'1'"; 
		
			//if didn't succeed
			if ( ! ( $result = $db->sql_query($sql) ) ) 
			{ 
			   message_die(GENERAL_ERROR, 'Error updating card game data ', '', __LINE__, __FILE__, $sql); 
			} 
		
		
			//send user private message that challenge was accepted
			$pm_message = $lang['CD_Challenge_Accepted'] . $userdata['username'];
			insert_pm($challenger_user_id, $pm_message, $lang['CD_Card_Challenge_Accepted'], 2,1);
			
			$template->assign_vars(array(
				"CD_BACK" => $lang['CD_Back'],
				"CD_INFO" => $lang['CD_Game_Challenge_Accepted'])
			);
		}
		else
		{
			$template->assign_vars(array(
				"CD_BACK" => $lang['CD_Back'],
				"CD_INFO" => $lang['CD_Deck_Error_Card_Back'])
			);
		}
	}
	else
	{
		$template->assign_vars(array(
			"CD_BACK" => $lang['CD_Back'],
			"CD_INFO" => $lang['CD_Deck_Error_Character'])
		);
	}
			$template->pparse("header");
			$template->pparse("body");

}
//posting a challenge (globally)
elseif ( isset($HTTP_POST_VARS['post_challenge']) || isset($HTTP_GET_VARS['post_challenge']) ) 
{

	$template->set_filenames(array(
		"body" => 'card_duel_info_body.tpl')
	);

	if (check_deck($userdata['user_id'], $HTTP_POST_VARS['select2'],"Character") == true)
	{
		if(check_deck($userdata['user_id'], $HTTP_POST_VARS['select2'],"Card Backs") == true)
		{

			//sql command
			$sql = "SELECT * FROM " . CARD_DUELS_GAMES_TABLE ." WHERE challenger_user_id='" . $userdata['user_id'] . "' AND oppoment_user_id='0' AND game_status='2'";
		
				//if didn't succeed
			if ( ! ( $result = $db->sql_query($sql) ) ) 
			{ 
				  message_die(GENERAL_ERROR, 'Error retreiving game list data ', '', __LINE__, __FILE__, $sql); 
			} 
			
			$row = $db->sql_fetchrow($result);
			
			//user has no global challenges posted
			if ($row['id'] == "")
			{
			
		
				//sql command
				$sql = "INSERT INTO " . CARD_DUELS_GAMES_TABLE ." (challenger_user_id , oppoment_user_id, game_status) VALUES ('" . $userdata['user_id'] . "','0','2')"; 
			
				//if didn't succeed
				if ( ! ( $result = $db->sql_query($sql) ) ) 
				{ 
					  message_die(GENERAL_ERROR, 'Error updating user data ', '', __LINE__, __FILE__, $sql); 
				} 
		
				//sql command (get game id)
				$sql = "SELECT * FROM " . CARD_DUELS_GAMES_TABLE ." WHERE challenger_user_id='" . $userdata['user_id'] . "' AND game_status='2'";
			
				//if didn't succeed
				if ( ! ( $result = $db->sql_query($sql) ) ) 
				{ 
					  message_die(GENERAL_ERROR, 'Error updating user data ', '', __LINE__, __FILE__, $sql); 
				} 
				
				$row = $db->sql_fetchrow($result);
				
				shuffle_deck($userdata['user_id'], $row['id'],true,$HTTP_POST_VARS['select2']);
				set_start_hand($userdata['user_id'], $row['id']);
				
				$template->assign_vars(array(
					"CD_BACK" => $lang['CD_Back'],
					"CD_INFO" => $lang['CD_Game_Posted'])
				);
			}
			else
			{
				$template->assign_vars(array(
					"CD_BACK" => $lang['CD_Back'],
					"CD_INFO" => $lang['CD_Game_Not_Posted'])
				);
			}
		}
		else
		{
			$template->assign_vars(array(
				"CD_BACK" => $lang['CD_Back'],
				"CD_INFO" => $lang['CD_Deck_Error_Card_Back'])
			);
		}
	}
	else
	{
		$template->assign_vars(array(
			"CD_BACK" => $lang['CD_Back'],
			"CD_INFO" => $lang['CD_Deck_Error_Character'])
		);
	}
	$template->pparse("header");
	$template->pparse("body");
}
else // listing challenges
{
	$template->set_filenames(array(
		"body" => 'card_duel_body.tpl')
	);
	
	//sql command
	$sql = "SELECT * FROM " . CARD_DUELS_DECK_NAMES_TABLE . " WHERE user_id='" . $userdata['user_id'] . "'"; 
	
	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error retrieving decks data ', '', __LINE__, __FILE__, $sql); 
	} 
	
	//get all records
	while ( $row = $db->sql_fetchrow($result) ) 
	{ 
	   $option_value = $option_value . '<option value="' . $row['deck_name'] . '">' . $row['deck_name'] . '</option>'; 
	} 
		
	//sql command
	$sql = "SELECT * FROM " . USERS_TABLE . " WHERE user_id > 1 ORDER BY username ASC";

		//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
		  message_die(GENERAL_ERROR, 'Error retreiving user data ', '', __LINE__, __FILE__, $sql); 
	} 

	while( $row = $db->sql_fetchrow($result) )
	{
		$option_value1 = $option_value1 . '<option value="' . $row['user_id'] . '">' . $row['username'] . ' </option>';
	}
	
	$template->assign_vars(array(
		"CD_CHALLENGEE_NAMES" => $option_value1,
		"CD_CARD_DECKS" => $option_value,
		"USERNAME" => $lang['CD_Username'],
		"DECK" => $lang['CD_Deck'],
		"CHALLENGE" => $lang['CD_Challenge'],
		"POST_GLOBAL_CHALLENGE" => $lang['CD_Global_Challenge'],
		"OPPOMENT" =>$lang['CD_Oppoment'],
		"PLAY" => $lang['CD_Play'],
		"CHALLENGER" => $lang['CD_Challenger'],
		"ACTION" => $lang['CD_Action'],
		"ACCEPT" => $lang['CD_Accept'],
		"DECLINE" => $lang['CD_Decline'])
	);

	//sql command
	$sql = "SELECT * FROM " . CARD_DUELS_GAMES_TABLE ." WHERE game_status = '1' AND (oppoment_user_id='" . $userdata['user_id'] . "' OR challenger_user_id='" . $userdata['user_id'] . "')";

		//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
		  message_die(GENERAL_ERROR, 'Error retreiving game challenges data ', '', __LINE__, __FILE__, $sql); 
	} 
	
	
	
	while ( $row = $db->sql_fetchrow($result) )
	{
		
		//get oppoments user_id
		if ($row['challenger_user_id'] == $userdata['user_id'])
		{
			$oppoment_user_id = $row['oppoment_user_id'];
		}
		else
		{
			$oppoment_user_id = $row['challenger_user_id'];
		}
		
		//sql command
		$sql2 = "SELECT * FROM " . USERS_TABLE . " WHERE user_id='" . $oppoment_user_id . "'";
	
			//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
			  message_die(GENERAL_ERROR, 'Error retreiving user data ', '', __LINE__, __FILE__, $sql); 
		} 
		
		$row2 = $db->sql_fetchrow($result2);

		$template->assign_block_vars('games',array( 'OPPOMENT' => '<a href="profile.php?mode=viewprofile&u=' . $oppoment_user_id . '">' . $row2['username'] . '</a>',
													'PLAY' => '<a href="card_duel_game.php?game_id=' . $row['id'] . '">' . $lang['CD_Play'] . '</a>')
		);
	}

	//sql command
	$sql = "SELECT * FROM " . CARD_DUELS_GAMES_TABLE ." WHERE game_status <> '1' AND game_status <> '0' AND challenger_user_id <> '" . $userdata['user_id'] . "'";

		//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
		  message_die(GENERAL_ERROR, 'Error retreiving game challenges data ', '', __LINE__, __FILE__, $sql); 
	} 
	
	while ( $row = $db->sql_fetchrow($result) )
	{
		
		//sql command
		$sql2 = "SELECT * FROM " . USERS_TABLE . " WHERE user_id='" . $row['challenger_user_id'] . "'";
	
			//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
			  message_die(GENERAL_ERROR, 'Error retreiving user data ', '', __LINE__, __FILE__, $sql); 
		} 
		
		$row2 = $db->sql_fetchrow($result2);

		if ($row['oppoment_user_id'] == '0')
		{
		
			$template->assign_block_vars('challenges',array( 'USER_NAME' => '<a href="profile.php?mode=viewprofile&u=' . $row['challenger_user_id'] . '">' . $row2['username'] . '</a>',
														  'ACTION' => '<a href="card_duel.php?accept=' . $row['id'] . '">' . $lang['CD_Accept_Challenge'] . '</a>',
														'GAME_ID' => $row['id'])
			); 
		}
		else
		{
			$template->assign_block_vars('challenges',array( 'USER_NAME' => '<a href="profile.php?mode=viewprofile&u=' . $row['challenger_user_id'] . '">' . $row2['username'] . '</a>',
														  'ACTION' => '<a href="card_duel.php?accept=' . $row['id'] . '">' . $lang['CD_Accept_Challenge'] . '</a> | <a href="card_duel.php?decline=' . $row['id'] . '">' . $lang['CD_Decline_Challenge'] . '</a>',
														  'GAME_ID' => $row['id'])
			); 
		}
		
	}
	
	$template->pparse("header");
	$template->pparse("body");
}

$template->set_filenames(array(
	"footer" => 'card_duel_footer.tpl')
);

$template->pparse("footer");

include($phpbb_root_path . 'includes/page_tail.'.$phpEx);

?>