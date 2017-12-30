<script>
    app.controller("list-services",function ($scope,$http) {
      getList("home", "services", "services_all");
    });
</script>