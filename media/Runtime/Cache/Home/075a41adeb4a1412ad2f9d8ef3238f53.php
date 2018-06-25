<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>我的内容</title>
    <link rel="stylesheet" type="text/css" href="/project/media/Public/icon/iconfont.css">
    <link rel="stylesheet" href="/project/media/Public/css/layui.css" media="all">
    <link rel="stylesheet" href="/project/media/Public/css/laydate.css" media="all">
    <link rel="stylesheet" href="/project/media/Public/css/public.css" media="all">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

    /* 右侧版心部分 */

    .content {
        width: 870px;
        border: 1px solid #eee;
        border-top-color: #fff;
        display: inline-block;
        vertical-align: top;
        margin-left: 24px;
        margin-bottom: 30px;
        background-color: #fff;
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

    .content_condition .condition_all {
        display: flex;
        padding: 30px 0 0 20px;
        position: relative;
        white-space: nowrap;
    }

    .condition_all>p,
    .condition_all div>a {
        font-size: 16px;
        color: #5e5e5e;
        text-decoration: none;
    }

    .content_condition .condition_all div>a {
        margin: 0 28px 0 15px;
    }

    .content_condition .condition_all div .all {
        width: 60px;
        height: 25px;
        border-radius: 5px;
        background-color: #3db9ac;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .content_condition .search-input {
        background-color: #f8f9fb;
        border: 1px solid #e1e1e1;
        width: 16%;
        height: 22px;
        position: absolute;
        right: 26px;
        border-radius: 10px;
        padding-left: 14px;
        top: 28px;
        padding-right: 30px;
        font-size: 12px;
    }

    .content_condition .icon-search {
        position: absolute;
        right: 48px;
        top: 32px;
    }

   /* 页面走丢 */
    .lose {
        padding-top: 10px;
        display: none;
    }

    .lose p {
        text-align: center;
        color: #808080;
        padding-top: 15px;
    }

    .lose .lose_img {
        display: flex;
        justify-content: center;
    }

     /* 发布状态部分 */

    /* .content_main {

        display: none;
    } */

    .content_pic {
        border-bottom: 1px solid #eee;
        height: 230px;
        position: relative;
    }

    .content_pic img {
        width: 190px;
        height: 140px;
        margin: 35px 0 0 15px;
    }

    .content_title {
        position: absolute;
        right: 16%;
        top: 30px;
    }

    .content_title p {
        font-weight: bold;
        font-size: 18px;
        color: #282828;
        margin: 0 0 18px 0px;
    }

    .published span {
        display: inline-block;
        width: 60px;
        height: 25px;
        border: 1px solid #fa7252;
        font-size: 14px;
        text-align: center;
        line-height: 25px;
        margin: 0 30px 18px 0px;
        color: #fa7252;
    }

    .published i {
        font-size: 14px;
        color: #999;
    }

    .title_share {
        display: flex;
        font-size: 14px;
        color: #999;
        height: 30px;
    }

    .title_share p>a {
        color: #999999;
    }

    .content_title p>a {
        margin: 0 25px 0 0;
        text-decoration: none;
        color: #52ade2;
    }

    .replace_all {
        display: flex;
    }

    .replace_all p {
        margin-top: 16px;
    }

    .replace_all a:hover {
        color: #006772;
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
        width: 25px;
        height: 30px;
        border: 1px solid #ebebeb;
        border-radius: 10px;
        position: absolute;
        right: 30%;
        cursor: pointer;
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
    .textTitle{
      width: 500px;
      height: 45px;
    }
</style>

<body>
      <!-- 头部 -->
      <?php echo W('Cate/header');?>
      <div class="firstpage">
        <!-- 左侧导航栏 -->
        <div class="container">
            <?php echo W('Cate/nav');?>
            <!-- 右侧版心部分 -->
             <div class="content">
            <!-- 我的内容部分 -->
            <div class="content_all">
                <a href="javascript:;">我的内容</a>
                <span></span>
            </div>
            <!-- 已发布部分 -->
            <div class="content_condition">
                <div class="condition_all" id="mun">
                    <p>状态&nbsp;:</p>
                    <div>
                        <a href="javascript:;" onclick="articleData(-1,1)" class="all">全部</a>
                    </div>
                    <div>
                        <a href="javascript:;" onclick="articleData(0,1)">已发布</a>
                    </div>
                    <div>
                        <a href="javascript:;" onclick="articleData(1,1)">待审核</a>
                    </div>
                    <div>
                        <a href="javascript:;" onclick="articleData(2,1)">未通过</a>
                    </div>
                    <div>
                        <a href="javascript:;" onclick="articleData(4,1)">未发布</a>
                    </div>
                    <div class="search_all">
                        <input type="text" class="search-input" placeholder="搜索文章">
                        <i class="iconfont icon-search">&#xe64d;</i>
                    </div>
                </div>
            </div>
            <!-- 图片内容部分 -->
            <div class="all"  id="main">
                <!-- 页面走丢 -->
                <div class="lose">
                    <div class="lose_img">
                        <img src="/project/media/Public/images/mycontent/null.png">
                    </div>
                    <p>暂时没有相关文章</p>
                </div>
             <!-- 发布状态部分 -->
                <div class="content_main">
                    <div class="content_pic">
                        <img src="/project/media/Public/images/index/banner_one.png">
                        <div class="content_title">
                            <p> 如果腾讯阿里消失了，这个世界将会变什么样？</p>
                            <div class="published">
                                <span> 已发布</span>
                                <i>2018-05-02&nbsp;&nbsp;&nbsp;11:08:52</i>
                            </div>
                            <div class="title_share">
                                <p>
                                    <a href="javascript:;">推荐&nbsp;&nbsp;22</a>
                                </p>
                                <p>
                                    <a href="javascript:;">阅读&nbsp;&nbsp;0</a>
                                </p>
                                <p>
                                    <a href="javascript:;">评论&nbsp;&nbsp;0</a>
                                </p>
                                <p>
                                    <a href="javascript:;">分享&nbsp;&nbsp;0</a>
                                </p>
                                <p>
                                    <a href="javascript:;">收藏&nbsp;&nbsp;0</a>
                                </p>
                            </div>

                            <div class="replace_all">
                                <p>
                                    <a href="javascript:;">修改</a>
                                </p>
                                <p>
                                    <a href="javascript:;">分享</a>
                                </p>
                                <p>
                                    <a href="javascript:;">删除</a>
                                </p>
                                <p>
                                    <a href="javascript:;">置顶</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="content_pic">
                        <img src="/project/media/Public/images/index/banner_one.png">
                        <div class="content_title">
                            <p> 如果腾讯阿里消失了，这个世界将会变什么样？</p>
                            <div class="published">
                                <span> 未发布</span>
                                <i>2018-05-02&nbsp;&nbsp;&nbsp;11:08:52</i>
                            </div>
                            <div class="title_share">

                            </div>
                            <div class="replace_all">
                                <p>
                                    <a href="javascript:;">修改</a>
                                </p>
                                <p>
                                    <a href="javascript:;">分享</a>
                                </p>
                                <p>
                                    <a href="javascript:;">删除</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="content_pic">
                        <img src="/project/media/Public/images/index/banner_one.png">
                        <div class="content_title">
                            <p> 如果腾讯阿里消失了，这个世界将会变什么样？</p>
                            <div class="published">
                                <span> 未通过</span>
                                <i>2018-05-02&nbsp;&nbsp;&nbsp;11:08:52</i>
                            </div>
                            <div class="title_share">

                            </div>
                            <div class="replace_all">
                                <p>
                                    <a href="javascript:;">修改</a>
                                </p>

                                <p>
                                    <a href="javascript:;">删除</a>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 跳转页面 -->
            <div class="pageall" id='pages'>
                <!-- <span>1&nbsp;/&nbsp;5</span>
                <div class="choose_page" onclick="nextpage()">
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
                </div> -->
            </div>


        </div>
        </div>

    </div>
    <script src="/project/media/Public/js/jquery-3.3.1.min.js"></script>
    <script src="/project/media/Public/js/layui.js"></script>
    <script src="/project/media/Public/js/laydate.js"></script>
    <script type="text/javascript">
    $(function(){
    	articleData(-1,1);
    })
    $('#mun div a').click(function() {
        $('#mun div a').removeClass('all');
        $(this).addClass('all');
    });
    var html = '';
    var types;
    var nums=1;
    var total=1;
    var pageHtml = '';
	function articleData(type,num){
        types=type;
        nums=num;
        if(num>total){
            alert('已经到最后一页');return;
        }
		$.ajax({
			url: '<?php echo U("Home/Main/articleData");?>',
            type: 'POST',
            data: {'type': type,'num':num},
            success:function(ret){
            	html = '';
                total = ret.page;
            	if(ret.status == 1){
            		var data = ret.data;
            		for (var i = 0; i < data.length; i++) {
            			// if(data[i]['type'] == 'article'){
            				if(data[i]['status'] == 0){
            					html += '<div class="content_pic">';
			                        html += '<img width="120px" src="'+data[i]['pic']+'">';
			                        html += '<div class="content_title">';
			                            html += '<p class="textTitle">'+data[i]['title']+'</p>';
			                            html += '<div class="published">';
			                                html += '<span>'+data[i]['statusname']+'</span>';
			                                html += '<i>'+data[i]['dateline']+'</i>';
			                            html += '</div>';
			                            html += '<div class="title_share">';
			                                html += '<p>';
			                                    html += '<a href="javascript:;">推荐&nbsp;&nbsp;'+data[i]['sharetimes']+'</a>';
			                                html += '</p>';
			                                html += '<p>';
			                                    html += '<a href="javascript:;">阅读&nbsp;&nbsp;'+data[i]['viewnum']+'</a>';
			                                html += '</p>';
			                                html += '<p>';
			                                    html += '<a href="javascript:;">评论&nbsp;&nbsp;'+data[i]['commentnum']+'</a>';
			                                html += '</p>';
			                                html += '<p>';
			                                    html += '<a href="javascript:;">分享&nbsp;&nbsp;'+data[i]['sharetimes']+'</a>';
			                                html += '</p>';
			                                html += '<p>';
			                                    html += '<a href="javascript:;">收藏&nbsp;&nbsp;'+data[i]['favtimes']+'</a>';
			                                html += '</p>';
			                            html += '</div>';

			                            html += '<div class="replace_all">';
			                                html += '<p>';
			                                    html += '<a href="javascript:;" onclick="edit('+data[i]['id']+',\''+data[i]['type']+'\')">修改</a>';
			                                html += '</p>';
			                                html += '<p>';
			                                    html += '<a href="javascript:;">分享</a>';
			                                html += '</p>';
			                                html += '<p>';
			                                    html += '<a href="javascript:;" onclick="del('+data[i]['id']+',\''+data[i]['type']+'\')">删除</a>';
			                                html += '</p>';
			                                html += '<p>';
			                                    html += '<a href="javascript:;">置顶</a>';
			                                html += '</p>';
			                            html += '</div>';
			                        html += '</div>';
			                    html += '</div>';

            				}else{
            					html += '<div class="content_pic">';
			                        html += '<img src="'+data[i]['pic']+'">';
			                        html += '<div class="content_title">';
			                            html += '<p class="textTitle">'+data[i]['title']+'</p>';
			                            html += '<div class="published">';
			                                html += '<span>'+data[i]['statusname']+'</span>';
			                                html += '<i>'+data[i]['dateline']+'</i>';
			                            html += '</div>';
			                            html += '<div class="title_share">';

			                            html += '</div>';
			                            html += '<div class="replace_all">';
			                                html += '<p>';
			                                    html += '<a href="javascript:;" onclick="edit('+data[i]['id']+',\''+data[i]['type']+'\')">修改</a>';
			                                html += '</p>';

			                                html += '<p>';
			                                    html += '<a href="javascript:;" onclick="del('+data[i]['id']+',\''+data[i]['type']+'\')">删除</a>';
			                                html += '</p>';

			                            html += '</div>';
			                        html += '</div>';
                                html += '</div>';
            				}

            			// }
            		}
            	}else{
            		html += '<p style="text-align:center;padding:30px 0 10px 0; ">暂无数据</p>';
            	}
                //分页
                if(ret.page>0){
                    pageHtml = '';
                    pageHtml += '<span>'+num+' / '+ret.page+'</span>';
                    pageHtml += '<div class="choose_page" onclick="nextpage()">';
                        pageHtml += '<a href="javascript:;">';
                            pageHtml += '<i></i>';
                        pageHtml += '</a>';
                    pageHtml += '</div>';
                    pageHtml += '<div class="pageall_number">';
                        pageHtml += '<span>到第 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;';
                            pageHtml += '<input type="text" class="search-page" maxlength="4"> 页';
                        pageHtml += '</span>';
                    pageHtml += '</div>';
                    pageHtml += '<div class="allright">';
                        pageHtml += '<a href="javascript:;" onclick="pageskip()">确定</a>';
                    pageHtml += '</div>';
                }

                $('#main').html(html);
                $('#pages').html(pageHtml);
			}
		})
	}
//删除数据
	function del(id,type){
		$.ajax({
			url: '<?php echo U("Home/main/delArticle");?>',
            type: 'POST',
            data: {'id':id,'type': type},
            success:function(ret){
            	alert(ret.msg);
			}
		})
    window.location.reload();
	}
  //下一页
  function nextpage(){
      nums += 1;
      articleData(types,nums);
  }
  //页数跳转
  function pageskip(){
      var pagenum = $('.search-page').val();
      nums = pagenum;
      articleData(types,nums);
  }

	function edit(id,type){
		window.location.href="<?php echo U('Home/main/edit/id/"+id+"/type/"+type+"');?>";
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