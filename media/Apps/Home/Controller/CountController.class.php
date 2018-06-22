<?php 
namespace Home\Controller;

class CountController extends CommonController
{
	public function single(){
		$this -> display();
	}

	public function singleData(){
		$article = D('media_article');
		$uid = $_SESSION['userdata']['buid'];
		$date = I('day');
		if(is_numeric($date)){
			$start_time = strtotime(date('Y-m-d', strtotime("-{$date} days")));
			$end_time = $end_time?$end_time:strtotime(date('Y-m-d',strtotime('+1 days')));
		}else{
			$date = explode('-',$date);
			$start_time = trim($date[0]);
			$end_time = trim($date[1]);
			$start_time = strtotime($start_time);
			$end_time = strtotime($end_time);
		}
		$num = I('num')?I('num'):1;
		$row = ($num-1)*10;
		$start_time = $start_time?$start_time:strtotime(date('Y-m-d', strtotime('-6 days')));
		$end_time = $end_time?$end_time:strtotime(date('Y-m-d',strtotime('+1 days')));
		$where['uid'] = ['eq',$uid];
		$where['status'] = ['eq',0];
		$where['dateline'] = [['lt',$end_time],['gt',$start_time]];
		$total = $article -> where($where) -> count();
		$res = $article -> where($where) -> limit($row,10) -> select();
		foreach ($res as $k => $v) {
			$res[$k]['dateline'] = date('Y-m-d',$v['dateline']);
		}
		$page = ceil($total/10);
		if(count($res)){
			$data['status'] = 1;
			$data['data'] = $res;
			$data['page'] = $page;
		}else{
			$data['status'] = 0;
			$data['data'] = [];
			$data['page'] = 0;
		}
		$this -> ajaxReturn($data);
	}

	public function total(){
		$today = date('Ymd',time());
		$yestoday = date('Ymd',strtotime('-1 days'));
		$uid = $_SESSION['userdata']['buid'];
		$title = D('portal_article_title');
		$log = D('portal_article_log');
		$comment = D('portal_comment');
		$aid = $title -> where("uid = $uid") -> order('aid') -> getField('aid',true);
		if($aid){
			// 阅读量
			$map['aid'] = ['in',$aid];
			$map['day'] = ['eq',$yestoday];
			$map['action'] = ['eq',1];
			$yRes = $log -> where($map) -> count();
			$where['aid'] = ['in',$aid];
			$where['day'] = ['eq',$today];
			$where['action'] = ['eq',1];
			$tRes = $log -> where($where) -> count();
			$viewnum = ($tRes - $yRes)/($yRes?$yRes:1);
			$viewnum = round($num*100,2)."%";
			// 分享量
			$map['aid'] = ['in',$aid];
			$map['day'] = ['eq',$yestoday];
			$map['action'] = ['eq',2];
			$shareyRes = $log -> where($map) -> count();
			$where['aid'] = ['in',$aid];
			$where['day'] = ['eq',$today];
			$where['action'] = ['eq',2];
			$sharetRes = $log -> where($where) -> count();
			$sharenum = ($sharetRes - $shareyRes)/($shareyRes?$shareyRes:1);
			$sharenum = round($sharenum*100,2)."%";

			// 收藏量
			$map['aid'] = ['in',$aid];
			$map['day'] = ['eq',$yestoday];
			$map['action'] = ['eq',2];
			$favyRes = $log -> where($map) -> count();
			$where['aid'] = ['in',$aid];
			$where['day'] = ['eq',$today];
			$where['action'] = ['eq',2];
			$favtRes = $log -> where($where) -> count();
			$favnum = ($favtRes - $favyRes)/($favyRes?$favyRes:1);
			$favnum = round($favnum*100,2)."%";


			$yd = strtotime($yestoday);
			$td = strtotime($today);
			$to = strtotime(date('Ymd',strtotime('+1 days')));
			$commentMap['id'] = ['in',$aid];
			$commentMap['idtype'] = ['eq','aid'];
			$commentMap['dateline'] = [['lt',$td],['gt',$yd]];
			$comyRes = $comment -> where($commentMap) -> count();
			$commentWhere['id'] = ['in',$aid];
			$commentWhere['idtype'] = ['eq','aid'];
			$commentWhere['dateline'] = [['lt',$to],['gt',$td]];
			$comtRes = $comment -> where($commentWhere) -> count();
			$comnum = ($comtRes - $comyRes)/($comyRes?$comyRes:1);
			// $comnum = ($comyRes - $comtRes)/($comyRes?$comyRes:1);
			$comnum = round($comnum*100,2)."%";
		}else{
			$viewnum = '0%';
			$tRes = 0;
			$sharenum = '0%';
			$sharetRes = 0;
			$favnum = '0%';
			$favtRes = 0;
			$comnum = '0%';
			$comtRes = 0;
		}
		

		$this -> assign('viewPercent',$viewnum);
		$this -> assign('view',$tRes);
		$this -> assign('sharePercent',$sharenum);
		$this -> assign('share',$sharetRes);
		$this -> assign('favPercent',$favnum);
		$this -> assign('fav',$favtRes);
		$this -> assign('comPercent',$comnum);
		$this -> assign('com',$comtRes);
		$this -> display();
	}

