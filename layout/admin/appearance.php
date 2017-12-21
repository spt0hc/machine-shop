<div class="about-content" ng-controller="appearance">
    <p class="nav-link">
        <a href="admin/">Quản trị</a> - <a href="admin/appearance.php">Chỉnh sửa</a>
    </p>
    <div class="main-content">
        <form method="post" class="submit-form" data-controller="admin" data-action="edit_appearance">
            <input name="id" type="hidden" value="{{appearance.id}}">


            <div class="form-group">
                <label for="title_on_tab">Tiêu đề web</label>
                <input value="{{appearance.title_on_tab}}" id="title_on_tab" name="title_on_tab" type="text" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="">Tiêu đề icon</label>
                <div style="width:100px;height:100px;overflow: hidden" class="thumbnail">
                    <img class="show_pic" src="{{appearance.icon_on_tab}}" alt="">
                    <input name="logo" class="logo" type="hidden" value="{{appearance.icon_on_tab}}">
                </div>
                <button data-this="show_pic&logo" data-target="choose-pic"  data-current-click="" type="button" class="btn-popup btn-sel-pic btn btn-default">Chọn
                </button>
            </div>
            <div class="form-group">
                <label for="">Hình nền cho web</label>
                <div style="width:100px;height:100px;overflow: hidden" class="thumbnail">
                    <img class="show_pic_background" src="{{appearance.background}}" alt="">
                    <input name="background" class="background" type="hidden" value="{{appearance.background}}">
                </div>
                <button data-this="show_pic_background&background" data-target="choose-pic"  data-current-click="" type="button" class="btn-popup btn-sel-pic btn btn-default">Chọn
                </button>
            </div>
            <div class="form-group">
                <label for="">Màu nền</label>
                <input value="{{appearance.background_color}}" id="" name="background_color" type="text" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="">Màu nền menu</label>
                <input value="{{appearance.menu_background_color}}" id="" name="menu_background_color" type="text" class="form-control"/>
            </div>

            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
</div>