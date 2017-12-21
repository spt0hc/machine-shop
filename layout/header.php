
<div class="header">
    <div class="col-md-4 col-sm-6">
        <a CLASS="home-page" href="trang-chu.html">
        <div class="logo">
            <img src="{{shop_info.logo}}" alt="">
        </div>
        <p>{{shop_info.shop_name}}</p>
        </a>
    </div>
    <div class="col-md-4 col-sm-6">
        <form action="search.php" class="search" method="get">
            <div class="input-group">
                <input CLASS="form-control" type="text" name="q">
                <span class="input-group-addon">
                    <button type="submit">
                       <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="contact">
            <span class="phone glyphicon glyphicon-phone"></span>
            <span >{{shop_info.phone}}</span>
            <span>|</span>
            <span class="addr glyphicon glyphicon-home"></span>
            <span >{{shop_info.addr}}</span>
        </div>
    </div>
    <div class="clearfix"></div>
</div>