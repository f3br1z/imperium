app.controller('ChatCtrl', ['$scope', '$http',
  function ($scope, $http) {
    $http.get('data/chat-users.json').then(function(response) {
      $scope.users = response.data;
    });
  }]);
