<?php

//
// English Language File for Quest MOD - Map Editor
// Author: Nuladion (Guido Kessels) < http://www.nuladion.tk >
//

// --- NulUpdate ------- Do not modify! -----------
$Vsql = "SELECT version FROM ".$table_prefix."nulmods WHERE title = 'Quest MOD' ";
if ( !($Vresult = $db->sql_query($Vsql)) ) { message_die(GENERAL_MESSAGE, "<b>Fatal Error!</b><br />".mysql_error()); }
$Vrow = mysql_fetch_array($Vresult); 
$lang['version'] = $Vrow['version'];
// ------------------------------------------------

// ------------- Translate from here: -------------

$lang['tile'] = 'Tile';
$lang['tiles'] = 'tiles';
$lang['coordinates'] = 'Coordinates';
$lang['hori'] = 'horizontal';
$lang['vert'] = 'vertical';
$lang['change'] = 'Change';
$lang['change_lowercase'] = 'change';
$lang['error'] = 'Error';
$lang['inv_hori'] = 'Invalid tile --> Horizontal!';
$lang['inv_vert'] = 'Invalid tile --> Vertical!';
$lang['or'] = 'or';
$lang['fill'] = 'Fill';
$lang['fill_info'] = '(This will fill the whole map with the selected tile!)';
$lang['map'] = 'Map';
$lang['maps'] = 'maps';
$lang['new'] = 'New';
$lang['save'] = 'Save';
$lang['load'] = 'Load';
$lang['base'] = 'Base';
$lang['base_tile'] = 'Base tile';
$lang['unnamed_map'] = 'Unnamed Map';
$lang['map_name'] = "Map name";
$lang['map_width'] = "Map width";
$lang['map_height'] = "Map height";
$lang['change_map_name'] = "Change map name";
$lang['create_map'] = "Create map";
$lang['new_map'] = "New map";
$lang['load_map'] = "Load map";
$lang['save_map'] = "Save map";
$lang['name'] = 'Name';
$lang['name_info'] = 'The name of the Map';
$lang['width'] = 'Width';
$lang['width_info'] = 'How many tiles horizontally';
$lang['height'] = 'Height';
$lang['height_info'] = 'How many tiles vertically';
$lang['create'] = 'Create';
$lang['create_title'] = 'Create a new Map';
$lang['saved_error'] = 'Failed to save Map!';
$lang['saved_succesfully'] = 'Map saved succesfully!';
$lang['load_error'] = 'Failed to load maps!';
$lang['db_error'] = 'The database returned:';
$lang['go_back'] = 'Go Back';
$lang['lister'] = '#';
$lang['load_saved'] = 'Load a saved Map';
$lang['no_maps_found'] = 'No maps were found!';
$lang['delete'] = 'Delete';
$lang['delete_all'] = 'Delete All';
$lang['delete_check'] = 'Are you sure you want to delete this Map?';
$lang['delete_error'] = 'Failed to delete Map!';
$lang['delete_succesfully'] = 'Map deleted succesfully!';
$lang['delete_all_check'] = 'Are you sure you want to delete all maps?';
$lang['delete_all_error'] = 'Failed to delete all maps!';
$lang['delete_all_succesfully'] = 'All maps have been deleted succesfully!';
$lang['Yes'] = 'Yes';
$lang['No'] = 'No';

$lang['overwrite'] = "Overwrite";
$lang['map_name_exists'] = "A Map with this name already exists!";
$lang['what_to_do'] = "What do you want to do?";
$lang['save_as_new'] = "Save as new Map";
$lang['this_map_id'] = "This Map's ID:";
$lang['overwrite_succesfully'] = "Map was overwritten succesfully!";

$lang['walkable'] = "Walkable";
$lang['image'] = "Image";
$lang['no_tile_selected'] = "<i>No tile selected!</i><br>Please go back and try again!";
$lang['is_now_walkable'] = "is now set to <b>walkable</b>";
$lang['is_now_non_walkable'] = "is now set to <b>non-walkable</b>";
$lang['tile_changed_succesfully'] = "Tile changed succesfully!";

