<?php
/* Smarty version 3.1.32, created on 2023-05-14 07:09:53
  from 'E:\phpStudy\phpStudy_64\phpstudy_pro\WWW\PHP-shop-master\yuansheng_houtai\Application\View\Admin\article_show.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_64608941410766_12122495',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55790a55e6ff3b91266421e0d1d6c6046a940773' => 
    array (
      0 => 'E:\\phpStudy\\phpStudy_64\\phpstudy_pro\\WWW\\PHP-shop-master\\yuansheng_houtai\\Application\\View\\Admin\\article_show.html',
      1 => 1684048190,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64608941410766_12122495 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Echarts使用步骤</title>
  <style>
    .all {
      width: 100%;
      height: 500px;
      background-color: white;
      display: flex;
      flex-wrap: nowrap;
      margin: auto;
    }

    .box {
      width: 880px;
      height: 500px;
    }

    .box1 {
      width: 500px;
      height: 500px;
    }

    .all div {
      flex: 1;
    }

    .box2 {
      width: 1200px;
      height: 600px;
      margin: auto;
    }
  </style>
</head>

<body>
  <?php echo '<script'; ?>
 type="text/javascript" src="../../../Public/Admin/js/echarts.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 type="text/javascript" src="../../../Public/Admin/js/jquery.js"><?php echo '</script'; ?>
>

  <div class="all">
    <div class="box"></div>
    <div class="box1"></div>
  </div>
  <div class="box2">
  </div>

  <?php echo '<script'; ?>
>
    //帖子浏览量
    var box = document.querySelector('.box');
    var myChart = echarts.init(box);

    // 发送Ajax请求
    $.ajax({
      url: 'index.php?p=Admin&c=articles&a=show',
      type: 'GET',
      dataType: 'json',
      success: function (data) {
        // 解析JSON数据，将其赋值给变量
        // 在此处进行数据可视化操作
        var countArray = Array();
        var nameArray = Array();  //文章标题数组
        // console.log(data);

        //获取帖子阅读量
        for (const item in data) {
          countArray.push(parseInt(data[item]));
          nameArray.push(item);
          // console.log(item)
        }

        //折线图配置
        var option = {
          title: {
            text: "帖子浏览量折线图",
            x: 'center',
            y: 'bottom'
          },
          tooltip: {
            trigger: 'axis',
            axisPointer: { type: 'cross' }
          },
          legend: {},
          xAxis: {
            type: 'category',
            axisTick: {
              alignWithLabel: true
            },
            data: nameArray,
            axisLabel: {
              fontSize: 10 // 字体大小，单位为px
            }
          },
          yAxis: {
            type: 'value',
            name: '浏览量',
            min: 0,
            max: 200,
            position: 'left',
          },
          series: [{
            data: countArray,
            type: 'line',
            label: {
              show: true,
              position: 'top',
            },
            name: '浏览量',
            smooth: true,
          }]
        };
        myChart.setOption(option);
      },
      error: function (xhr, status, error) {
        console.log('Ajax error: ' + error);
      }
    });

    //帖子分类
    var box1 = document.querySelector('.box1');
    var myChart1 = echarts.init(box1);

    // 发送Ajax请求
    $.ajax({
      url: 'index.php?p=Admin&c=articles&a=cartshow',
      type: 'GET',
      dataType: 'json',
      success: function (data) {
        // 解析JSON数据，将其赋值给变量
        // 在此处进行数据可视化操作
        // console.log(data);
        var catsArray = Array();
        for (const item in data) {
          let catsObject = {
            value: 0,
            name: ''
          }
          catsObject.name = item;
          catsObject.value = data[item];
          catsArray.push(catsObject);
        }

        // console.log(catsArray);
        //折线图配置
        var option = {
          title: {
            text: "帖子分类分布饼状图",
            x: 'center',
            y: 'bottom'
          },
          tooltip: {
            trigger: 'axis',
            axisPointer: { type: 'cross' }
          },
          legend: {},
          series: [
            {
              type: 'pie',
              data: catsArray
            }
          ]
        };
        myChart1.setOption(option);
      },
      error: function (xhr, status, error) {
        console.log('Ajax error: ' + error);
      }
    });


    //帖子点赞数
    var box2 = document.querySelector('.box2');
    var myChart2 = echarts.init(box2);

    // 发送Ajax请求
    $.ajax({
      url: 'index.php?p=Admin&c=articles&a=likeShow',
      type: 'GET',
      dataType: 'json',
      success: function (data) {
        // 解析JSON数据，将其赋值给变量
        // 在此处进行数据可视化操作
        var countArray = Array();
        var nameArray = Array();  //文章标题数组
        console.log(data);

        //获取帖子点赞量
        for (const item in data) {
          countArray.push(parseInt(data[item]));
          nameArray.push(item);
        }

        //折线图配置
        var option = {
          title: {
            text: "帖子点赞数柱状图",
            x: 'center',
            y: 'bottom'
          },
          tooltip: {
            trigger: 'axis',
            axisPointer: { type: 'cross' }
          },
          legend: {},
          xAxis: {
            data: nameArray,
            axisLabel: {
              fontSize: 10 // 字体大小，单位为px
            }
          },
          yAxis: {},
          series: [
            {
              type: 'bar',
              data: countArray,
              barWidth: '20%'
            }
          ]
        };
        myChart2.setOption(option);
      },
      error: function (xhr, status, error) {
        console.log('Ajax error: ' + error);
      }
    });


  <?php echo '</script'; ?>
>

</body>

</html><?php }
}
