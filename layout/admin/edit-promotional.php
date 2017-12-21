<div class="edit-promotional-content" ng-controller="edit-promotional">
    <p class="nav-link">
        <a href="admin/">Quản trị</a> - <a href="admin/promotional/edit.php">Sửa chương trình khuyến mãi</a>
    </p>
    <div class="main-content">
        <div class="edit-promotional">
            <form class="submit-form" data-controller="admin" data-action="edit_promotional" method="post">
                <input  type="hidden" name="txtid" value="{{promotional.id}}" />
                <div class="form-group">
                    <label for="txtname">Tiêu đề</label>
                    <input class="form-control" value="{{promotional.title}}" type="text" name="txtname" />
                </div>
                <div class="form-group">
                    <label for="txtdes">Mô tả</label>
                    <textarea id="txtdes" class="ckeditor" name="editor" ></textarea>
                </div>
                <button typeof="submit" class="btn btn-primary">Lưu</button>
            </form>
        </div>
    </div>
</div>