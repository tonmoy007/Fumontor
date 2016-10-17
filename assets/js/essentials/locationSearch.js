
angular.module('queryfilter',[]).filter("getqueryresults",function() { // register new filter
     return function(item,result) { // filter arguments
        console.log(item)
        return item;
        // implementation
    };
 });


var app=angular.module('homeApp',['ngRoute','oc.lazyLoad']);

var ItemData={};

app.config(function($routeProvider,$locationProvider) {


    $routeProvider.when('/kitchen/:kitchen_id',{
        templateUrl:'home/getTamplate/kitchenPage',
        controller:'kitchenShowCtrl'
    }).when('/kitchen/:kitchen_id/:productId',{
        templateUrl:'home/getTamplate/kitchenPage',
        controller:'productShowCtrl',
    }).when('/checkout',{
        templateUrl:'home/getTamplate/checkoutPage',
        controller:'checkoutCtrl'
    }).when('/dishes',{
        templateUrl:'home/getTamplate/home-products',
        controller:'productPageCtrl'
    }).when('/all-kitchen/:location',{
        templateUrl:'home/getTamplate/all-kitchen',
        controller:'allKitchenCtrl',
        controllerAs:'allKitn',
    }).when('/all-kitchen',{
        templateUrl:'home/getTamplate/all-kitchen',
        controller:'allKitchenCtrl'
    }).when('/search/head/:query',{
        templateUrl:'home/getTamplate/searched-products',
        controller:'searchPageCtrl'
    }).when('/search/kitchen/:query',{
        templateUrl:'home/getTamplate/searched-kitchens',
        controller:'searchKitchenCtrl'
    }).when('/orders',{
        templateUrl:'home/getTamplate/orders',
        controller:'orderCtrl'
    }).when('/weekly-menu',{
        templateUrl:'home/getTamplate/weekly-menu',
        controller:'weekMenuCtrl'
    }).when('/weekly-menu/:id',{
        templateUrl:'home/getTamplate/single-weekly-menu',
        controller:'singleWeekMenuCtrl'
    }).when('/checkout/weekly-menu/:id',{
        templateUrl:'home/getTamplate/weekly-checkout',
        controller:'weeklyCheckoutCtrl'
    }).otherwise({
        templateUrl:'home/getTamplate/landing',
        controller:'landingCtrl'     
    });
    // $locationProvider.html5Mode(true);
});





app.run(function($rootScope, $window) {

var appid=angular.element(document.getElementById('fbAppId')).attr('data-appid');

  $rootScope.user = {};
  // console.log(appid);


  (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id))
        return;
      js = d.createElement(s);
      js.id = id;
      js.src = "https://connect.facebook.net/en_US/sdk.js#version=v2.2&status=true&cookie=true&xfbml=true&appId="+appid;
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

});




