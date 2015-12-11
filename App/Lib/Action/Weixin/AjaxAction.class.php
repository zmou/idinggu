<?php
/*
	Ajax请求处理控制器-【微信商城】
 */
class AjaxAction extends Action{
	public $user_id;
	public $user_info;
	public function _initialize(){
		$this->user_id=I('session.user_id');;
		$this->user_info=M('wechat_user')->find($this->user_id);
	}
	/*
		保存购物车地址
	 */
	public function save_address(){
		$_SESSION['address_cache']=$data=$this->_post();
		//入库
		$data['user_id']=$_SESSION['user_id'];
		M('user_address')->add($data);
		echo 1;
	}
	
	// 发送微信模板消息
	public function sendTplMsg()
	{
		$out_trade_no = I('get.order_sn');
		
		/***********************************发送微信模板消息**********************************/
        $order_info   = M('order_info')->where(array('order_sn'=>$out_trade_no))->find();
        $user_info    = M('wechat_user')->where(array('id'=>$order_info['user_id']))->find();
        $shop         = M('shop')->where(array('id'=>$order_info['shop_id']))->find();
        $shop_keeper  = M('wechat_user')->where(array('id'=>$shop['uid']))->find();
		$wechatConfig = M('wechat_config')->find();
		
		import("@.ORG.Wxjssdk");
		$Wxjssdk      = new Wxjssdk($wechatConfig['appid'], $wechatConfig['appsecret']);
		// 获取access_token
		$accessToken = $Wxjssdk->getAccessToken();
		$msgurl = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=$accessToken";
		
		if ($order_info['order_style'] == 1) {
			$r_url = 'http://m.idinggu.com/index.php?m=Ucenter&a=order_list&pay_status=0';
			$orderType = '自己买';
		} else {
			$r_url = 'http://m.idinggu.com/index.php?m=Ucenter&a=order_list&pay_status=0&order_style=2';
			$orderType = '朋友请';
		}
		
		$msgData = '{
			"touser":"' . $shop_keeper['wechatid'] . '",
			"template_id":"kzNDUqBXTDI7rrFxY-JvrHmlXygkQM7w16Q6SharRoY",
			"url":"'.$r_url.'",
			"topcolor":"#FF0000",
			"data":{
				"first": {
					"value":"亲！又来新订单啦，走起~~",
					"color":"#173177"
				},
				"tradeDateTime":{
					"value":"' . date("Y-m-d H:i:s", $order_info['order_time']) . '",
					"color":"#173177"
				},
				"orderType": {
					"value":"'.$orderType.'",
					"color":"#173177"
				},
				"customerInfo":{
					"value":"寝室号：' . $order_info['address'] . ",姓名：" . $user_info['name'] . ",电话：" . $order_info['mobile'] . '",
					"color":"#173177"
				},
				"orderItemName":{
					"value":"订单描述",
					"color":"#173177"
				},
				"orderItemData":{
					"value":"' . $order_info['order_title'] . '",
					"color":"#173177"
				},
				"remark":{
					"value":"' . $order_info['remark'] . '",
					"color":"#173177"
				}
			}

		}';
		
		$res = http_request($msgurl, $msgData);
		
