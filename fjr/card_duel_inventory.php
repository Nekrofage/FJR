<?php
/***************************************************************************
 *                                card_duel_inventory.php
 *                            -------------------
 *   begin                : 7/22/2006
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
	$redirect = "card_duel_inventory.$phpEx";
	$redirect .= ( isset($user_id) ) ? '&user_id=' . $user_id : '';
	header('Location: ' . append_sid("login.$phpEx?redirect=$redirect", true));
}

include($phpbb_root_path . 'includes/page_header.'.$phpEx);


//if adding card to deck
if ( isset($HTTP_POST_VARS['add_to_deck']) || isset($HTTP_GET_VARS['add_to_deck']) ) 
{

	$template->set_filenames(array(
		"header" => 'card_duel_header.tpl',
		"body" => 'card_duel_info_body.tpl')
	);
	
	if ( check_deck_card_type($userdata['user_id'],$HTTP_POST_VARS['select'], $HTTP_POST_VARS['hidden'],$HTTP_GET_VARS['cat']) == true )
	{
		//sql command
		$sql = "SELECT * FROM " . CARD_DUELS_DECKS_TABLE . " WHERE user_id='" . $userdata['user_id'] . "' AND deck_name='" . $HTTP_POST_VARS['select'] . "' AND user_card_id='" . $HTTP_POST_VARS['hidden'] . "'";
	
		//if didn't succeed
		if ( ! ( $result = $db->sql_query($sql) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error retrieving decks data ', '', __LINE__, __FILE__, $sql); 
		} 
		
		//try to get record. 
		$row = $db->sql_fetchrow($result);
	
		//if same card not found in deck
		if ($row['id'] == "")
		{
			//sql command (add deck name to database)
			$sql = "INSERT INTO " . CARD_DUELS_DECKS_TABLE . " (user_id, deck_name, user_card_id) VALUES ('" . $userdata['user_id'] . "','" . $HTTP_POST_VARS['select']  . "','" . $HTTP_POST_VARS['hidden'] . "')"; 
	
	
			//if didn't succeed
			if ( ! ( $result = $db->sql_query($sql) ) ) 
			{ 
			   message_die(GENERAL_ERROR, 'Error inserting deck data ', '', __LINE__, __FILE__, $sql); 
			} 
	
			$template->assign_vars(array(
			"CD_BACK" => $lang['CD_Back'],
			"CD_INFO" => $lang['CD_Card_Added'])
			);
		}
		else
		{
			$template->assign_vars(array(
			"CD_BACK" => $lang['CD_Back'],
			"CD_INFO" => $lang['CD_Card_Not_Added'])
			);
		}
	}
	else
	{
		$template->assign_vars(array(
		"CD_BACK" => $lang['CD_Back'],
		"CD_INFO" => $lang['CD_Multi_Card_Back'])
		);
	}
	
	$template->assign_vars(array(
		"INDEX" => $lang['CD_Return_Card_Duel_Main'],
		"YOUR_CARD_DECKS" => $lang['CD_Your_Card_Decks'],
		"CARD_SHOPS" => $lang['CD_Card_Shops'],
		"YOUR_CARD_INV" => $lang['CD_Your_Card_Inv'],
		"RETURN_CARD_DUEL_MAIN" => $lang['CD_Return_Card_Duel_Main'])
	);
	$template->pparse("header");
	$template->pparse("body");
}
//view cards from category
elseif ( isset($HTTP_POST_VARS['cat']) || isset($HTTP_GET_VARS['cat']) ) 
{

	$user_id = $userdata['user_id'];
	$template->set_filenames(array(
		"header" => 'card_duel_header.tpl',
		"body" => 'card_duel_inventory_view_body.tpl')
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
	$sql = "SELECT * FROM " . CARD_DUELS_USER_CARDS_TABLE . " WHERE card_type='" . $HTTP_GET_VARS['cat'] . "' AND user_id='" . $user_id . "'"; 

	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error retrieving user cards data ', '', __LINE__, __FILE__, $sql); 
	} 
	
	//get all records
	while ( $row = $db->sql_fetchrow($result) ) 
	{ 
	
		//sql command
		$sql2 = "SELECT * FROM " . CARD_DUELS_CARDS_TABLE . " WHERE id='" . $row['card_id'] . "'"; 
		
		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error retrieving card data ', '', __LINE__, __FILE__, $sql); 
		} 
		
		$row2 = $db->sql_fetchrow($result2);

		if ($row2['card_type'] == "Character")
		{
			$template->assign_block_vars('cards',array( 'CARD_SELL' => '<a href="card_duel_inventory.' . $phpEx . '?sell=' .$row['id'] . '">' .$lang['CD_Sell'] . '</a>', 
														'CARD_DELETE' => '<a href="card_duel_inventory.' . $phpEx . '?delete=' .$row['id'] . '">' .$lang['CD_Delete'] . '</a>', 
														'CARD_ID' => $row['id'],
														'CARD_IMAGE' => $row2['card_image'],
														'CARD_DESCRIPTION' => 	$lang['CD_Element'] .': '. $row2['element'] . '<br>' .
														  						$lang['CD_Card_Price'] .': '. $row2['card_price'] . '<br>' .
														  						$lang['CD_Card_Req_Level'] .': '. $row2['card_req_level'] . '<br>' .
																				$lang['CD_Card_MP_Cost'] .': '. $row2['mp_cost'] . '<br>' .
																				$lang['CD_Card_Duration'] .': '. $row2['card_length'])
										); 
		}
		else
		{
		
			$template->assign_block_vars('cards',array( 'CARD_SELL' => '<a href="card_duel_inventory.' . $phpEx . '?sell=' .$row['id'] . '">' .$lang['CD_Sell'] . '</a>', 
														'CARD_DELETE' => '<a href="card_duel_inventory.' . $phpEx . '?delete=' .$row['id'] . '">' .$lang['CD_Delete'] . '</a>', 
														 'CARD_IMAGE' => $row2['card_image'],
														 'CARD_ID' => $row['id'],
														 'CARD_DESCRIPTION' => 	$lang['CD_Element']  .': '. $row2['element'] . '<br>' .
														  						$lang['CD_Card_Price']  .': '. $row2['card_price'] . '<br>' .
														  						$lang['CD_Card_Req_Level']  .': '. $row2['card_req_level'] . '<br>' .
																				$lang['CD_Card_MP_Cost']  .': '. $row2['mp_cost'] . '<br>' .
																				$lang['CD_Card_Duration']  .': '. $row2['card_length'] . '<br>' .
																				$lang['CD_Item_HP1']  .': '. $row2['item_hp'] . '<br>' .
																				$lang['CD_Item_MP1']  .': '. $row2['item_mp'] .  '<br>' .
																				$lang['CD_Item_Attack']  .': '. $row2['item_attack'] . '<br>' .
																				$lang['CD_Item_Defense']  .': '. $row2['item_defense'] . '<br>' .
																				$lang['CD_Item_Magic_Attack']  .': '. $row2['item_magic_attack'] . '<br>' .
																				$lang['CD_Item_Magic_Defense']  .': '. $row2['item_magic_defense'])
										); 
		}
	} 
	
	$template->assign_vars(array(
		"CD_ADD_TO_DECK" => $lang['CD_Add_To_Deck'],
		"CD_CARD_DECKS" => $option_value,
		"CARD_IMAGE" => $lang['CD_Card_Image'],
		"CARD_INFO" => $lang['CD_Card_Info'],
		"ACTION" => $lang['CD_Action'],
		"DECK_OPTIONS" => $lang['CD_Card_Deck_Options'])
	);
	$template->assign_vars(array(
		"INDEX" => $lang['CD_Return_Card_Duel_Main'],
		"YOUR_CARD_DECKS" => $lang['CD_Your_Card_Decks'],
		"CARD_SHOPS" => $lang['CD_Card_Shops'],
		"YOUR_CARD_INV" => $lang['CD_Your_Card_Inv'],
		"RETURN_CARD_DUEL_MAIN" => $lang['CD_Return_Card_Duel_Main'])
	);
	$template->pparse("header");
	$template->pparse("body");

}
//deleting card from inventory
elseif ( isset($HTTP_POST_VARS['delete']) || isset($HTTP_GET_VARS['delete']) ) 
{
	$template->set_filenames(array(
		"header" => 'card_duel_header.tpl',
		"body" => 'card_duel_info_body.tpl')
	);
	
	//sql command
	$sql = "DELETE FROM " . CARD_DUELS_USER_CARDS_TABLE . " WHERE id='" . $HTTP_GET_VARS['delete'] . "'"; 
		
	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
		  message_die(GENERAL_ERROR, 'Error deleting card data ', '', __LINE__, __FILE__, $sql); 
	} 
	
	$template->assign_vars(array(
		"CD_BACK" => $lang['CD_Back1'],
		"CD_INFO" => $lang['CD_Card_Deleted'])
	);
	
	$template->pparse("header");
	$template->pparse("body");
}
//selling card from inventory
elseif ( isset($HTTP_POST_VARS['sell']) || isset($HTTP_GET_VARS['sell']) ) 
{
	$template->set_filenames(array(
		"header" => 'card_duel_header.tpl',
		"body" => 'card_duel_info_body.tpl')
	);
	
	//sql command get card info
	$sql = "SELECT * FROM " . CARD_DUELS_USER_CARDS_TABLE . " WHERE id='" . $HTTP_GET_VARS['sell'] . "'"; 
	
	
	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
		  message_die(GENERAL_ERROR, 'Error deleting card data ', '', __LINE__, __FILE__, $sql); 
	} 
	
	$row = $db->sql_fetchrow($result);
	
	//sql command, get card info (card price)
	$sql = "SELECT * FROM " . CARD_DUELS_CARDS_TABLE . " WHERE id='" . $row['card_id'] . "'"; 
	
	
	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
		  message_die(GENERAL_ERROR, 'Error retreiving card data ', '', __LINE__, __FILE__, $sql); 
	} 
	
	$row = $db->sql_fetchrow($result);
	
	$user_points = $userdata['user_points'] + ($row['card_price'] * 0.75);
	
	//sql command (update user_points)
	$sql = "UPDATE " . $table_prefix . "users SET user_points='" . $user_points . "' WHERE user_id='" . $userdata['user_id'] . "'"; 
		
	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
		message_die(GENERAL_ERROR, 'Error updating user data ', '', __LINE__, __FILE__, $sql); 
	} 
	
	//sql command delete card from users inventory
	$sql = "DELETE FROM " . CARD_DUELS_USER_CARDS_TABLE . " WHERE id='" . $HTTP_GET_VARS['sell'] . "'"; 
		
	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
		message_die(GENERAL_ERROR, 'Error updating user data ', '', __LINE__, __FILE__, $sql); 
	} 
	

	$template->assign_vars(array(
		"CD_BACK" => $lang['CD_Back1'],
		"CD_INFO" => $lang['CD_Card_Sold'])
	);
	$template->assign_vars(array(
		"INDEX" => $lang['CD_Return_Card_Duel_Main'],
		"YOUR_CARD_DECKS" => $lang['CD_Your_Card_Decks'],
		"CARD_SHOPS" => $lang['CD_Card_Shops'],
		"YOUR_CARD_INV" => $lang['CD_Your_Card_Inv'],
		"RETURN_CARD_DUEL_MAIN" => $lang['CD_Return_Card_Duel_Main'])
	);
	$template->pparse("header");
	$template->pparse("body");
}
else // listing categories.
{
	$template->set_filenames(array(
		"header" => 'card_duel_header.tpl',
		"body" => 'card_duel_inventory_list_body.tpl')
	);
	
	
	//sql command
	$sql = "SELECT * FROM " . CARD_DUELS_SHOPS_TABLE; 
	
	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error retrieving shops data ', '', __LINE__, __FILE__, $sql); 
	} 
	
	//get all records
	while ( $row = $db->sql_fetchrow($result) ) 
	{ 
	   $template->assign_block_vars('card_cats',array( 'CD_SHOP_NAMES' => '<a href="card_duel_inventory.' . $phpEx . '?cat=' . str_replace(' ' . $lang['CD_Card_Shop'], "", $row['shop_name']) . '">' . str_replace($lang['CD_Shop'], $lang['CD_Inventory'], $row['shop_name']) . '</a>',
													  'CD_IMAGES' => $row['image_name'],
													  'CD_DESCRIPTIONS' => $row['description'])
									); 
	} 
	
	$template->assign_vars(array(
		"LOGO" => $lang['CD_Card_Logo'],
		"INVENTORY" => $lang['CD_Inventory'] )
	);
	
	$template->assign_vars(array(
		"INDEX" => $lang['CD_Return_Card_Duel_Main'],
		"YOUR_CARD_DECKS" => $lang['CD_Your_Card_Decks'],
		"CARD_SHOPS" => $lang['CD_Card_Shops'],
		"YOUR_CARD_INV" => $lang['CD_Your_Card_Inv'],
		"RETURN_CARD_DUEL_MAIN" => $lang['CD_Return_Card_Duel_Main'])
	);
	$template->pparse("header");
	$template->pparse("body");
}

$template->set_filenames(array(
	"footer" => 'card_duel_footer.tpl')
);

$template->pparse("footer");

include($phpbb_root_path . 'includes/page_tail.'.$phpEx);

?>