<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>购物车</title>
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
      <ul class="nav navbar-nav navbar-right">
	  <li><a href="?action=logout" class="">退出</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
	</nav>
		
		<div id="mid">
			<form action="pay.php" method="post">
			<?php if(!isset($shopCarProductArr)){?>
				<div class="oneGood" >
					空空如也。。
				</div>
			<?php } else { ?>
				<div class="good_total">
			<?php foreach($shopCarProductArr as $key =>$v): ?>
			<div class="good">			
				<input type="hidden" name="hid" id="hid" value="<?php echo $key;?>" />
				<input type="hidden" name="hidPid" id="hidPid" value="<?php echo $shopCarProductArr[$key]["Pid"];?>" />
				<div class="oneGood" >
					<img  src="yuansheng_houtai/Public/Uploads/<?php echo $shopCarProductArr[$key]["PIMG"] ?>" width="300px" height="300px"/>
					<div class="GoodName">
					<?php echo $shopCarProductArr[$key]["Pname"] ?>
					 &nbsp&nbsp&nbsp&nbsp
					 <a href="shopCar.php?
					 	hid=<?php echo $key;?>
					 	&&hidPid=<?php echo $shopCarProductArr[$key]["Pid"];?>
					 	">删除</a> 
					</div>
					<!--该商品id-->
					<input type="hidden" name="pid[]" id="" value="<?php echo $shopCarProductArr[$key]["Pid"];?>" />
			
					<div class="oneMoney">
						单件价格： <span class="aMoney"><?php echo $shopCarProductArr[$key]["Ptotal"] ?></span>
					</div>
					<div class="numAndHow">
						数量： <input class="shopNum" type="text" name="shopNum[]" id="shopNum" value="1" />
						<input class="jian" type="button" name="jian" id="jian" value="-" />
						<input class="jia" type="button" name="jia" id="jia" value="+" />
					</div>
					<div class="sumMoney">
						单件总价： <span class="sumMoneyWord">
							<?php echo  $shopCarProductArr[$key]["Ptotal"] ?>
							</span>
					</div>	
				</div>
			</div>
				<?php endforeach; ?>
					</div>
				<div class="sumTotal">
					<h5> 
					共<span id="sumTotalNum"> <?php echo sizeof($shopCarProductArr);?></span>
					 种商品 ，总价： <span id="sumTotalWord"> 
					<?php $sum=0;
					foreach($shopCarProductArr as $key2 =>$v2){
						$sum=$sum+$shopCarProductArr[$key2]["Ptotal"];
					}echo $sum;	?>
						</span> 元
					<br />
					<input type="submit" name="SsumTotal" id="SsumTotal" value="提交订单"/> </h5>
				</div>
			</form>
			<?php }?>
		</div>
	</body>
</html>
