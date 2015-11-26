<?php
/**
*
* @package phpBB SEO GYM Sitemaps
* @version $Id: lang_ggs_admin.php 2007/04/12 13:48:48 dcz Exp $
* @copyright (c) 2006 dcz - www.phpbb-seo.com
* @license http://opensource.org/osi3.0/licenses/lgpl-license.php GNU Lesser General Public License
*
*/ 
// 
// The format of this file is: 
// 
// ---> $lang["message"] = "text"; 
// 
// Specify your language character encoding... [optional]
// 
// setlocale(LC_ALL, "fr");

// ACP
$lang['ggs_conf_title'] = 'Google Yahoo MSN Sitemaps and RSS';
$lang['ggs_conf_explain'] = "Sur cette page vous pouvez r�gler un certain nombre de param�tres du module Ultimate Google Sitemap & RSS.<br />";
$lang['ggs_menu'] = "Navigation";
// Gen settings
$lang['gen_settings'] = "Configuration G�n�rale";
$lang['gen_settings_explain'] = "Les param�tres de cette section sont communs � tous les types de plans (au sens large) : Google Sitemaps, Yahoo urllist.txt et RSS 2.0.<br/> Chaque type de plan poss�de par ailleurs ses propres param�tres, d�finis dans une section d�di�e.";

$lang['gen_mod_rewrite'] = "R��criture d'URL";
$lang['gen_mod_rewrite_explain'] = "Cette option active la r��criture d'URL sur l'ensemble du module : les URLs des sitemaps seront de la forme \"forum-ggsxx.xml\", celles des flux RSS \"forum-rssxx.xml\".<br /><u>ATTENTION :</u> vous DEVEZ utiliser un serveur Apache (mod_rewrite activ�) ou IIS (et isapi_rewrite), et mettre correctement en place les Rewriterules sp�cifiques dans le .htaccess de votre forum.<br /><u>NOTE :</u> Si vous utilisez un mod Rewrite phpBB SEO ( <a href=\"http://www.phpbb-seo.com\">www.phpbb-seo.com</a> ), le module d�tectera automatiquement le type de r��criture d'URL.";

$lang['gen_mod_rewrite_type'] = "Type de r��criture";
$lang['gen_mod_rewrite_type_explain'] = "Trois niveaux de r��criture d'url sont possibles : Aucun, Simple, Interm�diaire et Avanc� :<br/><ul><li><b>Aucun</b> : Aucune r��criture<br></li><li><b>Simple</b> : R��criture statique, sans injection de titres dans les liens<br></li><li><b>Interm�diaire</b> : L'injection des titres est partielle. Les titres seront inject�s pour les noms de cat�gories et de forums, les sujets du forum conservant une r��criture statique<br></li><li><b>Avanc�</b> : L'injection des titres est totale : titres des cat�gories, forums, sujets sont inject�s dans leurs URLs</li></ul><br />Cette m�thode sera bient�t �tendue pour le support d'autres mod rewrites.";

$lang['ggs_showstats'] = "Statistiques";
$lang['ggs_showstats_explain'] = "Activer ou non l'affichage des statistiques (temps de g�n�ration, nombre de requ�tes, etc.) en sortie. Les statistiques seront affich�es uniquement dans le code source de la page.<br /><u>Note :</u> Le premier temps affich� est celui de la construction de la page, cette construction n'est pas r�p�t�e lors d'un affichage depuis le cache.";

$lang['ggs_advanced'] = 'Avanc�';
$lang['ggs_none'] = "Aucun";
$lang['ggs_mixed'] = "Interm�diaire";
$lang['ggs_simple'] = "Simple";
// Gen mxBB
$lang['gen_mx_set'] = 'Sp�cifique mxBB';
$lang['gen_mx_set_explain'] = 'Sont regroup�s ici le r�glages concernant sp�cifiquement les pages du portail %smxBB%s.';

// Gen KB
$lang['gen_kb_set'] = 'Sp�cifique Sitemaps KB';
$lang['gen_kb_set_explain'] = 'Sont regroup�s ici le r�glages concernant sp�cifiquement le module Knowledge Base (KB).';


$lang['ggs_zero_dupe'] = "R�duction de duplicates";
$lang['ggs_zero_dupe_explain'] = "Le mod v�rifie alors si l'URL demand�e correspond � celle attendue, et fait le n�cessaire si besoin.<br /><u>Note :</u> Cette v�rification n'est pour l'instant faite que lors de la mise en cache des plans, elle sera sans effet sur des lectures depuis le cache.";

