define([], function () {
   return {
       defaultRoutePath: '/',
       routes: {
           '/' : {
               templateUrl: 'html/index.html',
               dependencies: ['controller/HomeController']
           }
       }
   } 
});