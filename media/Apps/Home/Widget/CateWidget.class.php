<?php
namespace Home\Widget;
use Think\Controller;

class CateWidget extends Controller 
{
	public function header()
	{
		$nickname = $_SESSION['userdata']['nickname'];
		$type = $_SESSION['userdata']['type'];
		// dump($_SESSION);
		$this -> assign('nickname',$nickname);
		$this -> assign('type',$type);
		$this->display('Cate:header');

	}    

    public function nav()
    {
    	$this -> assign('catname',CONTROLLER_NAME);
    	$this -> display('Cate:nav');
    	
    }

  
}