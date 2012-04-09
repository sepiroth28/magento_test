<?php

$installer = $this;

$installer->startSetup();

$installer->run("
	ALTER TABLE  `promoheader` ADD  `layout_position_css` TEXT NULL
    ");
$installer->endSetup(); 