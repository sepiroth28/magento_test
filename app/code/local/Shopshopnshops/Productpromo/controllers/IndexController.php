<?php
class Shopshopnshops_Productpromo_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/productpromo?id=15 
    	 *  or
    	 * http://site.com/productpromo/id/15 	
    	 */
    	/* 
		$productpromo_id = $this->getRequest()->getParam('id');

  		if($productpromo_id != null && $productpromo_id != '')	{
			$productpromo = Mage::getModel('productpromo/productpromo')->load($productpromo_id)->getData();
		} else {
			$productpromo = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($productpromo == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$productpromoTable = $resource->getTableName('productpromo');
			
			$select = $read->select()
			   ->from($productpromoTable,array('productpromo_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$productpromo = $read->fetchRow($select);
		}
		Mage::register('productpromo', $productpromo);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}