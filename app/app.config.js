'use strict';

angular.
module('phoneApp').
config(['$locationProvider' ,'$routeProvider',
    function config($locationProvider, $routeProvider) {
        $locationProvider.hashPrefix('!');

        $routeProvider.
            when('/phones', {
              template: '<phone-list></phone-list>'
            }).
            when('/crud/:modelName/:mId', {
                template: '<crud></crud>'
            }).
            when('/login', {
              template: '<login></login>'
            })/*.
            when('/phones/:phoneId', {
              template: '<phone-detail></phone-detail>'
            })*/
    }
]);
