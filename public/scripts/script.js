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
});