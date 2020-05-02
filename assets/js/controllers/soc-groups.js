app.controller('GroupsCtrl', ['$scope', '$http',
  function ($scope, $http) {
    $http.get('data/soc-groups.json').then(function(response) {
      $scope.groups = response.data;
    });
  }]);
