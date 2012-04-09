<?php

class Shopshopnshop_Tntshipping_Block_Adminhtml_Tntshipping_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('tntshipping_form', array('legend'=>Mage::helper('tntshipping')->__('Csv to import')));
     
     
      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('tntshipping')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));

      $fieldset = $form->addFieldset('tntshipping_view', array('legend'=>Mage::helper('tntshipping')->__('View')));
	 $fieldset->addField('note', 'note', array(
          'text'     => Mage::helper('tntshipping')->__('<a href="#">View TNT table rate</a>'),
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
