
var app = {
 	
 	inital: function(){

 	}


}


$(function(){
	// var quo_count = 1; 
	// var service_count = 1;

	$("#add_quo").click(function(e){
		// quo_count++;
		$(".quolification-block").append('<div class="form-row"><label>Quolification: </label><input type="text" name="quolification[]"></div>');
	});

	$("#add_serv").click(function(e){
		service_count++;
		$(".service-block").append('<div class="form-row"><label>Service '+
			service_count
			+': </label><input type="text" name="service[]"></div>');
	});

	$('#avaiability-table input[type="hidden"]').each(function(){
		if($(this).val() == "1"){
			$(this).parent().find('.av-tick').css("background","green");
		}
	});

	$(".av-tick").click(function(e){
		var el = $(this).parent().find('input[type="hidden"]');
		var va = el.val();
		if(va == "1"){
			el.val("0");
			$(this).css("background","#fff");
		}
		else{
			el.val("1");
			$(this).css("background","green");
		}
	});

	 $("#rateit").bind('rated', function (event, value) { 
	 	// console.log('You\'ve rated it: ' + value); 
	 });

    $("#rateit").bind('reset', function () { 
    	// console.log('Rating reset'); 
    });

    $("#rateit").bind('over', function (event, value) { 
    	// console.log('Hovering over: ' + value); 
    });
});