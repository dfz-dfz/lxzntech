<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>我的素材</title>
    <link rel="stylesheet" type="text/css" href="/project/media/Public/icon/iconfont.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/project/media/Public/css/layui.css" media="all">
    <link rel="stylesheet" href="/project/media/Public/css/laydate.css" media="all">
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
    .icon {
       font-family: "iconfont" !important;
        font-style: normal;
        color: #52ade2;
       font-size: 20px;
    }

    .icon-bianji {
        position: absolute;
        right: 5%;
        color: #707070;
    }
   .icon-house {
        font-family: "iconfont" !important;
        color: #a6a8ad;
        font-size: 24px;
        left: 40px;
        line-height: 50px;
        top: 0;
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
        right: -40%;
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


    /* 右侧素材分类版心部分*/

    .content {
        width: 870px;
        border: 1px solid #eee;
        border-top-color: #fff;
        background-color: #fff;
        display: inline-block;
        vertical-align: top;
        margin-left: 24px;
        margin-bottom: 30px;
    }

    .content .content_all {
        height: 65px;
        border-bottom: 1px solid #eee;
        position: relative;
        padding-left: 20px;
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


    .content_condition {
        position: relative;
    }

    .content_condition .condition_all {
        display: flex;
        padding: 20px 0 20px 20px;
        position: relative;
        align-items: center;
    }

    .content_condition .condition_all p{
        margin: 0;
    }

    .content_condition .condition_all>p,
    .content_condition .condition_all div>a {
        font-size: 16px;
        color: #5e5e5e;
        text-decoration: none;
    }

    .content_condition .condition_all .imgsc {
        margin: 0 28px 0 15px;
    }

    .content_condition .condition_all div .all {
        width: 70px;
        height: 25px;
        border-radius: 5px;
        background-color: #3db9ac;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .content_condition .condition_delete div .alldelete {
        width: 70px;
        height: 25px;
        border-radius: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px solid #3cb9ac;
    }

    .content_condition .condition_delete {
        display: flex;
        flex-wrap: nowrap;
        position: absolute;
        right: 0;
        top: 20px;
    }

    .content_condition .condition_delete div {
        margin-right: 14px;
    }

    .content_condition .condition_delete div>a {
        text-decoration: none;
        font-size: 14px;
        color: #3cb9ac;
    }

    input[type=file]{
        display: block;
        position: absolute;
        right: 164px;
        width: 164px;
    }

    /*  图片部分 */
    .modify {
        display: flex;
        flex-wrap: wrap;
        padding: 10px 0 20px 0;

    }

    .modify .modify_all {
        width: 196px;
        height: 196px;
        border: 1px solid #e1e1e1;
        border-top-color: #fff;
        margin: 15px 9px;
    }

    .modify .modify_img img {
        width: 196px;
        height: 126px;
    }

    .modify .modify_all p {
        font-size: 14px;
        color: #999;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
        height: 42px;
        line-height: 42px;
    }

    .modify_all .modifymenu {
        border-top: 1px solid #e1e1e1;
        position: relative;
    }

    .modify .modify_world {
        border-top: 1px solid;
    }

    .modify_all .modifymenu div>a {
        line-height: 45px;
    }

    .modify_all .modifymenu>span {
        height: 20px;
        border-right: 1px solid #e1e1e1;
        position: absolute;
        left: 50%;
        top: 3px;
    }

    .icon-add {
        color: #7f7f7f;
        position: absolute;
        left: 40px;
        top: -4px;
        font-size: 18px;
        line-height: 34px;
    }
    .icon-replace {
        color: #7f7f7f;
        position: absolute;
        right: 40px;
        top: -4px;
        font-size: 16px;
        line-height: 34px;
    }

    /* 跳转页面部分 */

    .pageall {
        height: 60px;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .pageall>span {
        font-size: 18px;
        color: #545454;
        position: absolute;
        left: 62%;
    }

    .pageall .choose_page {
        width: 25px;
        height: 30px;
        border: 1px solid #ebebeb;
        border-radius: 10px;
        position: absolute;
        right: 28%;
    }

    .pageall .choose_page a>i {
        border-right: 1px solid #545454;
        border-top: 1px solid #545454;
        width: 14px;
        height: 14px;
        position: absolute;
        transform: rotate(45deg);
        top: 8px;
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
        <div class="content">
            <div class="content_all">
                <a href="javascript:;">我的素材</a>
                <span></span>
            </div>
          <!-- 素材分类 -->
            <div class="content_condition">
                <!-- 素材部分 -->
                <div class="condition_all">
                    <p>分类 :</p>
                    <div class="imgsc">
                        <a href="javascript:;" class="all">图片素材</a>
                    </div>
                    <div>
                        <a href="javascript:;">视频素材</a>
                    </div>
                </div>
               <!-- 选择文件删除部分 -->
                <div class="condition_delete">
                    <div class="listpicture">
                        <form action="<?php echo U('Home/Attachment/uploadImage');?>" method="post" enctype="multipart/form-data" >
                            <input type="file" name="pic">
                            <input type="submit" name="sub" value="提交">
                        </form>
                        <!-- <a href="javascript:;" class="all">上传图片</a> -->
                    </div>

                    <div>
                        <a href="javascript:;" class="alldelete">批量删除</a>
                    </div>
                </div>
            </div>
            <!-- 图片部分 -->
            <div class="modify">
            	<?php if(is_array($data)): foreach($data as $key=>$v): ?><div class="modify_all">
                        <div class="modify_img">
                            <img src="<?php echo ($v['url']); ?>">
                        </div>
                        <p><?php echo ($v['filename']); ?></p>
                        <div class="modifymenu">
                            <div>
                                <a href="javascript:;">
                                    <i class="iconfont icon-add">&#xe76a;</i>
                                </a>
                            </div>
                            <span class="span"></span>
                            <div>
                                <a href="javascript:;" onclick="delete_confirm(<?php echo ($v['id']); ?>)">
                                    <i class="iconfont icon-replace">&#xe61b;</i>
                                </a>
                            </div>
                        </div>
                    </div><?php endforeach; endif; ?>
            </div>
            <!-- 跳转页面 -->
            <?php if($totalPage > 0): ?><div class="pageall">
                <?php if($nowpage != 1): ?><div class="choose_page" style="left: 56%;right: 0;">
                        <a href='<?php echo U("home/attachment/index/p/$before");?>'>
                            <i style="transform: rotate(-135deg);margin-left:10px;"></i>
                        </a>
                    </div><?php endif; ?>
                <span><?php echo ($nowpage); ?>&nbsp;/&nbsp;<?php echo ($totalPage); ?></span>
                <?php if($nowpage != $totalPage): ?><div class="choose_page">
                        <a href='<?php echo U("home/attachment/index/p/$next");?>'>
                            <i></i>
                        </a>
                    </div><?php endif; ?>
                <div class="pageall_number">
                    <span>到第 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="text" id="gopage" class="search-page" maxlength="4"> 页
                    </span>
                </div>
                <div class="allright">
                    <a href="javascript:;" onclick="gopage()">确定</a>
                </div>
            </div><?php endif; ?>
        </div>
    </div>
</div>
    <script src="/project/media/Public/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
        //删除提示框
        function delete_confirm(id) {
            if(window.confirm('确定删除？')){
                $.ajax({
                url: '<?php echo U("Home/Attachment/delImage");?>',
                type: 'POST',
                data: {
                    'id':id
                },
                success: function (ret) {
                    if(ret.status == 1){
                        alert(ret.msg);
                        window.location.reload();
                    }else{
                        alert(ret.msg);
                    }
                }
            })
            }else{
                return false;
            }
        }

        function gopage(){
            var go = $('#gopage').val();
            window.location.href='<?php echo U("home/attachment/index/p/'+go+'");?>';
        }

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