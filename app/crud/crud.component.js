'use strict';

// Register `crud` component, along with its associated controller and template
angular.
    module('crud').
    component('crud', {
        templateUrl: 'crud/crud.template.html',
        controller: ['$routeParams', 'Form', 'Device', 'Category', 'File', 'Log', 'Survey', 'User',
            function CrudController($routeParams, Form, Device, Category, File, Log, Survey, User) {
                var self = this;

                switch($routeParams.modelName) {
                    case 'devices':
                        self.model = Device.get({condition: 'GET_BY_ID', params: {id: $routeParams.mId}}, function(model) {

                        });
                        self.form = Form.query({model: 'Device'});
                        break;
                    case 'categories':
                        self.model = Category.get({condition: 'GET_BY_ID', params: {id: $routeParams.mId}}, function(model) {

                        });
                        self.form = Form.query({model: 'Category'});
                        break;
                    case 'files':
                        self.model = File.get({condition: 'GET_BY_ID', params: {id: $routeParams.mId}}, function(model) {

                        });
                        self.form = Form.query({model: 'File'});
                        break;
                    case 'logs':
                        self.model = Log.get({condition: 'GET_BY_ID', params: {id: $routeParams.mId}}, function(model) {

                        });
                        self.form = Form.query({model: 'Log'});
                        break;
                    case 'surveys':
                        self.model = Survey.get({condition: 'GET_BY_ID', params: {id: $routeParams.mId}}, function(model) {

                        });
                        self.form = Form.query({model: 'Survey'});
                        break;
                    case 'users':
                        self.model = User.get({condition: 'GET_BY_ID', params: {id: $routeParams.mId}}, function(model) {

                        });
                        self.form = Form.query({model: 'User'});
                        break;
                }
            }
        ]
    });
