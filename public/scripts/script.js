var app = angular.module('myApp',[], function($interpolateProvider){
	$interpolateProvider.startSymbol('||~');
    $interpolateProvider.endSymbol('~||');
});


app.controller('GiverCtrl', function($scope, $http){
	$scope.go = function(url){
		
		var promise = $http({
			method: 'POST',
			url: url,
			data: { "msg": "ajax"}

		})
		.success(function(data, status, header, config){
			console.log(data);
			$scope.msg = data;
		});

	}
});