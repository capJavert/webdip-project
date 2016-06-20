'use strict';

angular.
module('phonecatApp').
config(['$locationProvider' ,'$routeProvider',
    function config($locationProvider, $routeProvider) {
        $locationProvider.hashPrefix('!');

        $routeProvider.
            when('/phones', {
              template: '<phone-list></phone-list>'
            }).
            when('/login', {
              template: '<login></login>'
            }).
            when('/phones/:phoneId', {
              template: '<phone-detail></phone-detail>'
            }).
            otherwise('/phones');
    }
]);
