<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>写文章</title>
    <link rel="stylesheet" type="text/css" href="/project/media/Public/icon/iconfont.css">
    <link rel="stylesheet" href="/project/media/Public/css/trumbowyg.css">
    <link rel="stylesheet" href="/project/media/Public/css/layui.css" media="all">
    <link rel="stylesheet" href="/project/media/Public/css/laydate.css" media="all">
    <link rel="stylesheet" href="/project/media/Public/css/public.css">
    <link rel="stylesheet" href="/project/media/Public/css/bootstrap.min.css">
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
        height: 73px;
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
        margin-top: 0;
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

    /* 文本编辑器 */

    .editall {

    }

    #odiv {
        display: none;
        position: absolute;
        z-index: 100;
        top: 10px;
        left: 20px
    }

    .editall .editor {
        clear: both;
        overflow: auto;
        height: 500px;
    }

   

    /* 写文章部分 */

    .content {
        width: 870px;
        border: 1px solid #eee;
        background-color: #fff;
        display: inline-block;
        vertical-align: top;
        margin-left: 28px;
        border-top-color: #fff;
        margin-bottom: 100px;
        position: absolute;
    }

    .content .content_all {
        height: 65px;
        border-bottom: 1px solid #eee;
        padding-left: 15px;
        line-height: 106px;
        font-size: 16px;
    }
    
    .content .content_all span {
        border-bottom: 3px solid #3bb9ad;
        padding-bottom: 2px;
    }

    .titleinput input {
        border: 0px;
        padding: 10px 14px;
        height: 40px;
        width: 96%;
    }

    /* 封面 */
    .bigcover .cover {
        height: 326px;
        border: 1px solid #e1e1e1;
        position: relative;
        width: 100%;
        margin-bottom: 26px;
    }
    
    .cover .siglep{
        display: none;
    }

    .cover .siglep .addphoto {
        position: absolute;
        left: 394px;
        top: 178px;
        width: 73px;
    }

    .cover .cover_page span {
        padding: 0 40px 0 20px;
        position: relative;
        font-size: 12px;
        color: #232323;
    }

    .cover_page {
        padding-top: 30px;
    }

    .choose_img select {
        position: absolute;
        color: #232323;
        font-size: 12px;
        padding-left: 10px; 
        border: 1px solid #a5a5a5;
        background-color: #fff;
        width: 100px;
        height: 30px;
        top: 28px;
        left: 16%;
    }

    .cover .cover_page span>i {
        background-color: #3bb9ad;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        border: 1px solid #fff;
        position: absolute;
        left: 0;
        top: 0;
    }

    .cover .pic {
        text-align: center;
        font-size: 12px;
        color: #6f6f6f;
    }

    .add_pic {
        position: relative;
        background-color: #eee;
        width: 170px;
        height: 138px;
        margin: 20px auto;
        z-index: 1;
        display: block;
    }

    .logo {
        display: none;
    }

    .logo img {
        position: relative;
        width: 170px;
        height: 138px;
        margin: 20px auto;
        z-index: 1;
        display: block;        
    }

    .add_pic .h {
        width: 42px;
        height: 2px;
        background: #bfc6d6;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    .add_pic .v {
        width: 2px;
        height: 42px;
        position: absolute;
        background: #bfc6d6;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    /* 发布 */

    footer {
        border: 1px solid #e1e1e1;
        width: 100%;
        height: 100px;
        margin: 0 auto;
        background-color: #fefefe;
        position: fixed;
        bottom: 0;
        z-index: 2
    }

    footer .footer {
        width: 1100px;
        margin: 0 auto;
        line-height: 100px;
        text-align: -webkit-right;
    }
    .footer .publishall {
        width: 700px;
    }

    footer span {
        display: inline-block;
        width: 122px;
        height: 46px;
        border: 1px solid #a5a5a5;
        font-size: 14px;
        color: #4f4f4f;
        line-height: 46px;
        text-align: center;
        margin: 0 24px;
        border-radius: 4px;
    }

    /**/
    #myModal img {
        width: 100%;
    }
</style>

