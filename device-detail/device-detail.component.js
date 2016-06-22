'use strict';

// Register `deviceDetail` component, along with its associated controller and template
angular.
  module('deviceDetail').
  component('deviceDetail', {
    templateUrl: 'device-detail/device-detail.template.html',
    controller: ['$routeParams', 'Device',
      function DeviceDetailController($routeParams, Device) {
        var self = this;
        //self.device = Device.get({deviceId: $routeParams.deviceId}, function(device) {
          //self.setImage(device.images[0]);
        //});

        //self.setImage = function setImage(imageUrl) {
          //self.mainImageUrl = imageUrl;
        //};
      }
    ]
  });
