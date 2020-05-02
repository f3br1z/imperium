app.controller('UniversityStaffsCtrl', ['$scope', '$http',
  function ($scope, $http) {
    $http.get('data/uni-staffs.json').then(function(response) {
      $scope.staffs = response.data;
    });
  }]);
