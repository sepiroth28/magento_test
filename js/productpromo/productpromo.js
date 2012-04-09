Event.observe(window, 'load', 
	function() {
		Event.observe('promolayout','change',updateLayoutBlocks);
	}
)

function updateLayoutBlocks(event){
	var element = event.element();
	block_count = element.value;
	alert($('products_form div table tbody'));
	
	/*var url = '');
	
	new Ajax.Request(url, {
	  method: 'get',
	  onSuccess: function(transport) {
	    var notice = $('products_form');
	    if (transport.responseText.match(/href="http:\/\/prototypejs.org/))
		 notice.update('Yeah! You are in the Top 10!').setStyle({ background: '#dfd' });
	    else
		 notice.update('Damn! You are beyond #10...').setStyle({ background: '#fdd' });
	  }
	});*/
	
}



