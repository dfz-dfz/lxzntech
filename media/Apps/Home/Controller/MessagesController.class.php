<?php 
	namespace Home\Controller;

	/**
	* 
	*/
	class MessagesController extends CommonController
	{
		
		public function fans()
		{
			$this -> display();
		}

		public function collect()
		{
			$this -> display();
		}
		
		public function transform()
		{
			$this -> display();
		}

		public function fansData()
		{
			$fans = D('home_follow');
			$fav = D('media_article_fav');
			$type = I('type')?I('type'):1;
			$uid = $_SESSION['userdata']['buid'];
			$num = I('num')?I('num'):1;
			$row = ($num-1)*10;
			switch ($type) {
				case '1':
					$total = $fans -> where("followuid = $uid") -> count();
					$arr = $fans -> where("followuid = $uid") -> limit($row,10) -> order('dateline desc') -> select();
					break;
				case '2':
					$total = $fav -> where("authorid = $uid and action = 3") -> count();
					$arr = $fav -> where("authorid = $uid and action = 3") -> limit($row,10) -> order('dateline desc') -> select();
					break;
				case '3':
					$total = $fav -> where("authorid = $uid and action = 2") -> count();
					$arr = $fav -> where("authorid = $uid and action = 2") -> limit($row,10) -> order('dateline desc') -> select();
					break;
			}
			$page = ceil($total/10);
			foreach ($arr as $k => $v) {
				$res['aid'] = $v['aid'];
				$res['uid'] = $v['uid'];
				$res['avatar'] = "http://www.lxzntech.com/uc_server/avatar.php?uid={$v['uid']}&size=big";
				$res['username'] = $v['username'];
				$res['title'] = $v['title'];
				$res['dateline'] = date('Y-m-d H:i:s',$v['dateline']);
				$result[] = $res;
			}
			if($arr){
				$data['status'] = 1;
				$data['data'] = $result;	
				$data['page'] = $page;
			}else{
				$data['status'] = 0;
				$data['data'] = [];	
				$data['page'] = 0;
			}
			$this -> ajaxReturn($data);
		}
	}