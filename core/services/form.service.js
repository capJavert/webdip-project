'use strict';

angular.
module('core.services').
factory('Form', ['$resource',
    function($resource) {
        return $resource('/WebDiP/2015_projekti/WebDiP2015x005/backend/services/data/'+'form'+'.php', {}, {
            query: {
                method: 'GET',
                params: {model: 'model', id: 'id'},
                isArray: false
            }
        });
    }
]);