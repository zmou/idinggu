<?php
	/*
	首页控制器-【微信商城】
	*/
	class IndexAction extends BaseAction{

		public function _initialize(){
			parent::_initialize();
			$agent = $_SERVER['HTTP_USER_AGENT']; 
			if(!strpos($agent,"icroMessenger")) {
				//exit('此功能只能在微信浏览器中使用');
			}
			$this->assign('user_info',$this->user_info);
			//微信js接口
			import("@.ORG.Wxjssdk");
			$wx_config=F('wx_config');
			/*$jsobj=new Wxjssdk($wx_config['appid'],$wx_config['appsecret']);
			$jssign=$jsobj->getSignPackage();
			$this->assign('jssign',$jssign);*/
			//微信js接口

			$act_arr=array('index','product_list','product_show');
			//店铺营业状态
			$shop=M('shop')->where(array('uid'=>I('session.shop_id')))->find();
			$shop['user']=M('wechat_user')->find(I('session.shop_id'));

			$this->assign('user_info', $_SESSION['user_info']);
			$this->assign('shop',$shop);
			if($shop['shop_status']==0){
				if(in_array(ACTION_NAME,$act_arr)){
					//$this->redirect('sleep_tip');	
				}
			}
		}

		public function update_school()
		{
			/*
			$school_list = M('school')->order('id asc')->limit(1800,500)->select();
			foreach($school_list as $k=>$school)
			{
				$county_id = $school['county_id'];
				$county = M('region')->where(array('region_type'=>3,'region_name'=>$school['county'], 'parent_id'=>$school['city_id']))->find();
				if(!$county)
				{
					//var_dump($school);
					//var_dump($county);
					M('school')->where(array('id'=>$school['id']))->save(array('county_id'=>0));
					echo '//'.$school['name'].'<br>';
				}
				else
				{
					M('school')->where(array('id'=>$school['id']))->save(array('county_id'=>$county['id']));
					echo '**'.$school['name'].'<br>';
				}
			}
			 */
		}

		public function insert_school()
		{
			/*
			$school = M('school');
			$region = M('region');
			$province_list = $region->where(array('region_type'=>3))->order('id asc')->limit(3000,200)->select();
			//var_dump($province_list);
			foreach($province_list as $p)
			{
				echo $p['id'].'<br>';
				$res = $school->where(array('county'=>$p['region_name'],'city_id'=>$p['parent_id']))->save(array('county_id'=>$p['id']));

				if(!$res)
				{
					echo $school->getError();
				}
				else
				{
					echo 'fds';
				}
			}*/
		}
		public function insert_build()
		{
			/*
			$school = M('school');
			$build = M('building');
			$school_list = $school->order('id asc')->limit(1700,150)->select();
			//var_dump($province_list);
			foreach($school_list as $p)
			{
				echo $p['id'].'<br>';
				$res = $build->where(array('sch_name'=>$p['name']))->save(array('sch_id'=>$p['id']));
				if(!$res)
				{
					echo $school->getError();
				}
				else
				{
					echo 'fds';
				}
			}*/
		}
		//首页
		public function index(){
			$userInfo = $this->user_info;
			if ( empty($userInfo['user_building']) ) {
				$this->redirect('location_city');
			}
			
			$position = position_fix($userInfo['user_building']);
			//地理位置入库
			M('wechat_user')->where(array('id'=>$this->user_id))->save(array('last_position'=>serialize($position)));
			//地理位置写入session
			session('position', $position);
			
			/* if(empty($this->position)){
				$this->redirect('location_city');
			} */
			
			//轮播图片
			$slide=M('slide')->where(array('cid'=>1))->select();
			$this->assign('slide',$slide);
			//商品分类
			$cate=M('goods_category')->select();
			$this->assign('cate',$cate);
			//var_dump($cate);
			$this->display();
		}
		/*
		店长休息提示页面
		*/
		public function shop_sleep(){
			//轮播图片
			$slide=M('slide')->where(array('cid'=>1))->select();
			$this->assign('slide',$slide);

			$this->display();
		}

		/*
		搜索
		*/
		public function search(){
			$list=cookie('so_history');
			$list=array_unique($list);
			$this->assign('list',$list);
			$this->display();
		}


		/*
		按分类展示商品
		*/
		public function cate_product(){
			import('@.ORG.Page');
			$db=M('goods');
			if($cate_id=I('get.cate_id')){
				$map=array('cid'=>array('like','%'.$cate_id.'%'));
			}
			$cate_info=M('goods_category')->field('id,name')->find($cate_id);
			$this->assign('page_title',$cate_info['name']);

			$count = $db->where($map)->count();
			$Page = new Page($count,20);
			$Page->setConfig('prev', '上一页');
			$Page->setConfig('next', '下一页');
			$Page->setConfig('theme',"%upPage% %downPage%");
			$page = $Page->show();
			$this->assign('page',$page);

			$list=$db->where($map)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
			$this->assign('list',$list);
			$this->display();
		}

		/*
		商品列表
		*/
		public function product_list(){
			//var_dump($_SESSION['position']);
			import('@.ORG.Page');
			$db=M('goods');

			$cid=I('get.cid');				//分类id

			$rank=I('get.rank');			//排序

			//building id (shop id)
			$build_id = $_SESSION['position']['build_id'];

			$shop_id = I('session.shop_id');

			$shop = M('shop')->find($shop_id);

			$this->assign('shop', $shop);

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

			/*


			$map = $goods_id_str;

			$count = $db->where($map)->count();
			$Page = new Page($count,20);
			$Page->setConfig('prev', '上一页');
			$Page->setConfig('next', '下一页');
			$Page->setConfig('theme',"%upPage% %downPage%");
			$page = $Page->show();
			$this->assign('page',$page);

			$list=$db->where($map)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
			//var_dump($map);
			$this->assign('list',$list);
			/*
			商品分类
			*/
			$cate=M('goods_category')->limit(4)->select();

			foreach($cate as $k=>$v)
			{
				//get shop goods
				$goods_id_arr = array();
				$shop_goods_list = M('shop_goods')->where(array('cid'=>$v['id'], 'shop_id'=>$shop_id))->select();
				//var_dump($shop_goods_list);exit;
				$goods_list = array();
				foreach($shop_goods_list as $goods)
				{
					//$goods_id_arr[] = $goods['goods_id'];
					//$goods_id_arr[] = $goods['id'];
					$goods_info = M('goods')->find($goods['goods_id']);

					$collect_count = M('goods_collect')->where(array('goods_id'=>$goods['id']))->count();
					$goods_info['collect'] = $goods_info['collect_num'] + $collect_count;
					$goods_info['sale_num'] = $goods_info['base_num'] + $goods['sale_num'];
					$goods_info['store_num'] = $goods['store_num'];
					//var_dump($goods_info);exit;

					$goods_list[] = $goods_info;

				}
				$cate[$k]['goods_list'] = $goods_list;
			}
			//var_dump($cate[1]);

			$this->assign('cate',$cate);

			if($this->user_info['role_id'] == 2)
			{
				$this->display('shop_product_list');
			}
			else
			{
				$this->display();	
			}
		}
		/*
		商品详情页
		*/
		public function product_show(){
			$id=I('get.id');
			$db=M('goods');
			
			$shop_id = I('session.shop_id');

			$shop = M('shop')->find($shop_id);

			$this->assign('shop', $shop);

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
		购物车
		*/
		public function cart(){
			//var_dump($this->user_id);
			//var_dump($_SESSION['shop_cart_info']);
			//for shop keeper
			//var_dump(I('session.shop'));

			//$shop = I('session.shop');
			//$res = send_sms($shop['mobile'], 'Hello');
			//var_dump($res);

			$shop_id = I('session.shop_id');

			$shop = M('shop')->find($shop_id);

			$this->assign('shop', $shop);

			if($this->user_info['role_id'] == 2)
			{
				$this->redirect('Ucenter/shop_cart');
				//$val['goods_price'] = $info['trade_price'];
			}


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
					$total_price+=$val['goods_price']*$val['goods_nums'];

					$list[$key]['goods_price'] = $val['goods_price'];
					$list[$key]['name']=$info['name'];
					$list[$key]['spic']=$info['spic'];
					$list[$key]['trade_price'] = $info['trade_price'];
					$list[$key]['store_num']=$info['store_num'];
					unset($info);
				}
				$total_fee=$total_price;
				$this->assign('total_price',$total_price);		//商品总金额【商品原始价格】
				$this->assign('total_fee',$total_fee);		//订单总金额【折后】
				$this->assign('list',$list);
			}
			//收货地址
			$addr_list=M('user_address')->where(array('user_id'=>$this->user_id))->select();
			$this->assign('addr_list',$addr_list);
			if(empty($list)){
				$this->display('cart_empty');
			}else{
				$this->display();
			}


		}


		/*
		cart2
		*/
		public function cart2(){
			if(!isset($this->user_id)){
				$jump=base64_encode(U('Index/cart2'));
				//$this->error('您还没有登录，请先登录',U('Member/login',array('jump'=>$jump)));
			}
			$list=$_SESSION['shop_cart_info'];
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
					$total_price+=$val['goods_price']*$val['goods_nums'];

					$list[$key]['goods_price'] = $val['goods_price'];
					$list[$key]['name']=$info['name'];
					$list[$key]['spic']=$info['spic'];
					$list[$key]['store_num']=$info['store_num'];
					unset($info);
				}
				$total_fee=$total_price;
				$this->assign('total_price',$total_price);		//商品总金额【商品原始价格】
				$this->assign('total_fee',$total_fee);		//订单总金额【折后】
				$this->assign('list',$list);
			}
			//收货地址
			//$addr_list=M('user_address')->where(array('user_id'=>$this->user_id))->select();
			//		$this->assign('addr_list',$addr_list);
			//快递公司
			//$express=M('express')->where(array('status'=>1))->select();
			//		$this->assign('express',$express);

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

			$this->display();
		}

		/*
		friend pay - my page
		*/
		public function friend_buy()
		{
			$address = I('get.address');
			$mobile = I('get.mobile');

			$this->assign('address', $address);
			$this->assign('mobile', $mobile);
			//get all goods of cart

			if(!$this->user_id){
				//无登录信息，跳转到登录页
				//$this->redirect('Member/login',array('jump'=>$jump));
			}
			$list=$_SESSION['shop_cart_info'];
			if(count($list)>0){
				foreach($list as $key=>$val){

					$info=M('goods')->find($val['goods_id']);
					$total_price+=$val['goods_price']*$val['goods_nums'];

					$list[$key]['goods_price'] = $val['goods_price'];
					$list[$key]['name']=$info['name'];
					$list[$key]['spic']=$info['spic'];
					$list[$key]['trade_price'] = $info['trade_price'];
					$list[$key]['store_num']=$info['store_num'];
					unset($info);
				}
				$total_fee=$total_price;
				$this->assign('total_price',$total_price);		//商品总金额【商品原始价格】
				$this->assign('total_fee',$total_fee);		//订单总金额【折后】
				$this->assign('list',$list);
			}

			$order_sn='DG'.date('mdHis',time()).rand(1111,9999);
			$this->assign('order_sn', $order_sn);

			$wx_conf=M('wechat_config')->find(1);

			//微信js接口
			import("@.ORG.Wxjssdk");
			$wx_config=F('wx_config');
			$jsobj=new Wxjssdk($wx_config['appid'],$wx_config['appsecret']);
			$jssign=$jsobj->getSignPackage();
			//var_dump($jssign);
			$this->assign('jssign',$jssign);

			$this->display();
		}


		/*
		friend img
		*/

		public function friend_ing()
		{
			$order_sn=I('get.order_sn');
			$db=M('order_info');
			$order_info_arr = $db->where(array('order_sn'=>$order_sn))->limit(1)->select();
			$order_info = $order_info_arr[0];
			$order_id = $order_info['id'];

			if(empty($order_info)){
				$this->error('订单信息不存在',U('order_list'));
			}
			$order_goods=M('order_goods')->where(array('order_id'=>$order_id))->select();
			foreach($order_goods as $key=>$val){
				$info=M('goods')->find($val['goods_id']);
				$order_goods[$key]['goods_id']=$info['id'];
				$order_goods[$key]['goods_name']=$info['name'];
				$order_goods[$key]['goods_spic']=$info['spic'];
				$order_goods[$key]['sub_total'] = $val['goods_price'] * $val['goods_nums'];
				unset($info);
			}
			//var_dump($order_goods);
			$this->assign('order_info',$order_info);
			$this->assign('order_goods',$order_goods);


			//get user info
			$user_id = $order_info['user_id'];
			$user_info=M('wechat_user')->find($user_id);
			$this->assign('user_info', $user_info);
			//var_dump($user_info);

			//get order photos
			$ph = M('order_photo');
			$photo_list = $ph->where(array('order_id'=>$order_id))->limit(5)->select();
			$this->assign('photo_list', $photo_list);
			//var_dump($photo_list);

			//payed friends list
			$friend_pay = M('order_friend_pay');
			$payed_friends = $friend_pay->where(array('order_id'=>$order_id, 'pay_status'=>1))->select();

			$payed_money = 0;
			foreach($payed_friends as $p)
			{
				$payed_money += $p['pay_money'];
			}
			$friend_order['payed_money'] = $payed_money;
			$friend_order['need_money'] = round($order_info['total_fee'] - $payed_money, 2);
			$friend_order['percent'] = round($payed_money/$order_info['total_fee'], 2) * 100;
			$friend_order['total_friends'] = count($payed_friends);

			$is_done = 0;
			if($friend_order['payed_money'] >= $order_info['total_fee'])
			{
				$is_done = 1;
			}
			$this->assign('is_done', $is_done);
			$this->assign('friend_order', $friend_order);

			$this->assign('payed_friends', $payed_friends);
			//$this->assign('total_friends', count($payed_friends));
			//var_dump($payed_friends);exit;

			//friend user info
			$this->assign('friend_info', $_SESSION['wx_userinfo']);
			//var_dump($_SESSION['wx_userinfo']);

			$this->display();
		}

		/*
		购物车-收货地址
		*/
		public function cart_address(){
			$this->display();	
		}



		//根据原图地址获取缩略图地址
		private function  get_thumb($url){
			$path=  pathinfo($url);
			$path['basename']=  str_replace('thumb_', '', $path['basename']);
			return $path['dirname'].'/thumb_'.$path['basename'];
		}

		/*
		商品分类页
		*/
		public function category(){
			$db=M('goods_category');
			$list=$db->where(array('is_show'=>1,'fup'=>0))->select();
			foreach($list as $key=>$val){
				$child=$db->where(array('is_show'=>1,'fup'=>$val['id']))->select();
				$list[$key]['child']=$child;
				unset($child);
			}
			$this->assign('list',$list);
			$this->display();
		}


		/*
		咕币【积分】兑换
		*/
		public function jifen_cart(){
			$db=M('jifen_goods');
			$id=I('get.id');
			$info=$db->find($id);
			$this->assign('info',$info);
			//收货地址
			$addr_list=M('user_address')->where(array('user_id'=>$this->user_id))->select();
			$this->assign('addr_list',$addr_list);
			$this->display();		
		}

		/*
		朋友众筹-玩法
		*/
		public function	friend_rule(){
			$this->display();
		} 

		/*
		地理位置-城市
		*/
		public function location_city(){
			$spell_arr=range('a','z');
			$this->assign('spell_arr',$spell_arr);


			$map = array('region_type'=>2);
			if($city_name = I('get.city')){
				$map['region_name'] = array('like','%'.$city_name.'%');
			}
			$city_list=M('region')->where($map)->select();

			foreach($spell_arr as $val){
				foreach($city_list as $k=>$v){
					if($v['first_spell']==$val){
						$city_arr[$val][]=$v;
						unset($city_list[$k]);
					}
				}
			}
			$this->assign('city_arr',$city_arr);
			//热门城市
			$hot_city=M('hot_city')->where()->order('sort asc')->select();
			$this->assign('hot_city',$hot_city);
			$this->display();
		}

		/*
		地理位置-学校
		*/
		public function location_school(){
			$city_id=I('get.city_id');
			
			// 记录用户的城市ID
			$userInfo = $this->user_info;
			$user = M('wechat_user');
			$user->where(array('id'=>$userInfo['id']))->save(array('user_city'=>$city_id));

			$map = array('parent_id'=>$city_id);

			//for locaion city
			if($city_name = I('get.city_name'))
			{
				$region_city = M('region')->where(array('region_name'=>$city_name))->find();
				if($region_city)
				{
					$city_id = $region_city['id'];
					$map = array('parent_id'=>$city_id);
				}
			}

			if($school_name = I('get.school')){
				$map['region_name'] = array('like','%'.$school_name.'%');
			}
			$city_list=M('region')->where($map)->select();


			$county=M('region')->where(array('parent_id'=>$city_id))->order('sort asc')->select();

			foreach($county as $key=>$val){
				$map = array('county_id'=>$val['id']);
				
				if($school_name = I('get.school')){
					$map['name'] = array('like','%'.$school_name.'%');
				}

				$county_list[$val['region_name']]=M('school')->where($map)->select();
			}
			//select no county id school
			
			$map = array('county_id'=>0);				
			if($school_name = I('get.school')){
				$map['name'] = array('like','%'.$school_name.'%');
			}

			$county_list['其他'] = M('school')->where(array('city_id'=>$city_id,'county_id'=>0))->select();

			$this->assign('city_id', $city_id);
			//过滤无学校的区县
			$county_list=array_filter($county_list);			
			$this->assign('county_list',$county_list);
			$this->display();
		}

		/*
		地理位置-宿舍楼
		*/
		public function location_building(){
			$sch_id=I('get.sch_id');
			
			// 记录用户的学校ID
			$userInfo = $this->user_info;
			$user = M('wechat_user');
			$user->where(array('id'=>$userInfo['id']))->save(array('user_school'=>$sch_id));
			
			$db=M('building');
			$map=array('sch_id'=>$sch_id);
			$build_list=$db->where($map)->select();
			foreach($build_list as $key=>$val){
				$shop=M('shop')->where(array('build_id'=>$val['id']))->find();
				$build_list[$key]['shop']=$shop;
				unset($shop);
			}
			$this->assign('build_list',$build_list);
			//学校信息
			$sch_info=M('school')->find($sch_id);
			$this->assign('sch_info',$sch_info);
			$this->display();
		}

		/*
		充值成功-同步回调页面
		*/
		public function recharge_success(){
			$db=M('recharge');
			if($order_id=I('get.order_id')){
				$charge=$db->where(array('id'=>$order_id))->find();
				if($charge['lock']==0&&$charge['pay_status']==1){
					//增加现金账户
					M('wechat_user')->where(array('id'=>$charge['user_id']))->setInc('money_account',$charge['money']);
					$db->where(array('id'=>$order_id))->save(array('lock'=>1));
				}
				$this->redirect('Ucenter/index');
			}
		}

		public function upload() {
			if (!empty($_FILES)) {
				//如果有文件上传 上传附件
				$this->_upload();
			}
		}

		// 文件上传
		protected function _upload() {

			import('@.ORG.UploadFile');
			$upload = new UploadFile();
			$upload->maxSize            = 3292200;
			$upload->allowExts          = explode(',', 'jpg,gif,png,jpeg');
			//设置附件上传目录
			$upload->savePath           = './Data/upload/order_photo/';
			//设置需要生成缩略图，仅对图像文件有效
			$upload->thumb              = true;
			// 设置引用图片类库包路径
			$upload->imageClassPath     = '@.ORG.Image';
			//设置需要生成缩略图的文件后缀
			$upload->thumbPrefix        = 'm_,s_';  //生产2张缩略图
			$upload->thumbMaxWidth      = '400,100';
			$upload->thumbMaxHeight     = '400,100';
			//设置上传文件规则
			$upload->saveRule           = 'uniqid';
			//删除原图

			$upload->thumbRemoveOrigin  = true;
			if (!$upload->upload()) {
				//捕获上传异常
				$err = $upload->getErrorMsg();
				echo "<script type='text/javascript'>parent.callback('图片上传失败".$err."',false)</script>";
				exit;

			} else {
				//取得成功上传的文件信息
				$uploadList = $upload->getUploadFileInfo();
				import('@.ORG.Image');
				//给m_缩略图添加水印, Image::water('原文件名','水印图片地址')
				//Image::water($uploadList[0]['savepath'] . 'm_' . $uploadList[0]['savename'], APP_PATH.'Tpl/Public/Images/logo.png');
				$_POST['image'] = $uploadList[0]['savename'];
			}
			//echo 'dddfff';exit;
			$model  = M('order_photo');
			//保存当前数据对象
			$data['order_sn'] = $_POST['order_sn'];
			$data['image']          = $upload->savePath.'m_'.$_POST['image'];
			$data['create_time']    = NOW_TIME;

			$list   = $model->add($data);
			//var_dump($uploadList);exit;
			if ($list !== false) {
				//$this->success('上传图片成功！');
				echo "<script type='text/javascript'>parent.callback('".$data['image']."',true)</script>";  

			} else {
				//$this->error('上传图片失败!');
				echo "<script type='text/javascript'>parent.callback('图片上传失败',false)</script>";
			}
		}
	}
