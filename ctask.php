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



//如果有session记录的话
if(isset($_SESSION['usersinfo'])){
	//完成任务的话
	$uno1=$_SESSION['usersinfo'];
	$uno=$uno1['Uno'];
	// $mon = $_SESSION['money'];
	$sql = "select * from products where Pstatus=2 and Puser='$uno'";
	$cpro=db_fetch_all($sql);
	if( isset($_GET['chidPid'])){
		$pid=$_GET['chidPid'];
		if(isset($_GET['cfhid'])){
			$sql1="update  products set Pstatus=0 where pid='$pid'";
			$rst=mysqli_query(db_init(), $sql1);
			unset($_GET['cfhid']);
			unset($_GET['chid']);
			unset($_GET['chidPid']);
		}
		else if(isset($_GET['chid'])){
			$sql_find_mon="select Ototal_Amount,Uid from orders where pid=$pid";
			$res=db_fetch_all($sql_find_mon);
			// var_dump($res);
			// exit;
			$mon=intval($res[0]['Ototal_Amount']??0);
			$uid=$res[0]['Uid']??1;

			//更新session
			// $uno1=$_SESSION['usersinfo'];
			// $uno=$uno1['Uno'];
			// $_SESSION['usersinfo']['money'] -=$mon;

			$sql4="update cu_user set money=money-$mon where Uid=$uid";
			$sql3="delete from orders where pid='$pid'";
			$sql2="update products set Pstatus=1 where pid='$pid'";
			$sql5="update products set Ping=0 where pid='$pid'";
			$rst2=mysqli_query(db_init(), $sql2);
			$rst3=mysqli_query(db_init(), $sql3);
			$rst4=mysqli_query(db_init(), $sql4);
			$rst4=mysqli_query(db_init(), $sql5);
			unset($_GET['chid']);
			unset($_GET['chidPid']);
		}
	}
	require "ctask_html.php";
	
}else{
	echo "<script>alert('对不起，你还没有登陆');</script>";
	require "login_html.php";
}

?>