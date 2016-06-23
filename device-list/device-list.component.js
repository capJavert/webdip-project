'use strict';

// Register `deviceList` component, along with its associated controller and template
angular.
module('deviceList').
component('deviceList', {
    templateUrl: 'device-list/device-list.template.html',
        controller: ['$scope', '$window', '$routeParams', 'DeviceList', 'FileList',
            function DeviceListController($scope, $window, $routeParams, DeviceList, FileList) {
                var self = this;

                self.models = DeviceList.query({select: 'devices.*, fda.alt, f.name AS image', condition: "GET_BY_PROP", join: "LEFT JOIN files_devices_assigned fda ON fda.device_id=devices.id LEFT JOIN files f ON fda.file_id=f.id", params: {SPECprop: "devices.visible", value: 1}, group: "devices.id"}, function() {
                    //got data
                });
            }
    ]
});
