<?php
/*
	这是后台首页控制器！
*/
class IndexAction extends PublicAction{
	public function index(){
		$db=M('wechat_user');
		//统计分销商总数
		$resaler_nums=$db->where(array('role_id'=>3))->count();
		//统计店铺总数
		$shop_nums=$db->where(array('role_id'=>2))->count();
		//订单统计
		$today=strtotime(date('Y-m-d',time()));
		
		$map=array('order_time'=>array('egt',$today));
		//订单总数
		$order_total=M('order_info')->where($map)->count();
		//已付款订单
		$map['pay_status']=1;
		$pay_order_total=M('order_info')->where($map)->count();
		$map['pay_status']=0;
		$unpay_order_total=M('order_info')->where($map)->count();
		//商品统计
		//上架商品
		$sale_goods_total=M('goods')->where(array('is_sale'=>1))->count();
		//下架商品
		$unsale_goods_total=M('goods')->where(array('is_sale'=>0))->count();
		//最新商品
		$new_time=strtotime(date('Y-m-d',time()));
		$new_goods_total=M('goods')->where(array('is_sale'=>0,'posttime'=>array('egt',$new_time)))->count();
			
		$count_info['resaler_nums']=$resaler_nums;
		$count_info['shop_nums']=$shop_nums;
		$count_info['order_total']=$order_total;
		$count_info['pay_order_total']=$pay_order_total;
		$count_info['unpay_order_total']=$unpay_order_total;
		
		$count_info['sale_goods_total']=$sale_goods_total;
		$count_info['unsale_goods_total']=$unsale_goods_total;
		$count_info['new_goods_total']=$new_goods_total;
		
		$this->assign('count_info',$count_info);
		$this->display();
	}
	//基本信息编辑
	public function edit(){
		$user=M('user_data');
		$data=$user->where(array('id'=>1))->find();
		$this->assign('data',$data);
		if(array_filter($_FILES['spic']['name'])){
			$_data['icon']=$this->getpic('spic');
		}
		if(IS_POST){
			$_data['id']=1;
			$_data['role_id']=1;
			$_data['username']='admin';
			$_data['truename']=I('post.truename');
			$_data['address']=I('post.address');
			$_data['special']=I('post.special');
			$_data['jobtitle']=I('post.jobtitle');
			$_data['posttime']=time();
			//$res=$user->add($_data);
			$res=$user->where(array('id'=>1))->save($_data);
			if($res){
				$this->redirect(U('Index/edit'));	
			}
		}
		$this->display();
	}
	private function getpic($input){	
		$savePath = "./Data/upload/icon";
        // tcmkdir($savePath);
        $fileFormat = array('gif','jpg','jpeg','png','bmp');
        $maxSize = 0;
        $overwrite = 0;
		$thumb=1;
		$thumbWidth = 200;
		$thumbHeight = 200;	
		import('@.ORG.clsUpload');
		$picmodel=new clsUpload($savePath,$fileFormat,$maxSize,$overwrite);		
		$picmodel->setThumb($thumb,$thumbWidth,$thumbHeight);
         if (!$picmodel->run($input,1)){
             echo $picmodel->errmsg()."<br>\n";
         }
		$pic = $picmodel->getInfo();
     return "/Data/upload/icon/".$pic[0]["saveName"];
	}	
	
	/*
		图片预览
	*/
	public function show_img(){
		$picurl=I('get.picurl','','base64_decode');
		echo "<img src='$picurl' style='width:500px'/>";
	}
	
	/*
		模板演示
	*/
	public function demo(){
		$this->display();
	}
}