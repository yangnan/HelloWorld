<?php
/**
 * [TGroupon]   (C)2010
 *  liuyang  2010-12-28
*/
if(!defined('TGROUPON')){
	exit('Access Denied');
}
class language_message
{
    public static $_TGLOBAL = array("remind_language"=>array(
    /**
     *	register and login
    */
        'effective_email' => '请输入有效的Email地址',
        'not_null_email' => 'Email不能为空！',
        'emailorusernotnull' => 'Email/用户不能为空',
        'not_null_user' => '用户名不能为空！',
        'not_null_pass' => '密码不能为空！',
        'not_different_pass' => '输入的密码不一致！',
        'not_null_qq' => 'qq不能为空！',
        'registersameip' => '邀请IP和注册IP为同一个，不能注册',
        'loginerror' => '登录失败,请检查用户名或密码',
        'not_user_jump' => '用户不存在,或者被删除 系统将在 1 秒后自动跳转,如果不想等待,直接点击 这里 跳转 ',
        'action_success_jump' => '订阅成功 系统将在 1 秒后自动跳转,如果不想等待,直接点击 这里 跳转 ',
        'maploadding' => 'google地图加载中',
        'addresserror' => '该地址在地图上无法显示',
        'outletemail' => '请输入您的Email',
        'phoneerror' => '您的电话格式不正确',
        'phone_null' => '您的电话不能为空',
        'content_null' => '问题内容不能为空',
        'title_null' => '问题标题不能为空',
        'nick_null' => '您的称呼不能为空',
        'city_null' =>'城市为空',
        'groupon_null' => '团购内容为空',
        'other_contact_null' => '其他联系方式为空',
        'readme' => '当好友接受您的邀请，在TGroupon上首次注册并成功购买，审核通过后返还10元到您的TGroupon电子账户，下次团购时可直接用于支付。没有数量限制，邀请越多，返利越多。',

    ));
}