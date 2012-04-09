<?php

class Shopshopnshop_Tntshipping_Block_Adminhtml_Tntshippingdescription_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('tntshipping_form', array('legend'=>Mage::helper('tntshipping')->__('Csv to import')));
     
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('tntshipping')->__('Title'),
          'required'  => false,
          'name'      => 'title',
	  ));

      if ( Mage::getSingleton('adminhtml/session')->getTntshippingData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getTntshippingData());
          Mage::getSingleton('adminhtml/session')->setTntshippingData(null);
      } elseif ( Mage::registry('tntshipping_data') ) {
          $form->setValues(Mage::registry('tntshipping_data')->getData());
      }
      return parent::_prepareForm();
  }
}
