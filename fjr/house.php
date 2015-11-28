<?php
/***************************************************************************
 *                                   house.php
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
define('IN_ADR_CHARACTER', true);
define('IN_ADR_SHOPS', true);
//define('IN_ADR_ZONE_MAPS', true);
define('IN_HOUSE', true);
$phpbb_root_path = './';
include( $phpbb_root_path . 'extension.inc' );
include( $phpbb_root_path . 'common.' . $phpEx );
( $board_config['use_adr_shops_in_house'] ) ? include_once($phpbb_root_path . 'adr/includes/adr_global.'.$phpEx) : '';

//$loc = 'town';
$loc = 'zones';
$sub_loc = 'house';

//
// Start session management 
// 
if( isset( $HTTP_POST_VARS['mode'] ) || isset( $HTTP_GET_VARS['mode'] ) )
{
	$mode = ( isset( $HTTP_POST_VARS['mode'] ) ) ? $HTTP_POST_VARS['mode'] : $HTTP_GET_VARS['mode'];
	$mode = htmlspecialchars($mode);
}
else
{
	$mode = "MAIN";
}
if( isset( $HTTP_POST_VARS['id'] ) || isset( $HTTP_GET_VARS['id'] ) )
{
	$id = ( isset($HTTP_POST_VARS['id']) ) ? $HTTP_POST_VARS['id'] : $HTTP_GET_VARS['id'];
	$id = htmlspecialchars($id);
}
//$id = $HTTP_POST_VARS['id'];
if( isset( $HTTP_POST_VARS['action'] ) || isset( $HTTP_GET_VARS['action'] ) )
{
	$action = ( isset( $HTTP_POST_VARS['action'] ) ) ? $HTTP_POST_VARS['action'] : $HTTP_GET_VARS['action'];
	$action = htmlspecialchars($action);
}

if( isset( $HTTP_POST_VARS['item'] ) || isset( $HTTP_GET_VARS['item'] ) )
{
	$item = ( isset( $HTTP_POST_VARS['item'] ) ) ? $HTTP_POST_VARS['item'] : $HTTP_GET_VARS['item'];
	$item = htmlspecialchars($item);
}
if( isset( $HTTP_POST_VARS['shop_keeper'] ) || isset( $HTTP_GET_VARS['shop_keeper'] ) )
{
	$shopkeeper = ( isset( $HTTP_POST_VARS['shop_keeper'] ) ) ? $HTTP_POST_VARS['shop_keeper'] : $HTTP_GET_VARS['shop_keeper'];
	$shopkeeper = htmlspecialchars($shopkeeper);
}

$remove = $HTTP_POST_VARS['remove'];
$floorcell = $HTTP_POST_VARS['floorcell'];
$floorcellitem = $HTTP_POST_VARS['floorcellitem'];
$wallcell = $HTTP_POST_VARS['wallcell'];
$wallcellitem = $HTTP_POST_VARS['wallcellitem'];
$gardencell = $HTTP_POST_VARS['gardencell'];
$gardencellitem = $HTTP_POST_VARS['gardencellitem'];
$fwcell = $HTTP_POST_VARS['fwcell'];
$fwcellitem = $HTTP_POST_VARS['fwcellitem'];
$houseid = $HTTP_POST_VARS['houseid'];
$qtybuy = $HTTP_POST_VARS['qtybuy'];
$qtysell = $HTTP_POST_VARS['qtysell'];

$userdata = session_pagestart( $user_ip, PAGE_HOMEBUILDER );
init_userprefs($userdata);
// Get the general config

$user_id = $userdata['user_id'];
$username = $userdata['username'];

if ( !$userdata['session_logged_in'] )
{
	$redirect = 'house.php';
	header('Location: ' . append_sid("login.$phpEx?redirect=$redirect", true));
}

include_once($phpbb_root_path . 'language/lang_' . $userdata['user_lang'] . '/lang_house.' . $phpEx);
include_once($phpbb_root_path . 'includes/functions_house.' . $phpEx);

if ( $board_config['use_adr_shops_in_house'] && !$board_config['house_use_in_adr'] )
{
	// Get the general config
	$adr_general = adr_get_general_config();
}

if ( $board_config['house_use_in_adr'] )
{
	$adr_general = adr_get_general_config();
	adr_enable_check();
	adr_ban_check($user_id);
	adr_character_created_check($user_id);
}


$template->set_filenames( array( 'body' => 'house_body.tpl' ) );

$pointsname = $board_config['points_name'];
if ( $pointsname == '' )
{
	$sql = "SELECT cash_name,cash_imageurl FROM " . CASH_TABLE . "
			WHERE cash_dbfield='user_points'";
	if ( !($result = $db->sql_query($sql)) )
		message_die( GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_points_name'] ) : 'Fatal Error getting Points Name!', '', __LINE__, __FILE__, $sql);
	$configrow = mysql_fetch_array($result);

	if ( $configrow['cash_imageurl'] != '' )
		$pointsname = '<img src="' . $phpbb_root_path . $configrow['cash_imageurl'] . '" alt="' . $configrow['cash_name'] . '" />';
	else
		$pointsname = $configrow['cash_name'];
}

if ( $board_config['use_adr_shops_in_house'] )
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

	$sql = "SELECT id, sdesc, name from " . SHOPITEMS_TABLE . "
			WHERE furniture_type = '1'
				OR furniture_type = '2'
				OR furniture_type = '3'
				OR furniture_type = '4'
			ORDER by sdesc";
	if ( !($jresult = $db->sql_query($sql)) )
		message_die( GENERAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], $lang['House_shop_mod'] ) : 'Fatal Error getting Shop MOD Shop items!', '', __LINE__, __FILE__, $sql);
	for ($x = 0; $x < mysql_num_rows($jresult); $x++)
	{
		$jrow = mysql_fetch_array($jresult);
		$shop_images[$jrow['name']] = $jrow['sdesc'];
	}
}

$sql = "SELECT * FROM " . HOUSE_SETTINGS_TABLE . "
		WHERE var=1";
if ( !($result = $db->sql_query($sql)) )
	message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_house_configs'] ) : 'Fatal Error Getting House Configs!', "", __LINE__, __FILE__, $sql);
$crow = mysql_fetch_array($result);
if ( $crow['enabled'] == 0 )
	message_die(GENERAL_MESSAGE, $lang['House_disabled_message'] );

( $crow['home_title'] == '' ) ? $home_title = sprintf( $lang['House_title'], $board_config['sitename'] ) : $home_title = $crow['home_title'];

// Specify template file
$template->set_filenames( array( 'body' => 'house_body.tpl' ) );

//--------------------------------Main Page START-----------------------------------------

if ( ( !isset($mode) ) || ( $mode == $lang['House_main_button'] ) )
{
	$template->assign_block_vars( 'main' , array());

	$uselocation = $title = $page_title = sprintf( $lang['House_controls'], $username );

	$template->assign_vars(array(
        'L_HOUSE_BUY_HOUSE' => $lang['House_buy_house'],
        'L_HOUSE_SELL_HOUSE' => $lang['House_sell_house'],
        'L_HOUSE_BUY_GARDEN_SUPPLIES' => $lang['House_buy_garden_supplies'],
        'L_HOUSE_BUY_FURNITURE' => $lang['House_buy_furniture'],
        'L_HOUSE_FURNISH_HOUSE' => $lang['House_furnish_house'],
        'L_HOUSE_VIEW_HOUSE' => $lang['House_view_house'],
        'L_HOUSE_VIEW_OTHER_HOUSES' => $lang['House_view_other_houses'],
        'L_HOUSE_BUY_BUTTON' => $lang['House_buy_button'],
        'L_HOUSE_SELL_BUTTON' => $lang['House_sell_button'],
        'L_HOUSE_SHOP_1_BUTTON' => $lang['House_shop_1_button'],
        'L_HOUSE_SHOP_2_BUTTON' => $lang['House_shop_2_button'],
        'L_HOUSE_FURNISH_HOUSE_BUTTON' => $lang['House_furnish_house_button'],
        'L_HOUSE_VIEW_HOUSE_BUTTON' => $lang['House_view_house_button'],
        'L_HOUSE_VIEW_OTHER_HOUSES_BUTTON' => $lang['House_view_other_houses_button'],
	));
}

//--------------------------------Main Page END-----------------------------------------

//--------------------------------RPG House START-----------------------------------------

if ( $mode == $lang['House_rpg'] )
{
	if (!isset($action))
	{
		// house.php?mode=RPG&id=(insert RPG id)
		$sql = "SELECT uh.*, u.username, h.* FROM " . USER_HOUSE_TABLE . " uh
		        LEFT JOIN " . USERS_TABLE . " u  ON ( uh.owner_id = u.user_id )
		        LEFT JOIN " . HOUSES_TABLE . " h  ON ( uh.house_type = h.house_type )
				WHERE uh.rpg_id='$id'";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_user_houses'] ) : 'Fatal Error Getting User houses!', "", __LINE__, __FILE__, $sql);
		$uhrow = mysql_fetch_array($result);

		$sql = "SELECT * FROM " . USER_HOUSE_TABLE . "
				WHERE owner_id='$user_id'";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_user_houses'] ) : 'Fatal Error Getting User houses!', "", __LINE__, __FILE__, $sql);
		$urow = mysql_fetch_array($result);

		if ($uhrow['username'] == '')
			$owner = $lang['House_nobody'];
		else
			$owner = $uhrow['username'];
			
		if ($uhrow['house_type'] != 0)
		{
			$template->assign_block_vars( 'view_house' , array());
			$template->assign_block_vars( 'view_house.rpg_house' , array());

			$house = $uhrow['house_bg'];
			$housefront = $uhrow['house_front'];
			$hwidth = $uhrow['house_width'];
			$hcellsh = $uhrow['house_cellwidth'];
			$hcellshn = $uhrow['house_cellwidthnumber'];
			$hheight = $uhrow['house_height'];
			$hcellsv = $uhrow['house_cellheight'];
			$hcellsvn = $uhrow['house_cellheightnumber'];

			$inventoryarray = explode(',',$uhrow['house_inventory']);
			$inventoryamount = count ($inventoryarray);

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
						$houseinventory[$iv][$ih] = $inventoryarray[$ia];
					}
					$ia++;
				}
			}

			// lets get some gnomes to build the house

			for ($sv = 1; $sv <= $hcellsvn; $sv++)
			{
				$cellinfo = '<tr>';
				for ($sh = 1; $sh <= $hcellshn; $sh++)
				{
					$cellinfo .= '
					<td width="'.$hcellsh.'px" height="'.$hcellsv.'px"><img src="shop/images/'.$houseinventory[$sv][$sh].'.gif" width="'.$hcellsh.'px" height="'.$hcellsv.'px" border="0" alt=""></td>';
				}
				$cellinfo .= '</tr>';
			}

			if ( $uhrow['username'] == '' )
			{
				if ( $urow['owner_id'] == '' )
				{
					$template->assign_block_vars( 'view_house.rpg_buy' , array());
				}
			}
		}
		if ( $uhrow['house_name'] != '' )
		{
			$uselocation = $title = $page_title = $owner . '\'s ' . $uhrow['house_name'];
		}
		else
		{
			$uselocation = $title = $page_title = $lang['House_rpg_no_exist'];
			$template->assign_block_vars( 'rpg_no_exist' , array());
		}

		$template->assign_vars(array(
       	    'L_HOUSE_RETURN_EDIT_HOUSE' => $lang['House_buy_house_question'],
			'L_HOUSE_EDIT_HOUSE_BUTTON' => $lang['House_buy_button'],
			'L_HOUSE_UPDATED' => $title,
			'L_HOUSE_RETURN_MAIN_HOUSE' => $lang['House_return_main_house'],
			'L_HOUSE_MAIN_BUTTON' => $lang['House_main_button'],
			'L_HOUSE_BUY' => $lang['House_buy_button'],
			'L_HOUSE_RPG' => $lang['House_rpg'],
			'L_HOUSE_RPG_NO_EXIST' => $lang['House_rpg_no_exist'],

			'S_CONFIG_ACTION' => append_sid('house.' . $phpEx),
			'USER_NAME' => $username,
   	        'HOUSE_BACKGROUND' => './images/house/' . $house,
       	    'HOUSE_WIDTH' => $hwidth,
           	'HOUSE_HEIGHT' => $hheight,
			'CELL_INFO' => $cellinfo,
			'HOUSE_FRONT' => $housefront,
			'RPG_DESCRIPTION' => $uhrow['rpg_description'],
			'RPG_PRICE' => sprintf( $lang['House_rpg_buy'], number_format($uhrow['rpg_prize']), $pointsname ),
			'RPG_ID' => $id,
		));
	}
}
if ( $action == $lang['House_buy_button'] )
{
	$sql = "SELECT * FROM " . USER_HOUSE_TABLE . "
			WHERE owner_id=$userdata[user_id]";
	if ( !($result = $db->sql_query($sql)) )
		message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_user_houses'] ) : 'Fatal Error Getting User houses!', "", __LINE__, __FILE__, $sql);
	$trow = mysql_fetch_array($result);
	if ( $trow['house_type'] == 0 )
	{
		$sql = "SELECT * FROM " . USER_HOUSE_TABLE . "
				WHERE rpg_id=$id";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_user_houses'] ) : 'Fatal Error Getting User houses!', "", __LINE__, __FILE__, $sql);
		$hrow = mysql_fetch_array($result);

		if ( $hrow['rpg_prize'] > $userdata['user_points'] )
			message_die(GENERAL_MESSAGE, sprintf( $lang['House_not_enough_points'], $pointsname ) . sprintf( $lang['House_return_message'], '<a href="'.append_sid("house.".$phpEx).'">' ));

		$newpoints = $userdata['user_points'] - $hrow['rpg_prize'];

		$sql2 = "UPDATE " . USER_HOUSE_TABLE . "
				SET owner_id=$userdata[user_id]
				WHERE rpg_id=$id";
		if ( !($db->sql_query($sql2)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_user_houses'] ) : 'Fatal Error Getting User houses!', "", __LINE__, __FILE__, $sql);

		$sql2 = "UPDATE " . USERS_TABLE . "
				SET user_points=$newpoints
				WHERE user_id=$user_id";
		if ( !($db->sql_query($sql2)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_profile_data'] ) : 'Fatal Error Getting House data!', "", __LINE__, __FILE__, $sql);

		$message = '<br />' . $lang['House_purchased'] . sprintf( $lang['House_return_message'], '<a href="'.append_sid("house.".$phpEx).'">' );
		message_die(GENERAL_MESSAGE, $message);
	}
	else
	{
		$message = '<br />' . $lang['House_own_house'] . sprintf( $lang['House_return_message'], '<a href="'.append_sid("house.".$phpEx).'">' );
		message_die(GENERAL_MESSAGE, $message);
	}
}
//--------------------------------RPG House END-----------------------------------------

//--------------------------------House List START-----------------------------------------

if ( $mode == $lang['House_view_other_houses_button'] )
{
	if (!isset($action))
	{
		$template->assign_block_vars( 'view_house_list' , array());

		$uselocation = $title = $page_title = $lang['House_view_houses'];
        $page_start = (isset($HTTP_GET_VARS['start']) ) ? intval($HTTP_GET_VARS['start']) : 0;

		$houses = '';
		$sql = "SELECT h.*, u.username FROM " . USER_HOUSE_TABLE . " h
		        LEFT JOIN " . USERS_TABLE . " u  ON ( h.owner_id = u.user_id )
				WHERE owner_id > 1
				ORDER BY username ASC";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_user_houses'] ) : 'Fatal Error Getting User houses!', "", __LINE__, __FILE__, $sql);
		$row = $db->sql_fetchrowset($result);
		$check = 1;
		$width = 100 / $crow['column_display'];
		$total_views 	= count($row);

		$ipp = $crow['row_display'] * $crow['column_display'];
        $link = 'mode=' . $lang['House_view_other_houses_button'];
		$pagination 	= generate_pagination("house.$phpEx?$link", $total_views, $ipp, $page_start). '&nbsp;';
		$page_number 	= sprintf($lang['Page_of'], ( floor( $page_start / $ipp ) + 1 ), ceil( $total_views / $ipp ) );

		if ( $page_start + $ipp > $total_views )
			$last_page = $total_views;
		else
			$last_page = $page_start + $ipp;

		for ( $er = $page_start; $er < $last_page; $er++ )
		{
			$house_type = $row[$er]['house_type'];
			$owner_id = $row[$er]['owner_id'];
			if ( $check == 1 )
				$houses .= '<tr>';
			$sql = "SELECT * FROM " . HOUSES_TABLE . "
					WHERE house_type='$house_type'";
			if ( !($result = $db->sql_query($sql)) )
				message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_house_data'] ) : 'Fatal Error Getting House data!', "", __LINE__, __FILE__, $sql);
			$hrow = mysql_fetch_array($result);

			$user_house_title = sprintf( $lang['House_users_house'], $row[$er]['username'] );
			$houses .= '<td class="row1" align="center" valign="center" width="' . $width . '%"><a href="' . append_sid("house.".$phpEx."?mode=VIEW&id=" . $row[$er]['owner_id']) . '"><img src="./images/house/' . $hrow['house_front'] . '" border="0" title="' . $user_house_title . '" alt="' . $user_house_title . '"></a><br><span class="genmed">' . $user_house_title . '</span></td>';
			if ( $check == $crow['column_display'] )
			{
				$houses .= '</tr>';
				$check = 0;
			}
			$check++;
		}
		if ( $check <= $crow['column_display'] )
		{
			for ( $x = $check; $x < $crow['column_display'] + 1; $x++ )
			{
				$houses .= '<td class="row1" align="center" valign="center"></td>';
			}
			$houses .= '</tr>';
		}

		$template->assign_vars(array(
        	'L_HOUSE_RETURN_MAIN_HOUSE_PAGE' => $lang['House_return_main_house'],
        	'L_HOUSE_MAIN_BUTTON' => $lang['House_main_button'],
        	
			'PAGINATION' => $pagination,
			'PAGE_NUMBER' => $page_number,
        	'HOUSES' => $houses,
		));
	}
}

//--------------------------------House List END-----------------------------------------

//--------------------------------Furniture Page START-----------------------------------------

if ( $mode == $lang['House_furnish_house_button'] )
{
	if (!isset($action))
	{
		$id = $user_id;
		if ( $id == $user_id )
			$template->assign_block_vars( 'furnish_house' , array());

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

		$uselocation = ''.$uhrow['username'].'\'s '.$uhrow['house_name'].'';
		$title = ''.$uhrow['username'].'\'s '.$uhrow['house_name'].'';
		$page_title = ''.$uhrow['username'].'\'s '.$uhrow['house_name'].'';

		if ($uhrow['house_type'] != 0)
		{
			$template->assign_block_vars( 'furnish_house.user_house' , array());

			$house = $uhrow['house_bg'];
			$housefront = $uhrow['house_front'];
			$hwidth = $uhrow['house_width'];
			$hcellsh = $uhrow['house_cellwidth'] - 2;
			$hcellshn = $uhrow['house_cellwidthnumber'];
			$hheight = $uhrow['house_height'];
			$hcellsv = $uhrow['house_cellheight'] - 2;
			$hcellsvn = $uhrow['house_cellheightnumber'];
			$floorcells = explode(",",$uhrow['house_floor']);
			$floorcellsamount = count ($floorcells);
			$fwcells = explode(",",$uhrow['house_fw']);
			$fwcellsamount = count ($fwcells);
			$gardencells = explode(",",$uhrow['house_garden']);
			$gardencellsamount = count ($gardencells);
			$wallcells = explode(",",$uhrow['house_wall']);
			$wallcellsamount = count ($wallcells);
			$cellamount = $hcellshn * $hcellsvn;
			$inventoryarray = explode(',',$uhrow['house_inventory']);
			$inventoryamount = count ($inventoryarray);

			if ( !$board_config['use_adr_shops_in_house'] )
			{
				$itempurge = str_replace("Þ", "", $uhrow['user_items']);
				$itemarray = explode('ß',$itempurge);
				$itemcount = count($itemarray);
			}

			$flooritems = '';
			$wallitems = '';
			$fwitems = '';
			$gardenitems = '';
			$shopitems = '';

			$user_house_inv = create_user_house_inventory_list( 'remove', $inventoryarray, $inventoryamount, $shop_images );

			if ( $board_config['use_adr_shops_in_house'] )
			{
				$sql = "SELECT * FROM " . ADR_SHOPS_ITEMS_TABLE . "
						WHERE item_owner_id='$id'
							AND item_in_house = 0
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
			}
			else
			{
				$sql = "select * from ".SHOPITEMS_TABLE." where shop='$crow[shop_1]' order by sdesc";
				if ( !($iresult = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, 'Fatal Error getting Shopitems'); }
				for ($x = 0; $x < mysql_num_rows($iresult); $x++)
				{
					$irow = mysql_fetch_array($iresult);
					$shopitems .= $irow['name'];
					if (($irow['furniture_type'] == 1) && (in_array($irow['name'],$itemarray)))
						{$flooritems .= "<option value=\"".$irow['name']."\">".ucfirst($irow['sdesc'])."</option>";}
					if (($irow['furniture_type'] == 2) && (in_array($irow['name'],$itemarray)))
						{$wallitems .= "<option value=\"".$irow['name']."\">".ucfirst($irow['sdesc'])."</option>";}
					if (($irow['furniture_type'] == 3) && (in_array($irow['name'],$itemarray)))
						{$fwitems .= "<option value=\"".$irow['name']."\">".ucfirst($irow['sdesc'])."</option>";}
					if (($irow['furniture_type'] == 4) && (in_array($irow['name'],$itemarray)))
						{$gardenitems .= "<option value=\"".$irow['name']."\">".ucfirst($irow['sdesc'])."</option>";}
				}

				$sql = "select * from ".SHOPITEMS_TABLE." where shop='$crow[shop_2]' order by name";
				if ( !($jresult = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, 'Fatal Error getting Shopitems'); }
				for ($x = 0; $x < mysql_num_rows($jresult); $x++)
				{
					$jrow = mysql_fetch_array($jresult);
					if (($jrow['furniture_type'] == 1) && (in_array($jrow['name'],$itemarray)))
						{$flooritems .= "<option value=\"".$jrow['name']."\">".ucfirst($jrow['sdesc'])."</option>";}
					if (($jrow['furniture_type'] == 2) && (in_array($jrow['name'],$itemarray)))
						{$wallitems .= "<option value=\"".$jrow['name']."\">".ucfirst($jrow['sdesc'])."</option>";}
					if (($jrow['furniture_type'] == 3) && (in_array($jrow['name'],$itemarray)))
						{$fwitems .= "<option value=\"".$jrow['name']."\">".ucfirst($jrow['sdesc'])."</option>";}
					if (($jrow['furniture_type'] == 4) && (in_array($jrow['name'],$itemarray)))
						{$gardenitems .= "<option value=\"".$jrow['name']."\">".ucfirst($jrow['sdesc'])."</option>";}
				}
			}
			$floor_item_list = create_item_list( 'floorcellitem', $flooritems );
			$wall_item_list = create_item_list( 'wallcellitem', $wallitems );
			$garden_item_list = create_item_list( 'gardencellitem', $gardenitems );
			$fw_item_list = create_item_list( 'fwcellitem', $fwitems );

			// some pixies fly by and get our furniture organised

			$ia = 0;
			for ( $iv = 1; $iv <= $hcellsvn; $iv++ )
			{
				for ( $ih = 1; $ih <= $hcellshn; $ih++ )
				{
					if ( $inventoryarray[$ia] == '' )
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
						<td width="'.$hcellsh.'px" height="'.$hcellsv.'px"><img src=".' . $image_dir . $houseinventory[$sv][$sh].'.gif" width="'.$hcellsh.'px" height="'.$hcellsv.'px" border="0" alt="Cell - '.$cn.'" title="Cell - '.$cn.'"></td>';
					$cn++;
				}
				$cellinfo .= '</tr>';
			}
		}
		else
		{
			if ($id == $user_id)
			{
				$template->assign_block_vars( 'update_notification' , array());

				$page_title = $lang['House_do_not_own'];
			}
		}

        $floor_cell_list = create_cell_list( 'floorcell', $floorcells, $floorcellsamount );
		$wall_cell_list = create_cell_list( 'wallcell', $wallcells, $wallcellsamount );
		$garden_cell_list = create_cell_list( 'gardencell', $gardencells, $gardencellsamount );
		$floor_wall_cell_list = create_cell_list( 'fwcell', $fwcells, $fwcellsamount );

		$template->assign_vars(array(
       	    'L_HOUSE_FURNISH_HOUSE_BUTTON' => $lang['House_furnish_house_button'],
           	'L_HOUSE_EDITING_USER_HOUSE' => sprintf( $lang['House_admin_editing_user_house'], $username ),
			'L_HOUSE_DESCRIPTION' => $lang['House_admin_description'],
   	        'L_HOUSE_OWNER' => $lang['House_admin_owner'],
			'L_HOUSE_REMOVE_ITEM' => $lang['House_remove_item'],
			'L_HOUSE_ITEM' => $lang['House_item'],
			'L_HOUSE_REMOVE' => $lang['House_remove'],
			'L_HOUSE_FURNITURE_FLOOR' => $lang['House_furniture_floor'],
			'L_HOUSE_PLACE' => $lang['House_place'],
			'L_HOUSE_PLACE_ITEM' => $lang['House_place_item'],
			'L_HOUSE_FURNITURE_WALL' => $lang['House_furniture_wall'],
       	    'L_HOUSE_FURNITURE_GARDEN' => $lang['House_furniture_garden'],
           	'L_HOUSE_FURNITURE_FLOOR_WALL' => $lang['House_furniture_fw'],
            'L_HOUSE_DELETION_WARNING' => $lang['House_admin_deletion_warning'],
   	        'L_HOUSE_DELETE_HOUSE' => $lang['House_admin_delete_house'],
       	    'L_HOUSE_RETURN_EDIT_HOUSE' => $lang['House_buy_house_question'],
			'L_HOUSE_EDIT_HOUSE_BUTTON' => $lang['House_buy_button'],
			'L_HOUSE_UPDATED' => $lang['House_do_not_own'],
			'L_HOUSE_RETURN_MAIN_HOUSE' => $lang['House_return_main_house'],
			'L_HOUSE_MAIN_BUTTON' => $lang['House_main_button'],

			'S_CONFIG_ACTION' => append_sid('admin_house.' . $phpEx),
           	'USER_ID' => $id,
			'USER_NAME' => $username,
   	        'HOUSE_BACKGROUND' => './images/house/' . $house,
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
		// house finished !!!
	}
	if ( $action == $lang['House_remove'] )
	{
		$template->assign_block_vars( 'update_notification' , array());

		if ($remove =='')
			message_die(GENERAL_MESSAGE, $lang['House_admin_remove_first'] . sprintf( $lang['House_return_message'], '<a href="'.append_sid("house.".$phpEx).'">' ));

		$id = $user_id;
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

		$uselocation = $title = $page_title = sprintf( $lang['House_users_house'], $uhrow['username'] );

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
            'L_HOUSE_UPDATED' => $lang['House_item_removed'],
            'L_HOUSE_RETURN_MAIN_HOUSE' => $lang['House_return_main_house'],
			'L_HOUSE_RETURN_EDIT_HOUSE' => $lang['House_return_furnish'],
			'L_HOUSE_EDIT_HOUSE_BUTTON' => $lang['House_furnish_house_button'],
			'L_HOUSE_MAIN_BUTTON' => $lang['House_main_button'],
			'S_CONFIG_ACTION' => append_sid('admin_house.' . $phpEx),
		));
	}
	if ( $action == $lang['House_place_item'] )
	{
		$template->assign_block_vars( 'update_notification' , array());

		if ( ( ( $floorcell == '' ) && ( $wallcell == '' ) && ( $fwcell == '' ) && ( $gardencell == '' ) ) || ( ( ( $floorcell != '' ) && ( $floorcellitem == '' ) ) || ( ( $wallcell != '' ) && ( $wallcellitem == '' ) ) || ( ( $fwcell != '' ) && ( $fwcellitem == '' ) ) || ( ( $gardencell != '' ) && ( $gardencellitem == '' ) ) ) )
			message_die(GENERAL_MESSAGE, $lang['House_empty_fields']);
		if ( ( ( $floorcell != '' ) && ( $wallcell !='' ) ) ||	( ( $floorcell != '' ) && ( $fwcell != '' ) ) || ( ( $floorcell != '' ) && ( $gardencell != '' ) ) || ( ( $wallcell != '' ) && ( $fwcell != '' ) ) || ( ( $wallcell != '' ) && ( $gardencell != '' ) ) || ( ( $gardencell != '' ) && ( $fwcell != '' ) ) )
			message_die(GENERAL_MESSAGE, $lang['House_duplicate_cell']);

		$id = $user_id;
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

		$uselocation = $title = $page_title = sprintf( $lang['House_users_house'], $uhrow['username'] );
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
			$sql = "SELECT item_id FROM " . ADR_SHOPS_ITEMS_TABLE . "
					WHERE item_owner_id='$id'
						AND item_in_house = 0
						AND item_icon = '$item_add'";
			if ( !($result = $db->sql_query($sql)) )
				message_die( GENERAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], $lang['House_adr'] ) : 'Fatal Error getting ADR Shopitems!', '', __LINE__, __FILE__, $sql);
			$gen_item_id = mysql_fetch_array($result);

			$sql = "UPDATE " . ADR_SHOPS_ITEMS_TABLE . "
					SET item_in_house = 1
					WHERE item_owner_id='$id'
						AND item_id = '" . $gen_item_id['item_id'] . "'";
			if ( !($result = $db->sql_query($sql)) )
				message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_adr_item'] ) : 'Fatal Error Updating ADR Item!', "", __LINE__, __FILE__, $sql);
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
            'L_HOUSE_UPDATED' => $lang['House_item_updated'],
            'L_HOUSE_RETURN_MAIN_HOUSE' => $lang['House_return_main_house'],
			'L_HOUSE_RETURN_EDIT_HOUSE' => $lang['House_return_furnish'],
			'L_HOUSE_EDIT_HOUSE_BUTTON' => $lang['House_furnish_house_button'],
			'L_HOUSE_MAIN_BUTTON' => $lang['House_main_button'],
			'S_CONFIG_ACTION' => append_sid('admin_house.' . $phpEx),
		));
	}
}
//--------------------------------Furniture Page END-----------------------------------------

//--------------------------------Buy house START-----------------------------------------

if ( $mode == $lang['House_buy_button'] )
{
	if (!isset($action))
	{
		$template->assign_block_vars( 'buy_house' , array());

		$uselocation = $title = $page_title = $lang['House_buy_house'];

		$sql = "SELECT house_type FROM " . USER_HOUSE_TABLE . "
				WHERE owner_id=$user_id";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_user_houses'] ) : 'Fatal Error Getting User houses!', "", __LINE__, __FILE__, $sql);
		$testrow = mysql_fetch_array($result);

		if ($testrow['house_type'] > 0)
			message_die(GENERAL_MESSAGE, $lang['House_own_house'] . sprintf( $lang['House_return_message'], '<a href="'.append_sid("house.".$phpEx).'">' ));

		$sql = "SELECT * FROM " . HOUSES_TABLE . "
				WHERE house_special=0
				ORDER BY house_type";
		if ( !($iresult = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_profile_data'] ) : 'Fatal Error Getting House data!', "", __LINE__, __FILE__, $sql);

		for ($x = 0; $x < mysql_num_rows($iresult); $x++)
		{
			$irow = mysql_fetch_array($iresult);

			$template->assign_block_vars('buy_house.house_list', array(
				'HOUSE_NAME' => $irow['house_name'],
				'HOUSE_FRONT' => $irow['house_front'],
				'HOUSE_BG' => $irow['house_bg'],
				'HOUSE_PRIZE' => sprintf( $lang['House_buy_offer'], number_format($irow['house_prize']), $pointsname ),
				'HOUSE_TYPE' => $irow['house_type'],
			));
		}

		$template->assign_vars(array(
            'L_HOUSE_UPDATED' => $lang['House_item_updated'],
            'L_HOUSE_RETURN_MAIN_HOUSE' => $lang['House_return_main_house'],
			'L_HOUSE_RETURN_EDIT_HOUSE' => $lang['House_return_furnish'],
			'L_HOUSE_EDIT_HOUSE_BUTTON' => $lang['House_furnish_house_button'],
			'L_HOUSE_MAIN_BUTTON' => $lang['House_main_button'],
			'L_HOUSE_FRONT_TITLE' => $lang['House_front_image'],
			'L_HOUSE_BG_TITLE' => $lang['House_interior_image'],
			'L_HOUSE_BUY_BUTTON' => $lang['House_buy_button'],
			'L_HOUSE_OFFER_BUY' => $lang['House_offer_buy'],
			'L_HOUSE_PURCHASE' => $lang['House_purchase'],
			'S_CONFIG_ACTION' => append_sid('admin_house.' . $phpEx),
		));
	}
	if ($action == 'PURCHASE')
	{
		$template->assign_block_vars( 'update_notification' , array());

		if (!isset($houseid))
			message_die(GENERAL_MESSAGE, $lang['House_purchase_not_selected'] . sprintf( $lang['House_return_message'], '<a href="'.append_sid("house.".$phpEx).'">' ));

		$sql = "SELECT * FROM " . HOUSES_TABLE . "
				WHERE house_type=$houseid";
		if ( !($result = $db->sql_query($sql)) )
				message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_house_data'] ) : 'Fatal Error Getting House data!', "", __LINE__, __FILE__, $sql);
		$hrow = mysql_fetch_array($result);

		if ($hrow['house_prize'] > $userdata['user_points'])
			message_die(GENERAL_MESSAGE, sprintf( $lang['House_not_enough_points'], $pointsname ) . sprintf( $lang['House_return_message'], '<a href="'.append_sid("house.".$phpEx).'">' ));

		$hcellshn = $hrow['house_cellwidthnumber'];
		$hcellsvn = $hrow['house_cellheightnumber'];
		$cellamount = $hcellshn * $hcellsvn;

		$inventory = '';
		for ($a = 1; $a <= $cellamount; $a++)
		{
			$inventory .= ",";
		}

		$newpoints = $userdata['user_points'] - $hrow['house_prize'];

		$sql2 = "INSERT INTO " . USER_HOUSE_TABLE . "
				(owner_id, house_type, house_inventory)
				VALUES ($user_id, $houseid, '$inventory')";
		if ( !($db->sql_query($sql2)) ) { message_die(GENERAL_MESSAGE, 'Fatal Error updating Userhouse.'); }

		$sql2 = "UPDATE " . USERS_TABLE . "
				SET user_points=$newpoints
				WHERE user_id=$user_id";
		if ( !($db->sql_query($sql2)) ) { message_die(GENERAL_MESSAGE, 'Fatal Error updating Usertable.'); }

		$template->assign_vars(array(
            'L_HOUSE_UPDATED' => $lang['House_item_updated'],
            'L_HOUSE_RETURN_MAIN_HOUSE' => $lang['House_return_main_house'],
			'L_HOUSE_RETURN_EDIT_HOUSE' => $lang['House_return_furnish'],
			'L_HOUSE_EDIT_HOUSE_BUTTON' => $lang['House_furnish_house_button'],
			'L_HOUSE_MAIN_BUTTON' => $lang['House_main_button'],
			'S_CONFIG_ACTION' => append_sid('admin_house.' . $phpEx),
		));
	}
}
//--------------------------------Buy house END-----------------------------------------

//--------------------------------Sell house END-----------------------------------------

if ( $mode == $lang['House_sell_button'] )
{
	if (!isset($action))
	{
		$template->assign_block_vars( 'sell_house' , array());

		$uselocation = $title = $page_title = $lang['House_sell_house'];
		$sql = "SELECT house_type, rpg_prize FROM " . USER_HOUSE_TABLE  ."
				WHERE owner_id=$user_id";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_user_houses'] ) : 'Fatal Error Getting User houses!', "", __LINE__, __FILE__, $sql);
		$testrow = mysql_fetch_array($result);

		if ($testrow['house_type'] == '')
			message_die(GENERAL_MESSAGE, $lang['House_do_not_own'] . sprintf( $lang['House_return_message'], '<a href="'.append_sid("house.".$phpEx).'">' ));

		$sql = "SELECT * FROM " . HOUSES_TABLE . "
				WHERE house_type=$testrow[house_type]";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_house_data'] ) : 'Fatal Error Getting House data!', "", __LINE__, __FILE__, $sql);
		$hrow = mysql_fetch_array($result);

		$sql = "SELECT * FROM " . HOUSE_SETTINGS_TABLE . "
				WHERE var='1'";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_house_configs'] ) : 'Fatal Error Getting House Configs!', "", __LINE__, __FILE__, $sql);
		$crow = mysql_fetch_array($result);

		if ( $testrow['rpg_prize'] == 0 )
			$sellprice = round( $hrow['house_prize'] / 100 ) * $crow['sell'];
		else
			$sellprice = round( $testrow['rpg_prize'] / 100 ) * $crow['sell'];

		$template->assign_vars(array(
            'L_HOUSE_UPDATED' => $lang['House_item_updated'],
            'L_HOUSE_RETURN_MAIN_HOUSE' => $lang['House_return_main_house'],
			'L_HOUSE_RETURN_EDIT_HOUSE' => $lang['House_return_furnish'],
			'L_HOUSE_SELL_HOUSE_BUTTON' => $lang['House_sell_button'],
			'L_HOUSE_MAIN_BUTTON' => $lang['House_main_button'],
			'L_HOUSE_PURCHASE_BUTTON' => $lang['House_confirm'],
			'L_HOUSE_SELL_CONFIRMATION' => sprintf(  $lang['House_sell_confirmation'], $hrow['house_name'], number_format($sellprice), $pointsname ),
			'S_CONFIG_ACTION' => append_sid('house.' . $phpEx),
			'HOUSE_FRONT' => $hrow['house_front'],
		));
	}
	if ( $action == $lang['House_confirm'] )
	{
		$sql = "SELECT house_type, rpg_id FROM " . USER_HOUSE_TABLE . "
				WHERE owner_id=$user_id";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_user_houses'] ) : 'Fatal Error Getting User houses!', "", __LINE__, __FILE__, $sql);
		$testrow = mysql_fetch_array($result);

		if ($testrow['house_type'] == '')
			message_die(GENERAL_MESSAGE, $lang['House_do_not_own'] . sprintf( $lang['House_return_message'], '<a href="'.append_sid("house.".$phpEx).'">' ));

		// Return items in house to users inventory
		if ( !$board_config['use_adr_shops_in_house'] )
		{
			$sql = "SELECT h.*, u.user_items FROM " . USER_HOUSE_TABLE . " h
			        LEFT JOIN " . USERS_TABLE . " u  ON ( h.owner_id = u.user_id )
					WHERE owner_id='$user_id'";
			if ( !($result = $db->sql_query($sql)) )
				message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_user_houses'] ) : 'Fatal Error Getting User houses!', "", __LINE__, __FILE__, $sql);
			$uhrow = mysql_fetch_array($result);

			$inventoryarray = explode(',',$uhrow['house_inventory']);
			$inventoryamount = count ($inventoryarray);
            $newuseritems = $uhrow['user_items'];
			for ($a = 0; $a < $inventoryamount; $a++)
			{
				$newuseritems .= 'ß' . $inventoryarray[$a] . 'Þ';;
			}

			$sql = "UPDATE " . USERS_TABLE . "
					SET user_items='$newuseritems'
					WHERE user_id='$user_id'";
			if ( !($result = $db->sql_query($sql)) )
				message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_user_items'] ) : 'Fatal Error Updating User Items!', "", __LINE__, __FILE__, $sql);
		}
		else
		{
			$sql = "UPDATE " . ADR_SHOPS_ITEMS_TABLE . "
					SET item_in_house = 0
					WHERE item_owner_id='$user_id'";
			if ( !($result = $db->sql_query($sql)) )
				message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_adr_item'] ) : 'Fatal Error Updating ADR Item!', "", __LINE__, __FILE__, $sql);
		}

		if ($testrow['rpg_id'] == 0)
		{
			$sql = "DELETE FROM " . USER_HOUSE_TABLE . "
					WHERE owner_id=$user_id";
			if ( !($result = $db->sql_query($sql)) )
				message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_user_houses'] ) : 'Fatal Error Updating User houses!', "", __LINE__, __FILE__, $sql);
		}
		else
		{
			$newowner = (-1) - $testrow['rpg_id'];
			$sql = "UPDATE " . USER_HOUSE_TABLE . "
					SET owner_id=$newowner
					WHERE owner_id=$user_id";
			if ( !($result = $db->sql_query($sql)) )
				message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_user_houses'] ) : 'Fatal Error Updating User houses!', "", __LINE__, __FILE__, $sql);
		}
		$sql = "SELECT * FROM " . HOUSES_TABLE . "
				WHERE house_type=$testrow[house_type]";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_house_data'] ) : 'Fatal Error Getting House data!', "", __LINE__, __FILE__, $sql);
		$hrow = mysql_fetch_array($result);

		$sql = "SELECT * FROM " . HOUSE_SETTINGS_TABLE . "
				WHERE var='1'";
		if ( !($result = $db->sql_query($sql)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_house_configs'] ) : 'Fatal Error Getting House Configs!', "", __LINE__, __FILE__, $sql);
		$crow = mysql_fetch_array($result);

		$sellprice = ( $hrow['house_prize'] / 100 ) * $crow['sell'];
		$newpoints = $userdata['user_points'] + $sellprice;

		$sql2 = "UPDATE " . USERS_TABLE . "
				SET user_points=$newpoints
				WHERE user_id=$user_id";
		if ( !($db->sql_query($sql2)) )
			message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_profile_data'] ) : 'Fatal Error Getting Profile data!', "", __LINE__, __FILE__, $sql);

		$message = $lang['House_sold'] . sprintf( $lang['House_return_message'], '<a href="'.append_sid("house.".$phpEx).'">');
		message_die(GENERAL_MESSAGE, $message);
	}
}

//--------------------------------Sell house END-----------------------------------------

//--------------------------------View Page START-----------------------------------------

if ( $mode == $lang['House_view_house_button'] )
{
	if ( !isset($id) )
	{
		$id = $user_id;
	}

	// house.php?mode=VIEW&id=(insert id from profile owner)
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
	if ( $uhrow['username'] == '' )
	{
		$sql = "select username from ".USERS_TABLE." where user_id='$id'";
		if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, 'Fatal Error Getting Profiledata!'); }
		$prow = mysql_fetch_array($result);
		
		$uhrow['username'] = $prow['username'];
	}
	$uselocation = $title = $page_title = $uhrow['username'] . '\'s ' . $uhrow['house_name'];

	if ($uhrow['house_type'] != 0)
	{
		$template->assign_block_vars( 'view_house' , array());

		$house = $uhrow['house_bg'];
		$housefront = $uhrow['house_front'];
		$hwidth = $uhrow['house_width'];
		$hcellsh = $uhrow['house_cellwidth'];
		$hcellshn = $uhrow['house_cellwidthnumber'];
		$hheight = $uhrow['house_height'];
		$hcellsv = $uhrow['house_cellheight'];
		$hcellsvn = $uhrow['house_cellheightnumber'];

		$inventoryarray = explode(',',$uhrow['house_inventory']);
		$inventoryamount = count ($inventoryarray);

		// some pixies fly by and get our furniture organised

		$ia = 0;
		for ( $iv = 1; $iv <= $hcellsvn; $iv++ )
		{
			for ( $ih = 1; $ih <= $hcellshn; $ih++ )
			{
				if ( $inventoryarray[$ia] == '' )
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
					<td width="'.$hcellsh.'px" height="'.$hcellsv.'px"><img src=".' . $image_dir . $houseinventory[$sv][$sh].'.gif" width="'.$hcellsh.'px" height="'.$hcellsv.'px" border="0" alt="Cell - '.$cn.'" title="Cell - '.$cn.'"></td>';
				$cn++;
			}
			$cellinfo .= '</tr>';
		}
	}
	else
	{
		if ($id == $user_id)
		{
			if ($id == $user_id)
			{
				$template->assign_block_vars( 'update_notification' , array());

				$page_title = $lang['House_do_not_own'];
			}
		}
		else
		{
			$uselocation = $title = $page_title = sprintf( $lang['House_user_do_not_own'], $uhrow['username'] );
			$template->assign_block_vars( 'view_house_not' , array());
		}
	}

	$template->assign_vars(array(
		'L_HOUSE_RETURN_EDIT_HOUSE' => $lang['House_buy_house_question'],
		'L_HOUSE_EDIT_HOUSE_BUTTON' => $lang['House_buy_button'],
		'L_HOUSE_UPDATED' => $title,
		'L_HOUSE_RETURN_MAIN_HOUSE' => $lang['House_return_main_house'],
		'L_HOUSE_MAIN_BUTTON' => $lang['House_main_button'],

		'S_CONFIG_ACTION' => append_sid('house.' . $phpEx),
		'USER_NAME' => $username,
		'HOUSE_BACKGROUND' => './images/house/' . $house,
		'HOUSE_WIDTH' => $hwidth,
		'HOUSE_HEIGHT' => $hheight,
		'CELL_INFO' => $cellinfo,
		'HOUSE_FRONT' => $housefront,
	));
	// house finished !!!
}
//--------------------------------View Page END-----------------------------------------
if ( $board_config['use_adr_shops_in_house'] && $mode == 'Furniture Shop' )
{
	header("Location: ".append_sid("adr_shops.$phpEx?mode=view_store&shop_id=$adr_general[furniture_shop_id]", true));
}
if ( $board_config['use_adr_shops_in_house'] && $mode == 'Garden Shop' )
{
	header("Location: ".append_sid("adr_shops.$phpEx?mode=view_store&shop_id=$adr_general[garden_shop_id]", true));
}
//--------------------------------Shop 1 and Shop 2 Page START-----------------------------------------

if ( !$adr_general['use_adr_shops_in_house'] && ( $mode == $lang['House_shop_1_button'] || $mode == $lang['House_shop_2_button'] ) )
{
	$uselocation = $title = $page_title = $shoptitle = $mode;

	//start of shop list page
	$template->set_filenames(array(
		'body' => 'house_shop_body.tpl')
	);

	$sql = "SELECT * FROM " . HOUSE_SETTINGS_TABLE . "
			WHERE var=1";
	if ( !($result = $db->sql_query($sql)) )
		message_die( GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_house_configs'] ) : 'Fatal Error Getting House Configs!', "", __LINE__, __FILE__, $sql );
	$crow = mysql_fetch_array($result);

	if ( $mode == $lang['House_shop_1_button'] )
	{
		$shopkeeper = 1;
		$shop = $crow['shop_1'];
		$return_to_shop = $lang['House_return_garden_shop'];
		$return_to_shop_button = $lang['House_shop_2_button'];
	}
	else if ( $mode == $lang['House_shop_2_button'] )
	{
		$return_to_shop = $lang['House_return_furniture_shop'];
		$return_to_shop_button = $lang['House_shop_1_button'];
		$shopkeeper = 2;
		$shop = $crow['shop_2'];
	}
	else
	{
	}
	if ( !isset($action) )
	{
		//start of shop restock code
		$gsql = "SELECT * from " . CONFIG_TABLE . "
				WHERE config_name='restocks'";
		if ( !($gresult = $db->sql_query($gsql)) )
			message_die( CRITICAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_config_settings'] ) : 'Fatal Error Getting Configuration Settings!', "", __LINE__, __FILE__, $sql );
		$grow = mysql_fetch_array($gresult);
		if ( $grow['config_value'] == on )
		{
			$ssql = "SELECT * FROM " . SHOP_TABLE . "
					WHERE restocktime!='0'";
			if ( !($sresult = $db->sql_query($ssql)) )
				message_die( CRITICAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_shop_data'] ) : 'Fatal Error Getting Configuration Settings!', "", __LINE__, __FILE__, $sql );
			$checktime = time();
			for ( $s = 0; $s < mysql_num_rows($sresult); $s++ )
			{
				$srow = mysql_fetch_array($sresult);
				if ( $checktime - $srow['restockedtime'] > $srow['restocktime'] )
				{
					$isql = "SELECT * FROM " . SHOPITEMS_TABLE . "
							WHERE shop='$srow[shopname]'";
					if ( !($iresult = $db->sql_query($isql)) )
						message_die( CRITICAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], '' ) : 'Fatal Error getting Shopitems!', '', __LINE__, __FILE__, $sql );
					for ( $x = 0; $x < mysql_num_rows($iresult); $x++ )
					{
						$irow = mysql_fetch_array($iresult);
						if ( $irow['stock'] < $irow['maxstock'] )
		  				{
							$newstockam = $irow['stock'] + $srow['restockamount'];
							if ( $newstockam > $irow['maxstock'])
								$newstockam = $irow['maxstock'];
   							$u2sql="UPDATE " . SHOPITEMS_TABLE . "
									SET stock='$newstockam'
									WHERE name='$irow[name]'";
   							if ( !($db->sql_query($u2sql)) )
								message_die( CRITICAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_shop_stock'] ) : 'Fatal Error Updating Shop Stock!', '', __LINE__, __FILE__, $sql );
						}
	  				}
					$susql="UPDATE " . SHOP_TABLE . "
							SET restockedtime='$checktime'
							WHERE shopname='$srow[shopname]'";
   					if ( !($db->sql_query($susql)) )
						message_die( CRITICAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_shop_restock_time'] ) : 'Fatal Error Updating Shop Restocked Time!', '', __LINE__, __FILE__, $sql );
				}
			}
		}
		//end of shop restock code

		// get shop details
		$sql = "SELECT * FROM " . SHOP_TABLE . "
				WHERE shopname='$shop'";
		if ( !($result = $db->sql_query($sql)) )
			message_die( GENERAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], '' ) : 'Fatal Error getting Shopitems!', '', __LINE__, __FILE__, $sql );

		$row = mysql_fetch_array($result);
		if ( !isset($row['shopname']) )
			message_die( GENERAL_MESSAGE, $lang['House_no_shop'] );
		if ( strtolower($row['shoptype']) == special )
			message_die( GENERAL_MESSAGE, $lang['House_invalid_shop_page'] );

		$sql = "SELECT * FROM " . SHOPITEMS_TABLE . "
				WHERE shop='$shop'
				ORDER BY name";
		if ( !($result = $db->sql_query($sql)) )
			message_die( CRITICAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], '' ) : 'Fatal Error getting Shopitems!', '', __LINE__, __FILE__, $sql );
		for ( $er = 0; $er < mysql_num_rows($result); $er++ )
		{
			$row = mysql_fetch_array($result);

			if ( file_exists("shop/images/".$row['name'].".jpg") )
				$itemfilext = "jpg";
			else
				$itemfilext = "gif";

			// START Furniture INFO
			$classarray = str_replace( "Þ", "", $row['class'] );
			$classarray = explode( 'ß', $classarray );
			$classcount = count ( $classarray );
			$classlist = '';
	     	for ( $xc = 0; $xc < $classcount; $xc++ )
			{
				if ( $classarray[$xc] != NULL )
				{
					$classlist .= $classarray[$xc];
					if ( $xc < ( $classcount - 1 ) )
					{
						$classlist .= ", ";
					}
				}
			}
		
			if ( $row['furniture_type'] == 0 )
				$furnituretype = '';
			if ( $row['furniture_type'] == 1 )
				$furnituretype = $lang['House_floor'];
			if ( $row['furniture_type'] == 2 )
				$furnituretype = $lang['House_wall'];
			if ( $row['furniture_type'] == 3 )
				$furnituretype = $lang['House_fw'];
			if ( $row['furniture_type'] == 4 )
				$furnituretype = $lang['House_garden'];

			// END Furniture INFO
			$useritemamount = 0;
			if (strlen($userdata['user_items']) > 2)
			{
				$explodearray = explode("ß", str_replace("Þ", "", $userdata['user_items']));
				$arraycount = count($explodearray);
				for ($sef = 0; $sef < $arraycount; $sef++)
				{
					if ($explodearray[$sef] == $row['name'])
					{
						++$useritemamount;
					}
				}
			}

			$dummyvalue = 1;

			$template->assign_block_vars('item_list', array(
				'L_HOUSE_PLACACBLE_ON' => $lang['House_placable_on'],
				'L_HOUSE_ITEM_IN_STOCK' => $lang['House_shop_item'],
				'L_HOUSE_COSTS' => $lang['House_costs'],
				'L_HOUSE_ITEM_POINTS_NAME' => $pointsname,
				'L_HOUSE_YOU_HAVE' => $lang['House_you_have'],
				'L_HOUSE_AMOUNT' => $lang['House_amount'],
				'L_HOUSE_BUY_BUTTON' => $lang['House_buy_button_2'],
				'L_HOUSE_SELL_BUTTON' => $lang['House_sell_button_2'],

				'HOUSE_ITEM_IMAGE' => $row['name'] . '.' . $itemfilext,
				'HOUSE_ITEM_NAME' => ucfirst($row['sdesc']),
				'HOUSE_ITEM_DESC' => ucfirst($row['ldesc']),
				'HOUSE_ITEM_FURNITURE_TYPE' => $furnituretype,
				'HOUSE_ITEM_IN_STOCK' => ($row['stock'] > 0) ? $lang['House_yes'] : $lang['House_no'],
				'HOUSE_ITEM_STOCK_QTY' => ($row['stock'] > 0) ? sprintf( $lang['House_stock_qty'], $row['stock'] ) : '',
				'HOUSE_ITEM_COST' => number_format($row['cost']),
				'HOUSE_ITEM_USER_QTY' => number_format($useritemamount),
				'DUMMY_VALUE' => $dummyvalue,
				'SHOP_KEEPER' => $shopkeeper,
				'S_FORM_ACTION_BUY' => append_sid("house.$phpEx?mode=SHOP&action=SHOPBUY&item=" . $row['name'] . "" ),
				'S_FORM_ACTION_SELL' => append_sid("house.$phpEx?mode=SHOP&action=SHOPSELL&item=" . $row['name'] . "" ),
			));
		}

		$template->assign_block_vars('item_header', array(
			'HOUSE_ICON' => $lang['House_icon'],
			'HOUSE_DESCRIPTION' => $lang['House_description'],
			'HOUSE_PERSONAL' => $lang['House_personal'],
			'HOUSE_SHOP_ACTIONS' => $lang['House_shop_actions'],
		));
		$page_title = sprintf( $lang['House_shop_inventory'], ucwords($shop) );
		$shoptablerows = 4;
		$template->assign_block_vars('return', array(
			'L_HOUSE_RETURN_MAIN_HOUSE' => $lang['House_return_main_house'],
			'L_HOUSE_MAIN_BUTTON' => $lang['House_main_button'],
			'L_RETURN_TO_SHOP' => $return_to_shop,
			'L_RETURN_TO_SHOP_BUTTON' => $return_to_shop_button,
			'S_CONFIG_ACTION' => append_sid('house.' . $phpEx),
		));

		if ( $shopkeeper == 1 )
		{
			$shop_keeper_image = 'shopkeeper1.gif';
			$shop_keeper_name = $lang['House_shopkeeper_name_1'];
		}
		else
		{
			$shop_keeper_image = 'shopkeeper2.gif';
			$shop_keeper_name = $lang['House_shopkeeper_name_2'];
		}
		
		$template->assign_vars(array(
       	    'L_HOUSE_WELCOME' => $lang['House_welcome'],

			'HOUSE_SHOPKEEPER_NAME' => $shop_keeper_name,
			'SHOP_KEEPER_IMAGE' => $shop_keeper_image,
		));
	}
}
//--------------------------------Shop 1 and Shop 2 Page END-----------------------------------------

if ( $action == $lang['House_shop_buy'] )
{
	if (!isset($item))
	{
		message_die( GENERAL_MESSAGE, $lang['House_no_item'] );
	}
	$template->set_filenames(array(
		'body' => 'house_shop_body.tpl')
	);

	//make sure item exists
	$sql = "SELECT * FROM " . SHOPITEMS_TABLE . "
			WHERE name='$item'";
	if ( !($result = $db->sql_query($sql)) )
		message_die( GENERAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], $lang['House_shop_mod'] ) : 'Fatal Error getting Shop MOD Shop items!', '', __LINE__, __FILE__, $sql);
	$row = mysql_fetch_array($result);

	if ( !isset($row['shop']) )
      	message_die( GENERAL_MESSAGE, $lang['House_item_not_exist'] );

   	if ( $row['stock'] < 1 )
      	message_die( GENERAL_MESSAGE, $lang['House_out_of_stock'] );

   	if ( ( $qtybuy == 0 ) || !is_numeric( $qtybuy ) )
   	{
      	message_die(GENERAL_MESSAGE, 'Please select an amount!');
   	}

   	if ( $row['stock'] < $qtybuy )
      	message_die( GENERAL_MESSAGE, $lang['House_too_many'] );

   	$sql = "SELECT * FROM " . SHOP_TABLE . "
	   		WHERE shopname='$row[shop]'";
   	if ( !($result = $db->sql_query($sql)) )
		message_die( GENERAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], '' ) : 'Fatal Error getting Shopitems!', '', __LINE__, __FILE__, $sql );
   	$row1 = mysql_fetch_array($result);

   	//end check on item exists
   	//
   	//check points & if has item
   	$sql = "SELECT user_items, user_points FROM " . USERS_TABLE . "
			WHERE username='$userdata[username]'";
   	if ( !($iresults = $db->sql_query($sql)) )
		message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_profile_data'] ) : 'Fatal Error Getting House data!', "", __LINE__, __FILE__, $sql);
   	$irow = mysql_fetch_array($iresults);
   	$gsql = "SELECT * FROM " . CONFIG_TABLE . "
			WHERE config_name='multibuys'";
    if ( !($gresult = $db->sql_query($gsql)) )
		message_die( CRITICAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_config_settings'] ) : 'Fatal Error Getting Configuration Settings!', "", __LINE__, __FILE__, $sql );
	$grow = mysql_fetch_array($gresult);
   	if ( $grow['config_value'] == off )
   	{
      	if ( substr_count($irow['user_items'],"ß".$item."Þ") > 0 )
         	message_die( GENERAL_MESSAGE, $lang['House_already_own_item'] );
   	}

   	if ( $irow['user_points'] < ( $row['cost'] * $qtybuy ) )
   	{
      	message_die( GENERAL_MESSAGE, sprintf( $lang['House_not_enough_points_item'], $pointsname, ($row['cost'] * $qtybuy), $pointsname, $qtybuy, $item ) );
   	}
   	//end of check for points and is has item
	//

	if ( $shopkeeper == 1 )
	{
		$shop_keeper_image = 'shopkeeper1.gif';
		$shop_keeper_name = $lang['House_shopkeeper_name_1'];
		$shop_name = $lang['House_shop_1_button'];
	}
	else
	{
		$shop_keeper_image = 'shopkeeper2.gif';
		$shop_keeper_name = $lang['House_shopkeeper_name_2'];
		$shop_name = $lang['House_shop_2_button'];
	}
   	$shoptitle = $uselocation = $title = $page_title = sprintf( $lang['House_shop_shopping'], $shop_name );

	$template->assign_vars(array(
		'L_HOUSE_WELCOME' => $lang['House_buy_result'],

		'HOUSE_SHOPKEEPER_NAME' => $shop_keeper_name,
		'SHOP_KEEPER_IMAGE' => $shop_keeper_image,
	));

   	if ( $row['stock'] < $qtybuy )
      	message_die( GENERAL_MESSAGE, $lang['House_too_many'] );

   	//start of table updates
   	$leftamount = round($irow['user_points'] - ($row['cost'] * $qtybuy));
	$totalcost = $row['cost'] * $qtybuy;
	$i = 1;
	$useritems = "".$irow['user_items']."ß".$item."Þ";
	while ( $i < $qtybuy )
	{
		$useritems .= "ß".$item."Þ";
		$i++;
	}
   	$newstock = $row['stock'] - $qtybuy;

	if ( $newstock < 0 )
		message_die(GENERAL_MESSAGE, $lang['House_too_many'] );

   	$newsold = $row['sold'] + $qtybuy;
   	$sql = "UPDATE " . USERS_TABLE . "
			SET user_points='$leftamount',
				user_items='$useritems'
			WHERE username='$userdata[username]'";
   	if ( !($uresults = $db->sql_query($sql)) )
		message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_profile_data'] ) : 'Fatal Error Updating House data!', "", __LINE__, __FILE__, $sql);

   	$sql = "UPDATE " . SHOPITEMS_TABLE . "
			SET stock='$newstock',
				sold='$newsold'
			WHERE name='$item'";
   	if ( !($db->sql_query($sql)) )
		message_die( GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_shop_mod'] ) : 'Fatal Error Updating Shop MOD Shop items!', '', __LINE__, __FILE__, $sql);
   	$useritemamount = substr_count( $irow['user_items'], "ß" . $item . "Þ" ) + $qtybuy;
   	//end of table updates

	$template->assign_block_vars('action', array(
		'TRANSACTION_RESULTS' => sprintf( $lang['House_you_buy'], number_format($qtybuy), ucwords($item), number_format($totalcost), $pointsname, number_format($leftamount), $pointsname ),
	));

	$shopinforow = '';

	if ( $shopkeeper == 1 )
	{
		$shop_keeper_image = 'shopkeeper1.gif';
		$shop_keeper_name = $lang['House_shopkeeper_name_1'];
	}
	else
	{
		$shop_keeper_image = 'shopkeeper2.gif';
		$shop_keeper_name = $lang['House_shopkeeper_name_2'];
	}

	$template->assign_vars(array(
		'L_HOUSE_WELCOME' => $lang['House_buy_result'],

		'HOUSE_SHOPKEEPER_NAME' => $shop_keeper_name,
		'SHOP_KEEPER_IMAGE' => $shop_keeper_image,
	));

	//
	//update item info
	$sql = "SELECT * FROM " . SHOPITEMS_TABLE . "
			WHERE name='$item'";
	if ( !($result = $db->sql_query($sql)) )
		message_die( GENERAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], '' ) : 'Fatal Error Getting Shop items!', '', __LINE__, __FILE__, $sql);
	//end update
	//
	if (file_exists("shop/images/".$row['name'].".jpg")) { $itemfilext = "jpg"; }
	else { $itemfilext = "gif"; }

	$shoptablerows = 6;

	$template->assign_block_vars('return2', array(
		'L_HOUSE_RETURN_MAIN_HOUSE' => $lang['House_return_main_house'],
		'L_HOUSE_MAIN_BUTTON' => $lang['House_main_button'],
		'L_HOUSE_RETURN_FURNITURE' => $lang['House_return_furniture_shop'],
		'L_HOUSE_RETURN_GARDEN' => $lang['House_return_garden_shop'],
		'L_HOUSE_FURNITURE_SHOP_BUTTON' => $lang['House_shop_1_button'],
		'L_HOUSE_GARDEN_SHOP_BUTTON' => $lang['House_shop_2_button'],

		'S_CONFIG_ACTION' => append_sid('house.' . $phpEx),
	));
}

if ( $action == $lang['House_shop_sell'] )
{
	if (!isset($item))
	{
		message_die(GENERAL_MESSAGE, 'No Item Chosen!');
	}
	$template->set_filenames(array(
		'body' => 'house_shop_body.tpl')
	);
	if ( !$userdata['session_logged_in'] )
	{
		$redirect = "shop.$phpEx&action=sell&item=$item";
		$redirect .= ( isset($user_id) ) ? '&user_id=' . $user_id : '';
		header('Location: ' . append_sid("login.$phpEx?redirect=$redirect", true));
	}

	//make sure item exists
  	$sql = "SELECT * FROM " . SHOPITEMS_TABLE . "
			WHERE name='$item'";
   	if ( !($result = $db->sql_query($sql)) )
		message_die( GENERAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], '' ) : 'Fatal Error Getting Shop items!', '', __LINE__, __FILE__, $sql);
   	$row = mysql_fetch_array($result);
   	if (!isset($row['shop']))
    	message_die( GENERAL_MESSAGE, $lang['House_item_not_exist'] );

   	$sql = "SELECT * FROM " . SHOP_TABLE . "
			WHERE shopname='$row[shop]'";
   	if ( !($result = $db->sql_query($sql)) )
		message_die( CRITICAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_shop_data'] ) : 'Fatal Error Getting Configuration Settings!', "", __LINE__, __FILE__, $sql );
   	$row1 = mysql_fetch_array($result);

   	//check if has item
   	$sql = "SELECT user_items, user_points FROM " . USERS_TABLE . "
			WHERE username='$userdata[username]'";
   	if ( !($iresults = $db->sql_query($sql)) )
		message_die(GENERAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_profile_data'] ) : 'Fatal Error Getting House data!', "", __LINE__, __FILE__, $sql);
   	$irow = mysql_fetch_array($iresults);
   	if (substr_count($irow['user_items'],"ß".$item."Þ") < 1)
    	message_die( GENERAL_MESSAGE, $lang['House_do_not_have_item'] );
   	if (substr_count($irow['user_items'],"ß".$item."Þ") < $qtysell)
    	message_die( GENERAL_MESSAGE, $lang['House_do_not_have_quantity'] );
	if ( $shopkeeper == 1 )
	{
		$shop_keeper_image = 'shopkeeper1.gif';
		$shop_keeper_name = $lang['House_shopkeeper_name_1'];
		$shop_name = $lang['House_shop_1_button'];
	}
	else
	{
		$shop_keeper_image = 'shopkeeper2.gif';
		$shop_keeper_name = $lang['House_shopkeeper_name_2'];
		$shop_name = $lang['House_shop_2_button'];
	}
   	$shoptitle = $uselocation = $title = $page_title = sprintf( $lang['House_shop_shopping'], $shop_name );

	$template->assign_vars(array(
		'L_HOUSE_WELCOME' => $lang['House_buy_result'],

		'HOUSE_SHOPKEEPER_NAME' => $shop_keeper_name,
		'SHOP_KEEPER_IMAGE' => $shop_keeper_image,
	));

   	//start of table updates
   	$gsql = "SELECT * FROM " . CONFIG_TABLE . "
			WHERE config_name='sellrate'";
   	if ( !($gresult = $db->sql_query($gsql)) )
		message_die( CRITICAL_ERROR, ( $lang['House_error_2'] != '' ) ? sprintf( $lang['House_error_2'], $lang['House_config_settings'] ) : 'Fatal Error Getting Configuration Settings!', "", __LINE__, __FILE__, $sql );
	$plusamount = $qtysell * (round($row['cost'] / 100 * 75));
   	$leftamount = $irow['user_points'] + $plusamount;

	//need to remove all from user items
	$j=1;
	$useritems = substr_replace($irow['user_items'], "", strpos($irow['user_items'], "ß".$item."Þ"), strlen("ß".$item."Þ"));
	while ($j < $qtysell)
	{
		$useritems = substr_replace($useritems, "", strpos($useritems, "ß".$item."Þ"), strlen("ß".$item."Þ"));
		$j++;
	}

   	$newstock = $row['stock'] + $qtysell;
   	$newsold = $row['sold'] - $qtysell;
   	$sql = "UPDATE " . USERS_TABLE . "
			SET user_points='$leftamount',
				user_items='$useritems'
			WHERE username='$userdata[username]'";
   	if ( !($uresults = $db->sql_query($sql)) )
		message_die(GENERAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_profile_data'] ) : 'Fatal Error Updating House data!', "", __LINE__, __FILE__, $sql);
   	$sql = "UPDATE " . SHOPITEMS_TABLE . "
			SET stock='$newstock',
				sold='$newsold'
			WHERE name='$item'";
   	if ( !($iresults = $db->sql_query($sql)) )
		message_die( CRITICAL_ERROR, ( $lang['House_error_4'] != '' ) ? sprintf( $lang['House_error_4'], $lang['House_shop_stock'] ) : 'Fatal Error Updating Shop Stock!', '', __LINE__, __FILE__, $sql );
   	//end of table updates
	//
	//start of echoes
	$useritemamount = substr_count($irow['user_items'],"ß".$item."Þ") -1;
	$template->assign_block_vars('action', array(
		'TRANSACTION_RESULTS' => sprintf( $lang['House_you_sell'], number_format($qtysell), ucwords($item), number_format($plusamount), $pointsname, number_format($leftamount), $pointsname ),
	));

	//
	//update item info
	$sql = "SELECT * FROM " . SHOPITEMS_TABLE . "
			WHERE name='$item'";
	if ( !($result = $db->sql_query($sql)) )
		message_die( CRITICAL_ERROR, ( $lang['House_error_1'] != '' ) ? sprintf( $lang['House_error_1'], '' ) : 'Fatal Error getting Shopitems!', '', __LINE__, __FILE__, $sql );
	//end update
	//
	if (file_exists("shop/images/".$row['name'].".jpg")) { $itemfilext = "jpg"; }
	else { $itemfilext = "gif"; }

	$shoptablerows = 6;

	$template->assign_block_vars('return2', array(
		'L_HOUSE_RETURN_MAIN_HOUSE' => $lang['House_return_main_house'],
		'L_HOUSE_MAIN_BUTTON' => $lang['House_main_button'],
		'L_HOUSE_RETURN_FURNITURE' => $lang['House_return_furniture_shop'],
		'L_HOUSE_RETURN_GARDEN' => $lang['House_return_garden_shop'],
		'L_HOUSE_FURNITURE_SHOP_BUTTON' => $lang['House_shop_1_button'],
		'L_HOUSE_GARDEN_SHOP_BUTTON' => $lang['House_shop_2_button'],

		'S_CONFIG_ACTION' => append_sid('house.' . $phpEx),
	));
}

//--------------------------------Shops Page END-----------------------------------------

$template->assign_vars(array(
	'L_HOUSE_TITLE' => $home_title,
    'L_HOUSE_PAGE_TITLE' => $page_title,
	'L_USE_TITLE' => $title,
	'L_SHOP_TITLE' => $shoptitle,

	'H_CONFIG_ACTION' => append_sid('house.' . $phpEx),
	'SHOPPERSONAL' => $personal,
	'SHOPLOCATION' => $shoplocation,
	'SHOPTABLEROWS' => $shoptablerows,
	'SHOPLIST' => $shops,
    'USEACTION' => $useaction,
));
$template->assign_block_vars('', array());

if ( $board_config['house_use_in_adr'] )
	define('IN_ADR', true);

// 
// Start output of page 
// 
include($phpbb_root_path . 'includes/page_header.' . $phpEx);

if ( $board_config['house_use_in_adr'] )
	include($phpbb_root_path . 'adr/includes/adr_header.'.$phpEx);
else
	require( $phpbb_root_path . 'house_index.' . $phpEx );

//
// Generate the page 
// 
$template->pparse('body'); 

include($phpbb_root_path . 'includes/page_tail.' . $phpEx); 

?>
