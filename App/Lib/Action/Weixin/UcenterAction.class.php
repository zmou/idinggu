<?php
/*	用户中心控制器-【微信商城】*/
class UcenterAction extends BaseAction{
	public function _initialize(){
		parent::_initialize();
		import('@.ORG.Page');
		import("@.ORG.Http");
		import('@.ORG.Image.ThinkImage');
		$agent = $_SERVER['HTTP_USER_AGENT']; 
		if(!strpos($agent,"icroMessenger")) {
			//exit('此功能只能在微信浏览器中使用');
		}else{
			$headimg="./Data/upload/headimg/".$_SESSION['user_id'].'.jpg';
			$icon="./Data/upload/headimg/thumb_".$_SESSION['user_id'].'.jpg';
			if(!is_file($headimg)||!is_file($icon)){
				//下载图片
				//Http::curlDownload($_SESSION['wx_userinfo']['headimgurl'],$headimg);
				if(is_file($headimg)){
					//$img = new ThinkImage(THINKIMAGE_GD,$headimg); 
					//$img->thumb(60,60,THINKIMAGE_THUMB_FIXED)->save('./Data/upload/headimg/'.$this->user_id.'_icon.jpg');
				}
				//更新数据库
				//M('wechat_user')->where(array('id'=>$this->user_id))->save(array('headimgurl'=>$headimg));
			}
		}
		$jump=get_curr_url();
		$jump=base64_encode($jump);
		if(!$this->user_id){
			//无登录信息，跳转到登录页
			//$this->redirect('Member/login',array('jump'=>$jump));
		}
		//底部导航
		$nav=M('navlink')->field('id,title,url')->where(array('fup'=>0,'cid'=>1))->order('list asc')->select();
		foreach($nav as $key=>$val){
			$nav[$key]['child']=M(navlink)->field('id,title,url')->where(array('fup'=>$val['id'],'cid'=>1))->order('list asc')->select();
		}
		$this->assign('nav',$nav);

		//test user
		$test_user = 0;
		$test_user_arr = array(33,120,49);
		if(in_array($_SESSION['user_id'], $test_user_arr))
		{
			$test_user = 1;
		}
		$this->assign('test_user', $test_user);
	}
		/*
		用户中心
		 */
	public function index(){
		if($this->user_info['role_id']==2){		//店长
			$this->redirect('shop_center');
		}
		$collect_count=M('goods_collect')->where(array('uid'=>$this->user_id))->count();
		$this->assign('collect_count',$collect_count);
		$this->display();
	}
	/*
	个人信息-普通用户
	 */
	public function edit_data(){
		if($this->user_info['role_id']==2){		//店主
			$this->redirect('shop_edit_data');
		}
		$db=M('wechat_user');
		$info=$db->find($_SESSION['user_id']);
		//var_dump($info);

		//get region
		$region = M('region');
		$user_city = str_replace('市','', $info['city']);
		$city_list = $region->where(array('region_name'=>$user_city))->select();
		$city_id = $city_list[0]['id'];
		//var_dump($city_list);

		$town_list = $region->where(array('parent_id'=>$city_id))->select();
		//var_dump($town_list);

		$this->assign('town_list', $town_list);
		//$info['town_str'] = $town_str;
		//echo htmlspecialchars($town_str);
		//echo '<select>'.$town_str.'</select>';
		$this->assign('user_info',$info);


		if($data=$this->_post()){
			var_dump($info);exit;
			//add jifen
			if(!$info['profile_complete'])
			{
				echo 'fdsfdfs';exit;

				$data['jifen'] = $info['jifen'] + 10;
				$data['profile_complete'] = 1;
			}
			$rs=$db->where(array('id'=>$_SESSION['user_id']))->save($data);
			$info=$db->find($_SESSION['user_id']);

			//add jifen
			if(!$info['profile_complete'])
			{
				$info['jifen'] = $info['jifen'] + 10;
				$db->where(array('id'=>$_SESSION['user_id']))->save(array('profile_complete'=>1, 'jifen'=>$info['jifen']));

				M('wechat_user')->where(array('id'=>$this->user_id))->setInc('jifen',10);
				//记录积分流水
				$water['user_id']=$_SESSION['user_id'];
				$water['type']=1;						//支出
				$water['amount']=10;		//数量
				$water['way']='profile';
				$water['way_name']='完善资料';						
				$water['posttime']=time();		
				M('jifen_water')->add($water);
				//echo $info['jifen'];exit;
			}
			$_SESSION['user_info']=$info;
			$this->redirect('info');
		}
		$this->display();
	}

/*
个人信息-店主
 */
	public function shop_edit_data(){
		if($this->user_info['role_id']==1){		//店主
			$this->redirect('edit_data');
		}
		$db=M('wechat_user');
		$info=$db->find($_SESSION['user_id']);
		$this->assign('info',$info);
		if($data=$this->_post()){
			$rs=$db->where(array('id'=>$_SESSION['user_id']))->save($data);
			$info=$db->find($_SESSION['user_id']);
			$_SESSION['user_info']=$info;
			$this->redirect('info');
		}
		$this->display();
	}
	/*
	销售订单
	 */
	public function shop_order(){
		$db=M('order_info');

		$order_status = intval(I('get.order_status')) ? intval(I('get.order_status')) : 1;

		$shop = M('shop')->where(array('uid'=>$this->user_id))->find();
		$shop_id = $shop['id'];

		$map=array('role_id'=>1, 'shop_id'=>$shop['id'], 'pay_status'=>1, 'order_status'=>$order_status);

		$count =$db->where($map)->count();
		$Page = new Page($count,10);
		$Page->setConfig('prev', '上一页');
		$Page->setConfig('next', '下一页');
		$Page->setConfig('theme',"%upPage% %downPage%");
		$page = $Page->show();
		$this->assign('page',$page);

		$list=$db->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		foreach($list as $key=>$val){
			$list[$key]['goods']=M('order_goods')->where(array('order_id'=>$val['id']))->select();
		}

		$this->assign('order_status', $order_status);
		$this->assign('list',$list);
		$this->display();
	}
	/*
	反馈建议投诉
	 */
	public function feedback(){
		$this->display();
	}


