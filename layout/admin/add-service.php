<div class="add-service-content" ng-controller="add_service">
    <p class="nav-link">
        <a href="admin/">Quản trị</a> - <a href="admin/service/add.php">Thêm dịch vụ</a>
    </p>
    <div class="main-content">
        <div class="add-service">
            <form CLASS="submit-form" data-controller="admin" data-action="add_service" method="post">
                <div class="form-group">
                    <label for="txtname">Tên</label>
                    <input class="form-control" type="text" name="txtname" />
                </div>
                <div class="form-group">
                    <label for="txtdes">Mô tả</label>
                    <textarea id="txtdes" class="ckeditor" name="txtdes"></textarea>
                </div>

                <div class="form-group">
                    <label for="txtprice">Giá: <span class="format-money">{{price}}</span> vnđ</label>
                    <input class="form-control text-binding"  value="0" type="number" data-target="price" name="txtprice" />
                </div>

                <div class="form-group">
                    <label for="txtthumbnail">Hình đại diện</label>
                    <div class=" thumbnail" style="width: 60px;height: 60px">
                        <img CLASS="show_pic" src="" alt="">
                    </div>
                    <input class="form-control txtthumbnail" type="hidden" name="txtthumbnail" />
                    <button type="button" data-this="show_pic&txtthumbnail"  data-current-click="" data-target="choose-pic"  class="btn-popup btn-sel-pic btn btn-default">Chọn</button>
                </div>

                <button typeof="submit" class="btn btn-primary">Lưu</button>
            </form>
        </div>
    </div>
</div>