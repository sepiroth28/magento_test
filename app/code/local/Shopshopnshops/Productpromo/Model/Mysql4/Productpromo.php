<?php

class Shopshopnshops_Productpromo_Model_Mysql4_Productpromo extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the productpromo_id refers to the key field in your database table.
        $this->_init('productpromo/productpromo', 'productpromo_id');
    }
}