app.controller('landingCtrl',function($scope,$http,$location,$timeout,$window,$ocLazyLoad){
    $scope.lazyLoadParams = [
      'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css',
      'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css',
      'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js',
      'https://cdnjs.cloudflare.com/ajax/libs/angular-slick-carousel/3.1.7/angular-slick.min.js'
    ];
    $scope.$parent.loading=false;
    $scope.$parent.bodyClass='home-body';
    $scope.$parent.gotop();
    $scope.gotoHow=function(){
        offset=angular.element(document.getElementById('how')).offset();
       
            $('body,html').animate({
                scrollTop: offset.top ,
                }, 800
            );
    }
    
    angular.element(document).ready(function(){
        $scope.animate=true;
    })
    $scope.onSelectPart=function(item,model,label,ordertype,form){
        $scope.homequery.location='';
        $scope.submitQuery(ordertype,item,form);
    }
    
    $scope.submitQuery=function(orderType,q,form){

        $scope.$parent.gotop();
     
        $scope.searched=true;
        

     
        window.location='#/search/head/'+q;
    }
    
   
    $scope.isSetListner=false;
    
    $http({
        url:'home/getTrandings',
    }).success(function(response){

        console.log(response);
        if(response.success){
            $scope.trendingKitchen=response.trendingKitchen;
            $scope.trendingFood=response.trendingFood;
            $scope.trendingKitchenShow=true;
            $scope.trendingFoodShow=true;
        }
    });

});
app.controller('productShowCtrl',function($routeParams,$scope,$interval,$timeout,$http){
    // console.log($routeParams);
    // console.log($scope);
    $scope.$parent.gotop();
    // console.log($scope);
    $scope.kitchenShow=false;
    $scope.loading=true;
    $scope.closeModel=function(data){
        window.location='#/kitchen/'+$routeParams.kitchen_id;
        var item=angular.element(document.getElementById(data));
        item.children('.fu-modal-container').removeClass('is-visible');
        item.removeClass('is-visible');
        $scope.kitchenShow=true;
        $timeout(function(){$scope.todayLoaded=true;},1000);
    }
    busy=false;
    // console.log($scope.$parent.lastKitchenId);
    var init=$interval(function(){

        if(!busy&&$scope.$parent.lastKitchenId!=$routeParams.kitchen_id){
            busy=true;
            $http({
                url:'home/getItemData/'+$routeParams.kitchen_id+'/'+$routeParams.productId
            }).success(function(response){
                
                if(response!='false'){
                    console.log(response);
                    $scope.$parent.menuItems.push(response[0]);
                    $interval.cancel(init);
                
               
                    
                var pop=$interval(function(){
                        // console.log($('#'+$routeParams.productId).length)
                        if($('#'+$routeParams.productId).length){
                            $scope.loading=false;
                            // console.log($scope.loading);
                        $scope.$parent.singleItemDisplay($routeParams.productId);
                        $interval.cancel(pop);
                        
                        }
                    },200);
                    
                   
                    
                }else{
                    $scope.loading=false;
                    $scope.$parent.showNoti('Sorry the item is not available Go to <a href="#/"><strong>Fumontor Home Page</strong></a>');
                    
                }
                

            }).error(function(response) {
                /* Act on the event */
                console.log(response);
            });;
            
        }else if(!busy){
            // console.log($scope);
             $scope.kitchenShow=false;
             $scope.todayLoaded=false;
             $scope.loading=false;
             $timeout(function(){
                $scope.$parent.singleItemDisplay($routeParams.productId);
                // $scope.kitchenShow=true;
            },220);
            $interval.cancel(init);
            
        }
    });
});
var SiteControl=app.controller('searchCtrl',function($scope,preload,$http,$timeout,$document,$routeParams,$window){
    
    $scope.loggedin=false;
    $scope.searched=false;
    $scope.fixedTop=false;
    $scope.count=0;
    $scope.lastKitchenId=null;
    $scope.user=[];
    $scope.showCart=false;
    $scope.menuItems=[];
    $scope.trendingKitchen=fKitchen;
    $scope.cartItems=[];
    $scope.cartSubTotal=0;
    $scope.cartTotal=0;
    $scope.places={};
    $scope.homequery={};
    $scope.orderType='preorder'
    $scope.searchedFoodTypes=fuTypes;
    $scope.loading=true;
    $scope.menuItemsShow=false;
    $scope.notFound=false;
    $scope.foodtype=[];
    $scope.foodtype.name='meal'
    $scope.cities=[{name:'Dhaka'},{name:'Chittagong'}];  
    $scope.notiHide=true;
    $scope.slickConfig =slickConfig;
    $scope.homequery.city=null;
    $scope.homequery.location=null;
    $scope.popup=false;
    $scope.bodyClass='home-body';
    var myQ=$scope.query;
    $scope.order={};
    $scope.orderDeliveryCharge=[];
    $scope.cartOrderType='';
    $scope.checkOutTotal=0;
    $scope.searchedOrderType=false;
    $scope.todaysMenuItems=[];
    $scope.cartLoaded=false;
    

    $http({
        url:'home/getHomeData',
        method:'Get',
        dataType:'JSON'
    }).success(function(data){
       
        
        
        // $scope.places=data.places;
        if(data.user!=undefined){
            $scope.loggedin=true;
            $scope.user=data.user;
            //console.log($scope.user);
        }
        $scope.cartTotal=data.cartTotal;
        $scope.cartTotalItems=parseInt(data.cartTotalItems);
        
        
        cartCatagoriseItem=[];
        // console.log(data.cartContents);
        

       
        // console.log($scope.cartItems);

        // ItemData=$scope.menuItems;
        //console.log(ItemData);
        
        $scope.cartLoaded=true; 
        $scope.loading=false; 

        $scope.prepareCart(data.cartContents);
        //console.log($scope.cartItems);
        $scope.cartSubTotal=data.cartSubTotal;
        $scope.checkoutTotal=data.cartSubTotal;
                
    }).error(function(response) {
        /* Act on the event */
        console.log(response);
    });



    $scope.setActive=function(name){
        angular.forEach($scope.searchedFoodTypes,function(value,key){
            if(value.value==name){
                $scope.searchedFoodTypes[key].checked=true;
            }else{

                $scope.searchedFoodTypes[key].checked=false;  
            }
        });
    }
    $scope.shareLink=function(href,name,caption,imgurl,description){
        
        href=(typeof href!='undefined')?href:'http://fumontor.com';
        name=(typeof name!='undefined')?name:'Fumontor';
        caption=(typeof caption!='undefined')?caption:'a yammy relationship';
        imgurl=(typeof imgurl!='undefined')?imgurl:'http://fumontor.com/assets/img/home-logo-black.png';
        description=(typeof description!='undefined')?description:'Search and order Home food Share Recipes';
        FB.ui({
              method: 'share',
              href: href,
              title:name,
              picture:imgurl,
              caption: caption,
              description:description,
          }, function(response){

          });
    }
    $scope.prepareCart=function(data){
        log=[];
        angular.forEach(data,function(value,key){
        
        var options=JSON.parse(value.options);
            //console.log($scope.cartOrderType);
            var rtimes=options.time.split(':');
            tTime=parseInt(rtimes[0])*100+parseInt(rtimes[1]);
        // if(!$scope.cartOrderType){
        //     var type=options.orderType;
        //     //console.log(type);
        //     if(type=='Pre Order'){
        //         $scope.cartOrderType='preorder';
        //     }else{
        //         $scope.cartOrderType='todays_menu';
        //     }
        // }
            var cid=options.cooksid;
            var kitchen=options.kitchenName;
            //console.log(JSON.parse(value.options).min_order);
            
            var cKey=false;
            angular.forEach($scope.cartItems,function(ivalue,ikey){
                //console.log(options.cooksid);
                if(ivalue.cooksId===options.cooksid){
                    cKey=true;
                    $scope.cartItems[ikey][key]=value;
                    $scope.cartItems[ikey]['subtotal']+=parseInt(value.subtotal);
                    rtimes2=$scope.cartItems[ikey].reqtime.split(':');
                    tTime2=parseInt(rtimes2[0])*100+parseInt(rtimes2[1]);
                    if(tTime>tTime2){
                        $scope.cartItems[ikey]['reqtime']=options.time;
                    }
                }
            },log);
            
        if(!cKey){
            var obj={};
            //console.log(options.min_order);
            obj[key]=value;
            obj['cooksId']=options.cooksid;
            var orderObj={};
            
            $scope.order[options.cooksid]=false
            obj['kitchenName']=kitchen;
            obj['min_order']=parseInt(options.min_order);
            obj['subtotal']=parseInt(value.subtotal);
            obj['orderType']=options.orderType;
            obj['ordertime']=options.ordertime;
            obj['pickup']=options.pickup;
            obj['home_delivery']=options.home_delivery;
            obj['delivery_charge']=options.delivery_charge;
            obj['reqtime']=options.time;
            //console.log(options);
            //console.log(parseInt(value.subtotal));
            
                $scope.cartItems.push(obj);

                
            }
      
            

        },log);
        // console.log($scope.cartItems);
    }
    $scope.StartLoading=function(){
        $scope.menuItemsShow=false;
        $scope.loading=true;
    }
    $scope.endLoading=function(){
        $scope.loading=false;
        $scope.menuItemsShow=true;
    }

    $scope.addItemToCart=function(cooksId,Kitchen,key,value){
        var cKey=false;
        //console.log($scope.cartItems);
        var update=false;
        rtime=value.options.time.split(':');
        tTime=parseInt(rtime[0])*100+parseInt(rtime[1]);
        angular.forEach($scope.cartItems,function(ivalue,ikey){
                

                if(ivalue.cooksId===cooksId){
                    cKey=true;
                    if($scope.cartItems[ikey][key]==undefined){
                    $scope.cartItems[ikey][key]=value;
                    
                    }else{
                       $scope.cartItems[ikey][key]['qty']+=value.qty;
                       $scope.cartItems[ikey][key]['subtotal']+=parseInt(value.subtotal);
                       update=true; 
                    }
                    $scope.cartItems[ikey]['subtotal']+=parseInt(value.subtotal);
                    rtime2=$scope.cartItems[ikey].reqtime.split(':');
                    tTime2=parseInt(rtime2[0])*100+parseInt(rtime2[1]);
                    if(tTime>tTime2){
                        $scope.cartItems[ikey].reqtime=value.options.time;
                    }
                }

            },log);
            
            
            
            
            //console.log(obj);
            if(!cKey){
                var obj={};
            $scope.order[value.options.cooksid]=false;
            obj[key]=value;
            obj['cooksId']=value.options.cooksid;
            obj['kitchenName']=Kitchen;
            obj['subtotal']=parseInt(value.subtotal);
            obj['min_order']=parseInt(value.options.min_order);
            obj['orderType']=value.options.orderType;
            obj['ordertime']=value.options.ordertime;
            obj['pickup']=value.options.pickup;
            obj['home_delivery']=value.options.home_delivery;
            obj['delivery_charge']=value.options.delivery_charge;
            obj['reqtime']=value.options.time;
            //console.log(obj);
                $scope.cartItems.push(obj);
                
            }
            return update;
            
    }
    $scope.checkCartValidity=function(){
        valid=true;
        angular.forEach($scope.cartItems,function(value,key){
           // console.log(value);
            
                if(value.min_order>value.subtotal){
                    valid=false;
                }
            
        });
        if($scope.cartSubTotal<200){
            valid=false;
        }
        return valid;
    }
    $scope.checkoutTriggered=function(){
        
        valid=$scope.checkCartValidity();
        if(valid){
            $scope.showCart=!$scope.showCart;
            window.location="#/checkout";
            
        }else{
            $scope.showNoti('<strong class="text-danger">Sorry looks like you did\'t fullfil some kithcen\'s requrement !! Please visit the <a href="javascript:void(0)" ng-click="showCart=true"><strong>kitchen Page</strong></a> in the cart warning block </strong>');
            
        }
    }
    $scope.isString=function(value){
        return typeof value==='string';
    }
    $scope.gotop=function(){

        $('body,html').animate({
            scrollTop: 0 ,
            }, 200
        );
    }
    $scope.showNoti=function(data){

        $scope.notiMessage=data;
        elem=angular.element(document.getElementById('notiMessage')).html(data);
        $scope.notiOpen();
        $timeout(function(){$scope.notiClose();},5000);
      }
      $scope.notiClose=function(){
        $scope.notiVisibility='ns-hide';
        $timeout(function(){$scope.notiHide=true;},300);
      }
      $scope.notiOpen=function(){
        $scope.notiVisibility='ns-show';
        $scope.notiHide=false;
      }
   

   

    $scope.addToCart=function(data,id){
        // console.log(data);
        
        if(id==undefined){
            id='cartBtn'+data.id;
        }
        // console.log(id);
        addToCartBtn=angular.element(document.getElementById(id));
        // if($scope.cartOrderType!=''){
        //     if(data.todays_menu&&$scope.cartOrderType!='todays_menu'){
        //         $scope.showNoti('<strong class="text-danger">Sorry we can not process <strong>Pre Order</strong> and <strong>Instant Order</strong> at a time try other <strong>Pre Order</strong> items or clear the cart</strong>');
        //         return;
        //     }else if(!data.todays_menu&&$scope.cartOrderType!='preorder'){
        //         $scope.showNoti('<strong class="text-danger">Sorry we can not process <strong>Pre Order</strong> and <strong>Instant Order</strong> at a time try other <strong>Instant Order</strong> items or clear the cart</strong>');
        //         return;
        //     }
        // }else{
        //     $scope.cartOrderType=(data.todays_menu)?'todays_menu':'preorder';
        // }
        // if(data.todays_menu){
        //     $ordertime=data.ordernow_time_text;
        //     $reqtime=data.ordernow_time;
        //     $orderType='Instant Order';
        // }else{
            $ordertime=data.preorder_time_text;
            $orderType='Pre Order';
            $reqtime=data.preorder_process_time;
        // }
        subtotal=parseInt(data.price)*parseInt(data.quantity);
        options={
            'cooksid':data.cooksID,
            'kitchenName':data.kitchename,
            'min_order':data.min_order,
            'orderType':$orderType,
            'ordertime':$ordertime,
            'pickup':data.pickup,
            'home_delivery':data.home_delivery,
            'delivery_charge':parseInt(data.delivery_charge),
            'time':$reqtime,
        };
        send={
            id:data.id,
            name:data.title,
            price:data.price,
            qty:data.quantity,
            subtotal:subtotal,
            options:options,
        };
        //console.log(send);
        
        //console.log($scope.cartItems[0].quantity);
        $http({
            url:'Cart/addItem',
            method:'POST',
            dataType:'JSON',
            data:send
        }).success(function(response){
            //console.log(response);
           // return;
            if(response=='noavailable'){
                $scope.showNoti("Stock Limit Excided");
                return;
            }
            else if(response!="failed"){
                send.rowid=response;
                
                update=$scope.addItemToCart(data.cooksID,data.kitchename,response,send);
                $scope.cartSubTotal+=subtotal;
                $scope.checkoutTotal+=subtotal;
                $scope.cartTotalItems+=parseInt(data.quantity);
                //console.log($scope.cartItems);
                if(!update){
                    $scope.cartTotal++;
                }
                (data.stock_quantity==0)?$scope.showNoti(data.title+' is out of stock your order will be taken as Pre Order and delivered after '+data.preorder_time_text):$scope.showNoti(data.title+" SuccessFully added to the cart and delivered after "+data.ordernow_time_text);
                data.stock_quantity-=data.quantity;
                animating=false;
                if(!animating) {
                    //animate if not already animating
                    animating =  true;
                    // resetCustomization(addToCartBtn);

                    addToCartBtn.addClass('is-added').find('path').eq(0).animate({
                        //draw the check icon
                        'stroke-dashoffset':0
                    }, 500, function(){
                        $timeout(function(){

                            
                            // updateCart();

                            addToCartBtn.removeClass('is-added').find('em').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
                                //wait for the end of the transition to reset the check icon
                                addToCartBtn.find('path').eq(0).css('stroke-dashoffset', '19.79');
                                animating =  false;
                            });

                            if( $('.no-csstransitions').length > 0 ) {
                                // check if browser doesn't support css transitions
                                addToCartBtn.find('path').eq(0).css('stroke-dashoffset', '19.79');
                                animating =  false;
                            }
                        }, 10);
                    }); 
                }
            }else{
                $scope.showNoti("Sorry Item Can not be added to the cart");
            }

            });
    }
    $scope.clearCart=function(){
        $http({
            url:'Cart/destroy',
            method:'POST',

        }).success(function(response){
            if(response!='failed'){
            $scope.cartItems=[];
            $scope.cartTotalItems=0;
            $scope.cartSubTotal=0;
            $scope.cartTotal=0;
            $scope.cartOrderType='';
            // $scope.showNoti('All Cart Items Deleted');
            }
        });
    }

    $scope.removeCartItem=function(cid,data){
        
        $http({
            url:'Cart/deleteItem',
            dataType:'JSON',
            method:'POST',
            data:{rowid:data.rowid}
        }).success(function(response){
            //console.log(response);
            if(response=='success'){
                $scope.cartItems[cid]['subtotal']-=data.subtotal;
                $scope.cartSubTotal-=data.subtotal;
                $scope.cartTotal--;
                $scope.cartTotalItems-=parseInt(data.qty);
                delete $scope.cartItems[cid][data.rowid];
                
                if($scope.cartItems[cid]['subtotal']==0){
                    if($scope.cartItems.length){
                        delete $scope.cartItems.splice(cid,1);

                        
                        
                    }
                    if(!$scope.cartItems.length){
                        $scope.cartOrderType='';
                    }
                }
            }
        });

    };

    $scope.getCartCatagoryTotal=function(data){
        log=[];
        total=0;

        angular.forEach(data,function(value,key){
            if(value.subtotal!=undefined){
                total+=value.subtotal;
            }

        },log);
        return total;
    }
    
    $scope.makeItemActive=function(items,data){
        //console.log(data);
        var log=[];
        
        if(items[data].active!=true){
            
            angular.forEach(items, function(value, key) {
                      value.active=false;
                    }, log);
                items[data].active=true;
            }

    }


    
    $scope.singleItemDisplay=function(data){
        // console.log(data);
        var item=angular.element(document.getElementById(data));
        item.addClass('is-visible');
        item.children('.fu-modal-container').addClass('is-visible');
    }
    $scope.toggleCart=function(){
        $scope.showCart=!$scope.showCart;
    }
    $scope.placeOrder=function(itemid,cooksid){
        
    }
    $scope.sendMail=function(form){
        if(form.$invalid){
            return;
        }else{
            $scope.mailSending=true;
            send={};
            send.name=$scope.user.name;
            send.email=$scope.user.email;
            send.message=$scope.message;
            $http({
                url:'users/sendMail',
                method:'POST',
                dataType:'JSON',
                data:send
            }).success(function(response){
                if(response=='true'){
                    $scope.mailSending=false;
                    $scope.showNoti('Your message is successfully sent we will respond to your query within <strong>1</strong> hour');
                    $scope.showSupport=false;
                }else{
                    $scope.mailSending=false;
                    $scope.showNoti('Sorry message can not be sent !!');
                }
            }).error(function(response) {
                /* Act on the event */
                console.log(response);
            });;
        }
    }

    
});


