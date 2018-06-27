<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>文章评论</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/project/media/Public/icon/iconfont.css">
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

  
 
/*................... */
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
        left: 20%;
    }

    /* 评论 */

    .comment_all {
        display: flex;
        justify-content: center;
        padding: 20px 25px 20px 25px;
        overflow: auto;
        height: 400px;
    }

    table {
        border: 1px solid #f1f1f1;
        width: 100%;
        table-layout: fixed;
        font-size: 12px;
        color: #666;
    }

    .time {
        background-color: #f7f9fb;
        height: 40px;
    }

    .number {
        width: 70%;
       
    }

    th {
        width: 30%;
        padding: 15px 10px 10px 10px;
        text-align: center;
            }

    td {
        text-align: center;
        padding: 16px 0 16px 0;
    }

    td>a {
        color: #52ade2;
        text-decoration: none;

    }

    td>a:hover {
        color: #0067a2;
    }

    .title {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
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
                <a href="<?php echo U('Home/Comment/newMsg');?>">最新评论</a>
                <a href="javascript:;" style="margin: 0 0 0 18%">文章评论</a>
                <span></span>
            </div>
            <div class="comment_all">
                <table id='tableTime'>
                    <!-- <tr class="time">
                        <th>时间</th>
                        <th >文章名称</th>
                        <th>评论总数</th>
                        <th>操作</th>
                    </tr>
                    <tr>
                        <td>2018-05-05</td>
                        <td class="title">灌灌灌灌灌过过过过灌灌灌灌灌过灌灌灌灌过</td>
                        <td>139</td>
                        <td>
                            <a href="javascript:;">查看详情</a>
                        </td>
                    </tr> -->
                </table>
            </div>
            <footer>
                <p style="font-size: 12px;color: #a8a8a8;text-align: center;padding-bottom: 10px;">已展示完所有文章</p>
            </footer>
        </div>
        </div>
      

    </div>
    <script src="/project/media/Public/js/jquery.min.js"></script>
    <script type="text/javascript">
        $(function(){
            CommentController();
        })
        function CommentController(){
            var html = '';
            $.ajax({
                url: "<?php echo U('Home/Comment/articleData');?>",
                type:'post',
                success:function(data){
                    if(data.status == 1){
                        html+='<tr class="time">';
                        html+='<th>时间</th>';
                        html+='<th >文章名称</th>';
                        html+='<th>评论总数</th>';
                        html+='<th>操作</th>';
                        html+='</tr>'
                        for(var i = 0;i<data.length;i++){
                            html+='<tr>';
                                html+='<td>'+data.i.dateline+'</td>';
                                html+='<td class="title">'+data.i.title+'</td>';
                                html+='<td>'+data.i.commentNum+'</td>';
                                html+='<td>';
                                    html+=' <a href="javascript:;">查看详情</a>';
                                html+='</td>';
                            html+='</tr>';
                        }
                    }else{
                        html = '<div style="text-align:center">暂无数据</div>';
                    }
                    
                $('#tableTime').html(html)
                }
            })
        }

        //首页
        $('.status').click(function() {
            window.location.href = "<?php echo U('Home/Admin/index');?>";
        });        
        //互动消息
        $('#message').click(function() {
            window.location.href = "<?php echo U('Home/Messages/fans');?>";
        });
        //粉丝量
        $('#fansnum').click(function() {
            window.location.href = "<?php echo U('Home/FansNumber/FansNumber');?>";
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
        //我的内容
        $('#accountset').click(function() {
            window.location.href = "<?php echo U('Home/Account/index');?>";
        });

    </script>
</body>

</html>