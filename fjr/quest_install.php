<?php
/***************************************************************************
 *                              quest_install.php
 *                           -----------------------
 *		                  Install file
 *
 *		Quest MOD made and (c) by Guido "Nuladion" Kessels
 ***************************************************************************/

define('IN_PHPBB', true);
$phpbb_root_path='./';
include($phpbb_root_path.'extension.inc');
include($phpbb_root_path.'common.'.$phpEx);

//
// Start session management
//
$userdata = session_pagestart($user_ip, PAGE_INDEX);
init_userprefs($userdata);
//
// End session management
//


if( !strstr($dbms, "mysql") )
{
    if( !isset($bypass) )
    {
        $message = 'This mod has only been tested on MySQL and may only work on MySQL.<br />';
        $message .= 'Click <a href="quest_install.php?bypass=true">here</a> to install anyways.';
        message_die(GENERAL_MESSAGE, $message);
    }
}

echo "<html>\n";
echo "<body>\n";

$qm_version = "2.5.0";

$sql = array();
$dat = array();

// Lets INSTALL/UPDATE

// Check if xxx_nulmods already exist!
echo "Check if ".$table_prefix."nulmods table exists...";
$check = mysql_query("SELECT * FROM ".$table_prefix."nulmods LIMIT 0,1");
if($check) { 
	// Table exists! -- Add Quest MOD info! 
	echo "<b><font color=\"007700\">YES</font></b><br />\n";
	$dat[] = "Inserting Quest MOD info";
	$sql[] = "INSERT INTO `".$table_prefix."nulmods` (title,version) VALUES ('Quest MOD','2.5.0')";
}
else {
	// Table doesn't exist! -- Create it and add Quest MOD info!
	echo "<b><font color=\"orange\">NO</font></b><br />\n";
	$dat[] = "Creating ".$table_prefix."nulmods table";
	$sql[] = "CREATE TABLE `".$table_prefix."nulmods` (
	  `id` int(10) unsigned NOT NULL auto_increment,
	  `title` MEDIUMTEXT NOT NULL,
	  `version` MEDIUMTEXT NOT NULL,
	  PRIMARY KEY  (`id`)
	)";
	
	$dat[] = "Inserting Quest MOD info";
	$sql[] = "INSERT INTO `".$table_prefix."nulmods` (title,version) VALUES ('Quest MOD','2.5.0')";
}

$sql[] = "CREATE TABLE `".$table_prefix."quest_maps` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `map_name` mediumtext NOT NULL,
  `map_x` mediumint(9) NOT NULL,
  `map_y` mediumint(9) NOT NULL,
  `map_data` longtext NOT NULL,
  PRIMARY KEY  (`id`)
)";

$sql[] = "ALTER TABLE ".USERS_TABLE." ADD user_map INT NOT NULL DEFAULT '1'";
$sql[] = "ALTER TABLE ".USERS_TABLE." ADD user_map_x INT NOT NULL DEFAULT '1'";
$sql[] = "ALTER TABLE ".USERS_TABLE." ADD user_map_y INT NOT NULL DEFAULT '1'";
$sql[] = "ALTER TABLE ".USERS_TABLE." ADD user_map_direction INT NOT NULL DEFAULT '2'";

$sql[] = "CREATE TABLE `".$table_prefix."quest_tiles` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `filename` mediumtext NOT NULL,
  `walkable` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
)";

$sql[] = "CREATE TABLE `".$table_prefix."quest_teleports` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `from_id` INT(10) NOT NULL,
  `from_x` INT NOT NULL,
  `from_y` INT NOT NULL,
  `target_id` INT(10) NOT NULL,
  `target_x` INT NOT NULL,
  `target_y` INT NOT NULL,
  `url` MEDIUMTEXT NOT NULL,
  `text` MEDIUMTEXT NOT NULL,
  PRIMARY KEY  (`id`)
)";

