<?php
/**
 * 首页
 * @copyright  Copyright (c) 2014-2015 muxiangdao-cn Inc.(http://www.muxiangdao.cn)
 * @license    http://www.muxiangdao.cn
 * @link       http://www.muxiangdao.cn
 * @author     muxiangdao-cn Team Prayer (283386295@qq.com)
 */
namespace Admin\Controller;
class IndexController extends BaseController {
	public function __construct(){
		parent::__construct();
		$this->adminModel = D('Admin');
	}
	//首页
	public function index(){
		$this->display();
	}
}