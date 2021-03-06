<?php
/**
 * 公共配置文件
 * @copyright  Copyright (c) 2014-2015 muxiangdao-cn Inc.(http://www.muxiangdao.cn)
 * @license    http://www.muxiangdao.cn
 * @link       http://www.muxiangdao.cn
 * @author     muxiangdao-cn Team Prayer (283386295@qq.com)
 */
return array(

    /* 数据库配置 */
    'DB_TYPE'   => 'mysql',             // 数据库类型
    'DB_HOST'   => '127.0.0.1',         // 数据库服务器地址
    'DB_NAME'   => 'sirius_db',            // 数据库名
    'DB_USER'   => 'root',              // 登录用户名
    'DB_PWD'    => 'root',              // 登录密码
    'DB_PORT'   => '3306',              // 端口
    'DB_PREFIX' => 'sirius_',              // 数据库表前缀	
	/* 数据库备份*/
	'DB_BACKUP'	=>'./Backup/',
	 
	/*基础配置*/
	'WKY_KEY' => 'Sirius',                    //安全密钥  
	'SiteUrl' => 'http://127.0.0.1/Sirius', //站点域名 末尾不加斜杠
	 
    /* URL配置 */
    'URL_CASE_INSENSITIVE' => false,    //默认false 表示URL区分大小写 true则表示不区分大小写
	'URL_PARAMS_BIND'      => false,    // URL变量绑定到操作方法作为参数 关闭
    'URL_MODEL'            => 2,        //URL模式 重写模式	
	
	/* 模块配置 */
	'MODULE_ALLOW_LIST'    =>    array('Home','Admin'),  //模块列表
	'DEFAULT_MODULE'       =>    'Home',                            //默认模块
	
);