<?php
/**
*
* @package Icy Phoenix
* @version $Id: lang_admin.php 41 2009-07-14 08:11:27Z Mighty Gorgon $
* @copyright (c) 2008 Icy Phoenix
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
* @Icy Phoenix is based on phpBB
* @copyright (c) 2008 phpBB Group
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
* @Extra credits for this file
* (c) 2002 Meik Sievertsen (Acyd Burn)
* Lopalong
*** French Translation Vendethiel and Yros **
*/


if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
// Modules, this replaces the keys used
	'Control_Panel' => 'Panneau de contr&ocirc;le',
	'Shadow_attachments' => 'Fichiers fant&ocirc;mes',
	'Forbidden_extensions' => 'Extensions interdites',
	'Extension_control' => 'Contr&ocirc;le des extensions',
	'Extension_group_manage' => 'Contr&ocirc;le des groupes d&#39;extension',
	'Special_categories' => 'Cat�gories sp�ciales',
	'Sync_attachments' => 'Synchroniser les fichiers joints',
	'Quota_limits' => 'Quotas',

// Attachments -> Management
	'Attach_settings' => 'Configuration des fichiers joints',
	'Manage_attachments_explain' => '<b>Configurez les r�glages principaux pour les fichiers joints.</b><br /> Si vous cliquez sur le bouton "Essayer les r�glages", le Module fera plusieurs tests pour v�rifier que le module marchera correctement. Si vous avez un probl&egrave;me lors de l&#39;envoi des fichiers, lancez ce test pour avoir une erreur d�taill�e.',
	'Attach_filesize_settings' => 'Configuration de la taille des fichiers',
	'Attach_number_settings' => 'Configuration de la num�rotation des fichiers',
	'Attach_options_settings' => 'Options des fichiers',

	'Upload_directory' => 'Dossier d&#39;envoi',
	'Upload_directory_explain' => 'Entrez le dossier relatif &agrave; votre installation IcyPhoenix pour l&#39;envoi des fichiers. Par exemple, entrez <b>files</b> si votre installation IcyPhoenix est situ�e sur http://www.votredomaine.fr/ip et le dossier d&#39;upload est situ� &agrave; http://www.votredomaine.fr/ip/files.',
	'Attach_img_path' => 'Ic&ocirc;ne sur les messages avec un fichier joint',
	'Attach_img_path_explain' => 'Cette image est affich� &agrave; c&ocirc;t� du lien pour t�l�charger le fichier dans les messages. Laissez ce champ blanc si vous ne voulez pas afficher d&#39;ic&ocirc;ne. Cette option sera �cras�e par celle du contr&ocirc;le de l&#39;extension des groupes.',
	'Attach_topic_icon' => 'Ic&ocirc;ne sur les sujets avec un fichier joint',
	'Attach_topic_icon_explain' => 'Cette image est affich�e &agrave; c&ocirc;t� du nom des sujets poss&egrave;dant un/des fichier(s) joint(s). Laissez ce champ vide si vous ne voulez pas afficher d&#39;ic&ocirc;ne.',
	'Attach_display_order' => 'Ordre d&#39;affichage des fichiers attach�s',
	'Attach_display_order_explain' => 'Choississez comment afficher les fichiers joints dans les messages/messages priv�s en ordre Descendant (Nouveaux en haut) / Ascendant (Anciens en haut).',
	'Show_apcp' => 'Montrer le nouveau panneau de contr&ocirc;le des fichiers joints lors de l&#39;envoi d&#39;un message',
	'Show_apcp_explain' => 'Choississez to montrer (ou non) le nouveau panneau de contr&ocirc;le (oui) ou l&#39;ancien avec 2 cadres pour attacher et �diter les fichiers d�j&agrave; attach�s (non). Il est compliqu� d&#39;expliquer l&#39;apparence de chacun des deux, le mieux pour vous rendre compte est de tester.',

	'Max_filesize_attach' => 'Taille du fichier',
	'Max_filesize_attach_explain' => 'Taille maximum des fichiers joints. Mettre 0 en valeur signifie &#39;illimit�&#39;. Cette option est restreinte par la configuration de votre serveur. Par exemple, si votre configuration PHP autorise au maximum des envois de 2MB, l&#39;option sera brid�e &agrave; 2MB.',
	'Attach_quota' => 'Quota',
	'Attach_quota_explain' => 'Taille maximum que peuvent prendre TOUS les fichiers attach�s sur votre h�bergement. Mettre 0 en valeur signifie &#39;illimit�&#39;.',
	'Max_filesize_pm' => 'Taille maximum totale des fichiers dans les messages priv�s',
	'Max_filesize_pm_explain' => 'Espace disque maximum que chaque utilisateur peut avoir dans sa bo�te de messages priv�s. Mettre 0 en valeur signifie &#39;illimit�&#39;.',
	'Default_quota_limit' => 'Quota limite par d�faut',
	'Default_quota_limit_explain' => 'S�lectionnez le quota limite automatiquement donn� aux utilisateurs qui vont s&#39;enregistrer, et &agrave; ceux qui n&#39;ont pas de limite d�finie. L&#39;option &#39;Pas de quota limite&#39; signifie ne pas utiliser les quotas, &agrave; la place d&#39;utiliser les r�glages par d�faut.',

	'Max_attachments' => 'Nombre maximum de fichiers joints',
	'Max_attachments_explain' => 'Le nombre maximum de fichiers qui peuvent &ecirc;tre joints avec un message.',
	'Max_attachments_pm' => 'Nombre maximum de fichiers joints (MP)',
	'Max_attachments_pm_explain' => 'Le nombre maximum de fichiers qui peuvent &ecirc;tre joints avec un message priv�.',

	'Disable_mod' => 'D�sactiver les fichiers joints',
	'Disable_mod_explain' => 'Cette option est surtout faite pour tester les nouveaux th&egrave;mes, cela d�sactive toutes les fonctionnalit�s des fichiers joints sur le panneau de contr&ocirc;le.',
	'PM_Attachments' => 'Autoriser les fichiers joints dans les messages priv�s',
	'PM_Attachments_explain' => 'Autoriser/Interdire de joindre des fichiers dans les messages priv�s.',
	'Ftp_upload' => 'Autoriser l&#39;envoi de fichiers par FTP',
	'Ftp_upload_explain' => 'Activer/D�sactiver l&#39;envoi de fichiers par FTP. Si vous choississez oui, vous devrez d�finir la configuration pour la connexion au FTP, et le dossier d&#39;envoi ne sera plus utilis�.',
	'Attachment_topic_review' => 'Voulez-vous afficher les fichiers joints dans la fen&ecirc;tre de revue de sujet ?',
	'Attachment_topic_review_explain' => 'Si vous choississez oui, tous les fichiers attach�s seront affich�s dans la revue du sujet quand vous envoyez un message.',

	'Ftp_server' => 'Serveur d&#39;envoi FTP',
	'Ftp_server_explain' => 'Entrez l&#39;adresse IP ou le nom de domaine du serveur pour envoyer vos fichiers. Si vous laissez ce champ vide, le serveur o&ugrave; IcyPhoenix est install� sera utilis�. Veuillez noter qu&#39;il est interdit d&#39;ajouter ftp:// ou quelque chose d&#39;autre dans l&#39;adresse, "ftp.votredomaine.fr" ou (ce qui est plus rapide) l&#39;adresse IP suffisent largement.',

	'ftp_username' => 'Nom d&#39;utilisateur FTP',
	'ftp_password' => 'Mot de passe FTP',

	'Attach_ftp_path' => 'Dossier d&#39;envoi sur le FTP',
	'Attach_ftp_path_explain' => 'Le dossier o&ugrave; les fichiers joints seront stock�s. Ce dossier n&#39;a pas besoin d&#39;avoir un CHMOD. Veuillez ne pas entrer l&#39;adresse IP / le nom de domaine du FTP, ce champ ne prend que le nom du dossier, par exemple: /home/web/envois/',
	'Ftp_download_path' => 'Lien vers le dossier d&#39;envois du FTP',
	'Ftp_download_path_explain' => 'Entrez l&#39;adresse vers le dossier o&ugrave; sont stock�s les fichiers joints.<br />Si vous utilisez un serveur FTP distant, veuillez entrer l&#39;adresse compl&egrave;te, par exemple http://www.mesfichiers.com/ip/envois.<br />Si vous utilisez le serveur o&ugrave; IcyPhoenix est install� pour stocker vos fichiers, vous pouvez rentrer le dossier relatif au dossier qui contient IcyPhoenix, par exemple &#39;envois&#39;. Laissez ce champ vide si le dossier n&#39;est pas accessible via internet. En laissant ce champ vide vous ne pourrez utiliser le t�l�chargement.',
	'Ftp_passive_mode' => 'Activer le mode "passif" sur le FTP',
	'Ftp_passive_mode_explain' => 'La commande PASV envoi une requ&ecirc;te au serveur distant, ouvre un port pour la connexion et retourne l&#39;adresse de ce port. Le serveur distant se connectera alors &agrave; ce port.',

	'No_ftp_extensions_installed' => 'Vous ne pouvez utiliser l&#39;envois par FTP, parce que l&#39;extension FTP n&#39;est pas activ�e dans votre installation PHP.',

