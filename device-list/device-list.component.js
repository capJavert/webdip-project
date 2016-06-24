'use strict';

// Register `deviceList` component, along with its associated controller and template
angular.
module('deviceList').
component('deviceList', {
    templateUrl: 'device-list/device-list.template.html',
        controller: ['$rootScope', '$scope', '$window', '$routeParams', 'DeviceList', 'CategoryList', 'AccessControl',
            function DeviceListController($rootScope, $scope, $window, $routeParams, DeviceList, CategoryList, AccessControl) {
                var self = this;

                console.log($rootScope.model.logged);

                self.user = AccessControl.get({route: "/devices"}, function(model) {
                });

                self.models = DeviceList.query({select: 'devices.*, fda.alt, dl.id AS liked, f.name AS image', condition: "GET_BY_PROP", join: "LEFT JOIN files_devices_assigned fda ON fda.device_id=devices.id LEFT JOIN files f ON fda.file_id=f.id LEFT JOIN devices_likes dl ON dl.device_id=devices.id ", params: {SPECprop: "devices.visible", value: 1}, group: "devices.id"}, function() {
                    //got data
                });

                self.categories = CategoryList.query({select: 'categories.*, cl.id AS liked', join: "LEFT JOIN categories_likes cl ON cl.category_id=categories.id", group: "categories.id"}, function() {
                    //got data
                });

                $scope.Like = function (input) {
                    $.ajax({
                        type: "GET",
                        url: "/WebDiP/2015_projekti/WebDiP2015x005/backend/services/data/"+"like.php",
                        data: {id: input.getAttribute('data-id'), model: input.getAttribute('data-type')},
                        dataType: "json",
                        success: function(data)
                        {
                            if(data.success) {
                                if(data.id) {
                                    input.className = "like liked"
                                } else {
                                    input.className = "like"
                                }
                            }
                        }
                    });
                };
            }
    ]
});
