<div class="list-product-content" ng-controller="list-products">
    <p class="nav-link">
        <a href="admin/">Quản trị</a> - <a href="admin/product/list.php">Danh sách sản phẩm</a>
    </p>
    <div class="main-content">
        <select style="margin-bottom: 10px;width:40%;" CLASS="form-control" ng-change="filter(cat)" ng-model="cat" id="">
            <option value="" selected="selected">--Loại--</option>
            <option ng-repeat="item in cats" value="{{item.id}}">{{item.name}}</option>
        </select>
        <div class="list-product table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <td>STT</td>
                    <td>Tên</td>
                    <td>Hình thu nhỏ</td>
                    <td>Model</td>
                    <td>Nơi Sản Xuất</td>
                    <td>Loại</td>
                    <td>Giá</td>
                    <td>Giảm giá</td>
                    <td>Kích hoạt</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="item in list_products.list | filter : {category_id : cat} " data-id="{{item.id}}">
                    <td>{{$index}}</td>
                    <td CLASS="name">{{item.name}}</td>
                    <td>
                        <div class="thumbnail"><img src="{{item.thumbnail}}" alt=""></div>
                    </td>
                    <td class="model">{{item.model}}</td>
                    <td>{{item.made_in}}</td>
                    <td>{{item.category}}</td>
                    <td>{{formatMoney(item.price)}}</td>
                    <td class="price_off">{{item.price_off}}%</td>
                    <td>
                        <span data-checked="{{item.is_active}}" class="set-active glyphicon glyphicon-{{item.is_active == 1 ? 'ok' : 'remove'}}"></span>
                    </td>
                    <td class="action">
                        <a href="admin/add-photo.php?tb=product&id={{item.id}}">
                            <span class="glyphicon glyphicon-picture"></span>
                        </a>
                        |
                        <a href="admin/product/edit.php?id={{item.id}}">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        |
                        <span data-action="del_product" class="trash-item glyphicon glyphicon-trash"></span>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <ul ng-repeat="item in pages" class="pagination pull-right">
            <li class="{{(item == list_products.cur_page)?'active':''}}"><a href="#">{{item}}</a></li>
        </ul>
    </div>
</div>