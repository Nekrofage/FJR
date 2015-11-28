<?php
/***************************************************************************
 *                                card_duel_functions.php
 *                            -------------------
 *   begin                : 7/26/2006
 *   copyright            : (C) 2006 William Hughes aka Sim
 *   email                : william@po2mob.com
 *   website			  : www.po2mob.com
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


include($phpbb_root_path . 'includes/functions_post.'.$phpEx);
include($phpbb_root_path . 'includes/bbcode.'.$phpEx);


//checks if user is trying to play the same card again. 
//pressing refresh after using a card. or typing url of
//used card (we don't want that now do we ;\)
function card_hack_check_pass($user_id, $card_id)
{
	global $db;
	
	//sql command get card
	$sql2 = "SELECT * FROM " . CARD_DUELS_GAME_DECKS_TABLE . " WHERE id='" . $card_id . "'"; 
	
	//if didn't succeed
	if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error retrieving decks data ', '', __LINE__, __FILE__, $sql2); 
	} 
	
	$row2 = $db->sql_fetchrow($result2);
	
	//card is in play (we passed protection)
	if ($row2['in_play'] == 1)
	{	
		return true;
	}
	else
	{
		return false;
	}
}

function check_deck_card_type($user_id,$deck_name,$user_card_id, $card_type)
{
	global $db;
	$deck_check = true;
	if ($card_type == "Character" || $card_type == "Card-Back")
	{
		//sql command
		$sql2 = "SELECT * FROM " . CARD_DUELS_DECKS_TABLE . " WHERE id='" . $user_card_id . "'";
	
		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error retrieving user cards data ', '', __LINE__, __FILE__, $sql2); 
		}
		print $card_type;
		//get all records
		while ( $row2 = $db->sql_fetchrow($result2) ) 
		{ 
			//sql command
			$sql = "SELECT * FROM " . CARD_DUELS_USER_CARDS_TABLE . " WHERE id='" . $row2['user_card_id'] . "'";
		
			//if didn't succeed
			if ( ! ( $result = $db->sql_query($sql) ) ) 
			{ 
			   message_die(GENERAL_ERROR, 'Error retrieving user cards data ', '', __LINE__, __FILE__, $sql); 
			}
			
			//get all records
			$row = $db->sql_fetchrow($result);
			
			print $row['card_type'];
			if ($card_type == $row2['card_type'])
			{
				$deck_check = false;
				break;
			}
			else
			{
				$deck_check = true;
				break;
			}
		}
		
	}
	else
	{
		$deck_check = true;
	}
	return $deck_check;
}


function check_deck($user_id, $deck_name, $card_type)
{
	global $db;
	//sql command
	$sql = "SELECT * FROM " . CARD_DUELS_DECKS_TABLE . " WHERE user_id='" . $user_id . "' AND deck_name='" . $deck_name . "'"; 

	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error retrieving decks data ', '', __LINE__, __FILE__, $sql); 
	} 
	
	//get all records

	while ( $row = $db->sql_fetchrow($result) ) 
	{ 
		//sql command
		$sql2 = "SELECT * FROM " . CARD_DUELS_USER_CARDS_TABLE . " WHERE id='" . $row['user_card_id'] . "'"; 
		
		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error retrieving card data ', '', __LINE__, __FILE__, $sql2); 
		} 
		
		//get record
		$row2 = $db->sql_fetchrow($result2);

		//sql command
		$sql2 = "SELECT * FROM " . CARD_DUELS_CARDS_TABLE . " WHERE id='" . $row2['card_id'] . "'"; 
		
		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error retrieving card data ', '', __LINE__, __FILE__, $sql2); 
		} 

		//get record
		$row2 = $db->sql_fetchrow($result2);

		if ($row2['card_type'] == $card_type)
		{
			$type_check=true;
			break;
		}
	}
	
	return $type_check;
}


function set_message($user_id, $game_id, $message)
{
	global $db;

	//sql command insert message
	$sql = "INSERT INTO " . CARD_DUELS_GAMES_MESSAGES_TABLE ." (message , game_id, user_id) VALUES ('" . $message . "','" . $game_id . "','" . $user_id . "')";
	
	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
		  message_die(GENERAL_ERROR, 'Error inserting message data ', '', __LINE__, __FILE__, $sql2); 
	} 

}

function check_enough_mp($user_id, $card_mp, $mp)
{

	if ($card_mp > $mp)
	{
		return false;
	}
	else
	{
		return true;
	}

}

function get_wins($user_id)
{
	global $db;
	//sql command
	$sql2 = "SELECT * FROM " . USERS_TABLE . " WHERE user_id='" . $user_id . "'"; 
	
	//if didn't succeed
	if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error retrieving users data ', '', __LINE__, __FILE__, $sql2); 
	} 
	
	$row2 = $db->sql_fetchrow($result2);
	
	return $row2['card_duel_wins'];
}

function get_loss($user_id)
{
	global $db;
	//sql command
	$sql2 = "SELECT * FROM " . USERS_TABLE . " WHERE user_id='" . $user_id . "'"; 
	
	//if didn't succeed
	if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error retrieving users data ', '', __LINE__, __FILE__, $sql2); 
	} 
	
	$row2 = $db->sql_fetchrow($result2);
	
	return $row2['card_duel_loss'];
}

function end_game($user_id, $oppoment_id, $winner_id,$game_id)
{
	global $db;

	if ($winner_id == $user_id)
	{
		//update wins
		$sql2 = "UPDATE " . USERS_TABLE . " SET card_duel_wins='" . (get_wins($user_id) + 1) . "' WHERE user_id='" . $user_id . "'";
		
		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
			  message_die(GENERAL_ERROR, 'Error updating users data ', '', __LINE__, __FILE__, $sql2); 
		} 
		
		
		//update loss
		$sql2 = "UPDATE " . USERS_TABLE . " SET card_duel_loss='" . (get_loss($oppoment_id) + 1) . "' WHERE user_id='" . $oppoment_id . "'";
		
		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
			  message_die(GENERAL_ERROR, 'Error updating users data ', '', __LINE__, __FILE__, $sql2); 
		} 
		
		set_message($user_id, $game_id, "You have won the game.");
		set_message($oppoment_id, $game_id, "You have lost the game.");
	}
	else
	{
		//update wins
		$sql2 = "UPDATE " . USERS_TABLE . " SET card_duel_wins='" . (get_wins($oppoment_id) + 1) . "' WHERE user_id='" . $oppoment_id . "'";
		
		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
			  message_die(GENERAL_ERROR, 'Error updating users data ', '', __LINE__, __FILE__, $sql2); 
		} 
		
		
		//update loss
		$sql2 = "UPDATE " . USERS_TABLE . " SET card_duel_loss='" . (get_loss($user_id) + 1) . "' WHERE user_id='" . $user_id . "'";
		
		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
			  message_die(GENERAL_ERROR, 'Error updating users data ', '', __LINE__, __FILE__, $sql2); 
		} 
		
		set_message($user_id, $game_id, "You have lost the game.");
		set_message($oppoment_id, $game_id, "You have won the game.");
	}
	

	//update game info.
	$sql2 = "UPDATE " . CARD_DUELS_GAMES_TABLE . " SET game_status='0' WHERE id='" . $game_id . "'";
	
	//if didn't succeed
	if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
	{ 
		  message_die(GENERAL_ERROR, 'Error updating games data ', '', __LINE__, __FILE__, $sql2); 
	} 


}


function return_name_from_id($user_id)
{
	global $db;
	
	//sql command get card
	$sql2 = "SELECT * FROM " . USERS_TABLE . " WHERE user_id='" . $card_id . "'"; 
	
	//if didn't succeed
	if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error retrieving users data ', '', __LINE__, __FILE__, $sql2); 
	} 
	
	$row2 = $db->sql_fetchrow($result2);
	
	return $row2['username'];

}

function check_for_winner($hp)
{
	if ($hp <= 0)
	{
		return true;
	}
	else
	{
		return false;
	}
	
}

function pass_same_card_type_check($user_id, $game_id, $card_id)
{

	global $db;
	$boo = true;
	$skip = true;
	//sql command get cards in hand
	$sql = "SELECT * FROM " . CARD_DUELS_GAME_DECKS_TABLE . " WHERE user_id='" . $user_id . "' AND game_id='" . $game_id . "' AND id='" . $card_id . "'"; 
	
	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error retrieving decks data ', '', __LINE__, __FILE__, $sql); 
	} 
	
	//get record
	$row = $db->sql_fetchrow($result);
	
	//sql command
	$sql2 = "SELECT * FROM " . CARD_DUELS_USER_CARDS_TABLE . " WHERE id='" . $row['user_card_id'] . "'"; 
		
	//if didn't succeed
	if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
	{ 
		message_die(GENERAL_ERROR, 'Error retrieving card data ', '', __LINE__, __FILE__, $sql2); 
	} 

	//get record
	$row2 = $db->sql_fetchrow($result2);

	//sql command
	$sql2 = "SELECT * FROM " . CARD_DUELS_CARDS_TABLE . " WHERE id='" . $row2['card_id'] . "'"; 

	//if didn't succeed
	if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error retrieving card data ', '', __LINE__, __FILE__, $sql2); 
	} 

	//get record
	$row2 = $db->sql_fetchrow($result2);
	
	//these type of cards are allowed to have more then 1 on field
	if ( ($row2['card_type'] == "Summon") || ($row2['card_type'] == "Potion") || ($row2['card_type'] == "Magic") )
	{
		$skip = false;
	}
	else
	{
		$card_type = $row2['card_type'];
		$skip = true;
	}
	
	if ($skip = true)
	{
		//sql command get cards in hand
		$sql = "SELECT * FROM " . CARD_DUELS_GAME_DECKS_TABLE . " WHERE user_id='" . $user_id . "' AND game_id='" . $game_id . "' AND in_play='1'"; 
		
		//if didn't succeed
		if ( ! ( $result = $db->sql_query($sql) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error retrieving decks data ', '', __LINE__, __FILE__, $sql); 
		} 

		//get all records
		while ( $row = $db->sql_fetchrow($result) ) 
		{ 
			//sql command
			$sql2 = "SELECT * FROM " . CARD_DUELS_USER_CARDS_TABLE . " WHERE id='" . $row['user_card_id'] . "'"; 
			
			//if didn't succeed
			if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
			{ 
			   message_die(GENERAL_ERROR, 'Error retrieving card data ', '', __LINE__, __FILE__, $sql2); 
			} 
			
			//get record
			$row2 = $db->sql_fetchrow($result2);
	
			//sql command
			$sql2 = "SELECT * FROM " . CARD_DUELS_CARDS_TABLE . " WHERE id='" . $row2['card_id'] . "'"; 
	
			//if didn't succeed
			if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
			{ 
			   message_die(GENERAL_ERROR, 'Error retrieving card data ', '', __LINE__, __FILE__, $sql2); 
			} 
	
			//get record
			$row2 = $db->sql_fetchrow($result2);
			//print $row2['card_type'];
			if ($row2['card_type'] == $card_type)
			{
				$boo = false;
				return false;
			}
		}
	}
	
	if ($boo == true)
	{
		return true;
	}
}

function alter_mp($mp, $card_id)
{
	global $db;
	//sql command
	$sql = "SELECT * FROM " . CARD_DUELS_CARDS_TABLE . " WHERE id='" . $card_id . "'"; 
	
	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error retrieving card data ', '', __LINE__, __FILE__, $sql); 
	} 
	
	//get record
	$row = $db->sql_fetchrow($result); 
	
	$mp = $mp - $row['mp_cost'];
	return $mp;
}


function update_hp($hp, $oppoment_vr, $game_id)
{
	global $db;
	
	if ($oppoment_vr == $true)
	{

		$sql2 = "UPDATE " . CARD_DUELS_GAMES_TABLE . " SET challenger_HP='" . $hp . "' WHERE id='" . $game_id . "'";
		
		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
			  message_die(GENERAL_ERROR, 'Error updating game challenges data ', '', __LINE__, __FILE__, $sql2); 
		} 
	}
	else
	{
		$sql2 = "UPDATE " . CARD_DUELS_GAMES_TABLE . " SET oppoment_HP='" . $hp . "' WHERE id='" . $game_id . "'";
	
		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
			  message_die(GENERAL_ERROR, 'Error updating game challenges data ', '', __LINE__, __FILE__, $sql2); 
		} 
	}
}



function update_mp($mp, $oppoment_vr, $game_id)
{
	global $db;
	
	if ($oppoment_vr == $true)
	{

		$sql2 = "UPDATE " . CARD_DUELS_GAMES_TABLE . " SET challenger_MP='" . $mp . "' WHERE id='" . $game_id . "'";
		
		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
			  message_die(GENERAL_ERROR, 'Error updating game challenges data ', '', __LINE__, __FILE__, $sql2); 
		} 
	}
	else
	{
		$sql2 = "UPDATE " . CARD_DUELS_GAMES_TABLE . " SET oppoment_MP='" . $mp . "' WHERE id='" . $game_id . "'";
	
		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
			  message_die(GENERAL_ERROR, 'Error updating game challenges data ', '', __LINE__, __FILE__, $sql2); 
		} 
	}
}

function play_card($card_id)
{
	global $db;
	$sql2 = "UPDATE " . CARD_DUELS_GAME_DECKS_TABLE . " SET in_play='1' WHERE id='" . $card_id . "'";

	//if didn't succeed
	if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
	{ 
		  message_die(GENERAL_ERROR, 'Error updating deck data ', '', __LINE__, __FILE__, $sql2); 
	} 
}


function draw_card($game_id, $user_id)
{
	global $db;
	//sql command
	$sql = "SELECT * FROM " . CARD_DUELS_GAME_DECKS_TABLE . " WHERE user_id='" . $user_id . "' AND game_id='" . $game_id . "' AND in_play='3'"; 
	
	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error retrieving decks data ', '', __LINE__, __FILE__, $sql); 
	} 

	//get record
	$row = $db->sql_fetchrow($result); 

	$sql2 = "UPDATE " . CARD_DUELS_GAME_DECKS_TABLE . " SET in_play='2' WHERE id='" . $row['id'] . "'";
	
	//if didn't succeed
	if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
	{ 
		  message_die(GENERAL_ERROR, 'Error retreiving game challenges data ', '', __LINE__, __FILE__, $sql2); 
	} 

	//update drawn card so user cant draw card again
	$sql2 = "UPDATE " . CARD_DUELS_GAMES_TABLE . " SET drawn_card='1'  WHERE id='" . $game_id . "'";
	
	//if didn't succeed
	if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
	{ 
		  message_die(GENERAL_ERROR, 'Error retreiving game challenges data ', '', __LINE__, __FILE__, $sql2); 
	} 
	
	return 1;
}
function check_win($hp)
{

	if ($hp > 0)
	{
		return false;
	}
	else
	{
		return true;
	}
}

function set_card_length($card_id)
{
	global $db;
	
	//sql command get card
	$sql2 = "SELECT * FROM " . CARD_DUELS_GAME_DECKS_TABLE . " WHERE id='" . $card_id . "'"; 
	
	//if didn't succeed
	if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error retrieving decks data ', '', __LINE__, __FILE__, $sql2); 
	} 
	
	$row2 = $db->sql_fetchrow($result2);

	if ($row2['dur'] <> 0)
	{
		$dur = $dur - 1;
		
		//don't want card to equal 0 as zero means unlimited play.
		if ($dur > 0)
		{
			//sql command 
			$sql2 = "UPDATE " . CARD_DUELS_GAME_DECKS_TABLE . " SET dur='" . $dur . "' WHERE id='" . $card_id . "'"; 
			
			//if didn't succeed
			if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
			{ 
			   message_die(GENERAL_ERROR, 'Error retrieving decks data ', '', __LINE__, __FILE__, $sql2); 
			} 
		}
		else
		{

			//sql command 
			$sql2 = "UPDATE " . CARD_DUELS_GAME_DECKS_TABLE . " SET in_play='0' AND dur='" . $dur . "' WHERE id='" . $card_id . "'"; 
			
			//if didn't succeed
			if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
			{ 
			   message_die(GENERAL_ERROR, 'Error retrieving decks data ', '', __LINE__, __FILE__, $sql2); 
			} 
		}
	}
}

function discard_card($card_id)
{
	global $db;
	//sql command 
	$sql2 = "UPDATE " . CARD_DUELS_GAME_DECKS_TABLE . " SET in_play='0' WHERE id='" . $card_id . "'"; 
	
	//if didn't succeed
	if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error retrieving decks data ', '', __LINE__, __FILE__, $sql2); 
	} 
}

function get_attack_bonus($game_id,$your_id)
{
	global $db;
	

	//sql command get cards in hand
	$sql = "SELECT * FROM " . CARD_DUELS_GAME_DECKS_TABLE . " WHERE user_id='" . $your_id . "' AND game_id='" . $game_id . "' AND in_play='1'"; 
	
	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error retrieving decks data ', '', __LINE__, __FILE__, $sql); 
	} 

	//get all records
	while ( $row = $db->sql_fetchrow($result) ) 
	{ 

		//sql command
		$sql2 = "SELECT * FROM " . CARD_DUELS_USER_CARDS_TABLE . " WHERE id='" . $row['user_card_id'] . "'"; 
		
		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error retrieving card data ', '', __LINE__, __FILE__, $sql2); 
		} 
		
		//get record
		$row2 = $db->sql_fetchrow($result2);

		//sql command
		$sql2 = "SELECT * FROM " . CARD_DUELS_CARDS_TABLE . " WHERE id='" . $row2['card_id'] . "'"; 

		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error retrieving card data ', '', __LINE__, __FILE__, $sql2); 
		} 

		//get record
		$row2 = $db->sql_fetchrow($result2);
		
		switch ($row2['card_type'])
		{
			case "Body Armor";
				$attack_bonus = $attack_bonus + $row2['item_attack'];
				break;
			case "Shield";
				$attack_bonus = $attack_bonus + $row2['item_attack'];
				break;
			case "Helmet";
				$attack_bonus = $attack_bonus + $row2['item_attack'];
				break;
			case "Gloves";
				$attack_bonus = $attack_bonus + $row2['item_attack'];
				break;
			case "Boots";
				$attack_bonus = $attack_bonus + $row2['item_attack'];
				break;
			case "Accessory";
				$attack_bonus = $attack_bonus + $row2['item_attack'];
				break;
			default;
		}
	}
	
	return $attack_bonus;
}

function get_magi_attack_bonus($game_id,$your_id)
{
	global $db;
	
	//sql command get cards in hand
	$sql = "SELECT * FROM " . CARD_DUELS_GAME_DECKS_TABLE . " WHERE user_id='" . $your_id . "' AND game_id='" . $game_id . "' AND in_play='1'"; 
	
	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error retrieving decks data ', '', __LINE__, __FILE__, $sql); 
	} 

	//get all records
	while ( $row = $db->sql_fetchrow($result) ) 
	{ 
		//sql command
		$sql2 = "SELECT * FROM " . CARD_DUELS_USER_CARDS_TABLE . " WHERE id='" . $row['user_card_id'] . "'"; 
		
		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error retrieving card data ', '', __LINE__, __FILE__, $sql2); 
		} 
		
		//get record
		$row2 = $db->sql_fetchrow($result2);

		//sql command
		$sql2 = "SELECT * FROM " . CARD_DUELS_CARDS_TABLE . " WHERE id='" . $row2['card_id'] . "'"; 

		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error retrieving card data ', '', __LINE__, __FILE__, $sql2); 
		} 

		//get record
		$row2 = $db->sql_fetchrow($result2);
		
		switch ($row2['card_type'])
		{
			case "Body Armor";
				$attack_bonus = $attack_bonus + $row2['item_magic_attack'];
				break;
			case "Shield";
				$attack_bonus = $attack_bonus + $row2['item_magic_attack'];
				break;
			case "Helmet";
				$attack_bonus = $attack_bonus + $row2['item_magic_attack'];
				break;
			case "Gloves";
				$attack_bonus = $attack_bonus + $row2['item_magic_attack'];
				break;
			case "Boots";
				$attack_bonus = $attack_bonus + $row2['item_magic_attack'];
				break;
			case "Accessory";
				$attack_bonus = $attack_bonus + $row2['item_magic_attack'];
				break;
			default;
		}
	}
	
	return $attack_bonus;
}

function get_opp_def($game_id,$oppoment_id)
{
	global $db;
	

	//sql command get cards in hand
	$sql = "SELECT * FROM " . CARD_DUELS_GAME_DECKS_TABLE . " WHERE user_id='" . $oppoment_id . "' AND game_id='" . $game_id . "' AND in_play='1'"; 
	
	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error retrieving decks data ', '', __LINE__, __FILE__, $sql); 
	} 

	//get all records
	while ( $row = $db->sql_fetchrow($result) ) 
	{ 
		//sql command
		$sql2 = "SELECT * FROM " . CARD_DUELS_USER_CARDS_TABLE . " WHERE id='" . $row['user_card_id'] . "'"; 
		
		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error retrieving card data ', '', __LINE__, __FILE__, $sql2); 
		} 
		
		//get record
		$row2 = $db->sql_fetchrow($result2);

		//sql command
		$sql2 = "SELECT * FROM " . CARD_DUELS_CARDS_TABLE . " WHERE id='" . $row2['card_id'] . "'"; 

		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error retrieving card data ', '', __LINE__, __FILE__, $sql2); 
		} 

		//get record
		$row2 = $db->sql_fetchrow($result2);
		
		switch ($row2['card_type'])
		{
			case "Body Armor";
				$defense = $defense + $row2['item_defense'];
				break;
			case "Shield";
				$defense = $defense + $row2['item_defense'];
				break;
			case "Helmet";
				$defense = $defense + $row2['item_defense'];
				break;
			case "Gloves";
				$defense = $defense + $row2['item_defense'];
				break;
			case "Boots";
				$defense = $defense + $row2['item_defense'];
				break;
			case "Accessory";
				$defense = $defense + $row2['item_defense'];
				break;
			default;
		}
	}
	
	return $defense;
}


function get_opp_magi_def($game_id, $user_id, $oppoment_vr)
{
	global $db;
	//sql command get cards in hand
	$sql = "SELECT * FROM " . CARD_DUELS_GAME_DECKS_TABLE . " WHERE user_id='" . $oppoment_id . "' AND game_id='" . $game_id . "' AND in_play='1'"; 
	
	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error retrieving decks data ', '', __LINE__, __FILE__, $sql); 
	} 

	//get all records
	while ( $row = $db->sql_fetchrow($result) ) 
	{ 
		//sql command
		$sql2 = "SELECT * FROM " . CARD_DUELS_USER_CARDS_TABLE . " WHERE id='" . $row['user_card_id'] . "'"; 
		
		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error retrieving card data ', '', __LINE__, __FILE__, $sql2); 
		} 
		
		//get record
		$row2 = $db->sql_fetchrow($result2);

		//sql command
		$sql2 = "SELECT * FROM " . CARD_DUELS_CARDS_TABLE . " WHERE id='" . $row2['card_id'] . "'"; 

		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error retrieving card data ', '', __LINE__, __FILE__, $sql2); 
		} 

		//get record
		$row2 = $db->sql_fetchrow($result2);
		
		switch ($row2['card_type'])
		{
			case "Body Armor";
				$defense = $defense + $row2['item_magic_defense'];
				break;
			case "Shield";
				$defense = $defense + $row2['item_magic_defense'];
				break;
			case "Helmet";
				$defense = $defense + $row2['item_magic_defense'];
				break;
			case "Gloves";
				$defense = $defense + $row2['item_magic_defense'];
				break;
			case "Boots";
				$defense = $defense + $row2['item_magic_defense'];
				break;
			case "Accessory";
				$defense = $defense + $row2['item_magic_defense'];
				break;
			default;
		}
	}
	
	return $defense;
}


function hp_from_weapon_attack($item_power, $oppoment_vr, $game_id, $oppoment_id,$user_id,$username)
{
	global $db;
	if ($oppoment_vr == $true)
	{
		$sql2 = "SELECT * FROM " . CARD_DUELS_GAMES_TABLE . " WHERE id='" . $game_id . "'";

		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
			  message_die(GENERAL_ERROR, 'Error retreiving games data ', '', __LINE__, __FILE__, $sql2); 
		} 
		
		$row2 = $db->sql_fetchrow($result2);
		
		$defense = $row2['oppoment_defense'] + get_opp_def($game_id,$oppoment_id);
		$attack = $item_power + $row2['challenger_attack'] + get_attack_bonus($game_id, $user_id);

		$damage = $attack - $defense;
		
		if ($damage > 0)
		{
			set_message($user_id, $game_id, "You have delt " . $damage . " damange upon your oppoment.");
			set_message($oppoment_id, $game_id, $username . " has delt " . $damage . " damage upon you.");
			return $damage;
		}
		else
		{
			set_message($user_id, $game_id, "You have delt 0 damange upon your oppoment.");
			set_message($oppoment_id, $game_id, $username . " has delt 0 damage upon you.");
		}
		
	}
	else
	{
		$sql2 = "SELECT * FROM " . CARD_DUELS_GAMES_TABLE . " WHERE id='" . $game_id . "'";
		
		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
			  message_die(GENERAL_ERROR, 'Error retreiving games data ', '', __LINE__, __FILE__, $sql2); 
		} 
		
		$row2 = $db->sql_fetchrow($result2);
		
		$defense = $row2['challenger_defense'] + get_opp_def($game_id,$oppoment_id);
		$attack = $item_power + $row2['oppoment_attack'] + get_attack_bonus($game_id, $user_id);

		$damage = $attack - $defense;
		
		if ($damage > 0)
		{
			set_message($user_id, $game_id, "You have delt " . $damage . " damange upon your oppoment.");
			set_message($oppoment_id, $game_id, $username . " has delt " . $damage . " damage upon you.");
			return $damage;
		}
		else
		{
			set_message($user_id, $game_id, "You have delt 0 damange upon your oppoment.");
			set_message($oppoment_id, $game_id, $username . " has delt 0 damage upon you.");
		}
	}

	
}

function hp_from_magic_attack($item_power, $oppoment_vr, $game_id,$user_id,$username)
{
	global $db;
	if ($oppoment_vr == true)
	{
		$sql2 = "SELECT * FROM " . CARD_DUELS_GAMES_TABLE . " WHERE id='" . $game_id . "'";

		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
			  message_die(GENERAL_ERROR, 'Error retreiving games data ', '', __LINE__, __FILE__, $sql2); 
		} 
		
		$row2 = $db->sql_fetchrow($result2);
		
		$defense = $row2['oppoment_md'] + get_opp_magi_def($game_id,$oppoment_id,$oppoment_vr);
		$attack = $item_power + $row2['challenger_ma'] + get_magi_attack_bonus($game_id, $user_id);
		$damage = $attack - $defense;
		
		if ($damage > 0)
		{
			set_message($user_id, $game_id, "You have delt " . $damage . " magic damange upon your oppoment.");
			set_message($oppoment_id, $game_id, $username . " has delt " . $damage . " magic damage upon you.");
			return $damage;
		}
		else
		{
			set_message($user_id, $game_id, "You have delt 0 damange upon your oppoment.");
			set_message($oppoment_id, $game_id, $username . " has delt 0 damage upon you.");
		}
		
	}
	else
	{
		$sql2 = "SELECT * FROM " . CARD_DUELS_GAMES_TABLE . " WHERE id='" . $game_id . "'";
		
		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
			  message_die(GENERAL_ERROR, 'Error retreiving games data ', '', __LINE__, __FILE__, $sql2); 
		} 
		
		$row2 = $db->sql_fetchrow($result2);
		
		$defense = $row2['challenger_md'] + get_opp_magi_def($game_id,$oppoment_id,$oppoment_vr);
		$attack = $item_power + $row2['oppoment_ma'] + get_magi_attack_bonus($game_id, $user_id);
		$damage = $attack - $defense;

		if ($damage > 0)
		{
			set_message($user_id, $game_id, "You have delt " . $damage . " magic damange upon your oppoment.");
			set_message($oppoment_id, $game_id, $username . " has delt " . $damage . " magic damage upon you.");
			return $damage;
		}
		else
		{
			set_message($user_id, $game_id, "You have delt 0 magic damange upon your oppoment.");
			set_message($oppoment_id, $game_id, $username . " has delt 0 magic damage upon you.");
		}
	}

}

function hp_from_summon($summon_id, $oppoment_vr, $game_id,$user_id,$username)
{
	global $db;
	if ($oppoment_vr == $true)
	{
		$sql2 = "SELECT * FROM " . CARD_DUELS_GAMES_TABLE . " WHERE id='" . $game_id . "'";

		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
			  message_die(GENERAL_ERROR, 'Error retreiving games data ', '', __LINE__, __FILE__, $sql2); 
		} 
		
		$row2 = $db->sql_fetchrow($result2);

		$defense = $row2['oppoment_md'] + get_opp_magi_def($game_id,$oppoment_id,$oppoment_vr);
		$magi_attack = $row2['challenger_ma'] + get_magi_attack_bonus($game_id, $user_id);
		$attack = $row2['challenger_attack'] + get_attack_bonus($game_id, $user_id);;
		

		$sql2 = "SELECT * FROM " . CARD_DUELS_CARDS_TABLE . " WHERE id='" . $summon_id . "'";

		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
			  message_die(GENERAL_ERROR, 'Error retreiving games data ', '', __LINE__, __FILE__, $sql2); 
		} 
		
		$row2 = $db->sql_fetchrow($result2);
	
		if ($row2['item_magic_attack'] <> 0)
		{
			$magi_attack = $magi_attack + $row2['item_magic_attack'];
			$damage = $magi_attack - $defense;
		}
		
		if ($row2['item_attack'] <> 0)
		{
			$attack = $attack + $row2['item_attack'];
			$damage = $damage - $attack;
		}
		
		
		if ($damage > 0)
		{
			set_message($user_id, $game_id, "You have delt " . $damage . " magic damange upon your oppoment.");
			set_message($oppoment_id, $game_id, $username . " has delt " . $damage . " magic damage upon you.");
			return $damage;
		}
		else
		{
			set_message($user_id, $game_id, "You have delt 0 damange upon your oppoment.");
			set_message($oppoment_id, $game_id, $username . " has delt 0 damage upon you.");
		}
		
	}
	else
	{
		$sql2 = "SELECT * FROM " . CARD_DUELS_GAMES_TABLE . " WHERE id='" . $game_id . "'";
		
		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
			  message_die(GENERAL_ERROR, 'Error retreiving games data ', '', __LINE__, __FILE__, $sql2); 
		} 
		
		$row2 = $db->sql_fetchrow($result2);
		
		$defense = $row2['challenger_md'] + get_opp_magi_def($game_id,$oppoment_id,$oppoment_vr);
		$magi_attack = $row2['oppoment_ma'] + get_magi_attack_bonus($game_id, $user_id);
		$attack = $row2['oppoment_attack'] + get_magi_attack_bonus($game_id, $user_id);
		
		$sql2 = "SELECT * FROM " . CARD_DUELS_CARDS_TABLE . " WHERE id='" . $summon_id . "'";

		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
			  message_die(GENERAL_ERROR, 'Error retreiving games data ', '', __LINE__, __FILE__, $sql2); 
		} 
		
		$row2 = $db->sql_fetchrow($result2);
		
		
		if ($row2['item_magic_attack'] <> 0)
		{
			$magi_attack = $magi_attack + $row2['item_magic_attack'];
			$damage = $magi_attack - $defense;
		}
		
		if ($row2['item_attack'] <> 0)
		{
			$attack = $attack + $row2['item_attack'];
			$damage = $damage - $attack;
		}
		
		
		if ($damage > 0)
		{
			set_message($user_id, $game_id, "You have delt " . $damage . " magic damange upon your oppoment.");
			set_message($oppoment_id, $game_id, $username . " has delt " . $damage . " magic damage upon you.");
			return $damage;
		}
		else
		{
			set_message($user_id, $game_id, "You have delt 0 magic damange upon your oppoment.");
			set_message($oppoment_id, $game_id, $username . " has delt 0 magic damage upon you.");
		}
	}
	

}


function end_turn($game_id, $oppoment_id,$user_id, $username,$turns)
{
	global $db;

	//update drawn card so user cant draw card again
	$sql2 = "UPDATE " . CARD_DUELS_GAMES_TABLE . " SET user_turn_id='" . $oppoment_id . "' WHERE id='" . $game_id . "'";

	//if didn't succeed
	if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
	{ 
		  message_die(GENERAL_ERROR, 'Error retreiving game challenges data ', '', __LINE__, __FILE__, $sql2); 
	} 

	set_message($user_id, $game_id, "Your turn has ended.");
	set_message($oppoment_id, $game_id, $username . " turn has ended."); 
	//update drawn card so user cant draw card again

	$turns = $turns + 1;

	$sql2 = "UPDATE " . CARD_DUELS_GAMES_TABLE . " SET drawn_card='0', turns='" . $turns . "' WHERE id='" . $game_id . "'";

	//if didn't succeed
	if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
	{ 
		  message_die(GENERAL_ERROR, 'Error retreiving game challenges data ', '', __LINE__, __FILE__, $sql2); 
	} 
	return $turns;
}


function shuffle_deck($user_id, $game_id,$challenger,$deck_name)
{
	global $db;

	//get and shuffle deck
	$deck = array();
	//sql command
	$sql = "SELECT * FROM " . CARD_DUELS_DECKS_TABLE . " WHERE user_id='" . $user_id . "' AND deck_name='" . $deck_name . "'"; 

	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error retrieving decks data ', '', __LINE__, __FILE__, $sql); 
	} 
	
	//get all records
	while ( $row = $db->sql_fetchrow($result) ) 
	{ 
		
	  $deck[] = $row['user_card_id'];
	} 

	srand((float)microtime() * 1000000);
	shuffle($deck);

	//place shuffle'd deck into game deck
	for ($i=0; $i < count($deck); $i++)
	{
		//sql command
		$sql = "SELECT * FROM " . CARD_DUELS_USER_CARDS_TABLE . " WHERE id='" . $deck[$i] . "'"; 

			//if didn't succeed
		if ( ! ( $result = $db->sql_query($sql) ) ) 
		{ 
			  message_die(GENERAL_ERROR, 'Error retreiving game list data ', '', __LINE__, __FILE__, $sql); 
		} 
		
		$row = $db->sql_fetchrow($result);

		//sql command
		$sql = "SELECT * FROM " . CARD_DUELS_CARDS_TABLE . " WHERE id='" . $row['card_id'] . "'"; 

			//if didn't succeed
		if ( ! ( $result = $db->sql_query($sql) ) ) 
		{ 
			  message_die(GENERAL_ERROR, 'Error retreiving game list data ', '', __LINE__, __FILE__, $sql); 
		} 
		
		$row = $db->sql_fetchrow($result);
print $row['card_type'];
		//update stats for game
		if ($row['card_type'] == "Character")
		{
			if ($challenger == true)
			{
				$sql2 = "UPDATE " . CARD_DUELS_GAMES_TABLE . " SET challenger_HP='" . $row['hp'] . "', challenger_MP='" . $row['mp'] . "', challenger_attack='" . $row['attack'] . "', challenger_defense='" . $row['defense'] . "', challenger_ma='" . $row['magic_attack'] . "', challenger_md='" . $row['magic_defense'] . "',challenger_max_HP='" . $row['hp'] . "', challenger_max_MP='" . $row['mp'] . "' WHERE id='" . $game_id . "'";
				print $row['magic_defense'];
			}
			else
			{
				$sql2 = "UPDATE " . CARD_DUELS_GAMES_TABLE . " SET oppoment_HP='" . $row['hp'] . "', oppoment_MP='" . $row['mp'] . "', oppoment_attack='" . $row['attack'] . "', oppoment_defense='" . $row['defense'] . "', oppoment_ma='" . $row['magic_attack'] . "', oppoment_md='" . $row['magic_defense'] . "',oppoment_max_HP='" . $row['hp'] . "', oppoment_max_MP='" . $row['mp'] . "' WHERE id='" . $game_id . "'";
			}
			print $row['magic_defense'];
			//if didn't succeed
			if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
			{ 
				  message_die(GENERAL_ERROR, 'Error updating games data ', '', __LINE__, __FILE__, $sql2); 
			} 
		}
		
		
		//sql command
		$sql = "INSERT INTO " . CARD_DUELS_GAME_DECKS_TABLE ." (user_id , user_card_id, dur, in_play, game_id) VALUES ('" . $user_id . "','" . $deck[$i] . "','" . $row['card_length'] . "','3','" . $game_id . "')"; 
		
		//if didn't succeed
		if ( ! ( $result = $db->sql_query($sql) ) ) 
		{ 
			  message_die(GENERAL_ERROR, 'Error retreiving game list data ', '', __LINE__, __FILE__, $sql); 
		} 
	}

}

function set_start_hand($user_id, $game_id)
{
	global $db;
	//sql command
	$sql = "SELECT * FROM " . CARD_DUELS_GAME_DECKS_TABLE . " WHERE user_id='" . $user_id . "' AND game_id='" . $game_id . "'"; 
	
	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error retrieving decks data ', '', __LINE__, __FILE__, $sql); 
	} 
	
	//get all records
	$card_count = 0;
	$card_char = false;
	$card_back = false;
	while ( $row = $db->sql_fetchrow($result) ) 
	{ 
		//sql command
		$sql2 = "SELECT * FROM " . CARD_DUELS_USER_CARDS_TABLE . " WHERE id='" . $row['user_card_id'] . "'"; 
		
		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error retrieving card data ', '', __LINE__, __FILE__, $sql2); 
		} 
		
		//get record
		$row2 = $db->sql_fetchrow($result2);

		//sql command
		$sql2 = "SELECT * FROM " . CARD_DUELS_CARDS_TABLE . " WHERE id='" . $row2['card_id'] . "'"; 
		
		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error retrieving card data ', '', __LINE__, __FILE__, $sql2); 
		} 

		//get record
		$row2 = $db->sql_fetchrow($result2);

		if ($row2['card_type'] == "Character")
		{
			$card_char = true;
			//sql command
			$sql2 = "UPDATE " . CARD_DUELS_GAME_DECKS_TABLE . " SET in_play='1' WHERE id='" . $row['id'] . "'";
		}
		elseif ($row2['card_type'] == "Card Backs")
		{
			$card_back = true;
			//sql command
			$sql2 = "UPDATE " . CARD_DUELS_GAME_DECKS_TABLE . " SET in_play='1' WHERE id='" . $row['id'] . "'";
		}
		else
		{
			if ($card_count < 5)
			{
			//sql command
			$sql2 = "UPDATE " . CARD_DUELS_GAME_DECKS_TABLE . " SET in_play='2' WHERE id='" . $row['id'] . "'";
			$card_count = $card_count + 1;
			}
				
		}

		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error updating card game data ', '', __LINE__, __FILE__, $sql); 
		} 
		
		//exit while if all requir's meet.
		if ( ($card_char == true) && ($card_back == true) && ($card_count == 5) )
		{
			break;
		}
	} 

}


//thanks to wGEric for insert_pm function
function insert_pm($to_id, $message,$subject,$from_id,$html_on = 0,$bbcode_on = 1,$smilies_on = 1)
{
   global $db, $lang, $user_ip, $board_config, $userdata, $phpbb_root_path, $phpEx;

   if ( !$from_id )
   {
      $from_id = $userdata['user_id'];
   }

   //get varibles ready
   $to_id = intval($to_id);
   $from_id = intval($from_id);
   $msg_time = time();
   $attach_sig = $userdata['user_attachsig'];
   
   //get to users info
   $sql = "SELECT user_id, user_notify_pm, user_email, user_lang, user_active
      FROM " . USERS_TABLE . "
      WHERE user_id = '$to_id'
         AND user_id <> " . ANONYMOUS;
   if ( !($result = $db->sql_query($sql)) )
   {
      $error = TRUE;
      $error_msg = $lang['No_such_user'];
   }

   $to_userdata = $db->sql_fetchrow($result);

   $privmsg_subject = trim(strip_tags($subject));
   if ( empty($privmsg_subject) )
   {
      $error = TRUE;
      $error_msg .= ( ( !empty($error_msg) ) ? '<br />' : '' ) . $lang['Empty_subject'];
   }

   if ( !empty($message) )
   {
      if ( !$error )
      {
         if ( $bbcode_on )
         {
            $bbcode_uid = make_bbcode_uid();
         }

         $privmsg_message = prepare_message($message, $html_on, $bbcode_on, $smilies_on, $bbcode_uid);
         $privmsg_message = str_replace('\\\n', '\n', $privmsg_message);

      }
   }
   else
   {
      $error = TRUE;
      $error_msg .= ( ( !empty($error_msg) ) ? '<br />' : '' ) . $lang['Empty_message'];
   }

   //
   // See if recipient is at their inbox limit
   //
   $sql = "SELECT COUNT(privmsgs_id) AS inbox_items, MIN(privmsgs_date) AS oldest_post_time
      FROM " . PRIVMSGS_TABLE . "
      WHERE ( privmsgs_type = " . PRIVMSGS_NEW_MAIL . "
            OR privmsgs_type = " . PRIVMSGS_READ_MAIL . " 
            OR privmsgs_type = " . PRIVMSGS_UNREAD_MAIL . " )
         AND privmsgs_to_userid = " . $to_userdata['user_id'];
   if ( !($result = $db->sql_query($sql)) )
   {
      message_die(GENERAL_MESSAGE, $lang['No_such_user']);
   }

   $sql_priority = ( SQL_LAYER == 'mysql' ) ? 'LOW_PRIORITY' : '';

   if ( $inbox_info = $db->sql_fetchrow($result) )
   {
      if ( $inbox_info['inbox_items'] >= $board_config['max_inbox_privmsgs'] )
      {
         $sql = "SELECT privmsgs_id FROM " . PRIVMSGS_TABLE . "
            WHERE ( privmsgs_type = " . PRIVMSGS_NEW_MAIL . "
                  OR privmsgs_type = " . PRIVMSGS_READ_MAIL . "
                  OR privmsgs_type = " . PRIVMSGS_UNREAD_MAIL . "  )
               AND privmsgs_date = " . $inbox_info['oldest_post_time'] . "
               AND privmsgs_to_userid = " . $to_userdata['user_id'];
         if ( !$result = $db->sql_query($sql) )
         {
            message_die(GENERAL_ERROR, 'Could not find oldest privmsgs (inbox)', '', __LINE__, __FILE__, $sql);
         }
         $old_privmsgs_id = $db->sql_fetchrow($result);
         $old_privmsgs_id = $old_privmsgs_id['privmsgs_id'];
            
         $sql = "DELETE $sql_priority FROM " . PRIVMSGS_TABLE . "
            WHERE privmsgs_id = $old_privmsgs_id";
         if ( !$db->sql_query($sql) )
         {
            message_die(GENERAL_ERROR, 'Could not delete oldest privmsgs (inbox)'.$sql, '', __LINE__, __FILE__, $sql);
         }

         $sql = "DELETE $sql_priority FROM " . PRIVMSGS_TEXT_TABLE . "
            WHERE privmsgs_text_id = $old_privmsgs_id";
         if ( !$db->sql_query($sql) )
         {
            message_die(GENERAL_ERROR, 'Could not delete oldest privmsgs text (inbox)', '', __LINE__, __FILE__, $sql);
         }
      }
   }

   $sql_info = "INSERT INTO " . PRIVMSGS_TABLE . " (privmsgs_type, privmsgs_subject, privmsgs_from_userid, privmsgs_to_userid, privmsgs_date, privmsgs_ip, privmsgs_enable_html, privmsgs_enable_bbcode, privmsgs_enable_smilies, privmsgs_attach_sig)
      VALUES (" . PRIVMSGS_NEW_MAIL . ", '" . str_replace("\'", "''", $privmsg_subject) . "', " . $from_id . ", " . $to_userdata['user_id'] . ", $msg_time, '$user_ip', $html_on, $bbcode_on, $smilies_on, $attach_sig)";

   if ( !($result = $db->sql_query($sql_info, BEGIN_TRANSACTION)) )
   {
      message_die(GENERAL_ERROR, "Could not insert/update private message sent info.", "", __LINE__, __FILE__, $sql_info);
   }

   $privmsg_sent_id = $db->sql_nextid();

   $sql = "INSERT INTO " . PRIVMSGS_TEXT_TABLE . " (privmsgs_text_id, privmsgs_bbcode_uid, privmsgs_text)
      VALUES ($privmsg_sent_id, '" . $bbcode_uid . "', '" . str_replace("\'", "''", $privmsg_message) . "')";

   if ( !$db->sql_query($sql, END_TRANSACTION) )
   {
      message_die(GENERAL_ERROR, "Could not insert/update private message sent text.", "", __LINE__, __FILE__, $sql);
   }

   //
   // Add to the users new pm counter
   //
   $sql = "UPDATE " . USERS_TABLE . "
      SET user_new_privmsg = user_new_privmsg + 1, user_last_privmsg = " . time() . " 
      WHERE user_id = " . $to_userdata['user_id'];
   if ( !$status = $db->sql_query($sql) )
   {
      message_die(GENERAL_ERROR, 'Could not update private message new/read status for user', '', __LINE__, __FILE__, $sql);
   }

   if ( $to_userdata['user_notify_pm'] && !empty($to_userdata['user_email']) && $to_userdata['user_active'] )
   {
      $script_name = preg_replace('/^\/?(.*?)\/?$/', "\\1", trim($board_config['script_path']));
      $script_name = ( $script_name != '' ) ? $script_name . '/privmsg.'.$phpEx : 'privmsg.'.$phpEx;
      $server_name = trim($board_config['server_name']);
      $server_protocol = ( $board_config['cookie_secure'] ) ? 'https://' : 'http://';
      $server_port = ( $board_config['server_port'] <> 80 ) ? ':' . trim($board_config['server_port']) . '/' : '/';

      include($phpbb_root_path . 'includes/emailer.'.$phpEx);
      $emailer = new emailer($board_config['smtp_delivery']);
               
      $emailer->from($board_config['board_email']);
      $emailer->replyto($board_config['board_email']);

      $emailer->use_template('privmsg_notify', $to_userdata['user_lang']);
      $emailer->email_address($to_userdata['user_email']);
      $emailer->set_subject($lang['Notification_subject']);
               
      $emailer->assign_vars(array(
         'USERNAME' => $to_username,
         'SITENAME' => $board_config['sitename'],
         'EMAIL_SIG' => (!empty($board_config['board_email_sig'])) ? str_replace('<br />', "\n", "-- \n" . $board_config['board_email_sig']) : '',

         'U_INBOX' => $server_protocol . $server_name . $server_port . $script_name . '?folder=inbox')
      );

      $emailer->send();
      $emailer->reset();
   }

   return;
   
   $msg = $lang['Message_sent'] . '<br /><br />' . sprintf($lang['Click_return_inbox'], '<a href="' . append_sid("privmsg.$phpEx?folder=inbox") . '">', '</a> ') . '<br /><br />' . sprintf($lang['Click_return_index'], '<a href="' . append_sid("index.$phpEx") . '">', '</a>');

   message_die(GENERAL_MESSAGE, $msg);

} // insert_pm()


?>