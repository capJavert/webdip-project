'use strict';

// Register `deviceDetail` component, along with its associated controller and template
angular.
module('deviceDetail').
component('deviceDetail', {
    templateUrl: 'device-detail/device-detail.template.html',
    controller: ['$scope', '$window', '$routeParams', 'Device', 'DeviceExtended',
    function DeviceDetailController($scope, $window, $routeParams, Device, DeviceExtended) {
        var self = this;

        self.model = Device.get({condition: 'GET_BY_ID', params: {id: $routeParams.dId}}, function(model) {
            //got data
            self.modelExtended = DeviceExtended.get({condition: 'GET_BY_PROP', params: {SPECprop: "device_id", value: $routeParams.dId}}, function(model) {

            });
        });

        //self.device = Device.get({deviceId: $routeParams.deviceId}, function(device) {
        //self.setImage(device.images[0]);
        //});

        //self.setImage = function setImage(imageUrl) {
        //self.mainImageUrl = imageUrl;
        //};
        }
    ]
});
