<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
	<title>下载</title>
	<link rel="stylesheet" href="/project/media/Public/css/headfoot.css">
	<link rel="stylesheet" href="/project/media/Public/css/download.css">
	<link rel="stylesheet" href="/project/media/Public/css/swiper.min.css">
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
</style>
</head>
<body>
	<nav class="navbar">
        <div class="navbar_img">
            <img src="/project/media/Public/images/index/logo.png">
        </div>
        <p class="content">
            <a href="<?php echo U('Home/index/index');?>">首页</a>
            <a href="<?php echo U('Home/index/news');?>">公司动态</a>
            <a href="<?php echo U('Home/index/map');?>">联系我们</a>
            <a  style="font-size: 18px;font-weight: 800;" href="<?php echo U('Home/index/download');?>">下载APP</a>
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
    		<li><a href="<?php echo U('Home/index/news');?>">公司动态</a></li>
    		<li><a href="<?php echo U('Home/index/map');?>">联系我们</a></li>
    		<li><a  style="font-size: 18px;font-weight: 800;" href="<?php echo U('Home/index/download');?>">下载APP</a></li>
    		<li><a href="<?php echo U('Home/login/login');?>">合作媒体</a></li>
    	</ul>
    </nav>

	<div class="main">
		<div class="sect">
			<div class="uli leftli">
				<img src="/project/media/Public/images/downloading/downbg.png" alt="">
			</div>
			<div class="uli">
				<div class="topfont">一款物联控制与科技垂直资讯的应用软件</div>
				<div class="botfont">点击下载APP，寻找你的共同爱好者</div>
				<div class="qrcode">
					<img src="/project/media/Public/images/downloading/qrcode1.png" alt="">
					<div class="qrcfont">IOS版下载</div>
				</div>
				<div class="qrcode">
					<img src="/project/media/Public/images/downloading/qrcode2.png" alt="">
					<div class="qrcfont">Android版下载</div>
				</div>
			</div>
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