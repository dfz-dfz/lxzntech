<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>申请修改</title>
    <link rel="stylesheet" type="text/css" href="/project/media/Public/icon/iconfont.css">
    <link rel="stylesheet" href="/project/media/Public/css/layui.css" media="all">
    <link rel="stylesheet" href="/project/media/Public/css/laydate.css" media="all">
    <!-- <link href="/project/media/Public/css/bootstrap.min.css" rel="stylesheet"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/project/media/Public/css/public.css" media="all">
</head>
<style>
    body,
    html {
        background-color: #f7f9fb;
        min-width: 1375px;
    }


    ul li {
        list-style-type: none;
    }

    i {
        font-style: normal;
    }

    .icon-house {
        font-family: "iconfont" !important;
        color: #a6a8ad;
        font-size: 24px;
        left: 40px;
        line-height: 50px;
        top: 0;
    }

    .icon {
        font-family: "iconfont" !important;
        font-style: normal;
        color: #52ade2;
        font-size: 20px;
    }

    /* 头部 */
    .header {
        width: 100%;
        height: 72px;
        border-bottom: 1px solid #e9e9e9;
    }

    .header .top_first {
        width: 1100px;
        height: 70px;
        background-color: #fff;
        margin-left: 20%;
        display: inline-flex;
        align-items: center;
        border-bottom: 4px solid #3cb9ac;
    }

    .header .top_first .lxznlogo{
        font-size: 60px;
        padding: 0 10px;
    }

    .header .top_first .lxzntt {
        font-size: 24px;
    }

    .header .top_first .top_main {
        display: inline-flex;
        padding: 0 50px 0 686px;
        position: relative;
    }

    .header .top_first .top_main .information_num {
        width: 18px;
        height: 18px;
        background-color: #fc6f53;
        border-radius: 50%;
        position: absolute;
        right: 43px;
        top: -5px;
        text-align: center;
        color: #fff;
    }

    .header .top_first .sculpture {
        display: inline-flex;
        border-radius: 50%;
        width: 44px;
        height: 44px;
        border: 1px solid #dcdcdc;
        justify-content: center;
        align-items: center;
        margin-right: 16px;
    }

    .header .top_first .sculpture i {
        font-size: 28px;
    }

    .header .top_first .share .sharett {
        text-align: center;
        border-radius: 10px;
        border: 1px solid #143371;
        color: #143371;
        margin-top: 10px;
    }

    .header .top_first .share {
        position: relative;
    }

    .header .top_first .share a {
        font-size: 16px;
        color: #666;
        text-decoration: none;
    }

    .header .top_first .share .triangle-down {
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 10px solid #999;
        position: absolute;
        right: -50%;
        top: 22px;
    }



    /* 左侧导航栏 */
    .container {
        padding-left: 20%;
        margin-top: 1px;
    }

    .container .container_left {
        width: 200px;
        display: inline-block;
        vertical-align: top;
    }

    .container .container_left ul {
        background-color: #32363f;
    }

    .container .container_left ul li {
        padding: 6px 0 6px 37px;
        border-top: 2px solid #3b404c;
        border-bottom: 2px solid #2b2e37;
    }

    .container .container_left ul li>a {
        color: #a6a8ad;
        display: inline-block;
        width: 100%;
        font-size: 18px;
        text-decoration: none;
    }

    .container .container_left .firstpage:hover {
        color: #3db9ac;
    }

    .container_left .menu {
        padding-left: 45px;
    }

    .container_left .menu a {
        display: flex;
        padding: 10px 0;
        color: #f7f9ff;
        font-size: 14px;
        text-decoration: none;
    }

    .container_left .menu a:hover {
        color: #3cb9ac;
    }

    .container .container_left li span {
        margin-left: 10px;
    }



    /* 申请修改部分 */

    .content {
        width: 870px;
        border: 1px solid #e1e1e1;
        background-color: #fff;
        display: inline-block;
        vertical-align: top;
        margin-left: 24px;
        border-top-color: #fff;
        margin-bottom: 30px;
    }

    .content .content_all {
        height: 65px;
        border-bottom: 1px solid #eee;
        position: relative;
        padding-left: 15px;
    }

    .content .content_all>a {
        position: absolute;
        bottom: 2px;
        font-size: 18px;
        color: #232323;
        text-decoration: none;
    }

    .content .content_all>span {
        width: 73px;
        height: 3px;
        background-color: #3db9ac;
        position: absolute;
        bottom: 0;
    }

    .replaceall {
        display: flex;
        align-items: center;
        padding: 15px 0 0px 15px;
        font-size: 12px;
        color: #232323;
    }

    /* 公告部分 */

    .main {
        padding: 10px 0 20px 0;
    }

    .allinformation {
        margin-left: 10px;
        padding-left: 15px;
    }

    .allinformation .allinformation_number>i {
        width: 3px;
        height: 14px;
        background-color: #3cb9ac;
        position: absolute;
        top: 18px;
    }

    .allinformation .allinformation_number {
        line-height: 58px;
        height: 58px;
        font-size: 14px;
        color: #141414;
        position: relative;
        background-color: #fff;
        display: flex;
        align-items: center;
        border-bottom: 1px solid #e1e1e1;
    }

    .allinformation .allinformation_number p {
        margin-left: 10px;
    }

    .allinformation .truename {
        border-bottom: 1px solid #e1e1e1;
        font-size: 14px;
        color: #232323;
        height: 58px;
        line-height: 58px;
    }

    .allinformation .truename p>span {
        display: inline-block;
        width: 30%;
    }
    .truename input{
      width: 200px;
      height: 25px;
      font-size: 14px;
    }
    /* 上传部分 */
    /* 上传部分 */

    .uploaddata {
        height: 130px;
        border-bottom: 1px solid #e1e1e1;
        padding: 15px 0 15px 25px;
        font-size: 14px;
        color: #232323;
        line-height: 14px;
        position: relative;
        display: flex;
        align-items: center;
    }
    .uploaddata .smallheaderscupture{
        margin-top: -100px;
    }
    .submit {
        width: 80px;
        height: 34px;
        background-color: #3cb9ac;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 5px;
        color: #fff;
        cursor: pointer;
    }

    .uploaddata .headerscupture .logo {
        width: 140px;
        margin-top: -15px;
    }
    .uploaddata .headerscupture .logo img{
        width: 140px;
        height: 100px;

    }
     .addform{
      width: 76px;
      height: 34px;
      background-color: #3db9ac;
      border-radius: 10px;
     }
     .addform >span{
         display: flex;
         justify-content: center;
         line-height: 34px;
         font-size: 14px;
         color: #fff;
     }
    .uploaddata input {
        padding-left: 10px;
        width: 76px;
        height: 34px;
        font-size: 16px;
        position: absolute;
        right: 31%;
       bottom: 36%;
       opacity: 0;
    }
    /* .uploaddata input .addphoto{
        color: #fff;
    } */

    .uploaddata > span{
       display:inline-block;
       width: 30%;
    }

