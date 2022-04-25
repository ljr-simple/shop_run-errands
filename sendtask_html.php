<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>发布任务</title>
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
		.form-group{
			width:300px;
			margin:0 auto;
		}
		.form-btn{
			position: absolute;
    		left: 700px;
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
	<form method="post"  enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">代跑详情：</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="pname" value="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">代跑回报：</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="ptotal" value="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">配送地址：</label>
	<textarea class="form-control" id="exampleInputPassword1" name="pword" id="pword" rows="3" style="width:100%;"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputFile">图片展示：</label>
    <input type="file" id="exampleInputFile"  name="pic">
    <p class="help-block">可随意选择，或是解释任务内容</p>
  </div>
  <button type="submit" class="btn btn-default form-btn">发布任务</button>
</form>
		
		
	</body>
</html>
