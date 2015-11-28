<?php
/***************************************************************************
 *                                card_duel_shops.php
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
	$redirect = "card_duel_shops.$phpEx";
	$redirect .= ( isset($user_id) ) ? '&user_id=' . $user_id : '';
	header('Location: ' . append_sid("login.$phpEx?redirect=$redirect", true));
}

include($phpbb_root_path . 'includes/page_header.'.$phpEx);


//view items in shop
if ( isset($HTTP_POST_VARS['view_shop']) || isset($HTTP_GET_VARS['view_shop'])) 
{
	$template->set_filenames(array(
		"header" => 'card_duel_header.tpl',
		"body" => 'card_duel_shops_view_body.tpl')
	);
	
	
	//sql command
	$sql = "SELECT * FROM " . CARD_DUELS_CARDS_TABLE . " WHERE shop_name='" . $HTTP_GET_VARS['view_shop'] . "'"; 
	
	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error retrieving cards data ', '', __LINE__, __FILE__, $sql); 
	} 
	
	//get all records
	while ( $row = $db->sql_fetchrow($result) ) 
	{ 
		if ($row['card_type'] == "Character")
		{
			$template->assign_block_vars('cards',array( 'CARD_PURCHASE' => '<a href="card_duel_shops.' . $phpEx . '?purchase=' .$row['id'] . '&amp;card_type=' . $HTTP_GET_VARS['view_shop'] . '">' .$lang['CD_Purchase'] . '</a>', 
														  'CARD_IMAGE' => $row['card_image'],
														  'CARD_DESCRIPTION' => 	$lang['CD_Element'] .': '. $row['element'] . '<br>' .
														  						$lang['CD_Card_Price'] .': '. $row['card_price'] . '<br>' .
														  						$lang['CD_Card_Req_Level'] .': '. $row['card_req_level'] . '<br>' .
																				$lang['CD_Card_MP_Cost'] .': '. $row['mp_cost'] . '<br>' .
																				$lang['CD_Card_Duration'] .': '. $row['card_length'])
										); 
		}
		else
		{
			$template->assign_block_vars('cards',array( 'CARD_PURCHASE' => '<a href="card_duel_shops.' . $phpEx . '?purchase=' .$row['id'] . '&amp;card_type=' . $HTTP_GET_VARS['view_shop'] . '">' .$lang['CD_Purchase'] . '</a>', 
														  'CARD_IMAGE' => $row['card_image'],
														  'CARD_DESCRIPTION' => 	$lang['CD_Element']  .': '. $row['element'] . '<br>' .
														  						$lang['CD_Card_Price']  .': '. $row['card_price'] . '<br>' .
														  						$lang['CD_Card_Req_Level']  .': '. $row['card_req_level'] . '<br>' .
																				$lang['CD_Card_MP_Cost']  .': '. $row['mp_cost'] . '<br>' .
																				$lang['CD_Card_Duration']  .': '. $row['card_length'] . '<br>' .
																				$lang['CD_Item_HP1']  .': '. $row['item_hp'] . '<br>' .
																				$lang['CD_Item_MP1']  .': '. $row['item_mp'] .  '<br>' .
																				$lang['CD_Item_Attack']  .': '. $row['item_attack'] . '<br>' .
																				$lang['CD_Item_Defense']  .': '. $row['item_defense'] . '<br>' .
																				$lang['CD_Item_Magic_Attack']  .': '. $row['item_magic_attack'] . '<br>' .
																				$lang['CD_Item_Magic_Defense']  .': '. $row['item_magic_defense'])
										); 
		}
	} 
	
	$template->assign_vars(array(
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
//purchasing card or at least try to ;\
elseif ( (isset($HTTP_POST_VARS['purchase']) || isset($HTTP_GET_VARS['purchase'])) &&  (isset($HTTP_POST_VARS['card_type']) || isset($HTTP_GET_VARS['card_type']) ) )
{
	$user_points = $userdata['user_points'];
	$template->set_filenames(array(
		"header" => 'card_duel_header.tpl',
		"body" => 'card_duel_info_body.tpl')
	);
	
	//sql command
	$sql = "SELECT * FROM " . CARD_DUELS_CARDS_TABLE . " WHERE id='" . $HTTP_GET_VARS['purchase'] . "'"; 
	
	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error retrieving card data ', '', __LINE__, __FILE__, $sql); 
	} 
	
	//records
	$row = $db->sql_fetchrow($result);
	
	//if user has enough points for card
	if ($row['card_price'] <= $user_points)
	{
		//update userpoints
		$user_points = $user_points - $row['card_price'];
		$user_id = $userdata['user_id'];
		
		//sql command (update user_points)
		$sql = "UPDATE " . $table_prefix . "users SET user_points='" . $user_points . "' WHERE user_id='$user_id'"; 
		
		//if didn't succeed
		if ( ! ( $result = $db->sql_query($sql) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error updating user data ', '', __LINE__, __FILE__, $sql); 
		} 

		//sql command (add card to database)
		$sql = "INSERT INTO " . CARD_DUELS_USER_CARDS_TABLE ." (user_id, card_id, card_type) VALUES ('" . $user_id . "','" . $HTTP_GET_VARS['purchase'] . "','" . str_replace(' '. $lang['CD_Card_Shop'],"", $HTTP_GET_VARS['card_type']) . "')"; 
		
		//if didn't succeed
		if ( ! ( $result = $db->sql_query($sql) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error updating user data ', '', __LINE__, __FILE__, $sql); 
		} 
		
		$template->assign_vars(array(
		"CD_BACK" => $lang['CD_Back'],
		"CD_INFO" => $lang['CD_Card_Purchased'])
		);
	}
	else
	{
		$template->assign_vars(array(
			"CD_BACK" => $lang['CD_Back'],
			"CD_INFO" => $lang['CD_Card_Not_Purchased'])
		);
	
	}
	
	$template->pparse("header");
	$template->pparse("body");
}
else // listing shops
{
	$template->set_filenames(array(
		"header" => 'card_duel_header.tpl',
		"body" => 'card_duel_shops_list_body.tpl')
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
	   $template->assign_block_vars('shop_cats',array( 'CD_SHOP_NAMES' => '<a href="card_duel_shops.' . $phpEx . '?view_shop=' .$row['shop_name'] . '">' .$row['shop_name'] . '</a>', 
													  'CD_IMAGES' => $row['image_name'],
													  'CD_DESCRIPTIONS' => $row['description'])
									); 
	} 

	$template->assign_vars(array(
		"CD_IMAGE" => $lang['CD_Image'],
		"CD_SHOP_NAME" => $lang['CD_Shop_Name'],
		"CD_DESCRIPTION" => $lang['CD_Description'],
		"LOGO" => $lang['CD_Card_Logo'],
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