$lang['ggs_gun_zip'] = "Compression GZip";
$lang['ggs_gun_zip_explain'] = "Permet d'activer la compression GZip sur tous les plans, ce qui � pour effet de grandement diminuer la taille des fichiers transmis, et si la sortie � lieu � partir du cache, de consommer moins de ressources serveur, les fichiers mis en cache �tant �galement compress�s et transmis tels quels.<br /> Le module est capable de d�tecter le support GZip du client et si n�cessaire, d�compresser le cache avant d'afficher la page.";
$lang['ggs_gun_zip_lvl'] = "Niveau de compression GZip";
$lang['ggs_gun_zip_lvl_explain'] = "R�glable entre 0 et 9, 9 �tant la compression la plus �lev�e.";
$lang['ggs_gz_avail'] = "<br/><u>NOTE :</u> La compression Gun-zip est activ�e dans la config de phpBB. Elle est de ce fait obligatoire pour le module.";
$lang['ggs_gz_notavail'] = "<br/><u>NOTE :</u>  La compression Gun-zip est d�sactiv�e dans la config de phpBB. Vous pouvez librement choisir une valeur pour ce r�glage.";


$lang['ggs_cache'] = "Cache";
$lang['ggs_cache_explain'] = "Permet d'activer le cache pour l'ensemble du module. Les fichiers sont mis dans le dossier d�fini ci-dessous et ce dossier  devra avoir les droits n�cessaires pour un bon fonctionnement (CHMOD 0777).";
$lang['ggs_mod_since'] = "Modifi� depuis";
$lang['ggs_mod_since_explain'] = "Permet de v�rifier si le navigateur n'aurait pas une version � jour de la page demand�e dans son cache pour le cas �ch�ant lui demander de s'en servir plut�t que de solliciter le serveur inutilement.";
$lang['ggs_force_cache_gzip'] = "Forcer la compression du cache";
$lang['ggs_force_cache_gzip_explain'] = "Permet de forcer la compression du cache, m�me si GZip est d�sactiv� ou si un utilisateur ou un bot qui ne supporterait pas la compression venait � visiter un des plans.";
$lang['ggs_cache_dir'] = "Dossier cache";
$lang['ggs_cache_dir_explain'] = "Nom du dossier cache. Le dossier doit se trouver dans mx_ggsitemaps/. Ex : gs_cache/";
$lang['ggs_clr_cache'] = "Vidange du Cache";
$lang['ggs_clr_cache_explain'] = "Vous pouvez ici vider manuellement tout ou partie du dossier cache.<br/>S�lectionnez un type pr�cis pour ne pas affecter les autres.";
$lang['ggs_clr_all'] = "Tous";
$lang['ggs_clr_ggs'] = "Google";
$lang['ggs_clr_rss'] = "RSS";
$lang['ggs_clr_yahoo'] = "Yahoo";
$lang['ggs_cache_cleared_ok'] = "Vidange du cache r�ussie dans : ";
$lang['ggs_cache_cleared_not_ok'] = "Un probl�me est survenu pendant la vidange du cache, veuillez v�rifier les droits du dossier (CHMOD 777).<br />Le dossier utilis� actuellement pour le cache est ";
$lang['ggs_file_cleared_ok'] = "Fichier(s) effac�(s) : ";
$lang['ggs_cache_accessed_ok'] = "Le cache � vider ne contenait aucun �lement, aucun fichier n'a donc �t� effac� dans : ";
$lang['ggs_cache_status'] = "Le dossier configur� pour le cache est : <b>%s</b>";
$lang['ggs_cache_found'] = "Le dossier cache a �t� trouv�.";
$lang['ggs_cache_not_found'] = "Le dossier cache n'a pas �t� trouv�.";
$lang['ggs_cache_writable'] = "Le dossier cache est utilisable.";
$lang['ggs_cache_unwritable'] = "Le dossier cache n'est pas utilisable. Vous devez configurer son CHMOD sur 0777.";

$lang['gen_sort_order'] = 'Classement';
$lang['gen_new_first'] = 'DESC';
$lang['gen_old_first'] = 'ASC';
$lang['gen_sort_order_explain'] = 'Tous les liens sont tri�s comme les sujets d\'un forum (DESC = le dernier actif plac� en premier). <br />Vous pouvez inverser la tendance, pour par exemple faciliter la remise en cache dans l\'index de Google des sujets inactifs depuis longtemps';

// Google sitemaps General settings
$lang['ggs_settings'] = 'Sitemaps Google';
$lang['ggs_settings_explain'] = "Le syst�me de Sitemap Google permet au GoogleBot de trouver facilement des liens vers du contenu pas imm�diatement accessible depuis l'index du forum. Ce syst�me g�n�re un index des Sitemaps pointant vers les diff�rentes Sitemaps install�es.<br /> Vous devez enregistrer votre SitemapIndex chez %sGoogle%s si vous voulez profiter des statistiques offerts.<br/>Vous pouvez �galement inscrire votre plan chez <a href=\"https://siteexplorer.search.yahoo.com/mysites\">Yahoo</a>, and MSNen utilisant le <a href=\"http://www.sitemaps.org/faq.html#faq_after_submission\">Proptocole United Sitemaps</a><br/>Dans tous les cas, la seul URL � inscrire et celle de votre sitemapIndex one : sitemap.php (ou sitemaps.xml avec mod rewrite)<br/>En compl�ment, le module est capable de metre vos plan en forme en utilisant une feuille de style XSLTransform pour produire une sortie html � partir de la soucre XML.";
$lang['ggs_settings_explain2'] = "Il existe cependant des syst�mes de soumissions %sanonymes%s";

