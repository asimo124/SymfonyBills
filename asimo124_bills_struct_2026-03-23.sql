/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.14-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: asimo124_bills
-- ------------------------------------------------------
-- Server version	10.11.14-MariaDB-0+deb12u2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ae_rocket_money_item`
--

DROP TABLE IF EXISTS `ae_rocket_money_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `ae_rocket_money_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Date` varchar(255) DEFAULT NULL,
  `Original_Date` varchar(255) DEFAULT NULL,
  `Account_Type` varchar(255) DEFAULT NULL,
  `Account_Name` varchar(255) DEFAULT NULL,
  `Account_Number` varchar(255) DEFAULT NULL,
  `Institution_Name` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Custom_Name` varchar(255) DEFAULT NULL,
  `Amount` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Category` varchar(255) DEFAULT NULL,
  `Note` varchar(255) DEFAULT NULL,
  `Ignored_From` varchar(255) DEFAULT NULL,
  `Tax_Deductible` varchar(255) DEFAULT NULL,
  `Collapsed` tinyint(1) NOT NULL DEFAULT 0,
  `Index` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ae_title_match`
--

DROP TABLE IF EXISTS `ae_title_match`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `ae_title_match` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rocket_money_id` int(11) NOT NULL,
  `rocket_money_title` varchar(255) NOT NULL,
  `rocket_money_short_title` varchar(255) NOT NULL,
  `rocket_money_amount` float NOT NULL,
  `rocket_money_date` int(11) NOT NULL,
  `expenses_app_id` int(11) NOT NULL,
  `expenses_app_title` varchar(255) NOT NULL,
  `expenses_app_short_title` varchar(255) NOT NULL,
  `expenses_app_amount` float NOT NULL,
  `expenses_app_date` int(11) NOT NULL,
  `rocket_money_index` int(11) DEFAULT NULL,
  `expenses_app_index` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ah1_agents`
--

DROP TABLE IF EXISTS `ah1_agents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `ah1_agents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ah1_properties`
--

DROP TABLE IF EXISTS `ah1_properties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `ah1_properties` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mls_Id` varchar(50) DEFAULT NULL,
  `address` varchar(300) DEFAULT '',
  `city` varchar(75) DEFAULT NULL,
  `state` varchar(30) DEFAULT '',
  `zip` varchar(30) DEFAULT '',
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1001 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cu_income_change`
--

DROP TABLE IF EXISTS `cu_income_change`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cu_income_change` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paycheck_date` date NOT NULL,
  `current_earnings` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cu_loan`
--

DROP TABLE IF EXISTS `cu_loan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cu_loan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `debt_owed` decimal(10,2) NOT NULL DEFAULT 0.00,
  `credit_limit` decimal(10,2) NOT NULL DEFAULT 0.00,
  `sort_order` int(11) NOT NULL DEFAULT 1,
  `milestone_order` int(11) NOT NULL DEFAULT 0,
  `min_payment` decimal(10,2) NOT NULL DEFAULT 0.00,
  `amount_to_principal` decimal(10,2) NOT NULL DEFAULT 0.00,
  `bill_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `date_job`
--

DROP TABLE IF EXISTS `date_job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `date_job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) NOT NULL,
  `created_at` bigint(20) NOT NULL,
  `updated_at` bigint(20) NOT NULL,
  `command` varchar(255) NOT NULL,
  `output` varchar(8000) DEFAULT NULL,
  `test_mode` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=401 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `dl_food`
--

DROP TABLE IF EXISTS `dl_food`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `dl_food` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `macro_type_id` int(11) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `sub_type_id` int(11) DEFAULT NULL,
  `has_fiber` tinyint(4) NOT NULL DEFAULT 0,
  `percent_fiber` decimal(5,2) NOT NULL DEFAULT 0.00,
  `percent_soluble_fiber` decimal(5,2) NOT NULL DEFAULT 0.00,
  `is_soluble_fiber` tinyint(4) NOT NULL DEFAULT 0,
  `is_cruciferous` tinyint(4) NOT NULL DEFAULT 0,
  `unit_of_measure_id` int(11) NOT NULL,
  `default_amount` decimal(10,2) DEFAULT 0.00,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `dl_food_log`
