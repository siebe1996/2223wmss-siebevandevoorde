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