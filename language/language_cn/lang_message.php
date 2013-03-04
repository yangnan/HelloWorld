<?php
/**
 * [TGroupon]   (C)2010
 *  liuyang  2010-12-28
*/
if(!defined('TGROUPON')){
	exit('Access Denied');
}
class lang_message{

public static $_TGLOBAL = array("remind_lang"=>array(
    /**
     *	exit and login
    */
        'not_login_jump' => '对不起，您未登录 系统将在 1 秒后自动跳转,如果不想等待,直接点击 这里 跳转 ',
        'login_failure_jump' => '登录失败，请检查用户名或密码 系统将在 3 秒后自动跳转,如果不想等待,直接点击 这里 跳转 ',
        'login_success_jump' => '登录成功， 系统将在 1 秒后自动跳转,如果不想等待,直接点击 这里 跳转',
        'exit_success_jump' => '退出成功， 系统将在 1 秒后自动跳转,如果不想等待,直接点击 这里 跳转',
        'loginorregisterplease' => '请注册或登录',
        'ifyouisshop' => '如果您是商家、网上商城，想在TGroupon网组织团购，请填写',
        'yourcontactplease' => '请留下您 的手机、QQ号或邮箱，方便联系',
    /**
     *	Website basic configuration
    */
        'failure_settings_jump' => '设置失败 系统将在 3 秒后自动跳转,如果不想等待,直接点击 这里 跳转 ',

    /**
     *	Administrator management
    */
        'add_success_jump' => '添加成功 系统将在 1 秒后自动跳转,如果不想等待,直接点击 这里 跳转 ',
        'modify_success_jump' => '修改成功 系统将在 1 秒后自动跳转,如果不想等待,直接点击 这里 跳转 ',
        'modify_failure_jump' => '修改失败 系统将在 1 秒后自动跳转,如果不想等待,直接点击 这里 跳转 ',
        'del_success_jump' => '删除成功 系统将在 1 秒后自动跳转,如果不想等待,直接点击 这里 跳转 ',
        'zhengquetianxie' => '请正确填写购买数量',
    /**
     *	tg_information
    */
        'copyok' => '复制成功',
        'copy' => '复制',
        'not_null_title' => '标题不能为空',
        'not_null_number' => '人数不能为空',
        'not_null_price' => '价格不能为空',
        'not_null_discount' => '折扣不能为空',
        'not_null_deadline' => '截止日期不能为空',
        'not_null_businessman' => '商家名称不能为空',
        'not_null_linkman' => '联系人不能为空',
        'not_null_tel' => '电话不能为空',
        'not_null_email' => 'email不能为空',
        'not_null_msn' => 'msn不能为空',
        'not_null_address' => '地址不能为空',
        'not_null_url' => '网址不能为空',
        'not_null_username' => '用户名不能为空',
        'userrepeat' => '用户已存在',
        'registerok' => '注册成功',
        'buyreadone' => '请您在新打开的页面上<br>完成付款。',
        'buyreadtwo' => '付款完成前请不要关闭此窗口。<br>完成付款后请根据您的情况点击下面的按钮：',
        'buyreadthree' => '返回选择其他支付方式',
        'buyreadfour' => '付款遇到问题',
        'buyreadfive' => '已完成付款',
        'buyreadsix' => '您的余额不够完成本次付款，还需支付',
        'zhifufangshi' => '请选择支付方式',
        'goumailiucheng' => "<p>购买商品流程：</p><p>联系客服--充值--利用账户余额购买（账户余额可以申请提现）</p>",
        'chongzhiqita' => '充值其他联系方式',
        'emailrepeat'=>'email已存在',
	    'format_mobile'=>'手机格式不对',
	    'not_null_mophone'=>'手机或者电话不能为空',

    /**
     *	SEO_set
    */
        'not_null_location' => '位置不能为空！',
        'not_null_title' => 'title不能为空！',
        'not_null_keywords' => 'Keywords不能为空！',
        'not_null_description' => 'description不能为空！',

    /**
     *	Member management
    */
        'del_failure_jump' => '删除失败 系统将在 3 秒后自动跳转,如果不想等待,直接点击 这里 跳转 ',

        'firefox_error' => "被浏览器拒绝,请在浏览器地址栏输入'about:config'并回车然后将'signed.applets.codebase_principal_support设置为'true'",
    /**

     *	User group management
    */
        'input_success_jump' => '写入配置文件成功！系统将在 1 秒后自动跳转,如果不想等待,直接点击 这里 跳转 ',

    /**
     *	Website information related to
    */
        'update_failure_jump' => '更新失败 系统将在 3 秒后自动跳转,如果不想等待,直接点击 这里 跳转 ',

    /**
     *	extra
    */
        'not_null_type' => '类型不能为空',
        'not_null_name' => '名称不能为空',

        'edit_success_jump' => '编辑成功 系统将在 1 秒后自动跳转,如果不想等待,直接点击 这里 跳转 ',

    /**
     *	Within the website prepaid phone
    */
        'not_null_user/price' => '用户名或金额不能为空！',

        'not_user_jump' => '用户不存在 系统将在 3 秒后自动跳转,如果不想等待,直接点击 这里 跳转 ',
        'recharge_success_jump' => '充值成功 系统将在 1 秒后自动跳转,如果不想等待,直接点击 这里 跳转 ',

    /**
     *	SMS interface
    */
        'system_error' => '系统错误,请联系管理',
        'not_purchase_services' => '您未购买短息服务，请联系客服QQ：1556176298',

    )
    );
}