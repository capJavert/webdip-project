'use strict';

// Register `deviceList` component, along with its associated controller and template
angular.
module('registration').
component('registration', {
    templateUrl: 'registration/registration.template.html',
        controller: ['$scope', '$window', '$routeParams', 'User', 'Form',
            function RegistrationController($scope, $window, $routeParams, User, Form) {
                var self = this;

                self.model = User.get({condition: 'GET_BY_ID', params: {id: $routeParams.mId}}, function(model) {

                });
                self.form = Form.query({model: 'User', id: $routeParams.mId});
                self.modelName = 'User';


                $scope.submit = function() {
                    $.ajax({
                        type: "GET",
                        url: "/WebDiP/2015_projekti/WebDiP2015x005/backend/services/data/registration.php",
                        data: {object: JSON.stringify(self.form)},
                        dataType: "json",
                        success: function(data)
                        {
                            if(data.success) {
                                alert("Registracija uspješna! Provjerite svoj email za aktivaciju računa.");
                                $window.location.href = "/WebDiP/2015_projekti/WebDiP2015x005/#/devices";
                            }
                        }
                    });
                };
            }
    ]
});
