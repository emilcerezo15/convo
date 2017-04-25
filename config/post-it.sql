-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.5-10.1.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for postit
CREATE DATABASE IF NOT EXISTS `postit` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `postit`;


-- Dumping structure for table postit.tbl_activity
CREATE TABLE IF NOT EXISTS `tbl_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table postit.tbl_activity: ~10 rows (approximately)
/*!40000 ALTER TABLE `tbl_activity` DISABLE KEYS */;
INSERT INTO `tbl_activity` (`id`, `activity`) VALUES
	(1, 'message'),
	(2, 'post'),
	(3, 'comment'),
	(4, 'comment-reply'),
	(5, 'like'),
	(6, 'share'),
	(7, 'add friend'),
	(8, 'login'),
	(9, 'logout'),
	(10, 'change password');
/*!40000 ALTER TABLE `tbl_activity` ENABLE KEYS */;


-- Dumping structure for table postit.tbl_comments
CREATE TABLE IF NOT EXISTS `tbl_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `body` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `tbl_comments_tbl_post` (`post_id`),
  CONSTRAINT `tbl_comments_tbl_post` FOREIGN KEY (`post_id`) REFERENCES `tbl_posts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table postit.tbl_comments: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_comments` ENABLE KEYS */;


-- Dumping structure for table postit.tbl_comment_reply
CREATE TABLE IF NOT EXISTS `tbl_comment_reply` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `body` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table postit.tbl_comment_reply: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_comment_reply` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_comment_reply` ENABLE KEYS */;


-- Dumping structure for table postit.tbl_friends
CREATE TABLE IF NOT EXISTS `tbl_friends` (
  `user_id` int(11) DEFAULT NULL,
  `friend_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table postit.tbl_friends: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_friends` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_friends` ENABLE KEYS */;


-- Dumping structure for table postit.tbl_logs
CREATE TABLE IF NOT EXISTS `tbl_logs` (
  `user_id` int(11) DEFAULT NULL,
  `body` varchar(50) DEFAULT NULL,
  `activity_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `tbl_logs_tbl_activity` (`activity_id`),
  CONSTRAINT `tbl_logs_tbl_activity` FOREIGN KEY (`activity_id`) REFERENCES `tbl_activity` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table postit.tbl_logs: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_logs` ENABLE KEYS */;


-- Dumping structure for table postit.tbl_message
CREATE TABLE IF NOT EXISTS `tbl_message` (
  `thread_id` int(11) DEFAULT NULL,
  `body` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL COMMENT '1=unseen , 0 = seen',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `tbl_message_tbl_thread` (`thread_id`),
  CONSTRAINT `tbl_message_tbl_thread` FOREIGN KEY (`thread_id`) REFERENCES `tbl_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table postit.tbl_message: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_message` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_message` ENABLE KEYS */;


-- Dumping structure for table postit.tbl_posts
CREATE TABLE IF NOT EXISTS `tbl_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `tbl_posts_tbl_user_id` (`user_id`),
  CONSTRAINT `tbl_posts_tbl_user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table postit.tbl_posts: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_posts` ENABLE KEYS */;


-- Dumping structure for table postit.tbl_thread
CREATE TABLE IF NOT EXISTS `tbl_thread` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `createdBy_id` int(11) NOT NULL DEFAULT '0',
  `receiver_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table postit.tbl_thread: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_thread` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_thread` ENABLE KEYS */;


-- Dumping structure for table postit.tbl_users
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL DEFAULT '0',
  `firstname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL COMMENT '1 = online , 0 = offline',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table postit.tbl_users: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