	public function singleDatail(){
		$aid = I('aid');
		$log = D('portal_article_log');
		$comment = D('portal_comment');
		$today = date('Ymd',time());
		$yestoday = date('Ymd',strtotime('-1 days'));

		// 单篇阅读量统计
		$map['aid'] = ['eq',$aid];
		$map['action'] = ['eq',1];
		$map['day'] = ['eq',$today];
		$tnum = $log -> where($map) -> count();
		$map['day'] = ['eq',$yestoday];
		$ynum = $log -> where($map) -> count();
		$viewPercent = ($tnum - $ynum)/($ynum?$ynum:1);
		$viewPercent = round($viewPercent*100,2)."%";

		// 评论量统计
		$yd = strtotime($yestoday);
		$td = strtotime($today);
		$to = strtotime(date('Ymd',strtotime('+1 days')));
		$commentMap['id'] = ['eq',$aid];
		$commentMap['idtype'] = ['eq','aid'];
		$commentMap['dateline'] = [['lt',$td],['gt',$yd]];
		$comyRes = $comment -> where($commentMap) -> count();
		$commentWhere['dateline'] = [['lt',$to],['gt',$td]];
		$comtRes = $comment -> where($commentWhere) -> count();
		$comPercent = ($comtRes - $comyRes)/($comyRes?$comyRes:1);
		// $comPercent = ($comyRes - $comtRes)/($comyRes?$comyRes:1);
		$comPercent = round($comPercent*100,2)."%";

		// 单篇分享量统计
		$map2['aid'] = ['eq',$aid];
		$map2['action'] = ['eq',2];
		$map2['day'] = ['eq',$today];
		$sharetnum = $log -> where($map2) -> count();
		$map2['day'] = ['eq',$yestoday];
		$shareynum = $log -> where($map2) -> count();
		$sharePercent = ($sharetnum - $shareynum)/($shareynum?$shareynum:1);
		$sharePercent = round($sharePercent*100,2)."%";


		// 单篇收藏量统计
		$map3['aid'] = ['eq',$aid];
		$map3['action'] = ['eq',3];
		$map3['day'] = ['eq',$today];
		$favtnum = $log -> where($map3) -> count();
		$map3['day'] = ['eq',$yestoday];
		$favynum = $log -> where($map3) -> count();
		$favPercent = ($favtnum - $favynum)/($favynum?$favynum:1);
		$favPercent = round($favPercent*100,2)."%";

		$data['viewnum'] = $tnum;
		$data['viewPercent'] = $viewPercent;
		$data['comnum'] = $comtRes;
		$data['comPercent'] = $comPercent;
		$data['sharenum'] = $sharetRes;
		$data['sharePercent'] = $sharePercent;
		$data['favnum'] = $favtRes;
		$data['favPercent'] = $favPercent;

		$this -> ajaxReturn($data);
	}

