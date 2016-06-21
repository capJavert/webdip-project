'use strict';

// Register `crud-list` component, along with its associated controller and template
angular.
module('crud').
component('crudList', {
    templateUrl: 'crud/crud-list.template.html',
    controller: ['$scope', '$window', '$routeParams', 'DeviceList', 'CategoryList', 'FileList', 'LogList', 'SurveyList', 'UserList',
        function CrudListController($scope, $window, $routeParams, DeviceList, CategoryList, FileList, LogList, SurveyList, UserList) {
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
            }

            $scope.delete = function(model, id) {
                $.ajax({
                    type: "GET",
                    url: "/backend/services/delete?model="+model+"&id="+id,
                    data: {object: JSON.stringify(self.form)},
                    dataType: "json",
                    success: function(data)
                    {
                        if(data.success) {
                            $window.location.href = "/#!/crud/"+$routeParams.modelName;
                        }
                        //saved
                    }
                });
            }
        }
    ]
});
