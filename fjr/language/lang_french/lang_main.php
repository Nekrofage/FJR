<?php
/***************************************************************************
 *                            lang_main.php [french]
 *                              -------------------
 *     begin                : Sat Dec 16 2000
 *     copyright            : (C) 2004 PhpBB France
 *
 *     $Id: lang_main.php
 *
 ****************************************************************************/

/***************************************************************************
 *   English
 *   --------
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 *   Fran�ais
 *   ----------
 *   Ce programme est un logiciel libre : vous pouvez le redistribuer
 *   et/ou le modifier tel que le pr�voit la license GNU General Public License
 *   (GNU/GPL) publi�e par la Fondation des logiciels libres (Free Software Foundation)
 *   Est appliqu�e la version 2 de la licence ou n'importe quelle version ant�rieure
 *   de votre choix.
 *
 ***************************************************************************/

//
// Traduction : phpBB France (http://www.phpbbfrance.org/)
//

//
// The format of this file is ---> $lang['message'] = 'text';
//
// You should also try to set a locale and a character encoding (plus direction). The encoding and direction
// will be sent to the template. The locale may or may not work, it's dependent on OS support and the syntax

// varies ... give it your best guess!
//

$lang['ENCODING'] = 'ISO-8859-1';
$lang['DIRECTION'] = 'LTR';
$lang['LEFT'] = 'gauche';
$lang['RIGHT'] = 'droite';
$lang['DATE_FORMAT'] =  'd M Y'; // This should be changed to the default date format for your language, php date() format


// This is optional, if you would like a _SHORT_ message output
// along with our copyright message indicating you are the translator
// please add it here.

// Version de phpBB traduite en fran�ais par phpbbfrance.org , si vous souhaitez nous remercier
// vous pouvez retirer les commentaires // devant les deux lignes ci dessous afin d'afficher un lien
// vers notre forum.
//
//$lang['TRANSLATION'] = 'Traduction par : <a href="http://www.phpbbfrance.org/" target="_blank" class="copyright" title="Traduction de phpBB en fran�ais par phpBB France">phpBB France</a>';
$lang['TRANSLATION_INFO'] = 'Traduction par : <a href="http://www.phpbbfrance.org/" target="_blank" class="copyright" title="Traduction de phpBB en fran�ais par phpBB France">phpBBFrance.org</a>';
$lang['Premod'] = 'Pr�mod <a href="http://github.com/vendethiel/ezarena">ezArena</a> %s bas�e sur l\'Ultimarena';

$lang['Login_attempts_exceeded'] = 'Vous avez d�pass� le nombre maximal de tentatives de connexions (%s). Vous ne pourrez ainsi plus vous connecter pendant %s minutes.';
$lang['Please_remove_install_contrib'] = 'Afin de terminer l\'installation, veuillez supprimer le dossier <strong>install/</strong> pr�sent � la racine de votre forum.';
$lang['Session_invalid'] = 'Session invalide. Veuillez re-soumettre le formulaire.';
//
// Common, these terms are used
// extensively on several pages
//
$lang['Forum'] = 'Forum ';
$lang['Category'] = 'Cat�gorie ';
$lang['Topic'] = 'Sujet ';
$lang['Topics'] = 'Sujets';
$lang['Replies'] = 'R�ponses';
$lang['Views'] = 'Vus ';
$lang['Post'] = 'Message ';
$lang['Posts'] = 'Messages';
$lang['Posted'] = 'Post� ';
$lang['Username'] = 'Nom d\'utilisateur ';
$lang['Password'] = 'Mot de passe ';
$lang['Email'] = 'E-mail ';
$lang['Poster'] = 'Poster';
$lang['Author'] = 'Auteur ';
$lang['Time'] = 'Temps';
$lang['Hours'] = 'Heures ';
$lang['Message'] = 'Message ';
$lang['1_Day'] = '1 jour';
$lang['7_Days'] = '7 jours';
$lang['2_Weeks'] = '2 semaines';
$lang['1_Month'] = '1 mois';
$lang['3_Months'] = '3 mois';
$lang['6_Months'] = '6 mois';
$lang['1_Year'] = '1 an';
$lang['Go'] = 'Valider';
$lang['Jump_to'] = 'Aller vers';
$lang['Submit'] = 'Envoyer';
$lang['Reset'] = 'R�initialiser';
$lang['Cancel'] = 'Annuler';
$lang['Preview'] = 'Pr�visualisation';
$lang['Confirm'] = 'Confirmer';
$lang['Spellcheck'] = 'V�rificateur d\'orthographe';
$lang['Yes'] = 'Oui';
$lang['No'] = 'Non';
$lang['Enabled'] = 'Activ�';
$lang['Disabled'] = 'D�sactiv�';
$lang['Error'] = 'Erreur';
$lang['Next'] = 'Suivante';
$lang['Previous'] = 'Pr�c�dente';
$lang['Goto_page'] = 'Se rendre � la page :';
$lang['Joined'] = 'Inscrit le ';
$lang['IP_Address'] = 'Adresse IP ';
$lang['Select_forum'] = 'S�lectionner un forum';
$lang['View_latest_post'] = 'Voir le dernier message';
$lang['View_newest_post'] = 'Voir le message le plus r�cent';
$lang['Page_of'] = 'Page <b>%d</b> sur <b>%d</b>'; // Replaces with: Page 1 of 2 for example
$lang['ICQ'] = 'Num�ro ICQ ';
$lang['AIM'] = 'Adresse AIM ';
$lang['MSNM'] = 'MSN Messenger ';
$lang['YIM'] = 'Yahoo Messenger ';
$lang['Forum_Index'] = 'Forums %s';  // eg. sitename Forum Index, %s can be removed if you prefer
$lang['Post_new_topic'] = 'Poster un nouveau sujet';
$lang['Reply_to_topic'] = 'R�pondre au sujet';
$lang['Reply_with_quote'] = 'R�pondre en citant';
$lang['Click_return_topic'] = 'Cliquez %sici%s pour retourner au sujet de discussion'; // %s's here are for uris, do not remove!
$lang['Click_return_login'] = 'Cliquez %sici%s pour essayer � nouveau';
$lang['Click_return_forum'] = 'Cliquez %sici%s pour retourner au forum';
$lang['Click_view_message'] = 'Cliquez %sici%s pour voir votre message';
$lang['Click_return_modcp'] = 'Cliquez %sici%s pour retourner au panneau de contr�le du mod�rateur';
$lang['Click_return_group'] = 'Cliquez %sici%s pour retourner aux informations du groupe';
$lang['Admin_panel'] = 'Panneau de Contr�le de l\'Administrateur';
$lang['Board_disable'] = 'D�sol�, mais ce forum est actuellement indisponible. Veuillez r�essayer plus tard.';


//
// Global Header strings
//
$lang['Registered_users'] = 'Utilisateurs connect�s :';
$lang['Browsing_forum'] = 'Utilisateurs parcourant actuellement ce forum :';
$lang['Online_users_zero_total'] = 'Il n\'y a <b>aucun</b> utilisateur en ligne : ';
$lang['Online_users_total'] = 'Il y a <b>%d</b> utilisateurs en ligne : ';
$lang['Online_user_total'] = 'Il y a <b>%d</b> utilisateur en ligne : ';
$lang['Reg_users_zero_total'] = '0 Enregistr�, ';
$lang['Reg_users_total'] = '%d Enregistr�s, ';
$lang['Reg_user_total'] = '%d Enregistr�, ';
// www.phpBB-SEO.com SEO TOOLKIT BEGIN
$lang['Hidden_users_zero_total'] = '0 Invisible, ';
$lang['Hidden_user_total'] = '%d Invisible, ';
$lang['Hidden_users_total'] = '%d Invisibles, ';
$lang['Guest_users_zero_total'] = '0 Invit� et ';
$lang['Guest_users_total'] = '%d Invit�s et ';
$lang['Guest_user_total'] = '%d Invit� et ';
$lang['Bot_online'] = 'Bots : ';
$lang['Bot_nul'] = '0 Bots';
$lang['Bot_total'] = '%d Bots';
$lang['Bot_one'] = '%d Bot';
// www.phpBB-SEO.com SEO TOOLKIT END
$lang['Record_online_users'] = 'Le plus grand nombre d\'utilisateurs en ligne est de <b>%s</b> le %s'; // first %s = number of users, second %s is the date.
$lang['Legend'] = 'L�gende ';
$lang['Admin_online_color'] = '%sAdministrateur%s';
$lang['Mod_online_color'] = '%sMod�rateur%s';
$lang['User_online_color'] = '%sUtilisateur%s';
$lang['You_last_visit'] = 'Votre derni�re visite : %s'; // %s replaced by date/time
$lang['Current_time'] = 'Page g�n�r�e le : %s'; // %s replaced by date/time
$lang['Search_new'] = 'Voir les posts non lus';
$lang['Search_your_posts'] = 'Vos messages';
$lang['Search_unanswered'] = 'Les messages sans r�ponse';
$lang['Register'] = 'Inscription';
$lang['Profile'] = 'Profil';
$lang['Edit_profile'] = 'Editer votre profil';
$lang['Search'] = 'Recherche';
$lang['Memberlist'] = 'Membres';
$lang['FAQ'] = 'FAQ';
$lang['BBCode_guide'] = 'Guide du BBCode';
$lang['Usergroups'] = 'Groupes';
$lang['Last_Post'] = 'Derniers messages';
$lang['rmw_image_title'] = 'Cliquez pour agrandir'; // mod : Resize Posted Images Based on Max Width
$lang['Moderator'] = 'Mod�rateur ';
$lang['Moderators'] = 'Mod�rateurs ';


//
// Stats block text
//
$lang['Posted_articles_zero_total'] = 'Les membres n\'ont post� <b>aucun</b> message'; // Number of posts
$lang['Posted_articles_total'] = 'Les membres ont post� un total de <b>%d</b> messages'; // Number of posts
$lang['Posted_article_total'] = 'Les membres ont post� un total de <b>%d</b> message'; // Number of posts
$lang['Registered_users_zero_total'] = 'Il y a <b>0</b> utilisateur enregistr�'; // # registered users
$lang['Registered_users_total'] = 'Il y a <b>%d</b> utilisateurs enregistr�s'; // # registered users
$lang['Registered_user_total'] = 'Il y a <b>%d</b> utilisateur enregistr�'; // # registered users
$lang['male_zero_total'] = 'et <b>0</b> <img src="images/icon_minigender_male.gif" /> inscrit sur le forum'; // # registered male users
$lang['male_total'] = 'et <b>%d</b> <img src="images/icon_minigender_male.gif" /> inscrits sur le forum'; // # registered male users
$lang['male_one_total'] = 'et <b>%d</b> <img src="images/icon_minigender_male.gif" /> inscrits sur le forum'; // # registered male users
$lang['female_zero_total'] = 'Nous avons <b>0</b> <img src="images/icon_minigender_female.gif" />'; // # registered female users
$lang['female_total'] = 'Nous avons <b>%d</b> <img src="images/icon_minigender_female.gif" />'; // # registered female users
$lang['female_one_total'] = 'Nous avons <b>%d</b> <img src="images/icon_minigender_female.gif" />'; // # registered female users
$lang['Newest_user'] = 'Le dernier membre inscrit est <b>%s%s%s</b>'; // a href, username, /a 
$lang['No_new_posts_last_visit'] = 'Pas de nouveau message depuis votre derni�re visite';
$lang['No_new_posts'] = 'Pas de nouveau message';
$lang['New_posts'] = 'Nouveau message';
$lang['New_post'] = 'Nouveau message';
$lang['No_new_posts_hot'] = 'Pas de nouveau message [ populaire ]';
$lang['New_posts_hot'] = 'Nouveau message [ populaire ]';
$lang['No_new_posts_locked'] = 'Pas de nouveau message [ verrouill� ]';
$lang['New_posts_locked'] = 'Nouveau message [ verrouill� ]';
$lang['Forum_is_locked'] = 'Forum verrouill�';


//
// Login
//
$lang['Enter_password'] = 'Veuillez entrer votre nom d\'utilisateur et votre mot de passe pour vous connecter.';
$lang['Login'] = 'Connexion';
$lang['Logout'] = 'D�connexion';
$lang['Forgotten_password'] = 'J\'ai oubli� mon mot de passe';

