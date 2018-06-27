<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
	<title>章鱼先生</title>
	<link rel="stylesheet" href="/project/media/Public/css/headfoot.css">
	<link rel="stylesheet" href="/project/media/Public/css/swiper.min.css">
</head>
<style>
    @font-face {
        font-family: 'iconfont';
        src: url('/project/media/Public/icon/iconfont.eot');
        src: url('/project/media/Public/icon/iconfont.eot?#iefix') format('embedded-opentype'),
        url('/project/media/Public/icon/iconfont.woff') format('woff'),
        url('/project/media/Public/icon/iconfont.ttf') format('truetype'),
        url('/project/media/Public/icon/iconfont.svg#iconfont') format('svg');
    }
    .iconfont{
        font-family: "iconfont" !important;
        font-style: normal;
        font-size: 22px;
        color: #000;
        vertical-align: middle;
        background-color: #fff;
        border-radius: 50%;
        margin-left: 10px;
    }
    /*新闻*/
    .news{
        padding-top:100px;
        overflow-y: auto;
    }
    .newsbanner{
        width:100%;
        height:400px;
        background: url(/project/media/Public/images/news/news.png);
        background-size: 100% 100%;
        text-align: center;
        color: #fff;
        font-size: 36px;
    }
    .newsbanner .newstit {
        padding-top: 7%;
    }
    .newsbanner .newstit div {
        position: relative;
    }
    .newstit .leftline {
        position: absolute;
        border-bottom: 2px solid #fff;
        width: 100px;
        margin-top: 24px;
        margin-left: -190px;
    }
    .newstit .rightline {
        position: absolute;
        border-bottom: 2px solid #fff;
        width: 100px;
        margin-top: -24px;
        margin-left: 95px;
    }
    .newsbody{
        width: 80%;
        margin:0 auto;
        background-color: #fff;
        padding: 20px;
        margin-top:-3%;
        overflow: hidden;
        padding-left: 5%;
        margin-bottom: 80px;
    }
    .newbodyLeft,.newbodyRigth{
        float: left;
    }
    .newbodyRigth{
        margin-left: 10%;
        width: 80%;
        margin-bottom: 20px;
    }
    .newbodyRigth li{
        margin-top: 32px;
    }
    .newbodytext{
        text-overflow:ellipsis;  
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
        overflow: hidden;
    }
    .newfooter{

    }
    .newfooter ul{
        float: right;
        margin-right: 5%;
    }
    .newfooter li{
        float: left;
        margin-right: 20px;
    }
    .newfooter li input{
        width: 15px;
    }
    .newfooter .newbtn{
        width: 35px;
        height: 20px;
        border:1px solid #ebebeb;
        text-align: center;
        border-radius: 10px;
        cursor: pointer;
    }
	@media screen and (max-width: 780px){
		.navbar .navbar_img {
	        position: absolute;
	        left: 0;
	    }
	    .content{
	    	display: none;
	    }
	    .nav{
	    	display: block;
	    }
		.pageone{
	    	background: url('/project/media/Public/images/index/indexbg1.png') no-repeat;
	    	background-size: 800px 400px;
	    	background-position:right center;
	    }
	}

	@media screen and (min-width: 780px){
		.navmue {
			display: none !important;
		}
	}
</style>
<body class="body">
	<nav class="navbar">
        <div class="navbar_img">
            <img src="/project/media/Public/images/index/logo.png">
        </div>
        <p class="content">
            <a href="<?php echo U('Home/index/index');?>">首页</a>
            <a  style="font-size: 18px;font-weight: 800;" href="<?php echo U('Home/index/news');?>">公司动态</a>
            <a href="<?php echo U('Home/index/map');?>">联系我们</a>
            <a href="<?php echo U('Home/index/download');?>">下载APP</a>
            <a href="<?php echo U('Home/login/login');?>">合作媒体</a>
        </p>
        <div class="nav">  
            <a href="javascript:;" class="mue" id="mue">
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </a>
        </div>
        <ul class="navmue" id="navmue" style="background-color: #fff;">
            <li class="fistli"><a href="<?php echo U('Home/index/index');?>">首页</a></li>
            <li><a  style="font-size: 18px;font-weight: 800;" href="<?php echo U('Home/index/news');?>">公司动态</a></li>
            <li><a href="<?php echo U('Home/index/map');?>">联系我们</a></li>
            <li><a href="<?php echo U('Home/index/download');?>">下载APP</a></li>
            <li><a href="<?php echo U('Home/login/login');?>">合作媒体</a></li>
        </ul>
    </nav>

	<div class="news">
        <div class="newsbanner">
            <div class="newstit">
                <span class="leftline"></span>
                <div>动态</div>
                <span class="rightline"></span>
            </div>
        </div>
        <div class="newsbody">
            <?php if(is_array($data)): foreach($data as $key=>$v): ?><div>
                <div class="newbodyLeft">
                    <p><?php echo ($v['year']); ?></p>
                    <h1><?php echo ($v['month']); ?></h1>
                </div>
                <div class="newbodyRigth">
                    <ul>
                    <?php if(is_array($v['data'])): foreach($v['data'] as $key=>$vi): ?><li>
                            <h3><a style="color: #000" href="<?php echo U('Home/index/newsDetails',['aid'=>$vi['aid']]);?>"><?php echo ($vi['title']); ?></a></h3>
                            <p><?php echo ($vi['dateline']); ?></p>
                            <p class="newbodytext">
                            <?php echo ($vi['summary']); ?>
                            </p>
                        </li><?php endforeach; endif; ?>
                    </ul>
                </div>
            </div>
            <hr/ style='width: 100%;'><?php endforeach; endif; ?>
            
            <!-- <div class="newfooter">
                <ul>
                    <li>1/<span>5</span></li>
                    <li class="newbtn">&gt</li>
                    <li>到第<input type="text" name="">页</li>
                    <li class="newbtn">确认</li>
                </ul>
            </div> -->
        </div>
    </div>

	<footer>
        <ul>
            <li><div class="adress">广州乐享智能信息科技有限公司版权所有</div></li>
            <li><div class="icp">粤ICP备18047326号-1</div></li>
            <li>
                <div class="number">关注我们<i class="iconfont">&#xe715;</i></div>
                <div class="weixin">
                    <img src="/project/media/Public/images/contact/weixin.png" alt="">
                </div>              
            </li>
        </ul>
    </footer>    

	<script src="/project/media/Public/js/swiper.min.js"></script>
	<script src="/project/media/Public/js/jquery.min.js"></script>
    <script>
    var swiper = new Swiper('.swiper-container', {
        direction: 'vertical',
        slidesPerView: 1,
        spaceBetween: 30,
        mousewheel: true,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
    });
    $(function(){
    	$('#mue').click(function(){
    		$('#navmue').stop().slideToggle(200);
    	})
        VwVh();
    })
    window.onresize=function(){
        VwVh();
    }    
    function VwVh(){
        var BodyWid = $('.body').width();
        var newbannerHei = BodyWid*0.2083;
        $('.newsbanner').css({'height':newbannerHei,'width':BodyWid});
    }
    function newsData(){
        $.ajax({
          url:"",
          type:"post",
          data:{

          },
          success:function(data)
          {

          }
        });
    }

    $('.number').hover(
        function(){
            $('.weixin',this).show(),$('.weixin').show()
        },
        function(){
            $('.weixin',this).hide();$('.weixin').hide()
    })    
    </script>    
</body>
</html>