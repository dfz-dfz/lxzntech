<?php 
namespace Home\Controller;

class AttachmentController extends CommonController
{
	public function index(){
        $uid = $_SESSION['userdata']['uid'];
        $num = $uid%10;
        $attach = D("media_attachment_{$num}");
        $type = I('type') == 2?'video':'image';
        $map['uid'] = ['eq',$uid];
        $map['type'] = ['eq',$type];
        $res = $attach -> where($map) -> select();
        foreach ($res as $k => &$v) {
            $replace = '/\.\/Uploads\//';
            $v['url'] = preg_replace($replace,'/project/media/Uploads/',$v['url']);
        }
        $this -> assign('data',$res);
        $this -> display();
    }

    public function uploadImage(){
        $public = A('Public');
        $uid = $_SESSION['userdata']['uid'];
        $num = $uid%10;
        $attach = D("media_attachment_{$num}");
        $res = $public -> UploadImages(true);
        if($res['pic']){
            $data['uid'] = $uid;
            $data['dateline'] = time();
            $savename = preg_replace("/\..*/",'',$res['pic']['savename']);
            $data['filename'] = $savename;
            $data['filesize'] = $res['pic']['size'];
            $filetype = preg_replace('/image\//','',$res['pic']['type']);
            $data['filetype'] = $filetype;
            $data['type'] = 'image';
            $data['url'] = './Uploads'.$res['pic']['savepath'].$res['pic']['savename'];
            $data['thumb'] = './Uploads'.$res['pic']['savepath'].'thumb_'.$res['pic']['savename'];
            $insertid = $attach -> add($data);
        }
        if($insertid){
            $result['status'] = 1;
            $result['data'] = '';
            $result['msg'] = '上传成功';
        }else{
            $result['status'] = 0;
            $result['data'] = '';
            $result['msg'] = '上传失败';
        }
        $this -> ajaxReturn($result);
    }

    public function delImage(){
        $uid = $_SESSION['userdata']['uid'];
        $id = I('id');
        $num = $uid%10;
        $attach = D("media_attachment_{$num}");
        if($id){
            if(is_array($id)){
                foreach ($id as $k => $v) {
                    $res = $attach -> where("id = $v and uid = $uid") -> find();
                    unlink($res['url']);
                    unlink($res['thumb']);
                    $res = $attach -> where("id = $v and uid = $uid") -> delete();
                }
            }else{
                $res = $attach -> where("id = $id and uid = $uid") -> find();
                unlink($res['url']);
                unlink($res['thumb']);
                $res = $attach -> where("id = $id and uid = $uid") -> delete();
            }
        }
        if($res){
            $data['status'] = 1;
            $data['data'] = '';
            $data['msg'] = '删除成功';
        }else{
            $data['status'] = 0;
            $data['data'] = '';
            $data['msg'] = '删除失败';
        }
        $this -> ajaxReturn($data);
    }

    public function uploadVideo(){
        $public = A('public');
        $uid = $_SESSION['userdata']['uid'];
        $num = $uid%10;
        $attach = D("media_attachment_{$num}");
        $info = $public -> UpVideo();

        if($info === 'type'){
            $return['status'] = 0;
            $return['data'] = [];
            $return['msg'] = "只能上传MP4/FLV/AVI格式的视频文件";
            $this -> ajaxReturn($return);
        }
        if($info['video']){
            $data['uid'] = $uid;
            $data['dateline'] = time();
            $savename = preg_replace("/\..*/",'',$info['video']['savename']);
            $data['filename'] = $savename;
            $data['filesize'] = $info['video']['size'];
            $filetype = preg_replace('/image\//','',$info['video']['type']);
            $data['filetype'] = $filetype;
            $data['type'] = 'video';
            $data['url'] = './Uploads'.$info['video']['savepath'].$info['video']['savename'];
            // $data['thumb'] = './Uploads'.$res['video']['savepath'].'thumb_'.$res['video']['savename'];
            $insertid = $attach -> add($data);
        }
        if($insertid){
            $return['status'] = 1;
            $return['data'] = [];
            $return['msg'] = "上传成功";
        }else{
            $return['status'] = 0;
            $return['data'] = [];
            $return['msg'] = "上传失败";
        }
        $this -> ajaxReturn($return);
        // dump($insertid);exit;
    }

    public function test(){
        $this-> display();
    }

}