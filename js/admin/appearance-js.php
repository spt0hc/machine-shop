<script>
    app.controller("appearance",function ($scope,$http) {

       new getList("home","get_appearance",'appearance').action = function (res) {
           res.data = res.data[0];
         //  console.log(  res.data)
           // console.log(res.data)
         //  CKEDITOR.instances["txtdes-editor"].setData(res.data.des);
        };
    });
</script>