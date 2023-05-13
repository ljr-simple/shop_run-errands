<?php
/* Smarty version 3.1.32, created on 2023-05-13 16:01:08
  from 'E:\phpStudy\phpStudy_64\phpstudy_pro\WWW\PHP-shop-master\yuansheng_houtai\Application\View\Admin\article_show.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_645fb444a59587_51705728',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55790a55e6ff3b91266421e0d1d6c6046a940773' => 
    array (
      0 => 'E:\\phpStudy\\phpStudy_64\\phpstudy_pro\\WWW\\PHP-shop-master\\yuansheng_houtai\\Application\\View\\Admin\\article_show.html',
      1 => 1683993643,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_645fb444a59587_51705728 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Echarts使用步骤</title>
  <style>
    .box {
      width: 500px;
      height: 500px;
      background-color: white;
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

  <div class="box"></div>
  <?php echo '<script'; ?>
>
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
        console.log(data);

        //获取帖子阅读量
        for (const item in data) {
          countArray.push(parseInt(data[item]));
          nameArray.push(item);
          // console.log(item)
        }

        //折线图配置
        var option = {
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
            data: nameArray
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
        console.log(1)
      }
    });


  <?php echo '</script'; ?>
>

  <div class="box"></div>
  <?php echo '<script'; ?>
>
    var box = document.querySelector('.box');
    var myChart = echarts.init(box);

    // 发送Ajax请求
    $.ajax({
      url: 'index.php?p=Admin&c=articles&a=cartshow',
      type: 'GET',
      dataType: 'json',
      success: function (data) {
        // 解析JSON数据，将其赋值给变量
        // 在此处进行数据可视化操作
        var countArray = Array();
        var nameArray = Array();  //文章标题数组
        console.log(data);


        for (const item in data) {
          countArray.push(parseInt(data[item]));
          nameArray.push(item);
          // console.log(item)
        }

        //折线图配置
        var option = {
          series: [
            {
              type: 'pie',
              data: [
                {
                  value: 335,
                  name: '直接访问'
                },
                {
                  value: 234,
                  name: '联盟广告'
                },
                {
                  value: 1548,
                  name: '搜索引擎'
                }
              ]
            }
          ]
        };
        myChart.setOption(option);
      },
      error: function (xhr, status, error) {
        console.log('Ajax error: ' + error);
        console.log(1)
      }
    });


  <?php echo '</script'; ?>
>

</body>

</html><?php }
}
