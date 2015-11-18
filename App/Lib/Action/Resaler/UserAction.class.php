<?php
/*
	账户信息管理
*/
class UserAction extends PublicAction{
	/*
		修改密码
	*/
	public function pwd(){
		$this->display();
	}
	public function pwd_update(){
		$db=M('wechat_user');
		if($this->_post()){
			$pwd=md5(I('post.password'));
			$db->where(array('id'=>$this->resaler_id))->save(array('password'=>$pwd));
			$this->success('密码修改成功！',U('pwd'));
		}
	}
	/*
		店长个人信息
	*/
	public function edit(){
		$db=M('wechat_user');
		$id=I('session.resaler_id');
		$info=$db->find($id);
		$this->assign('info',$info);
		if($arr=$this->_post()){
			$db->where(array('id'=>$id))->save($arr);
			$this->success('操作成功');
		}else{
			$this->display();
		}
		
	}
	/*
		店铺信息
	*/
	public function shop(){
		$db=M('wechat_user');
		$id=I('session.resaler_id');
		$info=$db->find($id);
		//店铺扩展信息
		$shop=M('shop')->where(array('uid'=>$id))->find();
		$shop['prov']=get_region_name($shop['prov_id']);
		$shop['city']=get_region_name($shop['city_id']);
		$shop['town']=get_region_name($shop['county_id']);
		$shop['school']=M('school')->where(array('id'=>$shop['sch_id']))->getField('name');
		$shop['build']=M('building')->where(array('id'=>$shop['build_id']))->getField('name');
		$this->assign('info',$info);
		$this->assign('shop',$shop);
		
		if($arr=$this->_post()){
			M('shop')->where(array('uid'=>$id))->save(array('shop_status'=>$arr['shop_status']));
			unset($arr['shop_status']);
			$db->where(array('id'=>$id))->save($arr);
			$this->success('保存成功');
		}else{
			$this->display();
		}
	}	
	/*
		 店铺设置
	*/
	public function shop_setting(){
		$this->display();
	}
}