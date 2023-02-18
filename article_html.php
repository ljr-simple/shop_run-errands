<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <title>精品文章</title>
</head>
<style>
    .fl{
        width: 400px;
        height: 100px;
        margin: auto;
        float:left;
        display:block;
    }
    .title{
        margin-left: 300px;
        height: 50px;
    }
    .thing{
        margin-left:40px;
        width: 1100px;
        height: 600px;
    }
    .look{
        width:60px;
        height:28px;
    }
    tr,th{
        text-align:center;
    }
    .nav-classify{
        float:left;
        width:192px;
        height:218px;
        margin-left:100px;
        border:5px solid grey;
        border-radius:10px 10px 10px 10px;
        text-align:center;
    }
    .content{
        width:100%;
        height:100%;
    }
    .a_con{
        float:right;
        width:960px;
        margin-right:250px;
    }
    .sent_a{
        float:right;
        margin-right: 320px;
    }
    h3{
        display:inline-block;
        margin-top: 4px;
    }
</style>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">校园跑腿</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">跑腿锻炼，你上你也行<span class="sr-only">(current)</span></a></li>
                    <li><a href="" class="">当前用户：<span>
                                <?php
                                  $uno1=$_SESSION['usersinfo'];
                                  $uno=$uno1['Uno'];
                                  echo "$uno";  	
                              ?> 
                            </span></a></li>
                    <li>
                        <a href="?action=shopCar">已接单列表
                            <span id="">(
                                <?php if(isset($_SESSION['pid'])){		       				       									
                          $pid_length=$_SESSION['pid'];
                          echo sizeof($pid_length) ;
                             }else{
                                 echo 0;
                             }?>
                                )
                            </span></a>
                    </li>
                    
        <li><a href="?action=sendtask" class="">发布任务
		</a></li>
                    <li><a href="?action=article">精品文章
                        </a></li>
                    <li><a href="?action=order" class="">查看订单
		            </a></li>
                        <li><a href="?action=admin" class="">管理员页面
                        </a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="?action=logout" class="">退出</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
   
        <div>
        <div class="title">
            <h3>文章精选</h3>
            <div class="sent_a"><a data-toggle="modal" href="#myModal1" class="btn btn-primary btn-large">发布文章</a></div>
            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                 
                      <!-- 模态框头部 -->
                      <div class="modal-header">
                        <h4 class="modal-title">发布文章</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                        <!-- 模态框主体 -->
                        <div class="modal-body">
                            <form method="post" action="article.php">
                            文章标题：<input type="text" class="form-control" name="article_name"><br>
                            文章内容：<textarea class="form-control" rows="3" name="article_content"></textarea><br>
                            所属类别：<div class="radio" >
                                <label>
                                  <input type="radio" name="optionsRadios" id="optionsRadios1" value="1" checked>热门推荐
                                </label>
                              </div>
                              <div class="radio">
                                <label>
                                  <input type="radio" name="optionsRadios" id="optionsRadios2" value="2">生活趣事
                                </label>
                              </div>
                              <div class="radio">
                                <label>
                                  <input type="radio" name="optionsRadios" id="optionsRadios2" value="3">平台建议
                                </label>
                              </div>
                              <div class="radio">
                                <label>
                                  <input type="radio" name="optionsRadios" id="optionsRadios2" value="4">排忧解难
                                </label>
                              </div>
                              <div class="radio">
                                <label>
                                  <input type="radio" name="optionsRadios" id="optionsRadios2" value="5">跑腿交流
                                </label>
                              </div>
                            </div>
                    
                        <!-- 模态框底部 -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                            <!-- <button type="submit" class="btn btn-secondary" data-dismiss="modal">提交</button> -->
                            <button type="submit" class="btn btn-default form-btn">发布文章</button>
                        </div>
                      </form>
                    </div>
                  </div>
            </div>
        </div>
        </div>
        
    <!-- <?php foreach($article as $key => $v): ?>
        <table class="table table-bordered">
            <div class="fl">
                    <div class="">
                        <a href="" style="text-decoration:none">文章列号：
                            <?php echo $article[$key]["article_id"]?>
                        </a>
                    </div>
                    <div>
                        <div class="">
                            <a href="" style="text-decoration:none">文章标题：
                                <?php echo $article[$key]["article_name"]?>
                            </a>
                        </div>
                        <a href="" class="aword" style="text-decoration:none">
                            文章内容：<?php echo $article[$key]["article_content"] ?>
                        </a>
                    </div>
            </div>
        </div>
         </table>
        <?php endforeach; ?> -->
    </div>
    <div class="content">
        <div class="nav-classify">
            <ul class="nav nav-pills nav-stacked">
                <li class="cla" role="presentation" class="active" value="1" ><a href="?acid=1" style="text-decoration:none" >热门推荐</a></li>
                <li class="cla" role="presentation" value="2"><a href="?acid=2" style="text-decoration:none"  >生活趣事</a></li>
                <li class="cla" role="presentation" value="3"><a href="?acid=3" style="text-decoration:none">平台建议</a></li>
                <li class="cla" role="presentation" value="4" ><a href="?acid=4" style="text-decoration:none">排忧解难</a></li>
                <li class="cla" role="presentation" value="5"><a href="?acid=5" style="text-decoration:none" >跑腿交流</a></li>
            </ul>
        </div>
        <div class="a_con">
            <div class="thing">
                <table class="table table-bordered con">
                <tr><th>列号</th><th>帖子标题</th><th>帖子浏览量</th><th>点赞数</th><th>帖子内容</th></tr>
                    <?php foreach($article as $key => $v): ?>
                <tr><td>
                                
                                    <?php echo $article[$key]["article_id"]?>
                                </td><td>
                                        <?php echo $article[$key]["article_name"]?>
                               </td><td>
                                    <?php echo $article[$key]["article_counts"]?>
                                    </td><td>
                                    <?php echo $article[$key]["article_like"]?>
                                    </td><td>
                                <a href="" class="aword" style="text-decoration:none"> </a>
                                <button type="button" class="btn btn-success look" data-toggle="modal" data-target="#myModal" onclick="targetto(<?php echo $article[$key]['article_id']?>)">查看</button>
                            <!-- 模态框（Modal） -->
                                 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal -->
                                </div>
                                <!--使得数据能动态加载--> 
                                <script>
                                    //动态加载函数
                                     function targetto(id){
                                        $("#myModal").modal({
                                        remote: "article_con.php?id="+id,   //获取帖子id
                                        show:false,                         //不能手动开启
                                        hide:false                          //不能手动关闭
                                        
                                        });
                                        // console.log(id);
                                    }
                                    //关闭模态框后，数据自动删除，再请求时重新加载
                                    $("#myModal").on("hidden.bs.modal", function() {
                                        $(this).removeData("bs.modal");
                                    });
                                    // $("#myModal1").modal('show');
                                    // $("#myModal1").modal('hide');  
                                    
                                </script>
                           </td>
                    </tr>
                <?php endforeach; ?>
                 </table>
            </div>
        </div>
    </div>
    <script>
        

        // $("ul li").click(function() {
        //     $(this).siblings('li').removeClass('active');  // 删除其兄弟元素的样式
        //     $(this).addClass('active');                    // 为点击元素添加样式
        // });
        
        // $("li a").click(function(){
        //     // alert($(this).attr('name'));
        //     var acid=$(this).attr('name');
        //     $.ajax({
        //         url:'?acid='+$(this).attr('name'),
        //         success:function(data){
        //             alert(acid);
        //         }
                
        //     })
        // })

        //获取url中的参数
        function getQueryVariable(variable)
        {
            var query = window.location.search.substring(1);
            var vars = query.split("&");
            for (var i=0;i<vars.length;i++) {
                    var pair = vars[i].split("=");
                    if(pair[0] == variable){return pair[1];}
            }
            return(false);
        }
        var id=getQueryVariable('acid');        //获取参数
        // console.log(id);
        if(!id){            //默认id为1
            id=1;
        }
        for(let i=0;i<5;i++){
            var point = document.getElementsByClassName('cla')[i];
            // console.log(point.value);
            if(id==point.value){          //锁定当前分类标签
                // point.classList.remove('active');
                point.classList.add('active');
            }
            // console.log($("ul li").attr('name'));
            // console.log(id);
        }
        // console.log(id);
    </script>
    
</body>

</html>