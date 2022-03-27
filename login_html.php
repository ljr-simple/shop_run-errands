<!DOCTYPE HTML>
<html>
<head>
<title>登陆</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link rel="stylesheet" type="text/css" href="css/admin.css"/>
<link rel="stylesheet" type="text/css" href="css/pintuer.css"/>
</head>
<body>
<?php if(!empty($error)): ?>
	<div class="error-box">登陆失败，错误信息如下：
		<ul><?php foreach($error as $v) echo "<li>$v</li>"; ?></ul>
	</div>
<?php endIf; ?>
<div class="container">
    <div class="line">
        <div class="xs6 xm4 xs3-move xm4-move">
            <br /><br />
            <div class="media media-y"> <h1>嘉人</h1>
            </div>
            <br /><br />
            <form action="login.php" method="post">
            <div class="panel">
                <div class="panel-head"><strong>登录嘉人</strong></div>
                <div class="panel-body" style="padding:30px;">
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="text" class="input" name="uno" placeholder="登录账号" value=""  />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="password" class="input" name="password" placeholder="登录密码"  />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field">
                        <input type="text" name="checkcode" id="checkcode" placeholder="验证码" class="input"/>
                            <img src="CreateCheckCode.php"/ id="code_img" />
							<a href="#" id="change">看不清，换一张</a>
                        </div>
                    </div>
                </div>
                <div class="panel-foot text-center" style="height: 100px;">
					<input type="submit" class="button button-block bg-main text-big"  style="float:left; margin-right:10px;" value="立即登录" />
					<input type="button" class="button button-block bg-main text-big"  style="float:left; margin-right:10px;" value="忘记密码" onClick="location.href='resetPassword_html.php'"  />

					<input type="button" value="用户注册"  class="button button-block bg-main text-big" style="float:left; margin-right:10px;margin-top: 5px;" onClick="location.href='register.php'" />
					<input type="button" value="管理员登录"  class="button button-block bg-main text-big" style="float:left; margin-right:10px;margin-top: 5px;" onClick="location.href='http://www.lshop.com/index.php'" />
                </div>
            </div>
            </form>
            <div class="text-right text-small text-gray padding-top">基于Person构建</div>
        </div>
    </div>
</div>

<script>
	var change = document.getElementById("change");
	var img = document.getElementById("code_img");
	change.onclick = function(){
		img.src = "CreateCheckCode.php?t="+Math.random(); //增加一个随机参数，防止图片缓存
		return false; //阻止超链接的跳转动作
	}
</script>
</body>
</html>