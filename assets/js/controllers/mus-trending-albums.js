app.controller('TrendingAlbumsCtrl', ['$scope', '$http',
  function ($scope, $http) {
    $http.get('data/mus-trending-albums.json').then(function(response) {
      $scope.albums = response.data;
    });
  }]);