--

DROP TABLE IF EXISTS `dl_food_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `dl_food_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `food_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `date_consumed` datetime NOT NULL,
  `meal_of_day_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `dl_macro_type`
--

DROP TABLE IF EXISTS `dl_macro_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `dl_macro_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `dl_meal_of_day`
--

DROP TABLE IF EXISTS `dl_meal_of_day`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `dl_meal_of_day` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `dl_type`
--

DROP TABLE IF EXISTS `dl_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `dl_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `dl_unit_of_measure`
--

DROP TABLE IF EXISTS `dl_unit_of_measure`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `dl_unit_of_measure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `dp_snapshot`
--

DROP TABLE IF EXISTS `dp_snapshot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `dp_snapshot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stage1_start_date` date DEFAULT NULL,
  `stage1_remaining_balance` float(255,0) DEFAULT NULL,
  `stage1_min_payment_principal1` float(255,0) DEFAULT NULL,
  `stage1_mom_principal` float(255,0) DEFAULT NULL,
  `stage1_me_principal` float(255,0) DEFAULT NULL,
  `stage2_start_date` datetime DEFAULT NULL,
  `stage2_remaining_balance` float(255,0) DEFAULT NULL,
  `stage2_min_payment_principal1` float(255,0) DEFAULT NULL,
  `stage2_min_payment_principal2` float(255,0) DEFAULT NULL,
  `stage2_mom_principal` float(255,0) DEFAULT NULL,
  `stage2_me_principal` float(255,0) DEFAULT NULL,
  `stage3_start_date` datetime DEFAULT NULL,
  `stage3_remaining_balance` float(255,0) DEFAULT NULL,
  `stage3_min_payment_principal1` float(255,0) DEFAULT NULL,
  `stage3_mom_principal` float(255,0) DEFAULT NULL,
  `stage3_me_principal` float(255,0) DEFAULT NULL,
  `entrydate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `dt_paycheck_disposable`
--

DROP TABLE IF EXISTS `dt_paycheck_disposable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `dt_paycheck_disposable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paycheck_date` date NOT NULL,
  `disposable_amount` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `dt_transaction`
--

DROP TABLE IF EXISTS `dt_transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `dt_transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_date` date NOT NULL,
  `account_type` varchar(255) DEFAULT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `institution_name` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `transaction_category_id` int(11) DEFAULT NULL,
  `is_covered` tinyint(4) NOT NULL DEFAULT 0,
  `paycheck_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2627 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `dt_transaction_category`
--

DROP TABLE IF EXISTS `dt_transaction_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `dt_transaction_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fs_food`
--

DROP TABLE IF EXISTS `fs_food`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `fs_food` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `is_inflammation` tinyint(1) NOT NULL DEFAULT 0,
  `percentage_towards_inflammation` float NOT NULL DEFAULT 0,
  `test_value` float NOT NULL DEFAULT 0,
  `test_inflammation_index` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fs_food_category`
--

DROP TABLE IF EXISTS `fs_food_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `fs_food_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fs_food_general`
--

DROP TABLE IF EXISTS `fs_food_general`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `fs_food_general` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fs_food_history`
--

DROP TABLE IF EXISTS `fs_food_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `fs_food_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_table` varchar(255) NOT NULL,
  `ref_table_id` int(11) NOT NULL,
  `consumed_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `glu_glucose_log`
--

