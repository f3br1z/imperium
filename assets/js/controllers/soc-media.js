app.controller('BlogMediaCtrl', ['$scope', '$http',
  function ($scope, $http) {
    $http.get('data/soc-media.json').then(function(response) {
      $scope.medias = response.data;
    });
  }]);