$lang['map_from'] = 'From';
$lang['map_to'] = 'To';
$lang['map_text'] = 'Text';
$lang['coordinates_hv'] = 'Coordinates<br /><span class="gensmall">(Horizontal x Vertical)</span>';
$lang['edit'] = 'Edit';
$lang['no_teleport_id_specified'] = "No teleport specified!";
$lang['edit_teleport'] = "Edit teleport";
$lang['new_teleport'] = "Create a new Teleport";
$lang['edit_teleport_succesful'] = "Teleport edited succesfully!";
$lang['create_new_teleport'] = "Create a new teleport!";
$lang['create_new_teleport_button'] = "Create teleport!";
$lang['didnt_fill_all_fields'] = "You didn't fill in all the required fields!";
$lang['create_teleport_succesful'] = "Teleport created succesfully!";
$lang['delete_teleport_succesful'] = "Teleport deleted succesfully!";
$lang['go_to'] = "Go to";
$lang['teleport_text_explain'] = "This text will display on the teleport button after '<b>".$lang['go_to']."</b>'. This is optional: Leave blank to use the target map's name, or the target URL (if specified).";

$lang['url'] = "URL";
$lang['url_explain'] = "Instead of teleporting to a new map, this will open a new window for the user. You can specify the URL to this page here. Keep in mind that the URL has to be from the <b>forum root</b>!<br />Leave this blank if you do not want to use this feature, and just want to make a normal teleport!";
$lang['map_id_exists'] = "A Map with this ID already exists!";

// Export map!
$lang['export_map'] = "Export Map";
$lang['export_view'] = "Click here to view your exported map!";
$lang['export_succesfully'] = "Map exported succesfully!";
$lang['export_save_first'] = "Please save your map first!";
$lang['export_check_error'] = "Failed to get map data from database!";
$lang['export_make_sure_to'] = "Make sure to export the map!";

// NPCs System
$lang['description'] = 'Description';
$lang['action'] = 'Action';
$lang['portrait'] = 'Portrait';
$lang['add_npc'] = 'Add a new NPC';
$lang['use_from_list'] = "Select an action from the list";
$lang['or_type_custom'] = "Or use a custom action:";
$lang['add_npc_button'] = "Add NPC";
$lang['add_npc_succesful'] = "NPC added succesfully!";
$lang['no_npc_id_specified'] = "No NPC selected!";
$lang['delete_npc_succesful'] = "NPC deleted succesfully!";
$lang['edit_npc'] = 'Edit NPC';
$lang['edit_npc_succesful'] = "NPC edited succesfully!";
$lang['npc_script'] = "Script ID";
$lang['npc_script_explain'] = "This will be the 'opening' conversation for this NPC! SO when an user wants to communicate to this NPC, the Script with this ID will come up as first part of the conversation!";

// Scripts System
$lang['npc_name'] = "NPC";
$lang['script_text'] = "Text";
$lang['goto_script_number'] = "goto script";
$lang['add_script'] = 'Add a new script';
$lang['add_script_button'] = "Add script";
$lang['add_script_succesful'] = "Script added succesfully!";
$lang['no_script_id_specified'] = "No script selected!";
$lang['delete_script_succesful'] = "Script deleted succesfully!";
$lang['edit_script'] = 'Edit script';
$lang['edit_script_succesful'] = "Script edited succesfully!";
$lang['script_answer'] = "Answer";
$lang['script_close'] = "close";
$lang['script_none'] = "None";
$lang['npc_default'] = "Use NPC Portrait";
$lang['goto_script'] = "Go to script with ID";
$lang['npc_default_action'] = "Use NPC Action";
$lang['user_zero_for_closing'] = "(Use <b>0</b> if you want this answer to close the NPC window!)";
$lang['update'] = "Update";
$lang['update_explain'] = "If you change the NPC, click the Update button so the NPC Action and NPC Portrait on this page match the new NPC!";

// Sort list
$lang['sort_list'] = "Sort list by";
$lang['order_by_npc'] ="NPC Name";
$lang['order_by_script'] ="Script ID";
$lang['order_by_both'] ="NPC Name, Script ID";
$lang['order_by_npc_id'] = "ID";
$lang['order_by_npc_name'] = "Name";
$lang['order_by_target_map'] = "Target Map ID";
$lang['order_by_from_map'] = "From Map ID";
$lang['sort_asc'] = "Ascending";
$lang['sort_desc'] = "Descending";
$lang['go'] = "Go";

