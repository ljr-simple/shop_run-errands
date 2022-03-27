<?php
/* Smarty version 3.1.32, created on 2022-03-02 14:10:48
  from 'E:\phpStudy\phpStudy_64\phpstudy_pro\WWW\PHP-shop-master\yuansheng_houtai\Application\View\Admin\orders_list.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_621f7ae8578ce1_76033740',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a3fc4bda61265d314b5f35d6112a8234e4319537' => 
    array (
      0 => 'E:\\phpStudy\\phpStudy_64\\phpstudy_pro\\WWW\\PHP-shop-master\\yuansheng_houtai\\Application\\View\\Admin\\orders_list.html',
      1 => 1646226183,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_621f7ae8578ce1_76033740 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>电商后台管理-后台管理</title>

<link rel="stylesheet" href="/Public/Admin/css/pintuer.css">
<link rel="stylesheet" href="/Public/Admin/css/admin.css">
</head>

<body>
    <a href="index.php?p=Admin&c=Orders&a=list" class="button button-small border-green" style="margin-bottom:2px;">订单</a>
	<table border='1' width='980' bordercolor='#000'>
		<tr>
			<th>编号</th> <th>用户</th> <th>商品名称</th ><th>商品数量</th>   <th>商品价格</th ><th>购买时间</th> <th>删除</th>
		</tr>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'rows');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rows']->value) {
?>
<tr style="text-align: center;" height="28px">
        <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['Oid'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['Uid'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['Pid'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['number'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['Ototal_Amount'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['Otime'];?>
</td>
        <td><a class="button border-yellow button-little" href="javascript:void(0)" onclick="if(confirm('确定要删除吗')){ location.href='index.php?p=Admin&c=Orders&a=del&oid=<?php echo $_smarty_tpl->tpl_vars['rows']->value['Oid'];?>
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
