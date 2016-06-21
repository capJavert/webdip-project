'use strict';

angular.
module('core.services').
factory('Form', ['$resource',
    function($resource) {
        return $resource('/backend/services/form', {}, {
            query: {
                method: 'GET',
                params: {model: 'model', id: 'id'},
                isArray: false
            }
        });
    }
]);