// ((((((((((((((((((((((((((((((((((Kitchen Page Functions))))))))))))))))))))))))))))))))))

 app.controller('kitchenShowCtrl',function($scope,$http,$timeout,$routeParams,$ocLazyLoad){
    
    
    $scope.$parent.gotop();
    //console.log($scope.cookid);
    // pid=($routeParams.kitchen_id.split('/'));

    // console.log($scope.$parent.lastKitchenId);
    // console.log($routeParams.kitchen_id);
    $scope.$parent.bodyClass='kitchen-body';
    $scope.kitchenShow=false;
    $ocLazyLoad.load('assets/css/tabs.css');
    $ocLazyLoad.load('assets/css/tabstyles.css')

    if($scope.$parent!=null&&$scope.$parent.lastKitchenId!=$routeParams.kitchen_id){
    
    $scope.loading=true;
    // $scope.kitchenProducts=[];
    $scope.cookid=$routeParams.kitchen_id;
    $http({
        url:'home/getKitchenPageData/'+$scope.cookid,
    }).success(function(response){
        console.log(response);
       created=response.kitchenInfo[0].createdon.split(' ');
       //console.log(response.id);
       $scope.$parent.lastKitchenId=$routeParams.kitchen_id;
       // console.log($scope.$parent.lastKitchenId);
       date=created[0].split('-');
       //console.log(created);
       time=created[1].split(':');
       var mydate = new Date(response.kitchenInfo[0].createdon);
        response.kitchenInfo[0].createdon=mydate;
        $scope.$parent.kitchenData=response.kitchenInfo[0];
        $scope.$parent.menuItems=response.products;
        $scope.$parent.weekly_menu=response.weekly_menu;
        $scope.loading=false;
        $scope.kitchenShow=true;
        if(response.products){
            $scope.$parent.todaysMenuItems=response.products.filter(function(data){
                    
                    return data.todays_menu===true;
                });
        }else{
           $scope.$parent.todaysMenuItems=[];
           $scope.$parent.menuItems=[]; 
        }
        $scope.found=true;
        
        $scope.todayLoaded=true;

       
    });
}else{
    $scope.kitchenShow=true;
    $scope.todayLoaded=true;
    // $scope.$parent.singleItemDisplay($routeParams.productId);
    // if($routeParams.productId){
    //     $timeout(function(){$scope.$parent.singleItemDisplay($routeParams.productId);},0);
    // }
}
    $scope.tabNav=[];
        for(i=0;i<3;i++){
            $scope.tabNav[i]={current:false};
        }
    $scope.setTab=function(index){
            console.log(index);
            console.log($scope.tabNav)
            angular.forEach($scope.tabNav,function(value,key){
                if(key==index){
                    $scope.tabNav[key].current=true;
                }else{
                    $scope.tabNav[key].current=false;
                }
            })
        }
         $scope.setTab(0);
 });


app.controller('checkoutCtrl',function($scope,$http,$timeout,$interval){
    // console.log($scope);
    
    $scope.$parent.gotop();
    $scope.loading=true;
    var cartLookUp=$interval(function(){
        // console.log($scope.$parent.cartLoaded);
        if($scope.$parent.cartLoaded){

            if($scope.$parent.checkCartValidity()){
                $scope.checkOutValid=true;
            }else{
                $scope.checkOutValid=false;
            }
            $scope.loading=false;
            $scope.checkoutShow=true;
            $interval.cancel(cartLookUp);
        }
    },20);
    $scope.$parent.bodyClass='checkout-body';
    $scope.payment={};
    $scope.transactionCharge=null;
    $scope.deliveryCharge=0;
    $scope.showInvoiceDeliveryCharge=false;
    $scope.$parent.searched=false;
    $scope.showCart=false;
    $scope.paymentSelected=false;
    // console.log($scope);
    $scope.checkout=[
        {current:true,visited:false},
        {current:false,visited:false},
        {current:false,visited:false},
        {current:false,visited:false}

];
$scope.showProcess=function(index){
console.log(index);
    if(index==0||$scope.checkout[index-1].visited){     
        for(var i=0;i<$scope.checkout.length;i++){
               if(i==index){
                console.log(i);
                   $scope.checkout[i].current=true;
               }else{
                   $scope.checkout[i].current=false
               }
         
           }
       }
}
$scope.procedeNext=function(index){
    $scope.$parent.gotop();
    if(index<$scope.checkout.length-1){
        $scope.checkout[index].visited=true;
        $scope.checkout[index+1].current=true;
        $scope.checkout[index].current=false;
    }else{
        // console.log(index);
        send={
            delivery_type:$scope.$parent.order,
            payment_type:$scope.payment,
            user:$scope.$parent.user
        }
        $http({
            url:'users/submitCart',
            method:'POST',
            dataType:'JSON',
            data:send,
        }).success(function(response){
            console.log(response);
            if(response=='success'){
            $scope.$parent.showNoti('<strong class="text-success">Your Order Is Successfully Submitted Thanks For Using <strong>Fumontor</strong></strong>');
            
            $timeout(function(){
                $scope.$parent.clearCart();
                window.location='#/orders'
            },1000);
            
        }
        }).error(function(response) {
            /* Act on the event */
            console.log(response);
        });
    }
}
$scope.checkoutNext=function(form,index){
    if(form.$invalid){
        rerurn;
    }
    //console.log(index);
   if(index==0){
    $scope.loading=true;
    send={address:$scope.$parent.user.address,phone:$scope.$parent.user.phone}
    $http({
        url:'users/updateUser',
        method:'POST',
        dataType:'JSON',
        data:send
    }).success(function(response){
        $scope.loading=false;
    }).error(function(response) {
        /* Act on the event */
        console.log(response);
    });
   }
    else if(index==1){
        //console.log($scope.$parent.checkoutTotal);
        $scope.loading=true;
        $scope.deliveryCharge=0;
        angular.forEach($scope.cartItems,function(value,key){
            //console.log(value.delivery_charge);
            charge=parseInt(value.delivery_charge);;
            if($scope.$parent.order[value.cooksId]){
                    charge=0;
                }
            $scope.deliveryCharge+=charge;

        });
        $scope.$parent.checkoutTotal=$scope.cartSubTotal+$scope.deliveryCharge;
        $scope.showInvoiceDeliveryCharge=true;
        $scope.loading=false;
    }
    else if(index==2){
        $scope.loading=true;
        angular.forEach($scope.payment,function(value,key){
            
            if(value){
            // console.log(key);
                if(key=='cashPayment'){
                    $scope.transactionCharge=0;
                }else if(key=='Bikash'){
                    $scope.transactionCharge=$scope.$parent.checkoutTotal*4/100;
                }
                $scope.paymentSelected=true;
                
            }
            if(!$scope.paymentSelected){
                $scope.$parent.showNoti('you didn\'t select a payment method ');
                return;
            }
        });
        angular.forEach($scope.$parent.cartItems,function(value,key){
            timeString='';
            rtime=value.reqtime.split(':');
            hr=parseInt(rtime[0]);
            min=parseInt(rtime[1]);
            if(hr!=0){
                if(hr==1){
                    timeString+=hr+' hour '
                }else{
                    timeString+=hr+' hours '
                }
            }
            if(min!=0){
                if(min==1){
                    timeString+=min+' minute'
                }else{
                    timeString+=min+' minutes';
                }
            }else{
                if(timeString==''){
                    timeString='30 minutes';
                }
            }
            $scope.$parent.cartItems[key].mindtime=timeString;

        });
        // console.log($scope.transactionCharge);
        $scope.$parent.checkoutTotal=$scope.cartSubTotal+$scope.deliveryCharge+$scope.transactionCharge;
        $scope.loading=false;
    }

    $scope.procedeNext(index);
}
    


$scope.setPayment=function(data){
// console.log(data);
// console.log($scope.payment);
    angular.forEach($scope.payment,function(value,key){
        // console.log(key);
        // console.log(value);
        if(key!=data){
            $scope.payment[key]=false;
        }else{
            $scope.payment[key]=true;
        }
    });
    $scope.paymentSelected=true;
}


   

});

