<div class="controls-menu">
    <P class="title">
        <a href="admin/">Admin</a>
        <span class="btn-drop-menu hidden-sm hidden-md hidden-lg glyphicon glyphicon-menu-hamburger"></span>
    </P>
    <div class="hidden-xs">
        <div class="info-user" >
            <div class="media">
                <div class="media-left media-middle">
                    <a href="admin/user/person.php">
                        <img src="{{user.avatar}}" class="media-object" style="width:60px">
                    </a>
                </div>
                <div class="media-body">
                    <P class="name media-heading ">{{user.name}}
                        <a href="config/request.php?c=admin&ac=exit"">
                            <span class="log-out glyphicon glyphicon-log-out pull-right"></span>
                        </a>
                    </P>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <?php include 'main-controls.html' ?>
    </div>
    <div class="visible-xs">
        <div class="drop-menu">
            <div class="info-user">
                <div class="media">
                    <div  class="media-left media-middle">
                        <a href="admim/user/person.php">
                            <img src="{{user.avatar}}" class="media-object" style="width:60px">
                        </a>
                    </div>
                    <div class="media-body">
                        <P class="name media-heading ">{{user.name}}
                            <a href="config/request.php?c=admin&ac=exit"">
                                <span class="log-out glyphicon glyphicon-log-out pull-right"></span>
                            </a>
                        </P>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <?php include 'main-controls.html' ?>
        </div>
    </div>
</div>