'use strict';

angular.
module('core.services').
factory('Log', ['$resource',
    function($resource) {
        return $resource('/backend/services/logs', {}, {
            query: {
                method: 'GET',
                params: {join: 'join', condition: 'condition', order: 'order', limit: 'limit', params: 'params'},
                isArray: false
            }
        });
    }
]);