<?php
class IndexAction extends Action {
    private $weObj;
    private $token;
    private $wechatid;
    private $pwechat;
    private $content;
    private $event;
    private $type;
    private $db;
    private $URL;
    private $helper;
    public function _initialize(){
    	import("@.ORG.Wchat");
        import("@.ORG.Wxhelper");
    	$this->URL = 'http://'.I('server.HTTP_HOST');
    	$this->token = I('get.token');
    	$options=array(
			// 'debug'=>true,
			'token'=>$this->token
		);
        $this->weObj = new Wchat($options);
        $this->type = $this->weObj->getRev()->getRevType();
        $this->wechatid = $this->weObj->getRevFrom();
        $this->pwechat = $this->weObj->getRevTo();
        $this->event = $this->weObj->getRevEvent();
        $this->content = $this->weObj->getRevContent();
		
        $this->db = M('wechat_replyconf');
        //收集用户信息
      /*  $udata=array(
            'wechatid'=>$this->wechatid,
            'pwechat'=>$this->pwechat,
            'token'=>$this->token,
            );
        $this->reg($udata);*/
		$this->pubwechat=M('pubchatuser')->find(1);	//公众号信息
		$this->helper=new Wxhelper($this->pubwechat);
		
		//$reqdata=file_get_contents("php://input");
		//file_put_contents('log.txt',$reqdata);
    }
    public function index() {
        switch($this->type) {
            case Wchat::MSGTYPE_TEXT:
               if(strpos($this->content, '天气')!==false){ //天气查询
                    $info=$this->tool->tianqi($this->content);
                    isset($info['type'])&&$info['type']=='text'?$this->weObj->text($info['msg'])->reply(): $this->weObj->news($info)->reply();
                }elseif(strpos($this->content, '手机')!==false){ //手机归属地查询
                    $info=$this->tool->shouji($this->content);
                    $this->weObj->text($info)->reply();
                }else{
                    $this->sendReply(1,$this->content);
                }
                exit;
                break;
            case Wchat::MSGTYPE_EVENT:
                $ev=$this->event;
                if($ev['event']=='CLICK'){	//菜单事件
                    switch ($ev['key']){
                        default :
                            $this->sendReply(0,$ev['key']);
                        break;
                    }
                        
                }elseif($ev['event']=='subscribe'){	//关注事件
                        $udata=array(
                            'wechatid'=>$this->wechatid,
							'group_id'=$this->event['key'],
                            'pwechat'=>$this->pwechat,
                            'token'=>$this->token,
                            'state'=>0,
							'subscribe'=>1,		//已关注
							'subscribe_time'=>time(),
                            'posttime'=>time()
                        );
                        $this->reg($udata);
						//移动用户分组
						$group_id=str_replace('qrscene_','',$ev['key']);
						$this->helper->change_user_group($this->wechatid,$group_id);
                        $this->sendReply(0,'subscribe');
                }elseif($ev['event']=='unsubscribe'){	//取消关注事件
                        $this->reg(array('subscribe'=>0,'subscribe_time'=>0,'posttime'=>time()));
                }elseif($ev['event']=='SCAN'){		//已关注用户扫面带参二维码
						//移动用户到对应分组
						$this->helper->change_user_group($this->wechatid,$this->event['key']);	
						 $data=array(
                            'wechatid'=>$this->wechatid,
							'group_id'=$this->event['key'],
                            'pwechat'=>$this->pwechat,
                            'token'=>$this->token,
                            'state'=>0,
							'subscribe'=>1,		//已关注
							'subscribe_time'=>time(),
                            'posttime'=>time()
                        );
                        $this->reg($data);
				}
                exit;
                break;
            case Wchat::MSGTYPE_IMAGE:
                $this->weObj->text("你发的是什么图片？")->reply();
                exit;
                break;
            default:
                $this->weObj->text("help info")->reply();
                exit;
                break;
        }
    }

    private function sendReply($evtype,$key){
    	if($evtype==0){     //菜单事件
            $w['menukey']=$key;
    	}else{      //关键字[模糊查询]
            $w['textkey']=array('like',"%$key%");
    	}
    	$menu=$this->db->where($w)->find();
        //后台没有设置相关回复信息
        if(empty($menu)){       //交给机器人处理
            $question=$key;
            $_openid=$this->wechatid;     
            $output=$this->freeChat($question);
            $this->createReply(1,$output); 
        }else{
            $this->createReply($menu['type'],$menu['conf']); 
        }
    }
    private function createReply($type,$conf){
        //news
    	if($type==0){
            $menu = unserialize($conf);
            foreach ($menu as $key => $value) {
                    $menu[$key]['PicUrl'] = $this->URL.$menu[$key]['PicUrl'];
                    $menu[$key]['Url']=  htmlspecialchars_decode($menu[$key]['Url'] . '&wechatid=' . $this->wechatid . '&pwechat=' . $this->pwechat.'&token='.$this->token);
                    substr($menu[$key]['Url'],0,4)=='http'||$menu[$key]['Url'] = $this->URL.$menu[$key]['Url'];
            }
            $this->weObj->news($menu)->reply();
        //text    
    	}else{  
            $this->weObj->text($conf)->reply();
    	}
    }
    //微信头像加V
    private  function getWxpic($picurl){
        import("@.ORG.Http");
        import('@.ORG.Image.ThinkImage');
        $pic='Data/Wxrev/icon/'.time().'.jpg';
        Http::curlDownload($picurl,$pic);
        $img = new ThinkImage(THINKIMAGE_GD,$pic); 
        $img->thumb(200,200,THINKIMAGE_THUMB_FIXED)->water('Data/Wxrev/v.png', THINKIMAGE_WATER_SOUTHEAST)->save($pic);
        return $pic;
    }
    //记录聊天者信息[注册]
    public function reg($data)
        $db=M('wechatuser');
        $map=array('wechatid'=>$data['wechatid']);
        $info=$db->where($map)->find();
		
        if(empty($info)){
            $db->data($data)->add();
        }else{
            unset($data['wechatid']);
            $db->where($map)->data($data)->save();
        }
    }
    //根据wechatid获取用户uid
    private function getuid($wechatid){
        $db=M('wechatuser');
        $map=array('wechatid'=>$wechatid);
        $info=$db->where($map)->find();
        return $info['id'];
    }
    //free chat
    private function freeChat($msg){
    $url='http://api.bd001.com/iMicms_com/api.php?key=free&appid=0&msg='.$msg;
        $ch = curl_init($url) ;  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; 
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ; 
        $output = curl_exec($ch); 
        curl_close($ch);
        $output=json_decode($output,true);
        //return $output['content'];
    }
}
?>