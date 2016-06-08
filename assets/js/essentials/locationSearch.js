
angular.module('queryfilter',[]).filter("getqueryresults",function() { // register new filter
     return function(item,result) { // filter arguments
        console.log(item)
        return item;
        // implementation
    };
 });

var app=angular.module('homeApp',['ui.bootstrap','uiSwitch','rzModule','slickCarousel','queryfilter','ngRoute']);
var ItemData={};
app.config(function($routeProvider) {
    $routeProvider.when('/kitchen/:kitchen_id',{
        templateUrl:'home/getTamplate/kitchenPage',
        controller:'kitchenShowCtrl'
    }).when('/kitchen/:kitchen_id/:productId',{
        templateUrl:'home/getTamplate/kitchenPage',
        controller:'productShowCtrl',
    }).when('/checkout',{
        templateUrl:'home/getTamplate/checkoutPage',
        controller:'checkoutCtrl'
    }).when('/search/:location/:orderType',{
        templateUrl:'home/getTamplate/home-products',
        controller:'productPageCtrl'
    }).when('/all-kitchen',{
        templateUrl:'home/getTamplate/all-kitchen',
        controller:'allKitchenCtrl'
    }).otherwise({
        templateUrl:'home/getTamplate/landing',
        controller:'landingCtrl'     
    });
});
app.controller('landingCtrl',function($scope,$http){
    $scope.$parent.bodyClass='home-body';
});
app.controller('productShowCtrl',function($routeParams,$scope,$interval,$timeout,$http){
    // console.log($routeParams);
    // console.log($scope);
    
    $scope.kitchenShow=false;
    $scope.loading=true;
    $scope.closeModel=function(data){
        var item=angular.element(document.getElementById(data));
        item.children('.fu-modal-container').removeClass('is-visible');
        item.removeClass('is-visible');
        window.location='#/kitchen/'+$routeParams.kitchen_id;
        $scope.kitchenShow=true;
        $timeout(function(){$scope.todayLoaded=true;},1000);
    }
    busy=false;
    var init=$interval(function(){
        if(!$scope.$parent.menuItems.length&&!busy){
            busy=true;
            $http({
                url:'home/getItemData/'+$routeParams.kitchen_id+'/'+$routeParams.productId
            }).success(function(response){
                
                if(response!='false'){
                    $scope.$parent.menuItems.push(response[0]);
                    
                    console.log(response);
                $timeout(function(){
                    $scope.loading=false;
                    var pop=$interval(function(){
                        if($('#'+$routeParams.productId).length){

                        $scope.$parent.singleItemDisplay($routeParams.productId);
                        $interval.cancel(pop);
                        }
                    });
                    
                   $interval.cancel(init);
                    },0);
                }else{
                    $scope.loading=false;
                    $scope.$parent.showNoti('Sorry the item is not available Go to <a href="#/"><strong>Fumontor Home Page</strong></a>');
                    
                }
                

            }).error(function(response) {
                /* Act on the event */
                console.log(response);
            });;
            
        }else{
            // console.log($scope);
             $scope.kitchenShow=false;
             $scope.todayLoaded=false;
             $timeout(function(){
                $scope.$parent.singleItemDisplay($routeParams.productId);
                // $scope.kitchenShow=true;
            },0);
            $interval.cancel(init);
            
        }
    });
});
app.controller('searchCtrl',function($scope,$http,$timeout,$document,$routeParams){
    $scope.loggedin=false;
    $scope.searched=false;
    $scope.fixedTop=false;
    $scope.count=0;
    $scope.lastKitchenId=$routeParams.kitchen_id;
    $scope.user=[];
    $scope.showCart=false;
    $scope.menuItems=[];
    $scope.trendingKitchen=fKitchen;
    $scope.cartItems=[];
    $scope.cartSubTotal=0;
    $scope.cartTotal=0;
    $scope.places={};
    $scope.query={};
    $scope.searchedFoodTypes=fuTypes;
    $scope.loading=true;
    $scope.menuItemsShow=false;
    $scope.notFound=false;
    $scope.foodtype=[];
    $scope.foodtype.name='meal'
    $scope.cities=[{name:'Dhaka'},{name:'Chittagong'}];  
    $scope.notiHide=true;
    $scope.slickConfig =slickConfig;
    $scope.query.city=null;
    $scope.query.location=null;
    $scope.bodyClass='home-body';
    var myQ=$scope.query;
    $scope.order={};
    $scope.orderDeliveryCharge=[];
    $scope.cartOrderType='';
    $scope.checkOutTotal=0;
    $scope.searchedOrderType=false;
    $scope.todaysMenuItems=[];
   
    angular.element(document).ready(function(){
            $scope.animated=true;
        });
    $http({
        url:'home/getHomeData',
        method:'POST',
        dataType:'JSON'
    }).success(function(data){
        $scope.trendingFood=data.trendingFood;
        $scope.trendingKitchen=data.trendingKitchen;
        $timeout(function(){
            $scope.trendingKitchenShow=true;
            $scope.trendingFoodShow=true;
        },300);
        
        
        $scope.places=data.places;
        if(data.user!=undefined){
            $scope.loggedin=true;
            $scope.user=data.user;
            //console.log($scope.user);
        }
        $scope.cartTotal=data.cartTotal;
        $scope.cartTotalItems=parseInt(data.cartTotalItems);
        
        
        cartCatagoriseItem=[];
        // console.log(data.cartContents);
        

        $scope.prepareCart(data.cartContents);
        //console.log($scope.cartItems);
        $scope.cartSubTotal=data.cartSubTotal;
        $scope.checkoutTotal=data.cartSubTotal;
        // console.log($scope.cartItems);

        // ItemData=$scope.menuItems;
        //console.log(ItemData);
        
            
        $scope.endLoading();
                
    }).error(function(response) {
        /* Act on the event */
        console.log(response);
    });;
    $scope.setActive=function(name){
        angular.forEach($scope.searchedFoodTypes,function(value,key){
            if(value.value==name){
                $scope.searchedFoodTypes[key].checked=true;
            }else{

                $scope.searchedFoodTypes[key].checked=false;  
            }
        });
    }
    $scope.prepareCart=function(data){
        log=[];
        angular.forEach(data,function(value,key){
        
        var options=JSON.parse(value.options);
            //console.log($scope.cartOrderType);

        if(!$scope.cartOrderType){
            var type=options.orderType;
            //console.log(type);
            if(type=='Pre Order'){
                $scope.cartOrderType='preorder';
            }else{
                $scope.cartOrderType='todays_menu';
            }
        }
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
            //console.log(options);
            //console.log(parseInt(value.subtotal));
            
                $scope.cartItems.push(obj);

                
            }
            
            
            

        },log);
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
            $scope.showNoti('Sorry looks like you did\'t fullfil some kithcen\'s requrement !! Please visit the <a href="javascript:void(0)" ng-click="showCart=true"><strong>kitchen Page</strong></a> in the cart warning block ');
            
        }
    }
    $scope.isString=function(value){
        return typeof value==='string';
    }
    $scope.gotop=function(){

        $('body,html').animate({
            scrollTop: 0 ,
            }, 800
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
   

    $scope.onSelectPart=function(item,model,label){
        
    }
    
    $scope.submitQuery=function(city,location,form){

        $scope.gotop();
        $scope.searched=true;
        // console.log(city);
        var orderType=(city)?'ordernow':'preorder';
        window.location='#/search/'+location.name+'/'+orderType;
    }


    $scope.addToCart=function(data){
        // console.log(data);
        //console.log(data);
        if($scope.cartOrderType!=''){
            if(data.todays_menu&&$scope.cartOrderType!='todays_menu'){
                $scope.showNoti('Sorry we can not process <strong>Pre Order</strong> and <strong>Instant Order</strong> at a time try other <strong>Pre Order</strong> items or clear the cart');
                return;
            }else if(!data.todays_menu&&$scope.cartOrderType!='preorder'){
                $scope.showNoti('Sorry we can not process <strong>Pre Order</strong> and <strong>Instant Order</strong> at a time try other <strong>Instant Order</strong> items or clear the cart');
                return;
            }
        }else{
            $scope.cartOrderType=(data.todays_menu)?'todays_menu':'preorder';
        }
        if(data.todays_menu){
            $ordertime=data.ordernow_time_text;
            $orderType='Instant Order';
        }else{
            $ordertime=data.preorder_time_text;
            $orderType='Pre Order';
        }
        subtotal=parseInt(data.price)*parseInt(data.quantity);
        options={
            'cooksid':data.cooksID,
            'kitchenName':data.kitchename,
            'min_order':data.min_order,
            'orderType':$orderType,
            'ordertime':$ordertime,
            'pickup':data.pickup,
            'home_delivery':data.home_delivery,
            'delivery_charge':parseInt(data.delivery_charge)
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
    
    $scope.makeItemActive=function(data){
        //console.log(data);
        var log=[];
        
        if($scope.menuItems[data].active!=true){
            
            angular.forEach($scope.menuItems, function(value, key) {
                      value.active=false;
                    }, log);
                $scope.menuItems[data].active=true;
            }

    }


    
    $scope.singleItemDisplay=function(data){
        console.log(data);
        var item=angular.element(document.getElementById(data));
        item.addClass('is-visible');
        item.children('.fu-modal-container').addClass('is-visible');
    }
    $scope.toggleCart=function(value=true){
        $scope.showCart=!$scope.showCart;
    }

    
});

// ((((((((((((((((((((((((((((((((((Kitchen Page Functions))))))))))))))))))))))))))))))))))

 app.controller('kitchenShowCtrl',function($scope,$http,$timeout,$routeParams){
    
    
    //console.log($scope.cookid);
    // pid=($routeParams.kitchen_id.split('/'));

    // console.log($scope.$parent.lastKitchenId);
    // console.log($routeParams.kitchen_id);
$scope.$parent.bodyClass='kitchen-body';

if($scope.$parent.lastKitchenId!=$routeParams.kitchen_id){
    
    $scope.loading=true;
    // $scope.kitchenProducts=[];
    $scope.cookid=$routeParams.kitchen_id;
    $http({
        url:'home/getKitchenPageData/'+$scope.cookid,
    }).success(function(response){
        // console.log(response);
       created=response.kitchenInfo[0].createdon.split(' ');
       //console.log(response.id);
       $scope.$parent.lastKitchenId=$routeParams.kitchen_id;
       // console.log($scope.$parent.lastKitchenId);
       date=created[0].split('-');
       //console.log(created);
       time=created[1].split(':');
       var mydate = new Date(date[0],date[1],date[2],time[0],time[1],time[2]);
        response.kitchenInfo[0].createdon=mydate.valueOf();
        $scope.$parent.kitchenData=response.kitchenInfo[0];
        $scope.$parent.menuItems=response.products;
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


 });


app.controller('checkoutCtrl',function($scope,$http,$timeout,$window){
    
    if($scope.$parent.checkCartValidity()){
        $scope.checkOutValid=true;
    }else{
        $scope.checkOutValid=false;
    }
    $scope.$parent.bodyClass='checkout-body';
    $scope.payment={};
    $scope.transactionCharge=null;
    $scope.deliveryCharge=0;
    $scope.loading=false;
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

    if($scope.checkout[index-1].visited){     
        for(var i=0;i<$scope.checkout.length;i++){
                       if(i==index){
                           $scope.checkout[i].current=true;
                       }else{
                           $scope.checkout[i].current=false
                       }
                 
           }
       }
}
$scope.procedeNext=function(index){
    
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
            // console.log(response);
            if(response=='success'){
            $scope.$parent.showNoti('Your Order Is Successfully Submitted Thanks For Using <strong>Fumontor</strong>');
            
            $timeout(function(){
                $scope.$parent.clearCart();
                window.location='#/'
            },1000);
            
        }
        }).error(function(response) {
            /* Act on the event */
            console.log(response);
        });;
    }
}
$scope.checkoutNext=function(form,index){
    if(form.$invalid){
        rerurn;
    }
    //console.log(index);
   if(index==0){
    send={address:$scope.$parent.user.address,phone:$scope.$parent.user.phone}
    $http({
        url:'users/updateUser',
        method:'POST',
        dataType:'JSON',
        data:send
    }).success(function(response){
        
    });
   }
    if(index==1){
        //console.log($scope.$parent.checkoutTotal);
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
    }
    if(index==2){
        
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
        // console.log($scope.transactionCharge);
        $scope.$parent.checkoutTotal=$scope.cartSubTotal+$scope.deliveryCharge+$scope.transactionCharge;
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


app.controller('fuHeadCtrl',function($scope){

    $scope.menuList=[{current:true},{current:false},{current:false},{current:false},{current:false}];
    $scope.setCurrent=function(index){
        angular.forEach($scope.menuList,function(value,key){
            if(key==index){
                if(index!=3)
                $scope.menuList[key].current=true;
                else
                $scope.menuList[key].current=!$scope.menuList[key].current;
            }else{
                $scope.menuList[key].current=false;
            }
        });
    }
});

// ((((((((((((((((((((((((((((((((((((((Product Page Controller))))))))))))))))))))))))))))))))))))))

app.controller('productPageCtrl',function($scope,$http,$routeParams){

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
    $scope.filter.location=$routeParams.location;
    orderType=$routeParams.orderType;
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
     $scope.submitFilterQuery($scope.filter);
    });

    $scope.submitFilterQuery=function(data){
        // console.log(data);
        $scope.$parent.StartLoading();
        $scope.$parent.gotop();
        if(data=='preorder'){
            $scope.filter.orderTypes[0].checked=true;
            $scope.filter.orderTypes[1].checked=false;
            
        }else if(data=='ordernow'){
            
            $scope.filter.orderTypes[1].checked=true;
            $scope.filter.orderTypes[0].checked=false;
        }
        // console.log($scope.searchedOrderType)
        
        $http({
            url:'home/getFilterData',
            dataType:'JSON',
            method:'POST',
            data:$scope.filter
        }).success(function(response){
            // console.log(response);
            if(response!='false'){
                
                $scope.$parent.NotFoundMessage='';
                $scope.filterdmenuItems=response;

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
    $scope.hideFilterBar=function(){
        $scope.$parent.searched=!$scope.$parent.searched;
    }
    $scope.submitFilterQuery(orderType);

});

// ((((((((((((((((((((((((((((((((((((((((All Kithcen Page Ctrl))))))))))))))))))))))))))))))))))))))))

app.controller('allKitchenCtrl',function($scope,$http){
    $scope.loading=true;
    $scope.allKitchens=[];
    $scope.$parent.bodyClass="allKitchens-body"
    start=0;end=4;
    $http({
        url:'home/getAllKitchen/'+start+'/'+end,
    }).success(function(response){
        // console.log(response);
        $scope.allKitchens=response;
        $scope.kitchensLoaded=true;
        $scope.loading=false;
    }).error(function(response) {
        /* Act on the event */
        console.log(response)
    });

        // console.log(angular.element($('body')));
    $scope.checkScroll=angular.element($('body')).scroll(function(event) {
        /* Act on the event */

                    
         if($(this).scrollTop()>windowHeight){
                    angular.element(document.getElementById('go-top')).addClass('visible');
                }else{

                    angular.element(document.getElementById('go-top')).removeClass('visible');
                }
    });
    $scope.loadmore=function(){
        
        
        start=$scope.allKitchens.length;
        end=$scope.allKitchens.length+2;
       
        $http({
            url:'home/getAllKitchen/'+start+'/'+end
        }).success(function(response){
            // console.log(response);
            if(response.length){
                angular.forEach(response,function(value,key){
                    $scope.allKitchens.push(value);
                });
            }
            else{
                $scope.endedLoading=true;
            }
        $scope.kitchensLoaded=true;
        $scope.loading=false;
        }).error(function(response) {
            /* Act on the event */
            console.log(response);
        });
    }
});
 // **********************************************************
 //                             Directives
 //************************************************************
 

app.directive('fuHead',function(){
    return{
        restrict:'E',
        replace:true,
        templateUrl:'home/getTamplate/fuHead',
        controller:'fuHeadCtrl',
        link:function($scope,elem,attr){
            transparency=0;
            windowHeight=$(window).height()/4;
            angular.element(document).scroll(function(event) {
                /* Act on the event */
                // a=0.0;
                
                transparency+=0.5;
                if($(this).scrollTop()>30){
                    if($(this).scrollTop()>windowHeight){
                    
                    angular.element(document.getElementById('go-top')).addClass('visible');
                    }else{

                        angular.element(document.getElementById('go-top')).removeClass('visible');
                    }
                    angular.element(document.getElementById('catagoryBar')).addClass('moveUp');
                    angular.element(document.getElementById('main-header')).addClass('fixed-top');
                    angular.element(document.getElementById('filter-icon')).addClass('top-me');
                    $scope.slideNav=true;
                }else{
                    $scope.slideNav=false;
                    angular.element(document.getElementById('catagoryBar')).removeClass('moveUp');
                    angular.element(document.getElementById('main-header')).removeClass('fixed-top');
                    angular.element(document.getElementById('filter-icon')).removeClass('top-me');
                }


            });
                
                
        }
    }
});


app.directive('productLoading', function () {
      return {
        restrict: 'E',
        replace:true,
        template: '<div class="center productLoading" style="font-size:2em"><div class="spinner"><i class="fa fa-spinner fa-pulse"></i></div></div>',
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
        templateUrl:'home/getTamplate/itemDescripPopup'
    }
});

app.directive('catagoryBar',function(){
    return{
        restrict:'EA',
        replace:true,
        templateUrl:'home/getTamplate/catagoryFilterBar'
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

// ***************** Filters **********************

app.filter('todaysMenuFilter',function(){
    return function(data){
        returnedData=[];
        console.log(data);
        return returnedData;
    }
})
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
            enabled: true,
            autoplay: true,
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
{value:'snakes',checked:false},
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