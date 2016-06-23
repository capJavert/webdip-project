'use strict';

// Register `deviceDetail` component, along with its associated controller and template
angular.
module('deviceDetail').
component('deviceDetail', {
    templateUrl: 'device-detail/device-detail.template.html',
    controller: ['$scope', '$window', '$routeParams', 'Device', 'FileList', 'DeviceExtended',
        function DeviceDetailController($scope, $window, $routeParams, Device, FileList, DeviceExtended) {
            var self = this;

            self.model = Device.get({condition: 'GET_BY_ID', params: {id: $routeParams.dId}}, function(model) {
                //got data
                self.modelExtended = DeviceExtended.get({condition: 'GET_BY_PROP', params: {SPECprop: "device_id", value: $routeParams.dId}}, function(model) {
                    //got data
                });
            });

            self.images = FileList.query({isArray: 1, condition: 'GET_BY_PROP', join: "LEFT JOIN files_devices_assigned fda ON fda.file_id=files.id", params: {SPECprop: "fda.device_id", value: $routeParams.dId}}, function(model) {
                //got data
                if(!model.length) {
                    self.noImages = true;
                } else {
                    self.setImage(model[0]);
                    self.noImages = false;
                }
            });

            self.setImage = function setImage(imageUrl) {
                self.mainImageUrl = imageUrl;
            };
        }
    ]
});
