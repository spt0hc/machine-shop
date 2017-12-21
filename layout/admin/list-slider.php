<div class="list-product-content" ng-controller="list-slider">
    <p class="nav-link">
        <a href="admin/">Quản trị</a> - <a href="admin/slider/list.php">Slider</a>
    </p>
    <div class="main-content">
        <div class="list-slider table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <td>STT</td>
                    <td>Hình thu nhỏ</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>0</td>
                    <td>
                        <div class="thumbnail"><img class="show-pic-0" src="{{list_slider[0].url}}" alt=""></div>
                        <input data-id="{{list_slider[0].id}}" class="pic-url pic-url-0" value="{{list_slider[0].url}}" type="hidden">
                    </td>
                    <td class="action">
                        <button data-this="show-pic-0&pic-url-0" data-current-click="" data-target="choose-pic"
                                class="btn btn-default btn-popup btn-sel-pic" type="button">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>
                        <div class="thumbnail"><img class="show-pic-1" src="{{list_slider[1].url}}" alt=""></div>
                        <input data-id="{{list_slider[1].id}}" class="pic-url pic-url-1" value="{{list_slider[1].url}}" type="hidden">
                    </td>
                    <td class="action">
                        <button data-this="show-pic-1&pic-url-1" data-current-click="" data-target="choose-pic"
                                class="btn btn-default btn-popup btn-sel-pic" type="button">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>
                        <div class="thumbnail"><img class="show-pic-2" src="{{list_slider[2].url}}" alt=""></div>
                        <input data-id="{{list_slider[2].id}}" class="pic-url pic-url-2" value="{{list_slider[2].url}}" type="hidden">
                    </td>
                    <td class="action">
                        <button data-this="show-pic-2&pic-url-2" data-current-click="" data-target="choose-pic"
                                class="btn btn-default btn-sel-pic btn-popup" type="button">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>
                        <div class="thumbnail"><img class="show-pic-3" src="{{list_slider[3].url}}" alt=""></div>
                        <input data-id="{{list_slider[3].id}}" class="pic-url pic-url-3" value="{{list_slider[3].url}}" type="hidden">
                    </td>
                    <td class="action">
                        <button data-this="show-pic-3&pic-url-3" data-current-click="" data-target="choose-pic"
                                class="btn btn-default btn-popup btn-sel-pic" type="button">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <button  class="save-slider btn btn-primary">Lưu</button>
        <ul ng-repeat="item in pages" class="pagination pull-right">
            <li class="{{(item == list_products.cur_page)?'active':''}}"><a href="#">{{item}}</a></li>
        </ul>
    </div>
</div>