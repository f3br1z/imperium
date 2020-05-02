app.controller('UsersCtrl', ['$scope', '$http',
  function ($scope, $http) {
    $http.get('data/blo-users.json').then(function(response) {
      $scope.users = response.data;
    });
  }]);
