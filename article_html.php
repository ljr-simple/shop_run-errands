<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <title>Document</title>
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
                <a class="navbar-brand" href="#">嘉人</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">上嘉人，就够了 <span class="sr-only">(current)</span></a></li>
                    <li><a href="" class="">当前用户：<span>
                                <?php
                                  $uno1=$_SESSION['usersinfo'];
                                  $uno=$uno1['Uno'];
                                  echo "$uno";  	
                              ?> 
                            </span></a></li>
                    <li>
                        <a href="?action=shopCar">购物车
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
            <?php foreach($article as $key => $v): ?>
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
        <?php endforeach; ?>
    </div>

    </div>

</body>

</html>