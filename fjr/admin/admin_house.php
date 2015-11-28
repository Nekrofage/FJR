<?php
/***************************************************************************
 *                                admin_house.php
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

define('IN_PHPBB', true);
//define('IN_ADR_ADMIN', true);
//define('IN_ADR_ZONES_ADMIN', true);
//define('IN_ADR_CHARACTER', true);
define('IN_ADR_SHOPS', true);
//define('IN_ADR_ZONE_MAPS', true);
define('IN_HOUSE_ADMIN', true);

if(	!empty($setmodules) )
{
	$file = basename(__FILE__);
	$module['House MOD']['Manage House Stats'] = $file;
	return;
}

//
// Let's set the root dir for phpBB
//
$phpbb_root_path = '../';
require( $phpbb_root_path . 'extension.inc' );
require( 'pagestart.' . $phpEx );
include_once( $phpbb_root_path . 'language/lang_' . $board_config['default_lang'] . '/lang_house.'. $phpEx );
include_once( $phpbb_root_path . 'includes/functions_house.' . $phpEx );
( file_exists ( $phpbb_root_path . 'adr_character.php' ) ) ? $adr_installed = true : $adr_installed = false ;
( $adr_installed ) ? include_once($phpbb_root_path . 'adr/includes/adr_global.'.$phpEx) : '';
( file_exists ( $phpbb_root_path . 'shop.php' ) ) ? $shop_mod_installed = true : $shop_mod_installed = false ;
if ( !$adr_installed && !$shop_mod_installed )
{
	message_die( GENERAL_MESSAGE, ( $lang['House_admin_shop_notice'] != '' ) ? $lang['House_admin_shop_notice'] : 'You MUST have either the Shop MOD installed or ADR Installed to use this!' );
}

//
//check for userlevel
//
if( !$userdata['session_logged_in'] )
	header('Location: ' . append_sid("login.$phpEx?redirect=tableupdate.$phpEx", true));

if( $userdata['user_level'] != ADMIN )
	message_die( GENERAL_MESSAGE, ( $lang['House_admin_not_authorized'] != '' ) ? $lang['House_admin_not_authorized'] : 'You MUST be an ADMIN to view this page - You are NOT authorized' );
//end check
if ( $adr_installed )
{
	$sql = "SELECT * FROM  " . ADR_GENERAL_TABLE ;
	if (!$result = $db->sql_query($sql))
		message_die( GENERAL_MESSAGE, ( $lang['Adr_character_lack'] != '' ) ? $lang['Adr_character_lack'] : 'This user has not created a character yet' );
	while( $row = $db->sql_fetchrow($result) )
		$adr_general[$row['config_name']] = $row['config_value'];
}
// find what mode is being run
if( isset($HTTP_POST_VARS['mode']) || isset($HTTP_GET_VARS['mode']) )
{
	$mode = ( isset($HTTP_POST_VARS['mode']) ) ? $HTTP_POST_VARS['mode'] : $HTTP_GET_VARS['mode'];
	$mode = htmlspecialchars($mode);
}
else // else there is no mode
{
	$mode = $lang['House_admin_main'];
}
// end mode

// find what action is being run
if( isset($HTTP_POST_VARS['action']) || isset($HTTP_GET_VARS['action']) )
{
	$action = ( isset($HTTP_POST_VARS['action']) ) ? $HTTP_POST_VARS['action'] : $HTTP_GET_VARS['action'];
	$action = htmlspecialchars($action);
}
else // else there is no mode
{
	$action = $lang['House_admin_main'];
}
// end action

$template->set_filenames(array(
	'body' => 'admin/house_config_body.tpl'));

$floorcells = $HTTP_POST_VARS['floorcells'];
$floorcellitem = $HTTP_POST_VARS['floorcellitem'];
$wallcells = $HTTP_POST_VARS['wallcells'];
$wallcellitem = $HTTP_POST_VARS['wallcellitem'];
$gardencells = $HTTP_POST_VARS['gardencells'];
$gardencellitem = $HTTP_POST_VARS['gardencellitem'];
$fwcells = $HTTP_POST_VARS['fwcells'];
$fwcellitem = $HTTP_POST_VARS['fwcellitem'];
$housefront = $HTTP_POST_VARS['housefront'];
$housebg = $HTTP_POST_VARS['housebg'];

if ( $board_config['use_adr_shops_in_house'] && $adr_installed )
{
	$image_dir = '/adr/images/items/';

	$sql = "SELECT item_id, item_name, item_icon from " . ADR_SHOPS_ITEMS_TABLE . "
			WHERE item_type_use= 72
				OR item_type_use= 73
				OR item_type_use= 74
				OR item_type_use= 75
			ORDER BY item_name";
	if ( !($jresult = $db->sql_query($sql)) )
		message_die( GENERAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], $lang['House_adr'] ) : 'Fatal Error getting ADR Shopitems!', '', __LINE__, __FILE__, $sql);
	for ($x = 0; $x < mysql_num_rows($jresult); $x++)
	{
		$jrow = mysql_fetch_array($jresult);
		$shop_images[$jrow['item_icon']] = $jrow['item_name'];
	}
}
else
{
	$image_dir = '/shop/images/';

	$sql = "SELECT id, sdesc, name FROM " . SHOPITEMS_TABLE . "
			WHERE furniture_type = '1'
				OR furniture_type = '2'
				OR furniture_type = '3'
				OR furniture_type = '4'
			ORDER BY sdesc";
	if ( !($jresult = $db->sql_query($sql)) )
		message_die( GENERAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], $lang['House_shop_mod'] ) : 'Fatal Error getting Shop MOD Shop items!', '', __LINE__, __FILE__, $sql);
	for ($x = 0; $x < mysql_num_rows($jresult); $x++)
	{
		$jrow = mysql_fetch_array($jresult);
		$shop_images[$jrow['name']] = $jrow['sdesc'];
	}
}

//--------------------------------Main Page START-----------------------------------------
if ( $mode == $lang['House_admin_main'] )
{
	$template->assign_block_vars( 'main' , array());

	( $adr_installed && !$shop_mod_installed && !$board_config['use_adr_shops_in_house'] ) ? $shop_type_error1 = $lang['House_admin_shop_type_error_1'] : $shop_type_error1 = 0;
	( !$adr_installed && $shop_mod_installed && $board_config['use_adr_shops_in_house'] ) ? $shop_type_error2 = $lang['House_admin_shop_type_error_2'] : $shop_type_error2 = 0;
	if ( $shop_type_error1 )
		$shop_type_error = $shop_type_error1;
	else if ( $shop_type_error2 )
		$shop_type_error = $shop_type_error2;
	else
		$shop_type_error = false;

	$sql = "SELECT * FROM " . USER_HOUSE_TABLE . "
			WHERE owner_id > 0";
	if ( !($iresult = $db->sql_query($sql)) )
		message_die( GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_user_houses'] ) : 'Fatal Error getting User houses!', '', __LINE__, __FILE__, $sql );

	$user_house_list = create_user_house_list();

    $rpg_house_list = create_rpg_house_list();
    
	if ( $adr_installed )
	{
		if ( !$shop_type_error )
		{
            $shop_list = create_shop_select_list();
		}
		else
		{
			$shop_list = '<select name="use_adr_shops">';
			$shops = array ( 0 => $lang['House_admin_adr_shops'] );
			for( $i = 0; $i < 1; $i++ )
			{
				$selected = ( $i == 1 ) ? ' selected="selected"' : '';
				$shop_list .= '<option value = "' . $i . '" ' . $selected . '>' . $shops[$i] . '</option>';
			}
			$shop_list .= '</select>';
		}

		$sql = "SELECT store_name, store_id
				FROM " . ADR_STORES_TABLE . "
				ORDER BY `store_name`";
		$result = $db->sql_query($sql);
		if( !$result )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_admin_adr_store_info'] ) : 'Fatal Error getting ADR Store information!', "", __LINE__, __FILE__, $sql);

	    $storelist = $db->sql_fetchrowset($result);

		$furniture_shop_list = create_shop_list( $storelist, 'furniture_store' , $adr_general['furniture_shop_id'] );

		$garden_shop_list = create_shop_list( $storelist, 'garden_store' , $adr_general['garden_shop_id'] );
	}
	else
	{
		if ( !$shop_type_error )
		{
			$shop_list = '<select name="use_adr_shops">';
			$shops = array (1 => 'Shop MOD Shops');
			for( $i = 1; $i < 2; $i++ )
			{
				$selected = ( $i == 1 ) ? ' selected="selected"' : '';
				$shop_list .= '<option value = "' . $i . '" ' . $selected . '>' . $shops[$i] . '</option>';
			}
			$shop_list .= '</select>';
		}
	}
	if ( ( $adr_installed && $shop_mod_installed ) || ( $shop_type_error ) )
	{
		$template->assign_block_vars('main.shop_choice' , array());
	}
	if ( $adr_installed && !$shop_mod_installed && !$shop_type_error )
	{
		$template->assign_block_vars('main.adr_only' , array());
	}
	if ( $shop_type_error )
	{
		$template->assign_block_vars('main.shop_type_error' , array());
	}
	if ( $adr_installed && $board_config['use_adr_shops_in_house'] )
	{
		$template->assign_block_vars('main.adr' , array());
	}

	$template->assign_vars(array(
		'L_HOUSE_ADMIN_TITLE' => $lang['House_admin_title'],
		'L_HOUSE_ADMIN_TITLE_EXPLAIN' => $lang['House_admin_title_explain'],
        'L_HOUSE_ADMIN_PAGE_TITLE' => $lang['House_admin_title'],
		'L_HOUSE_SETTINGS' => $lang['House_admin_settings'],
		'L_HOUSE_SETTINGS_EXPLAIN' => $lang['House_admin_settings_explain'],
		'L_HOUSE_TYPES' => $lang['House_admin_types'],
		'L_HOUSE_TYPES_EXPLAIN' => $lang['House_admin_types_explain'],
		'L_HOUSE_FURNITURE_CELLS' => $lang['House_admin_furniture_cells'],
		'L_HOUSE_FURNITURE_CELLS_EXPLAIN' => $lang['House_admin_furniture_cells_explain'],
		'L_HOUSE_SHOP_1' => $lang['House_admin_shop_1'],
		'L_HOUSE_SHOP_2' => $lang['House_admin_shop_2'],
		'L_HOUSE_SHOP_EXPLAIN' => $lang['House_admin_shop_explain'],
		'L_HOUSE_EDIT_HOUSE' => $lang['House_admin_edit_house'],
		'L_HOUSE_EDIT_HOUSE_EXPLAIN' => $lang['House_admin_edit_house_explain'],
		'L_HOUSE_EDIT_USER_HOUSE' => $lang['House_admin_edit_user_house'],
		'L_HOUSE_EDIT_USER_HOUSE_EXPLAIN' => $lang['House_admin_edit_user_house_explain'],
		'L_HOUSE_CREATE_RPG_HOUSE' => $lang['House_admin_create_rpg_house'],
		'L_HOUSE_CREATE_RPG_HOUSE_EXPLAIN' => $lang['House_admin_create_rpg_house_explain'],
		'L_HOUSE_EDIT_RPG_HOUSE' => $lang['House_admin_edit_rpg_house'],
		'L_HOUSE_EDIT_RPG_HOUSE_EXPLAIN' => $lang['House_admin_edit_rpg_house_explain'],
		'L_HOUSE_EDIT_RPG_HOUSE_BUTTON' => $lang['House_admin_edit_rpg_house_button'],
		'L_HOUSE_SHOP_SELECT' => $lang['House_admin_shop_select'],
		'L_HOUSE_SHOP_SELECT_EXPLAIN' => $lang['House_admin_shop_select_explain'],
		'L_HOUSE_SHOP_SELECT_BUTTON' => $lang['House_admin_shop_select_button'],
		'L_HOUSE_ADR_NOTICE' => $lang['House_admin_adr_notice'],
		'L_HOUSE_ADR_NOTICE_EXPLAIN' => $lang['House_admin_adr_notice_explain'],
		'L_HOUSE_ADR_NOTICE_USE' => $lang['House_admin_adr_notice_use'],
		'L_HOUSE_SHOP_TYPE_ERROR' => $lang['House_admin_shop_type_error'],
		'L_HOUSE_SHOP_TYPE_ERROR_MSG' => $shop_type_error,
		'L_HOUSE_FURNITURE_SHOP' => $lang['House_admin_furniture_shop'],
		'L_HOUSE_FURNITURE_SHOP_EXPLAIN' => $lang['House_admin_furniture_shop_explain'],
		'L_HOUSE_FURNITURE_SHOP_BUTTON' => $lang['House_admin_furniture_shop_button'],
		'L_HOUSE_GARDEN_SHOP' => $lang['House_admin_garden_shop'],
		'L_HOUSE_GARDEN_SHOP_BUTTON' => $lang['House_admin_garden_shop_button'],
		'L_HOUSE_ADMIN_MAIN' => $lang['House_admin_main'],
		'L_HOUSE_ADMIN_SHOP_1' => $lang['House_admin_shop_1_name'],
		'L_HOUSE_ADMIN_SHOP_2' => $lang['House_admin_shop_2_name'],
		
		'S_CONFIG_ACTION' => append_sid('admin_house.' . $phpEx),
        'USER_HOUSE_LIST' => $user_house_list,
		'RPG_HOUSE_LIST' => $rpg_house_list,
		'SHOP_SELECT_LIST' => $shop_list,
		'FURNITURE_SHOP_LIST' => $furniture_shop_list,
		'GARDEN_SHOP_LIST' => $garden_shop_list,
	));
}
//--------------------------------Main Page END-----------------------------------------

//--------------------------------Update ADR Config and Config Settings START-----------
if ( $mode == 'Select Shop' )
{
	if ( $shop_mod_installed && $adr_installed )
		$shop_type = $HTTP_POST_VARS['use_adr_shops'];
	else if ( $shop_mod_installed && !$adr_installed )
		$shop_type = 0;
	else
		$shop_type = 1;

	$furniture_store = $HTTP_POST_VARS['furniture_store'];
	
	$sql = "UPDATE " . CONFIG_TABLE . "
			SET config_value = '$shop_type'
			WHERE config_name = 'use_adr_shops_in_house' ";
	if ( !($result = $db->sql_query($sql)) )
		message_die(GENERAL_ERROR, ( $lang['House_error_3'] != '' ) ? sprintf( $lang['House_error_3'], $lang['House_admin_shop_type'] ) : 'Could not UPDATE Shop Type Selection information!', "", __LINE__, __FILE__, $sql);

	$message = sprintf( $lang['House_admin_update_message'], $lang['House_admin_shop_type']) . sprintf( $lang['House_admin_return_message'], '<a href="'.append_sid("admin_house.".$phpEx).'">', '<a href="'.append_sid("index.".$phpEx."?pane=right").'">');
	message_die(GENERAL_MESSAGE, $message);
}

if ( $mode == 'Select Furniture Store' )
{
	$furniture_store = $HTTP_POST_VARS['furniture_store'];

	$sql = "UPDATE " . ADR_GENERAL_TABLE . "
			SET config_value = '$furniture_store'
			WHERE config_name = 'furniture_shop_id' ";
	if ( !($result = $db->sql_query($sql)) )
		message_die(GENERAL_ERROR, ( $lang['House_error_3'] != '' ) ? sprintf( $lang['House_error_3'], $lang['House_admin_furniture_store'] ) : 'Could not UPDATE Furniture Store Selection information!', "", __LINE__, __FILE__, $sql);

	$message = sprintf( $lang['House_admin_update_message'], $lang['House_admin_furniture_store']) . sprintf( $lang['House_admin_return_message'], '<a href="'.append_sid("admin_house.".$phpEx).'">', '<a href="'.append_sid("index.".$phpEx."?pane=right").'">');
	message_die(GENERAL_MESSAGE, $message);
}

if ( $mode == 'Select Garden Store' )
{
	$garden_store = $HTTP_POST_VARS['garden_store'];
	
	$sql = "UPDATE " . ADR_GENERAL_TABLE . "
			SET config_value = '$garden_store'
			WHERE config_name = 'garden_shop_id' ";
	if ( !($result = $db->sql_query($sql)) )
		message_die(GENERAL_ERROR, ( $lang['House_error_3'] != '' ) ? sprintf( $lang['House_error_3'], $lang['House_admin_garden_store'] ) : 'Could not UPDATE Garden Store Selection information!', "", __LINE__, __FILE__, $sql);

	$message = sprintf( $lang['House_admin_update_message'], $lang['House_admin_garden_store']) . sprintf( $lang['House_admin_return_message'], '<a href="'.append_sid("admin_house.".$phpEx).'">', '<a href="'.append_sid("index.".$phpEx."?pane=right").'">');
	message_die(GENERAL_MESSAGE, $message);
}
//--------------------------------Update ADR Config Settings Page END-----------------

//--------------------------------Edit RPG House START-----------------------------------------
if ($mode == 'Edit RPG House')
{
	$rpghouse = $HTTP_POST_VARS['rpghouse'];
	$remove = $HTTP_POST_VARS['remove'];
	$rpgdes = $HTTP_POST_VARS['rpgdes'];
	$owner = $HTTP_POST_VARS['owner'];
	$prize = $HTTP_POST_VARS['prize'];

	if ($action == $lang['House_admin_main'])
	{
		$template->assign_block_vars( 'edit_house' , array());
		$template->assign_block_vars( 'edit_house.rpg_house' , array());

		if ($rpghouse == '')
		{
			$message = $lang['House_admin_select_house_edit'] . sprintf( $lang['House_admin_return_message'], '<a href="'.append_sid("admin_house.".$phpEx).'">', '<a href="'.append_sid("index.".$phpEx."?pane=right").'">');
			message_die(GENERAL_MESSAGE, $message);
		}

		$sql = "SELECT * FROM " . USER_HOUSE_TABLE . "
				WHERE rpg_id='$rpghouse'";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_admin_rpg_house'] ) : 'Fatal Error Getting RPG-House!', "", __LINE__, __FILE__, $sql);
		$uhrow = mysql_fetch_array($result);

		$sql = "SELECT username FROM " . USERS_TABLE . "
				WHERE user_id=$uhrow[owner_id]";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_profile_data'] ) : 'Fatal Error Getting Profile data!', "", __LINE__, __FILE__, $sql);
		$prow = mysql_fetch_array($result);

		($prow['username'] == '') ? $owner = '' : $owner = $prow['username'];

		$sql = "SELECT * FROM " . HOUSES_TABLE . "
				WHERE house_type=$uhrow[house_type]";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_profile_data'] ) : 'Fatal Error Getting House data!', "", __LINE__, __FILE__, $sql);
		$hrow = mysql_fetch_array($result);

		$sql = "SELECT * FROM " . HOUSE_SETTINGS_TABLE . "
				WHERE var=1";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_house_configs'] ) : 'Fatal Error Getting House Configs!', "", __LINE__, __FILE__, $sql);
		$crow = mysql_fetch_array($result);

		$house = $hrow['house_bg'];
		$housefront = $hrow['house_front'];
		$hwidth = $hrow['house_width'];
		$hcellsh = $hrow['house_cellwidth'] - 2;
		$hcellshn = $hrow['house_cellwidthnumber'];
		$hheight = $hrow['house_height'];
		$hcellsv = $hrow['house_cellheight'] - 2;
		$hcellsvn = $hrow['house_cellheightnumber'];
		$floorcells = explode(",",$hrow['house_floor']);
		$floorcellsamount = count ($floorcells);
		$fwcells = explode(",",$hrow['house_fw']);
		$fwcellsamount = count ($fwcells);
		$gardencells = explode(",",$hrow['house_garden']);
		$gardencellsamount = count ($gardencells);
		$wallcells = explode(",",$hrow['house_wall']);
		$wallcellsamount = count ($wallcells);
		$cellamount = $hcellshn * $hcellsvn;
		$inventoryarray = explode(',',$uhrow['house_inventory']);
		$inventoryamount = count ($inventoryarray);

		$itempurge = str_replace("Þ", "", $prow['user_items']);
		$itemarray = explode('ß',$itempurge);
		$itemcount = count($itemarray);

		$flooritems = '';
		$wallitems = '';
		$fwitems = '';
		$gardenitems = '';
		$shopitems = '';

		$user_house_inv = create_user_house_inventory_list( 'remove', $inventoryarray, $inventoryamount, $shop_images );

		if ( $board_config['use_adr_shops_in_house'] )
		{
			$sql = "SELECT * FROM " . ADR_SHOPS_ITEMS_TABLE . "
					WHERE item_store_id='$adr_general[furniture_shop_id]'
                	ORDER BY item_name";
			if ( !($iresult = $db->sql_query($sql)) )
				message_die(GENERAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], $lang['House_adr'] . ' ' . $lang['House_admin_furniture_store'] ) : 'Fatal Error getting ADR Furniture Store Shop items!', "", __LINE__, __FILE__, $sql);
	        $shop_images = array();
			for ($x = 0; $x < mysql_num_rows($iresult); $x++)
			{
				$irow = mysql_fetch_array($iresult);
				$shopitems .= $irow['item_name'];
				$shop_images[$irow['item_name']] = $irow['item_icon'];
				if ( $irow['item_type_use'] == 72 )
					$flooritems .= "<option value=\"".str_replace('.gif','',$irow['item_icon'])."\">".ucfirst($irow['item_name'])."</option>";
				if ( $irow['item_type_use'] == 73 )
					$wallitems .= "<option value=\"".str_replace('.gif','',$irow['item_icon'])."\">".ucfirst($irow['item_name'])."</option>";
				if ( $irow['item_type_use'] == 74 )
					$fwitems .= "<option value=\"".str_replace('.gif','',$irow['item_icon'])."\">".ucfirst($irow['item_name'])."</option>";
				if ( $irow['item_type_use'] == 75 )
					$gardenitems .= "<option value=\"".str_replace('.gif','',$irow['item_icon'])."\">".ucfirst($irow['item_name'])."</option>";
			}

			$sql = "SELECT * FROM " . ADR_SHOPS_ITEMS_TABLE . "
					WHERE item_store_id='$adr_general[garden_shop_id]'
        	        ORDER BY item_name";
			if ( !($jresult = $db->sql_query($sql)) )
				message_die(GENERAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], $lang['House_adr'] . ' ' . $lang['House_admin_garden_store'] ) : 'Fatal Error getting ADR Garden Store Shop items!', "", __LINE__, __FILE__, $sql);

			for ($x = 0; $x < mysql_num_rows($jresult); $x++)
			{
				$jrow = mysql_fetch_array($jresult);
				$shop_images[$jrow['item_name']] = $jrow['item_icon'];
				if ( $jrow['item_type_use'] == 72 )
					$flooritems .= "<option value=\"".str_replace('.gif','',$jrow['item_icon'])."\">".ucfirst($jrow['item_name'])."</option>";
				if ( $jrow['item_type_use'] == 73 )
					$wallitems .= "<option value=\"".str_replace('.gif','',$jrow['item_icon'])."\">".ucfirst($jrow['item_name'])."</option>";
				if ( $jrow['item_type_use'] == 74 )
					$fwitems .= "<option value=\"".str_replace('.gif','',$jrow['item_icon'])."\">".ucfirst($jrow['item_name'])."</option>";
				if ( $jrow['item_type_use'] == 75 )
					$gardenitems .= "<option value=\"".str_replace('.gif','',$jrow['item_icon'])."\">".ucfirst($jrow['item_name'])."</option>";
			}
		}
		else
		{
			$sql = "SELECT * FROM " . SHOPITEMS_TABLE . "
					WHERE shop='$crow[shop_1]'
					ORDER BY name";
			if ( !($iresult = $db->sql_query($sql)) )
				message_die(GENERAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], $lang['House_shop_mod'] . ' ' . $lang['House_admin_furniture_store'] ) : 'Fatal Error getting Shop MOD Furniture Store Shop items!', "", __LINE__, __FILE__, $sql);
			for ($x = 0; $x < mysql_num_rows($iresult); $x++)
			{
				$irow = mysql_fetch_array($iresult);
				$shopitems .= $irow['name'];
				if ( $irow['furniture_type'] == 1 )
					$flooritems .= "<option value=\"".$irow['name']."\">".ucfirst($irow['sdesc'])."</option>";
				if ( $irow['furniture_type'] == 2 )
					$wallitems .= "<option value=\"".$irow['name']."\">".ucfirst($irow['sdesc'])."</option>";
				if ( $irow['furniture_type'] == 3 )
					$fwitems .= "<option value=\"".$irow['name']."\">".ucfirst($irow['sdesc'])."</option>";
				if ( $irow['furniture_type'] == 4 )
					$gardenitems .= "<option value=\"".$irow['name']."\">".ucfirst($irow['sdesc'])."</option>";
			}

			$sql = "SELECT * FROM " . SHOPITEMS_TABLE . "
					WHERE shop='$crow[shop_2]'
					ORDER BY name";
			if ( !($jresult = $db->sql_query($sql)) )
				message_die(GENERAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], $lang['House_shop_mod'] . ' ' . $lang['House_admin_garden_store'] ) : 'Fatal Error getting Shop MOD Garden Store Shop items!', "", __LINE__, __FILE__, $sql);
			for ($x = 0; $x < mysql_num_rows($jresult); $x++)
			{
				$jrow = mysql_fetch_array($jresult);
				if ( $jrow['furniture_type'] == 1 )
					$flooritems .= "<option value=\"".$jrow['name']."\">".ucfirst($jrow['sdesc'])."</option>";
				if ( $jrow['furniture_type'] == 2 )
					$wallitems .= "<option value=\"".$jrow['name']."\">".ucfirst($jrow['sdesc'])."</option>";
				if ( $jrow['furniture_type'] == 3 )
					$fwitems .= "<option value=\"".$jrow['name']."\">".ucfirst($jrow['sdesc'])."</option>";
				if ( $jrow['furniture_type'] == 4 )
					$gardenitems .= "<option value=\"".$jrow['name']."\">".ucfirst($jrow['sdesc'])."</option>";
			}
		}
		$floor_item_list = create_item_list( 'floorcellitem', $flooritems );
		$wall_item_list = create_item_list( 'wallcellitem', $wallitems );
		$garden_item_list = create_item_list( 'gardencellitem', $gardenitems );
		$fw_item_list = create_item_list( 'fwcellitem', $fwitems );

		// some pixies fly by and get our furniture organised

		$ia = 0;
		for ($iv = 1; $iv <= $hcellsvn; $iv++)
		{
			for ($ih = 1; $ih <= $hcellshn; $ih++)
			{
				if ($inventoryarray[$ia] == '')
					$houseinventory[$iv][$ih] = 'empty';
				else
					( $board_config['use_adr_shops_in_house'] ) ? $houseinventory[$iv][$ih] = str_replace('.gif','',$inventoryarray[$ia]) : $houseinventory[$iv][$ih] = $inventoryarray[$ia];
				$ia++;
			}
		}

		// lets get some gnomes to build the house

		$cn = 1;
		for ($sv = 1; $sv <= $hcellsvn; $sv++)
		{
			$cellinfo .= '<tr>';
			for ($sh = 1; $sh <= $hcellshn; $sh++)
			{
				$cellinfo .= '
		<td width="'.$hcellsh.'px" height="'.$hcellsv.'px"><img src="..' . $image_dir . $houseinventory[$sv][$sh].'.gif" width="'.$hcellsh.'px" height="'.$hcellsv.'px" border="0" alt="Cell - '.$cn.'" title="Cell - '.$cn.'"></td>';
				$cn++;
			}
			$cellinfo .= '</tr>';
		}

        $floor_cell_list = create_cell_list( 'floorcell', $floorcells, $floorcellsamount );
		$wall_cell_list = create_cell_list( 'wallcell', $wallcells, $wallcellsamount );
		$garden_cell_list = create_cell_list( 'gardencell', $gardencells, $gardencellsamount );
		$floor_wall_cell_list = create_cell_list( 'fwcell', $fwcells, $fwcellsamount );

		$template->assign_vars(array(
			'L_HOUSE_ADMIN_TITLE' => $lang['House_admin_edit_rpg_houses'],
			'L_HOUSE_ADMIN_TITLE_EXPLAIN' => $lang['House_admin_edit_rpg_houses_explain'],
        	'L_HOUSE_ADMIN_PAGE_TITLE' => $lang['House_admin_edit_rpg_houses'],
            'L_HOUSE_ADMIN_EDIT_HOUSE_BUTTON' => $lang['House_admin_edit_rpg_house_button'],
            'L_HOUSE_ADMIN_EDITING_RPG_HOUSE' => $lang['House_admin_editing_rpg_house'],
			'L_HOUSE_ADMIN_DESCRIPTION' => $lang['House_admin_description'],
            'L_HOUSE_ADMIN_OWNER' => $lang['House_admin_owner'],
            'L_HOUSE_ADMIN_NO_OWNER_INFO' => $lang['House_admin_no_owner_info'],
            'L_HOUSE_ADMIN_COSTS' => $lang['House_costs'],
			'L_HOUSE_ADMIN_UPDATE_DESCRIPTION' => $lang['House_admin_update_description'],
			'L_HOUSE_ADMIN_UPDATE_OWNER' => $lang['House_admin_update_owner'],
			'L_HOUSE_ADMIN_UPDATE_PRICE' => $lang['House_admin_update_price'],
			'L_HOUSE_ADMIN_REMOVE_ITEM' => $lang['House_admin_remove_item'],
			'L_HOUSE_ADMIN_ITEM' => $lang['House_item'],
			'L_HOUSE_ADMIN_REMOVE' => $lang['House_remove'],
			'L_HOUSE_ADMIN_FURNITURE_FLOOR' => $lang['House_admin_furniture_floor'],
			'L_HOUSE_ADMIN_PLACE' => $lang['House_place'],
			'L_HOUSE_ADMIN_PLACE_ITEM' => $lang['House_place_item'],
			'L_HOUSE_ADMIN_FURNITURE_WALL' => $lang['House_admin_furniture_wall'],
            'L_HOUSE_ADMIN_FURNITURE_GARDEN' => $lang['House_admin_furniture_garden'],
            'L_HOUSE_ADMIN_FURNITURE_FLOOR_WALL' => $lang['House_admin_furniture_floor_wall'],
            'L_HOUSE_ADMIN_DELETION_WARNING' => $lang['House_admin_deletion_warning'],
            'L_HOUSE_ADMIN_DELETE_HOUSE' => $lang['House_admin_delete_house'],
            'L_HOUSE_ADMIN_RETURN_MAIN_HOUSE' => $lang['House_admin_return_main_house'],
			'L_HOUSE_ADMIN_MAIN' => $lang['House_admin_main'],

			'S_CONFIG_ACTION' => append_sid('admin_house.' . $phpEx),
            'RPG_HOUSE' => $rpghouse,
            'RPG_HOUSE_DESCRIPTION' => $uhrow['rpg_description'],
            'RPG_HOUSE_OWNER' => $owner,
			'RPG_HOUSE_PRICE' => $uhrow['rpg_prize'],
            'HOUSE_BACKGROUND' => '../images/house/' . $house,
            'HOUSE_WIDTH' => $hwidth,
            'HOUSE_HEIGHT' => $hheight,
			'CELL_INFO' => $cellinfo,
			'HOUSE_FRONT' => $housefront,
            'USER_HOUSE_INVENTORY' => $user_house_inv,
            'FLOOR_CELL_LIST' => $floor_cell_list,
            'FLOOR_ITEM_LIST' => $floor_item_list,
            'WALL_CELL_LIST' => $wall_cell_list,
            'WALL_ITEM_LIST' => $wall_item_list,
            'GARDEN_CELL_LIST' => $garden_cell_list,
            'GARDEN_ITEM_LIST' => $garden_item_list,
            'FLOOR_WALL_CELL_LIST' => $floor_wall_cell_list,
            'FLOOR_WALL_ITEM_LIST' => $fw_item_list,
		));
	}

	if ( $action == $lang['House_admin_delete_house'] )
	{
		//update user houses
  		$u3sql="DELETE FROM " . USER_HOUSE_TABLE . "
				WHERE rpg_id=$rpghouse";
  		if ( !($u3result = $db->sql_query($u3sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_user_houses'] ) : 'Fatal Error Updating User houses!', "", __LINE__, __FILE__, $sql);

		$message = $lang['House_admin_delete_house_message'] . sprintf( $lang['House_admin_return_message'], '<a href="'.append_sid("admin_house.".$phpEx).'">', '<a href="'.append_sid("index.".$phpEx."?pane=right").'">');
		message_die(GENERAL_MESSAGE, $message);
	}

	if ( $action == $lang['House_remove'] )
	{
		$template->assign_block_vars( 'update_notification' , array());
		
		if ($remove =='')
			message_die(GENERAL_MESSAGE, $lang['House_admin_remove_first'] . sprintf( $lang['House_admin_return_message'], '<a href="'.append_sid("admin_house.".$phpEx).'">', '<a href="'.append_sid("index.".$phpEx."?pane=right").'">'));

		$sql = "SELECT * FROM " . USER_HOUSE_TABLE . "
				WHERE rpg_id='$rpghouse'";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_user_houses'] ) : 'Fatal Error Getting User houses!', "", __LINE__, __FILE__, $sql);
		$uhrow = mysql_fetch_array($result);

		$sql = "SELECT house_name FROM " . HOUSES_TABLE . "
				WHERE house_type=$uhrow[house_type]";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_house_data'] ) : 'Fatal Error Getting House data!', "", __LINE__, __FILE__, $sql);
		$hrow = mysql_fetch_array($result);

		$inventoryarray = explode(',',$uhrow['house_inventory']);
		$inventoryamount = count ($inventoryarray);

		for ($a = 0; $a < $inventoryamount; $a++)
			if ($a == $remove)
				$inventoryarray[$a] = '';

		$inventory = '';
		for ($a = 0; $a < $inventoryamount; $a++)
			$inventory .= $inventoryarray[$a].',';

		$sql = "UPDATE " . USER_HOUSE_TABLE . "
				SET house_inventory='$inventory'
				WHERE rpg_id='$rpghouse'";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_user_houses'] ) : 'Fatal Error Updating User houses!', "", __LINE__, __FILE__, $sql);

		$template->assign_vars(array(
			'L_HOUSE_ADMIN_TITLE' => $lang['House_admin_edit_rpg_houses'],
			'L_HOUSE_ADMIN_TITLE_EXPLAIN' => $lang['House_admin_edit_rpg_houses_explain'],
        	'L_HOUSE_ADMIN_PAGE_TITLE' => $lang['House_admin_edit_rpg_houses'],
            'L_HOUSE_ADMIN_UPDATED' => $lang['House_item_removed'],
            'L_HOUSE_ADMIN_RETURN_MAIN_HOUSE' => $lang['House_admin_return_main_house'],
			'L_HOUSE_ADMIN_RETURN_EDIT_HOUSE' => $lang['House_admin_return_edit_house'],
			'L_HOUSE_ADMIN_EDIT_HOUSE_BUTTON' => $lang['House_admin_edit_rpg_house_button'],
			'L_HOUSE_ADMIN_MAIN' => $lang['House_admin_main'],
			'S_CONFIG_ACTION' => append_sid('admin_house.' . $phpEx),
			'NAME' => $rpghouse,
			'NAME_VAR' => 'rpghouse',
		));
	}

	if ( $action == $lang['House_admin_update_description'] )
	{
		$template->assign_block_vars( 'update_notification' , array());

		$sql = "UPDATE " . USER_HOUSE_TABLE . "
				SET rpg_description='$rpgdes'
				WHERE rpg_id='$rpghouse'";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_user_houses'] ) : 'Fatal Error Updating User houses!', "", __LINE__, __FILE__, $sql);

		$template->assign_vars(array(
			'L_HOUSE_ADMIN_TITLE' => $lang['House_admin_edit_rpg_houses'],
			'L_HOUSE_ADMIN_TITLE_EXPLAIN' => $lang['House_admin_edit_rpg_houses_explain'],
        	'L_HOUSE_ADMIN_PAGE_TITLE' => $lang['House_admin_edit_rpg_houses'],
            'L_HOUSE_ADMIN_UPDATED' => $lang['House_admin_description_updated'],
            'L_HOUSE_ADMIN_RETURN_MAIN_HOUSE' => $lang['House_admin_return_main_house'],
			'L_HOUSE_ADMIN_RETURN_EDIT_HOUSE' => $lang['House_admin_return_edit_house'],
			'L_HOUSE_ADMIN_EDIT_RPG_HOUSE_BUTTON' => $lang['House_admin_edit_rpg_house_button'],
			'S_CONFIG_ACTION' => append_sid('admin_house.' . $phpEx),
			'RPG_HOUSE' => $rpghouse,
		));
	}

	if ( $action == $lang['House_admin_update_price'] )
	{
		$template->assign_block_vars( 'update_notification' , array());

		if ($prize == '')
			$prize = 0;
		if (!is_numeric($prize))
		{
			$message = $lang['House_admin_enter_price'] . sprintf( $lang['House_admin_return_message'], '<a href="'.append_sid("admin_house.".$phpEx).'">', '<a href="'.append_sid("index.".$phpEx."?pane=right").'">');
			message_die(GENERAL_MESSAGE, $message);
		}

		$sql = "UPDATE " . USER_HOUSE_TABLE . "
		SET rpg_prize='$prize'
		WHERE rpg_id='$rpghouse'";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_user_houses'] ) : 'Fatal Error Updating User houses!', "", __LINE__, __FILE__, $sql);

		$template->assign_vars(array(
			'L_HOUSE_ADMIN_TITLE' => $lang['House_admin_edit_rpg_houses'],
			'L_HOUSE_ADMIN_TITLE_EXPLAIN' => $lang['House_admin_edit_rpg_houses_explain'],
        	'L_HOUSE_ADMIN_PAGE_TITLE' => $lang['House_admin_edit_rpg_houses'],
            'L_HOUSE_ADMIN_UPDATED' => $lang['House_admin_price_updated'],
            'L_HOUSE_ADMIN_RETURN_MAIN_HOUSE' => $lang['House_admin_return_main_house'],
			'L_HOUSE_ADMIN_RETURN_EDIT_HOUSE' => $lang['House_admin_return_edit_house'],
			'L_HOUSE_ADMIN_EDIT_RPG_HOUSE_BUTTON' => $lang['House_admin_edit_rpg_house_button'],
			'L_HOUSE_ADMIN_MAIN' => $lang['House_admin_main'],
			'S_CONFIG_ACTION' => append_sid('admin_house.' . $phpEx),
			'NAME' => $rpghouse,
			'NAME_VAR' => 'rpghouse',
		));
	}
	if ( $action == $lang['House_admin_update_owner'] )
	{
		$template->assign_block_vars( 'update_notification' , array());

		if ( $owner == '' )
			$newowner = (-1) - $rpghouse;
		else
		{
			$sql = "SELECT user_id FROM " . USERS_TABLE . "
					WHERE username='$owner'";
			if ( !($result = $db->sql_query($sql)) )
				message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_profile_data'] ) : 'Fatal Error Getting Profile data!', "", __LINE__, __FILE__, $sql);
			$prow = mysql_fetch_array($result);
			if ($prow['user_id'] == 0)
			{
				$message = $lang['House_admin_user_not_exist'] . sprintf( $lang['House_admin_return_message'], '<a href="'.append_sid("admin_house.".$phpEx).'">', '<a href="'.append_sid("index.".$phpEx."?pane=right").'">');
				message_die(GENERAL_MESSAGE, $message);
			}
			else
				$newowner = $prow['user_id'];
		}

		$sql = "SELECT owner_id FROM " . USER_HOUSE_TABLE . "
				WHERE rpg_id='$rpghouse'";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_profile_data'] ) : 'Fatal Error Getting Profile data!', "", __LINE__, __FILE__, $sql);
		$qrow = $db->sql_fetchrow($result);
		if ( $qrow['owner_id'] > 1 )
			$old_owner = $qrow['owner_id'];
		else
			$old_owner = 0;

		$sql = "SELECT owner_id FROM " . USER_HOUSE_TABLE . "
				WHERE owner_id='$newowner'";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_profile_data'] ) : 'Fatal Error Getting Profile data!', "", __LINE__, __FILE__, $sql);
		$count_row = $db->sql_fetchrowset($result);
		if ( count($count_row) == 0 )
		{
			$sql = "UPDATE " . USER_HOUSE_TABLE . "
					SET owner_id=$newowner
					WHERE rpg_id='$rpghouse'";
			if ( !($result = $db->sql_query($sql)) )
				message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_user_houses'] ) : 'Fatal Error Updating User houses!', "", __LINE__, __FILE__, $sql);

			$sql = "SELECT * FROM " . USER_HOUSE_TABLE . "
					WHERE rpg_id='$rpghouse'";
			if ( !($result = $db->sql_query($sql)) )
				message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_user_houses'] ) : 'Fatal Error Getting User houses!', "", __LINE__, __FILE__, $sql);
			$uhrow = mysql_fetch_array($result);
			$inventoryarray = explode(',',$uhrow['house_inventory']);
			$inventoryamount = count ($inventoryarray);

			// Start Remove Items in users ADR Inventory that were in the RPG House
			if ( $old_owner > 1 )
	  		{
				delete_house_items( $old_owner, $inventoryarray, $inventoryamount );
			}
			// End Remove Items in users ADR Inventory that were in the RPG House

			// Start Add Items in RPG House to users ADR Inventory
			if ( $newowner > 1 )
			{
                add_house_items( $newowner, $inventoryarray, $inventoryamount );
			}
			// End Add Items in RPG House to users ADR Inventory
		}
		else
		{
			$message = $lang['House_admin_existing_user_house'] . sprintf( $lang['House_admin_return_message'], '<a href="'.append_sid("admin_house.".$phpEx).'">', '<a href="'.append_sid("index.".$phpEx."?pane=right").'">');
			message_die(GENERAL_MESSAGE, $message);
		}


		$template->assign_vars(array(
			'L_HOUSE_ADMIN_TITLE' => $lang['House_admin_edit_rpg_houses'],
			'L_HOUSE_ADMIN_TITLE_EXPLAIN' => $lang['House_admin_edit_rpg_houses_explain'],
        	'L_HOUSE_ADMIN_PAGE_TITLE' => $lang['House_admin_edit_rpg_houses'],
            'L_HOUSE_ADMIN_UPDATED' => $lang['House_admin_owner_updated'],
            'L_HOUSE_ADMIN_RETURN_MAIN_HOUSE' => $lang['House_admin_return_main_house'],
			'L_HOUSE_ADMIN_RETURN_EDIT_HOUSE' => $lang['House_admin_return_edit_house'],
			'L_HOUSE_ADMIN_EDIT_HOUSE_BUTTON' => $lang['House_admin_edit_rpg_house_button'],
			'L_HOUSE_ADMIN_MAIN' => $lang['House_admin_main'],
			'S_CONFIG_ACTION' => append_sid('admin_house.' . $phpEx),
			'NAME' => $rpghouse,
			'NAME_VAR' => 'rpghouse',
		));

	}
	if ( $action == $lang['House_place_item'] )
	{
		$template->assign_block_vars( 'update_notification' , array());

		$floorcell = $HTTP_POST_VARS['floorcell'];
		$wallcell = $HTTP_POST_VARS['wallcell'];
		$gardencell = $HTTP_POST_VARS['gardencell'];
		$fwcell = $HTTP_POST_VARS['fwcell'];

		if ((($floorcell == '') && ($wallcell == '') && ($fwcell == '') && ($gardencell == '')) || ((($floorcell != '') && ($floorcellitem == '')) || (($wallcell != '') && ($wallcellitem == '')) || (($fwcell != '') && ($fwcellitem == '')) || (($gardencell != '') && ($gardencellitem == ''))))
			message_die(GENERAL_MESSAGE, $lang['House_empty_fields']);
		if ((($floorcell != '') && ($wallcell !='')) ||	(($floorcell != '') && ($fwcell != '')) || (($floorcell != '') && ($gardencell != '')) || (($wallcell != '') && ($fwcell != '')) || (($wallcell != '') && ($gardencell != '')) || (($gardencell != '') && ($fwcell != '')))
			message_die(GENERAL_MESSAGE, $lang['House_duplicate_cell']);

		$sql = "SELECT * FROM " . USER_HOUSE_TABLE . "
				WHERE rpg_id='$rpghouse'";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_user_houses'] ) : 'Fatal Error Getting User houses!', "", __LINE__, __FILE__, $sql);
		$uhrow = mysql_fetch_array($result);

		$sql = "SELECT house_name FROM " . HOUSES_TABLE . "
				WHERE house_type=$uhrow[house_type]";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_house_data'] ) : 'Fatal Error Getting House data!', "", __LINE__, __FILE__, $sql);
		$hrow = mysql_fetch_array($result);

		$inventoryarray = explode(',',$uhrow['house_inventory']);
		$inventoryamount = count ($inventoryarray);

		if ( $floorcell != '' )
		{
			if ( $inventoryarray[$floorcell-1] != '' )
				message_die(GENERAL_MESSAGE, $lang['House_duplicate_cell_use']);

			$inventory = '';
			for ( $a = 0; $a < $inventoryamount; $a++ )
			{
				if ( $a == ($floorcell-1) )
					$inventory .= $floorcellitem.',';
				else
					$inventory .= $inventoryarray[$a].',';
			}
		}
		if ( $wallcell != '' )
		{
			if ($inventoryarray[$wallcell-1] != '')
				message_die(GENERAL_MESSAGE, $lang['House_duplicate_cell_use']);

			$inventory = '';
			for ( $a = 0; $a < $inventoryamount; $a++ )
			{
				if ( $a == ($wallcell-1) )
					$inventory .= $wallcellitem.',';
				else
					$inventory .= $inventoryarray[$a].',';
			}
		}
		if ( $gardencell != '' )
		{
			if ( $inventoryarray[$gardencell-1] != '' )
				message_die(GENERAL_MESSAGE, $lang['House_duplicate_cell_use']);

			$inventory = '';
			for ( $a = 0; $a < $inventoryamount; $a++ )
			{
				if ( $a == ($gardencell-1) )
					$inventory .= $gardencellitem.',';
				else
					$inventory .= $inventoryarray[$a].',';
			}
		}
		if ( $fwcell != '' )
		{
			if ( $inventoryarray[$fwcell-1] != '' )
				message_die(GENERAL_MESSAGE, $lang['House_duplicate_cell_use']);

			$inventory = '';
			for ( $a = 0; $a < $inventoryamount; $a++ )
			{
				if ( $a == ($fwcell-1) )
					$inventory .= $fwcellitem.',';
				else
					$inventory .= $inventoryarray[$a].',';
			}
		}

		$sql = "UPDATE " . USER_HOUSE_TABLE . "
				SET house_inventory='$inventory'
				WHERE rpg_id='$rpghouse'";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_user_houses'] ) : 'Fatal Error Updating User houses!', "", __LINE__, __FILE__, $sql);

		$template->assign_vars(array(
			'L_HOUSE_ADMIN_TITLE' => $lang['House_admin_edit_rpg_houses'],
			'L_HOUSE_ADMIN_TITLE_EXPLAIN' => $lang['House_admin_edit_rpg_houses_explain'],
        	'L_HOUSE_ADMIN_PAGE_TITLE' => $lang['House_admin_edit_rpg_houses'],
            'L_HOUSE_ADMIN_UPDATED' => $lang['House_admin_item_placed'],
            'L_HOUSE_ADMIN_RETURN_MAIN_HOUSE' => $lang['House_admin_return_main_house'],
			'L_HOUSE_ADMIN_RETURN_EDIT_HOUSE' => $lang['House_admin_return_edit_house'],
			'L_HOUSE_ADMIN_EDIT_HOUSE_BUTTON' => $lang['House_admin_edit_rpg_house_button'],
			'L_HOUSE_ADMIN_MAIN' => $lang['House_admin_main'],
			'S_CONFIG_ACTION' => append_sid('admin_house.' . $phpEx),
			'NAME' => $rpghouse,
			'NAME_VAR' => 'rpghouse',
		));
	}
}
//--------------------------------Edit RPG House END-----------------------------------------

//--------------------------------Create RPG House START-----------------------------------------
if ( $mode == $lang['House_admin_create_rpg_house'] )
{
	$remove = $HTTP_POST_VARS['remove'];
	$rpgdes = $HTTP_POST_VARS['rpgdes'];
	$owner = $HTTP_POST_VARS['owner'];
	$prize = $HTTP_POST_VARS['prize'];
	$rpgid = $HTTP_POST_VARS['rpgid'];
	$createhouse = $HTTP_POST_VARS['createhouse'];
	
	if ($action == $lang['House_admin_main'])
	{
		$template->assign_block_vars( 'create_rpg_house' , array());

		// Make a new RPG ID for the RPG House
		$sql = "SELECT rpg_id FROM " . USER_HOUSE_TABLE ."
				ORDER BY rpg_id
				DESC LIMIT 1";
		$result = $db->sql_query($sql);
		if ( !$result )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_user_houses'] ) : 'Fatal Error Getting User houses!', "", __LINE__, __FILE__, $sql);
		$data = $db->sql_fetchrow($result);
		$new_rpg_id = $data['rpg_id'] + 1 ;
		
		$house_type_list = create_house_type_list( 'createhouse' );

		$template->assign_vars(array(
			'L_HOUSE_ADMIN_TITLE' => $lang['House_admin_edit_rpg_houses'],
			'L_HOUSE_ADMIN_TITLE_EXPLAIN' => $lang['House_admin_edit_rpg_houses_explain'],
        	'L_HOUSE_ADMIN_PAGE_TITLE' => $lang['House_admin_create_rpg_house_title'],
            'L_HOUSE_ADMIN_CREATE_RPG_HOUSE' => $lang['House_admin_create_rpg_house'],
            'L_HOUSE_ADMIN_RPG_ID' => $lang['House_admin_rpg_id'],
			'L_HOUSE_ADMIN_RPG_ID_EXPLAIN' => $lang['House_admin_rpg_id_explain'],
			'L_HOUSE_ADMIN_HOUSE_DESCRIPTION' => $lang['House_admin_house_description'],
			'L_HOUSE_ADMIN_HOUSE_DESCRIPTION_EXPLAIN' => $lang['House_admin_house_description_explain'],
			'L_HOUSE_ADMIN_HOUSE_PRICE' => $lang['House_admin_house_price'],
			'L_HOUSE_ADMIN_HOUSE_PRICE_EXPLAIN' => $lang['House_admin_house_price_explain'],
			'L_HOUSE_ADMIN_HOUSE_TYPE' => $lang['House_admin_type'],
			'L_HOUSE_ADMIN_CREATE' => $lang['House_admin_create'],
			'L_HOUSE_ADMIN_MAIN_RETURN' => $lang['House_admin_return_main_house'],
			'L_HOUSE_ADMIN_MAIN' => $lang['House_admin_main'],

			'S_CONFIG_ACTION' => append_sid('admin_house.' . $phpEx),
			'RPG_HOUSE' => $rpghouse,
			'NEW_RPG_ID' => $new_rpg_id,
			'HOUSE_TYPE_LIST' => $house_type_list,
		));
	}
	if ( $action == $lang['House_admin_create'] )
	{
		if ( !isset($createhouse) )
			message_die(GENERAL_MESSAGE, $lang['House_admin_select_house'] . sprintf( $lang['House_admin_return_message'], '<a href="'.append_sid("admin_house.".$phpEx).'">', '<a href="'.append_sid("index.".$phpEx."?pane=right").'">'));

		if ( ($rpgid == 0) || (!is_numeric($rpgid)) )
		{
			$message = $lang['House_admin_rpg_id_zero'] . sprintf( $lang['House_admin_return_message'], '<a href="'.append_sid("admin_house.".$phpEx).'">', '<a href="'.append_sid("index.".$phpEx."?pane=right").'">');
			message_die(GENERAL_MESSAGE, $message);
		}

		if ( !is_numeric($prize) )
		{
			$message = $lang['House_admin_enter_price'] . sprintf( $lang['House_admin_return_message'], '<a href="'.append_sid("admin_house.".$phpEx).'">', '<a href="'.append_sid("index.".$phpEx."?pane=right").'">');
			message_die(GENERAL_MESSAGE, $message);
		}

		$sql = "SELECT house_type FROM " . USER_HOUSE_TABLE . "
				WHERE rpg_id='$rpgid'";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_house_data'] ) : 'Fatal Error Getting House data!', "", __LINE__, __FILE__, $sql);
		$crow = mysql_fetch_array($result);

		if ( $crow['house_type'] != '' )
			message_die(GENERAL_MESSAGE, $lang['House_admin_rpg_id_exists'] . sprintf( $lang['House_admin_return_message'], '<a href="'.append_sid("admin_house.".$phpEx).'">', '<a href="'.append_sid("index.".$phpEx."?pane=right").'">'));

		$sql = "SELECT * FROM " . HOUSES_TABLE . "
				WHERE house_type=$createhouse";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_house_data'] ) : 'Fatal Error Getting House data!', "", __LINE__, __FILE__, $sql);
		$hrow = mysql_fetch_array($result);

		$hcellshn = $hrow['house_cellwidthnumber'];
		$hcellsvn = $hrow['house_cellheightnumber'];
		$cellamount = $hcellshn * $hcellsvn;

		$inventory = '';
		for ($a = 1; $a <= $cellamount; $a++)
		{
			$inventory .= ",";
		}
		$owner = (-1) - $rpgid;

		$sql2 = "INSERT INTO " . USER_HOUSE_TABLE . "
				(owner_id, house_type, house_inventory, rpg_id, rpg_description, rpg_prize)
				VALUES ($owner, $createhouse, '$inventory', $rpgid, '$rpgdes', '$prize')";
		if ( !($db->sql_query($sql2)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_user_houses'] ) : 'Fatal Error Updating User houses!', "", __LINE__, __FILE__, $sql);

		$message = $lang['House_admin_house_created'] . sprintf( $lang['House_admin_return_message'], '<a href="'.append_sid("admin_house.".$phpEx).'">', '<a href="'.append_sid("index.".$phpEx."?pane=right").'">');
		message_die(GENERAL_MESSAGE, $message);
	}
}
//--------------------------------Create RPG House END-----------------------------------------

//--------------------------------Edit Userhouse Page START-----------------------------------------

if ( $mode == $lang['House_admin_edit_house'] )
{
	$username = $HTTP_POST_VARS['username'];
	$username2 = $HTTP_POST_VARS['username2'];
	$remove = $HTTP_POST_VARS['remove'];
	$id = $HTTP_POST_VARS['id'];
	$givehouse = $HTTP_POST_VARS['givehouse'];
	
	if ( $action == $lang['House_admin_main'] )
	{
		if ( $username == '' )
		{
			if ( $username2 == '' )
			{
				$message = $lang['House_admin_select_username'] . sprintf( $lang['House_admin_return_message'], '<a href="'.append_sid("admin_house.".$phpEx).'">', '<a href="'.append_sid("index.".$phpEx."?pane=right").'">');
				message_die(GENERAL_MESSAGE, $message);
			}
			else
			{
				$username = $username2;
			}
		}
		if ( $board_config['use_adr_shops_in_house'] )
		{
			$sql = "SELECT username, user_id FROM " . USERS_TABLE . "
					WHERE username='$username'";
		}
		else
		{
			$sql = "SELECT username, user_id, user_items FROM " . USERS_TABLE . "
					WHERE username='$username'";
		}

		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_profile_data'] ) : 'Fatal Error Getting Profile data!', "", __LINE__, __FILE__, $sql);
		$prow = mysql_fetch_array($result);

		if ( $prow['user_id'] == 0 )
		{
			$message = $lang['House_admin_user_not_exist'] . sprintf( $lang['House_admin_return_message'], '<a href="'.append_sid("admin_house.".$phpEx).'">', '<a href="'.append_sid("index.".$phpEx."?pane=right").'">');
			message_die(GENERAL_MESSAGE, $message);
		}
		$id = $prow['user_id'];

		$sql = "SELECT * FROM " . USER_HOUSE_TABLE . "
				WHERE owner_id='$id'";
		if ( !($result = $db->sql_query($sql)) )
			message_die( GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_user_houses'] ) : 'Fatal Error getting User houses!', '', __LINE__, __FILE__, $sql );
		$uhrow = mysql_fetch_array($result);

		if ( $uhrow['house_type'] == '' )
		{
			$template->assign_block_vars( 'no_house' , array());
			
			$house_type_list = create_house_type_list( 'givehouse' );

			$template->assign_vars(array(
				'L_HOUSE_ADMIN_TITLE' => $lang['House_admin_edit_houses'],
				'L_HOUSE_ADMIN_TITLE_EXPLAIN' => $lang['House_admin_edit_houses_explain'],
        		'L_HOUSE_ADMIN_PAGE_TITLE' => $lang['House_admin_edit_houses'],
	            'L_HOUSE_ADMIN_USER_NO_HOUSE' => $lang['House_admin_user_no_house'],
				'L_HOUSE_ADMIN_EDIT_HOUSE' => $lang['House_admin_edit_house'],
				'L_HOUSE_ADMIN_MAIN_RETURN' => $lang['House_admin_return_main_house'],
				'L_HOUSE_ADMIN_HOUSE_TYPE' => $lang['House_admin_type'],
				'L_HOUSE_ADMIN_GIVE' => $lang['House_admin_give'],
				'L_HOUSE_ADMIN_MAIN' => $lang['House_admin_main'],

				'S_CONFIG_ACTION' => append_sid('admin_house.' . $phpEx),
				'USER_NAME' => $username,
				'USER_ID' => $id,
				'HOUSE_TYPE_LIST' => $house_type_list,
			));

		}
		else
		{
			$template->assign_block_vars( 'edit_house' , array());
			$template->assign_block_vars( 'edit_house.user_house' , array());

			$sql = "SELECT * FROM " . HOUSES_TABLE . "
					WHERE house_type=$uhrow[house_type]";
			if ( !($result = $db->sql_query($sql)) )
				message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_house_data'] ) : 'Fatal Error Getting House data!', "", __LINE__, __FILE__, $sql);
			$hrow = mysql_fetch_array($result);

			$sql = "SELECT * FROM " . HOUSE_SETTINGS_TABLE . "
					WHERE var=1";
			if ( !($result = $db->sql_query($sql)) )
				message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_house_configs'] ) : 'Fatal Error Getting House Configs!', "", __LINE__, __FILE__, $sql);
			$crow = mysql_fetch_array($result);

			$house = $hrow['house_bg'];
			$housefront = $hrow['house_front'];
			$hwidth = $hrow['house_width'];
			$hcellsh = $hrow['house_cellwidth'] - 2;
			$hcellshn = $hrow['house_cellwidthnumber'];
			$hheight = $hrow['house_height'];
			$hcellsv = $hrow['house_cellheight'] - 2;
			$hcellsvn = $hrow['house_cellheightnumber'];
			$floorcells = explode(",",$hrow['house_floor']);
			$floorcellsamount = count ($floorcells);
			$fwcells = explode(",",$hrow['house_fw']);
			$fwcellsamount = count ($fwcells);
			$gardencells = explode(",",$hrow['house_garden']);
			$gardencellsamount = count ($gardencells);
			$wallcells = explode(",",$hrow['house_wall']);
			$wallcellsamount = count ($wallcells);
			$cellamount = $hcellshn * $hcellsvn;
			$inventoryarray = explode(',',$uhrow['house_inventory']);
			$inventoryamount = count ($inventoryarray);

			$itempurge = str_replace("Þ", "", $prow['user_items']);
			$itemarray = explode('ß',$itempurge);
			$itemcount = count($itemarray);

			$flooritems = '';
			$wallitems = '';
			$fwitems = '';
			$gardenitems = '';
			$shopitems = '';

			$user_house_inv = create_user_house_inventory_list( 'remove', $inventoryarray, $inventoryamount, $shop_images );

			if ( $board_config['use_adr_shops_in_house'] )
			{
				$sql = "SELECT * FROM " . ADR_SHOPS_ITEMS_TABLE . "
						WHERE item_store_id='$adr_general[furniture_shop_id]'
						ORDER BY item_name";
				if ( !($iresult = $db->sql_query($sql)) )
					message_die(GENERAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], $lang['House_adr'] . ' ' . $lang['House_admin_furniture_store'] ) : 'Fatal Error getting ADR Furniture Store Shop items!', "", __LINE__, __FILE__, $sql);
				$shop_images = array();
				for ( $x = 0; $x < mysql_num_rows($iresult); $x++ )
				{
					$irow = mysql_fetch_array($iresult);
					$shopitems .= $irow['item_name'];
					$shop_images[$irow['item_name']] = $irow['item_icon'];
					if ( $irow['item_type_use'] == 72 )
						$flooritems .= "<option value=\"".str_replace('.gif','',$irow['item_icon'])."\">".ucfirst($irow['item_name'])."</option>";
					if ( $irow['item_type_use'] == 73 )
						$wallitems .= "<option value=\"".str_replace('.gif','',$irow['item_icon'])."\">".ucfirst($irow['item_name'])."</option>";
					if ( $irow['item_type_use'] == 74 )
						$fwitems .= "<option value=\"".str_replace('.gif','',$irow['item_icon'])."\">".ucfirst($irow['item_name'])."</option>";
					if ( $irow['item_type_use'] == 75 )
						$gardenitems .= "<option value=\"".str_replace('.gif','',$irow['item_icon'])."\">".ucfirst($irow['item_name'])."</option>";
				}

				$sql = "SELECT * FROM " . ADR_SHOPS_ITEMS_TABLE . "
						WHERE item_store_id='$adr_general[garden_shop_id]'
						ORDER BY item_name";
				if ( !($jresult = $db->sql_query($sql)) )
					message_die(GENERAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], $lang['House_adr'] . ' ' . $lang['House_admin_garden_store'] ) : 'Fatal Error getting ADR Garden Store Shop items!', "", __LINE__, __FILE__, $sql);
				for ( $x = 0; $x < mysql_num_rows($jresult); $x++ )
				{
					$jrow = mysql_fetch_array($jresult);
					$shop_images[$jrow['item_name']] = $jrow['item_icon'];
					if ( $jrow['item_type_use'] == 72 )
						$flooritems .= "<option value=\"".str_replace('.gif','',$jrow['item_icon'])."\">".ucfirst($jrow['item_name'])."</option>";
					if ( $jrow['item_type_use'] == 73 )
						$wallitems .= "<option value=\"".str_replace('.gif','',$jrow['item_icon'])."\">".ucfirst($jrow['item_name'])."</option>";
					if ( $jrow['item_type_use'] == 74 )
						$fwitems .= "<option value=\"".str_replace('.gif','',$jrow['item_icon'])."\">".ucfirst($jrow['item_name'])."</option>";
					if ( $jrow['item_type_use'] == 75 )
						$gardenitems .= "<option value=\"".str_replace('.gif','',$jrow['item_icon'])."\">".ucfirst($jrow['item_name'])."</option>";
				}
			}
			else
			{
				$sql = "SELECT * FROM " . SHOPITEMS_TABLE . "
						WHERE shop='$crow[shop_1]'
						ORDER BY sdesc";
				if ( !($iresult = $db->sql_query($sql)) )
					message_die(GENERAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], $lang['House_shop_mod'] . ' ' . $lang['House_admin_furniture_store'] ) : 'Fatal Error getting Shop MOD Furniture Store Shop items!', "", __LINE__, __FILE__, $sql);
				for ( $x = 0; $x < mysql_num_rows($iresult); $x++ )
				{
					$irow = mysql_fetch_array($iresult);
					$shopitems .= $irow['name'];
					if ( $irow['furniture_type'] == 1 )
						$flooritems .= "<option value=\"".$irow['name']."\">".ucfirst($irow['sdesc'])."</option>";
					if ( $irow['furniture_type'] == 2 )
						$wallitems .= "<option value=\"".$irow['name']."\">".ucfirst($irow['sdesc'])."</option>";
					if ( $irow['furniture_type'] == 3 )
						$fwitems .= "<option value=\"".$irow['name']."\">".ucfirst($irow['sdesc'])."</option>";
					if ( $irow['furniture_type'] == 4 )
						$gardenitems .= "<option value=\"".$irow['name']."\">".ucfirst($irow['sdesc'])."</option>";
				}

				$sql = "SELECT * FROM " . SHOPITEMS_TABLE . "
						WHERE shop='$crow[shop_2]'
						ORDER BY sdesc";
				if ( !($jresult = $db->sql_query($sql)) )
					message_die(GENERAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], $lang['House_shop_mod'] . ' ' . $lang['House_admin_garden_store'] ) : 'Fatal Error getting Shop MOD Garden Store Shop items!', "", __LINE__, __FILE__, $sql);
				for ( $x = 0; $x < mysql_num_rows($jresult); $x++ )
				{
					$jrow = mysql_fetch_array($jresult);
					if ( $jrow['furniture_type'] == 1 )
						$flooritems .= "<option value=\"".$jrow['name']."\">".ucfirst($jrow['sdesc'])."</option>";
					if ( $jrow['furniture_type'] == 2 )
						$wallitems .= "<option value=\"".$jrow['name']."\">".ucfirst($jrow['sdesc'])."</option>";
					if ( $jrow['furniture_type'] == 3 )
						$fwitems .= "<option value=\"".$jrow['name']."\">".ucfirst($jrow['sdesc'])."</option>";
					if ( $jrow['furniture_type'] == 4 )
						$gardenitems .= "<option value=\"".$jrow['name']."\">".ucfirst($jrow['sdesc'])."</option>";
				}
			}

			$floor_item_list = create_item_list( 'floorcellitem', $flooritems );
			$wall_item_list = create_item_list( 'wallcellitem', $wallitems );
			$garden_item_list = create_item_list( 'gardencellitem', $gardenitems );
			$fw_item_list = create_item_list( 'fwcellitem', $fwitems );

			// some pixies fly by and get our furniture organised

			$ia = 0;
			for ($iv = 1; $iv <= $hcellsvn; $iv++)
			{
				for ($ih = 1; $ih <= $hcellshn; $ih++)
				{
					if ($inventoryarray[$ia] == '')
					{
						$houseinventory[$iv][$ih] = 'empty';
					}
					else
					{
						( $board_config['use_adr_shops_in_house'] ) ? $houseinventory[$iv][$ih] = str_replace('.gif','',$inventoryarray[$ia]) : $houseinventory[$iv][$ih] = $inventoryarray[$ia];
					}
					$ia++;
				}
			}

			// lets get some gnomes to build the house

			$cn = 1;
			for ($sv = 1; $sv <= $hcellsvn; $sv++)
			{
				$cellinfo .= '<tr>';
				for ($sh = 1; $sh <= $hcellshn; $sh++)
				{
					$cellinfo .= '
		<td width="'.$hcellsh.'px" height="'.$hcellsv.'px"><img src="..' . $image_dir .$houseinventory[$sv][$sh].'.gif" width="'.$hcellsh.'px" height="'.$hcellsv.'px" border="0"  alt="Cell - '.$cn.'" title="Cell - '.$cn.'"></td>';
					$cn++;
				}
				$cellinfo .= '</tr>';
			}

        	$floor_cell_list = create_cell_list( 'floorcell', $floorcells, $floorcellsamount );
			$wall_cell_list = create_cell_list( 'wallcell', $wallcells, $wallcellsamount );
			$garden_cell_list = create_cell_list( 'gardencell', $gardencells, $gardencellsamount );
			$floor_wall_cell_list = create_cell_list( 'fwcell', $fwcells, $fwcellsamount );

			$template->assign_vars(array(
				'L_HOUSE_ADMIN_TITLE' => $lang['House_admin_edit_houses'],
				'L_HOUSE_ADMIN_TITLE_EXPLAIN' => $lang['House_admin_edit_houses_explain'],
    	    	'L_HOUSE_ADMIN_PAGE_TITLE' => $lang['House_admin_edit_houses'],
        	    'L_HOUSE_ADMIN_EDIT_HOUSE_BUTTON' => $lang['House_admin_edit_house'],
            	'L_HOUSE_ADMIN_EDITING_USER_HOUSE' => sprintf( $lang['House_admin_editing_user_house'], $username ),
				'L_HOUSE_ADMIN_DESCRIPTION' => $lang['House_admin_description'],
    	        'L_HOUSE_ADMIN_OWNER' => $lang['House_admin_owner'],
        	    'L_HOUSE_ADMIN_NO_OWNER_INFO' => $lang['House_admin_no_owner_info'],
            	'L_HOUSE_ADMIN_COSTS' => $lang['House_costs'],
				'L_HOUSE_ADMIN_UPDATE_DESCRIPTION' => $lang['House_admin_update_description'],
				'L_HOUSE_ADMIN_UPDATE_OWNER' => $lang['House_admin_update_owner'],
				'L_HOUSE_ADMIN_UPDATE_PRICE' => $lang['House_admin_update_price'],
				'L_HOUSE_ADMIN_REMOVE_ITEM' => $lang['House_admin_remove_item'],
				'L_HOUSE_ADMIN_ITEM' => $lang['House_item'],
				'L_HOUSE_ADMIN_REMOVE' => $lang['House_remove'],
				'L_HOUSE_ADMIN_FURNITURE_FLOOR' => $lang['House_admin_furniture_floor'],
				'L_HOUSE_ADMIN_PLACE' => $lang['House_place'],
				'L_HOUSE_ADMIN_PLACE_ITEM' => $lang['House_place_item'],
				'L_HOUSE_ADMIN_FURNITURE_WALL' => $lang['House_admin_furniture_wall'],
        	    'L_HOUSE_ADMIN_FURNITURE_GARDEN' => $lang['House_admin_furniture_garden'],
            	'L_HOUSE_ADMIN_FURNITURE_FLOOR_WALL' => $lang['House_admin_furniture_floor_wall'],
	            'L_HOUSE_ADMIN_DELETION_WARNING' => $lang['House_admin_deletion_warning'],
    	        'L_HOUSE_ADMIN_DELETE_HOUSE' => $lang['House_admin_delete_house'],
        	    'L_HOUSE_ADMIN_RETURN_MAIN_HOUSE' => $lang['House_admin_return_main_house'],
				'L_HOUSE_ADMIN_MAIN' => $lang['House_admin_main'],

				'S_CONFIG_ACTION' => append_sid('admin_house.' . $phpEx),
            	'USER_ID' => $id,
				'USER_NAME' => $username,
    	        'HOUSE_BACKGROUND' => '../images/house/' . $house,
        	    'HOUSE_WIDTH' => $hwidth,
            	'HOUSE_HEIGHT' => $hheight,
				'CELL_INFO' => $cellinfo,
				'HOUSE_FRONT' => $housefront,
        	    'USER_HOUSE_INVENTORY' => $user_house_inv,
            	'FLOOR_CELL_LIST' => $floor_cell_list,
	            'FLOOR_ITEM_LIST' => $floor_item_list,
    	        'WALL_CELL_LIST' => $wall_cell_list,
        	    'WALL_ITEM_LIST' => $wall_item_list,
            	'GARDEN_CELL_LIST' => $garden_cell_list,
	            'GARDEN_ITEM_LIST' => $garden_item_list,
    	        'FLOOR_WALL_CELL_LIST' => $floor_wall_cell_list,
        	    'FLOOR_WALL_ITEM_LIST' => $fw_item_list,
			));
		}
	}

	if ( $action == $lang['House_admin_delete_house'] )
	{
		//update user houses
  		$u3sql="DELETE FROM " . USER_HOUSE_TABLE . "
				WHERE owner_id=$id";
  		if ( !($u3result = $db->sql_query($u3sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_user_houses'] ) : 'Fatal Error Updating User houses!', "", __LINE__, __FILE__, $sql);

		$message = $lang['House_admin_delete_house_message'] . sprintf( $lang['House_admin_return_message'], '<a href="'.append_sid("admin_house.".$phpEx).'">', '<a href="'.append_sid("index.".$phpEx."?pane=right").'">');
		message_die(GENERAL_MESSAGE, $message);
	}

	if ( $action == $lang['House_admin_give'] )
	{
		if ( !isset($givehouse) )
			message_die(GENERAL_MESSAGE, $lang['House_admin_select_house'] . sprintf( $lang['House_admin_return_message'], '<a href="'.append_sid("admin_house.".$phpEx).'">', '<a href="'.append_sid("index.".$phpEx."?pane=right").'">'));

		$sql = "SELECT * FROM " . HOUSES_TABLE . "
				WHERE house_type=$givehouse";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_house_data'] ) : 'Fatal Error Getting House data!', "", __LINE__, __FILE__, $sql);
		$hrow = mysql_fetch_array($result);

		$hcellshn = $hrow['house_cellwidthnumber'];
		$hcellsvn = $hrow['house_cellheightnumber'];
		$cellamount = $hcellshn * $hcellsvn;

		$inventory = '';
		for ($a = 1; $a <= $cellamount; $a++)
		{
			$inventory .= ",";
		}

		$sql2 = "INSERT INTO " . USER_HOUSE_TABLE . " (owner_id, house_type, house_inventory) VALUES ($id, $givehouse, '$inventory')";
		if ( !($db->sql_query($sql2)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_user_houses'] ) : 'Fatal Error Updating User houses!', "", __LINE__, __FILE__, $sql);

		$message = $lang['House_admin_house_given'] . sprintf( $lang['House_admin_return_message'], '<a href="'.append_sid("admin_house.".$phpEx).'">', '<a href="'.append_sid("index.".$phpEx."?pane=right").'">');
		message_die(GENERAL_MESSAGE, $message);
	}

	if ( $action == $lang['House_remove'] )
	{
		$template->assign_block_vars( 'update_notification' , array());

		if ( $remove =='' )
			message_die(GENERAL_MESSAGE, $lang['House_admin_remove_first'] . sprintf( $lang['House_admin_return_message'], '<a href="'.append_sid("admin_house.".$phpEx).'">', '<a href="'.append_sid("index.".$phpEx."?pane=right").'">'));

		if ( !$board_config['use_adr_shops_in_house'] )
		{
			$sql = "SELECT uh.*, u.username, u.user_items, h.* FROM " . USER_HOUSE_TABLE . " uh
			        LEFT JOIN " . USERS_TABLE . " u  ON ( uh.owner_id = u.user_id )
			        LEFT JOIN " . HOUSES_TABLE . " h  ON ( uh.house_type = h.house_type )
					WHERE owner_id='$id'";
			if ( !($result = $db->sql_query($sql)) )
				message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_user_houses'] ) : 'Fatal Error Getting User houses!', "", __LINE__, __FILE__, $sql);
			$uhrow = mysql_fetch_array($result);
		}
		else
		{
			$sql = "SELECT uh.*, u.username, h.* FROM " . USER_HOUSE_TABLE . " uh
			        LEFT JOIN " . USERS_TABLE . " u  ON ( uh.owner_id = u.user_id )
			        LEFT JOIN " . HOUSES_TABLE . " h  ON ( uh.house_type = h.house_type )
					WHERE owner_id='$id'";
			if ( !($result = $db->sql_query($sql)) )
				message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_user_houses'] ) : 'Fatal Error Getting User houses!', "", __LINE__, __FILE__, $sql);
			$uhrow = mysql_fetch_array($result);
		}

/*		$sql = "SELECT * FROM " . USER_HOUSE_TABLE . "
				WHERE owner_id='$id'";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_user_houses'] ) : 'Fatal Error Getting User houses!', "", __LINE__, __FILE__, $sql);
		$uhrow = mysql_fetch_array($result);

		if ( $board_config['use_adr_shops_in_house'] )
		{
			$sql = "SELECT username FROM " . USERS_TABLE . "
					WHERE user_id='$id'";
		}
		else
		{
			$sql = "SELECT username, user_items FROM " . USERS_TABLE . "
					WHERE user_id='$id'";
		}
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_profile_data'] ) : 'Fatal Error Getting Profile data!', "", __LINE__, __FILE__, $sql);
		$prow = mysql_fetch_array($result);

		$sql = "SELECT house_name FROM " . HOUSES_TABLE . "
				WHERE house_type=$uhrow[house_type]";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_house_data'] ) : 'Fatal Error Getting House data!', "", __LINE__, __FILE__, $sql);
		$hrow = mysql_fetch_array($result);
*/
		$inventoryarray = explode(',',$uhrow['house_inventory']);
		$inventoryamount = count ($inventoryarray);
		$item_remove = $inventoryarray[$remove] . '.gif';
		if ( !$board_config['use_adr_shops_in_house'] )
			$newuseritems = $uhrow['user_items'].'ß'.$inventoryarray[$remove].'Þ';

		for ( $a = 0; $a < $inventoryamount; $a++ )
			if ( $a == $remove )
				$inventoryarray[$a] = '';

		$inventory = '';
		for ( $a = 0; $a < $inventoryamount; $a++ )
			$inventory .= $inventoryarray[$a].',';

		$sql = "UPDATE " . USER_HOUSE_TABLE . "
				SET house_inventory='$inventory'
				WHERE owner_id='$id'";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_user_houses'] ) : 'Fatal Error Updating User houses!', "", __LINE__, __FILE__, $sql);

   		if ( $board_config['use_adr_shops_in_house'] )
  		{
			$sql = "SELECT item_id from " . ADR_SHOPS_ITEMS_TABLE . "
					WHERE item_owner_id='$id'
						AND item_in_house = 1
						AND item_icon = '$item_remove'";
			if ( !($result = $db->sql_query($sql)) )
				message_die( GENERAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], $lang['House_adr'] ) : 'Fatal Error getting ADR Shopitems!', '', __LINE__, __FILE__, $sql);
			$gen_item_id = mysql_fetch_array($result);

			$sql = "UPDATE " . ADR_SHOPS_ITEMS_TABLE . "
					SET item_in_house = 0
					WHERE item_owner_id='$id'
						AND item_id = '" . $gen_item_id['item_id'] . "'";
			if ( !($result = $db->sql_query($sql)) )
				message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_adr_item'] ) : 'Fatal Error Updating ADR Item!', "", __LINE__, __FILE__, $sql);
		}
		else
		{
			$sql = "UPDATE " . USERS_TABLE . "
					SET user_items='$newuseritems'
					WHERE user_id='$id'";
			if ( !($result = $db->sql_query($sql)) )
				message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_user_items'] ) : 'Fatal Error Updating User Items!', "", __LINE__, __FILE__, $sql);
		}

		$template->assign_vars(array(
			'L_HOUSE_ADMIN_TITLE' => $lang['House_admin_edit_houses'],
			'L_HOUSE_ADMIN_TITLE_EXPLAIN' => $lang['House_admin_edit_houses_explain'],
			'L_HOUSE_ADMIN_PAGE_TITLE' => $lang['House_admin_edit_houses'],
			'L_HOUSE_ADMIN_UPDATED' => $lang['House_item_removed'],
			'L_HOUSE_ADMIN_RETURN_MAIN_HOUSE' => $lang['House_admin_return_main_house'],
			'L_HOUSE_ADMIN_RETURN_EDIT_HOUSE' => $lang['House_admin_return_edit_house'],
			'L_HOUSE_ADMIN_EDIT_HOUSE_BUTTON' => $lang['House_admin_edit_house'],
			'L_HOUSE_ADMIN_MAIN' => $lang['House_admin_main'],
			'S_CONFIG_ACTION' => append_sid('admin_house.' . $phpEx),
			'NAME' => $username,
			'NAME_VAR' => 'username',
		));
	}

	if ( $action == $lang['House_place_item'] )
	{
		$template->assign_block_vars( 'update_notification' , array());

		$floorcell = $HTTP_POST_VARS['floorcell'];
		$wallcell = $HTTP_POST_VARS['wallcell'];
		$gardencell = $HTTP_POST_VARS['gardencell'];
		$fwcell = $HTTP_POST_VARS['fwcell'];

		if ( ( ( $floorcell == '' ) && ( $wallcell == '' ) && ( $fwcell == '' ) && ( $gardencell == '' ) ) || ( ( ( $floorcell != '' ) && ( $floorcellitem == '' ) ) || ( ( $wallcell != '' ) && ( $wallcellitem == '' ) ) || ( ( $fwcell != '' ) && ( $fwcellitem == '' ) ) || ( ( $gardencell != '' ) && ( $gardencellitem == '' ) ) ) )
			message_die(GENERAL_MESSAGE, $lang['House_empty_fields']);
		if ( ( ( $floorcell != '' ) && ( $wallcell !='' ) ) ||	( ( $floorcell != '' ) && ( $fwcell != '' ) ) || ( ( $floorcell != '' ) && ( $gardencell != '' ) ) || ( ( $wallcell != '' ) && ( $fwcell != '' ) ) || ( ( $wallcell != '' ) && ( $gardencell != '' ) ) || ( ( $gardencell != '' ) && ( $fwcell != '' ) ) )
			message_die(GENERAL_MESSAGE, $lang['House_duplicate_cell']);

		if ( !$board_config['use_adr_shops_in_house'] )
		{
			$sql = "SELECT uh.*, u.username, u.user_items, h.* FROM " . USER_HOUSE_TABLE . " uh
			        LEFT JOIN " . USERS_TABLE . " u  ON ( uh.owner_id = u.user_id )
			        LEFT JOIN " . HOUSES_TABLE . " h  ON ( uh.house_type = h.house_type )
					WHERE owner_id='$id'";
			if ( !($result = $db->sql_query($sql)) )
				message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_user_houses'] ) : 'Fatal Error Getting User houses!', "", __LINE__, __FILE__, $sql);
			$uhrow = mysql_fetch_array($result);
		}
		else
		{
			$sql = "SELECT uh.*, u.username, h.* FROM " . USER_HOUSE_TABLE . " uh
			        LEFT JOIN " . USERS_TABLE . " u  ON ( uh.owner_id = u.user_id )
			        LEFT JOIN " . HOUSES_TABLE . " h  ON ( uh.house_type = h.house_type )
					WHERE owner_id='$id'";
			if ( !($result = $db->sql_query($sql)) )
				message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_user_houses'] ) : 'Fatal Error Getting User houses!', "", __LINE__, __FILE__, $sql);
			$uhrow = mysql_fetch_array($result);
		}
/*		$sql = "SELECT * FROM " . USER_HOUSE_TABLE . "
				WHERE owner_id='$id'";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_user_houses'] ) : 'Fatal Error Getting User houses!', "", __LINE__, __FILE__, $sql);
		$uhrow = mysql_fetch_array($result);

		if ( $board_config['use_adr_shops_in_house'] )
		{
			$sql = "SELECT username FROM " . USERS_TABLE . "
					WHERE user_id='$id'";
		}
		else
		{
			$sql = "SELECT username, user_items FROM " . USERS_TABLE . "
					WHERE user_id='$id'";
		}
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_profile_data'] ) : 'Fatal Error Getting Profile data!', "", __LINE__, __FILE__, $sql);
		$prow = mysql_fetch_array($result);

		$sql = "SELECT house_name FROM " . HOUSES_TABLE . "
				WHERE house_type=$uhrow[house_type]";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_house_data'] ) : 'Fatal Error Getting House data!', "", __LINE__, __FILE__, $sql);
		$hrow = mysql_fetch_array($result);
*/
		$inventoryarray = explode( ',', $uhrow['house_inventory'] );
		$inventoryamount = count( $inventoryarray );

		if ( $floorcell != '' )
		{
			if ( $inventoryarray[$floorcell-1] != '' )
				message_die( GENERAL_MESSAGE, $lang['House_duplicate_cell_use'] );

			$inventory = '';
			for ( $a = 0; $a < $inventoryamount; $a++ )
			{
				if ( $a == ( $floorcell-1 ) )
					{ $inventory .= $floorcellitem . ',';
					$item_add = $floorcellitem . '.gif'; }
				else
					$inventory .= $inventoryarray[$a] . ',';
			}
			$useritems = substr_replace( $uhrow['user_items'], "", strpos( $uhrow['user_items'], "ß" . $floorcellitem . "Þ" ), strlen( "ß" . $floorcellitem . "Þ" ) );
		}
		if ( $wallcell != '' )
		{
			if ( $inventoryarray[$wallcell-1] != '' )
				message_die( GENERAL_MESSAGE, $lang['House_duplicate_cell_use'] );

			$inventory = '';
			for ( $a = 0; $a < $inventoryamount; $a++ )
			{
				if ( $a == ( $wallcell-1 ) )
					{ $inventory .= $wallcellitem . ',';
					$item_add = $wallcellitem . '.gif';}
				else
					$inventory .= $inventoryarray[$a] . ',';
			}
			$useritems = substr_replace( $uhrow['user_items'], "", strpos( $uhrow['user_items'], "ß" . $wallcellitem . "Þ" ), strlen( "ß" . $wallcellitem . "Þ" ) );
		}
		if ( $gardencell != '' )
		{
			if ( $inventoryarray[$gardencell-1] != '' )
				message_die( GENERAL_MESSAGE, $lang['House_duplicate_cell_use'] );

			$inventory = '';
			for ( $a = 0; $a < $inventoryamount; $a++ )
			{
				if ( $a == ( $gardencell-1 ) )
					{ $inventory .= $gardencellitem . ',';
					$item_add = $gardencellitem . '.gif';}
				else
					$inventory .= $inventoryarray[$a] . ',';
			}
			$useritems = substr_replace( $uhrow['user_items'], "", strpos( $uhrow['user_items'], "ß" . $gardencellitem . "Þ" ), strlen( "ß" . $gardencellitem . "Þ" ) );
		}
		if ( $fwcell != '' )
		{
			if ( $inventoryarray[$fwcell-1] != '' )
				message_die( GENERAL_MESSAGE, $lang['House_duplicate_cell_use'] );

			$inventory = '';
			for ( $a = 0; $a < $inventoryamount; $a++ )
			{
				if ( $a == ( $fwcell-1 ) )
					{ $inventory .= $fwcellitem . ',';
					$item_add = $fwcellitem . '.gif';}
				else
					$inventory .= $inventoryarray[$a] . ',';
			}
			$useritems = substr_replace( $uhrow['user_items'], "", strpos( $uhrow['user_items'], "ß" . $fwcellitem . "Þ" ), strlen( "ß" . $fwcellitem . "Þ" ) );
		}

		$sql = "UPDATE " . USER_HOUSE_TABLE . "
				SET house_inventory='$inventory'
				WHERE owner_id='$id'";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_user_houses'] ) : 'Fatal Error Updating User houses!', "", __LINE__, __FILE__, $sql);

   		if ( $board_config['use_adr_shops_in_house'] )
  		{
			// Make a new Item ID for the Item being Added
			$sql = "SELECT item_id FROM " . ADR_SHOPS_ITEMS_TABLE ."
					WHERE item_owner_id='$id'
					ORDER BY item_id
					DESC LIMIT 1";
			$result = $db->sql_query($sql);
			if ( !$result )
				message_die(GENERAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], $lang['House_admin_adr'] ) : 'Fatal Error getting ADR Shop items!', "", __LINE__, __FILE__, $sql);
			$data = $db->sql_fetchrow($result);

			$new_item_id = $data['item_id'] + 1;

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
					VALUES ( $new_item_id , $id , $item_type_use , '$item_name' , '$item_desc' , '" . str_replace("\'", "''", $item_icon) . "' , $item_price , $item_quality , $item_duration , $item_duration_max , $item_power , $item_add_power , $item_mp_use , $item_weight , 0 , $item_element , $item_element_str_dmg , $item_element_same_dmg , $item_element_weak_dmg , $item_max_skill , $item_sell_back_percentage , 1 )";
			if (!$db->sql_query($sql))
				message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_admin_adr_shops'] ) : 'Fatal Error Updating ADR Shops!', "", __LINE__, __FILE__, $sql);
		}
		else
		{
			$sql = "UPDATE " . USERS_TABLE . "
					SET user_items='$useritems'
					WHERE user_id='$id'";
			if ( !($result = $db->sql_query($sql)) )
				message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_user_items'] ) : 'Fatal Error Updating User Items!', "", __LINE__, __FILE__, $sql);
		}

		$template->assign_vars(array(
			'L_HOUSE_ADMIN_TITLE' => $lang['House_admin_edit_houses'],
			'L_HOUSE_ADMIN_TITLE_EXPLAIN' => $lang['House_admin_edit_houses_explain'],
			'L_HOUSE_ADMIN_PAGE_TITLE' => $lang['House_admin_edit_houses'],
			'L_HOUSE_ADMIN_UPDATED' => $lang['House_admin_item_placed'],
			'L_HOUSE_ADMIN_RETURN_MAIN_HOUSE' => $lang['House_admin_return_main_house'],
			'L_HOUSE_ADMIN_RETURN_EDIT_HOUSE' => $lang['House_admin_return_edit_house'],
			'L_HOUSE_ADMIN_EDIT_HOUSE_BUTTON' => $lang['House_admin_edit_house'],
			'L_HOUSE_ADMIN_MAIN' => $lang['House_admin_main'],
			'S_CONFIG_ACTION' => append_sid('admin_house.' . $phpEx),
			'NAME' => $username,
			'NAME_VAR' => 'username',
		));
	}
}
//--------------------------------Edit Userhouse Page END-----------------------------------------

