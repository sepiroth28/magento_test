<?php
class Shopshopnshops_Promoheader_Block_Layoutmanager extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getPromoheader()     
     { 
        if (!$this->hasData('Layoutmanager')) {
            $this->setData('Layoutmanager', Mage::registry('Layoutmanager'));
        }
        return $this->getData('Layoutmanager');
        
    }
}
