<script>


    app.controller('pics_popup', function ($scope, $http) {
        var getList = function (controller, action, scope, par) {
            var ob = this;
            ob.action = function (res) {

            };
            ob.igrone = false;
            if (typeof par === "undefined")
                $http.get(getRequest(controller, action)).then(function (res) {
                    ob.action(res);
                    if (!ob.igrone)
                        $scope[scope] = res.data;
                });
            else {
                $http.get(getRequest(controller, action), {params: {par: par}}).then(function (res) {
                    //alert(res.data);
                    ob.action(res);
                    if (!ob.igrone)
                        $scope[scope] = res.data;
                });
            }
        }

        function getImgs(dir) {
            new getList("image", "show_list_image", "imgs", dir).action = function (res) {


            };
        }

        getList("image", "show_list_dir", "dirs");
        getImgs("product");
        $('body').on('click', '.list-dir .dir', function () {
            $('.list-dir .dir').removeClass('active');
            $(this).addClass('active');
            var dir = $(this).data('dir');
            getImgs(dir)
        });
//      new getList("image","show_list_image","imgs",'');
        $('body').on('click', '.list-img .item', function () {
            var src = $(this).data('src');
            var target = $('.btn-sel-pic').data('current-click').split("&");
            //   console.log(target)
            var target_output = target[0];
            var target_input = target[1];
            $('.' + target_output).attr('src', src);
            $('.' + target_input).val(src);
            //
            var action = $('.btn-sel-pic').data('action');
            if (typeof action !== 'undefined' && action != null && action != '') {
                window[action]();
            }
            alert('Success');

        });
    });

</script>