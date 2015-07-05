app.controller("menuController", function($scope, $http) {

    $http.get(window.location.origin + "/assets/admin/js/app/data/menu.json").
        success(function(response) {
            $scope.menu = response.menu;
        }
    );
});