//--------------------------------Shop 1 START-----------------------------------------

if ( $mode == $lang['House_admin_shop_1_name'] )
{
	$upitem = $HTTP_POST_VARS['upitem'];
	$ftype = $HTTP_POST_VARS['ftype'];
	$itemname = $HTTP_POST_VARS['itemname'];

	if ($action == $lang['House_admin_main'])
	{
		$template->assign_block_vars( 'shop_list' , array());

		$sql = "SELECT * FROM " . HOUSE_SETTINGS_TABLE . "
				WHERE var=1";
		if ( !($result = $db->sql_query($sql)) )
				message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_house_configs'] ) : 'Fatal Error Getting House Configs!', "", __LINE__, __FILE__, $sql);
		$crow = mysql_fetch_array($result);

		if ( $board_config['use_adr_shops_in_house'] )
		{
			$sql = "SELECT * from " . ADR_SHOPS_ITEMS_TABLE . "
					WHERE item_store_id='$adr_general[furniture_shop_id]'
					AND item_owner_id = 1";
			if ( !($iresult = $db->sql_query($sql)) )
				message_die( GENERAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], $lang['House_adr'] ) : 'Fatal Error getting ADR Shopitems!', '', __LINE__, __FILE__, $sql);
		}
		else
		{
			$sql = "SELECT * FROM " . SHOPITEMS_TABLE . "
					WHERE shop='$crow[shop_1]'";
			if ( !($iresult = $db->sql_query($sql)) )
				message_die( GENERAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], '' ) : 'Fatal Error getting Shop items!', '', __LINE__, __FILE__, $sql);
		}
		$irow = $db->sql_fetchrowset($iresult);

		$shopitems = '<select name="itemname">';
		if ( $board_config['use_adr_shops_in_house'] )
		{
			for ( $x = 0; $x < count($irow); $x++ )
			{
				$shopitems .= '<option value="' . $irow[$x]['item_icon'] . '">' . ucfirst($irow[$x]['item_name']) . '</option>';
				if ( $irow[$x]['item_type_use'] != 72 && $irow[$x]['item_type_use'] != 73 && $irow[$x]['item_type_use'] != 74 && $irow[$x]['item_type_use'] != 75 )
					$noneitems .= ucfirst($irow[$x]['item_name']) . '<br>';
				if ( $irow[$x]['item_type_use'] == 72 )
					$flooritems .= ucfirst($irow[$x]['item_name']) . '<br>';
				if ( $irow[$x]['item_type_use'] == 73 )
					$wallitems .= ucfirst($irow[$x]['item_name']) . '<br>';
				if ( $irow[$x]['item_type_use'] == 74 )
					$wfitems .= ucfirst($irow[$x]['item_name']) . '<br>';
				if ( $irow[$x]['item_type_use'] == 75 )
					$gardenitems .= ucfirst($irow[$x]['item_name']) . '<br>';
			}
			$shopitems .= '</select>';
			if (is_null($irow[0]['item_name']))
				$shopitems = '<span class="gensmall">' . $lang['House_admin_store_no_items'] . '</span>';
			else
				$shopitems = '<span class="genmed">' . $shopitems . '</span><span class="genmed"><input type="submit" value="' . $lang['House_admin_edit_item'] . '" name="action"></span>';
		}
		else
		{
			for ( $x = 0; $x < count($irow); $x++ )
			{
				$shopitems .= '<option value="' . $irow[$x]['name'] . '">' . ucfirst($irow[$x]['sdesc']) . '</option>';
				if ( $irow[$x]['furniture_type'] == 0 )
					$noneitems .= ucfirst($irow[$x]['sdesc']) . '<br>';
				if ( $irow[$x]['furniture_type'] == 1 )
					$flooritems .= ucfirst($irow[$x]['sdesc']) . '<br>';
				if ( $irow[$x]['furniture_type'] == 2 )
					$wallitems .= ucfirst($irow[$x]['sdesc']) . '<br>';
				if ( $irow[$x]['furniture_type'] == 3 )
					$wfitems .= ucfirst($irow[$x]['sdesc']) . '<br>';
				if ( $irow[$x]['furniture_type'] == 4 )
					$gardenitems .= ucfirst($irow[$x]['sdesc']) . '<br>';
			}
			$shopitems .= '</select>';
			if (is_null($irow[0]['name']))
				$shopitems = '<span class="gensmall">' . $lang['House_admin_store_no_items'] . '</span>';
			else
				$shopitems = '<span class="genmed">' . $shopitems . '</span><span class="genmed"><input type="submit" value="' . $lang['House_admin_edit_item'] . '" name="action"></span>';
		}

		$template->assign_vars(array(
			'L_HOUSE_ADMIN_TITLE' => $lang['House_admin_furniture_types'],
			'L_HOUSE_ADMIN_TITLE_EXPLAIN' => $lang['House_admin_furniture_types_explain'],
			'L_HOUSE_ADMIN_PAGE_TITLE' => sprintf( $lang['House_admin_config_shop_items'], '1' ),
			'L_HOUSE_ADMIN_SHOP' => $lang['House_admin_shop_1_name'],
			'L_HOUSE_ADMIN_SHOP_LIST_WARNING' => $lang['House_admin_shop_list_warning'],
            'L_HOUSE_ADMIN_EDIT_ITEM' => $lang['House_admin_edit_item'],
			'L_HOUSE_ADMIN_NONE_ITEMS' => $lang['House_admin_none_items'] . $noneitems,
			'L_HOUSE_ADMIN_FLOOR_ITEMS' => $lang['House_admin_floor_items'] . $flooritems,
			'L_HOUSE_ADMIN_WALL_ITEMS' => $lang['House_admin_wall_items'] . $wallitems,
			'L_HOUSE_ADMIN_WF_ITEMS' => $lang['House_admin_wf_items'] . $wfitems,
			'L_HOUSE_ADMIN_GARDEN_ITEMS' => $lang['House_admin_garden_items'] . $gardenitems,
			'L_HOUSE_ADMIN_RETURN_MAIN_HOUSE' => $lang['House_admin_return_main_house'],
			'L_HOUSE_ADMIN_EDIT_HOUSE_BUTTON' => $lang['House_admin_edit_house'],
			'L_HOUSE_ADMIN_MAIN' => $lang['House_admin_main'],
			'S_CONFIG_ACTION' => append_sid('admin_house.' . $phpEx),
			'SHOP_ITEMS' => $shopitems,
		));
	}

	if ( $action == $lang['House_admin_edit_item'] )
	{
		$template->assign_block_vars( 'item_edit' , array());
		
		if ( $board_config['use_adr_shops_in_house'] )
		{
	        $itemrow = array();
			$sql = "SELECT * FROM " . ADR_SHOPS_ITEMS_TABLE . "
					WHERE item_icon='$itemname'
					AND item_owner_id = 1";
			if ( !($result = $db->sql_query($sql)) )
				message_die( GENERAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], $lang['House_adr'] ) : 'Fatal Error getting ADR Shopitems!', '', __LINE__, __FILE__, $sql);

			$itemrow = mysql_fetch_array($result);
			$item_icon = $itemrow['item_icon'];
			$item_name = $itemrow['item_name'];
			$item_key = $itemrow['item_icon'];
            $f_type_0 = 0;
            $f_type_1 = 72;
            $f_type_2 = 73;
            $f_type_3 = 74;
            $f_type_4 = 75;
			if ( $irow['item_type_use'] != 72 || $irow['item_type_use'] != 73 || $irow['item_type_use'] != 74 || $irow['item_type_use'] != 75 )
				$type_none = ' CHECKED';
			if ( $itemrow['item_type_use'] == 72 )
				$type_floor = ' CHECKED';
			if ( $itemrow['item_type_use'] == 73 )
				$type_wall = ' CHECKED';
			if ( $itemrow['item_type_use'] == 74 )
				$type_wf = ' CHECKED';
			if ( $itemrow['item_type_use'] == 75 )
				$type_garden = ' CHECKED';
		}
		else
		{
			$sql = "SELECT * FROM " . SHOPITEMS_TABLE . "
					WHERE name='$itemname'";
			if ( !($result = $db->sql_query($sql)) )
				message_die( GENERAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], '' ) : 'Fatal Error getting Shop items!', '', __LINE__, __FILE__, $sql);

	    	$itemrow = mysql_fetch_array($result);
	    	$item_icon = $itemrow['name'] . '.gif';
	    	$item_name = $itemrow['sdesc'];
			$item_key = $itemrow['name'];
            $f_type_0 = 0;
            $f_type_1 = 1;
            $f_type_2 = 2;
            $f_type_3 = 3;
            $f_type_4 = 4;
			if ( $itemrow['furniture_type'] == 0 )
				$type_none = ' CHECKED';
			if ( $itemrow['furniture_type'] == 1 )
				$type_floor = ' CHECKED';
			if ( $itemrow['furniture_type'] == 2 )
				$type_wall = ' CHECKED';
			if ( $itemrow['furniture_type'] == 3 )
				$type_wf = ' CHECKED';
			if ( $itemrow['furniture_type'] == 4 )
				$type_garden = ' CHECKED';
		}
	
		$template->assign_vars(array(
			'L_HOUSE_ADMIN_TITLE' => $lang['House_admin_furniture_types'],
			'L_HOUSE_ADMIN_TITLE_EXPLAIN' => $lang['House_admin_furniture_types_explain'],
			'L_HOUSE_ADMIN_PAGE_TITLE' => sprintf( $lang['House_admin_config_shop_items'], '1' ),
			'L_HOUSE_ADMIN_SHOP' => $lang['House_admin_shop_1_name'],
			'L_HOUSE_ADMIN_SHOP_LIST_WARNING' => $lang['House_admin_shop_list_warning'],
			'L_HOUSE_ADMIN_NONE_ITEM' => $lang['House_admin_not_furniture'],
			'L_HOUSE_ADMIN_FLOOR_ITEM' => $lang['House_admin_floor_item'],
			'L_HOUSE_ADMIN_WALL_ITEM' => $lang['House_admin_wall_item'],
			'L_HOUSE_ADMIN_WF_ITEM' => $lang['House_admin_fw_item'],
			'L_HOUSE_ADMIN_GARDEN_ITEM' => $lang['House_admin_garden_item'],
			'L_HOUSE_ADMIN_RETURN_MAIN_HOUSE' => $lang['House_admin_return_main_house'],
			'L_HOUSE_ADMIN_UPDATE_ITEM' => $lang['House_admin_update_item'],
			'L_HOUSE_ADMIN_MAIN' => $lang['House_admin_main'],
			'S_CONFIG_ACTION' => append_sid('admin_house.' . $phpEx),
			'TYPE_NONE' => $type_none,
			'TYPE_WALL' => $type_wall,
			'TYPE_FLOOR' => $type_floor,
			'TYPE_FW' => $type_wf,
			'TYPE_GARDEN' => $type_garden,
			'ITEM_KEY' => $item_key,
			'ITEM_ICON' => $item_icon,
			'ITEM_NAME' => ucfirst($item_name),
			'F_TYPE_0' => $f_type_0,
			'F_TYPE_1' => $f_type_1,
			'F_TYPE_2' => $f_type_2,
			'F_TYPE_3' => $f_type_3,
			'F_TYPE_4' => $f_type_4,
		));
	}

	if ( $action == $lang['House_admin_update_item'] )
	{
		$template->assign_block_vars( 'update_notification' , array());
		
		if ( $board_config['use_adr_shops_in_house'] )
		{
			$sql2 = "UPDATE " . ADR_SHOPS_ITEMS_TABLE . "
					SET item_type_use=$ftype
					WHERE item_icon='$upitem'";
			if ( !($db->sql_query($sql2)) )
				message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_adr_item'] ) : 'Fatal Error Updating ADR Item!', "", __LINE__, __FILE__, $sql);
		}
		else
		{
			$sql2 = "UPDATE " . SHOPITEMS_TABLE . "
					SET furniture_type=$ftype
					WHERE name='$upitem'";
			if ( !($db->sql_query($sql2)) )
				message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_item'] ) : 'Fatal Error Updating Item!', "", __LINE__, __FILE__, $sql);
		}

		$template->assign_vars(array(
			'L_HOUSE_ADMIN_TITLE' => $lang['House_admin_furniture_types'],
			'L_HOUSE_ADMIN_TITLE_EXPLAIN' => $lang['House_admin_furniture_types_explain'],
        	'L_HOUSE_ADMIN_PAGE_TITLE' => sprintf( $lang['House_admin_config_shop_items'], '1' ),
            'L_HOUSE_ADMIN_UPDATED' => $lang['House_item_updated'],
            'L_HOUSE_ADMIN_RETURN_MAIN_HOUSE' => $lang['House_admin_return_main_house'],
			'L_HOUSE_ADMIN_RETURN_EDIT_HOUSE' => sprintf( $lang['House_admin_return_to_shop'], '1' ),
			'L_HOUSE_ADMIN_EDIT_HOUSE_BUTTON' => $lang['House_admin_shop_1_name'],
			'L_HOUSE_ADMIN_MAIN' => $lang['House_admin_main'],
			'S_CONFIG_ACTION' => append_sid('admin_house.' . $phpEx),
			'NAME' => $lang['House_admin_main'],
			'NAME_VAR' => 'action',
		));
	}
}

