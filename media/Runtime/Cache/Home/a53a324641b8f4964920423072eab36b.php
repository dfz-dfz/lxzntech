<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>首页</title>
    <link rel="stylesheet" type="text/css" href="/project/media/Public/icon/iconfont.css">
    <link rel="stylesheet" href="/project/media/Public/css/layui.css" media="all">
    <link rel="stylesheet" href="/project/media/Public/css/laydate.css" media="all">
    <link rel="stylesheet" href="/project/media/Public/css/public.css">
</head>
<style>
    * {
        padding: 0;
        margin: 0;
    }

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
        color: #111;

    }

    .iconfont-read {
        font-family: "iconfont" !important;
        font-style: normal;
        color: #111;
        font-size: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 44px;
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

    .header .top_first .lxznlogo {
        font-size: 60px;
        padding: 0 10px;
    }

    .header .top_first .lxzntt {
        font-size: 24px;
    }

    .header .top_first .top_main {
        display: inline-flex;
        padding: 0 50px 0 640px;
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
        cursor: default;
    }

    .header .top_first  .triangle-down  {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-left: 26px;
        color: #363636;
    }
    .header .top_first  .triangle-down >a:hover{
        color: #3cb9ac;
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


    /* 右侧版心部分 */

    .content {
        width: 870px;
        display: inline-block;
        margin-left: 24px;
    }

    /* 发布统计部分 */

    .content .content_all {
        height: 157px;
        border: 1px solid #eee;
        display: flex;
        flex-wrap: nowrap;
        align-items: center;
        justify-content: center;
        background-color: #fff;
    }

    .content .content_all p {
        width: 33.3%;
        text-align: center;
    }

    .content .content_all p>span {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 44px;
        font-size: 30px;

    }

    .content .content_all p>a {
        font-size: 18px;
        color: #232323;
        text-decoration: none;
    }

    .content .content_all div {
        height: 72px;
        width: 1px;
        background-color: #eee;
    }


    /* 公告部分 */

    .all {
        margin-top: 20px;
        border: 1px solid #eee;
        background-color: #fff;
    }

    .allinformation .allinformation_number>i {
        width: 4px;
        height: 25px;
        background-color: #3cb9ac;
    }

    .allinformation .allinformation_number {
        padding: 18px 0 0 20px;
        font-size: 20px;
        color: #232323;
        position: relative;
        background-color: #fff;
        display: flex;
        align-items: center;
    }

    .allinformation .allinformation_number p {
        margin-left: 10px;
    }

    /* 活动部分 */

    .activity {
        height: 48px;
        line-height: 48px;
        font-size: 14px;
        color: #808080;
        margin-left: 20px;
        position: relative;
        border-bottom: 1px solid #ebebeb;
        background-color: #fff;
    }

    .activity>i {
        border-radius: 50%;
        width: 5px;
        height: 5px;
        background-color: #111;
        position: absolute;
        top: 22px;
    }

    .activity>a {
        text-decoration: none;
        color: #545454;
        padding-left: 15px;
    }

    .activity>a:hover {
        color: #3cb9ac;
    }

    .activity .time {
        font-size: 10px;
        color: #a9a8a8;
        position: absolute;
        right: 20px;
        top: 0;
    }

    /* 跳转页面 */

    .pageall {
        height: 60px;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #fff;
    }

    .pageall>span {
        font-size: 18px;
        color: #545454;
        position: absolute;
        left: 62%;
    }

    .pageall .choose_page {
        width: 20px;
        height: 30px;
        border: 1px solid #ebebeb;
        border-radius: 5px;
        position: absolute;
        right: 30%;
    }

    .pageall .choose_page a>i {
        border-right: 1px solid #545454;
        border-top: 1px solid #545454;
        width: 10px;
        height: 10px;
        position: absolute;
        transform: rotate(45deg);
        top: 10px;
    }

    .pageall .pageall_number {
        font-size: 14px;
        color: #545454;
        position: absolute;
        right: 15%;
    }

    .pageall .pageall_number .search-page {
        width: 25px;
        height: 30px;
        border: 1px solid #ebebeb;
        border-radius: 10px;
        position: absolute;
        right: 27%;
        top: -5px;
        text-align: center;
    }

    .pageall .allright {
        width: 46px;
        height: 28px;
        border: 1px solid #ebebeb;
        position: absolute;
        right: 20px;
        border-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .pageall .allright>a {
        text-decoration: none;
        font-size: 14px;
        color: #545454;
    }
</style>

<body>
        <!-- 头部 -->
        <?php echo W('Cate/header');?>
        <!-- 左侧导航栏 -->

    <div class="firstpage">
        <div class="container">
            <?php echo W('Cate/nav');?>
            <!-- 右侧版心部分 -->
            <div class="content" id="content">
                <!-- 发布统计部分 -->
                <div class="content_all">
                    <p id="edit">
                        <i class="iconfont-read">&#xe60e;</i>
                        <br>
                        <a href="javascript:;">写文章</a>
                    </p>
                    <div></div>
                    <p>
                        <span style="color: #3cb9ac;"><?php echo ($viewnum); ?></span>
                        <br>
                        <a href="javascript:;">阅读量</a>
                    </p>
                    <div></div>
                    <p>
                        <span style="color: #3e83ba;"><?php echo ($fansnum); ?></span>
                        <br>
                        <a href="javascript:;" id="fansnum">粉丝量</a>
                    </p>
                </div>

                <!-- 公告部分 -->
                <div class="all">
                    <div class="allinformation">
                        <div class="allinformation_number">
                            <i></i>
                            <p>公告</p>
                        </div>
                    </div>
                    <!-- 活动部分 -->
                    <div class="activityall">
                        <div class="activity">
                            <i></i>
                            <a href="javascript:;">[活动]高仿假肉流入国外市场，外国人还纷纷排队抢</a>
                            <div class="time">2018-08-04</div>
                        </div>
                        <div class="activity">
                            <i></i>
                            <a href="javascript:;">[活动]高仿假肉流入国外市场，外国人还纷纷排队抢</a>
                            <div class="time">2018-08-04</div>
                        </div>

                    </div>

                    <!-- 跳转页面 -->
                    <div class="pageall">
                        <span>1&nbsp;/&nbsp;2</span>
                        <div class="choose_page">
                            <a href="javascript:;">
                                <i></i>
                            </a>
                        </div>
                        <div class="pageall_number">
                            <span>到第 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                <input type="text" class="search-page" maxlength="4"> 页
                            </span>
                        </div>
                        <div class="allright">
                            <a href="javascript:;">确定</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="/project/media/Public/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
        //首页
        $('.status').click(function() {
            window.location.href = "<?php echo U('Home/Admin/index');?>";
        });
        //互动消息
        $('#message').click(function() {
            window.location.href = "<?php echo U('Home/Messages/fans');?>";
        });
        //粉丝量统计
        $('#fansnumcount').click(function() {
            window.location.href = "<?php echo U('Home/fans/index');?>";
        });
        //图文统计
        $('#totalsingle').click(function() {
            window.location.href = "<?php echo U('Home/Count/single');?>";
        });
        //我的素材
        $('#attachment').click(function() {
            window.location.href = "<?php echo U('Home/Attachment/index');?>";
        });
        //写文章
        $('#edit').click(function() {
            window.location.href = "<?php echo U('Home/Main/edit');?>";
        });
        //我的内容
        $('#content').click(function() {
            window.location.href = "<?php echo U('Home/Main/main');?>";
        });
        //账号设置
        $('#accountset').click(function() {
            window.location.href = "<?php echo U('Home/Account/index');?>";
        });
        //评论管理
        $('#comment').click(function() {
           window.location.href = "<?php echo U('Home/comment/newmsg');?>";
        });
    </script>
</body>

</html>