require.config({
    baseUrl: "js",
    paths: {
        'jquery' :          'lib/jquery.min',
        'bootstrap':        'lib/bootstrap.min',
        'angular':          'lib/angular.min',
        'angular-route':    'lib/angular-route.min',
        'underscore':       'lib/underscore.min'
    },
    shim: {
//        'angular':          ['jquery'],
        'angular-route':    ['angular'],
        'bootstrap':        ['jquery']
    },
    deps: ['app']
});

require(['app'], function (app) {
    angular.bootstrap(document, ['app']);
})