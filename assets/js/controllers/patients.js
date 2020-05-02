app.controller('PatientsCtrl', ['$scope', '$http',
  function ($scope, $http) {
    $http.get('data/hos-patients.json').then(function(response) {
      $scope.patients = response.data;
    });
  }]);