$sql[] = "DROP TABLE IF EXISTS `".$table_prefix."quest_settings`";
$sql[] = "CREATE TABLE `".$table_prefix."quest_settings` (
  `config_id` int(10) unsigned NOT NULL auto_increment,
  `config_name` MEDIUMTEXT NOT NULL,
  `config_value` MEDIUMTEXT NOT NULL,
  `config_type` MEDIUMTEXT NOT NULL,
  PRIMARY KEY  (`config_id`)
)";
$sql[] = "INSERT INTO `".$table_prefix."quest_settings` (config_name,config_value,config_type) VALUES ('map','','header')";
$sql[] = "INSERT INTO `".$table_prefix."quest_settings` (config_name,config_value,config_type) VALUES ('general','','header')";
$sql[] = "INSERT INTO `".$table_prefix."quest_settings` (config_name,config_value,config_type) VALUES ('tile_dimension','25','map')";
$sql[] = "INSERT INTO `".$table_prefix."quest_settings` (config_name,config_value,config_type) VALUES ('default_tile','grass.gif','map')";
$sql[] = "INSERT INTO `".$table_prefix."quest_settings` (config_name,config_value,config_type) VALUES ('session_time','300','map')";
$sql[] = "INSERT INTO `".$table_prefix."quest_settings` (config_name,config_value,config_type) VALUES ('mod_title','.: Quest MOD :. | By Nuladion','general')";
$sql[] = "INSERT INTO `".$table_prefix."quest_settings` (config_name,config_value,config_type) VALUES ('scripts','','header')";
$sql[] = "INSERT INTO `".$table_prefix."quest_settings` (config_name,config_value,config_type) VALUES ('script_length','50','scripts')";
$sql[] = "INSERT INTO `".$table_prefix."quest_settings` (config_name,config_value,config_type) VALUES ('default_map_height','6','map')";
$sql[] = "INSERT INTO `".$table_prefix."quest_settings` (config_name,config_value,config_type) VALUES ('default_map_width','6','map')";
$sql[] = "INSERT INTO `".$table_prefix."quest_settings` (config_name,config_value,config_type) VALUES ('users','','header')";
$sql[] = "INSERT INTO `".$table_prefix."quest_settings` (config_name,config_value,config_type) VALUES ('default_map','1','users')";
$sql[] = "INSERT INTO `".$table_prefix."quest_settings` (config_name,config_value,config_type) VALUES ('default_map_x','1','users')";
$sql[] = "INSERT INTO `".$table_prefix."quest_settings` (config_name,config_value,config_type) VALUES ('default_map_y','1','users')";
$sql[] = "ALTER TABLE `".$table_prefix."quest_settings` ADD config_isradio TINYINT(1) NOT NULL DEFAULT '0' ";
$sql[] = "ALTER TABLE `".$table_prefix."quest_settings` ADD config_radio_choices MEDIUMTEXT NOT NULL DEFAULT '' ";
$sql[] = "INSERT INTO `".$table_prefix."quest_settings` (config_name,config_value,config_type,config_isradio,config_radio_choices) VALUES ('grid','Yes','map','1','Yes,No')";
$sql[] = "INSERT INTO `".$table_prefix."quest_settings` (config_name,config_value,config_type,config_isradio,config_radio_choices) VALUES ('imagetype','gif','map','1','gif,jpeg')";
$sql[] = "INSERT INTO `".$table_prefix."quest_settings` (config_name,config_value,config_type,config_isradio,config_radio_choices) VALUES ('exportmaps','Yes','map','1','Yes,No')";

$sql[] = "CREATE TABLE `".$table_prefix."quest_npcs` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `npc_name` mediumtext NOT NULL,
  `npc_description` mediumtext NOT NULL,
  `npc_action` mediumtext NOT NULL,
  `npc_portrait` mediumtext NOT NULL,
  `npc_image` mediumtext NOT NULL,
  `npc_map_id` int(10) NOT NULL,
  `npc_map_x` mediumint(9) NOT NULL,
  `npc_map_y` mediumint(9) NOT NULL,
  `npc_script` mediumint(9) NOT NULL,
  PRIMARY KEY  (`id`)
)";

