<div class="add-promotional-content">
    <p class="nav-link">
        <a href="admin/">Quản trị</a> - <a href="admin/promotional/add.php">Thêm chương trình khuyến mãi</a>
    </p>
    <div class="main-content">
        <div class="add-promotional">
            <form class="submit-form" data-controller="admin" data-action="add_promotional" method="post">
                <div class="form-group">
                    <label for="txtname">Tiêu đề</label>
                    <input class="form-control" type="text" name="txtname" />
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