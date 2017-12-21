<script>
    var getList;
    app.controller("customer", function ($scope, $http) {
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
        getList = function (controller, action, scope, par) {
              var ob = this;
                ob.action = function (res) { };
            setTimeout(function(){
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
            },600);
            
        }

        function getCookie($name, $default) {
            if ($.cookie($name) == null || $.cookie($name) == '')
                return $default;
            else
                return JSON.parse($.cookie($name));
        }

        function setCookie($name, $vl) {
            $.cookie($name, JSON.stringify($vl));
        }


        function addProduct(prs) {
            var boxs = $('.new-products .products > .clearfix');
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


        showCarts();
        //thêm sản phầm vào giỏ hàng
        $('body').on('click', '.btn-add-cart', function () {
            var id = $(this).data('id');
            if (typeof id === "undefined" || id == null || isNaN(id)) {
                alert('Rất tiếc đã xảy ra lỗi : ' + id);
                return;
            }
            new getList("home", "product", "", id).action = function (res) {
                this.igrone = true;
                var carts = getCookie("CARTS", new Array());

                var isAdd = true;
                for (var i = 0; i < carts.length; i++) {
                    if (carts[i].id == id) {
                        isAdd = false;
                        alert('Sản phầm đã trong giỏ hàng');
                        break;
                    }
                }
                if (isAdd) {
                    var isError = false;
                    if ($('.edit-amount.details').length == 0)
                        res.data.amount = 1;
                    else {
                        var vl = $('.edit-amount.details').val();
                        if (typeof vl === "undefined" || vl == null || isNaN(vl)) {
                            alert('Rất tiếc đã xảy ra lỗi : ' + vl);
                            isError = true;
                        } else {
                            res.data.amount = vl;
                            isError = false;
                        }
                    }
                    if (isError == false) {
                        carts.push(res.data);
                        setCookie("CARTS", carts);
                        showCarts();

                       //location.href=location.href;
                        /* //console.log(res.data);
                        // console.log($scope.carts);
*/                    }
                }
            };
        });

//hiện giỏ hàng
        function showCarts() {
            var dt = getCookie("CARTS", new Array());
            var total_pro = 0, total_cost = 0;
            $('.shopping-cart > div').html("");
            for (var i = 0; i < dt.length; i++) {
                total_pro += parseInt(dt[i].amount);
                var price_off = dt[i].price - dt[i].price * (dt[i].price_off / 100);

                total_cost += dt[i].amount * price_off;
                $('.shopping-cart > div:not(.form-group)').append("" +
                    " <div  class=\"cart-item soft-box\">\n" +
                    "            <div class=\"media\">\n" +
                    "                <div class=\"media-left media-middle\">\n" +
                    "                    <a href=\"single.php?id=" + dt[i].id + "\">\n" +
                    "                        <img src=\"" + dt[i].thumbnail + "\" class=\"media-object\" style=\"width:60px\">\n" +
                    "                    </a>\n" +
                    "                </div>\n" +
                    "                <div class=\"media-body\">\n" +
                    "                    <span data-id='" + dt[i].id + "' class=\"trash-item glyphicon glyphicon-trash\"></span>\n" +
                    "                    <h4 class=\"media-heading\">" + dt[i].name + "</h4>\n" +
                    "                    <p >\n" +
                    "                        <span class=\"price\">" + formatMoney(price_off) + "</span> x <span class=\"amount\">" + dt[i].amount + "</span>" +
                    "<select class='edit-amount form-control' style='width:80px;display: none'>" +
                    "<option value='1'>1</option> <option value='2'>2</option>  <option value='3'>3</option>   <option value='4'>4</option>  <option value='5'>5</option>   <option value='6'>6</option>  <option value='7'>7</option>    <option value='8'>8</option> <option value='9'>9</option><option value='10'>10</option>" +
                    "</select>" +
                    "= <span class=\"total\">" + formatMoney(price_off * dt[i].amount) + "</span>\n" +
                    "                        vnđ\n" +
                    "<span style='margin-left: 10px;cursor: pointer' data-id='" + dt[i].id + "' class=\"edit glyphicon glyphicon-pencil \"></span>\n" +
                    "                    </p>\n" +
                    "                </div>\n" +
                    "                <div class=\"clearfix\"></div>\n" +
                    "            </div>\n" +
                    "        </div>");
            }
            $('.cus-carts .amount-carts').text(total_pro);
            $('.shopping-cart .total-cost').text(formatMoney(total_cost) + " vnđ");
            $('.popup > div .shopping-cart .cart-item .edit').click(function () {
                //   e.stopPropagation();
                var id = $(this).data('id');
                //     alert(id);
                var par = $(this).parent('p');
                var sec = par.find('.edit-amount');
                var old_vl = par.find('.amount').text();
                sec.css('display', 'inline');
                sec.focusout(function () {
                    var vl = sec.val();
                    if (old_vl != vl) {
                        //       alert(old_vl+"-"+vl);
                        var carts = getCookie("CARTS", new Array());
                        for (var i = 0; i < carts.length; i++) {
                            if (carts[i].id == id) {
                                carts[i].amount = vl;
                                //    alert(carts[i].amount);
                                break;
                            }
                        }

                        setCookie("CARTS", carts);
                        showCarts();
                    }
                    sec.fadeOut();
                });
                //alert(  );
            });
            $('.popup > div .shopping-cart .cart-item .trash-item').click(function () {
                //   e.stopPropagation();
                var id = $(this).data('id');
                var carts = getCookie("CARTS", new Array());
                for (var i = 0; i < carts.length; i++) {
                    if (carts[i].id == id) {
                        carts.splice(i, 1);
                        break;
                    }
                }
                setCookie("CARTS", carts);
                showCarts();
            });
        }

        getList("home", "shop_info", "shop_info");
       new getList("home", "get_appearance", "appearance").action = function(res){
           res.data = res.data[0];
           document.body.style.background=`${res.data.background_color} url('${res.data.background}') fixed `;
           document.body.style.backgroundSize=`cover`;
           document.getElementById('favicon').href=res.data.icon_on_tab;
           document.title = res.data.title_on_tab;
       };
        getList("home", "categories", "categories");
        getList("home", "services", "services");
        new getList("home", "new_products", "new_products", 4).action = function (res) {
            var dt = res.data;
           // alert(JSON.stringify(dt));
           for (var i = 0; i < dt.length; i++) {
                dt[i].price = formatMoney(dt[i].price);
            }
            addProduct(dt);
            this.igrone=true;
        };

        var getSliders = function () {
            $.ajax({
                url: getRequest("home", "sliders"),
                type: 'get',
                success: function (res) {
                    var dt = JSON.parse(res);
                    for (var i = 0; i < dt.length; i++) {
                        $('.slider .slide-' + i + ' .slide__bg').css({
                            'background-image': 'url("' + dt[i].url + '")'
                        });
                    }
                }
            });

        };
        getSliders();
//
        //gửi đơn
        $('body').on('click', '.shopping-cart .submit-order', function () {
            var dt = getCookie("CARTS", new Array());
            if (dt.length > 0) {
                $.ajax({
                    type: 'post',
                    url: 'config/request.php',
                    data: getPostRequest("home", "submit_order", "orders=" + JSON.stringify(dt) + "&" + $('.contact-form').serialize()),
                    success: function (res) {
                        //console.log(res);
                        var dt = JSON.parse(res);
                        alert(dt.ms);
                        if (dt.suc) {
                            setCookie("CARTS",new Array())
//                            showCarts();
                            location.href=location.href;

                        }
                    }
                });
            }
        });


        function checkRequest() {
            $.ajax({
                type:'post',
                url:'config/request.php',
                data:getPostRequest("home","count_access",""),
                success:function (res) {
                  //  console.log(res)
                }
            });
        }
        checkRequest();
    });
    //
    app.filter('rawHtml', ['$sce', function ($sce) {
        return function (val) {
            return $sce.trustAsHtml(val);
        };
    }]);
</script>