		/************************************微信模板消息end****************************************/
	}
	
	
	/*
		添加购物车
	 */
	public function addcart(){
		$goods_id=I('post.goods_id');
		$goods_nums=I('post.goods_nums');
		$goods_price=I('post.goods_price');
		$package_num=I('post.package_num') ? intval('post.package_num') : 1;
		$goods_nums = $goods_nums * $package_num;
		//echo $goods_nums;exit;

		if($_SESSION['user_info']['role_id']==1)
		{
			$shop_goods = M('shop_goods')->where(array('goods_id'=>$goods_id, 'shop_id'=>$_SESSION['shop_id']))->find();

			$need_nums = intval($_SESSION['shop_cart_info'][$goods_id]['goods_nums']) + 1;
			if($shop_goods['store_num'] < $need_nums)
			{
				echo 0;
				exit;
			}
			else
			{
				//echo $goods_id;
				//echo 'df';exit;
			}
		}
		//echo $goods_nums;exit;
		addcart($goods_id,$goods_nums,$goods_price);
		foreach($_SESSION['shop_cart_info'] as $val){
			$cart_goods_nums+=$val['goods_nums'];
		}
		$_SESSION['cart_goods_nums']=$cart_goods_nums;
		echo $cart_goods_nums;
	}

	/*
		shop keeper add to cart/replenishment
	 */

	public function replenishment_addcart()
	{
		$goods_id=I('post.goods_id');
		$goods_nums=I('post.goods_nums');
		$goods_price=I('post.goods_price');
		addcart($goods_id,$goods_nums,$goods_price);
		foreach($_SESSION['shop_cart_info'] as $val){
			$cart_goods_nums+=$val['goods_nums'];
		}
		$_SESSION['cart_goods_nums']=$cart_goods_nums;


		//calculate total
		$list=$_SESSION['shop_cart_info'];
		if(count($list)>0){
			foreach($list as $key=>$val){
				$total_price+=$val['goods_price']*$val['goods_nums'];
				$info=M('goods')->find($val['goods_id']);
				$list[$key]['name']=$info['name'];
				$list[$key]['spic']=$info['spic'];
				$list[$key]['store_num']=$info['store_num'];
				unset($info);
			}
			/*
			$total_fee=$total_price;
			$this->assign('total_price',$total_price);		//商品总金额【商品原始价格】
			$this->assign('total_fee',$total_fee);		//订单总金额【折后】
			$this->assign('list',$list);*/
		}

		echo $total_fee;exit;
	}
	/*
		更新购物车
	 */
	public function updatecart(){
		$goods_id=I('post.goods_id');
		$act=I('post.act');		//add?增加:减少
		$package_num = I('post.package_num') ? I('post.package_num') : 1;

		$package_num = 1;
		$need_nums = 1;
		if($_SESSION['user_info']['role_id']==1)
		{
			$shop_goods = M('shop_goods')->where(array('goods_id'=>$goods_id, 'shop_id'=>$_SESSION['shop_id']))->find();
			
			if ($act == 'add') {
				$need_nums = intval($_SESSION['shop_cart_info'][$goods_id]['goods_nums']) + 1;
			}
			else if ($act == 'sub') {
				$need_nums = intval($_SESSION['shop_cart_info'][$goods_id]['goods_nums']) - 1;
			}
			else {
				$need_nums = intval($_SESSION['shop_cart_info'][$goods_id]['goods_nums']);
			}
			
			if($shop_goods['store_num'] < $need_nums)
			{
				$data = array(
					'info'            => 201,
					'goods_nums'	  => $shop_goods['store_num'],
					'cart_goods_nums' => $_SESSION['cart_goods_nums']
				);
				$this->ajaxReturn($data);
				exit;
			}
			else
			{
				//echo $goods_id;
				//echo 'df';exit;
			}
		}

		updatecart($goods_id,$act, $package_num);
		
		$shop_id = I('session.shop_id');
		$total_price = 0;
		foreach($_SESSION['shop_cart_info'] as $val){
			$shopGoods = M('shop_goods')->where(array('goods_id'=>$val['goods_id'],'shop_id'=>$shop_id))->find();
			$cart_goods_nums+=$val['goods_nums'];
			$total_price += $shopGoods['goods_price']*$val['goods_nums'];
		}
		$_SESSION['cart_goods_nums']=$cart_goods_nums;
		
		$data = array(
			'info'            => 200,
			'goods_nums'	  => $need_nums,
			'cart_goods_nums' => $cart_goods_nums,
			'total_price'     => $total_price
		);
		$this->ajaxReturn($data);
	}
	/*
		删除购物车
	 */
	public function delcart(){
		$goods_id=I('post.goods_id');
		$ids = explode(',', $goods_id);
		foreach($ids as $goods_id)
		{
			delcart($goods_id);
		}

		$total_price = 0;
		$cart_goods_nums = 0;
		foreach($_SESSION['shop_cart_info'] as $val){
			$cart_goods_nums+=$val['goods_nums'];
			$total_price += $val['goods_price']*$val['goods_nums'];
		}
		$_SESSION['cart_goods_nums']=$cart_goods_nums;
		
		$data = array(
			'info'            => 200,
			'cart_goods_nums' => $cart_goods_nums,
			'total_price'     => $total_price,
		);
		$this->ajaxReturn($data);
	}
	
	/*
	 * 删除喜欢
	 */
	//    public function delfavorite(){
	//        $goods_id=I('post.goods_id');
	//        $faorite=M("goods_collect");
	//        $ok=$faorite->delete($goods_id);
	//        if($ok){
	//            echo 1;
	//        }else{
	//            echo 2;
	//        }
	//
	//    }
	/*
		提交订单
	 */
	public function order(){
		if($arr=$this->_post()){

			if($addr_id=I('post.addr_id')){
				/*$addr_info=M('user_address')->find($addr_id);
				$order_data['consignee']=$addr_info['consignee'];
				$order_data['mobile']=$addr_info['mobile'];
				$order_data['zipcode']=$addr_info['zipcode'];

				$order_data['province_id']=$addr_info['province_id'];
				$order_data['city_id']=$addr_info['city_id'];
				$order_data['district_id']=$addr_info['district_id'];

				$order_data['province']=$addr_info['province'];
				$order_data['city']=$addr_info['city'];
				$order_data['district']=$addr_info['district'];
				$order_data['address']=$addr_info['address'];*/
			}else{
				/*$order_data['province_id']=$arr['province_id'];
				$order_data['city_id']=$arr['city_id'];
				$order_data['district_id']=$arr['district_id'];

				$order_data['province']=M('region')->where(array('id'=>$arr['province_id']))->getField('region_name');
				$order_data['city']=M('region')->where(array('id'=>$arr['city_id']))->getField('region_name');
				$order_data['district']=M('region')->where(array('id'=>$arr['district_id']))->getField('region_name');

				$order_data['consignee']=$arr['consignee'];
				$order_data['mobile']=$arr['mobile'];
				$order_data['address']=$arr['address'];*/
				$position=$_SESSION['position'];

				$order_data['consignee']=$arr['consignee'] ? $arr['consignee'] : $this->user_info['name'];

				$order_data['mobile']=$arr['mobile'];

				//add consignee and mobile
				$update_user_arr = array();
				if(!$this->user_info['name'])
				{
					$update_user_arr['name'] = $arr['consignee'];
				}
				if(!$this->user_info['mobile'])
				{
					$update_user_arr['mobile'] = $arr['mobile'];
				}
				if(!empty($update_user_arr))
				{
					M('wechat_user')->where(array('id'=>$this->user_info['id']))->save($update_user_arr);
				}

				$order_data['province_id']=$position['prov_id'];
				$order_data['city_id']=$position['city_id'];
				$order_data['district_id']=$position['county_id'];
				$order_data['school_id']=$position['school_id'];
				$order_data['build_id']=$position['build_id'];

				$order_data['province']=$position['prov'];
				$order_data['city']=$position['city'];
				$order_data['district']=$position['county'];
				$order_data['school']=$position['school'];
				$order_data['build']=$position['build'];

				$order_data['address']=$arr['address'];
				$order_data['order_style'] = $arr['order_style'];
				$order_data['order_message'] = $arr['order_message'];
				//插入地址表
				$order_data['user_id']=$this->user_id;
				//M('user_address')->add($order_data);

			}
			//$express=M("express")->find($arr['express_id']);
			//$order_data['express_name']=$express['name'];		//快递名称
			//$order_data['express_fee']=$express['price'];		//快递费用

			$order_data['user_id']=I('session.user_id');
			$order_data['role_id']=intval($_SESSION['user_info']['role_id']);
			$order_data['order_sn']='DG'.date('mdHis',time()).rand(1111,9999);
			//get order_sn from friend buy page
			if($arr['order_sn'])
			{
				$order_data['order_sn'] = $arr['order_sn'];
			}
			$order_data['order_time']=time();
			$order_data['pay_way']=$arr['pay_way']=1;		//1微信支付,2支付宝

			$goods_data=$_SESSION['shop_cart_info'];
			foreach($goods_data as $key=>$val){

				$info=M('goods')->find($val['goods_id']);

				if($order_data['role_id'] == 2)
				{
					//shop keeper order
					$val['goods_price'] = $info['trade_price'];
					$val['goods_nums'] = $val['goods_nums'] * $info['package_num'];

					$goods_data[$key]['goods_price'] = $val['trade_price'];
				}
				else
				{
				}

				$order_data['total_price']+=$val['goods_price']*$val['goods_nums'];			//商品总金额【商品原始价格总和】
				$goods_data[$key]['goods_name']=$info['name'];
				$goods_data[$key]['goods_spic']=$info['spic'];
				$goods_data[$key]['jifen']=$info['return_jifen'];		//赠送积分数量


				//add a order title
				$order_data['order_title'] = $info['name'];


			}
			//$error_msg = $order_data['order_title'];
			//$output=array('order_style'=>$arr['order_style'],'pay_way'=>$arr['pay_way'],'order_id'=>$order_id, 'error'=>$error, 'error_msg'=>$error_msg);
			//echo json_encode($output);exit;

			$order_data['total_fee']=$order_data['total_price'];		//商品总价+快递费用+$express['price']
			//插入订单表
			if(!empty($_SESSION['shop_id'])){
				$order_data['shop_id']=$_SESSION['shop_id'];			//店铺id
			}


			$order_m = M('order_info');

			$order_id = $order_m->add($order_data);

			if(!$order_id)
			{
				$order_data['address'] = $order_m->getDbError();
				$output=array('order_style'=>$arr['order_style'],'pay_way'=>$arr['pay_way'],'order_id'=>$order_id, 'err'=>$err);
				echo json_encode($order_data);exit;

			}

			foreach($goods_data as $key=>$val){
				$val['order_id']=$order_id;
				M('order_goods')->add($val);
			}

			//get order_sn from friend buy page
			if($arr['order_sn'])
			{
				$order_sn = $arr['order_sn'];
				$ph = M('order_photo');
				$ph->where(array('order_sn'=>$order_sn))->save(array('order_id'=>$order_id));
			}

			//for shop order
			//this should be done after payment finish
			/*
			if($order_data['role_id'] == 2)
			{
				$user_id=$_SESSION['user_id'];
				$shop = M('shop')->where(array('uid'=>$user_id))->find();
				$shop_id = $shop['id'];

				foreach($goods_data as $k=>$val)
				{

					$goods_id = $val['goods_id'];
					$goods_info=M('goods')->find($val['goods_id']);
					$shop_goods = M('shop_goods')->where(array('goods_id'=>$goods_id, 'shop_id'=>$shop_id))->find();


					if($shop_goods)
					{
						$goods_num = $shop_goods['store_num'] + $val['goods_nums'];
						M('shop_goods')->where(array('goods_id'=>$goods_id, 'shop_id'=>$shop_id))->save(array('store_num'=>$goods_num));
					}
					else
					{

						$shop_goods['goods_id'] = $goods_id;
						$shop_goods['shop_id'] = $shop_id;
						$shop_goods['cid'] = $goods_info['cid'];
						$shop_goods['store_num'] = $val['goods_nums'];
						$shop_goods['goods_price'] = $goods_info['price'];

						$res = M('shop_goods')->add($shop_goods);
						$err = M('shop_goods')->getDbError();
						$error_msg = $err;
					}
				}
			}
			 */
			

			if($arr['order_style'] == 2)
			{
				
				M('wechat_user')->where(array('id'=>$this->user_id))->setInc('jifen',10);
				//记录积分流水
				$water['user_id']=$this->user_id;
				$water['type']=1;						//支出
				$water['amount']=10;		//数量
				$water['way']='friend';
				$water['way_name']='好友请';						
				$water['posttime']=time();		
				M('jifen_water')->add($water);
			}

			unset($_SESSION['shop_cart_info']);
			unset($_SESSION['cart_goods_nums']);

			$output=array('order_style'=>$arr['order_style'],'pay_way'=>$arr['pay_way'],'order_id'=>$order_id, 'error'=>$error, 'error_msg'=>$error_msg);
			echo json_encode($output);
		}

	}

	/*
		订单取消
	 */
	public function order_cancel(){
		$db=M('order_info');
		if($this->_post()){
			$id=I('post.order_id');
			$db->delete($id);		//删除订单信息
			M('order_goods')->where(array('order_id'=>$id))->delete();		//删除订单商品信息
			echo 1;
			exit();
		}
	}

	/*
		新增收货地址
	 */
	public function address_add(){
		$data=$this->_post();
		$data['user_id']=$_SESSION['user_id'];
		$data['province']=M('region')->where(array('id'=>$data['province_id']))->getField('region_name');
		$data['city']=M('region')->where(array('id'=>$data['city_id']))->getField('region_name');
		$data['district']=M('region')->where(array('id'=>$data['district_id']))->getField('region_name');
		M('user_address')->add($data);
		echo 1;
	}
	/*
		编辑收货地址
	 */
	public function address_edit(){
		$data=$this->_post();
		$id=I('get.id');
		if($data['province_id']>0){
			$data['province']=M('region')->where(array('id'=>$data['province_id']))->getField('region_name');
		}
		if($data['city_id']>0){
			$data['city']=M('region')->where(array('id'=>$data['city_id']))->getField('region_name');
		}
		if($data['district_id']>0){
			$data['district']=M('region')->where(array('id'=>$data['district_id']))->getField('region_name');
		}
		M('user_address')->where(array('id'=>$id))->save($data);
		echo 1;
	}

	/*
		 删除地址
	 */
	public function address_del(){
		$db=M('user_address');
		$id=I('post.id');
		$db->delete($id);
		echo 1;
	}

	/*
		申请提现
	 */
	public function apply_money(){
		$db=M('apply_money');
		$data['money']=I('post.money');
		if(empty($_SESSION['user_id'])){
			echo 2;		//登录超时
		}else{
			$data['user_id']=$_SESSION['user_id'];
			$data['apply_time']=time();
			$data['bank_card']=$_SESSION['user_info']['bank_card'];
			$data['bank_name']=$_SESSION['user_info']['bank_name'];
			$rs=$db->add($data);
			if($rs){
				echo 1;		//操作成功
			}else{
				echo 3;		//操作失败
			}
		}

	}
	/*
		新人礼包
	 */
	public function newer_present(){
		$db=M('coupon');
		$config=F('distributor_config');
		if(empty($config)){
			$config=M('distributor_config')->find(1);
		}
		$coupon_data=array(
			'user_id'=>$_SESSION['user_id'],
			'amount'=>$config['newer_coupon'],
			'type'=>1,			//新人礼包
			'status'=>1,		//未使用
			'name'=>'新人礼包',
			'posttime'=>time(),
		);
		$rs=$db->add($coupon_data);
		if($rs){
			echo 1;		//ok
		}else{
			echo 2; 	//失败
		}

	}

	/*
		加载更多商品	      
	 */
	public function product_load(){
		$db=M('goods');
		if($this->_post()){
			$firstRow=I('post.offset');		//从第几条开始
			$listRows=8;		//每次加载条数
			$cid=I('post.cid');
			$rank=I('post.rank');		//排序
			if($rank=='price'){
				$order='price asc';
			}elseif($rank=='hits'){
				$order='hits desc';
			}elseif($rank=='sale_nums'){
				$order='sale_nums desc';
			}else{
				$order='id desc';
			}
			if($cid>0){
				$map['cid']=array('like','%'.$cid.',%');
			}else{
				$map='';
			}

			$list=$db->where($map)->order($order)->limit($firstRow.','.$listRows)->select();
			foreach($list as $key=>$val){
				$list[$key]['name']=mb_substr($val['name'],0,38,'utf-8');
			}
			echo json_encode($list);
		}
	}

	/*
		编辑信息
	 */
	public function edit_shop_info(){
		$db=M('wechat_user');
		if($arr=$this->_post()){
			$db->where(array('id'=>$this->user_id))->save($arr);
			echo 1;
			exit();
		}
	}

	/*
		编辑个人信息
	 */
	public function info_update(){
		$db=M('wechat_user');
		if($arr=$this->_post()){
			$db->where(array('id'=>$this->user_id))->save($arr);
			echo 1;
		}

	}
	/*
		修改密码
	 */
	public function pwd_update(){
		$db=M('wechat_user');
		$errcode=0;
		if($arr=$this->_post()){
			$i=$db->where(array('id'=>$this->user_id))->find();
			if($i['password']!=md5($arr['old_pwd'])){
				$errcode=1;
			}else{
				$data['password']=md5($arr['password']);
				$db->where(array('id'=>$this->user_id))->save($data);
			}
			echo $errcode;exit();
		}
	}
	/*
		积分兑换订单【咕币兑换】
	 */
	public function jifen_order(){
		$db=M('jifen_order');
		$errcode=0;
		if($arr=$this->_post()){
			$goods_nums=$arr['goods_nums'];
			unset($arr['goods_nums']);
			if(isset($arr['addr_id'])){
				$addr=M('user_address')->find($addr_id);
				$arr['consignee']=$addr['consignee'];
				$arr['mobile']=$addr['mobile'];
				$arr['province']=$addr['province'];
				$arr['city']=$addr['city'];
				$arr['district']=$addr['district'];
				$arr['address']=$addr['address'];
				unset($arr['addr_id']);	
			}else{
				$arr['province']=M('region')->where(array('id'=>$addr['province']))->getField('region_name');
				$arr['city']=M('region')->where(array('id'=>$addr['city']))->getField('region_name');
				$arr['district']=M('region')->where(array('id'=>$addr['district']))->getField('region_name');
			}
			$goods=M('jifen_goods')->find($arr['goods_id']);
			unset($arr['goods_id']);
			$arr['total_fee']=$goods['price']*$goods_nums;
			if($this->user_info['jifen']>=$arr['total_fee']){
				$arr['user_id']=$this->user_id;
				$arr['order_sn']='JF'.date('mdHis').rand(1111,9999);
				$arr['order_time']=time();
				$order_id=$db->add($arr);			//插入订单数据
				$order_goods['order_id']=$order_id;
				$order_goods['goods_id']=$goods['id'];
				$order_goods['goods_name']=$goods['name'];
				$order_goods['goods_price']=$goods['price'];
				$order_goods['goods_spic']=$goods['spic'];
				$order_goods['goods_nums']=$goods_nums;
				M('jifen_order_goods')->add($order_goods);
				//扣除相应积分
				M('wechat_user')->where(array('id'=>$this->user_id))->setDec('jifen',$arr['total_fee']);
				//记录积分流水
				$water['user_id']=$this->user_id;
				$water['type']=2;						//支出
				$water['amount']=$arr['total_fee'];		//数量
				$water['way']='exchange';
				$water['way_name']='咕币兑换商品';						
				$water['posttime']=time();		
				M('jifen_water')->add($water);
			}else{
				$errcode=1;		//积分余额不足
			}

			echo $errcode;exit();

		}
	}

	/*
		选择店铺主题
	 */
	public function shop_theme(){
		$db=M('wechat_user');
		if($this->_post()){
			$data['shop_theme']=I('post.shop_theme');
			$db->where(array(array('id'=>$this->user_id)))->save($data);
			echo 1;exit();
		}
	}

	/*
		头像上传
	 */
	public function upload_headimg(){
		import('@.ORG.Image.ThinkImage');
		$return=array('flag'=>0,'msg'=>'','img'=>'');
		if(empty($this->user_id)){
			$return['msg']='登录超时，请重新登录！';
			echo json_encode($return);
			exit();
		}
		$dir="./Data/upload/headimg";

		$extArr = array("jpg", "png", "gif");
		if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
			$name = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];

			if(empty($name)){
				$return['msg']='请选择要上传的图片!';
				echo json_encode($return);
				exit;
			}
			$ext=extend($name);
			if(!in_array($ext,$extArr)){
				$return['msg']='图片格式错误!';
				echo json_encode($return);
				exit;
			}
			if($size>(100*1024*1024)){
				$return['msg']='图片大小不能超过100KB!';
				echo json_encode($return);
				exit;
			}
			$image_name =$this->user_id.".".$ext;
			$tmp = $_FILES['photoimg']['tmp_name'];
			if(move_uploaded_file($tmp, $dir.'/'.$image_name)){
				$return['flag']=1;
				$return['msg']='上传成功!';
				$return['img']=$dir.'/'.$image_name;
				$img_source=$dir.'/'.$image_name;
				//生成缩略图
				$thumb=$dir.'/thumb_'.$image_name;
				$img = new ThinkImage(THINKIMAGE_GD,$img_source); 
				$img->thumb(200,200,THINKIMAGE_THUMB_FIXED)->save($thumb);
				//保存数据库
				M('wechat_user')->where(array('id'=>$this->user_id))->save(array('headimgurl'=>$return['img']));
				echo json_encode($return);
				exit;
			}else{
				$return['msg']='上传失败';
				echo json_encode($return);
				exit;
			}
		}
	}

	/*
		上传base64
	 */
	public function upload_base64(){
		import('@.ORG.Image.ThinkImage');
		$return=array('flag'=>0,'msg'=>'','img'=>'');
		if(empty($this->user_id)){
			$return['msg']='登录超时，请重新登录！';
			echo json_encode($return);
			exit();
		}
		$dir="./Data/upload/headimg";

		$rand=substr(time(),-4);
		$image_name =$this->user_id.'_'.$rand.".jpg";


		$img_str=$_POST['img_str'];
		$img_str=str_replace('data:image/jpeg;base64,','',$img_str);
		$img_str=str_replace('data:image/png;base64,','',$img_str);
		$img_str=str_replace('data:image/gif;base64,','',$img_str);
		file_put_contents($dir.'/'.$image_name,base64_decode($img_str));


		$return['flag']=1;
		$return['msg']='上传成功!';
		$return['img']=$dir.'/'.$image_name;
		$img_source=$dir.'/'.$image_name;
		//生成缩略图
		$thumb=$dir.'/thumb_'.$image_name;
		$img = new ThinkImage(THINKIMAGE_GD,$img_source); 
		$img->thumb(200,200,THINKIMAGE_THUMB_FIXED)->save($thumb);
		//保存数据库
		M('wechat_user')->where(array('id'=>$this->user_id))->save(array('headimgurl'=>$thumb));
		echo json_encode($return);
		exit;
	}

	/*
		商品评价
	 */
	public function goods_comment(){
		$db=M('goods_comment');
		$id=I('post.id');			//订单商品表【order_goods】id
		$output['errcode']=0;
		if($arr=$this->_post()){
			$goods=M('order_goods')->find($id);
			$data['goods_id']=$goods['goods_id'];		
			$data['goods_name']=$goods['goods_name'];
			$data['goods_spic']=$goods['goods_spic'];

			$data['star']=$arr['star'];				//星评
			$data['content']=$arr['content'];		//评价内容

			$data['user_id']=$this->user_id;		//评论者id
			$data['nickname']=$this->user_info['username'];
			$data['headimg']=$this->user_info['headimgurl'];

			$data['posttime']=time();

			if($db->add($data)){
				//改为"已评论"状态
				M('order_goods')->where(array('id'=>$id))->save(array('status'=>1));	
			}


			$output['msg']='感谢您的评价！';
			$output['order_id']=$goods['order_id'];		//订单id

			echo json_encode($output);exit();
		}
	}

	/*
		查询商品地区库存
	 */
	public function query_store_nums(){
		$output=array('errcode'=>0);
		if($arr=$this->_post()){
			//记录配送地区
			cookie('province',$arr['province']);
			cookie('city',$arr['city']);
			cookie('district',$arr['district']);
			//查询仓库信息
			$storage=M('storage')->where(array('area_list'=>array('like','%'.$arr['district'].',%')))->find();
			//file_put_contents('sql.txt',M('storage')->getlastsql());
			if(empty($storage)){				//无对应仓库信息
				$output['errcode']=1;			//库存不足
				$output['msg']='该地区无货！';
			}else{
				$map=array('goods_id'=>$arr['goods_id'],'storage_id'=>$storage['id']);	//商品id，仓库id
				$store_info=M('goods_store')->where($map)->find();
				if(empty($store_info)){
					$output['errcode']=1;			//库存不足
					$output['msg']='该地区库存不足！';
				}else{
					$output['store_nums']=$store_info['store_nums'];	//库存数量
					$output['msg']='该地区剩余库存'.$store_info['store_nums'];
				}

			}
			echo json_encode($output);
			exit();
		}
	}

	/*
		提现
	 */
	public function take_money(){
		$db=M('take_money');
		$output=array('errcode'=>0);
		if($arr=$this->_post()){

			
			$today = strtotime('today');
			if(I('session.withdraw_last_time') == $today)
			{
				$output['errcode']=1;		//账户余额不足
				$output['msg']='一天只能提现一次！';
				echo json_encode($output);
				exit;
			}

			if($this->user_info['money_account']<$arr['money']){
				$output['errcode']=1;		//账户余额不足
				$output['msg']='账户余额不足';
			}else{
				//冻结相应金额的资金
				M('wechat_user')->where(array('id'=>$this->user_id))->setDec('money_account',$arr['money']);
				M('wechat_user')->where(array('id'=>$this->user_id))->setInc('money_dongjie',$arr['money']);
				//记录提现信息
				$arr['user_id']=$this->user_id;
				$arr['apply_time']=time();
				$db->add($arr);
				
				session('withdraw_last_time', $today);

			}
			echo json_encode($output);
		}
	}

	/*
		商品推荐
	 */
	public function goods_tui(){
		$db=M('goods_recommend');
		if($arr=$this->_post()){
			$arr['user_id']=$this->user_id;
			$arr['posttime']=time();
			$db->add($arr);	
			echo 1;
		}
	}

	/*
		推荐取消
	 */
	public function goods_cancel(){
		$db=M('goods_recommend');
		if($arr=$this->_post()){
			$arr['user_id']=$this->user_id;
			$db->where($arr)->delete();	
			echo 1;
		}
	}

	/*
		积分商城商品加载
	 */
	public function jifen_product_load(){
		$db=M('jifen_goods');
		if($this->_post()){
			$firstRow=I('post.offset');		//从第几条开始
			$listRows=8;		//每次加载条数
			$order='id desc';
			$map=array();
			$list=$db->where($map)->order('id desc')->limit($firstRow.','.$listRows)->select();
			foreach($list as $key=>$val){
				$list[$key]['name']=mb_substr($val['name'],0,38,'utf-8');
			}
			echo json_encode($list);
		}
	}

	/*
		加载资金流水
	 */
	public function fund_load(){
		$db=M('money_water');
		if($arr=$this->_post()){
			$firstRow=I('post.offset');		//从第几条开始
			$listRows=8;		//每次加载条数
			$map=array('user_id'=>$this->user_id);
			$list=$db->where($map)->order('id desc')->limit($firstRow.','.$listRows)->select();
			foreach($list as $key=>$val){
				$list[$key]['posttime']=date('Y-m-d H:i:s',$val['posttime']);
			}
			echo json_encode($list);
		}
	}

	/*
		加载积分流水
	 */
	public function jifen_load(){
		$db=M('jifen_water');
		if($arr=$this->_post()){
			$firstRow=I('post.offset');		//从第几条开始
			$listRows=8;		//每次加载条数
			$map=array('user_id'=>$this->user_id);
			$list=$db->where($map)->order('id desc')->limit($firstRow.','.$listRows)->select();
			foreach($list as $key=>$val){
				$list[$key]['posttime']=date('Y-m-d H:i:s',$val['posttime']);
			}
			echo json_encode($list);
		}
	}

	/*
		订单退款申请
	 */
	public function order_refund(){
		$db=M('order_refund');
		if($arr=$this->_post()){
			$order=M('order_info')->find($arr['order_id']);
			//订单状态改为"申请售后"
			M('order_info')->where(array('id'=>$arr['order_id']))->save(array('order_status'=>4));		
			$arr['pay_way']=$order['pay_way'];			//支付通道
			$arr['user_id']=$this->user_id;
			$arr['posttime']=time();
			$db->add($arr);
			echo 1;		
		}
	}
	/*
		地理位置定位
	 */
	public function fix_position(){
		if($arr=$this->_post()){
			//宿舍楼id
			$build_id=$arr['build_id'];			
			$position=position_fix($build_id);
			
			// 记录用户的楼栋ID
			$userInfo = $this->user_info;
			$user = M('wechat_user');
			$user->where(array('id'=>$userInfo['id']))->save(array('user_building'=>$build_id));

			//clear cart
			unset($_SESSION['shop_cart_info']);
			$_SESSION['cart_goods_nums'] = 0;
			//get shop id by build id
			$shop_data = M('shop')->where(array('build_id'=>$build_id))->find();

			$shop_keeper = M('wechat_user')->find($shop_data['uid']);

			$shop_data['mobile'] = $shop_keeper['mobile'];

			session('shop_id', $shop_data['id']);
			session('shop', $shop_data);

			//地理位置入库
			M('wechat_user')->where(array('id'=>$this->user_id))->save(array('last_position'=>serialize($position)));
			//地理位置写入session
			session('position',$position);
			echo 1;
		}
	}

	/*
		 用户签到
	 */
	public function sign(){

		if($this->_post()){
			$ymd=date('Ymd',time());
			$map=array('uid'=>$this->user_id,'ymd'=>$ymd);
			$record=M('sign')->where($map)->find();
			if(empty($record)){
				$conf=M('jifen_config')->find(1);
				$jifen=$conf['sign'];				//签到积分
				$data=array('uid'=>$this->user_id,'jifen'=>$jifen,'ymd'=>$ymd,'posttime'=>time());
				//增加积分
				return_jifen(1,'sign',$this->user_id);
				M('sign')->add($data);					//添加签到记录
				echo 1;
				exit();
			}else{	
				echo 2;			//已经签过了
				exit();
			}
		}
	}

	/*
		商品收藏
	 */
	public function goods_collect(){
		if($arr=$this->_post()){
			$db=M('goods_collect');
			$map=array('uid'=>$this->user_id,'goods_id'=>$arr['goods_id']);
			$i=$db->where($map)->find();
			if(!empty($i)){
				echo 2;		//收藏过了
			}else{
				$goods=M('goods')->find($arr['goods_id']);
				$arr['uid']=$this->user_id;
				$arr['shop_id'] = $_SESSION['shop_id'];
				$arr['name']=$goods['name'];
				$arr['spic']=$goods['spic'];
				$arr['posttime']=time();
				if($db->add($arr)){
					//+商品收藏次数
					M('goods')->where(array('id'=>$arr['goods_id']))->setInc('collect_num',1);
				}
				echo 1;		//收藏成功
			}	
		}
	}

	/*
		delete collection
	 */
	public function del_goods_collect(){
		if($arr=$this->_post()){
			$db=M('goods_collect');
			$map=array('uid'=>$this->user_id,'goods_id'=>$arr['goods_id']);
			if($db->where($map)->delete())
			{
				if($db->add($arr)){
					//+商品收藏次数
					M('goods')->where(array('id'=>$arr['goods_id']))->setDec('collect_num',1);
				}
				echo 1;		//收藏成功
			}	
			else
			{
				echo 0;
				//echo $db->getDbError();
			}
		}
	}

	/*
		用户反馈提交
	 */
	public function feedback(){
		if($arr=$this->_post()){
			$db=M('feedback');
			$arr['uid']=$this->user_id;
			$arr['posttime']=time();
			$db->add($arr);
			echo 1;
		}
	}
	/*
		店长申请
	 */
	public function shop_apply(){
		if($arr=$this->_post()){
			$db=M('wechat_user');
			$user_data=array('name'=>$arr['name'],'mobile'=>$arr['mobile']);
			$db->where(array('id'=>$this->user_id))->save($user_data);

			$db_shop=M('shop');
			$sch_info=M('school')->find($arr['sch_id']);
			$shop_data=array(
				'prov_id'=>$sch_info['prov_id'],
				'city_id'=>$sch_info['city_id'],
				'county_id'=>$sch_info['county_id'],
				'sch_id'=>$arr['sch_id'],
				'build_id'=>$arr['build_id'],
				'uid'=>$this->user_id,
				'sex'=>$arr['sex'],
				'status'=>0,					//店铺审核状态
				'posttime'=>time()
			);
			//是否已经提交申请
			$shop_info=$db_shop->where(array('uid'=>$this->user_id))->find();
			if(empty($shop_info)){
				$db_shop->add($shop_data);			//新增申请
			}else{
				//更新申请信息
				$db_shop->where(array('uid'=>$this->user_id))->save($shop_data);
			}

		}
	}

	/*
		用户完善资料
	 */
	public function edit_data(){
		if($arr=$this->_post()){
			$db=M('wechat_user');
			//add jifen
			if(!intval($arr['profile_complete']))
			{
				$arr['jifen'] = intval($arr['jifen']) + 10;
				$arr['profile_complete'] = 1;

				//记录积分流水
				$water['user_id']=$this->user_id;
				$water['type']=1;						//支出
				$water['amount']=10;		//数量
				$water['way']='profile';
				$water['way_name']='完善资料';						
				$water['posttime']=time();		
				M('jifen_water')->add($water);
			}

			$db->where(array('id'=>$this->user_id))->save($arr);
			file_put_contents('log.txt',var_export($arr,true));
			echo 1;
		}
	}

	/*
		在线充值订单
	 */
	public function recharge(){
		$db=M('recharge');
		if($arr=$this->_post()){
			$data['pay_way']=1;						//微信支付
			$data['user_id']=I('session.user_id');
			$data['out_trade_no']=I('session.user_id').'_'.time();
			$data['money']=$arr['money'];
			$data['lock']=$data['pay_status']=0;			//是否异通知过、支付状态
			$data['posttime']=time();
			$order_id=$db->add($data);
			echo $order_id;
			exit();
		}
	}

	/*
		操作店铺营业状态
	 */
	public function shop_status(){
		if($arr=$this->_post()){
			$db=M('shop');
			$db->where(array('uid'=>$this->user_id))->save($arr);
			echo 1;
		}
	}

	/*
	friend pay
	 */
	public function friend_pay()
	{
		$result = array('status'=>0, 'order_id'=>0, 'msg'=>'', 'friend_pay_id'=>0, 'pay_money'=>0);
		if($arr=$this->_post())
		{
			$f_pay = M('order_friend_pay');			

			$order_friend = array();
			$order_friend['order_id'] = intval($arr['order_id']);
			$order_friend['message'] = $arr['message'];
			$order_friend['pay_money'] = floatval($arr['pay_money']);
			$order_friend['openid'] = $arr['friend_openid'];
			$order_friend['headimgurl'] = $_SESSION['wx_userinfo']['headimgurl'];

			$result['status'] = 1;
			$result['order_id'] = $order_friend['order_id'];
			$result['friend_pay_id'] = $f_pay->add($order_friend);


			$result['pay_money'] = $order_friend['pay_money'];
			$result['friend_openid'] = $arr['friend_openid'];

			unset($order_friend);
			echo json_encode($result);
			exit;
		}
		else
		{

			echo json_encode($result);
			exit;
		}

	}

	/*
	get building / user apply shop keeper
	 */
	public function get_building()
	{
		$school_id = I('get.school_id');

		$build = M('building');
		$data = $build->where(array('sch_id'=>$school_id, 'status'=>0))->select();

		echo json_encode($data);exit;
	}

	/*
		delete shop
	 */

	public function del_shop()
	{
		$uid = I('get.uid');

		$result = array(
			'status' => 0,
			'msg' => ''
		);

		$res = M('shop')->where(array('uid'=>$uid))->delete();
		if($res)
		{
			M('wechat_user')->where(array('id'=>$uid))->save(array('role_id'=>1));
			$result['status'] = 1;
			$result['msg'] = '删除成功！';
		}
		else
		{
			$result['msg'] = '删除失败！';
		}
	}

	/*
	confirm order 
	 */
	public function confirm_order()
	{
		$order_id = intval(I('post.order_id'));
		$order_info = M('order_info')->find($order_id);

		M('order_info')->where(array('id'=>$order_id))->save(array('order_status'=>3,'confirm_order_time'=>time()));

		//add goods to shop
		if($order_info['role_id'] == 2)
		{
			$user_id=$order_info['user_id'];
			$shop = M('shop')->where(array('uid'=>$user_id))->find();
			$shop_id = $shop['id'];

			$order_goods = M('order_goods')->where(array('order_id'=>$order_id))->select();

			//echo $user_id.'|'.$shop_id.'|'.count($order_goods);exit;
			foreach($order_goods as $k=>$val)
			{					
				$goods_id = $val['goods_id'];
				$goods_info=M('goods')->find($val['goods_id']);
				$shop_goods = M('shop_goods')->where(array('goods_id'=>$goods_id, 'shop_id'=>$shop_id))->find();

				$val['goods_nums'] = $val['goods_nums'] * $goods_info['package_num'];

				if($shop_goods)
				{
					$goods_num = $shop_goods['store_num'] + $val['goods_nums'];
					M('shop_goods')->where(array('goods_id'=>$goods_id, 'shop_id'=>$shop_id))->save(array('store_num'=>$goods_num));
				}
				else
				{

					$shop_goods['goods_id'] = $goods_id;
					$shop_goods['shop_id'] = $shop_id;
					$shop_goods['cid'] = $goods_info['cid'];
					$shop_goods['store_num'] = $val['goods_nums'];
					$shop_goods['goods_price'] = $goods_info['price'];

					$res = M('shop_goods')->add($shop_goods);
					$err = M('shop_goods')->getDbError();
					$error_msg = $err;
				}
			}
		} //add shop goods end
		else if($order_info['role_id'] == 1) {
			$order_goods = M('order_goods')->where(array('order_id'=>$order_id))->select();

			foreach($order_goods as $k => $v) {
				$goods_id = $v['goods_id'];
				$goods_info = M('goods')->find($v['goods_id']);
				$shop_goods = M('shop_goods')->where(array('goods_id'=>$goods_id, 'shop_id'=>$order_info['shop_id']))->find();
				
				if($shop_goods) {
					$res = M('shop_goods')->where(array('goods_id'=>$goods_id, 'shop_id'=>$order_info['shop_id']))->setInc('sale_num', $v['goods_nums']);
				}
			}
		}
		
		echo 1;
	}
	
	public function confirm_delivery()
	{
		$order_id = intval(I('post.order_id'));
		$order_info = M('order_info')->find($order_id);

		M('order_info')->where(array('id'=>$order_id))->save(array('order_status'=>2,'shipping_time'=>time()));
		echo 1;
	}

	//send sms
	public function send_sms()
	{
		$mobile = I('get.mobile');
		$nums = rand(100000,999999);
		session('sms', $nums);
		$content = "【叮咕】您的短信验证码为：$nums";

		$re = send_sms($mobile, $content);

		echo 1;

	}
	
	// 店长更新商品信息
	public function update_goods()
	{
		$type 	 = I('post.type');
		$data 	 = I('post.data');
		$shopId  = I('post.shop_id');
		$goodsId = I('post.goods_id');
		
		$map = array(
			'goods_id' =>$goodsId,
			'shop_id'  =>$shopId
		);
		
		if ($type == 'price') {
			$res = M('shop_goods')->where($map)->save(array('goods_price'=>$data));
		}
		else if ($type == 'status') {
			$res = M('shop_goods')->where($map)->save(array('goods_status'=>$data));
		}
		
		if ($res) {
			echo 1;
		}
	}

	//check sms
	public function check_sms()
	{
		$sms = I('get.sms');
		$session_sms = I('session.sms');
		if($sms == $session_sms)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
}
