<?php
/*
校园CEO管理
*/
class SchoolCeoAction extends PublicAction
{
    /*
    校园CEO列表
    */
    public function index()
    {
        import("@.ORG.Page");
        $db     = M('school_ceo');
        $so_key = I('get.keyword');
		
		$map = array();
		if ($so_key) {
			$map = array(
				'username'  => array('like','%' . $so_key . '%'),
				'real_name' => array('like','%' . $so_key . '%'),
				'mobile' 	=> array('like','%' . $so_key . '%'),
				'_logic'	=> 'or'
			);
		}
		
		$count = $db->where($map)->count();
		$Page  = new Page($count, 10);
		$show  = $Page->show();
		$this->assign('show', $show);
		
		$list = $db->where($map)
				   ->order('id desc')
				   ->limit($Page->firstRow . ',' . $Page->listRows)
				   ->select();
        
        $this->assign('list', $list);
        $this->display();
    }
    
	// 编辑校园CEO
	public function edit()
	{
		$id=I('get.id');
		$info=M('school_ceo')->find($id);
		$this->assign('info',$info);

		$MoneyLog = M('take_money')->where(array('user_id'=>$info['id'],'role_id'=>2,'status'=>1))->sum('money');

		$map = array(
			'role_id' => 1,
			'order_status' => 3,
			'pay_status' => 1,
			'school_id' => array('in',$info['school_id']),
			'pay_time' => array('EGT', strtotime($info['take_office_time']))
		);
		
		$totalFee = M('order_info')->where($map)->sum('total_fee');
		$ceoAccountMoney = round($totalFee * 0.02 - $MoneyLog, 2);
		$this->assign('ceoAccountMoney',$ceoAccountMoney);
		
		$school = M('school')->select();
		$this->assign('school',$school);
		
		$s_i = array();
		foreach (explode(",",$info['school_id']) as $key => $val) {
			$s_i[] = (int)$val;
		}
		
		// 校园ceo所在地区
		$map = array(
			'province_id' => $info['province_id'],
			'city_id' => $info['city_id'],
			'district_id' => $info['district_id'],
			'school_id' => json_encode($s_i)
		);
		$this->assign('map',$map);
		
		if ($data=$this->_post()) {
			$data['school_id'] = implode(",", $data['school_id']);
			$w['id']=I('get.id');
			M('school_ceo')->where($w)->save($data);
			$this->success('保存成功',U('edit',array('id'=>$w['id'])));
		} else {
			$this->display();		
		}
	}
	
	/*
		修改密码
	*/
	public function pwd()
	{
		$db   = M('school_ceo');
		$id   = I('get.id');
		$info = $db->find($id);
		$this->assign('info',$info);
		if ($arr=$this->_post()) {
			$data['password'] = md5($arr['password']);
			$db->where(array('id'=>$id))->save($data);
			$this->success('密码修改成功！');
		} else {
			$this->display();
		}
		
	}
	
	// 添加校园CEO
	public function add()
	{
		$school = M('school')->select();
		$this->assign('school',$school);
		$this->display();
	}
	
	// 执行添加校园CEO
	public function doAdd()
	{
		$username 		  = I('post.username');
		$real_name 		  = I('post.real_name');
		$password 		  = I('post.password');
		$take_office_time = I('post.take_office_time');
		$province_id 	  = I('post.province_id');
		$city_id          = I('post.city_id');
		$district_id      = I('post.district_id');
		$school_id 		  = implode(",", I('post.school_id'));
		
		// 查找是否存在用户名重复
		$i = M('school_ceo')->where(array('username'=>$username))->count();
		if ($i > 0) {
			$this->error('用户名已存在', U('add'));
		}
		
		$ceo = array(
			'username' 	       => $username,
			'real_name'        => $real_name,
			'password' 		   => md5($password),
			'take_office_time' => $take_office_time,
			'school_id'        => $school_id,
			'province_id'      => $province_id,
			'city_id'          => $city_id,
			'district_id'      => $district_id
		);
		
		$res = M('school_ceo')->data($ceo)->add();
		if ($res) {
			$this->success('添加成功！', U('index'));
		} else {
			$this->error('添加失败', U('add'));
		}
	}
    
    
}
