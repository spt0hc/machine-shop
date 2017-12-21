<div id="<?php echo $vl["id"] ?>" class="popup">
    <div style="overflow: scroll;overflow-x: hidden"
         class="soft-box col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
        <span class="close-s glyphicon glyphicon-remove pull-right"></span>
        <?php $vl["render"](); ?>
    </div>
</div>