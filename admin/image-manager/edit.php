<?php
$__ROOT_DIR = '../../';

$heads[] = function () {
    global $__ROOT_DIR;
    echo "
          <meta http-equiv=\"Cache-control\" content=\"no-cache\">
          <link rel='stylesheet' href='css/admin/jquery-ui.css' />
          <style>
          .wrap-cropper {
          width:100%;
          overflow: scroll;
          overflow-y: hidden;
          }
                .img-cropper{
                position: relative;
                }
                  .img-cropper img{
                        padding: 0;
                        margin: 0;
                  }
                .img-cropper .crop-tool{
                position: absolute;
                background: rgba(255,255,255,0.57);
               
                border:1px dashed grey;
                
                }
          </style>";
};
$rd["content"] = function () {
    global $__ROOT_DIR;
    include $__ROOT_DIR . 'layout/admin/edit-image.php';
};

$foots[] = function () {
    global $__ROOT_DIR;
    echo "   
    <script src='js/lib/jquery-ui.js'></script>
    <script>
         /*   function setRatio(r,w) {
                    return  (r.h/r.w)*w; 
            }*/
            
            $(function() {
                     var top= $('.img-cropper').position().top;
                     var left= $('.img-cropper').position().left;
                     $('.img-cropper').css('width',$('.img-cropper img').css('width'));
                     $('.crop-tool').css({
                     'top':0+ 'px',
                     'left':0+'px',
                     'width':parseInt($('.img-cropper img').css('width'))*.5
                     });
                     height_per_width( {x:1,y:1},$('.crop-tool'));
                     $('.crop-tool').resizable({containment:'parent',aspectRatio: true});
                     $('.crop-tool').draggable({containment:'parent'});
                     ///
                     $('.btn-crop').click(function() {
                        var b = $('.orgin').is(':checked');
                        var crop_tool={
                            x:parseInt($('.crop-tool').css('left')),
                            y:parseInt($('.crop-tool').css('top')),
                            w:$('.crop-tool').width(),
                            h:$('.crop-tool').height(),
                            src_img : {
                                src: $('.img-cropper img').attr('src'),
                                w:$('.img-cropper img').width(),
                                h:$('.img-cropper img').height(),
                            },
                            del_src : b?'0':'1'
                        }
                      //  alert(crop_tool.x + '-' + crop_tool.y + '-' + crop_tool.w + '-' + crop_tool.h);
                        $.ajax(getRequest('image','crop_image'),{
                           method:'get',
                           data:{par:JSON.stringify(crop_tool)},
                           success:function(res){
                               alert(res);
                                location.href='admin/image-manager/?dir=product';
                           } 
                        });
                     });
                     $('.selRatio').on('change',function() {
                         var ratio = $(this).val().split('&');
                         height_per_width( {x:ratio[0],y:ratio[1]},$('.crop-tool'));

                     });
                     
            });
           
    </script>
    ";

}
?>

<?php include $__ROOT_DIR . 'layout/admin/admin-layout.php' ?>