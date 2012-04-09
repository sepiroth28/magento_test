<?php

class Shopshopnshop_Tntshipping_Model_Status2 extends Varien_Object
{
    const STATUS_ENABLED	= 1;
    const STATUS_DISABLED	= 2;

    static public function getOptionArray()
    {
        return array(
            self::STATUS_ENABLED    => Mage::helper('tntshipping')->__('Enabled'),
            self::STATUS_DISABLED   => Mage::helper('tntshipping')->__('Disabled')
        );
    }
}
