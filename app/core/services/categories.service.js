'use strict';

angular.
module('core.services').
factory('Category', ['$resource',
    function($resource) {
        return $resource('/backend/services/categories', {}, {
            query: {
                method: 'GET',
                params: {join: 'join', condition: 'condition', order: 'order', limit: 'limit', params: 'params'},
                isArray: false
            }
        });
    }
]).
factory('CategoryList', ['$resource',
    function($resource) {
        return $resource('/backend/services/categories', {}, {
            query: {
                method: 'GET',
                isArray: true
            }
        });
    }
]);