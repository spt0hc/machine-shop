<div class="index-content" ng-controller="page-info">
    <p class="nav-link">
        <a href="admin/">Quản trị</a>
    </p>
    <div class="main-content">
            <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8 col-md-offset-0 col-md-6 col-lg-offset-0 col-lg-6">
                <div class="total-access-user soft-box text-center">
                       <p>{{INFO.ACCESS_COUNTER}}<span class="glyphicon glyphicon-user"></span></p>
                </div>
            </div>
            <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8 col-md-offset-0 col-md-6 col-lg-offset-0 col-lg-6">
                <div class="total-customer-order soft-box text-center">
                    <p>{{INFO.ORDER_COUNTER}}<span class="glyphicon glyphicon-shopping-cart"></span></p>
                </div>
            </div>
            <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8 col-md-offset-0 col-md-6 col-lg-offset-0 col-lg-6">
                <div class="m-ram soft-box text-center">
                    <p>RAM</p>
                    <div class="free">
                        <div class="used" style="width:{{INFO.RAM.per_used}}%;"></div>
                        <p>{{INFO.RAM.per_used}}%</p>
                    </div>
                    <p><span class="note-free glyphicon glyphicon-stop"></span> Trống</p>
                    <p><span class="note-used glyphicon glyphicon-stop"></span> Đã sử dụng</p>
                </div>
            </div>
            <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8 col-md-offset-0 col-md-6 col-lg-offset-0 col-lg-6">
                <div class="m-disk soft-box text-center">
                    <p>DISK SPACE</p>
                    <div class="free">
                        <div class="used" style="width:{{INFO.DISK.per_used}}%"></div>
                        <p>{{INFO.DISK.per_used}}%</p>
                    </div>
                    <p><span class="note-free glyphicon glyphicon-stop"></span> Trống</p>
                    <p><span class="note-used glyphicon glyphicon-stop"></span> Đã sử dụng</p>
                </div>
            </div>
    </div>
</div>