$lang['ggs_xslt'] = "Style";
$lang['ggs_xslt_explain'] = 'Les plans Google sitemaps peuvent �tre mis en forme en utilisant une feuille de style <a href="http://www.w3schools.com/xsl/xsl_transformation.asp">XSL-Transform</a>. Assurez vous simplement d\'avoir mis le dossier ggs_style/ dans le m�me dossier que sitemap.php avant d\'activer l\'option.';
$lang['ggs_sql_limit'] = 'Cycle SQL';
$lang['ggs_sql_limit_explain'] = 'Les requ�tes SQL sont divis�es en plusieurs it�rations pour ne pas surcharger le serveur.<br /> Valeur par d�faut : 200 �l�ments par requ�te.';

$lang['ggs_default_limit'] = 'Limite URLs';
$lang['ggs_default_limit_explain'] = 'Le nombre maximum d\'�l�ments retourn�s dans chaque Sitemap.<br /> Cette limite �tant v�rifi�e � chaque cycle SQL, le nombre d\'URLs retourn�es correspond donc � cette limite � 1 cycle + plus le nombre d\'URLsl �ventuellement g�n�r�es par la pagination des sujets du dernier cycle.<br /> Ce nombre est donc limit� � 40 000 par d�faut sachant que Google accepte jusqu\'�  50 000 URLs par Sitemap.';
$lang['ggs_auto_regen'] = "Auto R�g�n�ration du cache";
$lang['ggs_auto_regen_explain'] = "Autoriser la mise � jour automatique du cache pour les plans de site Google.";
$lang['ggs_cache_max_age'] = "Dur�e du cache";
$lang['ggs_cache_max_age_explain'] = "Dur�e de vie maximum du cache en heures pour les Sitemaps Google. Le cache de chaque page sera recalcul� � chaque demande effectu�e apr�s qu'il ait expir� si la r�g�n�ration est automatique. Dans le cas contraire, il sera remis a jour uniquement sur demande.";
$lang['ggs_gzip_ext'] = "Gun-Zip suffix";
$lang['ggs_gzip_ext_explain'] = "Vous pouvez choisir d'utiliser ou non l'extension .gz pour les liens r��crits des plans de site Google.<br/>sitemaps.xml.gz vs sitemaps.xml<br/>Les deux marchent avec Gunzip, c'est une question de pr�f�rences.";
// Google sitemaps Forum settings
$lang['ggs_forum_settings'] = 'Sp�cifique Forums';
$lang['ggs_forum_exclude'] = 'Exclusion de forums';
$lang['ggs_forum_exclude_explain'] = 'Permet d\'exclure une s�lection de forums publics des Sitemap Google.<br />Entrez les ID de forums � exclure s�par�s par des virgules (ex : 1,5,8).<br /><u>Note :</u> Laisser vide pour lister tous les forums publics.';

$lang['ggs_announce_priority'] = 'Priorit� des Annonces';
$lang['ggs_announce_priority_explain'] = 'D�fini la priorit� accord�e aux Annonces du forum (nombre compris entre 0 et 1.0 inclus)';
$lang['ggs_sticky_priority'] = 'Priorit� des Post-it';
$lang['ggs_sticky_priority_explain'] = 'D�fini la priorit� accord�e aux Post-it du forum (nombre compris entre 0 et 1.0 inclus)';
$lang['ggs_default_priority'] = 'Priorit� par d�faut';
$lang['ggs_default_priority_explain'] = 'D�fini la priorit� accord�e aux sujets normaux du forum (nombre compris entre 0 et 1.0 inclus)';
$lang['ggs_pagination'] = "Pagination";
$lang['ggs_pagination_explain'] = "Afficher ou non les liens vers les diff�rentes pages des sujets et forums.<br />Si vous choisissez \"Non\", un sujet compos� de plusieurs pages diff�rentes ne sera affich�s qu\'une fois, et le listing des sujets d\'un forum ne reprendra que la premi�re page.";
$lang['ggs_pagination_limit1'] = "Pagination : Limite Basse";
$lang['ggs_pagination_limit_explain1'] = "Si la pagination est activ�e, vous pouvez la limiter. <br /> Entrez ici le nombre de premi�res pages de chaque sujet ou forum � prendre en compte.<br /> Entrez 0 pour ne pas retourner de liens vers les premi�res pages.";
$lang['ggs_pagination_limit2'] = "Pagination : Limite Haute";
$lang['ggs_pagination_limit_explain2'] = "Il s'agit ici de d�finir le nombre de pages � prendre en compte en partant de la derni�re.<br /> Entrez 0 pour ne pas retourner de liens vers les derni�res pages des sujets et forums.";

// Google sitemaps mxBB settings
$lang['ggs_mx_exclude'] = "Exclusion de Pages mxBB";
$lang['ggs_mx_exclude_explain'] = "Permet d'exclure des Sitemap Google une s�lection de pages publiques du portail.<br />Entrez les ID des pages mxBB � exclure s�par�s par des virgules (ex : 32,5,8).<br /><u>Note :</u> Laisser vide pour lister toutes les pages publiques.";
$lang['ggs_mx_settings'] = "Sp�cifique Google Sitemaps";