// Attachments -> Shadow Attachments
	'Shadow_attachments_explain' => 'Supprimer les informations sur les fichiers joints dans les messages avec des fichiers n&#39;existant plus, et supprimer les fichiers qui ne sont plus attach�s &agrave; des fichiers. Vous pouvez voir ou t�l�cahrger un fichier en cliquant dessus ; si aucun lien n&#39;est disponible, cela signifie que le fichier n&#39;existe plus.',
	'Shadow_attachments_file_explain' => 'Supprimer tous les fichiers qui existent sur votre h�bergement mais qui ne sont plus rattach�s &agrave; un message.',
	'Shadow_attachments_row_explain' => 'Supprimer toutes les informations sur les fichiers joints pour les fichiers qui n&#39;existent plus sur votre syst&egrave;me.',
	'Empty_file_entry' => 'Liste vide',

// Attachments -> Sync
	'Sync_thumbnail_recreated' => 'Miniature cr��e pour: %s', // replace %s with physical Filename
	'Sync_thumbnail_resetted' => 'Miniature refaire pour: %s', // replace %s with physical Filename
	'Attach_sync_finished' => 'Synchronisation des fichiers joints termin�e.',
	'Sync_topics' => 'Synchroniser les sujets',
	'Sync_posts' => 'Synchroniser les messages',
	'Sync_thumbnails' => 'Synchroniser les miniatures',


