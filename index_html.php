<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>首页</title>
		<link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.min.css"/>
	</head>
	<style>
		.fl{
			float:left;
		}
		.aword{
			display:inline-block;
			width:220px;
			height:146px;
		}
		#thing{
			position: relative;
			padding: 5px;
			width:100%;
			height: 600px;
		}
		.lthing{
			position: relative;
			width: 33%;
			height: 252px;
			margin-top: 5px;
			margin-left:4px;
			border:1px solid #888;
			overflow: hidden;
			border-radius: 10px 10px 10px 10px;
		}
		.content{
		margin-top: 30px;
		margin-left:20px;
		}
		.title{
			width:40px;
			height:10px;
			margin-left:100px;
			margin-top:-10px;
			margin-bottom:6px
		}
	</style>
	<body>
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
		
        <li><a href="?action=article" class="">精品文章
		</a></li>
        <li><a href="?action=order" class="">查看订单
		</a></li>
        <li><a href="?action=admin" class="">管理员页面
                        </a></li>
      </ul>
      <form class="navbar-form navbar-left" method="post">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="<?php echo $_SESSION['iproname']?>" name="iproname">
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
				<h4>商品</h4>
			</div>
			<div id="thing">
				<?php foreach($product as $key => $v): ?>
				<div class="lthing fl">							
				<div>
					<div class="fl">
					<a href=""><img src="yuansheng_houtai/Public/Uploads/<?php echo $product[$key]["PIMG"] ?>" width="250px" height="250px"/></a>
					</div>
					<div class="fl content">
					<div>名称：<a href="" style="text-decoration:none;color:#000;"><?php echo $product[$key]["Pname"] ?></a> </div>
					<div>
						<a href="" class="aword" style="text-decoration:none;color:#000;" ><h5>商品简介：</h5><?php echo $product[$key]["Pword"]  ?></a>				
					</div>
					<div>价格：<?php echo $product[$key]["Ptotal"] ?>	</div>
					<div id="chart">		
						<a class="AddShop" href="index.php?pid=<?php echo $product[$key]["Pid"];?>" style="text-decoration:none" >
						<input class="btn btn-default" type="button" value="加入购物车">
						</a>											
					</div>
				</div>
				</div>
				</div>
				
				<?php endforeach; ?>
			</div>
			
		</div>
		
	</body>
</html>