/**
 *	Olympus Style Login Screen 3.0.0, Afterlife(69) of www.afterlife69.com
 *	@ Author	: (1) Afterlife_69
 *	@ Website	: http://www.afterlife69.com
 */
/* --- ADD --- */
$lang['Olympus_login_register']				= 'S\'enregistrer';
$lang['Olympus_login_info']					= 'Pour vous connecter, vous devez �tre enregistr�(e).<br />L\'enregistrement ne prend que quelques secondes et vous donne des acc�s plus complets.<br /> L\'Administrateur peut aussi donner des permissions additionnelles aux membres enregistr�s.<br />Avant de vous connecter, assurez-vous de vous �tre familiaris�(e) avec le r�glement du forum.';
$lang['Olympus_login_index']				= 'Index du Forum';
$lang['Olympus_login_faq']					= 'Voir la F.A.Q.';
$lang['Olympus_login_admin']				= 'Afin de vous connecter au Panneau d\'Administration, vous devez � nouveau vous identifier.<br /><br />Une fois connect�, vous acc�derez au Panneau d\'Administration jusqu\'� la fin de votre session.';
$lang['Olympus_login_activate']				= 'Envoyer de nouveau l\'activation';
$lang['Olympus_login_hideme']				= 'Apparaitre \'Hors-Ligne\' lors de cette session';
$lang['Olympus_login_options']				= 'Options';
$lang['Olympus_login_logged_in']			= 'Vous vous �tes connect�(e) avec succ�s';
$lang['Olympus_login_account_inactive']		= 'D�sol�, ce compte est inactif';
$lang['Olympus_login_resend_activation']	= 'Cliquez %sici%s afin de recevoir un nouveau code d\'activation';
$lang['Olympus_login_click_return']			= 'Cliquez %sici%s afin de revenir � la page pr�c�dente';
$lang['Olympus_login_reset_password']		= 'Cliquez %sici%s afin de recevoir un nouveau mot de passe';
$lang['Olympus_login_register_account']		= 'Cliquez %sici%s afin de vous enregistrer';
$lang['Olympus_login_not_registered']		= 'Ce compte n\'existe pas';
$lang['Olympus_login_invalid_password']		= 'Votre mot de passe est incorrect';
$lang['Olympus_login_activation_resent']	= 'Une nouvelle cl� d\'activation a �t� envoy�e; veuillez v�rifier votre e-mail afin de conna�tre les d�tails afin d\'activer votre compte.';
$lang['Olympus_login_admin_only_activate']	= 'Votre compte n�cessite l\'activation par un administrateur.';
$lang['Olympus_login_account_is_active']	= 'Votre compte est d�j� activ�.';
$lang['Olympus_redirect_insecure']	= 'Redirection potentielle sur une URL non s�curis�e.';
/* --- END --- */

$lang['Log_me_in'] = 'Connexion Automatique ';
$lang['Error_login'] = 'Vous avez sp�cifi� un nom d\'utilisateur incorrect, inactif ou un mot de passe invalide.';

//
// Index page
//
$lang['Index'] = 'Index';
$lang['No_Posts'] = 'Pas de message';
$lang['No_forums'] = 'Ce forum n\'a pas de section';
$lang['Private_Message'] = 'Message priv� ';
$lang['Private_Messages'] = 'Messages priv�s ';
$lang['Who_is_Online'] = 'Qui est en ligne';
$lang['Mark_all_forums'] = 'D�clarer les messages actuellement non-lus en tant que lus';
$lang['Forums_marked_read'] = 'Tous les forums ont �t� marqu�s comme lus';


//
// Viewforum
//
$lang['View_forum'] = 'Voir le forum';
$lang['Forum_not_exist'] = 'Le forum que vous avez s�lectionn� n\'existe pas.';
$lang['Reached_on_error'] = 'Vous avez atteint cette page par erreur.';
$lang['Display_topics'] = 'Montrer les sujets depuis ';
$lang['All_Topics'] = 'Tous les sujets';
$lang['Topic_Global_Announcement'] = '<b>Annonce Globale:</b>';
$lang['Topic_Announcement'] = '<b>Annonce : </b>';
$lang['Topic_Sticky'] = '<b>Note : </b>';
$lang['Topic_Moved'] = '<b>D�plac� : </b>';
$lang['Topic_Poll'] = '<b>Sondage : </b>';
$lang['Mark_all_topics'] = 'Marquer tous les sujets comme lus';
$lang['Topics_marked_read'] = 'Les sujets de ce forum sont maintenant marqu�s comme lus.';
$lang['Rules_post_can'] = 'Vous <b>pouvez</b> poster de nouveaux sujets dans ce forum';
$lang['Rules_post_cannot'] = 'Vous <b>ne pouvez pas</b> poster de nouveaux sujets dans ce forum';
$lang['Rules_reply_can'] = 'Vous <b>pouvez</b> r�pondre aux sujets dans ce forum';
$lang['Rules_reply_cannot'] = 'Vous <b>ne pouvez pas</b> r�pondre aux sujets dans ce forum';
$lang['Rules_edit_can'] = 'Vous <b>pouvez</b> �diter vos messages dans ce forum';
$lang['Rules_edit_cannot'] = 'Vous <b>ne pouvez pas</b> �diter vos messages dans ce forum';
$lang['Rules_delete_can'] = 'Vous <b>pouvez</b> supprimer vos messages dans ce forum';
$lang['Rules_delete_cannot'] = 'Vous <b>ne pouvez pas</b> supprimer vos messages dans ce forum';
$lang['Rules_vote_can'] = 'Vous <b>pouvez</b> r�pondre aux sondages de ce forum';
$lang['Rules_vote_cannot'] = 'Vous <b>ne pouvez pas</b> r�pondre aux sondages de ce forum';
$lang['Rules_moderate'] = 'Vous <b>pouvez</b> %smod�rer ce forum%s'; // %s replaced by a href links, do not remove! 
$lang['No_topics_post_one'] = 'Il n\'y a pas de message sur ce forum<br />Cliquez sur le lien <b>Poster un Nouveau Sujet</b> pour en �crire un.';


//
// Viewtopic
//

$lang['View_topic'] = 'Voir le sujet';
$lang['Guest'] = 'Invit�';
$lang['Post_subject'] = 'Sujet du message';
$lang['View_next_topic'] = 'Voir le sujet suivant';
$lang['View_previous_topic'] = 'Voir le sujet pr�c�dent';
$lang['Submit_vote'] = 'Envoyer le vote';
$lang['View_results'] = 'Voir les r�sultats';
$lang['No_newer_topics'] = 'Il n\'y a pas de nouveau sujet sur ce forum';
$lang['No_older_topics'] = 'Il n\'y a pas d\'ancien sujet sur ce forum';
$lang['Topic_post_not_exist'] = 'Le sujet ou message que vous recherchez n\'existe pas';
$lang['No_posts_topic'] = 'Il n\'existe pas de message pour ce sujet';
$lang['Display_posts'] = 'Montrer les messages depuis ';
$lang['All_Posts'] = 'Tous les messages';
$lang['Newest_First'] = 'Le plus r�cent en premier';
$lang['Oldest_First'] = 'Le plus ancien en premier';
$lang['Back_to_top'] = 'Revenir en haut';
$lang['Read_profile'] = 'Voir le profil de l\'utilisateur'; 
$lang['Visit_website'] = 'Visiter le site web de l\'utilisateur';
$lang['ICQ_status'] = 'Statut ICQ';
$lang['Edit_delete_post'] = 'Editer/Supprimer ce message';
$lang['View_IP'] = 'Voir l\'adresse IP de l\'utilisateur';
$lang['Delete_post'] = 'Supprimer ce message';
$lang['wrote'] = 'a �crit'; // proceeds the username and is followed by the quoted text
$lang['Quote'] = 'Citation'; // comes before bbcode quote output.
$lang['Code'] = 'Code'; // comes before bbcode code output.
// Extended_PM_Notification MOD
$lang['List'] = 'Liste';
$lang['Ordered_list'] = 'Liste ordonn�e';
$lang['Edited_time_total'] = 'Derni�re �dition : %s le %s; Edit� %d fois'; // Last edited by me on 12 Oct 2001, edited 1 time in total
$lang['Edited_times_total'] = 'Derni�re �dition : %s le %s; Edit� %d fois'; // Last edited by me on 12 Oct 2001, edited 2 times in total
$lang['Lock_topic'] = 'Verrouiller le sujet';
$lang['Unlock_topic'] = 'D�verrouiller le sujet';
$lang['Move_topic'] = 'D�placer le sujet';
$lang['Delete_topic'] = 'Supprimer le sujet';
$lang['Split_topic'] = 'Diviser le sujet';
$lang['Stop_watching_topic'] = 'Arr�ter de surveiller ce sujet';
$lang['Start_watching_topic'] = 'Surveiller les r�ponses de ce sujet';
$lang['No_longer_watching'] = 'Vous ne surveillez plus ce sujet';
$lang['You_are_watching'] = 'Vous surveillez ce sujet maintenant';
//MV MOD -> 
$lang['Total_votes'] = 'Nombre de choix : '; 
$lang['Voted_show'] = 'Nombre de votants : '; // it means : users that voted (the number of voters will follow) 
$lang['Results_after'] = 'Les r�sultats seront publi�s une fois le sondage termin�'; 
$lang['Poll_expires'] = 'Compte � rebours '; 
$lang['Poll_expiredyes'] = 'Sondage expir�'; 
$lang['Poll_noexpire'] = 'Ce sondage est permanent'; 
$lang['Minutes'] = 'minutes'; 
//<- MV MOD