// Google sitemaps KB settings
$lang['ggs_kb_mx_page'] = "ID page MX pour KB";
$lang['ggs_kb_mx_page_explain'] = "Ceci n'est utile que si le mod Knowledge Base est install� dans une page de %smxBB PORTAL%s. Si vous n'utilisez par KB ni mxBB, ne vous souciez pas de cette option. <br />ATTENTION : Si vous n'entrez pas la bonne ID de page vous risquer de pointer vers des 404!!!";
$lang['ggs_kb_exclude'] = 'Exclusion de Cat�gories';
$lang['ggs_kb_exclude_explain'] = 'Permet d\'exclure une s�lection de Cat�gories publiques des Sitemap Google.<br />Entrez les ID des Cat�gories � exclure s�par�s par des virgules (ex : 1,5,8).<br /><u>Note :</u> Laisser vide pour lister toutes les Cat�gories publiques.';
// RSS KB settings
$lang['rss_exclude_kb'] = 'Exclusion de Cat�gories';
$lang['rss_exclude_kb_explain'] = 'Permet d\'exclure une s�lection de Cat�gories publiques des Flux RSS.<br />Entrez les ID des Cat�gories � exclure s�par�s par des virgules (ex : 1,5,8).<br /><u>Note :</u> Laisser vide pour lister toutes les Cat�gories publiques.';
$lang['rss_kb_settings'] = "Sp�cifique Flux RSS";
//RSS mxBB settings
$lang['rss_exclude_mx'] = 'Exclusion de Pages mxBB';
$lang['rss_exclude_mx_explain'] = 'Permet d\'exclure une s�lection de Pages publiques du portail des Flux RSS.<br />Entrez les ID des Pages mxBB � exclure s�par�s par des virgules (ex : 32,5,8).<br /><u>Note :</u> Laisser vide pour lister toutes les Pages publiques.';
$lang['rss_mx_settings'] = "Sp�cifique Flux RSS";

