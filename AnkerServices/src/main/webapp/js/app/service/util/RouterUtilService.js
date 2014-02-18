define([
    'app',
    'app/service/util/DependencyResolver'
], function(app, resolver) {
    return {
        create: function(controller) {
            var route = {
                templateUrl: 'html/' + controller.replace('.', '/').replace('Controller', '').toLowerCase() + '.html',
                controller: controller,
                resolve: resolver(['app/service/' + controller.replace('.','/')])
            };
            console.log(route);
            return route;
        }
    };
});