<?php
/*	定时任务脚本
 *	AutoLibAction
 */
class CliAction extends Action {
	
	/*
	 *	2天自动确认收货
	 */
	public function autoConfirmOrder()
	{
		$orders = $this->_getWaitConfirmOrder();
		
		foreach($orders as $key => $val) {
			$this->_confirmOrder($val['id']);
		}
		
		echo count($orders);
	}
	
	/*
		confirm order
	 */
	private function _confirmOrder($order_id)
	{
		$order_id   = intval($order_id);
		$order_info = M('order_info')->find($order_id);

		M('order_info')->where(array('id'=>$order_id))->save(array('order_status'=>3,'confirm_order_time'=>time()));

		//add goods to shop
		if($order_info['role_id'] == 2) {
			$user_id = $order_info['user_id'];
			$shop = M('shop')->where(array('uid'=>$user_id))->find();
			$shop_id = $shop['id'];

			$order_goods = M('order_goods')->where(array('order_id'=>$order_id))->select();

			//echo $user_id.'|'.$shop_id.'|'.count($order_goods);exit;
			foreach($order_goods as $k => $val) {
				$goods_id = $val['goods_id'];
				$goods_info = M('goods')->find($val['goods_id']);
				$shop_goods = M('shop_goods')->where(array('goods_id'=>$goods_id, 'shop_id'=>$shop_id))->find();

				$val['goods_nums'] = $val['goods_nums'] * $goods_info['package_num'];

				if($shop_goods) {
					$goods_num = $shop_goods['store_num'] + $val['goods_nums'];
					M('shop_goods')->where(array('goods_id'=>$goods_id, 'shop_id'=>$shop_id))->save(array('store_num'=>$goods_num));
				} else {
					$shop_goods['goods_id']    = $goods_id;
					$shop_goods['shop_id']     = $shop_id;
					$shop_goods['cid']         = $goods_info['cid'];
					$shop_goods['store_num']   = $val['goods_nums'];
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
		} // end if
	}
	
	// 获取当前时间2小时还未确认收货的订单
	private function _getWaitConfirmOrder()
	{
		$order    = M('order_info');
		$deadline = time() - 2*3600;
		
		$map = array(
			'role_id'      => 1,
			'order_status' => 2,
			'pay_status'   => 1,
			'pay_time' 	   => array('ELT',$deadline)
		);
		$orders = $order->where($map)->select();
		
		return $orders;
	}
	
}