define([], function() {
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
            '/admin/students' : {
                templateUrl: 'html/admin/students.html',
                dependencies: ['app/controller/admin/StudentController']
            }
        }
    }
});