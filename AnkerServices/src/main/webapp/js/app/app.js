/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var ankerServices = angular.module('ankerServices', ['ngRoute']);

ankerServices.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
                when('/', {
                    templateUrl: 'html/index.html',
                    controller: 'HomeController'
                })
                ;
    }]);