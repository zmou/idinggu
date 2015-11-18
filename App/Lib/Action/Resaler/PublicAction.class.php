<?php
class PublicAction extends Action{
	public $resaler_id;
	public $resaler_info;
	//判断用户是否登录
	public function _initialize(){
		if(!isset($_SESSION['resaler_id'])){
			$this->redirect('Login/index');
		}
		$this->resaler_id=I('session.resaler_id');
		$this->resaler_info=M('wechat_user')->find($this->resaler_id);
		$this->assign('resaler_info',$this->resaler_info);
	}
	/*
		图片预览
	*/
	public function show_img(){
		$picurl=I('get.picurl','','base64_decode');
		echo "<img src='$picurl' style='width:500px'/>";
	}
}