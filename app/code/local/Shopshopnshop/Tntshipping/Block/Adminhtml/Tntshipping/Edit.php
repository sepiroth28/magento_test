<?php

class Shopshopnshop_Tntshipping_Block_Adminhtml_Tntshipping_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'tntshipping';
        $this->_controller = 'adminhtml_tntshipping';
        
        $this->_updateButton('save', 'label', Mage::helper('tntshipping')->__('Import'));
        /*$this->_updateButton('delete', 'label', Mage::helper('tntshipping')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);
		*/
        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('tntshipping_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'tntshipping_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'tntshipping_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('tntshipping_data') && Mage::registry('tntshipping_data')->getId() ) {
            return Mage::helper('tntshipping')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('tntshipping_data')->getTitle()));
        } else {
            return Mage::helper('tntshipping')->__('Import Csv');
        }
    }
}
