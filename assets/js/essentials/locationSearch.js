
angular.module('queryfilter',[]).filter("getqueryresults",function() { // register new filter
     return function(item,result) { // filter arguments

        return item;
        // implementation
    };
 });

var app=angular.module('homeApp',['ui.bootstrap','queryfilter']);

app.controller('dataInsertCtrl',function($http,$scope){

     var table=angular.element(document.getElementById('dhakacity'));
     var inner=angular.element(document.getElementById('innerDhaka'));
     var data=table.children(0).children();
     var archiological=angular.element(document.getElementById('archiological'))
     var beautifulPlaces=angular.element(document.getElementById('beautifulPlaces'))
     var bPlace=beautifulPlaces.context.children[0].children;
     var log = [];
     var facebookPlaces=angular.element(document.getElementById('facebookPlaces'));
     var arch=archiological.context.children[0].children;
     datas=[];
     var fbLoad=facebookPlaces.context.children[0].children;
        var text=data.children('ul').children('li').children('a');
        var i=0;
        var list=inner.context.children[0].children;
        
        angular.forEach(text, function(value, key) {
                datas[i]=value.innerHTML.replace('Thana','').replace('Upazila','').replace('Union','');
                i++;
            }, log);
        angular.forEach(list, function(value, key) {
                datas[i]=value.innerHTML;
                i++;
            }, log);
        angular.forEach(arch, function(value, key) {
                
            datas[i]=angular.element(value).context.children[0].innerHTML;
                i++;
            }, log);
        angular.forEach(bPlace, function(value, key) {
                
            datas[i]=angular.element(value).context.children[0].children[1].innerHTML;
                i++;
            }, log);
        angular.forEach(fbLoad, function(value, key) {
              var d=angular.element(value).context.children[0];  
            if(d!=undefined){
                e=d.children[1];
                if(e!=undefined){
                    f=e.children[0].children[1].children[0].children[0].children[0].children[0].children[0].children[0].children[0].children[0].children[0].innerText;
                    datas[i]=f;   
                }
            }
                i++;
            }, log);
        var jsonArray = JSON.parse(JSON.stringify(datas));
        
        $http({
            url:'home/insertPlaces',
            dataType:'JSON',
            method:'POST',
            data:jsonArray,
        }).success(function(data){
        });
     
});
app.controller('searchCtrl',function($scope,$http,$timeout){
    $scope.menuItems={name:'dhaka'};
    $scope.places={};
    $scope.query={};
    $scope.loading=true;
    $scope.menuItemsShow=false;
    $scope.notFound=false;
    $scope.cities=[{name:'Dhaka'},{name:'Chittagong'}];  
    var ItemData={};
    $scope.catagories=catagories;
    $http({
        url:'home/getHomeData',
        method:'POST',
        dataType:'JSON'
    }).success(function(data){
        $scope.places=data.places;
        $scope.menuItems=data.products;
        ItemData=$scope.menuItems;
        $timeout(function(){
            $scope.loading=false;
            $scope.menuItemsShow=true;
        },500);
                
    });

    $scope.query.city=null;
    $scope.query.location=null;
    var myQ=$scope.query;
    $scope.onSelectPart=function(item,model,label){
        
    }
    
    $scope.submitQuery=function(city,location,form){
        if(form.$invalid){
            return;
        }
        $scope.searched=true;
        $('body,html').animate({
            scrollTop: 200 ,
            }, 1000
        );
        $scope.menuItems=ItemData.filter(function(data){
            
            return data.location===location.name;
        });
        
    }
    $scope.closeModel=function(data){
        var item=angular.element(document.getElementById(data));
        item.children('.fu-modal-container').removeClass('is-visible');
        item.removeClass('is-visible');
    }
    $scope.singleItemDisplay=function(data){
        var item=angular.element(document.getElementById(data));
        item.addClass('is-visible');
        item.children('.fu-modal-container').addClass('is-visible');
    }
    
});



 app.controller('productShowCtrl',function($scope,$http,$timeout){
    
 });
app.directive('productLoading', function () {
      return {
        restrict: 'E',
        replace:true,
        template: '<div class="center" style="font-size:2em"><div class="spinner"><i class="fa fa-spinner fa-pulse"></i></div></div>',
        link: function (scope, element, attr) {
            $(element).show();
              scope.$watch('loading', function (val) {
                
                  
                      
                  if (!val)
                    $(element).hide();
              });
        }
      }
  });
 app.directive('menuItem',function($http,$timeout){
    return {
        restrict:'E',
        replace:true,
        templateUrl:'home/getTamplate/menuItemCard',
        link:function(scope,elem,attr){
            
                scope.$watch('menuItems',function(val){
                    if(!val.length){
                        scope.NotFoundMessage='Sorry!! Dude!! No one is selling food there. Please encourage your neibour home chefs to join us !!';
                    }else{
                        scope.NotFoundMessage='';
                    }
                });
            
        }
    }
 });
 app.directive('catagory',function($http){
    return{
        restrict:'E',
        replace:true,
        template:'<ul class="catagoryList">'+
        '<li ng-repeat="catagory in catagories"><a href="">{{catagory.name}}</a></li>'+
        '</ul>'
    }
 });
app.directive('productPopup',function(){
    return{
        restrict:'EA',
        replace:"true",
        templateUrl:'home/getTamplate/itemDescripPopup'
    }
});
var catagories=[
{name:'Home Food'},
{name:'Fast Food'},
{name:'deshi'}
];