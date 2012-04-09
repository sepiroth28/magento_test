<?php

class Shopshopnshops_Productpromo_Block_Adminhtml_Productpromo_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('productpromo_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('productpromo')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('productpromo')->__('Item Information'),
          'title'     => Mage::helper('productpromo')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('productpromo/adminhtml_productpromo_edit_tab_form')->toHtml(),
      ));
      $this->addTab('form_layout', array(
          'label'     => Mage::helper('productpromo')->__('Layout'),
          'title'     => Mage::helper('productpromo')->__('Layout'),
          'content'   => $this->getLayout()->createBlock('productpromo/adminhtml_productpromo_edit_tab_layout')->toHtml(),
      ));
       $this->addTab('form_products', array(
          'label'     => Mage::helper('productpromo')->__('Products to be display'),
          'title'     => Mage::helper('productpromo')->__('Products to be display'),
          'content'   => $this->getLayout()->createBlock('productpromo/adminhtml_productpromo_edit_tab_productform')->toHtml(),
      ));
      return parent::_beforeToHtml();
  }
}
