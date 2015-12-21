
var base_url = "http://localhost/care/public/";

var app = {
 	
 	inital: function(){

 	}


}


$(function(){

	$("#add_quo").click(function(e){
		e.preventDefault();
		$(".quolification-block").append('<div class="form-row"><label>Quolification: </label><input type="text" name="quolification[]"></div>');
	});


	$('#avaiability-table input[type="hidden"]').each(function(){
		if($(this).val() == "1"){
			$(this).parent().find('.av-tick').css("background","green");
		}
	});

	$(".av-tick").click(function(e){
		e.preventDefault();
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

    $(".datepicker").datepicker({
    	dateFormat: 'yy-m-d'
    });

});