// `((((((((((((((((((((((((Header Controller))))))))))))))))))))))))


app.controller('fuHeadCtrl',function($scope,$routeParams){
    
    $scope.searchquery='';
    $scope.placeholder='Search Food';
    $scope.menuList=[{current:false},{current:false},{current:false},{current:false},{current:false}];
    loc=window.location.hash;
    $scope.notlandingSearch=false;
    search_path=loc.split('/');
    console.log(search_path);
    if(search_path[1]=='search'){
        $scope.searchquery=decodeURI(search_path[3]);
    }

    $scope.$on('$routeChangeSuccess', function(next, current) { 
    // console.log(next);
        loca=window.location.hash;
        $scope.popup=false;
        search_path=loca.split('/');
        if(search_path[1]=='search'){
            $scope.searchquery=decodeURI(search_path[3]);
        }
        if(search_path[1]=='all-kitchen'||search_path[2]=='kitchen'){
            $scope.placeholder='Search Kitchen';
            
        }else{

            $scope.placeholder='Search Food';
        }
         if(search_path[1]=='all-kitchen'){
            $scope.notlandingSearch=true;
            $scope.setCurrent(3);
        }else if(search_path[1]=='home'){
            // console.log($scope.notlandingSearch);
            $scope.setCurrent(0);
            $scope.notlandingSearch=false;
        }else if(search_path[1]=='kitchen'){
            $scope.setCurrent(3);
            $scope.notlandingSearch=true;
        }else if(search_path[1]=='dishes'){
            $scope.notlandingSearch=true;
            $scope.setCurrent(1);
        }else if(search_path[1]=='search'){
            $scope.notlandingSearch=true;
            $scope.setCurrent(null);
        }else if(search_path[1]=='weekly-menu'){
            $scope.notlandingSearch=true;
            $scope.setCurrent(2);
        }else{
            $scope.setCurrent(null);
            $scope.notlandingSearch=false;
        }
   });
    $scope.moveto=function(id){
        
        $scope.open=!$scope.open;
        console.log(id);
        loca=window.location.hash;
        search_path=loca.split('/');
        if(id=='home'){
            $scope.notlandingSearch=true;
            if(search_path[1]=='home'||search_path[1]=='how'){
                $('body,html').animate({
                scrollTop: 0,
                    }, 800
                );
            }else{
                window.location='#/home'
            }
        }else if(id=='how'){
            if(search_path[1]=='home'||search_path[1]=='how'){
                howtop=angular.element(document.getElementById(id)).offset().top;
                $('body,html').animate({
                scrollTop: howtop,
                    }, 800
                );
            }else{
                window.location='#/how';
            }
        }else{
            window.location='#/'+id;
        }
    }

    // if(search_path[1]=='all-kitchen'){
    //     $scope.placeholder='Search Kitchen';
    // }else{
    //     $scope.placeholder='Search Food';
    // }
    $scope.setCurrent=function(index){
        angular.forEach($scope.menuList,function(value,key){
            if(index!=null&&key==index){
                if(index!=3)
                $scope.menuList[key].current=true;
                else
                $scope.menuList[key].current=!$scope.menuList[key].current;
            }else{
                $scope.menuList[key].current=false;
            }
        });
        $scope.showOpenKitchenModule=function(){
            model=angular.element(document.getElementById('cook-signup-model'));
            container=model.find('.fu-modal-container');
            model.addClass('is-visible');
            container.addClass('is-visible');
        }
        $scope.closeOpenKitchenModule=function(){
            model=angular.element(document.getElementById('cook-signup-model'));
            container=model.find('.fu-modal-container');
            model.removeClass('is-visible');
            container.removeClass('is-visible');
        }
    }
    
    $scope.allSearch=function(query){
        
        // console.log(search_path[1]);
        locat=window.location.hash;
        _path=locat.split('/');

        if(_path[1]!='all-kitchen'&&_path[2]!='kitchen'){
            window.location='#/search/head/'+query;
        }else{
            window.location='#/search/kitchen/'+query;
        }
        
    }
    $scope.clearSearch=function(){
        
        $scope.searchquery='';
        $('#search').focus();
        console.log($scope.searchquery);
    }

      transparency=0;
            windowHeight=$(window).height()/4;
            
            angular.element(document).bind('scroll',function(event) {
                /* Act on the event */
                // a=0.0;
                brandSearch=angular.element(document.getElementById('brand-search'));
                (brandSearch.offset()!=undefined)?searchtop=brandSearch.offset().top:searchtop=30;
                transparency+=0.5;
                if($(this).scrollTop()>0){
                    if($(this).scrollTop()>windowHeight){
                    
                    angular.element(document.getElementById('go-top')).addClass('visible');
                    }else{

                        angular.element(document.getElementById('go-top')).removeClass('visible');
                    }
                    if($(this).scrollTop()>searchtop){
                            $scope.popup=true;
                            $scope.$apply();
                        }else{
                            $scope.popup=false;
                            $scope.$apply();
                        }
                    // console.log($(this).scrollTop());
                    angular.element(document.getElementById('catagoryBar')).addClass('moveUp');
                    angular.element(document.getElementById('main-header')).addClass('fixed-top');
                    angular.element(document.getElementById('filter-icon')).addClass('top-me');
                    angular.element(document.getElementById('topme-btn')).addClass('top-me');
                    $scope.$parent.slideNav=true;
                }else{
                    $scope.$parent.slideNav=false;
                    angular.element(document.getElementById('catagoryBar')).removeClass('moveUp');
                    angular.element(document.getElementById('main-header')).removeClass('fixed-top');
                    angular.element(document.getElementById('filter-icon')).removeClass('top-me');
                    angular.element(document.getElementById('topme-btn')).removeClass('top-me');
                }

                $scope.$apply();
            });
                

    // console.log($scope);

});

// ((((((((((((((((((((((((((((((((((((((Product Page Controller))))))))))))))))))))))))))))))))))))))

app.controller('productPageCtrl',function($scope,$http,$routeParams,$rootScope,$ocLazyLoad,$window){
    

    
    // $('#search').focus();
    $scope.$parent.gotop();
    $scope.$parent.bodyClass='product-body';
    $scope.filter={};
    $scope.filter.tagsList=tags;
    $scope.filter.catagories=catagories;
    $scope.filter.offerList=offers;
    $scope.filter.orderTypes=orderTypes;
    $scope.filter.cusineFilters=cusineFilters
    $scope.filter.location='';
    $scope.filteredmenuItems=[];
    $scope.filter.menuOrderType='1';
    $scope.filter.cusine={value:''};
    $scope.filter.delivery_methods=deliveryMethods;
    $scope.$parent.searched=true;
    $rootScope.index=0;
    
    // $scope.$parent.location=$routeParams.location;
    // $scope.filter.location=$routeParams.location;
    // $scope.orderType=$routeParams.orderType;
    // $scope.$parent.orderType=$scope.orderType;
    //console.log(orderType);
    
    $scope.closeModel=function(data){
        var item=angular.element(document.getElementById(data));
        item.children('.fu-modal-container').removeClass('is-visible');
        item.removeClass('is-visible');
    }

   
    $scope.filter.PriceRangeSlider = {
          min: 0,
          max: 1000,
          options: {
            floor: 0,
            ceil: 1000,
          }
        };

    $scope.$on("slideEnded", function() {
     $scope.submitFilterQuery('price');
    });

    $scope.submitFilterQuery=function(data){
        // console.log(data);
        $scope.filterdmenuItems=[];
        $scope.$parent.StartLoading();
        $scope.$parent.gotop();
        $scope.index=1;
        // if(data=='preorder'){
        //     $scope.filter.orderTypes[0].checked=true;
        //     $scope.filter.orderTypes[1].checked=false;
            
        // }else if(data=='ordernow'){
            
        //     $scope.filter.orderTypes[1].checked=true;
        //     $scope.filter.orderTypes[0].checked=false;
        // }
        // console.log($scope.searchedOrderType)
        // console.log($scope.filter);
        $http({
            url:'home/getFilterData',
            dataType:'JSON',
            method:'POST',
            data:$scope.filter
        }).success(function(response){
            console.log(response);
            if(response!='false'){
                
                $scope.$parent.NotFoundMessage='';
                $scope.filterdmenuItems=response.data;
                if(response.data.length<8){
                    $scope.productEnd=true;
                }else{
                    $scope.productEnd=false;
                }
                $scope.endLoading();
            }else{
                $scope.filterdmenuItems=[];
                $scope.$parent.NotFoundMessage='No Item Found ';
                $scope.$parent.endLoading();  
            }
        }).error(function(response){
            console.log(response);
        });
        
    }
    $scope.loadMoreFood=function(index){
        // disableScroll()
        $scope.moreFoodloading=true;
        $http({
            url:'home/getFilterData?load='+index,
            dataType:'JSON',
            method:'POST',
            data:$scope.filter
        }).success(function(response){
            console.log(response);
            if(response!='false'){
                $scope.index++;
                $scope.$parent.NotFoundMessage='';
                angular.forEach(response.data,function(value,key){
                    if(key!='myreview'||key!='quantity'){
                        $scope.filterdmenuItems.push(value);
                    }
                });
                if(response.data.length<8){
                    $scope.productEnd=true;
                }
                $scope.moreFoodloading=false;
                $scope.endLoading();
                // enableScroll();
            }else{
                // $scope.filterdmenuItems=[];
                $scope.$parent.NotFoundMessage='No more Item Found ';
                $scope.moreFoodloading=false;
                $scope.productEnd=true;
                // $scope.$parent.endLoading();  
            }
        }).error(function(response){
            console.log(response);
        });
    }
    $scope.hideFilterBar=function(){
        $scope.$parent.searched=!$scope.$parent.searched;
    }
    index=1;
    mainDiv=angular.element(document.getElementById('product-div'))
    $scope.submitFilterQuery($scope.orderType);

            angular.element($window).bind("scroll", function() {
                loc=window.location.hash.slice(2,13);
                if(loc=='dishes'){
                offset=this.pageYOffset;
                 

                maxheight=mainDiv.height()-$(window).height();
                if(offset>maxheight-200&&!$scope.moreFoodloading&&!$scope.productEnd){
                    // console.log(maxheight);

                    
                    $scope.loadMoreFood(index);
                    index++;
                }else{
                        
                }
            }
            });

});

