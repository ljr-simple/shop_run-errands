<?php
/* Smarty version 3.1.32, created on 2023-05-15 06:18:54
  from 'E:\phpStudy\phpStudy_64\phpstudy_pro\WWW\PHP-shop-master\yuansheng_houtai\Application\View\Admin\user_list.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_6461cecea9d2e8_53985490',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '57047ca64560857ea1a10b4cf62048e05722c7ff' => 
    array (
      0 => 'E:\\phpStudy\\phpStudy_64\\phpstudy_pro\\WWW\\PHP-shop-master\\yuansheng_houtai\\Application\\View\\Admin\\user_list.html',
      1 => 1683729911,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6461cecea9d2e8_53985490 (Smarty_Internal_Template $_smarty_tpl) {
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
                <div class="panel-head"><strong>后台用户信息</strong></div>
                <table class="table table-hover">
                    <tr>
                        <th width="45">编号</th>
                        <th width="*">姓名</th>
                        <th width="*">用户头像</th>
                        <th width="*">最后登陆时间</th>
                        <th width="*">登录次数</th>
                        <th width="100">操作</th>
                    </tr>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'rows');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rows']->value) {
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['user_id'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['user_name'];?>
</td>
                        <td><img src="/Public/Uploads/<?php echo $_smarty_tpl->tpl_vars['rows']->value['user_face'];?>
" width="25px" height="25px"></td>
                        <td><?php echo date("Y-m-d H:i:s",$_smarty_tpl->tpl_vars['rows']->value['user_login_time']);?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['user_login_count'];?>
</td>
                        <td><a class="button border-yellow button-little"
                                href="index.php?p=Admin&c=Users&a=edit&user_id=<?php echo $_smarty_tpl->tpl_vars['rows']->value['user_id'];?>
">修改</a>&nbsp;
                            <a class="button border-yellow button-little"
                                href="index.php?p=Admin&c=Users&a=del&user_id=<?php echo $_smarty_tpl->tpl_vars['rows']->value['user_id'];?>
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
