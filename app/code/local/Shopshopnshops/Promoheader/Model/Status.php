<?php

class Shopshopnshops_Promoheader_Model_Status extends Varien_Object
{
    const STATUS_ENABLED	= 1;
    const STATUS_DISABLED	= 2;

    static public function getOptionArray()
    {
        return array(
            self::STATUS_ENABLED    => Mage::helper('promoheader')->__('Enabled'),
            self::STATUS_DISABLED   => Mage::helper('promoheader')->__('Disabled')
        );
    }
}