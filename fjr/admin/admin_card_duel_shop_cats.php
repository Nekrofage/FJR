<?php
/***************************************************************************
*                             admin_card_duel_shop_cats.php
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
	$module['Card Duel']['Shop Categories'] = $filename;
	return;
}

$phpbb_root_path = "./../";
include_once($phpbb_root_path . 'extension.inc');
include_once('./pagestart.' . $phpEx);
include_once('../language/lang_english/lang_duel_cards.php');
include_once('../includes/card_duel_constants.php');


if ( isset($HTTP_POST_VARS['submit']) || isset($HTTP_GET_VARS['submit']) ) //adding shop to database.
{
	//if no fields are blank
	if ( ($HTTP_POST_VARS['shop_name'] <> "") && ($HTTP_POST_VARS['shop_image_path'] <> "") && ($HTTP_POST_VARS['shop_description'] <> "") )
	{
		//sql command
		$sql = " INSERT INTO " . CARD_DUELS_SHOPS_TABLE . " (shop_name, image_name, description) VALUES ('" . $HTTP_POST_VARS['shop_name'] . "', '" . $HTTP_POST_VARS['shop_image_path'] . "', '" . $HTTP_POST_VARS['shop_description']. "')"; 
		
		//if didn't succeed
		if ( ! ( $result = $db->sql_query($sql) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error inserting shop ', '', __LINE__, __FILE__, $sql); 
		} 
		else
		{
			echo '<br><br><center>' . $lang['CD_Shop_Added'] . '</center><br><br>';
		}
	}
}
//editing shop in database
elseif ( isset($HTTP_POST_VARS['edit']) || isset($HTTP_GET_VARS['edot']))
{
	//if no fields are blank
	if ( ($HTTP_POST_VARS['shop_name'] <> "") && ($HTTP_POST_VARS['shop_image_path'] <> "") && ($HTTP_POST_VARS['shop_description'] <> "") )
	{
		//sql command
		$sql = "UPDATE " . CARD_DUELS_SHOPS_TABLE . " SET shop_name='" . $HTTP_POST_VARS['shop_name'] . "', image_name='" . $HTTP_POST_VARS['shop_image_path'] . "', description='" . $HTTP_POST_VARS['shop_description']. "' WHERE id='" . $HTTP_GET_VARS['id'] . "'"; 

		//if didn't succeed
		if ( ! ( $result = $db->sql_query($sql) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error updating shop', '', __LINE__, __FILE__, $sql); 
		} 
		else
		{
			echo '<br><br><center>' . $lang['CD_Shop_Updated'] . '</center><br><br>';
		}
	}
}
//if adding new shop
elseif ( isset($HTTP_POST_VARS['add']) || isset($HTTP_GET_VARS['add']))
{

	$template->set_filenames(array(
		"body" => 'admin/config_cd_shop_cats_add_shop_body.tpl')
	);
	
	$template->assign_block_vars('switch_add_shop',array() ); 
	
	$template->assign_vars(array(
		"CD_SHOP_NAME" => $lang['CD_Shop_Name'],
		"CD_SHOP_IMAGE" => $lang['CD_Shop_Image'],
		"CD_DESCRIPTION" => $lang['CD_Description'],
		"CD_ADD_SHOP_CAT" => $lang['CD_Add_Shop_Cat'])
		
	);
	
	$template->pparse("body");

}
elseif ( isset($HTTP_GET_VARS['action']) || isset($HTTP_GET_VARS['action'])) //deleting or edit shop from database
{

	//if deleting from database
	if ($HTTP_GET_VARS['action'] == "delete")
	{
		//sql command
		$sql = "DELETE FROM " . CARD_DUELS_SHOPS_TABLE . " WHERE id=" . $HTTP_GET_VARS['id']; 
		
		//if didn't succeed
		if ( ! ( $result = $db->sql_query($sql) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error deleting shop', '', __LINE__, __FILE__, $sql); 
		} 
		else
		{
			echo '<br><br><center>' . $lang['CD_Shop_Deleted'] . '</center><br><br>';
		}
	}
	//if editing a shop
	elseif ($HTTP_GET_VARS['action'] == "edit")
	{
	
		$template->set_filenames(array(
			"body" => 'admin/config_cd_shop_cats_add_shop_body.tpl')
		);
		
		//sql command
		$sql = "SELECT * FROM " . CARD_DUELS_SHOPS_TABLE . " WHERE id=" . $HTTP_GET_VARS['id']; 
		
		//if didn't succeed
		if ( ! ( $result = $db->sql_query($sql) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error retreiving shop info ', '', __LINE__, __FILE__, $sql); 
		} 
		else
		{
			//fetch row
			$row = $db->sql_fetchrow($result);
			
			$template->assign_block_vars('switch_edit_shop',array() ); 
		
				$template->assign_vars(array(
					"CD_SHOP_NAME" => $lang['CD_Shop_Name'],
					"CD_SHOP_IMAGE" => $lang['CD_Shop_Image'],
					"CD_DESCRIPTION" => $lang['CD_Description'],
					"CD_EDIT_SHOP_CAT" => $lang['CD_Edit_Shop_Cat'],
					"CD_SHOP_NAMES" => $row['shop_name'],
					"CD_SHOP_IMAGES" => $row['image_name'],
					"CD_DESCRIPTIONS" => $row['description'])
					
				);
			
		}

		
		$template->pparse("body");
	}
}
else // listing elements
{
	$template->set_filenames(array(
		"body" => 'admin/config_cd_shop_cats_list_body.tpl')
	);
	
	
	//sql command
	$sql = "SELECT * FROM " . CARD_DUELS_SHOPS_TABLE; 
	
	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error retrieving elements data ', '', __LINE__, __FILE__, $sql); 
	} 
	
	//get all records
	while ( $row = $db->sql_fetchrow($result) ) 
	{ 
	   $template->assign_block_vars('shop_cats',array( 'CD_SHOP_NAMES' => $row['shop_name'], 
													  'CD_IMAGES' => $row['image_name'],
													  'CD_DESCRIPTIONS' => $row['description'],
													  'CD_SHOP_CAT_EDIT' => append_sid("admin_card_duel_shop_cats.php?action=edit&id=" . $row['id']),
													  'CD_SHOP_CAT_DELETE' => append_sid("admin_card_duel_shop_cats.php?action=delete&id=" . $row['id'])
													  ) ); 
	} 

	$template->assign_vars(array(
		"CD_EDIT" => $lang['CD_Edit'],
		"CD_DELETE" => $lang['CD_Delete'],
		"CD_IMAGE" => $lang['CD_Image'],
		"CD_ACTION" => $lang['CD_Action'],
		"CD_SHOP_NAME" => $lang['CD_Shop_Name'],
		"CD_DESCRIPTION" => $lang['CD_Description'],
		"CD_ADD_SHOP_CAT" => $lang['CD_Add_Shop_Cat'])
	);

	$template->pparse("body");
}

include_once('./page_footer_admin.'.$phpEx);
?>