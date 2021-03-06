<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>粉丝量统计</title>
    <link rel="stylesheet" type="text/css" href="/project/media/Public/icon/iconfont.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/project/media/Public/css/layui.css" media="all">
    <link rel="stylesheet" href="/project/media/Public/css/laydate.css" media="all">
    <link rel="stylesheet" href="/project/media/Public/css/public.css" media="all">
    <script src="/project/media/Public/js/echarts.min.js"></script>
    <script src="/project/media/Public/js/jquery-3.3.1.min.js"></script>
    <script src="/project/media/Public/js/layui.js"></script>
    <script src="/project/media/Public/js/laydate.js"></script>
</head>
<style>
   
    * {
        padding: 0;
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

    .icon-blue {
        font-family: "iconfont" !important;
        font-style: normal;
        font-size: 25px;
        color: #4abcf0;
        position: absolute;
        top: 44%;
    }

    .icon-oranger {
        font-family: "iconfont" !important;
        font-style: normal;
        font-size: 25px;
        color: #fbad99;
        position: absolute;
        top: 44%;
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

    /* 右侧版心部分 */

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

    .content .content_number {
        height: 65px;
        border-bottom: 1px solid #eee;
        position: relative;
        padding-left: 20px;
    }

    .content .content_number>a {
        position: absolute;
        bottom: 2px;
        font-size: 18px;
        color: #232323;
        text-decoration: none;
    }

    .content .content_number>span {
        width: 85px;
        height: 3px;
        background-color: #3db9ac;
        position: absolute;
        bottom: 0;
    }

    /* 粉丝属性部分 */

    .allinformation {
        margin-left: 10px;
    }

    .allinformation .allinformation_number>i {
        width: 3px;
        height: 14px;
        background-color: #3cb9ac;
        position: absolute;
        top: 25px;
    }

    .allinformation .allinformation_number {
        padding: 22px 0 0 20px;
        font-size: 14px;
        color: #141414;
        position: relative;
        background-color: #fff;
        display: flex;
        align-items: center;
    }

    .allinformation .allinformation_number p {
        margin-left: 10px;
    }

    /* 发布统计部分 */

    .content .content_all {
        height: 190px;
        position: relative;
        padding-left: 15px;
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
        color: #3cb9ac;

    }

    .content .content_all p>a {
        font-size: 14px;
        color: #232323;
        text-decoration: none;
    }

    .content .content_all div {
        height: 162px;
        width: 1px;
        background-color: #eee;
    }

    .content .content_all .number {
        display: block;
        margin: 18px 0 0 0;
        font-size: 14px;
        color: #4d4d4d;
    }

    /* 日期查询 */

    .dateall {
        padding: 0 10px 5px 30px;
        height: 50px;
        display: flex;
        align-items: center;
        position: relative;
    }

    .dateall>a {
        text-decoration: none;
        font-size: 14px;
        color: #5e5e5e;
        margin: 0 30px 0 0;
    }

    .dateall>a:hover {
        color: #3db9ac;
    }
    .dateall  .layui-inline{
    position: absolute;
    right: 240px;
     }
  /* 日历 */
     .layui-inline{
        position: absolute;
        right: 20px;
    }
     .layui-input, .layui-textarea{
        font-size: 14px;
        color: #8b8b8b;
        padding-left: 0;
        text-align: center;
        width: 100%;
    }

     .layui-laydate-header {
         font-size: 10px;
         font-weight: bold;
         color: #666;
         border-bottom: 1px solid #e2e2e2;
    }
     .layui-laydate-content th {
         font-weight: bold;
         color: #4e4e4e;
         font-size: 10px;
    }
    .layui-laydate-content td {
          color: #4e4e4e;
          font-size: 10px;
    }
    .layui-laydate-header i {
         position: absolute;
         top: 10px;
         color: #c4b9b5;
         font-size: 18px;
    }

    /* 数据图 */

    #main {
        width: 700px;
        height: 400px;
        margin: 0 auto;
        padding: 10px 5px 10px 5px;
    }

    /* 粉丝计算 */

    .comment_all {
        display: flex;
        justify-content: center;
        padding: 60px 25px 20px 25px;
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

    th {
        width: 30%;
        padding: 15px 10px 10px 10px;
        text-align: center;
    }

    td {
        text-align: center;
        padding: 16px 0 16px 0;
    }

    /* 跳转页面 */

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
    <div class="firstpage">
        <!-- 左侧导航栏 -->
        <div class="container">
            <?php echo W('Cate/nav');?>
             <div class="content">
            <!-- 写文章部分 -->
            <div class="content_number">
                <a href="javascript:;">粉丝量统计</a>
                <span></span>
            </div>
            <!-- 粉丝属性部分 -->
            <div class="allinformation">
                <div class="allinformation_number">
                    <i></i>
                    <p>
                        <span style="color: #232323;font-size: 14px;">粉丝属性</span>
                    </p>
                </div>
            </div>
            <!-- 发布统计部分 -->
            <div class="content_all">
                <p>
                    <span><?php echo ($todayNum); ?></span>
                    <br>
                    <a href="javascript:;">日：&nbsp;<?php echo ($addPercent); ?>
                        <?php if($addPercent > 0 and $addPercent != 0): ?><i class="iconfont icon-oranger">&#xe729;</i>
                        <?php elseif($addPercent < 0 and $addPercent != 0): ?>
                            <i class="iconfont icon-blue">&#xe72a;</i><?php endif; ?>
                    </a>
                    <br>
                    <i class="number">新增粉丝数</i>
                </p>
                <!-- <div></div> -->
                <p>
                    <span><?php echo ($tcancelNum); ?></span>
                    <br>
                    <a href="javascript:;">日：&nbsp;<?php echo ($cancelPercent); ?></a>
                    <?php if($cancelPercent > 0 and $cancelPercent != 0): ?><i class="iconfont icon-oranger">&#xe729;</i>
                    <?php elseif($cancelPercent < 0 and $cancelPercent != 0): ?>
                        <i class="iconfont icon-blue">&#xe72a;</i><?php endif; ?>
                    <br>
                    <i class="number">取消粉丝数</i>
                </p>
                <!-- <div></div> -->
                <p>
                    <span><?php echo ($todayOnly); ?></span>
                    <br>
                    <a href="javascript:;">日：&nbsp;<?php echo ($onlyPercent); ?>
                    <?php if($onlyPercent > 0 and $onlyPercent != 0): ?><i class="iconfont icon-oranger">&#xe729;</i>
                    <?php elseif($onlyPercent < 0 and $onlyPercent != 0): ?>
                        <i class="iconfont icon-blue">&#xe72a;</i><?php endif; ?>
                    </a>

                    <br>
                    <i class="number">净增粉丝数</i>
                </p>
                <!-- <div></div> -->
                <p>
                    <span><?php echo ($total); ?></span>
                    <br>
                    <a href="javascript:;">日：&nbsp;<?php echo ($onlyPercent); ?>
                    <?php if($onlyPercent > 0 and $onlyPercent != 0): ?><i class="iconfont icon-oranger">&#xe729;</i>
                    <?php elseif($onlyPercent < 0 and $onlyPercent != 0): ?>
                        <i class="iconfont icon-blue">&#xe72a;</i><?php endif; ?>
                    </a>
                    <br>
                    <i class="number">累计粉丝数</i>
                </p>
            </div>
            <!-- 数据概述部分 -->
            <div class="allinformation">
                <div class="allinformation_number">
                    <i></i>
                    <p>
                        <span style="color: #232323;font-size: 14px;">数据概述</span>
                    </p>
                </div>
            </div>
            <!-- 日期查询 -->
            <div class="dateall">
                <a href="javascript:;" onclick="nearday(7)">最近7天</a>
                <a href="javascript:;" onclick="nearday(14)">最近14天</a>
                <a href="javascript:;" onclick="nearday(30)">最近30天</a>
                <div class="layui-inline">
                    <input type="text" class="layui-input" id="test1" placeholder="请选择开始和结束的时间">
                </div>
            </div>
            <!-- 数据图 -->
            <div id="main"></div>
            <!-- 粉丝计算 -->
            <div class="comment_all">
                <table id="tabledatas">
                    <tr class="time">
                        <th>时间</th>
                        <th>新增粉丝数</th>
                        <th>取消粉丝数</th>
                        <th>净增粉丝数</th>
                        <th>累计粉丝数</th>
                    </tr>
                    <tr>
                        <td>2018-05-05</td>
                        <td>231</td>
                        <td>139</td>
                        <td>248</td>
                        <td>248</td>
                    </tr>

                </table>
            </div>

            <!-- 跳转页面 -->
            <!-- <div class="pageall">
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

            </div> -->
        </div>
        </div>
       
    </div>
    <script type="text/javascript">
    var days = '';
    layui.use('laydate', function(){
              var laydate = layui.laydate;
              //日期范围
                laydate.render({
                  elem: '#test1'
                  ,format:"yyyy/MM/dd"
                  ,range: true,
                    done: function(value, date, endDate){
                        days = value;
                        totalData(days);
                  }                  
                });
        });
    function nearday(value){
        totalData(value);
    }
    $(function(){
        totalData();
    })
    function totalData(day){
            var html = '';
            $.ajax({
                url: '<?php echo U("Home/Fans/fansData");?>',
                type: 'POST',
                data: {'day':day},
                success:function(data){
                    html += '<tr class="time">';
                        html += '<th>时间</th>';
                        html += '<th>新增粉丝数</th>';
                        html += '<th>取消粉丝数</th>';
                        html += '<th>净增粉丝数</th>';
                        html += '<th>累计粉丝数</th>';
                    html += '</tr>';
                    for(var i=0;i<data.details.length;i++){
                        html += '<tr>';
                            html += '<td>'+data.details[i]['day']+'</td>';
                            html += '<td>'+data.details[i]['add']+'</td>';
                            html += '<td>'+data.details[i]['cancel']+'</td>';
                            html += '<td>'+data.details[i]['only']+'</td>';
                            html += '<td>'+data.details[i]['total']+'</td>';
                        html += '</tr>';                        
                    }
                    
                    $('#tabledatas').html(html);
                    var days = new Array();
                    var addRes = new Array();
                    var cancelRes = new Array();
                    var onlyRes = new Array();
                    var totalRes = new Array();
                    for(var i = 0; i < data.days.length ; i++){
                        days[i] = data.days[i];
                    }
                    for(var i = 0; i < data.addRes.length ; i++){
                        addRes[i] = data.addRes[i];
                    }
                    for(var i = 0; i < data.cancelRes.length ; i++){
                        cancelRes[i] = data.cancelRes[i];
                    }
                    for(var i = 0; i < data.onlyRes.length ; i++){
                        onlyRes[i] = data.onlyRes[i];
                    }
                    for(var i = 0; i < data.totalRes.length ; i++){
                        totalRes[i] = data.totalRes[i];
                    }

                     //  初始化echarts实例
                    var myChart = echarts.init(document.getElementById('main'));
                    // 指定图表的配置项和数据
                    option = {

                        tooltip: {
                            trigger: 'axis'
                        },
                        legend: {
                            data: ['新增粉丝数', '取消粉丝数', '净增粉丝数', '累计粉丝数']
                        },
                        grid: {
                            left: '3%',
                            bottom: '3%',
                            containLabel: true
                        },

                        xAxis: {
                            type: 'category',
                            boundaryGap: false,
                            data: days
                        },
                        yAxis: {
                            type: 'value'
                        },
                        series: [{
                                name: '新增粉丝数',
                                type: 'line',
                                stack: '总量',
                                data: addRes
                            },
                            {
                                name: '取消粉丝数',
                                type: 'line',
                                stack: '总量',
                                data: cancelRes
                            },
                            {
                                name: '净增粉丝数',
                                type: 'line',
                                stack: '总量',
                                data: onlyRes
                            },
                            {
                                name: '累计粉丝数',
                                type: 'line',
                                stack: '总量',
                                data: totalRes
                            },

                        ]
                    };
                    //  使用刚指定的配置项和数据显示图表
                    myChart.clear();
                    myChart.setOption(option);                    
                }
            });
            
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