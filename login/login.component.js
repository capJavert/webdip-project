'use strict';

// Register `login` component, along with its associated controller and template
angular.
module('login').
component('login', {
    templateUrl: 'login/login.template.html',
        controller: ['$rootScope', '$scope', '$window', '$routeParams', 'User',
            function LoginController($rootScope, $scope, $window, $routeParams, User) {
                var self = this;

                $scope.submit = function() {
                    $.ajax({
                        type: "GET",
                        url: "/WebDiP/2015_projekti/WebDiP2015x005/backend/services/data/"+"login.php"+"?user="+self.model.username+"&pass="+self.model.password,
                        data: {object: JSON.stringify(self.model)},
                        dataType: "json",
                        success: function(data)
                        {
                            if(data.success) {
                                $rootScope.model.logged = true;
                                $window.location.href = "/WebDiP/2015_projekti/WebDiP2015x005/#/devices";
                            }
                        }
                    });
                };
            }
    ]
});