</style>

<body>
    <!-- 头部 -->
    <?php echo W('Cate/header');?>
    <div class="firstpage">
        <!-- 左侧导航栏 -->
        <div class="container">
            <?php echo W('Cate/nav');?>
            <div class="content">
                <!-- 申请修改部分 -->
                <div class="content_all">
                    <a href="javascript:;">修改信息</a>
                    <span></span>
                </div>
                <p class="replaceall">
                    <i class="iconfont icon">&#xe60e;</i>
                    <span style="margin-left: 15px;"> 企业信息15天内只能修改一次</span>
                </p>
                <!-- 公告部分 -->
                <div class="main">
                    <div class="allinformation">
                        <div class="allinformation_number">
                            <i></i>
                            <p>
                                <strong>企业信息</strong>
                            </p>
                        </div>
                        <div class="truename">
                            <p>
                                <span>企业机构信息</span>
                                <input type="text" id="company" value="<?php echo ($res['company']); ?>">
                                <span></span>
                            </p>
                        </div>
                        <div class="truename">
                            <p>
                                <span>企业地址</span>
                                <input type="text" id="address" value="<?php echo ($res['address']); ?>">
                                <span></span>
                            </p>
                        </div>
                        <div class="truename">
                            <p>
                                <span>官方网站</span>
                                <input type="text" id="website" value="<?php echo ($res['website']); ?>">
                                <span></span>
                            </p>
                        </div>
                    </div>
                    <footer class="footer" style="display: flex;justify-content: center;padding: 60px 0 30px 0;">
                        <div class="submit" onclick="apply()">提交</div>
                    </footer>
                </div>

            </div>


        </div>

    </div>




    <script src="/project/media/Public/js/jquery-3.3.1.min.js"></script>
    <script src="/project/media/Public/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function apply() {
            var company = $('#company').val();
            var address = $('#address').val();
            var website = $('#website').val();
            $.ajax({
                url: '<?php echo U("Home/Account/editcompany");?>',
                type: 'POST',
                data: {
                    'company': company,
                    'address': address,
                    'website': website
                },
                success: function (ret) {
                    if(ret == 1){
                        alert('修改成功');
                        window.location.href='<?php echo U("Home/Account/index");?>';
                    }else{
                        alert('修改失败');
                    }
                }
            })
        }
        //互动消息
        // $('.firstpage').click(function (event) {
        //     window.location.href = "<?php echo U('Home/Admin/index');?>";
        // });
        $('#message').click(function () {
            window.location.href = "<?php echo U('Home/Messages/fans');?>";
        });
        //粉丝量
        $('#fansnum').click(function () {
            window.location.href = "<?php echo U('Home/FansNumber/FansNumber');?>";
        });
        //粉丝量统计
        $('#fansnumcount').click(function () {
            window.location.href = "<?php echo U('Home/fans/index');?>";
        });
        //图文统计
        $('#totalsingle').click(function () {
            window.location.href = "<?php echo U('Home/Count/single');?>";
        });
        //我的素材
        $('#attachment').click(function () {
            window.location.href = "<?php echo U('Home/Attachment/index');?>";
        });
        //写文章
        $('#edit').click(function () {
            window.location.href = "<?php echo U('Home/Main/edit');?>";
        });
        //我的内容
        $('#content').click(function () {
            window.location.href = "<?php echo U('Home/Main/main');?>";
        });
        //我的内容
        $('#accountset').click(function () {
            window.location.href = "<?php echo U('Home/Account/index');?>";
        });
    </script>
</body>

</html>