	/*
	订单列表
	 */
	public function order_self(){
		$this->display();
	}

	/*
	在线充值
	 */
	public function recharge(){
		// 充值金额选择
		$conf=M('recharge_config')->order('money asc')->select();
		$this->assign('conf',$conf);
		$this->display();
	}

	/*
	资金管理
	 */
	public function fund(){

		$db=M('money_water');

		$map=array('user_id'=>$this->user_id);

		$count =$db->where($map)->count();
		$Page = new Page($count,20);
		$Page->setConfig('prev', '上一页');
		$Page->setConfig('next', '下一页');
		$Page->setConfig('theme',"%upPage% %downPage%");
		$page = $Page->show();
		$this->assign('page',$page);

		$list=$db->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);
		$this->display();
	}


	/*
	订单列表【我的购买订单】
	 */
	public function order_list(){
		//var_dump($_SESSION['wx_userinfo']);

		$wx_conf=M('wechat_config')->find(1);

		//微信js接口
		import("@.ORG.Wxjssdk");
		$wx_config=F('wx_config');
		$jsobj=new Wxjssdk($wx_config['appid'],$wx_config['appsecret']);
		$jssign=$jsobj->getSignPackage();
		//var_dump($jssign);
		$this->assign('jssign',$jssign);

		$order_status = 1;
		$order_status = intval(I('get.order_status'));
		$wait = intval(I('get.wait'));

		$pay_status = intval(I('get.pay_status'));

		$order_style = intval(I('get.order_style')) ? intval(I('get.order_style')) : 1;

		if($pay_status == 1 && $order_status <= 2)
		{
			$status_name = '待收货';
		}
		elseif($order_status == 3)
		{
			$status_name = '已完成';
			$pay_status = 1;
		}
		else
		{
			$status_name = '进行中'; 
		}

		$this->assign('status_name', $status_name);

		$db=M('order_info');
		$map=array('user_id'=>$this->user_id, 'role_id'=>$this->user_info['role_id'], 'order_style'=>$order_style);
		
		if($order_status)
		{
			$map['order_status'] = $order_status;
		}
		/* else
		{
			$map['order_status'] = 1;
		} */
		
		if ($wait) {
			$map['order_status'] = array("ELT", 2);
		}

		$map['pay_status'] = $pay_status;
		//var_dump($map);

		$count = $db->where($map)->count();	//
		$Page = new Page($count,10);
		$Page->setConfig('prev', '上一页');
		$Page->setConfig('next', '下一页');
		$Page->setConfig('theme',"%upPage% %downPage%");
		$page = $Page->show();
		$this->assign('page',$page);

		$list=$db->where($map)->order('id desc,pay_status asc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		foreach($list as $key=>$val){
			$goods_list = M('order_goods')->where(array('order_id'=>$val['id']))->select();
			foreach($goods_list as $k=>$goods)
			{
				$g = M('goods')->find($goods['goods_id']);
				$goods_list[$k]['trade_price'] = $g['trade_price'];
				$goods_list[$k]['package_num'] = $g['package_num'];
			}
			$list[$key]['goods'] = $goods_list;
		}
		//var_dump($list);

		if($order_style == 2)
		{
			$friend_pay = M('order_friend_pay');
			//calculate friend pay
			foreach($list as $k=>$order)
			{
				//get friend pay
				$friend_pay_list = $friend_pay->where(array('order_id'=>$order['id'], 'pay_status'=>1))->select();
				$payed_money = 0;
				foreach($friend_pay_list as $p)
				{
					$payed_money += $p['pay_money'];
				}
				$list[$k]['payed_money'] = $payed_money;
				$list[$k]['need_money'] = round($order['total_fee'] - $payed_money, 2);
				$list[$k]['percent'] = round($payed_money/$order['total_fee'], 2) * 100;
			}

			$this->assign('list',$list);
			$this->display('friend_order');
		}
		else
		{
			$this->assign('list',$list);
			
			if($this->user_info['role_id'] == 2)
			{
				$this->display('shop_keeper_order_list');
			}
			else
			{
				$this->display();
			}
		}
	}

	/*
	cancel order
	 */
	public function cancel_order()
	{
		$order_id = I('get.id');
		$db=M('order_info');
		$order_info = $db->find($order_id);
		$db->where(array('id'=>$order_id))->save(array('order_status'=>0));

		$this->redirect('order_list', array('pay_status'=>1, 'order_style'=>$order_info['order_style']));
	}

	/*
	订单详情
	 */
	public function order_detail(){
		$order_id=I('get.id');
		$db=M('order_info');
		$order_info=$db->find($order_id);
		if(empty($order_info)){
			$this->error('订单信息不存在',U('order_list'));
		}
		$order_goods=M('order_goods')->where(array('order_id'=>$order_id))->select();
		foreach($order_goods as $key=>$val){
			$info=M('goods')->find($val['goods_id']);
			$order_goods[$key]['goods_id']=$info['id'];
			$order_goods[$key]['goods_name']=$info['name'];
			$order_goods[$key]['goods_spic']=$info['spic'];
			$order_goods[$key]['trade_price']=$info['trade_price'];
			$order_goods[$key]['package_num']=$info['package_num'];
			unset($info);
		}

		if($order_info['order_style']==2)
		{
			
				//get friend pay
				$friend_pay_list = M('order_friend_pay')->where(array('order_id'=>$order_info['id'], 'pay_status'=>1))->select();
				//var_dump($friend_pay_list);
				$payed_money = 0;
				foreach($friend_pay_list as $p)
				{
					$payed_money += $p['pay_money'];
				}
				$order_info['payed_money'] = $payed_money;
				$order_info['need_money'] = round($order_info['total_fee'] - $payed_money, 2);
				$order_info['percent'] = round($payed_money/$order_info['total_fee'], 2) * 100;
				
				//var_dump($order_info);
		}


		$this->assign('info',$order_info);
		$this->assign('order_goods',$order_goods);

		if($order_info['role_id'] == 2)
		{
			$this->display('shop_keeper_order_detail');
		}
		else
		{
			$this->display();
		}


	}

	/*
	积分兑换订单
	 */
	public function jifen_order(){

		$db=M('jifen_order');

		$map=array('user_id'=>$this->user_id);

		$count = $db->where($map)->count();	//
		$Page = new Page($count,2);
		$Page->setConfig('prev', '上一页');
		$Page->setConfig('next', '下一页');
		$Page->setConfig('theme',"%upPage% %downPage%");
		$page = $Page->show();
		$this->assign('page',$page);

		$list=$db->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();

		foreach($list as $key=>$val){
			$list[$key]['goods']=M('jifen_order_goods')->where(array('order_id'=>$val['id']))->find();
		}

		$this->assign('list',$list);
		$this->display();
	}


	/*
	地址管理
	 */
	public function address_list(){

		$db=M('user_address');

		$map=array('user_id'=>$this->user_id);

		$count = $db->where($map)->count();	//
		$Page = new Page($count,20);
		$Page->setConfig('prev', '上一页');
		$Page->setConfig('next', '下一页');
		$Page->setConfig('theme',"%upPage% %downPage%");
		$page = $Page->show();
		$this->assign('page',$page);

		$list=$db->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);
		$this->display();
	}
	/*
	编辑地址
	 */
	public function address_edit(){
		$id=I('get.id');
		$db=M('user_address');
		$info=$db->find($id);
		$this->assign('info',$info);
		if($data=$this->_post()){
			$db->where(array('id'=>$id))->save($data);
			$this->redirect('address_list');
		}
		$this->display();

	}
	/*
	新增编辑
	 */
	public function address_add(){
		if($data=$this->_post()){
			$data['user_id']=$this->user_id;
			M('user_address')->add($data);
			$this->redirect('address_list');
		}
		$this->display();
	}
	/*
	我的二维码
	 */
	public function qrcode(){
		import('@.ORG.QRcode');
		import('@.ORG.Image.ThinkImage');

		if(I('get.parent_id')){
			$parent_id=I('get.parent_id');
		}else{
			$parent_id=$_SESSION['user_id'];//I('get.parent_id');
		}
		$url='http://'.I('server.HTTP_HOST').U("Index/index",array('parent_id'=>$parent_id));
		$qrcode_name='./Data/upload/qrcode/'.$parent_id.'.jpg';
		$logo="./Data/upload/headimg/".$parent_id.'_icon.jpg';
		if(!is_file($qrcode_name)||filesize($qrcode_name)==0){
			QRcode::png($url, $qrcode_name, 'L',8, 2); 			//生成图片
			if(is_file($logo)){
				$img = new ThinkImage(THINKIMAGE_GD,$qrcode_name);
				$img->water($logo,THINKIMAGE_WATER_CENTER)->save($qrcode_name);		//添加图片水印
			}
		}
		$this->assign('qrcode',$qrcode_name);

		import("@.ORG.Wxjssdk");
		$wx_config=F('wx_config');
		$jsobj=new Wxjssdk($wx_config['appid'],$wx_config['appsecret']);
		$jssign=$jsobj->getSignPackage();
		$this->assign('jssign',$jssign);

		$this->assign('parent_id',$parent_id);
		$this->display();
	}

	/*
	咕币商城【积分商城】
	 */
	public function jifen(){
		$db=M('jifen_goods');
		$list=$db->where()->order('id desc')->select();
		$this->assign('list',$list);
		//积分规则
		$conf=M('jifen_config')->find(1);
		$this->assign('conf',$conf);
		$this->display();
	}

	/*
	我的咕币【积分】流水
	 */
	public function jifen_list(){

		$db=M('jifen_water');

		$map=array('user_id'=>$this->user_id);

		$count = $db->where($map)->count();
		$Page = new Page($count,20);
		$Page->setConfig('prev', '上一页');
		$Page->setConfig('next', '下一页');
		$Page->setConfig('theme',"%upPage% %downPage%");
		$page = $Page->show();
		$this->assign('page',$page);


		$list=$db->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);

		$this->display();
	}

	/*
	咕币兑换
	 */
	public function jifen_cart(){
		$id=I('get.id');
		$info=M('jifen_goods')->find($id);
		$this->assign('info',$info);
		$this->display();
	}


	//根据原图地址获取缩略图地址
	private function  get_thumb($url){
		$path=  pathinfo($url);
		$path['basename']=  str_replace('thumb_', '', $path['basename']);
		return $path['dirname'].'/thumb_'.$path['basename'];
	}


	/*
	修改登录
	 */
	public function pwd(){
		$this->display();
	}
	/*
	商品评价
	 */
	public function goods_comment(){
		$db=M('order_goods');
		$id=I('get.id');
		$info=$db->where(array('id'=>$id))->find();
		$this->assign('info',$info);
		if($info['status']==1){	
			$this->error('您已经评价过了！');
		}else{
			$this->display();
		}
	}

	/*
	我的评论列表
	 */
	public function comment_list(){

		$db=M('goods_comment');

		$map=array('user_id'=>$this->user_id);

		$count = $db->where($map)->count();	//
		$Page = new Page($count,20);
		$Page->setConfig('prev', '上一页');
		$Page->setConfig('next', '下一页');
		$Page->setConfig('theme',"%upPage% %downPage%");
		$page = $Page->show();
		$this->assign('page',$page);

		$list=$db->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);
		$this->display();
	}

	/*
	设置账户名，密码【微信用户】
	 */
	public function set_account(){
		$this->display();
	}

	/*
	申请退款
	 */
	public function order_refund(){
		$id=I('get.id');
		$refund_type=I('get.refund_type');			//退款类型（1退款,2退货，3补差）
		switch($refund_type){
		case '1':
			$title="退款";
			break;	

		case '2':
			$title="退货";
			break;

		case '3':
			$title="补差";
			break;
		}
		$db=M('order_info');
		$order=M('order_info')->find($id);
		$this->assign('title',$title);
		$this->display();
	}

		/*
		我的收藏（喜欢）
		 */
	public function favorite(){
		$db=M('goods_collect');
		$map=array('uid'=>$this->user_id);

		$count = $db->where($map)->count();	//
		$Page = new Page($count,20);
		$Page->setConfig('prev', '上一页');
		$Page->setConfig('next', '下一页');
		$Page->setConfig('theme',"%upPage% %downPage%");
		$page = $Page->show();
		$this->assign('page',$page);

		$list=$db->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		foreach($list as $key=>$val){
			$ginfo=M('goods')->find($val['goods_id']);
			$list[$key]['name']=$ginfo['name'];
			$list[$key]['collect_num']=$ginfo['collect_num'];
			$list[$key]['spic']=$ginfo['spic'];
			$list[$key]['price']=$ginfo['price'];
			$list[$key]['market_price']=$ginfo['market_price'];
			$list[$key]['sale_num']=$ginfo['sale_num'] + $ginfo['base_num'];
		}
		$this->assign('list',$list);
		$this->display();
	}

	/****************shop keepper***************************************************************************************/

		/*
		申请店长step1
		 */
	public function apply_shopkeeper1(){
		if($this->user_info['role_id']==2){
			$this->error('您已经是店长了，请勿重复申请！');
		}else{
			//article

			//check position session
			$city_id = $_SESSION['position']['city_id'];
			if(!$city_id)
			{
				$this->redirect("Index/location_city");
				exit;
			}

			$article = M('cms_article')->where(array('id'=>4))->find();
			$this->assign('article', $article);

			$this->display();
		}

	}
		/*
		申请店长step2
		 */
	public function apply_shopkeeper2(){
		$city_id = $_SESSION['position']['city_id'];
		$school_id = $_SESSION['position']['school_id'];
		$school=M('school')->where(array('city_id'=>$city_id))->select();
		$this->assign('school',$school);

		//var_dump($_SESSION['position']);
		$curr_school = $_SESSION['position']['school'];
		$curr_build = $_SESSION['position']['build'];
		$this->assign('curr_build', $curr_build);
		//var_dump($curr_school);
		if($curr_school)
		{
			$this->assign('curr_school', $curr_school);

			$build_arr = M('building')->where(array('sch_id'=>$school_id, 'status'=>0))->select();
			$this->assign('build_arr', $build_arr);
		}
		
		if($this->user_info['role_id']==2){
			$this->error('您已经是店长了，请勿重复申请！');
		}else{
			$this->display();
		}
	}
		/*
		申请店长step3
		 */
	public function apply_shopkeeper3(){
		$this->display();
	}

		/*
		店主个人中心      
		 */
	public function shop_center()
	{
		if($this->user_info['role_id']==1){		//店主
			$this->redirect('index');
		}

		$db=M('order_info');
		$ymd=date('Ymd',time());

		if($this->user_info['id'] == 21)
		{
			$this->user_info['id'] = 11;
		}
		$shop = M('shop')->where(array('uid'=>$this->user_info['id']))->find();

		//今日订单总金额
		$today = strtotime('today');
		$map = array(
			'shop_id'            => $shop['id'],
			'confirm_order_time' => array('EGT',$today),
			'role_id'      		 => 1,
			'order_status' 		 => 3
		);
		$today_income = $db->where($map)->sum('total_fee');
		$today_income = floatval($today_income) * 0.95;

		//店铺信息
		$shop=M('shop')->where(array('uid'=>$this->user_id))->find();
		$this->assign('shop',$shop);
		
		/******************************************************************************************
			从2015-11-20 18:00:00 开始使用新的体现规则，之前的继续使用以前的规则
		******************************************************************************************/
		$newRoleTime = strtotime("2015-11-20 18:00:00");
		$today = strtotime('today');
		$par = array(
			'shop_id'            => $shop['id'],
			'confirm_order_time' => array('EGT', $today),
			'role_id'            => 1,
			'order_status'       => 3
		);
		//今日订单数量
		$today_order_count = $db->where($par)->count();
	
		// 使用新的提现规则
		/***********************calculate user income	IMPORTANT!!!! ************************/
		//1.set time limited
		$today_time = strtotime('today');

		if(I('session.check_money_today') != $today_time || 1) {
			$order = M('order_info');
			// 2.calculate money by user order
			// 按照新规则的可提现金额
			$map = array(
				'role_id'	   		 => 1,
				'is_new'	   		 => 1,
				'pay_time'	   		 => array('EGT', $newRoleTime),
				'shop_id'      		 => $shop['id'],
				'order_status' 		 => 3,
				'confirm_order_time' => array('ELT', $today_time)
			);
			$new_money1 = $order->where($map)->sum('total_fee');
			
			// 按照旧规则的可提现金额
			$map1 = array(
				'role_id'	   		 => 1,
				'is_new'	   		 => 1,
				'pay_time'	   		 => array('LT', $newRoleTime),
				'shop_id'      		 => $shop['id'],
				'order_status' 		 => 3,
				'confirm_order_time' => array('ELT', $today_time)
			);
			$new_money2 = $order->where($map1)->sum('total_fee');
			
			//3.update user money
			$new_money = ($new_money1 + $new_money2) * 0.95;
			$res = M('wechat_user')->where(array('id'=>$this->user_id))->setInc('money_account',$new_money);
			//4.update order status : set to is_withdrawed to 1
			if($res) {
				$order->where($map)->save(array('is_new'=>0));
				$order->where($map1)->save(array('is_new'=>0));
			}

			$user_info = M('wechat_user')->find($this->user_id);
			$this->assign('user_info', $user_info);

			session('check_money_today', $today_time);
		}
		/***********************************店长订单结算END****************************************/
		
		$can_withdraw = 1;
		$today = strtotime('today');
		if(I('session.withdraw_last_time') == $today)
		{
			$can_withdraw = 0;
		}
		$this->assign('can_withdraw', $can_withdraw);

		$this->assign('today_order_count',$today_order_count);
		$this->assign('today_income',$today_income);

		$this->display();
	}

	/*
	是否营业-店主
	 */
	public function shop_state(){
		$db=M('shop');
		$shop=$db->where(array('uid'=>$this->user_id))->find();
		$this->assign('shop_status',$shop['shop_status']);
		$this->display();
	}
	public function shop_product_show(){
		$id=I('get.id');
		$db=M('goods');
		//增加人气
		$db->where(array('id'=>$id))->setInc('hits',1);
		$info=$db->find($id);
		if(empty($info)){
			$this->error('商品不存在',U('product_list'));
		}
		$this->assign('info',$info);
		// 购物城商品数量
			/*foreach($_SESSION['shop_cart_info'] as $val){
				$cart_goods_nums+=$val['goods_nums'];
			}
			$_SESSION['cart_goods_nums']=$cart_goods_nums;*/
		$this->assign('cart_count',I('session.cart_goods_nums'));
		$this->display();
	}

	/*
	我销售订单【仅限于微店主】
	 */
	public function sale_order(){

		$db=M('order_info');
		$map=array('shop_id'=>$this->user_id);			//订单店铺id==微店主id

		$count = $db->where($map)->count();	//
		$Page = new Page($count,20);
		$Page->setConfig('prev', '上一页');
		$Page->setConfig('next', '下一页');
		$Page->setConfig('theme',"%upPage% %downPage%");
		$page = $Page->show();
		$this->assign('page',$page);

		$list=$db->where($map)->order('id desc,pay_status asc')->limit($Page->firstRow.','.$Page->listRows)->select();
		foreach($list as $key=>$val){
			$list[$key]['goods']=M('order_goods')->where(array('order_id'=>$val['id']))->find();
		}
		$this->assign('list',$list);
		$this->display();
	}

	/*
	【邀请开店】分销商
	 */
	public function resaler_invite(){
		if($this->user_info['role_id']!=3){
			$this->redirect('index');
		}

		import("@.ORG.Wxjssdk");
		import('@.ORG.QRcode');
		import('@.ORG.Image.ThinkImage');
		if($this->user_info['role_id']==3){		//分销商角色
			if(I('get.parent_id')){
				$parent_id=I('get.parent_id');
			}else{
				$parent_id=$_SESSION['user_id'];
			}
			//邀请二维码存储的链接地址
			$url='http://'.I('server.HTTP_HOST').U("Member/shop_reg",array('auxcode'=>$this->user_info['invite_code']));

			$this->assign('yaoqingcode',$this->user_info['invite_code']);

			$qrcode_name='./Data/upload/qrcode_invite/'.$parent_id.'.png';
			//$logo="./Data/upload/headimg/".$parent_id.'_icon.jpg';
			if(!is_file($qrcode_name)||filesize($qrcode_name)==0){
				QRcode::png($url, $qrcode_name, 'L',8, 2); 			//生成图片
			/*if(is_file($logo)){
				$img = new ThinkImage(THINKIMAGE_GD,$qrcode_name);
				$img->water($logo,THINKIMAGE_WATER_CENTER)->save($qrcode_name);		//添加图片水印
			}*/
			}
			$this->assign('qrcode',$qrcode_name);

			$wx_config=F('wx_config');
			$jsobj=new Wxjssdk($wx_config['appid'],$wx_config['appsecret']);
			$jssign=$jsobj->getSignPackage();
			$this->assign('jssign',$jssign);

			$this->assign('parent_id',$parent_id);
			$this->assign('invite_url',$url);			//邀请开店地址
			//邀请记录
			$where=array('parent_id'=>$this->user_id,'role_id'=>2);

			$count=M('wechat_user')->where($where)->count();	//
			$Page = new Page($count,20);
			$Page->setConfig('prev', '上一页');
			$Page->setConfig('next', '下一页');
			$Page->setConfig('theme',"%upPage% %downPage%");
			$page = $Page->show();
			$this->assign('page',$page);

			$invite_list=M('wechat_user')->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
			$this->assign('invite_list',$invite_list);
			//dump($url);die();
		}else{
			$this->redirect('Ucenter/spread');
		}
		$this->display();
	}