// RSS General settings
$lang['rss_settings'] = 'Flux RSS';
$lang['rss_settings_explain'] = "Le module construit et met en cache diff�rents types de flux de syndication au format RSS 2.0.<br /> La sortie utilise en outre le syst�me de transformation XSLT, permettant au navigateur qui le permettent de construire une pr�sentation html des flux xml.<br /> Les diff�rents types de flux possibles sont :<br/>- Un flux g�n�ral, reprenant les sujets du forum (ainsi que ceux des �ventuels autres modules compatibles)<br/>- Un flux ne reprenant que les derniers messages de l'ensemble du forum<br/>- Un flux par forum et un flux listant les URLs des forums;<br/>Et enfin, un canal sp�cial, au stade exp�rimental, qui liste l'ensemble des flux RSS disponibles.<br/>Chaque flux est disponible en trois versions configurables : une version longue, une version standard et une version courte, chacune des trois versions pouvant de plus int�grer ou non un r�sum� des messages de la liste.<br/>Vous pouvez �galement inscrire vos flux princpaux chez <a href=\"https://siteexplorer.search.yahoo.com/mysites\">Yahoo</a>, comme rss.php (ou rss.xml).<br/> Les flux RSS de chaque forum peuvent �tre soumis de fa�on automatique, en utilisant l'api Yahoo! Notifications. Voyez plus bas.";
$lang['rss_xslt'] = "Style";
$lang['rss_xslt_explain'] = 'Les flux RSS peuvent �tre mis en forme en utilisant une feuille de style <a href="http://www.w3schools.com/xsl/xsl_transformation.asp">XSL-Transform</a>. Assurez vous simplement d\'avoir mis le dossier ggs_style/ dans le m�me dossier que rss.php avant d\'activer l\'option.';
$lang['rss_force_xslt'] = "Forcer le Style";
$lang['rss_force_xslt_explain'] = "FF2 et IE7 imposent leur gestion des flux RSS, et outrepassent les feuilles de styles xsl.<br/>Ils n'analysent que les 500 premiers caract�res des fichiers xml pour en determiner la nature.<br/>Cette option ajoute 600 espaces au d�but du fichier pour r�tablir la prise en charge de la feuille de style xsl pour ces deux navigateurs.";
$lang['rss_sitename'] = "Nom du site";
$lang['rss_sitename_explain'] = "L'intitul� du site qui sera pris en compte pour les flux RSS.";
$lang['rss_sitedesc'] = "Description du site";
$lang['rss_sitedesc_explain'] = "La description du site qui sera prise en compte pour les flux RSS.";
$lang['rss_cinfo'] = "Information copyright";
$lang['rss_cinfo_explain'] = "Le copyright qui sera pris en compte pour les flux RSS.";
$lang['rss_lang'] = "Langue";
$lang['rss_lang_explain'] = "Le code langue qui sera pris en compte pour les flux RSS (fr, en, etc.).";
$lang['rss_charset'] = "Charset";
$lang['rss_charset_explain'] = "Vous devez indiquer ici le jeux de caract�res que vous utilisez sur votre forum.<br/>Les jeux de caract�res windows valent �galement pour les char-set cp.<br/>Si vous choisissez l'option auto, le module tentera de s�lectionner le bon char-set automatiquement, en se basant sur vos r�glages php.<br/> Le jeux de caract�res d�finit dans la classe phpbb_seo , le cas �ch�ant (<a href=\"http://www.phpbb-seo.com/forums/toolkit-phpbb-seo/mod-rewrites-phpbb-seo-vt65.html\">mod rewrite phpBB SEO</a> install�), prend le dessus sur ce r�glage.";
$lang['rss_charset_test_match'] = "<br/>Si vous choisissez l'option auto, le module tentera de s�lectionner le bon char-set automatiquement, en se basant sur la config php de votre serveur.<br/>Le jeux de caract�re actuellement d�fini par votre extension mbstring est : <b>%s</b><br/>Il est cependant <u>possible</u> que ce r�glage ne soit <i>pas</i> celui utilis� par votre forum. Si cela �tait le cas vous auriez � s�lectionner le jeux de caract�re manuellement.<br/> Dans tous les cas, il est pr�f�rable de d�finir ici un jeux de caract�re pr�cis, afin de ne pas d�pendre des �ventuels �volutions des param�tres de votre serveur.";
$lang['rss_charset_conv'] = "Char-set conversion method";
$lang['rss_charset_conv_explain'] = "Les flux RSS utilisent l'UTF-8 comme encodage final pour s'assurer qu'ils seront bien affich� de partout.<br/>Plusieurs m�thodes de conversion sont disponibles. Vous pouvez ici choisir de forcer l'utilisation d'une m�thode particuli�re, dans le cas o� le comportement par d�faut (auto) �chouerait pour s�lectionner une m�thodes compatible avec votre serveur.<br/>Notez que cela ne devrait se produire que tr�s rarement, laisser sur auto devrait marcher et �tre le meilleur r�glage dans la grande majorit� des cas. Choisir phpbb3 forcera l'utilisation de la m�thode de conversion de phpBB3, cette m�thode �tant celle qui devrait prendre en charge le plus de cas, sans �tre la plus l�g�re de toutes.";
$lang['rss_image'] = "Image du site";
$lang['rss_image_explain'] = "Le nom de l'image du site qui sera prise en compte pour les flux RSS. Le dossier image se trouve dans ggs_style/. Ex : rss_site.gif.";
$lang['rss_forum_image'] = "Image du Forum";
$lang['rss_forum_image_explain'] = "Le nom de l'image du Forum qui sera prise en compte pour les flux RSS. Le dossier image se trouve dans ggs_style/. Ex : rss_forum.gif.";
$lang['rss_cache_max_age'] = "Dur�e du cache";
$lang['rss_cache_max_age_explain'] = "Dur�e de vie maximum du cache en heures pour les flux RSS. Le cache de chaque page sera recalcul� � chaque demande effectu�e apr�s qu'il ait expir� si la r�g�n�ration est automatique. Dans le cas contraire, il sera remis a jour uniquement sur demande.";
$lang['rss_auto_regen'] = "Auto R�g�n�ration du cache";
$lang['rss_auto_regen_explain'] = "Autoriser la mise � jour du cache automatique pour les flux RSS.";
$lang['rss_gzip_ext'] = "Gun-Zip suffix";
$lang['rss_gzip_ext_explain'] = "Vous pouvez choisir d'utiliser ou non l'extension .gz pour les liens r��crits des flux RSS.<br/>rss.xml.gz vs rss.xml<br/>Les deux marchent avec Gunzip, c'est une question de pr�f�rences.";

$lang['Google_Config_updated'] = "Mise &agrave; jour de la configuration du Module effectu&eacute;e";
$lang['Click_return_ggsitemap_config'] = "Cliquez %sici%s pour retourner &agrave; l'Administration du module";