// Extensions -> Extension Control
	'Manage_extensions' => 'Gestion des extensions',
	'Manage_extensions_explain' => 'Modifier les extensions de fichiers. Si vous voulez autoriser/interdire une extension pour les fichiers joints, veuiillez utiliser l&#39;extension de contr&ocirc;le des groupes.',
	'Explanation' => 'Explication',
	'Extension_group' => 'Groupe d&#39;extension',
	'Invalid_extension' => 'Extension invalide',
	'Extension_exist' => 'L&#39;extension %s existe d�j&agrave;', // replace %s with the Extension
	'Unable_add_forbidden_extension' => 'L&#39;extension %s est interdite, vous ne pouvez l&#39;ajouter aux extensions autoris�es', // replace %s with Extension

// Extensions -> Extension Groups Management
	'Manage_extension_groups' => 'G�rer les groupes d&#39;extensions',
	'Manage_extension_groups_explain' => 'Ajouter, supprimer et modifier vos groupes d&#39;extensions, vous pouvez d�sactiver les groupes d&#39;extensions, leur assigner une cat�gorie sp�ciale, changer la mani&egrave;re de t�l�chargement et d�finir un ic&ocirc;ne pour le groupe.',
	'Special_category' => 'Cat�gorie sp�ciale',
	'Category_images' => 'Images',
	'Category_stream_files' => 'Fichiers stream', #signification de "stream" ici ?
	'Category_swf_files' => 'Fichiers Flash',
	'Allowed' => 'Autoris�',
	'Allowed_forums' => 'Forums autoris�s',
	'Ext_group_permissions' => 'Permissions des groupes',
	'Download_mode' => 'Mode t�l�chargement',
	'Upload_icon' => 'Ic&ocirc;ne d&#39;envoi',
	'Max_groups_filesize' => 'Taille maximum des fichiers',
	'Extension_group_exist' => 'Le groupe d&#39;extension %s existe d�j&agrave;', // replace %s with the group name
	'Collapse' => '+',
	'Decollapse' => '-',

