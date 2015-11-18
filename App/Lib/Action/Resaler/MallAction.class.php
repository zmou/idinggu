<?php
/*
	平台购物中心【进货中心】
*/
class MallAction extends PublicAction{
	public function _initialize(){
		parent::_initialize();
		$_brands=M('goods_brand')->select();
		foreach($_brands as $val){
			$brands[$val['id']]=$val;
		}
		$_categorys=M('goods_category')->select();
		foreach($_categorys as $val){
			$categorys[$val['id']]=$val;
		}
		$this->assign('brands',$brands);
		$this->assign('categorys',$categorys);	
	}
	/*
		平台商品列表
	*/
	public function index(){
		import("@.ORG.Page");
		$db=M('goods');
		
		$count = $db->where($map)->count();
		$Page = new Page($count,10);
		$show = $Page->show();
		
		$list=$db->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$this->assign('show',$show);
		$this->assign('list',$list);
		
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
		编辑账户信息
	*/
	public function edit(){
		$db=M('wechat_user');
		$id=I('session.resaler_id');
		$info=$db->find($id);
		//店铺扩展信息
		$shop=M('shop')->where(array('uid'=>$id))->find();
		//dump($shop);die();
		$shop['prov']=get_region_name($shop['prov_id']);
		$shop['city']=get_region_name($shop['city_id']);
		$shop['town']=get_region_name($shop['county_id']);
		$shop['school']=M('school')->where(array('id'=>$shop['sch_id']))->getField('name');
		$shop['build']=M('building')->where(array('id'=>$shop['build_id']))->getField('name');
		$this->assign('info',$info);
		$this->assign('shop',$shop);
		if($arr=$this->_post()){
			$db->where(array('id'=>$id))->save($arr);
			$this->success('保存成功',U('edit'));
		}else{
			$this->display();
		}
	}	

}