// RSS Content Settings
$lang['rss_content_settings'] = "Contenu des Flux RSS";
$lang['rss_msg_txt'] = "Texte des messages";
$lang['rss_msg_txt_explain'] = "Vous pouvez choisir d'autoriser l'affichage du contenu complet ou un r�sum� de chaque message dans les flux RSS.<br/><u>NOTE :</u> Cette option accentue la charge serveur lors de la mise en cache, les limites avec texte devraient �tre inf�rieures aux limites sans texte.";
$lang['rss_allow_bbcode'] = "Autoriser les BBcodes";
$lang['rss_allow_bbcode_explain'] = "Vous pouvez choisir d'autoriser ou non l'interpr�tation des bbcodes dans les flux contenant des messages.";
$lang['rss_strip_bbcode'] = "Filtre BBcodes";
$lang['rss_strip_bbcode_explain'] = "Vous pouvez ici renseigner une liste de bbcode � ne pas prendre en compte.<br/>Le format est simple : <br/><ul><li> <u>Liste de bbcode s�par�s par des virgules :</u> Efface les tag bbcode, conserve leur contenu. <br/><u>Exemples :</u> <b>img,b,quote</b> <br/> Dans cet exemple, les bbcodes image, gras, et citation ne seront pas pris en compte, les tags seront effac�s et leur contenu conserv�.</li><li> <u>Liste de bbcode s�par�s par des virgules avec l'option \"deux points\" (\":\") :</u> Efface les tags bbcode, en d�cidant du sort de leur contenu. <br/><u>Exemple :</u> <b>img:1,b:0,quote,code:1</b> <br/> Dans cet exemple, le bbcode image et le lien de l'image seront effac�s, les gras ne seront pas appliqu�s, mais le texte mise en gras conserv�, les citations ne seront pas mise en forme mais leur contenu conserv�, les portions de code seront effac�s de la sortie.</ul>Les filtres fonctionnent m�me si les bbcodes ne sont pas autoris�s, pratique pour effacer les portions de code et les liens images par exemple.<br/>Les filtres sont appliqu�s avant la c�sure.<br/>Le param�tre Magique \"all\" (�quivalent de all:0, all:1 pour supprimer aussi le contenu des bbcodes) prend en charge tous les bbcodes � la fois.";
$lang['rss_allow_links'] = "Autoriser les liens";
$lang['rss_allow_links_explain'] = "Vous pouvez choisir d'autoriser ou non l'affichage de liens cliquable dans le contenu des messages des flux.";
$lang['rss_allow_smilies'] = "Autoriser les smilies";
$lang['rss_allow_smilies_explain'] = "You may choose here to either parse the smiles or not in content.";
$lang['rss_sumarize'] = "R�sum�";
$lang['rss_sumarize_explain'] = "Vous pouvez choisir de ne pas afficher tout le contenu des messages dans les flux RSS.<br/> La limite est exprim�e en nombre de phrases, de mots ou de caract�res, en fonction de la methode choisie ci-dessous. Entrez 0 pour afficher le message en entier.";
$lang['rss_sumarize_method'] = "Methode de c�sure";
$lang['rss_sumarize_method_explain'] = "Vous pouvez choisir parmis trois m�thodes de c�sure. <br/> Une c�sure par phrase aura plus de chance de rester pr�sentable avec des bbcodes, les c�sures par mots et caract�res sernt plus pr�cises. La c�sure par nombre de caract�res de coupe pas les mots eux m�mes.";
$lang['rss_digest_sentences'] = "Phrases";
$lang['rss_digest_words'] = "Mots";
$lang['rss_digest_chars'] = "Caract�res";
$lang['rss_first'] = "Afficher le premier message";
$lang['rss_first_explain'] = "Conserver ou non l'affichage du premier message de chaque sujet du forum dans les flux RSS.<br/> Par d�faut, seul le dernier message de chaque sujet est pris en compte.";
$lang['rss_last'] = "Afficher le dernier message";
$lang['rss_last_explain'] = "Conserver ou non l'affichage du dernier message de chaque sujet du forum dans les flux RSS.<br/> Par d�faut, seul le dernier message de chaque sujet est pris en compte : en choisissant \"Non\" cette option vous permet de n'afficher que le premier message de chaque sujet.";
$lang['rss_allow_short'] = "Autoriser les Flux Courts";
$lang['rss_allow_short_explain'] = "Vous pouvez autoriser ou non l'utilisation des listes courtes.";
$lang['rss_allow_long'] = "Autoriser les Flux Longs";
$lang['rss_allow_long_explain'] = "Vous pouvez autoriser ou non l'utilisation des listes longues.";
$lang['rss_allow_auth'] = "Autoriser les flux priv�s";
$lang['rss_allow_auth_explain'] = "Le module est capable de construire des flux rss personalis�s en fonction des autorisations de chaque membres.<br/> Une fois activ�, les membres seront autoris�s � voir les flux des forums priv�s auxquels ils ont acc�s.";
$lang['rss_cache_auth'] = "Mise en cache des flux priv�s";
$lang['rss_cache_auth_explain'] = "Vous pouvez ici d�sactiver la mise en cache des flux priv�s.<br/> Les mettre en cache augmente le nombre de fichiers n�c�ssaires, ce qui ne devrait pas �tre un probl�me dans le cas g�n�ral, mais vous pouvez ici choisir de ne pas mettre en cache les flux priv�s";

$lang['rss_exclude_forum'] = "Exclusion de forums";
$lang['rss_exclude_forum_explain'] = "Permet d'exclure une s�lection de forums publics des flux RSS.<br />Entrez les ID de forums � exclure s�par�s par des virgules (ex : 1,5,8).<br /><u>Note :</u> Laisser vide pour lister tous les forums publics.";