// Extensions -> Special Categories
	'Manage_categories' => 'G�rer les cat�gories sp�ciales',
	'Manage_categories_explain' => 'Ajouter des param&egrave;tres sp�ciaux et des conditions pour les cat�gories sp�ciales assign�es aux groupes d&#39;extensions.',
	'Settings_cat_images' => 'Options pour les cat�gories sp�ciales: Images',
	'Settings_cat_streams' => 'Options pour les cat�gories sp�ciales: Fichiers Stream',
	'Settings_cat_flash' => 'Options pour les cat�gories sp�ciales: fichiers Flash',
	'Display_inlined' => 'Afficher les images directement dans le message',
	'Display_inlined_explain' => 'Choississez d&#39;afficher ou non les images jointes directement sur le message (oui) ou afficher les images avec un lien (non) ?',
	'Max_image_size' => 'Dimensions maximum des images',
	'Max_image_size_explain' => 'D�finissez les dimensions maximum des images pouvant &ecirc;tre jointes (Longueur x Largeur en pixels).<br />Si vous choississez "0x0" comme valeur, aucune v�rification ne sera faite. Avec certaines images, cette v�rification ne marchera pas &agrave; cause de limitations PHP.',
	'Image_link_size' => 'Dimensions des images-lien',
	'Image_link_size_explain' => 'Si l&#39;image est plus grande que le maximum, elle sera affich�e en tant que lien, au lieu de la visualiser directement dans le message (Hauteur x Largeur en pixels).<br />Si vous rentrer choissisez "0x0" comme valeur, cette fonctionnalit� sera d�sactiv�e. Avec certaines images cette fonctionnalit� ne marchera pas &agrave; cause de limitations PHP.',
	'Assigned_group' => 'Groupe assign�',

	'Image_create_thumbnail' => 'Cr�er une miniature',
	'Image_create_thumbnail_explain' => 'Toujours cr�er une miniature. Cette fonctionnalit� �crase la configuration des cat�gories sp�ciales, sauf la configuration des des dimensions maximum. Si vous activez cette fonctionnalit�, une miniature sera affich�e dans le message, que l&#39;utilisateur pourra cliquer pour voir l&#39;image originale.<br />Veuillez noter que cette fonctionnalit� n�c�ssite Imagick. Si Safe-Mode est activ�, le module PHP GD sera activ�. Si le type d&#39;image n&#39;est pas reconnue par PHP, cette fonctionnalit� ne sera pas utilis�e.',
	'Image_min_thumb_filesize' => 'Taille minimum pour cr�er une miniature',
	'Image_min_thumb_filesize_explain' => 'Si une image est plus petite que la taille, la miniature ne sera pas cr�e car l&#39;image sera jug�e suffisament petite.',
	'Image_imagick_path' => 'Programme Imagick (Chemin complet)',
	'Image_imagick_path_explain' => 'Entrez le chemin complet du programme Imagick, normallement /usr/bin/convert sous linux et c:/imagemagick/convert.exe sous windows.',
	'Image_search_imagick' => 'Chercher imagick',

	'Use_gd2' => 'Utiliser l&#39;extension GD2',
	'Use_gd2_explain' => 'PHP peut &ecirc;tre compil� avec l&#39;extension GD1 ou GD2 pour la manipulation d&#39;image. Pour cr�er correctement des miniatures sans imagick, le module de fichiers joints utilisera deux m�thodes, selon votre configuration. Si vos miniatures sont de mauvaises qualit�s ou ne s&#39;affichent pas, essayez de changer ce param&egrave;tre.',
	'Attachment_version' => 'Attachment Mod Version %s', // %s is the version number

