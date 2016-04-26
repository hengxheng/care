$(function(){

	$("#add_quo").click(function(e){
		e.preventDefault();
		$(".q-field input").prop('readonly', true).addClass('readonly');
		$(".q-button").html('<a class="q-btn dark-blue-btn" href="#">Edit</a><a class="dark-blue-btn q-dbtn" href="#">Delete</a>');
		$(".quolification-block").append('<div class="form-row"><div class="q-field"><input type="text" name="quolification[]"></div><div class="q-button"></div></div>');
	});

	$(".quolification-block").on("click",".q-btn",function(e){
		e.preventDefault();
		var f = $(this).parent().parent().find("input");	
		if(f.prop('readonly')){
			f.prop('readonly',false).removeClass("readonly");
			$(this).html("OK");
		}
		else{
			f.prop('readonly',true).addClass("readonly");
			$(this).html("Edit");
		}
	});

	$(".quolification-block").on("click",".q-dbtn",function(e){
		e.preventDefault();
		var f = $(this).parent().parent('.form-row');	
		f.remove();
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

    $(".delete").click(function(e){
        var x = confirm("Delete this item?");
        if(x){
            return true;
        }
        else{
            e.preventDefault();
            return false;
        }
    });
});