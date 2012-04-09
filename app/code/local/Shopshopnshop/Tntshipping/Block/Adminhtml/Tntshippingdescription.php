<?php
class Shopshopnshop_Tntshipping_Block_Adminhtml_Tntshippingdescription extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_tntshippingdescription';
    $this->_blockGroup = 'tntshipping';
    $this->_headerText = Mage::helper('tntshipping')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('tntshipping')->__('Add Item');
    parent::__construct();
  }
}
