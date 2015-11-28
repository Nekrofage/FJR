<?php
/***************************************************************************
 *                            lang_house.php [English]
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

// General language keys
$lang['House_adr'] = 'ADR';
$lang['House_shop_mod'] = 'Shop MOD';
$lang['House_user_houses'] = 'User houses';
$lang['House_user_ownername'] = 'Owner name';
$lang['House_profile_data'] = 'Profile data';
$lang['House_house_data'] = 'House data';
$lang['House_house_configs'] = 'House Configs';
$lang['House_in_cell'] = 'in Cell';
$lang['House_costs'] = 'Costs';
$lang['House_item'] = 'Item';
$lang['House_none'] = 'None';
$lang['House_remove'] = 'Remove';
$lang['House_place'] = 'Place';
$lang['House_cell'] = 'Cell';
$lang['House_place_item'] = 'Place Item';
$lang['House_item_removed'] = 'Item removed succesfully!';
$lang['House_adr_item'] = 'ADR Item';
$lang['House_empty_fields'] = 'You have not set all of the neccesary fields, please go back and try again!';
$lang['House_duplicate_cell'] = 'Please place only one furniture item per cell (have a heart for the guys carrying the stuff)!';
$lang['House_duplicate_cell_use'] = 'There is already an item in that location!<p> Furniture is not stackable!<p> Please go back and remove the item before placing another item there!';
$lang['House_item_updated'] = 'Item updated Succesfully!';
$lang['House_yes'] = 'Yes';
$lang['House_no'] = 'No';
$lang['House_front_image'] = 'House Front Image';

// Error Messages
$lang['House_error_1'] = 'Fatal Error getting %s Shop items!';
$lang['House_error_2'] = 'Fatal Error getting %s!';
$lang['House_error_3'] = 'Could not UPDATE %s Store Selection information!';
$lang['House_error_4'] = 'Fatal Error Updating %s!';

// ACP language keys
if ( defined ( 'IN_HOUSE_ADMIN' ) )
{
	$lang['House_admin_shop_notice'] = 'You MUST have either the Shop MOD installed or ADR Installed to use this!';
	$lang['House_admin_not_authorized'] = 'You MUST be an ADMIN to view this page - You are NOT authorized';
	$lang['House_admin_title'] = 'Configure House System';
	$lang['House_admin_title_explain'] = 'This section allows you to modifiy the House system.';
	$lang['House_admin_settings'] = 'House Settings';
	$lang['House_admin_settings_explain'] = 'Edit House System Configuration.';
	$lang['House_admin_type'] = 'House Type';
	$lang['House_admin_types'] = 'House Types';
	$lang['House_admin_types_explain'] = 'Create and manage House Types.';
	$lang['House_admin_furniture_cells'] = 'Furniture Cells';
	$lang['House_admin_furniture_cells_explain'] = 'Define what furniture can be used in which house and where.';
	$lang['House_admin_shop_1'] = 'Furniture Types - Shop 1 (normal shop)';
	$lang['House_admin_shop_2'] = 'Furniture Types - Shop 2 (garden shop)';
	$lang['House_admin_shop_explain'] = 'Define what kind of furniture the items in this shop are.';
	$lang['House_admin_edit_house'] = 'Edit User House';
	$lang['House_admin_edit_house_explain'] = 'Edit houses of users.';
	$lang['House_admin_edit_houses'] = 'Edit User Houses';
	$lang['House_admin_edit_houses_explain'] = 'This section allows you to Edit Houses owned by Users.';
	$lang['House_admin_edit_user_house'] = 'Edit Existing User House';
	$lang['House_admin_edit_user_house_explain'] = 'Drop down list of existing User House.';
	$lang['House_admin_create_rpg_house'] = 'Create RPG House';
	$lang['House_admin_create_rpg_house_explain'] = 'Create a House for RPG features.';
	$lang['House_admin_edit_rpg_house'] = 'Edit Existing RPG House';
	$lang['House_admin_edit_rpg_house_explain'] = 'Drop down list of existing RPG House.';
	$lang['House_admin_edit_rpg_house_button'] = 'Edit RPG House';
	$lang['House_admin_shop_select'] = 'Select Shop for Shop Items';
	$lang['House_admin_shop_select_explain'] = 'Select the desired Shop to use (ADR Shops or Shop MOD Shops).';
	$lang['House_admin_shop_select_button'] = 'Select Shop';
	$lang['House_admin_adr_notice'] = 'ADR IS installed';
	$lang['House_admin_adr_notice_explain'] = 'ADR is installed and Shops MOD IS NOT installed.';
	$lang['House_admin_adr_notice_use'] = 'Using ADR Shops ';
	$lang['House_admin_shop_type_error'] = 'You have a Shop Type Error!';
	$lang['House_admin_shop_type_error_1'] = '<font color="red"><b>You MUST press the "Select Shop" button to properly align your shops to use ADR Shops</b></font>';
	$lang['House_admin_shop_type_error_2'] = '<font color="red"><b>You MUST press the "Select Shop" button to properly align your shops to use Shop MOD Shops</b></font>';
	$lang['House_admin_furniture_shop'] = 'Select the ADR Shop to be used for Furniture items';
	$lang['House_admin_furniture_shop_explain'] = 'Drop down list of existing ADR Shops.';
	$lang['House_admin_furniture_shop_button'] = 'Select Furniture Store';
	$lang['House_admin_garden_shop'] = 'Select the ADR Shop to be used for Garden items';
	$lang['House_admin_garden_shop_button'] = 'Select Garden Store';
	$lang['House_admin_update_message'] = '<br />Completed %s Selection Update!';
	$lang['House_admin_shop_type'] = 'Shop Type';
	$lang['House_admin_furniture_store'] = 'Furniture Store';
	$lang['House_admin_garden_store'] = 'Garden Store';
	$lang['House_admin_house'] = 'House';
	$lang['House_admin_shop_mod_shops'] = 'Shop MOD Shops';
	$lang['House_admin_adr_shops'] = 'ADR Shops';
	$lang['House_admin_rpg_house'] = 'RPG-House';
	$lang['House_admin_rpg_houses'] = 'RPG-houses';
	$lang['House_admin_adr_store_info'] = 'ADR Store information';
	$lang['House_admin_editing_rpg_house'] = 'Editing RPG-House';
	$lang['House_admin_description'] = 'Description';
	$lang['House_admin_owner'] = 'Owned by';
	$lang['House_admin_no_owner_info'] = '(blank for no owner)';
	$lang['House_admin_update_description'] = 'Update Description';
	$lang['House_admin_update_owner'] = 'Update Owner';
	$lang['House_admin_update_price'] = 'Update Price';
	$lang['House_admin_remove_item'] = 'Remove an item from house';
	$lang['House_admin_furniture_floor'] = 'Place item on the Floor';
	$lang['House_admin_furniture_wall'] = 'Place item on the Wall';
	$lang['House_admin_furniture_garden'] = 'Place item in the Garden';
	$lang['House_admin_furniture_floor_wall'] = 'Place item on the Floor in front of Walls';
	$lang['House_admin_deletion_warning'] = '<b>Note:</b>  The House will be completely deleted,<br />if anyone allready owns it they will become homeless,<br />all furniture in the house will be lost.';
	$lang['House_admin_delete_house'] = 'DELETE HOUSE';
	$lang['House_admin_return_main_house'] = 'Return to Main House Config Page';
	$lang['House_admin_delete_house_message'] = '<br />House Deleted!';
	$lang['House_admin_edit_rpg_houses'] = 'Edit RPG Houses';
	$lang['House_admin_edit_rpg_houses_explain'] = 'This section allows you to Edit Houses for RPG features.';
	$lang['House_admin_return_edit_house'] = 'Return to Edit House Page';
	$lang['House_admin_description_updated'] = 'Description updated Succesfully!';
	$lang['House_admin_price_updated'] = 'Price Updated Succesfully!';
	$lang['House_admin_owner_updated'] = 'Owner updated Succesfully!';
	$lang['House_admin_item_placed'] = 'Item placed succesfully!';
	$lang['House_admin_houses'] = 'houses';
	$lang['House_admin_create_rpg_house_title'] = 'Create a House to Use in RPG Features';
	$lang['House_admin_rpg_id'] = 'House RPG ID';
	$lang['House_admin_rpg_id_explain'] = 'RPG ID for the House to Identify it (CAN NOT be 0).';
	$lang['House_admin_house_description'] = 'House Description';
	$lang['House_admin_house_description_explain'] = 'A Description of the House (e.g. where it is placed).';
	$lang['House_admin_house_price'] = 'House Price';
	$lang['House_admin_house_price_explain'] = 'The Price this House Will Cost the Homebuyer.';
	$lang['House_admin_create'] = 'Create';
	$lang['House_admin_main'] = 'Main';
	$lang['House_admin_select_house'] = 'Please select a house!';
	$lang['House_admin_return_message'] = '<p>Click %sHere</a> to return to the Main House Page.<p>Click %sHere</a> to return to Admin Index.<p>';
	$lang['House_admin_select_house_edit'] = '<br />Please select a house to edit!';
	$lang['House_admin_enter_price'] = '<br />Please enter a number for the price!';
	$lang['House_admin_user_not_exist'] = '<br />This user does not exist!';
	$lang['House_admin_existing_user_house'] = '<br />This user already owns a house!';
	$lang['House_admin_select_username'] = '<br />Please either enter a username <b>or</b> select an existing house!';
	$lang['House_admin_remove_first'] = '<br />You MUST select an item to remove first!';
	$lang['House_admin_rpg_id_zero'] = '<br />Please enter a number other than 0 for the RPG ID!';
	$lang['House_admin_rpg_id_exists'] = '<br />This RPG ID already exists, please select another!';
	$lang['House_admin_house_created'] = '<br />House created!';
	$lang['House_admin_give'] = 'Give';
	$lang['House_admin_user_no_house'] = 'Does not own a house, do you want to give him one?';
	$lang['House_admin_editing_user_house'] = 'Editing %s\'s House';
	$lang['House_admin_house_given'] = '<br />House given!';
	$lang['House_admin_shop_1_name'] = 'Shop 1';
	$lang['House_admin_shop_2_name'] = 'Shop 2';
	$lang['House_admin_none_items'] = '<br /><b>Items not defined as furniture:</b><br /><br />';
	$lang['House_admin_floor_items'] = '<br /><b>Items defined as floor items:</b><br /><br />';
	$lang['House_admin_wall_items'] = '<br /><b>Items defined as wall items:</b><br /><br />';
	$lang['House_admin_wf_items'] = '<br /><b>Items defined as floor at wall items:</b><br /><br />';
	$lang['House_admin_garden_items'] = '<br /><b>Items defined as garden items:</b><br /><br />';
	$lang['House_admin_furniture_types'] = 'Furniture Types';
	$lang['House_admin_furniture_types_explain'] = 'This section allows you to define what kind of furniture the items are.';
	$lang['House_admin_store_no_items'] = 'This store has no items in it.';
	$lang['House_admin_edit_item'] = 'Edit Item';
	$lang['House_admin_shop_list_warning'] = 'Note: Furniture items have to be .gif or .png images with transparent background !<br />      If its not a .gif or a .png the image will not be shown. If it has no transparent background it will overlay the house image.';
	$lang['House_admin_config_shop_items'] = 'Configure Shop %s Items';
	$lang['House_admin_not_furniture'] = 'not furniture';
	$lang['House_admin_floor_item'] = 'Item to be placed on the floor';
	$lang['House_admin_wall_item'] = 'Item to be placed on the wall';
	$lang['House_admin_fw_item'] = 'Item to be placed on the floor at base of wall';
	$lang['House_admin_garden_item'] = 'Item to be placed in the garden';
	$lang['House_admin_update_item'] = 'UPDATE ITEM';
	$lang['House_admin_return_to_shop'] = 'Return to Shop %s Page';
	$lang['House_admin_edit_furniture_cells'] = 'Edit House Furniture Cells';
	$lang['House_admin_edit_furniture_cells_explain'] = 'This section allows you to define in what cells which furniture/items can be placed.';
	$lang['House_admin_edit_furniture_cells_house'] = 'Edit Furniture Cells for a house';
	$lang['House_admin_edit_furniture_cells_2'] = 'Edit Furniture Cells for House';
	$lang['House_admin_edit_house_button'] = 'EDIT HOUSE';
	$lang['House_admin_edit_funiture_cells'] = 'Edit Furniture Cells for %s - %s';
	$lang['House_admin_interior_image'] = 'Interior Image - Use mouseover to see Cell numbers.';
	$lang['House_admin_exterior_image'] = 'Exterior Image';
	$lang['House_admin_define_floor_cells'] = 'Define floor cells';
	$lang['House_admin_define_wall_cells'] = 'Define wall cells';
	$lang['House_admin_define_fw_cells'] = 'Define floor at wall cells';
	$lang['House_admin_define_garden_cells'] = 'Define garden cells';
	$lang['House_admin_multiple_selections'] = 'Hold CTRL for multiple selections';
	$lang['House_admin_update_cells'] = 'UPDATE CELLS';
	$lang['House_admin_cells_and_none'] = 'You can\'t select "None" together with Cells.<P>Please go back and try again.';
	$lang['House_admin_multiple_definitions'] = 'You can\'t select the same cell in multiple definitions.';
	$lang['House_admin_cells_updated'] = '<br />Furniture Cells Updated!';
	$lang['House_admin_edit_house_config'] = 'Editing House Config';
	$lang['House_admin_house_update'] = 'UPDATE';
	$lang['House_admin_house_enabled'] = 'Enabled';
	$lang['House_admin_house_enabled_explain'] = 'Disable or Enable the House System.';
	$lang['House_admin_house_disabled'] = 'Disabled';
	$lang['House_admin_home_title'] = 'Title for your House page';
	$lang['House_admin_home_title_explain'] = 'Your House page name (leave blank to use sitename)';
	$lang['House_admin_first_shop'] = '1st Shop';
	$lang['House_admin_first_shop_explain'] = 'Shop used for general furniture for houses. Use exact shopname!';
	$lang['House_admin_shopname'] = 'Shopname';
	$lang['House_admin_second_shop'] = '2nd Shop';
	$lang['House_admin_second_shop_explain'] = 'Shop used for special furniture/garden items for houses. Use exact shopname! (meant to be a garden shop, or an Admin ONLY shop for special furniture you give out, or is availiable only by crafting)';
	$lang['House_admin_sell_value'] = 'House Sell Value';
	$lang['House_admin_sell_value_explain'] = 'Defines how many points the user gets back when selling his house in % (use values between 0 and 100)';
	$lang['House_admin_update_settings'] = 'Update Settings';
	$lang['House_admin_edit_house_config_explain'] = 'This section allows you to define the General House MOD settings.';
	$lang['House_admin_edit_house_types'] = 'Editing House Types';
	$lang['House_admin_edit_house_types_explain'] = 'This section allows you to define existing and new House Types';
	$lang['House_admin_edit_existing_house'] = 'Edit Existing House';
	$lang['House_admin_add_new_house'] = 'Add a new House';
	$lang['House_admin_house_id'] = 'House ID';
	$lang['House_admin_house_id_explain'] = 'Numeric ID value for each house (use a number greater than 0 which is not already taken).';
	$lang['House_admin_special_house'] = 'Special House';
	$lang['House_admin_special_house_explain'] = 'Defines the house as a special House. Special Houses do not show up in the house buy list and are meant to be special prizes for users or availiable by other means.';
	$lang['House_admin_house_name'] = 'House Name';
	$lang['House_admin_house_name_explain'] = 'Name for this House, eg "Small house".';
	$lang['House_admin_house_front_image_explain'] = 'House front. Shows up in viewprofile and on main house view. (enter filename with extension, images should go into /images/house)';
	$lang['House_admin_house_background_image'] = 'House Background Image';
	$lang['House_admin_house_background_image_explain'] = 'Background image for house interior. (enter filename with extension, images should go into /images/house)';
	$lang['House_admin_house_prize'] = 'House Price';
	$lang['House_admin_house_prize_explain'] = 'Amount Users have to pay to buy this house.';
	$lang['House_admin_house_width'] = 'House Width';
	$lang['House_admin_house_width_explain'] = 'Width of the house in px (use dimensions of the background image).';
	$lang['House_admin_house_cell_width'] = 'House Cell Width';
	$lang['House_admin_house_cell_width_explain'] = 'Width of the Cells in the house (use dimensions that can fill the background image up, but when multiplied by the amount <font color="red">DO NOT</font> exceed the width of the background image).';
	$lang['House_admin_house_cell_width_amount'] = 'House Width Cell Amount';
	$lang['House_admin_house_cell_width_amount_explain'] = 'Amount of Cells the House has in its Width (Amount multiplied with Cell Width should be <i>Exactly</i> the Width of the background image !!!).';
	$lang['House_admin_house_height'] = 'House Height';
	$lang['House_admin_house_height_explain'] = 'Height of the house in px (use dimensions of the background image).';
	$lang['House_admin_house_cell_height'] = 'House Cell Height';
	$lang['House_admin_house_cell_height_explain'] = 'Height of the Cells in the house (use dimensions that can fill the background image up, but when multiplied by the amount <font color="red">DO NOT</font> exceed the width of the background image).';
	$lang['House_admin_house_cell_height_amount'] = 'House Height Cell Amount';
	$lang['House_admin_house_cell_height_amount_explain'] = 'Amount of Cells the House has in its Height (Amount multiplied with Cell Height should be <i>Exactly</i> the Height of the background image !!!).';
	$lang['House_admin_add_house'] = 'ADD HOUSE';
	$lang['House_admin_empty_text_fields'] = 'You didn\'t fill in the required text fields!<p>Please go back and try again.';
	$lang['House_admin_fields_not_numeric'] = 'One or more of the number fields is not numeric!<p>Please go back and try again.';
	$lang['House_admin_house_id_zero'] = 'House ID can not be 0 or negative.';
	$lang['House_admin_house_type_exists'] = 'That House type already exists!<p>Please go back and enter a new House type.';
	$lang['House_admin_new_house_added'] = 'New House Added!';
	$lang['House_admin_return_house_type'] = 'Return to Add House Type Page';
	$lang['House_admin_return_house_config'] = 'Return to House Configuration Page';
	$lang['House_admin_house_config_updated'] = 'House Config Updated';
	$lang['House_admin_editing_house'] = 'Editing %s - %s';
	$lang['House_admin_editing_house_explain'] = '<b>Note:</b>  Changing the settings of a house will delete all houses of that kind currently owned by users ! (All users owning this house will become homeless.)';
	$lang['House_admin_current_house_front'] = 'Current House Front';
	$lang['House_admin_current_house_bg'] = 'Current House Background';
	$lang['House_admin_update_house'] = 'UPDATE HOUSE';
	$lang['House_admin_house'] = 'House';
	$lang['House_admin_deleted_message'] = 'House deleted successfully!';
	$lang['House_admin_house_display_column'] = 'Number of houses to display per row';
	$lang['House_admin_house_display_column_explain'] = 'This sets the number of houses to display per row when viewing other users houses.';
	$lang['House_admin_house_display_row'] = 'Number of house rows to display per page';
	$lang['House_admin_house_display_row_explain'] = 'This sets the number of house rows to display per page when viewing other users houses.';
	$lang['House_admin_rows'] = 'Row(s)';
	$lang['House_admin_columns'] = 'Column(s)';
	$lang['House_admin_house_in_adr'] = 'Use House MOD in ADR';
	$lang['House_admin_house_in_adr_explain'] = 'This sets up the House MOD to properly display under the ADR Header.';
}

// User language keys
if ( defined ( 'IN_HOUSE' ) )
{
	$lang['House_points_name'] = 'Points Name';
	$lang['House_disabled_message'] = 'House\'s are currently DISABLED!';
	$lang['House_title'] = '%s House MOD';
	$lang['House_controls'] = '%s\'s House Controls';
	$lang['House_buy_house'] = 'Buy a house';
	$lang['House_sell_house'] = 'Sell your house';
	$lang['House_buy_garden_supplies'] = 'Buy Gardening Supplies';
	$lang['House_buy_furniture'] = 'Buy furniture';
	$lang['House_furnish_house'] = 'Furnish your house';
	$lang['House_buy_button'] = 'BUY';
	$lang['House_sell_button'] = 'SELL';
	$lang['House_shop_1_button'] = 'Furniture Shop';
	$lang['House_shop_2_button'] = 'Garden Shop';
	$lang['House_furnish_house_button'] = 'Furnish House';
	$lang['House_view_house'] = 'View your house';
	$lang['House_view_house_button'] = 'VIEW';
	$lang['House_view_other_houses'] = 'Visit other users houses';
	$lang['House_view_other_houses_button'] = 'VISIT';
	$lang['House_users_house'] = '%s\'s House';
	$lang['House_view_houses'] = 'Visit houses';
	$lang['House_return_main_house'] = 'Return to Main House page';
	$lang['House_main_button'] = 'MAIN';
	$lang['House_remove_item'] = 'Remove an item from your house';
	$lang['House_furniture_floor'] = 'Place item on your Floor';
	$lang['House_furniture_wall'] = 'Place item on your Walls';
	$lang['House_furniture_garden'] = 'Place item in your Garden';
	$lang['House_furniture_fw'] = 'Place item on your floor in front of the wall';
	$lang['House_do_not_own'] = '<b>You</b> do not own a house.';
	$lang['House_buy_house_question'] = 'Do you want to buy a house?';
	$lang['House_return_message'] = '<p>Click %sHere</a> to return to the Main House Page.<p>';
	$lang['House_return_furnish'] = 'Return to Furnish House page';
	$lang['House_user_items'] = 'User Items';
	$lang['House_own_house'] = 'You already own a house!';
	$lang['House_interior_image'] = 'House Interior';
	$lang['House_buy_offer'] = 'Buy this house for %s %s';
	$lang['House_offer_buy'] = 'Buy house';
	$lang['House_purchase'] = 'PURCHASE';
	$lang['House_purchase_not_selected'] = 'Please select a house to buy!';
	$lang['House_not_enough_points'] = 'You don\'t have enough %s to buy this house!';
	$lang['House_purchased'] = 'House purchased!';
	$lang['House_confirm'] = 'CONFIRM';
	$lang['House_sell_confirmation'] = 'Do you realy want to sell your %s for %s %s?';
	$lang['House_sold'] = 'House sold!';
	$lang['House_user_do_not_own'] = '<b>%s</b> does not own a house.';
	$lang['House_rpg'] = 'RPG';
	$lang['House_rpg_buy'] = 'This house is for sale!<br />Do you want to buy it for: %s %s?';
	$lang['House_rpg_no_exist'] = 'This house does not exist.';
	$lang['House_nobody'] = 'Nobody';
}

// Shops language keys
if ( !defined ( 'IN_ADR' ) )
{
	$lang['House_welcome'] = 'Welcome, how can I help you?';
	$lang['House_shopkeeper_name_1'] = 'LMO Ltd';
	$lang['House_shopkeeper_name_2'] = 'Ozzie';
	$lang['House_config_settings'] = 'Configuration Settings';
	$lang['House_shop_data'] = 'Shop Data';
	$lang['House_shop_stock'] = 'Shop Stock';
	$lang['House_shop_restock_time'] = 'Shop Restocked Time';
	$lang['House_no_shop'] = 'No Such Shop Exists!';
	$lang['House_invalid_shop_page'] = 'Invalid Page for Special Shop!';
	$lang['House_mp_cost'] = 'MP Cost';
	$lang['House_floor'] = 'Floor';
	$lang['House_wall'] = 'Wall';
	$lang['House_fw'] = 'Floor at wall';
	$lang['House_garden'] = 'Garden';
	$lang['House_placable_on'] = 'Placable on';
	$lang['House_shop_item'] = 'Shop has item';
	$lang['House_icon'] = 'Icon';
	$lang['House_description'] = 'Description';
	$lang['House_personal'] = 'Personal';
	$lang['House_shop_actions'] = 'Shop Actions';
	$lang['House_shop_inventory'] = '%s Inventory';
	$lang['House_furniture_shop'] = 'House Furniture Shop';
	$lang['House_stock_qty'] = ' (%s left)';
	$lang['House_you_have'] = 'You have';
	$lang['House_amount'] = 'Amount';
	$lang['House_buy_button_2'] = 'Buy';
	$lang['House_sell_button_2'] = 'Sell';
	$lang['House_shop_buy'] = 'SHOPBUY';
	$lang['House_you_buy'] = 'You buy <b>%s %s</b> for <b>%s %s</b>, and have <b>%s %s</b> left.';
	$lang['House_buy_result'] = 'I hope you find a good place for it!';
	$lang['House_return_garden_shop'] = 'Return to garden shop';
	$lang['House_return_furniture_shop'] = 'Return to furniture shop';
	$lang['House_shop_sell'] = 'SHOPSELL';
	$lang['House_shop_shopping'] = 'House Shopping in the %s';
	$lang['House_you_sell'] = 'You sell <b>%s %s</b> for <b>%s %s</b>, and have <b>%s %s</b> left.';
	$lang['House_no_item'] = 'No Item Chosen!';
	$lang['House_item_not_exist'] = 'Such item does not exist!';
	$lang['House_out_of_stock'] = 'Out of stock!';
	$lang['House_too_many'] = 'The shop does not have that quantity!';
	$lang['House_already_own_item'] = 'You already own one of these!';
	$lang['House_not_enough_points_item'] = 'You dont have enough %s!<P>You need %s %s for %s %s.';
	$lang['House_do_not_have_item'] = 'You don\'t have such an item!';
	$lang['House_do_not_have_quantity'] = 'You don\'t have that quantity!';
}

?>
