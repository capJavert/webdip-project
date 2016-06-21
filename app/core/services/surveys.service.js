'use strict';

angular.
module('core.services').
factory('Survey', ['$resource',
    function($resource) {
        return $resource('/backend/services/surveys', {}, {
            query: {
                method: 'GET',
                params: {join: 'join', condition: 'condition', order: 'order', limit: 'limit', params: 'params'},
                isArray: false
            }
        });
    }
]).
factory('SurveyList', ['$resource',
    function($resource) {
        return $resource('/backend/services/surveys', {}, {
            query: {
                method: 'GET',
                isArray: true
            }
        });
    }
]);