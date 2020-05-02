app.controller('TrendingSongsCtrl', ['$scope', '$http',
  function ($scope, $http) {
    $http.get('data/mus-trending-songs.json').then(function(response) {
      $scope.songs = response.data;
    });
  }]);