// RSS Limits Settings
$lang['rss_limit_settings'] = "Limites";
$lang['rss_limit_time'] = "Limite temporelle";
$lang['rss_limit_time_explain'] = "Limiter en nombre de jours, l'anciennet� maximale des messages pris en compte. Ne concerne pas les flux de chaque forum, uniquement les flux g�n�raux. Peut s'av�rer utile sur de gros forums pour augmenter les performances du module RSS. Entrez 0 pour aucune limite.";
$lang['rss_url_limit_long'] = "Limites Longues";
$lang['rss_url_limit_long_explain'] = "Nombre maximum de liens affich�s sur une liste longue sans texte, si l'option est activ�e.";
$lang['rss_url_limit'] = "Limite par d�faut";
$lang['rss_url_limit_explain'] = "Nombre de lien affich�s par d�faut sur une liste sans texte.";
$lang['rss_url_limit_short'] = "Listes courtes";
$lang['rss_url_limit_short_explain'] = "Nombre maximum de liens affich�s sur une liste courte sans texte, si l'option est activ�e.";
$lang['rss_sql_limit'] = "Cycle SQL";
$lang['rss_sql_limit_explain'] = "Nombre d'�l�ments par requ�te SQL pour les listes sans texte.";
$lang['rss_url_limit_txt_long'] = "Limites Longues avec texte";
$lang['rss_url_limit_txt_long_explain'] = "Nombre maximum de liens affich�s sur une liste longue avec texte, si l'option est activ�e.";
$lang['rss_url_limit_txt'] = "Limite par d�faut avec texte";
$lang['rss_url_limit_txt_explain'] = "Nombre maximum de liens affich�s sur une liste courte avec texte, si l'option est activ�e.";
$lang['rss_url_limit_txt_short'] = "Listes courtes avec texte";
$lang['rss_url_limit_txt_short_explain'] = "Nombre maximum de liens affich�s sur une liste courte avec texte, si l'option est activ�e.";
$lang['rss_sql_limit_txt'] = "Cycle SQL Texte";
$lang['rss_sql_limit_txt_explain'] = "Nombre d'�l�ments par requ�te SQL pour les listes avec texte.";


// Yahoo Settings
$lang['yahoo_settings'] = "Liste Yahoo! urllist.txt";
$lang['yahoo_settings_explain'] = 'Le module construit et met en cache un fichier texte au format Yahoo! urllist.txt.<br/> Il s\'agit d\'une simple liste au format texte, une URL par ligne, reprenant les liens vers les derniers messages de chaque forum, que vous pouvez soumettre � <a href="http://siteexplorer.search.yahoo.com/">Yahoo!</a>.<br/><u>NOTE :</u> Yahoo! acceptant aussi les flux RSS, il est possible que la m�thode du fichier texte ne soit pas beaucoup plus int�ressante. Le fichier urllist.txt est plus int�ressant dans la mesure o� il fournit des liens pagin�s et ne provenant pas forc�ment des m�mes forums que les flux.';
$lang['yahoo_limit'] = "Limite";
$lang['yahoo_limit_explain'] = "Vous pouvez ici Limiter le nombre d'URLs en sortie.<br/><u>NOTE :</u> Il est inutile de d�finir une trop grande limite, cela risquerait de surcharger le serveur inutilement.";
$lang['yahoo_sql_limit'] = "Cycle SQL";
$lang['yahoo_sql_limit_explain'] = "Les requ�tes SQL sont divis�es en plusieurs it�rations pour ne pas surcharger le serveur.<br /> Valeur par d�faut : 100 �l�ments par requ�te.";
$lang['yahoo_limit_time'] = "Limite temporelle";
$lang['yahoo_limit_time_explain'] = "Limiter en nombre de jours, l'anciennet� maximale des messages pris en compte. Peut s'av�rer utile sur de gros forums pour augmenter les performances du module Yahoo! urllist.txt. Entrez 0 pour aucune limite.";
$lang['yahoo_cache_max_age'] = "Dur�e du cache";
$lang['yahoo_cache_max_age_explain'] = "Dur�e de vie maximum du cache (en heures) pour la liste urllist.txt. Le cache sera recalcul� � chaque demande effectu�e apr�s qu'il ait expir� si la r�g�n�ration est automatique. Dans le cas contraire, il sera remis � jour uniquement sur demande.";
$lang['yahoo_auto_regen'] = "Auto R�g�n�ration du cache";
$lang['yahoo_auto_regen_explain'] = "Autoriser la mise � jour automatique du cache pour la liste urllist.txt.";
$lang['yahoo_pagination'] = "Pagination";
$lang['yahoo_pagination_explain'] = "Afficher ou non les liens vers les diff�rentes pages des sujets et forums.";
$lang['yahoo_pagination_limit1'] = "Pagination : Limite Basse";
$lang['yahoo_pagination_limit_explain1'] = "Si la pagination est activ�e, vous pouvez la limiter. <br /> Entrez ici le nombre de premi�res pages de chaque sujet ou forum � prendre en compte.<br /> Entrez 0 pour ne pas retourner de liens vers les premi�res pages.";
$lang['yahoo_pagination_limit2'] = "Pagination : Limite Haute";
$lang['yahoo_pagination_limit_explain2'] = "Il s'agit ici de d�finir le nombre de pages � prendre en compte en partant de la derni�re.<br /> Entrez 0 pour ne pas retourner de liens vers les derni�res pages des sujets et forums.";
$lang['yahoo_notify'] = "Notification Yahoo!";
$lang['yahoo_notify_explain'] = "Activer ou non la notification Yahoo! pour les flux RSS.<br/>Ne concerne que les flux des forums et cat�gories, pas les flux g�n�raux (rss.xml).<br/>A chaque chargement d'un flux expir�, une notification sera envoy�e.<br/><u>NOTE :</u>Vous devez renseigner votre AppID Yahoo! ci dessous pour que la notification soit effectivement envoy�e.";
$lang['yahoo_notify_long'] = "Listes longues";
$lang['yahoo_notify_long_explain'] = "Vous pouvez, si les listes longues sont autoris�es sur le module RSS, envoyer des notifications utilisant les listes longues peu importe la requ�te de d�part.<br/><u>NOTE :</u>Uniquement disponible si la r��criture d'URLs est activ�e sur les flux RSS, l'utilisation de \"&\" n'�tant pas possible.";

