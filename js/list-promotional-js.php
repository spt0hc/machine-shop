<script>
    app.controller("list-promotional", function ($scope, $http) {


        function ac(id) {
            <?php
            if(isset($_SESSION["US_LOGIN"]) && $_SESSION["US_LOGIN"]==true){
                $ac ='<a class="pull-right" TARGET="_blank" href="admin/promotional/edit.php?id=\'+id+\'"><span class="glyphicon glyphicon-pencil"></span></a>';
                $ac .='<a class="pull-right rm-pro" style="margin-right: 10px"  href="" data-id="\'+id+\'"><span class=" glyphicon glyphicon-trash"></span></a>';
            }else {
                $ac ='';
            }
            ?>
           return '<?php echo $ac ?>';
       }
        function renderItem(id,title, date,des) {
         //   console.log( ac(id));

            $('.promotionals .bottom').before('' +
                '    <div class="item soft-box">\n' +ac(id) +
                '        <p class="title">'+title+'</p>\n' +
                '  <p class="date">'+date+'</p>\n'  +
                '        <div class="des excerpt">\n' +des+'  </div>\n' +
                '        <p class="details text-center">\n' +
                '            <span class="glyphicon glyphicon-plus"></span>\n' +
                '            <span class="glyphicon glyphicon-minus"></span>\n' +
                '        </p>\n' +
                '    </div>'
            );
        }

        new getList("home", "get_list_promotional", "promotionals", 1).action = function (res) {
            var dt = res.data;
            if(dt.length == 0) {
                alert('Hết');
                return;
            }
            for (var i = 0; i < dt.length; i++) {
           //     console.log(dt[i].name)
                renderItem(dt[i].id,dt[i].title,dt[i].date, dt[i].des);
            }
            this.igrone = true;
        };
        $('body').on('click', '.promotionals .read-more', function () {
            var page = parseInt($(this).data('current-page')) + 1;
            $(this).data('current-page', page);
            new getList("home", "get_list_promotional", "promotionals", page).action = function (res) {
                var dt = res.data;
                if(dt.length == 0) {
                    alert('Hết');
                    return;
                }
                for (var i = 0; i < dt.length; i++) {
                    //     console.log(dt[i].name)
                    renderItem(dt[i].id,dt[i].title,dt[i].date, dt[i].des);
                }
                this.igrone = true;
            };
        });
        $('body').on('click', '.promotionals .rm-pro', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            // alert(id);
            var item = $(this).parents('.item');
            //  console.log(item)
            $.ajax({
                type:'post',
                url:'config/request.php',
                data:getPostRequest("admin","del_promotional","id="+id),
                success:function (res) {
                    var rs =JSON.parse(res);
                    //  console.log(rs);
                    if(rs.suc){
                        item.remove();
                    }
                }
            });
        });
        $('body').on('click', '.promotionals .details', function () {
            $(this).prev().toggleClass('excerpt');
        });

    });
</script>