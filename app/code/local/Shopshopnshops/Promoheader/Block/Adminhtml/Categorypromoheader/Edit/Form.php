<?php

class Shopshopnshops_Promoheader_Block_Adminhtml_Categorypromoheader_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form(array(
                                      'id' => 'edit_form',
                                      'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
                                      'method' => 'post',
        							  'enctype' => 'multipart/form-data'
                                   )
      );
	  
      $form->setUseContainer(true);
      $this->setForm($form);
	  
	  $layout_edit_id = $this->getRequest()->getParam('id');
	  $url = Mage::helper("adminhtml")->getUrl("promoheader/adminhtml_categorypromoheader/renderblock/",array("param1"=>1,"param2"=>2));
	  $edit_url = Mage::helper("adminhtml")->getUrl("promoheader/adminhtml_categorypromoheader/editblock/",array("edit_id"=>$layout_edit_id));
	  
	 
	  $promoheader = Mage::getModel('promoheader/categorypromoheader')->getCollection($layout_edit_id)->getData();
	
	  if(isset($layout_edit_id)){
			echo '<script text="text/javascript">
			
					var note = document.getElementById("note");
						note.innerHTML = "<div class=" + $j("#layout_type").val() + "></div>";
					$j("#content_block").addClass("content-block");
					$j("#content_block").load("' . $edit_url . '");
					
				 </script>';
	  }
	  else{
			echo '<script type="text/javascript">
					
					function previewLayout(obj){
						var note = document.getElementById("note");
						note.innerHTML = "<div class=" + obj.value + "></div><div onClick=loadLayout(this) layout=" + obj.value + " class=load-layout-button >Load layout</div>";
						
					}
					function loadLayout(obj){
							$j("#content_block").html("");
							$j("#content_block").addClass("content-block");
							$j.ajax({
							  type : "GET",
							  url: "' . $url . '?layout_id="+ obj.getAttribute("layout"),
							  success: function(msg){
									$j("#content_block").html(msg);
									$j("#content_block").removeClass("content-block");
							  }
							});
						}
					
				  </script>
				';
	  }
      return parent::_prepareForm();
  }
}