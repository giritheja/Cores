/*Name:tester.js
author:Giritheja
This file contains the module(test),controllers(testctr,loginCtr),and routes
for the page index.html
*/
//name of the module
var app = angular.module('test', ['ngRoute']);
//the routeProvider for navigating between different templates.
app.config(['$routeProvider', function($routeProvider) {
    $routeProvider.when(
            '/courses', { //redirect to course page
                templateUrl: 'course.html',
                controller: 'testctr'
            })
        .when('/submission', { //redirect to the submission page
            templateUrl: 'selected.html',
            controller: 'testctr'
        }).when('/home', { //redirect to home page which is shown at login
            templateUrl: 'home.html',
            controller: 'testctr'
        }).when('/login', {
            templateUrl: 'login.html', //redirect  to the login page
            controller: 'loginCtr'
        }).when('/register',{
        	templateUrl: 'register.html',
        	controller: 'regCtr'
        }).when('/', {
            templateUrl: 'welcome.html',
     //the first page
        }).otherwise({
            redirectTo: '/'
        });

}]);
app.directive('navBar', function() { //directive for the top navigation bar.
    return {
        restrict: 'E', //represents element
        templateUrl: 'navbar.html'
    };
});


/*The below service is created to be injected in both loginctr and testctr
	The function of the service is to determine whether the user is logged in
	or not and share with the other controller*/
app.service('loggedIn', function() {
    var property = false;
    var username = '';

    return {
        getProperty: function() {
            return property;
        },
        setProperty: function(value) {
            property = value;
        },
        getUsername: function() {
            return username;
        },
        setUsername: function(value) {
            username = value;
        }

    };
});
app.controller('navCtrl',['$scope','$http','$location','loggedIn',function($scope,$http,$location,loggedIn) {
    $scope.login=loggedIn.getProperty();
    console.log($scope.login);
    $scope.logout = function() {
            if (loggedIn.getProperty()) {
                $scope.loggedIn = false;
                loggedIn.setProperty(false);
                loggedIn.setUsername([]);
                $location.path('/');
                console.log("hello"); //for testing purpose
            } else {
                $location.path('/');
            }
        };
}])

app.controller('regCtr',['$scope','$http','$location','loggedIn',function($scope,$http,$location,loggedIn) {
	if (true){
		$scope.register=function(){
			$http({
				method:'POST',
				url:'register.php',
				data:{
					'name':$scope.name,
					'email':$scope.email,
					'username':$scope.username,
					'password':$scope.password,
					'phone_number':$scope.phone,
					'feereceipt':$scope.receipt,
					'bankname':$scope.bank,
					'cgpa':$scope.cgpa
				}
			}).success(function(data,status,headers,config){
				if(data){
				$scope.message1="Registration Succesfull";
				$location.path('/');
				console.log(data);
				}else{console.log("error with db");
					$scope.message1="Error in Registration";
				}
			}).error(function(data,status,headers,config){
				$console.log(data)
			})
		}
	}
}])
/*The testCtr is used to get courses from a php which in turn 
	interacts with mysql to get the courses for the user.Also it generates
	the list courses previously choosen by user by interacting with php file at the 
	backend*/
app.controller('testctr', ['$scope', '$http', '$location', 'loggedIn', function($scope, $http, $location, loggedIn) {
    if (loggedIn.getProperty()) { //Condition to check if the user is loggedin 
        $scope.username=loggedIn.getUsername();
        $scope.logout = function() {
            if (loggedIn.getProperty()) {
                $scope.loggedIn = false;
                loggedIn.setProperty(false);
                loggedIn.setUsername([]);
                $location.path('/');
                console.log("hello"); //for testing purpose
            } else {
                $location.path('/');
            }
        };
        $http({
                /*sending the username as a json to a php file which in turn queries mysql table
                    	with paramenter of the username as arguments and sending back the available courses
                    	in terms of a json object*/
                method: "POST",
                url: "test.php",
                data: {
                    'username': loggedIn.getUsername()
                	
                }

            })
            .success(function(data, status, headers, config) {
                $scope.courses = data; //the received courses are stores as array of objects in courses
            })
            .error(function(data, status, headers, config) {
                console.log('error');
            });
        $scope.showme = false; //this option is used for backlogs? button
        $scope.setBacklog = function() { //trigger the value each time backlogs button is pressed
            if ($scope.showme) $scope.showme = false;
            else $scope.showme = true;
        };
        /*The below functions sends selected courses as a json to a php file
        in the backend which updates Mysql table by using username as argument*/

        $scope.submission = function() {
            $scope.selectedCourses = []; //empty array to store selected courses
            for (var obj in $scope.courses) { //Adding selected courses
                if (obj.selected) $scope.selectedCourses += obj;
            }
            //$scope.courses.username=loggedIn.getUsername();
            $http({ //sending the selectedCourses to a php file as a json
                    method: "POST",
                    url: "submission.php",
                    data: $scope.courses

                })
                .success(function(data, status, headers, config) {
                    console.log(status + ' - ' + data);
                    $location.path('/submission'); //on successfully updating the table redirecting to the submission page
                })
                .error(function(data, status, headers, config) {
                    console.log('error');
                });
        };

    } else {
        $location.path('/'); //if user not logged redirect user to login page
    }
}]);
/*The loginCtr is responsible for the login related activities and also 
sets up the parameters of the loggedIn service which is also injected in testctr.
testctr uses the parameters of the loggedIn to get courses and to determine if the user
is logged in.*/
app.controller('loginCtr', ['$scope', '$http', '$location', 'loggedIn', function($scope, $http, $location, loggedIn) {
    if (loggedIn.getProperty()) {
        console.log(loggedIn.getProperty());
        $location.path('/home'); //if the user is logged in redirect to homepage
    } else {
        $scope.loggedIn = false;
        $scope.login = function() { //send the login form inputs to a php at backend which runs a query
            //against userdatabase to find if the user is valid or not. 
            $http({
                    method: "POST",
                    url: "login.php",
                    data: {
                        'username': $scope.username,
                        'password': $scope.password
                    }

                })
                .success(function(data, status, headers, config) {
                    console.log(data);
                    if (data=='true') {
                        loggedIn.setProperty(true); //if the user is valid then set the properties of the loggedIn service
                        loggedIn.setUsername($scope.username);
                        $scope.log=loggedIn.getProperty();
                        $location.path('/home');
                    } else {
                        $scope.loggedIn = false;
                    	$scope.message="Invalid Credentials"
                    	$scope.username=[];
                    	$scope.password=[];
                    }
                })
                .error(function(data, status, headers, config) {
                    console.log('error');
                });
        }; //if the user clicks logout change the loggedin properties n flush username property of loggedIn		
        
    }
}]);
//additional
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