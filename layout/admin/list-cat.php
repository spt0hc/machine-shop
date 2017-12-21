<div class="list-cat-content" ng-controller="list_cats">
    <p class="nav-link">
        <a href="admin/">Quản trị</a> - <a href="admin/cat/list.php">Danh sách dịch vụ</a>
    </p>
    <div class="main-content">
        <div class="list-cat table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>STT</td>
                        <td>Tên</td>

                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="item in list_cats.list" data-id="{{item.id}}">
                        <td>{{$index}}</td>
                        <td CLASS="name">{{item.name}}</td>
                        <td class="action">
                            <a href="admin/cat/edit.php?id={{item.id}}">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                            |
                            <span data-action="del_cat" class="trash-item glyphicon glyphicon-trash"></span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <ul ng-repeat="item in pages" class="pagination pull-right">
            <li class="{{(item == list_cats.cur_page)?'active':''}}"><a href="#">{{item}}</a></li>
        </ul>
    </div>
</div>