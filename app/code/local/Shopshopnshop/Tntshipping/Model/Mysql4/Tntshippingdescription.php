<?php

class Shopshopnshop_Tntshipping_Model_Mysql4_Tntshippingdescription extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the tntshipping_description_id refers to the key field in your database table.
        $this->_init('tntshipping/tntshippingdescription', 'tntshipping_description_id');
    }
}