// Extensions -> Forbidden Extensions
	'Manage_forbidden_extensions' => 'G�rer les extensions interdites',
	'Manage_forbidden_extensions_explain' => 'Ajouter ou supprimes des extensions interdites. Les extensions php, php3 et php4 sont interdites par d�faut et ne peuvent &ecirc;tre supprim�es pour des raisons de s�curit�.',
	'Forbidden_extension_exist' => 'L&#39;extension interdite %s existe d�j&agrave;', // replace %s with the extension
	'Extension_exist_forbidden' => 'L&#39;extension %s existe d�j&agrave; dans la liste des extensions autoris�es, veuillez d&#39;abord la supprimer de celle-ci.', // replace %s with the extension

// Extensions -> Extension Groups Control -> Group Permissions
	'Group_permissions_title' => 'Permissions des groupes d&#39;extensions -> &#39;%s&#39;', // Replace %s with the Groups Name
	'Group_permissions_explain' => 'Restreindre le groupe d&#39;extensions sur le forum de votre choix (dans le cadre "Forums autoris�s"). Par d�faut, tous les forums sont s�lectionn�s. Ajoutez les forums que vous voulez autoriser pour ce groupe d&#39;extension, la configuration par d�faut "TOUS LES FORUMS" dispara�tra quand vous aurez ajout� les forums &agrave; la liste. Vous pourrez re-choisir "TOUS LES FORUMS" si vous le voulez. Si vous ajouter un forum et que les permissions sont sur "TOUS LES FORUMS", rien ne se passera (le forum sera bien pris en compte). MAis si vous avec chang� les restrictions d&#39;utilisation &agrave; certains forums, vous devrez revenir ici pour cocher le nouveau forum.', //It is easy to do this automatically, but this will force you to edit a bunch of Files, therefore I have chosen the way it is now. Please keep in mind, that all of your Forums will be listed here.',
	'Note_admin_empty_group_permissions' => '<b>NOTE:</b> Dans la liste ci-dessous des forums, vos utilisateurs normalement autoris�s &agrave; attacher des fichiers qui essayeront d&#39;attacher des fichiers dans un forum dans lequel ils n&#39;ont pas le droit recevront un message d&#39;erreur. Vous pouvez changer la permission &#39;Poster un fichier&#39; &agrave; &#39;ADMIN&#39; dans ces forums.<br /><br />',
	'Add_forums' => 'Ajouter un forum',
	'Add_selected' => 'Ajouter la s�lection',
	'Perm_all_forums' => 'TOUS LES FORUMS',

// Attachments -> Quota Limits
	'Manage_quotas' => 'G�rer les limites de quota',
	'Manage_quotas_explain' => 'Ajouter, modifier ou supprimer les limites de quota. Vous pouvez assigner les quotas pour les utilisateurs et groupes plus tard. Si vous assignez un quota &agrave; un utilisateur, vous devez aller dans Utilisateurs > G�rer, s�lectionner l&#39;utilisateur, les options seront en bas de la page. Pour assigner un quota &agrave; un groupe, allze dans Groupes > G�rer, s�lectionner le groupe &agrave; �diter et configurez le quota. Si vous voulez savoir quels utilisateurs/groupes sont assign�es &agrave; un quota sp�cifique, cliquez sur &#39;View&#39; &agrave; gauche de la description du quota.',
	'Assigned_users' => 'Utilisateurs assign�s',
	'Assigned_groups' => 'Groupes assign��s',
	'Quota_limit_exist' => 'Le quota %s existe d�j&agrave;.', // Replace %s with the Quota Description

