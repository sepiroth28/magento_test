<?php

class Shopshopnshop_Tntshipping_Model_Mysql4_Tntshipping extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the tntshipping_id refers to the key field in your database table.
        $this->_init('tntshipping/tntshipping', 'tntshipping_id');
    }
}