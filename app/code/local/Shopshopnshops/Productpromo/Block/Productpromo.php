<?php
class Shopshopnshops_Productpromo_Block_Productpromo extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getProductpromo()     
     { 
        if (!$this->hasData('productpromo')) {
            $this->setData('productpromo', Mage::registry('productpromo'));
        }
        return $this->getData('productpromo');
        
    }
}