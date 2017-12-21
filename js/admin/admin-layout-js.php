<script>

    var getList;
    app.controller("admin", function ($scope, $http) {
        $('body').on('click', '.main-content .trash-item', function () {
            var row = $(this).parents('tr');
            var id = $(row).data('id');
            var action = $(this).data('action');
            $.ajax({
                type: 'post',
                url: 'config/request.php',
                data: getPostRequest("admin", action, "id=" + id),
                success: function (res) {
                 //   console.log(res)
                    res = JSON.parse(res);
                    alert(res.ms);
                    if (res.suc) {
                        $(row).remove();
                    }
                }
            });
        });


        getList = function (controller, action, scope, par) {
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



        getList("home", "shop_info", "shop_info");
        new getList("admin", "user_info", "user").action = function (res) {
           // alert(res.data);
        };


    });
    $(function () {


        $('.submit-form').submit(function (e) {
            e.preventDefault();
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
            var controller = $(this).data('controller');
            var action = $(this).data('action');
            var method = this.method;

            $.ajax({
                type: method,
                url: 'config/request.php',
                data: getPostRequest(controller, action, $(this).serialize()),
                success: function (res) {
               //    alert(res);

                    res = JSON.parse(res);
                    alert(res.ms);
                    if (res.suc) {
                        location.href = location.href;
                    }
                }
            });
        });
    });
</script>