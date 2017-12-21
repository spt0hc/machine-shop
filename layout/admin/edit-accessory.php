<div class="edit-accessory-content" ng-controller="edit_accessory">
    <p class="nav-link">
        <a href="admin/">Quản trị</a> - <a href="admin/accessory/edit.php">Sửa phụ tùng</a>
    </p>
    <div class="madin-content">
        <div class="edit-accessory">
            <form class="submit-form" data-controller="admin" data-action="edit_accessory" method="post">
                <input type="hidden" name="txtid" value="{{accessory.id}}" />
                <div class="form-group">
                    <label for="txtname">Tên</label>
                    <input class="form-control" value="{{accessory.name}}" type="text" name="txtname" />
                </div>
                <div class="form-group">
                    <label for="txtunit">Đơn vị</label>
                    <input class="form-control" value="{{accessory.unit}}" type="text" name="txtunit" />
                </div>
                <div class="form-group">
                    <label for="txtcapacity">Công suất</label>
                    <input class="form-control" value="{{accessory.capacity}}" type="text" name="txtcapacity" />
                </div>
                <div class="form-group">
                    <label for="txtprice">Giá: <span class="format-money"></span> vnđ</label>
                    <input class="form-control text-binding" value="{{accessory.price}}" data-target="format-money" type="number" name="txtprice" />
                </div>

                <div class="form-group">
                    <label for="txtdes">Mô tả</label>
                    <textarea id="txtdes" class="ckeditor form-control" name="editor" ></textarea>
                </div>
                <button typeof="submit" class="btn btn-primary">Lưu</button>
            </form>
        </div>
    </div>
</div>

