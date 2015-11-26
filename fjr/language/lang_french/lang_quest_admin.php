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

$lang['tile'] = 'Tuile';
$lang['tiles'] = 'tuiles';
$lang['coordinates'] = 'Coordonnées';
$lang['hori'] = 'horizontal';
$lang['vert'] = 'vertical';
$lang['change'] = 'Changer';
$lang['change_lowercase'] = 'changer';
$lang['error'] = 'Erreur';
$lang['inv_hori'] = 'Tuile invalide --> Horizontal!';
$lang['inv_vert'] = 'Tuile invalide --> Vertical!';
$lang['or'] = 'ou';
$lang['fill'] = 'Remplir';
$lang['fill_info'] = '(Cela remplira la carte entière des tuiles selectionnées!)';
$lang['map'] = 'Carte';
$lang['maps'] = 'cartes';
$lang['new'] = 'Nouveau';
$lang['save'] = 'Sauver';
$lang['load'] = 'Charger';
$lang['base'] = 'Base';
$lang['base_tile'] = 'Tuile de base';
$lang['unnamed_map'] = 'Carte sans nom';
$lang['map_name'] = "Nom  de la carte";
$lang['map_width'] = "Largeur de la carte";
$lang['map_height'] = "Hauteur de la carte";
$lang['change_map_name'] = "Changer le nom de la carte";
$lang['create_map'] = "Creer carte";
$lang['new_map'] = "Nouvelle carte";
$lang['load_map'] = "Charger carte";
$lang['save_map'] = "Sauver carte";
$lang['name'] = 'Nom';
$lang['name_info'] = 'Le nom de la carte';
$lang['width'] = 'Largeur';
$lang['width_info'] = 'Combien de tuile horizontalement';
$lang['height'] = 'Hauteur';
$lang['height_info'] = 'Combien de tuiles verticalement';
$lang['create'] = 'Creer';
$lang['create_title'] = 'Creer une nouvelle carte';
$lang['saved_error'] = 'Echec de sauvegarde de la carte!';
$lang['saved_succesfully'] = 'Carte sauvée avec succes!';
$lang['load_error'] = 'Echec de chargement de la carte!';
$lang['db_error'] = 'La base de données a retournée:';
$lang['go_back'] = 'Retour';
$lang['lister'] = '#';
$lang['load_saved'] = 'Charger une carte sauvée';
$lang['no_maps_found'] = 'Aucune carte trouvée!';
$lang['delete'] = 'Effacer';
$lang['delete_all'] = 'Effacer tout';
$lang['delete_check'] = 'Es tu sur de vouloir effacer la carte?';
$lang['delete_error'] = 'Echec effacement de la carte!';
$lang['delete_succesfully'] = 'Carte effacée avec succes!';
$lang['delete_all_check'] = 'Es tu sur de vouloir effacer toutes les cartes?';
$lang['delete_all_error'] = 'Echec effacement de toutes les cartes!';
$lang['delete_all_succesfully'] = 'Toutes les cartes effacées avec succes!';
$lang['Yes'] = 'Oui';
$lang['No'] = 'Non';

$lang['overwrite'] = "Ecraser";
$lang['map_name_exists'] = "Une carte avec ce nom existe deja!";
$lang['what_to_do'] = "Que voulez vous faire?";
$lang['save_as_new'] = "Sauver comme une nouvelle carte";
$lang['this_map_id'] = "L'ID de la carte est:";
$lang['overwrite_succesfully'] = "Carte écrasée avec succes!";

$lang['walkable'] = "Déplacable";
$lang['image'] = "Image";
$lang['no_tile_selected'] = "<i>Aucun titre selectionné!</i><br>Retournez en arrière et recommencez svp!";
$lang['is_now_walkable'] = "est paramétré en <b>Déplacable</b>";
$lang['is_now_non_walkable'] = "est paramétré en <b>non-déplacable</b>";
$lang['tile_changed_succesfully'] = "Tuile changé avec succes!";

$lang['map_from'] = 'de';
$lang['map_to'] = 'pour';
$lang['map_text'] = 'Texte';
$lang['coordinates_hv'] = 'Coordonées<br /><span class="gensmall">(Horizontal x Vertical)</span>';
$lang['edit'] = 'Editer';
$lang['no_teleport_id_specified'] = "Pas de téléportation spécifiée!";
$lang['edit_teleport'] = "Editer teleportation";
$lang['new_teleport'] = "Créer une nouvelle Teleportation";
$lang['edit_teleport_succesful'] = "Teleportation editée avec succes!";
$lang['create_new_teleport'] = "Créer une nouvelle teleportation!";
$lang['create_new_teleport_button'] = "Créer teleportation!";
$lang['didnt_fill_all_fields'] = "Vous n'avez pas complétés tous les champs demandés!";
$lang['create_teleport_succesful'] = "Teleportation crée avec succes!";
$lang['delete_teleport_succesful'] = "Teleportation effacée avec succes!";
$lang['go_to'] = "Aller a";
$lang['teleport_text_explain'] = "Ce texte sera affiché dans le bouton de teleportation apres '<b>".$lang['go_to']."</b>'. Cela est optionnel: Laiser blanc pour utiliser le nom de la carte ciblée, ou l'URL ciblé(si specifiée).";

