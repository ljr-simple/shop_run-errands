<?php
/* Smarty version 3.1.32, created on 2023-03-16 09:03:27
  from 'E:\phpStudy\phpStudy_64\phpstudy_pro\WWW\PHP-shop-master\yuansheng_houtai\Application\View\Admin\cu_user_edit.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_6412db5fc2d833_10568449',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0b962189157873626a9740e28271a809c6c7f340' => 
    array (
      0 => 'E:\\phpStudy\\phpStudy_64\\phpstudy_pro\\WWW\\PHP-shop-master\\yuansheng_houtai\\Application\\View\\Admin\\cu_user_edit.html',
      1 => 1678957404,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6412db5fc2d833_10568449 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="zh-cn">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="renderer" content="webkit">
  <title>校园跑腿后台管理-后台管理</title>
  <link rel="stylesheet" href="/Public/Admin/css/pintuer.css">
  <link rel="stylesheet" href="/Public/Admin/css/admin.css">
</head>

<body>
  <div class="admin">
    <div class="tab">
      <div class="tab-head"> <strong>前台用户管理</strong>
        <ul class="tab-nav">
          <li class="active"><a href="#tab-set">修改前台用户信息</a></li>
        </ul>
      </div>
      <div class="tab-body"> <br />
        <div class="tab-panel active" id="tab-set">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="panel" style="width: 600px;">
              <div class="panel-head"><strong>用户信息</strong></div>
              <div class="panel-body" style="padding:30px;">
                <div class="form-group">
                  <div class="field field-icon-right">
                    <input type="text" class="input" name="Uno" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['Uno'];?>
" />
                    <span class="icon icon-user-md"></span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="field field-icon-right">
                    <input type="text" class="input" name="email" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['email'];?>
" />
                    <span class="icon icon-envelope"></span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="field field-icon-right">
                    <input type="text" class="input" name="money" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['money'];?>
" />
                    <span class="icon icon-money"></span>
                  </div>
                </div>
              </div>
              <div class="panel-foot text-center">
                <input type="submit" class="button button-block bg-main text-big" style="margin: auto" value="用户修改" />
              </div>
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
