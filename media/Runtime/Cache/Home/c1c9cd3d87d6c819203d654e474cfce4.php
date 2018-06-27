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
    /*地图*/
    .map{
        padding-top:100px;
        overflow-y: auto;
    }
    .mapbanner {
        width:100%;
        height:400px;
        background: url(/project/media/Public/images/contact/contact.png);
        background-size: 100% 100%;
        min-height: 100px;
        text-align: center;
        vertical-align: middle;
        font-size: 36px;
        color: #fff;
    }
    .mapbanner .maptit {
        padding-top: 7%;
    }
    .maptit .leftline {
        position: absolute;
        border-bottom: 2px solid #fff;
        width: 100px;
        margin-top: 24px;
        margin-left: -190px;
    }
    .maptit .rightline {
        position: absolute;
        border-bottom: 2px solid #fff;
        width: 100px;
        margin-top: -24px;
        margin-left: 95px;
    }    
    .mapbody{
        width: 1280px;
        margin:0 auto;
        background-color: #fff;
        margin-top:-2%;
        overflow: hidden;
        margin-bottom: 80px;
        font-size: 16px;
    }
    .mapbodyLeft,.mapbodyRigth {
        float: left;
        width: 500px;
        height:500px;
    }
    .mapbodyRigth{
        float: right;
        margin-right: 8%;
    }
    .mapbodyLeft{
        width: 300px;
        margin-left: 10%;
    }
    .mapbody .mapbodyLeft .lt {
        margin-left: 30px;
    }
    .mapbody .mapbodyLeft .cfont {
        font-size: 16px;
        font-weight: 600;
        color: #151515;
        margin-bottom: 25px;
        margin-top: 36px;
    }
    .mapbody .mapbodyLeft .teawfont {
        width: 330px;
        font-size: 14px;
        color: #151515;
        margin-bottom: 25px;
    }
    .mapbody .mapbodyLeft .teawfont img {
        margin-left: -12px;
    }
    .mapbodyRigth .mapbodyRigthmap{
        width: 80%;
        height: 80%;
        margin: auto;
        margin-top: 46px;
    }
    .mapbodyRigth .mapbodyRigthmap img{
        width: 100%;
        height: 100%;
    }
    @media screen and (max-width: 980px){
        .mapbody .mapbodyLeft .lt {
            margin-left: 0;
        }
    }
	@media screen and (max-width: 780px){
        .mapbanner {
            font-size: 26px;
        }
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
    @media screen and (max-width: 1366px){
        .mapbody{
            width: 66%;
        }
    }
    @media screen and (max-width: 1370px){
        .mapbodyLeft,.mapbodyRigth {
            height: auto;
            text-align: center;
        }
        .mapbody .mapbodyLeft .lt {
            margin-left: 0;
        }
        .mapbody .mapbodyLeft .teawfont {
            width: auto;
        }        
        .mapbodyLeft {
            display: contents;
        }
        .mapbodyRigth {
            float: left;
            display: contents;
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
            <a href="<?php echo U('Home/index/news');?>">公司动态</a>
            <a  style="font-size: 18px;font-weight: 800;" href="<?php echo U('Home/index/map');?>">联系我们</a>
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
            <li><a href="<?php echo U('Home/index/news');?>">公司动态</a></li>
            <li><a style="font-size: 18px;font-weight: 800;" href="<?php echo U('Home/index/map');?>">联系我们</a></li>
            <li><a href="<?php echo U('Home/index/download');?>">下载APP</a></li>
            <li><a href="<?php echo U('Home/login/login');?>">合作媒体</a></li>
        </ul>
    </nav>

	<div class="map">
        <div class="mapbanner">
            <div class="maptit">
                <span class="leftline"></span>
                <div>联系我们</div>
                <span class="rightline"></span>
            </div>
        </div>
        <div class="mapbody">
                <div class="mapbodyLeft">
                    <div class="cfont lt">广州乐享智能信息科技有限公司</div>
                    <div class="teawfont lt">Tel:400-884-3277&nbsp;&nbsp;&nbsp;020-87696989</div>
                    <div class="teawfont lt">Email:zhangyu@lxzntech.com</div>
                    <div class="teawfont lt">Add:广东广州市越秀区先烈中路80号汇华科技园2206</div>
                    <div class="teawfont lt">
                        <img src="/project/media/Public/images/contact/weixin.png" alt="">
                        <div>章鱼先生官方微信</div>
                    </div>
                </div>
                <div class="mapbodyRigth">
                    <div class="mapbodyRigthmap">
                        <img src="/project/media/Public/images/contact/map.png" alt="">
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
        VwVh();
    })
    window.onresize=function(){
        VwVh();
    }    
    function VwVh(){
        var BodyWid = $('.body').width();
        var mapbannerHei = BodyWid*0.2083;
        $('.mapbanner').css({'height':mapbannerHei,'width':BodyWid});
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