<?php
/* Smarty version 3.1.32, created on 2023-05-15 06:18:55
  from 'E:\phpStudy\phpStudy_64\phpstudy_pro\WWW\PHP-shop-master\yuansheng_houtai\Application\View\Admin\cu_user_list.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_6461cecfeb7f21_95508811',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '245eebf7603964430923e9f09d704a56bd42c582' => 
    array (
      0 => 'E:\\phpStudy\\phpStudy_64\\phpstudy_pro\\WWW\\PHP-shop-master\\yuansheng_houtai\\Application\\View\\Admin\\cu_user_list.html',
      1 => 1683729768,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6461cecfeb7f21_95508811 (Smarty_Internal_Template $_smarty_tpl) {
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
                <div class="panel-head"><strong>前台用户信息</strong></div>
                <table class="table table-hover">
                    <tr>
                        <th width="120">编号</th>
                        <th width="240">账号</th>
                        <th width="280">邮箱</th>
                        <th width="120">钱包</th>
                        <th width="100">操作</th>
                    </tr>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'rows');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rows']->value) {
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['Uid'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['Uno'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['email'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['money'];?>
</td>
                        <td><a class="button border-yellow button-little"
                                href="index.php?p=Admin&c=cu_user&a=edit&Uid=<?php echo $_smarty_tpl->tpl_vars['rows']->value['Uid'];?>
">修改</a>&nbsp;
                            <a class="button border-yellow button-little"
                                href="index.php?p=Admin&c=cu_user&a=del&Uid=<?php echo $_smarty_tpl->tpl_vars['rows']->value['Uid'];?>
"
                                onclick="return confirm('确认删除?')">删除</a>
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
