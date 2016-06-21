'use strict';

// Register `crud` component, along with its associated controller and template
angular.
    module('crud').
    component('crud', {
        templateUrl: 'crud/crud.template.html',
        controller: ['$routeParams', 'Device', 'Category', 'File', 'Log', 'Survey', 'User',
            function CrudController($routeParams, Device, Category, File, Log, Survey, User) {
                var self = this;

                switch($routeParams.modelName) {
                    case 'device':
                        self.model = Device.get({condition: 'GET_BY_ID', params: {id: $routeParams.mId}}, function(model) {
                            //self.setImage(phone.images[0]);
                        });
                        break;
                    case 'categories':
                        self.model = Category.get({condition: 'GET_BY_ID', params: {id: $routeParams.mId}}, function(model) {
                            //self.setImage(phone.images[0]);
                        });
                        break;
                    case 'files':
                        self.model = File.get({condition: 'GET_BY_ID', params: {id: $routeParams.mId}}, function(model) {
                            //self.setImage(phone.images[0]);
                        });
                        break;
                    case 'logs':
                        self.model = Log.get({condition: 'GET_BY_ID', params: {id: $routeParams.mId}}, function(model) {
                            //self.setImage(phone.images[0]);
                        });
                        break;
                    case 'surveys':
                        self.model = Survey.get({condition: 'GET_BY_ID', params: {id: $routeParams.mId}}, function(model) {
                            //self.setImage(phone.images[0]);
                        });
                        break;
                    case 'users':
                        self.model = User.get({condition: 'GET_BY_ID', params: {id: $routeParams.mId}}, function(model) {
                            //self.setImage(phone.images[0]);
                        });
                        break;
                }
            }
        ]
    });
