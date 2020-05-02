app.controller('StudentsCtrl', ['$scope', '$http',
  function ($scope, $http) {
    $http.get('data/uni-students.json').then(function(response) {
      $scope.students = response.data;
    });
  }]);
