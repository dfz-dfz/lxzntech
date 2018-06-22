<?php
namespace Home\Controller;

class AdminController extends CommonController {

    public function index()
	{
		$article = D('media_article');
		$follow = D('home_follow');
		$uid = $_SESSION['userdata']['buid'];
		$viewnum = $article -> field("SUM(viewnum) as viewnum") -> where("uid = $uid") -> find();
		$fansnum = $follow -> where("followuid = $uid") -> count();
		$viewnum = $viewnum['viewnum']?$viewnum['viewnum']:0;
		$this -> assign('viewnum',$viewnum);
		$this -> assign('fansnum',$fansnum);
        $this->display();

    }
   
    
    public function main()
	{

        $this->display();

    }


    public function logout()
    {
        //注销SESSION
         
        unset($_SESSION["userdata"]);
        $this -> redirect('Login/login');

    }
  
}