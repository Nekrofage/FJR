<?php
/***************************************************************************
*                             admin_card_duel_elements.php
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
	$module['Card Duel']['Elements'] = $filename;
	return;
}

$phpbb_root_path = "./../";
include_once($phpbb_root_path . 'extension.inc');
include_once('./pagestart.' . $phpEx);
include_once('../language/lang_english/lang_duel_cards.php');
include_once('../includes/card_duel_constants.php');


if ( isset($HTTP_POST_VARS['submit']) || isset($HTTP_GET_VARS['submit'])) //adding element to database.
{
	//if element name and image path not blank
	if ( ($HTTP_POST_VARS['element_name'] <> "") && ($HTTP_POST_VARS['element_image_path'] <> "") )
	{
		//sql command
		$sql = " INSERT INTO " . CARD_DUELS_ELEMENTS_TABLE . " (element_name, element_image) VALUES ('" . $HTTP_POST_VARS['element_name'] . "', '" . $HTTP_POST_VARS['element_image_path'] . "')"; 
		
		//if didn't succeed
		if ( ! ( $result = $db->sql_query($sql) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error inserting element', '', __LINE__, __FILE__, $sql); 
		} 
		else
		{
			echo '<br><br><center>' . $lang['CD_Element_Added'] . '</center><br><br>';
		}
	}
}
//editing element in database
elseif ( isset($HTTP_POST_VARS['edit']) || isset($HTTP_GET_VARS['edot']))
{
	//if element name and image path not blank
	if ( ($HTTP_POST_VARS['element_name'] <> "") && ($HTTP_POST_VARS['element_image_path'] <> "") )
	{
		//sql command
		$sql = "UPDATE " . CARD_DUELS_ELEMENTS_TABLE . " SET element_name='" . $HTTP_POST_VARS['element_name'] . "', element_image='" . $HTTP_POST_VARS['element_image_path'] . "' WHERE id='" . $HTTP_GET_VARS['id'] . "'"; 

		//if didn't succeed
		if ( ! ( $result = $db->sql_query($sql) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error updating element', '', __LINE__, __FILE__, $sql); 
		} 
		else
		{
			echo '<br><br><center>' . $lang['CD_Element_Updated'] . '</center><br><br>';
		}
	}
}
//if adding new element
elseif ( isset($HTTP_POST_VARS['add']) || isset($HTTP_GET_VARS['add']))
{

	$template->set_filenames(array(
		"body" => 'admin/config_cd_elements_add_body.tpl')
	);
	
	$template->assign_block_vars('switch_add_element',array() ); 
	
	$template->assign_vars(array(
		"CD_ADD_ELEMENT" => $lang['CD_Add_Element'],
		"CD_CARD_ELEMENT_NAME" => $lang['CD_Card_Element_Name'],
		"CD_CARD_ELEMENT_IMAGE" => $lang['CD_Card_Element_Image_Name'])
	);
	
	$template->pparse("body");

}
elseif ( isset($HTTP_GET_VARS['action']) || isset($HTTP_GET_VARS['action'])) //deleting or edit element from database
{

	//if deleting from database
	if ($HTTP_GET_VARS['action'] == "delete")
	{
		//sql command
		$sql = "DELETE FROM " . CARD_DUELS_ELEMENTS_TABLE . " WHERE id=" . $HTTP_GET_VARS['id']; 
		
		//if didn't succeed
		if ( ! ( $result = $db->sql_query($sql) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error deleting element', '', __LINE__, __FILE__, $sql); 
		} 
		else
		{
			echo '<br><br><center>' . $lang['CD_Item_Deleted'] . '</center><br><br>';
		}
	}
	//if editing a post
	elseif ($HTTP_GET_VARS['action'] == "edit")
	{
	
		$template->set_filenames(array(
			"body" => 'admin/config_cd_elements_add_body.tpl')
		);
		
		//sql command
		$sql = "SELECT * FROM " . CARD_DUELS_ELEMENTS_TABLE . " WHERE id=" . $HTTP_GET_VARS['id']; 
		
		//if didn't succeed
		if ( ! ( $result = $db->sql_query($sql) ) ) 
		{ 
		   message_die(GENERAL_ERROR, 'Error deleting element', '', __LINE__, __FILE__, $sql); 
		} 
		else
		{
			//fetch row
			$row = $db->sql_fetchrow($result);
			
			$template->assign_block_vars('switch_edit_element',array() ); 
		
				$template->assign_vars(array(
					"CD_ADD_ELEMENT" => $lang['CD_Add_Element'],
					"CD_CARD_ELEMENT_NAME" => $lang['CD_Card_Element_Name'],
					"CD_CARD_ELEMENT_IMAGE" => $lang['CD_Card_Element_Image_Name'],
					"CD_EDIT_ELEMENT" => $lang['CD_Edit_Element'],
					"CD_CARD_ELEMENT_NAMES" => $row['element_name'],
					"CD_CARD_IMAGE_LOC" => $row['element_image'])
				);
			
		}

		
		$template->pparse("body");
	}
}
else // listing elements
{
	$template->set_filenames(array(
		"body" => 'admin/config_cd_elements_list_body.tpl')
	);
	
	
	//sql command
	$sql = "SELECT * FROM " . CARD_DUELS_ELEMENTS_TABLE; 
	
	//if didn't succeed
	if ( ! ( $result = $db->sql_query($sql) ) ) 
	{ 
	   message_die(GENERAL_ERROR, 'Error retrieving elements data ', '', __LINE__, __FILE__, $sql); 
	} 
	
	//get all records
	while ( $row = $db->sql_fetchrow($result) ) 
	{ 
	   $template->assign_block_vars('elements',array( 'CD_CARD_ELEMENT_NAME' => $row['element_name'], 
													  'CD_CARD_IMAGE_NAME' => $row['element_image'],
													  'CD_CARD_EDIT' => append_sid("admin_card_duel_elements.php?action=edit&id=" . $row['id']),
													  'CD_CARD_DELETE' => append_sid("admin_card_duel_elements.php?action=delete&id=" . $row['id'])
													  ) ); 
	} 
	
	
	$template->assign_vars(array(
		"CD_DELETE" => $lang['CD_Card_Delete'],
		"CD_EDIT" => $lang['CD_Edit'],
		"CD_DELETE" => $lang['CD_Delete'],
		"CD_ADD_ELEMENT" => $lang['CD_Add_Element'],
		"CD_IMAGE" => $lang['CD_Image'],
		"CD_CARD_ELEMENT" => $lang['CD_Element'],
		"CD_CARD_MP_COST" => $lang['CD_MP_Cost'],
		"CD_CARD_ACTION" => $lang['CD_Action'])
	);

	$template->pparse("body");
}

include_once('./page_footer_admin.'.$phpEx);
?>