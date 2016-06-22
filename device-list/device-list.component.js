'use strict';

// Register `deviceList` component, along with its associated controller and template
angular.
module('deviceList').
component('deviceList', {
    templateUrl: 'device-list/device-list.template.html',
        controller: ['$scope', '$window', '$routeParams', 'DeviceList',
            function DeviceListController($scope, $window, $routeParams, DeviceList) {
                var self = this;

                self.models = DeviceList.query(null, function() {
                    //got data
                });
            }
    ]
});