// ((((((((((((((((((((((((((((((((((((((((All Kithcen Page Ctrl))))))))))))))))))))))))))))))))))))))))

app.controller('allKitchenCtrl',function($scope,$http,$routeParams){
    // console.log($scope);
    $scope.placeholder='Search Kithcen';
    $scope.$parent.gotop();
    $scope.loading=true;
    $scope.allKitchens=[];
    $scope.kithenloading=false;
    $scope.prevHeight=0;
    $scope.endLoading=false;
    $scope.location=$routeParams.location;
    $scope.filter={};
    
    $scope.filter.deliveryTypes=deliveryMethods;
            

    $scope.$parent.bodyClass="allKitchens-body";
    var start=0,end=8;
    $scope.api_base='';
       
       // $('#search').focus();
        if($routeParams.location){
            $scope.api_base='home/getAllKitchen/'+start+'/'+end+'/'+$routeParams.location;
        }else{
           $scope.api_base='home/getAllKitchen/'+start+'/'+end; 
        }
     
    

    
        // console.log(angular.element($('body')));
    angular.element(window).scroll(function(event) {
        /* Act on the event */
        loc=window.location.hash.slice(2,13);

        if(loc=='all-kitchen'){
        contentBox=angular.element(document.getElementById('all-kitchen'));
        offset=contentBox.offset();
        height=contentBox.height();

        tops=(offset!=undefined)?offset.top:55;
        
        // console.log(height);
        
            
        if($(this).scrollTop()>tops+height-window.outerHeight-200){
               // console.log($scope.endedLoading); 
            if(!$scope.kithenloading&&!$scope.endedLoading&&$scope.kitchensLoaded){
                // if(!$routeParams.location){
                    $scope.loadmore();
                // }
                
                
                
                }
            }
      
        
        }
        
    });
    
    $scope.loadmore=function(){
        disableScroll();
        $scope.kithenloading=true;
        
        (start==0)?start=start+9:start=start+8;
        
        // console.log(start);
        // console.log(end);
        // console.log($scope.filter);
        $scope.$apply();
        if($routeParams.location){
        $scope.api_base='home/getAllKitchen/'+start+'/'+end+'/'+$routeParams.location;
        }else{
           $scope.api_base='home/getAllKitchen/'+start+'/'+end; 
        }
        $http({
            url:$scope.api_base,
            dataType:'JSON',
            data:$scope.filter,
            method:'POST'
        }).success(function(response){
            console.log(response);
            if(response!='false'){
                angular.forEach(response,function(value,key){
                    $scope.allKitchens.push(value);
                    
                });
            }
            else{
                $scope.endedLoading=true;
                
            }
            
        $scope.kithenloading=false;
        enableScroll();
        $scope.kitchensLoaded=true;
        
        }).error(function(response) {
            /* Act on the event */
            console.log(response);
        });
    }

    $scope.filterKitchen=function(filter){
        start=0,end=8;
        // console.log($scope.filter);
        $scope.endedLoading=false;
        $http({
            url: 'home/getAllKitchen/'+start+'/'+end,
            dataType:'JSON',
            method:'POST',
            data:filter
        }).success(function(response){
            // console.log(response);
            // return;
            if(response!='false'){
            
            $scope.allKitchens=response;
            $scope.kitchensLoaded=true;
            $scope.loading=false;
            // console.log($scope.allKitchens);
            // return;

        }else{
            // console.log(response);
            $scope.endedLoading=true;
            $scope.kitchensLoaded=true;
            $scope.loading=false;

        }
        }).error(function(response) {
            /* Act on the event */
            console.log(response)
        });
    }
        $scope.filterKitchen($scope.filter);
        // $('#search').focus();

});



// (((((((((((((((((((((((((((((searchPageController)))))))))))))))))))))))))))))
// 
// 
// ________________________________________________________________________________


app.controller('searchPageCtrl',function($scope,$routeParams,$http){
    $scope.placeholder='Search Food'
    $scope.loading=true;
    $scope.searched=false;
    $scope.searchedMenuItems=[];
    $scope.filter={};
    $scope.filter.orderTypes=orderTypes;
            $scope.filter.catagories=catagories;
            $scope.filter.cusineFilters=cusineFilters;
            $scope.filter.deliveryTypes=deliveryMethods;
            $scope.filter.PriceRangeSlider = {
                  min: 0,
                  max: 1000,
                  options: {
                    floor: 0,
                    ceil: 1000,
                  }
                };
    if($scope.$parent){
        $scope.$parent.gotop();
    }
    $('#search').focus();
   
    
    $scope.closeModel=function(data){
        var item=angular.element(document.getElementById(data));
        item.children('.fu-modal-container').removeClass('is-visible');
        item.removeClass('is-visible');
    }
    $scope.submitFilterQuery=function(query){
        $scope.index=1;
         $scope.$parent.gotop();
         // $scope.searchedMenuItems=[];
    // console.log($routeParams);
    $http({
        url:'home/search/food/'+query,
        dataType:'JSON',
        method:'POST',
        data:$scope.filter
    }).success(function(response){
        console.log(response);
        if(response!='false'){
            $scope.searchedMenuItems=response.items;
            $scope.notFoundMessage='';
            // console.log(response.items);
            $scope.totalFound=response.total;
            $scope.searcedItemsShow=true;
        }else{
            $scope.notFoundMessage='';
        }
        $scope.loading=false;
    });
    }
    $scope.query=$routeParams.query;
    $scope.submitFilterQuery($scope.query);
    $('#search').focus();
    
});


// (((((((((((((((((((((((((((((searchKitchenController)))))))))))))))))))))))))))))
// 
// 
// ________________________________________________________________________________

app.controller('searchKitchenCtrl',function($scope,$routeParams,$http){
    $scope.loading=true;
    $('#search').focus();
    $scope.filter={};
    
    $scope.filter.deliveryTypes=deliveryMethods;
    
    $scope.query=$routeParams.query;
    if($scope.$parent){
        $scope.$parent.gotop();
    }
    $scope.allKitchens=[];
    $http({
        url:'home/search/kitchen/'+$scope.query,
    }).success(function(response){
        if(response!='false'){
            // console.log(response);
            $scope.allKitchens=response.kitchens;
            $scope.total=response.total;
        }
        $scope.resultFound=true;
        $scope.endedLoading=true;
        $scope.loading=false;
    });


});


app.controller('orderCtrl',function($scope,$http){
    console.log($scope.$parent);
    $scope.orderLoading=true;
    $scope.orders=[];
    
    $http({
        url:'home/getMyOrders',
    }).success(function(response){
        console.log(response);
        $scope.orders=response;
        $scope.orderLoading=false;
    }).error(function(response) {
        /* Act on the event */
        console.log(response);
    });

});
// (((((((((((((((((((((((((weekMenu Controller)))))))))))))))))))))))))

app.controller('weekMenuCtrl',function($http,$scope){
    if($scope.$parent){
        $scope.$parent.gotop();
    }
    $scope.weeklyMenuLoading=true;
    $http({
        url:'home/getAllWeeklyMenu'
    }).success(function(response){
        console.log(response);
        if(response){
            $scope.weeklyMenus=response;
            $scope.weeklyMenuLoading=false;
        }
    }).error(function(response) {
        /* Act on the event */
        console.log(response);
    });

});





// ((((((((((((((((((((((((((Single Weekly Menu CTRL))))))))))))))))))))))))))

app.controller('singleWeekMenuCtrl',function($scope,$http,$routeParams){
    if($scope.$parent){
        $scope.$parent.gotop();
    }
    $id=$routeParams.id;
    $scope.singleWeeklyMenuLoading=true;
    $scope.weeklyMenuItem=[];
    $http({
        'url':'home/getSingleWeeklyMenu/'+$id
    }).success(function(response){
        console.log(response[0]);
        if(response){
            $scope.weeklyMenuItem=response;
            $scope.singleWeeklyMenuLoading=false;
        }
    }).error(function(response) {
        /* Act on the event */
        console.log(response);

    });
});
app.controller('weeklyCheckoutCtrl',function($scope,$routeParams,$http,$timeout){
    $scope.$parent.gotop();
    $scope.id=$routeParams.id;
    if($scope.$parent.loggedin){
        $scope.singleWeeklyMenuLoading=true;
        $http({
        'url':'home/getSingleWeeklyMenu/'+$scope.id
    }).success(function(response){
        console.log(response[0]);
        if(response){
            $scope.weeklyMenuItem=response;
            $scope.singleWeeklyMenuLoading=false;
        }
    }).error(function(response) {
        /* Act on the event */
        console.log(response);

    });
    }
    $scope.getNumber = function(num) {
        number=[];
        for(i=1;i<=num;i++){
            number.push(i);
        }  
        return number;
    }
    $scope.checkoutNext=function(form){
        // console.log($scope.weeklyMenuItem)
        $scope.loading=true;
    send={address:$scope.$parent.user.address,phone:$scope.$parent.user.phone}
        $http({
            url:'users/updateUser',
            method:'POST',
            dataType:'JSON',
            data:send
        }).success(function(response){
            $scope.loading=false;
            $scope.placeUOrder($scope.weeklyMenuItem);
        }).error(function(response) {
            /* Act on the event */
            console.log(response);
        });
}    
    $scope.numberformat=function(str){
        return parseInt(str);
    }
    $scope.placeUOrder=function(item){
        send=item[0];
        $http({
            url:'home/placeWeeklyOrder',
            method:'POST',
            dataType:'JSON',
            data:send
        }).success(function(response){
            console.log(response);
            if(response.success){
            $scope.$parent.showNoti('<strong class="text-success">Your Order Is Successfully Submitted Thanks For Using <strong>Fumontor</strong></strong>');
            
            $timeout(function(){
               
                window.location='#/orders'
            },1000);
            }else{
                 $scope.$parent.showNoti('<strong class="text-danger">Something went wrong !! please try again later</strong>')
            }
        }).error(function(response) {
            /* Act on the event */
            console.log(response);
        });;
    }
});


 // **********************************************************
 //                             Directives
 //************************************************************
 