$lang['url'] = "URL";
$lang['url_explain'] = "Au lieu de téléporter vers une nouvelle carte, cela ouvrira une nouvelle fenetre pour l'utilisateur. Vous pouvez spécifier l' URL vers cette page ici. Guardez a l'esprit que l'URL doit être a <b>forum root</b>!<br />Laissez cela blanc si vous ne voulez pas utilisez cette option, et juste faire une téléportation normale!";
$lang['map_id_exists'] = "Une carte avec cet ID existe deja!";

// Export map!
$lang['export_map'] = "Exporter Carte";
$lang['export_view'] = "Click ici pour voir les cartes exportées!";
$lang['export_succesfully'] = "Carte exportée avec succes!";
$lang['export_save_first'] = "Sauvez votre carte en premier svp!";
$lang['export_check_error'] = "Echec de la prise d infos dans la base de données!";
$lang['export_make_sure_to'] = "Soyez sur d'exporter la carte!";

// NPCs System
$lang['description'] = 'Description';
$lang['action'] = 'Action';
$lang['portrait'] = 'Portrait';
$lang['add_npc'] = 'Ajouter un nouveau NPC';
$lang['use_from_list'] = "Choisir une action dans la liste";
$lang['or_type_custom'] = "Ou choisir une action courante:";
$lang['add_npc_button'] = "Ajouter NPC";
$lang['add_npc_succesful'] = "NPC ajoutée avec succes!";
$lang['no_npc_id_specified'] = "Pas de NPC selectionné!";
$lang['delete_npc_succesful'] = "NPC effacée avec succes!";
$lang['edit_npc'] = 'Editer NPC';
$lang['edit_npc_succesful'] = "NPC editée avec succes!";
$lang['npc_script'] = "Script ID";
$lang['npc_script_explain'] = "Cela sera la conversation de début pour ce NPC! Donc quand un perso veux communiquer avec ce NPC, le script avec l' ID viendra en tant que première partie de la conversation!";

// Scripts System
$lang['npc_name'] = "NPC";
$lang['script_text'] = "Texte";
$lang['goto_script_number'] = "aller au script";
$lang['add_script'] = 'Ajouter nouveau script';
$lang['add_script_button'] = "Ajouter script";
$lang['add_script_succesful'] = "Script ajouté avec succes!";
$lang['no_script_id_specified'] = "Pas de script selectionné!";
$lang['delete_script_succesful'] = "Script effacé avec succes!";
$lang['edit_script'] = 'Editer script';
$lang['edit_script_succesful'] = "Script edité avec succes!";
$lang['script_answer'] = "Repondre";
$lang['script_close'] = "fermer";
$lang['script_none'] = "Rien";
$lang['npc_default'] = "Utiliser NPC Portrait";
$lang['goto_script'] = "Aller au script script avec l' ID";
$lang['npc_default_action'] = "Utiliser NPC Action";
$lang['user_zero_for_closing'] = "(Utiliser <b>0</b> si vous voulez que la reponse ferme la fenetre du NPC!)";
$lang['update'] = "Mettre a jour";
$lang['update_explain'] = "Si vous changez le NPC, click sur le bouton de mise a jour sinon l'action du NPC et son portrait ne seront pas montré dans cette page!";

// Sort list
$lang['sort_list'] = "Sort liste par";
$lang['order_by_npc'] ="Nom du NPC";
$lang['order_by_script'] ="Script ID";
$lang['order_by_both'] ="Nom du NPC, Script ID";
$lang['order_by_npc_id'] = "ID";
$lang['order_by_npc_name'] = "Nom";
$lang['order_by_target_map'] = "ID de la carte ciblée";
$lang['order_by_from_map'] = "Depuis l'ID de la carte";
$lang['sort_asc'] = "Montant";
$lang['sort_desc'] = "Descendant";
$lang['go'] = "Aller";

// User Admin
$lang['user_admin'] = "User Admin";
$lang['users_explain'] = "Cette page vous permet de deplacer instantanément un perso d'une localisation a une autre, ou deplacer tous les persos a l'endroit ou vous voulez. Cela peut etre utilisé comme solution pour un prso coincé quelque part, ou pour changer la location de tout le monde!";
$lang['users_set_all'] = "Deplacer tous les persos";
$lang['users_set_single'] = "Deplacer un seul perso";
$lang['users_do_move'] = "Deplacer perso";
$lang['users_do_all'] = "Déplacer tous les persos";
$lang['users_move_succesful'] = "Perso déplacé avec succes!";
$lang['users_all_move_succesful'] = "Tous les peros déplacés avec succes!";
$lang['users_username'] = "Nom du perso";
$lang['users_username_explain'] = "Soyez sur de la propre capitalsation du perso!";
$lang['users_doesnt_exist'] = "Ce perso n'existe pas!";

