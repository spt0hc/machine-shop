<script>
    app.controller("about",function ($scope,$http) {

       new getList("home","shop_info",'info').action = function (res) {
           // console.log(res.data)
           CKEDITOR.instances["txtdes-editor"].setData(res.data.des);
        };
    });
</script>