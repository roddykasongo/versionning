DROP TABLE IF EXISTS `wp_vp_id`;
CREATE TABLE `wp_vp_id` (
  `vp_id` binary(16) NOT NULL,
  `table` varchar(64) NOT NULL,
  `id` bigint(20) NOT NULL,
  PRIMARY KEY (`vp_id`),
  UNIQUE KEY `table_id` (`table`,`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
LOCK TABLES `wp_vp_id` WRITE;
INSERT INTO `wp_vp_id` VALUES ('£=C™¦MÒ˜«V‚','comments','1'), ('&ğMÁ K{«8À`añu','postmeta','1'), ('ÜusÖŞp@‘Ø\\¥iÃ4','postmeta','2'), ('«í!!B¤”\\p{.‘','postmeta','6'), ('	vQ–\"4MÏ¡aç·Y×A','postmeta','7'), ('ëÖI½¥\'¹\ròÁ»y','postmeta','8'), ('*Væ2!nA(ºËÒ]vÎÉ','postmeta','9'), ('ô÷8µãEÜ‡{vÅ~î','postmeta','10'), ('ƒÙà˜­\0H3 İ{0c8e9984fb7f50316557b8a76d08f56a9f3e1a69669e84539d454b2fd1dd06ae}zdÆ`','postmeta','11'), ('¦Ï\ZÄ³G“¾Œrj\ZÚ”î','postmeta','12'), ('U»U¦b\\@Œ¢vÁNá:','postmeta','13'), ('q¥ù¾“vCf‡O-œ\r­','postmeta','14'), ('¤Æw™\ZF£ÒFÿõÄ','postmeta','15'), ('äòp8˜D,»®¹É¥G','postmeta','16'), ('êw[Q|äFâ‹† ´\"$o','postmeta','17'), ('UÜ*Œ§E	²IÍ{0c8e9984fb7f50316557b8a76d08f56a9f3e1a69669e84539d454b2fd1dd06ae}¤í„§','postmeta','18'), ('8g^FcEşúqwv+¯','postmeta','19'), ('i._„LÙCºF‘ï{¶]q','postmeta','20'), ('Åô°ø†LK?‘QÇŠ–òwU','postmeta','21'), ('”â÷HÙE “\ZA÷e\nÅÊ','posts','1'), ('}TG?DMv§‚(ĞÀqã€','posts','2'), ('¶Ÿ÷ò†DZ·ĞÜrÔ»‹','posts','3'), ('4¶8\Z!üFÔˆf`÷Q','posts','6'), ('Î\nãU8FÛ¡>‚#2—r','posts','8'), ('gDèõT(KP»ÖöoJw{Y','posts','9'), ('‹±¿·öSF^¸Ü¤h-Ó5','terms','1'), ('.Jö—\\ıL²†,éı\ZB˜ë','term_taxonomy','1'), ('ÂÙ=•}UCû£#ßÁªúj}','usermeta','1'), (' ‹hV8I[‘,Ï‰Òë¥','usermeta','2'), ('„$İg»Hü°.\\»´ğ','usermeta','3'), ('ÉŠZpv?JŠ†	tIı{ã','usermeta','4'), ('h’ÓWşÒG(’Ô[÷‚ToO','usermeta','5'), ('à7ø›\nIê‹Š	|ÿ§\Z','usermeta','6'), ('³Ã¢QCğœ$9-Ñ°0','usermeta','7'), ('7ˆÙ]!Fä¯ †Ú','usermeta','8'), ('†”ôndLgSÚ¾­','usermeta','9'), ('¾ì\r:UKÃ?ËadbÀP','usermeta','10'), ('òŒã…Ò®@T«D(måt¦N','usermeta','11'), ('=p½¼fH·¥Ø—NÔ÷á@','usermeta','12'), ('<$¢FàˆL|¦ƒtk(.\"','usermeta','13'), ('Ôv¶Y$ƒFA½Üìigğ‹æ','usermeta','14'), ('¦oò|»Fı§r_¼¾cm','usermeta','15'), ('.4Ör½I‡_›T\røE','usermeta','18'), ('mç Ş6”ANW{Ä¬×Åß','users','1');
UNLOCK TABLES;
