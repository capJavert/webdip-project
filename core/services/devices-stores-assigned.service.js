'use strict';

angular.
module('core.services').
factory('DeviceStoreAssigned', ['$resource',
    function($resource) {
        return $resource('/WebDiP/2015_projekti/WebDiP2015x005/backend/services/data/'+'devices_stores_assigned'+'.php', {}, {
            query: {
                method: 'GET',
                params: {join: 'join', condition: 'condition', order: 'order', limit: 'limit', params: 'params'},
                isArray: false
            }
        });
    }
]).
factory('DeviceStoreAssignedList', ['$resource',
    function($resource) {
        return $resource('/WebDiP/2015_projekti/WebDiP2015x005/backend/services/data/'+'devices_stores_assigned'+'.php', {}, {
            query: {
                method: 'GET',
                isArray: true
            }
        });
    }
]);