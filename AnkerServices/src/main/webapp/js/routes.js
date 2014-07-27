define([
    'app/service/util/RouterUtilService'
], function(router) {
    return {
        defaultRoutePath: '/',
        routes: {
            '/': {
                templateUrl: 'html/index.html',
                dependencies: ['org.as/app/HomeController']
            },
            '/about': {
                templateUrl: 'html/about.html',
                dependencies: ['app/AboutController']
            },
            '/admin/students' : router.create('admin.StudentController')
        }
    }
});