<!DOCTYPE HTML>
<html>
<head>
<title>校园跑腿</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link rel="stylesheet" type="text/css" href="css/admin.css"/>
<link rel="stylesheet" type="text/css" href="css/pintuer.css"/>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<style>
    .error-box{
        text-align: center;
        color: gray;
        font-style: italic;
        margin: auto;
        width: 400px;
        background-color: #993600;

    }
    .error-lib{
        height: 60px;
        width: 100%;
        overflow: hidden;
    }
</style>
<body>
<!-- <?php if(!empty($error)): ?>
	<div class="error-box">登陆失败，错误信息如下：
		<ul><?php foreach($error as $v) echo "<li>$v</li>"; ?></ul>
	</div>
<?php endIf; ?> -->
<div class="error-lib">
<?php if(!empty($error)): ?>
<div class="alert alert-danger error-box" role="alert">登陆失败,
		<?php foreach($error as $v) echo $v; ?>
       </div>
<?php endIf; ?></div>
<div class="container">
    <div class="line">
        <div class="xs6 xm4 xs3-move xm4-move">
            <br /><br />
            <div class="media media-y"> <h1>校园跑腿</h1>
            </div>
            <br /><br />
            <form action="login.php" method="post">
            <div class="panel">
                <div class="panel-head"><strong>登录跑腿</strong></div>
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
                <div class="panel-foot text-center alert alert-warning" style="height: 100px;">
					<input type="submit" class="button button-block bg-main text-big login" style="float:left; margin-right:10px;" value="立即登录" />
					<input type="button" class="button button-block bg-main text-big"  style="float:left; margin-right:10px;" value="忘记密码" onClick="location.href='resetPassword_html.php'"  />

					<input type="button" value="用户注册"  class="button button-block bg-main text-big" style="float:left; margin-right:10px;margin-top: 5px;" onClick="location.href='register.php'" />
					<input type="button" value="管理员登录"  class="button button-block bg-main text-big" style="float:left; margin-right:10px;margin-top: 5px;" onClick="location.href='http://www.lshop.com/index.php'" />
                </div>
            </div>
            </form>
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
    // var show = document.querySelector('.show1');
    // var login = document.querySelector('.login');
    // login.onclick = function(){
    //     show.style.visibility="visible";
    // }
    var error=document.querySelector('.error-box');
        $('.error-box').slideUp(1,function(){           //让错误提示快速huachu
            // setTimeout(function(){
            //  error.style.display='none';
            // },3000);
        });
        $('.error-box').fadeIn(1500,function(){         //错误提示缓慢淡入
        });
        setTimeout(function(){
            $('.error-box').fadeOut("slow",function(){  //错误提示较慢淡出
            });
        },3000);
</script>
</body>
</html>