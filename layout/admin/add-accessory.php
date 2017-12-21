<div class="add-accessory-content">
    <p class="nav-link">
        <a href="admin/">Quản trị</a> - <a href="admin/accessory/add.php">Thêm phụ tùng</a>
    </p>
    <div class="main-content">
        <div class="add-accessory">
            <form class="submit-form" data-controller="admin" data-action="add_accessory" method="post">
                <div class="form-group">
                    <label for="txtname">Tên</label>
                    <input class="form-control" type="text" name="txtname" />
                </div>
                <div class="form-group">
                    <label for="txtunit">Đơn vị</label>
                    <input class="form-control" type="text" name="txtunit" />
                </div>
                <div class="form-group">
                    <label for="txtcapacity">Công suất</label>
                    <input class="form-control" type="text" name="txtcapacity" />
                </div>
                <div class="form-group">
                    <label for="txtprice">Giá: <span class="format-money"></span> vnđ</label>
                    <input class="form-control text-binding"  value="0" data-target="format-money" type="number" name="txtprice" />
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