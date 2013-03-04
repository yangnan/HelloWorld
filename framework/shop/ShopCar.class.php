<?php
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  jeffxie<jeffxie@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-17
 **/

class ShopCar {

	//购物车数组 array()  id:团购信息id  quantity:数量  mobile_phone_number:手机号码
	public static $GrouponCartInfo = array();

	public static function addCar($goods_id,$goods_info){
        $cur_cart_array = unserialize(stripslashes($_SESSION['shop_cart_info']));
        $cur_cart_array[$goods_id] = $goods_info;
        $_SESSION["shop_cart_info"] = serialize($cur_cart_array);
	}

	public static function editCar($goods_id,$goods_info){
		$cur_cart_array = unserialize(stripslashes($_SESSION['shop_cart_info']));
        $cur_cart_array[$goods_id] = $goods_info;
        $_SESSION["shop_cart_info"] = serialize($cur_cart_array);
	}
	public static function getOneItem($goods_id){
        $cur_cart_array = unserialize(stripslashes($_SESSION['shop_cart_info']));

		if(!isset($cur_cart_array) && empty($cur_cart_array))
		{
			return '';
		}
		return $cur_cart_array[$goods_id];
	}

	public static function getAll(){
		$cur_cart_array = unserialize(stripslashes($_SESSION['shop_cart_info']));
        return $cur_cart_array;
	}

	public static function getAllCount(){
        $cur_cart_array = unserialize(stripslashes($_SESSION['shop_cart_info']));
		return count($cur_cart_array);
	}
}
?>