// --- Added in v2.3.0 ---
// Character Sprites
$lang['sprites_admin_help'] = "Ici vous pouvez configurer l'option des apparences des personnages! Les utilisateurs seront capable de créer la propre apparence de leur personnage a l'aide des images que vous aurez selectionnés. Vous pouvez toujours configurer les objets requis pour chaque image, donc l'utilisateur devra d'abord acheter l'objet portant le meme nom que le layer qu'il a selectionné pour son personnage!<br /><br />Ce systeme de personnage utilise des 'layers', qui détermine l'ordre d'apparition des images; dont une sera au premier plan, etc.<br /><br />Pour qu'ils éditent les apparences eux meme vous devez cliquer sur le boutton 'Editer Images' ! Apres vous devez configurer différents layers, vous pouvez assigner une image a chaque layer. C'est tres simple! Regardez un peu partout ce que font les options, vous aurez des résultats fabuleux!";
$lang['sprites_character_sprites'] = "Apparences personnage";
$lang['sprites_edit_layers'] = "Editer Layers";
$lang['sprites_edit_images'] = "Editer Images";
$lang['sprites_move_up'] = "Monter";
$lang['sprites_move_down'] = "Descendre";
$lang['sprites_position'] = "Position";
$lang['sprites_compulsive'] = "Compulsif";
$lang['sprites_compulsive_explain'] = "Si vous configurez cela sur 'Non', les utilisateur pourront selectionner '[rien]' qui resultera sur une tache blanche pour ce layer. Cela ne sera pas tres bon pour certaines options de layers, mais ne sera pas utilisé pour certains layers comme la peau ou la tete!";
$lang['sprites_move'] = "Déplacer Layer";
$lang['sprites_newlayer'] = "Nouveau Layer";
$lang['sprites_createnewlayer'] = "Créer un nouveau layer";
$lang['sprites_newlayer_succesful'] = "Layer créé avec succes!";
$lang['sprites_layerdeleted_succesful'] = "Layer effacé avec succes!";
$lang['sprites_nolayerselected'] = "Pas de layer spécifié!";
$lang['sprites_layer_moved_succesful'] = "Layer deplacé avec succes!";
$lang['sprites_layer_move_error_up'] = "Echec de la montée du layer!";
$lang['sprites_layer_move_error_down'] = "Echec de la descente du layer!";
$lang['sprites_layer_move_is_up'] = "Le layer selectionné est deja le layer du haut!";
$lang['sprites_layer_move_is_down'] = "Le layer selectionné est deja le layer de fond!";
$lang['sprites_editlayer'] = "Editer layer";
$lang['sprites_editlayer_succesful'] = "Layer edité avec succes!";
$lang['sprites_layer'] = "Layer";
$lang['sprites_itemneeded'] = "Objet necessaire";
$lang['sprites_itemneeded_explain'] = "Entrer le nom de l'objet que le personnage doit posseder pour choisir cette image! Soyez sur d'utiliser la correcte capitalisation!<br />Laisser blanc pour ne pas utiliser cette option!";
$lang['sprites_dontshowlayer'] = "Ne pas montrer les layer";
$lang['sprites_dontshowlayer_explain'] = "Si cette image est selectionnée, le layer selectionné ici ne sera pas montré. Comme si vous aviez selectionné un casque, vous ne voudriez pas que le layer des cheveux soit affiché!<br />Choisir <b>[rien]</b> si vous ne voulez pas utiliser cette option!";
$lang['sprites_dont_use_nolayer'] = "[rien]";
$lang['sprites_addimage'] = "Ajouter image";
$lang['sprites_addimage_succesful'] = "Image ajoutée avec succes!";
$lang['sprites_noimageselected'] = "Pas d'images specifiée!";
$lang['sprites_imagedeleted_succesful'] = "Image effacée avec succes!";
$lang['sprites_imagedeleted_succesful_explain'] = "(L'image a été effacée de la base de données, mais existe tjrs via votre FTP! <br />Vous devez effacer manuellement cette image via votre FTP si vous ne voulez plus l'utiliser!)";
$lang['sprites_editimage'] = "Editer image";
$lang['sprites_editimage_succesful'] = "Image editée avec succes!";

// --- Added in v2.4.0 ---
// Urls in Scripts!
$lang['script_goto_url'] = "<u>Or</u> go to URL:";

//$lang[''] = '';

?>