app.directive('fuHead',function(){
    return{
        restrict:'EA',
        controller:'fuHeadCtrl',
        link:function($scope,elem,attr){
          
            elem.ready(function(){
                elem.show();
            })
                
        }
    }
}).directive('bgPreload',function(){
        return{
            restrict:'EA',
            link:function(scope,elem,attr){
               elem.ready(function(){
                src=attr.srcImage;
                // console.log(src);
                img=new Image();
                img.src=src;
                $(img).on('load',function(){
                    elem.attr({
                        src: this.src
                    });
                    elem.siblings('.img-loader').hide();
                    // t_src='url("'+this.src+'")';
                    // m_src=decodeURI(t_src);
                    // elem.attr('src',this.src);
                    // elem[0].style.backgroundImage=t_src;
                    // elem.find('.vd-progress').hide();
                });
               })
            }
        }
    }).directive('price',function(){
        return{
            scope: {
              ngModel: '=',
              minQuantity:'='
            },
            require: 'ngModel',
            link:function(scope,elem,attr,ctrl){
                // console.log(ctrl)
             
                 ctrl.$viewChangeListeners.push(

                        function handleNgModelChange() {
                             
                            var mVl=ctrl.$modelValue;
                            
                            if(ctrl.$viewValue<scope.minQuantity||isNaN(mVl)){
                                
                                ctrl.$setViewValue(scope.minQuantity);
                                ctrl.$render();
                                
                            }
                        })
                //  ctrl.$parsers.push(function (inputValue) {
                //     if (inputValue == undefined) return '';
                //     var transformedInput = inputValue.replace(/[^0-9]/g, '');
                //     if (transformedInput !== inputValue) {
                //         ctrl.$setViewValue(transformedInput);
                //         ctrl.$render();
                //     }
                //     return transformedInput;
                // });
               

            }
        }
    });


app.directive('productLoading', function () {
      return {
        restrict: 'E',
        replace:true,
        template: '<div class="center productLoading" ><div class="spinner "><div class="img-loader"></div></div></div>',
        link: function (scope, element, attr) {
            $(element).show();
              scope.$watch('loading', function (val) {  
                  if (!val)
                    $(element).hide();
                  else
                    $(element).show();
              });
        }
      }
  });
 app.directive('menuItem',function($http,$timeout){
    return {
        restrict:'E',
        templateUrl:'home/getTamplate/menuItemCard',
        scope:{
            items:'=',
            href1:'='
        },
        link:function(scope,elem,attr){
            // console.log(scope);
            scope.addToCart=function(data){
                scope.$parent.$parent.addToCart(data);
            }
            
            scope.singleItemDisplay=function(data){
                // console.log(data);
                var item=angular.element(document.getElementById(data));
                item.addClass('is-visible');
                item.children('.fu-modal-container').addClass('is-visible');
            }

                // scope.$watch('menuItems',function(val){
                    
                //     if(!val.length){
                //         scope.notFound=true
                //     }else{
                //         scope.NotFound=false;
                //     }
                // });
            
        }
    }
 });
 app.directive('catagory',function($http){
    return{
        restrict:'E',
        replace:true,
        template:'<ul class="catagoryList">'+
        '<li ng-repeat="catagory in filter.catagories">'+
        '<label class="checkbox" '+
        'ng-class="{checked:catagory.checked}">'+
        '<span class="icons"><span class="first-icon '+
        'fui-checkbox-unchecked"></span><span class="second-icon'+
        ' fui-checkbox-checked"></span></span>'+
        '<input type="checkbox" ng-model="catagory.checked"'+

        'ng-change="submitFilterQuery(\'catagory\')" '+
        'data-toggle="checkbox"/>{{catagory.name}}</label>'+
        '</li>'+
        '</ul>'
    }
 });
app.directive('deliveryMethods',function(){
    return{
        restrict:'EA',
        replace:true,
        template:'<ul id="deliveryMethodsList" class="deliveryMethodsList">'+
        '<li ng-repeat="delivery in filter.delivery_methods">'+
        '<label class="checkbox" '+
        'ng-class="{checked:delivery.checked}">'+
        '<span class="icons"><span class="first-icon '+
        'fui-checkbox-unchecked"></span><span class="second-icon'+
        ' fui-checkbox-checked"></span></span>'+
        '<input type="checkbox" ng-model="delivery.checked"'+
        'ng-change="submitFilterQuery(\'delivery\')" '+
        'data-toggle="checkbox"/>{{delivery.name}}</label>'+
        '</li>'+
        '</ul>'
    }
});
app.directive('orderType',function(){
    return{
        restrict:'EA',
        replace:true,
        templateUrl:'home/getTamplate/catagory-order-type'
    }
});
app.directive('tags',function(){
    return{
        restrict:'EA',
        replace:true,
        template:'<ul class="tagsList">'+
        '<li ng-repeat="tag in filter.tagsList">'+
        '<label class="checkbox" '+
        'ng-click="tag.checked=!tag.checked" '+
        'ng-class="{checked:tag.checked}">'+
        '<span class="icons"><span class="first-icon '+
        'fui-checkbox-unchecked"></span><span class="second-icon'+
        ' fui-checkbox-checked"></span></span>'+
        '<input type="checkbox" ng-model="tag.checked"'+
        'data-toggle="checkbox"/>{{tag.name}}</label>'+
        '</li>'+
        '</ul>'
    }
});
app.directive('offers',function(){
    return{
        restrict:'EA',
        replace:true,
        template:'<ul class="offerList">'+
        '<li ng-repeat="offer in offerList">'+
        '<label class="checkbox" '+
        'ng-click="offer.checked=!offer.checked" '+
        'ng-class="{checked:offer.checked}">'+
        '<span class="icons"><span class="first-icon '+
        'fui-checkbox-unchecked"></span><span class="second-icon'+
        ' fui-checkbox-checked"></span></span>'+
        '<input type="checkbox" ng-model="offer.checked"'+
        'data-toggle="checkbox"/>{{offer.name}}</label>'+
        '</li>'+
        '</ul>'
    }
});

app.directive('productPopup',function(){
    return{
        restrict:'EA',
        replace:true,
        templateUrl:'home/getTamplate/itemDescripPopup',
        link:function(scope,elem,attr){
        scope.shareLink=function(href,name,caption,imgurl,description){
            console.log(imgurl);
        href=(typeof href!='undefined')?href:'http://fumontor.com';
        name=(typeof name!='undefined')?name:'Fumontor';
        caption=(typeof caption!='undefined')?caption:'A yummy relationship';
        imgurl=(typeof imgurl!='undefined')?imgurl:'http://fumontor.com/assets/img/home-logo-sm.png';
        description=(typeof description!='undefined')?description:'Search and order home food Share Recipes';
        FB.ui({
              method: 'share',
              href: href,
              title:name,
              picture:imgurl,
              source:imgurl,
              caption: caption,
              description:description,
          }, function(response){});
    }
    }
}
});

app.directive('catagoryBar',function(){
    return{
        restrict:'EA',
        replace:true,
        templateUrl:'home/getTamplate/catagoryFilterBar',
        link:function(scope,elem,attr){

        }
    }
});
app.directive('notFoundMessage',function(){
    return{
        restrict:'EA',
        replace:true,
        template:'<div class="text-theme" ng-hide="items.length"'+
        ' class="sorryMessage">{{NotFoundMessage}}</div>'
    }
});
app.directive('rightNavigation',function(){
    return{
        restrict:'EA',
        replace:true,
        templateUrl:'home/getTamplate/home-right-navigation'
    }
});

app.directive('searchBar',function(){
    return{
        restrict:'EA',
        replace:true,
        templateUrl:'home/getTamplate/home-search-bar'
    }
});

app.directive('userCart',function(){
    return{
        restrict:'E',
        'ngModel':'=',
        templateUrl:'home/getTamplate/cart'
    }
});
app.directive('fuNotification',function(){
    return {
        restrict:'E',
        replace:true,
        template:'<div class="ns-box ns-bar ns-effect-slidetop ns-type-notice '+
        '{{notiVisibility}}"><div class="ns-box-inner"><span class="fa fa-bullhorn">'+
        '</span><p id="notiMessage"></p></div><span class="ns-close" '+
        'ng-click="notiClose()"></span></div>',
        link:function(scope,elem,attr){
            elem.hide();
            scope.$watch('notiHide',function(value){
                if(!value){
                    elem.show();
                }else{
                    elem.hide();
                }
            });
        }
    };
});
app.directive('slider', function($timeout) {
  return {
    restrict: 'AE',
    replace: true,
    controller:'kitchenShowCtrl',
    templateUrl: 'home/getTamplate/slider',
    link:function(scope,elem,attr){
        
        
        //console.log(elem.children('#lightSlider'));
    }
    
  };
});
app.directive('cartForm',function(){
    return{
        restrict:'EA',
        replace:true,
        templateUrl:'home/getTamplate/cart-form'
    }
});
app.directive('checkoutAddress',function(){
    return {
        restrict:'AE',
        replace:true,
        templateUrl:'home/getTamplate/checkout-address'
    }
});
app.directive('checkoutDeliveryMethod',function(){
    return{
        restrict:'AE',
        replace:true,
        templateUrl:'home/getTamplate/checkout-delivery-method'
    }
});
app.directive('checkoutBilling',function(){
    return{
        restrict:'AE',
        replace:true,
        templateUrl:'home/getTamplate/checkout-billing'
    }
});
app.directive('checkoutConfirm',function(){
    return{
        restrict:'AE',
        replace:true,
        templateUrl:'home/getTamplate/checkout-confirm'
    }
});