//
// Posting/Replying (Not private messaging!)
//
$lang['Message_body'] = 'Message ';
$lang['Topic_review'] = 'Liste des derniers messages';
$lang['No_post_mode'] = 'Mode du sujet non sp�cifi�'; // If posting.php is called without a mode (newtopic/reply/delete/etc, shouldn't be shown normaly)
$lang['Post_a_new_topic'] = 'Poster un nouveau sujet';
$lang['Post_a_reply'] = 'Poster une r�ponse';
$lang['Post_topic_as'] = 'Poster le sujet en tant que';
$lang['Edit_Post'] = 'Editer le sujet';
$lang['Options'] = 'Options';
$lang['Post_Global_Announcement'] = 'Annonce Globale';
$lang['Post_Announcement'] = 'Annonce';
$lang['Post_Sticky'] = 'Note';
$lang['Post_Normal'] = 'Normal';
$lang['Confirm_delete'] = 'Etes-vous s�r de vouloir supprimer ce message ?';
$lang['Confirm_delete_poll'] = 'Etes-vous s�r de vouloir supprimer ce sondage ?';
$lang['Flood_Error'] = 'Vous ne pouvez pas poster un autre sujet si peu de temps apr�s le dernier, veuillez r�essayer dans un court moment.';
$lang['Empty_subject'] = '<font color=#c00000>Vous devez pr�ciser le nom du sujet avant de pouvoir en poster un nouveau.</font>';
$lang['Empty_message'] = 'Vous devez entrer un message avant de poster.';
$lang['Forum_locked'] = 'Ce forum est verrouill�, vous ne pouvez pas poster, ni r�pondre, ni �diter les sujets.';
$lang['Topic_locked'] = 'Ce sujet est verrouill�, vous ne pouvez pas �diter les messages ou faire de r�ponses.';
$lang['No_post_id'] = 'Vous devez s�lectionner un message � �diter';
$lang['No_topic_id'] = 'Vous devez s�lectionner le sujet auquel r�pondre';
$lang['No_valid_mode'] = 'Vous pouvez seulement poster, r�pondre, �diter ou citer des messages, veuillez revenir en arri�re et r�essayer.';
$lang['No_such_post'] = 'Il n\'y a pas de message de ce type, veuillez revenir en arri�re et r�essayer.';
$lang['Edit_own_posts'] = 'D�sol�, mais vous pouvez seulement �diter vos propres messages.';
$lang['Delete_own_posts'] = 'D�sol�, mais vous pouvez uniquement supprimer vos propres messages.';
$lang['Cannot_delete_replied'] = 'D�sol�, mais vous ne pouvez pas supprimer un message ayant eu des r�ponses.';
$lang['Cannot_delete_poll'] = 'D�sol�, mais vous ne pouvez pas supprimer un sondage actif.';
$lang['Empty_poll_title'] = 'Vous devez entrer un titre pour le sondage.';
$lang['To_few_poll_options'] = 'Vous devez au moins entrer deux options pour le sondage.';
$lang['To_many_poll_options'] = 'Vous avez entr� trop d\'options pour le sondage.';
$lang['Post_has_no_poll'] = 'Ce sujet n\'a pas de sondage.';
$lang['Already_voted'] = 'Vous avez d�j� particip� � ce sondage.'; 
$lang['No_vote_option'] = 'Vous devez choisir une option avant de r�pondre.';
$lang['Add_poll'] = 'Ajouter un sondage';
$lang['Add_poll_explain'] = 'Si vous souhaitez envoyer le sujet sans y ins�rer de sondage, laissez ces champs vides.';
$lang['Poll_question'] = 'Question du sondage';
$lang['Poll_option'] = 'Choix du sondage';
$lang['Add_option'] = 'Ajouter le choix';
$lang['Update'] = 'Mettre � jour';
$lang['Delete'] = 'Supprimer';
$lang['Poll_for'] = 'Sondage pendant';
$lang['Days'] = 'Jours'; // This is used for the Run poll for ... Days + in admin_forums for pruning
$lang['Poll_for_explain'] = '[ Entrez 0 ou laissez vide pour un sondage sans fin ]';
$lang['Delete_poll'] = 'Supprimer le sondage';
//MV MOD -> 
$lang['Max_vote'] = 'Nombre maximum d\'options'; 
$lang['Max_vote_explain'] = '[ Mettez 1, ou laissez ce champ vide pour ne permettre qu\'une r�ponse ]'; 
$lang['Max_voting_1_explain'] = 'Cochez entre 1 et '; 
$lang['Max_voting_2_explain'] = ' cases !'; 
$lang['Max_voting_3_explain'] = ' (au del�, les coches suppl�mentaires ne seront pas prise en compte)'; 
$lang['Vhide'] = 'Cacher'; 
$lang['Hide_vote'] = 'les r�sultats'; 
$lang['Tothide_vote'] = 'le total des r�ponses'; 
$lang['Hide_vote_explain'] = ' [ jusqu\'� la fin du sondage ]'; 
//<- MV MOD
$lang['Disable_HTML_post'] = 'D�sactiver l\'HTML dans ce message';
$lang['Disable_BBCode_post'] = 'D�sactiver le BBCode dans ce message';
$lang['Disable_Smilies_post'] = 'D�sactiver les �motic�nes dans ce message';
$lang['HTML_is_ON'] = 'Le HTML est <u>activ�</u>';
$lang['HTML_is_OFF'] = 'Le HTML est <u>d�sactiv�</u>';
$lang['BBCode_is_ON'] = 'Le %sBBCode%s est <u>activ�</u>'; // %s are replaced with URI pointing to FAQ
$lang['BBCode_is_OFF'] = 'Le %sBBCode%s est <u>d�sactiv�</u>';
$lang['Smilies_are_ON'] = 'Les �motic�nes sont <u>activ�es</u>';
$lang['Smilies_are_OFF'] = 'Les �motic�nes sont <u>d�sactiv�es</u>';
$lang['Attach_signature'] = 'Attacher sa signature (les signatures peuvent �tre modifi�es dans le profil)';
$lang['Notify'] = 'Etre averti lorsqu\'une r�ponse est post�e';
$lang['Stored'] = 'Votre message a bien �t� enregistr�.';
$lang['Deleted'] = 'Votre message a bien �t� supprim�.';
$lang['Poll_delete'] = 'Votre sondage a bien �t� supprim�.';
$lang['Vote_cast'] = 'Votre vote a �t� pris en compte.';
$lang['Topic_reply_notification'] = 'Notification de r�ponse au sujet';
$lang['bbcode_b_help'] = 'Texte gras : [b]texte[/b] (alt+b)';
$lang['bbcode_i_help'] = 'Texte italique : [i]texte[/i] (alt+i)';
$lang['bbcode_u_help'] = 'Texte soulign� : [u]texte[/u] (alt+u)';
$lang['bbcode_q_help'] = 'Citation : [quote]texte cit�[/quote] (alt+q)';
$lang['bbcode_c_help'] = 'Afficher du code : [code]code[/code] (alt+c)';
$lang['bbcode_l_help'] = 'Liste : [list]texte[/list] (alt+l)';
$lang['bbcode_o_help'] = 'Liste ordonn�e : [list=]texte[/list] (alt+o)';
$lang['bbcode_p_help'] = 'Ins�rer une image : [img]http://image_url/[/img] (alt+p)';
$lang['bbcode_w_help'] = 'Ins�rer un lien : [url]http://url/[/url] ou [url=http://url/]Nom[/url] (alt+w)';
$lang['bbcode_a_help'] = 'Fermer toutes les balises BBCode ouvertes';
$lang['bbcode_s_help'] = 'Couleur du texte : [color=red]texte[/color] Astuce: #FF0000 fonctionne aussi';
$lang['bbcode_f_help'] = 'Taille du texte : [size=x-small]texte en petit[/size]';
$lang['bbcode_T1_help'] = "Titre de style 1: [titre1]texte[/titre1]";
$lang['bbcode_help']['dailymotion'] = 'Dailymotion: [dailymotion]Dailymotion URL[/dailymotion]';
$lang['bbcode_we_help'] = 'Afficher un Site Web: [website]http://url/[/website] (alt+we)';
$lang['bbcode_help']['dailymotion'] = 'Dailymotion: [dailymotion]dailymotion URL[/dailymotion]';
$lang['bbcode_help']['youtube'] = 'YouTube: [youtube]YouTube URL[/youtube]';
$lang['bbcode_help']['GVideo'] = 'GVideo: [GVideo]GVideo URL[/GVideo]';
$lang['GVideo_link'] = 'Lien';

$lang['Emoticons'] = 'Emotic�nes';
$lang['More_emoticons'] = 'Voir plus d\'�motic�nes';
$lang['Font_color'] = 'Couleur ';
$lang['color_default'] = 'D�faut';
$lang['color_dark_red'] = 'Rouge fonc�';
$lang['color_red'] = 'Rouge';
$lang['color_orange'] = 'Orange';
$lang['color_brown'] = 'Marron';
$lang['color_yellow'] = 'Jaune';
$lang['color_green'] = 'Vert';
$lang['color_olive'] = 'Olive';
$lang['color_cyan'] = 'Cyan';
$lang['color_blue'] = 'Bleu';
$lang['color_dark_blue'] = 'Bleu fonc�';
$lang['color_indigo'] = 'Indigo';
$lang['color_violet'] = 'Violet';
$lang['color_white'] = 'Blanc';
$lang['color_black'] = 'Noir';
$lang['Font_size'] = 'Taille ';
$lang['font_tiny'] = 'Tr�s petit';
$lang['font_small'] = 'Petit';
$lang['font_normal'] = 'Normal';
$lang['font_large'] = 'Grand';
$lang['font_huge'] = 'Tr�s grand';
$lang['Close_Tags'] = 'Fermer les balises';
$lang['Styles_tip'] = 'Astuce : une mise en forme peut �tre appliqu�e au texte s�lectionn�.';


//
// Private Messaging
//
$lang['Private_Messaging'] = 'Messagerie';
$lang['Login_check_pm'] = 'Se connecter pour v�rifier ses messages priv�s';
$lang['New_pms'] = '%d nouveaux messages'; // You have 2 new messages
$lang['New_pm'] = '%d nouveau message'; // You have 1 new message
$lang['No_new_pm'] = 'Pas de nouveau message';
$lang['Unread_pms'] = 'Vous avez %d messages non lus';
$lang['Unread_pm'] = 'Vous avez %d message non lu';
$lang['No_unread_pm'] = 'Vous n\'avez pas de message non lus';
$lang['You_new_pm'] = 'Un nouveau message priv� vous attend dans votre bo�te de r�ception';
$lang['You_new_pms'] = 'De nouveaux messages priv�s vous attendent dans votre bo�te de r�ception';
$lang['You_no_new_pm'] = 'Pas de nouveau message priv� en attente';
$lang['Read_pm'] = 'Lire le message'; 
$lang['Post_new_pm'] = 'Poster le message'; 
$lang['Post_reply_pm'] = 'R�pondre au message'; 
$lang['Post_quote_pm'] = 'Citer le message'; 
$lang['Edit_pm'] = 'Editer le message'; 
$lang['Unread_message'] = 'Message non lu'; 
$lang['Read_message'] = 'Message d�j� lu';
$lang['Inbox'] = 'Messages re�us';
$lang['Outbox'] = 'Messages envoy�s non lus';
$lang['Savebox'] = 'Sauvegardes';
$lang['Sentbox'] = 'Messages envoy�s';
$lang['Flag'] = 'Drapeau ';
$lang['Subject'] = 'Sujet ';
$lang['From'] = 'De ';
$lang['To'] = 'A ';
$lang['Date'] = 'Date ';
$lang['Mark'] = 'Cocher';
$lang['Sent'] = 'Envoy�';
$lang['Saved'] = 'Sauv�';
$lang['Delete_marked'] = 'Supprimer la s�lection';
$lang['Delete_all'] = 'Tout supprimer';
$lang['Save_marked'] = 'Sauvegarder la s�lection'; 
$lang['Save_message'] = 'Sauvegarder le message';
$lang['Delete_message'] = 'Supprimer le message';
$lang['Display_messages'] = 'Montrer les messages depuis '; // Followed by number of days/weeks/months
$lang['All_Messages'] = 'Tous les messages';
$lang['No_messages_folder'] = 'Vous n\'avez pas de message dans ce dossier';
$lang['PM_disabled'] = 'Les messages priv�s ont �t� d�sactiv�s sur ce forum.';
$lang['Cannot_send_privmsg'] = 'D�sol�, mais l\'administrateur ne vous autorise pas � envoyer des messages priv�s.';
$lang['No_to_user'] = 'Vous devez pr�ciser un nom d\'utilisateur pour envoyer ce message.';
$lang['No_such_user'] = 'D�sol�, mais cet utilisateur n\'existe pas.';
$lang['Disable_HTML_pm'] = 'D�sactiver l\'HTML dans ce message';
$lang['Disable_BBCode_pm'] = 'D�sactiver le BBCode dans ce message';
$lang['Disable_Smilies_pm'] = 'D�sactiver les �motic�nes dans ce message';
$lang['Message_sent'] = 'Votre message a �t� envoy�.';
$lang['Click_return_inbox'] = 'Cliquez %sici%s pour retourner � la liste des messages re�us';
$lang['Click_return_index'] = 'Cliquez %sici%s pour retourner sur le forum';
$lang['Send_a_new_message'] = 'Envoyer un nouveau message priv�';
$lang['Send_a_reply'] = 'R�pondre � un message priv�';
$lang['Edit_message'] = 'Editer un message priv�';
$lang['Notification_subject'] = 'Un Nouveau message priv� vient d\'arriver.';
$lang['Find_username'] = 'Trouver un nom d\'utilisateur';
$lang['Find'] = 'Trouver';
$lang['No_match'] = 'Aucun enregistrement trouv�.';
$lang['No_post_id'] = 'L\'ID du message n\'a pas �t� sp�cifi�e';
$lang['No_such_folder'] = 'Le dossier n\'existe pas';
$lang['No_folder'] = 'Pas de dossier sp�cifi�';
$lang['Mark_all'] = 'Tout s�lectionner';
$lang['Unmark_all'] = 'Tout d�s�lectionner';
$lang['Confirm_delete_pm'] = 'Etes-vous s�r de vouloir supprimer ce message ?';
$lang['Confirm_delete_pms'] = 'Etes-vous s�r de vouloir supprimer ces messages ?';
$lang['Inbox_size'] = 'Votre bo�te de messages re�us est pleine � %d%%'; // eg. Your Inbox is 50% full
$lang['Sentbox_size'] = 'Votre bo�te de messages envoy�s est pleine � %d%%'; 
$lang['Savebox_size'] = 'Votre bo�te de sauvegarde est pleine � %d%%'; 
$lang['Click_view_privmsg'] = 'Cliquez %sici%s pour voir votre bo�te des messages re�us';


