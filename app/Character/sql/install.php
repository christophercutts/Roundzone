<?php
/**
 * Created by PhpStorm.
 * User: Clutz
 * Date: 21/02/2015
 * Time: 23:37
 */

$table[] = "CREATE TABLE IF NOT EXISTS `character` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `class` enum('Mage','Rogue','Warrior','Ranger') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;";

$table[] = "ALTER TABLE `character` ADD PRIMARY KEY (`id`);";

$table[] = "ALTER TABLE `character` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;";


$data = "INSERT INTO `character` (`id`, `name`, `age`, `gender`, `class`) VALUES
(1, 'Billy James Jr', 12, 'Male', 'Mage'),
(2, 'James Bob', 24, 'Male', 'Rogue');";