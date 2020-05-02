app.controller('ArtistsCtrl', ['$scope', '$http',
  function ($scope, $http) {
    $http.get('data/mus-artists.json').then(function(response) {
      $scope.artists = response.data;
    });
  }]);
