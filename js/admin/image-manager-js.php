<script>


    app.controller('image_manager', function ($scope, $http) {
        new getList("image", "show_list_dir", "dirs").action = function (res) {
            $scope.selDir = res.data[0];
        };
        <?php
        if (isset($_GET["dir"]) && $_GET["dir"] != '')
            $d = $_GET["dir"];
        else
            $d = '';
        ?>
        new getList("image", "show_list_image", "imgs", '<?php echo $d; ?>').action = function (res) {
//           console.log(res.data);
            //    height_per_width({x:1,y:1},$('.image-manager-content .list-img .thumbnail'));

            var pic = null;
            var img = null;
            $('body').on('click', '.list-img .item', function () {
                pic = $(this).parents(".wrap-item");
                var url = $(this).children().attr('src');
                var main = $(this).parents(".main-content");
                img = $(main).find('.action img');
                img.attr('src', url);
                var span = $(main).find('.action .controls span');
                span.attr('data-src', url);

                //  span.remove();
            });
            $('body').on('click', '.action .controls span.edit', function () {
                var src = $(this).data('src');
                if (src == null || src == '')
                    return;
                window.open('admin/image-manager/edit.php?img=' + src);
            });
            $('body').on('click', '.main-content .action .controls span.trash-pic', function () {
                var url = $(this).attr('data-src');
                if (pic == null || typeof url == "undefined" || url == null || url == '') {
                    return;
                }
                $.ajax({
                    type: 'post',
                    url: 'config/request.php',
                    data: getPostRequest("image", "remove_pic", "path=" + url),
                    success: function (res) {
                        res = JSON.parse(res);
                        if (res.suc) {
                            img.attr('src', '');
                            $(pic).remove();
                        } else {
                            alert(res.ms);
                        }
                    }
                });

            });


        };
        $('#photo').change(function (event) {
            var files = event.target.files;
            $('.post-thumbnail').fadeIn(100, function () {
                for (var i = 0; i < files.length; i++) {
                    var path = URL.createObjectURL(files[i]);
                    $('.post-thumbnail').append("<img src='" + path + "' />");
                    $(this).next().fadeIn();
                }
            });


            /*var path=URL.createObjectURL(event.target.files[0])
            $('.post-thumbnail').fadeIn(100,function () {
                $('.post-thumbnail img').attr('src',path);
                $(this).next().fadeIn();
            });*/
        });
    });

</script>