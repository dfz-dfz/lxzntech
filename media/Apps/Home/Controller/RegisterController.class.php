<?php 
namespace Home\Controller;
use Think\Controller;

class RegisterController extends Controller
{
	public function _empty($name){     
        $this -> display("register");
    }

    // 显示注册页面
	public function register(){
		$this -> display();
	}

	// 进行注册操作
	public function doRegister(){
		$username = I('username');
		$password = I('password');
		$code = I('code');
		$check = $this -> checkCode($username,$code);
		$return['data'] = '';
		switch ($check) {
			case 0:
				$return['status'] = 0;
				$return['msg'] = '验证码错误';
				$this -> ajaxReturn($return);
				break;
			case 2:
				$return['status'] = 2;
				$return['msg'] = '验证码已失效';
				$this -> ajaxReturn($return);
				break;
			case 3:
				$return['status'] = 3;
				$return['msg'] = '验证码已使用';
				$this -> ajaxReturn($return);
				break;
		}

		$uid = $this -> addUser($username,$password);
		if($uid === 'have'){
			$return['status'] = 4;
			$return['msg'] = '该号码已注册或者已绑定其他账号';
			$this -> ajaxReturn($return);
		}elseif (!$uid) {
			$return['status'] = 0;
			$return['msg'] = '注册失败';
			$this -> ajaxReturn($return);
		}
		$mediaUser = D('portal_media_users');
		$data['buid'] = $uid;
		$data['username'] = $username;
		$data['password'] = password_hash($password,PASSWORD_DEFAULT);
		$res = $mediaUser -> add($data);
		if($res){
			$userdata = $mediaUser -> find($res);
			$_SESSION['userdata'] = $userdata;
			$return['status'] = 1;
			$return['msg'] = '注册成功';
		}else{
			$return['status'] = 0;
			$return['msg'] = '注册失败';
		}
		$this -> ajaxReturn($return);
	}

