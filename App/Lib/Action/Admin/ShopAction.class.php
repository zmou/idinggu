<?php 
/*
	店铺管理
 */
class ShopAction extends PublicAction{

	public function _initialize(){
		parent::_initialize();
		$_level_list=M('user_level')->select();
		foreach($_level_list as $val){
			$level_list[$val['id']]=$val;
		}
		$this->assign('level_list',$level_list);
	}

		/*
			店铺列表
		 */
	public function index(){
		import("@.ORG.Page");
		$db=M('wechat_user');
		$so_key=I('get.keyword');
		
		$map['role_id']  = 2; //角色为店长
		/* if($so_key)
		{
			$where['nickname']  = array('like', '%'.$so_key.'%');
			$where['shop_name']  = array('like','%'.$so_key.'%');
			$where['name']  = array('like','%'.$so_key.'%');
			$where['_logic'] = 'or';
			$map['_complex'] = $where;
		} */
		
		if ($so_key) {
			$shopkeepers = $db->where($map)->select();
			echo $db->getLastSql();
			$newShopkeepers = array();
			foreach ($shopkeepers as $key => $val) {
				$shop = M('shop')->where(array('uid'=>$val['id']))->find();
				$school = M('school')->where(array('id'=>$shop['sch_id']))->find();
				
				$pos_school = strpos($school['name'], $so_key);
				if ($pos_school !== false) {
					$newShopkeepers[] = $shopkeepers[$key];
				}
				
				$pos_nickname = strpos($val['nickname'], $so_key);
				if ($pos_nickname !== false) {
					$newShopkeepers[] = $shopkeepers[$key];
				}
				
				$pos_shop_name = strpos($val['shop_name'], $so_key);
				if ($pos_shop_name !== false) {
					$newShopkeepers[] = $shopkeepers[$key];
				}
				
				$pos_name = strpos($val['name'], $so_key);
				if ($pos_name !== false) {
					$newShopkeepers[] = $shopkeepers[$key];
				}
			} // end foreach $shopkeepers
			$count = count($newShopkeepers);
			$Page = new Page($count,10);
			$show = $Page->show();
			$this->assign('show',$show);
			
			foreach($newShopkeepers as $key=>$val){
				$shop=M('shop')->where(array('uid'=>$val['id']))->find();
				$shop['prov']=get_region_name($shop['prov_id']);
				$shop['city']=get_region_name($shop['city_id']);
				$shop['town']=get_region_name($shop['county_id']);
				$shop['school']=M('school')->where(array('id'=>$shop['sch_id']))->getField('name');
				$shop['build']=M('building')->where(array('id'=>$shop['build_id']))->getField('name');
				$newShopkeepers[$key]['shop']=$shop;
				$newShopkeepers[$key]['shop_id']=$shop['id'];
			}
			
			$list = $newShopkeepers;
		} else {
			$count = $db->where($map)->count();
			$Page = new Page($count,10);
			$show = $Page->show();
			$this->assign('show',$show);


			$list=$db->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
			//var_dump($list);

			foreach($list as $key=>$val){

				$shop=M('shop')->where(array('uid'=>$val['id']))->find();
				$shop['prov']=get_region_name($shop['prov_id']);
				$shop['city']=get_region_name($shop['city_id']);
				$shop['town']=get_region_name($shop['county_id']);
				$shop['school']=M('school')->where(array('id'=>$shop['sch_id']))->getField('name');
				$shop['build']=M('building')->where(array('id'=>$shop['build_id']))->getField('name');
				$list[$key]['shop']=$shop;
				$list[$key]['shop_id']=$shop['id'];
			}
		} // end $so_key
		/* echo "<pre>";
		print_r($list);exit; */
		
		$this->assign('list',$list);
		$this->display();
	}

