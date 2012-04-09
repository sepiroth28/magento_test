<?php

class Shopshopnshops_Promoheader_Block_Adminhtml_Promoheader_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
	  $promoheader = Mage::getModel('promoheader/promoheader')->getCollection()->getData();
	  $layout_edit_id = $this->getRequest()->getParam('id');
	  
	  $url = Mage::helper("adminhtml")->getUrl("promoheader/adminhtml_promoheader/renderblock/",array("param1"=>1,"param2"=>2));
	  
	  if($layout_edit_id == null){
			$disable_select_option = "";
	  }
	  else{
			$disable_select_option = "false";
			
	  }
	  
      $this->setForm($form);
	  
      $fieldset = $form->addFieldset('promoheader_form', array('legend'=>Mage::helper('promoheader')->__('Item information')));
      $fieldset->addField('default', 'select', array(
          'label'     => Mage::helper('promoheader')->__('Set as default layout'),
          'name'      => 'default',
          'values'    => array(
              array(
                  'value'     => 0,
                  'label'     => Mage::helper('promoheader')->__('No'),
              ),

              array(
                  'value'     => 1,
                  'label'     => Mage::helper('promoheader')->__('Yes'),
              ),
          ),
      ));
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('promoheader')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));
	  /**
         * Check is single store mode
         */
        if (!Mage::app()->isSingleStoreMode()) {
            $fieldset->addField('store_id', 'multiselect', array(
                'name'      => 'stores[]',
                'label'     => Mage::helper('promoheader')->__('Store View'),
                'title'     => Mage::helper('promoheader')->__('Store View'),
                'required'  => true,
                'values'    => Mage::getSingleton('adminhtml/system_store')->getStoreValuesForForm(false, true),
            ));
        }
        else {
            $fieldset->addField('store_id', 'hidden', array(
                'name'      => 'stores[]',
                'value'     => Mage::app()->getStore(true)->getId()
            ));
            $model->setStoreId(Mage::app()->getStore(true)->getId());
        }
		
	   $fieldset->addField('layout_type', 'select', array(
          'label'     => Mage::helper('promoheader')->__('Layout type'),
          'name'      => 'layout_type',
		  'onclick'   => 'previewLayout(this)',
		  'onchange'  => '',
		  'disabled'  => $disable_select_option,
          'values'    => array(
              array(
                  'value'     => 'layout-1',
                  'label'     => Mage::helper('promoheader')->__('Layout type 1'),
              ),

              array(
                  'value'     => 'layout-2',
                  'label'     => Mage::helper('promoheader')->__('Layout type 2'),
              ),
			  array(
                  'value'     => 'layout-3',
                  'label'     => Mage::helper('promoheader')->__('Layout type 3'),
              ),

              array(
                  'value'     => 'layout-4',
                  'label'     => Mage::helper('promoheader')->__('Layout type 4'),
              ),
			  array(
                  'value'     => 'layout-5',
                  'label'     => Mage::helper('promoheader')->__('Layout type 5'),
              ),
			
          ),
      ));
	  $fieldset->addField('block_bg_color', 'text', array(
          'label'     => Mage::helper('promoheader')->__('Main Block bgcolor'),
          'name'      => 'block_bg_color',
      ));
      	
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('promoheader')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('promoheader')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('promoheader')->__('Disabled'),
              ),
          ),
      ));

	  //Layout preview
	 $fieldset->addField('note', 'note', array(
		  'label'		 => 'Layout preview',
          'text'     => Mage::helper('promoheader')->__('<div class="layout-' . $promoheader[0]['layout_type'] . '"></div>'),
        ));
	
	 $fieldset->addField('Content', 'note', array(
		  'label'		 => 'Content',
          'text'     	 => Mage::helper('promoheader')->__('<div id="content_block" ><div>'),
        ));
		
		
      if ( Mage::getSingleton('adminhtml/session')->getPromoheaderData() )
      {
		  
          $form->setValues(Mage::getSingleton('adminhtml/session')->getPromoheaderData());
          Mage::getSingleton('adminhtml/session')->setPromoheaderData(null);
      } elseif ( Mage::registry('promoheader_data') ) {
			
          $form->setValues(Mage::registry('promoheader_data')->getData());
      }
      return parent::_prepareForm();
  }
  
}