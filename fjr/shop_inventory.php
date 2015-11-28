<?php
/***************************************************************************
 *                            shop_inventory.php
 *                            -------------------
 *   Version              : 2.6.1
 *   began                : Wednesday, December 11th, 2002
 *   released             : Sunday, October 23rd, 2005
 *   email                : zarath@knightsofchaos.com or maja@dowan.org
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   copyright (C) 2002/2003  IcE-RaiN/Zarath
 *
 *   This program is free software; you can redistribute it and/or
 *   modify it under the terms of the GNU General Public License
 *   as published by the Free Software Foundation; either version 2
 *   of the License, or (at your option) any later version.
 *
 *   This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   http://www.gnu.org/copyleft/gpl.html
 *
 ***************************************************************************/

define('IN_PHPBB', true);
$phpbb_root_path = './';
include($phpbb_root_path . 'extension.inc');
include($phpbb_root_path . 'common.' . $phpEx);

//
// Start session management
//
$userdata = session_pagestart($user_ip, PAGE_INDEX);
init_userprefs($userdata);
//
// End session management


//start of shop list page
if ($_REQUEST['action'] == "shoplist")
{
	$template->set_filenames(array(
		'body' => 'shop_body.tpl')
	);
	if ( !$userdata['session_logged_in'] )
	{
		$redirect = 'shop_inventory.'.$phpEx.'?action='.$_REQUEST['action'].'&shop='.$_REQUEST['shoplist'];
		header('Location: ' . append_sid("login.$phpEx?redirect=$redirect", true));
	}
	$sql = "select * from fjr_shops where id='{$_REQUEST['shop']}'";
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_MESSAGE, 'Fatal Error: '.mysql_error());
	}
	$srow = mysql_fetch_array($result);
	if (mysql_num_rows($result) < 1) { message_die(GENERAL_MESSAGE, 'No Such Shop Exists!'); }
	if (strtolower($srow['shoptype']) == "special")  { header("Location: shop_effects.php"); }
	if (strtolower($srow['shoptype']) == "admin_only")  { message_die(GENERAL_MESSAGE, 'No Such Shop Exists!'); }
	$sql = "select * from `fjr_shopitems` where shop='".addslashes($srow['shopname'])."' order by " . $board_config['shop_orderby'];
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_MESSAGE, 'Fatal Error: '.mysql_error());
	}
	for ($er = 0; $er < mysql_num_rows($result); $er++)
	{
{
	if (!isset($useritemamount)) { $useritemamount = 0; $sellbuy = "buy"; }
		if (file_exists('shop/images/'.$row['name'].'.jpg')) { $itemfilext = 'jpg'; }
		else { $itemfilext = 'gif'; }
		}
		$row = mysql_fetch_array($result);
		$shops .= '
			<tr>
			<td class="row1" align="center"><img src="shop/images/'.$row['name'].'.'.$itemfilext.'" title="'.ucfirst($row['name']).'" alt="'.$row['name'].'"></td>
			<td class="row1"><span class="gensmall"><a href="'.append_sid('shop_inventory.'.$phpEx.'?action=displayitem&item='.$row['id']).'" alt="'.$row['name'].'" title="Item Information on '.$row['name'].'"><b>'.ucwords($row['name']).'</b></a></span></td>
			<td class="row1"><span class="gensmall">'.ucfirst($row['sdesc']).'</span></td>
			<td class="row2" align="center"><span class="gensmall"><em>'.$row['sold'].'</em></span></td>
			<td class="row1" align="center"><span class="gensmall"><em>'.$row['stock'].'</em></span></td>
			<td class="row2" align="center"><span class="gensmall"><b>'.$row['cost'].'</b></span></td>
			<td class="row1" align="center"><span class="gensmall"><a href="'.append_sid('shop_bs.'.$phpEx.'?action=buy&item='.$row['id'], true).'" title="Buy '.ucwords($row['name']).'">Buy</a></span></td>
			<td class="row2" align="center"><span class="gensmall"><a href="'.append_sid('shop_bs.'.$phpEx.'?action=sell&item='.$row['id']).'" title="Sell '.ucwords($row['name']).'">Sell</a></span></td>
			</tr>';
	}
	$shopinforow = '
			<tr>
			<td width="30" class="row2"><span class="gensmall"><b>Icon</b></span></td>
			<td class="row2"><span class="gensmall"><b>Item Name</b></span></td>
			<td class="row2"><span class="gensmall"><b>Short Description</b></span></td>
			<td class="row2" align="center" width="30"><span class="gensmall"><b>Sold</b></span></td>
			<td class="row2" align="center" width="30"><span class="gensmall"><b>Left</b></span></td>
			<td class="row2" align="center" width="30"><span class="gensmall"><b>Cost</b></span></td>
			<td class="row2" align="center" width="30"><span class="gensmall"><b>Buy</b></span></td>
			<td class="row2" align="center" width="30"><span class="gensmall"><b>Sell</b></span></td>
			</tr>';
	$page_title = stripslashes(ucwords($srow['shopname'])).' Inventory';
	$shoptablerows = 8;
	$shoplocation = ' -> <a href="'.append_sid('shop.'.$phpEx).'" class="nav">Shop List</a> -> <a href="'.append_sid('shop.'.$phpEx.'?action=shoplist&shop='.$srow['id'], true).'" class="nav">'.stripslashes(ucwords($srow['shopname'])).' Inventory</a>';

	// start of personal information
	$personal = '<tr>
				<td class="row1" width="50%"><span class="gensmall"><a href="'.append_sid("shop.$phpEx?action=inventory&searchid=".$userdata['user_id']).'" class="navsmall">Your Inventory</a></span></td>
				<td class="row1" align="right" width="50%"><span class="gensmall">'.$userdata['user_points'].' '.$board_config['points_name'].'</span></td>
				</tr>'; 
	if (strlen($userdata['user_specmsg']) > 2) { 
		$personal .= '<tr><td class="row1" colspan="2"><span class="gensmall"><font color="red">'.$userdata['user_specmsg'].'</font></span></td></tr>'; 
		$personal .= '<tr><td class="row1" colspan="2"><span class="gensmall"><a href="shop.php?clm=true" class="gen">Clear Messages</a></span></td></tr>';
	}
	//end of personal information
		$original_credits = 'Original Shop Mod by <a href="http://www.knightsofchaos.com/zarath/mods/" class="navsmall">Zarath Technologies</a>.';
		$modified_version = 'Modified version 2.6.1 by <a href="http://dowan.org" class="navsmall">Dowan.org</a>';
		
	$template->assign_vars(array(
		'SHOPPERSONAL' => $personal,
		'SHOPLOCATION' => $shoplocation,
		'L_SHOP_TITLE' => stripslashes(ucwords($srow['shopname'])).' Inventory',
		'SHOPTABLEROWS' => $shoptablerows,
		'SHOPLIST' => $shops,
		'SHOPINFOROW' => $shopinforow,
		'ORIGINAL' => $original_credits,
		'MODIFIER' => $modified_version
		));
	$template->assign_block_vars('', array());
}
//start of item info page
elseif ($_REQUEST['action'] == "displayitem") 
{
	if (!isset($_REQUEST['item'])) 
	{
		message_die(GENERAL_MESSAGE, 'No Item Selected!');
	}
	$template->set_filenames(array(
		'body' => 'shop_body.tpl')
	);
	if ( !$userdata['session_logged_in'] )
	{
		$redirect = 'shop_inventory.'.$phpEx.'&action=displayitem&item='.$_REQUEST['item'];
		header('Location: ' . append_sid("login.$phpEx?redirect=$redirect", true));
	}
	
	//make sure item exists & shop is not a special/admin shop
	$sql = "select * from fjr_shopitems where id='{$_REQUEST['item']}' order by id";
	if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, 'Fatal Error: '.mysql_error()); }
	$row = mysql_fetch_array($result);
	if (mysql_num_rows($result) < 1) { message_die(GENERAL_MESSAGE, 'No such item exists!'); }

	$sql = "select * from fjr_shops where shopname='".addslashes($row['shop'])."' and shoptype!='special' and shoptype!='admin_only'";
	if ( !($result = $db->sql_query($sql)) ) { message_die(GENERAL_MESSAGE, 'Fatal Error: '.mysql_error()); }
	if (mysql_num_rows($result) < 1) { message_die(GENERAL_MESSAGE, 'Item is in a protected shop!'); }
	$sirow = mysql_fetch_array($result);
	//end check on item exists
	
	$shopinforow = '<tr>
				<td width="2%" class="row2" width="30"><span class="gensmall"><b>Icon</b></span></td>
				<td class="row2"><span class="gensmall"><b>Item&nbsp;Name</b></span></td>
				<td class="row2"><span class="gensmall"><b>Description</b></span></td>
				<td class="row2" width="30"><span class="gensmall"><b>Stock</b></span></td>
				<td class="row2" width="30"><span class="gensmall"><b>Cost</b></span></td>
				<td class="row2" width="30"><span class="gensmall"><b>Owned</b></span></td>
				</tr>';


	if (strlen($userdata['user_items']) > 2)
	{
		$explodearray = explode("ß", str_replace("Þ", "", $userdata['user_items']));
		$arraycount = count($explodearray);
		for ($sef = 0; $sef < $arraycount; $sef++)
		{	
			if ($explodearray[$sef] == $row['name'])
			{
				++$useritemamount;
				$sellbuy = "sell";
			}	
		}
	}	

	if (($board_config['multibuys'] == "on") && ($useritemamount > 0)) 
	{
		if (file_exists("shop/images/".$row['name'].".jpg")) { $itemfilext = "jpg"; }
		else { $itemfilext = "gif"; }
		$shopitems = '<tr>
					<td class="row1" width="30" align="center"><img src="shop/images/'.$row['name'].'.'.$itemfilext.'" title="'.ucfirst($row['name']).'" alt="'.$row['name'].'"></td>
					<td class="row1"><span class="gensmall"><b>'.ucwords($row['name']).'</a><b></span></td>
					<td class="row1"><span class="gensmall">'.ucfirst($row['ldesc']).'</span></td>
					<td class="row1" align="center" width="30"><span class="gensmall">'.$row['stock'].'</span></td>
					<td class="row1" align="center" width="30"><span class="gensmall">'.$row['cost'].'</span></td>
					<td class="row1" align="center" width="30"><span class="gensmall">'.$useritemamount.'</span></td>
					</tr>
					<tr>
					<td colspan="6" class="row1">
					<span class="gen"><b><a href="'.append_sid('shop_bs.'.$phpEx.'?action=buy&item='.$row['id'], true).'" title="Buy '.ucwords($row['name']).'">Buy '.ucwords($row['name']).'</a></b> &nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;<b><a href="'.append_sid('shop_bs.'.$phpEx.'?action=sell&item='.$row['id']).'" title="Sell '.ucwords($row['name']).'">Sell '.ucwords($row['name']).'</a></b>
					</td></tr>';
	}
	elseif (($board_config['multibuys'] == "off") || ($useritemamount < 1)) 
	{
		if (!isset($useritemamount)) { $useritemamount = 0; $sellbuy = "buy"; }
		if (file_exists('shop/images/'.$row['name'].'.jpg')) { $itemfilext = 'jpg'; }
		else { $itemfilext = 'gif'; }
		$shopitems = '<tr>
						<td class="row1" width="30" align="center"><img src="shop/images/'.$row['name'].'.'.$itemfilext.'" title="'.ucfirst($row['name']).'" alt="'.$row['name'].'"></td>
						<td class="row1"><span class="gensmall"><b>'.ucwords($row['name']).'</a><b></span></td>
						<td class="row1"><span class="gensmall">'.ucfirst($row['ldesc']).'</span></td>
						<td class="row1" align="center" width="30"><span class="gensmall">'.$row['stock'].'</span></td>
						<td class="row1" align="center" width="30"><span class="gensmall">'.$row['cost'].'</span></td>
						<td class="row1" align="center" width="30"><span class="gensmall">'.$useritemamount.'</span></td>
						</tr><tr>
						<td colspan="6" class="row1"><span class="gen"><b><a href="'.append_sid('shop_bs.'.$phpEx.'?action='.$sellbuy.'&item='.$row['id']).'" title="'.ucwords($sellbuy).' '.ucwords($row['name']).'">'.ucwords($sellbuy).' '.ucwords($row['name']).'</a></b></span></td>
						</tr>';
	}
	$title = ucwords($row['name']).' Information';
	$page_title = 'Item information';
	$shoptablerows = 6;
	$shoplocation = ' -> <a href="'.append_sid('shop.'.$phpEx, true).'" class="nav">Shop List</a> -> <a href="'.append_sid('shop_inventory.'.$phpEx.'?action=shoplist&shop='.$sirow['id'], true).'" class="nav">'.ucwords($row['shop']).' Inventory</a> -> <a href="'.append_sid('shop_inventory.'.$phpEx.'?action=displayitem&item='.$row['id'], true).'" class="nav">'.ucwords($row['name']).' Information</a>';

	// start of personal information
	$personal = '<tr>
				<td class="row1" width="50%"><span class="gensmall"><a href="'.append_sid("shop.$phpEx?action=inventory&searchid=".$userdata['user_id']).'" class="navsmall">Your Inventory</a></span></td>
				<td class="row1" align="right" width="50%"><span class="gensmall">'.$userdata['user_points'].' '.$board_config['points_name'].'</span></td>
				</tr>'; 
	if (strlen($userdata['user_specmsg']) > 2) { 
		$personal .= '<tr><td class="row2" colspan="2"><span class="gensmall"><font color="red">'.$userdata['user_specmsg'].'</font></span></td></tr>'; 
		$personal .= '<tr><td class="row2" colspan="2"><span class="gensmall"><a href="shop.php?clm=true" class="gen">Clear Messages</a></span></td></tr>';
	}
	//end of personal information

		$original_credits = 'Original Shop Mod by <a href="http://www.knightsofchaos.com/zarath/mods/" class="navsmall">Zarath Technologies</a>.';
		$modified_version = 'Modified version 2.6.1 by <a href="http://dowan.org" class="navsmall">Dowan.org</a>';
		
	$template->assign_vars(array(
		'SHOPPERSONAL' => $personal,
		'SHOPLOCATION' => $shoplocation,
		'L_SHOP_TITLE' => "$title",
		'SHOPTABLEROWS' => $shoptablerows,
		'SHOPLIST' => $shopitems,
		'SHOPINFOROW' => $shopinforow,
		'ORIGINAL' => $original_credits,
		'MODIFIER' => $modified_version
	));
	$template->assign_block_vars('', array());

}
else 
{
	message_die(GENERAL_MESSAGE, 'This is not a valid command!');
}

//
// Start output of page
//
include($phpbb_root_path . 'includes/page_header.' . $phpEx);

//
// Generate the page
//
$template->pparse('body');

include($phpbb_root_path . 'includes/page_tail.' . $phpEx);

?>
