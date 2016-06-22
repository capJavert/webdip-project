'use strict';

// Register `crud-list` component, along with its associated controller and template
angular.
module('crud').
component('crudList', {
    templateUrl: 'crud/crud-list.template.html',
    controller: ['$scope', '$window', '$routeParams', 'DeviceList', 'CategoryList', 'FileList', 'LogList', 'SurveyList', 'UserList', 'DeviceExtendedList', 'CategoryLikeList', 'CategoryUserAssignedList', 'DeviceLikeList', 'DeviceStoreList', 'DeviceStoreAssignedList', 'FileDeviceAssignedList', 'SurveyDataList', 'SurveyFieldList', 'UserRole', 'TimeList',
        function CrudListController($scope, $window, $routeParams, DeviceList, CategoryList, FileList, LogList, SurveyList, UserList, DeviceExtendedList, CategoryLikeList, CategoryUserAssignedList, DeviceLikeList, DeviceStoreList, DeviceStoreAssignedList, FileDeviceAssignedList, SurveyDataList, SurveyFieldList, UserRole, TimeList) {
            var self = this;
            self.type = $routeParams.modelName;

            switch($routeParams.modelName) {
                case 'devices':
                    self.models = DeviceList.query(null, function(models) {

                    });
                    self.modelsName = 'Device';
                    break;
                case 'categories':
                    self.models = CategoryList.query( function(models) {

                    });
                    self.modelsName = 'Category';
                    break;
                case 'files':
                    self.models = FileList.query( function(models) {

                    });
                    self.modelsName = 'File';
                    break;
                case 'logs':
                    self.models = LogList.query( function(models) {

                    });
                    self.modelsName = 'Log';
                    break;
                case 'surveys':
                    self.models = SurveyList.query( function(models) {

                    });
                    self.modelsName = 'Survey';
                    break;
                case 'users':
                    self.models = UserList.query( function(models) {

                    });
                    self.modelsName = 'User';
                    break;
                case 'devices-extended':
                    self.models = DeviceExtendedList.query( function(models) {

                    });
                    self.modelsName = 'DeviceExtended';
                    break;
                case 'devices-likes':
                    self.models = DeviceLikeList.query( function(models) {

                    });
                    self.modelsName = 'DeviceLike';
                    break;
                case 'devices-stores':
                    self.models = DeviceStoreList.query( function(models) {

                    });
                    self.modelsName = 'DeviceStore';
                    break;
                case 'devices-stores-assigned':
                    self.models = DeviceStoreAssignedList.query( function(models) {

                    });
                    self.modelsName = 'DeviceStoreAssigned';
                    break;
                case 'files-devices-assigned':
                    self.models = FileDeviceAssignedList.query( function(models) {

                    });
                    self.modelsName = 'FileDeviceAssigned';
                    break;
                case 'surveys-data':
                    self.models = SurveyDataList.query( function(models) {

                    });
                    self.modelsName = 'SurveyData';
                    break;
                case 'surveys-fields':
                    self.models = SurveyFieldList.query( function(models) {

                    });
                    self.modelsName = 'SurveyField';
                    break;
                case 'categories-likes':
                    self.models = CategoryLikeList.query( function(models) {

                    });
                    self.modelsName = 'CategoryLike';
                    break;
                case 'categories-users-assigned':
                    self.models = CategoryUserAssignedList.query( function(models) {

                    });
                    self.modelsName = 'CategoryUserAssigned';
                    break;
                case 'time':
                    self.models = TimeList.query( function(models) {

                    });
                    self.modelsName = 'Time';
                    break;
            }

            $scope.delete = function(model, id) {
                $.ajax({
                    type: "GET",
                    url: "/WebDiP/2015_projekti/WebDiP2015x005/backend/services/data/"+"delete.php"+"?model="+model+"&id="+id,
                    data: {object: JSON.stringify(self.form)},
                    dataType: "json",
                    success: function(data)
                    {
                        if(data.success) {
                            $window.location.href = "/WebDiP/2015_projekti/WebDiP2015x005/#/crud/"+$routeParams.modelName;
                        }
                        //saved
                    }
                });
            }
        }
    ]
});
