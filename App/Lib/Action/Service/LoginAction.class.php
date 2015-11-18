<?php
//后台登录控制
class LoginAction extends Action{
	//后台登录模板输出
	public function index(){
		$conf=M('cms_config')->find(1);
		$this->assign('conf',$conf);
		$this->display('login');
	}
	//登录方法
	public function login (){
		if($this->_post()){
			$username=$_POST['username'];
			$pwd=md5($_POST['password']);
			// if($_SESSION['verify']!=md5($yzm)){
			// 	$this->error('验证码错误！');
			// }
			$i=M('service')->where(array('username'=>$username))->find();
			if(!$i|$i['password']!=$pwd){
				$this->error('用户名或者密码错误！');
			}
			if($i['lock']==1){
				$this->error('账号已被禁用！');
			}
			$data=array(
				'login_time'=>time(),
				'login_ip'=>get_client_ip(),
			);
			M('service')->save($data);
			session('service_id',$i['id']);
			session('service_name',$i['username']);
			$this->redirect('Index/index');	
		}
	}
	
	//退出登录
	public function logout(){
		session('service_id',null);
		$this->redirect('Login/index');
	}
	
	//引入验证码
	public function yzm(){
		import('ORG.Util.Image');
		Image::buildImageVerify(4,1,'png',80,32);
	}
	
}