	public function search_order(){

		import("@.ORG.Page");
		$db=M('wechat_user');
		$so_key=I('post.key');
		$where['nickname']  = array('like', '%'.$so_key.'%');
		$where['shop_name']  = array('like','%'.$so_key.'%');
		$where['username']  = array('like','%'.$so_key.'%');
		$where['_logic'] = 'or';
		//$map['_complex'] = $where;


		$map['role_id']  = 2;			//角色为店长


		$count = $db->where($map)->count();
		$Page = new Page($count,10);
		$show = $Page->show();
		$this->assign('show',$show);


		$list=$db->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		//var_dump($list);exit;

		foreach($list as $key=>$val){

			$shop=M('shop')->where(array('uid'=>$val['id']))->find();
			$shop['prov']=get_region_name($shop['prov_id']);
			$shop['city']=get_region_name($shop['city_id']);
			$shop['town']=get_region_name($shop['county_id']);
			$shop['school']=M('school')->where(array('id'=>$shop['sch_id']))->getField('name');
			$shop['build']=M('building')->where(array('id'=>$shop['build_id']))->getField('name');
			$list[$key]['shop']=$shop;
			$list[$key]['shop_id']=$shop['id'];
		}
		$this->assign('list',$list);
		$this->display();    
	}
		/*
			编辑店铺信息
		 */
	public function edit(){
		$db=M('wechat_user');
		$id=I('get.id');
		$info=$db->find($id);
		$this->assign('info',$info);
		if($arr=$this->_post()){
			$db->where(array('id'=>$id))->save($arr);
			$this->success('保存成功',U('edit',array('id'=>$id)));
		}else{
			$this->display();  
		}

	}

		/*
			待审核店铺列表
		 */
	public function audit(){
		import("@.ORG.Page");
		$db=M('shop');

		$map=array('status'=>0);		//等待审核，店铺

		$count = $db->where($map)->count();
		$Page = new Page($count,10);
		$show = $Page->show();
		$this->assign('show',$show);


		$list=$db->where($map)->order('posttime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		foreach($list as $key=>$val){
			$list[$key]['user']=M('wechat_user')->where(array('id'=>$val['uid']))->field('name,sex,mobile')->find();
			$list[$key]['city']=M('region')->where(array('id'=>$val['city_id']))->getField('region_name');
			$list[$key]['county']=M('region')->where(array('id'=>$val['county_id']))->getField('region_name');
			$list[$key]['school']=M('school')->where(array('id'=>$val['sch_id']))->getField('name');
			$list[$key]['build']=M('building')->where(array('id'=>$val['build_id']))->getField('name');
		}
		$this->assign('list',$list);
		$this->display();    
	}
		/*
			设置账号密码
		 */
	public function set_account(){
		$uid=I('get.id');
		$db=M('wechat_user');
		$user=$db->find($uid);				//基础信息
		$shop=M('shop')->where(array('uid'=>$uid))->find();		//店铺信息
		$this->assign('info',$user);
		if($arr=$this->_post()){
			$i=$db->where(array('username'=>$arr['username']))->find();	
			if(empty($i)){
				$arr['password']=md5($arr['password']);
				$db->where(array('id'=>$uid))->save($arr);
				//审核通过
				M('shop')->where(array('uid'=>$uid))->save(array('status'=>1));
				//角色改为店长
				$db->where(array('id'=>$uid))->save(array('role_id'=>2));
				//楼栋开通店铺
				M('building')->where(array('id'=>$shop['build_id']))->save(array('status'=>1));
				$this->success('开通账号成功',U('index'));
			}else{
				$this->error('账号已经存在，请重新输入');
			}
		}else{
			$this->display();
		}

	}
		/*
			审核店铺信息
		 */
	public function audit_pass(){
		$id=I('get.id');	
		M('wechat_user')->where(array('id'=>$id))->save(array('status'=>1));
		$this->redirect('audit');
	}

