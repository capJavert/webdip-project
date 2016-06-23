'use strict';

angular.
module('phoneApp').
config(['$routeProvider', '$locationProvider',
    function config($routeProvider, $locationProvider) {
        //$locationProvider.hashPrefix('!');
        //$locationProvider.html5Mode({
        //   //enabled: true,
        //    requireBase: false
        //});

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
            when('/registration', {
                template: '<registration></registration>'
            }).
            when("/", {
                template: '<device-list></device-list>'
            }).
            otherwise('/error/404', {
                template: '<error-404></error-404>'
            })
    }
]).
run(['$window', '$rootScope', 'User', 'AccessControl',
    function main($window, $rootScope, User, AccessControl) {
        $rootScope.$on('$routeChangeStart',
            function(event, toState, toParams, fromState, fromParams){
                if(typeof toState.originalPath=="") {
                    toState.originalPath = "/";
                }

                /*AccessControl.get({route: toState.originalPath}, function(model) {
                    if(!model.access) {
                        event.preventDefault();

                        if(model.logged) {
                            if(toState.originalPath!="/" && toState.originalPath!="")
                                alert("Nemate pravo pristup ovoj stranici. Obratite se Adminu za pomoć.");
                            $window.location.href = "/WebDiP/2015_projekti/WebDiP2015x005/#/devices";
                        } else {
                            $window.location.href = "/WebDiP/2015_projekti/WebDiP2015x005/#/login";
                        }
                    }
                });*/
            });
    }
]);