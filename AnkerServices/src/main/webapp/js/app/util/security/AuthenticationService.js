/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
define([
    'org.as/app'
], function(app) {
    app.factory('AuthenticationService', ['$http',
        function($http) {
            //local  vars
            return {
                user: {},
                tries: 0,
                login: function(user, password) {
                    var that = this;
                    return $http.post('login', {
                        user: user,
                        password: password
                    }).success(function(user) {
                        user.authenticated = true;
                        that.user = user;
                    }).error(function() {
                        that.tries++;
                        that.user = {
                            name: '',
                            roles: [],
                            authenticated: false
                        };
                    });
                },
                isAuthenticated: function() {
                    return this.authenticated;
                },
                logout: function() {
                    this.authenticated = false;
                }
            }
        }
    ]);

});

