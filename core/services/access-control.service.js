'use strict';

angular.
module('core.services').
factory('AccessControl', ['$resource',
    function($resource) {
        return $resource('/WebDiP/2015_projekti/WebDiP2015x005/backend/services/data/'+'access_control'+'.php', {}, {
            query: {
                method: 'GET',
                params: {route: 'route'},
                isArray: false
            }
        });
    }
]);