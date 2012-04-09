<?php
class Shopshopnshops_Promoheader_Block_Categoryrenderpromoheader extends Mage_Core_Block_Template
{
	public $category_promo_header;
	public $current_category = "";
	
	public function __construct(){
		parent::__construct();
	}
	
	protected function _toHtml(){
		$main_block = new Mage_Core_Block_Template();
		$looks=$this->getRequest()->getParam('looks');
		if($looks!=null && $looks=='true')
			$looks = "-looks";
		else
			$looks = "";
			
				$current_category = Mage::registry('current_category')->getName(); 
				;
					$model = $this->getPromoheaderOfThisCategory($current_category . $looks);
					if($model){
						$layout_type = $model->getLayoutType();
					}
					
				if($model!=null){
					if($current_category == 'Dames' || $current_category == 'Ladies'){
						
						Mage::register('current_category_promoheader',$model);
						$main_block->setTemplate('promoheader/' . $layout_type . '.phtml');
					}
					elseif($current_category == 'Heren' || $current_category == 'Men'){
						
						Mage::register('current_category_promoheader',$model);
						$main_block->setTemplate('promoheader/' . $layout_type . '.phtml');
					}
					elseif($current_category == 'Junior' || $current_category == 'Junior'){
						
						Mage::register('current_category_promoheader',$model);
						$main_block->setTemplate('promoheader/' . $layout_type . '.phtml');
					}
					elseif($current_category == 'Homeland' || $current_category == 'Homeland'){
						
						Mage::register('current_category_promoheader',$model);
						$main_block->setTemplate('promoheader/' . $layout_type . '.phtml');
					}
				}
			
		return $main_block->toHtml();
	}
	
	public function getPromoheaderOfThisCategory($current_category){
		
		switch($current_category){
			case 'Ladies':
			case 'Dames' : {
				$field = 'use_for_dames';
				
			}break;
			case 'Men':
			case 'Heren' : {
				$field = 'use_for_heren';
			}break;
			case 'Junior' : {
				$field = 'use_for_junior';
			}break;
			case 'Homeland' : {
				$field = 'use_for_homeland';
			}break;
			case 'Dames-looks' : {
				$field = 'use_for_dames_looks';
			}break;
			case 'Heren-looks' : {
				$field = 'use_for_heren_looks';
			}break;
			case 'Junior-looks' : {
				$field = 'use_for_junior_looks';
			}break;
			case 'Homeland-looks' : {
				$field = 'use_for_homeland_looks';
			}break;
		}
			
			$promoheader = Mage::getModel('promoheader/categorypromoheader')->getCollection()
								->addFieldToFilter('status',1)
								->addFieldToFilter($field,1);
		//$_p = null;	
			
		foreach($promoheader as $_promoheader){
			$_p = $_promoheader;
		}
		if($promoheader->count()){
			return $_p;
		}else{
			return null;
		}
	}
}
