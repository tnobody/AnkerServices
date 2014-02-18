/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
define([
    'app'
], function(app) {
    alert('Admin');
    app.controller('admin.StudentController', [
        '$scope', 'AuthorizationService',
        function($scope, AuthorizationService) {
        }
    ]);
});

