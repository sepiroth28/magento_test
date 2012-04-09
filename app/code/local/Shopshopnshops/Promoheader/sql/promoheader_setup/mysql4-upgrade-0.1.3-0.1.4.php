<?php

$installer = $this;

$installer->startSetup();

$installer->run("
	ALTER TABLE `category_promoheader` ADD `use_for_dames_looks` INT NOT NULL AFTER `use_for_homeland` ,
	ADD `use_for_heren_looks` INT NOT NULL AFTER `use_for_dames_looks` ,
	ADD `use_for_junior_looks` INT NOT NULL AFTER `use_for_heren_looks` ,
	ADD `use_for_homeland_looks` INT NOT NULL AFTER `use_for_junior_looks` 

    ");
$installer->endSetup(); 