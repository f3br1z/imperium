app.controller('HospitalStaffsCtrl', ['$scope', '$http',
  function ($scope, $http) {
    $http.get('data/hos-staffs.json').then(function(response) {
      $scope.staffs = response.data;
    });
  }]);
