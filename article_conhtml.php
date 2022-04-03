<?php
$con=$article[0]["article_content"];
$aid=$article[0]['article_id'];
// echo $con;
echo <<<str
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">帖子内容</h4>
</div>
<div class="modal-body"> <span>$con</span></div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal"><span id="aclose">关闭</span></button>

<button type="button" class="btn"><a href="?like=1&aid=$aid" style="text-decoration:none" style="color:white;" >点赞</a></button>
<script>
    
    // up(){
    //     $.ajax({
    //         url:'article.php',
    //         type:'post',
    //         data:'like=1'
    //         success:funtion(data){
    //             alert(data);
    //         }
    //     })
    // }
</script>
str;