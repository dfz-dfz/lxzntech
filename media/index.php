<?php
session_start();//开启会话控制SESSION
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.erhuo.com )
// +----------------------------------------------------------------------
// | Author: luojinlin <ljldianxiaoer@163.com>
// +----------------------------------------------------------------------

// 应用入口文件
// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
// define('APP_DEBUG',true);

// 定义应用目录
define('APP_PATH','./Apps/');

// 定义应用目录
// define('HOST_ADDR','localhost');

// 定义应用目录
define('HOST_ADDR','localhost');

// 自定义常量用于引入
define( 'THINK_PATH' , str_replace( '\\','/' , realpath( '../ThinkPHP' ) . '/' ) );

// 定义运行时目录
define('RUNTIME_PATH','./Runtime/');
//设置默认时区
date_default_timezone_set('PRC');


// 引入ThinkPHP入口文件
require  THINK_PATH . 'ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单