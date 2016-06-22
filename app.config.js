'use strict';

angular.
module('phoneApp').
config(['$locationProvider' ,'$routeProvider',
    function config($locationProvider, $routeProvider) {
        //$locationProvider.hashPrefix('!');

        $routeProvider.
            when('/devices', {
              template: '<device-list></device-list>'
            }).
            when('/devices/:dId', {
                template: '<device-detail></device-detail>'
            }).
            when('/crud/:modelName/:mId', {
                template: '<crud></crud>'
            }).
            when('/crud/:modelName', {
                template: '<crud-list></crud-list>'
            }).
            when('/login', {
              template: '<login></login>'
            }).
            otherwise('/error/404', {
                template: '<error-404></error-404>'
            })
    }
]);
