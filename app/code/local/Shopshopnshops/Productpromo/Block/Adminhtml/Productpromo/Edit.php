<?php

class Shopshopnshops_Productpromo_Block_Adminhtml_Productpromo_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'productpromo';
        $this->_controller = 'adminhtml_productpromo';
        
        $this->_updateButton('save', 'label', Mage::helper('productpromo')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('productpromo')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('productpromo_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'productpromo_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'productpromo_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('productpromo_data') && Mage::registry('productpromo_data')->getId() ) {
            return Mage::helper('productpromo')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('productpromo_data')->getTitle()));
        } else {
            return Mage::helper('productpromo')->__('Add Item');
        }
    }
}