<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class BackController extends Controller {
    
	/*
     * 后台主页面显示
     */
    public function index()
    {
    	//判断用户是否登录
        if(session('?username'))
		{
			//如果登录则将值赋给$username
			$username = session('username');
			$this->assign('username', $username);
		}
		else
		{
			//如果没有登录则返回登陆页面
			$this->error("请先返回登录", U('Log/index'),1);
		}
        $this->show();
    }
    /*
     * 1.顾客预约登记页面显示+功能开始
     * 2.bfind为查询顾客号码的页面显示
     */
    public function bfind()
    {
        //判断用户是否登录
        if(session('?username'))
		{
			//如果登录则将值赋给$username
			$username = session('username');
			$this->assign('username', $username);
		}
		else
		{
			//如果没有登录则返回登陆页面
			$this->error("请先返回登录", U('Log/index'));
		}
		$appointment = D('Appointment');
		$map['sessiontel'] = 1;
		$map['paymoney'] = 0;
		$count = $appointment->where($map)->count();
		$page = new Page($count, 50);
		$show = $page->show();
		$map['sessiontel'] = 1;
		$map['paymoney'] = 0;
		$list = $appointment->where($map)->order('uptime desc')->field(array('tel','name','aptime','childnum','totalnum','uptime','index'))->limit($page->firstRow, $page->listRows)->select();

		
		$sumchild = $appointment->where($map)->sum('childnum');

		$sumadult = $appointment->where($map)->sum('totalnum');

		$sumtotal = $sumadult + $sumchild;
		
		$this->assign('sumchild', $sumchild);
		$this->assign('sumadult', $sumadult);
		$this->assign('sumtotal', $sumtotal);

		$this->assign('list', $list);
		$this->assign('page', $show);
        $this->show();
    }
    /*
     * 1.顾客预约登记页面显示+功能开始
     * 2.bfind为查询顾客号码的页面显示
     */
    public function yeslist()
    {
        //判断用户是否登录
        if(session('?username'))
		{
			//如果登录则将值赋给$username
			$username = session('username');
			$this->assign('username', $username);
		}
		else
		{
			//如果没有登录则返回登陆页面
			$this->error("请先返回登录", U('Log/index'));
		}
		$appointment = D('Appointment');
		$map['sessiontel'] = 1;
		$map['paymoney']  = array('neq',0);
		$count = $appointment->where($map)->count();
		$page = new Page($count, 50);
		$show = $page->show();
		$list = $appointment->where($map)->order('uptime desc')->field(array('tel','name','aptime','childnum','totalnum','uptime','index','paytime','paymoney','payway'))->limit($page->firstRow, $page->listRows)->select();

		
		$sumchild = $appointment->where($map)->sum('childnum');

		$sumadult = $appointment->where($map)->sum('totalnum');
		$summoney = $appointment->where($map)->sum('paymoney');

		$sumtotal = $sumadult + $sumchild;
		
		$this->assign('sumchild', $sumchild);
		$this->assign('sumadult', $sumadult);
		$this->assign('sumtotal', $sumtotal);
		$this->assign('summoney', $summoney);
		$this->assign('list', $list);
		$this->assign('page', $show);
        $this->show();
    }
    public function yeslist2()
    {
        //判断用户是否登录
        if(session('?username'))
		{
			//如果登录则将值赋给$username
			$username = session('username');
			$this->assign('username', $username);
		}
		else
		{
			//如果没有登录则返回登陆页面
			$this->error("请先返回登录", U('Log/index'));
		}
		$appointment = D('Appointment');
		$map['sessiontel'] = 0;
		$map['paymoney']  = array('neq',0);
		$count = $appointment->where($map)->count();
		$page = new Page($count, 50);
		$show = $page->show();
		
		$list = $appointment->where($map)->order('uptime desc')->field(array('tel','name','aptime','childnum','totalnum','uptime','index','paytime','paymoney','payway'))->limit($page->firstRow, $page->listRows)->select();

		
		$sumchild = $appointment->where($map)->sum('childnum');

		$sumadult = $appointment->where($map)->sum('totalnum');
		
		$summoney = $appointment->where($map)->sum('paymoney');

		$sumtotal = $sumadult + $sumchild;
		
		$this->assign('sumchild', $sumchild);
		$this->assign('sumadult', $sumadult);
		$this->assign('sumtotal', $sumtotal);
		$this->assign('summoney', $summoney);
		$this->assign('list', $list);
		$this->assign('page', $show);
        $this->show();
    }
    public function yeslist3()
    {
        //判断用户是否登录
        if(session('?username'))
		{
			//如果登录则将值赋给$username
			$username = session('username');
			$this->assign('username', $username);
		}
		else
		{
			//如果没有登录则返回登陆页面
			$this->error("请先返回登录", U('Log/index'));
		}
		$appointment = D('Appointment');
		$map['paymoney']  = array('neq',0);
		$count = $appointment->where($map)->count();
		$page = new Page($count, 50);
		$show = $page->show();
		
		$list = $appointment->where($map)->order('uptime desc')->field(array('tel','name','aptime','childnum','totalnum','uptime','index','paytime','paymoney','payway'))->limit($page->firstRow, $page->listRows)->select();

		$summoney = $appointment->where($map)->sum('paymoney');

		$sumchild = $appointment->where($map)->sum('childnum');

		$sumadult = $appointment->where($map)->sum('totalnum');

		$sumtotal = $sumadult + $sumchild;
		
		$this->assign('sumchild', $sumchild);
		$this->assign('sumadult', $sumadult);
		$this->assign('sumtotal', $sumtotal);
		$this->assign('summoney', $summoney);

		$this->assign('list', $list);
		$this->assign('page', $show);
        $this->show();
    }
    /*
     * 1.顾客预约登记页面显示+功能开始
     * 2.bfind为查询顾客号码的页面显示
     */
    public function nolist()
    {
        //判断用户是否登录
        if(session('?username'))
		{
			//如果登录则将值赋给$username
			$username = session('username');
			$this->assign('username', $username);
		}
		else
		{
			//如果没有登录则返回登陆页面
			$this->error("请先返回登录", U('Log/index'));
		}
		$appointment = D('Appointment');
		$map['sessiontel'] = 1;
		$map['paymoney'] = 0;
		$count = $appointment->where($map)->count();
		$page = new Page($count, 50);
		$show = $page->show();
		
		$list = $appointment->where($map)->order('uptime desc')->field(array('tel','name','aptime','childnum','totalnum','uptime','index'))->limit($page->firstRow, $page->listRows)->select();

		
		$sumchild = $appointment->where($map)->sum('childnum');

		$sumadult = $appointment->where($map)->sum('totalnum');

		$sumtotal = $sumadult + $sumchild;
		
		$this->assign('sumchild', $sumchild);
		$this->assign('sumadult', $sumadult);
		$this->assign('sumtotal', $sumtotal);

		$this->assign('list', $list);
		$this->assign('page', $show);
        $this->show();
    }
    public function nolist2()
    {
        //判断用户是否登录
        if(session('?username'))
		{
			//如果登录则将值赋给$username
			$username = session('username');
			$this->assign('username', $username);
		}
		else
		{
			//如果没有登录则返回登陆页面
			$this->error("请先返回登录", U('Log/index'));
		}
		$appointment = D('Appointment');
		$map['sessiontel'] = 0;
		$map['paymoney'] = 0;
		$count = $appointment->where($map)->count();
		$page = new Page($count, 50);
		$show = $page->show();
		$map['sessiontel'] = 0;
		$map['paymoney'] = 0;
		$list = $appointment->where($map)->order('uptime desc')->field(array('tel','name','aptime','childnum','totalnum','uptime','index'))->limit($page->firstRow, $page->listRows)->select();

		
		$sumchild = $appointment->where($map)->sum('childnum');

		$sumadult = $appointment->where($map)->sum('totalnum');

		$sumtotal = $sumadult + $sumchild;
		
		$this->assign('sumchild', $sumchild);
		$this->assign('sumadult', $sumadult);
		$this->assign('sumtotal', $sumtotal);

		$this->assign('list', $list);
		$this->assign('page', $show);
        $this->show();
    }
    public function nolist3()
    {
        //判断用户是否登录
        if(session('?username'))
		{
			//如果登录则将值赋给$username
			$username = session('username');
			$this->assign('username', $username);
		}
		else
		{
			//如果没有登录则返回登陆页面
			$this->error("请先返回登录", U('Log/index'));
		}
		$appointment = D('Appointment');
		$map['paymoney'] = 0;
		$count = $appointment->where($map)->count();
		$page = new Page($count, 50);
		$show = $page->show();
		
		$list = $appointment->where($map)->order('uptime desc')->field(array('tel','name','aptime','childnum','totalnum','uptime','index'))->limit($page->firstRow, $page->listRows)->select();

		
		$sumchild = $appointment->where($map)->sum('childnum');

		$sumadult = $appointment->where($map)->sum('totalnum');

		$sumtotal = $sumadult + $sumchild;
		
		$this->assign('sumchild', $sumchild);
		$this->assign('sumadult', $sumadult);
		$this->assign('sumtotal', $sumtotal);

		$this->assign('list', $list);
		$this->assign('page', $show);
        $this->show();
    }
    /*
     * 修改预约信息
     */
    public function fix()
    {
    	//判断用户是否登录
        if(session('?username'))
		{
			//如果登录则将值赋给$username
			$username = session('username');
			$this->assign('username', $username);
		}
		else
		{
			//如果没有登录则返回登陆页面
			$this->error("请先返回登录", U('Log/index'));
		}
    	$tel= $_POST['yourtel'];

		$appointment = D('Appointment');
		$data['paymoney'] = $_POST['yourpay'];
		$data['payway'] = $_POST['yourway'];
		$data['paytime'] = date('Y-m-d H:i:s');
		$map['index'] = $_POST['id'];
		if($appointment->where($map)->save($data))
		{
			$this->success('顾客登记下单成功，返回上一页面',U('back/afteralter',array('id'=>$tel)));
		}
		else
		{
			$this->error('顾客登记下单失败，返回上一页面',U('Index/alter'));
		}
	}
	public function afterfix()
    {
    	$tel= $_POST['yourtel'];

		$appointment = D('Appointment');
		$data['paymoney'] = $_POST['yourpay'];
		$data['payway'] = $_POST['yourway'];
		$data['paytime'] = date('Y-m-d H:i:s');
		$data['totalnum'] = $_POST['yourtotal'];
		$data['childnum'] = $_POST['yourchild'];
		$map['index'] = $_POST['id'];
		if($appointment->where($map)->save($data))
		{
			$this->success('顾客信息修改成功，返回上一页面',U('back/afteralter',array('id'=>$tel)));
		}
		else
		{
			$this->error('顾客修改失败，返回上一页面',U('Index/alter'));
		}
	}
	/*
     * 下单成功后显示的页面
     */
	public function afteralter()
	{
		//判断用户是否登录
        if(session('?username'))
		{
			//如果登录则将值赋给$username
			$username = session('username');
			$this->assign('username', $username);
		}
		else
		{
			//如果没有登录则返回登陆页面
			$this->error("请先返回登录", U('Log/index'));
		}
		$appointment = D('Appointment');
		$yourtel = $_GET['id'];
		$foundinfo = $appointment->where("tel = '$yourtel'")->find();
		$findname = $foundinfo['name'];
		$findtime = $foundinfo['aptime'];
		$findtotal = $foundinfo['totalnum'];
		$findchild = $foundinfo['childnum'];
		$findmoney = $foundinfo['paymoney'];
		$findway = $foundinfo['payway'];
		// $findpayname = $foundinfo['payname'];
		$findpaytime = $foundinfo['paytime'];
		$findid = $foundinfo['index'];

		$this->assign("findname",$findname);
		$this->assign("findtel",$yourtel);
		$this->assign("findtime",$findtime);
		$this->assign("findtotal",$findtotal);
		$this->assign("findchild",$findchild);
		$this->assign("findid",$findid);
		$this->assign("findmoney",$findmoney);
		$this->assign("findway",$findway);
		$this->assign("findpayname",$findpayname);
		$this->assign("findpaytime",$findpaytime);
		$this->show();
	}
	/*
     * 下单成功后显示的页面
     */
	public function afteralterfix()
	{
		//判断用户是否登录
        if(session('?username'))
		{
			//如果登录则将值赋给$username
			$username = session('username');
			$this->assign('username', $username);
		}
		else
		{
			//如果没有登录则返回登陆页面
			$this->error("请先返回登录", U('Log/index'));
		}
		$appointment = D('Appointment');
		$yourtel = $_GET['id'];
		$foundinfo = $appointment->where("tel = '$yourtel'")->find();
		$findname = $foundinfo['name'];
		$findtime = $foundinfo['aptime'];
		$findtotal = $foundinfo['totalnum'];
		$findchild = $foundinfo['childnum'];
		$findmoney = $foundinfo['paymoney'];
		$findway = $foundinfo['payway'];
		// $findpayname = $foundinfo['payname'];
		$findpaytime = $foundinfo['paytime'];
		$findid = $foundinfo['index'];

		$this->assign("findname",$findname);
		$this->assign("findtel",$yourtel);
		$this->assign("findtime",$findtime);
		$this->assign("findtotal",$findtotal);
		$this->assign("findchild",$findchild);
		$this->assign("findid",$findid);
		$this->assign("findmoney",$findmoney);
		$this->assign("findway",$findway);
		$this->assign("findpayname",$findpayname);
		$this->assign("findpaytime",$findpaytime);
		$this->show();
	}
	public function twoalter(){
		//判断用户是否登录
        if(session('?username'))
		{
			//如果登录则将值赋给$username
			$username = session('username');
			$this->assign('username', $username);
		}
		else
		{
			//如果没有登录则返回登陆页面
			$this->error("请先返回登录", U('Log/index'));
		}
		//连接appointment数据库
		$appointment = D('Appointment');
		$map['paymoney'] = 0;
		$yourtelget = $_GET['id'];
		$yourtel = $_POST['yourtel'];
		$foundinfo = $appointment->where($map)->where("tel = '$yourtel'")->find();
		$foundinfoget = $appointment->where($map)->where("tel = '$yourtelget'")->find();
		if($foundinfo||$foundinfoget)
		{
			//连接appointment数据库
			
			if($yourtel!=""){
				$findname = $foundinfo['name'];
				$findtel = $yourtel;
				$findtime = $foundinfo['aptime'];
				$findtotal = $foundinfo['totalnum'];
				$findchild = $foundinfo['childnum'];
				$findmoney = $foundinfo['paymoney'];
				$findway = $foundinfo['payway'];
				$finduptime = $foundinfo['uptime'];
				$findid = $foundinfo['index'];
			}else{
				$findtel = $yourtelget;
				$findname = $foundinfoget['name'];
				$findtime  = $foundinfoget['aptime'];
				$findtotal = $foundinfoget['totalnum'];
				$findchild = $foundinfoget['childnum'];
				$findmoney = $foundinfoget['paymoney'];
				$findway   = $foundinfoget['payway'];
				$findid    = $foundinfoget['index'];
				$finduptime    = $foundinfoget['uptime'];
			}
			
			//将值传到view模块
			$this->assign("findname",$findname);
			$this->assign("findtel",$findtel);
			$this->assign("findtime",$findtime);
			$this->assign("findtotal",$findtotal);
			$this->assign("findchild",$findchild);
			$this->assign("findid",$findid);
			$this->assign("findmoney",$findmoney);
			$this->assign("findway",$findway);
			$this->assign("finduptime",$finduptime);
			$this->show();
		}
		else
		{
			//如果未找到返回bfind页面
			$this->error('未找到您的号码，请重新输入',U('Back/bfind'),1);
		}
	}
    /*
     * 1.顾客预约登记
     * 2.增加支付信息或金额的页面显示
     * 3.bfind页面的action显示
     */
	public function alter()
	{
		//判断用户是否登录
        if(session('?username'))
		{
			//如果登录则将值赋给$username
			$username = session('username');
			$this->assign('username', $username);
		}
		else
		{
			//如果没有登录则返回登陆页面
			$this->error("请先返回登录", U('Log/index'));
		}
		//连接appointment数据库
		$appointment = D('Appointment');
		$map['paymoney'] = 0;
		$yourtelget = $_GET['id'];
		$yourtel = $_POST['yourtel'];
		$foundinfo = $appointment->where($map)->where("tel = '$yourtel'")->find();
		$foundinfoget = $appointment->where($map)->where("tel = '$yourtelget'")->find();
		if($foundinfo||$foundinfoget)
		{
			//连接appointment数据库
			
			if($yourtel!=""){
				$findname = $foundinfo['name'];
				$findtel = $yourtel;
				$findtime = $foundinfo['aptime'];
				$findtotal = $foundinfo['totalnum'];
				$findchild = $foundinfo['childnum'];
				$findmoney = $foundinfo['paymoney'];
				$findway = $foundinfo['payway'];
				$findid = $foundinfo['index'];
			}else{
				$findtel = $yourtelget;
				$findname = $foundinfoget['name'];
				$findtime  = $foundinfoget['aptime'];
				$findtotal = $foundinfoget['totalnum'];
				$findchild = $foundinfoget['childnum'];
				$findmoney = $foundinfoget['paymoney'];
				$findway   = $foundinfoget['payway'];
				$findid    = $foundinfoget['index'];
			}
			
			//将值传到view模块
			$this->assign("findname",$findname);
			$this->assign("findtel",$findtel);
			$this->assign("findtime",$findtime);
			$this->assign("findtotal",$findtotal);
			$this->assign("findchild",$findchild);
			$this->assign("findid",$findid);
			$this->assign("findmoney",$findmoney);
			$this->assign("findway",$findway);
			$this->show();
		}
		else
		{
			//如果未找到返回bfind页面
			$this->error('未找到您的号码，请重新输入',U('Back/bfind'),1);
		}
	}




	/*
     * 1.来客下单汇总
     * 2.主页面的显示
     */
	public function submenu()
    {
        //判断用户是否登录
        if(session('?username'))
		{
			//如果登录则将值赋给$username
			$username = session('username');
			$this->assign('username', $username);
		}
		else
		{
			//如果没有登录则返回登陆页面
			$this->error("请先返回登录", U('Log/index'));
		}
        $this->show();
    }
    /*
     * 1.来客下单汇总
     * 2.新建页面的显示
     */
    public function subnew()
    {
        //判断用户是否登录
        if(session('?username'))
		{
			//如果登录则将值赋给$username
			$username = session('username');
			$this->assign('username', $username);
		}
		else
		{
			//如果没有登录则返回登陆页面
			$this->error("请先返回登录", U('Log/index'));
		}
        $this->show();
    }
    /*
     * 1.来客下单汇总
     * 2.新建页面的新建按钮的aciton
     */
    public function subadd()
    {
    	//判断用户是否登录
        if(session('?username'))
		{
			//如果登录则将值赋给$username
			$username = session('username');
			$this->assign('username', $username);
		}
		else
		{
			//如果没有登录则返回登陆页面
			$this->error("请先返回登录", U('Log/index'));
		}
    	$appointment = D('Appointment');
    	$youralreadynum = $appointment->distinct(true)->order('alreadynum DESC')->field('alreadynum')->limit(1)->select();
		$youralready = $youralreadynum[0]['alreadynum'];
		$yourtel = $_POST['yourtel'];
		// 判断是否预约过
		if($appointment->where("tel = '$yourtel'")->find())
		{
			$this->error('该手机号码已经预约过了嗷 ~',U('back/subnew'),1);
		}
		else
		{
			// 添加预约信息
			$appointment->tel = $yourtel;
			$appointment->name = $_POST['yourname'];
			$appointment->aptime = date('Y-m-d H:i:s');
			$appointment->uptime = date('Y-m-d H:i:s');
			$appointment->childnum = $_POST['yourchild'];
			$appointment->totalnum = $_POST['yourtotal'];
			$appointment->alreadynum = $youralready+1;
			$appointment->paymoney = $_POST['yourpay'];
			$appointment->payway = $_POST['yourway'];
			// $appointment->payname = $_POST['yourpayname'];
			$appointment->paytime = date('Y-m-d H:i:s');
			// 将预约信息写入数据库
			if($appointment->add())
			{
				$this->success('预约成功，返回预约页面',U('Back/afteradd',array('id'=>$yourtel)));
			}
			else
			{
				$this->success('预约失败，返回预约页面',U('Back/subnew'));
			}
		}   
    }
    /*
     * 1.来客下单汇总
     * 2.新建成功后显示的页面
     * 3.用于向客户展示
     */
    public function afteradd()
    {
    	//判断用户是否登录
        if(session('?username'))
		{
			//如果登录则将值赋给$username
			$username = session('username');
			$this->assign('username', $username);
		}
		else
		{
			//如果没有登录则返回登陆页面
			$this->error("请先返回登录", U('Log/index'));
		}
		$appointment = D('Appointment');
		$yourtel = $_GET['id'];
		$foundinfo = $appointment->where("tel = '$yourtel'")->find();
		$findname = $foundinfo['name'];
		$findtime = $foundinfo['aptime'];
		$findtotal = $foundinfo['totalnum'];
		$findchild = $foundinfo['childnum'];
		$findmoney = $foundinfo['paymoney'];
		$findway = $foundinfo['payway'];
		$findpayname = $foundinfo['payname'];
		$findpaytime = $foundinfo['paytime'];
		$findid= $foundinfo['index'];

		$this->assign("findname",$findname);
		$this->assign("findtel",$yourtel);
		$this->assign("findtime",$findtime);
		$this->assign("findtotal",$findtotal);
		$this->assign("findchild",$findchild);
		$this->assign("findid",$findid);
		$this->assign("findmoney",$findmoney);
		$this->assign("findway",$findway);
		$this->assign("findpayname",$findpayname);
		$this->assign("findpaytime",$findpaytime);
		$this->show();
    }
    /*
     * 1.来客下单汇总
     * 2.修改页面的显示
     * 3.list-group 页码等的传递
     * 4.列出所有用户的信息
     */
    public function subalter()
    {
        //判断用户是否登录
        if(session('?username'))
		{
			//如果登录则将值赋给$username
			$username = session('username');
			$this->assign('username', $username);
		}
		else
		{
			//如果没有登录则返回登陆页面
			$this->error("请先返回登录", U('Log/index'));
		}
		$appointment = D('Appointment');
		$map['paymoney']  = array('neq',0);
		
		$sumchild = $appointment->where($map)->sum('childnum');

		$summoney = $appointment->where($map)->sum('paymoney');

		$sumadult = $appointment->where($map)->sum('totalnum');

		$sumtotal = $sumadult + $sumchild;
		$this->assign('sumchild', $sumchild);
		$this->assign('sumadult', $sumadult);
		$this->assign('sumtotal', $sumtotal);
		$this->assign('summoney', $summoney);
		
		$count = $appointment->where($map)->count();
		$page = new Page($count, 30);
		$show = $page->show();
		
		$list = $appointment->where($map)->order('uptime desc')->field(array('tel','name','aptime','paymoney','payway','index','totalnum','childnum','paytime'))->limit($page->firstRow, $page->listRows)->select();
		$this->assign('list', $list);
		$this->assign('page', $show);
        $this->show();
    }
    /*
     * 1.来客下单汇总
     * 2.修改页面的显示
     * 3.具体到某一个用户的信息
     */
	public function clickalter()
	{
		//判断用户是否登录
        if(session('?username'))
		{
			//如果登录则将值赋给$username
			$username = session('username');
			$this->assign('username', $username);
		}
		else
		{
			//如果没有登录则返回登陆页面
			$this->error("请先返回登录", U('Log/index'));
		}
		$appointment = D('Appointment');
		$yourtel = $_GET['id'];
		$foundinfo = $appointment->where("tel = '$yourtel'")->find();
		$findname = $foundinfo['name'];
		$findtime = $foundinfo['aptime'];
		$findtotal = $foundinfo['totalnum'];
		$findchild = $foundinfo['childnum'];
		$findmoney = $foundinfo['paymoney'];
		$findway = $foundinfo['payway'];
		// $findpayname = $foundinfo['payname'];
		$findpaytime = $foundinfo['paytime'];
		$findid= $foundinfo['index'];

		$this->assign("findname",$findname);
		$this->assign("findtel",$yourtel);
		$this->assign("findtime",$findtime);
		$this->assign("findtotal",$findtotal);
		$this->assign("findchild",$findchild);
		$this->assign("findid",$findid);
		$this->assign("findmoney",$findmoney);
		$this->assign("findway",$findway);
		$this->assign("findpayname",$findpayname);
		$this->assign("findpaytime",$findpaytime);
		$this->show();
	}
	/*
     * 1.来客下单汇总
     * 2.修改页面的功能按钮action
     */
    public function subfix()
    {
    	//判断用户是否登录
        if(session('?username'))
		{
			//如果登录则将值赋给$username
			$username = session('username');
			$this->assign('username', $username);
		}
		else
		{
			//如果没有登录则返回登陆页面
			$this->error("请先返回登录", U('Log/index'));
		}
		$appointment = D('Appointment');
		$foundinfo = $appointment->find();
		$tel = $_GET['id'];
		// $data['name'] = $_POST['yourname'];
		// $data['aptime'] = date('Y-m-d H:i:s');
		$data['uptime'] = date('Y-m-d H:i:s');
		$data['childnum'] = $_POST['yourchild'];
		$data['totalnum'] = $_POST['yourtotal'];
		$data['paymoney'] = $_POST['yourpay'];
		$data['payway'] = $_POST['yourway'];
		// $data['payname'] = $_POST['yourpayname'];
		$data['paytime'] = date('Y-m-d H:i:s');
		$map['index'] = $_POST['id'];
		if($appointment->where($map)->save($data))
		{
			$this->success('顾客修改信息成功，进入下一页面',U('back/afterquery',array('id'=>$tel)));
		}
		else
		{
			$this->error('顾客修改信息失败，返回上一页面',U('back/subalter'));
		}
	}
	/*
     * 1.来客下单汇总
     * 2.查询页面的显示
     */
	public function subquery()
    {
        //判断用户是否登录
        if(session('?username'))
		{
			//如果登录则将值赋给$username
			$username = session('username');
			$this->assign('username', $username);
		}
		else
		{
			//如果没有登录则返回登陆页面
			$this->error("请先返回登录", U('Log/index'));
		}
        $this->show();
    }
    /*
     * 1.来客下单汇总
     * 2.查询页面的aciton功能按钮
     * 3.页面的展示
     */
	public function afterquery()
	{
		//判断用户是否登录
        if(session('?username'))
		{
			//如果登录则将值赋给$username
			$username = session('username');
			$this->assign('username', $username);
		}
		else
		{
			//如果没有登录则返回登陆页面
			$this->error("请先返回登录", U('Log/index'));
		}
		$appointment = D('Appointment');
		$yourtel = $_GET['id'];
		$foundinfo = $appointment->where("tel = '$yourtel'")->find();
		if($foundinfo)
		{
			$findname = $foundinfo['name'];
			$findtel = $_GET['id'];
			$findtime = $foundinfo['aptime'];
			$findtotal = $foundinfo['totalnum'];
			$findchild = $foundinfo['childnum'];
			$findmoney = $foundinfo['paymoney'];
			$findway = $foundinfo['payway'];
			$findpayname = $foundinfo['payname'];
			$findpaytime = $foundinfo['paytime'];
			$findtelorhome = $foundinfo['sessiontel'];
			$findid= $foundinfo['index'];
			if($findtelorhome==1){
				$telorhome = '手机预约';
			}else{
				$telorhome = '实地预约';
			}
			$this->assign("telorhome",$telorhome);
			$this->assign("findname",$findname);
			$this->assign("findtel",$findtel);
			$this->assign("findtime",$findtime);
			$this->assign("findtotal",$findtotal);
			$this->assign("findchild",$findchild);
			$this->assign("findid",$findid);
			$this->assign("findmoney",$findmoney);
			$this->assign("findway",$findway);
			$this->assign("findpayname",$findpayname);
			$this->assign("findpaytime",$findpaytime);
			$this->show();
		}
		else
		{
			$this->error('未找到您的号码，请重新输入',U('Back/subalter'));
		}
	}
	/*
     * 1.来客下单汇总
     * 2.删除页面的显示
     */
	public function subdelete()
    {
        //判断用户是否登录
        if(session('?username'))
		{
			//如果登录则将值赋给$username
			$username = session('username');
			$this->assign('username', $username);
		}
		else
		{
			//如果没有登录则返回登陆页面
			$this->error("请先返回登录", U('Log/index'));
		}
        $appointment = D('Appointment');
        $map['paymoney']  = array('neq',0);

		$count = $appointment->where($map)->count();
		$page = new Page($count, 30);
		$show = $page->show();
		$list = $appointment->where($map)->order('uptime desc')->field(array('tel','name','aptime','paymoney','payway','index','totalnum','childnum','paytime'))->limit($page->firstRow, $page->listRows)->select();
		$this->assign('list', $list);
		$this->assign('page', $show);
        $this->show();
    }
    /*
     * 1.来客下单汇总
     * 2.删除页面的功能按钮aciton
     */
	public function afterdel(){
		//判断用户是否登录
        if(session('?username'))
		{
			//如果登录则将值赋给$username
			$username = session('username');
			$this->assign('username', $username);
		}
		else
		{
			//如果没有登录则返回登陆页面
			$this->error("请先返回登录", U('Log/index'));
		}
		$appointment = D('Appointment');
		$map['tel'] = $_GET['id'];
		if($appointment->where($map)->delete()){
			$this->success('信息删除成功，返回列表页面');
		}else{
			$this->error('信息删除失败，返回列表页面');
		}
	}

	
    public function sbalter()
    {
    	//判断用户是否登录
        if(session('?username'))
		{
			//如果登录则将值赋给$username
			$username = session('username');
			$this->assign('username', $username);
		}
		else
		{
			//如果没有登录则返回登陆页面
			$this->error("请先返回登录", U('Log/index'));
		}
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
			$this->error('未找到您的号码，请重新输入',U('Back/bfind'));
		}
    }
    
	public function exportExcel($expTitle,$expCellName,$expTableData){
        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
        $fileName = $expTitle.date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);

        vendor("PHPExcel.PHPExcel");
            
        $objPHPExcel = new \PHPExcel();
        $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');
        //set width  
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);   
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);    
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20); 
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);   

        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  导出时间:'.date('Y-m-d H:i:s'));
        for($i=0;$i<$cellNum;$i++){
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]);
        }
        // Miscellaneous glyphs, UTF-8
        for($i=0;$i<$dataNum;$i++){
            for($j=0;$j<$cellNum;$j++){
                $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $expTableData[$i][$expCellName[$j][0]]);
            }
        }

        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }
    function expnotel(){
		$xlsName  = "贪吃蓝莓君-手机预约未付款表";
        $xlsCell  = array(
            array('tel','手机号码'),
            array('name','姓名'),
            array('childnum','儿童人数'),
            array('totalnum','成人人数'),
            array('aptime','预约时间'),
            array('uptime','提交时间'),
            array('index','预约id')
        );
        $xlsModel = M('Appointment');
        $map['sessiontel'] = 1;
		$map['paymoney'] = 0;
        $xlsData  = $xlsModel->where($map)->Field('tel,name,childnum,totalnum,aptime,uptime,index')->select();
        $this->exportExcel($xlsName,$xlsCell,$xlsData);
    }
    function expyestel(){
		$xlsName  = "贪吃蓝莓君-手机预约已付款表";
        $xlsCell  = array(
            array('tel','手机号码'),
            array('name','姓名'),
            array('childnum','儿童人数'),
            array('totalnum','成人人数'),
            array('paymoney','付款金额'),
            array('payway','付款方式'),
            array('aptime','预约时间'),
            array('uptime','提交时间'),
            array('paytime','付款时间'),
            array('index','预约id')
        );
        $xlsModel = M('Appointment');
        $map['sessiontel'] = 1;
		$map['paymoney']  = array('neq',0);
        $xlsData  = $xlsModel->where($map)->Field('tel,name,childnum,totalnum,paymoney,payway,aptime,uptime,paytime,index')->select();
        $this->exportExcel($xlsName,$xlsCell,$xlsData);
    }
    function expyeshome(){
		$xlsName  = "贪吃蓝莓君-实地预约已付款表";
        $xlsCell  = array(
            array('tel','手机号码'),
            array('name','姓名'),
            array('childnum','儿童人数'),
            array('totalnum','成人人数'),
            array('paymoney','付款金额'),
            array('payway','付款方式'),
            array('aptime','预约时间'),
            array('uptime','提交时间'),
            array('paytime','付款时间'),
            array('index','预约id')
        );
        $xlsModel = M('Appointment');
        $map['sessiontel'] = 0;
		$map['paymoney']  = array('neq',0);
        $xlsData  = $xlsModel->where($map)->Field('tel,name,childnum,totalnum,paymoney,payway,aptime,uptime,paytime,index')->select();
        $this->exportExcel($xlsName,$xlsCell,$xlsData);
    }
    /**
     *
     * 导出Excel
     */
    function expallUser(){//导出Excel
        $xlsName  = "贪吃蓝莓君全部顾客已付款表";
        $xlsCell  = array(
            array('tel','手机号码'),
            array('name','姓名'),
            array('childnum','儿童人数'),
            array('totalnum','成人人数'),
            array('paymoney','付款金额'),
            array('payway','付款方式'),
            array('aptime','预约时间'),
            array('uptime','提交时间'),
            array('paytime','付款时间'),
            array('index','预约id')
        );
        $xlsModel = M('Appointment');
        $map['paymoney']  = array('neq',0);
        $xlsData  = $xlsModel->where($map)->Field('tel,name,childnum,totalnum,paymoney,payway,aptime,uptime,paytime,index')->select();
        $this->exportExcel($xlsName,$xlsCell,$xlsData);
            
    }

    function findfix(){
    	//判断用户是否登录
        if(session('?username'))
		{
			//如果登录则将值赋给$username
			$username = session('username');
			$this->assign('username', $username);
		}
		else
		{
			//如果没有登录则返回登陆页面
			$this->error("请先返回登录", U('Log/index'));
		}
		//连接appointment数据库
		$appointment = D('Appointment');
		$yourtelget = $_GET['id'];
		$yourtel = $_POST['yourtel'];
		$map['paymoney']  = array('neq',0);
		$foundinfo = $appointment->where($map)->where("tel = '$yourtel'")->find();
		if($foundinfo)
		{
			//连接appointment数据库
			
			$findname = $foundinfo['name'];
			$findtel = $yourtel;
			$findtime = $foundinfo['aptime'];
			$findtotal = $foundinfo['totalnum'];
			$findchild = $foundinfo['childnum'];
			$findmoney = $foundinfo['paymoney'];
			$findway = $foundinfo['payway'];
			$findid = $foundinfo['index'];
			$findpaytime = $foundinfo['paytime'];

			//将值传到view模块
			$this->assign("findname",$findname);
			$this->assign("findtel",$findtel);
			$this->assign("findtime",$findtime);
			$this->assign("findtotal",$findtotal);
			$this->assign("findchild",$findchild);
			$this->assign("findid",$findid);
			$this->assign("findmoney",$findmoney);
			$this->assign("findway",$findway);
			$this->assign("findpaytime",$findpaytime);
			$this->show();
		}
		else
		{
			//如果未找到返回bfind页面
			$this->error('未找到您的号码，请重新输入',U('Back/subalter'),1);
		}		
    }

    function finddel(){
    	//判断用户是否登录
        if(session('?username'))
		{
			//如果登录则将值赋给$username
			$username = session('username');
			$this->assign('username', $username);
		}
		else
		{
			//如果没有登录则返回登陆页面
			$this->error("请先返回登录", U('Log/index'));
		}
		//连接appointment数据库
		$appointment = D('Appointment');
		$yourtelget = $_GET['id'];
		$yourtel = $_POST['yourtel'];
		$map['paymoney']  = array('neq',0);
		$foundinfo = $appointment->where($map)->where("tel = '$yourtel'")->find();
		if($foundinfo)
		{
			//连接appointment数据库
			
			$findname = $foundinfo['name'];
			$findtel = $yourtel;
			$findtime = $foundinfo['aptime'];
			$findtotal = $foundinfo['totalnum'];
			$findchild = $foundinfo['childnum'];
			$findmoney = $foundinfo['paymoney'];
			$findway = $foundinfo['payway'];
			$findid = $foundinfo['index'];
			$findpaytime = $foundinfo['paytime'];

			//将值传到view模块
			$this->assign("findname",$findname);
			$this->assign("findtel",$findtel);
			$this->assign("findtime",$findtime);
			$this->assign("findtotal",$findtotal);
			$this->assign("findchild",$findchild);
			$this->assign("findid",$findid);
			$this->assign("findmoney",$findmoney);
			$this->assign("findway",$findway);
			$this->assign("findpaytime",$findpaytime);
			$this->show();
		}
		else
		{
			//如果未找到返回bfind页面
			$this->error('未找到您的号码，请重新输入',U('Back/subdelete'),1);
		}		
    }
}