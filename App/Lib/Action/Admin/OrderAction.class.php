<?php
//订单管理
class OrderAction extends PublicAction{
	public function index(){
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
		
		$begin_time=strtotime(I('get.begin_time'));
		$end_time=strtotime(I('get.end_time'));
		
		if(in_array($so_key,array('order_sn','mobile','consignee'))){
			if(!empty($so_val)&&!empty($so_val)){
				$map[$so_key]=array('like','%'.$so_val.'%');
			}
		}
		if($user_id=I('get.user_id')){
			$map['user_id']=$user_id;
		}
		
		if($begin_time>0){
			$map['order_time']=array('egt',$begin_time);
		}
		
		if($end_time>0){
			$map['order_time']=array('elt',$end_time);
		}

		//list all common user orders but not shop keeper orders
		$map['role_id'] = 1;
		
		$count = $db->where($map)->count();
		$Page = new Page($count,10);
		
		
		$list=$db->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$show = $Page->show();

		
		$this->assign('list',$list);
		
		//订单筛选条件
		$_SESSION['export_map']=$map;
		$this->assign('show',$show);
		$this->display();
	}
	//增加
	public function add(){
		$db=M('order_info');
		if(IS_POST){
			$data=$this->_post();
			$db->add($data);
			$this->redirect('index');
		}
		$this->display();
	}
	//编辑
	public function edit(){
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
	
	/*
		分佣信息页面
	*/
	public function fenyong(){
		$db=M('order_info');
		$id=I('get.id');			//订单id
		
		$config=M('resale_config')->find(1);		//分佣配置
		
		$order=$db->find($id);
		
		$this->assign('order',$order);
		
		$goods=M('order_goods')->where(array('order_id'=>$id))->select();
		foreach($goods as $val){
			$goods_info=M('goods')->find($val['goods_id']);
			$yongjin+=$val['goods_nums']*$goods_info['yongjin'];
		}
		
		if($order['shop_id']){
			$resaler1=M('wechat_user')->find($order['shop_id']);			//一级分销
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
		
		$this->assign('goods',$goods);
		$this->assign('yongjin',$yongjin);
		$water_db=M('money_water');
		if($this->_post()){
			//表单令牌
			if($db->autoCheckToken($_POST)){
				if(!empty($resaler1)){
					M('wechat_user')->where(array('id'=>$resaler1['id']))->setInc('money_account',$resaler1['yongjin']);
					//记录资金流水
					
					$water['user_id']=$resaler1['id'];
					$water['order_id']=$id;					//订单id
					$water['type']=1;						//收入
					$water['amount']=$resaler1['yongjin'];	//金额
					$water['way']='yongjin';						//分销佣金
					$water['way_name']='分销佣金';
					$water['posttime']=time();
					$water_db->add($water);
					unset($water);
				}
				if(!empty($resaler2)){
					M('wechat_user')->where(array('id'=>$resaler2['id']))->setInc('money_account',$resaler2['yongjin']);
					$water['user_id']=$resaler2['id'];
					$water['order_id']=$id;					//订单id
					$water['type']=1;						//收入
					$water['amount']=$resaler2['yongjin'];	//金额
					$water['way']='yongjin';						//分销佣金
					$water['way_name']='分销佣金';
					$water['posttime']=time();
					$water_db->add($water);
				}
				//修改订单分佣状态【已分佣】
				$db->where(array('id'=>$id))->save(array('fenyong_status'=>1));
				
				$this->success('操作成功',U('fenyong',array('id'=>$id)));
				
			}
		}else{
			$this->display();	
		}
	}
	
	/*
		更新支付状态
	*/
	public function update_pay_status(){
		$order_id=I('get.order_id');
		$db=M('order_info');
		$info=$db->find($order_id);
		if($info['pay_status']==1){
			$data=array('pay_status'=>0,'pay_time'=>0);
		}else{
			$data=array('pay_status'=>1,'pay_time'=>time());
		}
		$db->where(array('id'=>$order_id))->save($data);
		$this->redirect('index',array('p'=>I('get.p','1')));
	}
	//删除
	public function del(){
		if($id=I('get.id')){
			M('order_info')->where(array('id'=>$id))->delete();
			M('order_goods')->where(array('order_id'=>$id))->delete();
			$this->redirect('index');
		}
	}  
	
	
	/*
		退款申请
	*/
	public function refund_list(){
		import("@.ORG.Page");
		$db=M('order_refund');
		
		$map='';
		$count = $db->where($map)->count();
		$Page = new Page($count,10);
		$show=$Page->show();
		$this->assign('show',$show);
		
		$list=$db->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		foreach($list as $key=>$val){
			$list[$key]['order']=M('order_info')->find($val['order_id']);
		}
		
		$this->assign('list',$list);
		$this->display();
		
	}
	
	/*
		退款详情
	*/
	public function refund_detail(){
		$db=M('order_refund');
		$id=I('get.id');
		//退款申请
		$info=$db->find($id);
		$this->assign('info',$info);
		//订单信息
		$data=M('order_info')->find($info['order_id']);
		$this->assign('data',$data);
		//下单人
		$user=M('wechat_user')->find($info['user_id']);
		$this->assign('user',$user);
		//商品信息
		$order_goods=M('order_goods')->where(array('order_id'=>$info['order_id']))->order('id desc')->select();
		$this->assign('order_goods',$order_goods);
		
		$this->display();
	}
	
	/*
		售后处理
	*/
	public function refund_handle(){
		$db=M('order_refund');
		$id=I('get.id');
		$refund=$db->find($id);
		if($arr=$this->_post()){
			$arr['admin_user']=I('session.username');
			$arr['admin_id']=I('session.uid');
			$db->where(array('id'=>$id))->save($arr);
			//修改订单状态为3签收
			M('order_info')->where(array('id'=>$refund['order_id']))->save(array('order_status'=>3));
			$this->success('操作成功',U('refund_detail',array('id'=>$id)));		
		}
	}
	
	
	/*
		 立即退款
	*/
	public function refund(){
		$db=M('order_refund');
		$id=I('get.id');
		//退款申请
		$info=$db->find($id);
		$this->assign('info',$info);
		//订单信息
		$data=M('order_info')->find($info['order_id']);
		$this->assign('data',$data);
		$this->assign('info',$info);
		$this->display();
	}
	
	
	/*
		退款成功
	*/
	public function refund_success(){
		import('@.ORG.Wxhelper');
		$order_id=I('get.order_id');
		$db=M('order');
		$order=$db->find($order_id);
		if($order['refund_status']==1){
			$user=M('wechat_users')->find();
			$log=array(
		   'order_id'=>$order['id'],
		   'user_id'=>$order['user_id'],
		   'refund_fee'=>$order['refund_fee'],
		   'posttime'=>$order['refund_time'],
		   'nickname'=>$user['nickname'],
		   );
		   //添加退款记录
		   M('refund_log')->add($log);
		   //发送退款消息【客户消息】
		   	$config['appid']=C('WECHAT_APPID');
			$config['appsecret']=C('WECHAT_APPSECRET');
			$helper=new Wxhelper($config);
			$msg_data['touser']=$user['openid'];			
			$msg_data['template_id']="1i9b4WDKkoxIVGLHqCWKiitTDLnbO6JvaE5Xz9EfDYs";				
			$msg_data['url']='http://'.I('server.HTTP_HOST').U('Wx/Member/order_detail',array('order_id'=>$order_id));
			$msg_data['topcolor']='#FF0000';
			$msg_data['data']['first']=array('value'=>"您好，您的订单已成功退款，请您注意查收");
			$msg_data['data']['keynote1']=array('value'=>$order['refund_fee']);			//退款金额
			$msg_data['data']['keynote2']=array('value'=>'退回微信余额或支付银行卡');					//退款方式
			$msg_data['data']['keynote3']=array('value'=>'参考微信支付系统消息');						//到账时间
			$msg_data['data']['keynote4']=array('value'=>$order['luxian_name']);		//商品描述
			$msg_data['data']['keynote5']=array('value'=>$order['order_sn']);			//交易单号
			$msg_data['data']['keynote6']=array('value'=>'客户申请退款');							//退款原因
			$msg_data['data']['remark']=array('value'=>'单击可查看订单详情。');
			$return=$helper->send_tpl_msg($msg_data);
			//dump($return);die();
			
			unset($msg_data);
			//发送退款消息【通知管理员】
			$msg_data['touser']='#';//'oqNjGs1b-0OmVFIaKAqT80OaXSIA';//			//李洋			
			$msg_data['template_id']="1i9b4WDKkoxIVGLHqCWKiitTDLnbO6JvaE5Xz9EfDYs";				
			//$msg_data['url']='http://'.I('server.HTTP_HOST').U('Wx/Member/order_detail',array('order_id'=>$order_id));
			$msg_data['topcolor']='#FF0000';
			$msg_data['data']['first']=array('value'=>"您好，有一笔客户退款成功，退款详情如下");
			$msg_data['data']['keynote1']=array('value'=>$order['refund_fee']);			//退款金额
			$msg_data['data']['keynote2']=array('value'=>'退回微信余额或支付银行卡');					//退款方式
			$msg_data['data']['keynote3']=array('value'=>'参考微信支付系统消息');						//到账时间
			$msg_data['data']['keynote4']=array('value'=>$order['luxian_name']);		//商品描述
			$msg_data['data']['keynote5']=array('value'=>$order['order_sn']);			//交易单号
			$msg_data['data']['keynote6']=array('value'=>'客户申请退款');							//退款原因
			$msg_data['data']['remark']=array('value'=>'客户昵称：'.$user['nickname'].'；联系人：'.$order['linkman'].'【退款详情可登录微信支付商户后台进行查看。】');
			$return=$helper->send_tpl_msg($msg_data);
			
		   $this->success('退款成功!',U('Order/edit',array('id'=>$order_id)));
		}else{
			$this->redirect('refund_fail',array('order_id'=>$order_id,'err_msg'=>'退款失败'));
		}
		
	}
	/*
		退款失败
	*/
	public function refund_fail(){
		$this->error(I('get.err_msg'),U('Order/edit',array('id'=>I('get.order_id'))));
	}
	
	/*
		导出订单excel

    	导出数据为excel表格
    	@param $data    一个二维数组,结构如同从数据库查出来的数组
    	@param $title   excel的第一行标题,一个数组,如果为空则没有标题
    	@param $filename 下载的文件名
    	@examlpe 
    	$stu = M ('User');
    	$arr = $stu -> select();
    	
		exportexcel($arr,array('id','账户','密码','昵称'),'文件名!');
	
		//$data=array(),$title=array(),$filename='report'
	*/
 public function export_excel(){
	 $map=$_SESSION['export_map']?$_SESSION['export_map']:'';
	 
	//excel名称
	$filename=date('YmdHis');
	
    header("Content-type:application/octet-stream");
    header("Accept-Ranges:bytes");
    header("Content-type:application/vnd.ms-excel");  
    header("Content-Disposition:attachment;filename=".$filename.".xls");
    header("Pragma: no-cache");
    header("Expires: 0");
	
	
	$data=M('order_info')->where($map)->field('id,order_sn,total_fee,pay_way,pay_status,consignee,mobile,province,city,district,address,order_time')->order('id desc')->select();

	//dump(M('order_info')->getlastsql());die();

	foreach($data as $key=>$val){
		if($val['pay_status']==1){
			$data[$key]['pay_status']='已支付';
		}else{
			$data[$key]['pay_status']='未支付';
		}
		
		if($val['pay_way']==1){
			$data[$key]['pay_way']='微信支付';
		}elseif($val['pay_way']==2){
			$data[$key]['pay_way']='支付宝';
		}elseif($val['pay_way']==3){
			$data[$key]['pay_way']='银联支付';
		}
		
		$data[$key]['order_sn']=$val['order_sn'];
		$data[$key]['address']=$val['province'].'-'.$val['city'].'-'.$val['district'].'-'.$val['address'];
		unset($data[$key]['province']);
		unset($data[$key]['city']);
		unset($data[$key]['district']);
		$data[$key]['order_time']=date('Y-m-d H:i',$val['order_time']);
		$goods=M('order_goods')->where(array('order_id'=>$val['id']))->select();
		foreach($goods as $item){
			if(!empty($_SESSION['export_goods_name'])){
				if(strpos($item['goods_name'],$_SESSION['export_goods_name'])!==false){
					$data[$key]['goods_name']=$item['goods_name'];
					$data[$key]['goods_nums']=$item['goods_nums'];
				}
			}else{
				$data[$key]['goods'].='【商品名称：'.$item['goods_name'].',商品数量:'.$item['goods_nums'].'】';
			}
			
			
		}
		unset($goods);
		unset($data[$key]['id']);
	}
	if(!empty($_SESSION['export_goods_name'])){
		$title=array('订单编号','订单金额','支付方式','是否支付','收货人','联系电话','收货地址','下单日期','商品信息','商品数量');
	}else{
		$title=array('订单编号','订单金额','支付方式','是否支付','收货人','联系电话','收货地址','下单日期','商品信息');
	}
	
	
	
	
    //导出xls 开始
    if (!empty($title)){
        foreach ($title as $k => $v) {
            $title[$k]=iconv("UTF-8", "GB2312",$v);
        }
        $title= implode("\t", $title);
        echo "$title\n";
    }
    if (!empty($data)){
        foreach($data as $key=>$val){
            foreach ($val as $ck => $cv) {
                $data[$key][$ck]=iconv("UTF-8", "GB2312", $cv);
            }
            $data[$key]=implode("\t", $data[$key]);
            
        }
        echo implode("\n",$data);
    }
	
	
	
 }

}
