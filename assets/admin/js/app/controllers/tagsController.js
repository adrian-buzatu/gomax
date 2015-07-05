app.controller("tagsController", function($scope, $http) {
    $http.get(window.location.origin + "/api/tags/get").
        success(function(response) {
            $scope.data = response.data;
        }
    );
    $scope.edit = function(id){
        $scope.tagName = $scope.data[id].name;
    }
    
    $scope.create = function(){
        
    }
});
