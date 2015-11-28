<?php
/***************************************************************************
*                             admin_card_duel_cards.php
*                              -------------------
*     begin                : 07/20/2006
*     copyright            : William Hughes
*
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

define('IN_PHPBB', 1);

if( !empty($setmodules) )
{
	$filename = basename(__FILE__);
	$module['Card Duel']['Cards'] = $filename;
	return;
}

$phpbb_root_path = "./../";
include_once($phpbb_root_path . 'extension.inc');
include_once('./pagestart.' . $phpEx);
include_once('../language/lang_english/lang_duel_cards.php');
include_once('../includes/card_duel_constants.php');


if ( isset($HTTP_POST_VARS['submit']) || isset($HTTP_GET_VARS['submit']) ) //adding card to database.
{

		//sql command
		$sql = " INSERT INTO " . CARD_DUELS_CARDS_TABLE . " (shop_name, card_name, card_image, card_price, mp_cost, card_type, card_length, element, hp, mp, attack, defense, magic_attack, magic_defense, card_req_level, item_hp, item_mp, item_attack, item_defense, item_magic_attack, item_magic_defense) VALUES ('" . $HTTP_POST_VARS['card_shop'] . "', '" 
		. $HTTP_POST_VARS['card_name'] . "', '"
		. $HTTP_POST_VARS['card_image_path'] . "', '"
		. $HTTP_POST_VARS['card_price'] . "', '"
		. $HTTP_POST_VARS['mp_cost'] . "', '"
		. $HTTP_POST_VARS['card_type'] . "', '"
		. $HTTP_POST_VARS['card_turn_length'] . "', '"
		. $HTTP_POST_VARS['card_element'] . "', '"
		. $HTTP_POST_VARS['card_hp'] . "', '"
		. $HTTP_POST_VARS['card_mp'] . "', '"
		. $HTTP_POST_VARS['card_attack'] . "', '"
		. $HTTP_POST_VARS['card_defense'] . "', '"
		. $HTTP_POST_VARS['card_magic_attack'] . "', '"
		. $HTTP_POST_VARS['card_magic_defense'] . "', '"
		. $HTTP_POST_VARS['card_req_level'] . "', '"
		. $HTTP_POST_VARS['item_hp'] . "', '"
		. $HTTP_POST_VARS['item_mp'] . "', '"
		. $HTTP_POST_VARS['item_attack'] . "', '"
		. $HTTP_POST_VARS['item_defense'] . "', '"
		. $HTTP_POST_VARS['item_magic_attack'] . "', '"
		. $HTTP_POST_VARS['item_magic_defense'] . "')"; 
		
		//if didn't succeed
		if ( ! ( $result = $db->sql_query($sql) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error inserting card ', '', __LINE__, __FILE__, $sql); 
		} 
		else
		{
			echo '<br><br><center>' . $lang['CD_Card_Added'] . '</center><br><br>';
		}
}
//editing card in database
elseif ( isset($HTTP_POST_VARS['edit']) || isset($HTTP_GET_VARS['edit']))
{
	//sql command
	$sql = "UPDATE " . CARD_DUELS_CARDS_TABLE . " SET shop_name='" . $HTTP_POST_VARS['card_shop'] . "', card_name='" . $HTTP_POST_VARS['card_name'] . "', card_image='" . $HTTP_POST_VARS['card_image_path'] . "', card_image='" . $HTTP_POST_VARS['card_image_path'] . "', card_price='" . $HTTP_POST_VARS['card_price'] . "', mp_cost='" . $HTTP_POST_VARS['mp_cost'] . "', card_type='" . $HTTP_POST_VARS['card_type'] . "', card_length='" . $HTTP_POST_VARS['card_turn_length'] . "', element='" . $HTTP_POST_VARS['card_element'] . "', mp='" . $HTTP_POST_VARS['card_mp'] . "', hp='" . $HTTP_POST_VARS['card_hp'] . "', attack='" . $HTTP_POST_VARS['card_attack'] . "', defense='" . $HTTP_POST_VARS['card_defense'] . "', magic_attack='" . $HTTP_POST_VARS['card_magic_attack'] . "', magic_defense='" . $HTTP_POST_VARS['card_magic_defense'] . "', card_req_level='" . $HTTP_POST_VARS['card_req_level'] . "', item_hp='" . $HTTP_POST_VARS['item_hp'] . "', item_mp='" . $HTTP_POST_VARS['item_mp'] . "', item_attack='" . $HTTP_POST_VARS['item_attack'] . "', item_defense='" . $HTTP_POST_VARS['item_defense'] . "', item_magic_attack='" . $HTTP_POST_VARS['item_magic_attack'] . "', item_magic_defense='" . $HTTP_POST_VARS['item_magic_defense'] . "' WHERE id='" . $HTTP_GET_VARS['id'] . "'"; 

	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error updating card ', '', __LINE__, __FILE__, $sql); 
	} 
	else
	{
		echo '<br><br><center>' . $lang['CD_Card_Updated'] . '</center><br><br>';
	}

}
//if adding new card
elseif ( isset($HTTP_POST_VARS['add']) || isset($HTTP_GET_VARS['add']))
{

	$template->set_filenames(array(
		"body" => 'admin/config_cd_cards_add_card_body.tpl')
	);
	
	//sql command get shops table
	$sql = "SELECT * FROM " . CARD_DUELS_SHOPS_TABLE; 
	
	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error retrieving shops data ', '', __LINE__, __FILE__, $sql); 
	} 
	
	//get all records
	while ( $row = $db->sql_fetchrow($result) ) 
	{ 
	   	$template->assign_block_vars('shop_cats',array( 'CD_SHOPS' => $row['shop_name'])
		); 
	} 
	
	//sql command get elements
	$sql = "SELECT * FROM " . CARD_DUELS_CARD_TYPES_TABLE; 
	
	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error retrieving card types  data ', '', __LINE__, __FILE__, $sql); 
	} 
	
	//get all records
	while ( $row = $db->sql_fetchrow($result) ) 
	{ 
	   	$template->assign_block_vars('card_types',array( 'CD_CARD_TYPES' => $row['card_type_name'])
		); 
	}
	
	
	//sql command get elements
	$sql = "SELECT * FROM " . CARD_DUELS_ELEMENTS_TABLE; 
	
	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error retrieving elements data ', '', __LINE__, __FILE__, $sql); 
	} 
	
	//get all records
	while ( $row = $db->sql_fetchrow($result) ) 
	{ 
	   	$template->assign_block_vars('elements',array( 'CD_CARD_ELEMENTS' => $row['element_name'])
		); 
	}
	
	
	$template->assign_block_vars('switch_add_card',array() ); 
	
	$template->assign_vars(array(
		"CD_CARD_NAME" => $lang['CD_Card_Name'],
		"CD_CARD_IMAGE" => $lang['CD_Card_Image'],
		"CD_CARD_PRICE" => $lang['CD_Card_Price'],
		"CD_CARD_REQ_LEVEL" => $lang['CD_Card_Req_Level'],
		"CD_CARD_MP_COST" => $lang['CD_Card_MP_Cost'],
		"CD_CARD_TYPE" => $lang['CD_Card_Type'],
		"CD_CARD_TURN_LENGTH" => $lang['CD_Card_Turn_Length'],
		"CD_CARD_ELEMENT" => $lang['CD_Card_Element'],
		"CD_SHOP" => $lang['CD_Shop'],
		"CD_ADD_CARD" => $lang['CD_Add_Card'])
	);
	
	$template->pparse("body");

}
//if adding new card part 2 (final step)
elseif ( isset($HTTP_POST_VARS['add2']) || isset($HTTP_GET_VARS['add2']))
{

	$template->set_filenames(array(
		"body" => 'admin/config_cd_cards_add_card_step2_body.tpl')
	);


	$template->assign_block_vars('switch_add_card',array() ); 


	//if card type is character card
	if ( $HTTP_POST_VARS['card_type'] == "Character")
	{
		$template->assign_block_vars('switch_character_cards',array() ); 
		
		$template->assign_vars(array(
			"CD_CARD_NAMES" => $HTTP_POST_VARS['card_name'],
			"CD_CARD_IMAGES" => $HTTP_POST_VARS['card_image_path'],
			"CD_CARD_PRICES" => $HTTP_POST_VARS['card_price'],
			"CD_CARD_REQ_LEVELS" => $HTTP_POST_VARS['card_req_level'],
			"CD_CARD_MP_COSTS" => $HTTP_POST_VARS['mp_cost'],
			"CD_CARD_TYPES" => $HTTP_POST_VARS['card_type'],
			"CD_CARD_TURN_LENGTHS" => $HTTP_POST_VARS['card_turn_length'],
			"CD_CARD_ELEMENTS" => $HTTP_POST_VARS['card_element'],
			"CD_SHOPS" => $HTTP_POST_VARS['card_shop'],
			"CD_ADD_CARD" => $lang['CD_Add_Card'],
			"CD_CARD_HP" => $lang['CD_Card_HP'],
			"CD_CARD_MP" => $lang['CD_Card_MP'],
			"CD_CARD_ATTACK" => $lang['CD_Card_Attack'],
			"CD_CARD_DEFENSE" => $lang['CD_Card_Defense'],
			"CD_CARD_MAGIC_ATTACK" => $lang['CD_Card_Magic_Attack'],
			"CD_CARD_MAGIC_DEFENSE" => $lang['CD_Card_Magic_Defense'])
		);
	}
	else //if card type any card besides character
	{
		$template->assign_block_vars('switch_item_cards',array() ); 
		
		$template->assign_vars(array(
			"CD_CARD_NAMES" => $HTTP_POST_VARS['card_name'],
			"CD_CARD_IMAGES" => $HTTP_POST_VARS['card_image_path'],
			"CD_CARD_PRICES" => $HTTP_POST_VARS['card_price'],
			"CD_CARD_REQ_LEVELS" => $HTTP_POST_VARS['card_req_level'],
			"CD_CARD_MP_COSTS" => $HTTP_POST_VARS['mp_cost'],
			"CD_CARD_TYPES" => $HTTP_POST_VARS['card_type'],
			"CD_CARD_TURN_LENGTHS" => $HTTP_POST_VARS['card_turn_length'],
			"CD_CARD_ELEMENTS" => $HTTP_POST_VARS['card_element'],
			"CD_SHOPS" => $HTTP_POST_VARS['card_shop'],
			"CD_ADD_CARD" => $lang['CD_Add_Card'],
			"CD_ITEM_HP" => $lang['CD_Item_HP'],
			"CD_ITEM_MP" => $lang['CD_Item_MP'],
			"CD_ITEM_ATTACK" => $lang['CD_Item_Attack'],
			"CD_ITEM_DEFENSE" => $lang['CD_Item_Defense'],
			"CD_ITEM_MAGIC_ATTACK" => $lang['CD_Item_Magic_Attack'],
			"CD_ITEM_MAGIC_DEFENSE" => $lang['CD_Item_Magic_Defense'],
			"CD_ITEM_MP_USE" => $lang['CD_Item_MP_Use'])
		);
	}
	$template->pparse("body");

}
elseif ( isset($HTTP_GET_VARS['action']) || isset($HTTP_GET_VARS['action'])) //deleting or edit card from database
{

	//if deleting from database
	if ($HTTP_GET_VARS['action'] == "delete")
	{
		//sql command
		$sql = "DELETE FROM " . CARD_DUELS_CARDS_TABLE . " WHERE id=" . $HTTP_GET_VARS['id']; 
		
		//if didn't succeed
		if ( ! ( $result = $db->sql_query($sql) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error deleting card ', '', __LINE__, __FILE__, $sql); 
		} 
		else
		{
			echo '<br><br><center>' . $lang['CD_Card_Deleted'] . '</center><br><br>';
		}
	}
	//if editing a card
	elseif ($HTTP_GET_VARS['action'] == "edit")
	{
	
		$template->set_filenames(array(
			"body" => 'admin/config_cd_cards_add_card_body.tpl')
		);

		$template->assign_block_vars('switch_edit_card',array() ); 
		
		//sql command get shops table
		$sql = "SELECT * FROM " . CARD_DUELS_SHOPS_TABLE; 
		
		//if didn't succeed
		if ( ! ( $result = $db->sql_query($sql) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error retrieving shops data ', '', __LINE__, __FILE__, $sql); 
		} 
		
		//get all records
		while ( $row = $db->sql_fetchrow($result) ) 
		{ 
			$template->assign_block_vars('shop_cats',array( 'CD_SHOPS' => $row['shop_name'])
			); 
		} 
		
		//sql command get elements
		$sql = "SELECT * FROM " . CARD_DUELS_CARD_TYPES_TABLE; 
		
		//if didn't succeed
		if ( ! ( $result = $db->sql_query($sql) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error retrieving card types  data ', '', __LINE__, __FILE__, $sql); 
		} 
		
		//get all records
		while ( $row = $db->sql_fetchrow($result) ) 
		{ 
			$template->assign_block_vars('card_types',array( 'CD_CARD_TYPES' => $row['card_type_name'])
			); 
		}
		
		
		//sql command get elements
		$sql = "SELECT * FROM " . CARD_DUELS_ELEMENTS_TABLE; 
		
		//if didn't succeed
		if ( ! ( $result = $db->sql_query($sql) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error retrieving elements data ', '', __LINE__, __FILE__, $sql); 
		} 
		
		//get all records
		while ( $row = $db->sql_fetchrow($result) ) 
		{ 
			$template->assign_block_vars('elements',array( 'CD_CARD_ELEMENTS' => $row['element_name'])
			); 
	}
		//sql command
		$sql = "SELECT * FROM " . CARD_DUELS_CARDS_TABLE . " WHERE id=" . $HTTP_GET_VARS['id']; 
		
		//if didn't succeed
		if ( ! ( $result = $db->sql_query($sql) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error retreiving card info ', '', __LINE__, __FILE__, $sql); 
		} 
		else
		{
			//fetch row
			$row = $db->sql_fetchrow($result);
			
			
			if ( $row['card_type'] == "Character")
			{
				$template->assign_block_vars('switch_edit_char',array() ); 
				$template->assign_vars(array(
					"CD_CARD_NAMES" => $row['card_name'],
					"CD_CARD_IMAGES" => $row['card_image'],
					"CD_CARD_PRICES" => $row['card_price'],
					"CD_CARD_REQ_LEVELS" => $row['card_req_level'],
					"CD_CARD_MP_COSTS" => $row['mp_cost'],
					"CD_CARD_TURN_LENGTHS" => $row['card_length'],
					"CD_CARD_HPS" => $row['hp'],
					"CD_CARD_MPS" => $row['mp'],
					"CD_CARD_ATTACKS" => $row['attack'],
					"CD_CARD_DEFENSES" => $row['defense'],
					"CD_CARD_MAGIC_ATTACKS" => $row['magic_attack'],
					"CD_CARD_MAGIC_DEFENSES" => $row['magic_defense'],
					"CD_CARD_NAME" => $lang['CD_Card_Name'],
					"CD_CARD_IMAGE" => $lang['CD_Card_Image'],
					"CD_CARD_PRICE" => $lang['CD_Card_Price'],
					"CD_CARD_REQ_LEVEL" => $lang['CD_Card_Req_Level'],
					"CD_CARD_MP_COST" => $lang['CD_Card_MP_Cost'],
					"CD_CARD_TYPE" => $lang['CD_Card_Type'],
					"CD_CARD_TURN_LENGTH" => $lang['CD_Card_Turn_Length'],
					"CD_CARD_ELEMENT" => $lang['CD_Card_Element'],
					"CD_SHOP" => $lang['CD_Shop'],
					"CD_EDIT_CARD" => $lang['CD_Edit_Card'],
					"CD_CARD_HP" => $lang['CD_Card_HP'],
					"CD_CARD_MP" => $lang['CD_Card_MP'],
					"CD_CARD_ATTACK" => $lang['CD_Card_Attack'],
					"CD_CARD_DEFENSE" => $lang['CD_Card_Defense'],
					"CD_CARD_MAGIC_ATTACK" => $lang['CD_Card_Magic_Attack'],
					"CD_CARD_MAGIC_DEFENSE" => $lang['CD_Card_Magic_Defense'])
				);
			}
			else //if card type any card besides character
			{
				$template->assign_block_vars('switch_edit_item',array() ); 
				
				$template->assign_vars(array(
					"CD_CARD_NAMES" => $row['card_name'],
					"CD_CARD_IMAGES" => $row['card_image'],
					"CD_CARD_PRICES" => $row['card_price'],
					"CD_CARD_REQ_LEVELS" => $row['card_req_level'],
					"CD_CARD_MP_COSTS" => $row['mp_cost'],
					"CD_CARD_TURN_LENGTHS" => $row['card_length'],
					"CD_ITEM_HPS" => $row['item_hp'],
					"CD_ITEM_MPS" => $row['item_mp'],
					"CD_ITEM_ATTACKS" => $row['item_attack'],
					"CD_ITEM_DEFENSES" => $row['item_defense'],
					"CD_ITEM_MAGIC_ATTACKS" => $row['item_magic_attack'],
					"CD_ITEM_MAGIC_DEFENSES" => $row['item_magic_defense'],
					"CD_CARD_NAME" => $lang['CD_Card_Name'],
					"CD_CARD_IMAGE" => $lang['CD_Card_Image'],
					"CD_CARD_PRICE" => $lang['CD_Card_Price'],
					"CD_CARD_REQ_LEVEL" => $lang['CD_Card_Req_Level'],
					"CD_CARD_MP_COST" => $lang['CD_Card_MP_Cost'],
					"CD_CARD_TYPE" => $lang['CD_Card_Type'],
					"CD_CARD_TURN_LENGTH" => $lang['CD_Card_Turn_Length'],
					"CD_CARD_ELEMENT" => $lang['CD_Card_Element'],
					"CD_SHOP" => $lang['CD_Shop'],
					"CD_EDIT_CARD" => $lang['CD_Edit_Card'],
					
					"CD_ITEM_HP" => $lang['CD_Item_HP'],
					"CD_ITEM_MP" => $lang['CD_Item_MP'],
					"CD_ITEM_ATTACK" => $lang['CD_Item_Attack'],
					"CD_ITEM_DEFENSE" => $lang['CD_Item_Defense'],
					"CD_ITEM_MAGIC_ATTACK" => $lang['CD_Item_Magic_Attack'],
					"CD_ITEM_MAGIC_DEFENSE" => $lang['CD_Item_Magic_Defense'])
				);
			}
			$template->assign_block_vars('switch_edit_cards',array() ); 
		
				$template->assign_vars(array(
					"CD_EDIT_CARD" => $lang['CD_Edit_Card'],

					"CD_DESCRIPTIONS" => $row['description'])
					
				);
			
		}

		
		$template->pparse("body");
	}
}
else // listing cards
{
	$template->set_filenames(array(
		"body" => 'admin/config_cd_cards_list_body.tpl')
	);
	
	
	//sql command
	$sql = "SELECT * FROM " . CARD_DUELS_CARDS_TABLE; 
	
	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error retrieving cards data ', '', __LINE__, __FILE__, $sql); 
	} 
	
	//get all records
	while ( $row = $db->sql_fetchrow($result) ) 
	{ 
	   $template->assign_block_vars('cards',array( 'CD_CARD_IMAGES' => $row['card_image'], 
													  'CD_CARD_NAMES' => $row['card_name'],
													  'CD_CARD_PRICES' => $row['card_price'],
													  'CD_CARD_TYPES' => $row['card_type'],
													  'CD_CARD_ELEMENTS' => $row['element'],
													  'CD_CARD_EDIT' => append_sid("admin_card_duel_cards.php?action=edit&id=" . $row['id']),
													  'CD_CARD_DELETE' => append_sid("admin_card_duel_cards.php?action=delete&id=" . $row['id'])
													  ) ); 
	} 

	$template->assign_vars(array(
		"CD_EDIT" => $lang['CD_Edit'],
		"CD_DELETE" => $lang['CD_Delete'],
		"CD_IMAGE" => $lang['CD_Image'],
		"CD_ELEMENT" => $lang['CD_Element'],
		"CD_ACTION" => $lang['CD_Action'],
		"CD_ADD_CARD" => $lang['CD_Add_Card'],
		"CD_CARD_NAME" =>$lang['CD_Card_Name'],
		"CD_CARD_PRICE" => $lang['CD_Card_Price'],
		"CD_CARD_TYPE" => $lang['CD_Card_Type'])
	);

	$template->pparse("body");
}

include_once('./page_footer_admin.'.$phpEx);
?>
