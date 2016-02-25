
var base_url = "http://localhost/care/public/";

$(function(){
	// var quo_count = 1; 
	// var service_count = 1;

	$("#add_quo").click(function(e){
		e.preventDefault();
		$(".quolification-block").append('<div class="form-row"><label>Qualification: </label><input type="text" name="quolification[]"></div>');
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
			$(this).css("background","#f47521");
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

    

    $("#account-down").click(function(e){
    	e.preventDefault();  	
		if($(".account-block").hasClass("actived")){
			$(".account-block").removeClass("actived");
		}
		else{
			$(".account-block").addClass("actived");
		}
    });

    
    $(document).click(function(e){
    	if(! $(e.target).closest('#account-down').length){
    		$(".account-block").removeClass("actived");
    	}
    });

    $("#mb-btn").click(function(e){
    	$("#main-menu-block").slideToggle();
    });

    $(".filter-sidebar h2").click(function(e){
    	$(".filter-sidebar form").slideToggle();
    });
});