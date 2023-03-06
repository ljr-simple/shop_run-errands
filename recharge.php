<?php
header('Content-Type:text/html;charset=utf-8');
require_once 'init.php';
//打开session
session_start();

if(isset($_GET['mon'])){
  $mon = intval($_GET['mon']);
  $uno1=$_SESSION['usersinfo'];
	$uno=$uno1['Uno'];
  $_SESSION['usersinfo']['money'] +=$mon;
  $sql = "update cu_user set money=money+$mon where Uno='$uno';";
  $rst=mysqli_query(db_init(), $sql);
}

  header('Location: http://www.jiaren.com/index.php');
	// 终止脚本
	exit;
?>