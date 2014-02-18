require.config({
    baseUrl: "js",
    paths: {
        'jquery': 'lib/jquery.min',
        'bootstrap': 'lib/bootstrap.min',
        'angular': 'lib/angular.min',
        'angular-route': 'lib/angular-route.min',
        'underscore': 'lib/underscore.min',
        'sinon': 'lib/sinon'
    },
    shim: {
//        'angular':          ['jquery'],
        'angular-route': ['angular'],
        'bootstrap': ['jquery']
    },
    deps: ['app']
});

require(['app'], function(app) {
    console.log('MAIN', app);
    angular.bootstrap(document, ['app']);
})