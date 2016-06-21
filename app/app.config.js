'use strict';

angular.
module('phoneApp').
config(['$locationProvider' ,'$routeProvider',
    function config($locationProvider, $routeProvider) {
        $locationProvider.hashPrefix('!');

        $routeProvider.
            when('/devices', {
              template: '<device-list></device-list>'
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
            when('/devices/:deviceId', {
              template: '<device-detail></device-detail>'
            })
    }
]);
