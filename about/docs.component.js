'use strict';

// Register `survey` component, along with its associated controller and template
angular.
module('about').
component('docs', {
    templateUrl: 'about/docs.template.html',
        controller: ['$rootScope', '$scope', '$window', '$routeParams', 'SurveyData',
            function DocsController($rootScope, $scope, $window, $routeParams, SurveyData) {
                var self = this;

            }
    ]
});
