app.controller('MessagesWidgetCtrl', ['$scope', '$http',
  function ($scope, $http) {
    $http.get('data/messages.json').then(function(response) {
      $scope.messages = response.data;
    });
  }]);