//
// Profiles/Registration
//
$lang['Viewing_user_profile'] = 'Profil de %s'; // %s is username 
$lang['About_user'] = 'Tout � propos de %s'; // %s is username
$lang['Preferences'] = 'Pr�f�rences';
$lang['Items_required'] = 'Les champs marqu� d\'un * sont obligatoires. <b>Attention Allez dans Profil �galement...</b>';
$lang['Registration_info'] = 'Enregistrement';
$lang['Profile_info'] = 'Profil';
$lang['Profile_info_warn'] = 'Ces informations seront visibles publiquement';
$lang['Avatar_panel'] = 'Panneau de contr�le des avatars';
$lang['Avatar_gallery'] = 'Galerie des avatars';
$lang['Website'] = 'Site Web ';
$lang['Location'] = 'Localisation ';
$lang['Contact'] = 'Contacter';
$lang['Email_address'] = 'Adresse e-mail ';
$lang['Send_private_message'] = 'Envoyer un message priv�';
$lang['Hidden_email'] = '[ Invisible ]';
$lang['Interests'] = 'Loisirs ';
$lang['Occupation'] = 'Emploi '; 
$lang['Poster_rank'] = 'Rang du membre ';
$lang['Total_posts'] = 'Messages ';
$lang['User_post_pct_stats'] = '%.2f%% du total'; // 1.25% of total
$lang['User_post_day_stats'] = '%.2f messages par jour'; // 1.5 posts per day
$lang['Search_user_posts'] = 'Trouver tous les messages de %s'; // Find all posts by username
$lang['No_user_id_specified'] = 'D�sol�, mais cet utilisateur n\'existe pas.';
$lang['Wrong_Profile'] = 'Vous ne pouvez pas modifier un profil qui n\'est pas le v�tre.';
$lang['Only_one_avatar'] = 'Seul un type d\'avatar peut �tre sp�cifi�';
$lang['File_no_data'] = 'L\'adresse que vous avez entr�e ne contient aucune donn�e';
$lang['No_connection_URL'] = 'Une connexion ne peut �tre �tablie avec l\'adresse que vous avez donn�e';
$lang['Incomplete_URL'] = 'L\'adresse que vous avez entr�e est incompl�te';
$lang['Wrong_remote_avatar_format'] = 'L\'adresse de l\'avatar est invalide';
$lang['No_send_account_inactive'] = 'D�sol�, mais votre mot de passe ne peut pas �tre renouvel� �tant donn� que votre compte est actuellement inactif. Veuillez contacter l\'administrateur du forum afin d\'obtenir de plus amples informations.';
$lang['Always_smile'] = 'Toujours activer les �motic�nes ';
$lang['Always_html'] = 'Toujours autoriser l\'HTML ';
$lang['Always_bbcode'] = 'Toujours autoriser le BBCode ';
$lang['Always_add_sig'] = 'Toujours attacher sa signature ';
$lang['Always_notify'] = 'Toujours m\'avertir des r�ponses ';
$lang['Always_notify_explain'] = 'Envoi d\'un e-mail lorsqu\'un utilisateur r�pond aux sujets que vous avez post�s. Ceci peut �tre chang� chaque fois que vous postez.';
$lang['Board_style'] = 'Th�me du forum ';
$lang['Board_lang'] = 'Langue du forum ';
$lang['No_themes'] = 'Pas de th�me dans la base de donn�es';
$lang['Timezone'] = 'Fuseau horaire ';
$lang['Date_format'] = 'Format de la date ';
$lang['Date_format_explain'] = 'La syntaxe utilis�e est identique � la fonction <a href=\'http://www.php.net/manual/fr/function.date.php\' target=\'_other\'>date()</a> du PHP.';
$lang['Signature'] = 'Signature ';
$lang['Signature_explain'] = 'Ceci est un bloc de texte qui peut �tre ajout� aux messages que vous postez. Il y a une limite de %d caract�res.';
$lang['Public_view_email'] = 'Toujours montrer son adresse e-mail ';
$lang['Current_password'] = 'Mot de passe actuel ';
$lang['New_password'] = 'Nouveau mot de passe ';
$lang['Confirm_password'] = 'Confirmer le mot de passe ';
$lang['Confirm_password_explain'] = 'Vous devez confirmer votre mot de passe si vous souhaitez modifier votre adresse e-mail.';
$lang['password_if_changed'] = 'Vous avez seulement besoin de fournir un mot de passe si vous voulez le changer.';
$lang['password_confirm_if_changed'] = 'Vous avez seulement besoin de confirmer votre mot de passe si vous l\'avez chang� ci-dessus.';
$lang['Avatar'] = 'Avatar ';
$lang['Avatar_explain'] = 'Affiche une petite image au-dessous de vos d�tails dans vos messages. Seule une image peut �tre affich�e � la fois, sa largeur ne peut pas d�passer %d pixels, sa hauteur %d pixels et la taille du fichier, pas plus de %d ko.';
$lang['Upload_Avatar_file'] = 'Envoyer l\'avatar depuis votre ordinateur ';
$lang['Upload_Avatar_URL'] = 'Envoyer l\'avatar � partir d\'une URL ';
$lang['Upload_Avatar_URL_explain'] = 'Entrez l\'URL de l\'image, elle sera copi�e sur ce site.';
$lang['Pick_local_Avatar'] = 'S�lectionner un avatar de la galerie ';
$lang['Link_remote_Avatar'] = 'Lier l\'avatar � partir d\'un autre site ';
$lang['Link_remote_Avatar_explain'] = 'Entrez l\'URL de l\'image que vous voulez lier.';
$lang['Avatar_URL'] = 'URL de l\'image ';
$lang['Select_from_gallery'] = 'S�lectionner un avatar � partir de la galerie ';
$lang['View_avatar_gallery'] = 'Montrer la galerie ';
$lang['Select_avatar'] = 'S�lectionner l\'avatar';
$lang['Return_profile'] = 'Annuler';
$lang['Select_category'] = 'S�lectionner une cat�gorie ';
$lang['Delete_Image'] = 'Supprimer l\'image';
$lang['Current_Image'] = 'Image actuelle';
$lang['Notify_on_privmsg'] = 'M\'avertir des nouveaux messages priv�s ';
$lang['Popup_on_privmsg'] = 'Ouverture d\'une pop-up lors de nouveaux messages priv�s '; 
$lang['Popup_on_privmsg_explain'] = 'Certains th�mes peuvent ouvrir une nouvelle fen�tre pour vous informer de l\'arriv�e de nouveaux messages priv�s.'; 
$lang['Hide_user'] = 'Cacher sa pr�sence en ligne ';
$lang['Profile_updated'] = 'Votre profil a �t� mis � jour.';
$lang['Profile_see'] = 'Cliquez %sici%s pour retourner � votre profil';
$lang['Profile_updated_inactive'] = 'Votre profil a �t� mis � jour, toutefois vous avez modifi� des d�tails importants, votre compte est donc inactif. V�rifiez vos e-mails pour savoir comment r�activer votre compte, ou si l\'activation par l\'administrateur est requise, patientez jusqu\'� ce qu\'il le r�active.';
$lang['Password_mismatch'] = 'Les mots de passe que avez entr�s sont diff�rents.';
$lang['Current_password_mismatch'] = 'Le mot de passe que vous avez fourni est diff�rent de celui stock� dans la base de donn�es.';
$lang['Password_long'] = 'Votre mot de passe ne doit pas d�passer 32 caract�res.';
$lang['Username_taken'] = 'D�sol�, mais ce nom d\'utilisateur est d�j� pris.';
$lang['Username_invalid'] = 'D�sol�, mais ce nom d\'utilisateur contient un caract�re invalide comme \' par exemple.';
$lang['Username_disallowed'] = 'D�sol�, mais ce nom d\'utilisateur a �t� interdit.';
$lang['Email_taken'] = 'D�sol�, mais cette adresse e-mail est d�j� enregistr�e par un autre utilisateur.';
$lang['Email_banned'] = 'D�sol�, mais cette adresse e-mail a �t� bannie.';
$lang['Email_invalid'] = 'D�sol�, mais cette adresse e-mail est invalide.';
$lang['Signature_too_long'] = 'Votre signature est trop longue.';
$lang['Fields_empty'] = 'Vous devez compl�ter les champs obligatoires.';
$lang['Avatar_filetype'] = 'Le type de fichier de l\'avatar doit �tre .jpg, .gif ou .png';
$lang['Avatar_filesize'] = 'La taille de l\'avatar doit �tre inf�rieure � %d ko'; // The avatar image file size must be less than 6 ko
$lang['Avatar_imagesize'] = 'La taille de l\'avatar doit �tre de %d pixels de largeur et de %d pixels de hauteur'; 
$lang['Welcome_subject'] = 'Bienvenue sur les forums de %s'; // Welcome to my.com forums
$lang['New_account_subject'] = 'Nouveau compte utilisateur';
$lang['Account_activated_subject'] = 'Compte activ�';
$lang['Account_added'] = 'Merci de vous �tre enregistr�, votre compte a �t� cr��. Vous pouvez vous connecter avec votre nom d\'utilisateur et votre mot de passe.';
$lang['Account_inactive'] = 'Votre compte a �t� cr��. Toutefois, votre compte est inactif et doit �tre activ�. Une cl� d\'activation a �t� envoy�e � l\'adresse e-mail que vous avez fournie. Veuillez v�rifier vos e-mails pour plus de d�tails.';
$lang['Account_inactive_admin'] = 'Votre compte a �t� cr��. Toutefois, ce forum requiert que votre compte soit activ� par l\'administrateur. Un e-mail lui a �t� envoy� et vous serez inform� lorsque votre compte sera activ�.';
$lang['Account_active'] = 'Votre compte a �t� activ�. Merci de vous �tre inscrit';
$lang['Account_active_admin'] = 'Le compte a �t� activ�';
$lang['Already_activated'] = 'Votre compte est d�j� activ�';
$lang['Reactivate'] = 'R�activez votre compte !';
$lang['COPPA'] = 'Votre compte a �t� cr��, mais il doit �tre approuv�, veuillez v�rifier vos e-mails pour plus de d�tails.';
$lang['Registration'] = 'Inscription - R�glement';
//-- mod : vAgreement Terms ----------------------------------------------------
$lang['Reg_agreement'] = '<font color="red"><b>Message</b></font><br />Les administrateurs et mod�rateurs de ce forum s\'efforceront de supprimer ou d\'�diter tous les messages � caract�re r�pr�hensible aussi rapidement que possible. Toutefois, il leur est impossible de passer en revue tous les messages. Vous admettez donc que tous les messages post�s sur ces forums expriment la vue et l\'opinion de leurs auteurs respectifs, et non pas des administrateurs, ou mod�rateurs, ou webmestres (except� les messages post�s par eux-m�me) et par cons�quent ils ne peuvent �tre tenus pour responsables.<br /><br /><font color="red"><b>Contenu de vos messages</b></font><br />Vous consentez � ne pas poster de messages injurieux, obsc�nes, vulgaires, diffamatoires, mena�ants, sexuels ou tout autre message qui violerait les lois applicables. Le faire peut vous conduire � �tre banni imm�diatement et de fa�on permanente (et votre fournisseur d\'acc�s � internet en sera inform�). L\'adresse IP de chaque message est enregistr�e afin d\'aider � faire respecter ces conditions. Vous �tes d\'accord sur le fait que le webmestre, l\'administrateur et les mod�rateurs de ce forum ont le droit de supprimer, �diter, d�placer ou verrouiller n\'importe quel sujet de discussion � tout moment. En tant qu\'utilisateur, vous �tes d\'accord sur le fait que toutes les informations que vous donnerez ci-apr�s seront stock�es dans une base de donn�es. Cependant, ces informations ne seront divulgu�es � aucune tierce personne ou soci�t� sans votre accord. Le webmestre, l\'administrateur, et les mod�rateurs ne peuvent pas �tre tenus pour responsables si une tentative de piratage informatique conduit � l\'acc�s de ces donn�es.<br /><br /><font color="red"><b>Informations collect�es et Cookies</b></font><br />Ce forum utilise les cookies pour stocker des informations sur votre ordinateur. Ces cookies ne contiendront aucune information que vous aurez entr�e ci-apr�s, ils servent uniquement � am�liorer le confort d\'utilisation. L\'adresse e-mail est uniquement utilis�e afin de confirmer les d�tails de votre inscription ainsi que votre mot de passe (et aussi pour vous envoyer un nouveau mot de passe dans le cas o� vous l\'oublieriez).<br /><br /><font color="red"><b>Vous acceptez...</b></font><br />En vous inscrivant, vous vous portez garant du fait d\'�tre en accord avec le r�glement ci-dessus.';
$lang['To_Join'] = 'Avant de proc�der � votre inscription d�finitive, vous devez manifester votre accord avec les r�gles suivantes :';
$lang['Forum_Rules'] = 'R�gles du forum';
$lang['Agree_checkbox'] = 'J\'ai lu et accepte de respecter les r�gles du forum %s.';
//-- fin mod : vAgreement Terms ------------------------------------------------
$lang['Agree_under_13'] = 'J\'accepte le r�glement et j\'ai <b>moins</b> de 13 ans';
$lang['Agree_over_13'] = 'J\'accepte le r�glement et j\'ai <b>exactement</b> ou <b>plus</b> de 13 ans';
$lang['Agree_not'] = 'Je n\'accepte pas le r�glement';
$lang['Wrong_activation'] = 'La clef d\'activation que vous avez fournie ne correspond pas � celle de la base de donn�es.';
$lang['Send_password'] = 'Envoyez-moi un nouveau mot de passe'; 
$lang['Password_updated'] = 'Un nouveau mot de passe a �t� cr��, veuillez v�rifier vos e-mail pour plus de d�tails concernant l\'activation de celui-ci.';
$lang['No_email_match'] = 'L\'adresse e-mail que vous avez fournie ne correspond pas avec celle qui a �t� utilis�e pour ce nom d\'utilisateur.';
$lang['New_password_activation'] = 'Activation d\'un nouveau mot de passe';
$lang['Password_activated'] = 'Votre compte a �t� r�activ�. Pour vous connecter, veuillez utiliser le mot de passe fourni dans l\'e-mail que vous avez re�u.';
$lang['Send_email_msg'] = 'Envoyer un e-mail';
$lang['No_user_specified'] = 'Aucun utilisateur sp�cifi�';
$lang['User_prevent_email'] = 'Cet utilisateur ne souhaite pas recevoir d\'e-mail. Essayez de lui envoyer un message priv�.';
$lang['User_not_exist'] = 'Cet utilisateur n\'existe pas';
$lang['CC_email'] = 'Recevoir une copie de cet e-mail';
$lang['Email_message_desc'] = 'Ce message sera envoy� en texte plein, n\'ins�rez aucun code HTML ou BBCode. L\'adresse de r�ponse pour ce message sera celle de votre e-mail.';
$lang['Flood_email_limit'] = 'Vous ne pouvez pas envoyer un autre e-mail pour le moment, essayez plus tard';
$lang['Recipient'] = 'Destinataire';
$lang['Email_sent'] = 'L\'e-mail a �t� envoy�.';
$lang['Send_email'] = 'Envoyer l\'e-mail';
$lang['Empty_subject_email'] = 'Vous devez sp�cifier le sujet pour l\'e-mail.';
$lang['Empty_message_email'] = 'Vous devez entrer un message pour qu\'il soit exp�di�.';


