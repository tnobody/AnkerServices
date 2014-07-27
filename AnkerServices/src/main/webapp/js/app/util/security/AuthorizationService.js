/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
define([
    'org.as/app',
    'org.as/app/util/security/AuthenticationService'
], function(app) {
    app.service('AuthorizationService', [
        'AuthenticationService', 
        function(AuthorizationService) {
        return {
            authorizationService : AuthorizationService,
        }    
    }]);
});

