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
}else if(isset($_GET['action']) && $_GET['action'] == 'ctask'){
	// 跳转到任务完成页面
    header('Location: ctask.php');

    // 终止脚本
    exit;
}

//点击购物车的时候
else if(isset($_GET['action']) && $_GET['action'] == 'shopCar'){
	// 跳转到购物车页面
    header('Location: shopCar.php');

    // 终止脚本
    exit;
}else if(isset($_GET['action']) && $_GET['action'] == 'sendtask'){
	// 跳转到发布任务页面
    header('Location: sendtask.php');

    // 终止脚本
    exit;
}
else if(isset($_GET['action']) && $_GET['action'] == 'article'){
	// 跳转到购物车页面
    header('Location: article.php');

    // 终止脚本
    exit;
}
//如果有session记录的话
if(isset($_SESSION['usersinfo'])){
	//文章传值
	$uid=$_SESSION['usersinfo']['Uid'];
	// $sql="select * from orders where Uid=$uid";

	$_SESSION['ornum']=1;
	$pageNum=$_GET['pageNum']??'1';
	$pageSize=6;
	//商品传值
	$sql = "select * from orders where Uid=$uid limit " . (($pageNum - 1) * $pageSize) . "," . $pageSize;			//显示任务
	$countsql = "select count(Uid) from orders where Uid=$uid";
	$_SESSION['iproname']='';
	$count = db_fetch_all($countsql);

	$orders=db_fetch_all($sql);
	// var_dump($orders);
	// exit();
	require "order_html.php";
	
}else{
	echo "<script>alert('对不起，你还没有登陆');</script>";
	require "login_html.php";
}
?>