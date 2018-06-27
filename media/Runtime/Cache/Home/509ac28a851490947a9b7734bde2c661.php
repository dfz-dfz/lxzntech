<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
  <html>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
      <title>注册</title>
      <link rel="stylesheet" href="/project/media/Public/css/register.css">
      <script type="text/javascript" src="/project/media/Public/js/jquery.min.js"></script>
  </head>
  <body>
      <div class="all">
          <div class="header">
              <div class="logo"></div>
              <div class="login">已有账号<a href="">马上登陆</a></div>
          </div>
          <div class="main">
              <!-- 步骤 -->
              <div class="step">
                  <div class="stepm">
                      <div class="current">
                          1
                      </div>
                      <h5 class="current">
                          注册账号
                      </h5>
                  </div>
                  <div class="ellipsis current">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                  </div>
                  <div class="stepm">
                      <div>
                          2
                      </div>
                      <h5>
                          选择类型
                      </h5>
                  </div>
                  <div class="ellipsis">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                  </div>
                  <div class="stepm">
                      <div>
                          3
                      </div>
                      <h5>
                          登陆注册
                      </h5>
                  </div>
              </div>
              <!-- 注册类型 -->
              <div class="mold">
                  <div class="current"><span>手机注册</span></div>
                  <div><span>邮箱注册</span></div>
              </div>
              <!-- 信息 -->
              <div class="messages">
                  <div class="messagesSmall">
                      <div class="messagesText">手机账号</div>
                      <div class="input"><input type="text" name="" value="" onblur="checkMobile()" placeholder="" maxLength="15" class="accound" id="accound"></div>
                      <div class="messagesText"></div>
                      <div class="Text">请使用本人常用手机号码，验证后该手机号将作为登陆ID,一个手机号只能注册一个账号</div>
                  </div>
                  <div class="messagesSmall">
                      <div class="messagesText">验证码</div>
                      <div class="inputYzm"><input type="text" id="code" name="code"></div>
                      <div class="inputYzmXx"><input type="button" name="" value="点击获取验证码" onclick="sendCode(this)"></div>
                  </div>
                  <div class="messagesSmall">
                      <div class="messagesText">密码</div>
                      <div class="input"><input type="password" name="" value="" placeholder=""  maxLength="15" class="password" id="password"></div>
                  </div>
                  <div class="messagesSmall">
                      <div class="messagesText">确认密码</div>
                      <div class="input"><input type="password" name="" value="" placeholder=""  maxLength="15" class="nextpassword" id="nextpassword"></div>
                      <div class="messagesText"></div>
                      <div class="Text"><input type="checkbox" name="vehicle" value="Car" checked="checked" /><span>我同意并遵守<a href="">《章鱼先生开放平台服务协议》</a></span></div>
                  </div>
              </div>
          </div>
          <div class="footer">
              <bottom onclick="nextRegister()">
                立即注册
              </bottom>
          </div>
      </div>
  </body>
  <script type="text/javascript">
      var clock = '';
      var nums = 60;
      var btn;
      var code="";
      function sendCode(thisBtn)
      {
          var phone = $('#accound').val();
          if(!phone){
            alert('请输入手机号');return;
          }
          btn = thisBtn;
          btn.disabled = true; //将按钮置为不可点击
          btn.value = nums+'秒后可重新获取';
          clock = setInterval(doLoop, 1000); //一秒执行一次
          $.ajax({
            url:"http://www.lxzntech.com/api/sendSms.php",
            type:"post",
            data:{
              'phone':phone
            },
            success:function(data)
            {
              if(data.status == 1){
                alert('该号码已注册');
              }
            }
          });  
      }
      function doLoop()
      {
          nums--;
          if(nums > 0){
              btn.value = nums+'秒后可重新获取';
          }else{
              clearInterval(clock); //清除js定时器
              btn.disabled = false;
              btn.value = '点击发送验证码';
              nums = 60; //重置时间
          }
      }
      function checkMobile(){
        var phone = $('#accound').val();
        $.ajax({
          url:"<?php echo U('Home/Register/checkMobile');?>",
          type:"post",
          data:{
            'phone':phone
          },
          success:function(data)
          {
            if(data){
              alert('该号码已注册');
            }
          }
        });      
      }
    // 注册数据
      function nextRegister()
      {
          var accound = $('.accound').val();
          var code = $('#code').val();
          var password = $('.password').val();
          var nextpassword = $('.nextpassword').val();
          if(accound==''){
            alert('请输入账号');return;
          }else if(code==''){
            alert('请输入验证码');return;
          }else if(password==''){
            alert('请输入密码');return;
          }else if (nextpassword=='') {
            alert('请确认密码');return;
          }
          if(password != nextpassword){
            alert('两次输入的密码不一致');return;
          }
          $.ajax({
            url:"<?php echo U('Home/Register/doRegister');?>",
            type:"post",
            data:{
              'username':accound,'password':password,'code':code
            },
            success:function(data)
            {
              if(data.status == 1){
                window.location.href = "<?php echo U('Home/Register/chooseType');?>";
              }else{
                alert(data.msg)
              }
            }
          });
     }
  </script>
  </html>