<?php
header('Content-Type:text/html;charset=utf-8');
require_once 'init.php';


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
//点击购物车的时候
else if(isset($_GET['action']) && $_GET['action'] == 'shopCar'){
	// 跳转到购物车页面
    header('Location: shopCar.php');

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
else if(isset($_GET['action']) && $_GET['action'] == 'order'){
	// 跳转到购物车页面
    header('Location: order.php');

    // 终止脚本
    exit;
}else if(isset($_GET['action']) && $_GET['action'] == 'sendtask'){
	// 跳转到发布任务页面
    header('Location: sendtask.php');

    // 终止脚本
    exit;
}
//如果有get传值article_id的话
if(isset($_GET['article_id'])){
	$temp=$_GET['article_id'];
	
	//如果原本就有$_SESSION['article_id']
	if(isset($_SESSION['article_id'])){
		$add_flag=TRUE;
//		$a=unserialize($_COOKIE['article_id']);
		$a=$_SESSION['article_id'];
		foreach($a as $v){
			//如果商品已经添加了
			if($v==$temp){
				$add_flag=FALSE;
				echo "<script>alert('该文章已经添加了');</script>";
				
				//我这里没有写匹配到了还会怎样，应该直接结束才对的
			}
		}
		//如果文章还没用被加入
		if($add_flag){
			array_push($a,$temp);
			$_SESSION['article_id']=$a;
		}
		
	//如果没有$_SESSION['article_id']	
	}else{
		$b=array($temp);
		$_SESSION['article_id']=$b;
		
	}
}
//使用搜索引擎搜索文章
if(!isset($_POST['ianame'])){
	//商品传值
	$sql="select * from articles";
	$_SESSION['ianame']='';
	$article=db_fetch_all($sql);
	require "article_html.php";
}
else if(isset($_POST['ianame'])){
	$word=$_POST['ianame'];
	$_SESSION['ianame']=$word;
	$sql="select * from articles where article_name like '%$word%'";
	$article=db_fetch_all($sql);
	require "article_html.php";
}
else{
	echo "<script>alert('对不起，你还没有登陆');</script>";
	require "login_html.php";
}

//使用id匹配相应的帖子内容
// if(!empty($_GET['id'])){
// 	$id=$_GET['id'];
// 	$sql="select * from articles where article_id=$id";
// 	$article=db_fetch_all($sql);
// 	require "article_conhtml.php";
// }

//点赞加一
if(isset($_GET['like'])){
	// echo $_GET['like'];
    $aid=$_GET['aid'];
    $likesql="update articles set article_like=article_like+1 where article_id=$aid";      //点赞加一
	$a=mysqli_query(db_init(),$likesql);
	echo "<script language=javascript>";
	echo "location.href='?article.php';";
	echo "</script>";
}
?>