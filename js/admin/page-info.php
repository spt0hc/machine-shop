<script>
    app.controller("page-info",function ($scope,$http) {

     new getList("admin","get_page_info",'INFO').action = function (res) {
         // console.log(res.data)
      };
    });
</script>