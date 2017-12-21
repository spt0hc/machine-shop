<div class="image-manager-content">
    <p class="nav-link">
        <a href="admin/">Quản trị</a> - <a href="admin/image-manager/edit">Chỉnh hình ảnh</a>
    </p>
    <div class="main-content">
        <select style="width:60%;margin-bottom: 10px" class="form-control selRatio">
            <option selected="selected" value="1&1">1:1</option>
            <option value="16&9">16:9</option>
            <option value="3&4">3:4</option>
            <option value="4&2">4:2</option>
        </select>
        <div class="form-group">
            <span>Giữ hình gốc: </span>
            <input class=" orgin" type="checkbox" checked/>
        </div>
        <div class="wrap-cropper">
            <div class="img-cropper">
                <img src="<?php echo $_GET["img"] ?>" alt=""/>
                <div class="crop-tool"></div>
            </div>
        </div>
        <button style="margin-top: 10px" class="btn-crop btn btn-primary">Lưu</button>

        <div class="clearfix"></div>
    </div>

</div>