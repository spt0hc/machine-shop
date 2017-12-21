<script>

    app.controller("add_pro", function ($scope, $http) {
     //   alert(1);
        getList("admin", "list_cats_sel", "cats");
        $scope.price_off=0;
        $scope.price=0;
        $('.text-binding').on('input',function () {
            var tg = $(this).data('target');
          var pr = formatMoney($(this).val());
            $scope.$apply(function () {
                $scope[tg] = pr;
            })
        });
    });
</script>