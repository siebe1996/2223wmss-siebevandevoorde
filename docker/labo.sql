SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

DROP DATABASE IF EXISTS `wmss-labo`;

CREATE DATABASE `wmss-labo` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `wmss-labo`;

--
-- Table structure for table `events`
--
DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies` (
                          `id` int(11) NOT NULL,
                          `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                          `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                          `zip` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
                          `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                          `activity` text COLLATE utf8mb4_unicode_ci NOT NULL,
                          `vat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                          `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Dumping data for table `users`
--

INSERT INTO `companies` (`id`, `name` , `address`, `zip`, `city`, `activity`, `vat`, `date_added`) VALUES
(1, 'Odisee VZW', 'Warmoesberg 26', '1000', 'Brussel', 'Education', 'BE 0408.429.584', '2021-10-15 13:30:00' ),
(2, 'Stad Gent', 'Botermarkt 1', '9000', 'Gent', 'Municipal adminstration', 'BE 0207.451.227', '2021-10-15 13:33:16' );
;


--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;




DROP DATABASE IF EXISTS `tasklist`;
CREATE DATABASE `tasklist` DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci;
USE `tasklist`;

CREATE TABLE `tasks` (
                         `id` int(11) NOT NULL auto_increment,
                         `name` varchar(255) NOT NULL,
                         `priority` enum('high','normal','low') NOT NULL,
                         `added_on` datetime NOT NULL,
                         PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci AUTO_INCREMENT = 4;


INSERT INTO `tasks` VALUES (1, 'Een dringende taak', 'high', now());
INSERT INTO `tasks` VALUES (2, 'Een normale taak', 'normal', now());
INSERT INTO `tasks` VALUES (3, 'Een niet zo belangrijke taak', 'low', now());
INSERT INTO `tasks` VALUES (7, '🍰 Taart eten', 'normal', now());

DROP DATABASE IF EXISTS `tasklist`;
CREATE DATABASE `tasklist` DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci;
USE `tasklist`;

CREATE TABLE `tasks` (
                         `id` int(11) NOT NULL auto_increment,
                         `user_id` int(11),
                         `name` varchar(255) NOT NULL,
                         `priority` enum('high','normal','low') NOT NULL,
                         `added_on` datetime NOT NULL,
                         PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci AUTO_INCREMENT = 4;


INSERT INTO `tasks` VALUES (1, 1, 'Een dringende taak', 'high', now());
INSERT INTO `tasks` VALUES (2, 2, 'Een normale taak', 'normal', now());
INSERT INTO `tasks` VALUES (3, 1, 'Een niet zo belangrijke taak', 'low', now());
INSERT INTO `tasks` VALUES (7, null, '🍰 Taart eten', 'normal', now());


CREATE TABLE `users` (
                         `id` int(11) NOT NULL auto_increment,
                         `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `username`, `password`) VALUES
                                                       (1, 'joris', '$2y$10$/FPq.CjbqsI5ShQTMP33SevKq4CuIPm1fI8gIhZY/Knm5TiVm1vnm'),
                                                       (2, 'pieter', '$2y$10$EbUrgw9iguKDLGZRiWYIK.bZbubV1AVmFMIsM.bOW/ioscH7Desle');

ALTER TABLE `tasks` ADD CONSTRAINT fk_user_id FOREIGN KEY (user_id) REFERENCES users(id);

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


DROP DATABASE IF EXISTS `helpdesk`;
CREATE DATABASE `helpdesk`
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_unicode_ci;

USE `helpdesk`;

# Dump of table companies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
                             `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                             `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
                             `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
                             `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                             `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                             `vat_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                             PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `companies` (`id`, `name`, `address`, `postal_code`, `city`, `vat_number`)
VALUES
    (1,'Odisee','Gebroeders de Smetstraat 1','9000','Gent','BE0408.429.584'),
    (2,'Café Robot','Bijlokehof 1','9000','Gent','BE9171.743.114');


# Dump of table contacts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contacts`;

CREATE TABLE `contacts` (
                            `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                            `company_id` int(10) unsigned NOT NULL,
                            `primary_contact` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
                            `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
                            `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            PRIMARY KEY (`id`),
                            KEY `contact_company` (`company_id`),
                            CONSTRAINT `contact_company` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `contacts` (`id`, `company_id`, `primary_contact`, `first_name`, `last_name`, `email`, `phone`)
VALUES
    (1,1,'1','Peter','De Meester','peter.demeester@odisee.be',NULL),
    (2,1,'0','Joris','Maervoet','joris.maervoet@odisee.be','+32 497 39 12 75'),
    (3,2,'1','R','Botr','',NULL),
    (4,1,'0','Pieter','Van peteghem','pieter.vanpeteghem@odisee.be',NULL);


# Dump of table faq_categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `faq_categories`;

CREATE TABLE `faq_categories` (
                                  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                                  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
                                  `weight` int(11) NOT NULL DEFAULT '0',
                                  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `faq_categories` (`id`, `name`, `weight`)
VALUES
    (1,'Content management systems',0),
    (2,'User management',2),
    (3,'Tickets & follow-up',3);


# Dump of table faqs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `faqs`;

CREATE TABLE `faqs` (
                        `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                        `faq_category_id` int(11) unsigned NOT NULL,
                        `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
                        `answer` text COLLATE utf8mb4_unicode_ci,
                        PRIMARY KEY (`id`),
                        KEY `faq_category` (`faq_category_id`),
                        CONSTRAINT `faq_category` FOREIGN KEY (`faq_category_id`) REFERENCES `faq_categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `faqs` (`id`, `faq_category_id`, `question`, `answer`)
VALUES
    (1,1,'Mag ik zelf de updates installeren van mijn CMS?','Neen, dat mag je niet'),
    (2,1,'Wat kan ik met een WYSIWYG?','Een WYSIWYG editor is zoals de slimme versie van een textarea. Je kan zelf de opmaak wat beïnvloeden en zo de look & feel van die inhoud zelf uitwerken.\n\nWYSIWYG staat voor What You See Is What You Get.'),
    (3,2,'Kan ik andere gebruikers aanmaken en/of verwijderen','Afhankelijk van jouw rol kan je zelf ook gebruikers aanmaken, aanpassen en zelfs verwijderen.'),
    (4,3,'Hoe lang kan een ticket maximum onbeantwoord blijven?','We doen ons uitereste best om heel snel te reageren, zowel op de vraag als de anticipatie bij het antwoord. Helaas kunnen we geen garantieën bieden aangezien elke vraag anders kan zijn en de bijhorende impact ook.'),
    (5,3,'Hoe lang kan een ticket onopgelost blijven?','We doen ons uitereste best om heel snel te reageren, zowel op de vraag als de anticipatie bij het antwoord. Helaas kunnen we geen garantieën bieden aangezien elke vraag anders kan zijn en de bijhorende impact ook.'),
    (6,3,'Is er een telefoonnummer waar we de helpdesk kunnen bereiken?','Neen');


# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
                         `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                         `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
                         PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `roles` (`id`, `name`)
VALUES
    (1,'admin'),
    (2,'client'),
    (3,'helpdesk'),
    (4,'crm manager');


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
                         `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                         `role_id` int(11) unsigned NOT NULL,
                         `company_id` int(11) unsigned DEFAULT NULL,
                         `verified` tinyint(1) NOT NULL DEFAULT '0',
                         `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
                         `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
                         `added_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                         PRIMARY KEY (`id`),
                         KEY `user_company` (`company_id`),
                         KEY `user_role` (`role_id`),
                         CONSTRAINT `user_company` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
                         CONSTRAINT `user_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `role_id`, `company_id`, `verified`, `username`, `password`, `added_on`)
VALUES
    (1,1,NULL,1,'joris','$2y$10$/FPq.CjbqsI5ShQTMP33SevKq4CuIPm1fI8gIhZY/Knm5TiVm1vnm','2021-10-02 22:14:14'),
    (2,1,NULL,0,'pieter','$2y$10$EbUrgw9iguKDLGZRiWYIK.bZbubV1AVmFMIsM.bOW/ioscH7Desle','2021-11-17 09:37:44');