app.directive('invoice',function(){
    return{
        restrict:'AE',
        replace:true,
        templateUrl:'home/getTamplate/invoice'
    }
});

app.directive('uniquePhone', function(isPhoneAvailable) {
  return {
    require: 'ngModel',
    link: function($scope, elem, attrs, ctrl) {
        
        if(!ctrl)return;
    
        ctrl.$asyncValidators.checkPhone=isPhoneAvailable;
    
        }
       
    
  
};
});

app.directive('searchFilter',function($routeParams,$window,$interval,$http){
    return{
        restrict:'EA',
        scope:{
            type:'=',
            items:'=',
        },
        templateUrl:'home/getTamplate/kitchen-filter',
        link:function(scope,elem,attr){
            height=elem.addClass('fixed');
            // console.log(scope);
            scope.filter=[];
            scope.filterItems=[];
            scope.searched=true;
            if(scope.items!=null||scope.type!='all'){
                

                var foundwatch=$interval(function(){
                
                    if(typeof (scope.$parent[scope.items])!='undefined'){
                        if(!scope.filterItems.length&&scope.$parent[scope.items].length){
                        // console.log(val);
                        scope.filterItems=scope.$parent[scope.items];
                        // console.log(scope.filterItems);
                        $interval.cancel(foundwatch);
                        
                    }
                    }
                });
            }else{

            }
            // console.log(scope.$parent[scope.items]);
            // console.log(scope);
            
            
            // console.log(scope);
            var filter;
            var mainDiv;
            var boundery;
            if(scope.type=='food'||scope.type=='all'){
                    boundery=0;
                    toffset=-40;
                }else{
                    toffset=100;
                    boundery=160;
                }
                console.log(boundery);
            // console.log(scope.$parent[scope.items]);
            filter=elem.find('.kitchen-filter');
            if(scope.type=='food'||scope.type=='all'){
                scope.filter=scope.$parent.filter;
                elem.addClass('food-search');

                mainDiv=angular.element(document.getElementById('product-div'));
            }else{
                scope.filter=scope.$parent.$parent.filter;
                elem.addClass('kithcens-search');
                mainDiv=angular.element(document.getElementById('all-kitchen'));
            }
            
            proOfset=elem.offset();
            
            angular.element($window).bind("scroll", function() {
                offset=this.pageYOffset;
                maxheight=mainDiv.height()-$(window).height();
                if(offset>proOfset.top-70&&maxheight>200){
                    // console.log(maxheight);

                    
                    if(offset>maxheight-toffset){
                        
                        // filter.css({top:this.pageYOffset-($this)})
                        filter.removeClass('fixed');
                        
                        filter.css('margin-top', (offset-(offset-maxheight)-boundery)+'px');
                    }else{
                        filter.addClass('fixed')
                    }
                }else{
                        filter.css('margin-top','0px');
                        filter.removeClass('fixed');
                }
            });

            scope.searchQuery=function(data){
                  if(scope.type=='all'){
                    scope.$parent.filter=scope.filter;
                    scope.$parent.submitFilterQuery(data);
                  }else if(scope.type=='food'){
                    
                    scope.$parent.filter=scope.filter;
                    scope.$parent.submitFilterQuery($routeParams.query);
                  }
            }
         
            scope.$on("slideEnded", function() {
                         scope.searchQuery('price');
                        });

            scope.searchQueryKitchen=function(){
                scope.$parent.loading=true;
                scope.$parent.gotop();
                foundedItems=[];

                angular.forEach(scope.filterItems,function(value,key){
                    deliveryFilter=false;
                    deliveryChecked=false;
                    if(scope.filter.deliveryTypes[0].checked){
                        deliveryChecked=true;
                        if(value[scope.filter.deliveryTypes[0].value]==true){
                            deliveryFilter=true;
                        }
                    }
                    if(scope.filter.deliveryTypes[1].checked){
                        deliveryChecked=true;
                        if(value[scope.filter.deliveryTypes[1].value]==true){
                            deliveryFilter=true;
                        }
                    }


                    if(!deliveryChecked||deliveryFilter){
                        foundedItems.push(value);
                    }
                });
                console.log(foundedItems);
                scope.$parent[scope.items]=foundedItems;
                scope.$parent.loading=false;

            }
        scope.searchQueryAllKitchen=function(){
            
            // console.log(scope.filter);
            scope.$parent.$parent.$parent.gotop();
            scope.$parent.$parent.filterKitchen(scope.filter);        
        }


        }

    }
});


app.directive('login',function(){
    return{
        restrict:'EA',
        templateUrl:'home/getTamplate/login',
        scope:{
            redir:'='
        },
        link:function(scope,elem,attr){
            console.log(scope);
        }
    }
});

app.directive('fbShareButton',function(){
    function createHTML(href,layout){
        return '<div class="fb-share-button"'+
            'data-href="'+href+'" '+
            'data-layout="'+layout+'">';
    }
    return{
        restrict:'A',
        scope:{},
        link:function (scope,elem,attrs){
            attrs.$observe('pageHref',function(newValue){
                var href=newValue;
                console.log(newValue);
                var layout=attrs.layout;
                elem.html(createHTML(href,layout));
                FB.XFBML.parse(elem[0]);
            });
        }
    }
})

app.directive('reviews',function($http){
    return{
        restrict:'EA',
        templateUrl:'home/getTamplate/reviews',
        link:function(scope,elem,attr){
            
            // console.log(scope);
            scope.addReview=function(form,item_id){
                scope.addingReview=true;
                if(form.$invalid){
                    return;
                }else{

                    if(!scope.review.image){
                        scope.review.image='';
                    }
                    scope.review.product_id=item_id;
                    var d = new Date();
                    scope.review.time = Math.floor(d.getTime()/1000);
                    console.log(scope)
                    // scope.review.image=user.image;
                    $http({
                        url:'home/addReview',
                        method:'POST',
                        dataType:'JSON',
                        data:scope.review
                    }).success(function(response){
                        console.log(response);
                        if(response=='success'){
                            scope.review['user_id']=scope.$parent.$parent.user.id;
                            scope.review['name']=scope.$parent.$parent.user.name;
                            if(scope.item.reviews){
                                scope.item.reviews[0].totalmark+=scope.review.mark;
                               
                                scope.item.reviews[0].total_review++;
                                scope.item.reviews.push(scope.review);
                            }else{
                                scope.item.reviews=[];
                                scope.review.totalmark=scope.review.mark;
                                scope.review.total_review=1;
                                scope.item.reviews.push(scope.review);
                                
                            }
                            scope.item.myreview=[];
                            scope.item.myreview.push(scope.review);
                            scope.addingReview=false;
                            scope.writeModelShow=false;
                            scope.reviewAdded=true;
                        }
                    }).error(function(response) {
                        /* Act on the event */
                        console.log(response)
                    });
                }
            }
            scope.editReview=function(form,item_id,review){
                if(form.$invalid){
                    return;
                }
                if(!review.image){
                        review.image='';
                    }
                review.product_id=item_id;
                scope.editingReview=true;
                $http({
                    url:'home/editReview/',
                    method:'POST',
                    dataType:'JSON',
                    data:review,
                }).success(function(response){
                    console.log(response);
                    if(response!='failed'){
                        scope.item.reviews=response;
                        scope.editingReview=false;
                        scope.editModelShow=false;
                    }
                }).error(function(response) {
                    /* Act on the event */
                    console.log(response);
                });
            }
            scope.deleteReview=function(item_id){
                scope.editingReview=true;
                $http({
                    url:'home/deleteReview/'+item_id,
                }).success(function(response){
                    console.log(response)
                    if(response!='false'){
                        scope.item.reviews=response;
                        scope.item.myreview=[];
                        scope.editingReview=false;
                        scope.editModelShow=false;
                    }else if(response=='failed'){
                        scope.$parent.$parent.showNoti('<span class="text-danger">Deletion Failed !!</span>');
                    }else{
                        scope.item.reviews=[];
                        scope.item.myreview=[];
                        scope.editingReview=false;
                        scope.editModelShow=false;
                    }
                    
                }).error(function(response) {
                    /* Act on the event */
                    console.log(response);
                });
            }
        }
    }
});


app.directive('orderCard',function(){
    return{
        restrict:'EA',
        scope:{
            items:'=',
        },
        templateUrl:'home/getTamplate/order-card',
        link:function(scope,elem,attr){

        }
    }
});
// app.directive('imgPreload',  function($rootScope) {
//     return {
//       restrict: 'A',
//       scope: {
//         ngSrc: '@'
//       },
//       link: function(scope, element, attrs) {
//         element.on('load', function() {
//           element.addClass('in');
//         }).on('error', function() {
//           //
//         });

//         scope.$watch('ngSrc', function(newVal) {
//           element.removeClass('in');
//         });
//       }
//     };
// });
// ***************** Rating Function *************************

app.directive('starRating', starRating);
 function starRating() {
    return {
      restrict: 'EA',
      template:
        '<ul class="star-rating" ng-class="{readonly: readonly}">' +
        '  <li ng-repeat="star in stars" class="star" ng-class="{filled: star.filled}" ng-click="toggle($index)">' +
        '    <i class="fa fa-star"></i>' + // or &#9733
        '  </li>' +
        '</ul>',
      scope: {
        ratingValue: '=ngModel',
        max: '=?', // optional (default is 5)
        onRatingSelect: '&?',
        readonly: '=?'
      },
      link: function(scope, element, attributes) {
        if (scope.max == undefined) {
          scope.max = 5;
        }
        function updateStars() {
          scope.stars = [];
          for (var i = 0; i < scope.max; i++) {
            scope.stars.push({
              filled: i < scope.ratingValue
            });
          }
        };
        scope.toggle = function(index) {
            // console.log(index);
          if (scope.readonly == undefined || scope.readonly === false){
            scope.ratingValue = index + 1;
            scope.onRatingSelect({
              rating: index + 1
            });
          }
        };
        scope.$watch('ratingValue', function(oldValue, newValue) {
            // console.log(newValue);
          if (oldValue!=newValue) {
            updateStars();
          }
        });
        updateStars();
      }
    };
  }

