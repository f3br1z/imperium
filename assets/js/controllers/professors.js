app.controller('ProfessorsCtrl', ['$scope', '$http',
  function ($scope, $http) {
    $http.get('data/uni-professors.json').then(function(response) {
      $scope.professors = response.data;
    });
  }]);
