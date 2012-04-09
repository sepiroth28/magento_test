<?php

class Shopshopnshop_Tntshipping_Helper_Tntrates extends Mage_Core_Helper_Abstract
{
	public function getShippingRate($title){
		$location = $this->getCustomersTntZone();
		$weight = $this->getTotalWeight();
		
		$model = Mage::getModel('tntshipping/tntshipping');
		
		if($weight >=1 && $weight <=2){
			$_kilo = "2kg";
		}
		if($weight >2 && $weight <=5){
			$_kilo = "5kg";
		}
			
		else if($weight >5 && $weight <=10){
			$_kilo = "10kg";
		}
			
		else if($weight >10 && $weight <=20){
			$_kilo = "20kg";
		}
			
		else if($weight >=30){
			$_kilo = "30kg";
		}
		$collection = $model->getCollection()
							->addFieldToFilter('title',$title)
							->addFieldToFilter('location',$location);
		
		$data = $collection->getData();
		
		return $data[0][$_kilo];
		
	}

	public function getAvailableTntShippingType(){
	$location = $this->getCustomersTntZone();
		$model = Mage::getModel('tntshipping/tntshipping');
		$collection = $model->getCollection()
							->addFieldToFilter('location',$location);
		
		foreach($collection->getData() as $_data){
			$data[] = $_data['title'];
		}	
		
		return $data;
	}

	public function getTotalWeight(){
		$items = Mage::getSingleton('checkout/session')->getQuote()->getAllItems();
		$weight = 0;
		foreach($items as $item) {
			$weight += ($item->getWeight() * $item->getQty()) ;
		}

		return $weight;
	}
	public function getCurrentShippingCountryId(){		
	 	$address = Mage::getSingleton('checkout/session')->getQuote()->getShippingAddress();
		return $address->getCountryId();
	}
	public function getCustomersTntZone(){
		$country_code = $this->getCurrentShippingCountryId();
		if($country_code=='NL'){
			return $country_code;
		}
			
	}
} 

