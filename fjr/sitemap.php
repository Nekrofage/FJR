<?php
/**
*
* @package phpBB SEO GYM Sitemaps
* @version $Id: sitemap.php 2007/04/12 13:48:48 dcz Exp $
* @copyright (c) 2006 dcz - www.phpbb-seo.com
* @license http://opensource.org/osi3.0/licenses/lgpl-license.php GNU Lesser General Public License
*
*/
//mxBB PORTAL
// YOU SHOULD SET HERE THE CORRECT PATH IN CASE YOUR PORTAL IN INSTALLED 
// IN A SUB FOLDER (STARTING FROM ROOT E.G. 'mxBB/')
$mx_root_path = './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
if ( @file_exists($mx_root_path . 'mx_meta.inc') ) {
	define( 'IN_PORTAL', true );
	if ( @file_exists( $mx_root_path . "mx_login.$phpEx" )) {
		define( 'MXBB27x', true );
	}
	include($mx_root_path . 'common.'.$phpEx);
	if ( defined('MXBB27x') ) {
		$userdata = session_pagestart($user_ip, PAGE_INDEX);
		mx_init_userprefs($userdata);
	} else {
		$mx_user->init($user_ip, PAGE_INDEX);
	}
	$paths = array(	'mxbb_url'	=> PORTAL_URL,
			'module_path'	=> $mx_root_path . 'modules/mx_ggsitemaps/',
			'lang_path'	=> $mx_root_path . 'modules/mx_ggsitemaps/',
	);
} else { // PHPBB
	define('IN_PHPBB', true);
	// YOU HAVE TO SET THE CORRECT PATH FOR PHPBB IF YOU WANT
	// TO USE THIS  SITEMAP SYSTEM OUTSIDE OF THE PHPBB FOLDER
	// Correct syntax : "./phpbb/"
	$phpbb_root_path = './';
	include($phpbb_root_path . 'extension.inc');
	include($phpbb_root_path . 'common.'.$phpEx);
	$paths = array(	'module_path'	=> $phpbb_root_path . 'mx_ggsitemaps/',
			'lang_path'	=> $phpbb_root_path,
		);
	// Start session management
	$userdata = session_pagestart($user_ip, PAGE_INDEX);
	init_userprefs($userdata);
	// End session management
}
//set up all other paths
$paths['phpbb_path'] = preg_replace('/^\/?(.*?)\/?$/', "\\1", trim($board_config['script_path']));
$paths['phpbb_path'] = (trim($paths['phpbb_path'], "/") != "") ? trim($paths['phpbb_path'], "/") . '/' : '';
$server_name = trim($board_config['server_name']); 
$server_protocol = 'http://';
$server_port = ( $board_config['server_port'] <> 80 ) ? ':' . trim($board_config['server_port']) . '/' : '/'; 
$paths['root_url'] = 'http://' . $server_name . $server_port;
$paths['phpbb_url'] = $paths['root_url'] . $paths['phpbb_path'];
// Where is this file installed ?
// Backported from phpBB3
$script_name = (!empty($_SERVER['PHP_SELF'])) ? $_SERVER['PHP_SELF'] : getenv('PHP_SELF');
if (!$script_name) {
	$script_name = (!empty($_SERVER['REQUEST_URI'])) ? $_SERVER['REQUEST_URI'] : getenv('REQUEST_URI');
}
// Replace backslashes and doubled slashes (could happen on some proxy setups)
$script_name = str_replace(array('\\', '//'), '/', $script_name);
// The script path from the webroot to the current directory (for example: /phpBB2/adm/) : always prefixed with / and ends in /
$script_path = trim(str_replace('\\', '/', dirname($script_name)));
$script_path .= (substr($script_path, -1, 1) == '/') ? '' : '/';
$paths['sitemap_script_path'] = $script_path;
$paths['sitemap_url'] = trim($paths['root_url'], '/') . $script_path;
// In case this fails, just hard code the full url to the folder where this file is installed :
// $paths['sitemap_url'] = 'http://www.example.com/eventual_folder/';
if (defined('IN_PORTAL')) {
	$paths['mxbb_path'] = trim(str_replace($paths['root_url'], '', PORTAL_URL), "/");
	$paths['mxbb_path'] = ($paths['mxbb_path'] != '') ? $paths['mxbb_path']  . '/': '';
}
// Let's start with checking what to do
// ===================================================
// autogenerated array of all expected actions
// ===================================================
$actions = array();
$action_from_file = '';
$actions_from_file = array();
$dir = @opendir( $paths['module_path'] . 'includes' );
while( ($file = @readdir($dir)) !== FALSE )
{
	if(preg_match("/^google_[a-zA-Z0-9_-]+\." . $phpEx . "$/", $file)) {
		$action_from_file = trim(str_replace('google_', '' , str_replace('.' . $phpEx , '' ,$file)), "/");
		$actions_from_file[$action_from_file] = $action_from_file;
	}
}
@closedir($dir);
// Small trick to simplify URLs
$action = 'sitemapindex';
$list_id = 0;
foreach ($_GET as $key => $value) {
	if (in_array($key, $actions_from_file)) {
		$action = trim(htmlspecialchars(strtolower($key)));
		$list_id = (!empty($value)) ? trim(htmlspecialchars(strtolower($value))) : 0;
	} else {
		unset($_GET[$key]);
	}
}
$actions = array(	'actions' 	=> $actions_from_file,
			'action' 	=> $action,
			'list_id' 	=> $list_id,
			'type' 		=> 'google_',
		);
// Include common module stuff...
include($paths['module_path'] . 'includes/ggs_functions.' . $phpEx);
// GGSitemaps procedure (behind the class)...
$gym_sitemaps = new GGSitemaps( $actions, $paths);
exit;
?>
