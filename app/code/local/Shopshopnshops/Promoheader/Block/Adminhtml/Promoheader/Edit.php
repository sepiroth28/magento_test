<?php

class Shopshopnshops_Promoheader_Block_Adminhtml_Promoheader_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'promoheader';
        $this->_controller = 'adminhtml_promoheader';
        
        $this->_updateButton('save', 'label', Mage::helper('promoheader')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('promoheader')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('promoheader_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'promoheader_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'promoheader_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('promoheader_data') && Mage::registry('promoheader_data')->getId() ) {
            return Mage::helper('promoheader')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('promoheader_data')->getTitle()));
        } else {
            return Mage::helper('promoheader')->__('Add Item');
        }
    }
}