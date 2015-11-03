<?php
/**
 * 登录
 * @copyright  Copyright (c) 2014-2015 muxiangdao-cn Inc.(http://www.muxiangdao.cn)
 * @license    http://www.muxiangdao.cn
 * @link       http://www.muxiangdao.cn
 * @author     muxiangdao-cn Team Prayer (283386295@qq.com)
 */
namespace Admin\Controller;
class LoginController extends BaseController {
	public function __construct(){
		parent::__construct();
		$this->adminModel = D('Admin');
	}
	//登录
	public function index(){
		if (IS_POST) {
			$email = trim($_POST['email']);
			$password = re_md5($_POST['password']);
			$where['admin_email'] = $email;
			$info = $this->adminModel->where($where)->find();
			if (!empty($info)) {
				if ($password == $info['password']) {
					if ($info['admin_status'] == 1) {
						session('admin_id',$info['admin_id']);
						session('Module',MODULE_NAME);
						if ($_POST['remember']) {
							cookie('admin_id',encrypt(session('admin_id')));
							cookie('Module',encrypt(MODULE_NAME));
							cookie('remember',1);
						}
						$this->adminModel->where($where)->setField('last_login_time',NOW_TIME);
						$this->adminModel->where($where)->setField('last_login_ip',get_client_ip());
						$this->adminModel->where($where)->setInc('login_num');
						$this->success('登录成功,正在跳转',U('Index/index'));//OK
					}else {
						$this->error('账号已被冻结.');//Locked
					}
				}else {
					$this->error('账号密码错误');//Forbidden
				}
			}else {
				$this->error('账号密码错误');//Not Found
			}
		}elseif (IS_GET){
			$this->display();
		}
	}
	//注册
	//TODO:屏蔽注册功能
	public function register(){
		if (IS_POST) {
			$data['admin_name'] = str_rp(trim($_POST['name']));
			$data['admin_email'] = str_rp(trim($_POST['email']));
			$data['password'] = re_md5($_POST['password']);
			$data['register_time'] = NOW_TIME;
			$data['last_login_time'] = NOW_TIME;
			$data['last_login_ip'] = get_client_ip();
			$data['login_num'] = 0;
			$data['admin_status'] = 1;
			$error_msg = array();
			if (empty($data['admin_name'])) {
				$error_msg[] = '姓名不能为空.';
			}
			if (empty($data['admin_email'])) {
				$error_msg[] = '邮箱不能为空.';
			}else {
				$email_count = $this->adminModel->where(array('admin_email'=>$data['admin_email']))->count();
				if ($email_count) {
					$error_msg[] = '该邮箱已被注册.';
				}else {
					if (!checkEmail($data['admin_email'])) {
						$error_msg[] = '邮箱格式不正确.';
					}
				}
			}
			if (empty($_POST['password'])) {
				$error_msg[] = '密码不能为空.';
				
			}else {
				if (strlen($_POST['password']) < 6) {
					$error_msg[] = '密码长度不少于6位.';
				}
				if ($_POST['password'] != $_POST['repassword']) {
					$error_msg[] = '两次输入的密码不一样.';
				}
			}
			if (empty($_POST['terms'])) {
				$error_msg[] = '请同意协议.';
			}
			if (empty($error_msg)) {
				$result = $this->adminModel->add($data);
				if ($result) {
					session('admin_id',$result);
					session('Module',encrypt(MODULE_NAME));
					$where['admin_id'] = $result;
					$this->adminModel->where($where)->setField('last_login_time',NOW_TIME);
					$this->adminModel->where($where)->setField('last_login_ip',get_client_ip());
					$this->adminModel->where($where)->setInc('login_num');
					$this->success('注册成功,正在跳转',U('Index/index'));
					die;
				}else {
					$this->error('注册失败');
					die;
				}
			}else {
				$this->assign('error_msg',$error_msg);
				$this->assign('info',$_POST);
			}
		}
		$this->display();
	}
	//找回密码
	public function forgot(){
		if (IS_POST) {
			;
		}elseif (IS_GET){
			$this->display();
		}
	}
	//检查邮箱
	public function checkEmail(){
		if (IS_AJAX) {
			$where['admin_email'] = trimall($_POST['email']);
			$count = $this->adminModel->where($where)->count();
			if ($count) {
				echo 'false';
			}else {
				echo 'true';
			}
		}
	}
}