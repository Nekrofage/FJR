-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: fjr
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `fjr_adr_alignments`
--

DROP TABLE IF EXISTS `fjr_adr_alignments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_alignments` (
  `alignment_id` smallint(8) NOT NULL DEFAULT '0',
  `alignment_name` varchar(255) NOT NULL DEFAULT '',
  `alignment_desc` text NOT NULL,
  `alignment_level` tinyint(1) NOT NULL DEFAULT '0',
  `alignment_img` varchar(255) NOT NULL DEFAULT '',
  `alignment_karma_min` int(10) NOT NULL DEFAULT '0',
  `alignment_karma_type` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`alignment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_armour_sets`
--

DROP TABLE IF EXISTS `fjr_adr_armour_sets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_armour_sets` (
  `set_id` int(8) NOT NULL AUTO_INCREMENT,
  `set_name` varchar(50) NOT NULL DEFAULT '',
  `set_desc` text NOT NULL,
  `set_img` varchar(50) NOT NULL DEFAULT '',
  `set_helm` varchar(255) NOT NULL DEFAULT '',
  `set_armour` varchar(255) NOT NULL DEFAULT '',
  `set_gloves` varchar(255) NOT NULL DEFAULT '',
  `set_greave` varchar(255) NOT NULL DEFAULT '',
  `set_boot` varchar(255) NOT NULL DEFAULT '',
  `set_shield` varchar(255) NOT NULL DEFAULT '',
  `set_hp_max_bonus` int(8) NOT NULL DEFAULT '0',
  `set_mp_max_bonus` int(8) NOT NULL DEFAULT '0',
  `set_might_bonus` int(8) NOT NULL DEFAULT '0',
  `set_constitution_bonus` int(8) NOT NULL DEFAULT '0',
  `set_ac_bonus` int(8) NOT NULL DEFAULT '0',
  `set_dexterity_bonus` int(8) NOT NULL DEFAULT '0',
  `set_intelligence_bonus` int(8) NOT NULL DEFAULT '0',
  `set_wisdom_bonus` int(8) NOT NULL DEFAULT '0',
  `set_hp_max_penalty` int(8) NOT NULL DEFAULT '0',
  `set_mp_max_penalty` int(8) NOT NULL DEFAULT '0',
  `set_might_penalty` int(8) NOT NULL DEFAULT '0',
  `set_constitution_penalty` int(8) NOT NULL DEFAULT '0',
  `set_ac_penalty` int(8) NOT NULL DEFAULT '0',
  `set_dexterity_penalty` int(8) NOT NULL DEFAULT '0',
  `set_intelligence_penalty` int(8) NOT NULL DEFAULT '0',
  `set_wisdom_penalty` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`set_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_battle_community`
--

DROP TABLE IF EXISTS `fjr_adr_battle_community`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_battle_community` (
  `chat_id` int(10) NOT NULL AUTO_INCREMENT,
  `chat_posts` int(10) NOT NULL DEFAULT '0',
  `chat_text` text,
  `chat_date` date DEFAULT NULL,
  PRIMARY KEY (`chat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_battle_list`
--

DROP TABLE IF EXISTS `fjr_adr_battle_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_battle_list` (
  `battle_id` int(8) NOT NULL AUTO_INCREMENT,
  `battle_type` tinyint(1) NOT NULL DEFAULT '0',
  `battle_turn` tinyint(1) NOT NULL DEFAULT '0',
  `battle_result` tinyint(1) NOT NULL DEFAULT '0',
  `battle_text` text NOT NULL,
  `battle_challenger_id` int(8) NOT NULL DEFAULT '0',
  `battle_challenger_hp` int(8) NOT NULL DEFAULT '0',
  `battle_challenger_mp` int(8) NOT NULL DEFAULT '0',
  `battle_challenger_att` int(8) NOT NULL DEFAULT '0',
  `battle_challenger_def` int(8) NOT NULL DEFAULT '0',
  `battle_challenger_magic_attack` int(8) NOT NULL DEFAULT '0',
  `battle_challenger_magic_resistance` int(8) NOT NULL DEFAULT '0',
  `battle_challenger_dmg` int(8) NOT NULL DEFAULT '0',
  `battle_challenger_element` int(3) NOT NULL DEFAULT '0',
  `battle_opponent_id` int(8) NOT NULL DEFAULT '0',
  `battle_opponent_hp` int(8) NOT NULL DEFAULT '0',
  `battle_opponent_mp` int(8) NOT NULL DEFAULT '0',
  `battle_opponent_att` int(8) NOT NULL DEFAULT '0',
  `battle_opponent_def` int(8) NOT NULL DEFAULT '0',
  `battle_opponent_magic_attack` int(8) NOT NULL DEFAULT '0',
  `battle_opponent_magic_resistance` int(8) NOT NULL DEFAULT '0',
  `battle_opponent_mp_power` int(8) NOT NULL DEFAULT '0',
  `battle_opponent_mp_max` int(8) NOT NULL DEFAULT '0',
  `battle_opponent_sp` int(12) NOT NULL DEFAULT '0',
  `battle_opponent_dmg` int(8) NOT NULL DEFAULT '0',
  `battle_opponent_hp_max` int(8) NOT NULL DEFAULT '0',
  `battle_opponent_element` int(3) NOT NULL DEFAULT '0',
  `battle_bkg` text NOT NULL,
  `battle_challenger_armour_set` varchar(50) NOT NULL DEFAULT '',
  `battle_challenger_armour_id` int(8) NOT NULL DEFAULT '0',
  `battle_challenger_buckler_id` int(8) NOT NULL DEFAULT '0',
  `battle_challenger_gloves_id` int(8) NOT NULL DEFAULT '0',
  `battle_challenger_greave_id` int(8) NOT NULL DEFAULT '0',
  `battle_challenger_boot_id` int(8) NOT NULL DEFAULT '0',
  `battle_challenger_helm_id` int(8) NOT NULL DEFAULT '0',
  `battle_challenger_ring_id` int(8) NOT NULL DEFAULT '0',
  `battle_challenger_ring_power` int(8) NOT NULL DEFAULT '0',
  `battle_challenger_amulet_id` int(8) NOT NULL DEFAULT '0',
  `battle_challenger_amulet_power` int(8) NOT NULL DEFAULT '0',
  `battle_opponent_karma` int(10) NOT NULL DEFAULT '0',
  `battle_challenger_intelligence` int(8) NOT NULL DEFAULT '0',
  `battle_opponent_message_enable` int(1) NOT NULL DEFAULT '0',
  `battle_opponent_message` varchar(255) NOT NULL DEFAULT '',
  `battle_opponent_item` varchar(255) NOT NULL DEFAULT '0',
  `battle_challenger_equipment_info` varchar(255) NOT NULL DEFAULT '',
  `battle_round` int(12) NOT NULL DEFAULT '0',
  `battle_start` int(12) NOT NULL DEFAULT '0',
  `battle_finish` int(12) NOT NULL DEFAULT '0',
  `battle_effects` text,
  PRIMARY KEY (`battle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_battle_monsters`
--

DROP TABLE IF EXISTS `fjr_adr_battle_monsters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_battle_monsters` (
  `monster_id` int(8) NOT NULL AUTO_INCREMENT,
  `monster_name` varchar(255) NOT NULL DEFAULT '',
  `monster_img` varchar(255) NOT NULL DEFAULT '',
  `monster_level` int(8) NOT NULL DEFAULT '0',
  `monster_base_hp` int(8) NOT NULL DEFAULT '0',
  `monster_base_att` int(8) NOT NULL DEFAULT '0',
  `monster_base_def` int(8) NOT NULL DEFAULT '0',
  `monster_base_mp` int(8) NOT NULL DEFAULT '0',
  `monster_base_custom_spell` varchar(255) NOT NULL DEFAULT 'a magical spell',
  `monster_base_magic_attack` int(8) NOT NULL DEFAULT '0',
  `monster_base_magic_resistance` int(8) NOT NULL DEFAULT '0',
  `monster_base_mp_power` int(8) NOT NULL DEFAULT '1',
  `monster_base_sp` int(8) NOT NULL DEFAULT '0',
  `monster_thief_skill` int(3) NOT NULL DEFAULT '0',
  `monster_base_element` int(3) NOT NULL DEFAULT '1',
  `monster_loottables` text NOT NULL,
  `monster_possible_drop` int(8) NOT NULL,
  `monster_guranteened_drop` int(8) NOT NULL,
  `monster_specific_drop` text NOT NULL,
  `monster_base_karma` int(10) NOT NULL DEFAULT '0',
  `monster_season` int(8) NOT NULL DEFAULT '0',
  `monster_weather` int(8) NOT NULL DEFAULT '0',
  `monster_message_enable` int(1) NOT NULL DEFAULT '0',
  `monster_message` varchar(255) NOT NULL DEFAULT '',
  `monster_time` int(8) unsigned NOT NULL DEFAULT '0',
  `monster_base_mp_drain` int(8) unsigned NOT NULL DEFAULT '0',
  `monster_base_mp_transfer` int(8) unsigned NOT NULL DEFAULT '0',
  `monster_base_hp_drain` int(8) unsigned NOT NULL DEFAULT '0',
  `monster_base_hp_transfer` int(8) unsigned NOT NULL DEFAULT '0',
  `monster_regeneration` int(8) unsigned NOT NULL DEFAULT '0',
  `monster_mp_regeneration` int(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`monster_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1339 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_battle_pvp`
--

DROP TABLE IF EXISTS `fjr_adr_battle_pvp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_battle_pvp` (
  `battle_id` int(8) NOT NULL AUTO_INCREMENT,
  `battle_turn` int(8) NOT NULL DEFAULT '0',
  `battle_result` tinyint(1) NOT NULL DEFAULT '0',
  `battle_text` text NOT NULL,
  `battle_text_chat` text NOT NULL,
  `battle_challenger_id` int(8) NOT NULL DEFAULT '0',
  `battle_challenger_att` int(8) NOT NULL DEFAULT '0',
  `battle_challenger_def` int(8) NOT NULL DEFAULT '0',
  `battle_challenger_hp` int(8) NOT NULL DEFAULT '0',
  `battle_challenger_mp` int(8) NOT NULL DEFAULT '0',
  `battle_challenger_hp_max` int(8) NOT NULL DEFAULT '0',
  `battle_challenger_mp_max` int(8) NOT NULL DEFAULT '0',
  `battle_challenger_hp_regen` int(8) NOT NULL DEFAULT '0',
  `battle_challenger_mp_regen` int(8) NOT NULL DEFAULT '0',
  `battle_opponent_id` int(8) NOT NULL DEFAULT '0',
  `battle_opponent_att` int(8) NOT NULL DEFAULT '0',
  `battle_opponent_def` int(8) NOT NULL DEFAULT '0',
  `battle_opponent_hp` int(8) NOT NULL DEFAULT '0',
  `battle_opponent_mp` int(8) NOT NULL DEFAULT '0',
  `battle_opponent_hp_max` int(8) NOT NULL DEFAULT '0',
  `battle_opponent_mp_max` int(8) NOT NULL DEFAULT '0',
  `battle_opponent_hp_regen` int(8) NOT NULL DEFAULT '0',
  `battle_opponent_mp_regen` int(8) NOT NULL DEFAULT '0',
  `battle_bkg` text NOT NULL,
  `battle_challenger_magic_attack` int(8) NOT NULL DEFAULT '0',
  `battle_challenger_magic_resistance` int(8) NOT NULL DEFAULT '0',
  `battle_opponent_magic_attack` int(8) NOT NULL DEFAULT '0',
  `battle_opponent_magic_resistance` int(8) NOT NULL DEFAULT '0',
  `battle_challenger_dmg` int(8) NOT NULL DEFAULT '0',
  `battle_opponent_dmg` int(8) NOT NULL DEFAULT '0',
  `battle_challenger_element` int(3) NOT NULL DEFAULT '0',
  `battle_opponent_element` int(3) NOT NULL DEFAULT '0',
  `battle_challenger_armour_set` varchar(50) NOT NULL DEFAULT '',
  `battle_opponent_armour_set` varchar(50) NOT NULL DEFAULT '',
  `battle_start` int(12) NOT NULL DEFAULT '0',
  `battle_finish` int(12) NOT NULL DEFAULT '0',
  `battle_effects` text,
  PRIMARY KEY (`battle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_beggar_donations`
--

DROP TABLE IF EXISTS `fjr_adr_beggar_donations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_beggar_donations` (
  `item_id` int(8) NOT NULL DEFAULT '0',
  `item_chance` tinyint(1) DEFAULT NULL,
  `item_owner_id` tinyint(1) NOT NULL DEFAULT '1',
  `item_price` int(8) NOT NULL DEFAULT '0',
  `item_quality` int(8) NOT NULL DEFAULT '0',
  `item_power` int(8) NOT NULL DEFAULT '0',
  `item_duration` int(8) NOT NULL DEFAULT '0',
  `item_duration_max` int(8) NOT NULL DEFAULT '1',
  `item_icon` varchar(255) NOT NULL DEFAULT '',
  `item_name` varchar(255) NOT NULL DEFAULT '',
  `item_desc` varchar(255) NOT NULL DEFAULT '',
  `item_type_use` int(8) NOT NULL DEFAULT '16',
  `item_weight` int(12) NOT NULL DEFAULT '25',
  `item_max_skill` int(8) NOT NULL DEFAULT '25',
  `item_add_power` int(8) NOT NULL DEFAULT '0',
  `item_mp_use` int(8) NOT NULL DEFAULT '0',
  `item_element` int(4) NOT NULL DEFAULT '0',
  `item_element_str_dmg` int(4) NOT NULL DEFAULT '100',
  `item_element_same_dmg` int(4) NOT NULL DEFAULT '100',
  `item_element_weak_dmg` int(4) NOT NULL DEFAULT '100',
  `item_sell_back_percentage` int(3) NOT NULL DEFAULT '10',
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_beggar_tracker`
--

DROP TABLE IF EXISTS `fjr_adr_beggar_tracker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_beggar_tracker` (
  `track_id` int(10) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(100) DEFAULT NULL,
  `owner_name` varchar(100) DEFAULT NULL,
  `donated` int(12) DEFAULT NULL,
  `date` int(12) DEFAULT NULL,
  KEY `track_id` (`track_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_bug_fix`
--

DROP TABLE IF EXISTS `fjr_adr_bug_fix`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_bug_fix` (
  `fix_id` varchar(255) NOT NULL DEFAULT '',
  `fix_install_date` int(12) NOT NULL DEFAULT '0',
  `fix_installed_by` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`fix_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_cauldron_pack`
--

DROP TABLE IF EXISTS `fjr_adr_cauldron_pack`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_cauldron_pack` (
  `pack_id` int(8) NOT NULL AUTO_INCREMENT,
  `item1_id` varchar(255) NOT NULL DEFAULT '',
  `item2_id` varchar(255) NOT NULL DEFAULT '',
  `item3_id` varchar(255) NOT NULL DEFAULT '',
  `itemwin_id` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`pack_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_character_quest_log`
--

DROP TABLE IF EXISTS `fjr_adr_character_quest_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_character_quest_log` (
  `quest_log_id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `user_id` int(8) NOT NULL,
  `quest_kill_monster` varchar(255) DEFAULT NULL,
  `quest_kill_monster_amount` int(8) NOT NULL DEFAULT '0',
  `quest_kill_monster_current_amount` int(8) NOT NULL DEFAULT '0',
  `quest_item_have` varchar(255) NOT NULL,
  `quest_item_need` varchar(255) NOT NULL,
  `npc_id` int(8) NOT NULL,
  PRIMARY KEY (`quest_log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_character_quest_log_history`
--

DROP TABLE IF EXISTS `fjr_adr_character_quest_log_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_character_quest_log_history` (
  `quest_id` int(15) NOT NULL AUTO_INCREMENT,
  `user_id` int(8) NOT NULL,
  `quest_killed_monster` varchar(255) NOT NULL,
  `quest_killed_monsters_amount` int(8) NOT NULL DEFAULT '0',
  `quest_item_gave` varchar(255) NOT NULL,
  `npc_id` int(8) NOT NULL,
  PRIMARY KEY (`quest_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_characters`
--

DROP TABLE IF EXISTS `fjr_adr_characters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_characters` (
  `character_id` int(8) NOT NULL DEFAULT '0',
  `character_name` varchar(255) NOT NULL DEFAULT '',
  `character_desc` text NOT NULL,
  `character_race` int(8) NOT NULL DEFAULT '0',
  `character_class` int(8) NOT NULL DEFAULT '0',
  `character_alignment` int(8) NOT NULL DEFAULT '0',
  `character_element` int(8) NOT NULL DEFAULT '0',
  `character_hp` int(8) NOT NULL DEFAULT '0',
  `character_hp_max` int(8) NOT NULL DEFAULT '0',
  `character_mp` int(8) NOT NULL DEFAULT '0',
  `character_mp_max` int(8) NOT NULL DEFAULT '0',
  `character_ac` int(8) NOT NULL DEFAULT '0',
  `character_xp` int(11) NOT NULL DEFAULT '0',
  `character_level` int(8) NOT NULL DEFAULT '1',
  `character_might` int(8) NOT NULL DEFAULT '0',
  `character_dexterity` int(8) NOT NULL DEFAULT '0',
  `character_constitution` int(8) NOT NULL DEFAULT '0',
  `character_intelligence` int(8) NOT NULL DEFAULT '0',
  `character_wisdom` int(8) NOT NULL DEFAULT '0',
  `character_charisma` int(8) NOT NULL DEFAULT '0',
  `character_skill_mining` int(3) unsigned NOT NULL DEFAULT '0',
  `character_skill_stone` int(3) unsigned NOT NULL DEFAULT '0',
  `character_skill_forge` int(3) unsigned NOT NULL DEFAULT '0',
  `character_skill_enchantment` int(3) unsigned NOT NULL DEFAULT '0',
  `character_skill_trading` int(3) unsigned NOT NULL DEFAULT '0',
  `character_skill_thief` int(3) unsigned NOT NULL DEFAULT '0',
  `character_skill_mining_uses` int(3) unsigned NOT NULL DEFAULT '0',
  `character_skill_stone_uses` int(3) unsigned NOT NULL DEFAULT '0',
  `character_skill_forge_uses` int(3) unsigned NOT NULL DEFAULT '0',
  `character_skill_enchantment_uses` int(3) unsigned NOT NULL DEFAULT '0',
  `character_skill_trading_uses` int(3) unsigned NOT NULL DEFAULT '0',
  `character_skill_thief_uses` int(3) unsigned NOT NULL DEFAULT '0',
  `character_victories` int(8) NOT NULL DEFAULT '0',
  `character_defeats` int(8) NOT NULL DEFAULT '0',
  `character_flees` int(8) NOT NULL DEFAULT '0',
  `prefs_pvp_notif_pm` tinyint(1) NOT NULL DEFAULT '1',
  `prefs_pvp_allow` tinyint(1) NOT NULL DEFAULT '1',
  `equip_armor` int(8) NOT NULL DEFAULT '0',
  `equip_buckler` int(8) NOT NULL DEFAULT '0',
  `equip_helm` int(8) NOT NULL DEFAULT '0',
  `equip_greave` int(8) NOT NULL DEFAULT '0',
  `equip_boot` int(8) NOT NULL DEFAULT '0',
  `equip_gloves` int(8) NOT NULL DEFAULT '0',
  `equip_amulet` int(8) NOT NULL DEFAULT '0',
  `equip_ring` int(8) NOT NULL DEFAULT '0',
  `character_birth` int(12) NOT NULL DEFAULT '1093694853',
  `character_battle_limit` int(3) NOT NULL DEFAULT '20',
  `character_skill_limit` int(3) NOT NULL DEFAULT '30',
  `character_trading_limit` int(3) NOT NULL DEFAULT '30',
  `character_thief_limit` int(3) NOT NULL DEFAULT '10',
  `character_sp` int(12) NOT NULL DEFAULT '0',
  `character_warehouse` tinyint(1) NOT NULL DEFAULT '0',
  `character_warehouse_update` int(8) NOT NULL DEFAULT '0',
  `character_shop_update` int(8) NOT NULL DEFAULT '0',
  `character_pref_give_pm` int(1) NOT NULL DEFAULT '1',
  `character_pref_seller_pm` int(1) NOT NULL DEFAULT '1',
  `character_double_ko` int(8) NOT NULL DEFAULT '0',
  `character_limit_update` int(8) NOT NULL DEFAULT '0',
  `character_job_pm` tinyint(1) NOT NULL DEFAULT '1',
  `character_job_id` int(5) NOT NULL DEFAULT '0',
  `character_job_start` int(12) NOT NULL DEFAULT '0',
  `character_job_earned` int(12) NOT NULL DEFAULT '0',
  `character_job_total_earned` int(12) NOT NULL DEFAULT '0',
  `character_job_times_employed` smallint(5) NOT NULL DEFAULT '0',
  `character_job_completed` int(8) NOT NULL DEFAULT '0',
  `character_job_incomplete` int(8) NOT NULL DEFAULT '0',
  `character_job_end` int(12) NOT NULL DEFAULT '0',
  `character_job_last_paid` int(12) NOT NULL DEFAULT '0',
  `character_event_limit` int(3) NOT NULL DEFAULT '30',
  `character_karma_good` int(10) NOT NULL DEFAULT '0',
  `character_karma_bad` int(10) NOT NULL DEFAULT '0',
  `character_area` int(8) NOT NULL DEFAULT '1',
  `character_weather` int(8) NOT NULL DEFAULT '1',
  `character_victories_pvp` int(8) NOT NULL DEFAULT '0',
  `character_defeats_pvp` int(8) NOT NULL DEFAULT '0',
  `character_flees_pvp` int(8) NOT NULL DEFAULT '0',
  `character_fp` int(12) NOT NULL DEFAULT '0',
  `character_skill_sword_level` int(8) unsigned NOT NULL DEFAULT '1',
  `character_skill_dirk_level` int(8) unsigned NOT NULL DEFAULT '1',
  `character_skill_ranged_level` int(8) unsigned NOT NULL DEFAULT '1',
  `character_skill_magic_level` int(8) unsigned NOT NULL DEFAULT '1',
  `character_skill_mace_level` int(8) unsigned NOT NULL DEFAULT '1',
  `character_skill_fist_level` int(8) unsigned NOT NULL DEFAULT '1',
  `character_skill_staff_level` int(8) unsigned NOT NULL DEFAULT '1',
  `character_skill_axe_level` int(8) unsigned NOT NULL DEFAULT '1',
  `character_skill_spear_level` int(8) unsigned NOT NULL DEFAULT '1',
  `character_skill_sword_uses` int(8) unsigned NOT NULL DEFAULT '0',
  `character_skill_dirk_uses` int(8) unsigned NOT NULL DEFAULT '0',
  `character_skill_ranged_uses` int(8) unsigned NOT NULL DEFAULT '0',
  `character_skill_mace_uses` int(8) unsigned NOT NULL DEFAULT '0',
  `character_skill_fist_uses` int(8) unsigned NOT NULL DEFAULT '0',
  `character_skill_staff_uses` int(8) unsigned NOT NULL DEFAULT '0',
  `character_skill_axe_uses` int(8) unsigned NOT NULL DEFAULT '0',
  `character_skill_spear_uses` int(8) unsigned NOT NULL DEFAULT '0',
  `character_skill_magic_uses` int(8) unsigned NOT NULL DEFAULT '0',
  `character_skill_defmagic_level` int(8) unsigned NOT NULL DEFAULT '1',
  `character_skill_offmagic_level` int(8) unsigned NOT NULL DEFAULT '1',
  `character_skill_defmagic_uses` int(8) unsigned NOT NULL DEFAULT '0',
  `character_skill_offmagic_uses` int(8) unsigned NOT NULL DEFAULT '0',
  `character_skill_brewing_uses` int(8) unsigned NOT NULL DEFAULT '0',
  `character_skill_brewing` int(8) unsigned NOT NULL DEFAULT '0',
  `character_pre_effects` text,
  `character_skill_cooking_uses` int(8) unsigned NOT NULL DEFAULT '0',
  `character_skill_cooking` int(8) unsigned NOT NULL DEFAULT '1',
  `character_skill_blacksmithing_uses` int(8) unsigned NOT NULL DEFAULT '0',
  `character_skill_blacksmithing` int(8) unsigned NOT NULL DEFAULT '1',
  `character_spell_pre_effects` varchar(255) NOT NULL DEFAULT '',
  `character_party` int(8) NOT NULL DEFAULT '0',
  `character_leader` int(1) NOT NULL DEFAULT '0',
  `character_invites` varchar(255) NOT NULL,
  `prefs_tax_pm_notify` tinyint(1) NOT NULL DEFAULT '1',
  `character_npc_check` text NOT NULL,
  `character_npc_visited` text NOT NULL,
  `character_skill_alchemy_uses` int(3) unsigned NOT NULL DEFAULT '1',
  `character_skill_alchemy` int(3) unsigned NOT NULL DEFAULT '1',
  `character_skill_fishing_uses` int(3) unsigned NOT NULL DEFAULT '1',
  `character_skill_fishing` int(3) unsigned NOT NULL DEFAULT '1',
  `character_skill_herbalism_uses` int(3) unsigned NOT NULL DEFAULT '1',
  `character_skill_herbalism` int(3) unsigned NOT NULL DEFAULT '1',
  `character_skill_lumberjack_uses` int(3) unsigned NOT NULL DEFAULT '1',
  `character_skill_lumberjack` int(3) unsigned NOT NULL DEFAULT '1',
  `character_skill_tailoring_uses` int(3) unsigned NOT NULL DEFAULT '1',
  `character_skill_tailoring` int(3) unsigned NOT NULL DEFAULT '1',
  `character_skill_hunting_uses` int(3) unsigned NOT NULL DEFAULT '1',
  `character_skill_hunting` int(3) unsigned NOT NULL DEFAULT '1',
  `character_skill_shield_level` int(8) unsigned NOT NULL DEFAULT '1',
  `character_skill_shield_uses` int(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`character_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_cheat_log`
--

DROP TABLE IF EXISTS `fjr_adr_cheat_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_cheat_log` (
  `cheat_id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `cheat_ip` varchar(15) NOT NULL DEFAULT '',
  `cheat_reason` varchar(50) NOT NULL DEFAULT '',
  `cheat_date` int(10) NOT NULL DEFAULT '0',
  `cheat_user_id` mediumint(8) NOT NULL DEFAULT '0',
  `cheat_punished` varchar(255) NOT NULL DEFAULT '',
  `cheat_public` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cheat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_clans`
--

DROP TABLE IF EXISTS `fjr_adr_clans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_clans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` mediumtext NOT NULL,
  `leader` mediumint(9) NOT NULL DEFAULT '0',
  `members` mediumtext NOT NULL,
  `logo` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `approving` tinyint(1) NOT NULL DEFAULT '0',
  `approvelist` mediumtext NOT NULL,
  `approve_fee` mediumtext NOT NULL,
  `req_posts` mediumint(9) NOT NULL DEFAULT '0',
  `req_points` mediumint(9) NOT NULL DEFAULT '0',
  `req_level` mediumint(9) NOT NULL DEFAULT '0',
  `join_fee` mediumint(9) NOT NULL DEFAULT '0',
  `founded` int(11) NOT NULL DEFAULT '0',
  `founder` mediumint(9) NOT NULL DEFAULT '0',
  `news_orderby` mediumtext NOT NULL,
  `news_order` tinyint(1) NOT NULL DEFAULT '0',
  `news_amount` int(5) NOT NULL DEFAULT '10',
  `stash_points` mediumint(9) NOT NULL DEFAULT '0',
  `stash_items` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_clans_news`
--

DROP TABLE IF EXISTS `fjr_adr_clans_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_clans_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clan` mediumint(9) NOT NULL DEFAULT '0',
  `poster` mediumint(9) NOT NULL DEFAULT '0',
  `title` mediumtext NOT NULL,
  `text` mediumtext NOT NULL,
  `date` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_clans_shouts`
--

DROP TABLE IF EXISTS `fjr_adr_clans_shouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_clans_shouts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clan` mediumint(9) NOT NULL DEFAULT '0',
  `poster` mediumint(9) NOT NULL DEFAULT '0',
  `text` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_classes`
--

DROP TABLE IF EXISTS `fjr_adr_classes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_classes` (
  `class_id` smallint(8) NOT NULL DEFAULT '0',
  `class_name` varchar(255) NOT NULL DEFAULT '',
  `class_desc` text NOT NULL,
  `class_level` tinyint(1) NOT NULL DEFAULT '0',
  `class_img` varchar(255) NOT NULL DEFAULT '',
  `class_might_req` int(8) NOT NULL DEFAULT '0',
  `class_dexterity_req` int(8) NOT NULL DEFAULT '0',
  `class_constitution_req` int(8) NOT NULL DEFAULT '0',
  `class_intelligence_req` int(8) NOT NULL DEFAULT '0',
  `class_wisdom_req` int(8) NOT NULL DEFAULT '0',
  `class_charisma_req` int(8) NOT NULL DEFAULT '0',
  `class_base_hp` int(8) NOT NULL DEFAULT '0',
  `class_base_mp` int(8) NOT NULL DEFAULT '0',
  `class_base_ac` int(8) NOT NULL DEFAULT '0',
  `class_update_hp` int(8) NOT NULL DEFAULT '0',
  `class_update_mp` int(8) NOT NULL DEFAULT '0',
  `class_update_ac` int(8) NOT NULL DEFAULT '0',
  `class_update_xp_req` int(8) NOT NULL DEFAULT '0',
  `class_update_of` int(8) NOT NULL DEFAULT '0',
  `class_update_of_req` int(8) NOT NULL DEFAULT '0',
  `class_selectable` int(8) NOT NULL DEFAULT '0',
  `class_magic_attack_req` int(8) NOT NULL DEFAULT '0',
  `class_magic_resistance_req` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_create_exploit_fix`
--

DROP TABLE IF EXISTS `fjr_adr_create_exploit_fix`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_create_exploit_fix` (
  `user_id` int(10) NOT NULL DEFAULT '0',
  `power` int(8) NOT NULL DEFAULT '0',
  `agility` int(8) NOT NULL DEFAULT '0',
  `endurance` int(8) NOT NULL DEFAULT '0',
  `intelligence` int(8) NOT NULL DEFAULT '0',
  `willpower` int(8) NOT NULL DEFAULT '0',
  `charm` int(8) NOT NULL DEFAULT '0',
  `magic_attack` int(8) NOT NULL DEFAULT '0',
  `magic_resistance` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_elements`
--

DROP TABLE IF EXISTS `fjr_adr_elements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_elements` (
  `element_id` smallint(8) NOT NULL DEFAULT '0',
  `element_name` varchar(255) NOT NULL DEFAULT '',
  `element_desc` text NOT NULL,
  `element_level` tinyint(1) NOT NULL DEFAULT '0',
  `element_img` varchar(255) NOT NULL DEFAULT '',
  `element_skill_mining_bonus` int(8) NOT NULL DEFAULT '0',
  `element_skill_stone_bonus` int(8) NOT NULL DEFAULT '0',
  `element_skill_forge_bonus` int(8) NOT NULL DEFAULT '0',
  `element_skill_enchantment_bonus` int(8) NOT NULL DEFAULT '0',
  `element_skill_trading_bonus` int(8) NOT NULL DEFAULT '0',
  `element_skill_thief_bonus` int(8) NOT NULL DEFAULT '0',
  `element_oppose_strong` int(3) NOT NULL DEFAULT '0',
  `element_oppose_strong_dmg` int(3) NOT NULL DEFAULT '100',
  `element_oppose_same_dmg` int(3) NOT NULL DEFAULT '100',
  `element_oppose_weak` int(3) NOT NULL DEFAULT '0',
  `element_oppose_weak_dmg` int(3) NOT NULL DEFAULT '100',
  `element_skill_cooking_bonus` int(8) NOT NULL DEFAULT '0',
  `element_skill_blacksmithing_bonus` int(8) NOT NULL DEFAULT '0',
  `element_skill_hunting_bonus` int(8) NOT NULL DEFAULT '1',
  `element_skill_alchemy_bonus` int(8) NOT NULL DEFAULT '1',
  `element_skill_fishing_bonus` int(8) NOT NULL DEFAULT '1',
  `element_skill_herbalism_bonus` int(8) NOT NULL DEFAULT '1',
  `element_skill_lumberjack_bonus` int(8) NOT NULL DEFAULT '1',
  `element_skill_tailoring_bonus` int(8) NOT NULL DEFAULT '1',
  `element_colour` varchar(255) NOT NULL DEFAULT '',
  `element_skill_brewing_bonus` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`element_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_general`
--

DROP TABLE IF EXISTS `fjr_adr_general`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_general` (
  `config_name` varchar(255) NOT NULL DEFAULT '0',
  `config_value` int(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`config_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_jail_users`
--

DROP TABLE IF EXISTS `fjr_adr_jail_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_jail_users` (
  `celled_id` int(8) NOT NULL DEFAULT '0',
  `user_id` int(8) NOT NULL DEFAULT '0',
  `user_cell_date` int(11) NOT NULL DEFAULT '0',
  `user_freed_by` int(8) NOT NULL DEFAULT '0',
  `user_sentence` text,
  `user_caution` int(8) NOT NULL DEFAULT '0',
  `user_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`celled_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_jail_votes`
--

DROP TABLE IF EXISTS `fjr_adr_jail_votes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_jail_votes` (
  `vote_id` mediumint(8) NOT NULL DEFAULT '0',
  `voter_id` mediumint(8) NOT NULL DEFAULT '0',
  `vote_result` mediumint(8) NOT NULL DEFAULT '0',
  KEY `vote_id` (`vote_id`),
  KEY `voter_id` (`voter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_jobs`
--

DROP TABLE IF EXISTS `fjr_adr_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_jobs` (
  `job_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `job_name` varchar(255) NOT NULL DEFAULT '',
  `job_desc` text NOT NULL,
  `job_class_id` smallint(3) NOT NULL DEFAULT '0',
  `job_race_id` smallint(3) NOT NULL DEFAULT '0',
  `job_alignment_id` smallint(3) NOT NULL DEFAULT '0',
  `job_level` smallint(3) NOT NULL DEFAULT '1',
  `job_auth_level` tinyint(1) NOT NULL DEFAULT '0',
  `job_img` varchar(255) NOT NULL DEFAULT '',
  `job_salary` int(12) NOT NULL DEFAULT '100',
  `job_exp` int(12) NOT NULL DEFAULT '100',
  `job_item_reward_id` int(5) NOT NULL DEFAULT '0',
  `job_slots_available` int(12) NOT NULL DEFAULT '1',
  `job_slots_max` int(12) NOT NULL DEFAULT '1',
  `job_duration` smallint(3) NOT NULL DEFAULT '7',
  `job_sp_reward` int(12) NOT NULL DEFAULT '0',
  `job_payment_intervals` smallint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_lake_donations`
--

DROP TABLE IF EXISTS `fjr_adr_lake_donations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_lake_donations` (
  `item_id` int(8) NOT NULL DEFAULT '0',
  `item_chance` tinyint(1) DEFAULT NULL,
  `item_owner_id` tinyint(1) NOT NULL DEFAULT '1',
  `item_price` int(8) NOT NULL DEFAULT '0',
  `item_quality` int(8) NOT NULL DEFAULT '0',
  `item_power` int(8) NOT NULL DEFAULT '0',
  `item_duration` int(8) NOT NULL DEFAULT '0',
  `item_duration_max` int(8) NOT NULL DEFAULT '1',
  `item_icon` varchar(255) NOT NULL DEFAULT '',
  `item_name` varchar(255) NOT NULL DEFAULT '',
  `item_desc` varchar(255) NOT NULL DEFAULT '',
  `item_type_use` int(8) NOT NULL DEFAULT '16',
  `item_weight` int(12) NOT NULL DEFAULT '25',
  `item_max_skill` int(8) NOT NULL DEFAULT '25',
  `item_add_power` int(8) NOT NULL DEFAULT '0',
  `item_mp_use` int(8) NOT NULL DEFAULT '0',
  `item_element` int(4) NOT NULL DEFAULT '0',
  `item_element_str_dmg` int(4) NOT NULL DEFAULT '100',
  `item_element_same_dmg` int(4) NOT NULL DEFAULT '100',
  `item_element_weak_dmg` int(4) NOT NULL DEFAULT '100',
  `item_sell_back_percentage` int(3) NOT NULL DEFAULT '10',
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_lake_tracker`
--

DROP TABLE IF EXISTS `fjr_adr_lake_tracker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_lake_tracker` (
  `track_id` int(10) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(100) DEFAULT NULL,
  `owner_name` varchar(100) DEFAULT NULL,
  `donated` int(12) DEFAULT NULL,
  `date` int(12) DEFAULT NULL,
  KEY `track_id` (`track_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_library`
--

DROP TABLE IF EXISTS `fjr_adr_library`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_library` (
  `book_id` int(8) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(255) NOT NULL DEFAULT '',
  `book_details` longtext NOT NULL,
  `book_difficulty` tinyint(2) NOT NULL DEFAULT '2',
  `book_false` int(1) NOT NULL DEFAULT '0',
  `book_zone` text NOT NULL,
  `book_crafting` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_library_learned`
--

DROP TABLE IF EXISTS `fjr_adr_library_learned`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_library_learned` (
  `user_id` int(8) NOT NULL,
  `book_id` int(8) NOT NULL,
  `book_name` varchar(255) NOT NULL DEFAULT '',
  `book_details` longtext NOT NULL,
  KEY `book_id` (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_loottables`
--

DROP TABLE IF EXISTS `fjr_adr_loottables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_loottables` (
  `loottable_id` int(8) NOT NULL AUTO_INCREMENT,
  `loottable_name` varchar(255) NOT NULL DEFAULT '',
  `loottable_desc` varchar(255) NOT NULL DEFAULT '',
  `loottable_dropchance` int(8) NOT NULL DEFAULT '1',
  `loottable_status` tinyint(1) NOT NULL DEFAULT '1',
  KEY `loottable_id` (`loottable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_npc`
--

DROP TABLE IF EXISTS `fjr_adr_npc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_npc` (
  `npc_id` int(8) NOT NULL AUTO_INCREMENT,
  `npc_zone` text NOT NULL,
  `npc_name` varchar(255) NOT NULL,
  `npc_img` varchar(255) NOT NULL,
  `npc_enable` int(8) NOT NULL DEFAULT '0',
  `npc_price` int(8) NOT NULL DEFAULT '0',
  `npc_message` text NOT NULL,
  `npc_item` text NOT NULL,
  `npc_message2` text NOT NULL,
  `npc_points` int(8) NOT NULL DEFAULT '0',
  `npc_exp` int(8) NOT NULL DEFAULT '0',
  `npc_sp` int(8) NOT NULL DEFAULT '0',
  `npc_item2` text NOT NULL,
  `npc_times` int(4) NOT NULL DEFAULT '0',
  `npc_message3` text NOT NULL,
  `npc_random` int(1) NOT NULL DEFAULT '0',
  `npc_random_chance` int(7) NOT NULL DEFAULT '1',
  `npc_user_level` int(1) NOT NULL DEFAULT '0',
  `npc_class` text NOT NULL,
  `npc_race` text NOT NULL,
  `npc_character_level` text NOT NULL,
  `npc_element` text NOT NULL,
  `npc_alignment` text NOT NULL,
  `npc_visit_prerequisite` text NOT NULL,
  `npc_quest_prerequisite` text NOT NULL,
  `npc_view` text NOT NULL,
  `npc_quest_hide` int(1) NOT NULL DEFAULT '0',
  `npc_quest_clue` int(1) NOT NULL DEFAULT '0',
  `npc_quest_clue_price` int(8) NOT NULL DEFAULT '0',
  `npc_kill_monster` varchar(255) NOT NULL,
  `npc_monster_amount` int(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`npc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_races`
--

DROP TABLE IF EXISTS `fjr_adr_races`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_races` (
  `race_id` smallint(8) NOT NULL DEFAULT '0',
  `race_name` varchar(255) NOT NULL DEFAULT '',
  `race_desc` text NOT NULL,
  `race_level` tinyint(1) NOT NULL DEFAULT '0',
  `race_img` varchar(255) NOT NULL DEFAULT '',
  `race_might_bonus` int(8) NOT NULL DEFAULT '0',
  `race_dexterity_bonus` int(8) NOT NULL DEFAULT '0',
  `race_constitution_bonus` int(8) NOT NULL DEFAULT '0',
  `race_intelligence_bonus` int(8) NOT NULL DEFAULT '0',
  `race_wisdom_bonus` int(8) NOT NULL DEFAULT '0',
  `race_charisma_bonus` int(8) NOT NULL DEFAULT '0',
  `race_skill_mining_bonus` int(8) NOT NULL DEFAULT '0',
  `race_skill_stone_bonus` int(8) NOT NULL DEFAULT '0',
  `race_skill_forge_bonus` int(8) NOT NULL DEFAULT '0',
  `race_skill_enchantment_bonus` int(8) NOT NULL DEFAULT '0',
  `race_skill_trading_bonus` int(8) NOT NULL DEFAULT '0',
  `race_skill_thief_bonus` int(8) NOT NULL DEFAULT '0',
  `race_might_malus` int(8) NOT NULL DEFAULT '0',
  `race_dexterity_malus` int(8) NOT NULL DEFAULT '0',
  `race_constitution_malus` int(8) NOT NULL DEFAULT '0',
  `race_intelligence_malus` int(8) NOT NULL DEFAULT '0',
  `race_wisdom_malus` int(8) NOT NULL DEFAULT '0',
  `race_charisma_malus` int(8) NOT NULL DEFAULT '0',
  `race_magic_attack_bonus` int(8) NOT NULL DEFAULT '0',
  `race_magic_resistance_bonus` int(8) NOT NULL DEFAULT '0',
  `race_magic_attack_malus` int(8) NOT NULL DEFAULT '0',
  `race_magic_resistance_malus` int(8) NOT NULL DEFAULT '0',
  `race_weight` int(12) NOT NULL DEFAULT '1000',
  `race_weight_per_level` int(3) NOT NULL DEFAULT '5',
  `race_zone_begin` int(8) NOT NULL DEFAULT '1',
  `race_zone_name` varchar(255) NOT NULL DEFAULT '',
  `race_skill_blacksmithing_bonus` int(8) NOT NULL DEFAULT '0',
  `race_skill_cooking_bonus` int(8) NOT NULL DEFAULT '0',
  `race_skill_alchemy_bonus` int(8) NOT NULL DEFAULT '0',
  `race_skill_fishing_bonus` int(8) NOT NULL DEFAULT '0',
  `race_skill_herbalism_bonus` int(8) NOT NULL DEFAULT '0',
  `race_skill_lumberjack_bonus` int(8) NOT NULL DEFAULT '0',
  `race_skill_tailoring_bonus` int(8) NOT NULL DEFAULT '0',
  `race_skill_hunting_bonus` int(8) NOT NULL DEFAULT '0',
  `race_skill_brewing_bonus` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`race_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_recipebook`
--

DROP TABLE IF EXISTS `fjr_adr_recipebook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_recipebook` (
  `recipe_id` int(8) NOT NULL AUTO_INCREMENT,
  `recipe_owner_id` int(8) NOT NULL DEFAULT '0',
  `recipe_level` int(8) NOT NULL DEFAULT '0',
  `recipe_linked_item` int(8) unsigned NOT NULL DEFAULT '0',
  `recipe_items_req` text NOT NULL,
  `recipe_effect` text NOT NULL,
  `recipe_original_id` int(8) NOT NULL DEFAULT '0',
  `recipe_skill_id` int(8) NOT NULL DEFAULT '0',
  KEY `recipe_id` (`recipe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_shops`
--

DROP TABLE IF EXISTS `fjr_adr_shops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_shops` (
  `shop_id` int(8) NOT NULL DEFAULT '0',
  `shop_owner_id` int(8) NOT NULL DEFAULT '0',
  `shop_name` varchar(255) NOT NULL DEFAULT '',
  `shop_desc` varchar(255) NOT NULL DEFAULT '',
  `shop_logo` varchar(100) NOT NULL DEFAULT '',
  `shop_last_updated` int(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`shop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_shops_items`
--

DROP TABLE IF EXISTS `fjr_adr_shops_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_shops_items` (
  `item_id` int(8) NOT NULL AUTO_INCREMENT,
  `item_owner_id` int(8) NOT NULL DEFAULT '0',
  `item_price` int(8) NOT NULL DEFAULT '0',
  `item_quality` int(8) NOT NULL DEFAULT '0',
  `item_power` int(8) NOT NULL DEFAULT '0',
  `item_duration` int(8) NOT NULL DEFAULT '0',
  `item_duration_max` int(8) NOT NULL DEFAULT '1',
  `item_icon` varchar(255) NOT NULL DEFAULT '',
  `item_name` varchar(255) NOT NULL DEFAULT '',
  `item_desc` varchar(255) NOT NULL DEFAULT '',
  `item_type_use` int(8) NOT NULL DEFAULT '16',
  `item_in_shop` tinyint(1) NOT NULL DEFAULT '0',
  `item_mp_use` int(8) NOT NULL DEFAULT '0',
  `item_element` int(4) NOT NULL DEFAULT '0',
  `item_element_str_dmg` int(4) NOT NULL DEFAULT '100',
  `item_element_same_dmg` int(4) NOT NULL DEFAULT '100',
  `item_element_weak_dmg` int(4) NOT NULL DEFAULT '100',
  `item_store_id` int(8) NOT NULL DEFAULT '1',
  `item_loottables` text,
  `item_weight` int(12) NOT NULL DEFAULT '25',
  `item_auth` int(1) NOT NULL DEFAULT '0',
  `item_no_sell` int(1) NOT NULL DEFAULT '0',
  `item_max_skill` int(8) NOT NULL DEFAULT '25',
  `item_add_power` int(8) NOT NULL DEFAULT '0',
  `item_monster_thief` tinyint(1) NOT NULL DEFAULT '0',
  `item_in_warehouse` tinyint(1) NOT NULL DEFAULT '0',
  `item_sell_back_percentage` int(3) NOT NULL DEFAULT '75',
  `item_thief_karma` int(5) NOT NULL DEFAULT '0',
  `item_thief_karma_fail` int(5) NOT NULL DEFAULT '0',
  `item_zone` int(8) NOT NULL DEFAULT '0',
  `item_zone_name` varchar(255) NOT NULL DEFAULT '0',
  `item_restrict_align_enable` tinyint(1) NOT NULL DEFAULT '0',
  `item_restrict_align` varchar(255) NOT NULL DEFAULT '0',
  `item_restrict_class_enable` tinyint(1) NOT NULL DEFAULT '0',
  `item_restrict_class` varchar(255) NOT NULL DEFAULT '0',
  `item_restrict_element_enable` tinyint(1) NOT NULL DEFAULT '0',
  `item_restrict_element` varchar(255) NOT NULL DEFAULT '0',
  `item_restrict_race_enable` tinyint(1) NOT NULL DEFAULT '0',
  `item_restrict_race` varchar(255) NOT NULL DEFAULT '0',
  `item_restrict_level` int(8) NOT NULL DEFAULT '0',
  `item_restrict_str` int(8) NOT NULL DEFAULT '0',
  `item_restrict_dex` int(8) NOT NULL DEFAULT '0',
  `item_restrict_int` int(8) NOT NULL DEFAULT '0',
  `item_restrict_wis` int(8) NOT NULL DEFAULT '0',
  `item_restrict_cha` int(8) NOT NULL DEFAULT '0',
  `item_restrict_con` int(8) NOT NULL DEFAULT '0',
  `item_crit_hit` smallint(3) NOT NULL DEFAULT '20',
  `item_crit_hit_mod` smallint(3) NOT NULL DEFAULT '2',
  `item_stolen_timestamp` int(12) NOT NULL DEFAULT '0',
  `item_stolen_by` varchar(255) NOT NULL DEFAULT '',
  `item_donated_timestamp` int(12) NOT NULL DEFAULT '0',
  `item_donated_by` varchar(255) NOT NULL DEFAULT '',
  `item_brewing_recipe` int(1) NOT NULL DEFAULT '0',
  `item_recipe_linked_item` int(8) unsigned NOT NULL DEFAULT '0',
  `item_brewing_items_req` text NOT NULL,
  `item_effect` text NOT NULL,
  `item_original_recipe_id` int(8) NOT NULL DEFAULT '0',
  `item_recipe_skill_id` int(8) NOT NULL DEFAULT '0',
  `item_stolen_id` int(12) NOT NULL DEFAULT '0',
  `item_steal_dc` tinyint(2) NOT NULL DEFAULT '2',
  `item_bought_timestamp` int(12) NOT NULL DEFAULT '0',
  KEY `item_id` (`item_id`),
  KEY `item_owner_id` (`item_owner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6766 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_shops_items_quality`
--

DROP TABLE IF EXISTS `fjr_adr_shops_items_quality`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_shops_items_quality` (
  `item_quality_id` int(8) NOT NULL DEFAULT '0',
  `item_quality_modifier_price` int(8) NOT NULL DEFAULT '0',
  `item_quality_lang` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`item_quality_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_shops_items_type`
--

DROP TABLE IF EXISTS `fjr_adr_shops_items_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_shops_items_type` (
  `item_type_id` int(8) NOT NULL DEFAULT '0',
  `item_type_base_price` int(8) NOT NULL DEFAULT '0',
  `item_type_lang` varchar(255) NOT NULL DEFAULT '',
  `item_type_order` mediumint(8) NOT NULL DEFAULT '1',
  `item_type_category` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`item_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_shops_spells`
--

DROP TABLE IF EXISTS `fjr_adr_shops_spells`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_shops_spells` (
  `spell_id` int(8) NOT NULL AUTO_INCREMENT,
  `spell_owner_id` int(8) NOT NULL DEFAULT '0',
  `spell_level` int(8) NOT NULL DEFAULT '0',
  `spell_power` int(8) NOT NULL DEFAULT '0',
  `spell_class` varchar(500) NOT NULL DEFAULT '0',
  `spell_icon` varchar(255) NOT NULL DEFAULT '',
  `spell_name` varchar(255) NOT NULL DEFAULT '',
  `spell_desc` varchar(255) NOT NULL DEFAULT '',
  `item_type_use` int(8) NOT NULL DEFAULT '16',
  `spell_max_skill` int(8) NOT NULL DEFAULT '25',
  `spell_add_power` int(8) NOT NULL DEFAULT '0',
  `spell_mp_use` int(8) NOT NULL DEFAULT '0',
  `spell_element` int(4) NOT NULL DEFAULT '0',
  `spell_element_str_dmg` int(4) NOT NULL DEFAULT '100',
  `spell_element_same_dmg` int(4) NOT NULL DEFAULT '100',
  `spell_element_weak_dmg` int(4) NOT NULL DEFAULT '100',
  `spell_original_id` int(8) NOT NULL DEFAULT '0',
  `spell_battle` int(1) NOT NULL DEFAULT '0',
  `spell_xtreme` text NOT NULL,
  `spell_xtreme_battle` text NOT NULL,
  `spell_xtreme_pvp` text NOT NULL,
  `spell_alignment` varchar(255) NOT NULL DEFAULT '0',
  `spell_element_restrict` varchar(255) NOT NULL DEFAULT '0',
  KEY `spell_id` (`spell_id`),
  KEY `spell_owner_id` (`spell_owner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_skills`
--

DROP TABLE IF EXISTS `fjr_adr_skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_skills` (
  `skill_id` tinyint(1) NOT NULL DEFAULT '0',
  `skill_name` varchar(255) NOT NULL DEFAULT '',
  `skill_desc` text NOT NULL,
  `skill_img` varchar(255) NOT NULL DEFAULT '',
  `skill_req` int(8) NOT NULL DEFAULT '0',
  `skill_chance` mediumint(3) NOT NULL DEFAULT '5',
  PRIMARY KEY (`skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_stores`
--

DROP TABLE IF EXISTS `fjr_adr_stores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_stores` (
  `store_id` int(8) NOT NULL AUTO_INCREMENT,
  `store_name` varchar(100) NOT NULL DEFAULT '',
  `store_desc` varchar(255) NOT NULL DEFAULT '',
  `store_img` varchar(255) NOT NULL DEFAULT '',
  `store_status` tinyint(1) NOT NULL DEFAULT '1',
  `store_sales_status` tinyint(1) NOT NULL DEFAULT '1',
  `store_admin` tinyint(1) NOT NULL DEFAULT '0',
  `store_owner_id` int(1) NOT NULL DEFAULT '1',
  `store_owner_img` varchar(255) DEFAULT '',
  `store_owner_speech` varchar(255) DEFAULT '',
  `store_zone` text NOT NULL,
  KEY `store_id` (`store_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_stores_stats`
--

DROP TABLE IF EXISTS `fjr_adr_stores_stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_stores_stats` (
  `store_stats_character_id` int(12) NOT NULL DEFAULT '0',
  `store_stats_store_id` int(12) NOT NULL DEFAULT '0',
  `store_stats_buy_total` int(12) NOT NULL DEFAULT '0',
  `store_stats_buy_last` int(12) NOT NULL DEFAULT '0',
  `store_stats_sold_total` int(12) NOT NULL DEFAULT '0',
  `store_stats_sold_last` int(12) NOT NULL DEFAULT '0',
  `store_stats_stolen_item_total` int(12) NOT NULL DEFAULT '0',
  `store_stats_stolen_item_fail_total` int(12) NOT NULL DEFAULT '0',
  `store_stats_stolen_item_last` int(12) NOT NULL DEFAULT '0',
  `store_stats_stolen_points_total` int(12) NOT NULL DEFAULT '0',
  `store_stats_stolen_points_last` int(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`store_stats_character_id`,`store_stats_store_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_stores_user_history`
--

DROP TABLE IF EXISTS `fjr_adr_stores_user_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_stores_user_history` (
  `user_store_trans_id` int(12) NOT NULL DEFAULT '0',
  `user_store_owner_id` int(8) NOT NULL DEFAULT '0',
  `user_store_info` text NOT NULL,
  `user_store_total_price` int(12) NOT NULL DEFAULT '0',
  `user_store_date` int(12) NOT NULL DEFAULT '0',
  `user_store_buyer` text NOT NULL,
  PRIMARY KEY (`user_store_trans_id`,`user_store_owner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_temple_donations`
--

DROP TABLE IF EXISTS `fjr_adr_temple_donations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_temple_donations` (
  `item_id` int(8) NOT NULL DEFAULT '0',
  `item_chance` tinyint(1) DEFAULT NULL,
  `item_owner_id` tinyint(1) NOT NULL DEFAULT '1',
  `item_price` int(8) NOT NULL DEFAULT '0',
  `item_quality` int(8) NOT NULL DEFAULT '0',
  `item_power` int(8) NOT NULL DEFAULT '0',
  `item_duration` int(8) NOT NULL DEFAULT '0',
  `item_duration_max` int(8) NOT NULL DEFAULT '1',
  `item_icon` varchar(255) NOT NULL DEFAULT '',
  `item_name` varchar(255) NOT NULL DEFAULT '',
  `item_desc` varchar(255) NOT NULL DEFAULT '',
  `item_type_use` int(8) NOT NULL DEFAULT '16',
  `item_weight` int(12) NOT NULL DEFAULT '25',
  `item_max_skill` int(8) NOT NULL DEFAULT '25',
  `item_add_power` int(8) NOT NULL DEFAULT '0',
  `item_mp_use` int(8) NOT NULL DEFAULT '0',
  `item_element` int(4) NOT NULL DEFAULT '0',
  `item_element_str_dmg` int(4) NOT NULL DEFAULT '100',
  `item_element_same_dmg` int(4) NOT NULL DEFAULT '100',
  `item_element_weak_dmg` int(4) NOT NULL DEFAULT '100',
  `item_sell_back_percentage` int(3) NOT NULL DEFAULT '10',
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_temple_tracker`
--

DROP TABLE IF EXISTS `fjr_adr_temple_tracker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_temple_tracker` (
  `track_id` int(10) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(100) DEFAULT NULL,
  `owner_name` varchar(100) DEFAULT NULL,
  `donated` int(12) DEFAULT NULL,
  `date` int(12) DEFAULT NULL,
  KEY `track_id` (`track_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_vault_blacklist`
--

DROP TABLE IF EXISTS `fjr_adr_vault_blacklist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_vault_blacklist` (
  `user_id` int(8) NOT NULL DEFAULT '0',
  `user_due` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_vault_exchange`
--

DROP TABLE IF EXISTS `fjr_adr_vault_exchange`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_vault_exchange` (
  `stock_id` int(8) NOT NULL DEFAULT '0',
  `stock_name` varchar(40) NOT NULL DEFAULT '',
  `stock_desc` varchar(255) NOT NULL DEFAULT '',
  `stock_price` int(8) NOT NULL DEFAULT '0',
  `stock_previous_price` int(8) NOT NULL DEFAULT '0',
  `stock_best_price` int(8) NOT NULL DEFAULT '0',
  `stock_worst_price` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_vault_exchange_users`
--

DROP TABLE IF EXISTS `fjr_adr_vault_exchange_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_vault_exchange_users` (
  `stock_id` mediumint(8) NOT NULL DEFAULT '0',
  `user_id` mediumint(8) NOT NULL DEFAULT '0',
  `stock_amount` mediumint(8) NOT NULL DEFAULT '0',
  `price_transaction` int(8) NOT NULL DEFAULT '0',
  KEY `stock_id` (`stock_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_vault_users`
--

DROP TABLE IF EXISTS `fjr_adr_vault_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_vault_users` (
  `owner_id` int(8) NOT NULL DEFAULT '0',
  `account_id` int(8) NOT NULL DEFAULT '0',
  `account_sum` int(8) NOT NULL DEFAULT '0',
  `account_time` int(11) NOT NULL DEFAULT '0',
  `loan_sum` int(8) NOT NULL DEFAULT '0',
  `loan_time` int(11) NOT NULL DEFAULT '0',
  `account_protect` tinyint(1) NOT NULL DEFAULT '0',
  `loan_protect` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`owner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_zone_buildings`
--

DROP TABLE IF EXISTS `fjr_adr_zone_buildings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_zone_buildings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL DEFAULT '',
  `shop` varchar(32) NOT NULL DEFAULT '',
  `sdesc` varchar(80) NOT NULL DEFAULT '',
  `record_id` int(10) unsigned NOT NULL DEFAULT '0',
  `type` varchar(32) NOT NULL DEFAULT '',
  `zone_link` text,
  `zone_name_tag` varchar(100) DEFAULT '',
  `zone_building_tag_no` int(3) DEFAULT '0',
  `zone_building_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  KEY `name` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=360 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_zone_maps`
--

DROP TABLE IF EXISTS `fjr_adr_zone_maps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_zone_maps` (
  `zone_id` int(8) NOT NULL DEFAULT '0',
  `zonemap_type` smallint(2) NOT NULL DEFAULT '0',
  `zone_world` tinyint(1) NOT NULL DEFAULT '0',
  `zonemap_buildings` text,
  PRIMARY KEY (`zone_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_zone_townmaps`
--

DROP TABLE IF EXISTS `fjr_adr_zone_townmaps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_zone_townmaps` (
  `zonemap_type` smallint(2) NOT NULL DEFAULT '0',
  `zonemap_name` varchar(255) NOT NULL DEFAULT '',
  `zonemap_bg` varchar(255) NOT NULL DEFAULT '',
  `zonemap_width` int(8) NOT NULL DEFAULT '0',
  `zonemap_cellwidth` int(8) NOT NULL DEFAULT '50',
  `zonemap_cellwidthnumber` int(8) NOT NULL DEFAULT '0',
  `zonemap_height` int(8) NOT NULL DEFAULT '0',
  `zonemap_cellheight` int(8) NOT NULL DEFAULT '50',
  `zonemap_cellheightnumber` int(8) NOT NULL DEFAULT '0',
  `zonemap_building` text,
  PRIMARY KEY (`zonemap_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_adr_zones`
--

DROP TABLE IF EXISTS `fjr_adr_zones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_adr_zones` (
  `zone_id` int(8) NOT NULL DEFAULT '0',
  `zone_name` varchar(255) NOT NULL DEFAULT '',
  `zone_desc` varchar(255) NOT NULL DEFAULT '',
  `zone_img` varchar(255) NOT NULL DEFAULT '',
  `zone_element` varchar(255) NOT NULL DEFAULT '',
  `zone_item` varchar(255) NOT NULL DEFAULT '0',
  `cost_goto1` int(8) NOT NULL DEFAULT '0',
  `cost_goto2` int(8) NOT NULL DEFAULT '0',
  `cost_goto3` int(8) NOT NULL DEFAULT '0',
  `cost_goto4` int(8) NOT NULL DEFAULT '0',
  `cost_return` int(8) NOT NULL DEFAULT '0',
  `goto1_id` int(9) NOT NULL DEFAULT '0',
  `goto2_id` int(9) NOT NULL DEFAULT '0',
  `goto3_id` int(9) NOT NULL DEFAULT '0',
  `goto4_id` int(9) NOT NULL DEFAULT '0',
  `return_id` int(9) NOT NULL DEFAULT '0',
  `zone_shops` int(1) NOT NULL DEFAULT '0',
  `zone_forge` int(1) NOT NULL DEFAULT '0',
  `zone_prison` int(1) NOT NULL DEFAULT '0',
  `zone_temple` int(1) NOT NULL DEFAULT '0',
  `zone_bank` int(1) NOT NULL DEFAULT '0',
  `zone_mine` int(1) NOT NULL DEFAULT '0',
  `zone_enchant` int(1) NOT NULL DEFAULT '0',
  `zone_beggar` int(1) NOT NULL DEFAULT '0',
  `zone_blacksmith` int(1) NOT NULL DEFAULT '0',
  `zone_brewing` int(1) NOT NULL DEFAULT '0',
  `zone_cauldron` int(1) NOT NULL DEFAULT '0',
  `zone_cooking` int(1) NOT NULL DEFAULT '0',
  `zone_fish` int(1) NOT NULL DEFAULT '0',
  `zone_herbal` int(1) NOT NULL DEFAULT '0',
  `zone_hunting` int(1) NOT NULL DEFAULT '0',
  `zone_jobs` int(1) NOT NULL DEFAULT '0',
  `zone_lake` int(1) NOT NULL DEFAULT '0',
  `zone_lumberjack` int(1) NOT NULL DEFAULT '0',
  `zone_research` int(1) NOT NULL DEFAULT '0',
  `zone_tailor` int(1) NOT NULL DEFAULT '0',
  `zone_event1` int(1) NOT NULL DEFAULT '0',
  `zone_event2` int(1) NOT NULL DEFAULT '0',
  `zone_event3` int(1) NOT NULL DEFAULT '0',
  `zone_event4` int(1) NOT NULL DEFAULT '0',
  `zone_event5` int(1) NOT NULL DEFAULT '0',
  `zone_event6` int(1) NOT NULL DEFAULT '0',
  `zone_event7` int(1) NOT NULL DEFAULT '0',
  `zone_event8` int(1) NOT NULL DEFAULT '0',
  `zone_pointwin1` int(8) NOT NULL DEFAULT '0',
  `zone_pointwin2` int(8) NOT NULL DEFAULT '0',
  `zone_pointloss1` int(8) NOT NULL DEFAULT '0',
  `zone_pointloss2` int(8) NOT NULL DEFAULT '0',
  `zone_chance` int(8) NOT NULL DEFAULT '0',
  `zone_mining_table` text NOT NULL,
  `zone_fishing_table` text NOT NULL,
  `zone_hunting_table` text NOT NULL,
  `zone_herbal_table` text NOT NULL,
  `zone_lumberjack_table` text NOT NULL,
  `zone_tailor_table` text NOT NULL,
  `zone_alchemy_table` text NOT NULL,
  `zone_monsters_list` text NOT NULL,
  `zone_level` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`zone_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_announcement_centre`
--

DROP TABLE IF EXISTS `fjr_announcement_centre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_announcement_centre` (
  `announcement_desc` varchar(255) NOT NULL DEFAULT '',
  `announcement_value` text NOT NULL,
  PRIMARY KEY (`announcement_desc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_areabb_blocs`
--

DROP TABLE IF EXISTS `fjr_areabb_blocs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_areabb_blocs` (
  `id_bloc` int(11) NOT NULL AUTO_INCREMENT,
  `id_feuille` int(11) NOT NULL DEFAULT '0',
  `id_mod` int(11) DEFAULT '0',
  `type_mod` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_bloc`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_areabb_blocs_html`
--

DROP TABLE IF EXISTS `fjr_areabb_blocs_html`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_areabb_blocs_html` (
  `id_bloc` tinyint(4) NOT NULL AUTO_INCREMENT,
  `titre` varchar(250) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`id_bloc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_areabb_categories`
--

DROP TABLE IF EXISTS `fjr_areabb_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_areabb_categories` (
  `arcade_catid` smallint(6) NOT NULL AUTO_INCREMENT,
  `arcade_parent` int(11) NOT NULL DEFAULT '0',
  `arcade_cattitle` varchar(100) NOT NULL DEFAULT '',
  `salle` int(11) NOT NULL DEFAULT '0',
  `arcade_nbelmt` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `arcade_catorder` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `arcade_icone` varchar(100) DEFAULT NULL,
  KEY `arcade_catid` (`arcade_catid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_areabb_config`
--

DROP TABLE IF EXISTS `fjr_areabb_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_areabb_config` (
  `nom` varchar(255) NOT NULL DEFAULT '',
  `valeur` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_areabb_feuille`
--

DROP TABLE IF EXISTS `fjr_areabb_feuille`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_areabb_feuille` (
  `id_feuille` int(11) NOT NULL AUTO_INCREMENT,
  `id_squelette` int(11) NOT NULL DEFAULT '0',
  `id_modele` int(11) NOT NULL DEFAULT '0',
  `position` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_feuille`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_areabb_games`
--

DROP TABLE IF EXISTS `fjr_areabb_games`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_areabb_games` (
  `game_id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `game_pic` varchar(50) NOT NULL DEFAULT '',
  `game_pic_large` varchar(50) DEFAULT NULL,
  `game_desc` varchar(255) NOT NULL DEFAULT '',
  `game_highscore` int(11) NOT NULL DEFAULT '0',
  `game_highdate` int(11) NOT NULL DEFAULT '0',
  `game_highuser` mediumint(8) NOT NULL DEFAULT '0',
  `game_name` varchar(50) NOT NULL DEFAULT '',
  `game_libelle` varchar(50) NOT NULL DEFAULT '',
  `game_date` int(11) NOT NULL DEFAULT '0',
  `game_swf` varchar(50) NOT NULL DEFAULT '',
  `game_scorevar` varchar(20) NOT NULL DEFAULT '',
  `game_type` tinyint(4) NOT NULL DEFAULT '0',
  `game_width` mediumint(5) NOT NULL DEFAULT '550',
  `game_height` varchar(5) NOT NULL DEFAULT '380',
  `game_order` mediumint(8) NOT NULL DEFAULT '0',
  `game_set` mediumint(8) NOT NULL DEFAULT '0',
  `arcade_catid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `game_cheat_control` tinyint(1) NOT NULL DEFAULT '0',
  `note` smallint(5) unsigned NOT NULL DEFAULT '2',
  `clics_pkg` int(11) DEFAULT '0',
  `clics_zip` int(11) DEFAULT '0',
  KEY `game_id` (`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_areabb_hackgame`
--

DROP TABLE IF EXISTS `fjr_areabb_hackgame`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_areabb_hackgame` (
  `id_hack` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) NOT NULL DEFAULT '0',
  `game_id` mediumint(8) NOT NULL DEFAULT '0',
  `date_hack` int(11) NOT NULL DEFAULT '0',
  `id_modo` int(11) DEFAULT NULL,
  `flashtime` int(11) DEFAULT '0',
  `realtime` int(11) DEFAULT '0',
  `score` float DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_hack`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_areabb_liens`
--

DROP TABLE IF EXISTS `fjr_areabb_liens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_areabb_liens` (
  `id_lien` smallint(6) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `lien` varchar(255) NOT NULL,
  `ordre` smallint(5) unsigned NOT NULL DEFAULT '99',
  `vignette` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_lien`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_areabb_modeles`
--

DROP TABLE IF EXISTS `fjr_areabb_modeles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_areabb_modeles` (
  `id_modele` smallint(6) NOT NULL AUTO_INCREMENT,
  `modele` text NOT NULL,
  `details` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_modele`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_areabb_mods`
--

DROP TABLE IF EXISTS `fjr_areabb_mods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_areabb_mods` (
  `id_mod` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) NOT NULL DEFAULT '',
  `affiche` tinyint(1) NOT NULL DEFAULT '0',
  `page` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_mod`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_areabb_note`
--

DROP TABLE IF EXISTS `fjr_areabb_note`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_areabb_note` (
  `game_id` smallint(6) NOT NULL DEFAULT '0',
  `user_id` smallint(6) NOT NULL DEFAULT '0',
  `note` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_areabb_scores`
--

DROP TABLE IF EXISTS `fjr_areabb_scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_areabb_scores` (
  `game_id` mediumint(8) NOT NULL DEFAULT '0',
  `user_id` mediumint(8) NOT NULL DEFAULT '0',
  `score_game` int(11) unsigned NOT NULL DEFAULT '0',
  `score_date` int(11) NOT NULL DEFAULT '0',
  `score_time` int(11) NOT NULL DEFAULT '0',
  `score_set` mediumint(8) NOT NULL DEFAULT '0',
  KEY `game_id` (`game_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_areabb_squelette`
--

DROP TABLE IF EXISTS `fjr_areabb_squelette`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_areabb_squelette` (
  `id_squelette` tinyint(4) NOT NULL AUTO_INCREMENT,
  `titre` varchar(250) DEFAULT NULL,
  `groupes` varchar(250) DEFAULT NULL,
  `type` smallint(6) NOT NULL DEFAULT '0',
  `position` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_squelette`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_attach_quota`
--

DROP TABLE IF EXISTS `fjr_attach_quota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_attach_quota` (
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `group_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `quota_type` smallint(2) NOT NULL DEFAULT '0',
  `quota_limit_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  KEY `quota_type` (`quota_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_attachments`
--

DROP TABLE IF EXISTS `fjr_attachments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_attachments` (
  `attach_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `post_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `privmsgs_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `user_id_1` mediumint(8) NOT NULL,
  `user_id_2` mediumint(8) NOT NULL,
  KEY `attach_id_post_id` (`attach_id`,`post_id`),
  KEY `attach_id_privmsgs_id` (`attach_id`,`privmsgs_id`),
  KEY `post_id` (`post_id`),
  KEY `privmsgs_id` (`privmsgs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_attachments_config`
--

DROP TABLE IF EXISTS `fjr_attachments_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_attachments_config` (
  `config_name` varchar(255) NOT NULL,
  `config_value` varchar(255) NOT NULL,
  PRIMARY KEY (`config_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_attachments_desc`
--

DROP TABLE IF EXISTS `fjr_attachments_desc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_attachments_desc` (
  `attach_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `physical_filename` varchar(255) NOT NULL,
  `real_filename` varchar(255) NOT NULL,
  `download_count` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `comment` varchar(255) DEFAULT NULL,
  `extension` varchar(100) DEFAULT NULL,
  `mimetype` varchar(100) DEFAULT NULL,
  `filesize` int(20) NOT NULL,
  `filetime` int(11) NOT NULL DEFAULT '0',
  `thumbnail` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`attach_id`),
  KEY `filetime` (`filetime`),
  KEY `physical_filename` (`physical_filename`(10)),
  KEY `filesize` (`filesize`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_attributes`
--

DROP TABLE IF EXISTS `fjr_attributes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_attributes` (
  `attribute_id` int(11) NOT NULL AUTO_INCREMENT,
  `attribute_type` smallint(1) NOT NULL DEFAULT '0',
  `attribute` varchar(255) NOT NULL DEFAULT '',
  `attribute_image` varchar(255) NOT NULL DEFAULT '',
  `attribute_color` varchar(6) NOT NULL DEFAULT '',
  `attribute_date_format` varchar(25) DEFAULT NULL,
  `attribute_position` tinyint(1) NOT NULL DEFAULT '0',
  `attribute_administrator` tinyint(1) DEFAULT '0',
  `attribute_moderator` tinyint(1) DEFAULT '0',
  `attribute_author` tinyint(1) DEFAULT '0',
  `attribute_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`attribute_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_auth_access`
--

DROP TABLE IF EXISTS `fjr_auth_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_auth_access` (
  `group_id` mediumint(8) NOT NULL DEFAULT '0',
  `forum_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `auth_view` tinyint(1) NOT NULL DEFAULT '0',
  `auth_read` tinyint(1) NOT NULL DEFAULT '0',
  `auth_post` tinyint(1) NOT NULL DEFAULT '0',
  `auth_reply` tinyint(1) NOT NULL DEFAULT '0',
  `auth_edit` tinyint(1) NOT NULL DEFAULT '0',
  `auth_delete` tinyint(1) NOT NULL DEFAULT '0',
  `auth_sticky` tinyint(1) NOT NULL DEFAULT '0',
  `auth_announce` tinyint(1) NOT NULL DEFAULT '0',
  `auth_vote` tinyint(1) NOT NULL DEFAULT '0',
  `auth_pollcreate` tinyint(1) NOT NULL DEFAULT '0',
  `auth_mod` tinyint(1) NOT NULL DEFAULT '0',
  `auth_ban` tinyint(1) NOT NULL DEFAULT '0',
  `auth_greencard` tinyint(1) NOT NULL DEFAULT '0',
  `auth_bluecard` tinyint(1) NOT NULL DEFAULT '0',
  `auth_download` tinyint(1) NOT NULL DEFAULT '0',
  `auth_attachments` tinyint(1) NOT NULL DEFAULT '0',
  KEY `group_id` (`group_id`),
  KEY `forum_id` (`forum_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_banlist`
--

DROP TABLE IF EXISTS `fjr_banlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_banlist` (
  `ban_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ban_userid` mediumint(8) NOT NULL,
  `ban_ip` char(8) NOT NULL,
  `ban_email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ban_id`),
  KEY `ban_ip_user_id` (`ban_ip`,`ban_userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_bbc_box`
--

DROP TABLE IF EXISTS `fjr_bbc_box`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_bbc_box` (
  `bbc_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `bbc_name` varchar(255) NOT NULL,
  `bbc_value` varchar(255) NOT NULL,
  `bbc_auth` varchar(255) NOT NULL,
  `bbc_before` varchar(255) NOT NULL,
  `bbc_after` varchar(255) NOT NULL,
  `bbc_helpline` varchar(255) NOT NULL,
  `bbc_img` varchar(255) NOT NULL,
  `bbc_divider` varchar(255) NOT NULL,
  `bbc_order` mediumint(8) NOT NULL DEFAULT '1',
  PRIMARY KEY (`bbc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_categories`
--

DROP TABLE IF EXISTS `fjr_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_categories` (
  `cat_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(100) DEFAULT NULL,
  `cat_order` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`cat_id`),
  KEY `cat_order` (`cat_order`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_clicks`
--

DROP TABLE IF EXISTS `fjr_clicks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_clicks` (
  `id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL DEFAULT '',
  `clicks` decimal(6,0) unsigned NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`id`),
  KEY `md5` (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_config`
--

DROP TABLE IF EXISTS `fjr_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_config` (
  `config_name` varchar(255) NOT NULL,
  `config_value` varchar(255) NOT NULL,
  PRIMARY KEY (`config_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_confirm`
--

DROP TABLE IF EXISTS `fjr_confirm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_confirm` (
  `confirm_id` char(32) NOT NULL DEFAULT '',
  `session_id` char(32) NOT NULL DEFAULT '',
  `code` char(6) NOT NULL DEFAULT '',
  PRIMARY KEY (`session_id`,`confirm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_disallow`
--

DROP TABLE IF EXISTS `fjr_disallow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_disallow` (
  `disallow_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `disallow_username` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`disallow_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_extension_groups`
--

DROP TABLE IF EXISTS `fjr_extension_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_extension_groups` (
  `group_id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `group_name` char(20) NOT NULL,
  `cat_id` tinyint(2) NOT NULL DEFAULT '0',
  `allow_group` tinyint(1) NOT NULL DEFAULT '0',
  `download_mode` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `upload_icon` varchar(100) DEFAULT '',
  `max_filesize` int(20) NOT NULL DEFAULT '0',
  `forum_permissions` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_extensions`
--

DROP TABLE IF EXISTS `fjr_extensions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_extensions` (
  `ext_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `extension` varchar(100) NOT NULL,
  `comment` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ext_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_forbidden_extensions`
--

DROP TABLE IF EXISTS `fjr_forbidden_extensions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_forbidden_extensions` (
  `ext_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `extension` varchar(100) NOT NULL,
  PRIMARY KEY (`ext_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_forum_prune`
--

DROP TABLE IF EXISTS `fjr_forum_prune`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_forum_prune` (
  `prune_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `forum_id` smallint(5) unsigned NOT NULL,
  `prune_days` smallint(5) unsigned NOT NULL,
  `prune_freq` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`prune_id`),
  KEY `forum_id` (`forum_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_forums`
--

DROP TABLE IF EXISTS `fjr_forums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_forums` (
  `forum_id` smallint(5) unsigned NOT NULL,
  `cat_id` mediumint(8) unsigned NOT NULL,
  `forum_name` varchar(150) DEFAULT NULL,
  `forum_desc` text,
  `forum_status` tinyint(4) NOT NULL DEFAULT '0',
  `forum_order` mediumint(8) unsigned NOT NULL DEFAULT '1',
  `forum_posts` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `forum_topics` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `forum_last_post_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `prune_next` int(11) DEFAULT NULL,
  `prune_enable` tinyint(1) NOT NULL DEFAULT '0',
  `auth_view` tinyint(2) NOT NULL DEFAULT '0',
  `auth_read` tinyint(2) NOT NULL DEFAULT '0',
  `auth_post` tinyint(2) NOT NULL DEFAULT '0',
  `auth_reply` tinyint(2) NOT NULL DEFAULT '0',
  `auth_edit` tinyint(2) NOT NULL DEFAULT '0',
  `auth_delete` tinyint(2) NOT NULL DEFAULT '0',
  `auth_sticky` tinyint(2) NOT NULL DEFAULT '0',
  `auth_announce` tinyint(2) NOT NULL DEFAULT '0',
  `auth_vote` tinyint(2) NOT NULL DEFAULT '0',
  `auth_pollcreate` tinyint(2) NOT NULL DEFAULT '0',
  `forum_parent` mediumint(8) NOT NULL DEFAULT '0',
  `auth_ban` tinyint(2) NOT NULL DEFAULT '3',
  `auth_greencard` tinyint(2) NOT NULL DEFAULT '5',
  `auth_bluecard` tinyint(2) NOT NULL DEFAULT '1',
  `forum_qpes` tinyint(1) NOT NULL DEFAULT '1',
  `points_disabled` tinyint(1) NOT NULL,
  `forum_external` tinyint(1) NOT NULL DEFAULT '0',
  `forum_redirect_url` text,
  `forum_ext_newwin` tinyint(1) NOT NULL DEFAULT '0',
  `forum_ext_image` text,
  `forum_redirects_user` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `forum_redirects_guest` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `forum_icon` varchar(255) DEFAULT NULL,
  `forum_enter_limit` mediumint(8) unsigned DEFAULT '0',
  `forum_password` varchar(20) NOT NULL DEFAULT '',
  `forum_display_sort` tinyint(1) NOT NULL,
  `forum_display_order` tinyint(1) NOT NULL,
  `forum_desc_long` text,
  `auth_attachments` tinyint(2) NOT NULL DEFAULT '0',
  `auth_download` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`forum_id`),
  KEY `forums_order` (`forum_order`),
  KEY `cat_id` (`cat_id`),
  KEY `forum_last_post_id` (`forum_last_post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_ggs_config`
--

DROP TABLE IF EXISTS `fjr_ggs_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_ggs_config` (
  `config_name` varchar(255) NOT NULL,
  `config_value` varchar(255) NOT NULL,
  PRIMARY KEY (`config_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_groups`
--

DROP TABLE IF EXISTS `fjr_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_groups` (
  `group_id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `group_type` tinyint(4) NOT NULL DEFAULT '1',
  `group_name` varchar(40) NOT NULL,
  `group_description` varchar(255) NOT NULL,
  `group_moderator` mediumint(8) NOT NULL DEFAULT '0',
  `group_single_user` tinyint(1) NOT NULL DEFAULT '1',
  `group_color` mediumint(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`group_id`),
  KEY `group_single_user` (`group_single_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_guests_visit`
--

DROP TABLE IF EXISTS `fjr_guests_visit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_guests_visit` (
  `guest_time` int(11) NOT NULL DEFAULT '0',
  `guest_visit` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`guest_time`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_ip_tracking`
--

DROP TABLE IF EXISTS `fjr_ip_tracking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_ip_tracking` (
  `ip` varchar(15) NOT NULL DEFAULT '',
  `time` int(11) NOT NULL DEFAULT '0',
  `located` varchar(255) NOT NULL DEFAULT '',
  `referer` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_ip_tracking_config`
--

DROP TABLE IF EXISTS `fjr_ip_tracking_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_ip_tracking_config` (
  `max` int(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_logos`
--

DROP TABLE IF EXISTS `fjr_logos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_logos` (
  `logo_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adresse` varchar(100) DEFAULT NULL,
  `proba` float unsigned DEFAULT '0',
  `selected` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `date_select` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`logo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_posts`
--

DROP TABLE IF EXISTS `fjr_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_posts` (
  `post_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `topic_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `forum_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `poster_id` mediumint(8) NOT NULL DEFAULT '0',
  `post_time` int(11) NOT NULL DEFAULT '0',
  `post_created` int(11) NOT NULL DEFAULT '0',
  `poster_ip` char(8) NOT NULL,
  `post_username` varchar(25) DEFAULT NULL,
  `enable_bbcode` tinyint(1) NOT NULL DEFAULT '1',
  `enable_html` tinyint(1) NOT NULL DEFAULT '0',
  `enable_smilies` tinyint(1) NOT NULL DEFAULT '1',
  `enable_sig` tinyint(1) NOT NULL DEFAULT '1',
  `post_edit_time` int(11) DEFAULT NULL,
  `post_edit_count` smallint(5) unsigned NOT NULL DEFAULT '0',
  `post_bluecard` tinyint(1) DEFAULT NULL,
  `post_attachment` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`post_id`),
  KEY `forum_id` (`forum_id`),
  KEY `topic_id` (`topic_id`),
  KEY `poster_id` (`poster_id`),
  KEY `post_time` (`post_time`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_posts_text`
--

DROP TABLE IF EXISTS `fjr_posts_text`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_posts_text` (
  `post_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `bbcode_uid` char(10) NOT NULL DEFAULT '',
  `post_subject` char(60) DEFAULT NULL,
  `post_text` text,
  `post_sub_title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_privmsgs`
--

DROP TABLE IF EXISTS `fjr_privmsgs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_privmsgs` (
  `privmsgs_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `privmsgs_type` tinyint(4) NOT NULL DEFAULT '0',
  `privmsgs_subject` varchar(255) NOT NULL DEFAULT '0',
  `privmsgs_from_userid` mediumint(8) NOT NULL DEFAULT '0',
  `privmsgs_to_userid` mediumint(8) NOT NULL DEFAULT '0',
  `privmsgs_date` int(11) NOT NULL DEFAULT '0',
  `privmsgs_ip` char(8) NOT NULL,
  `privmsgs_enable_bbcode` tinyint(1) NOT NULL DEFAULT '1',
  `privmsgs_enable_html` tinyint(1) NOT NULL DEFAULT '0',
  `privmsgs_enable_smilies` tinyint(1) NOT NULL DEFAULT '1',
  `privmsgs_attach_sig` tinyint(1) NOT NULL DEFAULT '1',
  `privmsgs_attachment` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`privmsgs_id`),
  KEY `privmsgs_from_userid` (`privmsgs_from_userid`),
  KEY `privmsgs_to_userid` (`privmsgs_to_userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_privmsgs_text`
--

DROP TABLE IF EXISTS `fjr_privmsgs_text`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_privmsgs_text` (
  `privmsgs_text_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `privmsgs_bbcode_uid` char(10) NOT NULL DEFAULT '0',
  `privmsgs_text` text,
  PRIMARY KEY (`privmsgs_text_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_quicklinks`
--

DROP TABLE IF EXISTS `fjr_quicklinks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_quicklinks` (
  `word_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `word` char(100) NOT NULL DEFAULT '',
  `replacement` char(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`word_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_quota_limits`
--

DROP TABLE IF EXISTS `fjr_quota_limits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_quota_limits` (
  `quota_limit_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `quota_desc` varchar(20) NOT NULL DEFAULT '',
  `quota_limit` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`quota_limit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_rabbitoshi_config`
--

DROP TABLE IF EXISTS `fjr_rabbitoshi_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_rabbitoshi_config` (
  `creature_id` smallint(2) NOT NULL DEFAULT '0',
  `creature_name` varchar(255) NOT NULL DEFAULT '',
  `creature_prize` int(8) NOT NULL DEFAULT '0',
  `creature_power` int(8) NOT NULL DEFAULT '0',
  `creature_magicpower` int(8) NOT NULL DEFAULT '0',
  `creature_armor` int(8) NOT NULL DEFAULT '0',
  `creature_max_hunger` int(8) NOT NULL DEFAULT '0',
  `creature_max_thirst` int(8) NOT NULL DEFAULT '0',
  `creature_max_health` int(8) NOT NULL DEFAULT '0',
  `creature_mp_max` int(8) NOT NULL DEFAULT '0',
  `creature_max_hygiene` int(8) NOT NULL DEFAULT '0',
  `creature_food_id` smallint(2) NOT NULL DEFAULT '0',
  `creature_buyable` tinyint(1) NOT NULL DEFAULT '1',
  `creature_evolution_of` int(8) NOT NULL DEFAULT '0',
  `creature_img` varchar(255) NOT NULL DEFAULT '',
  `creature_experience_max` int(8) NOT NULL DEFAULT '100',
  `creature_max_attack` int(8) NOT NULL DEFAULT '1',
  `creature_max_magicattack` int(8) NOT NULL DEFAULT '1',
  `creature_health_levelup` int(8) NOT NULL DEFAULT '0',
  `creature_hunger_levelup` int(8) NOT NULL DEFAULT '0',
  `creature_thirst_levelup` int(8) NOT NULL DEFAULT '0',
  `creature_hygiene_levelup` int(8) NOT NULL DEFAULT '0',
  `creature_power_levelup` int(8) NOT NULL DEFAULT '0',
  `creature_magicpower_levelup` int(8) NOT NULL DEFAULT '0',
  `creature_armor_levelup` int(8) NOT NULL DEFAULT '0',
  `creature_attack_levelup` int(8) NOT NULL DEFAULT '0',
  `creature_magicattack_levelup` int(8) NOT NULL DEFAULT '0',
  `creature_mp_levelup` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`creature_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_rabbitoshi_general`
--

DROP TABLE IF EXISTS `fjr_rabbitoshi_general`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_rabbitoshi_general` (
  `config_name` varchar(255) NOT NULL DEFAULT '0',
  `config_value` int(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`config_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_rabbitoshi_shop`
--

DROP TABLE IF EXISTS `fjr_rabbitoshi_shop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_rabbitoshi_shop` (
  `item_id` smallint(1) NOT NULL DEFAULT '0',
  `item_name` varchar(255) NOT NULL DEFAULT '',
  `item_prize` int(8) NOT NULL DEFAULT '0',
  `item_desc` varchar(255) NOT NULL DEFAULT '',
  `item_type` smallint(1) NOT NULL DEFAULT '0',
  `item_power` int(8) NOT NULL DEFAULT '0',
  `item_img` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_rabbitoshi_shop_users`
--

DROP TABLE IF EXISTS `fjr_rabbitoshi_shop_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_rabbitoshi_shop_users` (
  `item_id` mediumint(8) NOT NULL DEFAULT '0',
  `user_id` mediumint(8) NOT NULL DEFAULT '0',
  `item_amount` mediumint(8) NOT NULL DEFAULT '0',
  KEY `item_id` (`item_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_rabbitoshi_users`
--

DROP TABLE IF EXISTS `fjr_rabbitoshi_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_rabbitoshi_users` (
  `owner_id` int(8) NOT NULL DEFAULT '0',
  `owner_last_visit` int(11) NOT NULL DEFAULT '0',
  `owner_creature_id` smallint(2) NOT NULL DEFAULT '0',
  `owner_creature_name` varchar(255) NOT NULL DEFAULT '',
  `creature_level` int(8) NOT NULL DEFAULT '1',
  `creature_power` int(8) NOT NULL DEFAULT '0',
  `creature_magicpower` int(8) NOT NULL DEFAULT '0',
  `creature_armor` int(8) NOT NULL DEFAULT '0',
  `creature_experience` int(8) NOT NULL DEFAULT '0',
  `creature_hunger` int(8) NOT NULL DEFAULT '0',
  `creature_hunger_max` int(8) NOT NULL DEFAULT '0',
  `creature_thirst` int(8) NOT NULL DEFAULT '0',
  `creature_thirst_max` int(8) NOT NULL DEFAULT '0',
  `creature_health` int(8) NOT NULL DEFAULT '0',
  `creature_health_max` int(8) NOT NULL DEFAULT '0',
  `creature_mp` int(8) NOT NULL DEFAULT '0',
  `creature_max_mp` int(8) NOT NULL DEFAULT '0',
  `creature_hygiene` int(8) NOT NULL DEFAULT '0',
  `creature_hygiene_max` int(8) NOT NULL DEFAULT '0',
  `creature_attack` int(8) NOT NULL DEFAULT '1',
  `creature_attack_max` int(8) NOT NULL DEFAULT '1',
  `creature_magicattack` int(8) NOT NULL DEFAULT '1',
  `creature_magicattack_max` int(8) NOT NULL DEFAULT '1',
  `creature_age` int(11) NOT NULL DEFAULT '0',
  `creature_hotel` int(11) NOT NULL DEFAULT '0',
  `owner_notification` tinyint(1) NOT NULL DEFAULT '0',
  `owner_hide` tinyint(1) NOT NULL DEFAULT '0',
  `owner_feed_full` tinyint(1) NOT NULL DEFAULT '1',
  `owner_drink_full` tinyint(1) NOT NULL DEFAULT '1',
  `owner_clean_full` tinyint(1) NOT NULL DEFAULT '1',
  `creature_statut` int(8) NOT NULL DEFAULT '0',
  `creature_avatar` varchar(255) NOT NULL DEFAULT 'default_avatar.gif',
  `creature_invoc` int(8) NOT NULL DEFAULT '0',
  `creature_experience_level` int(8) NOT NULL DEFAULT '0',
  `creature_experience_level_limit` int(8) NOT NULL DEFAULT '0',
  `creature_ability` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`owner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_ranks`
--

DROP TABLE IF EXISTS `fjr_ranks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_ranks` (
  `rank_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `rank_title` varchar(50) NOT NULL,
  `rank_min` mediumint(8) NOT NULL DEFAULT '0',
  `rank_special` tinyint(1) DEFAULT '0',
  `rank_image` varchar(255) DEFAULT NULL,
  `rank_tags` text NOT NULL,
  PRIMARY KEY (`rank_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_rcs`
--

DROP TABLE IF EXISTS `fjr_rcs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_rcs` (
  `rcs_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `rcs_name` varchar(50) NOT NULL DEFAULT '',
  `rcs_color` varchar(6) NOT NULL DEFAULT '',
  `rcs_single` tinyint(1) NOT NULL DEFAULT '0',
  `rcs_display` tinyint(1) NOT NULL DEFAULT '0',
  `rcs_order` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`rcs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_search_results`
--

DROP TABLE IF EXISTS `fjr_search_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_search_results` (
  `search_id` int(11) unsigned NOT NULL DEFAULT '0',
  `session_id` char(32) NOT NULL DEFAULT '',
  `search_time` int(11) NOT NULL DEFAULT '0',
  `search_array` text NOT NULL,
  PRIMARY KEY (`search_id`),
  KEY `session_id` (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_search_wordlist`
--

DROP TABLE IF EXISTS `fjr_search_wordlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_search_wordlist` (
  `word_text` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `word_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `word_common` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`word_text`),
  KEY `word_id` (`word_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_search_wordmatch`
--

DROP TABLE IF EXISTS `fjr_search_wordmatch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_search_wordmatch` (
  `post_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `word_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `title_match` tinyint(1) NOT NULL DEFAULT '0',
  KEY `post_id` (`post_id`),
  KEY `word_id` (`word_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_sessions`
--

DROP TABLE IF EXISTS `fjr_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_sessions` (
  `session_id` char(32) NOT NULL DEFAULT '',
  `session_user_id` mediumint(8) NOT NULL DEFAULT '0',
  `session_start` int(11) NOT NULL DEFAULT '0',
  `session_time` int(11) NOT NULL DEFAULT '0',
  `session_ip` char(8) NOT NULL DEFAULT '0',
  `session_page` int(11) NOT NULL DEFAULT '0',
  `session_logged_in` tinyint(1) NOT NULL DEFAULT '0',
  `session_admin` tinyint(2) NOT NULL DEFAULT '0',
  `session_agent` text NOT NULL,
  `areabb_tps_depart` int(11) DEFAULT NULL,
  `areabb_gid` int(11) DEFAULT NULL,
  `areabb_variable` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`session_id`),
  KEY `session_user_id` (`session_user_id`),
  KEY `session_id_ip_user_id` (`session_id`,`session_ip`,`session_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_sessions_keys`
--

DROP TABLE IF EXISTS `fjr_sessions_keys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_sessions_keys` (
  `key_id` varchar(32) NOT NULL DEFAULT '0',
  `user_id` mediumint(8) NOT NULL DEFAULT '0',
  `last_ip` varchar(8) NOT NULL DEFAULT '0',
  `last_login` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`key_id`,`user_id`),
  KEY `last_login` (`last_login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_shout`
--

DROP TABLE IF EXISTS `fjr_shout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_shout` (
  `shout_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `shout_username` varchar(25) NOT NULL,
  `shout_user_id` mediumint(8) NOT NULL,
  `shout_group_id` mediumint(8) NOT NULL,
  `shout_session_time` int(11) NOT NULL,
  `shout_ip` char(8) NOT NULL,
  `shout_text` text NOT NULL,
  `shout_active` mediumint(8) NOT NULL,
  `enable_bbcode` tinyint(1) NOT NULL,
  `enable_html` tinyint(1) NOT NULL,
  `enable_smilies` tinyint(1) NOT NULL,
  `enable_sig` tinyint(1) NOT NULL,
  `shout_bbcode_uid` varchar(10) NOT NULL,
  KEY `shout_id` (`shout_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_smilies`
--

DROP TABLE IF EXISTS `fjr_smilies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_smilies` (
  `smilies_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) DEFAULT NULL,
  `smile_url` varchar(100) DEFAULT NULL,
  `emoticon` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`smilies_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_themes`
--

DROP TABLE IF EXISTS `fjr_themes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_themes` (
  `themes_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `template_name` varchar(30) NOT NULL DEFAULT '',
  `style_name` varchar(30) NOT NULL DEFAULT '',
  `head_stylesheet` varchar(100) DEFAULT NULL,
  `body_background` varchar(100) DEFAULT NULL,
  `body_bgcolor` varchar(6) DEFAULT NULL,
  `body_text` varchar(6) DEFAULT NULL,
  `body_link` varchar(6) DEFAULT NULL,
  `body_vlink` varchar(6) DEFAULT NULL,
  `body_alink` varchar(6) DEFAULT NULL,
  `body_hlink` varchar(6) DEFAULT NULL,
  `tr_color1` varchar(6) DEFAULT NULL,
  `tr_color2` varchar(6) DEFAULT NULL,
  `tr_color3` varchar(6) DEFAULT NULL,
  `tr_class1` varchar(25) DEFAULT NULL,
  `tr_class2` varchar(25) DEFAULT NULL,
  `tr_class3` varchar(25) DEFAULT NULL,
  `th_color1` varchar(6) DEFAULT NULL,
  `th_color2` varchar(6) DEFAULT NULL,
  `th_color3` varchar(6) DEFAULT NULL,
  `th_class1` varchar(25) DEFAULT NULL,
  `th_class2` varchar(25) DEFAULT NULL,
  `th_class3` varchar(25) DEFAULT NULL,
  `td_color1` varchar(6) DEFAULT NULL,
  `td_color2` varchar(6) DEFAULT NULL,
  `td_color3` varchar(6) DEFAULT NULL,
  `td_class1` varchar(25) DEFAULT NULL,
  `td_class2` varchar(25) DEFAULT NULL,
  `td_class3` varchar(25) DEFAULT NULL,
  `fontface1` varchar(50) DEFAULT NULL,
  `fontface2` varchar(50) DEFAULT NULL,
  `fontface3` varchar(50) DEFAULT NULL,
  `fontsize1` tinyint(4) DEFAULT NULL,
  `fontsize2` tinyint(4) DEFAULT NULL,
  `fontsize3` tinyint(4) DEFAULT NULL,
  `fontcolor1` varchar(6) DEFAULT NULL,
  `fontcolor2` varchar(6) DEFAULT NULL,
  `fontcolor3` varchar(6) DEFAULT NULL,
  `span_class1` varchar(25) DEFAULT NULL,
  `span_class2` varchar(25) DEFAULT NULL,
  `span_class3` varchar(25) DEFAULT NULL,
  `rcs_admincolor` varchar(6) NOT NULL DEFAULT '',
  `rcs_modcolor` varchar(6) NOT NULL DEFAULT '',
  `rcs_usercolor` varchar(6) NOT NULL DEFAULT '',
  `img_size_poll` smallint(5) unsigned DEFAULT NULL,
  `img_size_privmsg` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`themes_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_themes_name`
--

DROP TABLE IF EXISTS `fjr_themes_name`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_themes_name` (
  `themes_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `tr_color1_name` char(50) DEFAULT NULL,
  `tr_color2_name` char(50) DEFAULT NULL,
  `tr_color3_name` char(50) DEFAULT NULL,
  `tr_class1_name` char(50) DEFAULT NULL,
  `tr_class2_name` char(50) DEFAULT NULL,
  `tr_class3_name` char(50) DEFAULT NULL,
  `th_color1_name` char(50) DEFAULT NULL,
  `th_color2_name` char(50) DEFAULT NULL,
  `th_color3_name` char(50) DEFAULT NULL,
  `th_class1_name` char(50) DEFAULT NULL,
  `th_class2_name` char(50) DEFAULT NULL,
  `th_class3_name` char(50) DEFAULT NULL,
  `td_color1_name` char(50) DEFAULT NULL,
  `td_color2_name` char(50) DEFAULT NULL,
  `td_color3_name` char(50) DEFAULT NULL,
  `td_class1_name` char(50) DEFAULT NULL,
  `td_class2_name` char(50) DEFAULT NULL,
  `td_class3_name` char(50) DEFAULT NULL,
  `fontface1_name` char(50) DEFAULT NULL,
  `fontface2_name` char(50) DEFAULT NULL,
  `fontface3_name` char(50) DEFAULT NULL,
  `fontsize1_name` char(50) DEFAULT NULL,
  `fontsize2_name` char(50) DEFAULT NULL,
  `fontsize3_name` char(50) DEFAULT NULL,
  `fontcolor1_name` char(50) DEFAULT NULL,
  `fontcolor2_name` char(50) DEFAULT NULL,
  `fontcolor3_name` char(50) DEFAULT NULL,
  `span_class1_name` char(50) DEFAULT NULL,
  `span_class2_name` char(50) DEFAULT NULL,
  `span_class3_name` char(50) DEFAULT NULL,
  PRIMARY KEY (`themes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_topics`
--

DROP TABLE IF EXISTS `fjr_topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_topics` (
  `topic_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `forum_id` smallint(8) unsigned NOT NULL DEFAULT '0',
  `topic_title` char(60) NOT NULL,
  `topic_poster` mediumint(8) NOT NULL DEFAULT '0',
  `topic_time` int(11) NOT NULL DEFAULT '0',
  `topic_views` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `topic_replies` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `topic_status` tinyint(3) NOT NULL DEFAULT '0',
  `topic_vote` tinyint(1) NOT NULL DEFAULT '0',
  `topic_type` tinyint(3) NOT NULL DEFAULT '0',
  `topic_first_post_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `topic_last_post_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `topic_moved_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `topic_sub_title` varchar(255) DEFAULT NULL,
  `topic_attachment` tinyint(1) NOT NULL DEFAULT '0',
  `topic_attribute` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`topic_id`),
  KEY `forum_id` (`forum_id`),
  KEY `topic_moved_id` (`topic_moved_id`),
  KEY `topic_status` (`topic_status`),
  KEY `topic_type` (`topic_type`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_topics_watch`
--

DROP TABLE IF EXISTS `fjr_topics_watch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_topics_watch` (
  `topic_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `user_id` mediumint(8) NOT NULL DEFAULT '0',
  `notify_status` tinyint(1) NOT NULL DEFAULT '0',
  KEY `topic_id` (`topic_id`),
  KEY `user_id` (`user_id`),
  KEY `notify_status` (`notify_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_user_group`
--

DROP TABLE IF EXISTS `fjr_user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_user_group` (
  `group_id` mediumint(8) NOT NULL DEFAULT '0',
  `group_moderator` tinyint(1) NOT NULL,
  `user_id` mediumint(8) NOT NULL DEFAULT '0',
  `user_pending` tinyint(1) DEFAULT NULL,
  KEY `group_id` (`group_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_users`
--

DROP TABLE IF EXISTS `fjr_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_users` (
  `user_id` mediumint(8) NOT NULL,
  `user_active` tinyint(1) DEFAULT '1',
  `username` varchar(25) NOT NULL,
  `reponse_conf` varchar(255) DEFAULT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_session_time` int(11) NOT NULL DEFAULT '0',
  `user_session_page` smallint(5) NOT NULL DEFAULT '0',
  `user_lastvisit` int(11) NOT NULL DEFAULT '0',
  `user_regdate` int(11) NOT NULL DEFAULT '0',
  `user_level` tinyint(4) DEFAULT '0',
  `user_posts` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `user_timezone` decimal(5,2) NOT NULL DEFAULT '0.00',
  `user_style` tinyint(4) DEFAULT NULL,
  `user_lang` varchar(255) DEFAULT NULL,
  `user_dateformat` varchar(14) NOT NULL DEFAULT 'd M Y H:i',
  `user_new_privmsg` smallint(5) unsigned NOT NULL DEFAULT '0',
  `user_unread_privmsg` smallint(5) unsigned NOT NULL DEFAULT '0',
  `user_last_privmsg` int(11) NOT NULL DEFAULT '0',
  `user_login_tries` smallint(5) unsigned NOT NULL DEFAULT '0',
  `user_last_login_try` int(11) NOT NULL DEFAULT '0',
  `user_emailtime` int(11) DEFAULT NULL,
  `user_viewemail` tinyint(1) DEFAULT NULL,
  `user_attachsig` tinyint(1) DEFAULT NULL,
  `user_allowhtml` tinyint(1) DEFAULT '1',
  `user_allowbbcode` tinyint(1) DEFAULT '1',
  `user_allowsmile` tinyint(1) DEFAULT '1',
  `user_allowavatar` tinyint(1) NOT NULL DEFAULT '1',
  `user_allow_pm` tinyint(1) NOT NULL DEFAULT '1',
  `user_allow_viewonline` tinyint(1) NOT NULL DEFAULT '1',
  `user_notify` tinyint(1) NOT NULL DEFAULT '1',
  `user_notify_pm` tinyint(1) NOT NULL DEFAULT '0',
  `user_popup_pm` tinyint(1) NOT NULL DEFAULT '0',
  `user_rank` int(11) DEFAULT '0',
  `user_avatar` varchar(100) DEFAULT NULL,
  `user_avatar_type` tinyint(4) NOT NULL DEFAULT '0',
  `user_email` varchar(255) DEFAULT NULL,
  `user_icq` varchar(15) DEFAULT NULL,
  `user_website` varchar(100) DEFAULT NULL,
  `user_from` varchar(100) DEFAULT NULL,
  `user_sig` text,
  `user_sig_bbcode_uid` char(10) DEFAULT NULL,
  `user_aim` varchar(255) DEFAULT NULL,
  `user_yim` varchar(255) DEFAULT NULL,
  `user_msnm` varchar(255) DEFAULT NULL,
  `user_occ` varchar(100) DEFAULT NULL,
  `user_interests` varchar(255) DEFAULT NULL,
  `user_actkey` varchar(32) DEFAULT NULL,
  `user_newpasswd` varchar(32) DEFAULT NULL,
  `user_color` mediumint(8) NOT NULL DEFAULT '0',
  `user_group_id` mediumint(8) NOT NULL DEFAULT '0',
  `user_qp_settings` varchar(25) NOT NULL DEFAULT '1-0-1-1-1-1',
  `user_birthday` varchar(10) NOT NULL DEFAULT '',
  `user_zodiac` tinyint(2) NOT NULL DEFAULT '0',
  `user_warnings` smallint(5) DEFAULT '0',
  `user_flag` varchar(100) NOT NULL DEFAULT '',
  `user_notify_donation` tinyint(1) NOT NULL,
  `user_points` int(11) NOT NULL,
  `admin_allow_points` tinyint(1) DEFAULT '1',
  `user_inactive_emls` tinyint(1) NOT NULL,
  `user_inactive_last_eml` int(11) NOT NULL,
  `user_colortext` varchar(10) DEFAULT NULL,
  `user_gender` tinyint(4) NOT NULL DEFAULT '0',
  `user_allowdefaultavatar` tinyint(1) NOT NULL DEFAULT '1',
  `user_use_rel_date` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `user_use_rel_time` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `user_unread_topics` text,
  `user_adr_ban` tinyint(1) NOT NULL DEFAULT '0',
  `user_cell_time` int(11) NOT NULL DEFAULT '0',
  `user_cell_time_judgement` int(11) NOT NULL DEFAULT '0',
  `user_cell_caution` int(8) NOT NULL DEFAULT '0',
  `user_cell_sentence` text,
  `user_cell_enable_caution` int(8) NOT NULL DEFAULT '0',
  `user_cell_enable_free` int(8) NOT NULL DEFAULT '0',
  `user_cell_celleds` int(8) NOT NULL DEFAULT '0',
  `user_cell_punishment` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  KEY `user_birthday` (`user_birthday`),
  KEY `user_session_time` (`user_session_time`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_vote_desc`
--

DROP TABLE IF EXISTS `fjr_vote_desc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_vote_desc` (
  `vote_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `topic_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `vote_text` text NOT NULL,
  `vote_start` int(11) NOT NULL DEFAULT '0',
  `vote_length` int(11) NOT NULL DEFAULT '0',
  `vote_max` int(3) NOT NULL DEFAULT '1',
  `vote_voted` int(7) NOT NULL DEFAULT '0',
  `vote_hide` tinyint(1) NOT NULL DEFAULT '0',
  `vote_tothide` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`vote_id`),
  KEY `topic_id` (`topic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_vote_results`
--

DROP TABLE IF EXISTS `fjr_vote_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_vote_results` (
  `vote_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `vote_option_id` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `vote_option_text` varchar(255) NOT NULL,
  `vote_result` int(11) NOT NULL DEFAULT '0',
  KEY `vote_option_id` (`vote_option_id`),
  KEY `vote_id` (`vote_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_vote_voters`
--

DROP TABLE IF EXISTS `fjr_vote_voters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_vote_voters` (
  `vote_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `vote_user_id` mediumint(8) NOT NULL DEFAULT '0',
  `vote_user_ip` char(8) NOT NULL,
  `vote_option_id` mediumint(8) DEFAULT NULL,
  KEY `vote_id` (`vote_id`),
  KEY `vote_user_id` (`vote_user_id`),
  KEY `vote_user_ip` (`vote_user_ip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fjr_words`
--

DROP TABLE IF EXISTS `fjr_words`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fjr_words` (
  `word_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `word` char(100) NOT NULL,
  `replacement` char(100) NOT NULL,
  PRIMARY KEY (`word_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-26 20:07:52
