define([
    'app',
    'app/service/util/AuthenticationService',
], function(app) {
//    console.log(app.autowire.controller.toString());
    app.controller('HomeController', ['$scope', '$http', 'AuthenticationService', function($scope, $http, AuthenticationService) {
            $scope.user = {
                name: '',
                password: ''
            };
            $scope.auth = AuthenticationService;
            $scope.login = function() {
                AuthenticationService.login(
                    $scope.user.name,
                    $scope.user.password
                ).success(function() {
                    window.location.hash = '/admin/students';    
                }).error(function() {
                    alert('You are not logged in')
                });
            }
        }]);
});