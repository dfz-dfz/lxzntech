<?php 
namespace Home\Controller;

class FansController extends CommonController
{
	public function index(){
		$today = date('Ymd',time());
		$yestoday = date('Ymd',strtotime('-1 days'));
		$uid = $_SESSION['userdata']['buid'];
		$follow = D('home_follow');
		$log = D('home_follow_log');

		// 新增粉丝数
		$map['uid'] = ['eq',$uid];
		$map['action'] = ['eq',1];
		$map['day'] = ['eq',$today];
		$todayNum = $log -> where($map) -> count();

		$map2['uid'] = ['eq',$uid];
		$map2['action'] = ['eq',1];
		$map2['day'] = ['eq',$yestoday];
		$yestodayNum = $log -> where($map2) -> count();
		$addPercent = ($todayNum - $yestodayNum)/($yestodayNum?$yestodayNum:1);
		$addPercent = round($addPercent*100,2)."%";

		// 取消粉丝量
		$where['uid'] = ['eq',$uid];
		$where['action'] = ['eq',2];
		$where['day'] = ['eq',$today];
		$tcancelNum = $log -> where($where) -> count();

		$where2['uid'] = ['eq',$uid];
		$where2['action'] = ['eq',2];
		$where2['day'] = ['eq',$yestoday];
		$ycancelNum = $log -> where($where2) -> count();
		$cancelPercent = ($tcancelNum - $ycancelNum)/($ycancelNum?$ycancelNum:1);
		$cancelPercent = round($cancelPercent*100,2)."%";

		// 净增粉丝量
		$todayOnly = ($todayNum - $tcancelNum)/($todayNum?$todayNum:1);
		$yesdayOnly = ($yestodayNum - $ycancelNum)/($yestodayNum?$yestodayNum:1);
		$onlyPercent = $todayOnly - $yestodayOnly;
		$onlyPercent = round($onlyPercent*100,2)."%";

		// 累计粉丝数
		$total = $follow -> where("followuid = $uid") -> count();
		
		$this -> assign('todayNum',$todayNum);
		$this -> assign('addPercent',$addPercent);
		$this -> assign('tcancelNum',$tcancelNum);
		$this -> assign('cancelPercent',$cancelPercent);
		$this -> assign('todayOnly',$todayOnly);
		$this -> assign('onlyPercent',$onlyPercent);
		$this -> assign('total',$total);
		$this -> display();
	}

	public function fansData(){

		$uid = $_SESSION['userdata']['buid'];
		$follow = D('home_follow');
		$log = D('home_follow_log');

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
		$start_time = $start_time?date('Ymd',$start_time):date('Ymd', strtotime('-6 days'));
		$end_time = $end_time?date('Ymd',$end_time):date('Ymd',time());
		// 新增粉丝数
		$logwhere['uid'] = ['eq',$uid];
		$logwhere['day'] = [['elt',$end_time],['gt',$start_time]];
		$logData = $log -> where($logwhere) -> select();
		foreach($logData as $k => $v){
			if($v['action'] == 1){
				$add[] = $v;
			}elseif($v['action'] == 2){
				$cancel[] = $v;
			}
		}
		$days = getDateFromRange($start_time,$end_time);
		foreach($add as $key => &$val){
			$val['day'] = date('Y-m-d',strtotime($val['day']));
			$addData["{$val['day']}"][] = $val;
		}
		foreach ($addData as $kvd => $vvd) {
			$addData[$kvd] = count($vvd);
		}
		foreach($cancel as $ks => &$vs){
			$vs['day'] = date('Y-m-d',strtotime($vs['day']));
			$cancelData["{$vs['day']}"][] = $vs;
		}
		foreach ($cancelData as $ksd => $vsd) {
			$cancelData[$ksd] = count($vsd);
		}

		foreach ($days as $kd => $vd) {
			$addRes[] = $addData[$vd]?$addData[$vd]:0;
			$cancelRes[] = $cancelData[$vd]?$cancelData[$vd]:0;
			$num = $addData[$vd]-$cancelData[$vd];
			$onlyRes[] = $num?$num:0;
			$totalMap['uid'] = ['eq',$uid];
			$totalMap['day'] = ['ELT',$vd];
			$totalData = $log -> where($totalMap) -> select();
			foreach($totalData as $kt => $vt){
				if($vt['action'] == 1){
					$add[] = $vt;
				}elseif($vt['action'] == 2){
					$cancel[] = $vt;
				}
			}
			$total[$vd] = count($add)-count($cancel);
			$totalRes[] = $total[$vd]?$total[$vd]:0;
			$details['day'] = $vd;
			$details['add'] = $addData[$vd]?$addData[$vd]:0;
			$details['cancel'] = $cancelData[$vd]?$cancelData[$vd]:0;
			$details['only'] = $num?$num:0;
			$details['total'] = $total[$vd]?$total[$vd]:0;
			$detailRes[] = $details;
		}
		$data['days'] = $days;
		$data['addRes'] = $addRes;
		$data['cancelRes'] = $cancelRes;
		$data['onlyRes'] = $onlyRes;
		$data['totalRes'] = $totalRes;
		$data['details'] = $detailRes;
		
// dump($data);exit;
		$this -> ajaxReturn($data);
	}

}