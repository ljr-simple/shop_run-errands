<?php
/* Smarty version 3.1.32, created on 2022-03-30 14:09:31
  from 'E:\phpStudy\phpStudy_64\phpstudy_pro\WWW\PHP-shop-master\yuansheng_houtai\Application\View\Admin\recycle_list.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_6244649bd555e7_67603232',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '039ee418b77b5dddeef5de1f8d9900757f297df6' => 
    array (
      0 => 'E:\\phpStudy\\phpStudy_64\\phpstudy_pro\\WWW\\PHP-shop-master\\yuansheng_houtai\\Application\\View\\Admin\\recycle_list.html',
      1 => 1648639325,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6244649bd555e7_67603232 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>电商后台管理-后台管理</title>

<link rel="stylesheet" href="/Public/Admin/css/pintuer.css">
<link rel="stylesheet" href="/Public/Admin/css/admin.css">
<link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.min.css"/>
</head>

<body>
    <span class="glyphicon glyphicon-trash">回收站</span>
	<table border='1' width='980' bordercolor='#000'>
		<tr>
			<th>编号</th> <th>名称</th> <th>图片</th> <th>价格</th> <th>恢复</th> <th>删除</th>
		</tr>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'rows');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rows']->value) {
?>
<tr style="text-align: center;" height="28px">
        <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['Pid'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['Pname'];?>
</td>
        <td><img src="/Public/Uploads/<?php echo $_smarty_tpl->tpl_vars['rows']->value['PIMG'];?>
" width="25px" height="25px"></td>
        <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['Ptotal'];?>
</td>
        <td><a class="button border-blue button-little" style="margin-top:2px;" href="index.php?p=Admin&c=Products&a=edit&proid=<?php echo $_smarty_tpl->tpl_vars['rows']->value['Pid'];?>
">修改</a></td>
        <td><a class="button border-yellow button-little" href="javascript:void(0)" onclick="if(confirm('确定要删除吗')){ location.href='index.php?p=Admin&c=Products&a=del&proid=<?php echo $_smarty_tpl->tpl_vars['rows']->value['Pid'];?>
'}">删除</a></td>
</tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</table>
</body>
</html><?php }
}
