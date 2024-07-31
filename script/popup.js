angular.module('index-app', [])
  .controller('index-controller', function ($rootScope, $scope, $document, $http) {

    $rootScope.currentUserId = localStorage.getItem('sender_id');
    // console.log($rootScope.currentUserId, "sender id")

    // showing current user profile details popup
    $scope.isPopUp = false;
    $scope.currentUserImage = localStorage.getItem('img_path');
    $scope.currentUserName = localStorage.getItem('username');
    $scope.currentUserEmail = localStorage.getItem('email');

    $scope.showProfilePopup = function () {
      $scope.isPopUp = !$scope.isPopUp;
      $scope.isDropdownMenu = false;
    }
    $scope.hideProfilePopup = function () {
      $scope.isPopUp = false;
    }
    // end

    // showing dropdown menu
    $scope.isDropdownMenu = false;
    $scope.showDropdownMenu = function () {
      $scope.isDropdownMenu = !$scope.isDropdownMenu;
    }
    // end

    // hide drpdown and popup when click on body
    $document.on('click', function (event) {

      // hide dropdown 
      var target = angular.element(event.target);
      var dropdown = angular.element(document.querySelector('.dropdown'));
      var dropdownButton = angular.element(document.querySelector('.dropdown-button'));
      if (!dropdownButton[0].contains(target[0]) && !dropdown[0].contains(target[0]) && $scope.isDropdownMenu) {
        $scope.$apply(function () {
          $scope.isDropdownMenu = false;
        });
      }
      // end


      // hide profile popup
      var popupContainer = angular.element(document.querySelector('#popupContainer')) || '';
      if (event.target == popupContainer[0]) {
        $scope.$apply(function () {
          $scope.isPopUp = false;
        });
      }
      // end

    });
    // end

    // list user fetch (showing all user )
    $http.get('php_api/list_user.php')
      .then(res => {
        $scope.userList = [];
        // console.log($scope.userList, "$scope.userList")
        for (id in res.data) {
          if ($rootScope.currentUserId != id) {
            // console.log(res.data[id], ": user");
            $scope.userList.push({ uniqueId: id, name: res.data[id].name.toLowerCase(), img_path: res.data[id].img_path });
          }
        }
        $scope.FilteredUserList = $scope.userList;
      }).catch((err)=>{
        console.log(err, "maybe, some error in api request")
      })
    // end

    // showing list based on input filter
    $scope.filterUser = function () {
      if($scope.filterName){
        $scope.FilteredUserList = $scope.userList.filter(one => one.name.includes($scope.filterName.toLowerCase()));
        // console.log($scope.FilteredUserList, "fileres")
        $scope.showingEmpty = false;
        if(!$scope.FilteredUserList.length){
          $scope.showingEmpty = true;
        }
      }else{
        $scope.FilteredUserList = $scope.userList;
        $scope.showingEmpty = false
      }
    }
    // end
    
    // showing particular chats
    $scope.getChats = function (id, name, img_path) {
      loadUserData(id, name, img_path)
    }




















  })


