$sql[] = "CREATE TABLE `".$table_prefix."quest_scripts` (
  `script_id` int(10) unsigned NOT NULL auto_increment,
  `npc_id` int(10) unsigned NOT NULL,
  `text` mediumtext NOT NULL,
  `answer1_text` mediumtext NOT NULL,
  `answer1_script` mediumtext NOT NULL,
  `answer2_text` mediumtext NOT NULL,
  `answer2_script` mediumtext NOT NULL,
  `answer3_text` mediumtext NOT NULL,
  `answer3_script` mediumtext NOT NULL,
  `answer4_text` mediumtext NOT NULL,
  `answer4_script` mediumtext NOT NULL,
  `image` mediumtext NOT NULL,
  `action` mediumtext NOT NULL,
  PRIMARY KEY  (`script_id`)
)";

$sql[] = "CREATE TABLE `".$table_prefix."quest_sprite_images` (
	  `id` int(10) unsigned NOT NULL auto_increment,
	  `name` mediumtext NOT NULL,
	  `image` mediumtext NOT NULL,
	  `layer` int(10) NOT NULL default '0',
	  `itemneeded` mediumtext NOT NULL,
	  `dontshowlayer` int(10) NOT NULL default '',
	  PRIMARY KEY  (`id`)
)";

$sql[] = "INSERT INTO `".$table_prefix."quest_sprite_images` (`name`, `image`, `layer`, `itemneeded`, `dontshowlayer`) VALUES
	('Cat Ears', 'Cat Ears.gif', 5, '', 0),
	('Body', 'Body.gif', 4, '', 0),
	('Brown', 'Red1.gif', 1, '', 0),
	('Blond', 'Blond1.gif', 1, '', 0),
	('Coat', 'Green Coat.gif', 2, '', 0),
	('Mantle', 'Black Mantle.gif', 2, '', 0),
	('Face1', 'Head1.gif', 3, '', 0),
	('Face2', 'Head2.gif', 3, '', 0),
	('Iron Helmet', 'Iron Helmet.gif', 5, '', 1)
";


$sql[] = "CREATE TABLE `".$table_prefix."quest_sprite_layers` (
	  `id` int(10) unsigned NOT NULL auto_increment,
	  `name` mediumtext NOT NULL,
	  `position` tinyint(3) NOT NULL default '0',
	  `compulsive` tinyint(1) NOT NULL default '0',
	  PRIMARY KEY  (`id`)
)";

$sql[] = "INSERT INTO `".$table_prefix."quest_sprite_layers` (`name`, `position`, `compulsive`) VALUES
		('Hair', 4, 0),
		('Clothing', 3, 1),
		('Face', 2, 1),
		('Body', 1, 1),
		('Helmet', 5, 0)
";

$sql[] = "CREATE TABLE `".$table_prefix."quest_sprite_userchars` (
	  `id` int(10) unsigned NOT NULL auto_increment,
	  `user` int(10) unsigned NOT NULL default '',
	  `Body` mediumtext NOT NULL,
	  `Face` mediumtext NOT NULL,
	  `Clothing` mediumtext NOT NULL,
	  `Hair` mediumtext NOT NULL,
	  `Helmet` mediumtext NOT NULL,
	  PRIMARY KEY  (`id`)
)";

$sql[] = "INSERT INTO `".$table_prefix."quest_settings` 
		(config_name,config_value,config_type,config_isradio,config_radio_choices) 
		VALUES 
		('chat','','header','',''), 
		('chat_show','80','chat','',''), 
		('chat_away','180','chat','',''), 
		('chat_offline','300','chat','',''), 
		('chat_refresh','10','chat','',''), 
		('chat_refreshlist','10','chat','','')
";

$sql[] = "CREATE TABLE `".$table_prefix."quest_chat` (
	  `message_id` int(10) unsigned NOT NULL auto_increment,
	  `poster` int(10) unsigned NOT NULL default '',
	  `message` mediumtext NOT NULL,
	  `timestamp` int(10) unsigned NOT NULL,
	  PRIMARY KEY  (`message_id`)
)";

$sql[] = "CREATE TABLE `".$table_prefix."quest_chat_session` (
	  `user` int(10) unsigned NOT NULL default '',
	  `time` int(10) NOT NULL default '0',
	  `status` varchar(10) NOT NULL,
	  PRIMARY KEY  (`user`)
)";

