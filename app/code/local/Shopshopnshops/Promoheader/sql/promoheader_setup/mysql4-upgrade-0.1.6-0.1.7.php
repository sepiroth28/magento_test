<?php

$installer = $this;

$installer->startSetup();

$installer->run("
	CREATE TABLE  `magento_test`.`promoheader_layout_manager` (
		`layoutmanager_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
		`title` VARCHAR( 255 ) NOT NULL ,
		`xml_content` TEXT NOT NULL ,
		`status` INT NOT NULL ,
		`remarks` INT NOT NULL
		) ENGINE=InnoDB ;
    ");
$installer->endSetup(); 
