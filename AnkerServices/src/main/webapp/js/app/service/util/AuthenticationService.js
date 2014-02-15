/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
define([
    'app'
], function(app) {
    app.factory('AuthenticationService', ['$http',
        function($http) {
            //local  vars
            return {
                authenticated: false,
                user: {},
                login: function(user, password) {
                    var that = this;
                    return $http.post('login',
                            {user: user, password: password}
                    ).success(function(user) {
                        that.authenticated = true;
                        that.user = user;
                        alert('dfgdg');
                    }).error(function() {
                        that.authenticated = false;
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

