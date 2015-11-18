<?php
/*
	注册登录
*/
class MemberAction extends BaseAction{
	
	/*
		注册
	*/
	public function reg(){
		if($this->user_id>0){
			$this->redirect('Ucenter/index');
		}
		$this->display();
	}
	
	/*
		登录
	*/
	public function login(){
		if($this->user_id>0){
			$this->redirect('Ucenter/index');
		}
		$this->display();
	}
	/*
		注册店铺
	*/
	public function shop_reg(){
		$db=M('wechat_user');
		$reg_code=I('get.auxcode');
		
		$this->assign('reg_code',$reg_code);
		if(!empty($this->user_id)){
			if($this->user_info['role_id']!=1){
				$this->error('您已经是微店主了！',U('Index/shop_index',array('id'=>$this->user_id)));
			}else{
				if(!empty($reg_code)){
					$this->redirect('shop_reg2',array('auxcode'=>$reg_code));
				}else{
					$this->redirect('shop_reg2');
				}
				
			}
		}else{
			$this->display();
		}
		
	}
	/*
		已登录会员，开店
	*/
	public function shop_reg2(){
		$db=M('wechat_user');
		$reg_code=I('get.auxcode');
		$this->assign('reg_code',$reg_code);
		$this->display();
	}
	
	public function do_shop_reg2(){
		$db=M('wechat_user');
		$errcode=0;
		if($arr=$this->_post()){
			$arr['role_id']=2;			//微店主角色
			
			$arr['status']=1; //默认通过认证	
			
			$reg_code=$db->where(array('invite_code'=>$arr['reg_code']))->find();
			$reg_mobile=$db->where(array('mobile'=>$arr['mobile']))->find();
			if($reg_mobile){
			$errcode=3;		
			echo $errcode;exit();
			}
			//if(!empty($reg_code)){
				
				if(!empty($reg_code)){
					$arr['parent_id']=$reg_code['id'];			//父级会员id	
				}
				$arr['shop_name']=$arr['name'].'的小店';
				//无用户名
				if(!empty($arr['username'])){
					$arr['password']=md5($arr['password']);
					$i=$db->where(array('username'=>$arr['username']))->find();
					if(!empty($i)){
						$errcode=2;			//用户名已存在
					}else{
						$db->where(array('id'=>$this->user_id))->save($arr);
					}
				}else{		//已有用户名
					$db->where(array('id'=>$this->user_id))->save($arr);
				}
			//}else{
				//$errcode=1;			//注册码不存在
			//}
			
			echo $errcode;exit();
		}
	}
	
	 //验证码
    public function verify(){
        import('ORG.Util.Image');
        ob_end_clean();
        Image::buildImageVerify();
    }
	
	/*
		执行登录动作
	*/
	public function do_login(){
		$db=M('wechat_user');
		$output=array('errcode'=>0);
		if($this->_post()){
			$verify=I('post.verify');
			$username=I('post.username');
			$password=md5(I('post.password'));
			if($_SESSION['verify']==md5($verify)){
				
				$i=$db->where(array('username'=>$username))->find();

				if($i['password']!=$password){
					$output['errcode']=2;		//用户名或密码错误
				}else{
					$_SESSION['user_id']=$i['id'];			//登录者id
					$output['jump']=base64_decode(I('post.jump'));
					$login_log=M('user_login_log')->where(array('user_id'=>$i['id']))->find();
					if(date('Ymd',$login_log['login_time'])!=date('Ymd',time())){
						//奖励积分
						return_jifen(1,'login',$i['id']);
					}
					//记录登录时间
					if(empty($login_log)){
						M('user_login_log')->add(array('user_id'=>$i['id'],'login_time'=>time()));
					}else{
						M('user_login_log')->where(array('user_id'=>$i['id']))->save(array('login_time'=>time()));
					}
				}
				
				
			}else{
				$output['errcode']=1;			//验证码错误
			}
			echo json_encode($output);
			exit();
		}
	}
	/*
		执行注册动作
	*/
	public function do_reg(){
		$db=M('wechat_user');
		$errcode=0;
		if($arr=$this->_post()){

			$arr['password']=md5($arr['password']);
			
			$i=$db->where(array('username'=>$arr['username']))->find();
			if(!empty($i)){
				$errcode=1;			//用户名已存在
			}else{
				if(is_weixin()){			//微信
					$map=array('wechatid'=>$_SESSION['wx_userinfo']['openid']);	
					$db->where($map)->save($arr);
				}else{			//浏览器
					//生成邀请码
					$invite_code=randStr();
					$is_exist=M('wechat_user')->where(array('invite_code'=>$invite_code))->find();
					while(!empty($is_exist)){
						$invite_code=randStr();
					}
					$arr['invite_code']=$invite_code;
					//记录用户关系
					if($_SESSION['parent_id']>0){
						$fup=M('user_relation')->where(array('user_id'=>$_SESSION['parent_id']))->find();
						if(!empty($fup)){
							$arr['parent_id']=$fup['user_id'];				//父级会员id
							$relation['parent_1']=$parent_id;
							$relation['parent_2']=$fup['parent_1']?$fup['parent_1']:0;
							$relation['parent_3']=$fup['parent_2']?$fup['parent_2']:0;
							$relation['parent_4']=$fup['parent_3']?$fup['parent_3']:0;
							$relation['parent_5']=$fup['parent_4']?$fup['parent_4']:0;
						}
					}
					$arr['posttime']=time();
					$id=$db->add($arr);
					$relation['user_id']=$id;
					M('user_relation')->add($relation);		//添加用户关系
					//给推荐人返积分
					return_jifen(1,'reg_tui',$_SESSION['parent_id']);
					unset($_SESSION['parent_id']);			//【注册完成】释放推荐人id
				}
				
			}
			echo $errcode;exit();
		}
	}
	
