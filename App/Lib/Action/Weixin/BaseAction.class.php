<?php
/*
	基控制器【微信商城】
*/
class BaseAction extends Action{
		
    public $user_id;		//登录用户id
    public $user_info;		//登录用户信息
    public $wechatid;		//用户openid	
	public $webinfo;		//站点配置信息
	public $wxauth;			//微信网页认证obj
	public $wx_userinfo;	//当前微信用户信息
	public $position;		//地理位置	
	
	
    public function _initialize(){
		if(!is_mobile()){
			//echo '<h5><center>请在微信中浏览</center></h5>';
			//die();
		}
		
        $agent = $_SERVER['HTTP_USER_AGENT']; 
        if(!strpos($agent,"icroMessenger")) {
			//echo '<h5><center>请在微信中浏览</center></h5>';
			//die();
		   //=====================浏览器==========================//
		   //推广会员id
		   $parent_id=I('get.parent_id');
		   if($parent_id>0){
			  $_SESSION['parent_id']=$parent_id;
		   }
		   //$this->user_id=$_SESSION['user_id']=90;
		   $this->user_id=$_SESSION['user_id'];
		   $this->user_info=M('wechat_user')->where(array('id'=>$this->user_id))->find();
        }else{
			//=====================微信处理逻辑====================//
			$this->wechatid=I('get.wechatid');    
			$this->assign('wechatid',$this->wechatid); 
			
			//微信网页授权
			if(empty($_SESSION['wx_userinfo'])){
				$this->wxOauth();
			}else{
				//上级会员id
				$parent_id=I('get.parent_id');
				$this->wx_userinfo=$_SESSION['wx_userinfo'];
				$reg_info=M('wechat_user')->where(array('wechatid'=>$this->wx_userinfo['openid']))->find();
				if(empty($reg_info)){
					$wx_data=array(
					   'wechatid'=>$this->wx_userinfo['openid'],
					   'nickname'=>$this->wx_userinfo['nickname'],
					   'headimgurl'=>$this->wx_userinfo['headimgurl'],
					   'province'=>$this->wx_userinfo['province'],
					   'city'=>$this->wx_userinfo['city'],
					   'sex'=>$this->wx_userinfo['sex'],
					   'posttime'=>time()
					);
					//生成邀请码
					/*$invite_code=randStr();
					$is_exist=M('wechat_user')->where(array('invite_code'=>$invite_code))->find();
					while(!empty($is_exist)){
						$invite_code=randStr();
					}
					$wx_data['invite_code']=$invite_code;*/
					
					if(!empty($parent_id)){
						$wx_data['parent_id']=$parent_id;
						//记录父级关系
						$fup=M('user_relation')->find($parent_id);
						$relation['parent_1']=$parent_id;
						$relation['parent_2']=$fup['parent_1']?$fup['parent_1']:0;
						$relation['parent_3']=$fup['parent_2']?$fup['parent_2']:0;
						$relation['parent_4']=$fup['parent_3']?$fup['parent_3']:0;
						$relation['parent_5']=$fup['parent_4']?$fup['parent_4']:0;
						
						//给推荐人返积分
						return_jifen(1,'reg_tui',$parent_id);
						
					}
					if(!empty($wx_data['wechatid'])){
						$user_id=M('wechat_user')->add($wx_data);
						
						$relation['user_id']=$user_id;
						//添加用户关系表
						M('user_relation')->add($relation);
						
						
						$_SESSION['user_id']=$user_id;
						$_SESSION['user_info']=$wx_data;
						
						//注册送积分
						//return_jifen(1,'reg',$user_id);
						
					}
					
				}else{
					//已注册用户
					$_SESSION['user_id']=$reg_info['id'];
					$_SESSION['user_info']=$reg_info;
					
					//每日登录送积分
					$login_log=M('user_login_log')->where(array('user_id'=>$reg_info['id']))->find();
					if(date('Ymd',$login_log['login_time'])!=date('Ymd',time())){
						//奖励积分
						//return_jifen(1,'login',$reg_info['id']);
					}
					//记录登录时间
					if(empty($login_log)){
						M('user_login_log')->add(array('user_id'=>$reg_info['id'],'login_time'=>time()));
					}else{
						M('user_login_log')->where(array('user_id'=>$reg_info['id']))->save(array('login_time'=>time()));
					}
					
				}
			}
			$this->user_id=$_SESSION['user_id'];	
			$this->user_info=M('wechat_user')->find($this->user_id);
			//=====================end微信处理逻辑====================//	
		}
		$this->assign('user_id',$this->user_id);
		$this->assign('user_info',$this->user_info);
		$this->web_config();
		//地理位置信息
		$this->position=I('session.position');
		if(empty($this->position)){
			$this->position=unserialize($this->user_info['last_position']);
			session('position',$this->position);
		}
		$shop=M('shop')->where(array('build_id'=>$this->position['build_id']))->find();
		session('shop_id',$shop['id']);		//记录店长uid
		$this->assign('position',$this->position);
		//购物车商品数量
		$this->assign('cart_count',I('session.cart_goods_nums'));
    }
    
