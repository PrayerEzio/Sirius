# Host: 127.0.0.1  (Version: 5.6.17)
# Date: 2015-11-02 20:25:06
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "sirius_admin"
#

DROP TABLE IF EXISTS `sirius_admin`;
CREATE TABLE `sirius_admin` (
  `admin_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) DEFAULT NULL COMMENT '姓名',
  `admin_email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `password` varchar(255) DEFAULT NULL COMMENT '密码',
  `register_time` int(11) unsigned DEFAULT '0' COMMENT '注册时间',
  `last_login_time` int(11) unsigned DEFAULT '0' COMMENT '最后登录时间',
  `last_login_ip` varchar(16) DEFAULT NULL COMMENT '登录ip',
  `login_num` int(11) unsigned DEFAULT '0' COMMENT '登录次数',
  `admin_auth` text COMMENT '权限信息',
  `admin_status` varchar(255) DEFAULT NULL COMMENT '状态',
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理员表';

#
# Data for table "sirius_admin"
#

/*!40000 ALTER TABLE `sirius_admin` DISABLE KEYS */;
INSERT INTO `sirius_admin` VALUES (16,'Prayer','283386295@qq.com','b120acee576221618a8a2c73c6416db37b958422fde02df8a21e091afb59104b',1446453741,1446465837,'127.0.0.1',5,NULL,'1'),(20,'Ezio','513912489@qq.com','b120acee576221618a8a2c73c6416db37b958422fde02df8a21e091afb59104b',1446461060,1446462388,'127.0.0.1',2,NULL,'1');
/*!40000 ALTER TABLE `sirius_admin` ENABLE KEYS */;

#
# Structure for table "sirius_admin_auth"
#

DROP TABLE IF EXISTS `sirius_admin_auth`;
CREATE TABLE `sirius_admin_auth` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '索引ID',
  `a_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '权限名称',
  `a_title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '权限标题',
  `a_sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `a_show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-显示0-隐藏',
  `a_default` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1-默认授权',
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC COMMENT='管理员权限列表';

#
# Data for table "sirius_admin_auth"
#

/*!40000 ALTER TABLE `sirius_admin_auth` DISABLE KEYS */;
/*!40000 ALTER TABLE `sirius_admin_auth` ENABLE KEYS */;
