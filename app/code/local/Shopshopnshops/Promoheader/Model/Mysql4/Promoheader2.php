<?php

class Shopshopnshops_Promoheader_Model_Mysql4_Promoheader2 extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the promoheader_id refers to the key field in your database table.
        $this->_init('promoheader/promoheader2', 'promoheader_id');
    }
}