<?php

$installer = $this;

$installer->startSetup();

$installer->run("
	ALTER TABLE  `category_promoheader` ADD  `layout_position_css_category` TEXT NULL
    ");
$installer->endSetup(); 