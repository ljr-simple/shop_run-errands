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
else if(isset($_GET['action']) && $_GET['action'] == 'sendtask'){
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
}
//如果有get传值pid的话
if(isset($_GET['pid'])){
	$temp=$_GET['pid'];
	
	//如果原本就有$_SESSION['pid']
	if(isset($_SESSION['pid'])){
		$add_flag=TRUE;
//		$a=unserialize($_COOKIE['pid']);
		$a=$_SESSION['pid'];
		foreach($a as $v){
			//如果任务已经添加了
			if($v==$temp){
				$add_flag=FALSE;
				echo "<script>alert('该商品已经添加了');</script>";
				//我这里没有写匹配到了还会怎样，应该直接结束才对的
			}
		}
		//如果商品还没有被加入
		if($add_flag){
			array_push($a,$temp);
			$_SESSION['pid']=$a;
		}
		//将任务的status置为0   任务已被接受
		$sql1="update  products set Pstatus=0 where pid='$temp'";
		$rst1=mysqli_query(db_init(), $sql1);
	//如果没有$_SESSION['pid']	
	}else{
		$b=array($temp);
		$_SESSION['pid']=$b;
		
	}

}
//使用搜索引擎搜索商品
if(isset($_SESSION['usersinfo'])){
	if(!isset($_POST['iproname'])){
		//商品传值
		$sql="select * from products where Pstatus=1";
		$_SESSION['iproname']='';
		$product=db_fetch_all($sql);
		require "index_html.php";
	}
	else if(isset($_POST['iproname'])){
		$word=$_POST['iproname'];
		$_SESSION['iproname']=$word;
		$sql="select * from products where Pname like '%$word%' and Pstatus=1";
		$product=db_fetch_all($sql);
		require "main.html";
		require "index_html.php";
	}
}
else{
	echo "<script>alert('对不起，你还没有登陆');</script>";
	require "login_html.php";
}
?>