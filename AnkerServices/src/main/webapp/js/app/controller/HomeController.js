define([
    'app',
    'app/service/util/AuthenticationService',
], function(app) {
//    console.log(app.autowire.controller.toString());
    app.controller('HomeController', ['$scope', '$http', 'AuthenticationService', '$location', function($scope, $http, AuthenticationService, $location) {
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
                    $location.path('admin/student').replace();
                }).error(function() {
                    alert('You are not logged in')
                });
            }
        }]);
});