<?php 
namespace Home\Controller;

class CommentController extends CommonController
{
	public function newMsg(){
		$notification = D('home_notification');
		$member = D('common_member');
		$comment = D('portal_comment');
		$title = D('portal_article_title');
		$like = D('portal_article_like');
		$uid = $_SESSION['userdata']['buid'];
		$where['uid'] = ['eq',$uid];
		$where['new'] = ['eq',1];
		$where['type'] = ['eq','article'];
		$where['form_idtype'] = ['eq','post'];
		$newMsg = $notification -> where($where) -> select();
		// dump($newMsg);
		foreach ($newMsg as $k => $v) {
			$id = $comment -> field('id') -> where("cid = {$v['from_id']}") -> find();
			if($id['id']){
				$res['avatar'] = "http://www.lxzntech.com/bbs/uc_server/avatar.php?uid={$v['uid']}&size=big";
				$username = $member -> where("uid = {$v['authorid']}") -> getField('username');
				$res['username'] = $username?$username:'匿名';
				$id = $comment -> field('id') -> where("cid = {$v['from_id']}") -> find();
				$articleTitle = $title -> where("aid = {$id['id']}") -> find();
				if($articleTitle['aid']){
					$res['cid'] = $v['from_id'];
					$res['aid'] = $articleTitle['aid'];
					$res['url'] = "http://www.lxzntech.com/bbs/portal.php?mod=view&aid=".$id['id'];
					$res['title'] = $articleTitle['title'];
					$comNum = $comment -> where("id = {$articleTitle['aid']} and idtype = 'aid'") -> count();
					$res['commentNum'] = $comNum;
					$likeNum = $like -> where("typeid = {$articleTitle['aid']} and type = 'aid'") -> count();
					$res['likeNum'] = $likeNum;
				}
				// dump($likeNum);
				$res['msg'] = $v['note'];
				$res['dateline'] = date('Y-m-d H:i:s',$v['dateline']);
			}		
			if($res['title']){
				$data[] = $res;
			}	
		}
		$this -> assign('data',$data);
		$this -> display();
	}

	public function article(){
		$this -> display();
	}

	public function articleData(){
		$title = D('portal_article_title');
		$comment = D('portal_comment');
		$uid = $_SESSION['userdata']['buid'];
		$map['uid'] = ['eq',$uid];
		$map['status'] = ['eq',0];
		$num = I('num')?I('num'):1;
		$row = ($num-1)*10;
		$total = $title  -> where($map) -> count();
		$article = $title -> field('aid,title,dateline') -> where($map) -> limit($row,10) -> select();
		foreach ($article as $k => $v) {
			$comNum = $comment -> where("id = {$v['aid']} and idtype = 'aid'") -> count();
			$article[$k]['commentNum'] = $comNum;
		}
		$page = ceil($total/10);
		if($article){
			$data['status'] = 1;
			$data['data'] = $article;
			$data['page'] = $page;
		}else{
			$data['status'] = 0;
			$data['data'] = [];
			$data['page'] = 0;
		}
		$this -> ajaxReturn($data);
	}

	public function articleDetail(){
		$title = D('portal_article_title');
		$aid = I('aid');
		$article = $title -> field('aid,title,dateline') -> where("aid = {$aid}") -> find();
		$article['dateline'] = date('Y-m-d H:i:s',$article['dateline']);
		$this -> assign('article',$article);
		$this -> display();
	}

	public function articleDetailData(){
		$uid = $_SESSION['userdata']['buid'];
		$aid = I('aid');
		$type = I('type')?I('type'):1;
		$num = I('num')?I('num'):1;
		$comment = D('portal_comment');
		$like = D('portal_article_like');
		$follow = D('home_follow');
		if($type == 2){
			$followuids = $follow -> where("followuid = $uid") -> getField('uid',true);
			$map['uid'] = ['in',$followuids];
		}
		$row = ($num-1)*10;
		$map['id'] = ['eq',$aid];
		$map['idtype'] = ['eq','aid'];
		$total = $comment  -> where($map) -> count();
		$res = $comment -> where($map) -> limit($row,10) -> select();
		foreach ($res as $k => $v) {
			$res[$k]['avatar'] = "http://www.lxzntech.com/uc_server/avatar.php?uid={$v['uid']}&size=big";
			$res[$k]['likeNum'] = $like -> where("type = 'cid' and typeid = {$v['cid']}") -> count();
		}
		$page = ceil($total/10);
		if($res){
			$data['status'] = 1;
			$data['data'] = $res;
			$data['total'] = $total;
			$data['page'] = $page;
		}else{
			$data['status'] = 0;
			$data['total'] = 0;
			$data['data'] = [];
			$data['page'] = 0;
		}
		$this -> ajaxReturn($data);
	}