//--------------------------------Shop 1 END-----------------------------------------

//--------------------------------Shop 2 START-----------------------------------------

if ( $mode == $lang['House_admin_shop_2_name'] )
{
	$upitem = $HTTP_POST_VARS['upitem'];
	$ftype = $HTTP_POST_VARS['ftype'];
	$itemname = $HTTP_POST_VARS['itemname'];

	if ( $action == $lang['House_admin_main'] )
	{
		$template->assign_block_vars( 'shop_list' , array());

		$sql = "SELECT * FROM " . HOUSE_SETTINGS_TABLE . "
				WHERE var=1";
		if ( !($result = $db->sql_query($sql)) )
				message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_house_configs'] ) : 'Fatal Error Getting House Configs!', "", __LINE__, __FILE__, $sql);
		$crow = mysql_fetch_array($result);

		if ( $board_config['use_adr_shops_in_house'] )
		{
			$sql = "SELECT * FROM " . ADR_SHOPS_ITEMS_TABLE . "
					WHERE item_store_id='$adr_general[garden_shop_id]'
					AND item_owner_id = 1";
			if ( !($iresult = $db->sql_query($sql)) )
				message_die( GENERAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], $lang['House_adr'] ) : 'Fatal Error getting ADR Shopitems!', '', __LINE__, __FILE__, $sql);
		}
		else
		{
			$sql = "SELECT * FROM " . SHOPITEMS_TABLE . "
					WHERE shop='$crow[shop_2]'";
			if ( !($iresult = $db->sql_query($sql)) )
				message_die( GENERAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], '' ) : 'Fatal Error getting Shop items!', '', __LINE__, __FILE__, $sql);
		}
		$irow = $db->sql_fetchrowset($iresult);

		$shopitems = '<select name="itemname">';
		if ( $board_config['use_adr_shops_in_house'] )
		{
			for ($x = 0; $x < mysql_num_rows($iresult); $x++)
			{
				$shopitems .= '<option value="' . $irow[$x]['item_icon'] . '">' . ucfirst($irow[$x]['item_name']) . '</option>';
				if ( $irow[$x]['item_type_use'] != 72 && $irow[$x]['item_type_use'] != 73 && $irow[$x]['item_type_use'] != 74 && $irow[$x]['item_type_use'] != 75 )
					$noneitems .= ucfirst($irow[$x]['item_name']) . '<br>';
				if ( $irow[$x]['item_type_use'] == 72 )
					$flooritems .= ucfirst($irow[$x]['item_name']) . '<br>';
				if ( $irow[$x]['item_type_use'] == 73 )
					$wallitems .= ucfirst($irow[$x]['item_name']) . '<br>';
				if ( $irow[$x]['item_type_use'] == 74 )
					$wfitems .= ucfirst($irow[$x]['item_name']) . '<br>';
				if ( $irow[$x]['item_type_use'] == 75 )
					$gardenitems .= ucfirst($irow[$x]['item_name']) . '<br>';
			}
			$shopitems .= '</select>';
			if (is_null($irow[0]['item_name']))
				$shopitems = '<span class="gensmall">' . $lang['House_admin_store_no_items'] . '</span>';
			else
				$shopitems = '<span class="genmed">' . $shopitems . '</span><span class="genmed"><input type="submit" value="' . $lang['House_admin_edit_item'] . '" name="action"></span>';
		}
		else
		{
			for ( $x = 0; $x < count($irow); $x++ )
			{
				$shopitems .= '<option value="' . $irow[$x]['name'] . '">' . ucfirst($irow[$x]['sdesc']) . '</option>';
				if ( $irow[$x]['furniture_type'] == 0 )
					$noneitems .= ucfirst($irow[$x]['sdesc']) . '<br>';
				if ( $irow[$x]['furniture_type'] == 1 )
					$flooritems .= ucfirst($irow[$x]['sdesc']) . '<br>';
				if ( $irow[$x]['furniture_type'] == 2 )
					$wallitems .= ucfirst($irow[$x]['sdesc']) . '<br>';
				if ( $irow[$x]['furniture_type'] == 3 )
					$wfitems .= ucfirst($irow[$x]['sdesc']) . '<br>';
				if ( $irow[$x]['furniture_type'] == 4 )
					$gardenitems .= ucfirst($irow[$x]['sdesc']) . '<br>';
			}
			$shopitems .= '</select>';
			if (is_null($irow[0]['name']))
				$shopitems = '<span class="gensmall">' . $lang['House_admin_store_no_items'] . '</span>';
			else
				$shopitems = '<span class="genmed">' . $shopitems . '</span><span class="genmed"><input type="submit" value="' . $lang['House_admin_edit_item'] . '" name="action"></span>';
		}

		$template->assign_vars(array(
			'L_HOUSE_ADMIN_TITLE' => $lang['House_admin_furniture_types'],
			'L_HOUSE_ADMIN_TITLE_EXPLAIN' => $lang['House_admin_furniture_types_explain'],
			'L_HOUSE_ADMIN_PAGE_TITLE' => sprintf( $lang['House_admin_config_shop_items'], '2' ),
			'L_HOUSE_ADMIN_SHOP' => $lang['House_admin_shop_2_name'],
			'L_HOUSE_ADMIN_SHOP_LIST_WARNING' => $lang['House_admin_shop_list_warning'],
            'L_HOUSE_ADMIN_EDIT_ITEM' => $lang['House_admin_edit_item'],
			'L_HOUSE_ADMIN_NONE_ITEMS' => $lang['House_admin_none_items'] . $noneitems,
			'L_HOUSE_ADMIN_FLOOR_ITEMS' => $lang['House_admin_floor_items'] . $flooritems,
			'L_HOUSE_ADMIN_WALL_ITEMS' => $lang['House_admin_wall_items'] . $wallitems,
			'L_HOUSE_ADMIN_WF_ITEMS' => $lang['House_admin_wf_items'] . $wfitems,
			'L_HOUSE_ADMIN_GARDEN_ITEMS' => $lang['House_admin_garden_items'] . $gardenitems,
			'L_HOUSE_ADMIN_RETURN_MAIN_HOUSE' => $lang['House_admin_return_main_house'],
			'L_HOUSE_ADMIN_EDIT_HOUSE_BUTTON' => $lang['House_admin_edit_house'],
			'L_HOUSE_ADMIN_MAIN' => $lang['House_admin_main'],
			'S_CONFIG_ACTION' => append_sid('admin_house.' . $phpEx),
			'SHOP_ITEMS' => $shopitems,
		));
	}

	if ( $action == $lang['House_admin_edit_item'] )
	{
		$template->assign_block_vars( 'item_edit' , array());

		if ( $board_config['use_adr_shops_in_house'] )
		{
	        $itemrow = array();
			$sql = "SELECT * FROM " . ADR_SHOPS_ITEMS_TABLE . "
					WHERE item_icon='$itemname'
					AND item_owner_id = 1";
			if ( !($result = $db->sql_query($sql)) )
				message_die( GENERAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], $lang['House_adr'] ) : 'Fatal Error getting ADR Shopitems!', '', __LINE__, __FILE__, $sql);

			$itemrow = mysql_fetch_array($result);
			$item_icon = $itemrow['item_icon'];
			$item_name = $itemrow['item_name'];
			$item_key = $itemrow['item_icon'];
            $f_type_0 = 0;
            $f_type_1 = 72;
            $f_type_2 = 73;
            $f_type_3 = 74;
            $f_type_4 = 75;
			if ( $irow['item_type_use'] != 72 || $irow['item_type_use'] != 73 || $irow['item_type_use'] != 74 || $irow['item_type_use'] != 75 )
				$type_none = ' CHECKED';
			if ( $itemrow['item_type_use'] == 72 )
				$type_floor = ' CHECKED';
			if ( $itemrow['item_type_use'] == 73 )
				$type_wall = ' CHECKED';
			if ( $itemrow['item_type_use'] == 74 )
				$type_wf = ' CHECKED';
			if ( $itemrow['item_type_use'] == 75 )
				$type_garden = ' CHECKED';
		}
		else
		{
			$sql = "SELECT * FROM " . SHOPITEMS_TABLE . "
					WHERE name='$itemname'";
			if ( !($result = $db->sql_query($sql)) )
				message_die( GENERAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], '' ) : 'Fatal Error getting Shop items!', '', __LINE__, __FILE__, $sql);

	    	$itemrow = mysql_fetch_array($result);
	    	$item_icon = $itemrow['name'] . '.gif';
	    	$item_name = $itemrow['sdesc'];
			$item_key = $itemrow['name'];
            $f_type_0 = 0;
            $f_type_1 = 1;
            $f_type_2 = 2;
            $f_type_3 = 3;
            $f_type_4 = 4;
			if ( $itemrow['furniture_type'] == 0 )
				$type_none = ' CHECKED';
			if ( $itemrow['furniture_type'] == 1 )
				$type_floor = ' CHECKED';
			if ( $itemrow['furniture_type'] == 2 )
				$type_wall = ' CHECKED';
			if ( $itemrow['furniture_type'] == 3 )
				$type_wf = ' CHECKED';
			if ( $itemrow['furniture_type'] == 4 )
				$type_garden = ' CHECKED';
		}

		$template->assign_vars(array(
			'L_HOUSE_ADMIN_TITLE' => $lang['House_admin_furniture_types'],
			'L_HOUSE_ADMIN_TITLE_EXPLAIN' => $lang['House_admin_furniture_types_explain'],
			'L_HOUSE_ADMIN_PAGE_TITLE' => sprintf( $lang['House_admin_config_shop_items'], '2' ),
			'L_HOUSE_ADMIN_SHOP' => $lang['House_admin_shop_2_name'],
			'L_HOUSE_ADMIN_SHOP_LIST_WARNING' => $lang['House_admin_shop_list_warning'],
			'L_HOUSE_ADMIN_NONE_ITEM' => $lang['House_admin_not_furniture'],
			'L_HOUSE_ADMIN_FLOOR_ITEM' => $lang['House_admin_floor_item'],
			'L_HOUSE_ADMIN_WALL_ITEM' => $lang['House_admin_wall_item'],
			'L_HOUSE_ADMIN_WF_ITEM' => $lang['House_admin_fw_item'],
			'L_HOUSE_ADMIN_GARDEN_ITEM' => $lang['House_admin_garden_item'],
			'L_HOUSE_ADMIN_RETURN_MAIN_HOUSE' => $lang['House_admin_return_main_house'],
			'L_HOUSE_ADMIN_UPDATE_ITEM' => $lang['House_admin_update_item'],
			'L_HOUSE_ADMIN_MAIN' => $lang['House_admin_main'],
			'S_CONFIG_ACTION' => append_sid('admin_house.' . $phpEx),
			'TYPE_NONE' => $type_none,
			'TYPE_WALL' => $type_wall,
			'TYPE_FLOOR' => $type_floor,
			'TYPE_FW' => $type_wf,
			'TYPE_GARDEN' => $type_garden,
			'ITEM_KEY' => $item_key,
			'ITEM_ICON' => $item_icon,
			'ITEM_NAME' => ucfirst($item_name),
			'F_TYPE_0' => $f_type_0,
			'F_TYPE_1' => $f_type_1,
			'F_TYPE_2' => $f_type_2,
			'F_TYPE_3' => $f_type_3,
			'F_TYPE_4' => $f_type_4,
		));
	}

	if ( $action == $lang['House_admin_update_item'] )
	{
		$template->assign_block_vars( 'update_notification' , array());

		if ( $board_config['use_adr_shops_in_house'] )
		{
			$sql2 = "UPDATE " . ADR_SHOPS_ITEMS_TABLE . "
					SET item_type_use=$ftype
					WHERE item_icon='$upitem'";
			if ( !($db->sql_query($sql2)) )
				message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_adr_item'] ) : 'Fatal Error Updating ADR Item!', "", __LINE__, __FILE__, $sql);
		}
		else
		{
			$sql2 = "UPDATE " . SHOPITEMS_TABLE . "
					SET furniture_type=$ftype
					WHERE name='$upitem'";
			if ( !($db->sql_query($sql2)) )
				message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_item'] ) : 'Fatal Error Updating Item!', "", __LINE__, __FILE__, $sql);
		}

		$template->assign_vars(array(
			'L_HOUSE_ADMIN_TITLE' => $lang['House_admin_furniture_types'],
			'L_HOUSE_ADMIN_TITLE_EXPLAIN' => $lang['House_admin_furniture_types_explain'],
        	'L_HOUSE_ADMIN_PAGE_TITLE' => sprintf( $lang['House_admin_config_shop_items'], '2' ),
            'L_HOUSE_ADMIN_UPDATED' => $lang['House_item_updated'],
            'L_HOUSE_ADMIN_RETURN_MAIN_HOUSE' => $lang['House_admin_return_main_house'],
			'L_HOUSE_ADMIN_RETURN_EDIT_HOUSE' => sprintf( $lang['House_admin_return_to_shop'], '2' ),
			'L_HOUSE_ADMIN_EDIT_HOUSE_BUTTON' => $lang['House_admin_shop_2_name'],
			'L_HOUSE_ADMIN_MAIN' => $lang['House_admin_main'],
			'S_CONFIG_ACTION' => append_sid('admin_house.' . $phpEx),
			'NAME' => $lang['House_admin_main'],
			'NAME_VAR' => 'action',
		));
	}
}

