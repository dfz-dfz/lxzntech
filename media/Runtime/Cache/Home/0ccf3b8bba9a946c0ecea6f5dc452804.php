<?php if (!defined('THINK_PATH')) exit();?> <div class="container_left">
    <ul>
        <li>
            <a href="<?php echo U('Home/Admin/index');?>">
                <i class="iconfont icon-house" style="font-size: 26px;">&#xe603;</i>
                <span class="status" <?php echo ($catname=='Admin'?'style="color: #3cb9ac;"':''); ?>>首页</span>
            </a>
        </li>
        <li>
            <a href="javascript:;">
                <i class="iconfont icon-house">&#xe65c; </i>
                <span>管理</span>
            </a>
            <div class="menu">
                <a href="<?php echo U('Home/Main/main');?>" <?php echo ($catname=='Main'?'style="color: #3cb9ac;"':''); ?> id="content">我的内容</a>
                <a href="<?php echo U('Home/Attachment/index');?>" <?php echo ($catname=='Attachment'?'style="color: #3cb9ac;"':''); ?> id="attachment">我的素材</a>
            </div>
        </li>
        <li>
            <a href="javascript:;">
                <i class="iconfont icon-house">&#xe61c; </i>
                <span>数据</span>
            </a>
            <div class="menu">
                <a href="<?php echo U('Home/Count/single');?>" <?php echo ($catname=='Count'?'style="color: #3cb9ac;"':''); ?> id="totalsingle">图文统计</a>
                <a href="<?php echo U('Home/Fans/index');?>" <?php echo ($catname=='Fans'?'style="color: #3cb9ac;"':''); ?> id="fansnumcount">粉丝量统计</a>
            </div>
        </li>
        <li>
            <a href="javascript:;">
                <i class="iconfont icon-house" style="font-size: 32px;">&#xe63c; </i>
                <span>互动</span>
            </a>
            <div class="menu">
                <a href="<?php echo U('Home/Comment/newmsg');?>" <?php echo ($catname=='Comment'?'style="color: #3cb9ac;"':''); ?> id="comment">评论管理</a>
                <a href="<?php echo U('Home/Messages/fans');?>" <?php echo ($catname=='Messages'?'style="color: #3cb9ac;"':''); ?> id="message">互动消息</a>
            </div>
        </li>
        <li>
            <a href="javascript:;">
                <i class="iconfont icon-house" style="font-size: 30px;">&#xe639; </i>
                <span>设置</span>
            </a>
            <div class="menu">
                <a href="<?php echo U('Home/Account/index');?>" <?php echo ($catname=='Account'?'style="color: #3cb9ac;"':''); ?> id="accountset">账号设置</a>
            </div>
        </li>
    </ul>
</div>