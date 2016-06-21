'use strict';

angular.
module('core.services').
factory('Form', ['$resource',
    function($resource) {
        return $resource('/backend/services/files', {}, {
            query: {
                method: 'GET',
                params: {model: 'model'},
                isArray: false
            }
        });
    }
]);