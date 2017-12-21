<div class="image-manager-content" ng-controller="image_manager">
    <p class="nav-link">
        <a href="admin/">Quản trị</a> - <a href="admin/image-manager/">Quản lý hình ảnh</a>
    </p>
    <div class="main-content">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="list-dir soft-box">
                <p ng-repeat="item in dirs">
                    <a class="{{item}}" href="admin/image-manager/?dir={{item}}">
                        <span class=" glyphicon glyphicon-folder-open"></span>
                        <span>{{item}}</span>
                    </a>
                </p>
                <?php
                if (isset($_GET["dir"]) && $_GET["dir"] != '') {
                    $d = $_GET["dir"];
                    echo "<style>
                                    .list-dir .$d {
                                      color:#ff4040 !important;  
                                    }
                              </style>";
                }
                ?>
            </div>
            <div class="soft-box btn-add-image text-center">
                <label for="photo"><span class="glyphicon glyphicon-plus"></span></label>
                <form method="post" enctype="multipart/form-data" action="config/request.php">
                    <input type="hidden" name="url" value="admin/image-manager/?dir={{selDir}}">
                    <input type="hidden" name="c" value="image">
                    <input type="hidden" name="ac" value="upload_img">
                    <input multiple style="display: none;" type="file" id="photo" name="upImg[]" accept=".jpg, .png, .jpeg, .gif|images/*"/>
                    <div class="post-thumbnail">

                    </div>
                    <DIV>
                        <select ng-model="selDir" class="form-control" name="selDir" id="">
                            <option ng-repeat="item in dirs" value="{{item}}">{{item}}</option>
                        </select>
                    <button class="btn btn-primary" type="submit">
                        Lưu
                    </button>
                    </DIV>
                </form>

            </div>
            <div class="soft-box action">
                <div class="col-xs-6">
                    <div class="thumbnail">
                        <img src="" alt="">
                    </div>
                </div>
                <div class="controls col-xs-6">
                    <span class="trash-pic glyphicon glyphicon-trash"></span>
                     <span class="edit glyphicon glyphicon-cog"></span>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
            <div class="list-img soft-box">
                <div ng-repeat="item in imgs" class="wrap-item col-xs-3">
                    <div class="thumbnail item">
                        <img src="{{item}}" alt="">
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>