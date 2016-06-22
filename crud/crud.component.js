'use strict';

// Register `crud` component, along with its associated controller and template
angular.
    module('crud').
    component('crud', {
        templateUrl: 'crud/crud.template.html',
        controller: ['$scope', '$window', '$routeParams', 'Form', 'Device', 'Category', 'File', 'Log', 'Survey', 'User', 'DeviceExtended', 'CategoryLike', 'CategoryUserAssigned', 'DeviceLike', 'DeviceStore', 'DeviceStoreAssigned', 'FileDeviceAssigned', 'SurveyData', 'SurveyField', 'UserRole',
            function CrudController($scope, $window, $routeParams, Form, Device, Category, File, Log, Survey, User, DeviceExtended, CategoryLike, CategoryUserAssigned, DeviceLike, DeviceStore, DeviceStoreAssigned, FileDeviceAssigned, SurveyData, SurveyField, UserRole) {
                var self = this;

                switch($routeParams.modelName) {
                    case 'devices':
                        self.model = Device.get({condition: 'GET_BY_ID', params: {id: $routeParams.mId}}, function(model) {

                        });
                        self.form = Form.query({model: 'Device', id: $routeParams.mId});
                        self.modelName = 'Device';
                        break;
                    case 'categories':
                        self.model = Category.get({condition: 'GET_BY_ID', params: {id: $routeParams.mId}}, function(model) {

                        });
                        self.form = Form.query({model: 'Category', id: $routeParams.mId});
                        self.modelName = 'Category';
                        break;
                    case 'files':
                        self.model = File.get({condition: 'GET_BY_ID', params: {id: $routeParams.mId}}, function(model) {

                        });
                        self.form = Form.query({model: 'File', id: $routeParams.mId});
                        self.modelName = 'File';
                        break;
                    case 'logs':
                        self.model = Log.get({condition: 'GET_BY_ID', params: {id: $routeParams.mId}}, function(model) {

                        });
                        self.form = Form.query({model: 'Log', id: $routeParams.mId});
                        self.modelName = 'Log';
                        break;
                    case 'surveys':
                        self.model = Survey.get({condition: 'GET_BY_ID', params: {id: $routeParams.mId}}, function(model) {

                        });
                        self.form = Form.query({model: 'Survey', id: $routeParams.mId});
                        self.modelName = 'Survey';
                        break;
                    case 'users':
                        self.model = User.get({condition: 'GET_BY_ID', params: {id: $routeParams.mId}}, function(model) {

                        });
                        self.form = Form.query({model: 'User', id: $routeParams.mId});
                        self.modelName = 'User';
                        break;
                    case 'devices-extended':
                        self.model = DeviceExtended.get({condition: 'GET_BY_ID', params: {id: $routeParams.mId}}, function(model) {

                        });
                        self.form = Form.query({model: 'DeviceExtended', id: $routeParams.mId});
                        self.modelName = 'DeviceExtended';
                        break;
                    case 'devices-likes':
                        self.models = DeviceLike.query( function(models) {

                        });
                        self.form = Form.query({model: 'DeviceLike', id: $routeParams.mId});
                        self.modelName = 'DeviceLike';
                        break;
                    case 'devices-stores':
                        self.models = DeviceStore.query( function(models) {

                        });
                        self.form = Form.query({model: 'DeviceStore', id: $routeParams.mId});
                        self.modelName = 'DeviceStore';
                        break;
                    case 'devices-stores-assigned':
                        self.models = DeviceStoreAssigned.query( function(models) {

                        });
                        self.form = Form.query({model: 'DeviceStoreAssigned', id: $routeParams.mId});
                        self.modelName = 'DeviceStoreAssigned';
                        break;
                    case 'files-devices-assigned':
                        self.models = FileDeviceAssigned.query( function(models) {

                        });
                        self.form = Form.query({model: 'FileDeviceAssigned', id: $routeParams.mId});
                        self.modelName = 'FileDeviceAssigned';
                        break;
                    case 'surveys-data':
                        self.models = SurveyData.query( function(models) {

                        });
                        self.form = Form.query({model: 'SurveyData', id: $routeParams.mId});
                        self.modelName = 'SurveyData';
                        break;
                    case 'surveys-fields':
                        self.models = SurveyField.query( function(models) {

                        });
                        self.form = Form.query({model: 'SurveyField', id: $routeParams.mId});
                        self.modelName = 'SurveyField';
                        break;
                    case 'categories-likes':
                        self.models = CategoryLike.query( function(models) {

                        });
                        self.form = Form.query({model: 'CategoryLike', id: $routeParams.mId});
                        self.modelName = 'CategoryLike';
                        break;
                    case 'categories-users-assigned':
                        self.models = CategoryUserAssigned.query( function(models) {

                        });
                        self.form = Form.query({model: 'CategoryUserAssigned', id: $routeParams.mId});
                        self.modelName = 'CategoryUserAssigned';
                        break;
                }

                $scope.submit = function() {
                    $.ajax({
                        type: "GET",
                        url: "/WebDiP/2015_projekti/WebDiP2015x005/backend/services/data/"+"submit.php"+"?model="+self.modelName+"&id="+$routeParams.mId,
                        data: {object: JSON.stringify(self.form)},
                        dataType: "json",
                        success: function(data)
                        {
                            if(data.success) {
                                if(data.id) {
                                    $window.location.href = "/WebDiP/2015_projekti/WebDiP2015x005/#/crud/"+$routeParams.modelName+"/"+data.id;
                                }
                                //saved
                            }
                        }
                    });
                };
            }
        ]
    });
