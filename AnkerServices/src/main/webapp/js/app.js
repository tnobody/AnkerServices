/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
define([
    'angularAMD',
    'angular-route'
], function(angularAMD) {
    var ankerServices = angular.module('ankerServices', ['ngRoute']);
    ankerServices.config(['$routeProvider',
        function($routeProvider) {
            $routeProvider
            .when('/', angularAMD.route({
                templateUrl: 'html/index.html',
                controller: 'HomeController',
                controllerUrl: 'app/controller/HomeController'
            }));
        }]);
    angularAMD.bootstrap(ankerServices);
    return ankerServices;
});