app.directive('chatbox',function($http){
    return{
        restrict:'EA',
        templateUrl:'home/getTamplate/chatbox',
        scope:{
            onlineUsers:'&?',
            user:'&?',
            submitUrl:'&?',
            userFetchUrl:'&?',
        },
        link:function(scope,elem,attr){
            scope.onlineUsers=[];
            scope.submitChatMessage=function(message,to){
                send={'sender_id':scope.user.id,'user_id':to,'message':message}
                $http({
                    url:scope.submitUrl,
                    dataType:'JSON',
                    data:send,
                    method:'POST'
                }).success(function(response){
                    console.log(response);
                }).error(function(response){
                    console.log(response);
                });

            }
            scope.fetchOnlineUsers=function(){
                $http({
                    url:scope.userFetchUrl,
                    method:'GET',
                }).success(function(response){
                    console.log(response);
                    scope.onlineUsers=response.online_users;
                }).error(function(response) {
                    /* Act on the event */
                });;
            }
        }
    }
});

app.directive('background',  function(preload) {
    return {
      restrict: 'EA',
      link: function(scope, element, attrs, tabsCtrl) {
        scope.landingLoaded=false;
        element.hide();
        
        preload(attrs.url).then(function(){
          element.css({
            "background-image": "url('"+attrs.url+"')"
          });
          
          
          element.show();
          scope.landingLoaded=true;
          scope.showLandingContainer=true;
          scope.$parent.loading=false;
          
          // console.log(scope)
        });
      }
    };
  });

// ***************** Factory  ********************************

app.factory('isPhoneAvailable', function($q, $http) {
  return function(phone) {
    var deferred = $q.defer();

    $http.get('users/phoneCheck/' + phone).success(function(data){
        // console.log(data);
        if(data){

            deferred.reject();
        }else{
            deferred.resolve();
        }
    });

    return deferred.promise;
  }
});
   
 app.factory('preload', function($q) {
      return function(url) {
        var deffered = $q.defer(),
       
        image = new Image();

        image.src = url;

        if (image.complete) {
      
          deffered.resolve();
      
        } else {
      
          image.addEventListener('load', function() {
            deffered.resolve();
          });
      
          image.addEventListener('error', function() {
            deffered.reject();
          });
        }

        return deffered.promise;
      }
    });

    app.directive('cookSignupForm',function($http){
        return{
            restrict:'EA',
            templateUrl:'home/getTamplate/user-cook-signupModel',
            link:function(scope,elem,attr){
                scope.registerUserAsCook=function(cookRegForm,cook){
                    console.log(cook);
                    if(cookRegForm.$invalid){
                        return;
                    }
                    scope.formSubmitting=true;
                    $http({
                        url:'users/ajaxRegUserAsCook',
                        method:'POST',
                        dataType:'JSON',
                        data:cook,
                    }).success(function(response){
                        console.log(response);
                        if(response.status){
                            window.location='cooks';
                        }else{
                            scope.$parent.$parent.showNoti(response.message);
                        }
                    });
                }
            }
        }
    });

    app.directive('phoneInput', function($filter, $browser) {
    return {
        require: 'ngModel',
        link: function($scope, $element, $attrs, ngModelCtrl) {
            // console.log(ngModelCtrl);
            var listener = function() {
                var value = $element.val().replace(/[^0-9]/g, '');
                $element.val($filter('tel')(value, false));
            };

            // This runs when we update the text field
            ngModelCtrl.$parsers.push(function(viewValue) {
                return viewValue.replace(/[^0-9]/g, '').slice(0,13);
            });

            // This runs when the model gets updated on the scope directly and keeps our view in sync
            ngModelCtrl.$render = function() {
                $element.val($filter('tel')(ngModelCtrl.$viewValue, false));
            };

            $element.bind('change', listener);
            $element.bind('keydown', function(event) {
                var key = event.keyCode;
                // If the keys include the CTRL, SHIFT, ALT, or META keys, or the arrow keys, do nothing.
                // This lets us support copy and paste too
                if (key == 91 || (15 < key && key < 19) || (37 <= key && key <= 40)){
                    return;
                }
                $browser.defer(listener); // Have to do this or changes don't get picked up properly
            });

            $element.bind('paste cut', function() {
                $browser.defer(listener);
            });
        }

    };
});

// ***************** Filters **********************

app.filter('todaysMenuFilter',function(){
    return function(data){
        returnedData=[];
        console.log(data);
        return returnedData;
    }
})
app.filter('tel', function () {
    return function (tel) {
        // console.log(tel);
        if (!tel) { return ''; }

        var value = tel.toString().trim().replace(/^\+/, '');

        if (value.match(/[^0-9]/)) {
            return tel;
        }

        var country, number;

        switch (value.length) {
            case 1:
            case 2:
            case 3:
                country = value;
                break;

            default:
                country = value.slice(0, 3);
                number = value.slice(3);
        }

        if(number){
            if(number.length>4){
                if(number.length>7){
                    number = number.slice(0, 4) + '-' + number.slice(4,7)+'-'+number.slice(7,10);
                }else
                number = number.slice(0, 4) + '-' + number.slice(4,7);
            }
            else{
                number = number;
            }

            return ("(" + country + ") " + number).trim();
        }
        else{
            return "(" + country+")";
        }

    };
});

// ***************** Static Variables ***********************


var catagories=[
{name:'Home Food',checked:false,catagory:'home-food'},
{name:'Fast Food',checked:false,catagory:'fast-food'},
{name:'deshi',checked:false,catagory:'desi'},
{name:'Juice',checked:false,catagory:'juice'}
];
var cusineFilters=[
{value:'Bangla'},
{value:'Chinise'},
{value:'French'},
{value:'Thai'},
{value:'English'},
{value:'Italian'}
];
var deliveryMethods=[
{name:'Pick Up',checked:false,value:'pickup'},
{name:'Home Delivery',checked:false,value:'home_delivery'}
];
var tags=[
{name:'Chiken',checked:false},
{name:'Beef','checked':false},
{name:'Rice',checked:false},
{name:'Polau',checked:false},
{name:'Khichuri',checked:false},
{name:'Kacchi',checked:false},
{name:'Mutton',checked:false},
{name:'Fish',checked:false},
{name:'Fish (Shutki)',checked:false},
{name:'Vegetable',checked:false},
{name:'Dal',checked:false},
{name:'Bharta',checked:false},
{name:'Salad',checked:false},
{name:'Set Menu',checked:false},     
];
var offers=[
{name:'Special Offers',checked:false},
{name:'Hot deal',checked:false}
];
var orderTypes=[
{name:'Pre-Order',value:'0',checked:false},
{name:'Instant Order',value:'1',checked:false}
];
var slickConfig=  {
            dots:true,
            lazyLoad: 'ondemand',
            enabled: true,
            autoplay: false,
            arrows:true,
            draggable: true,  
            autoplaySpeed: 4000,
            method: {},
            centerMood:true,
            slidesToShow: 4,
            slidesToScroll: 1,
            event: {
                beforeChange: function (event, slick, currentSlide, nextSlide) {
                },
                afterChange: function (event, slick, currentSlide, nextSlide) {
                }
            },
             responsive: [
                        {
                          breakpoint: 1024,
                          settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: true
                          }
                        },
                        {
                          breakpoint: 600,
                          settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                          }
                        },
                        {
                          breakpoint: 480,
                          settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                          }
                        }
                        // You can unslick at a given breakpoint now by adding:
                        // settings: "unslick"
                        // instead of a settings object
                      ]
        };
var slideme=function(item,elem){
    $(elem).lightSlider({
        item: item,
        autoWidth: false,
        slideMove: 1, // slidemove will be 1 if loop is true
        slideMargin: 10,
 
        addClass: 'todays-slider',
        mode: "slide",
        useCSS: true,
        cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
        easing: 'linear', //'for jquery animation',////
 
        speed: 400, //ms'
        
        pauseOnHover: true,
        loop: false,
        slideEndAnimation: false,
        pause: 4000,
        auto: true,
        keyPress: true,
        controls: true,
        prevHtml: '',
        nextHtml: '',
 
        rtl:false,
        adaptiveHeight:false,
 
        vertical:false,
        verticalHeight:100,
        vThumbWidth:100,
 
        thumbItem:16,
        pager: false,
        gallery: false,
        galleryMargin: 10,
        thumbMargin: 8,
        currentPagerPosition: 'middle',
 
        enableTouch:true,
        enableDrag:true,
        freeMove:true,
        swipeThreshold: 50,
 
        responsive : [],
 
        onBeforeStart: function (el) {},
        onSliderLoad: function (el) {},
        onBeforeSlide: function (el) {},
        onAfterSlide: function (el) {},
        onBeforeNextSlide: function (el) {},
        onBeforePrevSlide: function (el) {}
    });
};

var fuTypes=[
{value:'meal',checked:true},
{value:'snacks',checked:false},
{value:'biriyani',checked:false},
{value:'cake',checked:false}
]
var fKitchen=[
{img:'assets/img/f8.jpg',href:'#/',title:'Fu Kithcen'},
{img:'assets/img/f8.jpg',href:'#/',title:'Fu Kithcen'},
{img:'assets/img/f8.jpg',href:'#/',title:'Fu Kithcen'},
{img:'assets/img/f8.jpg',href:'#/',title:'Fu Kithcen'},
{img:'assets/img/f8.jpg',href:'#/',title:'Fu Kithcen'},
{img:'assets/img/f8.jpg',href:'#/',title:'Fu Kithcen'},
{img:'assets/img/f8.jpg',href:'#/',title:'Fu Kithcen'},
{img:'assets/img/f8.jpg',href:'#/',title:'Fu Kithcen'},
]