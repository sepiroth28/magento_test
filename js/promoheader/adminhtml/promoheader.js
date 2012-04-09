$j(document).ready(
		function(){
			$j("#promoheaderGrid_filter_default_layout").attr("disabled","disabled");
			$j("#promoheaderGridcategory_filter_use_in_dames").attr("disabled","disabled");
			$j("#promoheaderGridcategory_filter_use_in_heren").attr("disabled","disabled");
			$j("#promoheaderGridcategory_filter_use_in_junior").attr("disabled","disabled");
			$j("#promoheaderGridcategory_filter_use_in_homeland").attr("disabled","disabled");
			
		}
);
createCssForThisBlock = function(layout_id,block_id,is_main_plate){
	var class_name = "layout" + layout_id + "-block" + block_id;
	var position = $j("#"+class_name + "-position-css");
	
	
	var image_text_class_name = " .promoheader .layout" + layout_id + ".block-" + block_id + " .image-text";
	var  main_plate = "";
	
	if(is_main_plate)
		main_plate = "main_plate";
	else
		main_plate = "normal_plate";
		
	var table_td = "table."+ main_plate + " td";
	
	position.val($j("#"+class_name+"-position").val());	
	
}

createCssForThisBlockForCategoryPromoheader = function(layout_id,block_id,is_main_plate){
	var class_name = "layout" + layout_id + "-block" + block_id;
	var position = $j("#"+class_name + "-position-css");
	
	
	var image_text_class_name = " .promoheader .layout" + layout_id + ".block-" + block_id + " .image-text";
	var  main_plate = "";
	
	if(is_main_plate)
		main_plate = "main_plate";
	else
		main_plate = "normal_plate";
		
	var table_td = "table."+ main_plate + " td";
	
	position.val($j("#"+class_name+"-position").val());	
	
}


