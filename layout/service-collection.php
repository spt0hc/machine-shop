<div class="service-collection soft-box" id="service-collection">
    <div ng-repeat="item in services" class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
        <a href="dich-vu-{{item.tag}}-{{item.id}}.html">
            <div class="wrap-item soft-box">
                <div class="thumbnails">
                    <img src="{{item.thumbnail}}" alt="{{item.name}}">
                </div>
                <p title="{{item.name}}">{{item.name}}</p>
            </div>
        </a>
    </div>
    <div class="clearfix"></div>
</div>
