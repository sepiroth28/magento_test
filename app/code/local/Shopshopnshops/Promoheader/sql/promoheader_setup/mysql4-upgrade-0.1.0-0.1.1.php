<?php

$installer = $this;

$installer->startSetup();

$installer->run("
	ALTER TABLE  `promoheader` ADD  `block_bg_color` VARCHAR( 45 ) NULL
    ");
$installer->endSetup(); 