<script>

    app.controller("add_service", function ($scope, $http) {
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