	// 添加论坛用户
	public function addUser($username, $password, $email='', $uid = 0, $questionid = '', $answer = '', $regip = '') {
        $ucmember = D('ucenter_members');
        $commember = D('common_member');
        $memberfields = D('ucenter_memberfields');
        $notification = D('home_notification');
        $memberSta = D('common_member_status');
        $memberPro = D('common_member_profile');
        $memberForum = D('common_member_field_forum');
        $memberHome = D('common_member_field_home');
        $map['username'] = ['eq',$username];
        $map2['mobile'] = ['eq',$username];
        $user = $ucmember -> where($map) -> select();
        $mobile = $memberPro -> where($map2) -> select();
        if($user || $mobile){
            return 'have';
        }
        $match = '/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z0-9]{2,6}$/';
       	preg_match($match,$username,$m);
       	$phoneMatch = '/^1[3|5|7|8]\d{9}$/';
       	if($m){
       		$mail = $username;
       	}
        $regip = $_SERVER['REMOTE_ADDR'];
        $salt = substr(uniqid(rand()), -6);
        $password = md5(md5($password).$salt);
        $datetime = time();
        $ucData['username'] = $username;
        $ucData['password'] = $password;
        $ucData['regip'] = $regip;
        $ucData['regdate'] = $datetime;
        $ucData['salt'] = $salt;
        $ucmember -> add($ucData);
        $comPWD =  md5(mt_rand(100000000,999999999));//伪密码，有毛线用
        $uname = md5(mt_rand(0,999999999));//随机昵称
        $commonData['username'] = $uname;
        $commonData['password'] = $comPWD;
        $commonData['status'] = 0;
        $commonData['groupid'] = 10;
        $commonData['regdate'] = $datetime;
        $commonData['credits'] = 2;
        $commonData['timeoffset'] = 9999;
        $commonData['newprompt'] = 1;
        $uid = $commember -> add($commonData);
        if($uid){
            $memberfieldSql = "INSERT INTO `pre_ucenter_memberfields` SET uid='$uid'";
            $memberfields -> execute($memberfieldSql);
            $notificationSql = "INSERT INTO `pre_home_notification` (`uid`, `type`, `new`, `authorid`, `author`, `note`, `dateline`, `from_id`, `from_idtype`, `from_num`, `category`) VALUES ('$uid', 'system', '1', '0', '', '尊敬的test，您已经注册成为Comsenz Inc.的会员，请您在发表言论时，遵守当地法律法规。<br />\r\n如果您有什么疑问可以联系管理员，Email&#58; admin@admin.com。<br />\r\n<br />\r\n<br />\r\nDiscuz! Board<br />\r\n2018-4-20 15&#58;00', '1524207646', '0', 'welcomemsg', '1', '3')";
            $notification -> execute($notificationSql);

            $memberStatus = "INSERT INTO `pre_common_member_status` (`uid`, `regip`, `lastip`, `port`, `lastvisit`, `lastactivity`, `lastpost`, `lastsendmail`, `invisible`, `buyercredit`, `sellercredit`, `favtimes`, `sharetimes`, `profileprogress`) VALUES ('$uid', '$regip', '$regip', '0', '$datetime', '$datetime', '0', '0', '0', '0', '0', '0', '0', '0')";
            $memberSta -> execute($memberStatus);

            $memberProfile = "INSERT INTO `pre_common_member_profile` (`uid`, `realname`, `gender`, `birthyear`, `birthmonth`, `birthday`, `constellation`, `zodiac`, `telephone`, `mobile`, `idcardtype`, `idcard`, `address`, `zipcode`, `nationality`, `birthprovince`, `birthcity`, `birthdist`, `birthcommunity`, `resideprovince`, `residecity`, `residedist`, `residecommunity`, `residesuite`, `graduateschool`, `company`, `education`, `occupation`, `position`, `revenue`, `affectivestatus`, `lookingfor`, `bloodtype`, `height`, `weight`, `alipay`, `icq`, `qq`, `yahoo`, `msn`, `taobao`, `site`, `bio`, `interest`, `field1`, `field2`, `field3`, `field4`, `field5`, `field6`, `field7`, `field8`) VALUES ('$uid', '', '0', '0', '0', '0', '', '', '', '$username', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');";

            $memberPro -> execute($memberProfile);
            $memberForumSql = "INSERT INTO `pre_common_member_field_forum` (`uid`, `publishfeed`, `customshow`, `customstatus`, `medals`, `sightml`, `groupterms`, `authstr`, `groups`, `attentiongroup`) VALUES ('$uid', '0', '26', '', '', '', '', '', '', '')";
            $memberForum -> execute($memberForumSql);
            $memberHomeSql = "INSERT INTO `pre_common_member_field_home` (`uid`, `videophoto`, `spacename`, `spacedescription`, `domain`, `addsize`, `addfriend`, `menunum`, `theme`, `spacecss`, `blockposition`, `recentnote`, `spacenote`, `privacy`, `feedfriend`, `acceptemail`, `magicgift`, `stickblogs`) VALUES ('$uid', '', '', '', '', '0', '0', '0', '', '', '', '', '', '', '', '', '', '')";
            $memberHome -> execute($memberHomeSql);

        }       
        return $uid;
    }

    // 显示选择类型页面
    public function choosetype(){
    	$this -> display();
    }

    // 进行选择操作
    public function doChoose(){
		$mediaUser = D('portal_media_users');
    	$uid = $_SESSION['userdata']['uid'];
    	$type = I('type');
    	$type = intval($type);
    	$arr = ['1','2','3','4','5'];
    	if(!in_array($type, $arr)){
    		$return['status'] = 0;
    		$return['data'] = '';
    		$return['msg'] = '没有该类型';
    		$this -> ajaxReturn($return);
    	}
    	$data['type'] = $type;
    	$data['status'] = 1;
    	$res = $mediaUser -> where("uid = {$uid}") -> save($data);
    	if($res){
    		$return['status'] = 1;
    		$return['data'] = '';
    		$return['msg'] = '完成类型添加';
    	}else{
    		$return['status'] = 0;
    		$return['data'] = '';
    		$return['msg'] = '类型添加失败';
    	}
		$this -> ajaxReturn($return);
    }

