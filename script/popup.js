angular.module('index-app', [])
  .controller('index-controller', function ($scope, $document) {
    // console.log($scope, "this is angular");

    $scope.isPopUp = false;
    $scope.showProfilePopup = function () {
      $scope.isPopUp = !$scope.isPopUp;
      $scope.currentUserImage = localStorage.getItem('img_path');
      $scope.currentUserName = localStorage.getItem('username');
      $scope.currentUserEmail = localStorage.getItem('email');
      $scope.isDropdownMenu = false;
    }

    $scope.hideProfilePopup = function () {
      $scope.isPopUp = false;
    }

    // showing dropdown menu
    $scope.isDropdownMenu = false;
    $scope.showDropdownMenu = function () {
      $scope.isDropdownMenu = !$scope.isDropdownMenu;
    }
    $document.on('click', function (event) {
      var target = angular.element(event.target);
      var dropdown = angular.element(document.querySelector('.dropdown'));
      var dropdownButton = angular.element(document.querySelector('.dropdown-button'));

      console.log(dropdownButton[0].contains(target[0]))

      if (!dropdownButton[0].contains(target[0]) && !dropdown[0].contains(target[0]) && $scope.isDropdownMenu) {
        $scope.$apply(function () {
          $scope.isDropdownMenu = false;
        });
      }
    });


  })