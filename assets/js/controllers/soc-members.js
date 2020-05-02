app.controller('MembersCtrl', ['$scope', '$http',
  function ($scope, $http) {
    $http.get('data/soc-members.json').then(function(response) {
      $scope.members = response.data;
    });
  }]);
