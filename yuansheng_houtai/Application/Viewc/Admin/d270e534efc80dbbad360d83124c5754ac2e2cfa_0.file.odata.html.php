<?php
/* Smarty version 3.1.32, created on 2023-05-14 07:11:10
  from 'E:\phpStudy\phpStudy_64\phpstudy_pro\WWW\PHP-shop-master\yuansheng_houtai\Application\View\Admin\odata.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_6460898e4f62b7_72036541',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd270e534efc80dbbad360d83124c5754ac2e2cfa' => 
    array (
      0 => 'E:\\phpStudy\\phpStudy_64\\phpstudy_pro\\WWW\\PHP-shop-master\\yuansheng_houtai\\Application\\View\\Admin\\odata.html',
      1 => 1684048268,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6460898e4f62b7_72036541 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Echarts使用步骤</title>
  <style>
    .box {
      width: 1400px;
      height: 600px;
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
      url: 'index.php?p=Admin&c=Odata&a=show',
      type: 'GET',
      dataType: 'json',
      success: function (data) {
        // 解析JSON数据，将其赋值给变量
        var dailyAmountMap = data;
        // 在此处进行数据可视化操作
        var amountArray = Array();
        var dateArray = Array();
        // console.log(data);

        //获取订单金额
        for (const item in dailyAmountMap) {
          amountArray.push(parseInt(dailyAmountMap[item]));
          dateArray.push(item);
          // console.log(item)
        }
        // console.log(amountArray)
        // console.log(dateArray)

        //获取前七天日期
        // var dateArray = []; // 用于保存前七天日期的数组
        // var today = new Date(); // 获取当前日期
        // for (var i = 0; i < 7; i++) {
        //   var date = new Date(today.getTime() - i * 24 * 60 * 60 * 1000); // 计算前i天的日期
        //   var year = date.getFullYear(); // 获取年份
        //   var month = date.getMonth() + 1; // 获取月份（注意：月份从0开始，需要加1）
        //   var day = date.getDate(); // 获取日期
        //   var dateString = year + '-' + month + '-' + day; // 将年月日拼接成字符串
        //   dateArray.push(dateString); // 将日期字符串存储到数组中
        // }

        //折线图配置
        var option = {
          title: {
            text: "订单金额折线统计图",
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
            data: dateArray
          },
          yAxis: {
            type: 'value',
            name: '金额',
            min: 0,
            max: 2500,
            position: 'left',
          },
          series: [{
            data: amountArray,
            type: 'line',
            label: {
              show: true,
              position: 'top',
            },
            name: '金额',
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
</body>

</html><?php }
}