// Attachments -> Control Panel
	'Control_panel_title' => 'Panneau de contr&ocirc;le des fichiers attach�s',
	'Control_panel_explain' => 'Voir et contr&ocirc;ler tous les fichiers attach�s, bas� sur les utilisateurs, fichiers joints, vues, et&ccedil;...',
	'File_comment_cp' => 'Commentaire',

// Control Panel -> Search
	'Search_wildcard_explain' => 'Utilisez * comme joker pour les recherches partielles',
	'Size_smaller_than' => 'Taille du fichier plus petite que (bytes)',
	'Size_greater_than' => 'Taille du fichier plus grande que (bytes)',
	'Count_smaller_than' => 'Compteur de t�l�chargement plus petit que',
	'Count_greater_than' => 'Compteur de t�l�chargement plus grand que',
	'More_days_old' => 'Ajout� il y a plus de (jours)',
	'No_attach_search_match' => 'Aucun fichier n&#39;a �t� trouv� selon vos crit&egrave;res',

// Control Panel -> Statistics
	'Number_of_attachments' => 'Nombre de fichiers joints',
	'Total_filesize' => 'Taille totale',
	'Number_posts_attach' => 'Nombre de messages avec un/des fichier(s)',
	'Number_topics_attach' => 'Nombre de sujets avec un/des fichier(s)',
	'Number_users_attach' => 'Fichiers envoy�s par des utilisateurs ind�pendants',
	'Number_pms_attach' => 'Nombre total de fichiers joints dans les messages priv�s',

// Control Panel -> Attachments
	'Statistics_for_user' => 'Statistiques de %s', // replace %s with username
	'Size_in_kb' => 'Taille (KB)',
	'Downloads' => 'T�l�chargements',
	'Post_time' => 'Date du message',
	'Posted_in_topic' => 'Post� dans le sujet',
	'Submit_changes' => 'Enregistrer les modifications',

// Sort Types
	'Sort_Attachments' => 'Fichiers joints',
	'Sort_Size' => 'Taille',
	'Sort_Filename' => 'Nom du fichier',
	'Sort_Comment' => 'Comment',
	'Sort_Extension' => 'Extension',
	'Sort_Downloads' => 'T�l�chargements',
	'Sort_Posttime' => 'Date du message',
	'Sort_Posts' => 'Messages',

// View Types
	'View_Statistic' => 'Statistiques',
	'View_Search' => 'Recherche',
	'View_Username' => 'Nom d&#39;utilisateur',
	'View_Attachments' => 'Fichiers joints',

// Successfully updated
	'Attach_config_updated' => 'La configuration des fichiers joints &agrave; �t� correctement mise &agrave; jour',
	'Click_return_attach_config' => 'Cliquez %sici%s pour retourner &agrave; la configuration des fichiers joints',
	'Test_settings_successful' => 'Les tests sont concluants, la configuration semble marcher.',

// Some basic definitions
	'Attachments' => 'Fichiers joints',
	'Attachment' => 'Fichier joint',
	'Extensions' => 'Extensions',
	'Extension' => 'Extension',

// Auth pages
	'Auth_attach' => 'Poster des fichiers',
	'Auth_download' => 'T�l�charger des fichiers',
	)
);

$lang['Image_max_thumb_size'] = 'Plus grande taille pour le c�t� d\'une image';
$lang['Image_max_thumb_size_explain'] = 'Si un c�t� de l\'image est plus grand que cette taille, l\'aper�u sera pareil qu\'une image.';
$lang['Image_thumb_quality'] = 'Qualit� des aper�us';
$lang['Image_thumb_quality_explain'] = 'Change la qualit� des aper�us, allant de 0 (mauvaise qualit�, aper�us l�gers) � 100 (meilleure qualit�, plus grande taille de fichier).';


?>