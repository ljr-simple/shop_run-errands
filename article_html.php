<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <title>校园跑腿</title>
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
    }
    .thing{
        margin-left:40px;
    }
    .look{
        width:60px;
        height:28px;
    }
    tr,th{
        text-align:center;
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
                <form class="navbar-form navbar-left" method="post">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="<?php echo $_SESSION['ianame']?>" name="ianame">
        </div>
        <button type="submit" class="btn btn-default">搜索</button>
      </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="?action=logout" class="">退出</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
   
    <div>
        <div class="title">
            <h3>文章精选</h3>
        </div>
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

</body>

</html>