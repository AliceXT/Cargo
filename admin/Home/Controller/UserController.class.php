<?php
namespace Home\Controller;
use Think\Controller;

class UserController extends Controller{

	function user(){
		$this->display();
	}

	function supply(){
		$this->display("user");
	}
}