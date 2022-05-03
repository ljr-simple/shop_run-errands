<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>首页</title>
    <link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.min.css" />
		<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<style>
		.carousel-inner img {
      		width: 100%;
      		height: 100%;
  		}
		.fl{
			float:left;
		}
		.aword{
			display:inline-block;
			width:220px;
			height:80px;
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
		.oneGood{
			color:grey;
			font-size:14px;
			text-align:center;
		}
		#myCarousel{
			margin:0 auto;
			width:900px;
			height:380px;
		}
		.item{
			width:900px;
			height:380px;
		}
		.title{
			width:900px;
			height:50px;
			margin-left:150px;
			margin-top:4px;
			margin-bottom:-2px;
		}
		.bullet{
			display: inline-block;
			float: right;
			width: 600px;
			height: 50px;
			background-color: rgb(247, 245, 241);
			padding-bottom: 4px;
		}
		.main-title{
			display: inline-block;
			font-size: 28px;
			float: left;
			text-align: center;
		}
		#but{
			font-size: 18px;
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
      <a class="navbar-brand" href="#">校园跑腿</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">跑腿锻炼，你上你也行 <span class="sr-only">(current)</span></a></li>
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
	<!-- 轮播图 -->
	<div id="myCarousel" class="carousel slide">
	<!-- 轮播（Carousel）指标 -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>   
	<!-- 轮播（Carousel）项目 -->
	<div class="carousel-inner">
		<div class="item active">
			<img src="images/11.png" alt="First slide" width="800px" height="380px">
			<div class="carousel-caption"></div>
		</div>
		<div class="item">
			<img src="images/22.png" alt="Second slide" width="800px" height="380px">
			<div class="carousel-caption"></div>
		</div>
		<div class="item">
			<img src="images/54.png" alt="Third slide" width="800px" height="380px">
			<div class="carousel-caption"></div>
		</div>
	</div>
	<!-- 轮播（Carousel）导航 -->
	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	</a>
</div> 


		<div>
			<div class="title">
				<span class="main-title">跑腿任务</span>
				<div class="panel panel-default bullet">
					<div class="panel-body"><marquee><span id="but">公告：</span>
					  五月返乡，一切平安！</marquee>
					</div>
				  </div>
			</div>
			
			<?php if(!$product){?>
				<div class="oneGood" >
					<h3>无任务<h3>
				</div>
			<?php } else { ?>
			<div id="thing">
				<?php foreach($product as $key => $v): ?>
				<div class="lthing fl">							
				<div>
					<div class="fl">
					<a href=""><img src="yuansheng_houtai/Public/Uploads/<?php echo $product[$key]["PIMG"] ?>" width="250px" height="250px"/></a>
					</div>
					<div class="fl content">
						<div>发布人：<a href="" style="text-decoration:none;color:#000;"><?php echo $product[$key]["Puser"] ?></a> </div>
						<hr>
						<div>跑腿详情：<a href="" style="text-decoration:none;color:#000;"><?php echo $product[$key]["Pname"] ?></a> </div>
						<div>
							<a href="" class="aword" style="text-decoration:none;color:#000;" ><h5>配送地址：</h5><?php echo $product[$key]["Pword"]  ?></a>				
						</div>
						<div>跑腿回报：<?php echo $product[$key]["Ptotal"] ?></div>
						<div id="chart">		
							<a class="AddShop" href="index.php?pid=<?php echo $product[$key]["Pid"];?>" style="text-decoration:none" >
								<input class="btn btn-default" type="button" value="接任务">
							</a>											
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
