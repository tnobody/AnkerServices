/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var ankerServices = angular.module('ankerServices');
ankerServices.service('angular.service.ImportService', [
    '$q',
    '$http',
    function($q, $http) {
        var AOP = {
            intercept: function(pattern, intercepter, context) {
                var undefined;
                var that = this;
                context = context || window;
                patternParts = pattern.split('.');
                potentialMethod = patternParts[patternParts.length-1];
                if (context[method].apply !== undefined) {
                    var tempClosure = context[method];
                    context[method] = function() {
                        if (intercepter.before.apply !== undefined)
                            intercepter.before.apply(that, arguments);
                        var tempReturn = tempClosure.apply(that, arguments);
                        if (intercepter.after.apply !== undefined)
                            intercepter.after.apply(that, [tempReturn]);
                        console.log('The Return', tempReturn);
                        return tempReturn;
                    };
                }
            }
        };

        AOP.intercept(angular, 'module', {
            before: function() {
                console.log('module called with', arguments)
            },
            after: function(returnValue, originArgs) {
                AOP.intercept(returnValue, 'controller', {
                    before: function() {
                        console.log('controller called with', arguments);
                    },
                    after: function() {
                        console.log('controller returned with', arguments[0]);
                    }
                });
                console.log('module returned', returnValue, this)
            }
        });

        return {
            getMe: getMe
        };
    }]);

