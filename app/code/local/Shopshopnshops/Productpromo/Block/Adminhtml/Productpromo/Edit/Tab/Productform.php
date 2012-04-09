<?php

class Shopshopnshops_Productpromo_Block_Adminhtml_Productpromo_Edit_Tab_Productform extends Mage_Adminhtml_Block_Widget_Form
{

	protected function _prepareForm()
	    {
		 	$form = new Varien_Data_Form(array(
                                      'id' => 'products_form',
                                      'action' => $this->getUrl('*/*/save_selected', array('id' => $this->getRequest()->getParam('id'))),
                                      'method' => 'post',
        							  'enctype' => 'multipart/form-data'
                                   )
      );
	 $fieldset = $form->addFieldset('products_form', array('legend'=>Mage::helper('productpromo')->__('Products displayed on layout')));
	 $fieldset->addField('product_1', 'text', array(
          'label'     => Mage::helper('productpromo')->__('Product for Block 1'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'product_1',
	 
      ));
	 
	 $form->addField('add_selected_product','button',array(
			'label'	=>	'Add selected product',
			'name'	=>	'add_selected_product',
			'value'	=>	'Add selected product',
			'type'	=>	'button',
	));
	
      $form->setUseContainer(true);
      $this->setForm($form);
      return parent::_prepareForm();
}
}

