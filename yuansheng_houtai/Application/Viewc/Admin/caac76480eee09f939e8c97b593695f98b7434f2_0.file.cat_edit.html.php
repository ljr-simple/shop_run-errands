<?php
/* Smarty version 3.1.32, created on 2022-02-28 09:13:10
  from 'E:\phpStudy\phpStudy_64\phpstudy_pro\WWW\yuansheng_houtai\Application\View\Admin\cat_edit.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_621c922635f002_43118452',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'caac76480eee09f939e8c97b593695f98b7434f2' => 
    array (
      0 => 'E:\\phpStudy\\phpStudy_64\\phpstudy_pro\\WWW\\yuansheng_houtai\\Application\\View\\Admin\\cat_edit.html',
      1 => 1646027011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_621c922635f002_43118452 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title>电商后台管理-后台管理</title>
<link rel="stylesheet" href="/Public/Admin/css/pintuer.css">
<link rel="stylesheet" href="/Public/Admin/css/admin.css">
</head>

<body>
<div class="admin">
  <div class="tab">
    <div class="tab-head"> <strong>分类管理</strong>
      <ul class="tab-nav">
        <li class="active"><a href="#tab-set">修改分类</a></li>
      </ul>
    </div>
    <div class="tab-body"> <br />
      <div class="tab-panel active" id="tab-set">
        <form method="post" class="form-x" action="">
         
          <div class="form-group">
            <div class="label">
              <label for="c_name">分类名称</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="c_name" name="c_name" size="50" value=<?php echo $_smarty_tpl->tpl_vars['info']->value['c_name'];?>
 />
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="c_parentId">所属分类</label>
            </div>
            <div class="field">
              <select class="input" name="c_parentId" style="width:20%" id="parentid">
                <option value="0">主类别</option>
                <option value="1">子类别</option>
                <option value="1">子类别</option>
                <option value="1">子类别</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="sort_order">排序</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="sort_order"  value=<?php echo $_smarty_tpl->tpl_vars['info']->value['sort_order'];?>
 name="sort_order" size="50" placeholder="50" data-validate="required:请填写分类排序" />
            </div>
          </div>
          <div class="form-button">
            <button class="button bg-main" type="submit">提交</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <p class="text-right text-gray">基于<a class="text-gray" target="_blank" href="#">Person</a>构建</p>
</div>
</body>
</html><?php }
}
