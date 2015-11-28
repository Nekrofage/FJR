<?php
/***************************************************************************
 *                                card_duel_decks.php
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
	$redirect = "card_duel_decks.$phpEx";
	$redirect .= ( isset($user_id) ) ? '&user_id=' . $user_id : '';
	header('Location: ' . append_sid("login.$phpEx?redirect=$redirect", true));
}

include($phpbb_root_path . 'includes/page_header.'.$phpEx);


//creating deck
if ( isset($HTTP_POST_VARS['create']) || isset($HTTP_GET_VARS['create']) ) 
{

	$user_id = $userdata['user_id'];
	$template->set_filenames(array(
		"header" => 'card_duel_header.tpl',
		"body" => 'card_duel_info_body.tpl')
	);
	
	//sql command
	$sql = "SELECT * FROM " . CARD_DUELS_DECK_NAMES_TABLE . " WHERE user_id='" . $userdata['user_id'] . "' AND deck_name='" . $HTTP_POST_VARS['deck_name'] . "'";

	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error retrieving decks data ', '', __LINE__, __FILE__, $sql); 
	} 
	
	//try to get record. (finding out if user allready created deck with same name)
	$row = $db->sql_fetchrow($result);

	//no deck with same name found
	if ($row['id'] == "")
	{
	
		//sql command (add deck name to database)
		$sql = "INSERT INTO " . CARD_DUELS_DECK_NAMES_TABLE . " (user_id, deck_name) VALUES ('" . $userdata['user_id'] . "','" . $HTTP_POST_VARS['deck_name'] . "')"; 


		//if didn't succeed
		if ( ! ( $result = $db->sql_query($sql) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error inserting deck data ', '', __LINE__, __FILE__, $sql); 
		} 

		$template->assign_vars(array(
		"CD_BACK" => $lang['CD_Back'],
		"CD_INFO" => $lang['CD_Deck_Created'])
		);
		
	}
	//user allready has deck with same name in Database
	else
	{
	
		$template->assign_vars(array(
		"CD_BACK" => $lang['CD_Back'],
		"CD_INFO" => $lang['CD_Deck_Create_Dup'])
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
//delete card from deck
elseif ( isset($HTTP_POST_VARS['delete']) || isset($HTTP_GET_VARS['delete']) ) 
{

	$template->set_filenames(array(
		"header" => 'card_duel_header.tpl',
		"body" => 'card_duel_info_body.tpl')
	);
	
	//sql command
	$sql = "SELECT * FROM " . CARD_DUELS_DECKS_TABLE . " WHERE user_id='" . $userdata['user_id'] . "' AND deck_name='" .$HTTP_GET_VARS['delete'] . "'"; 
	
	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error retrieving decks data ', '', __LINE__, __FILE__, $sql); 
	} 
	
	//get all records
	while ( $row = $db->sql_fetchrow($result) ) 
	{ 
		
		//sql command
		$sql2 = "DELETE FROM " . CARD_DUELS_DECKS_TABLE . " WHERE user_id='" . $userdata['user_id'] . "' AND user_card_id='" .$row['user_card_id'] . "'"; 
		
		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error deleting deck data ', '', __LINE__, __FILE__, $sql2); 
		} 
	
	}

	//sql command
	$sql2 = "DELETE FROM " . CARD_DUELS_DECK_NAMES_TABLE . " WHERE user_id='" . $userdata['user_id'] . "' AND deck_name='" .$HTTP_GET_VARS['delete'] . "'"; 
	
	//if didn't succeed
	if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error deleting deck name data ', '', __LINE__, __FILE__, $sql2); 
	} 
	
	$template->assign_vars(array(
		"CD_BACK" => $lang['CD_Back'],
		"CD_INFO" => $lang['CD_Deck_Deleted'],
		"INDEX" => $lang['CD_Return_Card_Duel_Main'],
		"YOUR_CARD_DECKS" => $lang['CD_Your_Card_Decks'],
		"CARD_SHOPS" => $lang['CD_Card_Shops'],
		"YOUR_CARD_INV" => $lang['CD_Your_Card_Inv'],
		"RETURN_CARD_DUEL_MAIN" => $lang['CD_Return_Card_Duel_Main'])
	);
	$template->pparse("header");
	$template->pparse("body");
}
//delete card from deck
elseif ( isset($HTTP_POST_VARS['remove']) || isset($HTTP_GET_VARS['remove']) ) 
{

	$template->set_filenames(array(
		"header" => 'card_duel_header.tpl',
		"body" => 'card_duel_info_body.tpl')
	);
	
	//sql command
	$sql = "DELETE FROM " . CARD_DUELS_DECKS_TABLE . " WHERE user_id='" . $userdata['user_id'] . "' AND id='" .$HTTP_GET_VARS['remove'] . "'"; 
	
	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error retrieving decks data ', '', __LINE__, __FILE__, $sql); 
	} 
	
	
	$template->assign_vars(array(
		"CD_BACK" => $lang['CD_Back'],
		"CD_INFO" => $lang['CD_Deck_Card_Deleted'])
	);
	
	$template->pparse("header");
	$template->pparse("body");
}
//view cards in deck
elseif ( isset($HTTP_POST_VARS['deck']) || isset($HTTP_GET_VARS['deck']) ) 
{


	$template->set_filenames(array(
		"header" => 'card_duel_header.tpl',
		"body" => 'card_duel_decks_list_body.tpl')
	);


	//sql command
	$sql = "SELECT * FROM " . CARD_DUELS_DECKS_TABLE . " WHERE user_id='" . $userdata['user_id'] . "' AND deck_name='" .$HTTP_GET_VARS['deck'] . "'"; 

	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error retrieving decks data ', '', __LINE__, __FILE__, $sql); 
	} 

	//get all records
	while ( $row = $db->sql_fetchrow($result) ) 
	{ 

		//sql command
		$sql2 = "SELECT * FROM " . CARD_DUELS_USER_CARDS_TABLE . " WHERE user_id='" . $userdata['user_id'] . "' AND id='" . $row['user_card_id'] . "'"; 
		
		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error retrieving user cards data ', '', __LINE__, __FILE__, $sql2); 
		} 
		
		$row2 = $db->sql_fetchrow($result2);

		//sql command
		$sql2 = "SELECT * FROM " . CARD_DUELS_CARDS_TABLE . " WHERE id='" . $row2['card_id'] . "'"; 
		
		//if didn't succeed
		if ( ! ( $result2 = $db->sql_query($sql2) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error retrieving cards data ', '', __LINE__, __FILE__, $sql2); 
		} 
		
		$row2 = $db->sql_fetchrow($result2);
		
		if ($row2['card_type'] == "Character")
		{
			$template->assign_block_vars('cards',array( 'CARD_REMOVE' => '<a href="card_duel_decks.' . $phpEx . '?remove=' .$row['id'] . '">' . $lang['CD_Deck_Delete_Card'] . '</a>', 
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
		
			$template->assign_block_vars('cards',array( 'CARD_REMOVE' => '<a href="card_duel_decks.' . $phpEx . '?remove=' .$row['id'] . '">' . $lang['CD_Deck_Delete_Card'] . '</a>', 
														 'CARD_IMAGE' => $row2['card_image'],
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
		"INDEX" => $lang['CD_Return_Card_Duel_Main'],
		"YOUR_CARD_DECKS" => $lang['CD_Your_Card_Decks'],
		"CARD_SHOPS" => $lang['CD_Card_Shops'],
		"YOUR_CARD_INV" => $lang['CD_Your_Card_Inv'],
		"RETURN_CARD_DUEL_MAIN" => $lang['CD_Return_Card_Duel_Main'])
	);
	
	$template->pparse("header");
	$template->pparse("body");
}
else // listing decks
{
	$template->set_filenames(array(
		"header" => 'card_duel_header.tpl',
		"body" => 'card_duel_decks_view_body.tpl')
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

	   $template->assign_block_vars('deck',array( 'CD_DECK_NAMES' => '<a href="card_duel_decks.' . $phpEx . '?deck=' . $row['deck_name'] . '">' . $row['deck_name'] . '</a>',
													  'CD_DECK_DELETES' => '<a href="card_duel_decks.' . $phpEx . '?delete=' . $row['deck_name'] . '">' . $lang['CD_Delete'] . '</a>')
									); 
	} 

	$template->assign_vars(array(
		"CD_DECK_DELETE" => $lang['CD_Deck_Delete'],
		"CD_DECK_NAME" => $lang['CD_Deck_Name'],
		"CD_DECK_CREATE" => $lang['CD_Deck_Create'],
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