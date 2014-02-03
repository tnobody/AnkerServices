define([
    'app',
    'app/service/MeService'
], function(app) {
    app.register.controller('HomeController', ['$scope', '$http', 'MeService', function($scope, $http, MeService) {
            $scope.me = MeService.getMe();
        }]);
});