var app = angular.module('test', ['ngRoute']);
	app.config([ '$routeProvider', function($routeProvider){
			$routeProvider.when(
		'/courses',{
		templateUrl:'course.html',
		controller:'testctr'})
		.when('/submission',{
			templateUrl:'selected.html',
			controller:'testctr'
		}).when('/home',{
			templateUrl:'home.html',
			controller:'testctr'
		}).when('/',{
		templateUrl:'login.html',
		controller:'loginCtr'
		}).otherwise({
			redirectTo:'/'
		}
		);
	
}]);
	app.service('loggedIn', function () {
        var  property= false;
        var username= '';

        return {
            getProperty: function () {
                return property;
            },
            setProperty: function(value) {
                property = value;
            },
            getUsername: function(){
            	return username;
            },
            setUsername: function( value){
            	username = value;
            }
        
        };
    });	


	app.controller('testctr', ['$scope', '$http', '$location','loggedIn',function ($scope, $http, $location,loggedIn) {
    if(loggedIn.getProperty()){
    $http({
        		method:"POST",
        		url:"test.php",
        		data:{'username':loggedIn.getUsername}

        	})
            .success(function (data, status, headers, config) {
    			$scope.courses=data;
    	})
            .error(function (data, status, headers, config) {
            console.log('error');
        });
    $scope.showme = false;
    $scope.setBacklog = function () {
        if ($scope.showme) $scope.showme = false;
        else $scope.showme = true;
    };


    $scope.submission = function () {
        $scope.selectedCourses = [];
        for (var obj in $scope.courses) {
            if (obj.selected) $scope.selectedCourses += obj;
        }
        $http({
        		method:"POST",
        		url:"submission.php",
        		data:$scope.courses

        	})
            .success(function (data, status, headers, config) {
            console.log(status + ' - ' + data);
        	$location.path('/submission');
        })
            .error(function (data, status, headers, config) {
            console.log('error');
        });
    };
    	
}else{
	$location.path('/');
}
}]);
	app.controller('loginCtr',['$scope', '$http', '$location','loggedIn',function ($scope, $http, $location,loggedIn) {
			if(loggedIn.getProperty()){
					$location.path('/home');
			}else{
			$scope.loggedIn=false;
			$scope.login=function(){
				$http({
        		method:"POST",
        		url:"login.php",
        		data:{'username':$scope.username,'password':$scope.password}

        	})
            .success(function (data, status, headers, config) {
            		if(data){
            			loggedIn.setProperty(true);
            			loggedIn.setUsername($scope.username);
            			$location.path('/home');
            		}else{
            			$scope.loggedIn=false;
            		}
        })
            .error(function (data, status, headers, config) {
            console.log('error');
        }
        );
		};		
		} 
	}]);
	app.directive('shakeThat', ['$animate', function($animate) {

  return {
    require: '^form',
    scope: {
      submit: '&',
      submitted: '='
    },
    link: function(scope, element, attrs, form) {
      // listen on submit event
      element.on('submit', function() {
        // tell angular to update scope
        scope.$apply(function() {
          // everything ok -> call submit fn from controller
          if (form.$valid) return scope.submit();
          // show error messages on submit
          scope.submitted = true;
          // shake that form
          $animate.addClass(element, 'shake', function() {
            $animate.removeClass(element, 'shake');
          });
        });
      });
    }
  };

}]);