//
// Visual confirmation system settings
//
$lang['Confirm_code_wrong'] = 'Le code de confirmation que vous avez entr� ne correspond pas � celui de l\'image. Veuillez essayer � nouveau.';
$lang['Too_many_registers'] = 'Vous avez d�pass� le nombre de tentatives d\'enregistrements pour cette session. Veuillez r�essayer ult�rieurement.';
$lang['Confirm_code_impaired'] = 'Si vous �tes visuellement d�ficient ou si vous ne pouvez lire ce code, veuillez contacter l\'%sAdministrateur%s afin d\'obtenir de l\'aide.';
$lang['Confirm_code'] = 'Code de confirmation ';
$lang['Confirm_code_explain'] = 'Entrez exactement le code que vous voyez sur l\'image.';


//
// Memberslist
//
$lang['Select_sort_method'] = 'S�lectionner la m�thode de tri ';
$lang['Sort'] = 'Trier';
$lang['Sort_Top_Ten'] = 'Top 10 des Membres';
$lang['Sort_Joined'] = 'Inscrit le';
$lang['Sort_Username'] = 'Nom d\'utilisateur';
$lang['Sort_Location'] = 'Localisation';
$lang['Sort_Posts'] = 'Messages';
$lang['Sort_Email'] = 'E-mail';
$lang['Sort_Website'] = 'Site Web';
$lang['Sort_Ascending'] = 'Croissant';
$lang['Sort_Descending'] = 'D�croissant';
$lang['Order'] = 'Ordre ';


//
// Group control panel
//
$lang['Group_Control_Panel'] = 'Panneau de Contr�le des Groupes';
$lang['Group_member_details'] = 'D�tails des groupes ';
$lang['Group_member_join'] = 'Rejoindre un groupe';
$lang['Group_Information'] = 'Information du groupe';
$lang['Group_name'] = 'Nom du groupe ';
$lang['Group_description'] = 'Description du groupe ';
$lang['Group_membership'] = 'Votre statut ';
$lang['Group_Members'] = 'Membres du groupe';
$lang['Group_Moderator'] = 'Mod�rateur du groupe';
$lang['Pending_members'] = 'Membres en attente';
$lang['Group_type'] = 'Type de groupe ';
$lang['Group_open'] = 'Groupe ouvert';
$lang['Group_closed'] = 'Groupe ferm�';
$lang['Group_hidden'] = 'Groupe invisible';
$lang['Current_memberships'] = 'Membre du groupe';
$lang['Non_member_groups'] = 'Non-membre du groupe';
$lang['Memberships_pending'] = 'Adh�sions en attente';
$lang['No_groups_exist'] = 'Aucun groupe n\'existe';
$lang['Group_not_exist'] = 'Ce groupe d\'utilisateurs n\'existe pas';
$lang['Join_group'] = 'Rejoindre le Groupe';
$lang['No_group_members'] = 'Ce groupe n\'a pas de membres';
$lang['Group_hidden_members'] = 'Ce groupe est invisible ; vous ne pouvez pas voir sa composition';
$lang['No_pending_group_members'] = 'Ce groupe n\'a pas d\'utilisateurs en attente';
$lang['Group_joined'] = 'Vous vous �tes inscrit � ce groupe avec succ�s.<br />Vous serez averti lorsque votre inscription sera approuv�e par le mod�rateur du groupe.';
$lang['Group_request'] = 'Une requ�te d\'adh�sion � votre groupe a �t� faite.';
$lang['Group_approved'] = 'Votre requ�te a �t� approuv�e.';
$lang['Group_added'] = 'Vous avez �t� admis dans ce groupe d\'utilisateurs.';
$lang['Already_member_group'] = 'Vous �tes d�j� membre de ce groupe';
$lang['User_is_member_group'] = 'L\'utilisateur est d�j� membre de ce groupe';
$lang['Group_type_updated'] = 'Vous avez mis � jour le type de groupe avec succ�s.';
$lang['Could_not_add_user'] = 'L\'utilisateur que vous avez s�lectionn� n\'existe pas.';
$lang['Could_not_anon_user'] = 'Vous ne pouvez pas d�finir un invit� en tant que membre d\'un groupe.';
$lang['Confirm_unsub'] = 'Etes-vous s�r de vous vouloir vous d�sinscrire de ce groupe ?';
$lang['Confirm_unsub_pending'] = 'Votre inscription � ce groupe n\'a pas encore �t� approuv�e ; �tes-vous s�r de vouloir vous d�sinscrire ?';
$lang['Unsub_success'] = 'Vous avez �t� d�sinscrit de ce groupe.';
$lang['Approve_selected'] = 'Approuver la s�lection';
$lang['Deny_selected'] = 'Refuser la s�lection';
$lang['Not_logged_in'] = 'Vous devez �tre connect� pour rejoindre un groupe.';
$lang['Remove_selected'] = 'Supprimer la s�lection';
$lang['Add_member'] = 'Ajouter l\'utilisateur';
$lang['Not_group_moderator'] = 'Vous n\'�tes pas le mod�rateur de ce groupe, vous ne pouvez donc pas accomplir cette action.';
$lang['Login_to_join'] = 'Connectez-vous pour rejoindre ou g�rer les adh�sions du groupe';
$lang['This_open_group'] = 'Ceci est un groupe ouvert : cliquez pour faire une demande d\'adh�sion';
$lang['This_closed_group'] = 'Ceci est un groupe ferm� : plus aucun utilisateur accept�';
$lang['This_hidden_group'] = 'Ceci est groupe invisible : l\'ajout automatique d\'utilisateurs n\'est pas autoris�';
$lang['Member_this_group'] = 'Vous �tes membre du groupe';
$lang['Pending_this_group'] = 'Votre adh�sion � ce groupe est en attente';
$lang['Are_group_moderator'] = 'Vous �tes le mod�rateur du groupe';
$lang['None'] = 'Aucun';
$lang['Subscribe'] = 'S\'inscrire';
$lang['Unsubscribe'] = 'Se d�sinscrire';
$lang['View_Information'] = 'Voir les informations';


//
// Search
//
$lang['Search_query'] = 'Rechercher';
$lang['Advanced_Search'] = 'Recherche avanc�e';
$lang['Search_options'] = 'Options de recherche';
$lang['Search_keywords'] = 'Recherche par mots-cl�s ';
$lang['Search_keywords_explain'] = 'Vous pouvez utiliser <u>AND</u> pour d�terminer les mots qui seront visibles dans les r�sultats, <u>OR</u> pour d�terminer les mots qui peuvent �tre visibles dans les r�sultats et <u>NOT</u> pour d�terminer les mots qui ne doivent pas �tre visibles dans les r�sultats. Utilisez * comme un joker pour des recherches partielles.';
$lang['Search_author'] = 'Recherche par auteur ';
$lang['Search_author_explain'] = 'Utilisez * comme un joker pour des recherches partielles.';
$lang['Search_for_any'] = 'Rechercher n\'importe lequel de ces termes';
$lang['Search_for_all'] = 'Rechercher tous les termes';
$lang['Search_title_msg'] = 'Rechercher dans les titres et messages';
$lang['Search_msg_only'] = 'Rechercher dans les messages uniquement';
$lang['Return_first'] = 'Retourner les '; // followed by xxx characters in a select box
$lang['characters_posts'] = 'premiers caract�res des messages';
$lang['Search_previous'] = 'Rechercher depuis '; // followed by days, weeks, months, year, all in a select box
$lang['Sort_by'] = 'Trier par ';
$lang['Sort_Time'] = 'Heure du message';
$lang['Sort_Post_Subject'] = 'Sujet du message';
$lang['Sort_Topic_Title'] = 'Titre du sujet';
$lang['Sort_Author'] = 'Auteur';
$lang['Sort_Forum'] = 'Forum';
$lang['Display_results'] = 'Afficher les r�sultats sous forme de ';
$lang['All_available'] = 'Tous disponibles';
$lang['No_searchable_forums'] = 'Vous n\'avez pas la permission de rechercher un quelconque forum sur ce site.';
$lang['No_search_match'] = 'Aucun sujet ou message ne correspond � vos crit�res de recherche';
$lang['Found_search_match'] = '%d r�sultat trouv�'; // eg. Search found 1 match
$lang['Found_search_matches'] = '%d r�sultats trouv�s'; // eg. Search found 24 matches
$lang['Close_window'] = 'Fermer la fen�tre';