		/*
			店铺等级管理
		 */
	public function level(){
		import("@.ORG.Page");
		$db=M('shop_level');
		$map='';
		$count = $db->where($map)->count();
		$Page = new Page($count,10);
		$show = $Page->show();
		$this->assign('show',$show);
		$list=$db->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);
		$this->display();    
	}
		/*
			新增店铺等级
		 */
	public function level_add(){
		$db=M('shop_level');
		if($arr=$this->_post()){
			$db->add($arr);
			$this->redirect('level');
		}
		$this->display();    
	}
		/*
			新增店铺等级
		 */
	public function level_edit(){
		$db=M('shop_level');
		$id=I('get.id');
		$info=$db->find($id);
		$this->assign('info',$info);
		if($arr=$this->_post()){
			$db->where(array('id'=>$id))->save($arr);
			$this->redirect('level');
		}
		$this->display();    
	}
		/*
			删除店铺等级
		 */
	public function level_del(){
		$id=I('get.id');
		M('shop_level')->delete($id);
		$this->redirect('level');
	}

		/*
			delete shop
		 */
	public function del(){
		$id=I('get.id');

		$shop = M('shop')->where(array('uid'=>$id))->find();
		$build_id = $shop['build_id'];

		//delete shop
		M('shop')->where(array('uid'=>$id))->delete();
		//delete shop goods
		if($shop['id'])
		{
			M('shop')->where(array('shop_id'=>$shop['id']))->delete();
		}

		//update user role
		M('wechat_user')->where(array('id'=>$id))->save(array('role_id'=>1));
		//update building status
		M('building')->where(array('id'=>$build_id))->save(array('status'=>0));
		$this->redirect('index');
	}

		/*
			店铺主题风格管理
		 */
	public function theme(){
		$path=C('SHOP_THEME');
		$_list=scandir($path);
		foreach($_list as $key=>$val){
			if(!in_array($val,array('.','..'))&&is_dir($path.$val)){
				$list[$key]=scandir($path.$val);
			}else{
				unset($_list[$key]);
			}
		}
		foreach($list as $key=>$val){
			foreach($val as $k=>$v){
				if(in_array($v,array('.','..'))){
					unset($list[$key][$k]);
					unset($v);
				}else{
					$theme_list[$_list[$key]]['thumb']=$path.$_list[$key].'/'.$v;
				}

			}
		}
			/*dump($_list);
			dump($list);
			dump($theme_list);die();*/
		$this->assign('list',$theme_list);
		$this->display();
	}
		/*
			微店主题管理
		 */
	public function _theme(){
		$db=M('shop_theme');
		$list=$db->select();
		$this->assign('list',$list);
		$this->display();
	}
		/*
			添加主题
		 */
	public function theme_add(){
		$db=M('shop_theme');
		if($arr=$this->_post()){
			$db->add($arr);
			$this->success("添加主题成功！",U('theme'));
		}else{
			$this->display();
		}
	}
		/*
			添加主题
		 */
	public function theme_edit(){
		$db=M('shop_theme');
		$id=I('get.id');
		$info=$db->find($id);
		$this->assign('info',$info);
		if($arr=$this->_post()){
			$db->where(array('id'=>$id))->add($arr);
			$this->success("修改主题成功！",U('theme'));
		}else{
			$this->display();
		}
	}
		/*
			删除主题
		 */
	public function theme_del(){
		$db=M('shop_theme');
		$id=I('get.id');
		$db->delete($id);
		$this->success("删除成功！",U('theme'));
	}

	/*
		主题查看
	 */	
	public function theme_show(){
		$this->display();
	}

	//all shop order
	public function shop_order(){
		import("@.ORG.Page");
		$db=M('order_info');
		if(isset($_GET['order_status'])){
			$order_status=I('get.order_status');
			$map=array('order_status'=>$order_status);
		}else{
			$map='';
		}
		$so_key=I('get.key');
		$so_val=I('get.val');
		
		$pay_status=I('get.pay_status');
		if ($pay_status) {
			$map['pay_status'] = $pay_status;
		}

		$begin_time=strtotime(I('get.begin_time'));
		$end_time=strtotime(I('get.end_time'));
		/* var_dump(I('get.begin_time'));
		var_dump($begin_time);
		var_dump($end_time);exit; */
		

		if(in_array($so_key,array('order_sn','mobile','consignee'))){
			if(!empty($so_val)&&!empty($so_val)){
				$map[$so_key]=array('like','%'.$so_val.'%');
			}
		}
		if($user_id=I('get.user_id')){
			$map['user_id']=$user_id;
		}
		
		if ($begin_time > 0 && $end_time > 0) {
			$map['order_time'] = array(array('egt',$begin_time),array('elt',$end_time));
		} else if($begin_time>0){
			$map['order_time'] = array('egt',$begin_time);
		} else if($end_time>0){
			$map['order_time'] = array('elt',$end_time);
		}

		//list all common user orders but not shop keeper orders
		$map['role_id'] = 2;


		//search condition
		if(intval(I('post.province_id')))
		{
			$map['province_id'] = I('post.province_id');
		}
		if(intval(I('post.city_id')))
		{
			$map['city_id'] = I('post.city_id');
		}
		if(intval(I('post.district_id')))
		{
			$map['district_id'] = I('post.district_id');
		}
		if(intval(I('post.school_id')))
		{
			$map['school_id'] = I('post.school_id');
		}
		if(intval(I('post.build_id')))
		{
			$map['build_id'] = I('post.build_id');
		}

		$this->assign('map', $map);

		$count = $db->where($map)->count();
		$Page = new Page($count,10);
		// echo $db->getLastSql();exit;

		$list=$db->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$show = $Page->show();


		$this->assign('list',$list);

		//订单筛选条件
		$_SESSION['export_map']=$map;
		$this->assign('show',$show);
		$this->display();
	}

	//view shop keeper order
	public function order_detail(){
		$order_id=$map['id']=I('get.id');
		$db=M('order_info');
		//订单信息
		$data=$db->where($map)->find();
		if(empty($data)){
			$this->error('该订单已不存在！');
		}else{
			$data['order_user']=M('wechatuser')->field('id,nickname,name')->find($data['user_id']);
		}
		$this->assign('data',$data);
		//商品信息
		$order_goods=M('order_goods')->where(array('order_id'=>I('get.id')))->order('id desc')->select();
		$this->assign('order_goods',$order_goods);
		$goods_list=M('order_goods')->where(array('order_id'=>$order_id))->select();
		if($data['shop_id']>0){
			$shop=M('wechat_user')->find($data['shop_id']);
			$this->assign('shop',$shop);
		}
		if($arr=$this->_post()){
			//订单处理逻辑
		}
		//下单用户信息
		$user=M('wechat_user')->find($data['user_id']);
		$this->assign('user',$user);

		//分佣信息
		foreach($order_goods as $val){
			$goods_info=M('goods')->find($val['goods_id']);
			$yongjin+=$val['goods_nums']*$goods_info['yongjin'];
		}
		$config=M('resale_config')->find(1);		//分佣配置
		if($data['shop_id']){
			$resaler1=M('wechat_user')->find($data['shop_id']);			//一级分销
			$resaler1['yongjin']=$yongjin*($config['parent_1']*0.01);
			$resaler1['percent']=$config['parent_1'];
			$this->assign('resaler1',$resaler1);
			if($resaler1['parent_id']>0){
				$resaler2=M('wechat_user')->find($resaler1['parent_id']);	//二级分销
				$resaler2['yongjin']=$yongjin*($config['parent_2']*0.01);
				$resaler2['percent']=$config['parent_2'];
				$this->assign('resaler2',$resaler2);
			}
		}


		$this->display();
	}

	public function get_shop_data()
	{
		$shop = M('shop');
		$shop_list = $shop->select();
		foreach($shop_list as $shops)
		{
			$shop_user = M('order_info')->where(array('user_id'=>$shops['uid'], 'role_id'=>2, 'build_id'=>array('neq', 'NULL')))->find();
			var_dump($shop_user);
			$shop_data = array(
				'county_id'	=> $shop_user['district_id'],
				'sch_id'	=> $shop_user['school_id'],
				'build_id'	=> $shop_user['build_Id']
			);

			M('shop')->where(array('id'=>$shops['id']))->save($shop_data);
		}
		exit;
		//shop ids (28,29,34,35,36,38,92)
		//user ids (15,25,27,29,31,33,52,67,71)
		//$sg_map = array('');
		//$shop_goods_data = $shop_goods->where();
		$user_ids = '15,25,27,29,31,33,52,67,71';
		$user_list = M('wechat_user')->where(array('id'=>array('IN',$user_ids)))->select();

		//var_dump($user_list);
		foreach($user_list as $k=>$user)
		{
			$user_order = M('order_info')->where(array('role_id'=>2, 'user_id'=>$user['id']))->find();

			//var_dump($user_order);

			$shop_data['id'] = $user_order['shop_id'];
			$shop_data['uid'] = $user['id'];
			$shop_data['posttime'] = $user['posttime'];
			$shop_data['status'] = 1;
			$shop_data['shop_status'] = 0;

			$shop_data['prov_id']=$user_order['province_id'];

			$shop_data['city_id']=$user_order['city_id'];
			$shop_data['county_id']=$user_order['district_id'];
			$shop_data['sch_id']=$user_order['school_id'];
			$shop_data['build_id']=$user_order['build_id'];

			//$sql = "INSERT INTO `twotree_shop` (`id`, `parent_id`, `uid`, `prov_id`, `city_id`, `county_id`, `sch_id`, `build_id`, `shop_name`, `shop_status`, `status`, `posttime`) VALUES(".$shop_data['id'].", NULL, ".$shop_data['uid'].", 24, 311, 2604, 1382, 0, NULL, 0, 1, ".$shop_data['posttime'].");";

		}


	}

	public function export_shop_order()
	{
		import("@.ORG.PHPExcel.IOFactory");

		/** Include PHPExcel */
		$order_dir = './Data/shop_order/';

		$order_id = I('get.order_id');
		$order_info = M('order_info')->find($order_id);
		$order_goods = M('order_goods')->where(array('order_id'=>$order_id))->select();
		/* echo "<pre>";
		print_r($order_info);exit; */
		
		foreach ($order_goods as $key => $val) {
			$order_goods[$key]['goods_info'] = M('goods')->where(array('id'=>$val['goods_id']))->select();
		}
		
		/* echo "<pre>";
		print_r($order_goods);exit; */

		$file_name = date('Y-m-d').'-'.$order_info['build'];
		error_reporting(E_ALL);
		ini_set('display_errors', TRUE);
		ini_set('display_startup_errors', TRUE);
		date_default_timezone_set('Europe/London');

		if (PHP_SAPI == 'cli')
			die('This example should only be run from a Web Browser');

		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();

		// Set document properties
		$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
			->setLastModifiedBy("Maarten Balliauw")
			->setTitle("Office 2007 XLSX Test Document")
			->setSubject("Office 2007 XLSX Test Document")
			->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
			->setKeywords("office 2007 openxml php")
			->setCategory("Test result file");

		$subObject = $objPHPExcel->getSheet(0);
		$objPHPExcel->getActiveSheet()->mergeCells('A1:H1');
		$subObject->getColumnDimension('A')->setWidth(10);
		$subObject->getColumnDimension('B')->setWidth(10);
		$subObject->getColumnDimension('C')->setWidth(50);
		$subObject->getColumnDimension('D')->setWidth(10); 
		$subObject->getColumnDimension('E')->setWidth(15);
		$subObject->getColumnDimension('F')->setWidth(15);
		$subObject->getColumnDimension('G')->setWidth(15);
		$subObject->getColumnDimension('H')->setWidth(15);
		
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->setCellValue('A1', '【叮咕寝室便利店】店长补货订单');
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		// Add some data
		$objPHPExcel->getActiveSheet()->mergeCells('A2:C2');
		$objPHPExcel->getActiveSheet()->mergeCells('D2:G2');
		$objPHPExcel->getActiveSheet()->mergeCells('D3:G3');
		$objPHPExcel->getActiveSheet()->mergeCells('A3:C3');
		$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A2', '姓名：'.$order_info['consignee'])
			->setCellValue('D2', '电话：'.$order_info['mobile'])
			->setCellValue('A3', '地址：'.$order_info['province'].'-'.$order_info['city'].'-'.$order_info['district'].'-'.$order_info['address'])
			->setCellValue('D3', '下单时间：'.date("Y-m-d H:i:s",$order_info['order_time']));
			
		$objPHPExcel->getActiveSheet()->getStyle('D3')->getFont()->getColor()->setARGB('#FF0000');

		$objPHPExcel->getActiveSheet()->setCellValue('A4', '编号');
		$objPHPExcel->getActiveSheet()->setCellValue('B4', 'ID');
		$objPHPExcel->getActiveSheet()->setCellValue('C4', '商品名');
		$objPHPExcel->getActiveSheet()->setCellValue('D4', '规格');
		$objPHPExcel->getActiveSheet()->setCellValue('E4', '数量');
		$objPHPExcel->getActiveSheet()->setCellValue('F4', '大客户价');
		$objPHPExcel->getActiveSheet()->setCellValue('G4', '店长采购价');
		$objPHPExcel->getActiveSheet()->setCellValue('H4', '店长留言');

		$row = 5;
		$ii = 1;
		foreach($order_goods as $goods)
		{
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$row, $ii);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$row, $goods['goods_id']);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$row, $goods['goods_name']);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$row, '1×'.$goods['goods_info'][0]['package_num']);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$row, $goods['goods_nums']);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$row, $goods['goods_nums']*$goods['goods_info'][0]['biz_price']);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$row, $goods['goods_nums']*$goods['goods_info'][0]['trade_price']*$goods['goods_info'][0]['package_num']);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$row, $order_info['order_message']);

			$row += 1;
			$ii += 1;
		}
		
		$objPHPExcel->getActiveSheet()->mergeCells('A'.$row.':C'.$row);
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$row, '合计');
		$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->getFont()->getColor()->setARGB('#FF0000');
		$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$row, '=SUM(E5:E'.($row-1).')');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$row, '=SUM(F5:F'.($row-1).')');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$row, '=SUM(G5:G'.($row-1).')');
		$objPHPExcel->getActiveSheet()->mergeCells('H5:H'.$row);
		
		$objPHPExcel->getActiveSheet()->mergeCells('A'.($row+1).':C'.($row+1));
		$objPHPExcel->getActiveSheet()->getStyle('A'.($row+1))->getFont()->getColor()->setARGB('#FF0000');
		$objPHPExcel->getActiveSheet()->setCellValue('A'.($row+1), '叮咕店长服务专线：13572962720');
		
		$objPHPExcel->getActiveSheet()->mergeCells('D'.($row+1).':F'.($row+1));
		$objPHPExcel->getActiveSheet()->getStyle('D'.($row+1))->getFont()->getColor()->setARGB('#FF0000');
		$objPHPExcel->getActiveSheet()->setCellValue('D'.($row+1), '送货人：                                   电话：');
		
		$objPHPExcel->getActiveSheet()->mergeCells('G'.($row+1).':H'.($row+1));
		$objPHPExcel->getActiveSheet()->getStyle('G'.($row+1))->getFont()->getColor()->setARGB('#FF0000');
		$objPHPExcel->getActiveSheet()->setCellValue('G'.($row+1), '收货人：                   电话：');
		
		$objPHPExcel->getActiveSheet()->getRowDimension($row+2)->setRowHeight(200);
		$objPHPExcel->getActiveSheet()->getStyle('A'.($row+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$objPHPExcel->getActiveSheet()->mergeCells('A'.($row+2).':H'.($row+2));
		$objPHPExcel->getActiveSheet()->getStyle('A'.($row+2))->getFont()->getColor()->setARGB('#FF0000');
		$objPHPExcel->getActiveSheet()->setCellValue('A'.($row+2),"注：1、烦请叮咕供货合作伙伴留意店长的下单时间，力争在规定48小时内按店长所补货商品种类、按时且保质保量、准确无误地送到提货人指定地点。\r\n2、烦请叮咕收货人务必仔细核对商品名称、数量、质量等相关信息，若发现任何有缺货、残货等其他商品数量和质量类问题，收货人可与送货人现场协商解决，若协商不成，收货人有权当场拒签并要求送货人退还收货人相应问题货物（包括缺货商品）的双倍费用，若有任何疑问，收货人可直接拨打叮咕店长服务专线帮助其解决。");
		$objPHPExcel->getActiveSheet()->getStyle('A'.($row+2))->getAlignment()->setWrapText(true);
		
		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle('Simple');

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$file_name.'.xls"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0

		ob_clean();//关键

		flush();//关键

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		exit;
	}

}
