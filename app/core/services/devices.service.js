'use strict';

angular.
module('core.services').
factory('Device', ['$resource',
  function($resource) {
    return $resource('/backend/services/devices', {}, {
      query: {
        method: 'GET',
        params: {join: 'join', condition: 'condition', order: 'order', limit: 'limit', params: 'params'},
        isArray: false
      }
    });
  }
]);