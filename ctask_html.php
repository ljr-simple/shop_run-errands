<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>校园跑腿</title>
		<!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>-->
		<script src="js/shopCar.js" type="text/javascript" charset="utf-8"></script>
	</head>
		<link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.min.css"/>
	<body>
		<style>
			.good{
				float:left;
				width:320px;
				height:420px;
				margin-left:52px;
				overflow:hidden;
			}
			.sumTotal{
				width:240px;
				height: 100px;
				clear: both;
				margin:0px auto;
				padding: 10px;
				text-align: center;
			}
			img{
				border-radius:10px 10px 10px 10px;
			}
			.oneGood{
				color:grey;
				font-size:14px;
				text-align:center;
			}
			.GoodName{
				width:300px;
				height:150px;
				text-align:left;
				float:right;
				margin-top:2px;
			}
		</style>
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
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
		<li><a href="?action=article" class="">论坛帖子
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
		
		<div id="mid">
			<?php if(empty($cpro)){?>
				<div class="oneGood" >
					<h3>没有待确认任务<h3>
				</div>
			<?php } else { ?>
				<div class="good_total">
			<?php foreach($cpro as $key =>$v): ?>
			<div class="good">			
				<input type="hidden" name="hid" id="hid" value="<?php echo $key;?>" />
				<input type="hidden" name="hidPid" id="hidPid" value="<?php echo $cpro[$key]["Pid"];?>" />
				<div class="oneGood" >
					<img  src="yuansheng_houtai/Public/Uploads/<?php echo $cpro[$key]["PIMG"] ?>" width="300px" height="300px"/>
					
					<div class="GoodName">
						<button class="btn-xs"><a href="ctask.php?
					 	chid=<?php echo $key;?>
					 	&&chidPid=<?php echo $cpro[$key]["Pid"];?>
					 	">取消完成</a></button> 
						<button class="btn-xs"><a href="ctask.php?
					 	cfhid=<?php echo $key;?>
					 	&&chidPid=<?php echo $cpro[$key]["Pid"];?>
					 	">完成</a></button><br>
						发 布 人：&nbsp&nbsp
					<?php echo $cpro[$key]["Puser"] ?><br>
					任务详情:&nbsp&nbsp&nbsp&nbsp
					<?php echo $cpro[$key]["Pname"] ?><br>
					配送地址:&nbsp&nbsp&nbsp&nbsp
					<?php echo $cpro[$key]["Pword"] ?>
					 
					<!--该商品id-->
					<input type="hidden" name="pid[]" id="" value="<?php echo $cpro[$key]["Pid"];?>" />
			
					<div class="oneMoney">
						单份价格：&nbsp&nbsp&nbsp<span class="aMoney"><?php echo $cpro[$key]["Ptotal"] ?></span>
					</div>
					<div class="numAndHow">
						任务数量：&nbsp&nbsp <span class="shopNum" name="shopNum[]" id="shopNum" value="" >1</span>
						<!-- <input class="shopNum" type="text" name="shopNum[]" id="shopNum" value="1" /> -->
						<!-- <input class="jian" type="button" name="jian" id="jian" value="-" />
						<input class="jia" type="button" name="jia" id="jia" value="+" /> -->
					</div>
				</div>
					</div>
			</div>
				<?php endforeach; ?>
					</div>
			<?php }?>
		</div>
	</body>
</html>