//
// Auth related entries
//
// Note the %s will be replaced with one of the following 'user' arrays
$lang['Sorry_auth_announce'] = 'D�sol�, mais seuls les %s peuvent poster des annonces dans ce forum.';
$lang['Sorry_auth_sticky'] = 'D�sol�, mais seuls les %s peuvent poster des notes dans ce forum.';
$lang['Sorry_auth_read'] = 'D�sol�, mais seuls les %s peuvent lire des sujets dans ce forum.';
$lang['Sorry_auth_post'] = 'D�sol�, mais seuls les %s peuvent poster dans ce forum.';
$lang['Sorry_auth_reply'] = 'D�sol�, mais seuls les %s peuvent r�pondre aux messages dans ce forum.';
$lang['Sorry_auth_edit'] = 'D�sol�, mais seuls les %s peuvent �diter des messages dans ce forum.';
$lang['Sorry_auth_delete'] = 'D�sol�, mais seuls les %s peuvent supprimer des messages dans ce forum.';
$lang['Sorry_auth_vote'] = 'D�sol�, mais seuls les %s peuvent r�pondre aux sondages dans ce forum.';

// These replace the %s in the above strings
$lang['Auth_Anonymous_Users'] = '<b>utilisateurs anonymes</b>';
$lang['Auth_Registered_Users'] = '<b>utilisateurs enregistr�s</b>';
$lang['Auth_Users_granted_access'] = '<b>utilisateurs avec un acc�s sp�cial</b>';
$lang['Auth_Moderators'] = '<b>mod�rateurs</b>';
$lang['Auth_Administrators'] = '<b>administrateurs</b>';
$lang['Not_Moderator'] = 'Vous n\'�tes pas mod�rateur sur ce forum.';
$lang['Not_Authorised'] = 'Non Autoris�';
$lang['You_been_banned'] = 'Vous avez �t� banni de ce forum.<br />Veuillez contacter le webmestre ou l\'administrateur du forum pour plus de d�tails.';

//
// Online/Offline
//
$lang['Offline'] = 'Hors-ligne';
$lang['Online'] = 'En ligne';
$lang['Hidden'] = 'Cach�';
$lang['On_off_status'] = 'Statut';

//
// Viewonline
//
$lang['Reg_users_zero_online'] = 'Il n\'y aucun utilisateur enregistr� et '; // There are 5 Registered and
$lang['Reg_users_online'] = 'Il y a %d utilisateurs incrits et '; // There are 5 Registered and
$lang['Reg_user_online'] = 'Il y a %d utilisateur inscrit et '; // There is 1 Registered and
$lang['Hidden_users_zero_online'] = 'aucun utilisateur invisible en ligne'; // 6 Hidden users online
$lang['Hidden_users_online'] = '%d utilisateurs invisibles en ligne'; // 6 Hidden users online
$lang['Hidden_user_online'] = '%d utilisateur invisible en ligne'; // 6 Hidden users online
$lang['Guest_users_zero_online'] = 'Il n\'y aucun invit� en ligne'; // There are 10 Guest users online
$lang['Guest_users_online'] = 'Il y a %d invit�s en ligne'; // There are 10 Guest users online
$lang['Guest_user_online'] = 'Il y a %d invit� en ligne'; // There is 1 Guest user online
$lang['No_users_browsing'] = 'Il n\'y a actuellement personne sur ce forum';
$lang['Online_explain'] = 'Donn�es bas�es sur les utilisateurs actifs lors des cinq derni�res minutes.';
$lang['Forum_Location'] = 'Position sur le forum';
$lang['Last_updated'] = 'Derni�re mise � jour';
$lang['Forum_index'] = 'Index du Forum';
$lang['Logging_on'] = 'Se connecte';
$lang['Posting_message'] = 'Poste un message';
$lang['Searching_forums'] = 'Recherche sur le forum';
$lang['Viewing_profile'] = 'Regarde un profil';
$lang['Viewing_online'] = 'Regarde qui est en ligne';
$lang['Viewing_member_list'] = 'Regarde la liste des membres';
$lang['Viewing_priv_msgs'] = 'Regarde ses messages priv�s';
$lang['Viewing_FAQ'] = 'Regarde la FAQ';
$lang['Viewing_ADR'] = 'Sur le RPG';
$lang['Viewing_RABBITOSHI'] = 'Regarde l\'animalerie';


//
// Moderator Control Panel
//
$lang['Mod_CP'] = 'Panneau de Contr�le des Mod�rateurs';
$lang['Mod_CP_explain'] = 'En utilisant le formulaire ci-dessous, vous pouvez accomplir des op�rations de mod�ration de masse sur ce forum. Vous pouvez verrouiller, d�verrouiller, d�placer ou supprimer n\'importe quel nombre de sujets.';
$lang['Select'] = 'S�lectionner';
$lang['Delete'] = 'Supprimer';
$lang['Move'] = 'D�placer';
$lang['Lock'] = 'Verrouiller';
$lang['Unlock'] = 'D�verrouiller';
$lang['Topics_Removed'] = 'Le(s) sujet(s) s�lectionn�(s) a/ont �t� retir�(s) de la base de donn�es avec succ�s.';
$lang['Topics_Locked'] = 'Le(s) sujet(s) s�lectionn�(s) a/ont �t� verrouill�(s).';
$lang['Topics_Moved'] = 'Le(s) sujet(s) s�lectionn�(s) a/ont �t� d�plac�(s).';
$lang['Topics_Unlocked'] = 'Le(s) sujet(s) s�lectionn�(s) a/ont �t� d�verrouill�(s).';
$lang['No_Topics_Moved'] = 'Aucun sujet n\'a �t� d�plac�.';
$lang['Confirm_delete_topic'] = 'Etes-vous s�r de vouloir supprimer le(s) sujet(s) s�lectionn�(s) ?';
$lang['Confirm_lock_topic'] = 'Etes-vous s�r de vouloir verrouiller le(s) sujet(s) s�lectionn�(s) ?';
$lang['Confirm_unlock_topic'] = 'Etes-vous s�r de vouloir d�verrouiller le(s) sujet(s) s�lectionn�(s) ?';
$lang['Confirm_move_topic'] = 'Etes-vous s�r de vouloir d�placer le(s) sujet(s) s�lectionn�(s) ?';
$lang['Move_to_forum'] = 'D�placer vers le forum';
$lang['Leave_shadow_topic'] = 'Laisser un traceur dans l\'ancien forum.';
$lang['Split_Topic'] = 'Panneau de Contr�le des sujets � diviser';
$lang['Split_Topic_explain'] = 'En utilisant le formulaire ci-dessous, vous pouvez diviser un sujet en deux sujets, soit en s�lectionnant les messages individuellement, soit en divisant � partir d\'un message s�lectionn�.';
$lang['Split_title'] = 'Titre du nouveau sujet';
$lang['Split_forum'] = 'Forum du nouveau sujet';
$lang['Split_posts'] = 'Diviser les messages s�lectionn�s';
$lang['Split_after'] = 'Diviser � partir des messages s�lectionn�s';
$lang['Topic_split'] = 'Le sujet s�lectionn� a �t� divis� avec succ�s';
// start mod split posts and merge in one step
$lang['If_title_blank'] = '<br />(indiquez le nouveau titre du topic; laissez vide pour fusionner un message non divis� avec un sujet le sujet sp�cifi� ci-dessous)';
$lang['Destination_topic'] = 'Destination du sujet';
$lang['Destination_topic_format'] = '<br />(Pour fusionner un sujet existant, ins�rez l\'ID du sujet ou son URL, ou ins�rez l\'URL d\'un post dans ce sujet)';
$lang['Forgot_to_specify'] = 'Vous avez oubli� de sp�cifier un sujet ou un topic de destination.';
$lang['Split_move_or_copy'] = 'D�placer ou copier';
$lang['Split_move'] = 'D�placer';
$lang['Split_copy'] = 'Copier';
$lang['Split_move_or_copy_explanation'] = '<br />(Pour d�placer des posts divis�s vers un nouveau topic, s�lectionnez \'D�placer\'; Pour copier les posts divis�s vers un nouveau topic en le laissant �galement dans le vieux topic, s�lectionnez \'Copier\')';
// end mod split posts and merge in one step
$lang['Too_many_error'] = 'Vous avez s�lectionn� trop de messages. Vous ne pouvez seulement s�lectionner qu\'un seul message pour diviser le sujet � partir de ce message !';
$lang['None_selected'] = 'Vous n\'avez s�lectionn� aucun sujet pour accomplir cette op�ration. Veuillez revenir en arri�re et s�lectionnez-en au moins un.';
$lang['New_forum'] = 'Nouveau forum';
$lang['This_posts_IP'] = 'Adresse IP de ce message';
$lang['Other_IP_this_user'] = 'Autres adresses IP � partir desquelles cet utilisateur a post�';
$lang['Users_this_IP'] = 'Utilisateurs postant � partir de cette adresse IP';
$lang['IP_info'] = 'Informations sur l\'adresse IP';
$lang['Lookup_IP'] = 'Chercher l\'adresse IP';


//
// Timezones ... for display on each page
//
$lang['All_times'] = 'Les heures sont au format %s'; // eg. All times are GMT - 12 Hours (times from next block)
$lang['-12'] = 'GMT - 12 heures';
$lang['-11'] = 'GMT - 11 heures';
$lang['-10'] = 'GMT - 10 heures';
$lang['-9'] = 'GMT - 9 heures';
$lang['-8'] = 'GMT - 8 heures';
$lang['-7'] = 'GMT - 7 heures';
$lang['-6'] = 'GMT - 6 heures';
$lang['-5'] = 'GMT - 5 heures';
$lang['-4'] = 'GMT - 4 heures';
$lang['-3.5'] = 'GMT - 3,5 heures';
$lang['-3'] = 'GMT - 3 heures';
$lang['-2'] = 'GMT - 2 heures';
$lang['-1'] = 'GMT - 1 heure';
$lang['0'] = 'GMT';
$lang['1'] = 'GMT + 1 heure';
$lang['2'] = 'GMT + 2 heures';
$lang['3'] = 'GMT + 3 heures';
$lang['3.5'] = 'GMT + 3,5 heures';
$lang['4'] = 'GMT + 4 heures';
$lang['4.5'] = 'GMT + 4,5 heures';
$lang['5'] = 'GMT + 5 heures';
$lang['5.5'] = 'GMT + 5,5 heures';
$lang['6'] = 'GMT + 6 heures';
$lang['6.5'] = 'GMT + 6.5 heures';
$lang['7'] = 'GMT + 7 heures';
$lang['8'] = 'GMT + 8 heures';
$lang['9'] = 'GMT + 9 heures';
$lang['9.5'] = 'GMT + 9,5 heures';
$lang['10'] = 'GMT + 10 heures';
$lang['11'] = 'GMT + 11 heures';
$lang['12'] = 'GMT + 12 heures';
$lang['13'] = 'GMT + 13 heures';
// These are displayed in the timezone select box
$lang['tz']['-12'] = 'GMT - 12 heures';
$lang['tz']['-11'] = 'GMT - 11 heures';
$lang['tz']['-10'] = 'GMT - 10 heures';
$lang['tz']['-9'] = 'GMT - 9 heures';
$lang['tz']['-8'] = 'GMT - 8 heures';
$lang['tz']['-7'] = 'GMT - 7 heures';
$lang['tz']['-6'] = 'GMT - 6 heures';
$lang['tz']['-5'] = 'GMT - 5 heures';
$lang['tz']['-4'] = 'GMT - 4 heures';
$lang['tz']['-3.5'] = 'GMT - 3:30 heures';
$lang['tz']['-3'] = 'GMT - 3 heures';
$lang['tz']['-2'] = 'GMT - 2 heures';
$lang['tz']['-1'] = 'GMT - 1 heure';
$lang['tz']['0'] = 'GMT';
$lang['tz']['1'] = 'GMT + 1 heure';
$lang['tz']['2'] = 'GMT + 2 heures';
$lang['tz']['3'] = 'GMT + 3 heures';
$lang['tz']['3.5'] = 'GMT + 3:30 heures';
$lang['tz']['4'] = 'GMT + 4 heures';
$lang['tz']['4.5'] = 'GMT + 4:30 heures';
$lang['tz']['5'] = 'GMT + 5 heures';
$lang['tz']['5.5'] = 'GMT + 5:30 heures';
$lang['tz']['6'] = 'GMT + 6 heures';
$lang['tz']['6.5'] = 'GMT + 6:30 heures';
$lang['tz']['7'] = 'GMT + 7 heures';
$lang['tz']['8'] = 'GMT + 8 heures';
$lang['tz']['9'] = 'GMT + 9 heures';
$lang['tz']['9.5'] = 'GMT + 9:30 heures';
$lang['tz']['10'] = 'GMT + 10 heures';
$lang['tz']['11'] = 'GMT + 11 heures';
$lang['tz']['12'] = 'GMT + 12 heures';
$lang['tz']['13'] = 'GMT + 13 heures';
$lang['datetime']['Sunday'] = 'Dimanche';
$lang['datetime']['Monday'] = 'Lundi';
$lang['datetime']['Tuesday'] = 'Mardi';
$lang['datetime']['Wednesday'] = 'Mercredi';
$lang['datetime']['Thursday'] = 'Jeudi';
$lang['datetime']['Friday'] = 'Vendredi';
$lang['datetime']['Saturday'] = 'Samedi';
$lang['datetime']['Sun'] = 'Dim';
$lang['datetime']['Mon'] = 'Lun';
$lang['datetime']['Tue'] = 'Mar';
$lang['datetime']['Wed'] = 'Mer';
$lang['datetime']['Thu'] = 'Jeu';
$lang['datetime']['Fri'] = 'Ven';
$lang['datetime']['Sat'] = 'Sam';
$lang['datetime']['January'] = 'Janvier';
$lang['datetime']['February'] = 'F�vrier';
$lang['datetime']['March'] = 'Mars';
$lang['datetime']['April'] = 'Avril';
$lang['datetime']['May'] = 'Mai';
$lang['datetime']['June'] = 'Juin';
$lang['datetime']['July'] = 'Juillet';
$lang['datetime']['August'] = 'Ao�t';
$lang['datetime']['September'] = 'Septembre';
$lang['datetime']['October'] = 'Octobre';
$lang['datetime']['November'] = 'Novembre';
$lang['datetime']['December'] = 'D�cembre';
$lang['datetime']['Jan'] = 'Jan';
$lang['datetime']['Feb'] = 'F�v';
$lang['datetime']['Mar'] = 'Mars';
$lang['datetime']['Apr'] = 'Avr';
$lang['datetime']['May'] = 'Mai';
$lang['datetime']['Jun'] = 'Juin';
$lang['datetime']['Jul'] = 'Juil';
$lang['datetime']['Aug'] = 'Ao�t';
$lang['datetime']['Sep'] = 'Sept';
$lang['datetime']['Oct'] = 'Oct';
$lang['datetime']['Nov'] = 'Nov';
$lang['datetime']['Dec'] = 'D�c';


