'use strict';

// Register `deviceList` component, along with its associated controller and template
angular.
  module('deviceList').
  component('deviceList', {
    templateUrl: 'device-list/device-list.template.html',
    controller: ['Device',
      function DeviceListController(Device) {
        this.devices = Device.query();
      }
    ]
  });
