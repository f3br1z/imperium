app.controller('DoctorsCtrl', ['$scope', '$http',
  function ($scope, $http) {
    $http.get('data/hos-doctors.json').then(function(response) {
      $scope.doctors = response.data;
    });
  }]);
