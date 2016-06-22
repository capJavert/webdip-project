'use strict';

angular.
module('core.services').
factory('User', ['$resource',
    function($resource) {
        return $resource('/WebDiP/2015_projekti/WebDiP2015x005/backend/services/data/'+'users'+'.php', {}, {
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
        return $resource('/WebDiP/2015_projekti/WebDiP2015x005/backend/services/data/'+'users'+'.php', {}, {
            query: {
                method: 'GET',
                isArray: true
            }
        });
    }
]);