<?php if (!defined('THINK_PATH')) exit();?><div class="header" style="background-color: #fefefe;">

    <div style="margin: 0 auto;max-width: 1100px;">
        <div class="top_first">
            <i class="iconfont lxznlogo">&#xe615;</i>
            <div class="lxzntt">章鱼先生</div>
            <!-- 信息数量 -->
            <div class="top_main">
                <i class="iconfont" style="font-size: 30px;">&#xe63a;</i>
                <div class="information_num">2</div>
            </div>
            <!-- 头像部分 -->
            <div class="sculpture">
                <i class="iconfont">&#xe61f;</i>
            </div>
            <!-- 智能企业部分 -->
            <div class="share">
                <a href="javascript:;"><?php echo ($nickname); ?></a>
                <div class="sharett"><?php echo ($type); ?></div> 
            </div>
            <div class="triangle-down">
                    <a href="<?php echo U('Home/Admin/logout');?>" style="text-decoration: none;">退出</a>
            </div>
        </div>
    </div>
</div>