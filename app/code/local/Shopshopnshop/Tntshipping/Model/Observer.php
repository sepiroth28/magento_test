<?php
class Shopshopnshop_Tntshipping_Model_Observer 
{
	public function helloWorld($observer){
		
       	$footer_block = Mage::getSingleton('core/layout')->getBlock('footer');
		$identifier = Mage::getSingleton('cms/page')->getIdentifier();
		$route_name = Mage::app()->getFrontController()->getRequest()->getRouteName();

		
		/*echo 'routename:' . $route_name . '</br>';
		echo 'identifier:' . $identifier . '</br>';
		echo 'id:' . $id;*/
		
		if($route_name=="cms"){
			if($identifier==""){
				$block_id = "footer-homepage";		
			}
		}
		else{
			$block_id = "footer-" . $route_name;
		}
		$footer_block->setvar($block_id);
		
}
}
