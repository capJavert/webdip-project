'use strict';

// Register `crud` component, along with its associated controller and template
angular.
    module('crud').
    component('crud', {
        templateUrl: 'crud/crud.template.html',
        controller: ['$scope', '$window', '$routeParams', 'Form', 'Device', 'Category', 'File', 'Log', 'Survey', 'User',
            function CrudController($scope, $window, $routeParams, Form, Device, Category, File, Log, Survey, User) {
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
                }

                $scope.submit = function() {
                    $.ajax({
                        type: "GET",
                        url: "/backend/services/submit?model="+self.modelName+"&id="+$routeParams.mId,
                        data: {object: JSON.stringify(self.form)},
                        dataType: "json",
                        success: function(data)
                        {
                            if(data.success) {
                                if(data.id) {
                                    $window.location.href = "/#/crud/"+$routeParams.modelName+"/"+data.id;
                                }
                                //saved
                            }
                        }
                    });
                };
            }
        ]
    });
