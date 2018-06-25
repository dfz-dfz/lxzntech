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

    .swiper-container {
        width: 100%;
        height: 100%;
        margin-left: auto;
        margin-right: auto;
    }
    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }

    .pageone{
    	width: 100%;
    	height: 100%;
    	background-image: url('/project/media/Public/images/index/indexbg1.png');
    	background-size: 1920px 1080px;
        background-position: center center;  
        position: relative;
    }

    .pagetwo{
		width: 100%;
    	height: 100%;
    	background-image: url('/project/media/Public/images/index/indexbg2.png');
    	background-size: 1920px 1080px;
        background-position: center center;  
        position: relative;  		
    }
    .midfont {
		margin-top: -10px;
    }
    .pageoneLeft,.pageoneRight{
        position: absolute;
    }
    .pageoneLeft{
        top:30%;
        left:26%;
        font-size: 60px;
        text-align: left;
        width: 370px;
        font-family: 方正黑体;
    }
    .pageoneLeftsmall{
        font-size: 30px;
    }
    .pageoneLeft p{
        margin-bottom: 5%;
    }
    .pageoneRight{
        width: 800px;
        height: 672px;
        bottom:0;
        right:0;
    }
    .pagetwocenter{
        position: absolute;
        left:50%;
        top:30%;
        font-size: 60px;
        margin-left:-150px;
        font-family: 方正黑体
    }
    .pagetwocenter p{
        margin-bottom: 5%
    }
    .pagetwocentersmall{
        font-size: 30px;
    }
	   
</style>
<link rel="stylesheet" href="/project/media/Public/css/index.css">
<body class="body">
	<nav class="navbar">
        <div class="navbar_img">
            <img src="/project/media/Public/images/index/logo.png">
        </div>
        <p class="content">
            <a style="font-size: 18px;font-weight: 800;" href="<?php echo U('Home/index/index');?>">首页</a>
            <a href="<?php echo U('Home/index/news');?>">公司动态</a>
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
    		<li style="font-size: 18px;font-weight: 800;" class="fistli"><a href="<?php echo U('Home/index/index');?>">首页</a></li>
    		<li><a href="<?php echo U('Home/index/news');?>">公司动态</a></li>
    		<li><a href="<?php echo U('Home/index/map');?>">联系我们</a></li>
    		<li><a href="<?php echo U('Home/index/download');?>">下载APP</a></li>
    		<li><a href="<?php echo U('Home/login/login');?>">合作媒体</a></li>
    	</ul>
    </nav>

	<div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
            	<section class="pageone">
            		<div class="pageoneLeft">
                        <p>指尖触控</p>
                        <p  class="midfont">开启智能生活</p>
                        <p class="pageoneLeftsmall">不同需求，一键速达</p>
                    </div>
                    <div class="pageoneRight">
                          <img src="/project/media/Public/images/index/indexbg_header.png" height="100%" width="100%">
                    </div>
            	</section>
            </div>
            <div class="swiper-slide">
            	<section class="pagetwo">
            		<div class="pagetwocenter">
                        <p>一起来</p>
                        <p class="midfont">探索黑科技</p>
                        <p class="pagetwocentersmall">探索黑科技，颠覆认识</p>  
                    </div>
            	</section>
            </div>
        </div>
        <div class="swiper-pagination"></div>
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

	// window.onresize=function(){
 //        var BodyWid = $('.body').width();
 //        var imgWid = 1920 - BodyWid;
 //        $('.pageone').css('background-position',-imgWid+300+'px','1098px');
 //    }      

    $(function(){
    	$('#mue').click(function(){
    		$('#navmue').stop().slideToggle(200);
    	})
    })

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