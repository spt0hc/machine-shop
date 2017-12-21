<div class="edit-service-content"  ng-controller="edit_service">
    <p class="nav-link">
        <a href="admin/">Quản trị</a> - <a href="admin/service/edit.php">Sửa dịch vụ</a>
    </p>
    <div class="main-content">
        <div class="edit-service">
            <form class="submit-form" data-controller="admin" data-action="edit_service" method="post">
                <input  type="hidden" name="txtid" value="{{service.id}}" />
                <div class="form-group">
                    <label for="txtname">Tên</label>
                    <input class="form-control" value="{{service.name}}" type="text" name="txtname" />
                </div>
                <div class="form-group">
                    <label for="txtdes">Mô tả</label>
                    <textarea id="txtdes" class="ckeditor" name="txtdes"></textarea>
                </div>

                <div class="form-group">
                    <label for="txtprice">Giá: <span class="format-money">{{price}}</span> vnđ</label>
                    <input class="form-control text-binding"  value="{{service.price}}" data-target="price" type="number" name="txtprice" />
                </div>

                <div class="form-group">
                    <label for="txtthumbnail">Hình đại diện</label>
                    <div class="thumbnail" style="width: 60px;height: 60px">
                        <img class="show_pic" src="{{service.thumbnail}}" alt="">
                    </div>
                    <input value="{{service.thumbnail}}" class="form-control txtthumbnail" type="hidden" name="txtthumbnail" />
                    <button data-this="show_pic&txtthumbnail"  data-current-click="" data-target="choose-pic"  type="button" class="btn-popup btn-sel-pic btn btn-default">Chọn</button>
                </div>

                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>
        </div>
    </div>
</div>