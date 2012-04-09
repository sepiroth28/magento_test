<?php
class Shopshopnshops_Promoheader_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/promoheader?id=15 
    	 *  or
    	 * http://site.com/promoheader/id/15 	
    	 */
    	/* 
		$promoheader_id = $this->getRequest()->getParam('id');

  		if($promoheader_id != null && $promoheader_id != '')	{
			$promoheader = Mage::getModel('promoheader/promoheader')->load($promoheader_id)->getData();
		} else {
			$promoheader = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($promoheader == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$promoheaderTable = $resource->getTableName('promoheader');
			
			$select = $read->select()
			   ->from($promoheaderTable,array('promoheader_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$promoheader = $read->fetchRow($select);
		}
		Mage::register('promoheader', $promoheader);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}