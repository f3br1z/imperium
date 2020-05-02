app.controller('CoursesCtrl', ['$scope', '$http',
  function ($scope, $http) {
    $http.get('data/uni-courses.json').then(function(response) {
      $scope.courses = response.data;
    });
  }]);
