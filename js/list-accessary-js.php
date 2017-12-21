<script>
    app.controller("list-accessary", function ($scope, $http) {

        $('body').on('click', '.accessarys .details', function () {
            $(this).prev().toggleClass('excerpt');
        });
        function ac(id) {


            <?php
            if(isset($_SESSION["US_LOGIN"]) && $_SESSION["US_LOGIN"]==true){
                $ac ='<a class="pull-right" TARGET="_blank" href="admin/accessory/edit.php?id=\'+id+\'"><span class="glyphicon glyphicon-pencil"></span></a>';
                $ac .='<a class="pull-right rm-acc" style="margin-right: 10px"  href="" data-id="\'+id+\'"><span class=" glyphicon glyphicon-trash"></span></a>';
            }else {
                $ac ='';
            }
            ?>
           return '<?php echo $ac ?>';
       }
        $('body').on('click', '.accessarys .rm-acc', function (e) {
            e.preventDefault();

            var id = $(this).data('id');
           // alert(id);
            var item = $(this).parents('.item');
          //  console.log(item)
            $.ajax({
                type:'post',
                url:'config/request.php',
                data:getPostRequest("admin","del_accessory","id="+id),
                success:function (res) {
                    var rs =JSON.parse(res);
                  //  console.log(rs);
                    if(rs.suc){
                        item.remove();
                    }
                }
            });
        });
        function renderItem(id,name, price, unit, capacity, des) {
         //   console.log( ac(id));
            function checkCap(cap) {
                if(cap == null ||cap == '')
                    return 'Không có';
                return cap;
            }
            $('.accessarys .bottom').before('' +
                ' <div class="item soft-box">\n' +ac(id)+
                '        <p class="title"><SPAN CLASS="name">' + name + '</SPAN> - <span class="price">' + price + '</span>/<span class="unit">' + unit + '</span></p>\n' +
                '        <p class="capacity">Công suất: ' + checkCap(capacity) + '</p>\n' +
                '        <div class="des excerpt">\n' +
                des
                +
                '</div>\n' +
                '        <p class="details text-center">\n' +
                '            <span class="glyphicon glyphicon-plus"></span>\n' +
                '<span class="glyphicon glyphicon-minus"></span>\n' +
                '        </p>\n' +
                '    </div>');
        }

        new getList("home", "get_list_accessary", "accessaries", 1).action = function (res) {
            var dt = res.data;
            for (var i = 0; i < dt.length; i++) {
           //     console.log(dt[i].name)
                renderItem(dt[i].id,dt[i].name, dt[i].price, dt[i].unit, dt[i].capacity, dt[i].des);
            }
            this.igrone = true;
        };
        $('body').on('click', '.accessarys .read-more', function () {
            var page = parseInt($(this).data('current-page')) + 1;
            $(this).data('current-page', page);
            new getList("home", "get_list_accessary", "accessaries", page).action = function (res) {
                this.igrone = true;
                var dt = res.data;
                if (dt == 0) {
                    alert('Hết');
                    return;
                }
                for (var i = 0; i < dt.length; i++) {
                    renderItem(dt[i].id,dt[i].name, dt[i].price, dt[i].unit, dt[i].capacity, dt[i].des);
                }
            };
        });

    });
</script>