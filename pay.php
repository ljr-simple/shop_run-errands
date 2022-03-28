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
	
	$pidArr=$_POST['pid'];//商品id
	$numArr=$_POST['shopNum']??'1';//商品数量
	
	foreach ($pidArr as $key => $value) {
		$pid=$pidArr[$key];
		$num=$numArr[$key]??'1';
		$sql="select Ptotal from products where Pid = '$pid'";
		$oneSale=db_fetch_column($sql);
		$oneTotal=(int)$num*(float)$oneSale;
		
		$sql="insert into orders(Uid,Pid,number,Ototal_Amount,Otime) VALUES($uid,$pid,$num,$oneTotal,NOW());";
		$rst=mysqli_query(db_init(), $sql);
		$sql1="update  products set Pstatus=0 where pid='$pid'";
		$rst1=mysqli_query(db_init(), $sql1);

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