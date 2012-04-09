<?php
class Shopshopnshop_Tntshipping_Block_Tntshipping extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getTntshipping()     
     { 
        if (!$this->hasData('tntshipping')) {
            $this->setData('tntshipping', Mage::registry('tntshipping'));
        }
        return $this->getData('tntshipping');
        
    }
	
}