//--------------------------------Shop 2 END-----------------------------------------

//--------------------------------Furniture Cells START-----------------------------------------

if ( $mode == $lang['House_admin_furniture_cells'] )
{
	$thathouse = $HTTP_POST_VARS['thathouse'];
	$edithouse = $HTTP_POST_VARS['edithouse'];

	if ( $action == $lang['House_admin_main'] )
	{
		$template->assign_block_vars( 'furniture_house_select' , array());

		$sql = "SELECT * FROM " . HOUSES_TABLE . "
				ORDER BY house_type";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_house_data'] ) : 'Fatal Error Getting House data!', "", __LINE__, __FILE__, $sql);

		$houses = '<span class="genmed"><select name="edithouse">';
		for ( $x = 0; $x < mysql_num_rows($result); $x++ )
		{
			$houseinfo = mysql_fetch_array($result);
			$houses .= '<option value="' . $houseinfo['house_type'] . '">' . $houseinfo['house_type'] . ' - ' . $houseinfo['house_name'] . '</option>';
		}
		$houses .= '</select>';

		$template->assign_vars(array(
			'L_HOUSE_ADMIN_TITLE' => $lang['House_admin_edit_furniture_cells'],
			'L_HOUSE_ADMIN_TITLE_EXPLAIN' => $lang['House_admin_edit_furniture_cells_explain'],
        	'L_HOUSE_ADMIN_PAGE_TITLE' => $lang['House_admin_edit_furniture_cells'],
            'L_HOUSE_ADMIN_EDIT_FURNITURE_CELLS_HOUSE' => $lang['House_admin_edit_furniture_cells_house'],
            'L_HOUSE_ADMIN_RETURN_MAIN_HOUSE' => $lang['House_admin_return_main_house'],
			'L_HOUSE_ADMIN_FURNITURE_CELLS' => $lang['House_admin_furniture_cells'],
			'L_HOUSE_ADMIN_FURNITURE_CELLS_2' => $lang['House_admin_edit_furniture_cells_2'],
			'L_HOUSE_ADMIN_MAIN' => $lang['House_admin_main'],
			'L_HOUSE_ADMIN_EDIT_HOUSE_BUTTON' => $lang['House_admin_edit_house_button'],
			'S_CONFIG_ACTION' => append_sid('admin_house.' . $phpEx),
			'HOUSES' => $houses,
		));
	}
	if ( $action == $lang['House_admin_edit_house_button'] )
	{
		$template->assign_block_vars( 'furniture_cells' , array());

		$sql = "SELECT * FROM " . HOUSES_TABLE . "
				WHERE house_type=$edithouse";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_house_data'] ) : 'Fatal Error Getting House data!', "", __LINE__, __FILE__, $sql);
		$hrow = mysql_fetch_array($result);

		$house = $hrow['house_bg'];
		$housefront = $hrow['house_front'];
		$hwidth = $hrow['house_width'];
		$hcellsh = $hrow['house_cellwidth'] - 2;
		$hcellshn = $hrow['house_cellwidthnumber'];
		$hheight = $hrow['house_height'];
		$hcellsv = $hrow['house_cellheight'] - 2;
		$hcellsvn = $hrow['house_cellheightnumber'];
		$currentfw = explode( "," , $hrow['house_fw']);
		$currentgarden = explode( "," , $hrow['house_garden']);
		$currentwall = explode( "," , $hrow['house_wall']);
		$currentfloor = explode( "," , $hrow['house_floor']);

		$cn = 1;
		for ( $sv = 1; $sv <= $hcellsvn; $sv++ )
		{
			$cell_images .= '<tr>';
			for ( $sh = 1; $sh <= $hcellshn; $sh++ )
			{
				if ( in_array( $cn,$currentfloor ) )
					$cell_images .= '<td width="' . $hcellsh . 'px" height="' . $hcellsv . 'px"><img src="../images/house/floor.gif" width="' . $hcellsh . 'px" height="' . $hcellsv . 'px" border="0" title="' . $lang['House_cell'] . ' - ' . $cn . '" alt="' . $lang['House_cell'] . ' - ' . $cn . '"></td>';
				else if (in_array($cn,$currentwall))
					$cell_images .= '<td width="' . $hcellsh . 'px" height="' . $hcellsv . 'px"><img src="../images/house/wall.gif" width="' . $hcellsh . 'px" height="' . $hcellsv . 'px" border="0" title="' . $lang['House_cell'] . ' - ' . $cn . '" alt="' . $lang['House_cell'] . ' - ' . $cn . '"></td>';
				else if (in_array($cn,$currentfw))
					$cell_images .= '<td width="' . $hcellsh . 'px" height="' . $hcellsv . 'px"><img src="../images/house/fw.gif" width="' . $hcellsh . 'px" height="' . $hcellsv . 'px" border="0" title="' . $lang['House_cell'] . ' - ' . $cn . '" alt="' . $lang['House_cell'] . ' - ' . $cn . '"></td>';
				else if (in_array($cn,$currentgarden))
					$cell_images .= '<td width="' . $hcellsh . 'px" height="' . $hcellsv . 'px"><img src="../images/house/garden.gif" width="' . $hcellsh . 'px" height="' . $hcellsv . 'px" border="0" title="' . $lang['House_cell'] . ' - ' . $cn . '" alt="' . $lang['House_cell'] . ' - ' . $cn . '"></td>';
				else
					$cell_images .= '<td width="' . $hcellsh . 'px" height="' . $hcellsv . 'px"><img src="../images/house/garden.gif" width="' . $hcellsh . 'px" height="' . $hcellsv . 'px" border="0" title="' . $lang['House_cell'] . ' - ' . $cn . '" alt="' . $lang['House_cell'] . ' - ' . $cn . '"></td>';
				$cn++;
			}
			$cell_images .= '</tr>';
		}

		$cellamount = $hcellshn * $hcellsvn;

		// floor cells
		$floor_cell_list = create_house_multiple_list( 'floorcells[]', $hrow['house_floor'], $cellamount, $currentfloor );

		// wall cells
		$wall_cell_list = create_house_multiple_list( 'wallcells[]', $hrow['house_wall'], $cellamount, $currentwall );

		// fw cells
		$fw_cell_list = create_house_multiple_list( 'fwcells[]', $hrow['house_fw'], $cellamount, $currentfw );

		// garden cells
		$garden_cell_list = create_house_multiple_list( 'gardencells[]', $hrow['house_garden'], $cellamount, $currentgarden );

		$template->assign_vars(array(
			'L_HOUSE_ADMIN_TITLE' => $lang['House_admin_edit_furniture_cells'],
			'L_HOUSE_ADMIN_TITLE_EXPLAIN' => $lang['House_admin_edit_furniture_cells_explain'],
        	'L_HOUSE_ADMIN_PAGE_TITLE' => $lang['House_admin_edit_furniture_cells'],
            'L_HOUSE_ADMIN_EDIT_FURNITURE_CELLS_HOUSE' => $lang['House_admin_edit_furniture_cells_house'],
            'L_HOUSE_ADMIN_RETURN_MAIN_HOUSE' => $lang['House_admin_return_main_house'],
			'L_HOUSE_ADMIN_FURNITURE_CELLS' => $lang['House_admin_furniture_cells'],
			'L_HOUSE_ADMIN_FURNITURE_CELLS_2' => $lang['House_admin_edit_furniture_cells_2'],
			'L_HOUSE_ADMIN_MAIN' => $lang['House_admin_main'],
			'L_HOUSE_ADMIN_EDIT_HOUSE_BUTTON' => $lang['House_admin_edit_house_button'],
			'L_HOUSE_ADMIN_EDIT_FURNITURE_CELLS' => sprintf( $lang['House_admin_edit_funiture_cells'], $hrow['house_type'], $hrow['house_name'] ),
			'L_HOUSE_ADMIN_INTERIOR_IMAGE' => $lang['House_admin_interior_image'],
			'L_HOUSE_ADMIN_EXTERIOR_IMAGE' => $lang['House_admin_exterior_image'],
			'L_HOUSE_ADMIN_DEFINE_FLOOR_CELLS' => $lang['House_admin_define_floor_cells'],
			'L_HOUSE_ADMIN_DEFINE_WALL_CELLS' => $lang['House_admin_define_wall_cells'],
			'L_HOUSE_ADMIN_DEFINE_FW_CELLS' => $lang['House_admin_define_fw_cells'],
			'L_HOUSE_ADMIN_DEFINE_GARDEN_CELLS' => $lang['House_admin_define_garden_cells'],
			'L_HOUSE_ADMIN_MULTIPLE_SELECTIONS' => $lang['House_admin_multiple_selections'],
			'L_HOUSE_ADMIN_UPDATE_CELLS' => $lang['House_admin_update_cells'],
			'S_CONFIG_ACTION' => append_sid('admin_house.' . $phpEx),
			'EDIT_HOUSE' => $edithouse,
			'HOUSE' => $house,
			'HOUSE_WIDTH' => $hwidth,
			'HOUSE_HEIGHT' => $hheight,
			'CELL_IMAGES' => $cell_images,
			'HOUSE_FRONT' => $housefront,
			'FLOOR_CELL_LIST' => $floor_cell_list,
			'WALL_CELL_LIST' => $wall_cell_list,
			'FW_CELL_LIST' => $fw_cell_list,
			'GARDEN_CELL_LIST' => $garden_cell_list,
			'HOUSE_NAME' => $hrow['house_name'],
		));
	}
	if ( $action == $lang['House_admin_update_cells'] )
	{
		$floorcount = count($floorcells);
		$wallcount = count($wallcells);
		$fwcount = count($fwcells);
		$gardencount = count($gardencells);
		$floorfield = '';
		$wallfield = '';
		$fwfield = '';
		$gardenfield = '';
		if ( ( in_array( '', $floorcells ) ) && ( $floorcount > 1) )
			message_die( GENERAL_MESSAGE, $lang['House_admin_cells_and_none'] );
		if ( ( in_array( '', $wallcells ) ) && ( $wallcount > 1) )
			message_die( GENERAL_MESSAGE, $lang['House_admin_cells_and_none'] );
		if ( (in_array( '', $fwcells ) ) && ( $fwcount > 1) )
			message_die( GENERAL_MESSAGE, $lang['House_admin_cells_and_none'] );
		if ( ( in_array( '', $gardencells ) ) && ( $gardencount > 1) )
			message_die( GENERAL_MESSAGE, $lang['House_admin_cells_and_none'] );
		for ( $ta = 0; $ta < $floorcount; $ta++ )
		{
			if ( ( in_array( $floorcells[$ta], $wallcells ) ) && ( !( in_array( '', $floorcells ) ) ) && ( !( in_array( '', $wallcells ) ) ) )
				message_die( GENERAL_MESSAGE, $lang['House_admin_multiple_definitions'] );
			if ( ( in_array( $floorcells[$ta], $fwcells ) ) && ( !( in_array( '', $floorcells) ) ) && ( !( in_array(' ', $fwcells ) ) ) )
				message_die( GENERAL_MESSAGE, $lang['House_admin_multiple_definitions'] );
			if ( (in_array( $floorcells[$ta], $gardencells ) ) && ( !( in_array( '', $floorcells ) ) ) && ( !( in_array( '', $gardencells ) ) ) )
				message_die( GENERAL_MESSAGE, $lang['House_admin_multiple_definitions'] );
		}
		for ( $tb = 0; $tb < $floorcount; $tb++ )
		{
			if ( ( in_array( $wallcells[$ta], $fwcells ) ) && ( !( in_array( '', $floorcells ) ) ) && ( !( in_array( '', $fwcells ) ) ) )
				message_die( GENERAL_MESSAGE, $lang['House_admin_multiple_definitions'] );
			if ( ( in_array( $wallcells[$ta], $gardencells ) ) && ( !( in_array( '', $floorcells ) ) ) && ( !(in_array( '', $gardencells ) ) ) )
				message_die( GENERAL_MESSAGE, $lang['House_admin_multiple_definitions'] );
		}
		for ($tb = 0; $tb < $floorcount; $tb++)
		{
			if ( ( in_array( $fwcells[$ta], $gardencells ) ) && ( !( in_array( '', $floorcells )) ) && ( !(in_array( '', $gardencells ) ) ) )
				message_die( GENERAL_MESSAGE, $lang['House_admin_multiple_definitions'] );
		}

		if ( !(in_array( '', $floorcells ) ) )
			for ( $a = 0; $a < $floorcount; $a++ )
				$floorfield .= ',' . $floorcells[$a];
		if ( !( in_array( '', $wallcells ) ) )
			for ( $b = 0; $b < $wallcount; $b++ )
				$wallfield .= ',' . $wallcells[$b];
		if ( !( in_array( '',$fwcells ) ) )
			for ( $c = 0; $c < $fwcount; $c++ )
				$fwfield .= ',' . $fwcells[$c];
		if ( !(in_array( '', $gardencells ) ) )
			for ( $d = 0; $d < $gardencount; $d++ )
				$gardenfield .= ','.$gardencells[$d];

		$sql2 = "UPDATE " . HOUSES_TABLE . "
				SET house_floor='$floorfield',
					house_wall='$wallfield',
					house_fw='$fwfield',
					house_garden='$gardenfield'
				WHERE house_type=$thathouse";
		if ( !($db->sql_query($sql2)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_item'] ) : 'Fatal Error Updating Item!', "", __LINE__, __FILE__, $sql);

		$message = sprintf( $lang['House_admin_cells_updated'] . sprintf( $lang['House_admin_return_message'], '<a href="'.append_sid("admin_house.".$phpEx).'">', '<a href="'.append_sid("index.".$phpEx."?pane=right").'">'));
		message_die(GENERAL_MESSAGE, $message);
	}
}
//--------------------------------Furniture Cells END-----------------------------------------

//--------------------------------House Settings START-----------------------------------------
if ( $mode == $lang['House_admin_settings'] )
{
	$houseenable = $HTTP_POST_VARS['houseenable'];
	$shop1 = $HTTP_POST_VARS['shop1'];
	$shop2 = $HTTP_POST_VARS['shop2'];
	$sellvalue = $HTTP_POST_VARS['sellvalue'];
	$edithouse = $HTTP_POST_VARS['edithouse'];
	$home_title = $HTTP_POST_VARS['home_title'];
	$column_display = $HTTP_POST_VARS['column_display'];
	$row_display = $HTTP_POST_VARS['row_display'];
	$adr_house_enable = $HTTP_POST_VARS['adr_house_enable'];

	if ( $action == $lang['House_admin_main'] )
	{
		$template->assign_block_vars( 'house_settings' , array());

		$sql = "SELECT * from " . HOUSE_SETTINGS_TABLE . "
				WHERE var='1'";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_house_configs'] ) : 'Fatal Error Getting House Configs!', "", __LINE__, __FILE__, $sql);
		$row = mysql_fetch_array($result);

		if ($row['enabled'] == '1') {$enableON = ' CHECKED';}
		if ($row['enabled'] == '0') {$enableOFF = ' CHECKED';}

		if ($board_config['house_use_in_adr'] == '1') {$adr_enable_on = ' CHECKED';}
		if ($board_config['house_use_in_adr'] == '0') {$adr_enable_off = ' CHECKED';}

		$template->assign_vars(array(
			'L_HOUSE_ADMIN_TITLE' => $lang['House_admin_edit_house_config'],
			'L_HOUSE_ADMIN_TITLE_EXPLAIN' => $lang['House_admin_edit_house_config_explain'],
        	'L_HOUSE_ADMIN_PAGE_TITLE' => $lang['House_admin_edit_house_config'],
            'L_HOUSE_ADMIN_HOUSE_SETTINGS' => $lang['House_admin_settings'],
            'L_HOUSE_ADMIN_RETURN_MAIN_HOUSE' => $lang['House_admin_return_main_house'],
			'L_HOUSE_ADMIN_EDIT_HOUSE_CONFIG' => $lang['House_admin_edit_house_config'],
			'L_HOUSE_ADMIN_UPDATE' => $lang['House_admin_house_update'],
			'L_HOUSE_ADMIN_MAIN' => $lang['House_admin_main'],
			'L_HOUSE_ADMIN_EDIT_HOUSE_BUTTON' => $lang['House_admin_edit_house_button'],
			'L_HOUSE_ADMIN_ENABLED' => $lang['House_admin_house_enabled'],
			'L_HOUSE_ADMIN_ENABLED_EXPLAIN' => $lang['House_admin_house_enabled_explain'],
			'L_HOUSE_ADMIN_DISABLED' => $lang['House_admin_house_disabled'],
			'L_HOUSE_ADMIN_HOME_TITLE' => $lang['House_admin_home_title'],
			'L_HOUSE_ADMIN_HOME_TITLE_EXPLAIN' => $lang['House_admin_home_title_explain'],
			'L_HOUSE_ADMIN_FIRST_SHOP' => $lang['House_admin_first_shop'],
			'L_HOUSE_ADMIN_FIRST_SHOP_EXPLAIN' => $lang['House_admin_first_shop_explain'],
			'L_HOUSE_ADMIN_SECOND_SHOP' => $lang['House_admin_second_shop'],
			'L_HOUSE_ADMIN_SECOND_SHOP_EXPLAIN' => $lang['House_admin_second_shop_explain'],
			'L_HOUSE_ADMIN_SHOPNAME' => $lang['House_admin_shopname'],
			'L_HOUSE_ADMIN_SELL_VALUE' => $lang['House_admin_sell_value'],
			'L_HOUSE_ADMIN_SELL_VALUE_EXPLAIN' => $lang['House_admin_sell_value_explain'],
			'L_HOUSE_ADMIN_UPDATE_SETTINGS' => $lang['House_admin_update_settings'],
			'L_HOUSE_ADMIN_DISPLAY_COLUMN' => $lang['House_admin_house_display_column'],
			'L_HOUSE_ADMIN_DISPLAY_COLUMN_EXPLAIN' => $lang['House_admin_house_display_column_explain'],
			'L_HOUSE_ADMIN_DISPLAY_ROW' => $lang['House_admin_house_display_row'],
			'L_HOUSE_ADMIN_DISPLAY_ROW_EXPLAIN' => $lang['House_admin_house_display_row_explain'],
			'L_HOUSE_ADMIN_ROWS' => $lang['House_admin_rows'],
			'L_HOUSE_ADMIN_COLUMNS' => $lang['House_admin_columns'],
			'L_HOUSE_ADMIN_HOUSE_IN_ADR' => $lang['House_admin_house_in_adr'],
			'L_HOUSE_ADMIN_HOUSE_IN_ADR_EXPLAIN' => $lang['House_admin_house_in_adr_explain'],

			'S_CONFIG_ACTION' => append_sid('admin_house.' . $phpEx),
			'ENABLED_ON' => $enableON,
			'ENABLED_OFF' => $enableOFF,
			'HOME_TITLE_NAME' => $row['home_title'],
			'FIRST_SHOP_NAME' => $row['shop_1'],
			'SECOND_SHOP_NAME' => $row['shop_2'],
			'COLUMN_DISPLAY' => $row['column_display'],
			'ROW_DISPLAY' => $row['row_display'],
			'SELL_VALUE' => $row['sell'],
			'ADR_ENABLED_ON' => $adr_enable_on,
			'ADR_ENABLED_OFF' => $adr_enable_off,
		));
	}

	if ( $action == $lang['House_admin_house_update'] )
	{
		$template->assign_block_vars( 'update_notification' , array());

		//update db
		$sql2 = "UPDATE " . HOUSE_SETTINGS_TABLE . "
				SET enabled='$houseenable',
				    home_title='$home_title',
					shop_1='$shop1',
					shop_2='$shop2',
					column_display='$column_display',
					row_display='$row_display',
					sell='$sellvalue'
				WHERE var='1'";
		if ( !($db->sql_query($sql2)) )
			message_die( GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_house_configs'] ) : 'Fatal Error Updating House Configs!', "", __LINE__, __FILE__, $sql);

		// update ADR Enable variable
		$sql = "UPDATE ". CONFIG_TABLE . "
				SET config_value = '$adr_house_enable'
				WHERE config_name = 'house_use_in_adr' ";
		if ( !($result = $db->sql_query($sql)) )
			message_die( GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_config_settings'] ) : 'Fatal Error Updating Configuration Settings!', "", __LINE__, __FILE__, $sql);

		$template->assign_vars(array(
			'L_HOUSE_ADMIN_TITLE' => $lang['House_admin_edit_house_config'],
			'L_HOUSE_ADMIN_TITLE_EXPLAIN' => $lang['House_admin_edit_house_config_explain'],
        	'L_HOUSE_ADMIN_PAGE_TITLE' => $lang['House_admin_edit_house_config'],
            'L_HOUSE_ADMIN_UPDATED' => $lang['House_admin_house_config_updated'],
            'L_HOUSE_ADMIN_RETURN_MAIN_HOUSE' => $lang['House_admin_return_main_house'],
			'L_HOUSE_ADMIN_RETURN_EDIT_HOUSE' => $lang['House_admin_return_house_config'],
			'L_HOUSE_ADMIN_EDIT_HOUSE_BUTTON' => $lang['House_admin_settings'],
			'L_HOUSE_ADMIN_MAIN' => $lang['House_admin_main'],
			'S_CONFIG_ACTION' => append_sid('admin_house.' . $phpEx),
		));
	}
}
//--------------------------------House Settings END-----------------------------------------

//--------------------------------House Editor START-----------------------------------------
if ( $mode == $lang['House_admin_types'] )
{
	$housetype = $HTTP_POST_VARS['housetype'];
	$housename = $HTTP_POST_VARS['housename'];
	$housespecial = $HTTP_POST_VARS['housespecial'];
	$houseprize = $HTTP_POST_VARS['houseprize'];
	$housewidth = $HTTP_POST_VARS['housewidth'];
	$housecellwidth = $HTTP_POST_VARS['housecellwidth'];
	$housecellwidthnumber = $HTTP_POST_VARS['housecellwidthnumber'];
	$househeight = $HTTP_POST_VARS['househeight'];
	$housecellheight = $HTTP_POST_VARS['housecellheight'];
	$housecellheightnumber = $HTTP_POST_VARS['housecellheightnumber'];
	$origtype = $HTTP_POST_VARS['origtype'];
	$edithouse = $HTTP_POST_VARS['edithouse'];

	if ( $action == $lang['House_admin_main'] )
	{
		$template->assign_block_vars( 'house_types' , array());

		// Make a new House Type ID for House Types
		$sql = "SELECT house_type FROM " . HOUSES_TABLE ."
				ORDER BY house_type
				DESC LIMIT 1";
		$result = $db->sql_query($sql);
		if ( !$result )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_user_houses'] ) : 'Fatal Error Getting User houses!', "", __LINE__, __FILE__, $sql);
		$data = $db->sql_fetchrow($result);
		$new_house_type_id = $data['house_type'] + 1 ;

		$houses = create_house_type_list( 'edithouse' );

		$template->assign_vars(array(
			'L_HOUSE_ADMIN_TITLE' => $lang['House_admin_edit_house_types'],
			'L_HOUSE_ADMIN_TITLE_EXPLAIN' => $lang['House_admin_edit_house_types_explain'],
        	'L_HOUSE_ADMIN_PAGE_TITLE' => $lang['House_admin_edit_house_types'],
            'L_HOUSE_ADMIN_TYPES' => $lang['House_admin_types'],
            'L_HOUSE_ADMIN_RETURN_MAIN_HOUSE' => $lang['House_admin_return_main_house'],
			'L_HOUSE_ADMIN_EDIT_EXISTING_HOUSE' => $lang['House_admin_edit_existing_house'],
			'L_HOUSE_ADMIN_ADD_NEW_HOUSE' => $lang['House_admin_add_new_house'],
			'L_HOUSE_ADMIN_MAIN' => $lang['House_admin_main'],
			'L_HOUSE_ADMIN_EDIT_HOUSE_BUTTON' => $lang['House_admin_edit_house_button'],
			'L_HOUSE_ADMIN_HOUSE_ID' => $lang['House_admin_house_id'],
			'L_HOUSE_ADMIN_HOUSE_ID_EXPLAIN' => $lang['House_admin_house_id_explain'],
			'L_HOUSE_ADMIN_SPECIAL_HOUSE' => $lang['House_admin_special_house'],
			'L_HOUSE_ADMIN_SPECIAL_HOUSE_EXPLAIN' => $lang['House_admin_special_house_explain'],
			'L_HOUSE_ADMIN_YES' => $lang['House_yes'],
			'L_HOUSE_ADMIN_NO' => $lang['House_no'],
			'L_HOUSE_ADMIN_HOUSE_NAME' => $lang['House_admin_house_name'],
			'L_HOUSE_ADMIN_HOUSE_NAME_EXPLAIN' => $lang['House_admin_house_name_explain'],
			'L_HOUSE_ADMIN_HOUSE_FRONT_IMAGE' => $lang['House_front_image'],
			'L_HOUSE_ADMIN_HOUSE_FRONT_IMAGE_EXPLAIN' => $lang['House_admin_house_front_image_explain'],
			'L_HOUSE_ADMIN_HOUSE_BACKGROUND_IMAGE' => $lang['House_admin_house_background_image'],
			'L_HOUSE_ADMIN_HOUSE_BACKGROUND_IMAGE_EXPLAIN' => $lang['House_admin_house_background_image_explain'],
			'L_HOUSE_ADMIN_HOUSE_PRIZE' => $lang['House_admin_house_prize'],
			'L_HOUSE_ADMIN_HOUSE_PRIZE_EXPLAIN' => $lang['House_admin_house_prize_explain'],
			'L_HOUSE_ADMIN_HOUSE_WIDTH' => $lang['House_admin_house_width'],
			'L_HOUSE_ADMIN_HOUSE_WIDTH_EXPLAIN' => $lang['House_admin_house_width_explain'],
			'L_HOUSE_ADMIN_HOUSE_CELL_WIDTH' => $lang['House_admin_house_cell_width'],
			'L_HOUSE_ADMIN_HOUSE_CELL_WIDTH_EXPLAIN' => $lang['House_admin_house_cell_width_explain'],
			'L_HOUSE_ADMIN_HOUSE_CELL_WIDTH_AMOUNT' => $lang['House_admin_house_cell_width_amount'],
			'L_HOUSE_ADMIN_HOUSE_CELL_WIDTH_AMOUNT_EXPLAIN' => $lang['House_admin_house_cell_width_amount_explain'],
			'L_HOUSE_ADMIN_HOUSE_HEIGHT' => $lang['House_admin_house_height'],
			'L_HOUSE_ADMIN_HOUSE_HEIGHT_EXPLAIN' => $lang['House_admin_house_height_explain'],
			'L_HOUSE_ADMIN_HOUSE_CELL_HEIGHT' => $lang['House_admin_house_cell_height'],
			'L_HOUSE_ADMIN_HOUSE_CELL_HEIGHT_EXPLAIN' => $lang['House_admin_house_cell_height_explain'],
			'L_HOUSE_ADMIN_HOUSE_CELL_HEIGHT_AMOUNT' => $lang['House_admin_house_cell_height_amount'],
			'L_HOUSE_ADMIN_HOUSE_CELL_HEIGHT_AMOUNT_EXPLAIN' => $lang['House_admin_house_cell_height_amount_explain'],
			'L_HOUSE_ADMIN_ADD_HOUSE' => $lang['House_admin_add_house'],
			'S_CONFIG_ACTION' => append_sid('admin_house.' . $phpEx),
			'HOUSE_TYPE_LIST' => $houses,
			'NEW_HOUSE_TYPE_ID' => $new_house_type_id,
		));
	}

	if ( $action == $lang['House_admin_add_house'] )
	{
		$template->assign_block_vars( 'update_notification' , array());

		//check they've filled the textfields!
		if ( ( $housename == '' ) || ( $housefront == '' ) || ( $housebg == '' ) )
			message_die( GENERAL_MESSAGE, $lang['House_admin_empty_text_fields'] );

		//check if the number fields are numeric
		if ( ( !is_numeric( $houseprize ) ) || ( !is_numeric( $housewidth ) ) || ( !is_numeric( $housecellwidth ) ) || ( !is_numeric( $housecellwidthnumber ) ) || ( !is_numeric( $househeight ) ) || ( !is_numeric( $housecellheight ) ) || ( !is_numeric( $housecellheightnumber ) ) || ( !is_numeric( $housetype ) ) )
			message_die( GENERAL_MESSAGE, $lang['House_admin_fields_not_numeric'] );

		if ( $housetype <= 0 )
			message_die( GENERAL_MESSAGE, $lang['House_admin_house_id_zero'] );

		// check if numbers fit
		// $testwidth = $housecellwidth * $housecellwidthnumber;
		// if ($testwidth != $housewidth) { message_die(GENERAL_MESSAGE,'The width of the cells and their number doesnt fit the background!<P>Please go back and try again');}
		// $testheight = $housecellheight * $housecellheightnumber;
		// if ($testheight != $househeight) { message_die(GENERAL_MESSAGE,'The height of the cells and their number doesnt fit the background!<P>Please go back and try again');}

		//Check that the house type doesn't already exist!
		$sql = "SELECT house_type FROM " . HOUSES_TABLE . "
				WHERE house_type='$housetype'";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_admin_type'] ) : 'Fatal Error Getting House Type!', "", __LINE__, __FILE__, $sql);
		$existinghousetype = mysql_fetch_array($result);

		if ( $housetype == $existinghousetype['house_type'] )
			message_die( GENERAL_MESSAGE, $lang['House_admin_house_type_exists'] );

		//update house table
		$sql2 = "INSERT INTO " . HOUSES_TABLE . "
				(house_type, house_name, house_front, house_bg, house_prize, house_width, house_cellwidth, house_cellwidthnumber, house_height, house_cellheight, house_cellheightnumber, house_special )
				VALUES ($housetype, '$housename', '$housefront', '$housebg', $houseprize, $housewidth, $housecellwidth, $housecellwidthnumber, $househeight, $housecellheight, $housecellheightnumber, $housespecial )";
		if ( !($db->sql_query($sql2)) )
				message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_admin_type'] ) : 'Fatal Error Updating House Type!', "", __LINE__, __FILE__, $sql);

		$template->assign_vars(array(
			'L_HOUSE_ADMIN_TITLE' => $lang['House_admin_edit_house_types'],
			'L_HOUSE_ADMIN_TITLE_EXPLAIN' => $lang['House_admin_edit_house_types_explain'],
        	'L_HOUSE_ADMIN_PAGE_TITLE' => $lang['House_admin_edit_house_types'],
            'L_HOUSE_ADMIN_UPDATED' => $lang['House_admin_new_house_added'],
            'L_HOUSE_ADMIN_RETURN_MAIN_HOUSE' => $lang['House_admin_return_main_house'],
			'L_HOUSE_ADMIN_RETURN_EDIT_HOUSE' => $lang['House_admin_return_house_type'],
			'L_HOUSE_ADMIN_EDIT_HOUSE_BUTTON' => $lang['House_admin_types'],
			'L_HOUSE_ADMIN_MAIN' => $lang['House_admin_main'],
			'S_CONFIG_ACTION' => append_sid('admin_house.' . $phpEx),
			'NAME' => $lang['House_admin_main'],
			'NAME_VAR' => 'action',
		));
	}

	if ( $action == $lang['House_admin_edit_house_button'] )
	{
		$template->assign_block_vars( 'house_edit' , array());

		//get info for class being edited
		$sql = "SELECT * FROM " . HOUSES_TABLE . "
				WHERE house_type=$edithouse";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_house_data'] ) : 'Fatal Error Getting House data!', "", __LINE__, __FILE__, $sql);
		$row = mysql_fetch_array($result);

		//check if its a special house
		if ($row['house_special'] == 0) {$NOTspecial = ' CHECKED';}
		if ($row['house_special'] == 1) {$ISspecial = ' CHECKED';}

		$template->assign_vars(array(
			'L_HOUSE_ADMIN_TITLE' => $lang['House_admin_edit_house_types'],
			'L_HOUSE_ADMIN_TITLE_EXPLAIN' => $lang['House_admin_edit_house_types_explain'],
        	'L_HOUSE_ADMIN_PAGE_TITLE' => $lang['House_admin_edit_house_types'],
            'L_HOUSE_ADMIN_UPDATED' => $lang['House_admin_new_house_added'],
            'L_HOUSE_ADMIN_RETURN_MAIN_HOUSE' => $lang['House_admin_return_main_house'],
			'L_HOUSE_ADMIN_EDITING_HOUSE' => sprintf( $lang['House_admin_editing_house'], $row['house_type'], $row['house_name'] ),
			'L_HOUSE_ADMIN_EDITING_HOUSE_EXPLAIN' => $lang['House_admin_editing_house_explain'],
			'L_HOUSE_ADMIN_HOUSE_ID' => $lang['House_admin_house_id'],
			'L_HOUSE_ADMIN_HOUSE_ID_EXPLAIN' => $lang['House_admin_house_id_explain'],
			'L_HOUSE_ADMIN_SPECIAL_HOUSE' => $lang['House_admin_special_house'],
			'L_HOUSE_ADMIN_SPECIAL_HOUSE_EXPLAIN' => $lang['House_admin_special_house_explain'],
			'L_HOUSE_ADMIN_YES' => $lang['House_yes'],
			'L_HOUSE_ADMIN_NO' => $lang['House_no'],
			'L_HOUSE_ADMIN_HOUSE_NAME' => $lang['House_admin_house_name'],
			'L_HOUSE_ADMIN_HOUSE_NAME_EXPLAIN' => $lang['House_admin_house_name_explain'],
			'L_HOUSE_ADMIN_HOUSE_FRONT_IMAGE' => $lang['House_front_image'],
			'L_HOUSE_ADMIN_HOUSE_FRONT_IMAGE_EXPLAIN' => $lang['House_admin_house_front_image_explain'],
			'L_HOUSE_ADMIN_HOUSE_BACKGROUND_IMAGE' => $lang['House_admin_house_background_image'],
			'L_HOUSE_ADMIN_HOUSE_BACKGROUND_IMAGE_EXPLAIN' => $lang['House_admin_house_background_image_explain'],
			'L_HOUSE_ADMIN_HOUSE_PRIZE' => $lang['House_admin_house_prize'],
			'L_HOUSE_ADMIN_HOUSE_PRIZE_EXPLAIN' => $lang['House_admin_house_prize_explain'],
			'L_HOUSE_ADMIN_HOUSE_WIDTH' => $lang['House_admin_house_width'],
			'L_HOUSE_ADMIN_HOUSE_WIDTH_EXPLAIN' => $lang['House_admin_house_width_explain'],
			'L_HOUSE_ADMIN_HOUSE_CELL_WIDTH' => $lang['House_admin_house_cell_width'],
			'L_HOUSE_ADMIN_HOUSE_CELL_WIDTH_EXPLAIN' => $lang['House_admin_house_cell_width_explain'],
			'L_HOUSE_ADMIN_HOUSE_CELL_WIDTH_AMOUNT' => $lang['House_admin_house_cell_width_amount'],
			'L_HOUSE_ADMIN_HOUSE_CELL_WIDTH_AMOUNT_EXPLAIN' => $lang['House_admin_house_cell_width_amount_explain'],
			'L_HOUSE_ADMIN_HOUSE_HEIGHT' => $lang['House_admin_house_height'],
			'L_HOUSE_ADMIN_HOUSE_HEIGHT_EXPLAIN' => $lang['House_admin_house_height_explain'],
			'L_HOUSE_ADMIN_HOUSE_CELL_HEIGHT' => $lang['House_admin_house_cell_height'],
			'L_HOUSE_ADMIN_HOUSE_CELL_HEIGHT_EXPLAIN' => $lang['House_admin_house_cell_height_explain'],
			'L_HOUSE_ADMIN_HOUSE_CELL_HEIGHT_AMOUNT' => $lang['House_admin_house_cell_height_amount'],
			'L_HOUSE_ADMIN_HOUSE_CELL_HEIGHT_AMOUNT_EXPLAIN' => $lang['House_admin_house_cell_height_amount_explain'],
			'L_HOUSE_ADMIN_EDIT_HOUSE_BUTTON' => $lang['House_admin_types'],
			'L_HOUSE_ADMIN_MAIN' => $lang['House_admin_main'],
			'L_HOUSE_ADMIN_CURRENT_HOUSE_FRONT' => $lang['House_admin_current_house_front'],
			'L_HOUSE_ADMIN_CURRENT_HOUSE_BG' => $lang['House_admin_current_house_bg'],
			'L_HOUSE_ADMIN_UPDATE_HOUSE' => $lang['House_admin_update_house'],
			'L_HOUSE_ADMIN_UPDATE_HOUSE_EXPLAIN' => $lang['House_admin_editing_house_explain'],
			'L_HOUSE_ADMIN_DELETE_HOUSE' => $lang['House_admin_delete_house'],
			'S_CONFIG_ACTION' => append_sid('admin_house.' . $phpEx),
            'HOUSE_NAME' => $row['house_name'],
			'HOUSE_TYPE' => $row['house_type'],
			'IS_SPECIAL' => $ISspecial,
			'NOT_SPECIAL' => $NOTspecial,
			'HOUSE_FRONT' => $row['house_front'],
			'HOUSE_BG' => $row['house_bg'],
			'HOUSE_PRIZE' => $row['house_prize'],
			'HOUSE_WIDTH' => $row['house_width'],
			'HOUSE_CELL_WIDTH' => $row['house_cellwidth'],
			'HOUSE_CELL_WIDTH_AMOUNT' => $row['house_cellwidthnumber'],
			'HOUSE_HEIGHT' => $row['house_height'],
			'HOUSE_CELL_HEIGHT' => $row['house_cellheight'],
			'HOUSE_CELL_HEIGHT_AMOUNT' => $row['house_cellheightnumber'],
		));
	}

	if ( $action == $lang['House_admin_update_house'] )
	{
		$template->assign_block_vars( 'update_notification' , array());

		//check they've filled the textfields!
		if ( ( $housename == '' ) || ( $housefront == '' ) || ( $housebg == '' ) )
			message_die( GENERAL_MESSAGE, $lang['House_admin_empty_text_fields'] );

		//check if the number fields are numeric
		if ( ( !is_numeric( $houseprize ) ) || ( !is_numeric( $housewidth ) ) || ( !is_numeric( $housecellwidth ) ) || ( !is_numeric( $housecellwidthnumber ) ) || ( !is_numeric( $househeight ) ) || ( !is_numeric( $housecellheight ) ) || ( !is_numeric( $housecellheightnumber ) ) || ( !is_numeric( $housetype ) ) )
			message_die( GENERAL_MESSAGE, $lang['House_admin_fields_not_numeric'] );

		// check if numbers fit
//		$testwidth = $housecellwidth * $housecellwidthnumber;
//		if ($testwidth != $housewidth) { message_die(GENERAL_MESSAGE,'The width of the cells and their number doesnt fit the background!<P>Please go back and try again');}
//		$testheight = $housecellheight * $housecellheightnumber;
//		if ($testheight != $househeight) { message_die(GENERAL_MESSAGE,'The height of the cells and their number doesnt fit the background!<P>Please go back and try again');}

		//Check that the house type doesn't already exist!
		if ( $housetype != $origtype )
		{
			$sql = "SELECT house_type FROM " . HOUSES_TABLE . "
					WHERE house_type=$housetype";
			if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_house_data'] ) : 'Fatal Error Getting House data!', "", __LINE__, __FILE__, $sql);
			$existinghousetype = mysql_fetch_array($result);

			if ( $housetype == $existinghousetype[0] )
				message_die( GENERAL_MESSAGE, $lang['House_admin_house_type_exists'] );
		}
		//update house table
		$sql2 = "UPDATE " . HOUSES_TABLE . "
				SET house_type=$housetype,
					house_name='$housename',
					house_front='$housefront',
					house_bg='$housebg',
					house_prize=$houseprize,
					house_width=$housewidth,
					house_cellwidth=$housecellwidth,
					house_cellwidthnumber=$housecellwidthnumber,
					house_height=$househeight,
					house_cellheight=$housecellheight,
					house_cellheightnumber=$housecellheightnumber,
					house_special=$housespecial
				WHERE house_type=$origtype";
		if ( !($db->sql_query($sql2)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_admin_house'] ) : 'Fatal Error Updating House!', "", __LINE__, __FILE__, $sql);

		//update user houses
  		$u3sql="DELETE FROM " . USER_HOUSE_TABLE . "
		  		WHERE house_type=$origtype";
  		if ( !($u3result = $db->sql_query($u3sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_user_houses'] ) : 'Fatal Error Updating House!', "", __LINE__, __FILE__, $sql);

		$template->assign_vars(array(
			'L_HOUSE_ADMIN_TITLE' => $lang['House_admin_edit_house_types'],
			'L_HOUSE_ADMIN_TITLE_EXPLAIN' => $lang['House_admin_edit_house_types_explain'],
        	'L_HOUSE_ADMIN_PAGE_TITLE' => $lang['House_admin_edit_house_types'],
            'L_HOUSE_ADMIN_UPDATED' => $lang['House_admin_house_config_updated'],
            'L_HOUSE_ADMIN_RETURN_MAIN_HOUSE' => $lang['House_admin_return_main_house'],
			'L_HOUSE_ADMIN_RETURN_EDIT_HOUSE' => $lang['House_admin_return_house_config'],
			'L_HOUSE_ADMIN_EDIT_HOUSE_BUTTON' => $lang['House_admin_types'],
			'L_HOUSE_ADMIN_MAIN' => $lang['House_admin_main'],
			'S_CONFIG_ACTION' => append_sid('admin_house.' . $phpEx),
			'NAME' => $housetype,
			'NAME_VAR' => 'edithouse',
		));
	}

	if ($action == 'DELETE HOUSE')
	{
		$template->assign_block_vars( 'update_notification' , array());

		//update class table
		$sql2 = "DELETE FROM " . HOUSES_TABLE . "
				WHERE house_type=$origtype";
		if ( !($db->sql_query($sql2)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_admin_house'] ) : 'Fatal Error Updating House!', "", __LINE__, __FILE__, $sql);

		//update user houses
  		$u3sql="DELETE FROM " . USER_HOUSE_TABLE . "
				WHERE house_type=$origtype";
  		if ( !($u3result = $db->sql_query($u3sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_user_houses'] ) : 'Fatal Error Updating House!', "", __LINE__, __FILE__, $sql);

		$template->assign_vars(array(
			'L_HOUSE_ADMIN_TITLE' => $lang['House_admin_edit_house_types'],
			'L_HOUSE_ADMIN_TITLE_EXPLAIN' => $lang['House_admin_edit_house_types_explain'],
        	'L_HOUSE_ADMIN_PAGE_TITLE' => $lang['House_admin_edit_house_types'],
            'L_HOUSE_ADMIN_UPDATED' => $lang['House_admin_deleted_message'],
            'L_HOUSE_ADMIN_RETURN_MAIN_HOUSE' => $lang['House_admin_return_main_house'],
			'L_HOUSE_ADMIN_RETURN_EDIT_HOUSE' => $lang['House_admin_return_house_config'],
			'L_HOUSE_ADMIN_EDIT_HOUSE_BUTTON' => $lang['House_admin_types'],
			'L_HOUSE_ADMIN_MAIN' => $lang['House_admin_main'],
			'S_CONFIG_ACTION' => append_sid('admin_house.' . $phpEx),
			'NAME' => $housetype,
			'NAME_VAR' => 'edithouse',
		));
	}
}
//--------------------------------House Editor END-----------------------------------------

//
// Generate the page
//
$template->pparse('body');

include('page_footer_admin.' . $phpEx);

?>
