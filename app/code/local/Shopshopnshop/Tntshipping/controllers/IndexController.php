<?php
class Shopshopnshop_Tntshipping_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/tntshipping?id=15 
    	 *  or
    	 * http://site.com/tntshipping/id/15 	
    	 */
    	/* 
		$tntshipping_id = $this->getRequest()->getParam('id');

  		if($tntshipping_id != null && $tntshipping_id != '')	{
			$tntshipping = Mage::getModel('tntshipping/tntshipping')->load($tntshipping_id)->getData();
		} else {
			$tntshipping = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($tntshipping == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$tntshippingTable = $resource->getTableName('tntshipping');
			
			$select = $read->select()
			   ->from($tntshippingTable,array('tntshipping_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$tntshipping = $read->fetchRow($select);
		}
		Mage::register('tntshipping', $tntshipping);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}