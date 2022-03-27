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
        width: 540px;
        height:238px;
        float:left;
        border:1px solid #888;
        margin-left:10px;
        border-radius:10px 10px 10px 10px;
        overflow:hidden;
        margin-bottom:10px;
    }
    .fl1{
        width:240px;
        height:240px;
        float:left;
    }
    .title{
        margin-left: 260px;
    }
    .order{
        display:inline-block;
        width:200px;
        height: 10px;
    }
    .content{
        margin-top:40px;
        margin-left:28px;
    }
    #thing{
        margin-left:180px;
        width:100%;
        height:100%;
    }
    img{
        border-radius:10px 10px 10px 10px;
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
                
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="?action=logout" class="">退出</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
   
    <div>
        <div class="title">
            <h3>我的订单</h3>
        </div>
        <div id="thing">
            <?php foreach($orders as $key => $v): 
                $pid=$orders[$key]["Pid"];
                $good_sql="select p.* from products p left join orders o on p.Pid=$pid";
                $P=db_fetch_all($good_sql);
                ?>
            <div class="fl">
					<div class="fl1">
					<a href="" style="text-decoration:none"><img src="yuansheng_houtai/Public/Uploads/<?php echo $P[$key]["PIMG"] ?>" width="250px" height="250px"/></a>
				    </div>
                    <div class="fl1 content">
                        <a href="" class="order" style="text-decoration:none">订单编号：
                            <?php echo $orders[$key]["Oid"]?>
                        </a>
                            <a href="" class="order" style="text-decoration:none">商品名称：
                                <?php
                                echo $P[$key]["Pname"]?>
                            </a>
                            <a href="" class="order" style="text-decoration:none">商品数量：
                            <?php echo $orders[$key]["number"] ?>
                        </a><a href="" class="order" style="text-decoration:none">商品总价：
                            <?php echo $orders[$key]["Ototal_Amount"] ?>
                        </a>
                    </div>
            </div>
        <?php endforeach; ?>
    </div>

    </div>

</body>

</html>