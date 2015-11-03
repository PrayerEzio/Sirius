<?php
/**
 * Admin函数
 * @copyright  Copyright (c) 2014-2015 muxiangdao-cn Inc.(http://www.muxiangdao.cn)
 * @license    http://www.muxiangdao.cn
 * @link       http://www.muxiangdao.cn
 * @author     muxiangdao-cn Team Prayer (283386295@qq.com)
 */
function isLogin(){
	if (session('admin_id')) {
		if (session('Module') == MODULE_NAME) {
			return session('admin_id');;
		}
	}else {
		if (cookie('remember') && cookie('admin_id') && cookie('Module')) {
			if (decrypt(cookie('Module')) == MODULE_NAME) {
				session('admin_id',decrypt(cookie('admin_id')));
				session('Module',decrypt(cookie('Module')));
				return session('admin_id');
			}
		}
	}
}