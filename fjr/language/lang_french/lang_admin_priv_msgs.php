<?php
/***************************************************************************
*                            $RCSfile: lang_admin_priv_msgs.php,v $
*                            -------------------
*   begin                : Tue January 20 2002
*   copyright            : (C) 2002-2003 Nivisec.com
*   email                : support@nivisec.com
*
*   $Id: lang_admin_priv_msgs.php,v 1.1 2005/07/21 15:49:49 Nivisec Exp $
*
*
***************************************************************************/

/***************************************************************************
*
*   This program is free software; you can redistribute it and/or modify
*   it under the terms of the GNU General Public License as published by
*   the Free Software Foundation; either version 2 of the License, or
*   (at your option) any later version.
*
***************************************************************************/


/* Added in 1.6.0 */
$lang['PM_View_Type'] = 'Type de vue des MP';
$lang['Show_IP'] = 'Montrer l\'adresse IP';
$lang['Rows_Per_Page'] = 'Lignes par page';
$lang['Archive_Feature'] = 'Caract�ristiques de l\'archive';
$lang['Inline'] = 'Inline';
$lang['Pop_up'] = 'Pop-up';
$lang['Current'] = 'Actuel';
$lang['Rows_Plus_5'] = 'Ajouter 5 lignes';
$lang['Rows_Minus_5'] = 'Enlever 5 lignes';
$lang['Enable'] = 'Activ�';
$lang['Disable'] = 'D�sactiv�';
$lang['Inserted_Default_Value'] = 'L\'item %s de la configuration n\'existe pas, une valeur par d�faut a �t� ins�r�e<br />'; // %s = config name
$lang['Updated_Config'] = 'Item %s de la configuration actualis�<br />'; // %s = config item
$lang['Archive_Table_Inserted'] = 'La table des archives n\'existe pas, elle vient d\'�tre cr��e<br />';
$lang['Switch_Normal'] = 'Changer pour le mode normal';
$lang['Switch_Archive'] = 'Changer pour le mode archive';

/* General */
$lang['Deleted_Message'] = 'Message priv� effac� - %s <br />'; // %s = PM title
$lang['Archived_Message'] = 'Message priv� archiv� - %s <br />'; // %s = PM title
$lang['Archived_Message_No_Delete'] = 'Vous ne pouvez pas effacer %s, il a �t� marqu� \'archiv�\' aussi <br />'; // %s = PM title
$lang['Private_Messages'] = 'Messages Priv�s';
$lang['Private_Messages_Archive'] = 'Archive des Messages Priv�s';
$lang['Archive'] = 'Archive';
$lang['To'] = 'Pour';
$lang['Subject'] = 'Sujet';
$lang['Sent_Date'] = 'Date d\'envoi';
$lang['Delete'] = 'Effacer';
$lang['From'] = 'De';
$lang['Sort'] = 'Ordonner';
$lang['Filter_By'] = 'Filtre par';
$lang['PM_Type'] = 'Type de MP';
$lang['Status'] = 'Statuts';
$lang['No_PMS'] = 'Aucun Message Priv� avec vos crit�res de tri � montrer';
$lang['Archive_Desc'] = 'Les Messages Priv�s choisis pour archiv�s sont list�s ici. Les Utilisateurs ne peuvent plus y acc�der (envoyer et recevoir), mais vous pouvez les voir ou les effacer � n\'importe quel moment.';
$lang['Normal_Desc'] = 'Tous les Messages Priv�s du forum peuvent �tre contr�l�s ici. Vous pouvez lire et choisir de les effacer ou de les archiver (maintenir, mais les utilisateurs ne peuvent plus les voir) tous les messages �galement.';
$lang['Version'] = 'Version';
$lang['Remove_Old'] = 'MPs Orphelins:</a> <span class="gensmall">Les Utilisateurs qui n\'existe plus peuvent avoir laisser des MPs derri�re eux, ceci les supprimera.</span>';
$lang['Remove_Sent'] = 'MPs envoy�s:</a> <span class="gensmall">Les MPs dans la bo�te des messages envoy�s sont seulement des copies des messages envoy�s, except� le fait qu\'ils ont �t� attribu�s � l\'exp�diteur du message apr�s que l\'utilisateur ayant re�u le Message Priv� l\'ait lu. Ce n\'est pas r�ellement n�cessaire.</span>';
$lang['Affected_Rows'] = '%d entr�es connues supprim�es<br>';
$lang['Removed_Old'] = 'Tous les Messages Priv�s Orphelins ont �t� supprim�s<br>';
$lang['Removed_Sent'] = 'Tous les Messages Priv�s envoy�s on �t� supprim�s<br>';
$lang['Utilities'] = 'Utilitaires de Suppression Massive';
$lang['Nivisec_Com'] = 'Nivisec.com';

/* PM Types */
$lang['PM_-1'] = 'Tous les types'; //PRIVMSGS_ALL_MAIL = -1
$lang['PM_0'] = 'MPs Lus'; //PRIVMSGS_READ_MAIL = 0
$lang['PM_1'] = 'Nouveaux MPs'; //PRIVMSGS_NEW_MAIL = 1
$lang['PM_2'] = 'MPs Envoy�s'; //PRIVMSGS_SENT_MAIL = 2
$lang['PM_3'] = 'MPs Sauvegard�s (Dedans)'; //PRIVMSGS_SAVED_IN_MAIL = 3
$lang['PM_4'] = 'MPs Guardadas (Dehors)'; //PRIVMSGS_SAVED_OUT_MAIL = 4
$lang['PM_5'] = 'MPs Non-Lus'; //PRIVMSGS_UNREAD_MAIL = 5

/* Errors */
$lang['Error_Other_Table'] = 'Erreur de demande dans la table demand�e.';
$lang['Error_Posts_Text_Table'] = 'Erreur de demande dans la table \'texte\' des Messages Priv�s.';
$lang['Error_Posts_Table'] = 'Erreur de demande dans la table des Messages Priv�s.';
$lang['Error_Posts_Archive_Table'] = 'Erreur de demande dans la tables des \'archives\' des Messages Priv�s.';
$lang['No_Message_ID'] = 'Aucune ID de message n\'a �t� sp�cifi�e.';


/*Special Cases, Do not bother to change for another language */
$lang['ASC'] = $lang['Sort_Ascending'];
$lang['DESC'] = $lang['Sort_Descending'];
$lang['privmsgs_date'] = $lang['Sent_Date'];
$lang['privmsgs_subject'] = $lang['Subject'];
$lang['privmsgs_from_userid'] = $lang['From'];
$lang['privmsgs_to_userid'] = $lang['To'];
$lang['privmsgs_type'] = $lang['PM_Type'];

?>