/*
我的推广
 */
	public function spread(){

		import("@.ORG.Wxjssdk");
		import('@.ORG.QRcode');

		if(I('get.parent_id')){
			$parent_id=I('get.parent_id');
		}else{
			$parent_id=$_SESSION['user_id'];
		}
		//邀请二维码存储的链接地址
		$url='http://'.I('server.HTTP_HOST').U("Index/index",array('parent_id'=>$parent_id));

		$qrcode_name='./Data/upload/qrcode_spread/'.$parent_id.'.png';
		if(!is_file($qrcode_name)||filesize($qrcode_name)==0){
			QRcode::png($url, $qrcode_name, 'L',8, 2); 			//生成图片
		}
		$this->assign('qrcode',$qrcode_name);

		$wx_config=F('wx_config');
		$jsobj=new Wxjssdk($wx_config['appid'],$wx_config['appsecret']);
		$jssign=$jsobj->getSignPackage();
		$this->assign('jssign',$jssign);

		$shop=M('wechat_user')->find($_SESSION['user_id']);
		//微信分享数据
		$share['title']='来逛逛奥克斯官方微商城~';
		$share['desc']='价格优惠！更有0库存创业神器 “奥克斯小老板”~轻松一键开店，赚高额佣金！';
		$share['imgUrl']=$shop['headimgurl'];
		$share['link']=$url;
		$this->assign('share',$share);

		$this->assign('parent_id',$parent_id);
		$this->assign('invite_url',$url);			//邀请开店地址


		//邀请记录
		$where=array('parent_id'=>$this->user_id,'role_id'=>1);

		$count=M('wechat_user')->where($where)->count();	//
		$Page = new Page($count,20);
		$Page->setConfig('prev', '上一页');
		$Page->setConfig('next', '下一页');
		$Page->setConfig('theme',"%upPage% %downPage%");
		$page = $Page->show();
		$this->assign('page',$page);

		$invite_list=M('wechat_user')->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();

		$this->assign('invite_list',$invite_list);

		$this->display();
	}


