<div class="about-content" ng-controller="about">
    <p class="nav-link">
        <a href="admin/">Quản trị</a> - <a href="admin/about.php">Chỉnh sửa</a>
    </p>
    <div class="main-content">
        <form method="post" class="submit-form" data-controller="admin" data-action="edit_info">
            <input name="id" type="hidden" value="{{info.id}}">

            <div class="form-group">
                <label for="">Logo</label>
                <div style="width:100px;height:100px;overflow: hidden" class="thumbnail">
                    <img class="show_pic" src="{{info.logo}}" alt="">
                    <input name="logo" class="logo" type="hidden" value="{{info.logo}}">
                </div>
                <button data-target="choose-pic" data-this="show_pic&logo" data-current-click="" type="button" class="btn-popup btn-sel-pic btn btn-default">Chọn
                </button>
            </div>
            <div class="form-group">
                <label for="txtname">Tên shop</label>
                <input value="{{info.shop_name}}" id="txtname" name="txtname" type="text" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="txtphone">Điện thoại</label>
                <input value="{{info.phone}}" id="txtphone" name="txtphone" type="text" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="txtaddr">Địa chỉ</label>
                <input value="{{info.addr}}" id="txtaddr" name="txtaddr" type="text" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="txtdes-editor">Mô tả</label>
                <textarea value="{{info.des}}" id="txtdes-editor" class="ckeditor" name="editor"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
</div>