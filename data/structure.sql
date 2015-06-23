/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

use bdd;
# Dump of table conference
# ------------------------------------------------------------

DROP TABLE IF EXISTS `conference`;

CREATE TABLE `conference` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tracks` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `conference` WRITE;
/*!40000 ALTER TABLE `conference` DISABLE KEYS */;

INSERT INTO `conference` (`id`, `name`, `tracks`)
VALUES
	(1,'Agile Conference',1);

/*!40000 ALTER TABLE `conference` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table conference_talks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `conference_talks`;

CREATE TABLE `conference_talks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_conference` int(11) NOT NULL,
  `id_talk` int(11) NOT NULL,
  `track` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `conference_talks` WRITE;
/*!40000 ALTER TABLE `conference_talks` DISABLE KEYS */;

INSERT INTO `conference_talks` (`id`, `id_conference`, `id_talk`, `track`)
VALUES
	(1,1,1,1);

/*!40000 ALTER TABLE `conference_talks` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table talk
# ------------------------------------------------------------

DROP TABLE IF EXISTS `talk`;

CREATE TABLE `talk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `scheduledAt` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `talk` WRITE;
/*!40000 ALTER TABLE `talk` DISABLE KEYS */;

INSERT INTO `talk` (`id`, `title`, `scheduledAt`)
VALUES
	(1,'Specification','10:30-11:30');

/*!40000 ALTER TABLE `talk` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;