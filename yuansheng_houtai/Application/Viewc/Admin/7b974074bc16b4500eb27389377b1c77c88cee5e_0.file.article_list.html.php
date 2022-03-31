<?php
/* Smarty version 3.1.32, created on 2022-03-31 12:41:40
  from 'E:\phpStudy\phpStudy_64\phpstudy_pro\WWW\PHP-shop-master\yuansheng_houtai\Application\View\Admin\article_list.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_6245a1843f4c06_72337226',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7b974074bc16b4500eb27389377b1c77c88cee5e' => 
    array (
      0 => 'E:\\phpStudy\\phpStudy_64\\phpstudy_pro\\WWW\\PHP-shop-master\\yuansheng_houtai\\Application\\View\\Admin\\article_list.html',
      1 => 1648730355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6245a1843f4c06_72337226 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>校园跑腿后台管理-后台管理</title>
    <link rel="stylesheet" href="/Public/Admin/css/pintuer.css">
    <link rel="stylesheet" href="/Public/Admin/css/admin.css">
    <?php echo '<script'; ?>
 src="/Public/Admin/js/article.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/Public/Admin/js/jquery.js"><?php echo '</script'; ?>
>
</head>

<body>
<div class="admin">
    <div class="panel admin-panel">
    	<div class="panel-head"><strong>内容列表</strong></div>
        <div class="padding border-bottom">
            <input type="button" class="button button-small checkall" name="checkall" checkfor="id" value="全选" />
            <input type="button" class="button button-small border-green" value="添加文章" onClick="location.href='index.php?p=Admin&c=articles&a=add'"/>
        </div>
        <table class="table table-hover" id="taaa">
            <tr><th width="80">编号</th><th width="80">名称</th><th width='80'>评论数</th><th width="200">创建时间</th><th width="200">最近修改时间</th><th width="150">操作</th></tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'rows');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rows']->value) {
?>
                <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['article_id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['article_name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['article_counts'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['article_btime'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['article_etime'];?>
</td>
                <td>
                    <a class="button border-blue button-little" href="index.php?p=Admin&c=articles&a=edit&article_id=<?php echo $_smarty_tpl->tpl_vars['rows']->value['article_id'];?>
">修改</a>
                    <a class="button border-yellow button-little" href="index.php?p=Admin&c=articles&a=del&article_id=<?php echo $_smarty_tpl->tpl_vars['rows']->value['article_id'];?>
" onclick="return confirm('确认删除?')">删除</a>
                </td>
            </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </table>
        <div class="panel-foot text-center">
            <ul class="pagination"><li><a href="#">上一页</a></li></ul>
            <ul class="pagination pagination-group">
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
            </ul>
            <ul class="pagination"><li><a href="#">下一页</a></li></ul>
        </div>
    </div>
    <br />
    <p class="text-right text-gray">基于<a class="text-gray" target="_blank" href="#">Person</a>构建</p>
</div>
</body>
</html><?php }
}
