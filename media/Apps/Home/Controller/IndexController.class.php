<?php 
namespace Home\Controller;

class IndexController extends EmptyController
{
	public function index(){
        $this -> display();
    }

    public function news(){
        $news = D('portal_article_title');
        $res = $news -> field('aid,title,dateline,summary') -> where('catid = 17 and status = 0') -> order('dateline desc') -> select();
        foreach ($res as $k => &$v) {
            $v['date'] = date('Y-m',$v['dateline']);
            $v['dateline'] = date('Y-m-d H:i:s',$v['dateline']);
            $data[$v['date']][] = $v;
        }

        foreach ($data as $ki => $vi) {
            $data2['year'] = date('Y',strtotime($ki));
            $month = [1=>'一月',2=>'二月',3=>'三月',4=>'四月',5=>'五月',6=>'六月',7=>'七月',8=>'八月',9=>'九月',10=>'十月',11=>'十一月',12=>'十二月'];
            $data2['month'] = $month[date('m',strtotime($ki))+0];
            $data2['data'] = $vi;
            $result[] = $data2;
        }
        $this -> assign('data',$result);
        $this -> display();
    }

    public function map(){
        $this -> display();
    }

    public function download(){
        $this -> display();
    }

    public function newsdetails(){
        $article = D('media_article');
        $aid = I('aid');
        $res = $article -> where("aid = $aid") -> find();
        $res['dateline'] = date("Y-m-d H:i:s",$res['dateline']);
        $match = '/(data\/attachment\/)/';
        $replace = "/bbs/data/attachment/";
        $res['content'] = preg_replace($match,$replace,$res['content']);
        // $res['']

        $this -> assign('data',$res);
        $this -> display();
    }

}