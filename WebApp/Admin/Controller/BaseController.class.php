<?php
/**
 * 基类
 * @copyright  Copyright (c) 2014-2015 muxiangdao-cn Inc.(http://www.muxiangdao.cn)
 * @license    http://www.muxiangdao.cn
 * @link       http://www.muxiangdao.cn
 * @author     muxiangdao-cn Team Prayer (283386295@qq.com)
 */
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {
    protected function _initialize(){
		if(isLogin()){
			define('AID',isLogin());
			$this->admin_id = isLogin();
			$this->admin_name = D('Admin')->where(array('admin_id'=>$this->admin_id))->getField('admin_name');
			$this->assign('admin_name',$this->admin_name);
		}else{
			if (CONTROLLER_NAME != 'Login') {
				$this->redirect('Login/index');
				exit;
			}
		}	
		//获取用户的权限组
		$admin_auth = M('Admin')->where(array('admin_id'=>AID))->getField('admin_auth');
		if($admin_auth){
			$auth_rt = 0;
			$a_map = array();
			$a_map['a_id'] = array('in',$admin_auth);
			$a_name = M('AdminAuth')->where($a_map)->field('a_name')->select();
			if(is_array($a_name) && !empty($a_name)){
				$auth_arr = array();
				foreach($a_name as $au)
				{
					$auth_arr[] = $au['a_name'];	
				}
			}
			$a_controller = CONTROLLER_NAME.'-*';
			$a_actionname = CONTROLLER_NAME.'-'.ACTION_NAME;
			if(in_array($a_controller,$auth_arr) || in_array($a_actionname,$auth_arr)){
				$auth_rt = 1;
			}
			if($auth_rt == 0){
				echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />您没有被授权，不可进行此操作！';die;
			}	
		}
		//权限END				
    }
	/**
	 * 登出
	 */
	public function logout(){
		session('admin_id',null);
		cookie('admin_id',null);
		cookie('remember',null);
		$this->redirect('Login/index');
	}
}