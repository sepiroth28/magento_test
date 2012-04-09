<?php
class Shopshopnshops_Promoheader_Block_Adminhtml_Layoutmanager extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  
  public function __construct()
  {
    $this->_controller = 'adminhtml_layoutmanager';
    $this->_blockGroup = 'promoheader';
    $this->_headerText = Mage::helper('promoheader')->__('Layout Manager');
    $this->_addButtonLabel = Mage::helper('promoheader')->__('Add Layout');
    parent::__construct();
  }
  
}
