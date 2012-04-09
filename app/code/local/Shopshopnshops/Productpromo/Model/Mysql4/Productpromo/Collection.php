<?php

class Shopshopnshops_Productpromo_Model_Mysql4_Productpromo_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('productpromo/productpromo');
    }
}