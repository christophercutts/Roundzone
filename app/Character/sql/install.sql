CREATE TABLE IF NOT EXISTS `character` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `class` enum('Mage','Rogue','Warrior','Ranger') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB
  CHARSET=latin1;

INSERT INTO `character` (`id`, `name`, `age`, `gender`, `class`) VALUES
(1, 'Billy James Jr', 12, 'Male', 'Mage'),
(2, 'James Bob', 24, 'Male', 'Rogue');