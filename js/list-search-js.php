<script>
    app.controller("list-searchs",function ($scope,$http) {
        $scope.check_off =  function (price_off) {
            if(price_off > 0){
                return 'Sale off '+price_off + "%";
            }
        }
        new getList("home", "list_searchs", "list_searchs","<?php if (isset($_GET["q"])) echo $_GET["q"]; else echo '';?>").action = function (res) {
            var dt = res.data;
//console.log(dt);
            if(dt.length   >0 ) {
                for (var i = 0; i < dt.length; i++) {
                    dt[i].price = formatMoney(dt[i].price);
                  /*  if(dt[i].name.length > 22)
                        dt[i].short_name = dt[i].name.substring(0,22)+"...";
                    else
                        dt[i].short_name = dt[i].name;*/
                }
            }
        };


    });
</script>