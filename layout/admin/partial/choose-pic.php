<div class="image-manager-content" ng-controller="pics_popup">
    <div class="main-content">
        <div class="col-xs-12 col-sm-5 col-md-4 col-lg-4">
            <div class="list-dir soft-box">
                <p ng-repeat="item in dirs">
                    <a data-dir="{{item}}" class="dir">
                        <span class="glyphicon glyphicon-folder-open"></span>
                        <span>{{item}}</span>
                    </a>
                </p>

                <style>

                    .active {
                        color: #ff4040 !important;
                    }
                </style>

            </div>
        </div>
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
            <div class="list-img soft-box">
                <div ng-repeat="item in imgs" class="wrap-item col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-0 col-md-4 col-lg-3">
                    <div data-src="{{item}}" class="thumbnail item">
                        <img src="{{item}}" alt="">
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>