    public function _empty(){
        $this->redirect('Index/index');
    }
    //验证码
    public function verify(){
        import('ORG.Util.Image');
        ob_end_clean();
        Image::buildImageVerify();
    }
    /*
		微信网页授权
	*/
    public function wxOauth(){
        import("@.ORG.WxOAuth");
		//公众号配置信息
		$conf=M('wechat_config')->find(1);	
        $this->wxauth=new WxOAuth($conf);
		$redirect_uri=get_curr_url();
        $auth_url=$this->wxauth->get_authorize_url($redirect_uri);
		
		if(!isset($_GET['code'])&&empty($_SESSION['wx_userinfo'])){
			redirect($auth_url);
		}else{
			$access_token=$this->wxauth->get_access_token($_GET['code']);

			$info=$this->wxauth->get_user_info($access_token['access_token'],$access_token['openid']);
			
			$_SESSION['wx_userinfo']=$info;
			
			if(is_array($_SESSION['wx_userinfo'])){
				
				//上级会员id
				$parent_id=I('get.parent_id');
				$this->wx_userinfo=$info;
				$reg_info=M('wechat_user')->where(array('wechatid'=>$this->wx_userinfo['openid']))->find();
				if(empty($reg_info)){
					$wx_data=array(
					   'wechatid'=>$this->wx_userinfo['openid'],
					   'nickname'=>$this->wx_userinfo['nickname'],
					   'headimgurl'=>$this->wx_userinfo['headimgurl'],
					   'province'=>$this->wx_userinfo['province'],
					   'city'=>$this->wx_userinfo['city'],
					   'sex'=>$this->wx_userinfo['sex'],
					   'posttime'=>time()
					);
					
					//生成邀请码
					/*$invite_code=randStr();
					$is_exist=M('wechat_user')->where(array('invite_code'=>$invite_code))->find();
					while(!empty($is_exist)){
						$invite_code=randStr();
					}
					$wx_data['invite_code']=$invite_code;*/
					
					if(!empty($parent_id)){
						$wx_data['parent_id']=$parent_id;
						
						//记录父级关系
						$fup=M('user_relation')->find($parent_id);
						$relation['parent_1']=$parent_id;
						$relation['parent_2']=$fup['parent_1']?$fup['parent_1']:0;
						$relation['parent_3']=$fup['parent_2']?$fup['parent_2']:0;
						$relation['parent_4']=$fup['parent_3']?$fup['parent_3']:0;
						$relation['parent_5']=$fup['parent_4']?$fup['parent_4']:0;
						//给推荐人返积分
						return_jifen(1,'reg_tui',$parent_id);
					}
					
					if(!empty($wx_data['wechatid'])){
						$user_id=M('wechat_user')->add($wx_data);
						
						$relation['user_id']=$user_id;
						//添加用户关系表
						M('user_relation')->add($relation);
						
						
						$_SESSION['user_id']=$user_id;
						$_SESSION['user_info']=$wx_data;
						
						//注册送积分
						//return_jifen(1,'reg',$user_id);
					}
				}else{
					$_SESSION['user_id']=$reg_info['id'];
					$_SESSION['user_info']=$reg_info;
					
					//每日登录送积分
					$login_log=M('user_login_log')->where(array('user_id'=>$reg_info['id']))->find();
					if(date('Ymd',$login_log['login_time'])!=date('Ymd',time())){
						//奖励积分
						//return_jifen(1,'login',$reg_info['id']);
					}
					//记录登录时间
					if(empty($login_log)){
						M('user_login_log')->add(array('user_id'=>$reg_info['id'],'login_time'=>time()));
					}else{
						M('user_login_log')->where(array('user_id'=>$reg_info['id']))->save(array('login_time'=>time()));
					}
				}
				
				
			
			}
	
			
		}
		
    }

    /*
		获取站点配置信息
	*/
    public function web_config(){
		$webinfo=M('cms_config')->find(1);
        $this->assign('webinfo',$webinfo);
    }

	public function get_location()
	{
		//sqrt((108.917770-108.899918)^2+(34.215351-34.223584)^2)
		//34.215351,108.917770
		//34.223584,108.899918
	}


}
