require.config({
    baseUrl: "js",
    paths: {
        'jquery' :          'lib/jquery.min',
        'bootstrap':        'lib/bootstrap.min',
        'angular':          'lib/angular.min',
        'angular-route':    'lib/angular-route.min',
        'angularAMD':       'lib/angularAMD.min'
    },
    shim: {
//        'angular':          ['jquery'],
        'angularAMD':       ['angular'], 
        'angular-route':    ['angular'],
        'bootstrap':        ['jquery']
    },
    deps: ['app']
});