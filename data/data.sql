DROP DATABASE IF EXISTS `fjjt`;
CREATE DATABASE IF NOT EXISTS `fjjt` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `yjxt`;

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `userid` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `auth_key` varchar(32) NOT NULL COMMENT 'cookie验证auth_key',
  `password_hash` varchar(255) NOT NULL COMMENT '加密后密码',
  `password_reset_token` varchar(255) DEFAULT NULL COMMENT '找回密码token',
  `email` varchar(255)  COMMENT '用户邮箱',
  `avatar` varchar(255)  COMMENT '用户头像url',
  `phone` varchar(255) DEFAULT '0',
  `is_show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否可见 默认是1 显示，0 ： 不显示',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL COMMENT '最后修改时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='用户表';


CREATE TABLE IF NOT EXISTS `admin` (
  `userid` int(11) unsigned NOT NULL COMMENT '用户id',
  `role` tinyint(1) NOT NULL DEFAULT '0' COMMENT '角色 1：普通管理员，2：高级管理员',
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='管理员表';

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255)  NOT NULL,
  `sort` int(11) unsigned NOT NULL DEFAULT '0',
  `created_at` int(11) unsigned,
  `updated_at` int(11) unsigned,
  PRIMARY KEY (`id`),
  KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='文章类别';

CREATE TABLE `article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章自增id',
  `pid` int(11) unsigned NOT NULL COMMENT '文章分类id',
  `type` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '类型.0文章,1单页',
  `title` varchar(255)  NOT NULL COMMENT '文章标题',
  `sub_title` varchar(255)  NOT NULL DEFAULT '' COMMENT '用户名',
  `summary` varchar(255)  NOT NULL DEFAULT '' COMMENT '文章概要',
  `thumb` varchar(255)  NOT NULL DEFAULT '' COMMENT '缩略图',
  `seo_title` varchar(255)  NOT NULL DEFAULT '' COMMENT 'seo标题',
  `seo_keywords` varchar(255)  NOT NULL DEFAULT '' COMMENT 'seo关键字',
  `seo_description` varchar(255)  NOT NULL DEFAULT '' COMMENT 'seo描述',
  `status` smallint(6) unsigned NOT NULL DEFAULT '1' COMMENT '状态.0草稿,1发布',
  `sort` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `author_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '发布文章管理员id',
  `author_name` varchar(255)  NOT NULL DEFAULT '' COMMENT '发布文章管理员用户名',
  `scan_count` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '浏览次数',
  `comment_count` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '评论次数',
  `can_comment` smallint(6) unsigned NOT NULL DEFAULT '1' COMMENT '是否可评论.0否,1是',
  `visibility` smallint(6) unsigned NOT NULL DEFAULT '1' COMMENT '文章可见性.1.公开,2.评论可见,3.加密文章,4.登录可见',
  `password` varchar(255)  NOT NULL DEFAULT '' COMMENT '文章明文密码',
  `flag_headline` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '头条.0否,1.是',
  `flag_recommend` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '推荐.0否,1.是',
  `flag_slide_show` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '幻灯.0否,1.是',
  `flag_special_recommend` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '特别推荐.0否,1.是',
  `flag_roll` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '滚动.0否,1.是',
  `flag_bold` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '加粗.0否,1.是',
  `flag_picture` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '图片.0否,1.是',
  `template`   LONGTEXT  COMMENT '文章模板',
  `created_at` int(11) unsigned NOT NULL COMMENT '创建时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最后修改时间',
  PRIMARY KEY (`id`),
  KEY `index_title` (`title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `friendly_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `name` varchar(255) NOT NULL COMMENT '网站名称',
  `image` varchar(255) NOT NULL DEFAULT '' COMMENT '图片url',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `target` varchar(255) NOT NULL DEFAULT '_blank' COMMENT '打开方式._blank新窗口,_self本窗口',
  `sort` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '状态.0禁用,1启用',
  `created_at` int(11) unsigned NOT NULL COMMENT '创建时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最后修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;