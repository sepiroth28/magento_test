<?php
class Shopshopnshops_Promoheader_Block_Promoheader extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getPromoheader()     
     { 
        if (!$this->hasData('promoheader')) {
            $this->setData('promoheader', Mage::registry('promoheader'));
        }
        return $this->getData('promoheader');
        
    }
}