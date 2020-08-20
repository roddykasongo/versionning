DROP TABLE IF EXISTS `wp_revisr`;
CREATE TABLE `wp_revisr` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `message` text DEFAULT NULL,
  `event` varchar(42) NOT NULL,
  `user` varchar(60) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
LOCK TABLES `wp_revisr` WRITE;
INSERT INTO `wp_revisr` VALUES ('1','2020-08-20 12:32:41','Created new branch: dev','branch','yummiz'), ('2','2020-08-20 12:32:41','Checked out branch: dev.','branch','yummiz'), ('3','2020-08-20 13:48:20','Committed <a href=\"http://localhost:8080/blessing/wp-admin/admin.php?page=revisr_view_commit&commit=559e9c5&success=true\">#559e9c5</a> to the local repository.','commit','yummiz'), ('4','2020-08-20 15:28:27','Successfully backed up the database.','backup','yummiz'), ('5','2020-08-20 15:28:30','Checked out branch: master.','branch','yummiz'), ('6','2020-08-20 18:07:08','Error pushing changes to the remote repository.','error','yummiz'), ('7','2020-08-20 18:07:28','Successfully backed up the database.','backup','yummiz'), ('8','2020-08-20 18:07:30','Error pulling changes from the remote repository.','error','yummiz');
UNLOCK TABLES;
