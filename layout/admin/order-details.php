<div class="list-order-details-content" ng-controller="list-order-details">
    <p class="nav-link">
        <a href="admin/">Quản trị</a> - <a href="admin/product/list.php">Chi tiết đơn <?php echo $_GET["order_id"] ?></a>
    </p>
    <div class="main-content">
        <div class="list-order-details table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <td>STT</td>
                    <td>Tên sản phẩm</td>
                    <td>Hình thu nhỏ</td>
                    <td>Số lượng</td>
                    <td>Đơn giá</td>
                    <td>Thành tiền</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="item in list_order_details.list" data-id="{{item.product_id}}">
                    <td>{{$index}}</td>
                    <td >{{item.product_name}}</td>
                    <td>
                        <div class="thumbnail"><img src="{{item.product_thumbnail}}" alt=""></div>
                    </td>
                    <td>{{item.amount}}</td>
                    <td>{{formatMoney(item.price)}} vnđ</td>
                    <td>{{formatMoney(item.cost)}} vnđ</td>
                    <td class="action">
                        <span data-action="del_order_details" class="trash-item glyphicon glyphicon-trash"></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td COLSPAN="2">{{formatMoney(list_order_details.total_cost)}}  vnđ</td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>