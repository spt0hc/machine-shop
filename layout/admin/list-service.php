<div class="list-service-content" ng-controller="list_services">
    <p class="nav-link">
        <a href="admin/">Quản trị</a> - <a href="admin/service/list.php">Danh sách dịch vụ</a>
    </p>
    <div class="main-content">
        <div class="list-service table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>STT</td>
                        <td>Tên</td>
                        <td>Hình thu nhỏ</td>
                        <td>Giá</td>
                        <td>Kích hoạt</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="item in list_services.list" data-id="{{item.id}}">
                        <td>{{$index}}</td>
                        <td CLASS="name">{{item.name}}</td>
                        <td>
                            <div class="thumbnail"><img src="{{item.thumbnail}}" alt=""></div>
                        </td>
                        <td>{{formatMoney(item.price)}}</td>
                        <td>
                            <span data-checked="{{item.is_active}}" class="set-active glyphicon glyphicon-{{item.is_active == 1 ? 'ok' : 'remove'}}"></span>
                        </td>
                        <td class="action">
                            <a href="admin/add-photo.php?tb=service&id={{item.id}}">
                                <span class="glyphicon glyphicon-picture"></span>
                            </a>
                            |
                            <a href="admin/service/edit.php?id={{item.id}}">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                            |
                            <span  data-action="del_service" class="trash-item glyphicon glyphicon-trash"></span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <ul ng-repeat="item in pages" class="pagination pull-right">
            <li class="{{(item == list_services.cur_page)?'active':''}}"><a href="#">{{item}}</a></li>
        </ul>
    </div>
</div>