//
// Errors (not related to a specific failure on a page)
//
$lang['Information'] = 'Information';
$lang['Critical_Information'] = 'Information critique';
$lang['General_Error'] = 'Erreur g�n�rale';
$lang['Critical_Error'] = 'Erreur critique';
$lang['An_error_occured'] = 'Une erreur est survenue';
$lang['A_critical_error'] = 'Une erreur critique est survenue';
$lang['User_admin_f'] = "Gestion";
$lang['Permissions_control_f'] = "Permission";
$lang['Admin_reauthenticate'] = 'Pour administrer ce forum vous devez vous identifier � nouveau.';

//-- mod : thumbnails ----------------------------------------------------------
//-- add
$lang['Thumbnails_alt'] = 'Image post�e, r�duite en taille. Si aucune image n\'est visible le serveur est mort ou non liable � distance';
$lang['Thumbnails_title'] = 'Cliquez pour agrandir';
//-- fin mod : thumbnails ------------------------------------------------------

// BEGIN Today-Yesterday Mod
$lang['TY-Today'] = "Aujourd'hui, "; //intentional space
$lang['TY-Yesterday'] = "Hier, "; //intentional space
$lang['TY-in'] = "Dans : "; //intentional space
$lang['Go_to_topic'] = "Aller au topic : "; //intentional space
$lang['TY-by'] = "Par : "; //intentional space
$lang['TY-hr'] = "hr, "; //intentional space
$lang['TY-hrs'] = "hrs, "; //intentional space
$lang['TY-min'] = "min "; //intentional space
$lang['TY-mins'] = "mins "; //intentional space
$lang['TY-ago'] =  "Il y a "; //intentional space before the word
$lang['TY-seconds_ago'] = "Il y a quelques secondes";

$lang['Use_rel_date'] = "Afficher la date relative.";		
$lang['Use_rel_date_explain'] = "Aujourd'hui et Hier seront affich�s au lieu de la date.";		
$lang['Use_rel_time'] = "Afficher le temps relatif.";		
$lang['Use_rel_time_explain'] = "Le temps sera relatif au temps courant. Exemple : - 10hrs, 43mins";
// END   Today-Yesterday Mod

$lang['Global_Announcements'] = 'Annonces globales';
$lang['Announcements'] = 'Annonces';
$lang['Sticky_Topics'] = 'Post-It';

// DEBUT >> MOD Advance Debug Mod
$lang['DEBUG'] = 'DEBUGGAGE';
$lang['DEBUG_line'] = 'Ligne';
$lang['DEBUG_file'] = 'Fichier';
$lang['DEBUG_sql_query'] = 'Requ�te SQL';
$lang['DEBUG_sql_error'] = 'Erreur SQL';
$lang['DEBUG_code_debbuger'] = 'Code de l\'erreur trouv�e';
$lang['SQL_syntax_error'] = 'Vous avez une <b>erreur de syntaxe</b> dans votre requ�te SQL, si vous venez de modifier vos fichiers phpBB (en installant un MOD, FIX ou bien une mise � jour), reprenez les �tapes de l\'installation de cette modification.';
$lang['SQL_duplicate_error'] = '<b>Duplicat d\'un champ</b>. Vous avez tenter de cr�er un champ qui existait d�j�, il est donc inutile et impossible de le recr�er une seconde fois.';
$lang['SQL_exist_error'] = '<b>La table que vous tentez de cr�er existe d�j�</b>, il est donc inutile de la cr�er une seconde fois. Si vous souhaitez tout de m�me la cr�er vous devez supprimer l\'ancienne table existante (et tout ce qu\'elle contient).';
// FIN >> MOD Advance Debug Mod

//
// Cached generation
//
$lang['debug_generation'] = 'Page g�n�r�e en <b>%s</b> secondes ||';
$lang['sql_queries'] = 'Requ�tes SQL = <b>%s</b>';

// Start add - Yellow Card Mod
$lang['Give_G_card'] = 'R�activer cet utilisateur';
$lang['Give_Y_card'] = 'Envoyer un avertissement � cet utilisateur: #%d';
$lang['Give_R_card'] = 'Bannir cet utilisateur maintenant';
$lang['Ban_update_sucessful'] = 'La liste de bannissement a �t� mise � jour avec succ�s';
$lang['Ban_update_green'] = 'Cet utilasateur a �t� r�activ�';
$lang['Ban_update_yellow'] = 'Cet utilsateur a re�u un avertissement et a maintenant un total de %d avertissement(s) sur un maximum de %d';
$lang['Ban_update_red'] = 'Cet utilisateur a �t� banni';
$lang['Ban_reactivate'] = 'Votre compte a �t� r�activ�';
$lang['Ban_warning'] = 'Vous avez re�u un avertissement';
$lang['Ban_blocked'] = 'Votre compte a �t� bloqu�';
$lang['Click_return_viewtopic'] = 'Cliquez %sici%s pour revenir au sujet';
$lang['Rules_ban_can'] = 'Vous <b>pouvez</b> bannir des utilisateurs';
$lang['user_no_email'] = 'Cet utilisateur n\'a aucune adresse email, par cons�quent aucun message sur cette action ne peut lui �tre envoy�. Vous devriez lui envoyer un message priv�';
$lang['user_already_banned'] = 'L\'utilisateur s�lectionn� a d�j� �t� banni';
$lang['Ban_no_admin'] = 'Cet utilisateur est l\'<b>administrateur</b>, par cons�quent il ne peut pas �tre averti ou banni';
$lang['Rules_greencard_can'] = 'Vous <b>pouvez</b> d�bannir des utilisateurs';
$lang['Rules_bluecard_can'] = 'Vous <b>pouvez</b> rapporter un message aux mod�rateurs';
$lang['Give_b_card'] = 'Rapporter ce message � un mod�rateur';
$lang['Clear_b_card'] = 'Ce message a %d rapport(s). Si vous appuyez sur ce bouton, vous le remettrez � 0';
$lang['No_moderators'] = 'Ce forum n\'a aucun mod�rateur, par cons�quent aucun rapport ne peut �tre envoy�!';
$lang['Post_repported'] = 'Ce message vient d\'�tre rapport� � %d mod�rateurs';
$lang['Post_repported_1'] = 'Ce message vient d\'�tre rapport� au mod�rateur';
$lang['Post_repport'] = 'Rapport'; //Subject in email notification
$lang['Post_reset'] = 'Les rapports pour ce message ont �t� r�initialis�s';
$lang['Search_only_bluecards'] = 'Rechercher uniquement parmi les messages ayant des rapports';
$lang['Send_message'] = 'Cliquez %sici%s pour �crire un message aux mod�rateurs ou <br />';
$lang['Send_PM_user'] = 'Cliquez %sici%s pour �crire un MP � cet utilisateur ou';
$lang['Link_to_post'] = 'Cliquez %sici%s pour aller au message rapport� <br />--------------------------------<br /><br />';
$lang['Post_a_report'] = 'Rapport';
$lang['Report_stored'] = 'Votre rapport a �t� envoy� avec succ�s';
$lang['Send_report'] = 'Cliquez %sici%s pour revenir au message original';
$lang['Red_card_warning'] = "Vous �tes sur le point d\'envoyer un carton rouge � %s, ceci bannira d�finitivement l\'utilisateur. Etes-vous s�r ?";
$lang['Yellow_card_warning'] = "Vous �tes sur le point d\'envoyer un carton jaune � %s , ceci avertira l\'utilisateur. Etes-vous s�r ?";
$lang['Green_card_warning'] = "Vous �tes sur le point d\'envoyer un carton vert � %s, ceci d�bannira l\'utilisateur. Etes-vous s�r ?";
$lang['Blue_card_warning'] = 'Vous �tes sur le point de transmettre un rapport sur ce message, ceci avertira les mod�rateurs sur la pr�sence de ce message. Etes-vous s�r de vouloir avertir les mod�rateurs de la pr�sence de ce message ?';
$lang['Clear_blue_card_warning'] = 'Vous �tes sur le point de r�initialiser le compteur de rapports pour ce message. Souhaitez-vous continuez ?';
$lang['Warnings'] = 'Averti: %d fois'; //shown beside users post, if any warnings given to the user
$lang['Banned'] = 'Actuellement banni'; //shown beside users post, if user are banned
// End add - Yellow Card Mod

// MOD ColorText
$lang['Colortext'] = 'Couleur du texte de vos posts';
$lang['Colortext_Explain'] = 'Vous pouvez choisir une couleur personnalis�e qui s\'appliquera � tout vos posts.<br />Vous avez 3 fa�ons de choisir une couleur :<br /><font color="red">red</font> - <font color="#ff0000">#ff0000</font> - <font color="ff0000">ff0000</font>';

//
// Disallow editing/deleting administrator posts
//
$lang['Not_auth_edit_delete_admin'] = 'Vous ne pouvez ni �diter, ni effacer les posts des Administrateurs';

// Start Remote Avatar Check Mod
$lang['Smilies_invasion_error_count'] = 'Le nombre de smilies dans le sujet (%d) d�passe la limite (%d)';
// End Remote Avatar Check Mod

//+MOD: Search latest 24h 48h 72h
$lang['Search_latest'] = 'Voir les messages des derni�res';
$lang['Search_latest_XXh'] = '%dh';
//-MOD: Search latest 24h 48h 72h


//Ajout confirmation �crite
$lang['Question_conf_fields_empty'] = 'Le champs confirmation �crite est vide';
$lang['Question_conf_fields_false'] = 'La r�ponse pour la confirmation �crite est fausse';
$lang['Question_conf_explain'] = 'Veuillez saisir la r�ponse en <b>toute lettre et en minuscule</b>.';
//Fin confirmation �crite

