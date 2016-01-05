<?php
/*
	提现申请
*/
class TakeMoneyAction extends PublicAction{
	public function index(){
		import("@.ORG.Page");
		$db=M('take_money');
		$count = $db->count();
		$Page = new Page($count,20);
		$show = $Page->show();
		$this->assign('show',$show);
		
		$list=$db->where()->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		foreach($list as $key=>$val){
			if ($val['role_id'] == 1) {
				$user = M('wechat_user')->find($val['user_id']);
			} else if ($val['role_id'] == 2) {
				$user = M('school_ceo')->find($val['user_id']);
			}
			
			$list[$key]['user']=$user;
		}
		$this->assign('list',$list);
		$this->display();
	}
	public function edit(){
		$id=I('get.id');
		$db=M('take_money');
		$info=$db->find($id);
		if ($info['role_id'] == 1) {
			$user = M('wechat_user')->find($info['user_id']);
		} else if ($info['role_id'] == 2) {
			$user = M('school_ceo')->find($info['user_id']);

			$MoneyLog = M('take_money')->where(array('user_id'=>$user['id'],'role_id'=>2,'status'=>1))->sum('money');

			$map = array(
				'role_id' 	   => 1,
				'order_status' => 3,
				'pay_status'   => 1,
				'school_id'    => array('in',$info['school_id']),
				'pay_time'     => array('EGT', strtotime($user['take_office_time']))
			);
			
			$totalFee = M('order_info')->where($map)->sum('total_fee');
			$ceoAccountMoney = round($totalFee * 0.02 - $MoneyLog, 2);
			$this->assign('ceoAccountMoney',$ceoAccountMoney);
		}
		
		$this->assign('info',$info);
		$this->assign('user',$user);
		if($arr=$this->_post()){
			//表单令牌
			if($db->autoCheckToken($_POST)){
				
				$map=array('id'=>$info['user_id']);
				if ($info['role_id'] == 1) {
					if($arr['status']==1){		//成功
						//冻结账户-相应提现金额
						M('wechat_user')->where($map)->setDec('money_dongjie',$info['money']);
						//记录资金流水
						$water['user_id']=$info['user_id'];
						$water['type']=2;						//支出【提现】
						$water['amount']=$info['money'];
						$water['way']='take_money';
						$water['way_name']='提现';
						$water['posttime']=time();
						//添加流水记录
						M('money_water')->add($water);
					}else{		//提现失败
						//解除相应金额冻结资金
						if(M('wechat_user')->where($map)->setDec('money_dongjie',$info['money'])){
							//增加可用资金
							M('wechat_user')->where($map)->setInc('money_account',$info['money']);
						}
					}
				} else if ($info['role_id'] == 2) {
					//记录资金流水
					$water['user_id']=$info['user_id'];
					$water['type']=2;						//支出【提现】
					$water['amount']=$info['money'];
					$water['way']='take_money';
					$water['way_name']='提现';
					$water['posttime']=time();
					//添加流水记录
					M('money_water')->add($water);
				}
				$arr['handle_time']=time();
				$db->where(array('id'=>$id))->save($arr);
				$this->success('操作成功',U('edit',array('id'=>$id)));
			}
		}else{
			$this->display();
		}
		
	}
	/*
		处理提现
	*/
	public function update(){
		$db=M('take_money');
		$id=I('get.id');
		$data=$this->_post();
		$data['handle_time']=time();
		//申请信息
		$apply_info=M('apply_money')->find($id);
		//用户信息
		$user=M('wechatuser')->find($apply_info['user_id']);
		//账户余额>=提现金额
		if($user['score']>=$apply_info['money']){
			//更新申请表
			$rs=$db->where(array('id'=>$id))->save($data);
			if($rs){
				//从积分余额中扣除提现金额
				M('wechatuser')->where(array('id'=>$apply_info['user_id']))->setDec('score',$apply_info['money']);
				$this->success('处理成功！');
			}else{
				$this->success('处理失败！');
			}
		}else{
			$this->error('账户余额不足！');
		}
	}
	
}