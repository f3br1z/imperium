app.controller('AlbumsCtrl', ['$scope', '$http',
  function ($scope, $http) {
    $http.get('data/mus-albums.json').then(function(response) {
      $scope.albums = response.data;
    });
  }]);
