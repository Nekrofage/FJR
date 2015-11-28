<?php
/***************************************************************************
 *                                card_duel_game.php
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


// Sorry , only logged users ...
if ( !$userdata['session_logged_in'] )
{
	$redirect = "card_duel_game.$phpEx";
	$redirect .= ( isset($user_id) ) ? '&user_id=' . $user_id : '';
	header('Location: ' . append_sid("login.$phpEx?redirect=$redirect", true));
}

include($phpbb_root_path . 'includes/page_header.'.$phpEx);



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

//check if in game
if ( isset($HTTP_POST_VARS['game_id']) || isset($HTTP_GET_VARS['game_id'])) 
{
		$template->set_filenames(array(
			"body" => 'card_duel_game_field_body.tpl')
		);
		
	
	//check if user belongs in this game
	//sql command
	$sql = "SELECT * FROM " . CARD_DUELS_GAMES_TABLE ." WHERE game_status = '1'  AND id='" . $HTTP_GET_VARS['game_id'] . "' AND (oppoment_user_id='" . $userdata['user_id'] . "' OR challenger_user_id='" . $userdata['user_id'] . "')";

	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
		  message_die(GENERAL_ERROR, 'Error retreiving game challenges data ', '', __LINE__, __FILE__, $sql); 
	} 
	
	$row = $db->sql_fetchrow($result);
	
	//if user belogns in game
	if ($row['id'] <> "")
	{
	
		//get # of turns used in game so far.
		$turns = $row['turns'];
		//get challenger id
		if ($userdata['user_id'] == $row['challenger_user_id'])
		{
			$opp_mp = $row['oppoment_MP'];
			$opp_hp = $row['oppoment_HP'];
			$opp_max_mp = $row['oppoment_max_MP'];
			$opp_max_hp = $row['oppoment_max_HP'];
			
			$your_mp = $row['challenger_MP'];
			$your_hp = $row['challenger_HP'];
			$your_max_mp = $row['challenger_max_MP'];
			$your_max_hp = $row['challenger_max_HP'];
			
			$oppoment_id = $row['oppoment_user_id'];
			$oppoment_vr = true;

		}
		else
		{
			$opp_mp = $row['challenger_MP'];
			$opp_hp = $row['challenger_HP'];
			$opp_max_mp = $row['challenger_max_MP'];
			$opp_max_hp = $row['challenger_max_HP'];
			
			$your_mp = $row['oppoment_MP'];
			$your_hp = $row['oppoment_HP'];
			$your_max_mp = $row['oppoment_max_MP'];
			$your_max_hp = $row['oppoment_max_HP'];
			
			$oppoment_id = $row['challenger_user_id'];
			$oppoment_vr = false;

		}
		//vars
		$play1_magic = array();
		$play2_magic = array();
		
		$play1_potion = array();
		$play2_potion = array();
		
		$play1_summon = array();
		$play2_summon = array();
		
		$play1_in_hand = array();
		$play2_in_hand = array();
		
		$play1_in_hand_type = array();
		$play2_in_hand_type = array();
		
		$play1_in_field = array();
		$play2_in_field = array();
	
		$play1_magic_id = array();
		$play2_magic_id = array();
		
		$play1_potion_id = array();
		$play2_potion_id = array();
		
		$play1_summon_id = array();
		$play2_summon_id = array();
		
		$play1_in_hand_id = array();
		$play2_in_hand_id = array();
		
		$play1_in_field_id = array();
		$play2_in_field_id = array();
		
		$play1_in_field_type = array();
		$user_turn = $row['user_turn_id'];

		//end vars
		
		//if players turn is yours
		$user_turn_id = $row['user_turn_id'];
		if ($row['user_turn_id'] == $userdata['user_id'])
		{
			$draw_card = $row['drawn_card'];
			$turn = true;
			
			if ( isset($HTTP_POST_VARS['draw_card']) || isset($HTTP_GET_VARS['draw_card'])) 
			{
				
				if ($draw_card == 0)
				{
					$draw_card = draw_card($HTTP_GET_VARS['game_id'],$userdata['user_id']);
					
					set_message($userddata['user_id'], $HTTP_GET_VARS['game_id'], $lang['CD_You_Drawn_Card']);
					set_message($oppoment_id, $HTTP_GET_VARS['game_id'], $userdata['username'] . $lang['CD_Opp_Drawn_Card']);
				}
			}
			elseif ( isset($HTTP_POST_VARS['end_turn']) || isset($HTTP_GET_VARS['end_turn'])) 
			{
				$turns = end_turn($HTTP_GET_VARS['game_id'], $oppoment_id,$userdata['user_id'], $userdata['username'],$turns);
				$turn = false;
			}
			elseif ( isset($HTTP_POST_VARS['play_card']) || isset($HTTP_GET_VARS['play_card']))
			{
				if ( pass_same_card_type_check($userdata['user_id'], $HTTP_GET_VARS['game_id'], $HTTP_GET_VARS['play_card']) == true )
				{
					play_card($HTTP_GET_VARS['play_card']);
					set_message($userdata['user_id'], $HTTP_GET_VARS['game_id'], $lang['CD_You_Played_Card'] );
					set_message($oppoment_id, $HTTP_GET_VARS['game_id'], $userdata['username'] . $lang['CD_Opp_Played_Card'] );
				}

			}
			elseif ( isset($HTTP_POST_VARS['discard_card']) || isset($HTTP_GET_VARS['discard_card']))
			{

				discard_card($HTTP_GET_VARS['discard_card']);
				set_message($userdata['user_id'], $HTTP_GET_VARS['game_id'], $lang['CD_You_Discard_Card']);
				set_message($oppoment_id, $HTTP_GET_VARS['game_id'], $userdata['username'] . $lang['CD_Opp_Discard_Card']);
			}
			elseif ( isset($HTTP_POST_VARS['use_card']) || isset($HTTP_GET_VARS['use_card']))
			{

				//sql command get card
				$sql2 = "SELECT * FROM " . CARD_DUELS_GAME_DECKS_TABLE . " WHERE id='" . $HTTP_GET_VARS['use_card'] . "'"; 
				
				//if didn't succeed
				if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
				{ 
				   message_die(GENERAL_ERROR, 'Error retrieving decks data ', '', __LINE__, __FILE__, $sql2); 
				} 
				
				$row2 = $db->sql_fetchrow($result2);

				//sql command get card info
				$sql2 = "SELECT * FROM " . CARD_DUELS_USER_CARDS_TABLE . " WHERE id='" . $row2['user_card_id'] . "'"; 
				
				//if didn't succeed
				if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
				{ 
				   message_die(GENERAL_ERROR, 'Error retrieving decks data ', '', __LINE__, __FILE__, $sql2); 
				} 

				$row2 = $db->sql_fetchrow($result2);
				
				//sql command get card info
				$sql2 = "SELECT * FROM " . CARD_DUELS_CARDS_TABLE . " WHERE id='" . $row2['card_id'] . "'"; 
				
				//if didn't succeed
				if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
				{ 
				   message_die(GENERAL_ERROR, 'Error retrieving decks data ', '', __LINE__, __FILE__, $sql2); 
				} 

				$row2 = $db->sql_fetchrow($result2);

				//set_message($userdata['user_id'], $HTTP_GET_VARS['game_id'], "You have played " . $row2['card_name'] . ".");
				//set_message($oppoment_id, $HTTP_GET_VARS['game_id'], $userdata['username'] . " has played ". $row2['card_name']);
				switch ($row2['card_type'])
				{
					case "Magic";
						if (card_hack_check_pass($userdata['user_id'], $HTTP_GET_VARS['use_card']) == true)
						{
							if (check_enough_mp($userdata['user_id'], $row2['mp_cost'], $your_mp) == true)
							{
								$opp_hp = $opp_hp - hp_from_magic_attack($row2['item_magic_attack'], $oppoment_vr, $HTTP_GET_VARS['game_id'],$userdata['user_id'] , $userdata['username']);
								$your_mp = $your_mp - $row2['mp_cost'];
								
								set_card_length($HTTP_GET_VARS['use_card']);
								
								update_hp($opp_hp,$oppoment_vr,$HTTP_GET_VARS['game_id']);
								update_mp($your_mp,$oppoment_vr, $HTTP_GET_VARS['game_id']);
								
								if (check_for_winner($opp_hp) == true)
								{
									end_game($userdata['user_id'],  $oppoment_id, $userdata['user_id'],$HTTP_GET_VARS['game_id']);
								}
								
								end_turn($HTTP_GET_VARS['game_id'], $oppoment_id,$userdata['user_id'], $userdata['username'],$turns);
								$turn = false;
							}
						}
						
						break;
						
					case "Weapon";
						if (card_hack_check_pass($userdata['user_id'], $HTTP_GET_VARS['use_card']) == true)
						{
							$opp_hp = $opp_hp - hp_from_weapon_attack($row2['item_attack'], $oppoment_vr, $HTTP_GET_VARS['game_id'],$oppoment_id,$userdata['$user_id'] , $userdata['username']);
							
							set_card_length($HTTP_GET_VARS['use_card']);
							
							update_hp($opp_hp,$oppoment_vr,$HTTP_GET_VARS['game_id']);
							
							if (check_for_winner($opp_hp) == true)
							{
								end_game($userdata['user_id'],  $oppoment_id, $userdata['user_id'],$HTTP_GET_VARS['game_id']);
							}
							
							end_turn($HTTP_GET_VARS['game_id'], $oppoment_id,$userdata['user_id'], $userdata['username'],$turns);
							$turn = false;
						}
						break;
						
					case "Potion";
						if (card_hack_check_pass($userdata['user_id'], $HTTP_GET_VARS['use_card']) == true)
						{
							$sql2 = "SELECT * FROM " . CARD_DUELS_CARDS_TABLE . " WHERE id='" . $row2['id'] . "'";
					
							//if didn't succeed
							if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
							{ 
								  message_die(GENERAL_ERROR, 'Error retreiving cards data ', '', __LINE__, __FILE__, $sql2); 
							} 
							
							$row2 = $db->sql_fetchrow($result2);
							
							if ($row2['item_hp'] <> 0)
							{
								$your_hp = $your_hp + $row2['item_hp'];
							}
							
							if ($your_hp > $your_max_hp)
							{
								$your_hp = $your_max_hp;
							}
							
							if ($row2['item_mp'] <> 0)
							{
								$your_mp = $your_mp + $row2['item_mp'];
							}
							
							if ($your_mp > $your_max_mp)
							{
								$your_mp = $your_max_mp;
							}
							
							set_card_length($HTTP_GET_VARS['use_card']);
							update_hp($opp_hp,$oppoment_vr,$HTTP_GET_VARS['game_id']);
							end_turn($HTTP_GET_VARS['game_id'], $oppoment_id,$userdata['user_id'], $userdata['username'],$turns);
							$turn = false;
						}
						break;

					case "Summon";
						if (card_hack_check_pass($userdata['user_id'], $HTTP_GET_VARS['use_card']) == true)
						{
							if (check_enough_mp($userdata['user_id'], $row2['mp_cost'], $your_mp) == true)
							{
								$opp_hp = $opp_hp - hp_from_summon($row2['id'], $oppoment_vr, $HTTP_GET_VARS['game_id'],$userdata['$user_id'] , $userdata['username']);
								$your_mp = $your_mp - $row2['mp_cost'];
		
								set_card_length($HTTP_GET_VARS['use_card']);
								
								update_hp($opp_hp,$oppoment_vr,$HTTP_GET_VARS['game_id']);
								update_mp($your_mp, $oppoment_vr,$HTTP_GET_VARS['game_id']);
								
								if (check_for_winner($opp_hp) == true)
								{
									end_game($userdata['user_id'],  $oppoment_id, $userdata['user_id'],$HTTP_GET_VARS['game_id']);
								}
								
								end_turn($HTTP_GET_VARS['game_id'], $oppoment_id,$userdata['user_id'], $userdata['username'],$turns);
								$turn = false;
							}
						}
						break;

					default;
						break;
				}
			}
			elseif ( isset($HTTP_POST_VARS['attack']) || isset($HTTP_GET_VARS['attack']))
			{
				//normal attack
				if ($HTTP_GET_VARS['attack'] == 1)
				{
					$opp_hp = $opp_hp - hp_from_weapon_attack(0, $oppoment_vr, $HTTP_GET_VARS['game_id'],$oppoment_id,$userdata['$user_id'] , $userdata['username']);
				}
				else//magic attack
				{
					$opp_hp = $opp_hp - hp_from_magic_attack(0, $oppoment_vr, $HTTP_GET_VARS['game_id'],$userdata['user_id'], $userdata['username']);
				}
				
				update_hp($opp_hp,$oppoment_vr,$HTTP_GET_VARS['game_id']);
				
				if (check_for_winner($opp_hp) == true)
				{
					end_game($userdata['user_id'],  $oppoment_id, $userdata['user_id'],$HTTP_GET_VARS['game_id']);
				}
				
				end_turn($HTTP_GET_VARS['game_id'], $oppoment_id,$userdata['user_id'], $userdata['username'],$turns);
			}
		}
		else
		{
			$turn = false;
		}
			//sql command get cards in hand
			$sql = "SELECT * FROM " . CARD_DUELS_GAME_DECKS_TABLE . " WHERE user_id='" . $userdata['user_id'] . "' AND game_id='" . $HTTP_GET_VARS['game_id'] . "' AND in_play='2'"; 
			
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

				$play1_in_hand[] = $row2['card_image'];
				$play1_in_hand_type[] = $row2['card_type'];
				$play1_in_hand_id[] = $row['id'];
				
				switch ($row2['card_type'])
				{
					case "Character";
						$template->assign_vars(array("CHARACTER_2" => $row2['card_image'] ));
						break;
					case "Card Backs";
						$play1_card_back = $row2['card_image'];
						break;
					default;
				}
			}

			//sql command (get cards in field)
			$sql = "SELECT * FROM " . CARD_DUELS_GAME_DECKS_TABLE . " WHERE user_id='" . $userdata['user_id'] . "' AND game_id='" . $HTTP_GET_VARS['game_id'] . "' AND in_play='1'"; 
			
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
					case "Character";
						$template->assign_vars(array("CHARACTER_2" => $row2['card_image'] ));
						break;
					case "Card Backs";
						$play1_card_back = $row2['card_image'];
						break;
					case "Magic";
						$play1_magic[] = $row2['card_image'];
						$play1_magic_id[] = $row['id'];
						break;
					case "Potion";
						$play1_potion[] = $row2['card_image'];
						$play1_potion_id[] = $row['id'];
						break;
					case "Summon";
						$play1_summon[] = $row2['card_image'];
						$play1_summon_id[] = $row['id'];
						break;
					default;
						$play1_in_field[] = $row2['card_image'];
						$play1_in_field_id[] = $row['id'];
						$play1_in_field_type[] = $row2['card_type'];
				}
			}
			
			
			
			
			
			
			//sql command get cards in oppoment hand
			$sql = "SELECT * FROM " . CARD_DUELS_GAME_DECKS_TABLE . " WHERE user_id='" . $oppoment_id . "' AND game_id='" . $HTTP_GET_VARS['game_id'] . "' AND in_play='2'"; 
			
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

				$play2_in_hand[] = $row2['card_image'];
				$play2_in_hand_id[] = $row['id'];
				
				switch ($row2['card_type'])
				{
					case "Character";
						$template->assign_vars(array("CHARACTER_1" => $row2['card_image'] ));
						break;
					case "Card Backs";
						$play2_card_back = $row2['card_image'];
						break;
					default;
						break;
				}
			}

			//sql command (get oppoments cards in field)
			$sql = "SELECT * FROM " . CARD_DUELS_GAME_DECKS_TABLE . " WHERE user_id='" . $oppoment_id . "' AND game_id='" . $HTTP_GET_VARS['game_id'] . "' AND in_play='1'"; 
			
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
					case "Character";
						$template->assign_vars(array("CHARACTER_1" => $row2['card_image'] ));
						break;
					case "Card Backs";
						$play2_card_back = $row2['card_image'];
						break;
					case "Magic";
						$play2_magic[] = $row2['card_image'];
						break;
					case "Potion";
						$play2_potion[] = $row2['card_image'];
						break;
					case "Summon";
						$play2_summon[] = $row2['card_image'];
						break;
					default;
						$play2_in_field[] = $row2['card_image'];
				}
			}
			
			if ($userdata['user_id'] == $user_turn_id)
			{
				if ( ($turns > 2) && ($turn == true))
				{
					$template->assign_vars(array("ATTACK" => '<a href="card_duel_game.php?game_id=' . $HTTP_GET_VARS['game_id'] . '&attack=1">' . $lang['CD_Attack'] . '</a>',
												"MAGIC_ATTACK" => '<a href="card_duel_game.php?game_id=' . $HTTP_GET_VARS['game_id'] . '&attack=2">' . $lang['CD_Magic_Attack'] . '</a>'));
				}
			}

		//YOUR CARDS
		//display character/equipment slots (1st row)
		$play_start = 1;
		for ($i=0; $i < count($play1_in_field); $i++)
		{
			$template->assign_vars(array("EQUIP_2_" . $play_start => $play1_in_field[$i]));
			
			if ( ($play1_in_field_type[$i] == "Weapon") && ($turns >= 2) && ($turn == true) )
			{
				$template->assign_vars(array("ATTACK_" . $play_start => '<a href="card_duel_game.php?game_id=' . $HTTP_GET_VARS['game_id'] . '&use_card=' . $play1_in_field_id[$i] . '">' . $lang['CD_Attack']  . '</a>',
											"DISCARD_" . $play_start => '<a href="card_duel_game.php?game_id=' . $HTTP_GET_VARS['game_id'] . '&discard_card=' . $play1_in_field_id[$i] . '">' . $lang['CD_Discard'] . '</a>'));
			}
			else
			{
				if ( ($turn == true) && ($turns >= 2) )
				{
					$template->assign_vars(array("DISCARD_" . $play_start => '<a href="card_duel_game.php?game_id=' . $HTTP_GET_VARS['game_id'] . '&discard_card=' . $play1_in_field_id[$i] . '">' . $lang['CD_Discard'] . '</a>'));
				}
			}
			$play_start = $play_start + 1;

		}
		
		for ($i=$play_start; $i < 11; $i++)
		{
			$template->assign_vars(array("EQUIP_2_" . $i => "XXX.jpg" ));

		}
		
		$play_start = 1;
		//display cards in hand
		for ($i=0; $i < count($play1_in_hand); $i++)
		{
			$template->assign_vars(array("CARD_IN_HAND_2_" . $play_start => $play1_in_hand[$i]));
			
			if ( (($play1_in_hand_type[$i] != "Weapon") || ($play1_in_hand_type[$i] != "Body Armor") )  && ($turn == true) )
			{
				$template->assign_vars(array("PLAY_1" . $play_start => '<a href="card_duel_game.php?game_id=' . $HTTP_GET_VARS['game_id'] . '&play_card=' . $play1_in_hand_id[$i] . '">' . $lang['CD_Play'] . '</a>'));
			}
			else
			{
				if (($turns >= 2) && ($turn == true))
				{
					$template->assign_vars(array("USE_" . $play_start => '<a href="card_duel_game.php?game_id=' . $HTTP_GET_VARS['game_id'] . '&use_card=' . $play1_in_hand_id[$i] . '">' . $lang['CD_Use'] . '</a>'));
				}
			}
			
			$play_start = $play_start + 1;
		}
		
		for ($i=count($play1_in_hand)+1; $i < 11; $i++)
		{
			$template->assign_vars(array("CARD_IN_HAND_2_" . $i => "XXX.jpg" ));

		}
		//end display cards in hand

		//display potions (2nd row)
		$play_start = 1;
		for ($i=0; $i < count($play1_potion); $i++)
		{
			$template->assign_vars(array("POTIONS_2_" . $play_start => $play1_potion[$i]));
			

			if (($turns >= 2) && ($turn == true))
			{
			$template->assign_vars(array("PLAY_" . $play_start => '<a href="card_duel_game.php?game_id=' . $HTTP_GET_VARS['game_id'] . '&use_card=' . $play1_potion_id[$i] . '">' . $lang['CD_Use']  . '</a>'));
			}
			
			$play_start = $play_start + 1;
		}
		
		for ($i=count($play1_potion)+1; $i < 6; $i++)
		{
			$template->assign_vars(array("POTIONS_2_" . $i => "XXX.jpg" ));
		}

		$summon_magic_count = 1;
		//display magic and summon cards (3rd row)
		//display magic cards
		
		$play_start = 6;
		for ($i=0; $i < count($play1_magic); $i++)
		{
			$template->assign_vars(array("MAGIC_2_" . $summon_magic_count => $play1_magic[$i]));

			if (($turns >= 2) && ($turn == true))
			{
				$template->assign_vars(array("PLAY_" . $play_start => '<a href="card_duel_game.php?game_id=' . $HTTP_GET_VARS['game_id'] . '&use_card=' . $play1_magic_id[$i] . '">' . $lang['CD_Use']  . '</a>'));
			}

			$summon_magic_count = $summon_magic_count + 1;
			$play_start = $play_start + 1;
		}
		
		//display summon cards
		for ($i=0; $i < count($play1_summon); $i++)
		{

			$template->assign_vars(array("MAGIC_2_" . $summon_magic_count => $play1_summon[$i]));
			
			if (($turns >= 2) && ($turn == true))
			{
				$template->assign_vars(array("PLAY_" . $play_start => '<a href="card_duel_game.php?game_id=' . $HTTP_GET_VARS['game_id'] . '&use_card=' . $play1_summon_id[$i] . '">' . $lang['CD_Use']  . '</a>'));
			}

			$summon_magic_count = $summon_magic_count + 1;
			$play_start = $play_start + 1;
			
		}
		
		
		for ($i=$summon_magic_count; $i < 6; $i++)
		{
			$template->assign_vars(array("MAGIC_2_" . $i => "XXX.jpg" ));

		}
		
		if ($turn == true)
		{
			if ($draw_card == 0)
			{
				$template->assign_vars(array("DRAW_CARD" => '<a href="card_duel_game.php?game_id=' . $HTTP_GET_VARS['game_id'] . '&draw_card=1">' . $lang['CD_Draw_Card'] . '</a>'));
			}
		
			$template->assign_vars(array("END_TURN" =>  '<a href="card_duel_game.php?game_id=' . $HTTP_GET_VARS['game_id'] . '&end_turn=1">' . $lang['CD_End_Turn'] . '</a>'));	
		}

		//end display magic cards
		$template->assign_vars(array("DECK_2" => $play1_card_back));

 
		//OPPOMENTS CARDS
		//display character/equipment slots (1st row)
		$play_start = 1;
		for ($i=0; $i < count($play2_in_field); $i++)
		{
			$template->assign_vars(array("EQUIP_1_" . ($i + 1) => $play2_in_field[$i]));
		}
		
		for ($i=count($play2_in_field)+1; $i < 11; $i++)
		{
			$template->assign_vars(array("EQUIP_1_" . $i => "XXX.jpg" ));
		}
		
		$play_start = 1;
		//display cards in hand
		for ($i=0; $i < count($play2_in_hand); $i++)
		{
			$template->assign_vars(array("CARD_IN_HAND_1_" . $play_start => $play2_card_back));
			$play_start = $play_start + 1;
		}
		
		for ($i=count($play2_in_hand)+1; $i < 11; $i++)
		{
			$template->assign_vars(array("CARD_IN_HAND_1_" . $i => "XXX.jpg" ));
		}
		//end display cards in hand
		
		//display potions (2nd row)
		$play_start = 1;
		for ($i=0; $i < count($play2_potion); $i++)
		{
			$template->assign_vars(array("POTIONS_1_" . ($i + 1) => $play2_card_back));
			$play_start = $play_start + 1;
		}
		
		for ($i=count($play2_potion)+1; $i < 11; $i++)
		{
			$template->assign_vars(array("POTIONS_1_" . $i => "XXX.jpg" ));
		}

		$summon_magic_count = 1;
		//display magic and summon cards (3rd row)
		//display magic cards
		for ($i=0; $i < count($play2_magic); $i++)
		{

			$template->assign_vars(array("MAGIC_1_" . ($i + 1) => $play2_card_back));
			$play_start = $play_start + 1;

			$summon_magic_count = $summon_magic_count + 1;
		}
		
		//display summon cards
		for ($i=0; $i < count($play2_summon); $i++)
		{

			$template->assign_vars(array("MAGIC_1_" . $summon_magic_count => $play2_card_back));
			$play_start = $play_start + 1;
			$summon_magic_count = $summon_magic_count + 1;
		}
		
		
		for ($i=$summon_magic_count; $i < 6; $i++)
		{
			$template->assign_vars(array("MAGIC_1_" . $i => "XXX.jpg" ));
		}
		
		//end display magic cards
		$template->assign_vars(array("DECK_1" => $play2_card_back,
									"YOUR_HP" => $lang['CD_Your_HP'] . $your_hp . " / " . $your_max_hp,
									"YOUR_MP" => $lang['CD_Your_MP'] . $your_mp . " / " . $your_max_mp,
									"OPP_HP" => $lang['CD_Opp_HP'] . $opp_hp . " / " . $opp_max_hp,
									"OPP_MP" => $lang['CD_Opp_MP'] . $opp_mp . " / " . $opp_max_mp,
									"GAME_ID" => $HTTP_GET_VARS['game_id'],
									"USER_ID" => $userdata['user_id'])); 
		

		$template->pparse("body");
		
		
	}

}


	
$template->set_filenames(array(
	"footer" => 'card_duel_footer.tpl')
);

$template->pparse("footer");

include($phpbb_root_path . 'includes/page_tail.'.$phpEx);

?>