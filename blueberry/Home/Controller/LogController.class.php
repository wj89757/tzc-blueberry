<?php
namespace Home\Controller;
use Think\Controller;
class LogController extends Controller {
    public function index()
    {
        $this->show();
    }
    public function login()
    {
        if(IS_POST)
		{
			$username = I('username');
			$password = I('password');
			$user = D('Backuser');
			$condition['name']=$username;
			$pd = $user->where($condition)->getField('password');
			if($pd == $password)
			{
				session('username',$username);
				$this->success('登陆成功',U('Back/index'));
			}
			else
			{
			 	$this->error('密码错误',$this->site_url,3);
			}
		}
		else
		{
			$this->display();
		}
    }
    //用户注销功能
    public function logout()
    {
    	$result = session('username', null);
    	if($result)
    	{
			$this->error("注销失败，返回首页");
		}
		else
		{
			$this->success("注销成功，返回登录界面", U('Log/index'));
		}
    }
}