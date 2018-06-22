<?php 


	// 配合自动完成的加密函数
	function myHash($val){
		// dump($val);
		$hash = password_hash($val , PASSWORD_DEFAULT);
		// dump($hash);
		return $hash;
	}

	function myltrim($site){
		if(substr($site,6) !== 'http://' || substr($site,7) !== 'https://'){
			$res = 'http://'.$site;
		}
		return $res;
	}

	//邮箱验证
	/**
	  * 邮件发送函数
	  */
	function sendMail($to, $subject, $content) {
	    //导入vender\PHPMailer\classphpmailer.php
	    //注意：用vender函数导入的是.php的文件！！！！
	    Vendor('PHPMailer.class#phpmailer');
	    $mail = new PHPMailer(); /*实例化*/
	    $mail->IsSMTP(); /*启用SMTP*/
	    $mail->Host         =   C('MAIL_HOST'); /*smtp服务器的名称*/

	    $mail->SMTPDebug    =   C('MAIL_DEBUG'); /*开启调试模式，显示信息*/
	    $mail->Port         =   C('MAIL_PORT'); /*smtp服务器的端口号*/
	    $mail->SMTPSecure   =   C('MAIL_SECURE'); /*注意：要开启PHP中的openssl扩展,smtp服务器的验证方式*/

	    $mail->SMTPAuth     =   C('MAIL_SMTPAUTH'); /*启用smtp认证*/
	    $mail->Username     =   C('MAIL_USERNAME'); /*你的邮箱名*/
	    $mail->Password     =   C('MAIL_PASSWORD') ; /*邮箱密码*/
	    $mail->From         =   C('MAIL_FROM'); /*发件人地址（也就是你的邮箱地址）*/
	    $mail->FromName     =   C('MAIL_FROMNAME'); /*发件人姓名*/
	    $mail->AddAddress($to,"name");
	    $mail->WordWrap     =   50; /*设置每行字符长度*/
	    $mail->IsHTML(C('MAIL_ISHTML')); /* 是否HTML格式邮件*/
	    $mail->CharSet      =   C('MAIL_CHARSET'); /*设置邮件编码*/
	    $mail->Subject      =   $subject; /*邮件主题*/
	    $mail->Body         =   $content; /*邮件内容*/
	    $mail->AltBody      =   "This is the body in plain text for non-HTML mail clients"; /*邮件正文不支持HTML的备用显示*/
	    if(!$mail->Send()) {
	        return "邮件发送失败: " . $mail->ErrorInfo;
	        exit();
	    } else {
	        return true;
	    }
	}

	 /**
     * [setAvatar 设置头像]  
     * @param  [type] $uid   [用户论坛uid]
     * @param  [type] $size  [图片大小]
     */
    function setAvatar($uid, $size = 'middle', $type = '') {
        $size = in_array($size, array('big', 'middle', 'small')) ? $size : 'middle';
        $uid = abs(intval($uid));
        $uid = sprintf("%09d", $uid);
        $dir1 = substr($uid, 0, 3);
        $dir2 = substr($uid, 3, 2);
        $dir3 = substr($uid, 5, 2);
        $typeadd = $type == 'real' ? '_real' : '';
        $url = '../bbs/uc_server/data/avatar/'.$dir1.'/'.$dir2.'/'.$dir3.'/';
        // var_dump($url);exit;
        if(!file_exists($url) || !is_dir($url)){
            $res=mkdir($url,0777,true); 
        }
        $avatarUrl =  $url.substr($uid, -2).$typeadd."_avatar_$size.jpg";
        if(file_exists($avatarUrl) || is_file($url)){
            unlink($avatarUrl);
        }
        move_uploaded_file($_FILES['pic']['tmp_name'],$avatarUrl);
        $res = scalePic($avatarUrl,$maxX=50,$maxY=50,$pre='_small');
        $res = scalePic($avatarUrl,$maxX=300,$maxY=300,$pre='_big');
        $res = scalePic($avatarUrl,$maxX=200,$maxY=200,$pre='_middle');
        return $res;
    }

    /**
     * @function 等比缩放函数(以保存的方式实现)
     * @param string $picname 被缩放的处理图片源
     * @param int $maxX 缩放后图片的最大宽度
     * @param int $maxY 缩放后图片的最大高度
     * @param string $pre 缩放后图片名的前缀名
     * @return string 返回后的图片名称(带路径),如a.jpg --> s_a.jpg
     */
    function scalePic($picname,$maxX=100,$maxY=100,$pre='s_')
    {
        $info = getimagesize($picname); //获取图片的基本信息
        $width = $info[0];//获取宽度
        $height = $info[1];//获取高度
        //判断图片资源类型并创建对应图片资源
        $im = getPicType($info[2],$picname);
        //计算缩放比例
        $scale = ($maxX/$width)>($maxY/$height)?$maxY/$height:$maxX/$width;
        //计算缩放后的尺寸
        $sWidth = floor($width*$scale);
        $sHeight = floor($height*$scale);
        //创建目标图像资源
        $nim = imagecreatetruecolor($sWidth,$sHeight);
        //等比缩放
        imagecopyresampled($nim,$im,0,0,0,0,$sWidth,$sHeight,$width,$height);
        //输出图像
        $newPicName = outputImage($picname,$pre,$nim);
        //释放图片资源
        imagedestroy($im);
        imagedestroy($nim);
        return $newPicName;
    }

    /**
     * function 判断并返回图片的类型(以资源方式返回)
     * @param int $type 图片类型
     * @param string $picname 图片名字
     * @return 返回对应图片资源
     */
    function getPicType($type,$picname)
    {
        $im=null;
        switch($type)
        {
            case 1:  //GIF
                $im = imagecreatefromgif($picname);
                break;
            case 2:  //JPG
                $im = imagecreatefromjpeg($picname);
                break;
            case 3:  //PNG
                $im = imagecreatefrompng($picname);
                break;
            case 4:  //BMP
                $im = imagecreatefromwbmp($picname);
                break;
            default:
                die("不认识图片类型");
                break;
        }
        return $im;
    }

    /**
     * function 输出图像
     * @param string $picname 图片名字
     * @param string $pre 新图片名前缀
     * @param resourse $nim 要输出的图像资源
     * @return 返回新的图片名
     */
    function outputImage($picname,$pre,$nim)
    {
        $info = getimagesize($picname);
        $picInfo = pathInfo($picname);
        $match = '/(_middle)/';
        $name = preg_replace($match,$pre,$picInfo['basename']);
        $newPicName = $picInfo['dirname'].'/'.$name;//输出文件的路径
        switch($info[2])
        {
            case 1:
                imagegif($nim,$newPicName);
                break;
            case 2:
                imagejpeg($nim,$newPicName);
                break;
            case 3:
                imagepng($nim,$newPicName);
                break;
            case 4:
                imagewbmp($nim,$newPicName);
                break;
        }
        return $newPicName;
    }

    function checkWords($content){
        $word = D('common_word');
        $words = $word -> select();
        if($words){
            foreach ($words as $k => $v) {                              
                $pr = "/{$v['find']}/";
                preg_match($pr,$content,$match);
                if($match){
                    if($v['replacement'] != "{BANNED}" &  $v['replacement'] != "{MOD}" & $match){
                        $pr = "/{$v['find']}/";
                        $content =  preg_replace($pr,"{$v['replacement']}",$content);
                        $res['status'] = 1;
                        $res['content'] = $content;
                    }
                    if($match & $v['replacement'] == "{MOD}"){
                        $res['status'] = 2;
                        $res['content'] = '';
                    }
                    if($match & $v['replacement'] == "{BANNED}"){
                        $res['status'] = 3;
                        $res['content'] = '';
                    }                   
                }               
            }
        }else{
            $res['status'] = 0;
            $res['content'] = '';
        }
        
        return $res;
    }

    function getDateFromRange($startdate, $enddate){
        $stimestamp = strtotime($startdate);
        $etimestamp = strtotime($enddate);
        // 计算日期段内有多少天
        $days = ($etimestamp-$stimestamp)/86400+1;
        // 保存每天日期
        $date = array();
        for($i=0; $i<$days; $i++){
            $date[] = date('Y-m-d', $stimestamp+(86400*$i));
        }
        return $date;
    }

    