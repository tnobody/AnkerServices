/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
define([
    '../../../app',
    'AuthenticationService'
], function(app) {
    app.service('AuthorizationService', [
        'AuthenticationService', 
        function(AuthorizationService) {
        return {
            authorizationService : AuthorizationService,
        }    
    }]);
});

