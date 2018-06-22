<?php 
namespace Home\Controller;

class AccountController extends CommonController
{
	public function index(){
		$uid = $_SESSION['userdata']['uid'];
		$info = D('portal_media_info');
		$res = $info -> where("uid = $uid") -> find();
		$territory = [0=>'个人',1=>'媒体',2=>'企业',3=>'政府',4=>'其他组织'];
		$res['territory'] = $territory[$res['territory']];
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

	public function editName(){
		$user = $_SESSION['userdata']['uid'];
		$nickname = I('nickname');
		$res = $user -> where("uid = $uid") -> setField('nickname',$nickname);
		if($res){
			$this -> ajaxReturn(1);
		}else{
			$this -> ajaxReturn(0);
		}
	}

	public function editIntroduce(){
		$user = $_SESSION['userdata']['uid'];
		$introduce = I('introduce');
		$res = $user -> where("uid = $uid") -> setField('introduce',$introduce);
		if($res){
			$this -> ajaxReturn(1);
		}else{
			$this -> ajaxReturn(0);
		}
	}
	
}