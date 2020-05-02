app.controller('FriendsCtrl', ['$scope', '$http',
  function ($scope, $http) {
    $http.get('data/soc-friends.json').then(function(response) {
      $scope.friends = response.data;
    });
  }]);
