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
                      <div class="current">
                          2
                      </div>
                      <h5 class="current">
                          选择类型
                      </h5>
                  </div>
                  <div class="ellipsis" class="current">
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
                      <div class="current">
                          3
                      </div>
                      <h5 class="current">
                          登陆注册
                      </h5>
                  </div>
              </div>
              <!-- 注册类型 -->
              <div class="mold">
                  <div class="moldLeft"><span>基本信息</span></div>
              </div>
              <!-- 信息 -->
      <form action="<?php echo U('Home/Register/doInfo');?>" method="post" enctype="multipart/form-data" id="myform">
              <div class="messages">
                  <div class="messagesSmall">
                      <div class="messagesText">账号名称</div>
                      <div class="input"><input type="text" id="nickname" onblur="checkname(this.value)" name="nickname" maxlength="10"></div>
                      <div class="messagesText"></div>
                      <div class="Text">长度2-10字符，请勿使用含特殊符号，空格，详细规则查看<a href="<?php echo U('Home/Register/named');?>">《章鱼先生命名规范》</a></div>
                  </div>
                  <div class="messagesBig">
                      <div class="messagesText">账号简介</div>
                      <div class="input"><textarea rows="8" cols="80" name="introduce"></textarea></div>
                      <div class="messagesText"></div>
                      <div class="Text">描述请在10-120字，要求内容完整通顺，无特殊符号和企业信息</div>
                  </div>
                  <div class="messagesBig">
                      <div class="messagesText">媒体头像</div>
                      <div class="messageBigheader" id="messageBigheaderone">+</div>
                      <div class="messageBigup">
                          <div class="messageBtn">
                            <input type="file" class="upload-file" name="pic" id="upload-file"/ style="display:none;" onchange="previewone(this)">
                            <label for="upload-file">上传图片</label>
                          </div>
                          <div class="messageBigtext">要求清晰，健康，代表品牌形象请勿使用二维码，最大5M,建议大小200*200～500*500</div>
                      </div>
                  </div>
                  <div class="messagesSmall">
                      <div class="messagesText">媒体领域</div>
                      <div class="selection">
                        <select name="territory">
                          <?php if(is_array($territory)): foreach($territory as $key=>$v): ?><option value="<?php echo ($v['id']); ?>"><?php echo ($v['territory']); ?></option><?php endforeach; endif; ?>
                        </select>
                      </div>
                  </div>
              </div>
              <!-- 注册类型 -->
              <div class="mold">
                  <div class="moldLeft"><span>运营人员身份信息</span></div>
              </div>
              <!-- 信息 -->
              <div class="messages">
                  <div class="messagesSmall">
                      <div class="messagesText">联系人真实姓名</div>
                      <div class="input"><input type="text" name="linkman"></div>
                      <div class="messagesText"></div>
                      <div class="Text">注册成功后身份如需修改，请向平台提交相关资料申请，名字中如果包含分隔号‘.’,请完整输入</div>
                  </div>
                  <div class="messagesSmall">
                    <div class="messagesText">身份证号</div>
                    <div class="input"><input type="text" name="identity"></div>
                  </div>
                  <div class="messagesSmall">
                      <div class="messagesText">联系人电话</div>
                      <div class="inputYzm"><input type="text" name="linkphone" id="linkphone" onblur="checkMobile(this.value)"></div>
                      <div class="inputYzmXx"><input type="button" name="" value="点击获取验证码" onclick="sendCode(this)"></div>
                  </div>
                  <div class="messagesSmall">
                      <div class="messagesText">手机验证码</div>
                      <div class="input"><input type="text" name="code" id="code"></div>
                      <div class="messagesText"></div>
                  </div>
                  <div class="messagesSmall">
                      <div class="messagesText">联系人邮箱</div>
                      <div class="input"><input type="text" name="linkmail"></div>
                      <div class="messagesText"></div>
                      <div class="Text">请填写本人呢常用邮箱，此邮箱用来接受重要通知邮件</div>
                  </div>
              </div>
              <!-- 注册类型 -->
              <div class="mold">
                  <div class="moldLeft"><span>企业信息</span></div>
              </div>
              <!-- 信息 -->
              <div class="messages">
                  <div class="messagesSmall">
                      <div class="messagesText">机构名称</div>
                      <div class="input"><input type="text" name="company"></div>
                      <div class="messagesText"></div>
                      <div class="Text">请填写组织机构代码中的组织名称，注册成功后组织名称不可修改</div>
                  </div>
                  <div class="messagesSmall">
                      <div class="messagesText">机构地址</div>
                      <div class="input"><input type="text" name="address"></div>
                      <div class="messagesText"></div>
                      <div class="Text"></div>
                  </div>
                  <div class="messagesSmall">
                      <div class="messagesText">官方网站</div>
                      <div class="input"><input type="text" name="website"></div>
                      <div class="messagesText"></div>
                      <div class="Text"></div>
                  </div>
                  <div class="messagesBig">
                      <div class="messagesText">组织机构代码证</div>
                      <div class="messageBigheader" id="messageBigheadertwo">+</div>
                      <div class="messageBigup">
                          <div class="messageBtn">
                              <input type="file" class="upload" name="prove" id="upload"/ style="display:none;" onchange="previewtwo(this)">
                              <label for="upload">上传图像</label>
                          </div>
                          <div class="messageBigtext" style="line-height:25px;">请上传组织机构代码证原件或复印件（复印件必须加公章）扫描件，要求内容清晰可见，大小不能超过5m</div>
                      </div>
                  </div>
              </div>
        </form>
          </div>
          <div class="footer">
              <bottom style="background:#fff;color:#000;border:1px solid #000;height:46px;margin-right:30px;" onclick="backChoose()">
                上一步
              </bottom>
              <bottom onclick="submit();">
                提交
              </bottom>
          </div>
      </div>
      <div class="ImgBox"></div>
  </body>
  <script type="text/javascript">
    var clock = '';
    var nums = 60;
    var btn;
    var code="";
    function sendCode(thisBtn)
    {
      var phone=$("#phone").val();
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

    // function getCode(phone)
    // {
    //    $.ajax({
    //     url:""+phone,
    //     type:"post",
    //     async:false,
    //     success:function(data)
    //     {

    //     },
    //     error:function(){

    //     }
    //   });
    // }

  function previewone(file) {
      var prevDivone = document.getElementById('messageBigheaderone');
      if (file.files && file.files[0]) {
          var reader = new FileReader();
          reader.onload = function(evt) {
            prevDivone.innerHTML = '<img src="' + evt.target.result + '" />';
          }
          reader.readAsDataURL(file.files[0]);
      } else {
        prevDivone.innerHTML = '<div class="img" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src=\'' + file.value + '\'"></div>';
    }
  }

  function previewtwo(file) {
      var prevDiv = document.getElementById('messageBigheadertwo');
      if (file.files && file.files[0]) {
          var reader = new FileReader();
          reader.onload = function(evt) {
            prevDiv.innerHTML = '<img src="' + evt.target.result + '" />';
          }
          reader.readAsDataURL(file.files[0]);
      } else {
        prevDiv.innerHTML = '<div class="img" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src=\'' + file.value + '\'"></div>';
    }
  }

  function submit(){
    var res = checkCode();
    var nickname = $('#nickname').val();
    var have = checkname(nickname);
    var prove = $('#upload').val();
    if(!prove){
      alert('请上传组织机构代码证');
      return;
    }

    // alert(have);
    if(!res){
      return;
    }
    if(!have){
      return;
    }
    $('#myform').submit();
  }
  function backChoose(){
    window.location.href = "<?php echo U('Home/Register/chooseType');?>";
  }

  function checkname(str) {
    var reg=/^[A-Za-z0-9\u4e00-\u9fa5]+$/;   /*定义验证表达式*/
    var sta = 0;
    /*进行验证*/
    if(!reg.test(str)){
      alert('请勿使用含特殊符号，空格');
      $('#nickname').val('');return;
    }
    $.ajax({
        type:"POST",
        url:"<?php echo U('Home/register/checkname');?>",
        data:{'name':str},
        async:false,
        success:function(data){
            if(data.status == 1){
              alert('该用户名已存在');
            }else{
              sta = 1;
            }
        }
    });   
    return sta;    
  }

  function checkMobile(phone){
    if(!(/^1[3|5|7|8][0-9]\d{4,8}$/.test(phone))){
      alert("请输入正确的手机号码");
      return false;
    }
  }

  function checkCode(){
    var codes = $('#code').val();
    var phoneNum = $('#linkphone').val();
    var status = 0;
    if(!phoneNum){
      alert('请输入手机号');return;
    }
    if(!codes){
      alert('请输入验证码');return;
    }
    $.ajax({
      url:"<?php echo U('Home/register/checkCode');?>",
      type:"post",
      async:false,
      data:{
        'phone':phoneNum,'code':codes
      },
      success:function(data)
      {
        if(data==0){
          alert('验证失败');
        }else if(data==2){
          alert('验证码已失效');
        }else if(data==3){
          alert('验证码已使用');
        }else{
          status = 1;
        }
      }
    });
    return status;
  }
  </script>
  </html>