/*
注册开店
 */	
	public function shop_reg(){
		$db=M('wechat_user');
		$parent_id=I('get.parent_id');		//父类id	
		$reg_code=I('get.reg_code');		//注册码
		$this->assign('parent_id',$parent_id);
		$this->assign('reg_code',$reg_code);
		$this->display();
	}
/*
店铺商品管理
 */
	public function shop_goods(){

		if($this->user_info['role_id']==1){
			$this->redirect('index');
		}
		$db=M('goods');


		$count = $db->where()->count();	//
		$Page = new Page($count,20);
		$Page->setConfig('prev', '上一页');
		$Page->setConfig('next', '下一页');
		$Page->setConfig('theme',"%upPage% %downPage%");
		$page = $Page->show();
		$this->assign('page',$page);

		$list=$db->where()->limit($Page->firstRow.','.$Page->listRows)->select();
		$fenyongconfig=M("resale_config")->where(array('id'=>1))->getField('parent_1');
		foreach($list as $key=>$val){
			$list[$key]['shopuongjin']=($fenyongconfig/100)*$val['yongjin'];
		}
		$this->assign('list',$list);
		//我的推荐列表
		$_list=M('goods_recommend')->where(array('user_id'=>$this->user_id))->select();
		foreach($_list as $key=>$val){
			$my_list[]=$val['goods_id'];
		}
		$this->assign('my_list',$my_list);
		$this->display();
	}
