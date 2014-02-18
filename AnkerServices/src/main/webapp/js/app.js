/* 
 * This File setup the Application
 */
define([
    'routes',
    'app/service/util/DependencyResolver',
    'angular-route'
], function(config, resolver) {
    var app = angular.module('app', ['ngRoute']);
    app.config([
        '$routeProvider',
        '$locationProvider',
        '$controllerProvider',
        '$compileProvider',
        '$filterProvider',
        '$provide',
        function($routeProvider, $locationProvider, $controllerProvider, $compileProvider, $filterProvider, $provide) {
            app.autowire = {};
            angular.extend(app, {
                controller: $controllerProvider.register,
                directive: $compileProvider.directive,
                filter: $filterProvider.register,
                factory: $provide.factory,
                service: $provide.service
            });
            $locationProvider.html5Mode(false);

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