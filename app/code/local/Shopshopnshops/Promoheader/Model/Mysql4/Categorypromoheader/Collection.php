<?php

class Shopshopnshops_Promoheader_Model_Mysql4_Categorypromoheader_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('promoheader/categorypromoheader');
    }
}