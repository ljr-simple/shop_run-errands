<!DOCTYPE HTML>
<html>
<head>
<title>注册</title>
<link rel="stylesheet" type="text/css" href="./css/admin.css"/>
<link rel="stylesheet" type="text/css" href="./css/pintuer.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />

<script>
	//检查两次输入密码是否一致
	function checkForm(){
		var pw1 = document.getElementById("password").value;
		var pw2 = document.getElementById("repassword").value;
		if(pw1 !== pw2){
			alert('两次输入密码不一致！');
			return false;
		}
		return true;
	}
</script>
</head>
<body>
<?php if(!empty($error)): ?>
	<div class="error-box">注册失败，错误信息如下：
		<ul><?php foreach($error as $v) echo "<li>$v</li>"; ?></ul>
	</div>
<?php endIf; ?>
<div class="container">
    <div class="line">
        <div class="xs6 xm4 xs3-move xm4-move">
            <br /><br />
            <div class="media media-y"> <h1>校园跑腿服务系统</h1>
            </div>
            <br /><br />
            <form action="register.php" method="post" enctype="multipart/form-data">
            <div class="panel">
                <div class="panel-head"><strong>用户注册</strong></div>
                <div class="panel-body" style="padding:30px;">
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="text" class="input" name="uno" placeholder="请输入用户名" id='username' />
                            <span id='msg'></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="password" class="input" name="password" id="password" placeholder="请输入密码" />
                           
                        </div>
                    </div>
					<div class="form-group">
                        <div class="field field-icon-right">
                            <input type="password" class="input" name="repassword" id="repassword" placeholder="确定密码" />
                           
                        </div>
                    </div>
					<div class="form-group">
                        <div class="field field-icon-right">
                            <input type="text" class="input" name="email" id="email" placeholder="请输入邮箱" />
                           
                        </div>
                    </div>
                </div>
                <div class="panel-foot text-center">
                <input type="submit" class="button button-block bg-main text-big"  style="float:left; margin-right:10px;" value="用户注册" />
                <input type="button"  class="button button-block bg-main text-big" value="返回" onClick="location.href='login_html.php'" />
                </div>
            </div>
            </form>
            <div class="text-right text-small text-gray padding-top">基于Person构建</div>
        </div>
    </div>
</div>

</body>
</html>