	/*
		注册开店
	*/
	
	public function do_shop_reg(){
		$db=M('wechat_user');
		$errcode=0;
		if($arr=$this->_post()){
		
			$arr['password']=md5($arr['password']);

			$arr['role_id']=2;			//店主角色
			$i=$db->where(array('username'=>$arr['username']))->find();
			$reg_code=$db->where(array('invite_code'=>$arr['reg_code']))->find();
			
			$reg_mobile=$db->where(array('mobile'=>$arr['mobile']))->find();
			if($reg_mobile){
			$errcode=3;		
			echo $errcode;exit();
			}
			//if(!empty($reg_code)){
				if(!empty($i)){
					$errcode=2;		//用户名已经存在
				}else{
					if(!empty($reg_code)){
						$arr['parent_id']=$reg_code['id'];			//父级会员id
					}
					
					$arr['shop_name']=$arr['name'].'的小店';
					if(is_weixin()){			//微信
						$map=array('wechatid'=>$_SESSION['wx_userinfo']['openid']);	
						$db->where($map)->save($arr);
					}else{						//浏览器
						//生成邀请码
						$invite_code=randStr();
						$is_exist=M('wechat_user')->where(array('invite_code'=>$invite_code))->find();
						while(!empty($is_exist)){
							$invite_code=randStr();
						}
						$arr['invite_code']=$invite_code;
						//记录用户关系
						/*$parent_id=$reg_code['id'];			//上级用户id
						if($parent_id>0){
							$fup=M('user_relation')->where(array('user_id'=>$parent_id))->find();
							if(!empty($fup)){
								$arr['parent_id']=$fup['user_id'];				//父级会员id
								$relation['parent_1']=$parent_id;
								$relation['parent_2']=$fup['parent_1']?$fup['parent_1']:0;
								$relation['parent_3']=$fup['parent_2']?$fup['parent_2']:0;
								$relation['parent_4']=$fup['parent_3']?$fup['parent_3']:0;
								$relation['parent_5']=$fup['parent_4']?$fup['parent_4']:0;
							}
						}*/
						$arr['posttime']=time();
						//默认审核店铺
						$arr['status']=1;
						//插入用户信息
						$id=$db->add($arr);
						//$relation['user_id']=$id;
						//M('user_relation')->add($relation);		//添加用户关系
						
					}
					
				}
			//}else{
				//$errcode=1;		//注册码不存在
			//}
			echo $errcode;exit();
			
		}
	}
	
	public function logout(){
		$i=M('wechat_user')->find($_SESSION['user_id']);
		unset($_SESSION['user_id']);
		if(in_array($i['role_id'],array(2,3))){
			$this->redirect('Index/shop_index',array('id'=>$i['id']));
		}else{
			$this->redirect('Index/index');
		}
	}
}