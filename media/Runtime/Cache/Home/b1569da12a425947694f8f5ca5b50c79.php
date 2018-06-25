<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录页面</title>
    <link rel="stylesheet" type="text/css" href="/project/media/Public/icon/iconfont.css">
    <link href="/project/media/Public/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
     .icon{
        font-size: 30px;
        color: #fff;
    }
    .icon-b {
        font-family: "iconfont" !important;
        font-style: normal;
        font-size: 35px;
        position: absolute;
        left: 50px;
        top: 14px;
        color: #808080;
    }

    .icon-a {
        font-family: "iconfont" !important;
        font-style: normal;
        font-size: 38px;
        position: absolute;
        left: 10%;
        top: 53%;
        color: #808080;
    }
   
    body,
    html {
        margin: 0;
        padding: 0;
        height: 100%;
        width: 100%;
       
    }

    ul li {
        list-style-type: none;
    }

    i {
        font-style: normal;
    }

    .login,
    .login_all {
        height: 100%;
        width: 100%;
        background-image: url('/project/media/Public/images/login/login.png');
        background-size: 100% 100%;
        position: relative;
    }


    .login_all .login_password {
        position: absolute;
        right: 14%;
        top: 7%;
    }

    .login .login_nopassword {
        width: 500px;
        height: 506px;
        background-color:#006286;
        font-size: 22px;
        color: #f9f9f9;
        padding-top: 2%;
    }

    .login .login_nopassword p {
        padding: 10px 0 5px 0;
        display: flex;
        justify-content: center;
        font-size: 22px;
        color: #f9f9f9;
    }

    .login .login_nopassword .forget {
        display: flex;
        justify-content: center;
        position: relative;
        padding: 0 0 20px 0;
    }

    .login .login_nopassword .forget .remember-id {
        width: 22px;
        height: 22px;
        border: 1px solid #fff;
        background-color: #e8e9ed;
        position: absolute;
        left: 14%;
        top: 4px;
    }

    .login .login_nopassword .forget span>a {
        text-decoration: none;
        color: #f4f4f4;
        font-size: 16px;
    }

    .put {
        text-align: center;
        position: relative;
        padding: 0 0 15px 0;
    }

    .put_tel {
        border-radius: 10px;
        width: 434px;
        height: 60px;
        background-color: #fff;
       margin: 10px 0 20px 0;
        padding-left: 15%;
        font-size: 18px;
        color: #7e7e7e;
        border: 1px solid #fff;
    }

    .center-button .button {
        margin-top: 34px;
        background-color: #1291a4;
        border: 1px solid #1291a4;
        width: 88%;
        height: 60px;
        color: #ffffff;
        outline: none;
        border-radius: 8px;
        font-size: 24px;
        font-weight: bold;
        margin: 30px auto;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login .login_nopassword .allother {
        display: flex;
        justify-content: center;
        position: relative;
        padding: 0 0 10px 0;
        font-size: 20px;
        color: #d0d0d0;
    }

    .allother_way .picall {
        position: absolute;
        top: -5px;
        left: 54%;
    }

    .login .login_nopassword .allother span>a {
        font-size: 20px;
        color: #d0d0d0;
    }
</style>

<body>
    <div class="login">

        <div class="login_all">
        
            <form action="" method="post">
                <div class="login_password">
                    <div class="login_nopassword">
                        <p>密码登录</p>
                        <div class="put">
                            <i class="iconfont icon-b">&#xe63f;</i>
                            <input type="text" class="put_tel" id="username" name="username" placeholder="请输入邮箱/手机号码">
                            <input type="password" class="put_tel" id="password" name="password" placeholder="请输入密码">
                            <i class="iconfont icon-a">&#xe614;</i>
                        </div>
                        <div class="forget">
                            <input type="checkbox" name="check" id="check"  checked="checked" value="Daily" class="remember-id">
                            <span style="position: absolute;left: 20%;">
                            <a href="javascript:;">记住账号</a>
                            </span>
                            <span style="position: absolute;right: 20%;">
                            <a href="javascript:;">忘记密码</a>
                            </span>
                        </div>
                        <div class="center-button">
                            <input type="button" class="button" id="sub" value="提交">
                        </div>
                        <div class="allother">
                            <div class="allother_way">
                                <span style="position: absolute;left: 12%; width: 50%;">
                                    其他登录方式
                                    <div class="picall">
                                        <i class="iconfont icon">&#xe715;</i>
                                        <i class="iconfont icon">&#xe699;</i>
                                        <i class="iconfont icon">&#xe71a;</i>
                                    </div>
                                </span>
                            </div>
                            <span style="position: absolute;right: 12%;">
                                <a href="javascript:;" style="text-decoration: none;">注册</a>
                            </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="/project/media/Public/js/jquery-3.3.1.min.js"></script>
    <script src="/project/media/Public/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $('#sub').click(function() {
            var username = $('#username').val();
            var password = $('#password').val();
            if(username != '' && password != ''){
                $.ajax({
                    type:"POST",
                    url:"<?php echo U('Home/Login/doLogin');?>",
                    data:{'username':username,'password':password},
                    success:function(data){
                        if(data.status == 1){
                            window.location.href = "<?php echo U('Home/Admin/index');?>";
                        }else{
                            alert(data.msg);
                        }
                    }
                });                
            }else{
                alert('请输入账号和密码')
            }
        });
    </script>

</body>

</html>