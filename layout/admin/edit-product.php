<div class="edit-product-content" ng-controller="edit_pro">
    <p class="nav-link">
        <a href="admin/">Quản trị</a> - <a href="admin/product/edit.php">Sửa sản phẩm</a>
    </p>
    <div class="main-content">
        <div class="edit-product">
            <form class="submit-form" data-controller="admin" data-action="edit_product" method="post">
                <input type="hidden" value="{{product.id}}" name="txtid" />
                <div class="form-group">
                    <label for="txtname">Tên</label>
                    <input class="form-control" value="{{product.name}}" type="text" name="txtname" />
                </div>
                <div class="form-group">
                    <label for="txtdes">Mô tả</label>
                    <textarea id="txtdes" class="ckeditor" name="txtdes"></textarea>
                </div>

                <div class="form-group">
                    <label for="txtprice">Giá: <span class="format-money">{{price}}</span> vnđ</label>
                    <input class="form-control text-binding"  value="{{product.price}}" type="number" data-target="price" name="txtprice" />
                </div>
                <div class="form-group">
                    <label for="txtprice_off">Phần trăm giá giảm: {{price_off}}%</label>
                    <input class="form-control text-binding" type="number" data-target="price_off" value="{{product.price_off}}"  name="txtprice_off" />
                </div>
                <div class="form-group">
                    <label for="txtthumbnail">Hình đại diện</label>
                    <div class="thumbnail" style="width: 60px;height: 60px">
                        <img class="show_pic" src="{{product.thumbnail}}" alt="">
                    </div>
                    <input class="form-control txtthumbnail" value="{{product.thumbnail}}" type="hidden" name="txtthumbnail" />
                    <button data-target="choose-pic" data-this="show_pic&txtthumbnail"  data-current-click="" type="button" class="btn-popup btn-sel-pic btn btn-default">Chọn</button>
                </div>
                <div class="form-group">
                    <label for="txtcat">Loại sản phẩm</label>
                    <select ng-model="txtcat" name="txtcat" class="form-control">
                     <!--   <option value="-1" selected="selected">---Chọn---</option>-->
                        <option ng-repeat="item in cats" value="{{item.id}}">{{item.name}}</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="txtmodel">Model </label>
                    <input value="{{product.model}}" class="form-control" type="text" name="txtmodel" />
                </div>
                <div class="form-group">
                    <label for="txtmade_in">Nơi sản xuất </label>
                    <input value="{{product.made_in}}" class="form-control" type="text" name="txtmade_in" />
                </div>
                <button typeof="submit" class="btn btn-primary">Lưu</button>
            </form>
        </div>
    </div>
</div>