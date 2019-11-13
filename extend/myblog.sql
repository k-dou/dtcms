CREATE TABLE IF NOT EXISTS `article`(
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `desc` varchar(250) NOT NULL DEFAULT '',
  `type` tinyint(3) unsigned NOT NULL,
  `img` varchar(150) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `is_md` tinyint(2) NOT NULL DEFAULT '1' COMMENT 'content是否是md文件。1：是。2：html。',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `c_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `index_title` (`title`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `article_tag`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `article_id` int(11) DEFAULT NULL COMMENT '文章表id',
  `tag_id` int(11) DEFAULT NULL COMMENT '标签表id',
  PRIMARY KEY (`id`)
)  ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='文章标签对应表';

CREATE TABLE IF NOT EXISTS `background` (
  `id` int(1) unsigned NOT NULL DEFAULT '1',
  `head_back_img` varchar(255) NOT NULL,
  `main_back_img` varchar(255) NOT NULL,
  `is_head` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `is_main` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `c_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `category` (
   `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) unsigned NOT NULL DEFAULT '0',
  `title` varchar(20) NOT NULL,
  `sort` int(5) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `c_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `config` (
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `domain` varchar(255) DEFAULT NULL COMMENT '域名',
  `author` varchar(255) DEFAULT NULL COMMENT '作者',
  `record` varchar(255) DEFAULT NULL COMMENT '备案号',
  `keyword` varchar(255) DEFAULT NULL COMMENT '关键字',
  `desc` text COMMENT '描述',
  `tp_name` varchar(255) DEFAULT NULL COMMENT '模板名称',
  `tp_color` varchar(255) DEFAULT NULL COMMENT '模板主色',
  `tp_fy` int(255) unsigned zerofill DEFAULT NULL COMMENT '模板分页数量',
  `tp_list` varchar(255) DEFAULT NULL COMMENT '列表模板',
  `tp_details` varchar(255) DEFAULT NULL COMMENT '详情模板',
  `tp_pop` int(20) unsigned zerofill DEFAULT NULL COMMENT '模板热门文章数量',
  `tp_rec` int(20) unsigned zerofill DEFAULT NULL COMMENT '模板推荐文章数量',
  `tp_top` int(20) unsigned zerofill DEFAULT NULL COMMENT '模板置顶数量',
  `tp_logo` varchar(255) DEFAULT NULL COMMENT '模板logo',
  `cs_name` varchar(255) DEFAULT NULL COMMENT '客服人员名称',
  `cs_tel` varchar(255) DEFAULT NULL COMMENT '客服人员电话',
  `cs_email` varchar(255) DEFAULT NULL COMMENT '客服人员邮箱',
  `cs_zip_code` varchar(255) DEFAULT NULL COMMENT '客服人员',
  `cs_moblie` int(11) DEFAULT NULL COMMENT '客服手机号',
  `cs_qq` int(15) DEFAULT NULL COMMENT '客服QQ号',
  `cs_address` varchar(255) DEFAULT NULL COMMENT '客服地址',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `config_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(255) DEFAULT NULL COMMENT '标签名称',
  `sort` int(11) unsigned DEFAULT NULL COMMENT '排序',
  `set_time` int(20) NOT NULL COMMENT '设置时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='标签表';
