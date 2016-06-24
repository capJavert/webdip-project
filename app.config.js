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
            when("/about", {
                template: '<about></about>'
            }).
            when("/docs", {
                template: '<docs></docs>'
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
        var self = this;
        $rootScope.$on('$routeChangeStart',
            function(event, toState, toParams, fromState, fromParams){
				//force https for /login
				if(toState.originalPath=="/login") {
					$window.location.href = $window.location.href.replace("http://", "https://");
				}

                console.log(toState.originalPath);

                $rootScope.model = AccessControl.get({route: toState.originalPath}, function(model) {
                    $rootScope.baseUrl = "/WebDiP/2015_projekti/WebDiP2015x005/";
                    $rootScope.time = model.time;
                    $rootScope.navbar = {};

                    if(model.control>=0) {
                        $rootScope.navbar.home = {url: $rootScope.baseUrl, value: "Naslovna"};
                        $rootScope.navbar.devices = {url: $rootScope.baseUrl+"#/devices", value: "Uređaji"};
                        $rootScope.navbar.about = {url: $rootScope.baseUrl+"#/about", value: "O autoru"};
                        $rootScope.navbar.docs = {url: $rootScope.baseUrl+"#/docs", value: "Dokumentacija"};
                    }

                    if(model.control>=1) {

                    }

                    if(model.control>=2) {
                    }

                    if(model.control>=3) {

                    }

                    if(!model.access) {
                        if(model.logged) {
                            if(toState.originalPath!="/" && toState.originalPath!="")
                                alert("Nemate pravo pristup ovoj stranici. Obratite se Adminu za pomoć.");
                            $window.location.href = "/WebDiP/2015_projekti/WebDiP2015x005/#/devices";
                        } else {
                            $window.location.href = "/WebDiP/2015_projekti/WebDiP2015x005/#/login";
                        }
                    }
                });
        });
    }
]);