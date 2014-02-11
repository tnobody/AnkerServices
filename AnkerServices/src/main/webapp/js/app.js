/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

define([
    'angular-route',
    'routes',
    'app/service/util/DependencyResolver'
], function(config, resolver) {
    var app = angular.module('app',['ngRoute']);
    app.config([
        '$routeProvider',
        '$locationProvider',
        '$controllerProvider',
        '$compileProvider',
        '$filterProvider',
        '$provider',
        function($routeProvider, $locationProvider, $controllerProvider, $compileProvider, $filterProvider, $provide) {
            angular.extend(app, {
                controller: $controllerProvider.register,
                directive: $compileProvider.directive,
                filter: $filterProvider.register,
                factory: $provide.factory,
                service: $provide.service
            });
            $locationProvider.html5Mode(true);

            if (config.routes) {
                angular.forEach(config.routes, function(route, path) {
                    $routeProvider.when(path, {
                        templateUrl: route.templateUrl,
                        resolve: resolver(route.dependencies)
                    });
                });
            }
        }
    ]);
    return app;
});