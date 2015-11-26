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
-- Dumping data for table `fjr_adr_alignments`
--

LOCK TABLES `fjr_adr_alignments` WRITE;
/*!40000 ALTER TABLE `fjr_adr_alignments` DISABLE KEYS */;
INSERT INTO `fjr_adr_alignments` VALUES (1,'Adr_alignment_neutral','Adr_alignment_neutral_desc',0,'Neutral.gif',0,0),(2,'Adr_alignment_evil','Adr_alignment_evil_desc',0,'Evil.gif',1000,2),(3,'Adr_alignment_good','Adr_alignment_good_desc',0,'Good.gif',1000,1);
/*!40000 ALTER TABLE `fjr_adr_alignments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_armour_sets`
--

LOCK TABLES `fjr_adr_armour_sets` WRITE;
/*!40000 ALTER TABLE `fjr_adr_armour_sets` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_armour_sets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_battle_community`
--

LOCK TABLES `fjr_adr_battle_community` WRITE;
/*!40000 ALTER TABLE `fjr_adr_battle_community` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_battle_community` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_battle_list`
--

LOCK TABLES `fjr_adr_battle_list` WRITE;
/*!40000 ALTER TABLE `fjr_adr_battle_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_battle_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_battle_monsters`
--

LOCK TABLES `fjr_adr_battle_monsters` WRITE;
/*!40000 ALTER TABLE `fjr_adr_battle_monsters` DISABLE KEYS */;
INSERT INTO `fjr_adr_battle_monsters` VALUES (1338,'torch eye','torch eye.gif',1,12,24,25,1,'a magical spell',7,9,1,3,21,6,'',0,0,'',0,0,0,0,'',0,0,0,0,0,0,0);
/*!40000 ALTER TABLE `fjr_adr_battle_monsters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_battle_pvp`
--

LOCK TABLES `fjr_adr_battle_pvp` WRITE;
/*!40000 ALTER TABLE `fjr_adr_battle_pvp` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_battle_pvp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_beggar_donations`
--

LOCK TABLES `fjr_adr_beggar_donations` WRITE;
/*!40000 ALTER TABLE `fjr_adr_beggar_donations` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_beggar_donations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_beggar_tracker`
--

LOCK TABLES `fjr_adr_beggar_tracker` WRITE;
/*!40000 ALTER TABLE `fjr_adr_beggar_tracker` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_beggar_tracker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_bug_fix`
--

LOCK TABLES `fjr_adr_bug_fix` WRITE;
/*!40000 ALTER TABLE `fjr_adr_bug_fix` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_bug_fix` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_cauldron_pack`
--

LOCK TABLES `fjr_adr_cauldron_pack` WRITE;
/*!40000 ALTER TABLE `fjr_adr_cauldron_pack` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_cauldron_pack` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_character_quest_log`
--

LOCK TABLES `fjr_adr_character_quest_log` WRITE;
/*!40000 ALTER TABLE `fjr_adr_character_quest_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_character_quest_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_character_quest_log_history`
--

LOCK TABLES `fjr_adr_character_quest_log_history` WRITE;
/*!40000 ALTER TABLE `fjr_adr_character_quest_log_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_character_quest_log_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_characters`
--

LOCK TABLES `fjr_adr_characters` WRITE;
/*!40000 ALTER TABLE `fjr_adr_characters` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_characters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_cheat_log`
--

LOCK TABLES `fjr_adr_cheat_log` WRITE;
/*!40000 ALTER TABLE `fjr_adr_cheat_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_cheat_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_clans`
--

LOCK TABLES `fjr_adr_clans` WRITE;
/*!40000 ALTER TABLE `fjr_adr_clans` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_clans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_clans_news`
--

LOCK TABLES `fjr_adr_clans_news` WRITE;
/*!40000 ALTER TABLE `fjr_adr_clans_news` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_clans_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_clans_shouts`
--

LOCK TABLES `fjr_adr_clans_shouts` WRITE;
/*!40000 ALTER TABLE `fjr_adr_clans_shouts` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_clans_shouts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_classes`
--

LOCK TABLES `fjr_adr_classes` WRITE;
/*!40000 ALTER TABLE `fjr_adr_classes` DISABLE KEYS */;
INSERT INTO `fjr_adr_classes` VALUES (1,'Anti Paladin','Defeats Paladins',0,'Anti Paladin.gif',0,0,0,0,0,0,12,1,10,12,2,1,2000,0,0,1,0,0);
/*!40000 ALTER TABLE `fjr_adr_classes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_create_exploit_fix`
--

LOCK TABLES `fjr_adr_create_exploit_fix` WRITE;
/*!40000 ALTER TABLE `fjr_adr_create_exploit_fix` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_create_exploit_fix` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_elements`
--

LOCK TABLES `fjr_adr_elements` WRITE;
/*!40000 ALTER TABLE `fjr_adr_elements` DISABLE KEYS */;
INSERT INTO `fjr_adr_elements` VALUES (1,'Adr_element_water','Adr_element_water_desc',0,'Water.gif',10,10,10,10,30,30,4,100,100,4,100,0,0,1,1,1,1,1,1,'',0),(2,'Adr_element_earth','Adr_element_earth_desc',0,'Earth.gif',30,30,10,10,10,10,6,100,100,6,100,0,0,1,1,1,1,1,1,'',0),(3,'Adr_element_holy','Adr_element_holy_desc',2,'Holy.gif',20,20,20,20,20,20,7,100,100,7,100,0,0,1,1,1,1,1,1,'',0),(4,'Adr_element_fire','Adr_element_fire_desc',0,'Fire.gif',15,15,40,10,10,10,1,100,100,1,100,0,0,1,1,1,1,1,1,'',0),(5,'Unholy','Element Unholy',1,'Unholy.gif',30,30,30,30,30,30,3,100,100,3,100,0,0,1,1,1,1,1,1,'',0),(6,'Air','Element Air',0,'Wind.gif',10,10,10,40,15,15,2,100,100,2,100,0,0,1,1,1,1,1,1,'',0);
/*!40000 ALTER TABLE `fjr_adr_elements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_general`
--

LOCK TABLES `fjr_adr_general` WRITE;
/*!40000 ALTER TABLE `fjr_adr_general` DISABLE KEYS */;
INSERT INTO `fjr_adr_general` VALUES ('Adr_allow_retire_character',1),('Adr_character_battle_limit',30),('Adr_character_event_limit',40),('Adr_character_limit_enable',0),('Adr_character_skill_limit',20),('Adr_character_thief_limit',5),('Adr_character_trading_limit',100),('Adr_disable_rpg',0),('Adr_event_limit_enable',0),('Adr_karma_enable',0),('Adr_karma_give_bonus',0),('Adr_karma_min',0),('Adr_karma_shop_owner_bonus',0),('Adr_karma_trading_bonus',0),('Adr_limit_regen_duration',1),('Adr_minimum_retire_level',8),('Adr_retire_points_award',5000),('Adr_retire_points_award_level',1000),('Adr_shop_steal_min_lvl',5),('Adr_shop_steal_sell',1),('Adr_shop_steal_show',0),('allow_character_delete',1),('allow_reroll',1),('allow_shop_steal',1),('battle_base_exp_max',200),('battle_base_exp_min',1),('battle_base_exp_modifier',100),('battle_base_reward_max',200),('battle_base_reward_min',1),('battle_base_reward_modifier',100),('battle_base_sp_modifier',120),('battle_calc_type',1),('battle_enable',1),('battle_monster_stats_modifier',120),('battle_pvp_defies_max',5),('battle_pvp_enable',1),('beggar_chance_increase',100),('beggar_min_donation',5),('beggar_super_rare_amount',5000),('beggar_total_donations',64793),('beggar_win_chance',90),('cell_allow_user_blank',1),('cell_allow_user_caution',1),('cell_allow_user_judge',1),('cell_amount_user_blank',10000),('cell_user_judge_posts',2),('cell_user_judge_voters',10),('event_hi',0),('interests_rate',4),('interests_time',432000),('item_modifier_power',150),('item_power_level',1),('job_salary_cron_last_time',1104681333),('job_salary_cron_time',1),('job_salary_enable',1),('lake_chance_increase',500),('lake_min_donation',5),('lake_super_rare_amount',5000),('lake_total_donations',2181),('lake_win_chance',90),('last_character_replen',0),('loan_interests',8),('loan_interests_time',432000),('loan_max_sum',5000),('loan_requirements',0),('max_characteristic',20),('min_characteristic',6),('new_shop_price',500),('next_level_penalty',10),('npc_button_link',1),('npc_display_enable',1),('npc_display_text',1),('npc_image_count',10),('npc_image_link',1),('npc_image_size',75),('posts_enable',0),('posts_min',0),('pvp_base_exp_max',500),('pvp_base_exp_min',1),('pvp_base_exp_modifier',150),('pvp_base_reward_max',100),('pvp_base_reward_min',50),('pvp_base_reward_modifier',150),('shield_bonus',10),('skill_thief_failure_damage',2000),('skill_thief_failure_punishment',2),('skill_thief_failure_time',6),('skill_thief_failure_type',2),('skill_trading_power',2),('spell_enable_pm',1),('stock_max_change',15),('stock_min_change',0),('temple_chance_increase',500),('temple_heal_cost',5),('temple_min_donation',5),('temple_resurrect_cost',25),('temple_super_rare_amount',10000),('temple_total_donations',387896),('temple_win_chance',90),('training_allow_change',1),('training_change_cost',100),('training_charac_cost',10),('training_skill_cost',5),('training_upgrade_cost',10000),('vault_enable',1),('vault_loan_enable',1),('weapon_prof',100),('weight_enable',1);
/*!40000 ALTER TABLE `fjr_adr_general` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_jail_users`
--

LOCK TABLES `fjr_adr_jail_users` WRITE;
/*!40000 ALTER TABLE `fjr_adr_jail_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_jail_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_jail_votes`
--

LOCK TABLES `fjr_adr_jail_votes` WRITE;
/*!40000 ALTER TABLE `fjr_adr_jail_votes` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_jail_votes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_jobs`
--

LOCK TABLES `fjr_adr_jobs` WRITE;
/*!40000 ALTER TABLE `fjr_adr_jobs` DISABLE KEYS */;
INSERT INTO `fjr_adr_jobs` VALUES (1,'Town Cryer','Notify the town of latest events',0,0,0,1,0,'town_cryer.gif',500,300,717,3,5,7,75,1),(2,'Priest','Spread the word of God throughout your town',0,0,0,2,0,'priest.gif',600,400,735,3,3,7,100,1),(3,'Miners Guide','Guide people thrugh the mines',0,7,0,1,0,'Dwarf.gif',600,400,0,1,1,7,75,1),(4,'Prison Guard','Guard the prison',0,3,0,5,0,'Half-orc.gif',1000,700,712,2,2,7,100,1),(5,'Bank Guard','Guard the Bank',0,0,0,6,0,'Super Guard.gif',1100,800,36,2,2,7,100,1),(6,'Town Harlet','Your the town harlet',9,0,0,1,0,'servant.gif',500,300,0,1,1,7,75,1),(7,'King','You rule the Kingdom',0,0,0,12,0,'King.gif',2500,1500,309,1,1,7,175,1),(8,'Town Guard','Walk the town guarding people',0,0,0,3,0,'Super Guard.gif',700,450,659,5,5,7,100,1),(9,'Town Freak','Your the town freak!!',0,0,0,1,0,'sea creater.gif',520,320,42,0,1,7,75,1),(10,'Assasin','Work for the Thieves guild',0,0,0,7,0,'assassin.gif',1300,900,717,2,2,7,100,1),(11,'Court Jester','Court Jester',0,0,0,3,0,'jester.gif',700,450,42,1,1,7,100,1),(12,'Town Bully','Kick everyone ass',0,0,0,7,0,'bully.gif',1250,850,152,1,1,7,100,1),(13,'Temple Priestess','You work in the temple',20,0,0,1,0,'raceimage1.gif',600,400,0,1,1,7,100,1),(14,'Temple Priest','You work in the temple',8,0,0,1,0,'highpriest.gif',600,400,0,1,1,7,100,1),(15,'Body Guard','Rich Merchant looking for a body guard',0,0,0,2,0,'guard1.gif',600,420,73,1,2,7,95,1),(16,'Town Duke','A Town Noble',0,0,0,8,0,'male elf.gif',1400,990,0,1,2,7,100,1),(17,'Servant','You serve a town Noble',0,0,0,1,0,'peasent.gif',500,300,735,4,5,7,75,1),(18,'Soul Catcher','Vampire needed for soul catching',0,9,0,1,0,'vampire.gif',750,550,719,1,1,7,100,1),(19,'Treasure Hunting','Hunt for the Undead Gauntlets',0,0,0,1,0,'terra-seed_0.gif',500,500,3214,1,1,30,100,1),(20,'Town Banker','You work at the bank',0,0,0,3,0,'sephiroth_0.gif',650,450,726,1,2,7,100,1);
/*!40000 ALTER TABLE `fjr_adr_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_lake_donations`
--

LOCK TABLES `fjr_adr_lake_donations` WRITE;
/*!40000 ALTER TABLE `fjr_adr_lake_donations` DISABLE KEYS */;
INSERT INTO `fjr_adr_lake_donations` VALUES (1,0,1,6601,6,3,150,150,'Sword/Bastard Sword.gif','Sword of Wounding','A Gift From The Lady Of The Lake',6,50,6,3,3,1,200,50,100,10),(2,1,1,9900,6,5,200,200,'Sword/Holy Sword.gif','Sword of Holy Might','A Gift From The Lady Of The Lake',6,50,10,5,3,3,200,50,100,10),(3,2,1,14851,6,8,200,200,'Sword/Fire Sword.gif','Sword of Hellfire','A Gift From The Lady Of The Lake',6,50,16,8,3,4,200,50,100,10),(4,3,1,19800,6,11,325,325,'Sword/Long Sword.gif','Sword of Crushing','A Gift From The Lady Of The Lake',6,50,22,11,3,2,200,50,100,10),(5,4,1,26401,6,15,425,425,'Sword/Dragon Sword.gif','Sword of Destruction','A Gift From The Lady Of The Lake',6,50,30,15,3,5,200,50,100,10);
/*!40000 ALTER TABLE `fjr_adr_lake_donations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_lake_tracker`
--

LOCK TABLES `fjr_adr_lake_tracker` WRITE;
/*!40000 ALTER TABLE `fjr_adr_lake_tracker` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_lake_tracker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_library`
--

LOCK TABLES `fjr_adr_library` WRITE;
/*!40000 ALTER TABLE `fjr_adr_library` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_library` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_library_learned`
--

LOCK TABLES `fjr_adr_library_learned` WRITE;
/*!40000 ALTER TABLE `fjr_adr_library_learned` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_library_learned` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_loottables`
--

LOCK TABLES `fjr_adr_loottables` WRITE;
/*!40000 ALTER TABLE `fjr_adr_loottables` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_loottables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_npc`
--

LOCK TABLES `fjr_adr_npc` WRITE;
/*!40000 ALTER TABLE `fjr_adr_npc` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_npc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_races`
--

LOCK TABLES `fjr_adr_races` WRITE;
/*!40000 ALTER TABLE `fjr_adr_races` DISABLE KEYS */;
INSERT INTO `fjr_adr_races` VALUES (1,'Adr_race_human','Adr_race_human_desc',0,'Human.gif',0,0,0,0,0,0,5,5,5,5,5,5,0,0,0,0,0,0,0,0,0,0,1000,5,2,'Suzail',0,0,0,0,0,0,0,0,0),(2,'Adr_race_half-elf','Adr_race_half-elf_desc',0,'Half-elf.gif',0,1,0,0,0,1,0,5,0,10,5,10,1,0,1,0,0,0,1,0,0,0,900,5,2,'Suzail',0,0,0,0,0,0,0,0,0),(3,'Orc','Race Orc',0,'Half-orc.gif',2,0,2,0,0,0,15,0,0,0,0,15,0,0,0,2,0,2,0,2,0,0,1500,5,2,'Suzail',0,0,0,0,0,0,0,0,0),(4,'Adr_race_elf','Adr_race_elf_desc',0,'Elf.gif',0,2,0,2,0,0,0,0,5,15,10,0,2,0,2,0,0,0,2,0,0,0,800,5,2,'Suzail',0,0,0,0,0,0,0,0,0);
/*!40000 ALTER TABLE `fjr_adr_races` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_recipebook`
--

LOCK TABLES `fjr_adr_recipebook` WRITE;
/*!40000 ALTER TABLE `fjr_adr_recipebook` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_recipebook` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_shops`
--

LOCK TABLES `fjr_adr_shops` WRITE;
/*!40000 ALTER TABLE `fjr_adr_shops` DISABLE KEYS */;
INSERT INTO `fjr_adr_shops` VALUES (1,1,'Adr_shop_forums','Adr_shop_forums_desc','',0),(4,445,'Enchanter\'s Tower:  Requests accepted by PM','Selling a few weakly (+3-9) enchanted items.  PM me with requests for more powerful items.  Prices will go down if stuff sells!','',0),(8,478,'Agouti\'s Emporium','various curios are sold here(swords, armor, and other interesting artifacts)','',0);
/*!40000 ALTER TABLE `fjr_adr_shops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_shops_items`
--

LOCK TABLES `fjr_adr_shops_items` WRITE;
/*!40000 ALTER TABLE `fjr_adr_shops_items` DISABLE KEYS */;
INSERT INTO `fjr_adr_shops_items` VALUES (513,1,56,3,1,1,1,'Fire Magic.gif','Fire Ball','Fire Ball',11,0,1,4,200,50,100,8,NULL,1,0,0,0,0,0,0,10,0,0,0,'0',0,'0',0,'0',0,'0',0,'0',0,0,0,0,0,0,0,20,2,0,'',0,'',0,0,'','',0,0,0,2,0),(14,1,660,5,2,75,75,'armor/shadow_cloak.gif','Shadow Cloak','Shadow Cloak',7,0,0,0,100,100,100,9,NULL,10,0,0,4,0,0,0,10,0,0,0,'0',0,'0',0,'0',0,'0',0,'0',0,0,0,0,0,0,0,20,2,0,'',0,'',0,0,'','',0,0,0,2,0),(15,1,154,1,6,175,175,'armor/quarter_platemail.gif','Quarter Platemail','Quarter Platemail',7,0,0,0,100,100,100,3,NULL,250,0,0,12,0,0,0,10,0,0,0,'0',0,'0',0,'0',0,'0',0,'0',0,0,0,0,0,0,0,20,2,0,'',0,'',0,0,'','',0,0,0,2,0),(16,1,386,2,6,175,175,'armor/half_platemail.gif','Half Platemail','Half Platemail',7,0,0,0,100,100,100,3,NULL,300,0,0,12,0,0,0,10,0,0,0,'0',0,'0',0,'0',0,'0',0,'0',0,0,0,0,0,0,0,20,2,0,'',0,'',0,0,'','',0,0,0,2,0),(17,1,771,3,6,175,175,'armor/threequarter_platemail.gif','Three Quarter Platemail','Three Quarter Platemail',7,0,0,0,100,100,100,3,NULL,350,0,0,12,0,0,0,10,0,0,0,'0',0,'0',0,'0',0,'0',0,'0',0,0,0,0,0,0,0,20,2,0,'',0,'',0,0,'','',0,0,0,2,0),(20,1,1761,5,7,200,200,'armor/silver_full_plate.gif','Silver Full Plate','Silver Full Plate',7,0,0,0,100,100,100,3,NULL,400,0,0,14,0,0,0,10,0,0,0,'0',0,'0',0,'0',0,'0',0,'0',0,0,0,0,0,0,0,20,2,0,'',0,'',0,0,'','',0,0,0,2,0),(21,1,1232,4,7,200,200,'armor/shadow_full_plate.gif','Shadow Full Plate','Shadow Full Plate',7,0,0,0,100,100,100,3,NULL,400,0,0,14,0,0,0,10,0,0,0,'0',0,'0',0,'0',0,'0',0,'0',0,0,0,0,0,0,0,20,2,0,'',0,'',0,0,'','',0,0,0,2,0),(22,1,441,2,7,200,200,'armor/ruby_full_plate.gif','Ruby Full Plate','Ruby Full Plate',7,0,0,0,100,100,100,3,NULL,400,0,0,14,0,0,0,10,0,0,0,'0',0,'0',0,'0',0,'0',0,'0',0,0,0,0,0,0,0,20,2,0,'',0,'',0,0,'','',0,0,0,2,0),(23,1,2310,6,6,175,175,'armor/saphire_full_plate.gif','Saphire Full Plate','Saphire Full Plate',7,0,0,0,100,100,100,3,NULL,400,0,0,12,0,0,0,10,0,0,0,'0',0,'0',0,'0',0,'0',0,'0',0,0,0,0,0,0,0,20,2,0,'',0,'',0,0,'','',0,0,0,2,0),(24,1,2310,6,6,175,175,'armor/emerald_full_plate.gif','Emerald Full Plate','Emerald Full Plate',7,0,0,0,100,100,100,3,NULL,400,0,0,12,0,0,0,10,0,0,0,'0',0,'0',0,'0',0,'0',0,'0',0,0,0,0,0,0,0,20,2,0,'',0,'',0,0,'','',0,0,0,2,0),(26,1,1981,6,5,150,150,'armor/gold_chest_plate.gif','Gold Chest Plate','Gold Chest Plate',7,0,0,0,100,100,100,3,NULL,300,0,0,10,0,0,0,10,0,0,0,'0',0,'0',0,'0',0,'0',0,'0',0,0,0,0,0,0,0,20,2,0,'',0,'',0,0,'','',0,0,0,2,0),(6765,1,5000,3,1,2,3,'scroll5.gif','Adr_items_scroll_5','Adr_items_scroll_5_desc',4,0,0,0,0,0,0,8,NULL,1,0,0,0,0,0,0,75,0,0,0,'',0,'0',0,'0',0,'0',0,'0',0,0,0,0,0,0,0,20,2,0,'',0,'',0,0,'','',0,0,0,2,0);
/*!40000 ALTER TABLE `fjr_adr_shops_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_shops_items_quality`
--

LOCK TABLES `fjr_adr_shops_items_quality` WRITE;
/*!40000 ALTER TABLE `fjr_adr_shops_items_quality` DISABLE KEYS */;
INSERT INTO `fjr_adr_shops_items_quality` VALUES (0,0,'Adr_dont_care'),(1,20,'Adr_items_quality_very_poor'),(2,50,'Adr_items_quality_poor'),(3,100,'Adr_items_quality_medium'),(4,140,'Adr_items_quality_good'),(5,200,'Adr_items_quality_very_good'),(6,300,'Adr_items_quality_excellent');
/*!40000 ALTER TABLE `fjr_adr_shops_items_quality` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_shops_items_type`
--

LOCK TABLES `fjr_adr_shops_items_type` WRITE;
/*!40000 ALTER TABLE `fjr_adr_shops_items_type` DISABLE KEYS */;
INSERT INTO `fjr_adr_shops_items_type` VALUES (0,0,'Adr_dont_care',1,''),(1,3,'Adr_items_type_raw_materials',1,''),(2,5,'Adr_items_type_rare_raw_materials',1,''),(3,100,'Adr_items_type_tools_pickaxe',1,''),(4,100,'Adr_items_type_tools_magictome',1,''),(5,100,'Adr_items_type_weapon',1,''),(6,1000,'Adr_items_type_enchanted_weapon',1,''),(7,200,'Adr_items_type_armor',1,''),(8,100,'Adr_items_type_buckler',1,''),(9,75,'Adr_items_type_helm',1,''),(10,50,'Adr_items_type_gloves',1,''),(11,50,'Adr_items_type_magic_attack',1,''),(12,50,'Adr_items_type_magic_defend',1,''),(13,7000,'Adr_items_type_amulet',1,''),(14,6000,'Adr_items_type_ring',1,''),(15,20,'Adr_items_type_health_potion',1,''),(16,20,'Adr_items_type_mana_potion',1,''),(17,1,'Adr_items_type_misc',1,''),(18,50,'Adr_items_type_tools_brewing',1,''),(19,50,'Adr_items_type_potion',1,''),(20,50,'Adr_items_type_recipe',1,''),(22,50,'Adr_items_type_tools_needle',1,''),(23,50,'Adr_items_type_clothes',1,''),(24,50,'Adr_items_type_thread',1,''),(25,50,'Adr_items_type_tools_seed',1,''),(26,50,'Adr_items_type_plants',1,''),(27,50,'Adr_items_type_water',1,''),(28,50,'Adr_items_type_tools_hunting',1,''),(29,150,'Adr_items_type_greave',1,''),(30,50,'Adr_items_type_boot',1,''),(31,50,'Adr_items_type_wood',1,''),(32,50,'Adr_items_type_tools_pole',1,''),(33,50,'Adr_items_type_fish',1,''),(34,17,'Adr_items_type_tools_alchemy',1,''),(35,517,'Adr_items_type_alchemy',1,''),(36,150,'Adr_items_type_animals',1,''),(37,50,'Adr_items_type_tools_woodworking',1,''),(40,2000,'Adr_items_type_staff',1,''),(41,2000,'Adr_items_type_dirk',1,''),(42,2000,'Adr_items_type_mace',1,''),(43,2000,'Adr_items_type_ranged',1,''),(44,2000,'Adr_items_type_fist',1,''),(45,2000,'Adr_items_type_axe',1,''),(46,2000,'Adr_items_type_spear',1,''),(55,50,'Adr_items_type_tools_cooking',1,''),(94,50,'Adr_items_type_food',1,''),(95,100,'Adr_items_type_tools_blacksmithing',1,''),(107,1,'Adr_items_type_spell_attack',1,''),(108,1,'Adr_items_type_magic_heal',1,''),(110,50,'Adr_items_type_spell_recipe',1,'');
/*!40000 ALTER TABLE `fjr_adr_shops_items_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_shops_spells`
--

LOCK TABLES `fjr_adr_shops_spells` WRITE;
/*!40000 ALTER TABLE `fjr_adr_shops_spells` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_shops_spells` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_skills`
--

LOCK TABLES `fjr_adr_skills` WRITE;
/*!40000 ALTER TABLE `fjr_adr_skills` DISABLE KEYS */;
INSERT INTO `fjr_adr_skills` VALUES (1,'Adr_mining','Adr_skill_mining_desc','skill_mining.gif',80,1),(2,'Adr_stone','Adr_skill_stone_desc','skill_stone.gif',90,1),(3,'Adr_forge','Adr_skill_forge_desc','skill_forge.gif',35,1),(4,'Adr_enchantment','Adr_skill_enchantment_desc','skill_enchantment.gif',40,1),(5,'Adr_trading','Adr_skill_trading_desc','skill_trading.gif',125,1),(6,'Adr_thief','Adr_skill_thief_desc','skill_thief.gif',25,1),(7,'Adr_brewing','Adr_skill_brewing_desc','skill_brewing.gif',50,5),(8,'Adr_lumberjack','Adr_skill_lumberjack_desc','skill_lumberjack.gif',100,5),(9,'Adr_tailoring','Adr_skill_tailoring_desc','skill_tailoring.gif',100,5),(10,'Adr_herbalism','Adr_skill_herbalism_desc','skill_herbalism.gif',100,5),(11,'Adr_hunting','Adr_skill_hunting_desc','skill_hunting.gif',100,50),(12,'Adr_cooking','Adr_skill_cooking_desc','skill_cooking.gif',50,5),(13,'Adr_blacksmithing','Adr_skill_blacksmithing_desc','skill_blacksmithing.gif',50,5),(14,'Adr_alchemy','Adr_skill_alchemy_desc','skill_alchemy.gif',100,5),(15,'Adr_fishing','Adr_skill_fishing_desc','skill_fishing.gif',100,5);
/*!40000 ALTER TABLE `fjr_adr_skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_stores`
--

LOCK TABLES `fjr_adr_stores` WRITE;
/*!40000 ALTER TABLE `fjr_adr_stores` DISABLE KEYS */;
INSERT INTO `fjr_adr_stores` VALUES (1,'The Bards Shop','For all your Bards needs','Forum.gif',1,0,0,1,'Forum.gif','Is there a particular instrument you prefer?',''),(2,'Admin Only Store','Viewable only by the board admin','',1,0,1,1,'','',''),(3,'The Grey Dwarf\'s Armory','Get your quality armor here.','minning.gif',1,0,0,1,'minning.gif','Armor made in the best Dwarven Forges around.','');
/*!40000 ALTER TABLE `fjr_adr_stores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_stores_stats`
--

LOCK TABLES `fjr_adr_stores_stats` WRITE;
/*!40000 ALTER TABLE `fjr_adr_stores_stats` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_stores_stats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_stores_user_history`
--

LOCK TABLES `fjr_adr_stores_user_history` WRITE;
/*!40000 ALTER TABLE `fjr_adr_stores_user_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_stores_user_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_temple_donations`
--

LOCK TABLES `fjr_adr_temple_donations` WRITE;
/*!40000 ALTER TABLE `fjr_adr_temple_donations` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_temple_donations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_temple_tracker`
--

LOCK TABLES `fjr_adr_temple_tracker` WRITE;
/*!40000 ALTER TABLE `fjr_adr_temple_tracker` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_temple_tracker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_vault_blacklist`
--

LOCK TABLES `fjr_adr_vault_blacklist` WRITE;
/*!40000 ALTER TABLE `fjr_adr_vault_blacklist` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_vault_blacklist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_vault_exchange`
--

LOCK TABLES `fjr_adr_vault_exchange` WRITE;
/*!40000 ALTER TABLE `fjr_adr_vault_exchange` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_vault_exchange` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_vault_exchange_users`
--

LOCK TABLES `fjr_adr_vault_exchange_users` WRITE;
/*!40000 ALTER TABLE `fjr_adr_vault_exchange_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_vault_exchange_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_vault_users`
--

LOCK TABLES `fjr_adr_vault_users` WRITE;
/*!40000 ALTER TABLE `fjr_adr_vault_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_adr_vault_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_zone_buildings`
--

LOCK TABLES `fjr_adr_zone_buildings` WRITE;
/*!40000 ALTER TABLE `fjr_adr_zone_buildings` DISABLE KEYS */;
INSERT INTO `fjr_adr_zone_buildings` VALUES (298,'battlearena_1','','Battle Arena',0,'','adr_battle','',15,1),(300,'Battle2','','Battle Arena 2',0,'','adr_battle','',15,1),(301,'Cauldron','','Magical Cauldron',0,'','adr_cauldron','',2,1),(302,'compass','','Compass1',0,'','','',999,2),(303,'compass2','','Compass2',0,'','','',999,2),(304,'compass3','','Compass3',0,'','','',999,2),(305,'dirt1','','Dirt Patch',0,'','','',999,2),(306,'dragon','','Dragon Image',0,'','','',999,2),(307,'Exit1','','Exit Tower',0,'','index','',25,1),(308,'Forge1','','Forge',0,'','adr_TownMap_forge','',20,1),(309,'Forge2','','Forge 2',0,'','adr_TownMap_forge','',20,1),(310,'hill1','','Hill',0,'','','',999,2),(313,'Info1','','Tower of Knowledge',0,'','adr_library','',5,1),(314,'inn_1','','Village Inn',0,'','adr_guilds','',19,1),(315,'INN2','','Village Inn 2',0,'','adr_guilds','',19,1),(316,'jail1','','Prison',0,'','adr_courthouse','',14,1),(317,'jail2','','Prison 2',0,'','adr_courthouse','',14,1),(318,'magic1','','Tower of Magic',0,'','','',12,2),(319,'magic2','','Tower of Magic 2',0,'','','',10,2),(320,'mine1','','Mines',0,'','adr_mine','',11,2),(321,'mine2','','Mines 2',0,'','','adr_mine',11,2),(322,'mountain1_01','','Mountain-Left Top',0,'','','',999,2),(323,'mountain1_02','','Mountain-Right Top',0,'','','',999,2),(324,'mountain1_03','','Mountain-Left Bottom',0,'','','',999,2),(325,'mountain1_04','','Mountain-Right Bottom',0,'','','',999,2),(329,'shop1','','Shop',0,'','adr_shops','',26,1),(330,'shop2','','Shop 2',0,'','adr_shops','',26,1),(331,'shop3','','Shop 3',0,'','adr_shops','',26,1),(332,'shrub','','Shrubs',0,'','','',999,2),(333,'statue','','Statue',0,'','','',999,2),(335,'Tavern2','','Taverne des guildes #2',0,'','adr_guilds','',0,1),(336,'Temple1','','Temple',0,'','adr_temple','',27,1),(337,'Temple2','','Temple 2',0,'','adr_temple','',27,1),(338,'Tower1','','Tower',0,'','','',999,2),(339,'castle2','','Castle',0,'','','',999,0),(342,'Trees1','','Trees 1',0,'','','',999,2),(343,'Trees2','','Trees 2',0,'','','',999,2),(344,'trees3','','Trees 3',0,'','','',999,2),(299,'bank_1','','Town Bank',0,'','adr_TownMap_Banque','',18,1),(311,'Home1','','Character Home',0,'','adr_TownMap_Maison','',4,1),(312,'Home2','','Character Home 2',0,'','adr_TownMap_Maison','',4,1),(327,'Rune1','','Rune Stone',0,'','adr_TownMap_pierrerunique','',12,1),(334,'Tavern1','','Clans',0,'','adr_clans','',59,1),(340,'Training1','','Training Grounds',0,'','adr_TownMap_Entrainement','',16,1),(341,'Training2','','Training Grounds2',0,'','adr_TownMap_Entrainement','',16,1),(345,'warehouse1','','Character Warehouse',0,'','adr_TownMap_Entrepot','',42,1),(346,'alchemy','','Alchemy',0,'','adr_alchemy','',28,1),(347,'beggar','','Beggar Donation',0,'','adr_beggar','',29,1),(348,'smithy','','Blacksmithing',0,'','adr_blacksmithing','',30,1),(349,'brewing','','Brewing',0,'','adr_brewing','',31,1),(350,'farmhouse','','Cooking',0,'','adr_cooking','',32,1),(351,'enchant','','Enchant',0,'','adr_enchant','',33,1),(352,'fish','','Fishing',0,'','adr_fish','',34,1),(353,'herbal','','Herbalism',0,'','adr_herbal','',35,1),(354,'hunting','','Hunting',0,'','adr_hunting','',36,1),(355,'magic_lake','','Magic Lake',0,'','adr_lake','',37,1),(356,'jobs','','Jobs',0,'','adr_jobs','',38,1),(357,'lumberjack','','Lumberjacking',0,'','adr_lumberjack','',39,1),(358,'party','','Party',0,'','adr_party','',40,1),(359,'tailor','','Tailoring',0,'','adr_tailor','',41,1),(359,'Headquarters','','Headquarters',0,'','adr_clans','',59,1);
/*!40000 ALTER TABLE `fjr_adr_zone_buildings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_zone_maps`
--

LOCK TABLES `fjr_adr_zone_maps` WRITE;
/*!40000 ALTER TABLE `fjr_adr_zone_maps` DISABLE KEYS */;
INSERT INTO `fjr_adr_zone_maps` VALUES (1,1,1,'~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~zone 1~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~Castle~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~'),(2,2,0,'~~~~~~~~~~~~~~Temple~~~Mines~~~~~Town Bank~~~~~~~~~Trees 3~~~Shop~~Battle Arena 2~~~~~Character Warehouse~Trees 2~~Statue~Taverne~~~~~~~Forge~~~~Character Home~~~~~~~~~Pond~Mountain-Left Top~Mountain-Right Top~~~~Trees 1~Village Inn~~~~Mountain-Left Bottom~Mountain-Right Bottom~Magical Cauldron~~~~~~Exit Tower~~Tower of Knowledge~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~');
/*!40000 ALTER TABLE `fjr_adr_zone_maps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_zone_townmaps`
--

LOCK TABLES `fjr_adr_zone_townmaps` WRITE;
/*!40000 ALTER TABLE `fjr_adr_zone_townmaps` DISABLE KEYS */;
INSERT INTO `fjr_adr_zone_townmaps` VALUES (1,'World Map','World.gif',900,44,20,750,45,16,',22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,139,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179,182,183,184,185,186,187,188,189,190,191,192,193,194,195,196,197,198,199,203,204,205,206,207,208,209,210,211,212,213,214,215,216,217,218,219,222,223,224,225,226,227,228,229,230,231,232,233,234,235,236,237,238,239,242,246,247,248,249,250,251,252,253,254,255,256,257,258,259,262,266,267,268,269,270,271,272,273,274,275,276,283,284,292,293,294,295'),(2,'Small Town','ZoneMap_1.gif',484,48,10,470,47,10,',12,13,14,15,16,17,18,22,23,24,25,26,27,28,29,32,33,34,35,36,37,38,39,42,43,44,45,46,47,48,49,52,53,54,55,56,57,58,59,62,63,64,65,66,67,68,69,72,73,74,75,76,77,78,79,85,87,88'),(3,'Champs','ZoneMap_6.gif',484,48,10,470,47,10,',12,13,14,15,16,17,18,19,22,23,24,25,26,27,28,29,32,33,34,35,36,37,38,39,42,43,44,45,46,47,48,49,52,53,54,55,56,57,58,59,62,63,64,65,66,67,68,72,73,74,75,76,77,78,79,82,83,84,85,86,87,88'),(4,'Champs avec pont','ZoneMap_2.gif',484,48,10,470,47,10,',18,19,42,43,52,53,54,58,59,62,63,64,65,66,67,68,69,72,73,74,75,76,77,78,79,82,83,84,85,86,87,88'),(5,'Forêt dense','ZoneMap_4.gif',484,48,10,470,47,10,',12,13,14,15,16,17,18,19,22,23,24,25,26,27,28,29,32,33,34,35,36,37,38,39,42,43,44,45,46,47,48,49,52,53,54,55,56,57,58,59,62,63,64,65,66,67,68,69,72,73,74,75,76,77,78,79,82,83,84,85,86,87,88,89'),(6,'Lopin de terre dans un précipice','ZoneMap_3.gif',382,42,9,476,45,11,',11,12,13,14,15,16,17,20,21,22,23,24,25,26,29,30,31,32,33,34,35,38,39,40,41,42,43,44,47,48,49,50,51,52,53,56,57,58,59,60,61,62,65,66,67,68,69,70,71,74,75,76,77,78,79,80');
/*!40000 ALTER TABLE `fjr_adr_zone_townmaps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_adr_zones`
--

LOCK TABLES `fjr_adr_zones` WRITE;
/*!40000 ALTER TABLE `fjr_adr_zones` DISABLE KEYS */;
INSERT INTO `fjr_adr_zones` VALUES (1,'World Map','Map of the World','World.gif','Earth','0',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','','','',0),(2,'Suzail','Suzail is the royal capital and richest city of the kingdom of Cormyr','cormyr','Feu','0',0,0,0,0,0,0,3,5,0,0,1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,10,20,10,20,20,'','','','','','','','1338',0),(3,'Marsember','Marsember is the second largest city in the kingdom of Cormyr','Marsember','Fire','0',10,10,10,10,10,0,0,0,0,2,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,5,100,2,100,500,'','','','','','','','',5),(4,'Kings Forest','This forest is owned by the crown and is rich in game and wildlife','Kings_Forest','Earth','0',0,0,0,0,0,5,2,0,8,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,1,1,1,1,1,5,50,5,50,80,'','','','','','','','',0),(5,'Eastern Cormyr Crossroads','Eastern Cormyr crossroads','Cormyr_Crossroads','Earth','0',0,0,50,0,0,4,0,8,3,2,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,5,100,5,100,80,'','','','','','','','',0),(6,'Arabel','Arabel is a fortified city with though it has mant posts for tradeing','Arabel','Holy','0',0,0,0,0,0,2,1,0,3,7,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,0,0,0,1,1,5,100,5,100,80,'','','','','','','','',0),(7,'Tilverton','Tilverton is a small city and is in a strategic location for the kingdom of Cormyr','Tilverton','Unholy','0',0,0,0,0,0,1,2,0,0,0,0,1,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,5,100,5,100,50,'','','','','','','','',0),(8,'Hullack Forest','One of the large remaining shards of the great woods that was Cormanthor.','Hullack_Forest','Air','0',0,0,0,0,0,1,0,0,3,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,5,50,5,50,10,'','','','','','','','',0);
/*!40000 ALTER TABLE `fjr_adr_zones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_announcement_centre`
--

LOCK TABLES `fjr_announcement_centre` WRITE;
/*!40000 ALTER TABLE `fjr_announcement_centre` DISABLE KEYS */;
INSERT INTO `fjr_announcement_centre` VALUES ('announcement_access','1'),('announcement_forum_id',''),('announcement_forum_topic_first_latest','1'),('announcement_guest_status','1'),('announcement_guest_text','[size=18][color=blue][b]Changez votre annonce pour les invites via votre panneau d\'administration.   :) [/b][/color][/size]'),('announcement_guest_title','Annonce du site pour les invités'),('announcement_mod_version','v1.2.3'),('announcement_status','1'),('announcement_text','[size=18][color=red][b]Changez votre annonce de site via votre panneau d\'administration.   :) [/b][/color][/size]'),('announcement_text_draft','[size=18][color=red][b]Prévisualisation dans l\'ACP   :) [/b][/color][/size]'),('announcement_title','Annonce du site'),('announcement_topic_id','');
/*!40000 ALTER TABLE `fjr_announcement_centre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_areabb_blocs`
--

LOCK TABLES `fjr_areabb_blocs` WRITE;
/*!40000 ALTER TABLE `fjr_areabb_blocs` DISABLE KEYS */;
INSERT INTO `fjr_areabb_blocs` VALUES (1,1,6,'PHP'),(2,1,2,'PHP'),(3,1,7,'PHP'),(4,1,0,''),(5,1,0,''),(6,1,3,'PHP'),(7,1,4,'PHP'),(8,1,5,'PHP'),(9,1,0,''),(10,1,0,''),(11,1,0,''),(12,2,2,'PHP'),(13,2,4,'PHP'),(14,2,6,'PHP'),(15,2,5,'PHP'),(16,2,7,'PHP'),(17,2,0,''),(18,2,0,''),(19,2,0,''),(20,2,0,''),(21,2,0,''),(22,2,0,''),(23,3,2,'PHP'),(24,3,9,'PHP'),(25,3,0,''),(76,16,25,'PHP'),(77,16,7,'PHP'),(78,16,24,'PHP'),(79,16,5,'PHP'),(80,16,19,'PHP'),(81,16,16,'PHP'),(82,16,0,''),(83,16,0,''),(84,16,4,'PHP'),(85,16,26,'PHP'),(86,16,18,'PHP'),(98,18,7,'PHP'),(99,18,17,'PHP'),(100,18,6,'PHP'),(101,18,23,'PHP'),(102,18,24,'PHP'),(103,18,3,'PHP'),(104,18,4,'PHP'),(105,18,18,'PHP'),(106,18,5,'PHP'),(107,18,19,'PHP'),(108,18,0,''),(109,19,19,'PHP'),(110,19,9,'PHP'),(111,19,21,'PHP'),(112,20,22,'PHP'),(113,20,20,'PHP'),(114,20,24,'PHP'),(118,22,0,''),(119,22,25,'PHP'),(120,22,0,'');
/*!40000 ALTER TABLE `fjr_areabb_blocs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_areabb_blocs_html`
--

LOCK TABLES `fjr_areabb_blocs_html` WRITE;
/*!40000 ALTER TABLE `fjr_areabb_blocs_html` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_areabb_blocs_html` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_areabb_categories`
--

LOCK TABLES `fjr_areabb_categories` WRITE;
/*!40000 ALTER TABLE `fjr_areabb_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_areabb_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_areabb_config`
--

LOCK TABLES `fjr_areabb_config` WRITE;
/*!40000 ALTER TABLE `fjr_areabb_config` DISABLE KEYS */;
INSERT INTO `fjr_areabb_config` VALUES ('affichage_categorie','2'),('affichage_icone','1'),('affichage_jeux','2'),('affichage_nbre_jeux','1'),('arcade_par_defaut','5'),('auth_dwld','1'),('avoir_poste_joue','1'),('chemin_pkg_jeux','areabb/games/'),('defiler_topics_recents','1'),('format_pag','0'),('forum_presente','7'),('games_par_defaut','6'),('games_par_page','8'),('games_time_tolerance','4'),('game_order','News'),('game_popup','0'),('group_vip','0'),('liens_aleatoire','0'),('liens_cache','1'),('liens_nbre_liens','0'),('liens_scroll','1'),('mod_gender','1'),('mod_point_system','1'),('mod_profile','1'),('mod_rcs','1'),('nbre_topics_min','10'),('nbre_topics_recents','10'),('news_aff_asv','1'),('news_aff_coms','1'),('news_aff_icone','1'),('news_forums','207'),('news_nbre_coms','20'),('news_nbre_mots','500'),('news_nbre_news','3'),('news_par_defaut','7'),('nom_group_vip','0'),('presente','1');
/*!40000 ALTER TABLE `fjr_areabb_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_areabb_feuille`
--

LOCK TABLES `fjr_areabb_feuille` WRITE;
/*!40000 ALTER TABLE `fjr_areabb_feuille` DISABLE KEYS */;
INSERT INTO `fjr_areabb_feuille` VALUES (16,5,3,12),(18,7,3,14),(19,6,1,15),(20,6,1,16);
/*!40000 ALTER TABLE `fjr_areabb_feuille` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_areabb_games`
--

LOCK TABLES `fjr_areabb_games` WRITE;
/*!40000 ALTER TABLE `fjr_areabb_games` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_areabb_games` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_areabb_hackgame`
--

LOCK TABLES `fjr_areabb_hackgame` WRITE;
/*!40000 ALTER TABLE `fjr_areabb_hackgame` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_areabb_hackgame` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_areabb_liens`
--

LOCK TABLES `fjr_areabb_liens` WRITE;
/*!40000 ALTER TABLE `fjr_areabb_liens` DISABLE KEYS */;
INSERT INTO `fjr_areabb_liens` VALUES (2,'EzCom','http://ezcom-fr.com',10,'http://www.ezcom-fr.com/styles/procss3/imageset/site_logo.png');
/*!40000 ALTER TABLE `fjr_areabb_liens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_areabb_modeles`
--

LOCK TABLES `fjr_areabb_modeles` WRITE;
/*!40000 ALTER TABLE `fjr_areabb_modeles` DISABLE KEYS */;
INSERT INTO `fjr_areabb_modeles` VALUES (1,'<table width=\'100%\' cellspacing=\'0\' cellpadding=\'2\' border=\'0\' align=\'center\' valign=\'top\'>\r\n<tr>\r\n      <td width=\'28%\' align=\'center\' valign=\'top\'>%s</td>\r\n      <td width=\'44%\' align=\'center\' valign=\'top\'><center>%s</center></td>\r\n      <td width=\'28%\' align=\'center\' valign=\'top\'>%s</td>\r\n</tr>\r\n</table>','3 colonnes, le bloc central est 2 fois plus large que les autres'),(2,'<table width=\'100%\'>\r\n   <tr>\r\n      <td class=\'row1\'>%s</td>\r\n   </tr>\r\n</table>','Bloc 100% de la largeur'),(3,'<table width=\'100%\' cellspacing=\'0\' cellpadding=\'2\' border=\'0\' align=\'center\' valign=\'top\'>\r\n<tr>\r\n    <td width=\'22%\' align=\'center\' valign=\'top\'>\r\n         %s \r\n         %s \r\n         %s \r\n         %s \r\n         %s \r\n      </td>\r\n      <td width=\'56%\' align=\'center\' valign=\'top\'>%s</td>\r\n      <td width=\'22%\' align=\'center\' valign=\'top\'>\r\n         %s \r\n         %s \r\n         %s \r\n         %s \r\n         %s \r\n       </td>\r\n</tr>\r\n</table>','Structure traditionnelle');
/*!40000 ALTER TABLE `fjr_areabb_modeles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_areabb_mods`
--

LOCK TABLES `fjr_areabb_mods` WRITE;
/*!40000 ALTER TABLE `fjr_areabb_mods` DISABLE KEYS */;
INSERT INTO `fjr_areabb_mods` VALUES (1,'config',0,'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30'),(2,'login',1,'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30'),(3,'news',1,'3'),(4,'recent_topics',1,'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30'),(5,'whoisonline',1,'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30'),(6,'welcome',1,'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30'),(7,'statistiques',1,'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30'),(8,'profile',0,'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30'),(9,'games',1,'2'),(16,'liste_jeux_SP2',1,'1'),(17,'liens',1,'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30'),(18,'changestyle',1,'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30'),(19,'classvictoire',1,'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30'),(20,'podium_jeu',1,'2'),(21,'fiche_jeux',1,'2'),(22,'classement_jeu',1,'2'),(23,'sondage',1,'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30'),(24,'qui_joue',1,'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30'),(25,'aleatoire',1,'1,2'),(26,'menu_SP1',1,'1');
/*!40000 ALTER TABLE `fjr_areabb_mods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_areabb_note`
--

LOCK TABLES `fjr_areabb_note` WRITE;
/*!40000 ALTER TABLE `fjr_areabb_note` DISABLE KEYS */;
INSERT INTO `fjr_areabb_note` VALUES (4,342,5),(6,868,5),(3,868,4),(7,446,4),(4,446,5),(24,2,2),(19,2,5),(26,443,4),(27,579,2),(37,662,5),(44,730,3),(39,446,2),(30,2,5),(85,367,5),(24,868,4),(46,868,0),(14,868,5),(39,2,3),(72,2,3);
/*!40000 ALTER TABLE `fjr_areabb_note` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_areabb_scores`
--

LOCK TABLES `fjr_areabb_scores` WRITE;
/*!40000 ALTER TABLE `fjr_areabb_scores` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_areabb_scores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_areabb_squelette`
--

LOCK TABLES `fjr_areabb_squelette` WRITE;
/*!40000 ALTER TABLE `fjr_areabb_squelette` DISABLE KEYS */;
INSERT INTO `fjr_areabb_squelette` VALUES (5,'Salle de jeux','',1,0),(6,'Parties engagées','826',2,0),(7,'Les News',NULL,3,0);
/*!40000 ALTER TABLE `fjr_areabb_squelette` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_attach_quota`
--

LOCK TABLES `fjr_attach_quota` WRITE;
/*!40000 ALTER TABLE `fjr_attach_quota` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_attach_quota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_attachments`
--

LOCK TABLES `fjr_attachments` WRITE;
/*!40000 ALTER TABLE `fjr_attachments` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_attachments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_attachments_config`
--

LOCK TABLES `fjr_attachments_config` WRITE;
/*!40000 ALTER TABLE `fjr_attachments_config` DISABLE KEYS */;
INSERT INTO `fjr_attachments_config` VALUES ('allow_ftp_upload','0'),('allow_pm_attach','1'),('attachment_quota','52428800'),('attachment_topic_review','0'),('attach_version','2.4.5'),('default_pm_quota','0'),('default_upload_quota','0'),('disable_mod','0'),('display_order','0'),('download_path',''),('flash_autoplay','0'),('ftp_pass',''),('ftp_pasv_mode','1'),('ftp_path',''),('ftp_server',''),('ftp_user',''),('img_create_thumbnail','0'),('img_display_inlined','1'),('img_imagick',''),('img_link_height','0'),('img_link_width','0'),('img_max_height','0'),('img_max_thumb_size','400'),('img_max_width','0'),('img_min_thumb_filesize','12000'),('img_thumb_quality','90'),('max_attachments','3'),('max_attachments_pm','1'),('max_filesize','262144'),('max_filesize_pm','262144'),('show_apcp','0'),('topic_icon','images/icon_clip.gif'),('upload_dir','files'),('upload_img','images/icon_clip.gif'),('use_gd2','0'),('wma_autoplay','0');
/*!40000 ALTER TABLE `fjr_attachments_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_attachments_desc`
--

LOCK TABLES `fjr_attachments_desc` WRITE;
/*!40000 ALTER TABLE `fjr_attachments_desc` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_attachments_desc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_attributes`
--

LOCK TABLES `fjr_attributes` WRITE;
/*!40000 ALTER TABLE `fjr_attributes` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_attributes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_auth_access`
--

LOCK TABLES `fjr_auth_access` WRITE;
/*!40000 ALTER TABLE `fjr_auth_access` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_auth_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_banlist`
--

LOCK TABLES `fjr_banlist` WRITE;
/*!40000 ALTER TABLE `fjr_banlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_banlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_bbc_box`
--

LOCK TABLES `fjr_bbc_box` WRITE;
/*!40000 ALTER TABLE `fjr_bbc_box` DISABLE KEYS */;
INSERT INTO `fjr_bbc_box` VALUES (1,'strike','1','0','s','s','strike','strike','0',30),(2,'spoiler','1','0','spoil','spoil','spoiler','spoiler','0',40),(3,'fade','1','0','fade','fade','fade','fade','0',50),(4,'rainbow','1','0','rainbow','rainbow','rainbow','rainbow','0',60),(5,'justify','1','0','align=justify','align','justify','justify','0',70),(6,'right','1','0','align=right','align','right','right','0',80),(7,'center','1','0','align=center','align','center','center','0',90),(8,'left','1','0','align=left','align','left','left','0',100),(9,'link','1','0','link=','link','link','alink','0',110),(10,'target','1','0','target=','target','target','atarget','0',120),(11,'marqd','1','0','marq=down','marq','marqd','marqd','0',130),(12,'marqu','1','0','marq=up','marq','marqu','marqu','0',140),(13,'marql','1','0','marq=left','marq','marql','marql','0',150),(14,'marqr','1','0','marq=right','marq','marqr','marqr','0',160),(15,'email','1','0','email','email','email','email','0',170),(16,'flash','1','0','flash width=250 height=250','flash','flash','flash','0',180),(17,'video','1','0','video width=400 height=350','video','video','video','0',190),(18,'stream','1','0','stream','stream','stream','stream','0',200),(19,'real','1','0','ram width=220 height=140','ram','real','real','0',210),(20,'quick','1','0','quick width=480 height=224','quick','quick','quick','0',220),(21,'sup','1','0','sup','sup','sup','sup','0',230),(22,'sub','1','0','sub','sub','sub','sub','0',240),(23,'hide','1','0','hide','hide','hide','hide','0',10),(24,'tmb','1','0','tmb','tmb','tmb','tmb','0',20),(25,'youtube','1','0','youtube','youtube','youtube','youtube','0',250),(26,'website','1','0','website','website','website','website','0',260),(27,'google','1','0','GVideo','GVideo','google','google','0',270),(28,'dailymotion','1','0','dailymotion','dailymotion','dailymotion','dailymotion','0',280),(29,'titre 1','1','0','titre1','titre1','titre1','titre1','0',290),(30,'movie','1','0','movie','movie','movie','movie','0',300),(31,'play','1','0','play','play','play','play','0',310);
/*!40000 ALTER TABLE `fjr_bbc_box` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_categories`
--

LOCK TABLES `fjr_categories` WRITE;
/*!40000 ALTER TABLE `fjr_categories` DISABLE KEYS */;
INSERT INTO `fjr_categories` VALUES (1,'Catégorie Test 1',10);
/*!40000 ALTER TABLE `fjr_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_clicks`
--

LOCK TABLES `fjr_clicks` WRITE;
/*!40000 ALTER TABLE `fjr_clicks` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_clicks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_config`
--

LOCK TABLES `fjr_config` WRITE;
/*!40000 ALTER TABLE `fjr_config` DISABLE KEYS */;
INSERT INTO `fjr_config` VALUES ('account_delete','1'),('admin_login','1'),('Adr_character_age','16'),('Adr_character_sp_enable','0'),('Adr_experience_for_edit','1'),('Adr_experience_for_new','10'),('Adr_experience_for_reply','5'),('adr_length_time','10800'),('Adr_profile_display','1'),('adr_seasons','1'),('adr_seasons_last_time','1448564545'),('adr_seasons_time','86400'),('Adr_shop_duration','1'),('Adr_shop_tax','10'),('Adr_skill_sp_enable','0'),('Adr_thief_enable','0'),('Adr_thief_points','5'),('adr_time','1'),('adr_time_last_time','1448564545'),('Adr_time_start','time()'),('Adr_topics_display','1-1-0-0-0-1'),('Adr_version','0.4.5'),('Adr_warehouse_duration','1'),('Adr_warehouse_tax','10'),('adr_world_map','0'),('Adr_zone_picture_link','1'),('Adr_zone_townmap_display_required','1'),('Adr_zone_townmap_enable','1'),('Adr_zone_townmap_name',''),('Adr_zone_worldmap_zone','1'),('allow_autologin','1'),('allow_avatar_local','0'),('allow_avatar_remote','0'),('allow_avatar_upload','0'),('allow_bbcode','1'),('allow_colortext','1'),('allow_html','0'),('allow_html_tags','b,i,u,pre'),('allow_namechange','0'),('allow_sig','1'),('allow_smilies','1'),('allow_theme_create','0'),('anons_qp_settings','1-0-1-1-1-1'),('AreaBB_version','0.9.1'),('avatar_filesize','6144'),('avatar_gallery_path','images/avatars/gallery'),('avatar_max_height','80'),('avatar_max_width','80'),('avatar_path','images/avatars'),('bbc_advanced','0'),('bbc_box_on','1'),('bbc_per_row','14'),('bbc_style_path','default'),('bbc_time_regen','0'),('bday_lock','0'),('bday_lookahead','7'),('bday_max','100'),('bday_min','5'),('bday_require','0'),('bday_show','1'),('bday_wishes','1'),('bday_zodiac','0'),('bluecard_limit','3'),('bluecard_limit_2','1'),('board_disable','0'),('board_disable_mode','-1,0'),('board_disable_msg',''),('board_email','lesanglierdesardennes@gmail.com'),('board_email_form','0'),('board_email_sig','Merci et @ bientôt !'),('board_startdate','1448564415'),('board_timezone','0'),('cache_rcs','0'),('config_id','1'),('cookie_domain',''),('cookie_name','phpbb2mysql'),('cookie_path','/'),('cookie_secure','0'),('coppa_fax',''),('coppa_mail',''),('dbmtnc_disallow_postcounter','0'),('dbmtnc_disallow_rebuild','0'),('dbmtnc_rebuildcfg_maxmemory','500'),('dbmtnc_rebuildcfg_minposts','3'),('dbmtnc_rebuildcfg_php3only','0'),('dbmtnc_rebuildcfg_php3pps','1'),('dbmtnc_rebuildcfg_php4pps','8'),('dbmtnc_rebuildcfg_timelimit','240'),('dbmtnc_rebuildcfg_timeoverwrite','0'),('dbmtnc_rebuild_end','0'),('dbmtnc_rebuild_pos','-1'),('default_avatar','0'),('default_avatar_choose','0'),('default_avatar_guests','images/guest.gif'),('default_avatar_override','0'),('default_avatar_random','0'),('default_avatar_type','1'),('default_avatar_users','images/noavatar.gif'),('default_dateformat','d M Y à G:i'),('default_lang','french'),('default_style','1'),('disable_rewrite','1'),('enable_confirm','1'),('ezarena_version','1.0.0'),('flags_path','images/flags/'),('flood_interval','15'),('forum_icon_path','images/forum_icons'),('gender_required','0'),('gfirst_hour','1448564400'),('ggs_exclude_forums',''),('ggs_gzip','FALSE'),('ggs_gzip_ext','FALSE'),('gzip_compress','0'),('hot_threshold','25'),('LoAl_Intervalle_logos','120'),('login_reset_time','30'),('max_autologin_time','0'),('max_inbox_privmsgs','50'),('max_login_attempts','5'),('max_poll_options','10'),('max_savebox_privmsgs','50'),('max_sentbox_privmsgs','25'),('max_sig_chars','255'),('max_url_length','60'),('max_user_bancard','10'),('merge_flood_interval','0'),('mod_sf_version','0.0.6'),('override_user_style','0'),('pm_allow_threshold','15'),('points_browse','0'),('points_donate','1'),('points_name','Points'),('points_page','1'),('points_post','1'),('points_reply','1'),('points_system_version','2.1.1'),('points_topic','2'),('points_user_group_auth_ids',''),('posts_per_page','15'),('presentation_forum','0'),('presentation_required','0'),('privmsg_disable','0'),('prune_enable','1'),('prune_shouts','0'),('qte_version','1.6.1'),('question_conf','Combien font 6 + 2 ?'),('question_conf_enable','0'),('rabbitoshi_cron_last_time','1448564545'),('rabbitoshi_cron_time','86400'),('rabbitoshi_enable','1'),('rabbitoshi_enable_cron','1'),('rabbitoshi_name','Rabbistoshi'),('rcs_enable','1'),('rcs_level_admin','1'),('rcs_level_mod','1'),('rcs_ranks_stats','1'),('record_online_date','1448564637'),('record_online_users','2'),('removed_users','0'),('reponse_conf','huit'),('report_forum','0'),('require_activation','0'),('rss_allow_auth','FALSE'),('rss_exclude_forum',''),('rss_gzip_ext','FALSE'),('script_path','/fjr/'),('search_flood_interval','15'),('search_latest_hours','24,48,72'),('search_latest_results','topics'),('sendmail_fix','0'),('server_name','localhost'),('server_port','80'),('session_length','3600'),('sitename','yourdomain.com'),('site_desc','A _little_ text to describe your forum'),('smilies_path','images/smiles'),('smtp_delivery','0'),('smtp_host',''),('smtp_password',''),('smtp_username',''),('stock_last_change','0'),('stock_time','86400'),('stock_use','1'),('sub_title_length','100'),('time_to_merge','0'),('topics_on_index','10'),('topics_per_page','50'),('ty_lastpost_append','...'),('ty_lastpost_cutoff','20'),('ty_use_rel_date','1'),('ty_use_rel_time','0'),('ultimarena_version','7.0.0 Happy New Year Edition'),('users_qp_settings','1-0-1-1-1-1'),('version','.0.23'),('version_check_delay','1448564677'),('xs_add_comments','0'),('xs_auto_compile','1'),('xs_auto_recompile','1'),('xs_check_switches','1'),('xs_def_template','_shared'),('xs_downloads_count','0'),('xs_downloads_default','0'),('xs_ftp_host',''),('xs_ftp_login',''),('xs_ftp_path',''),('xs_php','php'),('xs_shownav','1'),('xs_template_time','1448564453'),('xs_use_cache','1'),('xs_version','8'),('xs_warn_includes','1'),('zone_adr_moderators',''),('zone_bonus_att','1'),('zone_bonus_def','1'),('zone_bonus_enable','1'),('zone_cheat_auto_ban_adr','0'),('zone_cheat_auto_ban_board','0'),('zone_cheat_auto_caution','0'),('zone_cheat_auto_cautionable','0'),('zone_cheat_auto_freeable','0'),('zone_cheat_auto_jail','0'),('zone_cheat_auto_public','0'),('zone_cheat_auto_punishment','1'),('zone_cheat_auto_time_day','1'),('zone_cheat_auto_time_hour','0'),('zone_cheat_auto_time_minute','0'),('zone_cheat_member_pm','2'),('zone_dead_travel','1');
/*!40000 ALTER TABLE `fjr_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_confirm`
--

LOCK TABLES `fjr_confirm` WRITE;
/*!40000 ALTER TABLE `fjr_confirm` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_confirm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_disallow`
--

LOCK TABLES `fjr_disallow` WRITE;
/*!40000 ALTER TABLE `fjr_disallow` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_disallow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_extension_groups`
--

LOCK TABLES `fjr_extension_groups` WRITE;
/*!40000 ALTER TABLE `fjr_extension_groups` DISABLE KEYS */;
INSERT INTO `fjr_extension_groups` VALUES (1,'Images',1,1,1,'',0,''),(2,'Archives',0,1,1,'',0,''),(3,'Plain Text',0,0,1,'',0,''),(4,'Documents',0,0,1,'',0,''),(5,'Real Media',0,0,2,'',0,''),(6,'Streams',2,0,1,'',0,''),(7,'Flash Files',3,0,1,'',0,'');
/*!40000 ALTER TABLE `fjr_extension_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_extensions`
--

LOCK TABLES `fjr_extensions` WRITE;
/*!40000 ALTER TABLE `fjr_extensions` DISABLE KEYS */;
INSERT INTO `fjr_extensions` VALUES (1,1,'gif',''),(2,1,'png',''),(3,1,'jpeg',''),(4,1,'jpg',''),(5,1,'tif',''),(6,1,'tga',''),(7,2,'gtar',''),(8,2,'gz',''),(9,2,'tar',''),(10,2,'zip',''),(11,2,'rar',''),(12,2,'ace',''),(13,3,'txt',''),(14,3,'c',''),(15,3,'h',''),(16,3,'cpp',''),(17,3,'hpp',''),(18,3,'diz',''),(19,4,'xls',''),(20,4,'doc',''),(21,4,'dot',''),(22,4,'pdf',''),(23,4,'ai',''),(24,4,'ps',''),(25,4,'ppt',''),(26,5,'rm',''),(27,6,'wma',''),(28,7,'swf','');
/*!40000 ALTER TABLE `fjr_extensions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_forbidden_extensions`
--

LOCK TABLES `fjr_forbidden_extensions` WRITE;
/*!40000 ALTER TABLE `fjr_forbidden_extensions` DISABLE KEYS */;
INSERT INTO `fjr_forbidden_extensions` VALUES (1,'php'),(2,'php3'),(3,'php4'),(4,'phtml'),(5,'pl'),(6,'asp'),(7,'cgi'),(8,'php5'),(9,'php6');
/*!40000 ALTER TABLE `fjr_forbidden_extensions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_forum_prune`
--

LOCK TABLES `fjr_forum_prune` WRITE;
/*!40000 ALTER TABLE `fjr_forum_prune` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_forum_prune` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_forums`
--

LOCK TABLES `fjr_forums` WRITE;
/*!40000 ALTER TABLE `fjr_forums` DISABLE KEYS */;
INSERT INTO `fjr_forums` VALUES (1,1,'Forum Test 1','Juste un forum de test.',0,10,1,1,1,NULL,0,0,0,1,1,1,1,3,3,1,1,0,3,5,1,1,0,0,NULL,0,NULL,0,0,NULL,0,'',0,0,NULL,0,3);
/*!40000 ALTER TABLE `fjr_forums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_ggs_config`
--

LOCK TABLES `fjr_ggs_config` WRITE;
/*!40000 ALTER TABLE `fjr_ggs_config` DISABLE KEYS */;
INSERT INTO `fjr_ggs_config` VALUES ('ggs_announce_priority','0.5'),('ggs_auto_regen','TRUE'),('ggs_cached','FALSE'),('ggs_cache_dir','gs_cache/'),('ggs_cache_max_age','24'),('ggs_c_info','(C) 2006 dcz - http://www.phpbb-seo.com/'),('ggs_default_priority','1.0'),('ggs_exclude_forums',''),('ggs_force_cache_gzip','FALSE'),('ggs_gzip','FALSE'),('ggs_gzip_ext','FALSE'),('ggs_gzip_level','6'),('ggs_kb_exclude',''),('ggs_kb_mx_page','FALSE'),('ggs_limitdown','5'),('ggs_limitup','5'),('ggs_mod_rewrite','FALSE'),('ggs_mod_rewrite_type','0'),('ggs_mod_since','FALSE'),('ggs_mx_exclude',''),('ggs_pagination','FALSE'),('ggs_showstats','FALSE'),('ggs_sort','DESC'),('ggs_sql_limit','200'),('ggs_sticky_priority','0.75'),('ggs_url_limit','2500'),('ggs_ver','v1.2.0RC4'),('ggs_xslt','FALSE'),('ggs_zero_dupe','FALSE'),('google_cache_born','0'),('rss_allow_auth','FALSE'),('rss_allow_bbcode','TRUE'),('rss_allow_links','TRUE'),('rss_allow_long','FALSE'),('rss_allow_short','FALSE'),('rss_allow_smilies','TRUE'),('rss_auto_regen','TRUE'),('rss_cache_auth','TRUE'),('rss_cache_born','0'),('rss_cache_max_age','12'),('rss_charset','$charset'),('rss_charset_conv','auto'),('rss_cinfo','$rss_title'),('rss_exclude_forum',''),('rss_exclude_kbcat',''),('rss_exclude_mx',''),('rss_first','FALSE'),('rss_force_xslt','FALSE'),('rss_forum_image','rss_forum_big.gif'),('rss_gzip_ext','FALSE'),('rss_image','rss_board_big.gif'),('rss_lang','en'),('rss_last','TRUE'),('rss_limit_time','60'),('rss_msg_txt','TRUE'),('rss_sitename','$rss_title'),('rss_site_desc','$rss_desc'),('rss_sql_limit','100'),('rss_sql_limit_txt','25'),('rss_strip_bbcode',''),('rss_sumarize','10'),('rss_sumarize_method','sentences'),('rss_url_limit','100'),('rss_url_limit_long','500'),('rss_url_limit_short','25'),('rss_url_limit_txt','50'),('rss_url_limit_txt_long','200'),('rss_url_limit_txt_short','25'),('rss_xslt','FALSE'),('yahoo_appid',''),('yahoo_auto_regen','TRUE'),('yahoo_cache_born','0'),('yahoo_cache_max_age','48'),('yahoo_exclude',''),('yahoo_exclude_kbcat',''),('yahoo_exclude_mx',''),('yahoo_limit','500'),('yahoo_limitdown','5'),('yahoo_limitup','5'),('yahoo_limit_time','60'),('yahoo_notify','FALSE'),('yahoo_notify_long','FALSE'),('yahoo_pagination','FALSE'),('yahoo_sql_limit','100');
/*!40000 ALTER TABLE `fjr_ggs_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_groups`
--

LOCK TABLES `fjr_groups` WRITE;
/*!40000 ALTER TABLE `fjr_groups` DISABLE KEYS */;
INSERT INTO `fjr_groups` VALUES (1,1,'Anonymous','Personal User',0,1,0),(2,1,'Admin','Personal User',0,1,0);
/*!40000 ALTER TABLE `fjr_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_guests_visit`
--

LOCK TABLES `fjr_guests_visit` WRITE;
/*!40000 ALTER TABLE `fjr_guests_visit` DISABLE KEYS */;
INSERT INTO `fjr_guests_visit` VALUES (1448564400,1);
/*!40000 ALTER TABLE `fjr_guests_visit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_ip_tracking`
--

LOCK TABLES `fjr_ip_tracking` WRITE;
/*!40000 ALTER TABLE `fjr_ip_tracking` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_ip_tracking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_ip_tracking_config`
--

LOCK TABLES `fjr_ip_tracking_config` WRITE;
/*!40000 ALTER TABLE `fjr_ip_tracking_config` DISABLE KEYS */;
INSERT INTO `fjr_ip_tracking_config` VALUES (25000);
/*!40000 ALTER TABLE `fjr_ip_tracking_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_logos`
--

LOCK TABLES `fjr_logos` WRITE;
/*!40000 ALTER TABLE `fjr_logos` DISABLE KEYS */;
INSERT INTO `fjr_logos` VALUES (1,'images/ulti1.gif',1,1,1448564545);
/*!40000 ALTER TABLE `fjr_logos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_posts`
--

LOCK TABLES `fjr_posts` WRITE;
/*!40000 ALTER TABLE `fjr_posts` DISABLE KEYS */;
INSERT INTO `fjr_posts` VALUES (1,1,1,2,972086460,0,'7F000001',NULL,1,0,1,1,NULL,0,NULL,0);
/*!40000 ALTER TABLE `fjr_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_posts_text`
--

LOCK TABLES `fjr_posts_text` WRITE;
/*!40000 ALTER TABLE `fjr_posts_text` DISABLE KEYS */;
INSERT INTO `fjr_posts_text` VALUES (1,'',NULL,'Vous pouvez effacer ce post si vous ne relevez aucun problème !',NULL);
/*!40000 ALTER TABLE `fjr_posts_text` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_privmsgs`
--

LOCK TABLES `fjr_privmsgs` WRITE;
/*!40000 ALTER TABLE `fjr_privmsgs` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_privmsgs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_privmsgs_text`
--

LOCK TABLES `fjr_privmsgs_text` WRITE;
/*!40000 ALTER TABLE `fjr_privmsgs_text` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_privmsgs_text` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_quicklinks`
--

LOCK TABLES `fjr_quicklinks` WRITE;
/*!40000 ALTER TABLE `fjr_quicklinks` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_quicklinks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_quota_limits`
--

LOCK TABLES `fjr_quota_limits` WRITE;
/*!40000 ALTER TABLE `fjr_quota_limits` DISABLE KEYS */;
INSERT INTO `fjr_quota_limits` VALUES (1,'Low',262144),(2,'Medium',2097152),(3,'High',5242880);
/*!40000 ALTER TABLE `fjr_quota_limits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_rabbitoshi_config`
--

LOCK TABLES `fjr_rabbitoshi_config` WRITE;
/*!40000 ALTER TABLE `fjr_rabbitoshi_config` DISABLE KEYS */;
INSERT INTO `fjr_rabbitoshi_config` VALUES (3,'Wolf',500,0,0,0,15,15,15,6,15,3,1,0,'wolfpup.gif',250,2,0,0,0,0,0,0,0,0,0,0,0),(4,'Rabbit',100,0,0,0,15,15,15,6,15,2,1,0,'Rabbit.gif',250,2,0,0,0,0,0,0,0,0,0,0,0),(5,'Fairy',5000,0,1,0,20,20,20,15,25,1,1,0,'fairy38.gif',250,0,2,0,0,0,0,0,0,0,0,0,0),(6,'Phoenix',1000,0,0,1,20,20,20,10,20,4,1,0,'ph2.gif',250,1,1,0,0,0,0,0,0,0,0,0,0);
/*!40000 ALTER TABLE `fjr_rabbitoshi_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_rabbitoshi_general`
--

LOCK TABLES `fjr_rabbitoshi_general` WRITE;
/*!40000 ALTER TABLE `fjr_rabbitoshi_general` DISABLE KEYS */;
INSERT INTO `fjr_rabbitoshi_general` VALUES ('armor_levelup',0),('armor_price',750),('armor_raise',1),('attack_levelup',1),('attack_price',225),('attack_raise',1),('attack_reload',1),('evolution_cost',200),('evolution_enable',1),('evolution_time',25),('experience_max',20),('experience_min',5),('exp_lose',5),('health_levelup',5),('health_price',75),('health_raise',1),('health_time',43200),('health_transfert_health',200),('health_transfert_level',24),('health_transfert_magicpower',50),('health_transfert_percent',50),('health_transfert_price',2500),('health_value',1),('hotel_cost',10),('hotel_enable',1),('hunger_levelup',2),('hunger_price',20),('hunger_raise',1),('hunger_time',43200),('hunger_value',1),('hygiene_levelup',2),('hygiene_price',20),('hygiene_raise',1),('hygiene_time',43200),('hygiene_value',1),('level_price',1500),('level_raise',1),('magicattack_levelup',1),('magicattack_price',200),('magicattack_raise',1),('magicpower_levelup',1),('magicpower_price',280),('magicpower_raise',1),('magic_reload',1),('mana_transfert_level',24),('mana_transfert_magicpower',50),('mana_transfert_mp',100),('mana_transfert_percent',50),('mana_transfert_price',2500),('mp_levelup',3),('mp_max',5),('mp_min',1),('mp_price',30),('mp_raise',1),('next_level_penalty',10),('power_levelup',1),('power_price',330),('power_raise',1),('rebirth_enable',1),('rebirth_price',0),('regeneration_hp_give',3),('regeneration_level',12),('regeneration_magicpower',25),('regeneration_mp',50),('regeneration_mp_need',1),('regeneration_price',1500),('sacrifice_armor',50),('sacrifice_level',48),('sacrifice_mp',100),('sacrifice_power',100),('sacrifice_price',5000),('thirst_levelup',2),('thirst_price',20),('thirst_raise',1),('thirst_time',43200),('thirst_value',1),('vet_enable',1),('vet_price',100);
/*!40000 ALTER TABLE `fjr_rabbitoshi_general` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_rabbitoshi_shop`
--

LOCK TABLES `fjr_rabbitoshi_shop` WRITE;
/*!40000 ALTER TABLE `fjr_rabbitoshi_shop` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_rabbitoshi_shop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_rabbitoshi_shop_users`
--

LOCK TABLES `fjr_rabbitoshi_shop_users` WRITE;
/*!40000 ALTER TABLE `fjr_rabbitoshi_shop_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_rabbitoshi_shop_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_rabbitoshi_users`
--

LOCK TABLES `fjr_rabbitoshi_users` WRITE;
/*!40000 ALTER TABLE `fjr_rabbitoshi_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_rabbitoshi_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_ranks`
--

LOCK TABLES `fjr_ranks` WRITE;
/*!40000 ALTER TABLE `fjr_ranks` DISABLE KEYS */;
INSERT INTO `fjr_ranks` VALUES (1,'Administrateur',-1,1,NULL,'');
/*!40000 ALTER TABLE `fjr_ranks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_rcs`
--

LOCK TABLES `fjr_rcs` WRITE;
/*!40000 ALTER TABLE `fjr_rcs` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_rcs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_search_results`
--

LOCK TABLES `fjr_search_results` WRITE;
/*!40000 ALTER TABLE `fjr_search_results` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_search_results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_search_wordlist`
--

LOCK TABLES `fjr_search_wordlist` WRITE;
/*!40000 ALTER TABLE `fjr_search_wordlist` DISABLE KEYS */;
INSERT INTO `fjr_search_wordlist` VALUES ('delete',5,0),('everything',9,0),('example',1,0),('forum',7,0),('installation',4,0),('phpbb',3,0),('post',2,0),('seems',10,0),('since',8,0),('topic',6,0),('welcome',12,0),('working',11,0);
/*!40000 ALTER TABLE `fjr_search_wordlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_search_wordmatch`
--

LOCK TABLES `fjr_search_wordmatch` WRITE;
/*!40000 ALTER TABLE `fjr_search_wordmatch` DISABLE KEYS */;
INSERT INTO `fjr_search_wordmatch` VALUES (1,1,0),(1,2,0),(1,3,0),(1,4,0),(1,5,0),(1,6,0),(1,7,0),(1,8,0),(1,9,0),(1,10,0),(1,11,0),(1,12,1),(1,3,1);
/*!40000 ALTER TABLE `fjr_search_wordmatch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_sessions`
--

LOCK TABLES `fjr_sessions` WRITE;
/*!40000 ALTER TABLE `fjr_sessions` DISABLE KEYS */;
INSERT INTO `fjr_sessions` VALUES ('ffa5fbbe29d8f123',2,1448564660,1448564660,'7f000001',0,1,1,'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:42.0) Gecko/20100101 Firefox/42.0',NULL,NULL,NULL);
/*!40000 ALTER TABLE `fjr_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_sessions_keys`
--

LOCK TABLES `fjr_sessions_keys` WRITE;
/*!40000 ALTER TABLE `fjr_sessions_keys` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_sessions_keys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_shout`
--

LOCK TABLES `fjr_shout` WRITE;
/*!40000 ALTER TABLE `fjr_shout` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_shout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_smilies`
--

LOCK TABLES `fjr_smilies` WRITE;
/*!40000 ALTER TABLE `fjr_smilies` DISABLE KEYS */;
INSERT INTO `fjr_smilies` VALUES (1,':D','icon_biggrin.gif','Very Happy'),(2,':-D','icon_biggrin.gif','Very Happy'),(3,':grin:','icon_biggrin.gif','Very Happy'),(4,':)','icon_smile.gif','Smile'),(5,':-)','icon_smile.gif','Smile'),(6,':smile:','icon_smile.gif','Smile'),(7,':(','icon_sad.gif','Sad'),(8,':-(','icon_sad.gif','Sad'),(9,':sad:','icon_sad.gif','Sad'),(10,':o','icon_surprised.gif','Surprised'),(11,':-o','icon_surprised.gif','Surprised'),(12,':eek:','icon_surprised.gif','Surprised'),(13,':shock:','icon_eek.gif','Shocked'),(14,':?','icon_confused.gif','Confused'),(15,':-?','icon_confused.gif','Confused'),(16,':???:','icon_confused.gif','Confused'),(17,'8)','icon_cool.gif','Cool'),(18,'8-)','icon_cool.gif','Cool'),(19,':cool:','icon_cool.gif','Cool'),(20,':lol:','icon_lol.gif','Laughing'),(21,':x','icon_mad.gif','Mad'),(22,':-x','icon_mad.gif','Mad'),(23,':mad:','icon_mad.gif','Mad'),(24,':P','icon_razz.gif','Razz'),(25,':-P','icon_razz.gif','Razz'),(26,':razz:','icon_razz.gif','Razz'),(27,':oops:','icon_redface.gif','Embarassed'),(28,':cry:','icon_cry.gif','Crying or Very sad'),(29,':evil:','icon_evil.gif','Evil or Very Mad'),(30,':twisted:','icon_twisted.gif','Twisted Evil'),(31,':roll:','icon_rolleyes.gif','Rolling Eyes'),(32,':wink:','icon_wink.gif','Wink'),(33,';)','icon_wink.gif','Wink'),(34,';-)','icon_wink.gif','Wink'),(35,':!:','icon_exclaim.gif','Exclamation'),(36,':?:','icon_question.gif','Question'),(37,':idea:','icon_idea.gif','Idea'),(38,':arrow:','icon_arrow.gif','Arrow'),(39,':|','icon_neutral.gif','Neutral'),(40,':-|','icon_neutral.gif','Neutral'),(41,':neutral:','icon_neutral.gif','Neutral'),(42,':mrgreen:','icon_mrgreen.gif','Mr. Green');
/*!40000 ALTER TABLE `fjr_smilies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_themes`
--

LOCK TABLES `fjr_themes` WRITE;
/*!40000 ALTER TABLE `fjr_themes` DISABLE KEYS */;
INSERT INTO `fjr_themes` VALUES (1,'phpbb','subSilver','subSilver/style.css','','E5E5E5','000000','006699','5493B4','','DD6900','EFEFEF','DEE3E7','D1D7DC','','','','98AAB1','006699','FFFFFF','cellpic1.gif','cellpic3.gif','cellpic2.jpg','FAFAFA','FFFFFF','','row1','row2','','Verdana, Arial, Helvetica, sans-serif','Trebuchet MS','Courier, \'Courier New\', sans-serif',10,11,12,'444444','006600','FFA34F','','','','','','',NULL,NULL);
/*!40000 ALTER TABLE `fjr_themes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_themes_name`
--

LOCK TABLES `fjr_themes_name` WRITE;
/*!40000 ALTER TABLE `fjr_themes_name` DISABLE KEYS */;
INSERT INTO `fjr_themes_name` VALUES (1,'The lightest row colour','The medium row color','The darkest row colour','','','','Border round the whole page','Outer table border','Inner table border','Silver gradient picture','Blue gradient picture','Fade-out gradient on index','Background for quote boxes','All white areas','','Background for topic posts','2nd background for topic posts','','Main fonts','Additional topic title font','Form fonts','Smallest font size','Medium font size','Normal font size (post body etc)','Quote & copyright text','Code text colour','Main table header text colour','','','');
/*!40000 ALTER TABLE `fjr_themes_name` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_topics`
--

LOCK TABLES `fjr_topics` WRITE;
/*!40000 ALTER TABLE `fjr_topics` DISABLE KEYS */;
INSERT INTO `fjr_topics` VALUES (1,1,'Bienvenue sur la premod ezArena',2,972086460,0,0,0,0,0,1,1,0,NULL,0,NULL);
/*!40000 ALTER TABLE `fjr_topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_topics_watch`
--

LOCK TABLES `fjr_topics_watch` WRITE;
/*!40000 ALTER TABLE `fjr_topics_watch` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_topics_watch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_user_group`
--

LOCK TABLES `fjr_user_group` WRITE;
/*!40000 ALTER TABLE `fjr_user_group` DISABLE KEYS */;
INSERT INTO `fjr_user_group` VALUES (1,0,-1,0),(2,0,2,0);
/*!40000 ALTER TABLE `fjr_user_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_users`
--

LOCK TABLES `fjr_users` WRITE;
/*!40000 ALTER TABLE `fjr_users` DISABLE KEYS */;
INSERT INTO `fjr_users` VALUES (-1,0,'Anonymous',NULL,'',0,0,0,1448564415,0,0,0.00,NULL,'','',0,0,0,0,0,NULL,0,0,1,1,1,1,0,1,0,1,0,NULL,'',0,'','','','','',NULL,'','','','','','','',0,0,'1-0-1-1-1-1','',0,0,'',0,0,1,0,0,NULL,0,1,1,0,NULL,0,0,0,0,NULL,0,0,0,0),(2,1,'Administrateur',NULL,'740ea7afcc423a85093bd7e81bb0adbf',1448564633,0,1448564633,1448564415,1,1,0.00,1,'french','d M Y h:i a',0,0,0,0,0,NULL,1,0,0,1,1,1,1,1,0,1,1,1,'',0,'lesanglierdesardennes@gmail.com','','','','',NULL,'','','','','','','',0,0,'1-0-1-1-1-1','',0,0,'',0,0,1,0,0,NULL,0,1,1,0,NULL,0,0,0,0,NULL,0,0,0,0);
/*!40000 ALTER TABLE `fjr_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_vote_desc`
--

LOCK TABLES `fjr_vote_desc` WRITE;
/*!40000 ALTER TABLE `fjr_vote_desc` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_vote_desc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_vote_results`
--

LOCK TABLES `fjr_vote_results` WRITE;
/*!40000 ALTER TABLE `fjr_vote_results` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_vote_results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_vote_voters`
--

LOCK TABLES `fjr_vote_voters` WRITE;
/*!40000 ALTER TABLE `fjr_vote_voters` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_vote_voters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fjr_words`
--

LOCK TABLES `fjr_words` WRITE;
/*!40000 ALTER TABLE `fjr_words` DISABLE KEYS */;
/*!40000 ALTER TABLE `fjr_words` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-26 20:07:53
