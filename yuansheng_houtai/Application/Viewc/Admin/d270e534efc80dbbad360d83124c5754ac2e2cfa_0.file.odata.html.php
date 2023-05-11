<?php
/* Smarty version 3.1.32, created on 2023-05-11 16:11:33
  from 'E:\phpStudy\phpStudy_64\phpstudy_pro\WWW\PHP-shop-master\yuansheng_houtai\Application\View\Admin\odata.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_645d13b5ac3366_83636105',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd270e534efc80dbbad360d83124c5754ac2e2cfa' => 
    array (
      0 => 'E:\\phpStudy\\phpStudy_64\\phpstudy_pro\\WWW\\PHP-shop-master\\yuansheng_houtai\\Application\\View\\Admin\\odata.html',
      1 => 1683821490,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_645d13b5ac3366_83636105 (Smarty_Internal_Template $_smarty_tpl) {
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
  <div class="box"></div>
  <?php echo '<script'; ?>
>
    var myChart = echarts.init(document.querySelector('.box'));
    var option = {
      xAxis: {
        type: 'category',
        data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
      },
      yAxis: {
        type: 'value'
      },
      series: [{
        data: [820, 932, 901, 934, 1290, 1330, 1320],
        type: 'line'
      }]
    };
    myChart.setOption(option);
  <?php echo '</script'; ?>
>
</body>

</html><?php }
}
