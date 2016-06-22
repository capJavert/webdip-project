'use strict';

angular.
module('core.services').
factory('File', ['$resource',
    function($resource) {
        return $resource('/WebDiP/2015_projekti/WebDiP2015x005/backend/services/data/'+'files'+'.php', {}, {
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
        return $resource('/WebDiP/2015_projekti/WebDiP2015x005/backend/services/data/'+'files'+'.php', {}, {
            query: {
                method: 'GET',
                isArray: true
            }
        });
    }
]);