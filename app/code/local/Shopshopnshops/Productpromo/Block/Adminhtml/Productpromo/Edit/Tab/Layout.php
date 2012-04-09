<?php

class Shopshopnshops_Productpromo_Block_Adminhtml_Productpromo_Edit_Tab_Layout extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('productpromo_layout', array('legend'=>Mage::helper('productpromo')->__('Layout Information')));
     
      $fieldset->addField('promolayout', 'select', array(
          'label'     => Mage::helper('productpromo')->__('Select layout'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'layout',
		'values'	  => array(
					    array(
						   'value'     => 1,
						   'label'     => Mage::helper('productpromo')->__('Layout 1'),
					    ),

					    array(
						   'value'     => 2,
						   'label'     => Mage::helper('productpromo')->__('Layout 2'),
					    ),
					)
      ));
   
      if ( Mage::getSingleton('adminhtml/session')->getProductpromoData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getProductpromoData());
          Mage::getSingleton('adminhtml/session')->setProductpromoData(null);
      } elseif ( Mage::registry('productpromo_data') ) {
          $form->setValues(Mage::registry('productpromo_data')->getData());
      }
      return parent::_prepareForm();
  }
}