//
// Sort memberlist per letter
//
$lang['Sort_per_letter'] = 'Seulement montrer les membres dont le pseudo commence par';
$lang['Others'] = 'autres';
$lang['All'] = 'tous';

//
// That's all Folks!
// -------------------------------------------------


$lang['host'] = 'Votre h�bergeur est :';
$lang['ip'] = 'Votre IP est :';

//-- mod : bbcode box reloaded -------------------------------------------------
//-- add
// acp
$lang['BBcode_Box'] = 'BBcode Box';
$lang['bbc_box_a_settings'] = 'Configuration';
$lang['bbc_box_b_list'] = 'Liste des bbcodes';
$lang['bbc_box_c_manage'] = 'Gestion';
// spoiler
$lang['bbcbxr_spoil'] = 'Spoiler';
$lang['bbcbxr_show'] = 'voir';
$lang['bbcbxr_hide'] = 'cacher';
// code expand
$lang['bbcbxr_expand'] = 'Agrandir';
$lang['bbcbxr_expand_more'] = 'Agrandir encore';
$lang['bbcbxr_contract'] = 'R�duire';
$lang['bbcbxr_select'] = 'Tout s�lectionner';
//-- fin mod : bbcode box reloaded ---------------------------------------------

//-- mod : addon hide for bbcbxr -------------------------------------------------------------------
//-- add
$lang['Hide'] = 'Message prot�g�';
$lang['Hide_text'] = '--- Seul les *membres* ayant post� dans ce sujet peuvent voir le message ---';
$lang['Hide_in_quote'] = '--- phpBB : Le message prot�g� n\'est pas recopi� dans cette citation ---';
//-- fin mod : addon hide for bbcbxr ---------------------------------------------------------------

//-- mod : topics enhanced -----------------------------------------------------
//-- add
//-- bottoms tabs
$lang['bt_title'] = 'Informations';
$lang['bt_perms'] = 'Permissions du forum';
$lang['bt_icons'] = 'Ic�nes des messages';
$lang['bt_showhide_alt'] = 'voir ou cacher les informations';
//-- topics nav buttons
$lang['View_previous_post'] = 'Voir le message pr�c�dent';
$lang['View_next_post'] = 'Voir le message suivant';
$lang['Go_to_bottom'] = 'Aller en bas';
//-- fin mod : topics enhanced -------------------------------------------------

//+MOD: DHTML Collapsible FAQ MOD
// Please note: %sHERE%s is used to dynamically building the A HREF tag, do not remove the percent signs (%) around HERE!
$lang['dhtml_faq_noscript'] = "Il appara�t que votre navigateur ne supporte pas le javascript ou qu'il a �t� d�sactiv� dans les options de votre navigateur.<br /><br />Svp, cliquez %sici%s pour voir une version standard de la FAQ.";
//-MOD: DHTML Collapsible FAQ MOD

// Points System MOD
$lang['Points_cp'] = 'Panneau de contr�le des points';
$lang['Points_sys']	= 'Syst�me de points';
$lang['Points_donation'] = 'Don de points';
$lang['Points_method'] = 'M�thode';
$lang['Points_donate'] = '%sDonner%s';
$lang['Points_add_subtract'] = 'Ajouter ou soustraire des %s';
$lang['Points_amount'] = 'Montant';
$lang['Points_give_take'] = 'Montant de %s � donner ou � prendre';
$lang['Points_give'] = 'Montant de %s � donner';
$lang['Add'] = 'Ajouter';
$lang['Subtract'] = 'Soustraire';
$lang['Points_donate_to'] = 'La personne � qui vous voulez donner des %s ';
$lang['Points_no_username']	= 'Veuillez entrer un nom d\'utilisateur.';
$lang['Points_not_admin'] = 'Vous n\'�tes pas autoris� � administrer le syst�me de points.';
$lang['Points_cant_take'] = 'Vous ne pouvez pas prendre cette somme de %s � cet utilisateur.'; //*
$lang['Points_thanks_donation']	= 'Merci pour votre don.';
$lang['Click_return_points_donate']	= 'Cliquez %sIci%s pour retourner au don de points';
$lang['Points_cant_donate']	= 'Vous ne pouvez pas donner ce montant de %s � cet utilisateur.';
$lang['Points_cant_donate_self'] = 'Vous ne pouvez pas vous donner des %s .';
$lang['Points_user_donation_off'] = 'Le don n\'est pas autoris� actuellement.';
$lang['Click_return_pointscp'] = 'Cliquez %sIci%s pour retourner au panneau de contr�le des points';
$lang['Points_user_updated'] = 'Les %s de cet utilisateur ont �t� mis � jour avec succ�s.';
$lang['Points_mass_edit'] = 'Edition de masse des utilisateurs';
$lang['Points_mass_edit_explain'] = 'Entrez un nom d\'utilisateur par ligne.';
$lang['Points_notify'] = 'Toujours m\'avertir des dons de %s ';
$lang['Points_notify_explain'] = 'M\'envoyer un e-mail quand quelqu\'un me donne des %s ';
$lang['Points_enter_some_donate'] = 'Entrez le montant de %s que vous d�sirez donner.';

// Start add - Regs - Posts - Topics Today
$lang['Count_regs_today'] = 'Aujourd\'hui, nous avons eu <b>%d</b> enregistrements';
$lang['Count_posts_today'] = 'Aujourd\'hui, nous avons eu <b>%d</b> reponses';
$lang['Count_topics_today'] = 'Aujourd\'hui, nous avons eu <b>%d</b> nouveaux sujets';
// End add - Regs - Posts - Topics Today

// Start add - Gender MOD
$lang['Gender'] = 'Sexe';
$lang['Male'] = 'Masculin';
$lang['Female'] = 'F�minin';
$lang['No_gender_specify'] = 'Non sp�cifi�';
$lang['Gender_require'] = '<font color=#c00000>Vous devez sp�cifier votre sexe.</font>';
// End add - Gender MOD

// External forum redirection
// V: why in admin only?
$lang['Forum_external'] = 'Lien externe';
$lang['External_text'] = 'Ce lien a �t� visit� ';
$lang['External_hit'] = ' fois.';
$lang['External_hits'] = ' fois.';
$lang['External_members'] = 'membres';
$lang['External_guests'] = 'invit�s';

$lang['marquee_topic'] = 'Les %s derniers topics';

//+MOD: DHTML Collapsible Forum Index MOD
$lang['CFI_options'] = "Options";
$lang['CFI_options_ex'] = "Options Collapsible Forum Index";
$lang['CFI_close'] = "Fermer";
$lang['CFI_delete'] = "Supprimer la sauvegarde";
$lang['CFI_restore'] = "Restaurer la sauvegarde";
$lang['CFI_save'] = "Sauver";
$lang['CFI_Expand_all'] = "Tout �tendre";
$lang['CFI_Collapse_all'] = "Tout r�duire";
//-MOD: DHTML Collapsible Forum Index MOD

$lang['Copy'] = 'Lien direct de ce message.';

$lang['ClickedXtimes'] = 'Lien cliqu� %.0f fois';

$lang['Forum_enter_limit'] = 'Nombre de message(s) pour acc�der au forum';
$lang['Forum_enter_limit_error'] = 'Vous devez avoir post� <b>%d</b> messages pour acc�der � ce forum ou ce topic.';

// Begin Account Self-Delete MOD
$lang['Account_delete'] = 'Voulez-vous supprimer votre compte sur ce forum ?';
$lang['Account_delete_explain'] = 'La suppression de votre compte sera d�finitive';
$lang['User_deleted'] = 'Votre compte a �t� supprim� avec succ�s.';
$lang['Delete_account_question'] = 'La suppression de votre compte entra�nera la suppression de toutes les informations personnelles vous concernant inclus dans votre profil, au sein de la base de donn�es de ce forum. Les messages que vous avez �crits dans ce forum verront leur auteur remplac�s par un invit�. <b>Attention !</b> Toute suppression sera d�finitive.<br /><br />Souhaitez-vous supprimer votre compte sur ce forum?';

// Default avatar MOD, By Manipe (Begin)
$lang['Choose_default_avatar'] = 'Activer l\'avatar par d�faut';
$lang['Default_avatar_choose_explain'] = 'Si l\'Administrateur a configur� les options pour montrer les avatars par d�faut, les avatars par d�faut pourront �tre montr�s. Cela ne fonctionnera uniquement que si vous n\'avez pas chois vous-m�me de propre avatar. L\'Administrateur choisit l\'avatar par d�faut.';

$lang['Posts_per_day'] = 'Posts par jour';
$lang['Total_topics'] = 'Nombre total de topics';
$lang['Topics_per_day'] = 'Topics par jour';
$lang['Users_per_day'] = 'Membres par jour';
$lang['Board_started'] = 'Forum en ligne depuis le';

//MOD Keep_unread
$lang['keep_post_unread_explain'] = 'Marquer les messages de ce sujet comme non-lus';
$lang['keep_unread_done'] = 'Le sujet a �t� marqu� comme non-lu.';
$lang['View_unread_posts'] = 'Voir les messages non-lus';
$lang['No_unread_posts'] = 'Vous n\'avez pas de messages non-lus';

// Start add - Fully integrated shoutbox Mod
$lang['Shoutbox'] = 'Chat de discussion';
$lang['Shoutbox_date'] = ' d M Y G:i';
$lang['Shout_censor'] = 'Le message a �t� supprim�';
$lang['Shout_refresh'] = 'Rafra�chir';
$lang['Shout_text'] = 'Votre texte';
$lang['Viewing_Shoutbox']= 'Regarde le Chat de discussion';
$lang['Censor'] = 'Censurer';

// www.phpBB-SEO.com SEO TOOLKIT BEGIN - TITLE
 $lang['Page'] = 'Page ';

// Password-protected forums
$lang['Forum_password'] = 'Forum prot�g� par mot de passe';
$lang['Enter_forum_password'] = 'Entrez le mot de passe du forum';
$lang['Incorrect_forum_password'] = 'Mot de passe incorrect';
$lang['Password_login_success'] = 'Mot de passe correct';
$lang['Click_return_page'] = 'Cliquez %sici%s pour revenir � la page';
$lang['Only_alpha_num_chars'] = 'Le mot de passe doit contenir de 3 � 20 caract�res et ne peut comprendre que des caract�res alphanum�riques (A-Z, a-z, 0-9).';

//BEGIN ACP Site Announcement Centre by lefty74
$lang['Site_announcement_block_title'] = 'Annonce du site';
$lang['Guest_announcement_block_title'] = 'Annonce pour les invit�s';

// Long forum desc
$lang['Forum_desc_explain'] = 'Description courte du forum, affich�e sur l\'index du forum';
$lang['Forum_desc_long'] = 'Description longue';			
$lang['Forum_desc_long_explain'] = 'Description plus d�taill�e du forum, ou ses r�gles. Affich�e sur la page de vue du forum.<br/><b>Note :</b> vous pouvez utiliser le BBcode et les Smilies ici.';

// Related topics
$lang['Related_topics'] = 'Sujets similaires';

// Rabbitoshi
$lang['Rabbitoshi_topic']='Voir le familier du membre'; 

// Mini profile
$lang['Read_mini_profile'] = 'Mini profil de l\'utilisateur';
$lang['Viewing_user_mini_profile'] = 'Mini profil de %s'; // %s is username

// presentation required
$lang['Presentation_Message'] = 'Vous devez vous pr�senter sur le forum pr�vu � cet effet avant de pouvoir poster';
$lang['Presentation_Forum_Link'] = 'Cliquez %sici%s';

// sub title
$lang['Sub_title'] = 'Description du sujet';

// phpBB SEO - Addon disable rewrite
$lang['Disable_rewrite'] = 'D�sactiver la r�ecriture d\'adresses';
$lang['Disable_rewrite_explain'] = 'La r�-�criture d\'adresses peut �tre d�sactiv�e si votre serveur ne le permet pas (demande le <i>rewrite_module</i> d\'Apache)';

// V: pm threshold, better error message
$lang['Not_enough_messages_to_pm'] = 'Vous devez participer plus au forum avant de pouvoir utiliser les messages priv�s';