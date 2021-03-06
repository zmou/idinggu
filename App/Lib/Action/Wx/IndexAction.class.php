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
		//$reqdata=file_get_contents("php://input");
		//file_put_contents('log.txt',$reqdata);
		$this->pubwechat=M('pubchatuser')->find(1);	//公众号信息
		$this->helper=new Wxhelper($this->pubwechat);
		
    }
    public function index() {
        switch($this->type) {
            case Wchat::MSGTYPE_TEXT:
				//转发到客服
				$this->weObj->transmitService()->reply();
				//$this->sendReply(1,$this->content);
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
                        $this->sendReply(0,'subscribe');
                }elseif($ev['event']=='unsubscribe'){	//取消关注事件

                }elseif($ev['event']=='SCAN'){		//已关注用户扫面带参二维码
						
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
			
			$return=$this->chat_config($this->content);
			if(!empty($return)){
				$this->weObj->text($return)->reply();
			}else{
				$output=$this->freeChat($question);
				$this->createReply(1,$output); 
			}
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
					$menu[$key]['Url']=htmlspecialchars_decode($menu[$key]['Url']);
					if(substr($menu[$key]['Url'],0,4)!='http'){
						 $menu[$key]['Url'] = $this->URL.$menu[$key]['Url'];
					}
					if(!strpos($menu[$key]['Url'],'?')){
						$menu[$key]['Url'].='?wxid='.$this->wechatid;
					}else{
						$menu[$key]['Url'].='&wxid='.$this->wechatid;
					}
					
            }
            $this->weObj->news($menu)->reply();
        //text    
    	}else{  
			//微信信息
			//$wx_info=$this->helper->get_user_info($this->wechatid);
			//<a href="'.$this->URL.'/index.php?g=Weixin&m=Ucenter&a=index">'.$wx_info['nickname'].'</a>
			//$conf=str_replace('{nickname}',$wx_info['nickname'],$conf);
			//本地用户信息
			//$info=M('wechatuser')->where(array('wechatid'=>$this->wechatid))->find();
			//$conf=str_replace('{id}',intval($info['id'])+528,$conf);
            $this->weObj->text($conf)->reply();
    	}
    }
	
	/*
		查询所有关键字
	*/
	public function chat_config($input){
		$list=M('wechat_replyconf')->where(array('type'=>1))->select();
		foreach($list as $val){
			if(strpos($input,$val['textkey'])!==false){
				$return=$val['conf']; 
				break;
			}
		}
		return $return;
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
    //free chat
    private function freeChat($msg){
    	$url='http://api.qingyunke.com/api.php?key=free&appid=0&msg='.$msg;
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