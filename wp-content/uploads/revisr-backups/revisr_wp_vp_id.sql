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
INSERT INTO `wp_vp_id` VALUES ('��=C���MҘ�V�','comments','1'), ('&�M��K{�8�`a�u','postmeta','1'), ('�us��p@���\\�i�4','postmeta','2'), ('���!!B��\\p{.�','postmeta','6'), ('	vQ�\"4Mϡa�Y�A','postmeta','7'), ('��I��\'�\r���y','postmeta','8'), ('*V�2!nA(���]v��','postmeta','9'), ('��8��E܇{v�~�','postmeta','10'), ('�����\0H3��{0c8e9984fb7f50316557b8a76d08f56a9f3e1a69669e84539d454b2fd1dd06ae}zd�`','postmeta','11'), ('��\Z��G���rj\Zڔ�','postmeta','12'), ('U�U�b\\@��v�N�:','postmeta','13'), ('q����vCf�O-�\r��','postmeta','14'), ('��w��\ZF��F���','postmeta','15'), ('��p8�D,����ɥG','postmeta','16'), ('�w[Q|�F⋆ �\"$o','postmeta','17'), ('U�*��E	�I�{0c8e9984fb7f50316557b8a76d08f56a9f3e1a69669e84539d454b2fd1dd06ae}�턧','postmeta','18'), ('8g^FcE���qwv+�','postmeta','19'), ('i._�L�C�F��{�]q','postmeta','20'), ('�����LK?�QǊ��wU','postmeta','21'), ('���H�E �\ZA�e\n��','posts','1'), ('}TG?D�Mv��(��q�','posts','2'), ('�����DZ���rԻ�','posts','3'), ('4�8\Z!�FԈf`�Q','posts','6'), ('�\n�U8Fۡ>�#2�r','posts','8'), ('gD��T(KP���oJw{Y','posts','9'), ('�����SF^�ܤh-�5','terms','1'), ('.J��\\�L��,��\ZB��','term_taxonomy','1'), ('��=�}UC��#����j}','usermeta','1'), (' ��hV8I[�,ω��','usermeta','2'), ('�$�g�H��.\\���','usermeta','3'), ('ɊZpv?J��	tI�{�','usermeta','4'), ('h��W��G(��[��ToO','usermeta','5'), ('�7��\nIꋊ	|��\Z','usermeta','6'), ('�â�QC�$9-Ѱ0','usermeta','7'), ('7��]!F䎯� ��','usermeta','8'), ('���ndLg�S����','usermeta','9'), ('��\r:UKÁ?�adb�P','usermeta','10'), ('��Ү@T�D(m�t�N','usermeta','11'), ('=p��fH��ؗN���@','usermeta','12'), ('<$�F��L|��tk(.\"','usermeta','13'), ('�v�Y$�FA���ig���','usermeta','14'), ('�o�|�F��r_��cm','usermeta','15'), ('.4�r�I�_�T\r�E','usermeta','18'), ('m� �6�AN�W{Ĭ���','users','1');
UNLOCK TABLES;