<body>
    <!-- 头部 -->
        <?php echo W('Cate/header');?>
        <!-- 左侧导航栏 -->
        <div class="firstpage">
        <div class="container" style="margin-left: 0;">
            <?php echo W('Cate/nav');?>
   <div class="content">
    <form action="" id="form" method="post" enctype="multipart/form-data">
            <?php if(!empty($data)): if($type == 'draft'): ?><input type="hidden" name="id" value="<?php echo ($data['id']); ?>">
                <?php else: ?>
                    <input type="hidden" name="aid" value="<?php echo ($data['aid']); ?>"><?php endif; ?>
                <input type="hidden" name="type" value="<?php echo ($type); ?>"><?php endif; ?>
            <!-- 写文章部分 -->
            <div class="content_all"><span>写文章</span></div>
            <div class="titleinput">
                <input type="text" id="title" name="title" value="<?php echo ($data['title']); ?>" placeholder="请输入标题(5~30字)">
            </div>
            <div class="editall">
                <div id="odiv">
                    <img src="/project/media/Public/pic/sx.png" title="缩小" border="0" alt="缩小" onclick="sub(-1);" />
                    <img src="/project/media/Public/pic/fd.png" title="放大" border="0" alt="放大" onclick="sub(1)" />
                    <img src="/project/media/Public/pic/cz.png" title="重置" border="0" alt="重置" onclick="sub(0)" />
                    <img src="/project/media/Public/pic/sc.png" title="删除" border="0" alt="删除" onclick="del();odiv.style.display='none';" />
                </div>
                <div class="editor" id="customized-buttonpane" onmousedown="show_element(event)">
                    <?php echo ($data['content']); ?>
                </div>
            </div>
            <!-- 封面 -->
            <div class="bigcover">
                <div class="cover">
                    <div class="choose" style="padding: 30px 0 0 20px;">
                        <div class="choose_img">
                            <span style="font-size: 16px;color: #232323;">频道栏目</span>
                            <select id="catid" name="catid">
                                <?php if(is_array($catname)): foreach($catname as $key=>$v): ?><option value="<?php echo ($v['catid']); ?>"><?php echo ($v['catname']); ?></option><?php endforeach; endif; ?>
                            </select>

                        </div>
                    </div>

                    <div class="cover_page">
                        <span style="font-size: 16px;">封面</span>
                        <input type="radio" id="mp" value="1" name="fm" checked><label for="">默认封面</label>
                        <input type="radio" id="sp" value="2" name="fm" style="margin-left: 40px;"><label for="">单图</label>
                    </div>
                    <div class="siglep">
                        <div class="add">
                            <label class="add_pic" for="photo">
                                <div class="h"></div>
                                <div class="v"></div>
                            </label>
                            <label class="logo" for="photo">
                                <img src="<?php echo ($data['pic']); ?>" alt="">
                            </label>
                            <input type="file" id="photo" name="photo" class="addphoto" style="display: none;" accept="image/png, image/jpeg, image/gif, image/jpg"/>
                        </div>
                        <div class="pic">
                            <p>优质的封面有利于推荐，请使用清晰度较高的图片，避免使用GIF、带大量文字的图片。</p>
                        </div>
                    </div>
                </div>

            </div>

    </form>
        </div>

        </div>

    </div>
    <footer>
        <div class="footer">
            <div class="publishall">
                <span style="background-color: #3bb9ad;font-weight: bold;color: #fff;width: 92px;border: 1px solid #fff;" onclick="sentData()">发布</span>
                <!-- <span>定时发送</span> -->
                <span onclick="save()">存草稿</span>
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">预览</button>
            </div>
        </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="margin-top: 70px;width: 320px;height: 90%;">
            <div class="modal-content">
                <div class="modal-body" id="artcontent">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                </div>
            </div>
        </div>
    </div>

    <script src="/project/media/Public/js/jquery-3.3.1.min.js"></script>
    <script src="/project/media/Public/js/bootstrap.min.js"></script>
    <script src="/project/media/Public/js/jquery.min.js"></script>
    <script src="/project/media/Public/js/trumbowyg.js"></script>
    <script src="/project/media/Public/js/trumbowyg.base64.js"></script>
    <script type="text/javascript">
        //上传封面
        document.getElementById("photo").addEventListener("change",function(e){
            var files =this.files;
            var img = new Image();
            var reader =new FileReader();
            reader.readAsDataURL(files[0]);
            reader.onload =function(e){
                $(".logo img").attr("src",this.result)
                    img.style.width ="60%";
                    img.style.height ="30%";
                    $('.add_pic').css({
                        display: 'none'
                    });
                    $('.logo').css({
                        display: 'block'
                    });
            }
        })

        //发布
        function sentData(){
            // $('#form').attr('action','<?php echo U("Home/main/doEdit");?>');
            // $('#form').submit();
            var form = $('#form');
            var formdata = new FormData(form[0]);
            // var title = $('#title').val();
            // var catid = $('#catid').val();
            // var content = $('#customized-buttonpane').html();
            $.ajax({
                url: '<?php echo U("Home/main/doEdit");?>',
                async : false,
                cache : false,
                contentType : false,
                processData : false,
                type: 'POST',
                data: formdata,
                success:function(ret){
                    if(ret.status == 1){
                        alert(ret.msg);
                        window.location.href="<?php echo U('home/main/main');?>";
                    }else{
                        alert(ret.msg);
                    }
                    // alert('发布成功');
                }
            })
        }

        //存草稿
        function save(){
            var form = $('#form');
            var formdata = new FormData(form[0]);
            $.ajax({
                url: '<?php echo U("Home/main/saveDraft");?>',
                async : false,
                cache : false,
                contentType : false,
                processData : false,
                type: 'POST',
                data: formdata,
                success:function(ret){
                    alert(JSON.stringify(ret));
                }
            })
        }

        //预览
        $('.btn-primary').click(function() {
            $('#artcontent').html($('#customized-buttonpane').html());
        });

        $('.cover_page').click(function() {
            if($('#mp').attr("checked")){
                $('.siglep').css({
                    display: 'none'
                });
            }else{
                $('.siglep').css({
                    display: 'block'
                });                
            }
        });
        

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