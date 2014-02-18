define([
    'app/service/util/RouterUtilService'
], function(router) {
    return {
        defaultRoutePath: '/',
        routes: {
            '/': {
                templateUrl: 'html/index.html',
                dependencies: ['app/controller/HomeController']
            },
            '/about': {
                templateUrl: 'html/about.html',
                dependencies: ['app/controller/AboutController']
            },
            '/admin/students' : router.create('admin.StudentController')
        }
    }
});