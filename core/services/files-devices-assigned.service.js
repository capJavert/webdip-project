'use strict';

angular.
module('core.services').
factory('FileDeviceAssigned', ['$resource',
    function($resource) {
        return $resource('/WebDiP/2015_projekti/WebDiP2015x005/backend/services/data/'+'files_devices_assigned'+'.php', {}, {
            query: {
                method: 'GET',
                params: {join: 'join', condition: 'condition', order: 'order', limit: 'limit', params: 'params'},
                isArray: false
            }
        });
    }
]).
factory('FileDeviceAssignedList', ['$resource',
    function($resource) {
        return $resource('/WebDiP/2015_projekti/WebDiP2015x005/backend/services/data/'+'files_devices_assigned'+'.php', {}, {
            query: {
                method: 'GET',
                isArray: true
            }
        });
    }
]);