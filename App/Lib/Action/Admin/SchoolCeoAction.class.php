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
        $db     	= M('school_ceo');
		$so_key 	= I('get.key');
        $so_val 	= I('get.val');
		$begin_time = strtotime(I('get.begin_time'));
        $end_time   = strtotime(I('get.end_time'));
		
		$map = array();
		
		if (in_array($so_key, array(
            'username',
            'real_name',
            'mobile'
        ))) {
            if ( !empty($so_val) ) {
                $map[$so_key] = array(
                    'like',
                    '%' . $so_val . '%'
                );
            }
        }
		
		if ($begin_time > 0 && $end_time > 0) {
            $map['order_time'] = array(
                array(
                    'egt',
                    $begin_time
                ),
                array(
                    'elt',
                    $end_time
                )
            );
        } else if ($begin_time > 0) {
            $map['order_time'] = array(
                'egt',
                $begin_time
            );
        } else if ($end_time > 0) {
            $map['order_time'] = array(
                'elt',
                $end_time
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
		
		$this->assign('map', $map);
        $_SESSION['export_map'] = $map;
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
	
	// 导出CEO列表
    public function export_school_ceo()
    {
        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);
        date_default_timezone_set('Europe/London');
        
        if (PHP_SAPI == 'cli')
            die('This example should only be run from a Web Browser');
        
        import("@.ORG.PHPExcel.IOFactory");
		
        $ceo = M('school_ceo')->select();
        
        // Create new PHPExcel object
        $objPHPExcel = new PHPExcel();
        
        // Set document properties
        $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")->setLastModifiedBy("Maarten Balliauw")->setTitle("Office 2007 XLSX Test Document")->setSubject("Office 2007 XLSX Test Document")->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")->setKeywords("office 2007 openxml php")->setCategory("Test result file");
        
        $subObject = $objPHPExcel->getSheet(0);
        $objPHPExcel->getActiveSheet()->mergeCells('A1:G1');
        $subObject->getColumnDimension('A')->setWidth(10);
        $subObject->getColumnDimension('B')->setWidth(10);
        $subObject->getColumnDimension('C')->setWidth(10);
        $subObject->getColumnDimension('D')->setWidth(50);
        $subObject->getColumnDimension('E')->setWidth(15);
        $subObject->getColumnDimension('F')->setWidth(15);
        $subObject->getColumnDimension('G')->setWidth(20);
        
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->setCellValue('A1', '叮咕校园CEO列表');
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        
        // Add some data
        $objPHPExcel->getActiveSheet()->setCellValue('A2', '编号');
        $objPHPExcel->getActiveSheet()->setCellValue('B2', '用户名');
        $objPHPExcel->getActiveSheet()->setCellValue('C2', '姓名');
        $objPHPExcel->getActiveSheet()->setCellValue('D2', '收货地址');
        $objPHPExcel->getActiveSheet()->setCellValue('E2', '邮箱');
        $objPHPExcel->getActiveSheet()->setCellValue('F2', '手机');
        $objPHPExcel->getActiveSheet()->setCellValue('G2', '上任时间');
        
        $row = 3;
        $ii  = 1;
        foreach ($ceo as $key => $val) {
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A' . $row, $val['id']);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B' . $row, $val['username']);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C' . $row, $val['real_name']);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D' . $row, $val['receiving_address']);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E' . $row, $val['email']);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F' . $row, $val['mobile']);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G' . $row, $val['take_office_time']);
            
            $row += 1;
            $ii += 1;
        }
        
        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle('Simple');
        
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);
        
        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . time() . '.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');
        
        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0
		
		ob_clean(); //关键
        
        flush(); //关键
        
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }
    
    
}
