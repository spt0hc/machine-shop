<script>
    app.controller("list-products",function ($scope,$http) {
        var check_off =  function (price_off) {
            if(price_off > 0){
                //console.log(price_off)
                return 'Sale off '+price_off + "%";
            }else {
                return '';
            }
        };
        $scope.check_off =  function (price_off) {
            return check_off(price_off);
        }

        function addProduct(prs) {
            var boxs = $('.list-products .products > .clearfix');
            for (var i = 0; i < prs.length; i++) {
                var item = prs[i];
                //   alert(check_off(item.price_off))
                // alert(item.name);
                boxs.before(' ' +
                    ' <div  class="wrap col-xs-12 col-sm-4 col-md-3 col-lg-3">\n'
                    +
                    renderProduct(item.id,item.name,item.thumbnail,item.price,item.tag,check_off(item.price_off))
                    +
                    '</div>' +
                    '\n');
                boxs.before();
            }
        }




    <?php if(isset($_GET["cat"])) {
            ?>
        new getList("home", "list_products_by_cat", "list_products",JSON.stringify({page:1,cat:<?php echo $_GET["cat"];  ?>})).action = function (res) {
            var dt = res.data;
      //      console.log(dt);
            if(dt.length   >0 ) {
              //  console.log(dt)
                for (var i = 0; i < dt.length; i++) {
                    dt[i].price = formatMoney(dt[i].price);
                }
                addProduct(dt);
            }else {
                alert('Hết sản phẩm !');
            }
        };
        <?php
        } else {
            ?>
        new getList("home", "list_products", "list_products",1).action = function (res) {
            var dt = res.data;
            if(dt.length   >0 ) {
                //console.log(dt)
                for (var i = 0; i < dt.length; i++) {
                    dt[i].price = formatMoney(dt[i].price);
                }
                addProduct(dt);
            }else {
                alert('Hết sản phẩm !');
            }
        };

        <?php
        }?>

        $('.read-more').click(function () {
            var next_page = $(this).data("current-page")+ 1
            $(this).data("current-page",next_page);
            <?php if(isset($_GET["cat"])) {
            ?>
            var list = new getList("home", "list_products_by_cat", "list_products", JSON.stringify({page:next_page,cat:<?php echo $_GET["cat"];  ?>})).action = function (res) {
                var n_dt = res.data;
                if(n_dt.length > 0) {
                    for (var i = 0; i < n_dt.length; i++) {
                        n_dt[i].price = formatMoney(n_dt[i].price);
                    }
                    //add product
                    addProduct(n_dt)
                }else {
                    alert('Hết sản phẩm');
                }
                this.igrone = true;
            };

        <?php
            } else {
            ?>
            var list = new getList("home", "list_products", "list_products", next_page).action = function (res) {
                var n_dt = res.data;
                if(n_dt.length > 0) {
                    for (var i = 0; i < n_dt.length; i++) {
                        n_dt[i].price = formatMoney(n_dt[i].price);
                    }
                    //add product
                    addProduct(n_dt)

                }else {
                    alert('Hết sản phẩm');
                }
                this.igrone = true;
            };


        <?php
            }?>

        });

    });
</script>