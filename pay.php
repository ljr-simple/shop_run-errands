<?php
// 设定字符集
header('Content-Type:text/html;charset=utf-8');
require 'init.php';


$error = array();    // 保存错误信息
//打开session
session_start();

//如果有表单提交
if(isset($_POST['pid'])){
	$uid1=$_SESSION['usersinfo'];
	$uid=$uid1['Uid'];//用户id
	$uno=$uid1['Uno'];//用户名
	
	$pidArr=$_POST['pid'];//商品id
	$numArr=$_POST['shopNum']??'1';//商品数量
	
	foreach ($pidArr as $key => $value) {
		$pid=$pidArr[$key];
		$num=$numArr[$key]??'1';
		$sql="select Ptotal from products where Pid = '$pid'";
		$oneSale=db_fetch_column($sql);
		$oneTotal=(int)$num*(float)$oneSale;
		// $_SESSION['money']=$oneTotal;
		$sql="insert into orders(Uid,Pid,number,Ototal_Amount,Otime,Orunner) VALUES($uid,$pid,$num,$oneTotal,NOW(),$uno);";
		$rst=mysqli_query(db_init(), $sql);
		//更新session
  	$uno1=$_SESSION['usersinfo'];
		$uno=$uno1['Uno'];
  	$_SESSION['usersinfo']['money'] +=$oneTotal;

		$sql1="update  products set Pstatus=2 where pid='$pid'";
		$sql3="update  products set Ping=0 where pid='$pid'";
		$sql2="update cu_user set money=money+$oneTotal where Uid=$uid";
		$rst1=mysqli_query(db_init(), $sql1);
		$rst2=mysqli_query(db_init(), $sql2);
		$rst3=mysqli_query(db_init(), $sql3);

	}
	unset($_SESSION['pid']);
	unset($_SESSION['shopCarProduct']);
	header("refresh:3;url=index.php");
	echo "已完成任务,3秒后返回主页";
	
}
else {
	echo "你还没有任何跑腿任务，3秒后返回主页";
	header("refresh:3;url=index.php");
}
?>