<?php
/* Smarty version 3.1.32, created on 2023-05-11 16:09:30
  from 'E:\phpStudy\phpStudy_64\phpstudy_pro\WWW\PHP-shop-master\yuansheng_houtai\Application\View\Admin\main.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_645d133a4d4b68_60435157',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9de3e5ebf714582dd5396437469122155f8c5eaf' => 
    array (
      0 => 'E:\\phpStudy\\phpStudy_64\\phpstudy_pro\\WWW\\PHP-shop-master\\yuansheng_houtai\\Application\\View\\Admin\\main.html',
      1 => 1683729804,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_645d133a4d4b68_60435157 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>校园跑腿后台管理-后台管理</title>
    <link rel="stylesheet" href="/Public/Admin/css/pintuer.css">
    <link rel="stylesheet" href="/Public/Admin/css/admin.css">
</head>

<body>
    <div class="admin">
        <div class="line-big">
            <div class="xm3">
                <div class="panel border-back">
                    <div class="panel-body text-center">
                        <img src="/Public/Uploads/<?php echo $_smarty_tpl->tpl_vars['name']->value['user']['user_face'];?>
" width="120"
                            class="radius-circle" /><br />
                        <?php echo $_smarty_tpl->tpl_vars['name']->value['user']['user_name'];?>

                    </div>
                    <div class="panel-foot bg-back border-back">
                        您好,<?php echo $_smarty_tpl->tpl_vars['name']->value['user']['user_name'];?>
，这是您第<?php echo $_smarty_tpl->tpl_vars['name']->value['user']['user_login_count'];?>
次登录，上次登录为<?php echo date('Y-m-d
                        H:i:s',$_smarty_tpl->tpl_vars['name']->value['user']['user_login_time']);?>
。</div>
                </div>
                <br />
                <div class="panel">
                    <div class="panel-head"><strong>站点统计</strong></div>
                    <ul class="list-group">
                        <li><span class="float-right badge bg-main">828</span><span class="icon-file-text"></span> 内容
                        </li>
                    </ul>
                </div>
                <br />
            </div>
            <div class="xm9">
                <div class="panel">
                    <div class="panel-head"><strong>系统信息</strong></div>
                    <table class="table">
                        <tr>
                            <th colspan="2">服务器信息</th>
                            <th colspan="2">系统信息</th>
                        </tr>
                        <tr>
                            <td width="110" align="right">操作系统：</td>
                            <td>Windows10</td>
                            <td width="90" align="right">系统开发：</td>
                            <td><a href="#" target="_blank">Person</a></td>
                        </tr>
                        <tr>
                            <td align="right">Web服务器：</td>
                            <td>Apache</td>
                            <td align="right">数据库：</td>
                            <td>MySQL</td>
                        </tr>
                        <tr>
                            <td align="right">程序语言：</td>
                            <td>PHP</td>
                            <td align="right">&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <br />
    </div>
</body>

</html><?php }
}
