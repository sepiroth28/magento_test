<?php
/**
 * TNT shipping model
 *
 *
 * @package    Shopshopnshops_Tntshipping
 * @author     aris catan
 */
class Shopshopnshop_Tntshipping_Model_Carrier_Tntshipping
    extends Mage_Shipping_Model_Carrier_Abstract
    implements Mage_Shipping_Model_Carrier_Interface
{

    protected $_code = 'tntshipping';
    protected $_location = "";
	protected $_weight = 0.0;

    
    public function collectRates(Mage_Shipping_Model_Rate_Request $request)
    {
        if (!$this->getConfigFlag('active')) {
            return false;
        }
				
        $_weight = 0;
        if ($request->getAllItems()) {
            foreach ($request->getAllItems() as $item) {

                if ($item->getProduct()->isVirtual() || $item->getParentItem()) {
                    continue;
                }

                if ($item->getHasChildren() && $item->isShipSeparately()) {
                    foreach ($item->getChildren() as $child) {
                        if ($child->getFreeShipping() && !$child->getProduct()->isVirtual()) {
                            //$freeBoxes += $item->getQty() * $child->getQty();
							$_weight += $item->getProduct()->getWeight();
                        }
                    }
                } elseif ($item->getFreeShipping()) {
                    //$freeBoxes += $item->getQty();
					$_weight += $item->getProduct()->getWeight();
					
                }
				
            }
        }

		
		
        $result = Mage::getModel('shipping/rate_result');
		$this->hasTNTFor2kg();
		$available = Mage::helper('tntshipping/tntrates')->getAvailableTntShippingType();
			foreach($available as $_available){
				
					$tnt_rate = Mage::helper('tntshipping/tntrates')->getShippingRate($_available);
					$shippingPrice = $tnt_rate;    
				    $method = Mage::getModel('shipping/rate_result_method');
					$method->setCarrier('tntshipping');
				    //$method->setCarrierTitle($this->getConfigData('title'));
					$method->setCarrierTitle($_available);
				    $method->setMethod($_available);
				    $method->setMethodTitle($_available . '  (met tracking) ');
					$method->setPrice($shippingPrice);
				    $method->setCost($shippingPrice);
				    $result->append($method);
			}
			
        
		
        return $result;
    }

    public function getAllowedMethods()
    {
        return array('tntshipping'=>$this->getConfigData('name'));
    }
	public function hasTNTFor2kg(){
			
	}
	
}
