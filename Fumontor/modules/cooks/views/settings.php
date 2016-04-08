

<script type="text/javascript" src="assets/js/settings.js"></script>
<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="assets/css/settings.css">
<link rel="stylesheet" type="text/css" href="assets/css/oredermanage.css">
<link rel="stylesheet" type="text/css" href="assets/css/tooltip-bloated.css">



<div id="settings-card" class="horizontal-card" ng-app="settingsApp">

    <div class="card-title"><i class="fa fa-cog"></i> Settings</div>
    <div class="card-body" ng-hide="loading" ng-controller="settingsCtrl as settings" ng-init="showDiv=false">
    
        <div class="card-half">
            <div class="card-column">
                <div class="card-column-head">Profile Settings</div>
                <div class="profile" >
                <loading></loading>
                <profile-settings></profile-settings>
                
                </div>
            </div>
        </div>
        <div class="card-half">
            <div class="card-column">
                <div class="card-column-head">Kitchen Settings</div>
                 <loading></loading>
                <div class="profile">
                    <kitchen-settings></kitchen-settings>
                </div>
            </div>
        </div>
    </div>
    <div class="card-foot"></div>
</div>
