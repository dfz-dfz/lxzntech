<?php
namespace Home\Controller;
use Think\Controller;

class EmptyController extends Controller 
{	

    public function _empty($var)
	{
		$this -> display("Error/404");
    }
}