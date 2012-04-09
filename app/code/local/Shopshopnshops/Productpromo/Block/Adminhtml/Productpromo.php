<?php
class Shopshopnshops_Productpromo_Block_Adminhtml_Productpromo extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_productpromo';
    $this->_blockGroup = 'productpromo';
    $this->_headerText = Mage::helper('productpromo')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('productpromo')->__('Add Item');
    parent::__construct();
  }
}