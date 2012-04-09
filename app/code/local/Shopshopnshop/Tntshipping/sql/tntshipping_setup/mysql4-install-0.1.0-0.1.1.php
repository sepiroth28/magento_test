<?php

$installer = $this;

$installer->startSetup();

$installer->run("
-- DROP TABLE IF EXISTS {$this->getTable('tntshippingdescription')};
CREATE TABLE {$this->getTable('tntshippingdescription')} (
  `tntshipping_description_id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `description` varchar(255) NOT NULL default '',
  `status` smallint(6) NOT NULL default '0',
  PRIMARY KEY (`tntshipping_description_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO {$this->getTable('tntshippingdescription')} VALUES (null,'Pakket','',1);
INSERT INTO {$this->getTable('tntshippingdescription')} VALUES (null,'Aangetekend','',1);
INSERT INTO {$this->getTable('tntshippingdescription')} VALUES (null,'Verzekerservice','',1);
INSERT INTO {$this->getTable('tntshippingdescription')} VALUES (null,'Spoedservice','',1);
INSERT INTO {$this->getTable('tntshippingdescription')} VALUES (null,'Betaalservice','',1);

");

$installer->endSetup(); 
