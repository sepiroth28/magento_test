<?php

class Shopshopnshops_Promoheader_Block_Adminhtml_Categorypromoheader_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('promoheader_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('promoheader')->__('Category promoheader'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('promoheader')->__('Item information'),
          'title'     => Mage::helper('promoheader')->__('Item information'),
          'content'   => $this->getLayout()->createBlock('promoheader/adminhtml_categorypromoheader_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}