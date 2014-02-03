/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
define([
    'app'
], function(app) {
    app.register.service('MeService', function($q, $http) {
        var getMe = function() {
            var promise = $q.defer();
            $http.get('/me').success(function(data) {
                promise.resolve(data);
            }).error(function(data) {
                promise.reject(data);
            });
            return promise.promise;
        }
        return {
            getMe: getMe
        };
    })
});

