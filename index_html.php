<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>校园跑腿</title>
	<link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.min.css" />
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="./js/echarts.min.js"></script>
</head>
<style>
	.carousel-inner img {
		width: 100%;
		height: 100%;
	}

	.fl {
		float: left;
	}

	.aword {
		display: inline-block;
		width: 220px;
		height: 80px;
	}

	#thing {
		position: relative;
		padding: 5px;
		width: 100%;
		height: 550px;
		display: block;
	}

	.lthing {
		display: flex;
		flex: 1;
		width: 498px;
		height: 252px;
		margin-top: 5px;
		margin-left: 4px;
		border: 1px solid #888;
		border-radius: 10px 10px 10px 10px;
	}

	.content {
		width: 248px;
		height: 252px;
		float: right;
		margin-top: 30px;
		margin-left: 22px;
	}

	.oneGood {
		color: grey;
		font-size: 14px;
		text-align: center;
	}

	#myCarousel {
		margin: 0 auto;
		width: 900px;
		height: 380px;
	}

	.item {
		width: 900px;
		height: 380px;
	}

	.title {
		width: 1060px;
		height: 50px;
		margin-left: 150px;
		margin-top: 4px;
		margin-bottom: -2px;
		display: block;
	}

	.bullet {
		display: inline-block;
		float: right;
		width: 900px;
		height: 50px;
		background-color: rgb(247, 245, 241);
		padding-bottom: 4px;
	}

	.main-title {
		display: inline-block;
		font-size: 28px;
		float: left;
		text-align: center;
		margin-left: -138px;
		border: 1px solid #e3dedef0;
		border-radius: 5px;
		background-color: #e3dedef0;
		line-height: 50px;
	}

	#but {
		font-size: 18px;
	}

	.n_page {
		display: block;
		float: auto;
		width: 300px;
		height: 50px;
	}

	.pagination {
		width: 350px;
		height: 40px;
		margin: 0 auto;
		display: block;
	}

	.weather-widget {
		width: 306px;
		height: 300px;
		border: 1px solid #ffffff;
		border-radius: 5px;
		padding: 10px;
		box-sizing: border-box;
		display: flex;
		flex-direction: row;
		justify-content: space-between;
		align-items: center;
	}

	.weather-icon img {
		width: 60px;
		height: 60px;
	}

	.weather-info {
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
	}

	.weather-areas {
		font-size: 30px;
		font-weight: bolder;
	}

	.temperature {
		font-size: 30px;
		font-weight: bold;
	}

	.weather-condition {
		font-size: 18px;
	}

	.weather-chart {
		width: 160px;
		height: 250px;
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
											</span> <a onClick="location.href='multiplepay_html.php'" class="btn btn-default form-btn">充值</a> <a class="btn btn-default form-btn">提现</a><br>
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

	<div class="weather-widget navbar-form navbar-left">
		<div class="weather-icon">
			<img src="" alt="天气图标">
		</div>
		<div class="weather-info">
			<div class="weather-areas"></div>
			<div class="temperature"></div>
			<div class="weather-condition"></div>
		</div>
		<div class="weather-chart"></div>
	</div>
	<script>
		// 获取天气数据
		$.ajax({
			url: 'https://v0.yiketianqi.com/api?unescape=1&version=v61&appid=64424157&appsecret=cBLdxE1X',
			type: 'GET',
			dataType: 'json',
			success: function (data) {
				// 解析JSON数据，获取需要展示的数据
				console.log(data)
				var temperature = data.tem;	//实时温度
				var condition = data.wea;		//天气状况
				var areas = data.city; //地区
				$('.weather-icon img').attr('src', './images/weather/' + data.wea_img + '.png');
				$('.temperature').text(temperature + '℃');
				$('.weather-condition').text(condition);
				$('.weather-areas').text(areas);


				//获取前七天日期
				var dateArray = []; // 用于保存前七天日期的数组
				var today = new Date(); // 获取当前日期
				for (var i = 0; i < 7; i++) {
					var date = new Date(today.getTime() - i * 24 * 60 * 60 * 1000); // 计算前i天的日期
					var year = date.getFullYear(); // 获取年份
					var month = date.getMonth() + 1; // 获取月份（注意：月份从0开始，需要加1）
					var day = date.getDate(); // 获取日期
					var dateString = year + '-' + month + '-' + day; // 将年月日拼接成字符串
					dateArray.push(dateString); // 将日期字符串存储到数组中
				}
				//倒序函数
				function rev(arr){
					var temp;	
					for (let i = 0; i < arr.length / 2; i++) {
						temp = arr[i];
						arr[i] = arr[arr.length - 1 - i];
						arr[arr.length - 1 - i] = temp;
					}	
				}
				//倒序数组
				// var temp;
				// for (let i = 0; i < dateArray.length / 2; i++) {
				// 	temp = dateArray[i];
				// 	dateArray[i] = dateArray[dateArray.length - 1 - i];
				// 	dateArray[dateArray.length - 1 - i] = temp;
				// }
				// console.log(dateArray)

				//倒序数据
				rev(dateArray);



				//获取七天内天气状况
				// 获取天气数据
				$.ajax({
					url: 'https://v0.yiketianqi.com/api?unescape=1&version=v9&appid=64424157&appsecret=cBLdxE1X',
					type: 'GET',
					dataType: 'json',
					success: function (data) {
						// 解析JSON数据，获取需要展示的数据

						//七天内的最高气温
						var infoTemMax = Array();
						data.data.forEach(item => {
							infoTemMax.push(item.tem1);
						});

						//七天内的最低气温
						var infoTemMin = Array();
						data.data.forEach(item => {
							infoTemMin.push(item.tem2);
						});

						
						rev(infoTemMax);
						rev(infoTemMin);


						// 绘制图表
						var chart = echarts.init(document.querySelector('.weather-chart'));
						var option = {
							tooltip: {
								trigger: 'axis',
								axisPointer: { type: 'cross' }
							},
							legend: {},
							xAxis: {
								type: 'category',
								data: dateArray
							},
							yAxis: {
								show: false
							},
							series: [
								{
									data: infoTemMin,
									type: 'line',
									stack: 'x',
									label: {
										show: true,
										position: 'top',
									},
								}, {
									data: infoTemMax,
									type: 'line',
									stack: 'x',
									label: {
										show: true,
										position: 'top',
									},
								}]
						};
						chart.setOption(option);
					},
					error: function (xhr, status, error) {
						console.log('Ajax error: ' + error);
					}
				});
			},
			error: function (xhr, status, error) {
				console.log('Ajax error: ' + error);
			}
		});


	</script>
	<!-- 轮播图 -->
	<div id="myCarousel" class="carousel slide">
		<!-- 轮播（Carousel）指标 -->
		<ol class="carousel-indicators">
			<?php foreach($carousel as $key => $v): ?>
			<li data-target="#myCarousel " data-slide-to="<?php echo $carousel[$key]['ca_id'] ?>" class="dot"></li>
			<!-- <li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li> -->

			<?php endforeach; ?>
		</ol>
		<!-- 轮播（Carousel）项目 -->
		<div class="carousel-inner">
			<?php foreach($carousel as $key => $v): ?>
			<div class="item">
				<img src="yuansheng_houtai/Public/Uploads/<?php echo $carousel[$key]['ca_img'] ?>" alt="First slide"
					width="800px" height="380px">
				<div class="carousel-caption"></div>
			</div>
			<script>
				let item = document.querySelector('.item');
				let dot = document.querySelector('.dot');
				// console.log(item)
				item.classList.add('active')
				dot.classList.add('active')
				// console.log(item.classList)
			</script>
			<!-- <div class="item">
				<img src="images/22.png" alt="Second slide" width="800px" height="380px">
				<div class="carousel-caption"></div>
			</div>
			<div class="item">
				<img src="images/54.png" alt="Third slide" width="800px" height="380px">
				<div class="carousel-caption"></div>
			</div> -->
			<?php endforeach; ?>
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


	<div class="title">
		<span class="main-title">跑腿任务</span>
		<div class="panel panel-default bullet">
			<div class="panel-body">
				<marquee><span id="but">公告：</span>
					<?php echo $bulletin[0]["b_text"] ?>
				</marquee>
			</div>
		</div>
	</div>

	<?php if(!$product){?>
	<div class="oneGood">
		<h3>无任务<h3>
	</div>
	<?php } else { ?>
	<div id="thing">
		<?php foreach($product as $key => $v): ?>
		<div class="lthing fl">
			<div class="fl">
				<a href=""><img src="yuansheng_houtai/Public/Uploads/<?php echo $product[$key]['PIMG'] ?>" width="250px"
						height="250px" /></a>
			</div>
			<div class="fl content">
				<div>发布人：<a href="" style="text-decoration:none;color:#000;">
						<?php echo $product[$key]["Puser"] ?>
					</a> </div>
				<hr>
				<div>跑腿详情：<a href="" style="text-decoration:none;color:#000;">
						<?php echo $product[$key]["Pname"] ?>
					</a> </div>
				<div>
					<a href="" class="aword" style="text-decoration:none;color:#000;">
						<h5>配送信息：</h5>
						<?php echo $product[$key]["Pword"]  ?>
					</a>
				</div>
				<div>跑腿回报：
					<?php echo $product[$key]["Ptotal"] ?>
				</div>
				<div id="chart">
					<a class="AddShop" href="index.php?pid=<?php echo $product[$key]['Pid'];?>" style="text-decoration:none">
						<input class="btn btn-default" type="button" value="接任务">
					</a>
				</div>
			</div>
		</div>
		<?php endforeach; ?>

	</div>
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
						$num=$count[$key]['count(Pname)']/6 + 1;
						while($num--){
							if($num<0)	break;
							?>
		<li>
			<a href="?pageNum=<?php echo $_SESSION['num'] ?>">
				<?php echo $_SESSION['num'] ?>
			</a>
			<?php $_SESSION['num']++; ?>
		</li>
		<?php
						}
					?>
		<?php endforeach; ?>
		<li>
			<a href="?pageNum=<?php echo $pageNum==--$_SESSION['num']?--$_SESSION['num']:$pageNum+1 ?>" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
			</a>
		</li>
		<li>
			<a href="?pageNum=<?php echo --$_SESSION['num'] ?>" aria-label="Previous">
				尾页
			</a>
		</li>
	</ul>
	<?php }?>


</body>

</html>