	public function totalData(){
		$today = date('Ymd',time());
		$yestoday = date('Ymd',strtotime('-1 days'));
		$uid = $_SESSION['userdata']['buid'];
		$title = D('portal_article_title');
		$log = D('portal_article_log');
		$comment = D('portal_comment');
		$aid = $title -> where("uid = $uid") -> order('aid') -> getField('aid',true);
		$date = I('day');
		if($aid){
			// 阅读量
			$map['aid'] = ['in',$aid];
			$map['day'] = ['eq',$yestoday];
			$map['action'] = ['eq',1];
			$yRes = $log -> where($map) -> count();
			$where['aid'] = ['in',$aid];
			$where['day'] = ['eq',$today];
			$where['action'] = ['eq',1];
			$tRes = $log -> where($where) -> count();
			$viewnum = ($tRes - $yRes)/($yRes?$yRes:1);
			$viewnum = round($viewnum*100,2)."%";

			// 分享量
			$map['aid'] = ['in',$aid];
			$map['day'] = ['eq',$yestoday];
			$map['action'] = ['eq',2];
			$shareyRes = $log -> where($map) -> count();
			$where['aid'] = ['in',$aid];
			$where['day'] = ['eq',$today];
			$where['action'] = ['eq',2];
			$sharetRes = $log -> where($where) -> count();
			$sharenum = ($sharetRes - $shareyRes)/($shareyRes?$shareyRes:1);
			$sharenum = round($sharenum*100,2)."%";

			// 收藏量
			$map['aid'] = ['in',$aid];
			$map['day'] = ['eq',$yestoday];
			$map['action'] = ['eq',2];
			$favyRes = $log -> where($map) -> count();
			$where['aid'] = ['in',$aid];
			$where['day'] = ['eq',$today];
			$where['action'] = ['eq',2];
			$favtRes = $log -> where($where) -> count();
			$favnum = ($favtRes - $favyRes)/($favyRes?$favyRes:1);
			$favnum = round($favnum*100,2)."%";


			$yd = strtotime($yestoday);
			$td = strtotime($today);
			$to = strtotime(date('Ymd',strtotime('+1 days')));
			$commentMap['id'] = ['in',$aid];
			$commentMap['idtype'] = ['eq','aid'];
			$commentMap['dateline'] = [['lt',$td],['gt',$yd]];
			$comyRes = $comment -> where($commentMap) -> count();
			$commentWhere['id'] = ['in',$aid];
			$commentWhere['idtype'] = ['eq','aid'];
			$commentWhere['dateline'] = [['lt',$to],['gt',$td]];
			$comtRes = $comment -> where($commentWhere) -> count();
			$comnum = ($comtRes - $comyRes)/($comyRes?$comyRes:1);
			// $comnum = ($comyRes - $comtRes)/($comyRes?$comyRes:1);
			$comnum = round($comnum*100,2)."%";

			// 表格图像显示数据
			if(is_numeric($date)){
				$start_time = strtotime(date('Y-m-d', strtotime("-{$date} days")));
				$end_time = $end_time?$end_time:strtotime(date('Y-m-d',strtotime('+1 days')));
			}else{
				$date = explode('-',$date);
				$start_time = trim($date[0]);
				$end_time = trim($date[1]);
				$start_time = strtotime($start_time);
				$end_time = strtotime($end_time);
			}
			$start_time = $start_time?date('Ymd', $start_time):date('Ymd', strtotime('-6 days'));
			$end_time = $end_time?date('Ymd', $end_time):date('Ymd',time());
			$logwhere['aid'] = ['in',$aid];
			$logwhere['day'] = [['lt',$end_time],['gt',$start_time]];
			$logData = $log -> where($logwhere) -> select();
			foreach($logData as $k => $v){
				if($v['action'] == 1){
					$view[] = $v;
				}elseif($v['action'] == 2){
					$share[] = $v;
				}elseif($v['action'] == 3){
					$fav[] = $v;
				}
			}
			$days = getDateFromRange($start_time,$end_time);

			$st = strtotime($start_time);
			$ed = strtotime($end_time);
			$commentMap['id'] = ['in',$aid];
			$commentMap['idtype'] = ['eq','aid'];
			$commentMap['dateline'] = [['lt',$ed],['gt',$st]];
			$commentRes = $comment -> where($commentMap) -> select();
		}else{
			$start_time = strtotime(date('Y-m-d', strtotime("-{$date} days")));
			$end_time = $end_time?$end_time:strtotime(date('Y-m-d',strtotime('+1 days')));
			$days = getDateFromRange($start_time,$end_time);
		}
		
		foreach ($commentRes as $kc => &$vc) {
			$vc['dateline'] = date('Y-m-d',$vc['dateline']);
			$commentData["{$vc['dateline']}"][] = $vc;
		}

		foreach ($commentData as $kcd => $vcd) {
			$commentData[$kcd] = count($vcd);
		}
		foreach($view as $key => &$val){
			$val['day'] = date('Y-m-d',strtotime($val['day']));
			$viewData["{$val['day']}"][] = $val;
		}
		foreach ($viewData as $kvd => $vvd) {
			$viewData[$kvd] = count($vvd);
		}
		foreach($share as $ks => &$vs){
			$vs['day'] = date('Y-m-d',strtotime($vs['day']));
			$shareData["{$vs['day']}"][] = $vs;
		}
		foreach ($shareData as $ksd => $vsd) {
			$shareData[$ksd] = count($vsd);
		}
		foreach($fav as $kf => &$vf){
			$vf['day'] = date('Y-m-d',strtotime($vf['day']));
			$favData["{$vf['day']}"][] = $vf;
		}
		foreach ($favData as $kfv => $vfv) {
			$favData[$kfv] = count($vfv);
		}
		foreach ($days as $kd => $vd) {
			$favRes[] = $favData[$vd]?$favData[$vd]:0;
			$shareRes[] = $shareData[$vd]?$shareData[$vd]:0;
			$viewRes[] = $viewData[$vd]?$viewData[$vd]:0;
			$comRes[] = $commentData[$vd]?$commentData[$vd]:0;
			$details['day'] = $vd;
			$details['view'] = $viewData[$vd]?$viewData[$vd]:0;
			$details['share'] = $shareData[$vd]?$shareData[$vd]:0;
			$details['fav'] = $favData[$vd]?$favData[$vd]:0;
			$details['comment'] = $commentData[$vd]?$commentData[$vd]:0;
			$detailRes[] = $details;
		}
		// // 文章数据显示
		// $detailViewMap['aid'] = ['in',$aid];
		// $detailViewMap['action'] = ['eq',1];
		// $detailViewMap['day'] = [['lt',$end_time],['gt',$start_time]];
		// $detailViewNum = $log -> field('count(*) as num,`day`') -> where($detailViewMap) -> group('day') -> select();

		// $detailShareMap['aid'] = ['in',$aid];
		// $detailShareMap['action'] = ['eq',2];
		// $detailShareMap['day'] = [['lt',$end_time],['gt',$start_time]];
		// $detailShareNum = $log -> field('count(*) as num,`day`') -> where($detailShareMap) -> group('day') -> select();

		// $detailFavMap['aid'] = ['in',$aid];
		// $detailFavMap['action'] = ['eq',3];
		// $detailFavMap['day'] = [['lt',$end_time],['gt',$start_time]];
		// $detailFavNum = $log -> field('count(*) as num,`day`') -> where($detailFavMap) -> group('day') -> select();

		// $st = strtotime($start_time);
		// $ed = strtotime($end_time);
		// $commentMap['id'] = ['in',$aid];
		// $commentMap['idtype'] = ['eq','aid'];
		// $commentMap['dateline'] = [['lt',$ed],['gt',$st]];
		// $commentRes = $comment -> where($commentMap) -> select();

		// foreach ($detailViewNum as $kvn => &$vvn) {
		// 	$vvn['day'] = date('Y-m-d',strtotime($vvn['day']));
		// 	$detailViewData[$vvn['day']] = $vvn['num'];
		// }
		// foreach ($detailShareNum as $ksn => &$vsn) {
		// 	$vsn['day'] = date('Y-m-d',strtotime($vsn['day']));
		// 	$detailShareData[$vsn['day']] = $vsn['num'];
		// }
		// foreach ($detailFavNum as $kfn => &$vfn) {
		// 	$vfn['day'] = date('Y-m-d',strtotime($vfn['day']));
		// 	$detailFavData[$vfn['day']] = $vfn['num'];
		// }

		// foreach ($days as $kdy => $vdy) {
		// 	$details['day'] = $vdy;
		// 	$details['view'] = $detailViewData[$vdy]?$detailViewData[$vdy]:0;
		// 	$details['share'] = $detailShareData[$vdy]?$detailShareData[$vdy]:0;
		// 	$details['fav'] = $detailFavData[$vdy]?$detailFavData[$vdy]:0;
		// 	$detailRes[] = $details;
		// };

		foreach ($days as $kds => &$vds) {
			$vds = $vds;
		}
		// $days = implode(',',$days);
		// $favRes = implode(',',$favRes);
		// $shareRes = implode(',',$shareRes);
		// $viewRes = implode(',',$viewRes);
		// $comRes = implode(',',$comRes);
		$data['viewPercent'] = $viewnum?$viewnum:0;
		$data['view'] = $viewRes?$viewRes:0;
		$data['sharePercent'] = $sharetRes?$sharetRes:0;
		$data['share'] = $sharenum?$viewnum:0;
		$data['favPercent'] = $favnum?$favnum:0;
		$data['fav'] = $favtRes?$favtRes:0;
		$data['comPercent'] = $comnum?$comnum:0;
		$data['com'] = $comtRes?$comtRes:0;
		$data['days'] = $days;
		$data['viewData'] = $viewRes?$viewRes:0;
		$data['shareData'] = $sharetRes?$sharetRes:0;
		$data['favData'] = $favtRes?$favtRes:0;
		$data['comData'] = $comtRes?$comtRes:0;
		$data['detailRes'] = $detailRes?$detailRes:[];
		// $this -> assign('viewPercent',$viewnum);
		// $this -> assign('view',$tRes);
		// $this -> assign('sharePercent',$sharenum);
		// $this -> assign('share',$sharetRes);
		// $this -> assign('favPercent',$favnum);
		// $this -> assign('fav',$favtRes);
		// $this -> assign('comPercent',$comnum);
		// $this -> assign('com',$comtRes);
		// $this -> assign('days',$days);
		// $this -> assign('viewData',$viewRes);
		// $this -> assign('shareData',$shareRes);
		// $this -> assign('favData',$favRes);
		// $this -> assign('comData',$comRes);
		// $this -> assign('detailRes',$detailRes);
		// $this -> display();
		$this -> ajaxReturn($data);
	}

}