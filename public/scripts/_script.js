var app = angular.module('myApp',[], function($interpolateProvider){
	$interpolateProvider.startSymbol('||~');
    $interpolateProvider.endSymbol('~||');
});


app.controller('GiverCtrl', function($scope, $http){
	$scope.go = function(url){
		
		var promise = $http({
			method: 'POST',
			url: url,
			data: {	"giver_id" : 2,
					"service_name": "help" }

		})
		.success(function(data, status, header, config){
			console.log(data);
			$scope.msg = data;
		});

	}

	$scope.myservices = function(url){
		var promise = $http({
			method: "POST",
			url: url,
			data: { "uid": 2 }
		})
		.success(function(data, status, header, config){
			console.log(data);
			$scope.msg = data;
		});
	}

	var service_count = 1;
	$scope.add_service = function(){
		service_count++;
		var el = document.getElementsByClassName("service-block")[0];
		
		var wrapper = document.createElement("div");
		wrapper.className = 'form-row';
		var label = document.createElement("label");
		label.innerHTML = 'Service '+service_count +':';
		var input = document.createElement("input");
		input.type = "text";
		input.name = "service[]";
		wrapper.appendChild(label);
		wrapper.appendChild(input);
		el.appendChild(wrapper);
				
	}

	var quo_count = 1;
	$scope.add_quolification = function(){
		quo_count++;
		var el = document.getElementsByClassName("quolification-block")[0];
		
		var wrapper = document.createElement("div");
		wrapper.className = 'form-row';
		var label = document.createElement("label");
		label.innerHTML = 'Quolification '+quo_count +':';
		var input = document.createElement("input");
		input.type = "text";
		input.name = "quolification[]";
		wrapper.appendChild(label);
		wrapper.appendChild(input);
		el.appendChild(wrapper);			
	}

	$scope.avai = function($event){
		console.log($event.currentTarget());
	}
});