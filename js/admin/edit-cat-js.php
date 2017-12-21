<script>

    app.controller("edit_cat", function ($scope, $http) {

        <?php
        if(!isset($_GET["id"]) || empty($_GET["id"]))
            $d = -1;
        else
            $d = $_GET["id"];
        ?>

         getList("admin", "get_cat", "cat",<?php echo $d?>);
    });
</script>