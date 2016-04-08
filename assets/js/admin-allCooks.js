


var capp=angular.module('allCookApp',['ngTagsInput','ngAnimate','angularUtils.directives.dirPagination']);
    
// ^^^^^^^^^^^^^^^^^^^^^^^^^^ Config^^^^^^^^^^^^^^^^^^^^


// **************************Controllers********************

capp.controller('adminAllCookCtrl',function($scope,$http){
        $scope.loading=true;
        $scope.cooksInfo={};
        $scope.pickUpInput=0;
        $scope.homeDeliveryInput=0;
        $scope.sortField='id';
        $scope.reverse=true;
        var allCooksData = $scope.cooksInfo;
        $http({
            url:'admin/allCooksInfo',
            method:'POST',
            dataType:'JSON'
        }).success(function(data){
            $scope.cooks=data;

            $scope.loading=false;
        });

        $scope.fetchEditPanel=function(data){
            var id='editCook'+data.id;
            var element=angular.element(document.getElementById(id));
            element.addClass('is-visible');
            element.find('.fu-modal-container').addClass('is-visible');
            
        }
        $scope.closeModel=function(data){
            var id='editCook'+data;
            var element=angular.element(document.getElementById(id));
            element.removeClass('is-visible');
            element.find('.fu-modal-container').removeClass('is-visible');
        }
        $scope.toggleInput=function(data){

            if(data=='pickup'){
                $scope.pickUpInput++;
            }
        

      }


});



// **************************Directives********************

capp.directive('serviceZone',function(){
    return {
        restrict:'E',
        replace:true,
        template:'<ul class="blue-list" ><li ng-repeat="sZone in cook.serviceZones">{{sZone}}</li></ul>'
    };
});

capp.directive('deliveryOptions',function(){
    return {
        restrict:'E',
        replace:true,
        template:'<ul class="blue-list" ><li ng-show="cook.pickup" >{{cook.pickupValue}}</li><li ng-show="cook.home_delivery">{{cook.hdValue}}</li></ul>'
    };
});

capp.directive('loading', function () {
      return {
        restrict: 'E',
        replace:true,
        template: '<div class="spinner"><i class="fa fa-spinner fa-pulse"></i></div>',
        link: function (scope, element, attr) {
              scope.$watch('loading', function (val) {
                  if (val){
                            $(element).show();
      
                         scope.visible='visible';}
                  else{
                        $(element).hide();}
              });
        }
      }
  });
capp.directive('cookEditForm',function($parse){
    return{
        restrict:'E',
        require:'?ngModel',
        replace:true,
        templateUrl:'admin/getTemplate/cooks-edit-form',
        link:function(scope,element,attr,ctrl){
        }
    }
});


capp.directive('deliveryMethods',function(){
    return {
        restrict:'A',
        require:'?ngModel',
        link:function(scope,elem,attr,ctrl){
            
            if(elem[0].id=='homeDelivery'&&scope.cook.home_delivery){
                elem.attr('checked','');
                elem.parent('label').addClass('checked');
                
            }
            else if(elem[0].id=='pickUpInput'&&scope.cook.pickup){
                            elem.attr('checked','');
                            elem.parent('label').addClass('checked');
                            
                        }
            scope.$watch('pickUpInput',function(value){
                if(value>0){
                    console.log(elem);
                    scope.pickUpInput=0;

                }
            });


        }
    };
});













