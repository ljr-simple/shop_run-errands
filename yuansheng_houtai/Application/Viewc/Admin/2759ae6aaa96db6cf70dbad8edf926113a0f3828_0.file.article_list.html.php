<?php
/* Smarty version 3.1.32, created on 2022-02-28 09:01:36
  from 'E:\phpStudy\phpStudy_64\phpstudy_pro\WWW\yuansheng_houtai\Application\View\Admin\article_list.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_621c8f703702c8_97574417',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2759ae6aaa96db6cf70dbad8edf926113a0f3828' => 
    array (
      0 => 'E:\\phpStudy\\phpStudy_64\\phpstudy_pro\\WWW\\yuansheng_houtai\\Application\\View\\Admin\\article_list.html',
      1 => 1646026984,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_621c8f703702c8_97574417 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>电商后台管理-后台管理</title>
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
<form method="post">
<div class="panel admin-panel">
<div class="panel-head"><strong>文章检索</strong>&nbsp;&nbsp;&nbsp;&nbsp;
	类别：
    <select></select>
    标题：<input type="text" name="title">
    内容：<input type="text" name="content">
    是否公开：<select><option value="">不限</option><option value="1">是</option><option value="0">否</option></select>
    是否置顶：<select><option value="">不限</option><option value="1">是</option><option value="0">否</option></select>
    <input type="submit" name="submit" value="搜索">
</div>
</div>
</form>
    <div class="panel admin-panel">
    	<div class="panel-head"><strong>内容列表</strong></div>
        <div class="padding border-bottom">
            <input type="button" class="button button-small checkall" name="checkall" checkfor="id" value="全选" />
            <input type="button" class="button button-small border-green" value="添加文章" onClick="location.href='index.php?p=Admin&c=articles&a=add'"/>
            <input type="button" class="button button-small border-yellow" value="批量删除" />
            <input type="button" class="button button-small border-blue" value="回收站" />
        </div>
        <table class="table table-hover" id="taaa">
            <tr><th width="45">选择</th><th width="120">分类</th><th width="*">名称</th><th width='100'>评论数</th><th width="200">创建时间</th><th width="150">操作</th></tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'rows');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rows']->value) {
?>
            <tr class="tr<?php echo $_smarty_tpl->tpl_vars['rows']->value['article_id'];?>
">
                <td><input type="checkbox" name="id" value="1" /></td>
                <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['article_cid'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['article_name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['article_counts'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['article_btime'];?>
</td>
                <td>
                    <a class="button border-blue button-little" href="index.php?p=Admin&c=articles&a=edit&article_id=<?php echo $_smarty_tpl->tpl_vars['rows']->value['article_id'];?>
">修改</a>
                    <a class="button border-yellow button-little" href="index.php?p=Admin&c=articles&a=del&article_id=<?php echo $_smarty_tpl->tpl_vars['rows']->value['article_id'];?>
" onclick="return confirm('确认删除?')">删除</a>
                    <a class="button border-blue button-little" href="index.php?p=Admin&c=articles&a=list&article_id=<?php echo $_smarty_tpl->tpl_vars['rows']->value['article_id'];?>
" onclick="fun()">置顶</a>
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
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
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