// User Admin
$lang['user_admin'] = "User Admin";
$lang['users_explain'] = "This page allows you to instantly move an user to one location to another, or move all users to a location of your liking. This can come in handy when an user has become stuck somewhere, or if you want to reset all your user's locations!";
$lang['users_set_all'] = "Move all users";
$lang['users_set_single'] = "Move single user";
$lang['users_do_move'] = "Move user";
$lang['users_do_all'] = "Move all users";
$lang['users_move_succesful'] = "User moved succesfully!";
$lang['users_all_move_succesful'] = "All users moved succesfully!";
$lang['users_username'] = "Username";
$lang['users_username_explain'] = "Make sure to user proper capitalization!";
$lang['users_doesnt_exist'] = "That user doesn't exist!";

// --- Added in v2.3.0 ---
// Character Sprites
$lang['sprites_admin_help'] = "Here you can configure the character sprite options! Your users are able to create their own sprites from the images you select. You can also set item requirements for each image, so an user has to buy the item with that name first before he/she can select that image for their character!<br /><br />This character system uses so-called 'layers', which are basically the order of the images; which one goes at the top, etc.<br /><br />To edit the sprites themselves you'll have to click the 'Edit Images' button! After you've set up some layers, you can assign images to each layer. It's actually pretty easy! Just look around a little and see what each option does, you'll get amazing results!";
$lang['sprites_character_sprites'] = "Character Sprites";
$lang['sprites_edit_layers'] = "Edit Layers";
$lang['sprites_edit_images'] = "Edit Images";
$lang['sprites_move_up'] = "Move Up";
$lang['sprites_move_down'] = "Move Down";
$lang['sprites_position'] = "Position";
$lang['sprites_compulsive'] = "Compulsive";
$lang['sprites_compulsive_explain'] = "If you set this to 'No', users will be able to select '[none]' which will result in a blank spot for this layer. This can be good for certain optional layers, but should not be used for required layers like the skin and head!";
$lang['sprites_move'] = "Move Layer";
$lang['sprites_newlayer'] = "New Layer";
$lang['sprites_createnewlayer'] = "Create a new layer";
$lang['sprites_newlayer_succesful'] = "Layer created succesfully!";
$lang['sprites_layerdeleted_succesful'] = "Layer deleted succesfully!";
$lang['sprites_nolayerselected'] = "No layer specified!";
$lang['sprites_layer_moved_succesful'] = "Layer moved succesfully!";
$lang['sprites_layer_move_error_up'] = "Failed to move layer up!";
$lang['sprites_layer_move_error_down'] = "Failed to move layer down!";
$lang['sprites_layer_move_is_up'] = "Selected layer is already the top layer!";
$lang['sprites_layer_move_is_down'] = "Selected layer is already the bottom layer!";
$lang['sprites_editlayer'] = "Edit layer";
$lang['sprites_editlayer_succesful'] = "Layer edited succesfully!";
$lang['sprites_layer'] = "Layer";
$lang['sprites_itemneeded'] = "Item Needed";
$lang['sprites_itemneeded_explain'] = "Enter the name of the item which the user has to have to select this image! Make sure you use correct capitalization!<br />Leave blank if you do not want to use this feature!";
$lang['sprites_dontshowlayer'] = "Don't show layer";
$lang['sprites_dontshowlayer_explain'] = "If this image is selected, the layer you select here will not be shown. Like if you select a certain helmet you do not want the hair layer to show!<br />Choose <b>[none]</b> if you don't want to use this feature!";
$lang['sprites_dont_use_nolayer'] = "[none]";
$lang['sprites_addimage'] = "Add image";
$lang['sprites_addimage_succesful'] = "Image added succesfully!";
$lang['sprites_noimageselected'] = "No image specified!";
$lang['sprites_imagedeleted_succesful'] = "Image deleted succesfully!";
$lang['sprites_imagedeleted_succesful_explain'] = "(The image has been deleted from the database, but it is still on your FTP! <br />You will have to remove the image from your FTP manually if you do not want it anymore!)";
$lang['sprites_editimage'] = "Edit image";
$lang['sprites_editimage_succesful'] = "Image edited succesfully!";

// --- Added in v2.4.0 ---
// Urls in Scripts!
$lang['script_goto_url'] = "<u>Or</u> go to URL:";

//$lang[''] = '';

?>