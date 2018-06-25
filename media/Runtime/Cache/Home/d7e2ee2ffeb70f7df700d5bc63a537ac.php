<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>最新评论</title>
    <link rel="stylesheet" type="text/css" href="/project/media/Public/icon/iconfont.css">
    <link rel="stylesheet" href="/project/media/Public/css/layui.css" media="all">
    <link rel="stylesheet" href="/project/media/Public/css/laydate.css" media="all">
    <link rel="stylesheet" href="/project/media/Public/css/public.css">
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

    .icon-bianji {
        position: absolute;
        right: 5%;
        color: #707070;
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



/*................*/
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
        padding-left: 15px;
        display: flex;
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

    /* 评论部分 */
    .contentitem {
        padding: 5px 0 10px 0;
        overflow: auto;
    }
    .contentitem .usercomment {
        padding: 20px 0px 16px 25px;
        border-bottom: 1px solid #e1e1e1;
        position: relative;
    }

  .usercomment img {
        width: 40px;
        height: 40px;
        margin-right: 15px;
        border-radius: 50%;
        vertical-align: top;
        margin-top: 18px;
    }

    .usercomment  .commentcontent {
        display: inline-block;
        width: 90%;
        position: relative;
    }

   .usercomment  .commentcontent span {
        color: #232323;
        font-size: 12px;
    }

    .usercomment  .commentcontent>p {
        margin-top: 10px;
        margin-bottom: 6px;
        color: #232323;
        font-size: 14px;
        width: 100%;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }

    .usercomment .commentcontent i {
        font-size: 12px;
        color: #999;
    }

   .usercomment .commentcontent a {
        color: #52ade2;
        font-size: 12px;
        text-decoration: none;
    }

    /* 点赞回复部分 */

    .usercomment .list .li {
        display: flex;
        flex-wrap: nowrap;
        position: absolute;
        right: 0;
        top: 70%;
        align-items: center;
        justify-content: center;

    }

    .usercomment .list .talknum {
        margin: 0 15px 0 4px;
    }

   .usercomment .commentcontent .icon {
        font-family: "iconfont" !important;
        font-style: normal;
        color: #52ade2;
        font-size: 20px;
    }

    /* 文本回复部分 */
     .box{
        display: none;

    }

    .main {
        padding: 18px 0 18px 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #textarea {
        padding: 10px;
        border: 1px solid #dcdcdc;
        font-size: 14px;
        color: #bdbdbd;
        border-radius: 5px;
        outline: none;
        resize: none;
    }

    .reply {
        display: flex;
        flex-wrap: nowrap;
        position: relative;
        padding: 0 0 16px 0;
    }

    .reply>span {
        position: absolute;
        right: 20%;
        font-size: 14px;
        color: #a8a8a8;
    }

    .reply .reply_answer {
        position: absolute;
        right: 8%;
        width: 70px;
        height: 30px;
        background-color: #3db9ac;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        top: -8px;
    }

    .reply .reply_answer>a {
        color: #fff;
        font-size: 14px;
        text-decoration: none;
    }
/* 展示所有评论 */
    #footer p {
        font-size: 12px;
        color: #a8a8a8;
        text-align: center;
        padding: 8px 0 10px 0;
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
            <!-- 最新评论 -->
            <div class="content_all">
                <a href="javascript:;" >最新评论</a>
                <a href="<?php echo U('Home/Comment/article');?>" style="margin: 0 0 0 18%">文章评论</a>
                <span></span>
            </div>
            <!-- 评论部分 -->
            <div class="contentitem">
            <?php if($data): if(is_array($data)): foreach($data as $key=>$v): ?><div class="usercomment">
                    <img src="<?php echo ($v['avatar']); ?>" alt="">
                    <div class="commentcontent">
                        <span><?php echo ($v['username']); ?></span>
                        <i>&nbsp;评论了</i> &nbsp;[&nbsp;
                        <a href="<?php echo ($v['url']); ?>"><?php echo ($v['title']); ?></a> &nbsp;]
                        <p><?php echo ($v['msg']); ?></p>
                        <i><?php echo ($v['dateline']); ?></i>
                        <!-- 点赞回复部分 -->
                        <div class="list">
                            <div class="li">
                                <a href="javascript:;">
                                    <i class=" iconfont icon">&#xe61a;</i>
                                </a>
                                <a href="javascript:;">
                                    <div class="talknum">回复<?php echo ($v['commentNum']); ?></div>
                                </a>
                                <a href="javascript:;">
                                    <i class="iconfont icon">&#xe63b;</i>
                                </a>
                                <a href="javascript:;">
                                    <div class="talknum">点赞<?php echo ($v['likeNum']); ?></div>
                                </a>
                                <a href="javascript:;">
                                    <i class="iconfont icon">&#xe684;</i>
                                </a>
                                <a href="javascript:;">
                                    <div class="talknum">置顶</div>
                                </a>
                                <a href="javascript:;">
                                    <div class="talkdel">删除</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="main">
                            <textarea name="textarea" id="textarea<?php echo ($v['cid']); ?>" cols="80" rows="5" placeholder="回复评论" maxlength="200 " onkeyup="this.value=this.value.substring(0, 100)" ></textarea>

                        </div>
                        <div class="reply">
                            <span  id="text-count" value="" >0&nbsp;/&nbsp;500</span>
                            <div class="reply_answer">
                                <a href="javascript:;" onclick="sent(<?php echo ($v['aid']); ?>,<?php echo ($v['cid']); ?>)">回复</a>
                            </div>
                        </div>
                    </div>
                    <div id="answer<?php echo ($v['cid']); ?>"></div>
                </div><?php endforeach; endif; ?>
            <?php else: ?>
                <div style="text-align: center;">暂无数据</div><?php endif; ?>
            </div>

            <!-- 展示所有评论 -->
            <footer id="footer">
                <p>已展示完所有评论</p>
            </footer>
        </div>
        </div>

    </div>


    <script src="/project/media/Public/js/jquery.min.js"></script>
    <!-- <script src="/project/media/Public/js/jquery.min.js/bootstrap.min.js"></script> -->
    <script type="text/javascript">

    // 回复可显示字数
          window.onload = function () {
            document.getElementById('textarea').onkeyup = function () {
                document.getElementById('text-count').innerHTML = this.value.length;
            }
        }

        $('.talknum').click(function(){
            $(this).parents('.commentcontent').siblings('.box').toggle()
        })

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
        // 点击数据提价评论
        function sent(aid,cid){
          var html = '';
          var textareaText = $('#textarea'+cid).val();
          if(textareaText==''){
            alert('请输入你要评论的内容')
          }else{
            $.ajax({
              url: "<?php echo U('Home/Comment/comment');?>",
              type:"post",
              data:{
                'aid':aid,'cid':cid,'content':textareaText
              },
               success: function(){
                    html+='<div style="padding:20px 0 20px 60px;background:#f7f7f7;">';
                      html+='<div style="line-height:30px;">name</div>';
                      html+='<div style="line-height:30px;">'+textareaText+'</div>';
                    html+='</div>';
                    $('#answer'+cid).html(html);
               }
            })
          }
        }
    </script>
</body>

</html>