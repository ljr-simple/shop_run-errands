<?php
header('Content-Type:text/html;charset=utf-8');
require 'init.php';

$error = array();    // 保存错误信息

//打开session
session_start();

//如果点击了删除
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
else if(isset($_GET['hid']) && isset($_GET['hidPid'])){
	
	$pid=$_GET['hidPid'];
	$shopCarProductArr=$_SESSION['shopCarProduct'];
	unset($shopCarProductArr[(int)$_GET['hid']]);
	$_SESSION['shopCarProduct']=$shopCarProductArr;
	$session_PID=$_SESSION['pid'];
	
	foreach($session_PID as $k=>$v){
		if($v == $_GET['hidPid']){
		unset($session_PID[$k]);
		}
	}
	$_SESSION['pid']=$session_PID;
	
	$sql1="update  products set Pstatus=1 where pid='$pid'";
	$sql2="update  products set Ping=0 where pid='$pid'";
	$rst1=mysqli_query(db_init(), $sql1);
	$rst2=mysqli_query(db_init(), $sql2);
	require 'shopCar_html.php';
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
else if(isset($_GET['action']) && $_GET['action'] == 'article'){
	// 跳转到待接单列表页面
    header('Location: article.php');

    // 终止脚本
    exit;
}else if(isset($_GET['action']) && $_GET['action'] == 'sendtask'){
	// 跳转到发布任务页面
    header('Location: sendtask.php');

    // 终止脚本
    exit;
}
else if(isset($_GET['action']) && $_GET['action'] == 'order'){
	// 跳转到任务页面
    header('Location: order.php');
    // 终止脚本
    exit;
}else if(isset($_GET['action']) && $_GET['action'] == 'ctask'){
	// 跳转到任务完成页面
    header('Location: ctask.php');
    // 终止脚本
    exit;
}
//如果有选中任务加入待接单列表
else if(isset($_SESSION['pid'])){
	$shopCarProductArr=array();
	$shopCarTotal=array();
	$session_PID=$_SESSION['pid'];
	foreach($session_PID as $key =>$v){
		$sql6="select * from products where Pid = $v;";
		$rst=db_fetch_row($sql6);
		array_push($shopCarProductArr,$rst);
	}
	$_SESSION['shopCarProduct']=$shopCarProductArr;
	require 'shopCar_html.php';
}
else{
	require "shopCar_html.php";
}
	//如果有session记录的话
	if(isset($_SESSION['usersinfo'])){
		//完成任务的话
		$uno1=$_SESSION['usersinfo'];
		$uno=$uno1['Uno'];
		// $mon = $_SESSION['money'];
		$sql = "select * from products where Ping=1 and Puser='$uno'";
		$tpro=db_fetch_all($sql);
	}
	// var_dump($tpro);
	$_SESSION['tpro'] = $tpro;
	// var_dump($_SESSION['usersinfo']);
?>