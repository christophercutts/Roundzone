<?php
/**
 * Created by PhpStorm.
 * User: Clutz
 * Date: 21/02/2015
 * Time: 23:37
 */

$table[] = "CREATE TABLE IF NOT EXISTS `url_route` (
  `id` int(11) NOT NULL,
  `request_uri` varchar(255) NOT NULL,
  `target_uri` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;";

$table[] = "ALTER TABLE `url_route` ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `request_uri` (`request_uri`);";

$table[] = "ALTER TABLE `url_route` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;";

$data = "INSERT INTO `url_route` (`id`, `request_uri`, `target_uri`) VALUES
(1, 'billy', 'character/view/1'),
(2, 'james', 'character/view/2');";