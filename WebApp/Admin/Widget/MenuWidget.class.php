<?php
/**
 * 菜单挂件
 * @copyright  Copyright (c) 2014-2015 muxiangdao-cn Inc.(http://www.muxiangdao.cn)
 * @license    http://www.muxiangdao.cn
 * @link       http://www.muxiangdao.cn
 * @author     muxiangdao-cn Team Prayer (283386295@qq.com)
 */
namespace Admin\Widget;
use Admin\Controller\BaseController;
class MenuWidget extends BaseController{
	public function leftMenu(){
		$this->display('Widget:Menu:leftMenu');
	}
}