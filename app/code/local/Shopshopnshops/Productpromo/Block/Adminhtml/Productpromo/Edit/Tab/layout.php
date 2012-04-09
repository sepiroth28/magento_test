<?php

class Shopshopnshops_Productpromo_Block_Adminhtml_Productpromo_Edit_Tab_Layout extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('productpromo_layout', array('legend'=>Mage::helper('productpromo')->__('Layout Information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('productpromo')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('categories_array', 'text', array(
          'label'     => Mage::helper('productpromo')->__('Categories'),
          'required'  => false,
          'name'      => 'categories_array',
	  ));
		$fieldset->addField('product_array', 'text', array(
          'label'     => Mage::helper('productpromo')->__('Products'),
          'required'  => false,
          'name'      => 'products_array',
	  ));
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('productpromo')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('productpromo')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('productpromo')->__('Disabled'),
              ),
          ),
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
