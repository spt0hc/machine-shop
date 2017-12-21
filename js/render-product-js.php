<script>
    function renderProduct(id,name,thumbnail,price,tag,check_price) {
        return '  <div class="product-item soft-box">\n' +
            '                <div class="thumbnail">\n' +
            '                    <a href="san-pham-'+tag+'-'+id+'.html">\n' +
            '    <img src="'+thumbnail+'" alt="'+name+'">\n' +
            '</a>' +
            '\n' +
            '                </div>\n' +
            '                <p class="name" title="'+name+'">'+name+'</p>\n' +
            '\n' +
            '                <p class="price">\n' +
            '                    <span class="glyphicon glyphicon-usd"></span>\n' +
            '                    '+price+' VNĐ\n' +
            '                </p>\n' +
            '\n' +
            '                <p class="cart">\n' +
            '                    <span class="off">'+check_price+'</span>\n' +

            '                    <span class="clearfix"></span>\n' +
            '                </p>\n' +
            '                <p>' +
            '<a class="pull-left" href="san-pham-'+tag+'-'+id+'.html"><span class="glyphicon glyphicon-search"></span></a>' +
            ' <span data-id="'+id+'" class="pull-right btn-add-cart glyphicon glyphicon-shopping-cart"></span>' +
            '</p>\n' +
            '            </div>';
    }
</script>