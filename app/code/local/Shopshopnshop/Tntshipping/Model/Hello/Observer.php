<?php
class Shopshopnshops_Tntshipping_Model_Hello_Observer
{
	public function hello_world(Varien_Event_Observer $observer){
		 //we compare action name to see if that's action for which we want to add our own event
		echo $observer->getEvent()->getControllerAction()->getFullActionName();
		return $this;
	}
}
