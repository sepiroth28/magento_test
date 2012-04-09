<?php

class Shopshopnshop_Tntshipping_Block_Adminhtml_Tntshippingdescription_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('tntshippingdescription_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('tntshipping')->__(''));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('tntshipping')->__('TNT Shipping type'),
          'title'     => Mage::helper('tntshipping')->__('TNT Shipping type'),
          'content'   => $this->getLayout()->createBlock('tntshipping/adminhtml_tntshippingdescription_edit_tab_form')->toHtml(),
      ));
	 
      return parent::_beforeToHtml();
  }
}