/*
提现申请
 */
	public function take_money(){

		$banks = M('cms_article')->where(array('fid'=>2))->order('lists asc')->select();
		$this->assign('banks', $banks);

		$can_withdraw = 1;
		$today = strtotime('today');
		if(I('session.withdraw_last_time') == $today)
		{
			$can_withdraw = 0;
		}
		$this->assign('can_withdraw', $can_withdraw);
		$this->display();
	}

	public function take_money_ok(){
		$this->display();
	}

/*
replenishment
 */

/*
商品列表
 */
	public function replenishment(){
		
		$list=$_SESSION['shop_cart_info'];
		$this->assign('cart_goods', $list);

		import('@.ORG.Page');
		$db=M('goods');

		$cid=I('get.cid');				//分类id

		$rank=I('get.rank');			//排序

		if($rank=='price'){
			$order='price asc';
		}elseif($rank=='sale_nums'){
			$order='sale_nums desc';
		}elseif($rank=='hits'){
			$order='hits desc';
		}else{
			$order='id asc';
		}


		$page_title='全部商品';
		$map=array('is_sale'=>1);


		if($keyword=I('get.keyword')){
			$map['name']=array('like','%'.$keyword.'%');
			//记录历史搜索
			$so_history=cookie('so_history');
			if(empty($so_history)){
				$so_history=array($keyword);
			}else{
				array_unshift($so_history,$keyword);
			}
			cookie('so_history',$so_history);
		}	

		if($cid>0){
			$map['cid']=$cid;
			$page_title=M('goods_category')->where(array('id'=>$cid))->getField('name');
		}
		if($keyword=I('get.keyword')){
			$map['name']=array('like','%'.$keyword.'%');
		}
		$this->assign('page_title',$page_title);

		$count = $db->where($map)->count();
		$Page = new Page($count,10);
		$Page->setConfig('prev', '上一页');
		$Page->setConfig('next', '下一页');
		$Page->setConfig('theme',"%upPage% %downPage%");
		$page = $Page->show();
		$this->assign('page',$page);

		$list=$db->where($map)->order($order)->select();
		$this->assign('list',$list);
	/*
	商品分类
	 */
		$cate=M('goods_category')->limit(4)->select();
		$this->assign('cate',$cate);


		//cart

		$list=$_SESSION['shop_cart_info'];
		if(count($list)>0){
			foreach($list as $key=>$val){
				
				$info=M('goods')->find($val['goods_id']);

				$total_price+=$val['goods_price']*$val['goods_nums']*$info['package_num'];
				$list[$key]['name']=$info['name'];
				$list[$key]['spic']=$info['spic'];
				$list[$key]['store_num']=$info['store_num'];
				$list[$key]['package_num']=$info['package_num'];
				unset($info);
			}
			$total_fee=$total_price;
			$this->assign('total_price',$total_price);		//商品总金额【商品原始价格】
			$this->assign('total_fee',$total_fee);		//订单总金额【折后】
		}
		$this->display();	
	}



	public function shop_cart(){
		if(!$this->user_id){
			//无登录信息，跳转到登录页
			//$this->redirect('Member/login',array('jump'=>$jump));
		}
		$list=$_SESSION['shop_cart_info'];
		if(count($list)>0){
			foreach($list as $key=>$val){

				$info=M('goods')->find($val['goods_id']);

				//for shop keeper
				if($this->user_info['role_id'] == 2)
				{
					$val['goods_price'] = $info['trade_price'];
					//var_dump($info);exit;
				}
				$total_price+=$val['goods_price']*$val['goods_nums']*$info['package_num'];

				$list[$key]['goods_price'] = $val['goods_price'];
				$list[$key]['name']=$info['name'];
				$list[$key]['spic']=$info['spic'];
				$list[$key]['trade_price'] = $info['trade_price'];
				$list[$key]['store_num']=$info['store_num'];
				$list[$key]['package_num']=$info['package_num'];
				unset($info);
			}
			$total_fee=$total_price;
			$this->assign('total_price',$total_price);		//商品总金额【商品原始价格】
			$this->assign('total_fee',$total_fee);		//订单总金额【折后】
			$this->assign('list',$list);
		}


		$this->assign('user_info',$this->user_info);


		if(empty($list)){
			$this->display('Index/cart_empty');
		}else{
			$this->display();
		}


	}


		/*
		cart2
		 */
	public function shop_cart2(){
		$list=$_SESSION['shop_cart_info'];
		//$_SESSION['shop_cart_info'] = array();
		if(count($list)>0){
			foreach($list as $key=>$val){

				//for shop keeper

				$info=M('goods')->find($val['goods_id']);

				//for shop keeper
				if($this->user_info['role_id'] == 2)
				{
					$val['goods_price'] = $info['trade_price'];
					//var_dump($info);exit;
				}
				$total_price+=$val['goods_price']*$val['goods_nums']*$info['package_num'];

				$list[$key]['goods_price'] = $val['goods_price'];
				$list[$key]['goods_id']=$info['id'];
				$list[$key]['name']=$info['name'];
				$list[$key]['spic']=$info['spic'];
				$list[$key]['store_num']=$info['store_num'];
				$list[$key]['package_num']=$info['package_num'];
				$list[$key]['trade_price']=$info['trade_price'];
				unset($info);
			}
			$total_fee=$total_price;
			$this->assign('total_price',$total_price);		//商品总金额【商品原始价格】
			$this->assign('total_fee',$total_fee);		//订单总金额【折后】
			$this->assign('list',$list);
		}

		//判断浏览器
		$agent=is_weixin();
		if($agent){
			$this->assign('agent','weixin');
		}else{
			$this->assign('agent','liulanqi');
		}
		//配送地址
		$addr['province']=cookie('province');
		$addr['city']=cookie('city');
		$addr['district']=cookie('district');
		$this->assign('addr',$addr);

		$this->assign('user_info', $this->user_info);



		//for shop order
		if($_SESSION['user_info']['role_id'] == 2)
		{
			$user_id=$_SESSION['user_id'];
			$shop = M('shop')->where(array('uid'=>$user_id))->find();
			$shop_id = $shop['id'];

			foreach($list as $k=>$val)
			{
				$goods_id = $val['goods_id'];

				$goods_info=M('goods')->find($val['goods_id']);

				$shop_goods = M('shop_goods')->where(array('goods_id'=>$goods_id, 'shop_id'=>$shop_id))->find();
				if($shop_goods)
				{
					$goods_num = $shop_goods['store_num'] + $val['goods_nums'];
					//$M('shop_goods')->where(array('goods_id'=>$goods_id, 'shop_id'=>$shop_id))->save(array('store_num'=>$goods_num));
				}
				else
				{
					$shop_goods['goods_id'] = $goods_id;
					$shop_goods['shop_id'] = $shop_id;
					$shop_goods['cid'] = $goods_info['cid'];
					$shop_goods['store_num'] = $val['goods_nums'];
					$shop_goods['goods_price'] = $val['goods_price'];

					//$M('shop_goods')->add($shop_goods);
				}
				//var_dump($shop_goods);
			}
		}





		$this->display();
	}
	
	/*
	 *	店长更新商品价格，上下架信息
	 */
	public function update_shop_goods()
	{
		$userInfo  = $this->user_info;
		$shop      = M('shop')->where(array('uid'=>$userInfo['id']))->find();
		$shop_id   = $shop['id'];
		$shopGoods = M('shop_goods')->where(array('shop_id'=>$shop_id))->select();
		
		$goods = M('goods');
		foreach ($shopGoods as $key => $val) {
			$goodsId = $val['goods_id'];
			$shopGoods[$key]['goods_info'] = M('goods')->where(array('id'=>$goodsId))->find();
		}
		
		$this->assign('goods',$shopGoods);
		$this->assign('shop_id',$shop_id);
		$this->display();
	}



}