    // 用户资料页面显示
    public function info(){
    	$userdata = $_SESSION['userdata'];
    	$territory = D('portal_media_territory');
    	$res = $territory -> select();
    	$this -> assign('territory',$res);
    	$this -> assign('uid',$userdata['uid']);
    	$this -> assign('buid',$userdata['buid']);
    	$this -> display();
    }

    // 进行用户资料录入
    public function doInfo(){
    	$uid = $_SESSION['userdata']['buid'];
    	$nickname = I('nickname');
    	$introduce = I('introduce');
    	$avatar = setAvatar($uid);
    	$territory = I('territory');
    	$linkman = I('linkman');
    	$identity = I('identity');
    	$linkphone = I('linkphone');
    	$linkmail = I('linkmail');
    	$company = I('company');
    	$address = I('address');
    	$website = I('website');
    	$public = A('public');
    	$proveInfo = $public -> UploadImages();
    	foreach ($proveInfo as $k => $v) {
	    	$url = './Uploads'.$v['savepath'].$v['savename'];
    	}
    	$prove = $url;
    	$data['uid'] = $uid;
    	$data['nickname'] = $nickname;
    	$data['introduce'] = $introduce;
    	$data['avatar'] = $avatar;
    	$data['territory'] = $territory;
    	$data['linkman'] = $linkman;
    	$data['identity'] = $identity;
    	$data['linkphone'] = $linkphone;
    	$data['linkmail'] = $linkmail;
    	$data['company'] = $company;
    	$data['address'] = $address;
    	$data['website'] = $website;
    	$data['prove'] = $prove;
    	$info = D('portal_media_info');
    	$user = D('portal_media_users');
    	$res = $info -> add($post);
    	if($res){
    		$user -> where("buid = $buid") -> setField('status',2);
    		$return['status'] = 1;
    		$return['data'] = '';
    		$return['msg'] = '录入成功';
    	}else{
    		$return['status'] = 1;
    		$return['data'] = '';
    		$return['msg'] = '录入失败';
    	}
    	$this -> ajaxReturn($return);
    }

    public function named(){
    	$this -> display();
    }

    // 显示头像替换页面
	public function avatar(){
    	$userdata = $_SESSION['userdata'];
    	$this -> assign('uid',$userdata['uid']);
    	$this -> assign('buid',$userdata['buid']);
    	$this -> display();
    	
    }

    // 进行头像替换操作
    public function doAvatar(){
    	$buid = I('buid');
    	if($buid){
    		$link = setAvatar($buid);
    		echo $link;
    	}else{
    		echo '设置失败';
    	}
    }

    // 检查用户手机是否注册或者是已经绑定其他账号
    public function checkMobile(){
    	$phone = I("post.phone");
    	$user = D('portal_media_users');
    	$profile = D('common_member_profile');
    	$num = $user -> where("username = $phone") -> count();
    	$unum = $profile -> where("mobile = $phone") -> count();
    	if($num || $unum){
    		$this -> ajaxReturn(1);
    	}else{
    		$this -> ajaxReturn(0);
    	}
    }
    
    // 检查验证码
	public function checkCode($phone='',$code=''){
	    $veriCode = D('common_verification_code');
	    $phone = $phone?$phone:I('phone');
	    $code = $code?$code:I('code');
	    $map['phone'] = ['eq',$phone];
	    $map['code'] = ['eq',$code];
	    $daytime = date('Ymd',time());
	    $map['daytime'] = ['eq',$daytime];
	    $res = $veriCode -> where($map) -> select();
	    if(!$res){
	        return 0;//验证失败返回值
	    }
	    if($res[0]['status']){
	        return 3;//已使用返回值
	    }
	    $dateline = $res[0]['dateline']+5*60;
	    if($dateline < time()){
	        return 2;//失效返回值
	    }
	    $data['status'] = 1;
	    $veriCode -> where($map) -> save($data);
	    return 1;//成功返回值
	}

}