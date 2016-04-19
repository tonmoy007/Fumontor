<link rel="stylesheet" href="assets/css/admin/gridProducts.css">
<link rel="stylesheet" href="assets/css/animate.css">
<link rel="stylesheet" href="assets/css/fu-modal.css">
<div class="search-form-back" ng-controller="searchCtrl">
<div class="search-form-container fadeIn animated" id="searchForm"  >
    <div class="form-overlay" >
        <div class="form" >
            <div class="">
                <form name="Location" method="get" accept-charset="utf-8" ng-submit="submitQuery(query.city,query.location,Location)">
                <ul class="search-list cool-shadow">
                <li class="form-list"><label>I am in </label></li>

                    <li class="form-list"><select required="true" name="city" ng-init="query.city=cities[0].name" ng-model="query.city" ng-options="city.name for city in cities" class="form-control">
                    <option value="">City?</option>
                        
                    </select></li>
                    
                               
                    <li class="form-list"><input required="true" type="text"  placeholder="Area/Location" typeahead="c as c.name for c in places | filter:$viewValue | limitTo:10" typeahead-min-length='1' typeahead-on-select='onSelectPart($item, $model, $label)' ng-model="query.location" typeahead-template-url="home/getTamplate/searchTemplate" class="form-control" ></li>
               

                    <li class="form-list"><button type="submit" class="btn btn-danger">Find ME FOOD </button></li>

                    
            </ul>
                </form>
            </div>
            
            
        </div>
        <div class="navbar navbar-right">
                <ul class="well cool-shadow">
                    <li><a href="" title="Signin/register" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sign-in"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="auth/login">Signin</a></li>
                            <li><a href="">Register As Cook</a></li>
                            <li><a href="">Register As Foodie</a></li>
                        </ul>
                    </li>
                    <li><a href="" title="WHAT IS IT?>"><i class="fa fa-question-circle"></i></a></li>
                    <li><a href="" title="Cart"><i class="fa fa-cart-arrow-down"></i></a></li>
                    
                </ul>
            </div>

</div>
    
</div>

<div class="catagory-bar cool-shadow" id="catagoryBar" ng-class='{searched:searched}'>
    <div class="catagory-bar-container">
        <div class="form-label">
            Fiter Your Menu
        </div>
        <catagory></catagory>
    </div>
</div>

    <div class="product-show-div" ng-class="{'searched':searched}">
        <div class="product-show-div-container"  ng-show="menuItemsShow">
            <div ng-hide="menuItems.length" class="sorryMessage">
                {{NotFoundMessage}}
            </div>
             <menu-item query="query"></menu-item>
            </div>
        
        <product-loading></product-loading> 
    </div>
   
</div>


<script>
var searchBar=document.getElementById('searchForm');
var catagoryBar=document.getElementById('catagoryBar')
    $(window).scroll(function(){
        ( $(this).scrollTop() > 140 ) ? $(searchBar).addClass('fixed-top') :$(searchBar).removeClass('fixed-top');
        if( $(this).scrollTop() > 140 ) { 
            $(catagoryBar).addClass('topDown');
        }else{
            $(catagoryBar).removeClass('topDown');
        }
    });
</script>