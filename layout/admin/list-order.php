<div class="list-order-content" ng-controller="list-order">
    <p class="nav-link">
        <a href="admin/">Quản trị</a> - <a href="admin/order/list.php">Danh sách đơn đặt</a>
    </p>
    <div class="main-content">
       <div class="list-order table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <td>STT</td>
                    <td>Địa chỉ</td>
                    <td>Điện thoại</td>
                    <td></td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="item in list_order.list" data-id="{{item.id}}">
                    <td>{{$index}}</td>
                    <td >{{item.address}}</td>
                    <td >{{item.phone}}</td>
                    <td data-id="{{item.id}}" data-stt="{{item.is_submit}}" class="submit-order">
                        {{checkSubmit(item.is_submit)}}
                    </td>
                    <td class="action">
                        <a href="admin/order/details.php?order_id={{item.id}}">
                            <span class="glyphicon glyphicon-eye-close"></span>
                        </a>
                        |
                        <span style="cursor:pointer;" data-action="del_order" class="trash-item glyphicon glyphicon-trash"></span>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <ul ng-repeat="item in pages" class="pagination pull-right">
            <li class="{{(item == list_order.cur_page)?'active':''}}"><a href="#">{{item}}</a></li>
        </ul>
    </div>
</div>