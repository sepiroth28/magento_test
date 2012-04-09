<?php

class Shopshopnshop_Tntshipping_Block_Adminhtml_Tntshipping_Edit_Tab_Table extends Mage_Core_Block_Template
{
	 protected function _toHtml(){
		$block = new Mage_Core_Block_Template();
		
 		$block->setTemplate('tntshipping/table.phtml');
		$block->toHtml();
	}
}
