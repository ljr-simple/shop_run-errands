<?php
/* Smarty version 3.1.32, created on 2023-05-12 08:53:58
  from 'E:\phpStudy\phpStudy_64\phpstudy_pro\WWW\PHP-shop-master\yuansheng_houtai\Application\View\Admin\cat_list.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_645dfea6894e92_15714750',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7748d6c8d3bfb980fc1a231974e1c6d67dbf08b' => 
    array (
      0 => 'E:\\phpStudy\\phpStudy_64\\phpstudy_pro\\WWW\\PHP-shop-master\\yuansheng_houtai\\Application\\View\\Admin\\cat_list.html',
      1 => 1683729741,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_645dfea6894e92_15714750 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>校园跑腿后台管理-后台管理</title>
    <link rel="stylesheet" href="/Public/Admin/css/pintuer.css">
    <link rel="stylesheet" href="/Public/Admin/css/admin.css">
</head>

<body>
    <div class="admin">
        <form method="post">
            <div class="panel admin-panel">
                <div class="panel-head"><strong>类别列表</strong></div>
                <div class="padding border-bottom">
                    <input type="button" class="button button-small border-green" value="添加类别"
                        onClick="location.href='index.php?p=Admin&c=cat&a=add'" />
                </div>
                <table class="table table-hover">
                    <tr>
                        <th width="45">编号</th>
                        <th width="*">名称</th>
                        <th width="100">操作</th>
                    </tr>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'rows');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rows']->value) {
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['c_id'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['c_name'];?>
</td>
                        <td><a class="button border-blue button-little"
                                href="index.php?p=Admin&c=cat&a=edit&c_id=<?php echo $_smarty_tpl->tpl_vars['rows']->value['c_id'];?>
">修改</a>
                            <a class="button border-yellow button-little"
                                href="index.php?p=Admin&c=cat&a=del&c_id=<?php echo $_smarty_tpl->tpl_vars['rows']->value['c_id'];?>
" onclick="">删除</a>
                        </td>
                    </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </table>
            </div>
        </form>
        <br />
    </div>
</body>

</html><?php }
}
