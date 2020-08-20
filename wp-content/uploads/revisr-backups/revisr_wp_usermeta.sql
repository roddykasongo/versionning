DROP TABLE IF EXISTS `wp_usermeta`;
CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
LOCK TABLES `wp_usermeta` WRITE;
INSERT INTO `wp_usermeta` VALUES ('1','1','nickname','yummiz'), ('2','1','first_name',''), ('3','1','last_name',''), ('4','1','description',''), ('5','1','rich_editing','true'), ('6','1','syntax_highlighting','true'), ('7','1','comment_shortcuts','false'), ('8','1','admin_color','fresh'), ('9','1','use_ssl','0'), ('10','1','show_admin_bar_front','true'), ('11','1','locale',''), ('12','1','wp_capabilities','a:1:{s:13:\"administrator\";b:1;}'), ('13','1','wp_user_level','10'), ('14','1','dismissed_wp_pointers',''), ('15','1','show_welcome_panel','1'), ('16','1','session_tokens','a:1:{s:64:\"b7cc6b2ce6de537106dee7b67dc8d69b257439d47475c040dbbae5efb76b2377\";a:4:{s:10:\"expiration\";i:1598102820;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:105:\"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36\";s:5:\"login\";i:1597930020;}}'), ('17','1','wp_dashboard_quick_press_last_post_id','4'), ('18','1','wp_elementor_connect_common_data','a:6:{s:9:\"client_id\";s:32:\"d5eNzRTXogZcrbQBWKVR1D8kUvxCMOdn\";s:11:\"auth_secret\";s:32:\"KFE7gtcV3b8GZ5oFveDU8cwkm9ZdhkIy\";s:12:\"access_token\";s:32:\"7LmLL8jTxoyzdoMxFq42h3H2ib2iH9Tq\";s:19:\"access_token_secret\";s:32:\"T6g5wIiyyMcrmun8Jz00Tqb0LsC9Dk2X\";s:10:\"token_type\";s:6:\"bearer\";s:4:\"user\";O:8:\"stdClass\":1:{s:5:\"email\";s:23:\"roddynkidiaka@gmail.com\";}}'), ('19','1','elementor_introduction','a:1:{s:19:\"colorPickerDropping\";b:1;}');
UNLOCK TABLES;