DROP TABLE IF EXISTS `glu_glucose_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `glu_glucose_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_taken` datetime DEFAULT NULL,
  `level` int(11) DEFAULT 255,
  `notes` varchar(5000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `glu_log_notes`
--

DROP TABLE IF EXISTS `glu_log_notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `glu_log_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_id` int(11) DEFAULT NULL,
  `date_entered` datetime DEFAULT NULL,
  `note` varchar(5000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hth_ bm_treatment_types`
--

DROP TABLE IF EXISTS `hth_ bm_treatment_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `hth_ bm_treatment_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `treatment_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hth_bm`
--

DROP TABLE IF EXISTS `hth_bm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `hth_bm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_taken` date DEFAULT NULL,
  `time_taken_id` int(11) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `pain_level_id` int(11) DEFAULT NULL,
  `does_float` tinyint(4) NOT NULL DEFAULT 1,
  `texture` varchar(255) DEFAULT NULL,
  `entrydate` datetime DEFAULT NULL,
  `solid_loose` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hth_bm_pain_levels`
--

DROP TABLE IF EXISTS `hth_bm_pain_levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `hth_bm_pain_levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pain_level` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hth_bm_preventative_method_types`
--

DROP TABLE IF EXISTS `hth_bm_preventative_method_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `hth_bm_preventative_method_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `method_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hth_bm_preventative_methods`
--

DROP TABLE IF EXISTS `hth_bm_preventative_methods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `hth_bm_preventative_methods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_taken` date DEFAULT NULL,
  `method_type` varchar(255) DEFAULT NULL,
  `time_taken` varchar(255) DEFAULT NULL,
  `entrydate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hth_bm_treatments`
--

DROP TABLE IF EXISTS `hth_bm_treatments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `hth_bm_treatments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_taken` date DEFAULT NULL,
  `time_taken` varchar(255) DEFAULT NULL,
  `treatment_type_id` int(11) DEFAULT NULL,
  `entrydate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hth_day_times`
--

DROP TABLE IF EXISTS `hth_day_times`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `hth_day_times` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time_desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hth_meals`
--

DROP TABLE IF EXISTS `hth_meals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `hth_meals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meal_type` varchar(255) DEFAULT NULL,
  `meal_desc` varchar(255) DEFAULT NULL,
  `has_gluten` tinyint(4) DEFAULT NULL,
  `organic_level` varchar(255) DEFAULT NULL,
  `calories` int(11) DEFAULT NULL,
  `ate_out` tinyint(4) DEFAULT NULL,
  `date_eaten` date DEFAULT NULL,
  `time_eaten_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hth_pills`
--

DROP TABLE IF EXISTS `hth_pills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `hth_pills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_taken` date DEFAULT NULL,
  `probiotic_taken` tinyint(4) NOT NULL DEFAULT 0,
  `time_taken_id` int(11) DEFAULT NULL,
  `supplements_taken` tinyint(4) NOT NULL DEFAULT 0,
  `entrydate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hth_user_sessions`
--

DROP TABLE IF EXISTS `hth_user_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `hth_user_sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_key` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `last_until` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1184 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hth_users`
--

DROP TABLE IF EXISTS `hth_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `hth_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hth_workout_types`
--

DROP TABLE IF EXISTS `hth_workout_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `hth_workout_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `workout_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hth_workouts`
--

DROP TABLE IF EXISTS `hth_workouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `hth_workouts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `workout_date` varchar(255) DEFAULT NULL,
  `workout_type_id` int(11) DEFAULT NULL,
  `duration_mins` int(11) DEFAULT NULL,
  `calories_burned` int(11) DEFAULT NULL,
  `entrydate` datetime DEFAULT NULL,
  `workout_desc` varchar(255) DEFAULT NULL,
  `workout_time_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ip_pay_period`
--

DROP TABLE IF EXISTS `ip_pay_period`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `ip_pay_period` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_period` varchar(75) NOT NULL,
  `pay_period_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ip_pay_period_item`
--

DROP TABLE IF EXISTS `ip_pay_period_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `ip_pay_period_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_period_id` int(11) NOT NULL,
  `disposable_amount` float NOT NULL DEFAULT 0,
  `remaining_amount` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ip_upcoming_purchase`
--

DROP TABLE IF EXISTS `ip_upcoming_purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `ip_upcoming_purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_period_item_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `cost` float DEFAULT 0,
  `amount_to_save` float NOT NULL DEFAULT 0,
  `moved` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `p2p_settings`
--

DROP TABLE IF EXISTS `p2p_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `p2p_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attribute_key` varchar(255) DEFAULT NULL,
  `attribute_value` varchar(3000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ph_pills_taken_history`
--

DROP TABLE IF EXISTS `ph_pills_taken_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `ph_pills_taken_history` (
  `id` int(11) NOT NULL,
  `pill_taken_date` datetime DEFAULT NULL,
  `metformin_taken` tinyint(4) DEFAULT 0,
  `diaplex_taken` tinyint(4) DEFAULT 0,
  `multivitamin_taken` tinyint(4) DEFAULT 0,
  `vitamin_d_taken` tinyint(4) DEFAULT 0,
  `b12_taken` tinyint(4) DEFAULT 0,
  `b12_complex_taken` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rec_available_ingredient`
--

DROP TABLE IF EXISTS `rec_available_ingredient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `rec_available_ingredient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ingredient_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rec_ingredient`
--

DROP TABLE IF EXISTS `rec_ingredient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `rec_ingredient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ingredient` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rec_recipe`
--

DROP TABLE IF EXISTS `rec_recipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `rec_recipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_name` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rec_recipe_ingredient`
--

DROP TABLE IF EXISTS `rec_recipe_ingredient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `rec_recipe_ingredient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `unit_of_measure` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rec_recipe_steps`
--

DROP TABLE IF EXISTS `rec_recipe_steps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `rec_recipe_steps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_id` int(11) NOT NULL,
  `step` varchar(255) NOT NULL,
  `display_order` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `res_categories`
--

DROP TABLE IF EXISTS `res_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `res_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `res_places`
--

DROP TABLE IF EXISTS `res_places`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `res_places` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `place_name` varchar(255) DEFAULT NULL,
  `google_link` varchar(1500) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `close_easy` tinyint(4) DEFAULT NULL,
  `sol_likes` tinyint(4) DEFAULT NULL,
  `alex_likes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_key_name` varchar(255) NOT NULL,
  `setting_value` varchar(1500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tax_expense`
--

DROP TABLE IF EXISTS `tax_expense`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tax_expense` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(800) DEFAULT NULL,
  `expense_category_id` int(11) DEFAULT NULL,
  `amount` float(255,0) DEFAULT NULL,
  `vendor` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tax_expense_category`
--

DROP TABLE IF EXISTS `tax_expense_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tax_expense_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT ' ',
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_books`
--

DROP TABLE IF EXISTS `tbl_books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bookname` varchar(255) DEFAULT NULL,
  `desc` varchar(3000) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_categories`
--

DROP TABLE IF EXISTS `tbl_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_images`
--

DROP TABLE IF EXISTS `tbl_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagePath` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `vnd_bill_dates`
--

DROP TABLE IF EXISTS `vnd_bill_dates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `vnd_bill_dates` (
  `vnd_id` int(11) NOT NULL AUTO_INCREMENT,
  `vnd_bill_desc` varchar(255) DEFAULT NULL,
  `vnd_amount` float DEFAULT NULL,
  `vnd_date` date DEFAULT NULL,
  `vnd_user_id` int(11) DEFAULT NULL,
  `vnd_is_auto` int(11) NOT NULL DEFAULT 1,
  `vnd_is_future` tinyint(4) NOT NULL DEFAULT 0,
  `is_heavy` tinyint(1) NOT NULL DEFAULT 0,
  `vnd_frequency` varchar(255) DEFAULT NULL,
  `vnd_frequency_type` varchar(255) DEFAULT NULL,
  `can_be_multiplied_by` int(11) NOT NULL DEFAULT 1,
  `multiplier` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`vnd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3295 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `vnd_bills`
--

DROP TABLE IF EXISTS `vnd_bills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `vnd_bills` (
  `vnd_id` int(11) NOT NULL AUTO_INCREMENT,
  `vnd_user_id` int(11) DEFAULT NULL,
  `vnd_bill` varchar(100) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `vnd_is_auto` int(11) NOT NULL DEFAULT 1,
  `vnd_frequency_notes` varchar(300) DEFAULT NULL,
  `vnd_frequency` varchar(50) DEFAULT NULL,
  `vnd_frequency_type` varchar(100) DEFAULT NULL,
  `vnd_frequency_value` varchar(100) DEFAULT NULL,
  `vnd_entrydate` datetime DEFAULT NULL,
  `vnd_entryip` varchar(50) DEFAULT NULL,
  `multiplier` int(11) NOT NULL DEFAULT 1,
  `is_future` int(11) NOT NULL DEFAULT 0,
  `is_heavy` tinyint(4) NOT NULL DEFAULT 0 COMMENT ' ',
  `watch_flag` tinyint(4) NOT NULL DEFAULT 0,
  `end_date` date DEFAULT NULL,
  `vnd_frequency_value_original` varchar(100) DEFAULT NULL,
  `audit_regex` varchar(255) DEFAULT NULL,
  `audit_keyword1` varchar(255) DEFAULT NULL,
  `audit_keyword2` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `upcoming_purchase_id` int(11) DEFAULT NULL,
  `pay_period_id` int(11) DEFAULT NULL,
  `collapsed` tinyint(1) NOT NULL DEFAULT 0,
  `index` int(11) DEFAULT NULL,
  `can_be_multiplied_by` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`vnd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1869 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `vnd_bills_charge_categories`
--

DROP TABLE IF EXISTS `vnd_bills_charge_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `vnd_bills_charge_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `vnd_bills_charge_description_categories`
--

DROP TABLE IF EXISTS `vnd_bills_charge_description_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `vnd_bills_charge_description_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(50) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `min_range` float NOT NULL DEFAULT 0,
  `max_range` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `vnd_bills_charges`
--

DROP TABLE IF EXISTS `vnd_bills_charges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `vnd_bills_charges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `charge` float DEFAULT NULL,
  `credit` float DEFAULT NULL,
  `entrydate` datetime DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `can_be_multiplied_by` int(11) NOT NULL DEFAULT 1,
  `multiplier` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=218 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `vnd_pay_period_bill_date_passed`
--

DROP TABLE IF EXISTS `vnd_pay_period_bill_date_passed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `vnd_pay_period_bill_date_passed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_date_id` int(11) DEFAULT NULL,
  `pay_period_id` int(11) DEFAULT NULL,
  `is_enabled` tinyint(4) NOT NULL DEFAULT 0,
  `multiplier` int(11) NOT NULL DEFAULT 1,
  `bill_date` date NOT NULL DEFAULT current_timestamp(),
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=198 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `vnd_pay_period_days`
--

DROP TABLE IF EXISTS `vnd_pay_period_days`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `vnd_pay_period_days` (
  `vnd_id` int(11) NOT NULL AUTO_INCREMENT,
  `month_num` int(11) NOT NULL,
  `pay_period_num` int(11) NOT NULL,
  `num_days` int(11) NOT NULL DEFAULT 16,
  PRIMARY KEY (`vnd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `vnd_user_settings`
--

DROP TABLE IF EXISTS `vnd_user_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `vnd_user_settings` (
  `vnd_id` int(11) NOT NULL AUTO_INCREMENT,
  `vnd_user_id` int(11) DEFAULT NULL,
  `vnd_current_balance` float DEFAULT NULL,
  `vnd_pay_date` datetime DEFAULT NULL,
  PRIMARY KEY (`vnd_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-03-23 15:10:56
