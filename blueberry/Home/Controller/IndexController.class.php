<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index()
    {

    	// 显示当前预约人数

        $appointment = D('Appointment');
    	$youralreadynum = $appointment->distinct(true)->order('alreadynum DESC')->field('alreadynum')->limit(1)->select();
		$youralready = $youralreadynum[0]['alreadynum'];
		$yourtime = date('Y-m-d 08:00');
		$this->assign("yourtime",$yourtime);
		$this->assign("youralready",$youralready);
        $this->show();
    }
    /*
     * 增加预约信息
     */
    public function add()
    {
    	$appointment = D('Appointment');
    	$youralreadynum = $appointment->distinct(true)->order('alreadynum DESC')->field('alreadynum')->limit(1)->select();
		$youralready = $youralreadynum[0]['alreadynum'];
		$yourtel = $_POST['yourtel'];
		// 判断是否预约过
		if($appointment->where("tel = '$yourtel'")->find())
		{
			$this->error('该手机号码已经预约过了嗷 ~',U('Index/index'));
		}
		else
		{
			// 添加预约信息
			$appointment->tel = $yourtel;
			$appointment->sessiontel = 1;
			$appointment->name = $_POST['yourname'];
			$appointment->aptime = $_POST['youraptime'];
			$appointment->uptime = date('Y-m-d H:i:s');
			$appointment->childnum = $_POST['yourchild'];
			$appointment->totalnum = $_POST['yourtotal'];
			$appointment->alreadynum = $youralready+1;
			// 将预约信息写入数据库
			if($appointment->add())
			{
				$this->success('预约成功，返回预约页面',U('Index/index'));
			}
			else
			{
				$this->success('预约失败，返回预约页面',U('Index/index'));
			}
		}   
	}
	/*
     * 查找手机号码显示
     */
	public function find()
	{
		$this->show();
	}

	/*
     * 查找手机号码
     */
	public function alter()
	{
		$appointment = D('Appointment');
		$yourtel = $_POST['yourtel'];
		$foundinfo = $appointment->where("tel = '$yourtel'")->find();
		if($foundinfo)
		{
			$findname = $foundinfo['name'];
			$findtel = $_POST['yourtel'];
			$findtime = $foundinfo['aptime'];
			$findtotal = $foundinfo['totalnum'];
			$findchild = $foundinfo['childnum'];
			$findid= $foundinfo['index'];

			$this->assign("findname",$findname);
			$this->assign("findtel",$findtel);
			$this->assign("findtime",$findtime);
			$this->assign("findtotal",$findtotal);
			$this->assign("findchild",$findchild);
			$this->assign("findid",$findid);
			$this->show();
		}
		else
		{
			$this->error('未找到您的号码，请重新输入',U('Index/find'));
		}
	}
	 /*
     * 修改预约信息
     */
    public function fix()
    {
		$appointment = D('Appointment');
		$data['name'] = $_POST['yourname'];
		$data['aptime'] = $_POST['youraptime'];
		$data['uptime'] = date('Y-m-d H:i:s');
		$data['childnum'] = $_POST['yourchild'];
		$data['totalnum'] = $_POST['yourtotal'];
		$map['index'] = $_POST['id'];
		if($appointment->where($map)->save($data))
		{
			$this->success('预约信息修改成功，返回预约首页',U('Index/index'));
		}
		else
		{
			$this->error('预约信息修改失败，返回首页',U('Index/index'));
		}
	}
}