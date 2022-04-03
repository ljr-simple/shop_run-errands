<?php
header('Content-Type:text/html;charset=utf-8');
require 'init.php';


//获取数据，动态加载
if(!empty($_GET['id'])){
    $id=$_GET['id'];
	$look_sql="select * from articles where article_id=$id";
	$article=db_fetch_all($look_sql);
    $mosql="update articles set article_counts=article_counts+1 where article_id=$id";      //浏览量加一
	$a=mysqli_query(db_init(),$mosql);
    // echo $article1;
	require "article_conhtml.php";
}
//点赞加一
// if($_GET['like']==1){
//     $aid=$_GET['aid'];
//     $likesql="update articles set article_like=article_like+1 where article_id=$aid";      //点赞加一
// 	$a=mysqli_query(db_init(),$likesql);
// 	require "article.php";
// }