<div class="add-product-content" ng-controller="add_pro">
    <p class="nav-link">
        <a href="admin/">Quản trị</a> - <a href="admin/product/add.php">Thêm sản phẩm</a>
    </p>
    <div class="main-content">
        <div class="add-product">
            <form class="submit-form" data-controller="admin" data-action="add_product" method="post">
                <div class="form-group">
                    <label for="txtname">Tên sản phẩm</label>
                    <input class="form-control" type="text" name="txtname" />
                </div>
                <div class="form-group">
                    <label for="txtdes">Mô tả</label>
                   <!-- <input class="form-control" type="text" name="txtdes" />-->
                   <textarea class="ckeditor" name="txtdes"></textarea>
                </div>

                <div class="form-group">
                    <label for="txtprice">Giá: <span class="format-money"></span>{{price}} vnđ</label>
                    <input class="form-control text-binding"  value="0" data-target="price" type="number" name="txtprice" />
                </div>
                <div class="form-group">
                    <label for="txtprice_off">Phần trăm giá giảm: {{price_off}} %</label>
                    <input class="form-control text-binding txtprice_off" data-target="price_off" type="number" value="0"  name="txtprice_off" />
                </div>
                <div class="form-group">
                    <label for="txtthumbnail">Hình đại diện</label>
                    <div class="thumbnail " style="width: 60px;height: 60px">
                        <img class="show_pic" src="" alt="">
                    </div>
                    <input class="form-control txtthumbnail" type="hidden" name="txtthumbnail" />
                    <button type="button" data-this="show_pic&txtthumbnail"  data-current-click="" data-target="choose-pic" class="btn-sel-pic btn-popup btn btn-default">Chọn</button>
                </div>
                <div class="form-group">
                    <label for="txtcat">Loại sản phẩm</label>
                    <select name="txtcat" class="form-control">
                        <option value="-1" selected="selected">---Chọn---</option>
                        <option ng-repeat="item in cats" value="{{item.id}}">{{item.name}}</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="txtmodel">Model </label>
                    <input class="form-control" type="text" name="txtmodel" />
                </div>
                <div class="form-group">
                    <label for="txtmade_in">Nơi sản xuất </label>
                    <input class="form-control" type="text" name="txtmade_in" />
                </div>
                <button typeof="submit" class="btn btn-primary">Lưu</button>
            </form>
        </div>
    </div>
</div>