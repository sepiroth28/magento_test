<?php

class Shopshopnshop_Tntshipping_Block_Adminhtml_Tntshipping_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('tntshipping_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('tntshipping')->__(''));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('tntshipping')->__('TNTShipping price CSV'),
          'title'     => Mage::helper('tntshipping')->__('TNTShipping price CSV'),
          'content'   => $this->getLayout()->createBlock('tntshipping/adminhtml_tntshipping_edit_tab_form')->toHtml(),
      ));
	  /*$this->addTab('form_view', array(
          'label'     => Mage::helper('tntshipping')->__('View TNT Shipping type'),
          'title'     => Mage::helper('tntshipping')->__('View TNT Shipping type'),
          'content'   => $this->getLayout()->createBlock('tntshipping/adminhtml_tntshipping_edit_tab_grid')->toHtml(),
      ));*/
      return parent::_beforeToHtml();
  }
}
