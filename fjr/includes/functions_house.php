<?php
/***************************************************************************
 *                            functions_house.php [English]
 *                              -------------------
 *     begin                : Sat Dec 16 2000
 *     copyright            : (C) 2001 The phpBB Group
 *     email                : support@phpbb.com
 *
 *     $Id: lang_main.php,v 1.85.2.15 2003/06/10 00:31:19 psotfx Exp $
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

if (!defined('IN_PHPBB'))
{
	die('Hacking attempt');
}

function delete_house_items( $old_owner, $inventoryarray, $inventoryamount )
{
	global $db , $lang;

	for ($a = 0; $a < $inventoryamount; $a++)
	{
		( strlen($inventoryarray[$a]) > 0 ) ? $item_remove = $inventoryarray[$a] . '.gif' : $item_remove = '' ;
		if ( strlen($inventoryarray[$a]) > 4 )
		{
			$sql = "SELECT * FROM " . ADR_SHOPS_ITEMS_TABLE . "
					WHERE item_owner_id='$old_owner'
						AND item_icon = '$item_remove'";
			$result = $db->sql_query($sql);
			if (!$result)
				message_die(GENERAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], $lang['House_adr'] ) : 'Fatal Error getting ADR Shop items!', "", __LINE__, __FILE__, $sql);
			$item_data = $db->sql_fetchrow($result);

			$item_id = $item_data['item_id'];
			$sql = "DELETE FROM " . ADR_SHOPS_ITEMS_TABLE . "
					WHERE item_owner_id = $old_owner
						AND item_id = $item_id
						AND item_in_house = 1 ";
			if( !$db->sql_query($sql) )
				message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_adr'] ) : 'Fatal Error Updating ADR Shop items!', "", __LINE__, __FILE__, $sql);
		}
	}
}

function add_house_items( $newowner, $inventoryarray, $inventoryamount )
{
	global $db , $lang ;

	if ( $inventoryamount )
	{
		// Make a new Item ID for the Item being Added
		$sql = "SELECT item_id FROM " . ADR_SHOPS_ITEMS_TABLE ."
				WHERE item_owner_id='$newowner'
				ORDER BY item_id
				DESC LIMIT 1";
		$result = $db->sql_query($sql);
		if ( !$result )
			message_die(GENERAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], $lang['House_adr'] ) : 'Fatal Error getting ADR Shop items!', "", __LINE__, __FILE__, $sql);
		$data = $db->sql_fetchrow($result);

		$new_item_id = $data['item_id'];
	}

	for ($a = 0; $a < $inventoryamount; $a++)
	{
		( strlen($inventoryarray[$a]) > 0 ) ? $item_add = $inventoryarray[$a] . '.gif' : $item_add = '' ;
		if ( strlen($inventoryarray[$a]) > 4 )
		{
			$new_item_id = $new_item_id + 1 ;

			$sql = "SELECT * FROM " . ADR_SHOPS_ITEMS_TABLE . "
					WHERE item_owner_id='1'
						AND item_icon = '$item_add'";
			$result = $db->sql_query($sql);
			if (!$result)
				message_die(GENERAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], $lang['House_adr'] ) : 'Fatal Error getting ADR Shop items!', "", __LINE__, __FILE__, $sql);
			$item_data = $db->sql_fetchrow($result);

			$item_type_use = $item_data['item_type_use'];
			$item_name = addslashes($item_data['item_name']);
			$item_desc = addslashes($item_data['item_desc']);
			$item_icon = trim($item_data['item_icon']);
			$item_price = $item_data['item_price'];
			$item_quality = $item_data['item_quality'];
			$item_store_id = $item_data['item_store_id'];
			$item_duration = $item_data['item_duration'];
			$item_duration_max = $item_data['item_duration_max'];
			$item_power = $item_data['item_power'];
			$item_add_power = $item_data['item_add_power'];
			$item_mp_use = $item_data['item_mp_use'];
			$item_element = $item_data['item_element'];
			$item_element_str_dmg = $item_data['item_element_str_dmg'];
			$item_element_same_dmg = $item_data['item_element_same_dmg'];
			$item_element_weak_dmg = $item_data['item_element_weak_dmg'];
			$item_weight = $item_data['item_weight'];
			$item_max_skill = $item_data['item_max_skill'];
			$item_sell_back_percentage = $item_data['item_sell_back_percentage'];

			$sql = "INSERT INTO " . ADR_SHOPS_ITEMS_TABLE . "
					( item_id , item_owner_id , item_type_use , item_name , item_desc , item_icon , item_price , item_quality , item_duration , item_duration_max , item_power , item_add_power , item_mp_use , item_weight , item_auth , item_element , item_element_str_dmg , item_element_same_dmg , item_element_weak_dmg , item_max_skill , item_sell_back_percentage , item_in_house )
					VALUES ( $new_item_id , $newowner , $item_type_use , '$item_name' , '$item_desc' , '" . str_replace("\'", "''", $item_icon) . "' , $item_price , $item_quality , $item_duration , $item_duration_max , $item_power , $item_add_power , $item_mp_use , $item_weight , 0 , $item_element , $item_element_str_dmg , $item_element_same_dmg , $item_element_weak_dmg , $item_max_skill , $item_sell_back_percentage , 1 )";
			if (!$db->sql_query($sql))
				message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_admin_adr_shops'] ) : 'Fatal Error Updating ADR Shops!', "", __LINE__, __FILE__, $sql);
		}
	}
}

function create_house_type_list( $var_list )
{
	global $db , $lang ;

	$sql = "SELECT * FROM " . HOUSES_TABLE . "
			ORDER BY house_type";
	if ( !($result = $db->sql_query($sql)) )
		message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_admin_houses'] ) : 'Fatal Error getting houses!', "", __LINE__, __FILE__, $sql);

	$list = '<span class="genmed"><select name="' . $var_list . '">';
	for ($x = 0; $x < mysql_num_rows($result); $x++)
	{
		$listinfo = mysql_fetch_array($result);
		$list .= '<option value="' . $listinfo['house_type'] . '">' . $listinfo['house_type'] . ' - ' . $listinfo['house_name'] . '</option>';
	}
	$list .= '</select>';

	return $list;
}

function create_user_house_list()
{
	global $db , $lang ;

	$sql = "SELECT * FROM " . USER_HOUSE_TABLE . "
			WHERE owner_id > 0";
	if ( !($iresult = $db->sql_query($sql)) )
		message_die( GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_admin_user_houses'] ) : 'Fatal Error getting User houses!', '', __LINE__, __FILE__, $sql );

	$list = '<span class="genmed"><select name="username2"><option value="">' . $lang['House_none'] . '</option>';
	for ($x = 0; $x < mysql_num_rows($iresult); $x++)
	{
		$irow = mysql_fetch_array($iresult);

		$jsql = "SELECT username FROM " . USERS_TABLE . "
				 WHERE user_id = $irow[owner_id]";
		if ( !($jresult = $db->sql_query($jsql)) )
			message_die( GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_admin_user_ownername'] ) : 'Fatal Error getting Ownername!', '', __LINE__, __FILE__, $sql );
		$listinfo = mysql_fetch_array($jresult);

		$list .= '<option value="' . $listinfo['username'] . '">' . ucfirst($listinfo['username']).'\'s ' . $lang['House_admin_house'] . '</option>';
	}
	$list .= '</select>';

	return $list;
}

function create_rpg_house_list()
{
	global $db , $lang ;

	$ksql = "SELECT * FROM " . USER_HOUSE_TABLE . "
			 WHERE rpg_id != 0";
	if ( !($kresult = $db->sql_query($ksql)) )
		message_die( GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_admin_rpg_houses'] ) : 'Fatal Error getting RPG-houses!', '', __LINE__, __FILE__, $sql );
	$list = '<span class="genmed"><select name="rpghouse"><option value="">' . $lang['House_none'] . '</option>';
	for ($x = 0; $x < mysql_num_rows($kresult); $x++)
	{
		$listinfo = mysql_fetch_array($kresult);
		$list .= '<option value="' . $listinfo['rpg_id'] . '">' . $lang['House_admin_house'] . ' - ' . $listinfo['rpg_id'] . '</option>';
	}
	$list .= '</select>';

	return $list;
}

function create_shop_select_list()
{
	global $db , $lang , $board_config;

	$list = '<select name="use_adr_shops">';
	$shops = array ( 0 => $lang['House_admin_shop_mod_shops'],$lang['House_admin_adr_shops'] );
	for( $i = 0; $i < 2; $i++ )
	{
		$selected = ( $i == $board_config['use_adr_shops_in_house'] ) ? ' selected="selected"' : '';
		$list .= '<option value = "' . $i. '" ' . $selected . '>' . $shops[$i] . '</option>';
	}
	$list .= '</select>';

	return $list;
}

function create_shop_list( $storelist, $store, $current_store )
{
	global $db , $lang;

	$current_store_name = '';
	for ( $i = 0 ; $i < count($storelist) ; $i++ )
	{
		( $current_store == $storelist[$i]['store_id'] ) ? $current_store_name = $storelist[$i]['store_name'] : '' ;
	}

	$list = '<select name="' . $store . '">';
   	$list .= '<option value = "' . $current_store . '" >' . $current_store_name . '</option>';
	for ( $i = 0 ; $i < count($storelist) ; $i ++)
	  	$list .= '<option value = "' . $storelist[$i]['store_id'] . '" >' . $storelist[$i]['store_name'] . '</option>';
		$list .= '</select>';

	return $list;
}

function create_cell_list( $var_list, $cells, $cellsamount )
{
	global $db , $lang;

	$list = '<select name="' . $var_list . '"><option value="" SELECTED>' . $lang['House_none'] . '</option>';
	for ($fc = 1; $fc < $cellsamount; $fc++)
	{
		$list .= '<option value="'.$cells[$fc].'">' . $lang['House_cell'] . ' - '.$cells[$fc].'</option>';
	}
	$list .= '</select>';

	return $list;
}

function create_item_list( $var_list, $items )
{
	global $db , $lang;

	$list = '<select name="' . $var_list . '"><option value="" SELECTED>' . $lang['House_none'] . '</option>';
	$list .= $items;
	$list .= '</select>';

	return $list;
}

function create_user_house_inventory_list( $var_list, $inventoryarray, $inventoryamount, $shop_images )
{
	global $db , $lang , $board_config;

	$list = '<select name="' . $var_list . '"><option value="" SELECTED>' . $lang['House_none'] . '</option>';
	for ($a = 0; $a < $inventoryamount; $a++)
	{
		if ($inventoryarray[$a] != '')
		{
			$c = $a + 1;
			( $board_config['use_adr_shops_in_house'] ) ? $inventory_item = $inventoryarray[$a] . '.gif' : $inventory_item = $inventoryarray[$a];
			$list .= '<option value="' . $a . '">' . ucfirst($shop_images[$inventory_item]) . ' ' . $lang['House_in_cell'] . ' - ' . $c . '</option>';
		}
	}
	$list .= '</select>';

	return $list;
}

function create_house_multiple_list( $var_list, $items, $amount, $current )
{
	global $db , $lang;

	$list = '<select name="' . $var_list . '" size="15" multiple>';
	$list .= ( $items == '') ? '<option value="" SELECTED>' . $lang['House_none'] . '</option>' : '<option value="">' . $lang['House_none'] . '</option>';
	for ($fc = 1; $fc <= $amount; $fc++)
	{
		$list .= ( in_array( $fc, $current ) ) ? '<option value="' . $fc . '" SELECTED>' . $lang['House_cell'] . ' - '. $fc . '</option>' : '<option value="' . $fc . '">' . $lang['House_cell'] . ' - ' . $fc . '</option>';
	}
	$list .= '</select>';

	return $list;
}

?>
