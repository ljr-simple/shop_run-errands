<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <title>订单</title>
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
        width:80%;
        height:720px;
    }
    img{
        border-radius:10px 10px 10px 10px;
    }
    .n_page{
		display:block;
		float: auto;
		width:400px;
		height:50px;
		margin: 0 auto;
	}
	.pagination{
		width:380px;
		height:40px;
		display: block;
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
                    <li class="active"><a href="index.php">跑腿锻炼，你上你也行 <span class="sr-only">(current)</span></a></li>
                    <li>
						<a data-toggle="modal" href="#myModal1" class="btn  btn-large">当前用户：<span>
								<?php
			        		$uno1=$_SESSION['usersinfo'];
							$uno=$uno1['Uno'];
			        		echo "$uno";  	
			        	?>
							</span></a>
						<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
							aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">

									<!-- 模态框头部 -->
									<div class="modal-header">
										<h4 class="modal-title">个人资料</h4>
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									<!-- 模态框主体 -->
									<div class="modal-body">
										<form method="post" action="index.php">
											账号名称：<span>
												<?php
			        		$uno1=$_SESSION['usersinfo'];
									$uno=$uno1['Uno'];
			        		echo "$uno";  	
			        	?>
											</span><br>
											邮箱地址：<span>
												<?php	
									$email=$uno1['email'];
			        		echo "$email";  	
			        	?>
											</span><br>
											钱包数额：<span>
												<?php	
									$money=$uno1['money'];
			        		echo "$money";  	
			        	?>
											</span><br>
									</div>

									<!-- 模态框底部 -->
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
										<!-- <button type="submit" class="btn btn-secondary" data-dismiss="modal">提交</button> -->
										<a onClick="location.href='http://www.jiaren.com/resetPassword_html.php'"
											class="btn btn-default form-btn">修改密码</a>
									</div>
									</form>
								</div>
							</div>
						</div>
					</li>
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
					<li>
						<a href="?action=ctask">已完成确认</a>
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
                        <a href="" class="order" style="text-decoration:none">发布人：
                                <?php
                                echo $P[$key]["Puser"]?>
                            </a><a href="" class="order" style="text-decoration:none">任务名称：
                                <?php
                                echo $P[$key]["Pname"]?>
                            </a><a href="" class="order" style="text-decoration:none">配送地址：
                                <?php
                                echo $P[$key]["Pword"]?>
                            </a>
                            <a href="" class="order" style="text-decoration:none">任务数量：
                            <?php echo $orders[$key]["number"] ?>
                        </a><a href="" class="order" style="text-decoration:none">任务总价：
                            <?php echo $orders[$key]["Ototal_Amount"] ?>
                        </a>
                    </div>
            </div>
        <?php endforeach; ?>
    </div>

    </div>
    <div class="n_page">
    <ul class="pagination">
				<li>
				<a href="?pageNum=1" aria-label="Previous">
					首页
				</a>
				</li>
				<li>
				<a href="?pageNum=<?php echo $pageNum==1?1:$pageNum-1 ?>" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
				</li>
				<?php foreach($count as $key => $v): ?>
					<?php 
						$num=$count[$key]['count(Uid)']/6 + 1;
						while($num--){
							if($num<0)	break;
							?>
								<li>
									<a href="?pageNum=<?php echo $_SESSION['ornum'] ?>"><?php echo $_SESSION['ornum'] ?></a><?php $_SESSION['ornum']++; ?>
								</li>
					<?php
						}
					?>
				<?php endforeach; ?>
				<li>
				<a href="?pageNum=<?php echo $pageNum==--$_SESSION['ornum']?--$_SESSION['ornum']:$pageNum+1 ?>" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
				</li>
				<li>
				<a href="?pageNum=<?php $endpage=intdiv($count[$key]['count(Uid)'],6)+1; echo $endpage; ?>" aria-label="Previous">
					尾页
				</a>
				</li>
			</ul>
                    </div>
</body>

</html>