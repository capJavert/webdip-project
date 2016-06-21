'use strict';

angular.
module('core.services').
factory('User', ['$resource',
    function($resource) {
        return $resource('/backend/services/users', {}, {
            query: {
                method: 'GET',
                params: {join: 'join', condition: 'condition', order: 'order', limit: 'limit', params: 'params'},
                isArray: false
            }
        });
    }
]).
factory('UserList', ['$resource',
    function($resource) {
        return $resource('/backend/services/users', {}, {
            query: {
                method: 'GET',
                isArray: true
            }
        });
    }
]);