<?php
class Shopshopnshops_Promoheader_Block_Renderpromoheader extends Mage_Core_Block_Template
{
   protected function _toHtml(){
      $main_block = new Mage_Core_Block_Template();
      $model = $this->getSelectedPromoheader();
      
      if(!empty($model)){
         $type = $model->getLayoutType();
         $main_block->setTemplate('promoheader/' . $type . '.phtml');		
         
      }
         //$pomoheader->getLayoutType();
      
      return $main_block->toHtml();
   }
   
   function getSelectedPromoheaderLayoutType(){
      
         $promoheader = $this->getSelectedPromoheader();
         
      return $promoheader->getLayoutType();
   }
   function loadPromoheader(){
				   	
	}
   
   function getSelectedPromoheader(){
      $promoheader = Mage::getModel('promoheader/promoheader')->getCollection()
                     ->addFieldToFilter('status',1)
                     ->addFieldToFilter('`default`',1);
      
      foreach($promoheader as $_promoheader){
         $_p = $_promoheader;
      }
      
      return  $_p;
      
   }
}
