app.controller('PlaylistsCtrl', ['$scope', '$http',
  function ($scope, $http) {
    $http.get('data/mus-playlists.json').then(function(data) {
      $scope.playlists = data;
    });
  }]);
