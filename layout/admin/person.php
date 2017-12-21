
<div class="person-content" ng-controller="person">
    <p class="nav-link">
        <a href="admin/">Quản trị</a> - <a href="admin/user/person.php">{{user.name}}</a>
    </p>
    <div class="main-content">
        <div class="avatar-content soft-box">
            <form METHOD="post" class="submit-form" data-controller="c_user" data-action="change_avatar" >
                <p class="title">Ảnh đại diện</p>
                <div class="thumbnail">
                    <img class="show_pic" src="{{user.avatar}}" alt=""/>
                    <input type="hidden" value="{{user.avatar}}" class="txt-thumbnail" name="txt-thumbnail"/>
                </div>
                <button type="button" data-action="show_submit" data-target="choose-pic" data-current-click=""
                        data-this="show_pic&txt-thumbnail" class="btn-popup btn-sel-pic btn btn-default">Đổi
                </button>
                <button type="submit" class="hidden btn btn-primary">Lưu</button>
            </form>
        </div>
        <div class="info-content soft-box">
            <form data-controller="c_user" data-action="change_info" class="submit-form" method="post">
                <p class="title">Thông tin riêng</p>
                <div class="form-group">
                    <label for="">Tên</label>
                    <input value="{{user.name}}" name="txt-name" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Mail</label>
                    <input value="{{user.mail}}" name="txt-mail" type="text" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>
        </div>
        <div class="pass-content soft-box">
            <form data-controller="c_user" data-action="change_pass" class="submit-form" method="post" >
                <p class="title">Đổi mật khẩu</p>
                <div class="form-group">
                    <label for="">Nhập mật khẩu cũ</label>
                    <input name="txt-pass" type="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Mật khẩu mới</label>
                    <input name="txt-new-pass" type="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nhập lại mật khẩu mới</label>
                    <input name="txt-re-new-pass" type="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>
        </div>

    </div>
</div>
