<?php

$installer = $this;

$installer->startSetup();

$installer->run("

CREATE TABLE IF NOT EXISTS `category_promoheader` (
  `category_promoheader_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `layout_type` varchar(255) NOT NULL DEFAULT '',
  `image_text_array` text,
  `button_text_array` text,
  `button_url_array` text,
  `media_url_array` text,
  `larawan` varchar(255) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `created_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `store_id` smallint(6) DEFAULT NULL,
  `use_for_dames` smallint(6) DEFAULT NULL,
  `use_for_heren` smallint(6) DEFAULT NULL,
  `use_for_junior` smallint(6) DEFAULT NULL,
  `use_for_homeland` smallint(6) DEFAULT NULL,
  `main_block_color` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`category_promoheader_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

    ");
$installer->endSetup(); 