	public function comment(){
		$comment = D('portal_comment');
		$moderate = D('portal_comment_moderate');
		$notification = D('home_notification');
		$count = D('portal_article_count');
		$cid = I('cid');
		$aid = I('aid');
		$content = I('content');
		$uid = $_SESSION['userdata']['buid'];
		$username = D('common_member') -> where("uid = $uid") -> getField('username');
		$return = checkWords($content);
		$data['status'] = 0;
		if($return['status'] == 1){
			$content = $return['content'];
		}elseif($return['status'] == 2){
			$data['status'] = 1;
		}elseif ($return['status'] == 3) {
			$res['status'] = 0;
			$res['data'] = 0;
			$res['msg'] = '提交内容含有不良信息，提交失败';
			$this -> ajaxReturn($res);
		}
		if($cid){
			$cRes = $comment -> where("cid = $cid") -> find();
			$match = '/<div class=\"quote\"><blockquote>.*?<\/blockquote><\/div>/';
			$cRes['message'] = preg_replace($match,'',$cRes['message']);
			$message = '<div class="quote"><blockquote>'.$cRes['username'].'：'.$cRes['message'].'</blockquote></div>'.$content;
		}
		$data['uid'] = $uid;
		$data['username'] = $username;
		$data['id'] = $aid;
		$data['id'] = 'aid';
		$data['postip'] = $_SERVER["REMOTE_ADDR"];
		$data['port'] = $_SERVER["SERVER_PORT"];
		$data['dateline'] = time();
		$data['message'] = $message;
		$insertid = $comment -> add($data);
		if($data['status'] == 1){
			if($insertid){
				$data2['id'] = $insertid;
				$data2['idtype'] = 'aid_cid';
				$data2['status'] = 0;
				$data2['dateline'] = time();
				$rateid = $moderate -> add($data2);
				if($rateid){
					$jsonData['status'] = 3;
					$jsonData['data'] = '';
					$jsonData['msg'] =  '您提交的内容需要审核';
					echo json_encode($jsonData);exit;
				}
			}else{
				$jsonData['status'] = 0;
				$jsonData['data'] = '';
				$jsonData['msg'] =  '提交错误，无法完成提交';
				echo json_encode($jsonData);exit;
			}
		}else{
			$noticeMap['uid'] = $cRes['uid'];
			$noticeMap['authorid'] = $uid;
			$noticeMap['from_idtype'] = [['eq','post'],['eq','quote'],'or'];
			$haveNotice = $notification -> where($noticeMap) -> find();
			
			if($haveNotice){
			// dump(222);exit;
				$data3['type'] = 'article';
				$data3['new'] = 1;
				$data3['note'] = $message;
				$data3['dateline'] = time();
				$data3['from_id'] = $insertid;
				$data3['category'] = "1";
				$result = $notification -> where("id = {$haveNotice['id']}") -> save($data3);
				$notification -> where("id = {$haveNotice['id']}") -> setInc('from_num');
			}else{
				$data4['uid'] = $cRes['uid'];
				$data4['type'] = 'article';
				$data4['new'] = 1;
				$data4['authorid'] = $uid;
				$data4['author'] = $username;
				$data4['note'] = $message;
				$data4['dateline'] = time();
				$data4['from_id'] = $insertid;
				$data4['from_idtype'] = 'post';
				$data4['from_num'] = 0;
				$data4['category'] = 1;
				$result = $notification -> add($data4);
			}
			if($result){
				$countMap['aid'] = ['eq',$aid];
				$r = $count -> where($countMap) -> setInc('commentnum');
			}
			if($r){
				$jsonData['status'] = 1;
				$jsonData['data'] = '';
				$jsonData['msg'] =  '成功回复';
			}else{
				$jsonData['status'] = 0;
				$jsonData['data'] = '';
				$jsonData['msg'] =  '回复失败';
			}
			echo json_encode($jsonData);exit;
			
		}
		
	}

}