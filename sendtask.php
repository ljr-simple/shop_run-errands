<?php
header('Content-Type:text/html;charset=utf-8');
require 'init.php';


$error = array();    // 保存错误信息

//打开session
session_start();

//用户退出
if (isset($_GET['action']) && $_GET['action'] == 'logout') {    
    // 清除COOKIE数据
    setcookie('uno', '', time() - 1);
    setcookie('password', '', time() - 1);
    // 清除SESSION数据
    unset($_SESSION['usersinfo']);
    // 如果SESSION中没有其他数据，则销毁SESSION
    if (empty($_SESSION)) {
        session_destroy();
    }
    // 跳转到登录页面
    header('Location: login.php');
    // 终止脚本
    exit;
}
else if(isset($_GET['action']) && $_GET['action'] == 'admin') {    
	// 清除COOKIE数据
	setcookie('uno', '', time() - 1);
	setcookie('password', '', time() - 1);
	// 清除SESSION数据
	unset($_SESSION['usersinfo']);
	// 如果SESSION中没有其他数据，则销毁SESSION
	if (empty($_SESSION)) {
		session_destroy();
	}
	// 跳转到登录页面
	header('Location: http://www.lshop.com/index.php');
	// 终止脚本
	exit;
}
//点击购物车的时候
else if(isset($_GET['action']) && $_GET['action'] == 'shopCar'){
	// 跳转到购物车页面
    header('Location: shopCar.php');

    // 终止脚本
    exit;
}
else if(isset($_GET['action']) && $_GET['action'] == 'article'){
	// 跳转到购物车页面
    header('Location: article.php');

    // 终止脚本
    exit;
}
else if(isset($_GET['action']) && $_GET['action'] == 'order'){
	// 跳转到购物车页面
    header('Location: order.php');

    // 终止脚本
    exit;
}else if(isset($_GET['action']) && $_GET['action'] == 'ctask'){
	// 跳转到任务完成页面
    header('Location: ctask.php');

    // 终止脚本
    exit;
}

//当资料都填齐的话
if(isset($_POST['pname'])&&isset($_POST['ptotal'])&&isset($_POST['pword'])&&isset($_FILES['pic'])){
	$pname=$_POST['pname'];
	$ptotal=$_POST['ptotal'];
	$pword=$_POST['pword'];
	$puser=$_SESSION['usersinfo']['Uno'];
	$p=$_FILES['pic'];
	$pimg=$p['name'];
	$rst=FALSE;
	if(!$pimg)	
		$pimg = 'deftask.jpg';
	//获取上传文件的类型
	$type=substr(strrchr($pimg, '.'), 1);
	//判断上传文件类型
	//当为jpg或者是png的时候
	// echo $pimg;
	// exit;
	if($type=='jpg'||$type=='png'){
		//移动数据			
		move_uploaded_file($p['tmp_name'],iconv("UTF-8","gb2312",'yuansheng_houtai/Public/Uploads/'.$pimg));
		$sql="insert into products(Pname,Ptotal,Pword,PIMG,Puser,Pstatus,Ping) values('$pname',$ptotal,'$pword','$pimg','$puser',1,1);";
		$rst=mysqli_query(db_init(), $sql);	
	}
	else{
		echo "上传的图片不为png或者jpg格式，请重新输入，3秒后返回";
		var_dump($pimg);
		header("refresh:3;url=sendtask.php");
	}
	
	
	if($rst){
		header("refresh:0;url=addtask.php");
	}
	else{
		echo "资料没填满或者未知错误,3秒后返回添加界面";
		header("refresh:3;url=sendtask.php");
	}			
}

//如果有session记录的话
if(isset($_SESSION['usersinfo'])){
	//文章传值
	$uid=$_SESSION['usersinfo']['Uid'];
	require "sendtask_html.php";
	
}else{
	echo "<script>alert('对不起，你还没有登陆');</script>";
	require "login_html.php";
}
?>