<?php

class Shopshopnshops_Promoheader_Block_Adminhtml_Layoutmanager_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('layoutmanager_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('promoheader')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('promoheader')->__('Item Information'),
          'title'     => Mage::helper('promoheader')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('promoheader/adminhtml_layoutmanager_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}
