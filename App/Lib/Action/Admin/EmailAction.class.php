<?php 
/*
	邮件控制器
*/
class EmailAction extends PublicAction{
		/*public function _initialize(){
			parent::_initialize();
		}*/
		
		public function index(){
			$db=M('email_config');
			$info=$db->find(1);
			$this->assign('info',$info);
			if($arr=$this->_post()){
				$db->where(array('id'=>1))->save($arr);
				$this->redirect('index');
			}
			$this->display();    
		}
		
		public function test(){
			var_dump(I('session.check_money_today'));
			$today_time = strtotime('today');
			var_dump(date("Y-m-d H:i:s",strtotime('today')));
			var_dump($today_time);
		}
		
		
		
}