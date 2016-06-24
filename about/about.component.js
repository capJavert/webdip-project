'use strict';

// Register `about` component, along with its associated controller and template
angular.
module('about').
component('about', {
    templateUrl: 'about/about.template.html',
        controller: ['$rootScope', '$scope', '$window', '$routeParams', 'SurveyData',
            function AboutController($rootScope, $scope, $window, $routeParams, SurveyData) {
                var self = this;

            }
    ]
});
