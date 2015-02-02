<!doctype html>
<html lang="en" ng-app ="test">
<head><title>test</title>
<script src="lib/angular/angular.min.js"></script>
<script src="tester.js"></script>
</head>
<body ng-controller= "testctr">

		<p ng-repeat="course in courses">{{course.name}}</p>
</body>

</html>
