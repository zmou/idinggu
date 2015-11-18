<?php
/*
	店铺商品管理
	
	数据表：shop_goods
*/
class ShopgoodsAction extends PublicAction{
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
		店铺商品列表
	*/
	public function index(){
		import("@.ORG.Page");
		$db=M('shop_goods');
		
		$map=array('shop_id'=>I('session.resaler_id'));			//店铺id==当前店铺id
		
		$count = $db->where($map)->count();
		$Page = new Page($count,10);
		$show = $Page->show();
		
		$list=$db->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$this->assign('show',$show);
		$this->assign('list',$list);
		
		$this->display();
	}

	/*
		编辑账户信息
	*/
	public function edit(){
		$db=M('shop_goods');
		$id=I('get.id');
		$info=$db->find($id);
		$this->assign('info',$info);
		if($arr=$this->_post()){
			$db->where(array('id'=>$id))->save($arr);
			$this->success('保存成功',U('edit'));
		}else{
			$this->display();
		}
	}	

}