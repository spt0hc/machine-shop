<div class="edit-cat-content" ng-controller="edit_cat">
    <p class="nav-link">
        <a href="admin/">Quản trị</a> - <a href="admin/cat/edit.php">Sửa loại</a>
    </p>
    <div class="main-content">
        <div class="edit-cat">
            <form  class="submit-form" data-controller="admin" data-action="edit_cat" method="post">
                <input type="hidden" value="{{cat.id}}" name="txtid" />
                <div class="form-group">
                    <label for="txtname">Tên</label>
                    <input value="{{cat.name}}" class="form-control" type="text" name="txtname" />
                </div>
                <button typeof="submit" class="btn btn-primary">Lưu</button>
            </form>
        </div>
    </div>
</div>