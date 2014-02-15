define([
    'app',
    'app/service/util/AuthenticationService',
    'app/test/fixtures/Server'
], function(app) {
//    console.log(app.autowire.controller.toString());
    app.controller('HomeController', ['$scope', '$http', 'AuthenticationService', function($scope, $http, AuthenticationService) {
            $scope.user = {
                name: '',
                password: ''
            };
                $scope.auth = AuthenticationService;
            $scope.login = function() {
                console.log('Jaeh');
                AuthenticationService.login(
                        $scope.user.name,
                        $scope.user.password
                        );
            }
        }]);
});