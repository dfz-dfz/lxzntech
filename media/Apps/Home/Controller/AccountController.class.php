<?php 
namespace Home\Controller;

class AccountController extends CommonController
{
	public function index(){
		$uid = $_SESSION['userdata']['uid'];
		$info = D('portal_media_info');
		$res = $info -> where("uid = $uid") -> find();
		$arr = D('portal_media_territory') -> select();
		foreach($arr as $k => $v){
	        $territory[$v['id']] = $v['territory'];
	    }
		$res['territory'] = $territory[$res['territory']];
		$res['avatar'] = preg_replace('/..\/bbs\//','/project/bbs/',$res['avatar']);
		$this -> assign('res',$res);
		$this -> display();
	}

	public function apply(){
		$uid = $_SESSION['userdata']['uid'];
		$info = D('portal_media_info');
		$res = $info -> where("uid = $uid") -> find();
		$this -> assign('res',$res);
		$this -> display();
	}

	public function doApply(){
		$uid = $_SESSION['userdata']['uid'];
		$apply = D('portal_media_apply');
		$linkman = I('linkman');
		$identity = I('identity');
		$linkphone = I('linkphone');
		$linkmail = I('linkmail');
		if(!$linkman || !$identity || !$linkphone){
			$return['status'] = 0;
			$return['data'] = '';
			$return['msg'] = '资料不能为空';
			$this -> ajaxReturn($return);
		}
		$public = A('Public');
		$img = $public -> UploadImages();
		foreach ($img as $k => $v) {
	    	$url = './Uploads'.$v['savepath'].$v['savename'];
    	}
    	$data['uid'] = $uid;
    	$data['linkman'] = $linkman;
    	$data['identity'] = $identity;
    	$data['linkphone'] = $linkphone;
    	$data['linkmail'] = $linkmail;
    	$data['info'] = $url;
    	$res = $apply -> add($data);
    	if($res){
    		$data2['uid'] = $uid;
			$data2['action'] = 3;
			$data2['dateline'] = time();
			D('media_edit_log') -> add($data2);
			$return['status'] = 1;
			$return['data'] = '';
			$return['msg'] = '提交申请成功';
    	}else{
			$return['status'] = 0;
			$return['data'] = '';
			$return['msg'] = '提交申请失败';
    	}
		$this -> ajaxReturn($return);
	}

	public function basicapply(){
		$uid = $_SESSION['userdata']['uid'];
		$territory = D('portal_media_territory');
		$info = D('portal_media_info');
		$res = $info -> where("uid = $uid") -> find();
		$type = $territory -> select();
		$this -> assign('type',$type);
		$this -> assign('res',$res);
		$this -> display();
	}

	public function company(){
		$uid = $_SESSION['userdata']['uid'];
		$info = D('portal_media_info');
		$res = $info -> where("uid = $uid") -> find();
		$this -> assign('res',$res);
		$this -> display();
	}

	public function editbase(){
		$r = $this -> check(1);
		if($r){
			$return['status'] = 0;
			$return['data'] = '';
			$return['msg'] = '15天内只能修改一次';
			$this -> ajaxReturn($return);
		}
		$uid = $_SESSION['userdata']['uid'];
		$buid = $_SESSION['userdata']['buid'];
		$user = D('portal_media_info');
		$data['nickname'] = I('nickname');
		$data['introduce'] = I('introduce');
		$data['territory'] = I('territory');
    	if($_FILES['pic']['size'] > 0){
	    	$avatar = setAvatar($buid);
	    	$data['avatar'] = $avatar;
    	}
		$res = $user -> where("uid = $uid") -> save($data);
		if($res){
			$data2['uid'] = $uid;
			$data2['action'] = 1;
			$data2['dateline'] = time();
			D('media_edit_log') -> add($data2);
			$return['status'] = 1;
			$return['data'] = '';
			$return['msg'] = '修改成功';
		}else{
			$return['status'] = 0;
			$return['data'] = '';
			$return['msg'] = '修改失败';
		}
		$this -> ajaxReturn($return);
	}

	public function editcompany(){
		$r = $this -> check(2);
		if($r){
			$return['status'] = 0;
			$return['data'] = '';
			$return['msg'] = '15天内只能修改一次';
			$this -> ajaxReturn($return);
		}
		$uid = $_SESSION['userdata']['uid'];
		$user = D('portal_media_info');
		$data['company'] = I('company');
		$data['address'] = I('address');
		$data['website'] = I('website');
		$res = $user -> where("uid = $uid") -> save($data);
		if($res){
			$data2['uid'] = $uid;
			$data2['action'] = 2;
			$data2['dateline'] = time();
			D('media_edit_log') -> add($data2);
			$return['status'] = 1;
			$return['data'] = '';
			$return['msg'] = '修改成功';
		}else{
			$return['status'] = 0;
			$return['data'] = '';
			$return['msg'] = '修改失败';
		}
		$this -> ajaxReturn($return);
	}

	public function checktime(){
		$action = I('action');
		$res = $this -> check($action);
		if($res){
			$this -> ajaxReturn(1);
		}else{
			$this -> ajaxReturn(0);
		}
	}

	public function check($action=''){
		$log = D('media_edit_log');
		$id = $_SESSION['userdata']['id'];
		$logData = $log -> where("mid = $id and action = $action") -> order('dateline desc') -> find();
		if($logData){
			$day = date('Ymd',$logData['dateline']);
			$day = strtotime($day)+86400*15;
			if($day>time()){
				return 1;
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}

	
}