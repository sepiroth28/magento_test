<?php

$installer = $this;

$installer->startSetup();

$installer->run("asdsad
-- DROP TABLE IF EXISTS {$this->getTable('tntshipping')};
CREATE TABLE {$this->getTable('tntshipping')} (
  `tntshipping_id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `location` varchar(255) NOT NULL default '',
  `2kg_with_tnt` double(10,2) NULL,
  `2kg` double(10,2) NULL,
  `5kg` double(10,2) NULL,
  `10kg` double(10,2) NULL,
  `20kg` double(10,2) NULL,
  `30kg` double(10,2) NULL,
  `status` smallint(6) NOT NULL default '0',
  `created_time` datetime NULL,
  `update_time` datetime NULL,
  PRIMARY KEY (`tntshipping_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");

$installer->endSetup(); 