$sql[] = "ALTER TABLE `".$table_prefix."quest_scripts` ADD answer1_url MEDIUMTEXT";
$sql[] = "ALTER TABLE `".$table_prefix."quest_scripts` ADD answer2_url MEDIUMTEXT";
$sql[] = "ALTER TABLE `".$table_prefix."quest_scripts` ADD answer3_url MEDIUMTEXT";
$sql[] = "ALTER TABLE `".$table_prefix."quest_scripts` ADD answer4_url MEDIUMTEXT";

$dat[] = 		'Creating table "quest_maps"';
$dat[] = 		'Adding "user_map" to users table';
$dat[] = 		'Adding "user_map_x" to users table';
$dat[] = 		'Adding "user_map_y" to users table';
$dat[] = 		'Adding "user_map_direction" to users table';
$dat[] = 		'Creating table "quest_tiles"';
$dat[] = 		'Creating table "quest_teleports"';
$dat[] = 		'Creating table "quest_settings"';
$dat[] = 		'Updating Settings table';
$dat[] = 		'Updating Settings table';
$dat[] = 		'Updating Settings table';
$dat[] = 		'Updating Settings table';
$dat[] = 		'Updating Settings table';
$dat[] = 		'Updating Settings table';
$dat[] = 		'Updating Settings table';
$dat[] = 		'Updating Settings table';
$dat[] = 		'Updating Settings table';
$dat[] = 		'Updating Settings table';
$dat[] = 		'Updating Settings table';
$dat[] = 		'Updating Settings table';
$dat[] = 		'Updating Settings table';
$dat[] = 		'Updating Settings table';
$dat[] = 		'Altering Settings table';
$dat[] = 		'Altering Settings table';
$dat[] = 		'Updating Settings table';
$dat[] = 		'Updating Settings table';
$dat[] = 		'Updating Settings table';
$dat[] = 		'Creating table "quest_npcs"';
$dat[] = 		'Creating table "quest_scripts"';
$dat[] = 		'Creating "quest_sprite_layers" table';
$dat[] = 		'Inserting Layers';
$dat[] = 		'Creating "quest_sprite_images" table';
$dat[] = 		'Inserting Images';
$dat[] = 		'Creating "quest_sprite_userchars" table';
$dat[] = 		'Updating "quest_settings" table';
$dat[] = 		'Creating "quest_chat" table';
$dat[] = 		'Creating "quest_chat_session" table';
$dat[] = 		'Adding answer1_url field to "quest_scripts" table';
$dat[] = 		'Adding answer2_url field to "quest_scripts" table';
$dat[] = 		'Adding answer3_url field to "quest_scripts" table';
$dat[] = 		'Adding answer4_url field to "quest_scripts" table';

$sql_count = count($sql);

for($i = 0; $i < $sql_count; $i++) {
	echo "" . $dat[$i];
	flush();

	if ( !$db->sql_query($sql[$i]) )
	{
		$errored = true;
		$error = $db->sql_error();
		echo "... <b><font color=\"FF0000\">FAILED</font></b><BR />Error Message:<i>" . $error['message'] . "</i><br />\n";
	}
	else
	{
		echo "... <b><font color=\"007700\">COMPLETED</font></b><br />\n";
	}
}

if( $errored ) {
    $message = "The install was <b>not</b> successful! <br />
		<u>Do not reload this page</u>, or your database will be modified twice, which is <u>not</u> good! <br />
		Please post in the <a href=\"http://mods.best-dev.com/viewtopic.php?t=983\" target=\"_blank\">Quest MOD thread</a>!<br />
		If you want good and fast support, please make sure to include all the errors messages you might've gotten while installing!
		";
}
else {
    $message = "The install has been completed succesfully.<br />
		Make sure to delete this update file!<br />
		<br />
		<b>Have fun!</b><br />
		<br />
		- Nuladion
		";
}

echo "\n<br />\n<b>Finished!</b><br />\n";
echo $message . "<br />\n";
echo "</body>\n";
echo "</html>\n";
exit();

?>