$lang['yahoo_appid'] = "AppID Yahoo!";
$lang['yahoo_appid_explain'] = "Entrez ici votre AppID Yahoo!. Si vous n'en poss�dez pas encore, rendez vous sur <a href=\"http://api.search.yahoo.com/webservices/register_application\">cette page</a>.<br/><u>NOTE :</u>Vous devez ouvrir un compte Yahoo! avant d'obtenir votre AppID.";

// Yahoo forum
$lang['yahoo_exclude'] = "Exclusion de forums";
$lang['yahoo_exclude_explain'] = "Permet d\'exclure une s�lection de forums publics de la liste urllist.txt.<br />Entrez les ID de forums � exclure s�par�s par des virgules (ex : 1,5,8).<br /><u>Note :</u> Laisser vide pour lister tous les forums publics.";
// Yahoo kb
$lang['yahoo_kb_settings'] = "Sp�cifique Yahoo! urllist.txt";
$lang['yahoo_exclude_kb'] = 'Exclusion de Cat�gories';
$lang['yahoo_exclude_kb_explain'] = 'Permet d\'exclure une s�lection de cat�gories publiques de la liste urllist.txt.<br />Entrez les ID des cat�gories � exclure s�par�s par des virgules (ex : 1,5,8).<br /><u>Note :</u> Laisser vide pour lister toutes les cat�gories publiques.';
// Yahoo mxBB settings
$lang['yahoo_exclude_mx'] = 'Exclusion de Pages mxBB';
$lang['yahoo_exclude_mx_explain'] = 'Permet d\'exclure une s�lection de pages publiques du portail de la liste urllist.txt.<br />Entrez les ID des pages mxBB � exclure s�par�s par des virgules (ex : 32,5,8).<br /><u>Note :</u> Laisser vide pour lister toutes les pages publiques.';
$lang['yahoo_mx_settings'] = "Sp�cifique Yahoo! urllist.txt";

// INSTALL
$lang['Google_install'] = "<b>Installation mx Google Sitemaps : Param�tres par d�faut.</b><br/><br/>";
$lang['Google_install_ok'] = "Mise en place de la table de configuration";
$lang['Google_uninstall_ok'] = "Mise � jour de la base de donn�es";
$lang['Google_error'] = "[Erreurs ou duplicata]</font></b> Ligne: ";
$lang['Google_sql_ok'] = "[Ajout� / Mis &agrave; jour]</font></b> Ligne: ";
$lang['Google_general'] = "Si vous rencontrez des erreurs, relax, c'est normal pendant la mise &agrave; jour de Modules.";
$lang['Google_uninstall'] = "<b>Ceci est une liste des requ�tes SQL n�cessaires pour le module mx Google Sitemap</b><br /><br />";
$lang['Google_uninstall_ok'] = "Sql : Ok.";

$lang['Google_unerror'] = "[Erreur, D�j&agrave; effac� ou mis &agrave; jour]</font></b> Ligne: ";
$lang['Google_unsql_ok'] = "[Effac� / Mis &agrave; jour]</font></b> Ligne: ";
$lang['install_report'] = "Statistiques d'installation : %s sql(s) - %s error(s)";
$lang['Google_uninstal_info'] = "Informations sur la d�sinstallation du module";
$lang['Google_instal_info'] = "Informations sur l'installation du module";
$lang['Install_success_phpbb'] = "La base de donn�e � �t� mise � jour avec succ�s.<br/><b>N'oubliez pas d'effacer le fichier db_install.php</b><br/>Cliquez %sici%s pour retourner � l'index de phpBB";
$lang['UnInstall_success_phpbb'] = "La base de donn�e � �t� mise � jour avec succ�s.<br/><b>N'oubliez pas d'effacer le fichier db_uninstall.php</b><br/>Cliquez %sici%s pour retourner � l'index de phpBB";
//
// That's all Folks!
// -------------------------------------------------
?>
