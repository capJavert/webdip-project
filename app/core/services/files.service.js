'use strict';

angular.
module('core.services').
factory('File', ['$resource',
    function($resource) {
        return $resource('/backend/services/files', {}, {
            query: {
                method: 'GET',
                params: {join: 'join', condition: 'condition', order: 'order', limit: 'limit', params: 'params'},
                isArray: false
            }
        });
    }
]).
factory('FileList', ['$resource',
    function($resource) {
        return $resource('/backend/services/files', {}, {
            query: {
                method: 'GET',
                isArray: true
            }
        });
    }
]);