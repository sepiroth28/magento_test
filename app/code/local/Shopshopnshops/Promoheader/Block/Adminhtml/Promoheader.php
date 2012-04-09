<?php
class Shopshopnshops_Promoheader_Block_Adminhtml_Promoheader extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  
  public function __construct()
  {
    $this->_controller = 'adminhtml_promoheader';
    $this->_blockGroup = 'promoheader';
    $this->_headerText = Mage::helper('promoheader')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('promoheader')->__('Add Item');
    parent::__construct();
  }
  function getLayoutBlocks($selected_layout){
		//## SETTING UP BLOCKS ON LAYOUT TYPE 1
		
		$block[] = array(
						'id'=>'1',
						'label'=>'BLOCK 1',
						'child' => $this->getBlockChildElement(1,1,1)
						);
		$block[] = array(
						'id'=>'2',
						'label'=>'BLOCK 2',
						'child' => $this->getBlockChildElementMedia(1,2,0)
					);
		$block[] = array(
						'id'=>'3',
						'label'=>'BLOCK 3',
						'child' => $this->getBlockChildElement(1,2,0)
					);
					
		$layouts['layout-1']=$block;
		unset($block);
		//## END #################################
		
		//## SETTING UP BLOCKS ON LAYOUT TYPE 2
		
		$block[] = array(
						'id'=>'block_1_image',
						'label'=>'BLOCK 1',
						'child' => $this->getBlockChildElement(2,1,1)
						);
		$block[] = array(
						'id'=>'2',
						'label'=>'BLOCK 2',
						'child' => $this->getBlockChildElement(2,2,0)
					);
		$block[] = array(
						'id'=>'3',
						'label'=>'BLOCK 3',
						'child' => $this->getBlockChildElement(2,3,0)
					);
		$block[] = array(
						'id'=>'block_1_image',
						'label'=>'BLOCK 4',
						'child' => $this->getBlockChildElement(2,4,0)
						);
		$block[] = array(
						'id'=>'2',
						'label'=>'BLOCK 5',
						'child' => $this->getBlockChildElement(2,5,0)
					);
		$block[] = array(
						'id'=>'3',
						'label'=>'BLOCK 6',
						'child' => $this->getBlockChildElement(2,6,0)
					);			
		$layouts['layout-2']=$block;
		unset($block);
		//## END #################################
		
		//## SETTING UP BLOCKS ON LAYOUT TYPE 3
		
		$block[] = array(
						'id'=>'block_1_image',
						'label'=>'BLOCK 1',
						'child' => $this->getBlockChildElement(3,1,1)
						);
		$block[] = array(
						'id'=>'2',
						'label'=>'BLOCK 2',
						'child' => $this->getBlockChildElement(3,2,0)
					);
		$block[] = array(
						'id'=>'3',
						'label'=>'BLOCK 3',
						'child' => $this->getBlockChildElement(3,3,0)
					);
		$block[] = array(
						'id'=>'block_1_image',
						'label'=>'BLOCK 4',
						'child' => $this->getBlockChildElement(3,4,0)
						);
					
		$layouts['layout-3']=$block;
		unset($block);
		//## END #################################
		
		//## SETTING UP BLOCKS ON LAYOUT TYPE 4
		
		$block[] = array(
						'id'=>'block_1_image',
						'label'=>'BLOCK 1',
						'child' => $this->getBlockChildElement(4,1,1)
						);
		$block[] = array(
						'id'=>'2',
						'label'=>'BLOCK 2',
						'child' => $this->getBlockChildElement(4,2,0)
					);
		$block[] = array(
						'id'=>'3',
						'label'=>'BLOCK 3',
						'child' => $this->getBlockChildElement(4,3,0)
					);
		$block[] = array(
						'id'=>'block_1_image',
						'label'=>'BLOCK 4',
						'child' => $this->getBlockChildElement(4,4,0)
						);
					
		$layouts['layout-4']=$block;
		unset($block);
		//## END #################################
		
		$layout_type_id = 5;
		$block[] = array(
						'id'=>'1',
						'label'=>'BLOCK 1',
						'child' => $this->getBlockChildElement(5,1,1)
						);
		$layouts['layout-5']=$block;
		
		return $layouts[$selected_layout];
  }
  
  function getSelectedLayoutBlocks($selected_layout){
		
		return $this->getLayoutBlocks($selected_layout);
  }
  function getBlockChildElement($layout,$block,$main_plate){
		if($layout!=null){
			$child_control = '<tr><td>
								<label for="image_text_' . $block .'">Image Text</label>
									<input class="input-text promo-textfield" name="block[' . $block .'][image_text]" id="image_text_' . $block .'" type="text"></td></tr>';
			$child_control .= '<tr><td>
								<label for="image_' . $block .'">Upload Image</label>
									<input class="promo-textfield" name="filename_' . $block .'" id="filename_' . $block . '" readonly="1" type="file"></td></tr>';
			$child_control .= '<tr><td>
								<label for="button_text_' . $block .'">Button Text</label>
									<input class="input-text promo-textfield" name="block[' . $block .'][button_text]" id="button_text_' . $block .'" type="text"></td></tr>';
			$child_control .= '<tr><td>
									<label for="button_text_url_' . $block .'">Button url</label>
									<input class="input-text promo-textfield" name="block[' . $block .'][button_url]" id="button_text_url_' . $block .'" type="text"></td></tr>';
			$child_control .= '	<tr>
									<td>
										<label for="promoheader-block-position">Position</label><br/>
											<select id="layout' . $layout . '-block' .  $block . '-position" name="layout' . $layout . '-block' .  $block . '-position" onchange="createCssForThisBlock(' . $layout .',' . $block . ',' . $main_plate . ')">
												<option >-select position-</option>
												<option value="promoheader_left:promoheader_bottom">LB (Bottom Left)</option>
												<option value="promoheader_left:promoheader_top">LT (Left Top)</option>
												<option value="promoheader_right:promoheader_bottom">RB (Right Bottom)</option>
												<option value="promoheader_right:promoheader_top">RT (Right Top)</option>
											</select>
									</td>
								</tr>';
			$child_control .=   '<tr>
									<td>
										<input class="input-text" type="hidden" id="layout' . $layout . '-block' . $block . '-position-css" name="block[' . $block . '][position]" value=""/>
									</td>
								</tr>';
			return $child_control;
		}
  }
  
  function getBlockChildElementMedia($layout){
	  if($layout!=null){
			$child_control = '<tr><td>
									<label for="media_url_' . $layout .'">Media url</label>
									<textarea class="input-text promo-textfield" name="block[' . $layout .'][media_url]" id="media_url_' . $layout .'"></textarea></td></tr>';
			return $child_control;
	  }
  }
}
