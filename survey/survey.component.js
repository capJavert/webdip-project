'use strict';

// Register `survey` component, along with its associated controller and template
angular.
module('survey').
component('survey', {
    templateUrl: 'survey/survey.template.html',
        controller: ['$rootScope', '$scope', '$window', '$routeParams', 'SurveyData',
            function SurveyController($rootScope, $scope, $window, $routeParams, SurveyData) {
                var self = this;

                self.model = SurveyData.query({condition: "GET_BY_SURVEY"}, function(models) {

                });
                self.form = Form.query({model: 'SurveyData', id: $routeParams.mId});
                self.modelName = 'SurveyData';

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
