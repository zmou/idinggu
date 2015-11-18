--
-- 数据表结构: `twotree_access`
--

DROP TABLE IF EXISTS `twotree_access`;
create table `twotree_access` (
`node_id` smallint(6) unsigned not null    ,
`level` tinyint(1) not null    ,
`module` varchar(50) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_admin_action_log`
--

DROP TABLE IF EXISTS `twotree_admin_action_log`;
create table `twotree_admin_action_log` (
`id` int(10) unsigned not null  primary key auto_increment ,
`user_id` int(11) not null    ,
`username` varchar(20) null    ,
`action_url` text null    ,
`descript` text null    ,
`posttime` int(11) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_building`
--

DROP TABLE IF EXISTS `twotree_building`;
create table `twotree_building` (
`id` int(11) not null  primary key auto_increment ,
`sch_id` int(11) null    ,
`sch_name` varchar(20) null    ,
`name` varchar(20) null    ,
`status` tinyint(1) null default 0   ,
`posttime` int(11) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_cms_article`
--

DROP TABLE IF EXISTS `twotree_cms_article`;
create table `twotree_cms_article` (
`id` mediumint(9) not null  primary key auto_increment ,
`title` varchar(200) null    ,
`fid` mediumint(9) null    ,
`fname` varchar(20) null    ,
`mid` tinyint(4) null default 0   ,
`uid` mediumint(9) null    ,
`uname` varchar(50) null    ,
`author` varchar(50) null    ,
`istop` tinyint(4) null default 0   ,
`istui` tinyint(4) null default 0   ,
`iswx` tinyint(4) null default 0   ,
`descrip` varchar(500) null    ,
`content` text null    ,
`picurl` text null    ,
`spic` varchar(100) null    ,
`mvurl` text null    ,
`hits` int(11) null default 1   ,
`joincount` int(11) null default 0   ,
`lists` int(11) null default 1   ,
`posttime` int(11) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_cms_config`
--

DROP TABLE IF EXISTS `twotree_cms_config`;
create table `twotree_cms_config` (
`id` mediumint(9) not null  primary key auto_increment ,
`web_name` varchar(50) null    ,
`web_key` varchar(300) null    ,
`web_descrip` varchar(300) null    ,
`web_url` text null    ,
`web_beian` varchar(30) null    ,
`web_status` tinyint(4) null default 1   ,
`phone` varchar(20) null    ,
`fax` varchar(20) null    ,
`email` varchar(50) null    ,
`sw_qq` varchar(13) null    ,
`copyright` varchar(50) null    ,
`hd_prise` decimal(10,2) null    ,
`hd_join_url` varchar(100) null    ,
`hd_bg` text null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_cms_formmod`
--

DROP TABLE IF EXISTS `twotree_cms_formmod`;
create table `twotree_cms_formmod` (
`id` mediumint(9) not null  primary key auto_increment ,
`name` varchar(20) null    ,
`title` varchar(20) null    ,
`config` text null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_cms_friendlink`
--

DROP TABLE IF EXISTS `twotree_cms_friendlink`;
create table `twotree_cms_friendlink` (
`id` int(11) not null  primary key auto_increment ,
`linkname` varchar(50) null    ,
`linkurl` varchar(500) null    ,
`linklogo` varchar(200) null    ,
`linklist` smallint(6) null    ,
`linktype` tinyint(4) null default 0   
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_cms_reply`
--

DROP TABLE IF EXISTS `twotree_cms_reply`;
create table `twotree_cms_reply` (
`id` mediumint(9) not null  primary key auto_increment ,
`aid` mediumint(9) null    ,
`uid` mediumint(9) null    ,
`uname` varchar(30) null    ,
`state` tinyint(4) null default 0   ,
`type` tinyint(4) null default 0   ,
`reply` varchar(500) null    ,
`time` int(11) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_cms_sort`
--

DROP TABLE IF EXISTS `twotree_cms_sort`;
create table `twotree_cms_sort` (
`id` mediumint(9) not null  primary key auto_increment ,
`fup` mediumint(9) null default 0   ,
`name` varchar(50) null    ,
`class` tinyint(4) null default 1   ,
`sons` smallint(6) null default 0   ,
`list` smallint(6) null default 0   ,
`type` tinyint(4) null default 0   ,
`isform` tinyint(4) null default 0   ,
`form` varchar(20) null default 8   ,
`template` varchar(50) null    ,
`list_html` varchar(100) null    ,
`bencandy_html` varchar(100) null    ,
`descrip` text null    ,
`url` varchar(200) null    ,
`spic` varchar(100) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_coupon`
--

DROP TABLE IF EXISTS `twotree_coupon`;
create table `twotree_coupon` (
`id` int(11) not null  primary key auto_increment ,
`user_id` int(10) unsigned null    ,
`amount` decimal(10,2) null    ,
`status` tinyint(4) null default 1   ,
`name` varchar(30) null    ,
`type` tinyint(4) null default 1   ,
`order_id` int(11) null default 0   ,
`cost_time` int(11) null default 0   ,
`over_time` int(11) null default 0   ,
`posttime` int(11) null default 0   
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_distributor_config`
--

DROP TABLE IF EXISTS `twotree_distributor_config`;
create table `twotree_distributor_config` (
`id` int(11) not null  primary key  ,
`first_percent` decimal(10,2) unsigned null default 0.00   ,
`second_percent` decimal(10,2) unsigned null default 0.00   ,
`leader_percent` decimal(10,2) unsigned null default 0.00   ,
`leader_switch` tinyint(1) null default 1   ,
`distributor_price` decimal(10,2) null    ,
`send_coupon` tinyint(1) null default 1   ,
`newer_coupon` decimal(10,2) null default 0.00   
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_email_config`
--

DROP TABLE IF EXISTS `twotree_email_config`;
create table `twotree_email_config` (
`id` int(11) unsigned not null  primary key auto_increment ,
`host` varchar(20) null    ,
`port` int(11) null default 25   ,
`user` varchar(30) null    ,
`pwd` varchar(30) null    ,
`nickname` varchar(20) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_express`
--

DROP TABLE IF EXISTS `twotree_express`;
create table `twotree_express` (
`id` int(10) unsigned not null  primary key auto_increment ,
`name` varchar(20) null    ,
`price` decimal(10,2) null    ,
`descript` varchar(50) null    ,
`status` tinyint(1) null default 1   
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_feedback`
--

DROP TABLE IF EXISTS `twotree_feedback`;
create table `twotree_feedback` (
`id` tinyint(3) unsigned not null  primary key auto_increment ,
`uid` int(11) null    ,
`type` tinyint(1) null default 4   ,
`content` text null    ,
`mobile` char(15) null    ,
`email` varchar(50) null    ,
`posttime` int(11) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_goods`
--

DROP TABLE IF EXISTS `twotree_goods`;
create table `twotree_goods` (
`id` int(11) not null  primary key auto_increment ,
`goods_code` varchar(50) null    ,
`bid` int(11) null    ,
`cid` text null    ,
`name` varchar(50) null    ,
`spic` varchar(100) null    ,
`spic2` varchar(100) not null    ,
`spic3` varchar(100) not null    ,
`list` smallint(6) null default 0   ,
`price` decimal(10,2) unsigned null    ,
`market_price` decimal(10,2) unsigned null    ,
`unit` varchar(5) null    ,
`is_sale` tinyint(1) null default 1   ,
`content` text null    ,
`param_base` text null    ,
`param_tech` text null    ,
`standard` text null    ,
`pack` text null    ,
`after_sale` text null    ,
`is_tui` tinyint(1) null default 0   ,
`is_hot` tinyint(1) null default 0   ,
`is_active` tinyint(1) null default 0   ,
`store_num` int(10) unsigned null    ,
`base_num` int(10) not null default 100   ,
`sale_num` int(11) unsigned null default 0   ,
`comment_num` int(11) unsigned null default 0   ,
`life_time` varchar(20) null    ,
`color` text null    ,
`size` text null    ,
`return_jifen` int(10) unsigned null default 0   ,
`yongjin` int(10) unsigned null default 0   ,
`hits` int(10) unsigned null default 0   ,
`power` text null    ,
`posttime` int(11) null    ,
`trade_price` decimal(10,2) not null    ,
`collect_num` int(11) not null default 0   
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_goods_brand`
--

DROP TABLE IF EXISTS `twotree_goods_brand`;
create table `twotree_goods_brand` (
`id` int(11) not null  primary key auto_increment ,
`cid` text not null    ,
`name` varchar(50) null    ,
`spic` varchar(100) null    ,
`list` smallint(6) null default 0   ,
`descrip` text null    ,
`posttime` int(11) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_goods_category`
--

DROP TABLE IF EXISTS `twotree_goods_category`;
create table `twotree_goods_category` (
`id` int(11) not null  primary key auto_increment ,
`fup` int(11) null default 0   ,
`spic` varchar(100) null    ,
`name` varchar(50) null    ,
`list` smallint(6) null default 0   ,
`is_show` tinyint(1) null default 1   ,
`type` tinyint(4) null default 0   ,
`descrip` text null    ,
`posttime` int(11) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_goods_collect`
--

DROP TABLE IF EXISTS `twotree_goods_collect`;
create table `twotree_goods_collect` (
`id` int(10) unsigned not null  primary key auto_increment ,
`uid` int(10) unsigned null    ,
`goods_id` int(10) unsigned null    ,
`name` varchar(50) null    ,
`spic` text null    ,
`posttime` int(11) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_goods_comment`
--

DROP TABLE IF EXISTS `twotree_goods_comment`;
create table `twotree_goods_comment` (
`id` int(10) unsigned not null  primary key auto_increment ,
`goods_id` int(10) not null    ,
`goods_name` varchar(255) null    ,
`goods_spic` text null    ,
`content` char(32) not null    ,
`type` tinyint(1) unsigned not null    ,
`user_id` int(50) null    ,
`headimg` text null    ,
`nickname` varchar(30) null    ,
`star` tinyint(1) unsigned null default 5   ,
`posttime` varchar(30) not null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_goods_recommend`
--

DROP TABLE IF EXISTS `twotree_goods_recommend`;
create table `twotree_goods_recommend` (
`id` int(10) unsigned not null  primary key auto_increment ,
`user_id` int(11) null    ,
`goods_id` int(11) null    ,
`posttime` int(11) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_goods_store`
--

DROP TABLE IF EXISTS `twotree_goods_store`;
create table `twotree_goods_store` (
`id` int(11) unsigned not null  primary key auto_increment ,
`storage_id` int(11) null    ,
`storage` varchar(30) null    ,
`goods_id` int(11) null    ,
`goods_code` varchar(50) null    ,
`goods_name` varchar(30) null    ,
`province_id` int(11) null    ,
`province` varchar(20) null    ,
`city_id` int(11) null    ,
`city` varchar(20) null    ,
`district_id` int(11) null    ,
`district` varchar(30) null    ,
`store_nums` int(11) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_hot_city`
--

DROP TABLE IF EXISTS `twotree_hot_city`;
create table `twotree_hot_city` (
`id` int(11) not null  primary key auto_increment ,
`region_id` int(11) null    ,
`name` varchar(20) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_invite_code`
--

DROP TABLE IF EXISTS `twotree_invite_code`;
create table `twotree_invite_code` (
`id` int(11) unsigned not null  primary key auto_increment ,
`user_id` int(11) not null    ,
`key` varchar(10) null    ,
`status` tinyint(1) null default 1   ,
`posttime` int(11) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_jifen_config`
--

DROP TABLE IF EXISTS `twotree_jifen_config`;
create table `twotree_jifen_config` (
`id` int(10) unsigned not null  primary key auto_increment ,
`reg` int(10) unsigned null default 0   ,
`reg_tui` int(10) unsigned null default 0   ,
`login` int(10) unsigned null default 0   ,
`share` int(10) unsigned null default 0   ,
`sign` int(10) unsigned null default 0   ,
`friend` int(11) not null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_jifen_goods`
--

DROP TABLE IF EXISTS `twotree_jifen_goods`;
create table `twotree_jifen_goods` (
`id` int(11) not null  primary key auto_increment ,
`goods_code` varchar(50) null    ,
`bid` int(11) null    ,
`cid` text null    ,
`name` varchar(50) null    ,
`spic` varchar(100) null    ,
`list` smallint(6) null default 0   ,
`price` decimal(10,2) unsigned null    ,
`market_price` decimal(10,2) unsigned null    ,
`unit` varchar(5) null    ,
`is_sale` tinyint(1) null default 1   ,
`standard` varchar(20) null    ,
`descrip` text null    ,
`content` text null    ,
`is_tui` tinyint(1) null default 0   ,
`is_hot` tinyint(1) null default 0   ,
`is_active` tinyint(1) null default 0   ,
`store_num` int(10) unsigned null    ,
`sale_num` int(11) unsigned null default 0   ,
`comment_num` int(11) unsigned null default 0   ,
`life_time` varchar(20) null    ,
`posttime` int(11) null    ,
`color` text null    ,
`size` text null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_jifen_order`
--

DROP TABLE IF EXISTS `twotree_jifen_order`;
create table `twotree_jifen_order` (
`id` mediumint(8) unsigned not null  primary key auto_increment ,
`user_id` mediumint(8) unsigned null default 0   ,
`order_sn` varchar(20) null    ,
`order_status` tinyint(1) unsigned null default 1   ,
`pay_status` tinyint(1) unsigned null default 0   ,
`consignee` varchar(60) null    ,
`province` varchar(50) null default 0   ,
`city` varchar(50) null default 0   ,
`district` varchar(50) null default 0   ,
`address` varchar(255) null    ,
`zipcode` varchar(10) null    ,
`tel` varchar(20) null    ,
`mobile` varchar(20) null    ,
`email` varchar(60) null    ,
`total_fee` decimal(10,2) null default 0.00   ,
`discount` tinyint(4) null default 0   ,
`total_price` decimal(10,2) null default 0.00   ,
`return_score` int(11) null default 0   ,
`is_valid` tinyint(1) null default 1   ,
`order_time` int(11) null default 0   ,
`pay_money` int(10) unsigned null default 0   ,
`pay_time` int(10) unsigned null default 0   ,
`shipping_time` int(10) unsigned null default 0   ,
`pay_way` tinyint(1) null default 2   ,
`is_confirm` tinyint(1) null default 0   ,
`is_del` tinyint(1) unsigned null default 0   ,
`refund_fee` decimal(10,2) null default 0.00   ,
`refund_time` int(11) null default 0   ,
`out_trade_no` varchar(30) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_jifen_order_goods`
--

DROP TABLE IF EXISTS `twotree_jifen_order_goods`;
create table `twotree_jifen_order_goods` (
`id` mediumint(8) unsigned not null  primary key auto_increment ,
`order_id` mediumint(8) unsigned null default 0   ,
`goods_id` mediumint(8) unsigned null default 0   ,
`goods_name` varchar(120) null    ,
`goods_nums` smallint(5) unsigned null default 1   ,
`goods_price` decimal(10,2) null    ,
`goods_spic` varchar(200) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_jifen_water`
--

DROP TABLE IF EXISTS `twotree_jifen_water`;
create table `twotree_jifen_water` (
`id` int(10) unsigned not null  primary key auto_increment ,
`user_id` int(10) unsigned null    ,
`type` tinyint(1) unsigned null default 1   ,
`amount` int(10) unsigned null    ,
`way` varchar(20) null    ,
`way_name` text null    ,
`posttime` int(10) unsigned null    ,
`order_id` int(10) unsigned null default 0   
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_message_config`
--

DROP TABLE IF EXISTS `twotree_message_config`;
create table `twotree_message_config` (
`id` int(10) unsigned not null  primary key auto_increment ,
`host` varchar(80) null    ,
`user` varchar(20) null    ,
`pwd` varchar(30) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_message_tpl`
--

DROP TABLE IF EXISTS `twotree_message_tpl`;
create table `twotree_message_tpl` (
`id` int(10) unsigned not null  primary key auto_increment ,
`title` varchar(20) null    ,
`descript` varchar(50) null    ,
`content` varchar(100) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_money_water`
--

DROP TABLE IF EXISTS `twotree_money_water`;
create table `twotree_money_water` (
`id` int(10) unsigned not null  primary key auto_increment ,
`user_id` int(10) unsigned null    ,
`type` tinyint(1) unsigned null default 1   ,
`amount` int(10) unsigned null    ,
`way` tinyint(4) null    ,
`way_name` text null    ,
`order_id` int(11) null    ,
`posttime` int(10) unsigned null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_navlink`
--

DROP TABLE IF EXISTS `twotree_navlink`;
create table `twotree_navlink` (
`id` int(9) not null  primary key auto_increment ,
`fup` int(11) null    ,
`cid` int(11) null    ,
`title` varchar(20) null    ,
`url` varchar(200) null    ,
`list` int(10) unsigned null default 0   
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_network`
--

DROP TABLE IF EXISTS `twotree_network`;
create table `twotree_network` (
`id` int(11) not null  primary key  ,
`name` varchar(20) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_news`
--

DROP TABLE IF EXISTS `twotree_news`;
create table `twotree_news` (
`id` mediumint(9) not null  primary key auto_increment ,
`title` varchar(100) null    ,
`auth` varchar(20) null    ,
`content` text null    ,
`stime` int(11) null    ,
`ntype` tinyint(4) null default 1   
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_node`
--

DROP TABLE IF EXISTS `twotree_node`;
create table `twotree_node` (
`id` smallint(6) unsigned not null  primary key auto_increment ,
`name` varchar(20) not null    ,
`title` varchar(50) null    ,
`status` tinyint(1) null default 0   ,
`remark` varchar(255) null    ,
`sort` smallint(6) unsigned null    ,
`pid` smallint(6) unsigned not null    ,
`level` tinyint(1) unsigned not null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_order_friend_pay`
--

DROP TABLE IF EXISTS `twotree_order_friend_pay`;
create table `twotree_order_friend_pay` (
`id` int(10) not null  primary key auto_increment ,
`order_id` int(10) not null    ,
`order_sn` varchar(50) not null    ,
`openid` varchar(100) not null    ,
`nickname` varchar(50) not null    ,
`headimgurl` varchar(200) not null    ,
`pay_money` float not null    ,
`message` varchar(200) not null    ,
`pay_status` tinyint(2) not null default 0   ,
`trade_no` varchar(50) not null    ,
`out_trade_no` varchar(50) not null    ,
`pay_time` int(10) not null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_order_goods`
--

DROP TABLE IF EXISTS `twotree_order_goods`;
create table `twotree_order_goods` (
`id` mediumint(8) unsigned not null  primary key auto_increment ,
`order_id` mediumint(8) unsigned null default 0   ,
`goods_id` mediumint(8) unsigned null default 0   ,
`goods_name` varchar(120) null    ,
`goods_nums` smallint(5) unsigned null default 1   ,
`goods_price` decimal(10,2) null    ,
`goods_spic` varchar(200) null    ,
`jifen` int(11) null    ,
`color` varchar(20) null    ,
`power` varchar(20) null    ,
`status` tinyint(1) unsigned null default 0   
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_order_info`
--

DROP TABLE IF EXISTS `twotree_order_info`;
create table `twotree_order_info` (
`id` int(10) unsigned not null  primary key auto_increment ,
`user_id` int(10) unsigned null default 0   ,
`role_id` tinyint(2) not null default 1   ,
`order_sn` varchar(20) null    ,
`order_style` tinyint(1) null default 1   ,
`shop_id` int(10) null default 0   ,
`order_status` tinyint(1) unsigned null default 1   ,
`pay_status` tinyint(1) unsigned null default 0   ,
`consignee` varchar(60) null    ,
`province` varchar(50) null default 0   ,
`city` varchar(50) null default 0   ,
`district` varchar(50) null default 0   ,
`school` varchar(50) null    ,
`build` varchar(30) null    ,
`address` varchar(255) null    ,
`province_id` int(11) null    ,
`city_id` int(11) null    ,
`district_id` int(11) null    ,
`school_id` int(11) null    ,
`build_id` int(11) null    ,
`zipcode` varchar(10) null    ,
`tel` varchar(20) null    ,
`mobile` varchar(20) null    ,
`email` varchar(60) null    ,
`total_fee` decimal(10,2) null default 0.00   ,
`discount` tinyint(4) null default 0   ,
`total_price` decimal(10,2) null default 0.00   ,
`return_jifen` int(11) null default 0   ,
`order_time` int(11) null default 0   ,
`pay_money` int(10) unsigned null default 0   ,
`pay_time` int(10) unsigned null default 0   ,
`shipping_time` int(10) unsigned null default 0   ,
`pay_way` tinyint(1) null default 1   ,
`refund_fee` decimal(10,2) null default 0.00   ,
`refund_time` int(11) null default 0   ,
`trade_no` varchar(50) null default 0   ,
`out_trade_no` varchar(30) null    ,
`express_name` varchar(255) null    ,
`express_no` varchar(50) null    ,
`express_fee` decimal(10,2) unsigned null default 0.00   ,
`remark` text null    ,
`order_ymd` int(11) not null    ,
`order_thumb` varchar(200) not null    ,
`order_message` text null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_order_photo`
--

DROP TABLE IF EXISTS `twotree_order_photo`;
create table `twotree_order_photo` (
`id` int(11) not null  primary key auto_increment ,
`order_id` int(10) not null    ,
`order_sn` varchar(100) not null    ,
`image` varchar(200) not null    ,
`create_time` int(11) not null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_order_refund`
--

DROP TABLE IF EXISTS `twotree_order_refund`;
create table `twotree_order_refund` (
`id` int(10) unsigned not null  primary key auto_increment ,
`order_id` int(11) null    ,
`user_id` int(11) null    ,
`reason` text null    ,
`refund_type` tinyint(4) null    ,
`pay_way` tinyint(1) null    ,
`status` tinyint(4) null default 0   ,
`refund_time` int(11) null    ,
`refund_fee` decimal(10,0) null    ,
`admin_id` int(11) null    ,
`admin_user` varchar(30) null    ,
`remark` text null    ,
`posttime` int(11) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_picture`
--

DROP TABLE IF EXISTS `twotree_picture`;
create table `twotree_picture` (
`id` int(10) unsigned not null  primary key auto_increment ,
`user_id` varchar(50) null    ,
`picurl` text null    ,
`title` varchar(30) null    ,
`descrip` varchar(200) null    ,
`posttime` int(10) unsigned not null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_recharge`
--

DROP TABLE IF EXISTS `twotree_recharge`;
create table `twotree_recharge` (
`id` int(10) unsigned not null  primary key auto_increment ,
`user_id` int(10) unsigned null    ,
`money` decimal(10,2) unsigned null    ,
`pay_way` tinyint(1) null default 1   ,
`out_trade_no` text null    ,
`trade_no` text null    ,
`pay_status` tinyint(3) unsigned null default 0   ,
`pay_time` int(11) null    ,
`lock` tinyint(3) unsigned null default 0   ,
`posttime` int(10) unsigned null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_recharge_config`
--

DROP TABLE IF EXISTS `twotree_recharge_config`;
create table `twotree_recharge_config` (
`id` int(10) unsigned not null  primary key auto_increment ,
`money` decimal(10,2) unsigned null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_region`
--

DROP TABLE IF EXISTS `twotree_region`;
create table `twotree_region` (
`id` smallint(5) unsigned not null  primary key auto_increment ,
`parent_id` smallint(5) unsigned not null default 0   ,
`region_name` varchar(120) not null    ,
`region_type` tinyint(1) not null default 2   ,
`agency_id` smallint(5) unsigned not null default 0   ,
`first_spell` char(2) null    ,
`spell` text null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_resale_config`
--

DROP TABLE IF EXISTS `twotree_resale_config`;
create table `twotree_resale_config` (
`id` int(10) unsigned not null  primary key auto_increment ,
`parent_1` tinyint(3) unsigned null    ,
`parent_2` tinyint(3) unsigned null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_role`
--

DROP TABLE IF EXISTS `twotree_role`;
create table `twotree_role` (
`id` smallint(6) unsigned not null  primary key auto_increment ,
`name` varchar(20) not null    ,
`pid` smallint(6) null    ,
`status` tinyint(1) unsigned null    ,
`remark` varchar(255) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_role_user`
--

DROP TABLE IF EXISTS `twotree_role_user`;
create table `twotree_role_user` (
`role_id` mediumint(9) unsigned null    ,
`user_id` char(32) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_school`
--

DROP TABLE IF EXISTS `twotree_school`;
create table `twotree_school` (
`id` int(11) not null  primary key auto_increment ,
`name` varchar(30) null    ,
`prov_id` int(11) null    ,
`city_id` int(11) null    ,
`county_id` int(11) null    ,
`prov` varchar(20) null    ,
`city` varchar(20) null    ,
`county` varchar(20) null    ,
`posttime` int(11) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_score_log`
--

DROP TABLE IF EXISTS `twotree_score_log`;
create table `twotree_score_log` (
`id` int(11) not null  primary key auto_increment ,
`user_id` int(11) null    ,
`order_id` int(10) unsigned null default 0   ,
`buyer_id` int(1) null default 0   ,
`score` int(11) null default 0   ,
`percent` tinyint(4) null default 0   ,
`descrip` varchar(80) null    ,
`posttime` int(11) null default 0   
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_score_water`
--

DROP TABLE IF EXISTS `twotree_score_water`;
create table `twotree_score_water` (
`id` int(10) unsigned not null  primary key auto_increment ,
`type` tinyint(4) null default 1   ,
`user_id` int(11) null    ,
`order_id` int(11) null    ,
`trade_id` int(11) null    ,
`score` int(11) null    ,
`posttime` int(11) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_service`
--

DROP TABLE IF EXISTS `twotree_service`;
create table `twotree_service` (
`id` int(10) unsigned not null  primary key auto_increment ,
`username` varchar(20) null    ,
`password` varchar(32) null    ,
`name` varchar(20) null    ,
`mobile` varchar(11) null    ,
`email` varchar(30) null    ,
`login_time` int(11) null    ,
`login_ip` varchar(50) null    ,
`area_list` text null    ,
`lock` tinyint(4) null default 0   ,
`posttime` int(11) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_shop`
--

DROP TABLE IF EXISTS `twotree_shop`;
create table `twotree_shop` (
`id` int(10) unsigned not null  primary key auto_increment ,
`parent_id` int(11) null    ,
`uid` int(11) null    ,
`prov_id` int(11) null    ,
`city_id` int(11) null    ,
`county_id` int(11) null    ,
`sch_id` int(11) null    ,
`build_id` int(11) null    ,
`shop_name` varchar(50) null    ,
`shop_status` tinyint(1) null default 0   ,
`status` tinyint(1) null    ,
`posttime` int(11) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_shop_goods`
--

DROP TABLE IF EXISTS `twotree_shop_goods`;
create table `twotree_shop_goods` (
`id` int(10) null    ,
`goods_id` int(10) not null    ,
`cid` tinyint(3) not null    ,
`shop_id` int(10) not null    ,
`store_num` int(5) not null default 1   ,
`goods_price` float not null    ,
`sale_num` int(10) not null    ,
`is_sale` tinyint(1) not null default 1   ,
`hits` int(10) not null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_shop_level`
--

DROP TABLE IF EXISTS `twotree_shop_level`;
create table `twotree_shop_level` (
`id` int(10) unsigned not null  primary key auto_increment ,
`title` varchar(20) null    ,
`condition` int(11) null    ,
`descript` varchar(80) null    ,
`posttime` int(11) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_shop_theme`
--

DROP TABLE IF EXISTS `twotree_shop_theme`;
create table `twotree_shop_theme` (
`id` int(10) unsigned not null  primary key auto_increment ,
`spic` text null    ,
`title` varchar(20) null    ,
`path` text null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_sign`
--

DROP TABLE IF EXISTS `twotree_sign`;
create table `twotree_sign` (
`id` int(11) not null  primary key auto_increment ,
`uid` int(10) unsigned null    ,
`jifen` int(10) unsigned null    ,
`ymd` int(10) unsigned null    ,
`posttime` int(10) unsigned null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_slide`
--

DROP TABLE IF EXISTS `twotree_slide`;
create table `twotree_slide` (
`id` int(10) unsigned not null  primary key auto_increment ,
`cid` int(11) null default 1   ,
`spic` text null    ,
`title` varchar(30) null    ,
`url` text null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_slide_category`
--

DROP TABLE IF EXISTS `twotree_slide_category`;
create table `twotree_slide_category` (
`id` int(10) unsigned not null  primary key auto_increment ,
`name` varchar(30) null    ,
`descript` varchar(50) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_storage`
--

DROP TABLE IF EXISTS `twotree_storage`;
create table `twotree_storage` (
`id` int(10) unsigned not null  primary key auto_increment ,
`name` varchar(30) null    ,
`province_list` text null    ,
`city_list` text null    ,
`county_list` text null    ,
`area_list` text null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_take_money`
--

DROP TABLE IF EXISTS `twotree_take_money`;
create table `twotree_take_money` (
`id` int(11) not null  primary key auto_increment ,
`user_id` int(11) null default 0   ,
`money` int(11) null default 0   ,
`apply_time` int(11) null default 0   ,
`bank_card` varchar(50) null    ,
`bank_name` varchar(50) null    ,
`handle_time` int(11) null default 0   ,
`status` tinyint(1) null default 0   ,
`remark` text null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_user`
--

DROP TABLE IF EXISTS `twotree_user`;
create table `twotree_user` (
`id` int(10) unsigned not null  primary key auto_increment ,
`username` char(20) not null    ,
`password` char(32) not null    ,
`logintime` int(10) unsigned not null    ,
`loginip` varchar(30) not null    ,
`lock` tinyint(1) not null default 0   ,
`role_id` tinyint(4) null    ,
`service_area` text null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_user_address`
--

DROP TABLE IF EXISTS `twotree_user_address`;
create table `twotree_user_address` (
`id` mediumint(8) unsigned not null  primary key auto_increment ,
`address_name` varchar(50) null    ,
`user_id` mediumint(8) unsigned null default 0   ,
`consignee` varchar(60) null    ,
`email` varchar(60) null    ,
`country` smallint(5) null default 0   ,
`province` varchar(20) null default 0   ,
`city` varchar(20) null default 0   ,
`district` varchar(20) null default 0   ,
`address` varchar(120) null    ,
`province_id` int(11) null    ,
`city_id` int(11) null    ,
`district_id` int(11) null    ,
`zipcode` varchar(20) null    ,
`tel` varchar(20) null    ,
`mobile` varchar(60) null    ,
`sign_building` varchar(120) null    ,
`best_time` varchar(120) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_user_data`
--

DROP TABLE IF EXISTS `twotree_user_data`;
create table `twotree_user_data` (
`id` int(10) not null  primary key  ,
`role_id` smallint(6) null    ,
`username` char(30) null    ,
`truename` char(32) null    ,
`education` tinyint(1) null    ,
`jobtitle` varchar(30) null    ,
`special` varchar(255) null default 0   ,
`job` tinyint(1) null    ,
`schooldate` char(30) null    ,
`phone` char(20) null    ,
`email` varchar(50) null    ,
`address` varchar(50) null    ,
`icon` varchar(50) null    ,
`introduce` text null    ,
`posttime` int(11) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_user_level`
--

DROP TABLE IF EXISTS `twotree_user_level`;
create table `twotree_user_level` (
`id` int(10) unsigned not null  primary key auto_increment ,
`title` varchar(20) null    ,
`condition` int(11) null    ,
`descript` varchar(80) null    ,
`posttime` int(11) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_user_login_log`
--

DROP TABLE IF EXISTS `twotree_user_login_log`;
create table `twotree_user_login_log` (
`id` int(11) not null  primary key  ,
`user_id` int(11) unsigned null    ,
`login_time` int(11) unsigned null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_user_relation`
--

DROP TABLE IF EXISTS `twotree_user_relation`;
create table `twotree_user_relation` (
`id` int(11) unsigned not null  primary key auto_increment ,
`user_id` int(11) unsigned null default 0   ,
`parent_1` int(11) unsigned null default 0   ,
`parent_2` int(11) unsigned null default 0   ,
`parent_3` int(11) null default 0   ,
`parent_4` int(11) null default 0   ,
`parent_5` int(11) null default 0   
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_wechat_config`
--

DROP TABLE IF EXISTS `twotree_wechat_config`;
create table `twotree_wechat_config` (
`id` int(11) not null  primary key auto_increment ,
`pubchatid` varchar(30) null    ,
`pubchatname` varchar(30) null    ,
`pubchatcheck` tinyint(4) null default 0   ,
`token` varchar(30) null    ,
`appid` varchar(30) null    ,
`appsecret` varchar(50) null    ,
`mchid` varchar(20) null    ,
`partnerkey` varchar(50) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_wechat_menu`
--

DROP TABLE IF EXISTS `twotree_wechat_menu`;
create table `twotree_wechat_menu` (
`id` mediumint(9) not null  primary key auto_increment ,
`fup` mediumint(9) null    ,
`type` tinyint(4) null default 0   ,
`title` varchar(20) null    ,
`keys` text null    ,
`word` varchar(30) null    ,
`list` mediumint(9) null default 0   ,
`etype` tinyint(4) null default 0   ,
`econf` text null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_wechat_replyconf`
--

DROP TABLE IF EXISTS `twotree_wechat_replyconf`;
create table `twotree_wechat_replyconf` (
`id` mediumint(9) not null  primary key auto_increment ,
`mid` mediumint(9) null    ,
`menukey` varchar(30) null    ,
`textkey` varchar(30) null    ,
`type` tinyint(4) null default 0   ,
`conf` text null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_wechat_resaler`
--

DROP TABLE IF EXISTS `twotree_wechat_resaler`;
create table `twotree_wechat_resaler` (
`id` int(10) unsigned not null  primary key auto_increment ,
`user_id` int(11) null    ,
`name` varchar(20) null    ,
`level` tinyint(1) null default 1   ,
`status` tinyint(4) null default 0   ,
`username` varchar(20) null    ,
`password` varchar(32) null    ,
`posttime` int(11) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_wechat_shop`
--

DROP TABLE IF EXISTS `twotree_wechat_shop`;
create table `twotree_wechat_shop` (
`id` int(10) unsigned not null  primary key auto_increment ,
`user_id` int(11) null    ,
`shop_name` varchar(20) null    ,
`shop_theme` varchar(30) null    ,
`shop_level` tinyint(1) null default 1   ,
`shop_status` tinyint(4) null default 0   ,
`posttime` int(11) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_wechat_shop_theme`
--

DROP TABLE IF EXISTS `twotree_wechat_shop_theme`;
create table `twotree_wechat_shop_theme` (
`id` int(10) unsigned not null  primary key auto_increment ,
`title` varchar(20) null    ,
`tpl_id` varchar(20) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_wechat_tpl_msg`
--

DROP TABLE IF EXISTS `twotree_wechat_tpl_msg`;
create table `twotree_wechat_tpl_msg` (
`id` int(10) unsigned not null  primary key auto_increment ,
`title` varchar(30) null    ,
`tpl_id` varchar(50) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_wechat_user`
--

DROP TABLE IF EXISTS `twotree_wechat_user`;
create table `twotree_wechat_user` (
`id` int(9) not null  primary key auto_increment ,
`parent_id` int(11) unsigned null default 0   ,
`group_id` int(10) unsigned null default 0   ,
`role_id` int(11) null default 1   ,
`user_level` tinyint(1) null default 1   ,
`wechatid` varchar(30) null    ,
`subscribe_time` int(11) null default 0   ,
`subscribe` tinyint(1) null    ,
`status` tinyint(4) null default 0   ,
`name` varchar(30) null    ,
`mobile` varchar(20) null    ,
`address` varchar(100) null default 0.00   ,
`province` varchar(30) null    ,
`city` varchar(30) null    ,
`town` varchar(30) null    ,
`nickname` varchar(50) null    ,
`headimgurl` text null    ,
`sex` tinyint(1) null    ,
`id_card` varchar(30) not null    ,
`bank_card` varchar(30) null    ,
`bank_name` varchar(80) null    ,
`money_account` decimal(10,2) unsigned null default 0.00   ,
`money_dongjie` decimal(10,2) null default 0.00   ,
`jifen` int(11) null default 0   ,
`jifen_dongjie` int(11) null default 0   ,
`cost_money` decimal(10,2) unsigned null default 0.00   ,
`remark` text null    ,
`shop_name` varchar(20) null    ,
`shop_theme` varchar(20) null default default   ,
`shop_banner` text null    ,
`shop_logo` text null    ,
`username` varchar(20) null    ,
`password` varchar(32) null    ,
`invite_code` varchar(20) null    ,
`reg_code` varchar(20) null    ,
`motto` varchar(50) null    ,
`posttime` int(11) null    ,
`birthday` varchar(20) not null    ,
`hobby` text not null    ,
`email` varchar(50) not null    ,
`profile_complete` tinyint(2) not null default 0   
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表结构: `twotree_yongji_config`
--

DROP TABLE IF EXISTS `twotree_yongji_config`;
create table `twotree_yongji_config` (
`id` int(10) unsigned not null  primary key auto_increment ,
`user` decimal(10,2) null    ,
`shop` decimal(10,2) null    ,
`resaler` decimal(10,2) null    
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 数据表中的数据: `twotree_access`
--

INSERT INTO `twotree_access` VALUES ('6','3','null');

INSERT INTO `twotree_access` VALUES ('7','3','null');

INSERT INTO `twotree_access` VALUES ('3','2','null');

INSERT INTO `twotree_access` VALUES ('14','3','null');

INSERT INTO `twotree_access` VALUES ('5','2','null');

INSERT INTO `twotree_access` VALUES ('1','1','null');

INSERT INTO `twotree_access` VALUES ('4','2','null');

INSERT INTO `twotree_access` VALUES ('14','3','null');

INSERT INTO `twotree_access` VALUES ('5','2','null');

INSERT INTO `twotree_access` VALUES ('1','1','null');

INSERT INTO `twotree_access` VALUES ('5','2','null');

INSERT INTO `twotree_access` VALUES ('19','3','null');

INSERT INTO `twotree_access` VALUES ('18','3','null');

INSERT INTO `twotree_access` VALUES ('17','3','null');

INSERT INTO `twotree_access` VALUES ('16','3','null');

INSERT INTO `twotree_access` VALUES ('15','2','null');

INSERT INTO `twotree_access` VALUES ('8','3','null');

INSERT INTO `twotree_access` VALUES ('9','3','null');

INSERT INTO `twotree_access` VALUES ('10','3','null');

INSERT INTO `twotree_access` VALUES ('11','3','null');

INSERT INTO `twotree_access` VALUES ('21','3','null');

INSERT INTO `twotree_access` VALUES ('20','2','null');

INSERT INTO `twotree_access` VALUES ('29','3','null');

INSERT INTO `twotree_access` VALUES ('28','3','null');

INSERT INTO `twotree_access` VALUES ('27','3','null');

INSERT INTO `twotree_access` VALUES ('26','2','null');

INSERT INTO `twotree_access` VALUES ('1','1','null');

INSERT INTO `twotree_access` VALUES ('21','3','null');

INSERT INTO `twotree_access` VALUES ('20','2','null');

INSERT INTO `twotree_access` VALUES ('1','1','null');

INSERT INTO `twotree_access` VALUES ('12','3','null');

INSERT INTO `twotree_access` VALUES ('13','3','null');

INSERT INTO `twotree_access` VALUES ('4','2','null');

INSERT INTO `twotree_access` VALUES ('14','3','null');

INSERT INTO `twotree_access` VALUES ('5','2','null');

INSERT INTO `twotree_access` VALUES ('1','1','null');

INSERT INTO `twotree_access` VALUES ('13','3','null');

INSERT INTO `twotree_access` VALUES ('12','3','null');

INSERT INTO `twotree_access` VALUES ('11','3','null');

INSERT INTO `twotree_access` VALUES ('10','3','null');

INSERT INTO `twotree_access` VALUES ('9','3','null');

INSERT INTO `twotree_access` VALUES ('8','3','null');

INSERT INTO `twotree_access` VALUES ('3','2','null');

INSERT INTO `twotree_access` VALUES ('7','3','null');

INSERT INTO `twotree_access` VALUES ('6','3','null');

INSERT INTO `twotree_access` VALUES ('2','1','null');

INSERT INTO `twotree_access` VALUES ('3','2','null');

INSERT INTO `twotree_access` VALUES ('7','3','null');

INSERT INTO `twotree_access` VALUES ('6','3','null');

INSERT INTO `twotree_access` VALUES ('14','3','null');

INSERT INTO `twotree_access` VALUES ('5','2','null');

INSERT INTO `twotree_access` VALUES ('14','3','null');

INSERT INTO `twotree_access` VALUES ('2','1','null');

--
-- 数据表中的数据: `twotree_admin_action_log`
--

INSERT INTO `twotree_admin_action_log` VALUES ('1','1','admin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438080434');

INSERT INTO `twotree_admin_action_log` VALUES ('2','1','admin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438082172');

INSERT INTO `twotree_admin_action_log` VALUES ('3','1','admin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438234648');

INSERT INTO `twotree_admin_action_log` VALUES ('4','1','admin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438235189');

INSERT INTO `twotree_admin_action_log` VALUES ('5','1','admin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438235251');

INSERT INTO `twotree_admin_action_log` VALUES ('6','1','admin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438235385');

INSERT INTO `twotree_admin_action_log` VALUES ('7','1','admin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438235912');

INSERT INTO `twotree_admin_action_log` VALUES ('8','1','admin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438235919');

INSERT INTO `twotree_admin_action_log` VALUES ('9','1','admin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438241676');

INSERT INTO `twotree_admin_action_log` VALUES ('10','1','admin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438242683');

INSERT INTO `twotree_admin_action_log` VALUES ('11','1','admin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438242690');

INSERT INTO `twotree_admin_action_log` VALUES ('12','1','admin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438266160');

INSERT INTO `twotree_admin_action_log` VALUES ('13','1','admin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438269128');

INSERT INTO `twotree_admin_action_log` VALUES ('14','20','jack','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438269157');

INSERT INTO `twotree_admin_action_log` VALUES ('15','1','admin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438269179');

INSERT INTO `twotree_admin_action_log` VALUES ('16','20','jack','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438269242');

INSERT INTO `twotree_admin_action_log` VALUES ('17','20','jack','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438339613');

INSERT INTO `twotree_admin_action_log` VALUES ('18','1','admin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438339630');

INSERT INTO `twotree_admin_action_log` VALUES ('19','1','admin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438482679');

INSERT INTO `twotree_admin_action_log` VALUES ('20','1','admin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438484000');

INSERT INTO `twotree_admin_action_log` VALUES ('21','20','jack','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438484044');

INSERT INTO `twotree_admin_action_log` VALUES ('22','1','admin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438484253');

INSERT INTO `twotree_admin_action_log` VALUES ('23','20','jack','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438485013');

INSERT INTO `twotree_admin_action_log` VALUES ('24','1','admin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438485117');

INSERT INTO `twotree_admin_action_log` VALUES ('25','2','sysadmin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438485323');

INSERT INTO `twotree_admin_action_log` VALUES ('26','1','admin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438485725');

INSERT INTO `twotree_admin_action_log` VALUES ('27','2','sysadmin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438485960');

INSERT INTO `twotree_admin_action_log` VALUES ('28','1','admin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438486132');

INSERT INTO `twotree_admin_action_log` VALUES ('29','1','admin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438591222');

INSERT INTO `twotree_admin_action_log` VALUES ('30','1','admin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438594016');

INSERT INTO `twotree_admin_action_log` VALUES ('31','1','admin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438594240');

INSERT INTO `twotree_admin_action_log` VALUES ('32','1','admin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438602277');

INSERT INTO `twotree_admin_action_log` VALUES ('33','1','admin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438602367');

INSERT INTO `twotree_admin_action_log` VALUES ('34','1','admin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438664989');

INSERT INTO `twotree_admin_action_log` VALUES ('35','1','admin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438680976');

INSERT INTO `twotree_admin_action_log` VALUES ('36','1','admin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438685264');

INSERT INTO `twotree_admin_action_log` VALUES ('37','1','admin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438686254');

INSERT INTO `twotree_admin_action_log` VALUES ('38','1','admin','http://www.wxaux.bb/index.php?g=Admin&m=Login&a=login','登录后台','1438732698');

INSERT INTO `twotree_admin_action_log` VALUES ('39','1','admin','http://10.2.2.122:8080/index.php?g=Admin&m=Login&a=login','登录后台','1438838940');

INSERT INTO `twotree_admin_action_log` VALUES ('40','1','admin','http://10.2.2.122:8080/index.php?g=Admin&m=Login&a=login','登录后台','1438842311');

INSERT INTO `twotree_admin_action_log` VALUES ('41','1','admin','http://10.2.2.122:8080/index.php?g=Admin&m=Login&a=login','登录后台','1438906061');

INSERT INTO `twotree_admin_action_log` VALUES ('42','1','admin','http://www.wxaux.bb:8080/index.php?g=Admin&m=Login&a=login','登录后台','1438930149');

INSERT INTO `twotree_admin_action_log` VALUES ('43','1','admin','http://www.wxaux.bb:8080/index.php?g=Admin&m=Login&a=login','登录后台','1438935145');

INSERT INTO `twotree_admin_action_log` VALUES ('44','1','admin','http://www.wxaux.bb:8080/index.php?g=Admin&m=Login&a=login','登录后台','1439015754');

INSERT INTO `twotree_admin_action_log` VALUES ('45','1','admin','http://www.wxaux.bb:8080/index.php?g=Admin&m=Login&a=login','登录后台','1439105678');

INSERT INTO `twotree_admin_action_log` VALUES ('46','1','admin','http://www.wxaux.bb:8080/index.php?g=Admin&m=Login&a=login','登录后台','1439257049');

INSERT INTO `twotree_admin_action_log` VALUES ('47','1','admin','http://www.wxaux.bb:8080/index.php?g=Admin&m=Login&a=login','登录后台','1439348757');

INSERT INTO `twotree_admin_action_log` VALUES ('48','1','admin','http://www.wxaux.bb:8080/index.php?g=Admin&m=Login&a=login','登录后台','1439357952');

INSERT INTO `twotree_admin_action_log` VALUES ('49','1','admin','http://www.wxaux.bb:8080/index.php?g=Admin&m=Login&a=login','登录后台','1439378530');

INSERT INTO `twotree_admin_action_log` VALUES ('50','1','admin','http://www.wxaux.bb:8080/index.php?g=Admin&m=Login&a=login','登录后台','1439957607');

INSERT INTO `twotree_admin_action_log` VALUES ('51','1','admin','http://www.wxaux.bb:8080/index.php?g=Admin&m=Login&a=login','登录后台','1440122729');

INSERT INTO `twotree_admin_action_log` VALUES ('52','1','admin','http://www.wxaux.bb:8080/index.php?g=Admin&m=Login&a=login','登录后台','1440215191');

INSERT INTO `twotree_admin_action_log` VALUES ('53','1','admin','http://www.wxaux.bb:8080/index.php?g=Admin&m=Login&a=login','登录后台','1440303953');

INSERT INTO `twotree_admin_action_log` VALUES ('54','1','admin','http://www.wxaux.bb:8080/index.php?g=Admin&m=Login&a=login','登录后台','1440405375');

INSERT INTO `twotree_admin_action_log` VALUES ('55','1','admin','http://www.wxaux.bb:8080/index.php?g=Admin&m=Login&a=login','登录后台','1440688122');

INSERT INTO `twotree_admin_action_log` VALUES ('56','1','admin','http://www.wxaux.bb:8080/index.php?g=Admin&m=Login&a=login','登录后台','1440688123');

INSERT INTO `twotree_admin_action_log` VALUES ('57','1','admin','http://www.wxaux.bb:8080/index.php?g=Admin&m=Login&a=login','登录后台','1443147574');

INSERT INTO `twotree_admin_action_log` VALUES ('58','1','admin','http://www.dinggu.cc/index.php?g=Admin&m=Login&a=login','登录后台','1444550321');

INSERT INTO `twotree_admin_action_log` VALUES ('59','1','admin','http://www.dinggu.cc/index.php?g=Admin&m=Login&a=login','登录后台','1444619276');

INSERT INTO `twotree_admin_action_log` VALUES ('60','1','admin','http://www.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1444632576');

INSERT INTO `twotree_admin_action_log` VALUES ('61','1','admin','http://www.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1444641265');

INSERT INTO `twotree_admin_action_log` VALUES ('62','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1444656750');

INSERT INTO `twotree_admin_action_log` VALUES ('63','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1444657605');

INSERT INTO `twotree_admin_action_log` VALUES ('64','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1444658780');

INSERT INTO `twotree_admin_action_log` VALUES ('65','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1444706348');

INSERT INTO `twotree_admin_action_log` VALUES ('66','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1444798477');

INSERT INTO `twotree_admin_action_log` VALUES ('67','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1444805227');

INSERT INTO `twotree_admin_action_log` VALUES ('68','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1444805591');

INSERT INTO `twotree_admin_action_log` VALUES ('69','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1444813131');

INSERT INTO `twotree_admin_action_log` VALUES ('70','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1444816220');

INSERT INTO `twotree_admin_action_log` VALUES ('71','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1444824565');

INSERT INTO `twotree_admin_action_log` VALUES ('72','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1444882493');

INSERT INTO `twotree_admin_action_log` VALUES ('73','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1444888674');

INSERT INTO `twotree_admin_action_log` VALUES ('74','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1444890833');

INSERT INTO `twotree_admin_action_log` VALUES ('75','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1444893244');

INSERT INTO `twotree_admin_action_log` VALUES ('76','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1444900773');

INSERT INTO `twotree_admin_action_log` VALUES ('77','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1444967114');

INSERT INTO `twotree_admin_action_log` VALUES ('78','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1444967989');

INSERT INTO `twotree_admin_action_log` VALUES ('79','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1444968452');

INSERT INTO `twotree_admin_action_log` VALUES ('80','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445233524');

INSERT INTO `twotree_admin_action_log` VALUES ('81','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445233593');

INSERT INTO `twotree_admin_action_log` VALUES ('82','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445234368');

INSERT INTO `twotree_admin_action_log` VALUES ('83','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445234376');

INSERT INTO `twotree_admin_action_log` VALUES ('84','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445236017');

INSERT INTO `twotree_admin_action_log` VALUES ('85','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445236895');

INSERT INTO `twotree_admin_action_log` VALUES ('86','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445248804');

INSERT INTO `twotree_admin_action_log` VALUES ('87','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445303842');

INSERT INTO `twotree_admin_action_log` VALUES ('88','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445311768');

INSERT INTO `twotree_admin_action_log` VALUES ('89','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445320705');

INSERT INTO `twotree_admin_action_log` VALUES ('90','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445340545');

INSERT INTO `twotree_admin_action_log` VALUES ('91','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445411384');

INSERT INTO `twotree_admin_action_log` VALUES ('94','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445481417');

INSERT INTO `twotree_admin_action_log` VALUES ('95','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445490903');

INSERT INTO `twotree_admin_action_log` VALUES ('96','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445507574');

INSERT INTO `twotree_admin_action_log` VALUES ('97','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445508767');

INSERT INTO `twotree_admin_action_log` VALUES ('98','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445510059');

INSERT INTO `twotree_admin_action_log` VALUES ('99','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445519698');

INSERT INTO `twotree_admin_action_log` VALUES ('100','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445529482');

INSERT INTO `twotree_admin_action_log` VALUES ('101','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445573783');

INSERT INTO `twotree_admin_action_log` VALUES ('102','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445578754');

INSERT INTO `twotree_admin_action_log` VALUES ('103','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445599000');

INSERT INTO `twotree_admin_action_log` VALUES ('104','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445616642');

INSERT INTO `twotree_admin_action_log` VALUES ('105','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445616826');

INSERT INTO `twotree_admin_action_log` VALUES ('106','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445789287');

INSERT INTO `twotree_admin_action_log` VALUES ('107','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445824759');

INSERT INTO `twotree_admin_action_log` VALUES ('108','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445828996');

INSERT INTO `twotree_admin_action_log` VALUES ('109','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445834120');

INSERT INTO `twotree_admin_action_log` VALUES ('110','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445845923');

INSERT INTO `twotree_admin_action_log` VALUES ('111','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445855356');

INSERT INTO `twotree_admin_action_log` VALUES ('112','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445861773');

INSERT INTO `twotree_admin_action_log` VALUES ('113','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445863082');

INSERT INTO `twotree_admin_action_log` VALUES ('114','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445865053');

INSERT INTO `twotree_admin_action_log` VALUES ('115','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445866618');

INSERT INTO `twotree_admin_action_log` VALUES ('116','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445912590');

INSERT INTO `twotree_admin_action_log` VALUES ('117','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445921424');

INSERT INTO `twotree_admin_action_log` VALUES ('118','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445921922');

INSERT INTO `twotree_admin_action_log` VALUES ('119','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445923339');

INSERT INTO `twotree_admin_action_log` VALUES ('120','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445932922');

INSERT INTO `twotree_admin_action_log` VALUES ('121','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445936792');

INSERT INTO `twotree_admin_action_log` VALUES ('122','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1445937381');

INSERT INTO `twotree_admin_action_log` VALUES ('123','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1446010631');

INSERT INTO `twotree_admin_action_log` VALUES ('124','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1446011293');

INSERT INTO `twotree_admin_action_log` VALUES ('125','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1446014131');

INSERT INTO `twotree_admin_action_log` VALUES ('126','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1446027379');

INSERT INTO `twotree_admin_action_log` VALUES ('127','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1446028997');

INSERT INTO `twotree_admin_action_log` VALUES ('128','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1446083546');

INSERT INTO `twotree_admin_action_log` VALUES ('129','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1446084197');

INSERT INTO `twotree_admin_action_log` VALUES ('130','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1446084312');

INSERT INTO `twotree_admin_action_log` VALUES ('131','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1446097962');

INSERT INTO `twotree_admin_action_log` VALUES ('132','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1446101658');

INSERT INTO `twotree_admin_action_log` VALUES ('133','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1446104177');

INSERT INTO `twotree_admin_action_log` VALUES ('134','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1446110115');

INSERT INTO `twotree_admin_action_log` VALUES ('135','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1446111481');

INSERT INTO `twotree_admin_action_log` VALUES ('136','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1446170901');

INSERT INTO `twotree_admin_action_log` VALUES ('137','1','admin','http://m.idinggu.com/index.php?g=Admin&m=Login&a=login','登录后台','1446171023');

--
-- 数据表中的数据: `twotree_building`
--

INSERT INTO `twotree_building` VALUES ('1','1','西安交通大学','1号宿舍楼','1','1444660526');

INSERT INTO `twotree_building` VALUES ('2','1','西安交通大学','2号宿舍楼','1','1444660808');

INSERT INTO `twotree_building` VALUES ('3','1','西安交通大学','3号宿舍楼','1','1445866655');

INSERT INTO `twotree_building` VALUES ('4','3','西北工业大学','A楼','0','1446110788');

INSERT INTO `twotree_building` VALUES ('5','1','西安交通大学','4号宿舍楼','0','1446114726');

--
-- 数据表中的数据: `twotree_cms_article`
--

INSERT INTO `twotree_cms_article` VALUES ('1','用户协议','1','协议规则','0','1','admin','null','0','0','0','null','&lt;p style=&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;&quot;&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		一、&amp;nbsp;协议
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		《用户协议》（以下简称“本协议”）是由西安递妞妞信息技术有限公司在提供域名为www.idinggu.com（以下简称“叮咕”）的在线便利店服务时与用户达成的关于使用叮咕在线便利店的各项规则、条款和条件。本协议在用户使用叮咕在线便利店或接受注册时立即生效。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		请在成为叮咕用户前，仔细阅读本协议中所述的所有规则、条款和条件，包括被本协议提及而纳入本协议的其他条款和条件。建议阅读本协议时，同时阅读本协议中提及的其他网页所包含的内容，因为其可能包含适用于叮咕用户的其他条款和条件。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		二、&amp;nbsp;定义
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		1、叮咕---以休闲食品为核心的线上连锁便利店
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		叮咕是由西安递妞妞信息技术有限公司自主创办的一家专注于区域化电子商务平台开发与应用的互联网公司，公司的主要产品为叮咕在线便利连锁。叮咕旨在为广大用户提供便利、快速、精准的快消品配送到门服务，满足用户的本地化需求。叮咕致力于打造全新的近生活·微型电商平台，为广大消费者便捷、低碳的在线便利生活服务，我们构建基于互联网及手机平台的现代服务产业，做中国在线便利生活的开拓者和引领者。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		2、叮咕的用户
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		叮咕用户必须是具有完全民事行为能力的自然人，或者是具有合法经营资格的实体组织。无民事行为能力人、限制民事行为能力人以及无经营或特定经营资格的组织不得注册为叮咕用户或超过其民事权利或行为能力范围与叮咕进行交易，如与叮咕进行交易的，则服务协议自始无效，叮咕有权立即停止与该用户的交易、注销该用户账户，并有权要求其承担相应法律责任。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		3、用户注册：
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		用户注册是指用户登陆叮咕商城，按要求填写相关信息并确认同意本服务协议的过程。用户因进行交易、获取有偿服务等而发生的所有应纳税赋由用户自行承担。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		4.&amp;nbsp;叮咕积分规则是为了感谢广大叮咕用户的支持，叮咕在线便利店商城推出积分系统，有权对叮咕用户实行消费积分回馈、分享积分赠送和对虚假用户进行积分处罚等。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		叮咕积分规则就是建立在此基础上的一整套完善的积分奖励和处罚体系。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		三、&amp;nbsp;商品交易
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		1.商品交易原则：
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		①平等原则：用户和叮咕在交易过程中具有同等的法律地位。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		②自由原则：用户享有自愿向叮咕购买商品的权利，任何人不得非法干预。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		③公平原则：用户和叮咕行使权利、履行义务应当遵循公平原则。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		④诚实信用原则：用户和叮咕行使权利、履行义务应当遵循诚实信用原则。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		⑤依合同履行义务原则：用户向叮咕在线便利店购买商品时，用户和叮咕皆有有义务根据本服务协议的约定完成该等交易（法律或本协议禁止的交易除外）。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		2.&amp;nbsp;用户通过叮咕在线便利店订购商品，订单即为购买商品的要约。叮咕向用户发出确认收到订单及送货确认内容的电子邮件，或直接将商品发送至用户指定地址时，构成叮咕对该订单的承诺，此时合同即告成立。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		3.&amp;nbsp;叮咕有权在发现叮咕商城上显示的商品信息错误或缺货的情况下，撤回或修改该等信息。叮咕保留对商品订购数量的限制权。用户下订单即表示其对在订单中提供的信息的真实性负责。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		4.&amp;nbsp;叮咕商城上显示的每一商品的价格都包含了增值税（按照法定税率）。送货费用根据用户选择的送货方式另外进行结算。叮咕有权更改上述有关价格和送货费用的信息。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		四、&amp;nbsp;用户的权利和义务：
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		1.&amp;nbsp;用户有权拥有其在叮咕的用户名及密码，并用该用户名和密码登陆叮咕在线商城购买商品。用户不得以任何形式转让或授权他人使用自己的叮咕用户名。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		2.&amp;nbsp;用户有权根据本协议的规定以及叮咕商城上发布的相关规则在叮咕商城上查询商品信息、发表使用体验、参与商品讨论、邀请关注好友、参加叮咕商城的有关活动，以及享受叮咕商城提供的其它信息服务。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		3.&amp;nbsp;用户有义务在注册和通过电话购物时提供自己的真实资料，并保证诸如电子邮件地址、联系电话、联系地址、邮政编码等内容的有效性及真实性，保证叮咕可以通过上述联系方式与用户本人进行联系。同时，用户也有义务在相关资料发生变更时及时更新有关注册资料。用户保证不以他人资料在叮咕进行注册和购买商品。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		4.&amp;nbsp;用户应当保证在叮咕商城购买商品过程中遵守诚实信用原则，不扰乱网上交易的正常秩序。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		5.&amp;nbsp;用户享有言论自由权利；并拥有适度修改、删除自己发表的意见或者评述的权利。用户不得在叮咕发表包含以下内容的言论：
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		①反对宪法所确定的基本原则，煽动、抗拒、破坏宪法和法律、行政法规实施的；
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		②煽动颠覆国家政权，推翻社会主义制度，煽动、分裂国家，破坏国家统一的；
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		③损害国家荣誉和利益的；
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		④煽动民族仇恨、民族歧视，破坏民族团结的；
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		⑤任何包含对种族、性别、宗教、地域内容等歧视的；
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		⑥捏造或者歪曲事实，散布谣言，扰乱社会秩序的；
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		⑦宣扬封建迷信、邪教、淫秽、色情、赌博、暴力、凶杀、恐怖、教唆犯罪的；
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		⑧公然侮辱他人或者捏造事实诽谤他人的，或者进行其他恶意攻击的；
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		⑨损害国家机关信誉的；
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		⑩其他违反宪法和法律行政法规的。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		7.&amp;nbsp;用户在发表使用体验、讨论图片等，除遵守本条款外，还应遵守该讨论区的相关规定。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		8.&amp;nbsp;未经叮咕同意，禁止用户在叮咕商城发布任何形式的广告。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		五、&amp;nbsp;叮咕的权利和义务：
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		1.&amp;nbsp;叮咕有义务在现有技术上维护整个线上交易平台的正常运行，并努力提升和改进技术，使用户线上交易活动得以顺利进行；
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		2.&amp;nbsp;对用户在注册和使用叮咕线上交易平台中所遇到的与交易或注册有关的问题及反映的情况，叮咕应及时作出回复；
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		3.&amp;nbsp;对于用户在叮咕商城上作出下列行为的，叮咕有权作出删除相关信息、终止提供服务等处理，而无须征得用户的同意：
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		①&amp;nbsp;叮咕有权对用户的注册信息及购买行为进行查阅，发现注册信息或购买行为中存在任何问题的，有权向用户发出询问及要求改正的通知或者作出删除等处理；
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		②用户违反本协议规定或有违反法律法规和地方规章的行为的，叮咕有权停止传输并删除其信息，禁止用户发言，注销用户账户并按照相关法律规定向相关主管部门进行披露。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		③对于用户在叮咕进行的下列行为，叮咕有权对用户采取删除其信息、禁止用户发言、注销用户账户等限制性措施：包括发布或以电子邮件或以其他方式传送存在恶意、虚假和侵犯他人人身财产权利内容的信息，进行与网上购物无关或不是以购物为目的的活动，试图扰乱正常购物秩序，将有关干扰、破坏或限制任何计算机软件、硬件或通讯设备功能的软件病毒或其他计算机代码、档案和程序之资料，加以上载、发布、发送电子邮件或以其他方式传送，干扰或破坏叮咕服务或与叮咕商城和服务相连的服务器和网络，或发布其他违反公共利益或可能严重损害叮咕和其它用户合法利益的信息。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		4.&amp;nbsp;用户在此免费授予叮咕永久性的独家使用权(并有权对该权利进行再授权)，使叮咕有权在全球范围内(全部或部分地)&amp;nbsp;使用、复制、修订、改写、发布、翻译和展示用户公示于叮咕网站的各类信息，或制作其派生作品，和/或以现在已知或日后开发的任何形式、媒体或技术，将上述信息纳入其它作品内。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		六、叮咕在线商城规则、修改和可分性
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		1.&amp;nbsp;价格变动规则
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		叮咕将尽最大努力保证用户所购商品与商城上公布的价格一致，但价目表并不构成要约。尽管做出最大的努力，叮咕商品中的一小部分商品可能会有定价错误。如果发现错误定价，叮咕将采取下列措施之一：
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		如果某一商品的正确定价低于错误定价，叮咕将按照较低的定价向用户销售该商品。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		如果某一商品的正确定价高于错误定价，叮咕会根据具体情况，在交付前联系用户寻求指示,&amp;nbsp;或者取消订单并通知用户。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		2.&amp;nbsp;商品缺货规则
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		用户希望购买的商品如果发生缺货，用户和叮咕皆有权取消该订单。叮咕可对缺货商品进行预售登记，叮咕会尽最大努力在最快时间内满足用户的购买需求，当缺货商品到货，叮咕将第一时间通过邮件、短信或电话通知用户，方便用户进行购买。预售登记并不做订单处理，不构成要约。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		3.&amp;nbsp;邮件/短信服务规则
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		叮咕保留通过邮件和短信的形式，对本线上商城及叮咕购物用户发送订单信息、促销活动等告知服务的权利。如果在叮咕注册、购物，则表明已默示接受此项服务。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		如不想接收来自叮咕除订单以外的邮件和短信，叮咕可办理退阅。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		4.&amp;nbsp;送货规则
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		叮咕将会把商品送到用户指定的收货地址。网站上显示的送货时间皆为参考时间，供用户参照使用。参考送货时间是根据库存状况、正常的处理过程和送货时间、送货地点等情况计算得出的。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		5.&amp;nbsp;退换货、补货规则
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		叮咕保留对商品退换货、补货的解释权和限制权。下订单即表明接受叮咕的退换货、补发货规则。详情请参见退换货、补发货规则。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		6.&amp;nbsp;规则的变更
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		①&amp;nbsp;叮咕可以根据需要变更本规则、相关条款和条件或用户资格的认定。对这些条款的修改和变更将被包含在叮咕更新的规则中。上述变更具有可分割性，如果部分变更或条件被认定为无效的，不影响其他变更或条件的有效性。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		②用户在使用叮咕提供的各项服务的同时，承诺接受并遵守各项相关规则的规定。叮咕有权根据需要不时地制定、修改本协议或各类规则，如本协议有任何变更，叮咕将在商城重要页面上提示修改内容。如用户不同意相关变更，必须停止使用“服务”。经修订的协议一经在叮咕商城公布后，立即自动生效。各类规则会在发布后生效，亦成为本协议的一部分。登录或继续使用“服务”将表示用户接受经修订的协议。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		7.&amp;nbsp;解除和终止
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		①用户有权在下列情况下，取消订单：
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		a)经用户和叮咕协商达成一致的；
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		b)叮咕就用户订单做出承诺之前；
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		c)叮咕商城上的公布的商品价格发生变化或错误，用户在叮咕发货之前通知叮咕的。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		②叮咕在下列情况下，可以取消用户订单：
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		a)经用户和叮咕协商达成一致的；
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		b)叮咕商城上显示的商品信息明显错误或缺货的；
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		c)用户订单信息明显错误或超出叮咕商城存货量；
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		d)因不可抗力、叮咕商城系统发生故障或遭受第三攻击，及其它叮咕商城无法控制的情形；
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		e)经叮咕判断不符合公平和诚实信用原则的情形，如同一用户多次无理由拒收商品。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		叮咕可以终止全部或部分规则，即使叮咕没有要求或强制用户严格遵守这些规则，也并不构成叮咕对任何权利的放弃。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		8.&amp;nbsp;责任限制
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		①在法律法规所允许的限度内，因使用叮咕服务而引起的任何损害或经济损失，叮咕承担的全部责任均不超过用户所购买的与该索赔有关的商品价格。这些责任限制条款将在法律所允许的最大限度内适用，并在用户资格被撤销或终止后仍继续有效。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		七、&amp;nbsp;服务的中断和终止：
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		1.&amp;nbsp;如用户向叮咕提出注销用户身份时，经叮咕审核同意，由叮咕注销该用户，用户即解除与叮咕的服务协议关系。但注销该用户账号后，叮咕仍保留下列权利：
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		①&amp;nbsp;叮咕有权保留该用户的注册信息及以前的交易行为记录；
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		②如用户在注销前在叮咕交易平台上存在违法行为或违反本协议的行为，叮咕仍可行使本服务协议所规定的权利。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		2.&amp;nbsp;在下列情况下，叮咕可以通过注销用户的方式终止服务：
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		①&amp;nbsp;在用户违反本服务协议相关规定时，叮咕有权终止向该用户提供服务。但如该用户在叮咕终止提供服务后，再一次直接或间接或以他人名义注册为叮咕用户的，叮咕有权再次单方面终止向该用户提供服务；
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		②&amp;nbsp;如叮咕通过用户提供的信息与用户联系时，发现用户在注册时填写的电子邮箱已不存在或无法接收电子邮件的，经叮咕以其它联系方式通知用户更改，而用户在三个工作日内仍未能提供新的电子邮箱地址的，叮咕有权终止向该用户提供服务；
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		③&amp;nbsp;一经叮咕发现用户注册信息中主要内容是虚假的，叮咕有权随时终止向该用户提供服务；
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		④&amp;nbsp;本服务协议终止或更新时，用户明示不愿接受新的服务协议的；
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		⑤&amp;nbsp;其它叮咕认为需终止服务的情况。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		八、&amp;nbsp;适用的法律和管辖权
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		本协议适用中华人民共和国的法律，所有的争端将诉诸于叮咕所在地的人民法院。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		九、&amp;nbsp;版权
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		1.叮咕在线商城上的图表、标识、网页页眉、按钮图标、文字、服务品名等标示在网站上的信息都是西安递妞妞信息技术有限公司的财产，受中国和国际知识产权法的保护。未经叮咕许可，任何人不得使用、复制或用作其他用途。在叮咕在线商城上出现的其他商标是其商标权利人各自的财产。未经西安递妞妞信息技术有限公司或相关商标所有人的书面许可，任何第三方都不得使用上述标示在叮咕商城上的信息。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		2.&amp;nbsp;叮咕用户发表的意见或者评述仅代表作者本人观点，与叮咕立场无关。作者文责自负。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		十、&amp;nbsp;信息保护
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		1.&amp;nbsp;用户个人信息的使用：
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		①&amp;nbsp;叮咕不会向任何人出售或出借用户个人信息，除非事先得到用户得许可。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		②&amp;nbsp;叮咕可使用用户的个人信息为用户提供服务，如向用户发出商品和服务信息等情况，或经用户同意与叮咕合作伙伴共享信息。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		2.&amp;nbsp;用户个人信息披露：用户的个人信息将在下述情况下部分或全部被披露：
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		①&amp;nbsp;经用户同意，向第三方披露；
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		②&amp;nbsp;根据法律的有关规定，或者行政或司法机构的要求，向第三方或者行政、司法机构披露；
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		③&amp;nbsp;如果用户出现违反中国有关法律或者网站政策的情况，需要向第三方披露；
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		④&amp;nbsp;为提供用户所要求的商品和服务，而必须和第三方分享用户的个人信息；
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		⑤&amp;nbsp;其他叮咕根据法律或者网站政策认为合适的披露。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		3.&amp;nbsp;信息安全：
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		①&amp;nbsp;叮咕账户和提现功能有密码保护，请用户妥善保管账户及密码信息；
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		②&amp;nbsp;如果用户发现自己的个人信息泄密，尤其是叮咕账户及密码或提现密码发生泄露，请用户立即联络叮咕客服，以便叮咕采取相应措施。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		4.&amp;nbsp;Cookie的使用规则：
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		①&amp;nbsp;通过叮咕所设Cookie所取得的有关信息，将适用本规则；
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		②&amp;nbsp;在叮咕上发布广告的公司通过广告在用户计算机上设定的Cookies，将按该等公司的隐私权政策使用；
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		③&amp;nbsp;编辑和删除个人信息的权限：用户可以对用户的个人信息进行编辑和删除，除非叮咕另有规定。
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		西安递妞妞信息技术有限公司
	&lt;/p&gt;
	&lt;p style=&quot;font-family:Simsun;font-size:medium;&quot;&gt;
		2015年9月
	&lt;/p&gt;
&lt;/p&gt;
&lt;p style=&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;&quot;&gt;
	&lt;br /&gt;
&lt;/p&gt;
&lt;br /&gt;','null','null','null','1','0','0','1446013350');

INSERT INTO `twotree_cms_article` VALUES ('2','咕币规则','1','协议规则','0','1','admin','null','0','0','0','null','&lt;p style=\\&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;\\&quot;&gt;
	咕币兑换是一项叮咕会员专享的回馈计划：
&lt;/p&gt;
&lt;p style=\\&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;\\&quot;&gt;
	会员在叮咕在线购物所获得的咕币，可用于兑换礼品等其他叮咕允许的咕币兑换活动。
&lt;/p&gt;
&lt;p style=\\&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;\\&quot;&gt;
	咕币获得渠道：
&lt;/p&gt;
&lt;p style=\\&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;\\&quot;&gt;
	1.每日签到可领10个咕币
&lt;/p&gt;
&lt;p style=\\&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;\\&quot;&gt;
	2.连续签到5天可额外送20咕币(加上原有的50咕币共70咕币)
&lt;/p&gt;
&lt;p style=\\&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;\\&quot;&gt;
	3.连续签到10天可额外送25咕币(加上原有的120咕币共145咕币)
&lt;/p&gt;
&lt;p style=\\&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;\\&quot;&gt;
	4.连续签到15天可额外送30咕币(加上原有的195咕币共225咕币)
&lt;/p&gt;
&lt;p style=\\&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;\\&quot;&gt;
	5.连续签到30天可额外送50咕币(加上原有的375咕币共425咕币)
&lt;/p&gt;
&lt;p style=\\&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;\\&quot;&gt;
	6.连续签到超过30天后，签到奖励升级为每天15咕币
&lt;/p&gt;
&lt;p style=\\&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;\\&quot;&gt;
	7.完善资料可奖励20咕币
&lt;/p&gt;
&lt;p style=\\&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;\\&quot;&gt;
	8.成功完成好友请可奖励50咕币
&lt;/p&gt;
&lt;p style=\\&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;\\&quot;&gt;
	(更多咕币奖励功能敬请期待～)
&lt;/p&gt;
&lt;p style=\\&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;\\&quot;&gt;
	咕币消费渠道：
&lt;/p&gt;
&lt;p style=\\&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;\\&quot;&gt;
	兑换礼品
&lt;/p&gt;
&lt;p style=\\&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;\\&quot;&gt;
	叮咕商城礼品区中各个咕币段均有对应的礼品兑换
&lt;/p&gt;
&lt;p style=\\&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;\\&quot;&gt;
	参加抽奖
&lt;/p&gt;
&lt;p style=\\&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;\\&quot;&gt;
	不定期推出的投入咕币抽奖活动(例如抽奖大转盘)
&lt;/p&gt;
&lt;p style=\\&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;\\&quot;&gt;
	参加活动
&lt;/p&gt;
&lt;p style=\\&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;\\&quot;&gt;
	不定期推出各种形式丰富的咕币相关活动
&lt;/p&gt;
&lt;p style=\\&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;\\&quot;&gt;
	咕币有效期：永久。
&lt;/p&gt;
&lt;p style=\\&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;\\&quot;&gt;
	咕币细则：
&lt;/p&gt;
&lt;p style=\\&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;\\&quot;&gt;
	1.不同帐户之间的咕币不可转让或不可合并使用;
&lt;/p&gt;
&lt;p style=\\&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;\\&quot;&gt;
	2.咕币只适用于个人用途而进行的购物，不适用团体购物、以营利或销售为目的的购买行为、其他非个人用途购买行为;
&lt;/p&gt;
&lt;p style=\\&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;\\&quot;&gt;
	3.咕币兑换标准及兑换规则均以兑换当时最新活动公告或目录为准，公告或目录如有有效期限的，逾期即不得兑换;
&lt;/p&gt;
&lt;p style=\\&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;\\&quot;&gt;
	4.部分兑换商品有数量限制的，兑完为止。
&lt;/p&gt;
&lt;p style=\\&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;\\&quot;&gt;
	违规处理：
&lt;/p&gt;
&lt;p style=\\&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;\\&quot;&gt;
	如果会员利用系统漏洞作弊等违规方式获得咕币，经查证后，将查封会员账号，并追缴相关咕币，并保留追究相应法律责任的权利;
&lt;/p&gt;
&lt;p style=\\&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;\\&quot;&gt;
	修改及终止：
&lt;/p&gt;
&lt;p style=\\&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;\\&quot;&gt;
	叮咕在线在法律允许的范围内可兑本活动细则进行解释，并有权根据需要取消本细则或增删、修订细则的权利(包括但不限于参加资格、咕币计算及兑换标准)。
&lt;/p&gt;','null','null','null','1','0','0','1444621783');

INSERT INTO `twotree_cms_article` VALUES ('3','提现规则','1','协议规则','0','1','admin','null','0','0','0','null','&lt;p style=&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;&quot;&gt;
	1. 提现时间：随时可申请提现。
&lt;/p&gt;
&lt;p style=&quot;font-size:14px;font-family:微软雅黑;color:#333333;background-color:#FFFFFF;&quot;&gt;
	2.&lt;span style=&quot;line-height:1.5;&quot;&gt;可提现金额不包括当日的收益额，当日收益额次日方可提现&lt;/span&gt;&lt;br /&gt;
&lt;span style=&quot;line-height:1.5;&quot;&gt;3. 到账时间：工作日48小时内既可到账（具体取决 于您开户行的相关规定）&lt;/span&gt;
&lt;/p&gt;','null','null','null','1','0','0','1446013274');

--
-- 数据表中的数据: `twotree_cms_config`
--

INSERT INTO `twotree_cms_config` VALUES ('1','叮咕','叮咕','叮咕','null','陕ICP备12369986号','1','4000928366','0578-9919965','785971413@qq.com','418322891','Copyright © 2015 叮咕 版权所有','0.00','/index.php?g=Index&m=Index&a=read&id=2','/Data/upload/image/20141119/20141119095301_58721.jpg');

--
-- 数据表中的数据: `twotree_cms_friendlink`
--

INSERT INTO `twotree_cms_friendlink` VALUES ('1','微信','http://www.weixin.com','null','1','0');

--
-- 数据表中的数据: `twotree_cms_sort`
--

INSERT INTO `twotree_cms_sort` VALUES ('1','0','协议规则','0','0','0','1','0','8','null','null','null','null','null','null');

--
-- 数据表中的数据: `twotree_distributor_config`
--

INSERT INTO `twotree_distributor_config` VALUES ('1','20.00','20.00','12.50','2','10.00','1','1.00');

--
-- 数据表中的数据: `twotree_email_config`
--

INSERT INTO `twotree_email_config` VALUES ('1','smtp.163.com','25','奥克斯','奥克斯','奥克斯');

--
-- 数据表中的数据: `twotree_express`
--

INSERT INTO `twotree_express` VALUES ('1','顺丰','12.00','顺丰快递','1');

INSERT INTO `twotree_express` VALUES ('2','圆通','10.00','圆通快递','1');

--
-- 数据表中的数据: `twotree_feedback`
--

INSERT INTO `twotree_feedback` VALUES ('1','90','1','绿地集团是中国第一家也是目前（截止2013年）唯一一家跻身《财富》世界500强的以房地产为主业的企业集团。2015年位居《财富》世界500强第258位[1]  。绿地集团房地产开发项目遍及全国主要省区市，特别在超高层、大型城市综合体、高铁站商务区及产业园开发领域遥遥领先，目前的世界十大高楼近一半来自绿地。2014年实现经营收入超过42,515.1亿美元，较上年增长3.7%，预计2015年经营收入突破5000亿。','18710950677','4008788029@qq.com','1444720176');

INSERT INTO `twotree_feedback` VALUES ('2','1','1','我的资料','18710980666','41832289@qq.com','1444812484');

INSERT INTO `twotree_feedback` VALUES ('3','21','2','很好','1355263865','ggff','1445862872');

--
-- 数据表中的数据: `twotree_goods`
--

INSERT INTO `twotree_goods` VALUES ('1','aux2015-001','15','3','雀巢咖啡30杯（奶香）15g/包','/Data/upload/image/20151026/20151026191906_61020.jpg','/Data/upload/image/20151029/20151029154241_65967.jpg','/Data/upload/image/20151029/20151029154253_45414.jpg','0','1.50','2.20','瓶','1','<p style=\"text-align:left;\">
	商品编号:&nbsp;441906011036
</p>
<p style=\"text-align:left;\">
	商品名称：雀巢咖啡
</p>
<p style=\"text-align:left;\">
	保质期:&nbsp;730天
</p>
<p style=\"text-align:left;\">
	净含量: 15g/包
</p>
<p style=\"text-align:left;\">
	储藏方法:&nbsp;置于阴凉干燥处
</p>','奥克斯空调','<span>奥克斯空调</span>','<span>奥克斯空调</span>','<span>奥克斯空调</span>','null','0','0','0','433','100','10','6','三年','N;','N;','10','200','126','null','1419325343','1.50','1');

INSERT INTO `twotree_goods` VALUES ('7','null','15','1','老北京蜂蜜枣糕  60g/袋','/Data/upload/image/20151026/20151026191055_37221.jpeg','/Data/upload/image/20151029/20151029161702_53470.jpg','/Data/upload/image/20151029/20151029161715_64184.jpg','0','2.00','2.80','1','1','<p style=\"text-align:left;\">
	商品编号:&nbsp;371424011881
</p>
<p style=\"text-align:left;\">
	商品名称：老北京蜂蜜枣糕&nbsp;
</p>
<p style=\"text-align:left;\">
	净含量:&nbsp;60g
</p>
<p style=\"text-align:left;\">
	保质期:&nbsp;180天
</p>
<p style=\"text-align:left;\">
	储藏方法:&nbsp;阴凉干燥处
</p>','奥克斯空调','null','120g','null','null','0','0','0','18','100','30','0','1年','null','null','0','null','12','null','1432109596','2.00','2');

INSERT INTO `twotree_goods` VALUES ('8','null','15','1','达利园  熊字饼  115g/袋','/Data/upload/image/20151026/20151026190921_84328.jpg','/Data/upload/image/20151029/20151029161958_77524.jpg','/Data/upload/image/20151029/20151029162014_67694.jpg','0','2.20','3.00','1','1','<p style=\"text-align:left;\">
	商品编号:&nbsp;350508010019
</p>
<p style=\"text-align:left;\">
	<span>商品</span>名称:&nbsp;达利园 熊字饼干
</p>
<p style=\"text-align:left;\">
	净含量:&nbsp;115g/袋
</p>
<p style=\"text-align:left;\">
	保质期:&nbsp;300天
</p>
<p style=\"text-align:left;\">
	储藏方法:&nbsp;阴凉通风处 避免阳光照射
</p>
<p>
	<br />
</p>
<p>
	<br />
</p>','奥克斯空调','null','120ml','null','null','0','0','0','18','100','30','0','1年','null','null','0','null','10','null','1432109862','2.20','0');

INSERT INTO `twotree_goods` VALUES ('26','null','null','2','乐吧薯片 麻辣味 50g/包','/Data/upload/image/20151026/20151026193447_72383.jpg','/Data/upload/image/20151029/20151029152042_84687.png','/Data/upload/image/20151029/20151029152052_60971.jpg','0','2.00','2.50','1','1','<p>
	商品编号:&nbsp;121412020007
</p>
<p>
	产品名称:&nbsp;乐吧 薯片
</p>
<p>
	<span>&nbsp;净含量：50g/包</span>
</p>
<p>
	保质期:&nbsp;365天
</p>
<p>
	<span style=\"line-height:1.5;\">储藏方法:&nbsp;置阴凉干燥处</span><span style=\"line-height:1.5;\"></span>
</p>','null','null','null','null','null','0','0','0','null','100','0','0','null','null','null','0','0','0','null','1445859289','2.00','0');

INSERT INTO `twotree_goods` VALUES ('27','null','null','2','正墨素毛肚香辣  22克/包','/Data/upload/image/20151026/20151026193539_69760.jpg','/Data/upload/image/20151029/20151029153320_81540.jpg','/Data/upload/image/20151029/20151029153334_46947.jpg','0','1.00','1.50','1','1','<p>
	商品名称：正墨素毛肚香辣
</p>
<p>
	净含量：22克/包
</p>
<p>
	保质期：180天
</p>','null','null','null','null','null','0','0','0','null','100','0','0','null','null','null','0','0','0','null','1445859342','1.00','0');

INSERT INTO `twotree_goods` VALUES ('28','null','null','2','卫龙亲嘴烧（香辣）26克/包','/Data/upload/image/20151026/20151026193650_58073.jpg','/Data/upload/image/20151029/20151029153802_31717.jpg','/Data/upload/image/20151029/20151029153810_10615.jpg','0','0.50','0.60','1','1','<p>
	商品编号:&nbsp;411107010002
</p>
<p>
	商品名称：卫龙亲嘴烧
</p>
<p>
	重量(g):&nbsp;26
</p>
<p>
	保质期:&nbsp;150天
</p>
<p>
	储藏方法:&nbsp;置于阴凉干燥处
</p>','null','null','null','null','null','0','0','0','null','100','0','0','null','null','null','0','0','0','null','1445859411','0.50','0');

INSERT INTO `twotree_goods` VALUES ('29','null','null','2','旺旺挑豆-脆皮 45g/包','/Data/upload/image/20151026/20151026193758_54066.jpg','/Data/upload/image/20151029/20151029162624_63129.png','/Data/upload/image/20151029/20151029162747_52563.jpg','0','2.50','3.00','包','1','<p>
	<span style=\"color:#000000;font-family:Arial, Helvetica, sans-serif;font-size:13px;line-height:20.796875px;background-color:#FFFFFF;\">商品</span>编号:&nbsp;311613010188
</p>
<p>
	净含量: &nbsp;45g/包
</p>
<p>
	保质期:&nbsp;270天
</p>
<p>
	储藏方法:&nbsp;避免阳光直射高温潮湿
</p>','null','null','null','null','null','0','0','0','null','100','0','0','null','null','null','0','0','0','null','1445859479','2.50','0');

INSERT INTO `twotree_goods` VALUES ('30','null','null','2','捕鱼老汉香辣黄金鱼 18g/包','/Data/upload/image/20151026/20151026193922_60243.jpg','/Data/upload/image/20151029/20151029142555_38196.jpg','/Data/upload/image/20151029/20151029142609_43252.jpg','0','1.20','1.50','1','1','<p>
	商品编号:&nbsp;430622020110
</p>
<p>
	商品名称：捕鱼老汉香辣黄金鱼
</p>
<p>
	保质期:&nbsp;270天
</p>
<p>
	净含量:&nbsp;14g/包
</p>
<p>
	储藏方法:&nbsp;25度以下卫生、阴凉、干燥
</p>','null','null','null','null','null','0','0','0','null','100','0','0','null','null','null','0','0','0','null','1445859571','1.20','0');

INSERT INTO `twotree_goods` VALUES ('9','null','15','1','盼盼法式奶香面包5枚 100g/袋','/Data/upload/image/20151026/20151026190729_86863.jpg','/Data/upload/image/20151029/20151029122319_45925.jpg','/Data/upload/image/20151029/20151029122340_56013.jpg','0','3.00','4.00','1','1','<p style=\"text-align:left;\">
	<span style=\"font-family:SimSun;\">商品名称：盼盼法式奶香面包</span><span style=\"font-family:SimSun;\"></span> 
</p>
<p style=\"text-align:left;\">
	<span style=\"font-family:SimSun;\">净含量：100g/袋</span> 
</p>
<p style=\"text-align:left;\">
	<span style=\"color:#000000;font-family:SimSun;font-size:12px;line-height:19px;background-color:#FFFFFF;\">食用方法：开袋即食</span><span style=\"font-family:SimSun;font-size:12px;color:#000000;\"></span> 
</p>
<p style=\"text-align:left;\">
	<span style=\"color:#000000;font-family:SimSun;font-size:12px;line-height:19px;background-color:#FFFFFF;\">贮存方法：置于阴凉干燥处</span><span style=\"font-family:SimSun;font-size:12px;color:#000000;\"></span> 
</p>','奥克斯空调','null','5片装','null','null','0','0','0','17','100','28','0','1年','null','null','0','null','14','null','1432110034','3.00','2');

INSERT INTO `twotree_goods` VALUES ('31','null','null','2','旺旺小小酥（黑胡椒）60g/包','/Data/upload/image/20151026/20151026194026_57136.jpg','/Data/upload/image/20151029/20151029164029_25606.jpg','/Data/upload/image/20151029/20151029164200_77156.jpg','0','3.00','3.50','包','1','<p>
	商品编号:&nbsp;320805010001
</p>
<p>
	配料表:&nbsp;大米、棕榈油、白砂糖、酱油、
</p>
<p>
	净含量:60g/包
</p>
<p>
	保质期:&nbsp;270天
</p>
<p>
	储藏方法:&nbsp;阴凉干燥处，避免阳光直射
</p>','null','null','null','null','null','0','0','0','null','100','0','0','null','null','null','0','0','0','null','1445859628','3.00','1');

INSERT INTO `twotree_goods` VALUES ('32','null','null','2','劲仔厚豆干-酱香  25g/包','/Data/upload/image/20151029/20151029164538_55096.jpg','/Data/upload/image/20151029/20151029164551_38916.jpg','/Data/upload/image/20151029/20151029164755_90752.jpg','0','1.00','1.00','包','1','<p>
	商品编号:&nbsp;430625018888
</p>
<p>
	重量(g):&nbsp;25g/包
</p>
<p>
	保质期:&nbsp;365天
</p>
<p>
	品牌:&nbsp;劲仔
</p>
<p>
	食用方法：开袋即食
</p>
<p>
	<br />
</p>
<p>
	<br />
</p>','null','null','null','null','null','0','0','0','null','100','0','0','null','null','null','0','0','0','null','1445859716','1.00','0');

INSERT INTO `twotree_goods` VALUES ('33','null','null','2','湘味传说艾尚你长沙臭豆腐  25g/包','/Data/upload/image/20151026/20151026194551_77738.jpg','/Data/upload/image/20151029/20151029165425_46996.jpg','/Data/upload/image/20151029/20151029165442_51833.jpg','0','1.00','1.50','包','1','<p>
	商品编号:&nbsp;QS430125010431
</p>
<p>
	商品名称：湘味传说艾尚你长沙臭豆腐
</p>
<p>
	配料表:&nbsp;黄豆、碘盐、植物油、白糖、味精、辣椒、香辛料
</p>
<p>
	重量(g):&nbsp;25g/包
</p>
<p>
	保质期:&nbsp;270天
</p>
<p>
	储藏方法:&nbsp;常温下保存，避免高温和
</p>','null','null','null','null','null','0','0','0','null','100','0','0','null','null','null','0','0','0','null','1445859787','1.00','1');

INSERT INTO `twotree_goods` VALUES ('34','null','null','2','湘味传说艾尚你酱香鸭翅 20g/包','/Data/upload/image/20151026/20151026194411_14103.jpg','/Data/upload/image/20151029/20151029165851_48880.jpg','/Data/upload/image/20151029/20151029165901_80018.jpg','0','1.00','1.50','包','1','<p>
	商品编号:&nbsp;430604010021
</p>
<p>
	配料表:&nbsp;鸭翅、碘盐、植物油、白糖、味精、辣椒、香辛料
</p>
<p>
	重量(g):&nbsp;&nbsp;20g/包
</p>
<p>
	保质期:&nbsp;365天
</p>
<p>
	储藏方法：阴凉避光
</p>
<p>
</p>
<p>
	<br />
</p>','null','null','null','null','null','0','0','0','null','100','0','0','null','null','null','0','0','0','null','1445859853','1.00','1');

INSERT INTO `twotree_goods` VALUES ('10','null','15','1','友臣金丝肉松饼2枚  68g/包','/Data/upload/image/20151029/20151029115218_85220.jpg','/Data/upload/image/20151029/20151029115233_48737.jpg','/Data/upload/image/20151029/20151029115249_92575.jpg','0','3.30','4.00','1','1','<p style=\"text-align:left;\">
	商品编号:&nbsp;350524010687
</p>
<p style=\"text-align:left;\">
	商品名称：友臣金丝肉松饼
</p>
<p style=\"text-align:left;\">
	保质期:&nbsp;180天
</p>
<p style=\"text-align:left;\">
	净含量:&nbsp;68g
</p>
<p style=\"text-align:left;\">
	储藏方法:&nbsp;凉干燥处，避免高温直射
</p>
<p>
	<br />
</p>','奥克斯空调','null','10ml','null','null','0','0','0','19','100','30','0','1年','null','null','0','null','5','null','1432110766','3.30','0');

INSERT INTO `twotree_goods` VALUES ('11','null','15','1','双汇火腿肠80g/支','/Data/upload/image/20151029/20151029111207_65961.jpg','/Data/upload/image/20151029/20151029111221_25128.jpg','/Data/upload/image/20151029/20151029111231_22252.jpg','0','1.50','2.80','1','1','<p style=\"text-align:left;\">
	生产许可证编号：410004010049
</p>
<p style=\"text-align:left;\">
	保质期：6个月
</p>
<p style=\"text-align:left;\">
	净含量:&nbsp;80g/支
</p>
<p style=\"text-align:left;\">
	储藏方法：卫生、阴凉、通风、干燥处
</p>
<p style=\"text-align:left;\">
	食用方法：拆开包装即可食用
</p>
<p>
	<br />
</p>
<p>
	<br />
</p>
<p>
	<br />
</p>','奥克斯空调','null','58g','null','null','0','0','0','111','100','30','0','1年','null','null','0','null','7','null','1432111089','1.50','1');

INSERT INTO `twotree_goods` VALUES ('35','null','null','2','美升阿胶红枣 150g/包','/Data/upload/image/20151026/20151026194656_48858.jpg','/Data/upload/image/20151029/20151029170540_97654.jpg','/Data/upload/image/20151029/20151029170959_97341.jpg','0','3.20','3.80','包','1','<p>
	商品名称：美升阿胶红枣
</p>
<p>
	净含量：150g/包
</p>
<p>
	保质期：365天
</p>
<p>
	储藏方法:&nbsp;阴凉干燥通风处
</p>','null','null','null','null','null','0','0','0','null','100','0','0','null','null','null','0','0','0','null','1445860021','3.20','0');

INSERT INTO `twotree_goods` VALUES ('36','null','null','3','可口可乐 500ml/瓶','/Data/upload/image/20151026/20151026194829_88873.jpg','/Data/upload/image/20151029/20151029172449_35359.jpg','/Data/upload/image/20151029/20151029172544_50402.jpg','0','2.90','3.00','瓶','1','<p>
	商品编号:&nbsp;110006011223
</p>
<p>
	商品名称：可口可乐
</p>
<p>
	净含量：&nbsp;500ml/瓶
</p>
<p>
	保质期:&nbsp;365&nbsp;天
</p>
<p>
	储藏方法:&nbsp;阴凉 干燥
</p>','null','null','null','null','null','0','0','0','null','100','0','0','null','null','null','0','0','2','null','1445860115','2.90','0');

INSERT INTO `twotree_goods` VALUES ('37','null','null','2','味之天豆筋130/袋','/Data/upload/image/20151026/20151026201532_48298.jpg','/Data/upload/image/20151029/20151029173507_29311.jpg','/Data/upload/image/20151029/20151029173517_35235.jpg','0','3.00','3.50','袋','1','<p>
	商品编号:&nbsp;430624011072
</p>
<p>
	配料表:&nbsp;黄豆、食用植物油、食用盐、味精、辣椒、香辛料等
</p>
<p>
	重量(g):&nbsp;130
</p>
<p>
	保质期:&nbsp;180天
</p>
<p>
	储藏方法:&nbsp;阴凉干燥处
</p>
<p>
</p>','null','null','null','null','null','0','0','0','null','100','0','0','null','null','null','0','0','0','null','1445861739','3.00','0');

INSERT INTO `twotree_goods` VALUES ('2','达大厦','15','3','娃哈哈 AD钙奶 220ml/瓶','/Data/upload/image/20151026/20151026191700_93899.jpg','/Data/upload/image/20151029/20151029155046_59391.jpg','/Data/upload/image/20151029/20151029155054_62767.jpg','0','1.80','2.50','瓶','1','<p style=\"text-align:center;\">
	<p style=\"text-align:left;color:#404040;font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;\">
		<span style=\"font-family:SimSun;font-size:12px;color:#000000;\">商品名称：娃哈哈 AD钙奶<br />
</span>
	</p>
	<p style=\"text-align:left;color:#404040;font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;\">
		<span style=\"font-family:SimSun;font-size:12px;color:#000000;\">净含量：220ml/瓶</span>
	</p>
	<p style=\"text-align:left;color:#404040;font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;\">
		<span style=\"font-family:SimSun;font-size:12px;color:#000000;\">食用方法：开启即用</span>
	</p>
	<p style=\"text-align:left;color:#404040;font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;\">
		<span style=\"font-family:SimSun;font-size:12px;color:#000000;\">贮存方法：置于阴凉干燥处</span>
	</p>
	<p style=\"text-align:left;color:#404040;font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;\">
		<span style=\"font-family:SimSun;font-size:12px;color:#000000;\"><span style=\"color:#000000;font-family:SimSun;font-size:12px;line-height:19px;background-color:#FFFFFF;\">适用人群：老少皆宜</span><span style=\"color:#000000;font-size:12px;font-family:SimSun;\"></span><br />
</span>
	</p>
	<p style=\"text-align:left;color:#404040;font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;\">
		<span style=\"font-family:SimSun;font-size:12px;color:#000000;\">配料表：</span><span style=\"line-height:1.5;font-family:SimSun;font-size:12px;color:#000000;\">水、白砂糖、全脂乳粉、食品添加剂、浓缩乳清蛋白粉、碳酸钙、食用香精、维生素</span><span style=\"line-height:1.5;font-family:SimSun;font-size:12px;color:#000000;\">A</span><span style=\"line-height:1.5;font-family:SimSun;font-size:12px;color:#000000;\">、维生素</span><span style=\"line-height:1.5;font-family:SimSun;font-size:12px;color:#000000;\">D</span>
	</p>
	<div style=\"text-align:left;\">
		<span style=\"line-height:1.5;font-family:SimSun;font-size:12px;color:#000000;\"></span>
	</div>
<span style=\"line-height:1.5;\"></span> 
</p>
<p>
	<br />
</p>','奥克斯空调','null','120ml','null','null','0','0','0','223','100','39','0','三年','红色','null','100','100','32','1.5p','1419328549','1.80','1');

INSERT INTO `twotree_goods` VALUES ('12','null','15','1','统一巧面馆红烧牛肉面  103g/袋','/Data/upload/image/20151029/20151029110250_44161.jpg','/Data/upload/image/20151029/20151029110305_24125.jpg','/Data/upload/image/20151029/20151029110322_55010.jpg','0','2.80','3.00','1','1','<p style=\"text-align:left;\">
	商品名称：<span style=\"line-height:1.5;\"></span><span style=\"line-height:1.5;\">统一巧面馆红烧牛肉面</span><span style=\"line-height:1.5;\"></span>
</p>
<p style=\"text-align:left;\">
	<span style=\"line-height:1.5;\">保质期：180天</span>
</p>
<p style=\"text-align:left;\">
	<span style=\"line-height:1.5;\">净含量：103g/袋</span>
</p>
<p style=\"text-align:left;\">
	<span style=\"line-height:1.5;\">储藏方法：避免高温潮湿、直射日光常温保存</span>
</p>
<p>
	<br />
</p>','奥克斯空调','null','120g','null','null','0','0','0','19','100','50','0','1','null','null','0','null','11','null','1432111172','2.80','2');

INSERT INTO `twotree_goods` VALUES ('13','null','15','1','统一巧面馆老坛酸菜牛肉味面(原味) 125g/桶','/Data/upload/image/20151028/20151028143716_55708.jpg','/Data/upload/image/20151029/20151029104134_71432.jpg','/Data/upload/image/20151029/20151029104150_70238.jpg','0','3.80','4.50','1','1','<p style=\"text-align:left;\">
	商品编号:&nbsp;530007010436
</p>
<p style=\"text-align:left;\">
	产品名称：统一巧面馆老坛酸菜牛肉味面(原味)
</p>
<p style=\"text-align:left;\">
	保质期:&nbsp;180天
</p>
<p style=\"text-align:left;\">
	净含量:&nbsp;125g/桶
</p>
<p>
	储藏方法: 请避免高温潮湿、直射日光常温保存
</p>
<p>
	<br />
</p>
<p>
	<br />
</p>','奥克斯空调','null','120ml','null','null','0','0','0','19','100','7','0','1年','null','null','0','null','86','null','1432111265','3.80','1');

INSERT INTO `twotree_goods` VALUES ('14','null','15','1','康师傅 红烧牛肉面  袋装 103g/袋','/Data/upload/image/20151029/20151029105538_52451.jpg','/Data/upload/image/20151029/20151029105512_27146.jpg','/Data/upload/image/20151029/20151029105558_36084.jpg','0','2.80','3.50','1','1','<p style=\"text-align:left;\">
	商品编号:&nbsp;121607010002
</p>
<p style=\"text-align:left;\">
	<span style=\"line-height:1.5;\"> 商品名称：</span><span style=\"line-height:1.5;\"> 康师傅 红烧牛肉面袋装 </span> 
</p>
<p style=\"text-align:left;\">
	保质期:&nbsp;180天
</p>
<p style=\"text-align:left;\">
	净含量:&nbsp;103g
</p>
<p style=\"text-align:center;\">
	<br />
</p>
<p>
	<br />
</p>
<p>
	<br />
</p>
<p>
	<br />
</p>
<p>
	<br />
</p>','奥克斯空调','null','5片装','null','null','0','0','0','19','100','7','0','1年','null','null','0','null','5','null','1432111389','2.80','1');

INSERT INTO `twotree_goods` VALUES ('3','null','15','3','香飘飘奶茶  80g/瓶','/Data/upload/image/20151026/20151026191531_85415.jpg','/Data/upload/image/20151029/20151029155911_63670.jpg','/Data/upload/image/20151029/20151029155925_25759.jpg','0','3.00','3.50','瓶','1','<p style=\"text-align:left;\">
	商品编号:&nbsp;330506016466
</p>
<p style=\"text-align:left;\">
	商品名称：香飘飘奶茶&nbsp;
</p>
<p style=\"text-align:left;\">
	保质期:&nbsp;365
</p>
<p style=\"text-align:left;\">
	净含量:&nbsp;80g
</p>
<p style=\"text-align:left;\">
	配料表:&nbsp;详见包装
</p>','奥克斯空调','null','18g','null','null','0','0','0','19','100','9','0','1年','null','null','0','null','1','null','1419407601','3.00','1');

INSERT INTO `twotree_goods` VALUES ('4','null','15','3','康师傅冰红茶瓶装  500ml 瓶','/Data/upload/image/20151026/20151026191353_19527.jpg','/Data/upload/image/20151029/20151029160937_13666.jpg','/Data/upload/image/20151029/20151029160944_39981.jpg','0','2.50','3.00','瓶','1','<p style=\"text-align:left;\">
	<p style=\"color:#404040;font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;\">
		<span style=\"color:#000000;font-size:12px;font-family:SimSun;\">商品编号:&nbsp;440106010219<br />
</span>
	</p>
	<p style=\"color:#404040;font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;\">
		<span style=\"color:#000000;font-size:12px;font-family:SimSun;\">商品名称：康师傅冰红茶瓶装</span>
	</p>
	<p style=\"color:#404040;font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;\">
		<span style=\"color:#000000;font-size:12px;font-family:SimSun;\">净含量：500ml/瓶</span>
	</p>
	<p style=\"color:#404040;font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;\">
		<span style=\"line-height:1.5;color:#000000;font-size:12px;font-family:SimSun;\">保质期：12个月</span>
	</p>
	<p style=\"color:#404040;font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;\">
		<span style=\"line-height:1.5;color:#000000;font-size:12px;font-family:SimSun;\">储藏方法:&nbsp;存放于阴凉干爽处<br />
</span>
	</p>
	<p style=\"color:#404040;font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;\">
		<span style=\"color:#000000;font-size:12px;font-family:SimSun;\">&nbsp;</span>
	</p>
</p>','奥克斯空调','null','10ml','null','null','0','0','0','11','100','29','2','一年','null','null','0','null','12','null','1419573572','2.50','3');

INSERT INTO `twotree_goods` VALUES ('16','null','null','3','养元六个核桃   240ml/瓶','/Data/upload/image/20151026/20151026192041_92641.jpg','/Data/upload/image/20151029/20151029122214_77879.jpg','/Data/upload/image/20151029/20151029122236_71158.jpg','0','4.50','5.00','1','1','<p>
	商品编号:&nbsp;341106010903
</p>
<p>
	商品名称：养元六个核桃
</p>
<p>
	保质期:&nbsp;365天
</p>
<p>
	净含量:&nbsp;240ml/瓶
</p>
<p>
</p>','null','null','null','null','null','0','0','0','null','100','0','0','null','null','null','0','0','1','null','1445858443','4.50','0');

INSERT INTO `twotree_goods` VALUES ('17','null','null','3','王老吉 罐装凉茶  310ml/罐','/Data/upload/image/20151026/20151026192224_81397.jpg','/Data/upload/image/20151029/20151029123108_13348.jpg','/Data/upload/image/20151029/20151029142930_41750.jpg','0','3.50','3.50','1','1','<p>
	<span style=\"line-height:1.5;\">商品编号:&nbsp;350006010367</span> 
</p>
<p>
	<span style=\"line-height:1.5;\">商品名称：王老吉 罐装凉茶</span> 
</p>
<p>
	保质期:&nbsp;720天
</p>
<p>
	净含量:&nbsp;310ml/罐
</p>
<p>
	储藏方法:&nbsp;阴凉避光存储
</p>','null','null','null','null','null','0','0','0','null','100','0','0','null','null','null','0','0','1','null','1445858546','3.50','0');

INSERT INTO `twotree_goods` VALUES ('18','null','null','3','津威乳酸菌 100ml/瓶','/Data/upload/image/20151026/20151026192353_59504.jpg','/Data/upload/image/20151029/20151029124639_89480.jpg','/Data/upload/image/20151029/20151029124652_75728.jpg','0','1.80','2.00','1','1','<p>
	商品编号:&nbsp;441906011408
</p>
<p>
	商品名称：津威乳酸菌
</p>
<p>
	配料表:&nbsp;水、白砂糖、葡萄酸锌、乳酸
</p>
<p>
	<p>
		净含量:&nbsp;100ml/瓶
	</p>
	<p>
		保质期:&nbsp;270天
	</p>
</p>','null','null','null','null','null','0','0','0','null','100','0','0','null','null','null','0','0','1','null','1445858635','1.80','0');

INSERT INTO `twotree_goods` VALUES ('15','aux2015','1','1','康师傅 香辣牛肉面  桶装 108g/桶','/Data/upload/image/20151029/20151029114018_24628.jpg','/Data/upload/image/20151029/20151029113952_33774.jpg','/Data/upload/image/20151029/20151029114003_92817.jpg','0','4.00','4.50','1','1','<p>
	<span>商品编号:&nbsp;330007010013</span>
</p>
<p>
	商品名称：康师傅香辣方便面
</p>
<p>
	<span style=\"line-height:1.5;\">保质期:&nbsp;180天</span>
</p>
<p>
	<span style=\"line-height:1.5;\">净含量:&nbsp;108g/桶<br />
</span>
</p>
<p>
	储藏方法:&nbsp;存放于阴凉干燥处
</p>','<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">上市时间</span><span style=\\\"font-size:14px;\\\">2014-4</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">空调品牌</span><span style=\\\"font-size:14px;\\\">AUX/奥克斯</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">奥克斯空调型号</span><span style=\\\"font-size:14px;\\\">KFR-50GW/SA+3</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">空调面板颜色</span><span style=\\\"font-size:14px;\\\">香槟色</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">空调类型</span><span style=\\\"font-size:14px;\\\">AUX/壁挂式</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">冷暖类型</span><span style=\\\"font-size:14px;\\\">冷暖电辅</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">空调功率</span><span style=\\\"font-size:14px;\\\">大2匹</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">适用面积</span><span style=\\\"font-size:14px;\\\">26-34㎡</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">工作方式</span><span style=\\\"font-size:14px;\\\">定速</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">能效等级</span><span style=\\\"font-size:14px;\\\">三级</span> 
</p>','<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">制冷功率</span><span style=\\\"font-size:14px;\\\">1607W</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">制冷量</span><span style=\\\"font-size:14px;\\\">5000W</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">制热功率</span><span style=\\\"font-size:14px;\\\">2000W</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">制热量</span><span style=\\\"font-size:14px;\\\">5500W</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">室内机噪音</span><span style=\\\"font-size:14px;\\\">47dB</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">室外机噪音</span><span style=\\\"font-size:14px;\\\">57dB</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">电辅加热功率</span><span style=\\\"font-size:14px;\\\">1500W</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">是否循环风量</span><span style=\\\"font-size:14px;\\\">950m3/h</span> 
</p>','<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">内机包装尺寸</span><span style=\\\"font-size:14px;\\\">1607W</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">内机尺寸</span><span style=\\\"font-size:14px;\\\">5000W</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">内机毛重</span><span style=\\\"font-size:14px;\\\">2000W</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">外机包装尺寸</span><span style=\\\"font-size:14px;\\\">5500W</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">外机尺寸</span><span style=\\\"font-size:14px;\\\">47dB</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">外机毛重</span><span style=\\\"font-size:14px;\\\">57dB</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">室外机净质量</span><span style=\\\"font-size:14px;\\\">1500W</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">室内机净质量</span><span style=\\\"font-size:14px;\\\">950m3/h</span> 
</p>','<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">室内机组</span><span style=\\\"font-size:14px;\\\">1 件</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">遥控器</span><span style=\\\"font-size:14px;\\\">1 件</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">使用安装说明书</span><span style=\\\"font-size:14px;\\\">1 件</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">安装保修卡</span><span style=\\\"font-size:14px;\\\">1 件</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">机型规格单页</span><span style=\\\"font-size:14px;\\\">1 件</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">电池</span><span style=\\\"font-size:14px;\\\">1 件</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">排水管</span><span style=\\\"font-size:14px;\\\">1 件</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">室外机组</span><span style=\\\"font-size:14px;\\\">1 件/h</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">连接管</span><span style=\\\"font-size:14px;\\\">1 件</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">塑料扎带</span><span style=\\\"font-size:14px;\\\">1 件</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">穿墙管护圈</span><span style=\\\"font-size:14px;\\\">1 件</span> 
</p>
<p style=\\\"font-size:24px;color:#666666;font-family:SimHei;background-color:#FFFFFF;\\\">
	<span class=\\\"color_96\\\" style=\\\"font-size:14px;\\\">密封胶泥</span><span style=\\\"font-size:14px;\\\">1 件</span> 
</p>','null','0','0','0','19','100','10','0','1','s:6:\"白色\";','N;','20','200','363','1.5p','1432202086','4.00','2');

INSERT INTO `twotree_goods` VALUES ('5','null','15','1','达利园好吃点香脆（核桃）108g/包','/Data/upload/image/20151026/20151026191232_87442.jpg','/Data/upload/image/20151029/20151029161120_66285.jpg','/Data/upload/image/20151029/20151029161130_52017.jpg','0','2.80','4.50','瓶','1','<p style=\"text-align:left;\">
	商品编号:&nbsp;350006010117
</p>
<p style=\"text-align:left;\">
	<span></span><span style=\"line-height:1.5;background-color:#FFFFFF;font-family:tahoma, arial, \'Hiragino Sans GB\', 宋体, sans-serif;\">产品名称:&nbsp;好吃点香脆核桃饼饼干</span>
</p>
<p style=\"text-align:left;\">
	<span style=\"background-color:#FFFFFF;font-family:tahoma, arial, \'Hiragino Sans GB\', 宋体, sans-serif;line-height:1.5;\"><span style=\"font-family:tahoma, arial, \'Hiragino Sans GB\', 宋体, sans-serif;background-color:#FFFFFF;\">保质期:&nbsp;300天</span></span>
</p>
<p style=\"text-align:left;\">
	<span style=\"background-color:#FFFFFF;font-family:tahoma, arial, \'Hiragino Sans GB\', 宋体, sans-serif;line-height:1.5;\"><span style=\"font-family:tahoma, arial, \'Hiragino Sans GB\', 宋体, sans-serif;background-color:#FFFFFF;\">净含量：108g/包</span></span>
</p>
<p style=\"text-align:left;\">
	<span style=\"background-color:#FFFFFF;font-family:tahoma, arial, \'Hiragino Sans GB\', 宋体, sans-serif;line-height:1.5;\"><span style=\"font-family:tahoma, arial, \'Hiragino Sans GB\', 宋体, sans-serif;background-color:#FFFFFF;\">储藏方法:&nbsp;阴凉干燥处，避免阳光直射<br />
</span></span>
</p>','奥克斯空调','null','58g','null','null','0','0','0','50','100','50','1','1年','null','null','0','null','29','null','1420021585','2.80','3');

INSERT INTO `twotree_goods` VALUES ('19','null','null','2','口水娃多味花生香辣味  30g/包','/Data/upload/image/20151026/20151026192502_73635.jpg','/Data/upload/image/20151029/20151029141817_52613.jpg','/Data/upload/image/20151029/20151029141959_71009.jpg','0','1.30','1.50','1','1','<p>
	<span style=\"color:#000000;font-family:tahoma, arial, 宋体, sans-serif;font-size:12px;line-height:19px;background-color:#FFFFFF;\">商品编号:&nbsp;320518010346</span> 
</p>
<p>
	<span style=\"color:#000000;font-family:tahoma, arial, 宋体, sans-serif;font-size:12px;line-height:19px;background-color:#FFFFFF;\">保质期:&nbsp;270天</span> 
</p>
<p>
	<span style=\"color:#404040;font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;line-height:19px;background-color:#FFFFFF;\"><span style=\"color:#000000;font-size:12px;\"></span><span style=\"color:#000000;font-size:12px;\"></span><span style=\"color:#000000;font-size:12px;\">规格：30g/包</span></span> 
</p>
<p>
	<span style=\"color:#404040;font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;line-height:19px;background-color:#FFFFFF;\"> </span>
</p>
<p style=\"color:#404040;font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;\">
	<span style=\"color:#000000;font-size:12px;\">食用方法：开袋即食</span> 
</p>
<p style=\"color:#404040;font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;\">
	<span style=\"color:#000000;font-size:12px;\">贮存方法：常温避光</span> 
</p>
<br />
<p>
	<br />
</p>','null','null','null','null','null','0','0','0','null','100','0','0','null','null','null','0','0','7','null','1445858704','1.30','0');

INSERT INTO `twotree_goods` VALUES ('20','null','null','2','味之韵香辣金针菇  20g/包','/Data/upload/image/20151029/20151029143018_92372.gif','/Data/upload/image/20151029/20151029142959_28459.gif','/Data/upload/image/20151029/20151029143009_40866.gif','0','1.00','1.50','1','1','<p>
	商品名称：味之韵香辣金针菇
</p>
<p>
	净含量：20/包
</p>
<p>
	<br />
</p>','null','null','null','null','null','0','0','0','null','100','0','0','null','null','null','0','0','5','null','1445858827','1.00','0');

INSERT INTO `twotree_goods` VALUES ('21','null','null','2','劲仔小鱼麻辣味 15g/包','/Data/upload/image/20151026/20151026194217_27995.jpg','/Data/upload/image/20151029/20151029144531_73923.jpg','/Data/upload/image/20151029/20151029144544_45054.jpg','0','1.00','1.00','1','1','<p>
	商品编号:&nbsp;430622020161
</p>
<p>
	产品名称:&nbsp;劲仔 麻辣小鱼
</p>
<p>
	净含量:&nbsp;15g
</p>
<p>
	保质期:&nbsp;365天
</p>
<p>
	储藏方法:&nbsp;30度以下阴凉避光保存
</p>','null','null','null','null','null','0','0','0','null','100','0','0','null','null','null','0','0','4','null','1445858878','1.00','0');

INSERT INTO `twotree_goods` VALUES ('22','null','null','2','洽洽香瓜子  110g/袋','/Data/upload/image/20151026/20151026192914_30909.jpg','/Data/upload/image/20151029/20151029144937_35642.jpg','/Data/upload/image/20151029/20151029144947_60144.jpg','0','3.50','4.00','1','1','<p>
	商品编号：340118010002
</p>
<p>
	商品名称：洽洽 110g香瓜子
</p>
<p>
	保质期：240 天
</p>
<p>
	净含量:&nbsp;110g/袋
</p>
<p>
	储藏方法：避光保存
</p>
<p>
	<br />
</p>','null','null','null','null','null','0','0','0','null','100','0','0','null','null','null','0','0','0','null','1445858958','3.50','0');

INSERT INTO `twotree_goods` VALUES ('23','null','null','2','友伦 鱼豆腐香辣味 独立包  18g/包','/Data/upload/image/20151026/20151026193031_88535.jpg','/Data/upload/image/20151029/20151029145423_51984.jpg','/Data/upload/image/20151029/20151029145444_21752.jpg','0','1.00','1.50','1','1','<p>
	商品名称：友伦 鱼豆腐香辣味&nbsp;
</p>
<p>
	净含量：18g/包
</p>
<p>
	保质期：180天
</p>
<p>
	储藏方法:&nbsp;置于阴凉处 避免阳光直射
</p>','null','null','null','null','null','0','0','0','null','100','0','0','null','null','null','0','0','1','null','1445859035','1.00','0');

INSERT INTO `twotree_goods` VALUES ('24','null','null','2','湘味传说艾尚你手撕素手卷26克/包','/Data/upload/image/20151026/20151026193230_96492.jpg','/Data/upload/image/20151029/20151029150331_21348.jpg','/Data/upload/image/20151029/20151029150339_15309.jpg','0','1.00','1.50','1','1','<p>
	商品名称：湘味传说艾尚你手撕素手卷
</p>
<p>
	<span>净含量：26克/包</span>
</p>','null','null','null','null','null','0','0','0','null','100','0','0','null','null','null','0','0','0','null','1445859153','1.00','0');

INSERT INTO `twotree_goods` VALUES ('25','null','null','2','友伦泡凤爪 90g/包','/Data/upload/image/20151026/20151026193346_96132.jpg','/Data/upload/image/20151029/20151029150547_75571.jpg','/Data/upload/image/20151029/20151029150715_10931.jpg','0','3.50','4.00','1','1','<p>
	商品编号：510004011504
</p>
<p>
	商品名称：友伦泡凤爪
</p>
<p>
	保质期：270天
</p>
<p>
	净含量: 90g/包
</p>
<p>
	储藏方法：阴凉、避光、防潮、勿压
</p>
<p>
</p>','null','null','null','null','null','0','0','0','null','100','0','0','null','null','null','0','0','1','null','1445859228','3.50','0');

INSERT INTO `twotree_goods` VALUES ('39','null','null','4','多邦垃圾袋45cm*55cm','/Data/upload/image/20151028/20151028134931_51278.jpg','/Data/upload/image/20151029/20151029174431_36573.jpg','/Data/upload/image/20151029/20151029174445_33664.jpg','0','2.00','null','45cm*','1','<p>
	商品名称：多邦垃圾袋
</p>
<p>
	规格：45cm*55cm
</p>
<p>
	<span style=\"font-size:12px;font-family:SimSun;\">垃圾袋类型:&nbsp;点断型</span><span style=\"font-size:12px;font-family:SimSun;\"></span>
</p>
<p>
	<span style=\"font-size:12px;font-family:SimSun;\">垃圾袋属性:&nbsp;卷装</span>
</p>
<p>
	<span style=\"font-size:12px;font-family:SimSun;\">只数：30只及以上<br />
</span>
</p>','null','null','null','null','null','0','0','0','null','20','0','0','null','null','null','0','0','5','null','1446011433','2.00','11');

--
-- 数据表中的数据: `twotree_goods_brand`
--

INSERT INTO `twotree_goods_brand` VALUES ('15','1,2,3,4','叮咕','/Data/upload/image/20151015/20151015151112_41808.png','99','null','1432096437');

--
-- 数据表中的数据: `twotree_goods_category`
--

INSERT INTO `twotree_goods_category` VALUES ('1','0','/Data/upload/image/20151020/20151020135855_90406.png','充饥','99','1','0','null','1444568038');

INSERT INTO `twotree_goods_category` VALUES ('2','0','/Data/upload/image/20151020/20151020135945_52058.png','解馋','99','1','0','null','1444568076');

INSERT INTO `twotree_goods_category` VALUES ('3','0','/Data/upload/image/20151020/20151020135909_28962.png','解渴','99','1','0','null','1444568088');

INSERT INTO `twotree_goods_category` VALUES ('4','0','/Data/upload/image/20151020/20151020135958_70617.png','日用','99','1','0','null','1444568105');

--
-- 数据表中的数据: `twotree_goods_collect`
--

INSERT INTO `twotree_goods_collect` VALUES ('1','1','15','康师傅桶装泡面膜','/Data/upload/image/20151015/20151015150529_43401.jpg','1444901039');

INSERT INTO `twotree_goods_collect` VALUES ('2','7','4','沙琪玛','/Data/upload/image/20151020/20151020100456_76170.jpg','1445322035');

INSERT INTO `twotree_goods_collect` VALUES ('3','6','5','肉松面包','/Data/upload/image/20151020/20151020100236_96877.jpg','1445345740');

INSERT INTO `twotree_goods_collect` VALUES ('4','2','4','沙琪玛','/Data/upload/image/20151020/20151020100456_76170.jpg','1445388382');

INSERT INTO `twotree_goods_collect` VALUES ('5','2','5','肉松面包','/Data/upload/image/20151020/20151020100236_96877.jpg','1445388387');

INSERT INTO `twotree_goods_collect` VALUES ('6','2','15','康师傅桶装泡面膜','/Data/upload/image/20151015/20151015150529_43401.jpg','1445388396');

INSERT INTO `twotree_goods_collect` VALUES ('7','2','11','素牛筋','/Data/upload/image/20151020/20151020093406_65607.jpg','1445388411');

INSERT INTO `twotree_goods_collect` VALUES ('8','1','4','沙琪玛','/Data/upload/image/20151020/20151020100456_76170.jpg','1445437847');

INSERT INTO `twotree_goods_collect` VALUES ('9','7','5','肉松面包','/Data/upload/image/20151020/20151020100236_96877.jpg','1445828241');

INSERT INTO `twotree_goods_collect` VALUES ('10','7','12','有友泡凤爪','/Data/upload/image/20151020/20151020095545_12065.jpg','1445833435');

INSERT INTO `twotree_goods_collect` VALUES ('11','2','1','雪碧','/Data/upload/image/20151020/20151020101555_28237.jpg','1445839196');

INSERT INTO `twotree_goods_collect` VALUES ('12','7','3','酒鬼花生','/Data/upload/image/20151020/20151020100759_58960.jpg','1445842299');

INSERT INTO `twotree_goods_collect` VALUES ('13','2','12','有友泡凤爪','/Data/upload/image/20151020/20151020095545_12065.jpg','1445847989');

INSERT INTO `twotree_goods_collect` VALUES ('14','21','33','湘味传说艾尚你长沙臭豆腐  25g/包','/Data/upload/image/20151026/20151026194551_77738.jpg','1445864174');

INSERT INTO `twotree_goods_collect` VALUES ('15','2','14','康师傅 红烧牛肉面  袋装 103g/袋','/Data/upload/image/20151026/20151026185557_95462.jpg','1445867095');

INSERT INTO `twotree_goods_collect` VALUES ('16','2','13','统一巧面馆老坛酸菜牛肉味面(原味) 125g/桶','/Data/upload/image/20151026/20151026185804_27460.jpg','1445867098');

INSERT INTO `twotree_goods_collect` VALUES ('17','9','31','旺旺小小酥（黑胡椒）60g/包','/Data/upload/image/20151026/20151026194026_57136.jpg','1445867116');

INSERT INTO `twotree_goods_collect` VALUES ('18','9','34','湘味传说艾尚你酱香鸭翅 20g/包','/Data/upload/image/20151026/20151026194411_14103.jpg','1445867131');

INSERT INTO `twotree_goods_collect` VALUES ('19','37','9','盼盼法式奶香面包5枚 100g/袋','/Data/upload/image/20151026/20151026190729_86863.jpg','1445870951');

INSERT INTO `twotree_goods_collect` VALUES ('20','7','9','盼盼法式奶香面包5枚 100g/袋','/Data/upload/image/20151026/20151026190729_86863.jpg','1445917909');

INSERT INTO `twotree_goods_collect` VALUES ('21','7','7','老北京蜂蜜枣糕  60g/袋','/Data/upload/image/20151026/20151026191055_37221.jpeg','1445918551');

INSERT INTO `twotree_goods_collect` VALUES ('22','2','39','多邦垃圾袋45cm*55cm','/Data/upload/image/20151028/20151028134931_51278.jpg','1446014324');

INSERT INTO `twotree_goods_collect` VALUES ('23','2','2','娃哈哈 AD钙奶 220ml/瓶','/Data/upload/image/20151026/20151026191700_93899.jpg','1446047936');

INSERT INTO `twotree_goods_collect` VALUES ('24','1','7','老北京蜂蜜枣糕  60g/袋','/Data/upload/image/20151026/20151026191055_37221.jpeg','1446130480');

--
-- 数据表中的数据: `twotree_goods_comment`
--

INSERT INTO `twotree_goods_comment` VALUES ('1','15','aux空调','http://www.wxaux.bb:8080/Data/upload/image/20150806/20150806135720_82743.png','装修囤货中，也没拆开来看，等师傅上门安装再拆咯！ 相信大品牌！送','0','90','http://www.wxaux.bb:8080/Public/Weixin/images/head.png','aux005','4','1432600188');

INSERT INTO `twotree_goods_comment` VALUES ('2','15','奥克斯空调','/Data/upload/image/20150523/20150523191848_76381.png','东西不错，物流也很给力','0','90','http://www.wxaux.bb:8080/Public/Weixin/images/head.png','jack005','5','1439098992');

INSERT INTO `twotree_goods_comment` VALUES ('3','15','奥克斯空调','/Data/upload/image/20150523/20150523191848_76381.png','东西不错，物流给力','0','90','./Data/upload/headimg/thumb_90.jpg','jack005','5','1439099106');

INSERT INTO `twotree_goods_comment` VALUES ('4','15','奥克斯空调','/Data/upload/image/20150523/20150523191848_76381.png','东西一般，物流一般','0','90','./Data/upload/headimg/thumb_90.jpg','jack005','2','1439099212');

--
-- 数据表中的数据: `twotree_goods_recommend`
--

INSERT INTO `twotree_goods_recommend` VALUES ('1','90','1','1439280898');

INSERT INTO `twotree_goods_recommend` VALUES ('2','90','7','1439280905');

INSERT INTO `twotree_goods_recommend` VALUES ('3','90','8','1439280927');

INSERT INTO `twotree_goods_recommend` VALUES ('4','90','9','1439280929');

--
-- 数据表中的数据: `twotree_goods_store`
--

INSERT INTO `twotree_goods_store` VALUES ('1','2','华南仓库','1','aux2015-001','柜式变频空调2p（北京有货）','null','null','null','null','null','null','1000');

INSERT INTO `twotree_goods_store` VALUES ('2','1','华北仓库','2','aux2015-002','柜式变品空调2.5p','null','null','null','null','null','null','189');

--
-- 数据表中的数据: `twotree_hot_city`
--

INSERT INTO `twotree_hot_city` VALUES ('1','321','上海');

INSERT INTO `twotree_hot_city` VALUES ('3','311','西安');

INSERT INTO `twotree_hot_city` VALUES ('4','76','广州');

INSERT INTO `twotree_hot_city` VALUES ('9','52','北京');

--
-- 数据表中的数据: `twotree_jifen_config`
--

INSERT INTO `twotree_jifen_config` VALUES ('1','5','10','1','1','5','15');

--
-- 数据表中的数据: `twotree_jifen_goods`
--

INSERT INTO `twotree_jifen_goods` VALUES ('1','jifen001','null','null','小米移动电源','/Data/upload/image/20151014/20151014133738_36938.png','0','136.00','299.00','个','1','null','移动电源','移动电源，积分即可兑换','0','0','0','19','0','0','null','null','N;','N;');

--
-- 数据表中的数据: `twotree_jifen_order`
--

INSERT INTO `twotree_jifen_order` VALUES ('1','90','201508081358','1','0','段少波','18','244','2073','民间艺术团','null','null','18710950674','null','138.00','0','0.00','0','1','1439018011','0','0','0','2','0','0','0.00','0','null');

INSERT INTO `twotree_jifen_order` VALUES ('2','90','1508081403357101','1','0','段少波','null','null','null','景德镇','null','null','18710950674','null','276.00','0','0.00','0','1','1439013815','0','0','0','2','0','0','0.00','0','null');

INSERT INTO `twotree_jifen_order` VALUES ('5','90','1508081518501935','1','0',' 段百万','吉林','延边','汪清县','松花江','null','null','1871095677','null','276.00','0','0.00','0','1','1439018330','0','0','0','2','0','0','0.00','0','null');

INSERT INTO `twotree_jifen_order` VALUES ('6','90','JF08091419337109','2','0',' 段百万','吉林','延边','汪清县','松花江','null','null','1871095677','null','138.00','0','0.00','0','1','1439101173','0','0','0','2','0','0','0.00','0','null');

--
-- 数据表中的数据: `twotree_jifen_order_goods`
--

INSERT INTO `twotree_jifen_order_goods` VALUES ('66','2','1','移动电源','2','138.00','/Data/upload/image/20150715/20150715181613_53409.jpg');

INSERT INTO `twotree_jifen_order_goods` VALUES ('69','5','1','移动电源','2','138.00','/Data/upload/image/20150715/20150715181613_53409.jpg');

INSERT INTO `twotree_jifen_order_goods` VALUES ('70','6','1','移动电源','1','138.00','/Data/upload/image/20150715/20150715181613_53409.jpg');

INSERT INTO `twotree_jifen_order_goods` VALUES ('65','1','0','移动电源','1','138.00','/Data/upload/image/20150715/20150715181613_53409.jpg');

--
-- 数据表中的数据: `twotree_jifen_water`
--

INSERT INTO `twotree_jifen_water` VALUES ('1','1','1','5','sign','签到','1444887400','0');

INSERT INTO `twotree_jifen_water` VALUES ('2','4','1','5','sign','签到','1445318695','0');

INSERT INTO `twotree_jifen_water` VALUES ('3','2','1','5','sign','签到','1445330622','0');

INSERT INTO `twotree_jifen_water` VALUES ('4','4','1','5','sign','签到','1445483944','0');

INSERT INTO `twotree_jifen_water` VALUES ('5','4','1','5','sign','签到','1445825720','0');

INSERT INTO `twotree_jifen_water` VALUES ('6','3','1','5','sign','签到','1445840242','0');

INSERT INTO `twotree_jifen_water` VALUES ('7','2','1','5','sign','签到','1445841722','0');

INSERT INTO `twotree_jifen_water` VALUES ('8','21','1','5','sign','签到','1445860877','0');

INSERT INTO `twotree_jifen_water` VALUES ('9','9','1','5','sign','签到','1445867862','0');

INSERT INTO `twotree_jifen_water` VALUES ('10','2','1','5','sign','签到','1445877426','0');

INSERT INTO `twotree_jifen_water` VALUES ('11','2','1','5','sign','签到','1446047760','0');

--
-- 数据表中的数据: `twotree_message_config`
--

INSERT INTO `twotree_message_config` VALUES ('1','smtp.163.com','奥克斯','奥克斯');

--
-- 数据表中的数据: `twotree_money_water`
--

INSERT INTO `twotree_money_water` VALUES ('1','93','1','130','1','分销佣金','39','1439260695');

INSERT INTO `twotree_money_water` VALUES ('2','90','1','70','1','分销佣金','39','1439260695');

INSERT INTO `twotree_money_water` VALUES ('3','93','1','130','1','分销佣金','39','1439260695');

INSERT INTO `twotree_money_water` VALUES ('4','90','1','70','1','分销佣金','39','1439260695');

INSERT INTO `twotree_money_water` VALUES ('5','90','1','0','0','分销佣金','46','1440688747');

INSERT INTO `twotree_money_water` VALUES ('6','90','1','0','0','分销佣金','46','1440688981');

INSERT INTO `twotree_money_water` VALUES ('7','90','1','65','0','分销佣金','46','1440689228');

--
-- 数据表中的数据: `twotree_navlink`
--

INSERT INTO `twotree_navlink` VALUES ('1','0','1','开店','null','0');

INSERT INTO `twotree_navlink` VALUES ('2','1','1','店铺管理','/index.php?g=Weixin&m=Ucenter&a=shop_config','0');

INSERT INTO `twotree_navlink` VALUES ('3','1','1','店铺首页','/index.php?g=Weixin&m=Index&a=shop_index','0');

INSERT INTO `twotree_navlink` VALUES ('4','1','1','我要开店','/index.php?g=Weixin&m=Member&a=shop_reg','0');

INSERT INTO `twotree_navlink` VALUES ('5','0','1','买空调','null','0');

INSERT INTO `twotree_navlink` VALUES ('6','5','1','不限','/index.php?g=Weixin&m=Index&a=product_list','0');

INSERT INTO `twotree_navlink` VALUES ('7','5','1','定频挂机','/index.php?g=Weixin&m=Index&a=product_list&id=6','0');

INSERT INTO `twotree_navlink` VALUES ('8','5','1','定频柜机','/index.php?g=Weixin&m=Index&a=product_list&id=7','0');

INSERT INTO `twotree_navlink` VALUES ('9','5','1','变频挂机','/index.php?g=Weixin&m=Index&a=product_list&id=8','0');

INSERT INTO `twotree_navlink` VALUES ('10','5','1','变频柜机','/index.php?g=Weixin&m=Index&a=product_list&id=9','0');

INSERT INTO `twotree_navlink` VALUES ('11','0','1','服务','null','0');

INSERT INTO `twotree_navlink` VALUES ('12','11','1','附近门店','null','0');

INSERT INTO `twotree_navlink` VALUES ('13','11','1','常见故障','null','0');

INSERT INTO `twotree_navlink` VALUES ('14','11','1','人工服务','null','0');

INSERT INTO `twotree_navlink` VALUES ('15','11','1','保养DIY','null','0');

INSERT INTO `twotree_navlink` VALUES ('16','1','1','个人中心','/index.php?g=Weixin&m=Ucenter&a=index','0');

--
-- 数据表中的数据: `twotree_network`
--

INSERT INTO `twotree_network` VALUES ('1','sss');

--
-- 数据表中的数据: `twotree_news`
--

INSERT INTO `twotree_news` VALUES ('1','清明小长假，陕西旅游好去处大盘点第一期','西汇金属','想好切哪里耍木？掰着手指数一哈，清明小长假马上就要到了，如果不出去走走，那就太可惜了！','null','1');

INSERT INTO `twotree_news` VALUES ('7','上市公司发行优先股相关信息披露准则正式发布','西部金属','&lt;p&gt;人民网北京4月4日电 
（达昱岐）证监会4日下午召开新闻发布会，证监会新闻发言人在会上表示，2014年4月1日，中国证监会制定并发布了上市公司发行优先股相关信息披露准
则，其中包括《公开发行证券的公司信息披露内容与格式准则第32号——发行优先股申请文件》等三个准则。&lt;img src=\\&quot;http://dyljav.vicp.cc/plugins/ueditor/php/upload/20140404/13966003359943.jpeg\\&quot; _src=\\&quot;http://dyljav.vicp.cc/plugins/ueditor/php/upload/20140404/13966003359943.jpeg\\&quot;/&gt;&lt;/p&gt;','1396600339','1');

INSERT INTO `twotree_news` VALUES ('8','周四美股热度减退道指微跌 静候非农就业数据','西部金属','&lt;div class=\\&quot;content1\\&quot; id=\\&quot;content\\&quot;&gt;&lt;p style=\\&quot;TEXT-JUSTIFY: distribute; TEXT-ALIGN: justify; TEXT-INDENT: 30px; MARGIN: 0px 3px 15px\\&quot; align=\\&quot;justify\\&quot;&gt;“国务院版”私募法规正征求意见&lt;img src=\\&quot;http://dyljav.vicp.cc/plugins/ueditor/php/upload/20140404/13966007911889.jpeg\\&quot; _src=\\&quot;http://dyljav.vicp.cc/plugins/ueditor/php/upload/20140404/13966007911889.jpeg\\&quot;/&gt;&lt;/p&gt;&lt;p style=\\&quot;TEXT-JUSTIFY: distribute; TEXT-ALIGN: justify; TEXT-INDENT: 30px; MARGIN: 0px 3px 15px\\&quot; align=\\&quot;justify\\&quot;&gt;本报讯
（记者吴倩）&lt;span name=\\&quot;HL_TAG\\&quot; style=\\&quot;border-bottom:dotted 0px;color:#0084D8;text-decoration:underline;cursor:hand\\&quot;&gt;私募基金&lt;/span&gt;的规范化发展正在有序推荐。近日，基金业协会已为100家私募基金颁发登记证书，而据报道，国务院法制办也正在就证监会报送的《私募投资基金管理暂行条例》征求业界意见。&lt;/p&gt;&lt;p style=\\&quot;TEXT-JUSTIFY: distribute; TEXT-ALIGN: justify; TEXT-INDENT: 30px; MARGIN: 0px 3px 15px\\&quot; align=\\&quot;justify\\&quot;&gt;据悉，正在征求意见的《&lt;span name=\\&quot;HL_TAG\\&quot; style=\\&quot;border-bottom:dotted 0px;color:#0084D8;text-decoration:underline;cursor:hand\\&quot;&gt;条例&lt;/span&gt;》
界定了证监会、发改委及央行在私募基金监管中的角色。“国务院版”《条例》第六章“监督管理”要求，证监会“定期将股权投资基金的备案和统计监测等情况”
通报给发改部门；发改部门“发现股权投资基金存在不符合有关发展规划和产业投资政策的，及时通报国务院证券监督管理机构进行查处”。&lt;/p&gt;&lt;p style=\\&quot;TEXT-JUSTIFY: distribute; TEXT-ALIGN: justify; TEXT-INDENT: 30px; MARGIN: 0px 3px 15px\\&quot; align=\\&quot;justify\\&quot;&gt;此外，&lt;span name=\\&quot;HL_TAG\\&quot; style=\\&quot;border-bottom:dotted 0px;color:#0084D8;text-decoration:underline;cursor:hand\\&quot;&gt;证监会&lt;/span&gt;和央行将“建立私募基金风险提示部门间协调配合机制，实现信息共享”。&lt;/p&gt;&lt;p style=\\&quot;TEXT-JUSTIFY: distribute; TEXT-ALIGN: justify; TEXT-INDENT: 30px; MARGIN: 0px 3px 15px\\&quot; align=\\&quot;justify\\&quot;&gt;并且，再次强调了证监会的监管权。据《条例》，国务院证券监督管理机构有权自行或者授权派出机构，依法对私募基金管理人、私募基金托管人、私募基金销售机构等开展私募基金业务情况，定期或者不定期进行非现场检查和现场检查。&lt;/p&gt;&lt;p style=\\&quot;TEXT-JUSTIFY: distribute; TEXT-ALIGN: justify; TEXT-INDENT: 30px; MARGIN: 0px 3px 15px\\&quot; align=\\&quot;justify\\&quot;&gt;此外，去年6月1日颁布实施的新《基金法》首次将私募基金纳入法律范畴，即非公开募集&lt;span name=\\&quot;HL_TAG\\&quot; style=\\&quot;border-bottom:dotted 0px;color:#0084D8;text-decoration:underline;cursor:hand\\&quot;&gt;基金财产&lt;/span&gt;的证券投资，包括买卖公开发行的股份有限公司股票、债券、基金份额及国务院证券监督管理机构规定的其他证券及其衍生品种。&lt;/p&gt;&lt;p style=\\&quot;TEXT-JUSTIFY: distribute; TEXT-ALIGN: justify; TEXT-INDENT: 30px; MARGIN: 0px 3px 15px\\&quot; align=\\&quot;justify\\&quot;&gt;而此《条例》首次将投资于一二级市场的非公开募集的基金统称为私募基金，并在监管、税收、处罚等各方面进行了完善。&lt;/p&gt;&lt;/div&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;','1396600805','1');

--
-- 数据表中的数据: `twotree_node`
--

INSERT INTO `twotree_node` VALUES ('1','Admin','后台应用','1','null','1','0','1');

INSERT INTO `twotree_node` VALUES ('2','Index','前端应用','0','null','1','0','1');

INSERT INTO `twotree_node` VALUES ('4','RBAC','RBAC权限控制','1','null','9','1','2');

INSERT INTO `twotree_node` VALUES ('5','Index','后台首页','1','null','8','1','2');

INSERT INTO `twotree_node` VALUES ('8','index','用户列表','1','null','1','4','3');

INSERT INTO `twotree_node` VALUES ('9','role','角色列表','1','null','1','4','3');

INSERT INTO `twotree_node` VALUES ('10','node','节点列表','1','null','1','4','3');

INSERT INTO `twotree_node` VALUES ('11','addUser','添加用户','1','null','1','4','3');

INSERT INTO `twotree_node` VALUES ('12','addRole','添加角色','1','null','1','4','3');

INSERT INTO `twotree_node` VALUES ('13','addNode','添加节点','1','null','1','4','3');

INSERT INTO `twotree_node` VALUES ('14','index','后台首页','1','null','1','5','3');

INSERT INTO `twotree_node` VALUES ('15','News','微信新闻','1','null','10','1','2');

INSERT INTO `twotree_node` VALUES ('16','index','发布新闻','1','null','1','15','3');

INSERT INTO `twotree_node` VALUES ('17','newslist','新闻列表','1','null','2','15','3');

INSERT INTO `twotree_node` VALUES ('18','newsdel','删除新闻','1','null','3','15','3');

INSERT INTO `twotree_node` VALUES ('19','newsdetail','保存新闻','1','null','4','15','3');

INSERT INTO `twotree_node` VALUES ('20','Wxusers','微信会员','1','null','3','1','2');

INSERT INTO `twotree_node` VALUES ('21','index','会员列表','1','null','1','20','3');

INSERT INTO `twotree_node` VALUES ('22','CmsSort','CMS栏目管理','1','null','1','1','2');

INSERT INTO `twotree_node` VALUES ('23','sortlist','栏目列表','1','null','1','22','3');

INSERT INTO `twotree_node` VALUES ('24','sortadd','栏目增改','1','null','2','22','3');

INSERT INTO `twotree_node` VALUES ('25','sortdel','栏目删除','1','null','3','22','3');

INSERT INTO `twotree_node` VALUES ('26','CmsArt','CMS文章管理','1','null','2','1','2');

INSERT INTO `twotree_node` VALUES ('27','artlist','文章列表','1','null','1','26','3');

INSERT INTO `twotree_node` VALUES ('28','artadd','文章增改','1','null','2','26','3');

INSERT INTO `twotree_node` VALUES ('29','artdel','文章删除','1','null','3','26','3');

INSERT INTO `twotree_node` VALUES ('30','edit','查看/编辑用户信息','1','null','1','20','3');

INSERT INTO `twotree_node` VALUES ('31','Goods','商品管理-微信商城','1','null','1','1','2');

INSERT INTO `twotree_node` VALUES ('32','index','商品列表','1','null','1','31','3');

INSERT INTO `twotree_node` VALUES ('33','add','添加商品','1','null','1','31','3');

INSERT INTO `twotree_node` VALUES ('34','edit','编辑商品','1','null','1','31','3');

INSERT INTO `twotree_node` VALUES ('35','GoodsCate','商品分类管理-微信商城','1','null','1','1','2');

INSERT INTO `twotree_node` VALUES ('36','index','分类列表','1','null','1','35','3');

INSERT INTO `twotree_node` VALUES ('37','add','添加分类','1','null','1','35','3');

INSERT INTO `twotree_node` VALUES ('38','edit','编辑分类','1','null','1','35','3');

INSERT INTO `twotree_node` VALUES ('39','GoodsBrand','商品品牌管理-微信商城','1','null','1','1','2');

INSERT INTO `twotree_node` VALUES ('40','index','品牌列表','1','null','1','39','3');

INSERT INTO `twotree_node` VALUES ('41','add','新增品牌','1','null','1','39','3');

INSERT INTO `twotree_node` VALUES ('42','edit','编辑品牌','1','null','1','39','3');

INSERT INTO `twotree_node` VALUES ('43','Order','订单管理-微信商城','1','null','1','1','2');

INSERT INTO `twotree_node` VALUES ('44','edit','查看订单信息','1','null','1','43','3');

INSERT INTO `twotree_node` VALUES ('45','ApplyMoney','提现申请','1','null','1','1','2');

INSERT INTO `twotree_node` VALUES ('46','edit','处理提现','1','null','1','45','3');

INSERT INTO `twotree_node` VALUES ('47','WechatPub','公众号信息配置','1','null','1','1','2');

INSERT INTO `twotree_node` VALUES ('48','index','公众号信息配置','1','null','1','47','3');

INSERT INTO `twotree_node` VALUES ('49','WechatMenu','公众号菜单管理','1','null','1','1','2');

INSERT INTO `twotree_node` VALUES ('50','menuadd','添加菜单','1','null','1','49','3');

INSERT INTO `twotree_node` VALUES ('51','menusend','生成菜单','1','null','1','49','3');

INSERT INTO `twotree_node` VALUES ('52','menuget','查看当前菜单','1','null','1','49','3');

INSERT INTO `twotree_node` VALUES ('53','WechatText','公众号自定义回复','1','null','1','1','2');

INSERT INTO `twotree_node` VALUES ('54','textadd','添加新配置','1','null','1','53','3');

INSERT INTO `twotree_node` VALUES ('55','Shop','店铺管理','1','null','1','1','2');

INSERT INTO `twotree_node` VALUES ('56','index','店铺列表','1','null','1','55','3');

INSERT INTO `twotree_node` VALUES ('57','audit','店铺认证','1','null','1','55','3');

INSERT INTO `twotree_node` VALUES ('58','level','店铺等级管理','1','null','1','55','3');

INSERT INTO `twotree_node` VALUES ('59','theme','店铺风格管理','1','null','1','55','3');

INSERT INTO `twotree_node` VALUES ('60','Conf','系统配置','1','null','1','1','2');

INSERT INTO `twotree_node` VALUES ('61','index','系统信息设置','1','null','1','60','3');

INSERT INTO `twotree_node` VALUES ('62','msg','短信网关设置','1','null','1','60','3');

INSERT INTO `twotree_node` VALUES ('63','email','邮件服务器设置','1','null','1','60','3');

INSERT INTO `twotree_node` VALUES ('64','Express','物流管理','1','null','1','1','2');

INSERT INTO `twotree_node` VALUES ('65','index',' 快递公司列表','1','null','1','64','3');

INSERT INTO `twotree_node` VALUES ('66','add','新增快递公司','1','null','1','64','3');

INSERT INTO `twotree_node` VALUES ('67','edit',' 编辑快递公司','1','null','1','64','3');

--
-- 数据表中的数据: `twotree_order_friend_pay`
--

INSERT INTO `twotree_order_friend_pay` VALUES ('37','81','null','oKhP4wq4GJuwSg8moj3mMxRdR2SM','null','null','1','null','0','null','null','0');

INSERT INTO `twotree_order_friend_pay` VALUES ('36','81','null','oKhP4wq4GJuwSg8moj3mMxRdR2SM','null','null','1','null','0','null','null','0');

INSERT INTO `twotree_order_friend_pay` VALUES ('35','81','null','{tworee#$friend_info.openid}','null','null','1','null','0','null','null','0');

INSERT INTO `twotree_order_friend_pay` VALUES ('34','81','null','null','null','null','1','null','0','null','null','0');

INSERT INTO `twotree_order_friend_pay` VALUES ('33','81','null','null','null','null','1','null','0','null','null','0');

INSERT INTO `twotree_order_friend_pay` VALUES ('32','81','null','null','null','null','1','null','0','null','null','0');

INSERT INTO `twotree_order_friend_pay` VALUES ('31','81','null','null','null','null','1','null','0','null','null','0');

INSERT INTO `twotree_order_friend_pay` VALUES ('30','81','null','null','null','null','1','null','0','null','null','0');

INSERT INTO `twotree_order_friend_pay` VALUES ('29','81','null','null','null','null','1','null','0','null','null','0');

INSERT INTO `twotree_order_friend_pay` VALUES ('28','81','null','null','null','null','1','null','0','null','null','0');

INSERT INTO `twotree_order_friend_pay` VALUES ('27','81','null','null','null','null','1','null','0','null','null','0');

INSERT INTO `twotree_order_friend_pay` VALUES ('26','81','null','null','null','null','1','null','0','null','null','0');

INSERT INTO `twotree_order_friend_pay` VALUES ('25','81','null','null','null','null','1','null','0','null','null','0');

INSERT INTO `twotree_order_friend_pay` VALUES ('24','81','null','null','null','null','1','null','0','null','null','0');

INSERT INTO `twotree_order_friend_pay` VALUES ('23','81','null','null','null','null','1','null','0','null','null','0');

INSERT INTO `twotree_order_friend_pay` VALUES ('22','81','null','null','null','null','1','null','0','null','null','0');

INSERT INTO `twotree_order_friend_pay` VALUES ('38','81','null','oKhP4wq4GJuwSg8moj3mMxRdR2SM','null','null','0.1','null','0','null','null','0');

INSERT INTO `twotree_order_friend_pay` VALUES ('39','81','null','oKhP4wq4GJuwSg8moj3mMxRdR2SM','null','null','1','null','0','null','null','0');

INSERT INTO `twotree_order_friend_pay` VALUES ('40','81','null','oKhP4wq4GJuwSg8moj3mMxRdR2SM','null','null','1','null','0','null','null','0');

INSERT INTO `twotree_order_friend_pay` VALUES ('41','81','null','oKhP4wq4GJuwSg8moj3mMxRdR2SM','null','null','1','null','0','null','null','0');

INSERT INTO `twotree_order_friend_pay` VALUES ('42','81','null','oKhP4wq4GJuwSg8moj3mMxRdR2SM','null','null','0.1','好的','0','null','null','0');

INSERT INTO `twotree_order_friend_pay` VALUES ('43','81','null','oKhP4wq4GJuwSg8moj3mMxRdR2SM','null','null','0.01','好的','1','null','DG10251744099420','1445791620');

INSERT INTO `twotree_order_friend_pay` VALUES ('44','92','null','oKhP4wq4GJuwSg8moj3mMxRdR2SM','null','null','0.01','吃过','1','null','DG10261817236951','1445870531');

INSERT INTO `twotree_order_friend_pay` VALUES ('45','92','null','oKhP4wq4GJuwSg8moj3mMxRdR2SM','null','null','0.11','null','1','null','DG10261817236951','1446016862');

INSERT INTO `twotree_order_friend_pay` VALUES ('46','97','null','oKhP4wuAccI1RLLhWGSEEUr4YE88','null','null','0.01','null','1','null','DG10271211376756','1445919233');

--
-- 数据表中的数据: `twotree_order_goods`
--

INSERT INTO `twotree_order_goods` VALUES ('66','39','15','奥克斯空调','1','434.00','/Data/upload/image/20150523/20150523191848_76381.png','null','null','null','1');

INSERT INTO `twotree_order_goods` VALUES ('67','40','15','奥克斯空调','3','434.00','/Data/upload/image/20150523/20150523191848_76381.png','null','null','null','1');

INSERT INTO `twotree_order_goods` VALUES ('61','33','1','玫瑰沁透水润精华液','1','288.00','/Data/upload/image/20150525/20150525181007_67746.jpg','null','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('62','34','1','玫瑰沁透水润精华液','1','288.00','/Data/upload/image/20150525/20150525181007_67746.jpg','null','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('63','34','7','玫瑰沁透水润洁面乳','1','138.00','/Data/upload/image/20150525/20150525181442_10991.jpg','null','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('64','34','8','玫瑰沁透水润礼盒','1','980.00','/Data/upload/image/20150525/20150525181904_91028.jpg','null','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('68','41','1','柜式变频空调2p（北京有货）','1','288.00','/Data/upload/image/20150525/20150525181007_67746.jpg','null','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('69','42','1','柜式变频空调2p（北京有货）','1','288.00','/Data/upload/image/20150525/20150525181007_67746.jpg','null','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('71','44','2','奥克斯空调','1','168.00','/Data/upload/image/20150520/20150520160651_93778.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('72','45','2','奥克斯空调','1','168.00','/Data/upload/image/20150520/20150520160651_93778.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('73','46','2','奥克斯空调','1','168.00','/Data/upload/image/20150520/20150520160651_93778.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('74','47','0','南姜汁黑糖姜茶','1','null','/Data/upload/image/20150525/20150525181007_67746.jpg','10','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('75','48','0','南姜汁黑糖姜茶','1','null','/Data/upload/image/20150525/20150525181007_67746.jpg','10','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('76','49','15','南姜汁黑糖姜茶','2','4.00','/Data/upload/image/20151011/20151011205357_54538.png','20','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('77','50','15','南姜汁黑糖姜茶','3','4.00','/Data/upload/image/20151011/20151011205357_54538.png','20','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('78','51','15','南姜汁黑糖姜茶','2','4.00','/Data/upload/image/20151011/20151011205357_54538.png','20','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('79','52','14','南姜汁黑糖姜茶','1','118.00','/Data/upload/image/20150523/20150523192456_70706.png','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('80','53','4','沙琪玛','2','11.90','/Data/upload/image/20151020/20151020100456_76170.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('81','54','4','沙琪玛','1','11.90','/Data/upload/image/20151020/20151020100456_76170.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('82','55','4','沙琪玛','1','11.90','/Data/upload/image/20151020/20151020100456_76170.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('83','56','1','雪碧','3','2.50','/Data/upload/image/20151020/20151020101555_28237.jpg','10','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('84','56','3','酒鬼花生','1','2.50','/Data/upload/image/20151020/20151020100759_58960.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('85','57','1','雪碧','2','0.01','/Data/upload/image/20151020/20151020101555_28237.jpg','10','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('86','58','1','雪碧','1','0.01','/Data/upload/image/20151020/20151020101555_28237.jpg','10','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('87','59','1','雪碧','1','0.01','/Data/upload/image/20151020/20151020101555_28237.jpg','10','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('90','62','4','沙琪玛','2','null','/Data/upload/image/20151020/20151020100456_76170.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('89','61','15','康师傅桶装泡面膜','1','null','/Data/upload/image/20151015/20151015150529_43401.jpg','20','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('91','62','3','酒鬼花生','3','null','/Data/upload/image/20151020/20151020100759_58960.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('92','63','4','沙琪玛','1','0.02','/Data/upload/image/20151020/20151020100456_76170.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('93','64','4','沙琪玛','9','null','/Data/upload/image/20151020/20151020100456_76170.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('94','65','4','沙琪玛','1','0.02','/Data/upload/image/20151020/20151020100456_76170.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('95','66','1','雪碧','1','null','/Data/upload/image/20151020/20151020101555_28237.jpg','10','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('96','67','4','沙琪玛','1','0.02','/Data/upload/image/20151020/20151020100456_76170.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('97','69','4','沙琪玛','1','0.02','/Data/upload/image/20151020/20151020100456_76170.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('98','71','4','沙琪玛','1','0.02','/Data/upload/image/20151020/20151020100456_76170.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('99','72','4','沙琪玛','1','0.02','/Data/upload/image/20151020/20151020100456_76170.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('100','73','4','沙琪玛','4','null','/Data/upload/image/20151020/20151020100456_76170.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('101','53','4','沙琪玛','1','null','/Data/upload/image/20151020/20151020100456_76170.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('102','55','4','沙琪玛','1','null','/Data/upload/image/20151020/20151020100456_76170.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('103','56','4','沙琪玛','1','0.02','/Data/upload/image/20151020/20151020100456_76170.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('104','57','4','沙琪玛','1','0.02','/Data/upload/image/20151020/20151020100456_76170.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('105','58','4','沙琪玛','4','null','/Data/upload/image/20151020/20151020100456_76170.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('106','59','5','肉松面包','1','5.00','/Data/upload/image/20151020/20151020100236_96877.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('107','60','1','雪碧','1','null','/Data/upload/image/20151020/20151020101555_28237.jpg','10','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('108','62','1','雪碧','1','2.50','/Data/upload/image/20151020/20151020101555_28237.jpg','10','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('109','63','4','沙琪玛','1','0.02','/Data/upload/image/20151020/20151020100456_76170.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('110','64','4','沙琪玛','1','0.02','/Data/upload/image/20151020/20151020100456_76170.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('111','65','4','沙琪玛','1','0.02','/Data/upload/image/20151020/20151020100456_76170.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('112','66','4','沙琪玛','1','0.02','/Data/upload/image/20151020/20151020100456_76170.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('113','67','4','沙琪玛','1','0.02','/Data/upload/image/20151020/20151020100456_76170.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('114','70','4','沙琪玛','1','0.02','/Data/upload/image/20151020/20151020100456_76170.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('115','71','5','肉松面包','1','5.00','/Data/upload/image/20151020/20151020100236_96877.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('116','72','4','沙琪玛','1','0.02','/Data/upload/image/20151020/20151020100456_76170.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('117','73','4','沙琪玛','1','0.02','/Data/upload/image/20151020/20151020100456_76170.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('118','74','5','肉松面包','1','5.00','/Data/upload/image/20151020/20151020100236_96877.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('119','75','11','素牛筋','1','4.00','/Data/upload/image/20151020/20151020093406_65607.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('120','76','11','素牛筋','1','4.00','/Data/upload/image/20151020/20151020093406_65607.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('121','77','11','素牛筋','1','4.00','/Data/upload/image/20151020/20151020093406_65607.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('122','78','11','素牛筋','1','4.00','/Data/upload/image/20151020/20151020093406_65607.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('123','79','11','素牛筋','2','4.00','/Data/upload/image/20151020/20151020093406_65607.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('124','80','4','沙琪玛','1','0.02','/Data/upload/image/20151020/20151020100456_76170.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('125','81','4','沙琪玛','2','0.02','/Data/upload/image/20151020/20151020100456_76170.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('126','0','4','沙琪玛','1','0.02','/Data/upload/image/20151020/20151020100456_76170.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('127','0','11','素牛筋','1','4.00','/Data/upload/image/20151020/20151020093406_65607.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('128','0','5','肉松面包','1','5.00','/Data/upload/image/20151020/20151020100236_96877.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('129','82','5','肉松面包','1','5.00','/Data/upload/image/20151020/20151020100236_96877.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('130','83','5','肉松面包','1','5.00','/Data/upload/image/20151020/20151020100236_96877.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('131','84','11','素牛筋','1','4.00','/Data/upload/image/20151020/20151020093406_65607.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('132','85','4','沙琪玛','1','0.02','/Data/upload/image/20151020/20151020100456_76170.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('133','86','4','沙琪玛','1','0.02','/Data/upload/image/20151020/20151020100456_76170.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('134','89','4','沙琪玛','1','0.02','/Data/upload/image/20151020/20151020100456_76170.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('135','90','7','欧莱雅洗面奶','1','null','/Data/upload/image/20151020/20151020095903_40184.png','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('136','91','4','沙琪玛','1','0.02','/Data/upload/image/20151020/20151020100456_76170.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('137','92','5','肉松面包','1','5.00','/Data/upload/image/20151020/20151020100236_96877.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('138','93','21','劲仔小鱼麻辣味 15g/包','1','0.01','/Data/upload/image/20151026/20151026194217_27995.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('139','94','7','老北京蜂蜜枣糕  60g/袋','1','2.00','/Data/upload/image/20151026/20151026191055_37221.jpeg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('140','95','7','老北京蜂蜜枣糕  60g/袋','1','2.00','/Data/upload/image/20151026/20151026191055_37221.jpeg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('141','96','21','劲仔小鱼麻辣味 15g/包','8','0.01','/Data/upload/image/20151026/20151026194217_27995.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('142','97','21','劲仔小鱼麻辣味 15g/包','1','0.01','/Data/upload/image/20151026/20151026194217_27995.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('143','99','1','雀巢咖啡30杯（奶香）15g/包','3','null','/Data/upload/image/20151026/20151026191906_61020.jpg','10','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('144','100','39','多邦垃圾袋45cm*55cm','4','null','/Data/upload/image/20151028/20151028134931_51278.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('145','101','39','多邦垃圾袋45cm*55cm','1','2.00','/Data/upload/image/20151028/20151028134931_51278.jpg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('146','101','7','老北京蜂蜜枣糕  60g/袋','3','2.00','/Data/upload/image/20151026/20151026191055_37221.jpeg','0','null','null','0');

INSERT INTO `twotree_order_goods` VALUES ('147','101','9','盼盼法式奶香面包5枚 100g/袋','1','3.00','/Data/upload/image/20151026/20151026190729_86863.jpg','0','null','null','0');

--
-- 数据表中的数据: `twotree_order_info`
--

INSERT INTO `twotree_order_info` VALUES ('46','90','1','null','1','0','0','1','北京','北京','北京','海淀区','null','null','海淀小区','2','52','502','null','null','null','null','18710950674','null','0.00','0','168.00','0','1440688237','0','1445595772','0','1','0.00','0','0','null','null','null','0.00','打算打算','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('53','6','2','DG10221817214220','1','6','0','0','張亞強','陕西','西安','新城区','西安交通大学','2号宿舍楼','123','24','311','2597','1','2','null','null','18502983552','null','0.01','0','0.01','0','1445509041','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('54','6','2','DG10221818427982','1','6','0','0','張亞強','陕西','西安','新城区','西安交通大学','2号宿舍楼','123','24','311','2597','1','2','null','null','18502983552','null','null','0','0.00','0','1445509122','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('55','6','2','DG10221819094035','1','6','0','1','張亞強','陕西','西安','新城区','西安交通大学','2号宿舍楼','123','24','311','2597','1','2','null','null','18502983552','null','0.01','0','0.01','0','1445509149','0','1445509159','0','1','0.00','0','0','DG10221819094035','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('56','21','1','DG10221832139959','1','6','0','0','奇才','陕西','西安','新城区','西安交通大学','2号宿舍楼','123','24','311','2597','1','2','null','null','18502983663','null','0.02','0','0.02','0','1445509933','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('57','25','1','DG10221832155302','1','6','0','1','null','陕西','西安','新城区','西安交通大学','2号宿舍楼','1001','24','311','2597','1','2','null','null','1001','null','0.02','0','0.02','0','1445509935','0','1445509945','0','1','0.00','0','0','DG10221832155302','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('58','1','2','DG10222025164835','1','1','0','0','段二','陕西','西安','新城区','西安交通大学','1号宿舍楼','默默莫','24','311','2597','1','1','null','null','18710950666','null','0.04','0','0.04','0','1445516716','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('59','21','1','DG10222223458456','1','6','0','0','奇才','陕西','西安','新城区','西安交通大学','2号宿舍楼','666','24','311','2597','1','2','null','null','18502983663','null','5.00','0','5.00','0','1445523825','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('60','1','2','DG10231245163495','1','1','0','0','段二','陕西','西安','新城区','西安交通大学','1号宿舍楼','秘','24','311','2597','1','1','null','null','1710950666','null','0.01','0','0.01','0','1445575516','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('61','1','2','DG10231245183685','1','1','0','0','段二','陕西','西安','新城区','西安交通大学','1号宿舍楼','秘','24','311','2597','1','1','null','null','1710950666','null','null','0','0.00','0','1445575518','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('62','2','1','DG10242157401266','1','1','0','0','吴学松','陕西','西安','新城区','西安交通大学','1号宿舍楼','612','24','311','2597','1','1','null','null','15068143185','null','2.50','0','2.50','0','1445695060','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('63','21','1','DG10251220409218','2','6','0','0','奇才','陕西','西安','新城区','西安交通大学','2号宿舍楼','2','24','311','2597','1','2','null','null','18502983663','null','0.02','0','0.02','0','1445746840','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('64','21','1','DG10251238081852','2','6','0','0','奇才','陕西','西安','新城区','西安交通大学','2号宿舍楼','222','24','311','2597','1','2','null','null','18502983663','null','0.02','0','0.02','0','1445747888','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('65','21','1','DG10251243075576','2','6','0','0','奇才','陕西','西安','新城区','西安交通大学','2号宿舍楼','hh','24','311','2597','1','2','null','null','18502983663','null','0.02','0','0.02','0','1445748187','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','456');

INSERT INTO `twotree_order_info` VALUES ('66','21','1','DG10251244093601','2','6','0','0','奇才','陕西','西安','新城区','西安交通大学','2号宿舍楼','11','24','311','2597','1','2','null','null','18502983663','null','0.02','0','0.02','0','1445748249','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','999');

INSERT INTO `twotree_order_info` VALUES ('67','21','1','DG10251248409784','2','6','0','0','奇才','陕西','西安','新城区','西安交通大学','2号宿舍楼','卡','24','311','2597','1','2','null','null','18502983663','null','0.02','0','0.02','0','1445748520','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','6666666666');

INSERT INTO `twotree_order_info` VALUES ('68','21','1','DG10251248463592','2','6','0','0','奇才','陕西','西安','新城区','西安交通大学','2号宿舍楼','卡','24','311','2597','1','2','null','null','18502983663','null','null','0','0.00','0','1445748526','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','6666666666');

INSERT INTO `twotree_order_info` VALUES ('69','21','1','DG10251248482390','2','6','0','0','奇才','陕西','西安','新城区','西安交通大学','2号宿舍楼','卡','24','311','2597','1','2','null','null','18502983663','null','null','0','0.00','0','1445748528','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','6666666666');

INSERT INTO `twotree_order_info` VALUES ('70','21','1','DG10251637356954','2','6','0','0','奇才','陕西','西安','新城区','西安交通大学','2号宿舍楼','123','24','311','2597','1','2','null','null','18502983663','null','0.02','0','0.02','0','1445762289','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','好想吃
');

INSERT INTO `twotree_order_info` VALUES ('71','21','1','DG10251650231489','2','6','0','0','奇才','陕西','西安','新城区','西安交通大学','2号宿舍楼','123','24','311','2597','1','2','null','null','18502983663','null','5.00','0','5.00','0','1445763072','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','666');

INSERT INTO `twotree_order_info` VALUES ('72','21','1','DG10251700214644','2','6','0','0','奇才','陕西','西安','新城区','西安交通大学','2号宿舍楼','123','24','311','2597','1','2','null','null','18502983663','null','0.02','0','0.02','0','1445763636','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','亲');

INSERT INTO `twotree_order_info` VALUES ('73','21','1','DG10251702471360','2','6','0','0','奇才','陕西','西安','新城区','西安交通大学','2号宿舍楼','123','24','311','2597','1','2','null','null','18502983663','null','0.02','0','0.02','0','1445763773','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('74','21','1','DG10251703462933','2','6','0','0','奇才','陕西','西安','新城区','西安交通大学','2号宿舍楼','123','24','311','2597','1','2','null','null','18502983663','null','5.00','0','5.00','0','1445763829','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('75','21','1','DG10251705255578','2','6','0','0','奇才','陕西','西安','新城区','西安交通大学','2号宿舍楼','123','24','311','2597','1','2','null','null','18502983663','null','4.00','0','4.00','0','1445763926','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('76','21','1','DG10251706233010','2','6','0','0','奇才','陕西','西安','新城区','西安交通大学','2号宿舍楼','123','24','311','2597','1','2','null','null','18502983663','null','4.00','0','4.00','0','1445763984','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('77','21','1','DG10251708556889','2','6','0','0','奇才','陕西','西安','新城区','西安交通大学','2号宿舍楼','123','24','311','2597','1','2','null','null','18502983663','null','4.00','0','4.00','0','1445764136','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('78','21','1','DG10251713073415','2','6','0','0','奇才','陕西','西安','新城区','西安交通大学','2号宿舍楼','123','24','311','2597','1','2','null','null','18502983663','null','4.00','0','4.00','0','1445764436','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','亲，帮帮忙哦');

INSERT INTO `twotree_order_info` VALUES ('79','21','1','DG10251717349497','2','6','0','0','奇才','陕西','西安','新城区','西安交通大学','2号宿舍楼','123','24','311','2597','1','2','null','null','18502983663','null','8.00','0','8.00','0','1445764673','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','65558');

INSERT INTO `twotree_order_info` VALUES ('80','21','1','DG10251737435052','2','6','0','0','奇才','陕西','西安','新城区','西安交通大学','2号宿舍楼','123','24','311','2597','1','2','null','null','18502983663','null','0.02','0','0.02','0','1445765883','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','亲，帮帮忙了');

INSERT INTO `twotree_order_info` VALUES ('81','21','1','DG10251744099420','2','6','0','0','奇才','陕西','西安','新城区','西安交通大学','2号宿舍楼','123','24','311','2597','1','2','null','null','18502983663','null','0.04','0','0.04','0','1445766290','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','齐秦');

INSERT INTO `twotree_order_info` VALUES ('82','21','1','DG10260020367289','1','6','0','0','奇才','陕西','西安','新城区','西安交通大学','2号宿舍楼','123','24','311','2597','1','2','null','null','18502983663','null','5.00','0','5.00','0','1445790036','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('83','21','1','DG10260022466902','1','6','0','0','奇才','陕西','西安','新城区','西安交通大学','2号宿舍楼','123','24','311','2597','1','2','null','null','18502983663','null','5.00','0','5.00','0','1445790166','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('84','21','1','DG10260030144013','1','6','0','0','奇才','陕西','西安','新城区','西安交通大学','2号宿舍楼','123','24','311','2597','1','2','null','null','18502983663','null','4.00','0','4.00','0','1445790614','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('85','4','1','DG10261025239903','2','6','0','0','张强','陕西','西安','新城区','西安交通大学','2号宿舍楼','123','24','311','2597','1','2','null','null','18809546798','null','0.02','0','0.02','0','1445826337','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('86','4','1','DG10261100211256','1','6','0','0','张强','陕西','西安','新城区','西安交通大学','2号宿舍楼','123','24','311','2597','1','2','null','null','18809546798','null','0.02','0','0.02','0','1445828421','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('87','4','1','DG10261100211200','1','6','0','0','张强','陕西','西安','新城区','西安交通大学','2号宿舍楼','123','24','311','2597','1','2','null','null','18809546798','null','null','0','0.00','0','1445828421','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('88','4','1','DG10261100212890','1','6','0','0','张强','陕西','西安','新城区','西安交通大学','2号宿舍楼','123','24','311','2597','1','2','null','null','18809546798','null','null','0','0.00','0','1445828421','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('89','7','1','DG10261102522719','1','1','0','0','null','陕西','西安','新城区','西安交通大学','1号宿舍楼','123','24','311','2597','1','1','null','null','15091530670','null','0.02','0','0.02','0','1445828572','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('90','1','2','DG10261348255959','2','1','0','0','段二','陕西','西安','新城区','西安交通大学','1号宿舍楼','123','24','311','2597','1','1','null','null','18710950666','null','0.00','0','0.00','0','1445838560','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('91','21','1','DG10261746081474','1','6','1','0','奇才','陕西','西安','新城区','西安交通大学','2号宿舍楼','123','24','311','2597','1','2','null','null','18502983663','null','0.02','0','0.02','0','1445852768','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('92','21','1','DG10261817236951','2','6','1','0','奇才','陕西','西安','新城区','西安交通大学','2号宿舍楼','123','24','311','2597','1','2','null','null','18502983663','null','5.00','0','5.00','0','1445854669','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','亲，帮帮忙');

INSERT INTO `twotree_order_info` VALUES ('93','9','1','DG10262154306654','1','1','1','0','null','陕西','西安','新城区','西安交通大学','1号宿舍楼','123','24','311','2597','1','1','null','null','13572962720','null','0.01','0','0.01','0','1445867670','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('94','21','1','DG10262300506736','2','1','1','0','奇才','陕西','西安','新城区','西安交通大学','1号宿舍楼','123','24','311','2597','1','1','null','null','15068143185','null','2.00','0','2.00','0','1445871707','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','亲，最后一次了，一定要支持哦→_→');

INSERT INTO `twotree_order_info` VALUES ('95','21','1','DG10262324503558','2','1','1','0','奇才','陕西','西安','新城区','西安交通大学','1号宿舍楼','123','24','311','2597','1','1','null','null','15068143185','null','2.00','0','2.00','0','1445873112','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','哈哈');

INSERT INTO `twotree_order_info` VALUES ('96','2','1','DG10271156552135','1','1','0','0','吴学松','陕西','西安','新城区','西安交通大学','1号宿舍楼','123','24','311','2597','1','1','null','null','15068143185','null','0.08','0','0.08','0','1445918215','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('97','7','1','DG10271211376756','2','6','1','0','null','陕西','西安','新城区','西安交通大学','2号宿舍楼','123','24','311','2597','1','2','null','null','15091530670','null','0.01','0','0.01','0','1445919102','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('98','7','1','DG10271212518922','2','6','0','0','null','陕西','西安','新城区','西安交通大学','2号宿舍楼','123','24','311','2597','1','2','null','null','15091530670','null','null','0','0.00','0','1445919189','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('99','1','2','DG10292259027322','2','6','1','0','段二','陕西','西安','新城区','西安交通大学','2号宿舍楼','123','24','311','2597','1','2','null','null','18710950666','null','4.50','0','4.50','0','1446130780','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('100','1','2','DG10300747183325','2','6','1','0','段二','陕西','西安','新城区','西安交通大学','2号宿舍楼','123','24','311','2597','1','2','null','null','18710950666','null','8.00','0','8.00','0','1446162471','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','null');

INSERT INTO `twotree_order_info` VALUES ('101','2','1','DG10301001001759','2','6','1','0','吴学松','陕西','西安','新城区','西安交通大学','2号宿舍楼','123','24','311','2597','1','2','null','null','15068143185','null','11.00','0','11.00','0','1446170473','0','0','0','1','0.00','0','0','null','null','null','0.00','null','0','null','null');

--
-- 数据表中的数据: `twotree_order_photo`
--

INSERT INTO `twotree_order_photo` VALUES ('9','4','null','./Data/upload/order_photo/m_562c5880b66f5.png','1445746805');

INSERT INTO `twotree_order_photo` VALUES ('10','0','null','./Data/upload/order_photo/m_562c5ca1d0645.jpg','1445747873');

INSERT INTO `twotree_order_photo` VALUES ('11','0','null','./Data/upload/order_photo/m_562c5db29a01c.jpg','1445748145');

INSERT INTO `twotree_order_photo` VALUES ('12','70','DG10251637356954','./Data/upload/order_photo/m_562c94d94f8ea.jpg','1445762264');

INSERT INTO `twotree_order_photo` VALUES ('13','71','DG10251650231489','./Data/upload/order_photo/m_562c97d696455.jpg','1445763028');

INSERT INTO `twotree_order_photo` VALUES ('14','72','DG10251700214644','./Data/upload/order_photo/m_562c9a3346b56.jpg','1445763634');

INSERT INTO `twotree_order_photo` VALUES ('15','78','DG10251713073415','./Data/upload/order_photo/m_562c9d3f0bfbb.jpg','1445764414');

INSERT INTO `twotree_order_photo` VALUES ('16','78','DG10251713073415','./Data/upload/order_photo/m_562c9d51b99a2.jpg','1445764432');

INSERT INTO `twotree_order_photo` VALUES ('17','79','DG10251717349497','./Data/upload/order_photo/m_562c9e3ea4c2d.jpg','1445764670');

INSERT INTO `twotree_order_photo` VALUES ('18','80','DG10251737435052','./Data/upload/order_photo/m_562ca2f5765b0.jpg','1445765876');

INSERT INTO `twotree_order_photo` VALUES ('19','80','DG10251737435052','./Data/upload/order_photo/m_562ca2f8f0a53.jpg','1445765880');

INSERT INTO `twotree_order_photo` VALUES ('20','81','DG10251744099420','./Data/upload/order_photo/m_562ca4870ea10.jpg','1445766278');

INSERT INTO `twotree_order_photo` VALUES ('21','81','DG10251744099420','./Data/upload/order_photo/m_562ca48a65f36.jpg','1445766281');

INSERT INTO `twotree_order_photo` VALUES ('22','95','DG10262324503558','./Data/upload/order_photo/m_562e45d065551.jpg','1445873104');

INSERT INTO `twotree_order_photo` VALUES ('23','95','DG10262324503558','./Data/upload/order_photo/m_562e45d375cea.jpg','1445873107');

INSERT INTO `twotree_order_photo` VALUES ('24','100','DG10300747183325','./Data/upload/order_photo/m_5632b01a88062.jpg','1446162451');

--
-- 数据表中的数据: `twotree_order_refund`
--

INSERT INTO `twotree_order_refund` VALUES ('1','42','90','质量问题','3','2','1','null','null','1','admin','已成功处理客户问题','1440406277');

--
-- 数据表中的数据: `twotree_recharge`
--

INSERT INTO `twotree_recharge` VALUES ('1','1','10.00','1','1_1444808460','null','0','null','0','1444808460');

INSERT INTO `twotree_recharge` VALUES ('2','1','10.00','1','1_1444808517','null','0','null','0','1444808517');

INSERT INTO `twotree_recharge` VALUES ('3','1','0.01','1','1_1444811893','null','1','1444811907','1','1444811893');

INSERT INTO `twotree_recharge` VALUES ('4','1','0.01','1','1_1444812426','null','1','1444812442','1','1444812426');

INSERT INTO `twotree_recharge` VALUES ('5','1','100.00','1','1_1444886279','null','0','null','0','1444886279');

INSERT INTO `twotree_recharge` VALUES ('6','1','0.01','1','1_1444887471','null','1','1444887490','1','1444887471');

INSERT INTO `twotree_recharge` VALUES ('7','2','50.00','1','2_1445330681','null','0','null','0','1445330681');

INSERT INTO `twotree_recharge` VALUES ('8','2','0.01','1','2_1445694964','null','1','1445694994','1','1445694964');

INSERT INTO `twotree_recharge` VALUES ('9','4','0.01','1','4_1445826113','null','1','1445826126','1','1445826113');

INSERT INTO `twotree_recharge` VALUES ('10','4','50.00','1','4_1445826615','null','0','null','0','1445826615');

INSERT INTO `twotree_recharge` VALUES ('11','7','0.01','1','7_1445827109','null','1','1445827120','1','1445827109');

INSERT INTO `twotree_recharge` VALUES ('12','4','0.01','1','4_1445828494','null','1','1445828506','1','1445828494');

INSERT INTO `twotree_recharge` VALUES ('13','4','0.01','1','4_1445828494','null','1','1445828506','0','1445828494');

INSERT INTO `twotree_recharge` VALUES ('14','4','0.01','1','4_1445828507','null','0','null','0','1445828507');

INSERT INTO `twotree_recharge` VALUES ('15','2','0.01','1','2_1445838665','null','0','null','0','1445838665');

INSERT INTO `twotree_recharge` VALUES ('16','21','0.01','1','21_1445862921','null','0','null','0','1445862921');

--
-- 数据表中的数据: `twotree_recharge_config`
--

INSERT INTO `twotree_recharge_config` VALUES ('1','0.01');

INSERT INTO `twotree_recharge_config` VALUES ('2','20.00');

INSERT INTO `twotree_recharge_config` VALUES ('3','50.00');

--
-- 数据表中的数据: `twotree_region`
--

INSERT INTO `twotree_region` VALUES ('1','0','中国','0','0','z','zhongguo');

INSERT INTO `twotree_region` VALUES ('2','1','北京','1','0','b','beijing');

INSERT INTO `twotree_region` VALUES ('3','1','安徽','1','0','a','anhui');

INSERT INTO `twotree_region` VALUES ('4','1','福建','1','0','f','fujian');

INSERT INTO `twotree_region` VALUES ('5','1','甘肃','1','0','g','gansu');

INSERT INTO `twotree_region` VALUES ('6','1','广东','1','0','g','guangdong');

INSERT INTO `twotree_region` VALUES ('7','1','广西','1','0','g','guangxi');

INSERT INTO `twotree_region` VALUES ('8','1','贵州','1','0','g','guizhou');

INSERT INTO `twotree_region` VALUES ('9','1','海南','1','0','h','hainan');

INSERT INTO `twotree_region` VALUES ('10','1','河北','1','0','h','hebei');

INSERT INTO `twotree_region` VALUES ('11','1','河南','1','0','h','henan');

INSERT INTO `twotree_region` VALUES ('12','1','黑龙江','1','0','h','heilongjiang');

INSERT INTO `twotree_region` VALUES ('13','1','湖北','1','0','h','hubei');

INSERT INTO `twotree_region` VALUES ('14','1','湖南','1','0','h','hunan');

INSERT INTO `twotree_region` VALUES ('15','1','吉林','1','0','j','jilin');

INSERT INTO `twotree_region` VALUES ('16','1','江苏','1','0','j','jiangsu');

INSERT INTO `twotree_region` VALUES ('17','1','江西','1','0','j','jiangxi');

INSERT INTO `twotree_region` VALUES ('18','1','辽宁','1','0','l','liaoning');

INSERT INTO `twotree_region` VALUES ('19','1','内蒙古','1','0','n','neimenggu');

INSERT INTO `twotree_region` VALUES ('20','1','宁夏','1','0','n','ningxia');

INSERT INTO `twotree_region` VALUES ('21','1','青海','1','0','q','qinghai');

INSERT INTO `twotree_region` VALUES ('22','1','山东','1','0','s','shandong');

INSERT INTO `twotree_region` VALUES ('23','1','山西','1','0','s','shanxi');

INSERT INTO `twotree_region` VALUES ('24','1','陕西','1','0','s','shanxi');

INSERT INTO `twotree_region` VALUES ('25','1','上海','1','0','s','shanghai');

INSERT INTO `twotree_region` VALUES ('26','1','四川','1','0','s','sichuan');

INSERT INTO `twotree_region` VALUES ('27','1','天津','1','0','t','tianjin');

INSERT INTO `twotree_region` VALUES ('28','1','西藏','1','0','x','xicang');

INSERT INTO `twotree_region` VALUES ('29','1','新疆','1','0','x','xinjiang');

INSERT INTO `twotree_region` VALUES ('30','1','云南','1','0','y','yunnan');

INSERT INTO `twotree_region` VALUES ('31','1','浙江','1','0','z','zhejiang');

INSERT INTO `twotree_region` VALUES ('32','1','重庆','1','0','z','zhongqing');

INSERT INTO `twotree_region` VALUES ('33','1','香港','1','0','x','xianggang');

INSERT INTO `twotree_region` VALUES ('34','1','澳门','1','0','a','aomen');

INSERT INTO `twotree_region` VALUES ('35','1','台湾','1','0','t','taiwan');

INSERT INTO `twotree_region` VALUES ('36','3','安庆','2','0','a','anqing');

INSERT INTO `twotree_region` VALUES ('37','3','蚌埠','2','0','b','bangbu');

INSERT INTO `twotree_region` VALUES ('38','3','巢湖','2','0','c','chaohu');

INSERT INTO `twotree_region` VALUES ('39','3','池州','2','0','c','chizhou');

INSERT INTO `twotree_region` VALUES ('40','3','滁州','2','0','c','chuzhou');

INSERT INTO `twotree_region` VALUES ('41','3','阜阳','2','0','f','fuyang');

INSERT INTO `twotree_region` VALUES ('42','3','淮北','2','0','h','huaibei');

INSERT INTO `twotree_region` VALUES ('43','3','淮南','2','0','h','huainan');

INSERT INTO `twotree_region` VALUES ('44','3','黄山','2','0','h','huangshan');

INSERT INTO `twotree_region` VALUES ('45','3','六安','2','0','l','liuan');

INSERT INTO `twotree_region` VALUES ('46','3','马鞍山','2','0','m','maanshan');

INSERT INTO `twotree_region` VALUES ('47','3','宿州','2','0','s','suzhou');

INSERT INTO `twotree_region` VALUES ('48','3','铜陵','2','0','t','tongling');

INSERT INTO `twotree_region` VALUES ('49','3','芜湖','2','0','w','wuhu');

INSERT INTO `twotree_region` VALUES ('50','3','宣城','2','0','x','xuancheng');

INSERT INTO `twotree_region` VALUES ('51','3','亳州','2','0','z','zhou');

INSERT INTO `twotree_region` VALUES ('52','2','北京','2','0','b','beijing');

INSERT INTO `twotree_region` VALUES ('53','4','福州','2','0','f','fuzhou');

INSERT INTO `twotree_region` VALUES ('54','4','龙岩','2','0','l','longyan');

INSERT INTO `twotree_region` VALUES ('55','4','南平','2','0','n','nanping');

INSERT INTO `twotree_region` VALUES ('56','4','宁德','2','0','n','ningde');

INSERT INTO `twotree_region` VALUES ('57','4','莆田','2','0','p','putian');

INSERT INTO `twotree_region` VALUES ('58','4','泉州','2','0','q','quanzhou');

INSERT INTO `twotree_region` VALUES ('59','4','三明','2','0','s','sanming');

INSERT INTO `twotree_region` VALUES ('60','4','厦门','2','0','x','xiamen');

INSERT INTO `twotree_region` VALUES ('61','4','漳州','2','0','z','zhangzhou');

INSERT INTO `twotree_region` VALUES ('62','5','兰州','2','0','l','lanzhou');

INSERT INTO `twotree_region` VALUES ('63','5','白银','2','0','b','baiyin');

INSERT INTO `twotree_region` VALUES ('64','5','定西','2','0','d','dingxi');

INSERT INTO `twotree_region` VALUES ('65','5','甘南','2','0','g','gannan');

INSERT INTO `twotree_region` VALUES ('66','5','嘉峪关','2','0','j','jiayuguan');

INSERT INTO `twotree_region` VALUES ('67','5','金昌','2','0','j','jinchang');

INSERT INTO `twotree_region` VALUES ('68','5','酒泉','2','0','j','jiuquan');

INSERT INTO `twotree_region` VALUES ('69','5','临夏','2','0','l','linxia');

INSERT INTO `twotree_region` VALUES ('70','5','陇南','2','0','l','longnan');

INSERT INTO `twotree_region` VALUES ('71','5','平凉','2','0','p','pingliang');

INSERT INTO `twotree_region` VALUES ('72','5','庆阳','2','0','q','qingyang');

INSERT INTO `twotree_region` VALUES ('73','5','天水','2','0','t','tianshui');

INSERT INTO `twotree_region` VALUES ('74','5','武威','2','0','w','wuwei');

INSERT INTO `twotree_region` VALUES ('75','5','张掖','2','0','z','zhangye');

INSERT INTO `twotree_region` VALUES ('76','6','广州','2','0','g','guangzhou');

INSERT INTO `twotree_region` VALUES ('77','6','深圳','2','0','s','shen');

INSERT INTO `twotree_region` VALUES ('78','6','潮州','2','0','c','chaozhou');

INSERT INTO `twotree_region` VALUES ('79','6','东莞','2','0','d','dong');

INSERT INTO `twotree_region` VALUES ('80','6','佛山','2','0','f','foshan');

INSERT INTO `twotree_region` VALUES ('81','6','河源','2','0','h','heyuan');

INSERT INTO `twotree_region` VALUES ('82','6','惠州','2','0','h','huizhou');

INSERT INTO `twotree_region` VALUES ('83','6','江门','2','0','j','jiangmen');

INSERT INTO `twotree_region` VALUES ('84','6','揭阳','2','0','j','jieyang');

INSERT INTO `twotree_region` VALUES ('85','6','茂名','2','0','m','maoming');

INSERT INTO `twotree_region` VALUES ('86','6','梅州','2','0','m','meizhou');

INSERT INTO `twotree_region` VALUES ('87','6','清远','2','0','q','qingyuan');

INSERT INTO `twotree_region` VALUES ('88','6','汕头','2','0','s','shantou');

INSERT INTO `twotree_region` VALUES ('89','6','汕尾','2','0','s','shanwei');

INSERT INTO `twotree_region` VALUES ('90','6','韶关','2','0','s','shaoguan');

INSERT INTO `twotree_region` VALUES ('91','6','阳江','2','0','y','yangjiang');

INSERT INTO `twotree_region` VALUES ('92','6','云浮','2','0','y','yunfu');

INSERT INTO `twotree_region` VALUES ('93','6','湛江','2','0','z','zhanjiang');

INSERT INTO `twotree_region` VALUES ('94','6','肇庆','2','0','z','zhaoqing');

INSERT INTO `twotree_region` VALUES ('95','6','中山','2','0','z','zhongshan');

INSERT INTO `twotree_region` VALUES ('96','6','珠海','2','0','z','zhuhai');

INSERT INTO `twotree_region` VALUES ('97','7','南宁','2','0','n','nanning');

INSERT INTO `twotree_region` VALUES ('98','7','桂林','2','0','g','guilin');

INSERT INTO `twotree_region` VALUES ('99','7','百色','2','0','b','baise');

INSERT INTO `twotree_region` VALUES ('100','7','北海','2','0','b','beihai');

INSERT INTO `twotree_region` VALUES ('101','7','崇左','2','0','c','chongzuo');

INSERT INTO `twotree_region` VALUES ('102','7','防城港','2','0','f','fangchenggang');

INSERT INTO `twotree_region` VALUES ('103','7','贵港','2','0','g','guigang');

INSERT INTO `twotree_region` VALUES ('104','7','河池','2','0','h','hechi');

INSERT INTO `twotree_region` VALUES ('105','7','贺州','2','0','h','hezhou');

INSERT INTO `twotree_region` VALUES ('106','7','来宾','2','0','l','laibin');

INSERT INTO `twotree_region` VALUES ('107','7','柳州','2','0','l','liuzhou');

INSERT INTO `twotree_region` VALUES ('108','7','钦州','2','0','q','qinzhou');

INSERT INTO `twotree_region` VALUES ('109','7','梧州','2','0','w','wuzhou');

INSERT INTO `twotree_region` VALUES ('110','7','玉林','2','0','y','yulin');

INSERT INTO `twotree_region` VALUES ('111','8','贵阳','2','0','g','guiyang');

INSERT INTO `twotree_region` VALUES ('112','8','安顺','2','0','a','anshun');

INSERT INTO `twotree_region` VALUES ('113','8','毕节','2','0','b','bijie');

INSERT INTO `twotree_region` VALUES ('114','8','六盘水','2','0','l','liupanshui');

INSERT INTO `twotree_region` VALUES ('115','8','黔东南','2','0','q','qiandongnan');

INSERT INTO `twotree_region` VALUES ('116','8','黔南','2','0','q','qiannan');

INSERT INTO `twotree_region` VALUES ('117','8','黔西南','2','0','q','qianxinan');

INSERT INTO `twotree_region` VALUES ('118','8','铜仁','2','0','t','tongren');

INSERT INTO `twotree_region` VALUES ('119','8','遵义','2','0','z','zunyi');

INSERT INTO `twotree_region` VALUES ('120','9','海口','2','0','h','haikou');

INSERT INTO `twotree_region` VALUES ('121','9','三亚','2','0','s','sanya');

INSERT INTO `twotree_region` VALUES ('122','9','白沙','2','0','b','baisha');

INSERT INTO `twotree_region` VALUES ('123','9','保亭','2','0','b','baoting');

INSERT INTO `twotree_region` VALUES ('124','9','昌江','2','0','c','changjiang');

INSERT INTO `twotree_region` VALUES ('125','9','澄迈县','2','0','c','chengmaixian');

INSERT INTO `twotree_region` VALUES ('126','9','定安县','2','0','d','dinganxian');

INSERT INTO `twotree_region` VALUES ('127','9','东方','2','0','d','dongfang');

INSERT INTO `twotree_region` VALUES ('128','9','乐东','2','0','l','ledong');

INSERT INTO `twotree_region` VALUES ('129','9','临高县','2','0','l','lingaoxian');

INSERT INTO `twotree_region` VALUES ('130','9','陵水','2','0','l','lingshui');

INSERT INTO `twotree_region` VALUES ('131','9','琼海','2','0','q','qionghai');

INSERT INTO `twotree_region` VALUES ('132','9','琼中','2','0','q','qiongzhong');

INSERT INTO `twotree_region` VALUES ('133','9','屯昌县','2','0','t','tunchangxian');

INSERT INTO `twotree_region` VALUES ('134','9','万宁','2','0','w','wanning');

INSERT INTO `twotree_region` VALUES ('135','9','文昌','2','0','w','wenchang');

INSERT INTO `twotree_region` VALUES ('136','9','五指山','2','0','w','wuzhishan');

INSERT INTO `twotree_region` VALUES ('137','9','儋州','2','0','z','zhou');

INSERT INTO `twotree_region` VALUES ('138','10','石家庄','2','0','s','shijiazhuang');

INSERT INTO `twotree_region` VALUES ('139','10','保定','2','0','b','baoding');

INSERT INTO `twotree_region` VALUES ('140','10','沧州','2','0','c','cangzhou');

INSERT INTO `twotree_region` VALUES ('141','10','承德','2','0','c','chengde');

INSERT INTO `twotree_region` VALUES ('142','10','邯郸','2','0','h','handan');

INSERT INTO `twotree_region` VALUES ('143','10','衡水','2','0','h','hengshui');

INSERT INTO `twotree_region` VALUES ('144','10','廊坊','2','0','l','langfang');

INSERT INTO `twotree_region` VALUES ('145','10','秦皇岛','2','0','q','qinhuangdao');

INSERT INTO `twotree_region` VALUES ('146','10','唐山','2','0','t','tangshan');

INSERT INTO `twotree_region` VALUES ('147','10','邢台','2','0','x','xingtai');

INSERT INTO `twotree_region` VALUES ('148','10','张家口','2','0','z','zhangjiakou');

INSERT INTO `twotree_region` VALUES ('149','11','郑州','2','0','z','zhengzhou');

INSERT INTO `twotree_region` VALUES ('150','11','洛阳','2','0','l','luoyang');

INSERT INTO `twotree_region` VALUES ('151','11','开封','2','0','k','kaifeng');

INSERT INTO `twotree_region` VALUES ('152','11','安阳','2','0','a','anyang');

INSERT INTO `twotree_region` VALUES ('153','11','鹤壁','2','0','h','hebi');

INSERT INTO `twotree_region` VALUES ('154','11','济源','2','0','j','jiyuan');

INSERT INTO `twotree_region` VALUES ('155','11','焦作','2','0','j','jiaozuo');

INSERT INTO `twotree_region` VALUES ('156','11','南阳','2','0','n','nanyang');

INSERT INTO `twotree_region` VALUES ('157','11','平顶山','2','0','p','pingdingshan');

INSERT INTO `twotree_region` VALUES ('158','11','三门峡','2','0','s','sanmenxia');

INSERT INTO `twotree_region` VALUES ('159','11','商丘','2','0','s','shangqiu');

INSERT INTO `twotree_region` VALUES ('160','11','新乡','2','0','x','xinxiang');

INSERT INTO `twotree_region` VALUES ('161','11','信阳','2','0','x','xinyang');

INSERT INTO `twotree_region` VALUES ('162','11','许昌','2','0','x','xuchang');

INSERT INTO `twotree_region` VALUES ('163','11','周口','2','0','z','zhoukou');

INSERT INTO `twotree_region` VALUES ('164','11','驻马店','2','0','z','zhumadian');

INSERT INTO `twotree_region` VALUES ('165','11','漯河','2','0','h','he');

INSERT INTO `twotree_region` VALUES ('166','11','濮阳','2','0','y','yang');

INSERT INTO `twotree_region` VALUES ('167','12','哈尔滨','2','0','h','haerbin');

INSERT INTO `twotree_region` VALUES ('168','12','大庆','2','0','d','daqing');

INSERT INTO `twotree_region` VALUES ('169','12','大兴安岭','2','0','d','daxinganling');

INSERT INTO `twotree_region` VALUES ('170','12','鹤岗','2','0','h','hegang');

INSERT INTO `twotree_region` VALUES ('171','12','黑河','2','0','h','heihe');

INSERT INTO `twotree_region` VALUES ('172','12','鸡西','2','0','j','jixi');

INSERT INTO `twotree_region` VALUES ('173','12','佳木斯','2','0','j','jiamusi');

INSERT INTO `twotree_region` VALUES ('174','12','牡丹江','2','0','m','mudanjiang');

INSERT INTO `twotree_region` VALUES ('175','12','七台河','2','0','q','qitaihe');

INSERT INTO `twotree_region` VALUES ('176','12','齐齐哈尔','2','0','q','qiqihaer');

INSERT INTO `twotree_region` VALUES ('177','12','双鸭山','2','0','s','shuangyashan');

INSERT INTO `twotree_region` VALUES ('178','12','绥化','2','0','s','suihua');

INSERT INTO `twotree_region` VALUES ('179','12','伊春','2','0','y','yichun');

INSERT INTO `twotree_region` VALUES ('180','13','武汉','2','0','w','wuhan');

INSERT INTO `twotree_region` VALUES ('181','13','仙桃','2','0','x','xiantao');

INSERT INTO `twotree_region` VALUES ('182','13','鄂州','2','0','e','ezhou');

INSERT INTO `twotree_region` VALUES ('183','13','黄冈','2','0','h','huanggang');

INSERT INTO `twotree_region` VALUES ('184','13','黄石','2','0','h','huangshi');

INSERT INTO `twotree_region` VALUES ('185','13','荆门','2','0','j','jingmen');

INSERT INTO `twotree_region` VALUES ('186','13','荆州','2','0','j','jingzhou');

INSERT INTO `twotree_region` VALUES ('187','13','潜江','2','0','q','qianjiang');

INSERT INTO `twotree_region` VALUES ('188','13','神农架林区','2','0','s','shennongjialinqu');

INSERT INTO `twotree_region` VALUES ('189','13','十堰','2','0','s','shiyan');

INSERT INTO `twotree_region` VALUES ('190','13','随州','2','0','s','suizhou');

INSERT INTO `twotree_region` VALUES ('191','13','天门','2','0','t','tianmen');

INSERT INTO `twotree_region` VALUES ('192','13','咸宁','2','0','x','xianning');

INSERT INTO `twotree_region` VALUES ('193','13','襄樊','2','0','x','xiangfan');

INSERT INTO `twotree_region` VALUES ('194','13','孝感','2','0','x','xiaogan');

INSERT INTO `twotree_region` VALUES ('195','13','宜昌','2','0','y','yichang');

INSERT INTO `twotree_region` VALUES ('196','13','恩施','2','0','e','enshi');

INSERT INTO `twotree_region` VALUES ('197','14','长沙','2','0','c','changsha');

INSERT INTO `twotree_region` VALUES ('198','14','张家界','2','0','z','zhangjiajie');

INSERT INTO `twotree_region` VALUES ('199','14','常德','2','0','c','changde');

INSERT INTO `twotree_region` VALUES ('200','14','郴州','2','0','c','chenzhou');

INSERT INTO `twotree_region` VALUES ('201','14','衡阳','2','0','h','hengyang');

INSERT INTO `twotree_region` VALUES ('202','14','怀化','2','0','h','huaihua');

INSERT INTO `twotree_region` VALUES ('203','14','娄底','2','0','l','loudi');

INSERT INTO `twotree_region` VALUES ('204','14','邵阳','2','0','s','shaoyang');

INSERT INTO `twotree_region` VALUES ('205','14','湘潭','2','0','x','xiangtan');

INSERT INTO `twotree_region` VALUES ('206','14','湘西','2','0','x','xiangxi');

INSERT INTO `twotree_region` VALUES ('207','14','益阳','2','0','y','yiyang');

INSERT INTO `twotree_region` VALUES ('208','14','永州','2','0','y','yongzhou');

INSERT INTO `twotree_region` VALUES ('209','14','岳阳','2','0','y','yueyang');

INSERT INTO `twotree_region` VALUES ('210','14','株洲','2','0','z','zhuzhou');

INSERT INTO `twotree_region` VALUES ('211','15','长春','2','0','c','changchun');

INSERT INTO `twotree_region` VALUES ('212','15','吉林','2','0','j','jilin');

INSERT INTO `twotree_region` VALUES ('213','15','白城','2','0','b','baicheng');

INSERT INTO `twotree_region` VALUES ('214','15','白山','2','0','b','baishan');

INSERT INTO `twotree_region` VALUES ('215','15','辽源','2','0','l','liaoyuan');

INSERT INTO `twotree_region` VALUES ('216','15','四平','2','0','s','siping');

INSERT INTO `twotree_region` VALUES ('217','15','松原','2','0','s','songyuan');

INSERT INTO `twotree_region` VALUES ('218','15','通化','2','0','t','tonghua');

INSERT INTO `twotree_region` VALUES ('219','15','延边','2','0','y','yanbian');

INSERT INTO `twotree_region` VALUES ('220','16','南京','2','0','n','nanjing');

INSERT INTO `twotree_region` VALUES ('221','16','苏州','2','0','s','suzhou');

INSERT INTO `twotree_region` VALUES ('222','16','无锡','2','0','w','wuxi');

INSERT INTO `twotree_region` VALUES ('223','16','常州','2','0','c','changzhou');

INSERT INTO `twotree_region` VALUES ('224','16','淮安','2','0','h','huaian');

INSERT INTO `twotree_region` VALUES ('225','16','连云港','2','0','l','lianyungang');

INSERT INTO `twotree_region` VALUES ('226','16','南通','2','0','n','nantong');

INSERT INTO `twotree_region` VALUES ('227','16','宿迁','2','0','s','suqian');

INSERT INTO `twotree_region` VALUES ('228','16','泰州','2','0','t','taizhou');

INSERT INTO `twotree_region` VALUES ('229','16','徐州','2','0','x','xuzhou');

INSERT INTO `twotree_region` VALUES ('230','16','盐城','2','0','y','yancheng');

INSERT INTO `twotree_region` VALUES ('231','16','扬州','2','0','y','yangzhou');

INSERT INTO `twotree_region` VALUES ('232','16','镇江','2','0','z','zhenjiang');

INSERT INTO `twotree_region` VALUES ('233','17','南昌','2','0','n','nanchang');

INSERT INTO `twotree_region` VALUES ('234','17','抚州','2','0','f','fuzhou');

INSERT INTO `twotree_region` VALUES ('235','17','赣州','2','0','g','ganzhou');

INSERT INTO `twotree_region` VALUES ('236','17','吉安','2','0','j','jian');

INSERT INTO `twotree_region` VALUES ('237','17','景德镇','2','0','j','jingdezhen');

INSERT INTO `twotree_region` VALUES ('238','17','九江','2','0','j','jiujiang');

INSERT INTO `twotree_region` VALUES ('239','17','萍乡','2','0','p','pingxiang');

INSERT INTO `twotree_region` VALUES ('240','17','上饶','2','0','s','shangrao');

INSERT INTO `twotree_region` VALUES ('241','17','新余','2','0','x','xinyu');

INSERT INTO `twotree_region` VALUES ('242','17','宜春','2','0','y','yichun');

INSERT INTO `twotree_region` VALUES ('243','17','鹰潭','2','0','y','yingtan');

INSERT INTO `twotree_region` VALUES ('244','18','沈阳','2','0','s','shenyang');

INSERT INTO `twotree_region` VALUES ('245','18','大连','2','0','d','dalian');

INSERT INTO `twotree_region` VALUES ('246','18','鞍山','2','0','a','anshan');

INSERT INTO `twotree_region` VALUES ('247','18','本溪','2','0','b','benxi');

INSERT INTO `twotree_region` VALUES ('248','18','朝阳','2','0','c','chaoyang');

INSERT INTO `twotree_region` VALUES ('249','18','丹东','2','0','d','dandong');

INSERT INTO `twotree_region` VALUES ('250','18','抚顺','2','0','f','fushun');

INSERT INTO `twotree_region` VALUES ('251','18','阜新','2','0','f','fuxin');

INSERT INTO `twotree_region` VALUES ('252','18','葫芦岛','2','0','h','huludao');

INSERT INTO `twotree_region` VALUES ('253','18','锦州','2','0','j','jinzhou');

INSERT INTO `twotree_region` VALUES ('254','18','辽阳','2','0','l','liaoyang');

INSERT INTO `twotree_region` VALUES ('255','18','盘锦','2','0','p','panjin');

INSERT INTO `twotree_region` VALUES ('256','18','铁岭','2','0','t','tieling');

INSERT INTO `twotree_region` VALUES ('257','18','营口','2','0','y','yingkou');

INSERT INTO `twotree_region` VALUES ('258','19','呼和浩特','2','0','h','huhehaote');

INSERT INTO `twotree_region` VALUES ('259','19','阿拉善盟','2','0','a','alashanmeng');

INSERT INTO `twotree_region` VALUES ('260','19','巴彦淖尔盟','2','0','b','bayannaoermeng');

INSERT INTO `twotree_region` VALUES ('261','19','包头','2','0','b','baotou');

INSERT INTO `twotree_region` VALUES ('262','19','赤峰','2','0','c','chifeng');

INSERT INTO `twotree_region` VALUES ('263','19','鄂尔多斯','2','0','e','eerduosi');

INSERT INTO `twotree_region` VALUES ('264','19','呼伦贝尔','2','0','h','hulunbeier');

INSERT INTO `twotree_region` VALUES ('265','19','通辽','2','0','t','tongliao');

INSERT INTO `twotree_region` VALUES ('266','19','乌海','2','0','w','wuhai');

INSERT INTO `twotree_region` VALUES ('267','19','乌兰察布市','2','0','w','wulanchabushi');

INSERT INTO `twotree_region` VALUES ('268','19','锡林郭勒盟','2','0','x','xilinguolemeng');

INSERT INTO `twotree_region` VALUES ('269','19','兴安盟','2','0','x','xinganmeng');

INSERT INTO `twotree_region` VALUES ('270','20','银川','2','0','y','yinchuan');

INSERT INTO `twotree_region` VALUES ('271','20','固原','2','0','g','guyuan');

INSERT INTO `twotree_region` VALUES ('272','20','石嘴山','2','0','s','shizuishan');

INSERT INTO `twotree_region` VALUES ('273','20','吴忠','2','0','w','wuzhong');

INSERT INTO `twotree_region` VALUES ('274','20','中卫','2','0','z','zhongwei');

INSERT INTO `twotree_region` VALUES ('275','21','西宁','2','0','x','xining');

INSERT INTO `twotree_region` VALUES ('276','21','果洛','2','0','g','guoluo');

INSERT INTO `twotree_region` VALUES ('277','21','海北','2','0','h','haibei');

INSERT INTO `twotree_region` VALUES ('278','21','海东','2','0','h','haidong');

INSERT INTO `twotree_region` VALUES ('279','21','海南','2','0','h','hainan');

INSERT INTO `twotree_region` VALUES ('280','21','海西','2','0','h','haixi');

INSERT INTO `twotree_region` VALUES ('281','21','黄南','2','0','h','huangnan');

INSERT INTO `twotree_region` VALUES ('282','21','玉树','2','0','y','yushu');

INSERT INTO `twotree_region` VALUES ('283','22','济南','2','0','j','jinan');

INSERT INTO `twotree_region` VALUES ('284','22','青岛','2','0','q','qingdao');

INSERT INTO `twotree_region` VALUES ('285','22','滨州','2','0','b','binzhou');

INSERT INTO `twotree_region` VALUES ('286','22','德州','2','0','d','dezhou');

INSERT INTO `twotree_region` VALUES ('287','22','东营','2','0','d','dongying');

INSERT INTO `twotree_region` VALUES ('288','22','菏泽','2','0','h','heze');

INSERT INTO `twotree_region` VALUES ('289','22','济宁','2','0','j','jining');

INSERT INTO `twotree_region` VALUES ('290','22','莱芜','2','0','l','laiwu');

INSERT INTO `twotree_region` VALUES ('291','22','聊城','2','0','l','liaocheng');

INSERT INTO `twotree_region` VALUES ('292','22','临沂','2','0','l','linyi');

INSERT INTO `twotree_region` VALUES ('293','22','日照','2','0','r','rizhao');

INSERT INTO `twotree_region` VALUES ('294','22','泰安','2','0','t','taian');

INSERT INTO `twotree_region` VALUES ('295','22','威海','2','0','w','weihai');

INSERT INTO `twotree_region` VALUES ('296','22','潍坊','2','0','w','weifang');

INSERT INTO `twotree_region` VALUES ('297','22','烟台','2','0','y','yantai');

INSERT INTO `twotree_region` VALUES ('298','22','枣庄','2','0','z','zaozhuang');

INSERT INTO `twotree_region` VALUES ('299','22','淄博','2','0','z','zibo');

INSERT INTO `twotree_region` VALUES ('300','23','太原','2','0','t','taiyuan');

INSERT INTO `twotree_region` VALUES ('301','23','长治','2','0','c','changzhi');

INSERT INTO `twotree_region` VALUES ('302','23','大同','2','0','d','datong');

INSERT INTO `twotree_region` VALUES ('303','23','晋城','2','0','j','jincheng');

INSERT INTO `twotree_region` VALUES ('304','23','晋中','2','0','j','jinzhong');

INSERT INTO `twotree_region` VALUES ('305','23','临汾','2','0','l','linfen');

INSERT INTO `twotree_region` VALUES ('306','23','吕梁','2','0','l','lvliang');

INSERT INTO `twotree_region` VALUES ('307','23','朔州','2','0','s','shuozhou');

INSERT INTO `twotree_region` VALUES ('308','23','忻州','2','0','x','xinzhou');

INSERT INTO `twotree_region` VALUES ('309','23','阳泉','2','0','y','yangquan');

INSERT INTO `twotree_region` VALUES ('310','23','运城','2','0','y','yuncheng');

INSERT INTO `twotree_region` VALUES ('311','24','西安','2','0','x','xian');

INSERT INTO `twotree_region` VALUES ('312','24','安康','2','0','a','ankang');

INSERT INTO `twotree_region` VALUES ('313','24','宝鸡','2','0','b','baoji');

INSERT INTO `twotree_region` VALUES ('314','24','汉中','2','0','h','hanzhong');

INSERT INTO `twotree_region` VALUES ('315','24','商洛','2','0','s','shangluo');

INSERT INTO `twotree_region` VALUES ('316','24','铜川','2','0','t','tongchuan');

INSERT INTO `twotree_region` VALUES ('317','24','渭南','2','0','w','weinan');

INSERT INTO `twotree_region` VALUES ('318','24','咸阳','2','0','x','xianyang');

INSERT INTO `twotree_region` VALUES ('319','24','延安','2','0','y','yanan');

INSERT INTO `twotree_region` VALUES ('320','24','榆林','2','0','y','yulin');

INSERT INTO `twotree_region` VALUES ('321','25','上海','2','0','s','shanghai');

INSERT INTO `twotree_region` VALUES ('322','26','成都','2','0','c','chengdu');

INSERT INTO `twotree_region` VALUES ('323','26','绵阳','2','0','m','mianyang');

INSERT INTO `twotree_region` VALUES ('324','26','阿坝','2','0','a','aba');

INSERT INTO `twotree_region` VALUES ('325','26','巴中','2','0','b','bazhong');

INSERT INTO `twotree_region` VALUES ('326','26','达州','2','0','d','dazhou');

INSERT INTO `twotree_region` VALUES ('327','26','德阳','2','0','d','deyang');

INSERT INTO `twotree_region` VALUES ('328','26','甘孜','2','0','g','ganzi');

INSERT INTO `twotree_region` VALUES ('329','26','广安','2','0','g','guangan');

INSERT INTO `twotree_region` VALUES ('330','26','广元','2','0','g','guangyuan');

INSERT INTO `twotree_region` VALUES ('331','26','乐山','2','0','l','leshan');

INSERT INTO `twotree_region` VALUES ('332','26','凉山','2','0','l','liangshan');

INSERT INTO `twotree_region` VALUES ('333','26','眉山','2','0','m','meishan');

INSERT INTO `twotree_region` VALUES ('334','26','南充','2','0','n','nanchong');

INSERT INTO `twotree_region` VALUES ('335','26','内江','2','0','n','neijiang');

INSERT INTO `twotree_region` VALUES ('336','26','攀枝花','2','0','p','panzhihua');

INSERT INTO `twotree_region` VALUES ('337','26','遂宁','2','0','s','suining');

INSERT INTO `twotree_region` VALUES ('338','26','雅安','2','0','y','yaan');

INSERT INTO `twotree_region` VALUES ('339','26','宜宾','2','0','y','yibin');

INSERT INTO `twotree_region` VALUES ('340','26','资阳','2','0','z','ziyang');

INSERT INTO `twotree_region` VALUES ('341','26','自贡','2','0','z','zigong');

INSERT INTO `twotree_region` VALUES ('342','26','泸州','2','0','z','zhou');

INSERT INTO `twotree_region` VALUES ('343','27','天津','2','0','t','tianjin');

INSERT INTO `twotree_region` VALUES ('344','28','拉萨','2','0','l','lasa');

INSERT INTO `twotree_region` VALUES ('345','28','阿里','2','0','a','ali');

INSERT INTO `twotree_region` VALUES ('346','28','昌都','2','0','c','changdu');

INSERT INTO `twotree_region` VALUES ('347','28','林芝','2','0','l','linzhi');

INSERT INTO `twotree_region` VALUES ('348','28','那曲','2','0','n','naqu');

INSERT INTO `twotree_region` VALUES ('349','28','日喀则','2','0','r','rikaze');

INSERT INTO `twotree_region` VALUES ('350','28','山南','2','0','s','shannan');

INSERT INTO `twotree_region` VALUES ('351','29','乌鲁木齐','2','0','w','wulumuqi');

INSERT INTO `twotree_region` VALUES ('352','29','阿克苏','2','0','a','akesu');

INSERT INTO `twotree_region` VALUES ('353','29','阿拉尔','2','0','a','alaer');

INSERT INTO `twotree_region` VALUES ('354','29','巴音郭楞','2','0','b','bayinguoleng');

INSERT INTO `twotree_region` VALUES ('355','29','博尔塔拉','2','0','b','boertala');

INSERT INTO `twotree_region` VALUES ('356','29','昌吉','2','0','c','changji');

INSERT INTO `twotree_region` VALUES ('357','29','哈密','2','0','h','hami');

INSERT INTO `twotree_region` VALUES ('358','29','和田','2','0','h','hetian');

INSERT INTO `twotree_region` VALUES ('359','29','喀什','2','0','k','kashi');

INSERT INTO `twotree_region` VALUES ('360','29','克拉玛依','2','0','k','kelamayi');

INSERT INTO `twotree_region` VALUES ('361','29','克孜勒苏','2','0','k','kezilesu');

INSERT INTO `twotree_region` VALUES ('362','29','石河子','2','0','s','shihezi');

INSERT INTO `twotree_region` VALUES ('363','29','图木舒克','2','0','t','tumushuke');

INSERT INTO `twotree_region` VALUES ('364','29','吐鲁番','2','0','t','tulufan');

INSERT INTO `twotree_region` VALUES ('365','29','五家渠','2','0','w','wujiaqu');

INSERT INTO `twotree_region` VALUES ('366','29','伊犁','2','0','y','yili');

INSERT INTO `twotree_region` VALUES ('367','30','昆明','2','0','k','kunming');

INSERT INTO `twotree_region` VALUES ('368','30','怒江','2','0','n','nujiang');

INSERT INTO `twotree_region` VALUES ('369','30','普洱','2','0','p','puer');

INSERT INTO `twotree_region` VALUES ('370','30','丽江','2','0','l','lijiang');

INSERT INTO `twotree_region` VALUES ('371','30','保山','2','0','b','baoshan');

INSERT INTO `twotree_region` VALUES ('372','30','楚雄','2','0','c','chuxiong');

INSERT INTO `twotree_region` VALUES ('373','30','大理','2','0','d','dali');

INSERT INTO `twotree_region` VALUES ('374','30','德宏','2','0','d','dehong');

INSERT INTO `twotree_region` VALUES ('375','30','迪庆','2','0','d','diqing');

INSERT INTO `twotree_region` VALUES ('376','30','红河','2','0','h','honghe');

INSERT INTO `twotree_region` VALUES ('377','30','临沧','2','0','l','lincang');

INSERT INTO `twotree_region` VALUES ('378','30','曲靖','2','0','q','qujing');

INSERT INTO `twotree_region` VALUES ('379','30','文山','2','0','w','wenshan');

INSERT INTO `twotree_region` VALUES ('380','30','西双版纳','2','0','x','xishuangbanna');

INSERT INTO `twotree_region` VALUES ('381','30','玉溪','2','0','y','yuxi');

INSERT INTO `twotree_region` VALUES ('382','30','昭通','2','0','z','zhaotong');

INSERT INTO `twotree_region` VALUES ('383','31','杭州','2','0','h','hangzhou');

INSERT INTO `twotree_region` VALUES ('384','31','湖州','2','0','h','huzhou');

INSERT INTO `twotree_region` VALUES ('385','31','嘉兴','2','0','j','jiaxing');

INSERT INTO `twotree_region` VALUES ('386','31','金华','2','0','j','jinhua');

INSERT INTO `twotree_region` VALUES ('387','31','丽水','2','0','l','lishui');

INSERT INTO `twotree_region` VALUES ('388','31','宁波','2','0','n','ningbo');

INSERT INTO `twotree_region` VALUES ('389','31','绍兴','2','0','s','shaoxing');

INSERT INTO `twotree_region` VALUES ('390','31','台州','2','0','t','taizhou');

INSERT INTO `twotree_region` VALUES ('391','31','温州','2','0','w','wenzhou');

INSERT INTO `twotree_region` VALUES ('392','31','舟山','2','0','z','zhoushan');

INSERT INTO `twotree_region` VALUES ('393','31','衢州','2','0','z','zhou');

INSERT INTO `twotree_region` VALUES ('394','32','重庆','2','0','z','zhongqing');

INSERT INTO `twotree_region` VALUES ('395','33','香港','2','0','x','xianggang');

INSERT INTO `twotree_region` VALUES ('396','34','澳门','2','0','a','aomen');

INSERT INTO `twotree_region` VALUES ('397','35','台湾','2','0','t','taiwan');

INSERT INTO `twotree_region` VALUES ('398','36','迎江区','3','0','y','yingjiangqu');

INSERT INTO `twotree_region` VALUES ('399','36','大观区','3','0','d','daguanqu');

INSERT INTO `twotree_region` VALUES ('400','36','宜秀区','3','0','y','yixiuqu');

INSERT INTO `twotree_region` VALUES ('401','36','桐城市','3','0','t','tongchengshi');

INSERT INTO `twotree_region` VALUES ('402','36','怀宁县','3','0','h','huainingxian');

INSERT INTO `twotree_region` VALUES ('403','36','枞阳县','3','0','y','yangxian');

INSERT INTO `twotree_region` VALUES ('404','36','潜山县','3','0','q','qianshanxian');

INSERT INTO `twotree_region` VALUES ('405','36','太湖县','3','0','t','taihuxian');

INSERT INTO `twotree_region` VALUES ('406','36','宿松县','3','0','s','susongxian');

INSERT INTO `twotree_region` VALUES ('407','36','望江县','3','0','w','wangjiangxian');

INSERT INTO `twotree_region` VALUES ('408','36','岳西县','3','0','y','yuexixian');

INSERT INTO `twotree_region` VALUES ('409','37','中市区','3','0','z','zhongshiqu');

INSERT INTO `twotree_region` VALUES ('410','37','东市区','3','0','d','dongshiqu');

INSERT INTO `twotree_region` VALUES ('411','37','西市区','3','0','x','xishiqu');

INSERT INTO `twotree_region` VALUES ('412','37','郊区','3','0','j','jiaoqu');

INSERT INTO `twotree_region` VALUES ('413','37','怀远县','3','0','h','huaiyuanxian');

INSERT INTO `twotree_region` VALUES ('414','37','五河县','3','0','w','wuhexian');

INSERT INTO `twotree_region` VALUES ('415','37','固镇县','3','0','g','guzhenxian');

INSERT INTO `twotree_region` VALUES ('416','38','居巢区','3','0','j','juchaoqu');

INSERT INTO `twotree_region` VALUES ('417','38','庐江县','3','0','l','lujiangxian');

INSERT INTO `twotree_region` VALUES ('418','38','无为县','3','0','w','wuweixian');

INSERT INTO `twotree_region` VALUES ('419','38','含山县','3','0','h','hanshanxian');

INSERT INTO `twotree_region` VALUES ('420','38','和县','3','0','h','hexian');

INSERT INTO `twotree_region` VALUES ('421','39','贵池区','3','0','g','guichiqu');

INSERT INTO `twotree_region` VALUES ('422','39','东至县','3','0','d','dongzhixian');

INSERT INTO `twotree_region` VALUES ('423','39','石台县','3','0','s','shitaixian');

INSERT INTO `twotree_region` VALUES ('424','39','青阳县','3','0','q','qingyangxian');

INSERT INTO `twotree_region` VALUES ('425','40','琅琊区','3','0','l','langqu');

INSERT INTO `twotree_region` VALUES ('426','40','南谯区','3','0','n','nanqu');

INSERT INTO `twotree_region` VALUES ('427','40','天长市','3','0','t','tianchangshi');

INSERT INTO `twotree_region` VALUES ('428','40','明光市','3','0','m','mingguangshi');

INSERT INTO `twotree_region` VALUES ('429','40','来安县','3','0','l','laianxian');

INSERT INTO `twotree_region` VALUES ('430','40','全椒县','3','0','q','quanjiaoxian');

INSERT INTO `twotree_region` VALUES ('431','40','定远县','3','0','d','dingyuanxian');

INSERT INTO `twotree_region` VALUES ('432','40','凤阳县','3','0','f','fengyangxian');

INSERT INTO `twotree_region` VALUES ('433','41','蚌山区','3','0','b','bangshanqu');

INSERT INTO `twotree_region` VALUES ('434','41','龙子湖区','3','0','l','longzihuqu');

INSERT INTO `twotree_region` VALUES ('435','41','禹会区','3','0','y','yuhuiqu');

INSERT INTO `twotree_region` VALUES ('436','41','淮上区','3','0','h','huaishangqu');

INSERT INTO `twotree_region` VALUES ('437','41','颍州区','3','0','z','zhouqu');

INSERT INTO `twotree_region` VALUES ('438','41','颍东区','3','0','d','dongqu');

INSERT INTO `twotree_region` VALUES ('439','41','颍泉区','3','0','q','quanqu');

INSERT INTO `twotree_region` VALUES ('440','41','界首市','3','0','j','jieshoushi');

INSERT INTO `twotree_region` VALUES ('441','41','临泉县','3','0','l','linquanxian');

INSERT INTO `twotree_region` VALUES ('442','41','太和县','3','0','t','taihexian');

INSERT INTO `twotree_region` VALUES ('443','41','阜南县','3','0','f','funanxian');

INSERT INTO `twotree_region` VALUES ('444','41','颖上县','3','0','y','yingshangxian');

INSERT INTO `twotree_region` VALUES ('445','42','相山区','3','0','x','xiangshanqu');

INSERT INTO `twotree_region` VALUES ('446','42','杜集区','3','0','d','dujiqu');

INSERT INTO `twotree_region` VALUES ('447','42','烈山区','3','0','l','lieshanqu');

INSERT INTO `twotree_region` VALUES ('448','42','濉溪县','3','0','x','xixian');

INSERT INTO `twotree_region` VALUES ('449','43','田家庵区','3','0','t','tianjiaqu');

INSERT INTO `twotree_region` VALUES ('450','43','大通区','3','0','d','datongqu');

INSERT INTO `twotree_region` VALUES ('451','43','谢家集区','3','0','x','xiejiajiqu');

INSERT INTO `twotree_region` VALUES ('452','43','八公山区','3','0','b','bagongshanqu');

INSERT INTO `twotree_region` VALUES ('453','43','潘集区','3','0','p','panjiqu');

INSERT INTO `twotree_region` VALUES ('454','43','凤台县','3','0','f','fengtaixian');

INSERT INTO `twotree_region` VALUES ('455','44','屯溪区','3','0','t','tunxiqu');

INSERT INTO `twotree_region` VALUES ('456','44','黄山区','3','0','h','huangshanqu');

INSERT INTO `twotree_region` VALUES ('457','44','徽州区','3','0','h','huizhouqu');

INSERT INTO `twotree_region` VALUES ('458','44','歙县','3','0','x','xian');

INSERT INTO `twotree_region` VALUES ('459','44','休宁县','3','0','x','xiuningxian');

INSERT INTO `twotree_region` VALUES ('460','44','黟县','3','0','x','xian');

INSERT INTO `twotree_region` VALUES ('461','44','祁门县','3','0','q','qimenxian');

INSERT INTO `twotree_region` VALUES ('462','45','金安区','3','0','j','jinanqu');

INSERT INTO `twotree_region` VALUES ('463','45','裕安区','3','0','y','yuanqu');

INSERT INTO `twotree_region` VALUES ('464','45','寿县','3','0','s','shouxian');

INSERT INTO `twotree_region` VALUES ('465','45','霍邱县','3','0','h','huoqiuxian');

INSERT INTO `twotree_region` VALUES ('466','45','舒城县','3','0','s','shuchengxian');

INSERT INTO `twotree_region` VALUES ('467','45','金寨县','3','0','j','jinzhaixian');

INSERT INTO `twotree_region` VALUES ('468','45','霍山县','3','0','h','huoshanxian');

INSERT INTO `twotree_region` VALUES ('469','46','雨山区','3','0','y','yushanqu');

INSERT INTO `twotree_region` VALUES ('470','46','花山区','3','0','h','huashanqu');

INSERT INTO `twotree_region` VALUES ('471','46','金家庄区','3','0','j','jinjiazhuangqu');

INSERT INTO `twotree_region` VALUES ('472','46','当涂县','3','0','d','dangtuxian');

INSERT INTO `twotree_region` VALUES ('473','47','埇桥区','3','0','0','null');

INSERT INTO `twotree_region` VALUES ('474','47','砀山县','3','0','s','shanxian');

INSERT INTO `twotree_region` VALUES ('475','47','萧县','3','0','x','xiaoxian');

INSERT INTO `twotree_region` VALUES ('476','47','灵璧县','3','0','l','lingxian');

INSERT INTO `twotree_region` VALUES ('477','47','泗县','3','0','x','xian');

INSERT INTO `twotree_region` VALUES ('478','48','铜官山区','3','0','t','tongguanshanqu');

INSERT INTO `twotree_region` VALUES ('479','48','狮子山区','3','0','s','shizishanqu');

INSERT INTO `twotree_region` VALUES ('480','48','郊区','3','0','j','jiaoqu');

INSERT INTO `twotree_region` VALUES ('481','48','铜陵县','3','0','t','tonglingxian');

INSERT INTO `twotree_region` VALUES ('482','49','镜湖区','3','0','j','jinghuqu');

INSERT INTO `twotree_region` VALUES ('483','49','弋江区','3','0','j','jiangqu');

INSERT INTO `twotree_region` VALUES ('484','49','鸠江区','3','0','j','jiangqu');

INSERT INTO `twotree_region` VALUES ('485','49','三山区','3','0','s','sanshanqu');

INSERT INTO `twotree_region` VALUES ('486','49','芜湖县','3','0','w','wuhuxian');

INSERT INTO `twotree_region` VALUES ('487','49','繁昌县','3','0','f','fanchangxian');

INSERT INTO `twotree_region` VALUES ('488','49','南陵县','3','0','n','nanlingxian');

INSERT INTO `twotree_region` VALUES ('489','50','宣州区','3','0','x','xuanzhouqu');

INSERT INTO `twotree_region` VALUES ('490','50','宁国市','3','0','n','ningguoshi');

INSERT INTO `twotree_region` VALUES ('491','50','郎溪县','3','0','l','langxixian');

INSERT INTO `twotree_region` VALUES ('492','50','广德县','3','0','g','guangdexian');

INSERT INTO `twotree_region` VALUES ('493','50','泾县','3','0','x','xian');

INSERT INTO `twotree_region` VALUES ('494','50','绩溪县','3','0','j','jixixian');

INSERT INTO `twotree_region` VALUES ('495','50','旌德县','3','0','d','dexian');

INSERT INTO `twotree_region` VALUES ('496','51','涡阳县','3','0','w','woyangxian');

INSERT INTO `twotree_region` VALUES ('497','51','蒙城县','3','0','m','mengchengxian');

INSERT INTO `twotree_region` VALUES ('498','51','利辛县','3','0','l','lixinxian');

INSERT INTO `twotree_region` VALUES ('499','51','谯城区','3','0','c','chengqu');

INSERT INTO `twotree_region` VALUES ('500','52','东城区','3','0','d','dongchengqu');

INSERT INTO `twotree_region` VALUES ('501','52','西城区','3','0','x','xichengqu');

INSERT INTO `twotree_region` VALUES ('502','52','海淀区','3','0','h','haidianqu');

INSERT INTO `twotree_region` VALUES ('503','52','朝阳区','3','0','c','chaoyangqu');

INSERT INTO `twotree_region` VALUES ('504','52','崇文区','3','0','c','chongwenqu');

INSERT INTO `twotree_region` VALUES ('505','52','宣武区','3','0','x','xuanwuqu');

INSERT INTO `twotree_region` VALUES ('506','52','丰台区','3','0','f','fengtaiqu');

INSERT INTO `twotree_region` VALUES ('507','52','石景山区','3','0','s','shijingshanqu');

INSERT INTO `twotree_region` VALUES ('508','52','房山区','3','0','f','fangshanqu');

INSERT INTO `twotree_region` VALUES ('509','52','门头沟区','3','0','m','mentougouqu');

INSERT INTO `twotree_region` VALUES ('510','52','通州区','3','0','t','tongzhouqu');

INSERT INTO `twotree_region` VALUES ('511','52','顺义区','3','0','s','shunyiqu');

INSERT INTO `twotree_region` VALUES ('512','52','昌平区','3','0','c','changpingqu');

INSERT INTO `twotree_region` VALUES ('513','52','怀柔区','3','0','h','huairouqu');

INSERT INTO `twotree_region` VALUES ('514','52','平谷区','3','0','p','pingguqu');

INSERT INTO `twotree_region` VALUES ('515','52','大兴区','3','0','d','daxingqu');

INSERT INTO `twotree_region` VALUES ('516','52','密云县','3','0','m','miyunxian');

INSERT INTO `twotree_region` VALUES ('517','52','延庆县','3','0','y','yanqingxian');

INSERT INTO `twotree_region` VALUES ('518','53','鼓楼区','3','0','g','gulouqu');

INSERT INTO `twotree_region` VALUES ('519','53','台江区','3','0','t','taijiangqu');

INSERT INTO `twotree_region` VALUES ('520','53','仓山区','3','0','c','cangshanqu');

INSERT INTO `twotree_region` VALUES ('521','53','马尾区','3','0','m','maweiqu');

INSERT INTO `twotree_region` VALUES ('522','53','晋安区','3','0','j','jinanqu');

INSERT INTO `twotree_region` VALUES ('523','53','福清市','3','0','f','fuqingshi');

INSERT INTO `twotree_region` VALUES ('524','53','长乐市','3','0','c','changleshi');

INSERT INTO `twotree_region` VALUES ('525','53','闽侯县','3','0','m','minhouxian');

INSERT INTO `twotree_region` VALUES ('526','53','连江县','3','0','l','lianjiangxian');

INSERT INTO `twotree_region` VALUES ('527','53','罗源县','3','0','l','luoyuanxian');

INSERT INTO `twotree_region` VALUES ('528','53','闽清县','3','0','m','minqingxian');

INSERT INTO `twotree_region` VALUES ('529','53','永泰县','3','0','y','yongtaixian');

INSERT INTO `twotree_region` VALUES ('530','53','平潭县','3','0','p','pingtanxian');

INSERT INTO `twotree_region` VALUES ('531','54','新罗区','3','0','x','xinluoqu');

INSERT INTO `twotree_region` VALUES ('532','54','漳平市','3','0','z','zhangpingshi');

INSERT INTO `twotree_region` VALUES ('533','54','长汀县','3','0','c','changtingxian');

INSERT INTO `twotree_region` VALUES ('534','54','永定县','3','0','y','yongdingxian');

INSERT INTO `twotree_region` VALUES ('535','54','上杭县','3','0','s','shanghangxian');

INSERT INTO `twotree_region` VALUES ('536','54','武平县','3','0','w','wupingxian');

INSERT INTO `twotree_region` VALUES ('537','54','连城县','3','0','l','lianchengxian');

INSERT INTO `twotree_region` VALUES ('538','55','延平区','3','0','y','yanpingqu');

INSERT INTO `twotree_region` VALUES ('539','55','邵武市','3','0','s','shaowushi');

INSERT INTO `twotree_region` VALUES ('540','55','武夷山市','3','0','w','wuyishanshi');

INSERT INTO `twotree_region` VALUES ('541','55','建瓯市','3','0','j','jianshi');

INSERT INTO `twotree_region` VALUES ('542','55','建阳市','3','0','j','jianyangshi');

INSERT INTO `twotree_region` VALUES ('543','55','顺昌县','3','0','s','shunchangxian');

INSERT INTO `twotree_region` VALUES ('544','55','浦城县','3','0','p','puchengxian');

INSERT INTO `twotree_region` VALUES ('545','55','光泽县','3','0','g','guangzexian');

INSERT INTO `twotree_region` VALUES ('546','55','松溪县','3','0','s','songxixian');

INSERT INTO `twotree_region` VALUES ('547','55','政和县','3','0','z','zhenghexian');

INSERT INTO `twotree_region` VALUES ('548','56','蕉城区','3','0','j','jiaochengqu');

INSERT INTO `twotree_region` VALUES ('549','56','福安市','3','0','f','fuanshi');

INSERT INTO `twotree_region` VALUES ('550','56','福鼎市','3','0','f','fudingshi');

INSERT INTO `twotree_region` VALUES ('551','56','霞浦县','3','0','x','xiapuxian');

INSERT INTO `twotree_region` VALUES ('552','56','古田县','3','0','g','gutianxian');

INSERT INTO `twotree_region` VALUES ('553','56','屏南县','3','0','p','pingnanxian');

INSERT INTO `twotree_region` VALUES ('554','56','寿宁县','3','0','s','shouningxian');

INSERT INTO `twotree_region` VALUES ('555','56','周宁县','3','0','z','zhouningxian');

INSERT INTO `twotree_region` VALUES ('556','56','柘荣县','3','0','r','rongxian');

INSERT INTO `twotree_region` VALUES ('557','57','城厢区','3','0','c','chengxiangqu');

INSERT INTO `twotree_region` VALUES ('558','57','涵江区','3','0','h','hanjiangqu');

INSERT INTO `twotree_region` VALUES ('559','57','荔城区','3','0','l','lichengqu');

INSERT INTO `twotree_region` VALUES ('560','57','秀屿区','3','0','x','xiuyuqu');

INSERT INTO `twotree_region` VALUES ('561','57','仙游县','3','0','x','xianyouxian');

INSERT INTO `twotree_region` VALUES ('562','58','鲤城区','3','0','l','lichengqu');

INSERT INTO `twotree_region` VALUES ('563','58','丰泽区','3','0','f','fengzequ');

INSERT INTO `twotree_region` VALUES ('564','58','洛江区','3','0','l','luojiangqu');

INSERT INTO `twotree_region` VALUES ('565','58','清濛开发区','3','0','q','qing');

INSERT INTO `twotree_region` VALUES ('566','58','泉港区','3','0','q','quangangqu');

INSERT INTO `twotree_region` VALUES ('567','58','石狮市','3','0','s','shishishi');

INSERT INTO `twotree_region` VALUES ('568','58','晋江市','3','0','j','jinjiangshi');

INSERT INTO `twotree_region` VALUES ('569','58','南安市','3','0','n','nananshi');

INSERT INTO `twotree_region` VALUES ('570','58','惠安县','3','0','h','huianxian');

INSERT INTO `twotree_region` VALUES ('571','58','安溪县','3','0','a','anxixian');

INSERT INTO `twotree_region` VALUES ('572','58','永春县','3','0','y','yongchunxian');

INSERT INTO `twotree_region` VALUES ('573','58','德化县','3','0','d','dehuaxian');

INSERT INTO `twotree_region` VALUES ('574','58','金门县','3','0','j','jinmenxian');

INSERT INTO `twotree_region` VALUES ('575','59','梅列区','3','0','m','meiliequ');

INSERT INTO `twotree_region` VALUES ('576','59','三元区','3','0','s','sanyuanqu');

INSERT INTO `twotree_region` VALUES ('577','59','永安市','3','0','y','yonganshi');

INSERT INTO `twotree_region` VALUES ('578','59','明溪县','3','0','m','mingxixian');

INSERT INTO `twotree_region` VALUES ('579','59','清流县','3','0','q','qingliuxian');

INSERT INTO `twotree_region` VALUES ('580','59','宁化县','3','0','n','ninghuaxian');

INSERT INTO `twotree_region` VALUES ('581','59','大田县','3','0','d','datianxian');

INSERT INTO `twotree_region` VALUES ('582','59','尤溪县','3','0','y','youxixian');

INSERT INTO `twotree_region` VALUES ('583','59','沙县','3','0','s','shaxian');

INSERT INTO `twotree_region` VALUES ('584','59','将乐县','3','0','j','jianglexian');

INSERT INTO `twotree_region` VALUES ('585','59','泰宁县','3','0','t','tainingxian');

INSERT INTO `twotree_region` VALUES ('586','59','建宁县','3','0','j','jianningxian');

INSERT INTO `twotree_region` VALUES ('587','60','思明区','3','0','s','simingqu');

INSERT INTO `twotree_region` VALUES ('588','60','海沧区','3','0','h','haicangqu');

INSERT INTO `twotree_region` VALUES ('589','60','湖里区','3','0','h','huliqu');

INSERT INTO `twotree_region` VALUES ('590','60','集美区','3','0','j','jimeiqu');

INSERT INTO `twotree_region` VALUES ('591','60','同安区','3','0','t','tonganqu');

INSERT INTO `twotree_region` VALUES ('592','60','翔安区','3','0','x','xianganqu');

INSERT INTO `twotree_region` VALUES ('593','61','芗城区','3','0','c','chengqu');

INSERT INTO `twotree_region` VALUES ('594','61','龙文区','3','0','l','longwenqu');

INSERT INTO `twotree_region` VALUES ('595','61','龙海市','3','0','l','longhaishi');

INSERT INTO `twotree_region` VALUES ('596','61','云霄县','3','0','y','yunxiaoxian');

INSERT INTO `twotree_region` VALUES ('597','61','漳浦县','3','0','z','zhangpuxian');

INSERT INTO `twotree_region` VALUES ('598','61','诏安县','3','0','a','anxian');

INSERT INTO `twotree_region` VALUES ('599','61','长泰县','3','0','c','changtaixian');

INSERT INTO `twotree_region` VALUES ('600','61','东山县','3','0','d','dongshanxian');

INSERT INTO `twotree_region` VALUES ('601','61','南靖县','3','0','n','nanjingxian');

INSERT INTO `twotree_region` VALUES ('602','61','平和县','3','0','p','pinghexian');

INSERT INTO `twotree_region` VALUES ('603','61','华安县','3','0','h','huaanxian');

INSERT INTO `twotree_region` VALUES ('604','62','皋兰县','3','0','g','gaolanxian');

INSERT INTO `twotree_region` VALUES ('605','62','城关区','3','0','c','chengguanqu');

INSERT INTO `twotree_region` VALUES ('606','62','七里河区','3','0','q','qilihequ');

INSERT INTO `twotree_region` VALUES ('607','62','西固区','3','0','x','xiguqu');

INSERT INTO `twotree_region` VALUES ('608','62','安宁区','3','0','a','anningqu');

INSERT INTO `twotree_region` VALUES ('609','62','红古区','3','0','h','hongguqu');

INSERT INTO `twotree_region` VALUES ('610','62','永登县','3','0','y','yongdengxian');

INSERT INTO `twotree_region` VALUES ('611','62','榆中县','3','0','y','yuzhongxian');

INSERT INTO `twotree_region` VALUES ('612','63','白银区','3','0','b','baiyinqu');

INSERT INTO `twotree_region` VALUES ('613','63','平川区','3','0','p','pingchuanqu');

INSERT INTO `twotree_region` VALUES ('614','63','会宁县','3','0','h','huiningxian');

INSERT INTO `twotree_region` VALUES ('615','63','景泰县','3','0','j','jingtaixian');

INSERT INTO `twotree_region` VALUES ('616','63','靖远县','3','0','j','jingyuanxian');

INSERT INTO `twotree_region` VALUES ('617','64','临洮县','3','0','l','linxian');

INSERT INTO `twotree_region` VALUES ('618','64','陇西县','3','0','l','longxixian');

INSERT INTO `twotree_region` VALUES ('619','64','通渭县','3','0','t','tongweixian');

INSERT INTO `twotree_region` VALUES ('620','64','渭源县','3','0','w','weiyuanxian');

INSERT INTO `twotree_region` VALUES ('621','64','漳县','3','0','z','zhangxian');

INSERT INTO `twotree_region` VALUES ('622','64','岷县','3','0','x','xian');

INSERT INTO `twotree_region` VALUES ('623','64','安定区','3','0','a','andingqu');

INSERT INTO `twotree_region` VALUES ('624','64','安定区','3','0','a','andingqu');

INSERT INTO `twotree_region` VALUES ('625','65','合作市','3','0','h','hezuoshi');

INSERT INTO `twotree_region` VALUES ('626','65','临潭县','3','0','l','lintanxian');

INSERT INTO `twotree_region` VALUES ('627','65','卓尼县','3','0','z','zhuonixian');

INSERT INTO `twotree_region` VALUES ('628','65','舟曲县','3','0','z','zhouquxian');

INSERT INTO `twotree_region` VALUES ('629','65','迭部县','3','0','d','diebuxian');

INSERT INTO `twotree_region` VALUES ('630','65','玛曲县','3','0','m','maquxian');

INSERT INTO `twotree_region` VALUES ('631','65','碌曲县','3','0','l','luquxian');

INSERT INTO `twotree_region` VALUES ('632','65','夏河县','3','0','x','xiahexian');

INSERT INTO `twotree_region` VALUES ('633','66','嘉峪关市','3','0','j','jiayuguanshi');

INSERT INTO `twotree_region` VALUES ('634','67','金川区','3','0','j','jinchuanqu');

INSERT INTO `twotree_region` VALUES ('635','67','永昌县','3','0','y','yongchangxian');

INSERT INTO `twotree_region` VALUES ('636','68','肃州区','3','0','s','suzhouqu');

INSERT INTO `twotree_region` VALUES ('637','68','玉门市','3','0','y','yumenshi');

INSERT INTO `twotree_region` VALUES ('638','68','敦煌市','3','0','d','dunhuangshi');

INSERT INTO `twotree_region` VALUES ('639','68','金塔县','3','0','j','jintaxian');

INSERT INTO `twotree_region` VALUES ('640','68','瓜州县','3','0','g','guazhouxian');

INSERT INTO `twotree_region` VALUES ('641','68','肃北','3','0','s','subei');

INSERT INTO `twotree_region` VALUES ('642','68','阿克塞','3','0','a','akesai');

INSERT INTO `twotree_region` VALUES ('643','69','临夏市','3','0','l','linxiashi');

INSERT INTO `twotree_region` VALUES ('644','69','临夏县','3','0','l','linxiaxian');

INSERT INTO `twotree_region` VALUES ('645','69','康乐县','3','0','k','kanglexian');

INSERT INTO `twotree_region` VALUES ('646','69','永靖县','3','0','y','yongjingxian');

INSERT INTO `twotree_region` VALUES ('647','69','广河县','3','0','g','guanghexian');

INSERT INTO `twotree_region` VALUES ('648','69','和政县','3','0','h','hezhengxian');

INSERT INTO `twotree_region` VALUES ('649','69','东乡族自治县','3','0','d','dongxiangzuzizhixian');

INSERT INTO `twotree_region` VALUES ('650','69','积石山','3','0','j','jishishan');

INSERT INTO `twotree_region` VALUES ('651','70','成县','3','0','c','chengxian');

INSERT INTO `twotree_region` VALUES ('652','70','徽县','3','0','h','huixian');

INSERT INTO `twotree_region` VALUES ('653','70','康县','3','0','k','kangxian');

INSERT INTO `twotree_region` VALUES ('654','70','礼县','3','0','l','lixian');

INSERT INTO `twotree_region` VALUES ('655','70','两当县','3','0','l','liangdangxian');

INSERT INTO `twotree_region` VALUES ('656','70','文县','3','0','w','wenxian');

INSERT INTO `twotree_region` VALUES ('657','70','西和县','3','0','x','xihexian');

INSERT INTO `twotree_region` VALUES ('658','70','宕昌县','3','0','c','changxian');

INSERT INTO `twotree_region` VALUES ('659','70','武都区','3','0','w','wuduqu');

INSERT INTO `twotree_region` VALUES ('660','71','崇信县','3','0','c','chongxinxian');

INSERT INTO `twotree_region` VALUES ('661','71','华亭县','3','0','h','huatingxian');

INSERT INTO `twotree_region` VALUES ('662','71','静宁县','3','0','j','jingningxian');

INSERT INTO `twotree_region` VALUES ('663','71','灵台县','3','0','l','lingtaixian');

INSERT INTO `twotree_region` VALUES ('664','71','崆峒区','3','0','q','qu');

INSERT INTO `twotree_region` VALUES ('665','71','庄浪县','3','0','z','zhuanglangxian');

INSERT INTO `twotree_region` VALUES ('666','71','泾川县','3','0','c','chuanxian');

INSERT INTO `twotree_region` VALUES ('667','72','合水县','3','0','h','heshuixian');

INSERT INTO `twotree_region` VALUES ('668','72','华池县','3','0','h','huachixian');

INSERT INTO `twotree_region` VALUES ('669','72','环县','3','0','h','huanxian');

INSERT INTO `twotree_region` VALUES ('670','72','宁县','3','0','n','ningxian');

INSERT INTO `twotree_region` VALUES ('671','72','庆城县','3','0','q','qingchengxian');

INSERT INTO `twotree_region` VALUES ('672','72','西峰区','3','0','x','xifengqu');

INSERT INTO `twotree_region` VALUES ('673','72','镇原县','3','0','z','zhenyuanxian');

INSERT INTO `twotree_region` VALUES ('674','72','正宁县','3','0','z','zhengningxian');

INSERT INTO `twotree_region` VALUES ('675','73','甘谷县','3','0','g','ganguxian');

INSERT INTO `twotree_region` VALUES ('676','73','秦安县','3','0','q','qinanxian');

INSERT INTO `twotree_region` VALUES ('677','73','清水县','3','0','q','qingshuixian');

INSERT INTO `twotree_region` VALUES ('678','73','秦州区','3','0','q','qinzhouqu');

INSERT INTO `twotree_region` VALUES ('679','73','麦积区','3','0','m','maijiqu');

INSERT INTO `twotree_region` VALUES ('680','73','武山县','3','0','w','wushanxian');

INSERT INTO `twotree_region` VALUES ('681','73','张家川','3','0','z','zhangjiachuan');

INSERT INTO `twotree_region` VALUES ('682','74','古浪县','3','0','g','gulangxian');

INSERT INTO `twotree_region` VALUES ('683','74','民勤县','3','0','m','minqinxian');

INSERT INTO `twotree_region` VALUES ('684','74','天祝','3','0','t','tianzhu');

INSERT INTO `twotree_region` VALUES ('685','74','凉州区','3','0','l','liangzhouqu');

INSERT INTO `twotree_region` VALUES ('686','75','高台县','3','0','g','gaotaixian');

INSERT INTO `twotree_region` VALUES ('687','75','临泽县','3','0','l','linzexian');

INSERT INTO `twotree_region` VALUES ('688','75','民乐县','3','0','m','minlexian');

INSERT INTO `twotree_region` VALUES ('689','75','山丹县','3','0','s','shandanxian');

INSERT INTO `twotree_region` VALUES ('690','75','肃南','3','0','s','sunan');

INSERT INTO `twotree_region` VALUES ('691','75','甘州区','3','0','g','ganzhouqu');

INSERT INTO `twotree_region` VALUES ('692','76','从化市','3','0','c','conghuashi');

INSERT INTO `twotree_region` VALUES ('693','76','天河区','3','0','t','tianhequ');

INSERT INTO `twotree_region` VALUES ('694','76','东山区','3','0','d','dongshanqu');

INSERT INTO `twotree_region` VALUES ('695','76','白云区','3','0','b','baiyunqu');

INSERT INTO `twotree_region` VALUES ('696','76','海珠区','3','0','h','haizhuqu');

INSERT INTO `twotree_region` VALUES ('697','76','荔湾区','3','0','l','liwanqu');

INSERT INTO `twotree_region` VALUES ('698','76','越秀区','3','0','y','yuexiuqu');

INSERT INTO `twotree_region` VALUES ('699','76','黄埔区','3','0','h','huangpuqu');

INSERT INTO `twotree_region` VALUES ('700','76','番禺区','3','0','f','fanqu');

INSERT INTO `twotree_region` VALUES ('701','76','花都区','3','0','h','huaduqu');

INSERT INTO `twotree_region` VALUES ('702','76','增城区','3','0','z','zengchengqu');

INSERT INTO `twotree_region` VALUES ('703','76','从化区','3','0','c','conghuaqu');

INSERT INTO `twotree_region` VALUES ('704','76','市郊','3','0','s','shijiao');

INSERT INTO `twotree_region` VALUES ('705','77','福田区','3','0','f','futianqu');

INSERT INTO `twotree_region` VALUES ('706','77','罗湖区','3','0','l','luohuqu');

INSERT INTO `twotree_region` VALUES ('707','77','南山区','3','0','n','nanshanqu');

INSERT INTO `twotree_region` VALUES ('708','77','宝安区','3','0','b','baoanqu');

INSERT INTO `twotree_region` VALUES ('709','77','龙岗区','3','0','l','longgangqu');

INSERT INTO `twotree_region` VALUES ('710','77','盐田区','3','0','y','yantianqu');

INSERT INTO `twotree_region` VALUES ('711','78','湘桥区','3','0','x','xiangqiaoqu');

INSERT INTO `twotree_region` VALUES ('712','78','潮安县','3','0','c','chaoanxian');

INSERT INTO `twotree_region` VALUES ('713','78','饶平县','3','0','r','raopingxian');

INSERT INTO `twotree_region` VALUES ('714','79','南城区','3','0','n','nanchengqu');

INSERT INTO `twotree_region` VALUES ('715','79','东城区','3','0','d','dongchengqu');

INSERT INTO `twotree_region` VALUES ('716','79','万江区','3','0','w','wanjiangqu');

INSERT INTO `twotree_region` VALUES ('717','79','莞城区','3','0','c','chengqu');

INSERT INTO `twotree_region` VALUES ('718','79','石龙镇','3','0','s','shilongzhen');

INSERT INTO `twotree_region` VALUES ('719','79','虎门镇','3','0','h','humenzhen');

INSERT INTO `twotree_region` VALUES ('720','79','麻涌镇','3','0','m','mayongzhen');

INSERT INTO `twotree_region` VALUES ('721','79','道滘镇','3','0','d','dao');

INSERT INTO `twotree_region` VALUES ('722','79','石碣镇','3','0','s','shizhen');

INSERT INTO `twotree_region` VALUES ('723','79','沙田镇','3','0','s','shatianzhen');

INSERT INTO `twotree_region` VALUES ('724','79','望牛墩镇','3','0','w','wangniudunzhen');

INSERT INTO `twotree_region` VALUES ('725','79','洪梅镇','3','0','h','hongmeizhen');

INSERT INTO `twotree_region` VALUES ('726','79','茶山镇','3','0','c','chashanzhen');

INSERT INTO `twotree_region` VALUES ('727','79','寮步镇','3','0','b','buzhen');

INSERT INTO `twotree_region` VALUES ('728','79','大岭山镇','3','0','d','dalingshanzhen');

INSERT INTO `twotree_region` VALUES ('729','79','大朗镇','3','0','d','dalangzhen');

INSERT INTO `twotree_region` VALUES ('730','79','黄江镇','3','0','h','huangjiangzhen');

INSERT INTO `twotree_region` VALUES ('731','79','樟木头','3','0','z','zhangmutou');

INSERT INTO `twotree_region` VALUES ('732','79','凤岗镇','3','0','f','fenggangzhen');

INSERT INTO `twotree_region` VALUES ('733','79','塘厦镇','3','0','t','tangxiazhen');

INSERT INTO `twotree_region` VALUES ('734','79','谢岗镇','3','0','x','xiegangzhen');

INSERT INTO `twotree_region` VALUES ('735','79','厚街镇','3','0','h','houjiezhen');

INSERT INTO `twotree_region` VALUES ('736','79','清溪镇','3','0','q','qingxizhen');

INSERT INTO `twotree_region` VALUES ('737','79','常平镇','3','0','c','changpingzhen');

INSERT INTO `twotree_region` VALUES ('738','79','桥头镇','3','0','q','qiaotouzhen');

INSERT INTO `twotree_region` VALUES ('739','79','横沥镇','3','0','h','henglizhen');

INSERT INTO `twotree_region` VALUES ('740','79','东坑镇','3','0','d','dongkengzhen');

INSERT INTO `twotree_region` VALUES ('741','79','企石镇','3','0','q','qishizhen');

INSERT INTO `twotree_region` VALUES ('742','79','石排镇','3','0','s','shipaizhen');

INSERT INTO `twotree_region` VALUES ('743','79','长安镇','3','0','c','changanzhen');

INSERT INTO `twotree_region` VALUES ('744','79','中堂镇','3','0','z','zhongtangzhen');

INSERT INTO `twotree_region` VALUES ('745','79','高埗镇','3','0','g','gao');

INSERT INTO `twotree_region` VALUES ('746','80','禅城区','3','0','c','chengqu');

INSERT INTO `twotree_region` VALUES ('747','80','南海区','3','0','n','nanhaiqu');

INSERT INTO `twotree_region` VALUES ('748','80','顺德区','3','0','s','shundequ');

INSERT INTO `twotree_region` VALUES ('749','80','三水区','3','0','s','sanshuiqu');

INSERT INTO `twotree_region` VALUES ('750','80','高明区','3','0','g','gaomingqu');

INSERT INTO `twotree_region` VALUES ('751','81','东源县','3','0','d','dongyuanxian');

INSERT INTO `twotree_region` VALUES ('752','81','和平县','3','0','h','hepingxian');

INSERT INTO `twotree_region` VALUES ('753','81','源城区','3','0','y','yuanchengqu');

INSERT INTO `twotree_region` VALUES ('754','81','连平县','3','0','l','lianpingxian');

INSERT INTO `twotree_region` VALUES ('755','81','龙川县','3','0','l','longchuanxian');

INSERT INTO `twotree_region` VALUES ('756','81','紫金县','3','0','z','zijinxian');

INSERT INTO `twotree_region` VALUES ('757','82','惠阳区','3','0','h','huiyangqu');

INSERT INTO `twotree_region` VALUES ('758','82','惠城区','3','0','h','huichengqu');

INSERT INTO `twotree_region` VALUES ('759','82','大亚湾','3','0','d','dayawan');

INSERT INTO `twotree_region` VALUES ('760','82','博罗县','3','0','b','boluoxian');

INSERT INTO `twotree_region` VALUES ('761','82','惠东县','3','0','h','huidongxian');

INSERT INTO `twotree_region` VALUES ('762','82','龙门县','3','0','l','longmenxian');

INSERT INTO `twotree_region` VALUES ('763','83','江海区','3','0','j','jianghaiqu');

INSERT INTO `twotree_region` VALUES ('764','83','蓬江区','3','0','p','pengjiangqu');

INSERT INTO `twotree_region` VALUES ('765','83','新会区','3','0','x','xinhuiqu');

INSERT INTO `twotree_region` VALUES ('766','83','台山市','3','0','t','taishanshi');

INSERT INTO `twotree_region` VALUES ('767','83','开平市','3','0','k','kaipingshi');

INSERT INTO `twotree_region` VALUES ('768','83','鹤山市','3','0','h','heshanshi');

INSERT INTO `twotree_region` VALUES ('769','83','恩平市','3','0','e','enpingshi');

INSERT INTO `twotree_region` VALUES ('770','84','榕城区','3','0','c','chengqu');

INSERT INTO `twotree_region` VALUES ('771','84','普宁市','3','0','p','puningshi');

INSERT INTO `twotree_region` VALUES ('772','84','揭东县','3','0','j','jiedongxian');

INSERT INTO `twotree_region` VALUES ('773','84','揭西县','3','0','j','jiexixian');

INSERT INTO `twotree_region` VALUES ('774','84','惠来县','3','0','h','huilaixian');

INSERT INTO `twotree_region` VALUES ('775','85','茂南区','3','0','m','maonanqu');

INSERT INTO `twotree_region` VALUES ('776','85','茂港区','3','0','m','maogangqu');

INSERT INTO `twotree_region` VALUES ('777','85','高州市','3','0','g','gaozhoushi');

INSERT INTO `twotree_region` VALUES ('778','85','化州市','3','0','h','huazhoushi');

INSERT INTO `twotree_region` VALUES ('779','85','信宜市','3','0','x','xinyishi');

INSERT INTO `twotree_region` VALUES ('780','85','电白县','3','0','d','dianbaixian');

INSERT INTO `twotree_region` VALUES ('781','86','梅县','3','0','m','meixian');

INSERT INTO `twotree_region` VALUES ('782','86','梅江区','3','0','m','meijiangqu');

INSERT INTO `twotree_region` VALUES ('783','86','兴宁市','3','0','x','xingningshi');

INSERT INTO `twotree_region` VALUES ('784','86','大埔县','3','0','d','dapuxian');

INSERT INTO `twotree_region` VALUES ('785','86','丰顺县','3','0','f','fengshunxian');

INSERT INTO `twotree_region` VALUES ('786','86','五华县','3','0','w','wuhuaxian');

INSERT INTO `twotree_region` VALUES ('787','86','平远县','3','0','p','pingyuanxian');

INSERT INTO `twotree_region` VALUES ('788','86','蕉岭县','3','0','j','jiaolingxian');

INSERT INTO `twotree_region` VALUES ('789','87','清城区','3','0','q','qingchengqu');

INSERT INTO `twotree_region` VALUES ('790','87','英德市','3','0','y','yingdeshi');

INSERT INTO `twotree_region` VALUES ('791','87','连州市','3','0','l','lianzhoushi');

INSERT INTO `twotree_region` VALUES ('792','87','佛冈县','3','0','f','fogangxian');

INSERT INTO `twotree_region` VALUES ('793','87','阳山县','3','0','y','yangshanxian');

INSERT INTO `twotree_region` VALUES ('794','87','清新县','3','0','q','qingxinxian');

INSERT INTO `twotree_region` VALUES ('795','87','连山','3','0','l','lianshan');

INSERT INTO `twotree_region` VALUES ('796','87','连南','3','0','l','liannan');

INSERT INTO `twotree_region` VALUES ('797','88','南澳县','3','0','n','nanaoxian');

INSERT INTO `twotree_region` VALUES ('798','88','潮阳区','3','0','c','chaoyangqu');

INSERT INTO `twotree_region` VALUES ('799','88','澄海区','3','0','c','chenghaiqu');

INSERT INTO `twotree_region` VALUES ('800','88','龙湖区','3','0','l','longhuqu');

INSERT INTO `twotree_region` VALUES ('801','88','金平区','3','0','j','jinpingqu');

INSERT INTO `twotree_region` VALUES ('802','88','濠江区','3','0','j','jiangqu');

INSERT INTO `twotree_region` VALUES ('803','88','潮南区','3','0','c','chaonanqu');

INSERT INTO `twotree_region` VALUES ('804','89','城区','3','0','c','chengqu');

INSERT INTO `twotree_region` VALUES ('805','89','陆丰市','3','0','l','lufengshi');

INSERT INTO `twotree_region` VALUES ('806','89','海丰县','3','0','h','haifengxian');

INSERT INTO `twotree_region` VALUES ('807','89','陆河县','3','0','l','luhexian');

INSERT INTO `twotree_region` VALUES ('808','90','曲江县','3','0','q','qujiangxian');

INSERT INTO `twotree_region` VALUES ('809','90','浈江区','3','0','j','jiangqu');

INSERT INTO `twotree_region` VALUES ('810','90','武江区','3','0','w','wujiangqu');

INSERT INTO `twotree_region` VALUES ('811','90','曲江区','3','0','q','qujiangqu');

INSERT INTO `twotree_region` VALUES ('812','90','乐昌市','3','0','l','lechangshi');

INSERT INTO `twotree_region` VALUES ('813','90','南雄市','3','0','n','nanxiongshi');

INSERT INTO `twotree_region` VALUES ('814','90','始兴县','3','0','s','shixingxian');

INSERT INTO `twotree_region` VALUES ('815','90','仁化县','3','0','r','renhuaxian');

INSERT INTO `twotree_region` VALUES ('816','90','翁源县','3','0','w','wengyuanxian');

INSERT INTO `twotree_region` VALUES ('817','90','新丰县','3','0','x','xinfengxian');

INSERT INTO `twotree_region` VALUES ('818','90','乳源','3','0','r','ruyuan');

INSERT INTO `twotree_region` VALUES ('819','91','江城区','3','0','j','jiangchengqu');

INSERT INTO `twotree_region` VALUES ('820','91','阳春市','3','0','y','yangchunshi');

INSERT INTO `twotree_region` VALUES ('821','91','阳西县','3','0','y','yangxixian');

INSERT INTO `twotree_region` VALUES ('822','91','阳东县','3','0','y','yangdongxian');

INSERT INTO `twotree_region` VALUES ('823','92','云城区','3','0','y','yunchengqu');

INSERT INTO `twotree_region` VALUES ('824','92','罗定市','3','0','l','luodingshi');

INSERT INTO `twotree_region` VALUES ('825','92','新兴县','3','0','x','xinxingxian');

INSERT INTO `twotree_region` VALUES ('826','92','郁南县','3','0','y','yunanxian');

INSERT INTO `twotree_region` VALUES ('827','92','云安县','3','0','y','yunanxian');

INSERT INTO `twotree_region` VALUES ('828','93','赤坎区','3','0','c','chikanqu');

INSERT INTO `twotree_region` VALUES ('829','93','霞山区','3','0','x','xiashanqu');

INSERT INTO `twotree_region` VALUES ('830','93','坡头区','3','0','p','potouqu');

INSERT INTO `twotree_region` VALUES ('831','93','麻章区','3','0','m','mazhangqu');

INSERT INTO `twotree_region` VALUES ('832','93','廉江市','3','0','l','lianjiangshi');

INSERT INTO `twotree_region` VALUES ('833','93','雷州市','3','0','l','leizhoushi');

INSERT INTO `twotree_region` VALUES ('834','93','吴川市','3','0','w','wuchuanshi');

INSERT INTO `twotree_region` VALUES ('835','93','遂溪县','3','0','s','suixixian');

INSERT INTO `twotree_region` VALUES ('836','93','徐闻县','3','0','x','xuwenxian');

INSERT INTO `twotree_region` VALUES ('837','94','肇庆市','3','0','z','zhaoqingshi');

INSERT INTO `twotree_region` VALUES ('838','94','高要市','3','0','g','gaoyaoshi');

INSERT INTO `twotree_region` VALUES ('839','94','四会市','3','0','s','sihuishi');

INSERT INTO `twotree_region` VALUES ('840','94','广宁县','3','0','g','guangningxian');

INSERT INTO `twotree_region` VALUES ('841','94','怀集县','3','0','h','huaijixian');

INSERT INTO `twotree_region` VALUES ('842','94','封开县','3','0','f','fengkaixian');

INSERT INTO `twotree_region` VALUES ('843','94','德庆县','3','0','d','deqingxian');

INSERT INTO `twotree_region` VALUES ('844','95','石岐街道','3','0','s','shijiedao');

INSERT INTO `twotree_region` VALUES ('845','95','东区街道','3','0','d','dongqujiedao');

INSERT INTO `twotree_region` VALUES ('846','95','西区街道','3','0','x','xiqujiedao');

INSERT INTO `twotree_region` VALUES ('847','95','环城街道','3','0','h','huanchengjiedao');

INSERT INTO `twotree_region` VALUES ('848','95','中山港街道','3','0','z','zhongshangangjiedao');

INSERT INTO `twotree_region` VALUES ('849','95','五桂山街道','3','0','w','wuguishanjiedao');

INSERT INTO `twotree_region` VALUES ('850','96','香洲区','3','0','x','xiangzhouqu');

INSERT INTO `twotree_region` VALUES ('851','96','斗门区','3','0','d','doumenqu');

INSERT INTO `twotree_region` VALUES ('852','96','金湾区','3','0','j','jinwanqu');

INSERT INTO `twotree_region` VALUES ('853','97','邕宁区','3','0','n','ningqu');

INSERT INTO `twotree_region` VALUES ('854','97','青秀区','3','0','q','qingxiuqu');

INSERT INTO `twotree_region` VALUES ('855','97','兴宁区','3','0','x','xingningqu');

INSERT INTO `twotree_region` VALUES ('856','97','良庆区','3','0','l','liangqingqu');

INSERT INTO `twotree_region` VALUES ('857','97','西乡塘区','3','0','x','xixiangtangqu');

INSERT INTO `twotree_region` VALUES ('858','97','江南区','3','0','j','jiangnanqu');

INSERT INTO `twotree_region` VALUES ('859','97','武鸣县','3','0','w','wumingxian');

INSERT INTO `twotree_region` VALUES ('860','97','隆安县','3','0','l','longanxian');

INSERT INTO `twotree_region` VALUES ('861','97','马山县','3','0','m','mashanxian');

INSERT INTO `twotree_region` VALUES ('862','97','上林县','3','0','s','shanglinxian');

INSERT INTO `twotree_region` VALUES ('863','97','宾阳县','3','0','b','binyangxian');

INSERT INTO `twotree_region` VALUES ('864','97','横县','3','0','h','hengxian');

INSERT INTO `twotree_region` VALUES ('865','98','秀峰区','3','0','x','xiufengqu');

INSERT INTO `twotree_region` VALUES ('866','98','叠彩区','3','0','d','diecaiqu');

INSERT INTO `twotree_region` VALUES ('867','98','象山区','3','0','x','xiangshanqu');

INSERT INTO `twotree_region` VALUES ('868','98','七星区','3','0','q','qixingqu');

INSERT INTO `twotree_region` VALUES ('869','98','雁山区','3','0','y','yanshanqu');

INSERT INTO `twotree_region` VALUES ('870','98','阳朔县','3','0','y','yangshuoxian');

INSERT INTO `twotree_region` VALUES ('871','98','临桂县','3','0','l','linguixian');

INSERT INTO `twotree_region` VALUES ('872','98','灵川县','3','0','l','lingchuanxian');

INSERT INTO `twotree_region` VALUES ('873','98','全州县','3','0','q','quanzhouxian');

INSERT INTO `twotree_region` VALUES ('874','98','平乐县','3','0','p','pinglexian');

INSERT INTO `twotree_region` VALUES ('875','98','兴安县','3','0','x','xinganxian');

INSERT INTO `twotree_region` VALUES ('876','98','灌阳县','3','0','g','guanyangxian');

INSERT INTO `twotree_region` VALUES ('877','98','荔浦县','3','0','l','lipuxian');

INSERT INTO `twotree_region` VALUES ('878','98','资源县','3','0','z','ziyuanxian');

INSERT INTO `twotree_region` VALUES ('879','98','永福县','3','0','y','yongfuxian');

INSERT INTO `twotree_region` VALUES ('880','98','龙胜','3','0','l','longsheng');

INSERT INTO `twotree_region` VALUES ('881','98','恭城','3','0','g','gongcheng');

INSERT INTO `twotree_region` VALUES ('882','99','右江区','3','0','y','youjiangqu');

INSERT INTO `twotree_region` VALUES ('883','99','凌云县','3','0','l','lingyunxian');

INSERT INTO `twotree_region` VALUES ('884','99','平果县','3','0','p','pingguoxian');

INSERT INTO `twotree_region` VALUES ('885','99','西林县','3','0','x','xilinxian');

INSERT INTO `twotree_region` VALUES ('886','99','乐业县','3','0','l','leyexian');

INSERT INTO `twotree_region` VALUES ('887','99','德保县','3','0','d','debaoxian');

INSERT INTO `twotree_region` VALUES ('888','99','田林县','3','0','t','tianlinxian');

INSERT INTO `twotree_region` VALUES ('889','99','田阳县','3','0','t','tianyangxian');

INSERT INTO `twotree_region` VALUES ('890','99','靖西县','3','0','j','jingxixian');

INSERT INTO `twotree_region` VALUES ('891','99','田东县','3','0','t','tiandongxian');

INSERT INTO `twotree_region` VALUES ('892','99','那坡县','3','0','n','napoxian');

INSERT INTO `twotree_region` VALUES ('893','99','隆林','3','0','l','longlin');

INSERT INTO `twotree_region` VALUES ('894','100','海城区','3','0','h','haichengqu');

INSERT INTO `twotree_region` VALUES ('895','100','银海区','3','0','y','yinhaiqu');

INSERT INTO `twotree_region` VALUES ('896','100','铁山港区','3','0','t','tieshangangqu');

INSERT INTO `twotree_region` VALUES ('897','100','合浦县','3','0','h','hepuxian');

INSERT INTO `twotree_region` VALUES ('898','101','江州区','3','0','j','jiangzhouqu');

INSERT INTO `twotree_region` VALUES ('899','101','凭祥市','3','0','p','pingxiangshi');

INSERT INTO `twotree_region` VALUES ('900','101','宁明县','3','0','n','ningmingxian');

INSERT INTO `twotree_region` VALUES ('901','101','扶绥县','3','0','f','fusuixian');

INSERT INTO `twotree_region` VALUES ('902','101','龙州县','3','0','l','longzhouxian');

INSERT INTO `twotree_region` VALUES ('903','101','大新县','3','0','d','daxinxian');

INSERT INTO `twotree_region` VALUES ('904','101','天等县','3','0','t','tiandengxian');

INSERT INTO `twotree_region` VALUES ('905','102','港口区','3','0','g','gangkouqu');

INSERT INTO `twotree_region` VALUES ('906','102','防城区','3','0','f','fangchengqu');

INSERT INTO `twotree_region` VALUES ('907','102','东兴市','3','0','d','dongxingshi');

INSERT INTO `twotree_region` VALUES ('908','102','上思县','3','0','s','shangsixian');

INSERT INTO `twotree_region` VALUES ('909','103','港北区','3','0','g','gangbeiqu');

INSERT INTO `twotree_region` VALUES ('910','103','港南区','3','0','g','gangnanqu');

INSERT INTO `twotree_region` VALUES ('911','103','覃塘区','3','0','t','tangqu');

INSERT INTO `twotree_region` VALUES ('912','103','桂平市','3','0','g','guipingshi');

INSERT INTO `twotree_region` VALUES ('913','103','平南县','3','0','p','pingnanxian');

INSERT INTO `twotree_region` VALUES ('914','104','金城江区','3','0','j','jinchengjiangqu');

INSERT INTO `twotree_region` VALUES ('915','104','宜州市','3','0','y','yizhoushi');

INSERT INTO `twotree_region` VALUES ('916','104','天峨县','3','0','t','tianexian');

INSERT INTO `twotree_region` VALUES ('917','104','凤山县','3','0','f','fengshanxian');

INSERT INTO `twotree_region` VALUES ('918','104','南丹县','3','0','n','nandanxian');

INSERT INTO `twotree_region` VALUES ('919','104','东兰县','3','0','d','donglanxian');

INSERT INTO `twotree_region` VALUES ('920','104','都安','3','0','d','duan');

INSERT INTO `twotree_region` VALUES ('921','104','罗城','3','0','l','luocheng');

INSERT INTO `twotree_region` VALUES ('922','104','巴马','3','0','b','bama');

INSERT INTO `twotree_region` VALUES ('923','104','环江','3','0','h','huanjiang');

INSERT INTO `twotree_region` VALUES ('924','104','大化','3','0','d','dahua');

INSERT INTO `twotree_region` VALUES ('925','105','八步区','3','0','b','babuqu');

INSERT INTO `twotree_region` VALUES ('926','105','钟山县','3','0','z','zhongshanxian');

INSERT INTO `twotree_region` VALUES ('927','105','昭平县','3','0','z','zhaopingxian');

INSERT INTO `twotree_region` VALUES ('928','105','富川','3','0','f','fuchuan');

INSERT INTO `twotree_region` VALUES ('929','106','兴宾区','3','0','x','xingbinqu');

INSERT INTO `twotree_region` VALUES ('930','106','合山市','3','0','h','heshanshi');

INSERT INTO `twotree_region` VALUES ('931','106','象州县','3','0','x','xiangzhouxian');

INSERT INTO `twotree_region` VALUES ('932','106','武宣县','3','0','w','wuxuanxian');

INSERT INTO `twotree_region` VALUES ('933','106','忻城县','3','0','x','xinchengxian');

INSERT INTO `twotree_region` VALUES ('934','106','金秀','3','0','j','jinxiu');

INSERT INTO `twotree_region` VALUES ('935','107','城中区','3','0','c','chengzhongqu');

INSERT INTO `twotree_region` VALUES ('936','107','鱼峰区','3','0','y','yufengqu');

INSERT INTO `twotree_region` VALUES ('937','107','柳北区','3','0','l','liubeiqu');

INSERT INTO `twotree_region` VALUES ('938','107','柳南区','3','0','l','liunanqu');

INSERT INTO `twotree_region` VALUES ('939','107','柳江县','3','0','l','liujiangxian');

INSERT INTO `twotree_region` VALUES ('940','107','柳城县','3','0','l','liuchengxian');

INSERT INTO `twotree_region` VALUES ('941','107','鹿寨县','3','0','l','luzhaixian');

INSERT INTO `twotree_region` VALUES ('942','107','融安县','3','0','r','ronganxian');

INSERT INTO `twotree_region` VALUES ('943','107','融水','3','0','r','rongshui');

INSERT INTO `twotree_region` VALUES ('944','107','三江','3','0','s','sanjiang');

INSERT INTO `twotree_region` VALUES ('945','108','钦南区','3','0','q','qinnanqu');

INSERT INTO `twotree_region` VALUES ('946','108','钦北区','3','0','q','qinbeiqu');

INSERT INTO `twotree_region` VALUES ('947','108','灵山县','3','0','l','lingshanxian');

INSERT INTO `twotree_region` VALUES ('948','108','浦北县','3','0','p','pubeixian');

INSERT INTO `twotree_region` VALUES ('949','109','万秀区','3','0','w','wanxiuqu');

INSERT INTO `twotree_region` VALUES ('950','109','蝶山区','3','0','d','dieshanqu');

INSERT INTO `twotree_region` VALUES ('951','109','长洲区','3','0','c','changzhouqu');

INSERT INTO `twotree_region` VALUES ('952','109','岑溪市','3','0','x','xishi');

INSERT INTO `twotree_region` VALUES ('953','109','苍梧县','3','0','c','cangwuxian');

INSERT INTO `twotree_region` VALUES ('954','109','藤县','3','0','t','tengxian');

INSERT INTO `twotree_region` VALUES ('955','109','蒙山县','3','0','m','mengshanxian');

INSERT INTO `twotree_region` VALUES ('956','110','玉州区','3','0','y','yuzhouqu');

INSERT INTO `twotree_region` VALUES ('957','110','北流市','3','0','b','beiliushi');

INSERT INTO `twotree_region` VALUES ('958','110','容县','3','0','r','rongxian');

INSERT INTO `twotree_region` VALUES ('959','110','陆川县','3','0','l','luchuanxian');

INSERT INTO `twotree_region` VALUES ('960','110','博白县','3','0','b','bobaixian');

INSERT INTO `twotree_region` VALUES ('961','110','兴业县','3','0','x','xingyexian');

INSERT INTO `twotree_region` VALUES ('962','111','南明区','3','0','n','nanmingqu');

INSERT INTO `twotree_region` VALUES ('963','111','云岩区','3','0','y','yunyanqu');

INSERT INTO `twotree_region` VALUES ('964','111','花溪区','3','0','h','huaxiqu');

INSERT INTO `twotree_region` VALUES ('965','111','乌当区','3','0','w','wudangqu');

INSERT INTO `twotree_region` VALUES ('966','111','白云区','3','0','b','baiyunqu');

INSERT INTO `twotree_region` VALUES ('967','111','小河区','3','0','x','xiaohequ');

INSERT INTO `twotree_region` VALUES ('968','111','金阳新区','3','0','j','jinyangxinqu');

INSERT INTO `twotree_region` VALUES ('969','111','新天园区','3','0','x','xintianyuanqu');

INSERT INTO `twotree_region` VALUES ('970','111','清镇市','3','0','q','qingzhenshi');

INSERT INTO `twotree_region` VALUES ('971','111','开阳县','3','0','k','kaiyangxian');

INSERT INTO `twotree_region` VALUES ('972','111','修文县','3','0','x','xiuwenxian');

INSERT INTO `twotree_region` VALUES ('973','111','息烽县','3','0','x','xifengxian');

INSERT INTO `twotree_region` VALUES ('974','112','西秀区','3','0','x','xixiuqu');

INSERT INTO `twotree_region` VALUES ('975','112','关岭','3','0','g','guanling');

INSERT INTO `twotree_region` VALUES ('976','112','镇宁','3','0','z','zhenning');

INSERT INTO `twotree_region` VALUES ('977','112','紫云','3','0','z','ziyun');

INSERT INTO `twotree_region` VALUES ('978','112','平坝县','3','0','p','pingbaxian');

INSERT INTO `twotree_region` VALUES ('979','112','普定县','3','0','p','pudingxian');

INSERT INTO `twotree_region` VALUES ('980','113','毕节市','3','0','b','bijieshi');

INSERT INTO `twotree_region` VALUES ('981','113','大方县','3','0','d','dafangxian');

INSERT INTO `twotree_region` VALUES ('982','113','黔西县','3','0','q','qianxixian');

INSERT INTO `twotree_region` VALUES ('983','113','金沙县','3','0','j','jinshaxian');

INSERT INTO `twotree_region` VALUES ('984','113','织金县','3','0','z','zhijinxian');

INSERT INTO `twotree_region` VALUES ('985','113','纳雍县','3','0','n','nayongxian');

INSERT INTO `twotree_region` VALUES ('986','113','赫章县','3','0','h','hezhangxian');

INSERT INTO `twotree_region` VALUES ('987','113','威宁','3','0','w','weining');

INSERT INTO `twotree_region` VALUES ('988','114','钟山区','3','0','z','zhongshanqu');

INSERT INTO `twotree_region` VALUES ('989','114','六枝特区','3','0','l','liuzhitequ');

INSERT INTO `twotree_region` VALUES ('990','114','水城县','3','0','s','shuichengxian');

INSERT INTO `twotree_region` VALUES ('991','114','盘县','3','0','p','panxian');

INSERT INTO `twotree_region` VALUES ('992','115','凯里市','3','0','k','kailishi');

INSERT INTO `twotree_region` VALUES ('993','115','黄平县','3','0','h','huangpingxian');

INSERT INTO `twotree_region` VALUES ('994','115','施秉县','3','0','s','shibingxian');

INSERT INTO `twotree_region` VALUES ('995','115','三穗县','3','0','s','sansuixian');

INSERT INTO `twotree_region` VALUES ('996','115','镇远县','3','0','z','zhenyuanxian');

INSERT INTO `twotree_region` VALUES ('997','115','岑巩县','3','0','g','gongxian');

INSERT INTO `twotree_region` VALUES ('998','115','天柱县','3','0','t','tianzhuxian');

INSERT INTO `twotree_region` VALUES ('999','115','锦屏县','3','0','j','jinpingxian');

INSERT INTO `twotree_region` VALUES ('1000','115','剑河县','3','0','j','jianhexian');

INSERT INTO `twotree_region` VALUES ('1001','115','台江县','3','0','t','taijiangxian');

INSERT INTO `twotree_region` VALUES ('1002','115','黎平县','3','0','l','lipingxian');

INSERT INTO `twotree_region` VALUES ('1003','115','榕江县','3','0','j','jiangxian');

INSERT INTO `twotree_region` VALUES ('1004','115','从江县','3','0','c','congjiangxian');

INSERT INTO `twotree_region` VALUES ('1005','115','雷山县','3','0','l','leishanxian');

INSERT INTO `twotree_region` VALUES ('1006','115','麻江县','3','0','m','majiangxian');

INSERT INTO `twotree_region` VALUES ('1007','115','丹寨县','3','0','d','danzhaixian');

INSERT INTO `twotree_region` VALUES ('1008','116','都匀市','3','0','d','duyunshi');

INSERT INTO `twotree_region` VALUES ('1009','116','福泉市','3','0','f','fuquanshi');

INSERT INTO `twotree_region` VALUES ('1010','116','荔波县','3','0','l','liboxian');

INSERT INTO `twotree_region` VALUES ('1011','116','贵定县','3','0','g','guidingxian');

INSERT INTO `twotree_region` VALUES ('1012','116','瓮安县','3','0','w','wenganxian');

INSERT INTO `twotree_region` VALUES ('1013','116','独山县','3','0','d','dushanxian');

INSERT INTO `twotree_region` VALUES ('1014','116','平塘县','3','0','p','pingtangxian');

INSERT INTO `twotree_region` VALUES ('1015','116','罗甸县','3','0','l','luodianxian');

INSERT INTO `twotree_region` VALUES ('1016','116','长顺县','3','0','c','changshunxian');

INSERT INTO `twotree_region` VALUES ('1017','116','龙里县','3','0','l','longlixian');

INSERT INTO `twotree_region` VALUES ('1018','116','惠水县','3','0','h','huishuixian');

INSERT INTO `twotree_region` VALUES ('1019','116','三都','3','0','s','sandu');

INSERT INTO `twotree_region` VALUES ('1020','117','兴义市','3','0','x','xingyishi');

INSERT INTO `twotree_region` VALUES ('1021','117','兴仁县','3','0','x','xingrenxian');

INSERT INTO `twotree_region` VALUES ('1022','117','普安县','3','0','p','puanxian');

INSERT INTO `twotree_region` VALUES ('1023','117','晴隆县','3','0','q','qinglongxian');

INSERT INTO `twotree_region` VALUES ('1024','117','贞丰县','3','0','z','zhenfengxian');

INSERT INTO `twotree_region` VALUES ('1025','117','望谟县','3','0','w','wangxian');

INSERT INTO `twotree_region` VALUES ('1026','117','册亨县','3','0','c','cehengxian');

INSERT INTO `twotree_region` VALUES ('1027','117','安龙县','3','0','a','anlongxian');

INSERT INTO `twotree_region` VALUES ('1028','118','铜仁市','3','0','t','tongrenshi');

INSERT INTO `twotree_region` VALUES ('1029','118','江口县','3','0','j','jiangkouxian');

INSERT INTO `twotree_region` VALUES ('1030','118','石阡县','3','0','s','shixian');

INSERT INTO `twotree_region` VALUES ('1031','118','思南县','3','0','s','sinanxian');

INSERT INTO `twotree_region` VALUES ('1032','118','德江县','3','0','d','dejiangxian');

INSERT INTO `twotree_region` VALUES ('1033','118','玉屏','3','0','y','yuping');

INSERT INTO `twotree_region` VALUES ('1034','118','印江','3','0','y','yinjiang');

INSERT INTO `twotree_region` VALUES ('1035','118','沿河','3','0','y','yanhe');

INSERT INTO `twotree_region` VALUES ('1036','118','松桃','3','0','s','songtao');

INSERT INTO `twotree_region` VALUES ('1037','118','万山特区','3','0','w','wanshantequ');

INSERT INTO `twotree_region` VALUES ('1038','119','红花岗区','3','0','h','honghuagangqu');

INSERT INTO `twotree_region` VALUES ('1039','119','务川县','3','0','w','wuchuanxian');

INSERT INTO `twotree_region` VALUES ('1040','119','道真县','3','0','d','daozhenxian');

INSERT INTO `twotree_region` VALUES ('1041','119','汇川区','3','0','h','huichuanqu');

INSERT INTO `twotree_region` VALUES ('1042','119','赤水市','3','0','c','chishuishi');

INSERT INTO `twotree_region` VALUES ('1043','119','仁怀市','3','0','r','renhuaishi');

INSERT INTO `twotree_region` VALUES ('1044','119','遵义县','3','0','z','zunyixian');

INSERT INTO `twotree_region` VALUES ('1045','119','桐梓县','3','0','t','tongxian');

INSERT INTO `twotree_region` VALUES ('1046','119','绥阳县','3','0','s','suiyangxian');

INSERT INTO `twotree_region` VALUES ('1047','119','正安县','3','0','z','zhenganxian');

INSERT INTO `twotree_region` VALUES ('1048','119','凤冈县','3','0','f','fenggangxian');

INSERT INTO `twotree_region` VALUES ('1049','119','湄潭县','3','0','t','tanxian');

INSERT INTO `twotree_region` VALUES ('1050','119','余庆县','3','0','y','yuqingxian');

INSERT INTO `twotree_region` VALUES ('1051','119','习水县','3','0','x','xishuixian');

INSERT INTO `twotree_region` VALUES ('1052','119','道真','3','0','d','daozhen');

INSERT INTO `twotree_region` VALUES ('1053','119','务川','3','0','w','wuchuan');

INSERT INTO `twotree_region` VALUES ('1054','120','秀英区','3','0','x','xiuyingqu');

INSERT INTO `twotree_region` VALUES ('1055','120','龙华区','3','0','l','longhuaqu');

INSERT INTO `twotree_region` VALUES ('1056','120','琼山区','3','0','q','qiongshanqu');

INSERT INTO `twotree_region` VALUES ('1057','120','美兰区','3','0','m','meilanqu');

INSERT INTO `twotree_region` VALUES ('1058','137','市区','3','0','s','shiqu');

INSERT INTO `twotree_region` VALUES ('1059','137','洋浦开发区','3','0','y','yangpukaifaqu');

INSERT INTO `twotree_region` VALUES ('1060','137','那大镇','3','0','n','nadazhen');

INSERT INTO `twotree_region` VALUES ('1061','137','王五镇','3','0','w','wangwuzhen');

INSERT INTO `twotree_region` VALUES ('1062','137','雅星镇','3','0','y','yaxingzhen');

INSERT INTO `twotree_region` VALUES ('1063','137','大成镇','3','0','d','dachengzhen');

INSERT INTO `twotree_region` VALUES ('1064','137','中和镇','3','0','z','zhonghezhen');

INSERT INTO `twotree_region` VALUES ('1065','137','峨蔓镇','3','0','e','emanzhen');

INSERT INTO `twotree_region` VALUES ('1066','137','南丰镇','3','0','n','nanfengzhen');

INSERT INTO `twotree_region` VALUES ('1067','137','白马井镇','3','0','b','baimajingzhen');

INSERT INTO `twotree_region` VALUES ('1068','137','兰洋镇','3','0','l','lanyangzhen');

INSERT INTO `twotree_region` VALUES ('1069','137','和庆镇','3','0','h','heqingzhen');

INSERT INTO `twotree_region` VALUES ('1070','137','海头镇','3','0','h','haitouzhen');

INSERT INTO `twotree_region` VALUES ('1071','137','排浦镇','3','0','p','paipuzhen');

INSERT INTO `twotree_region` VALUES ('1072','137','东成镇','3','0','d','dongchengzhen');

INSERT INTO `twotree_region` VALUES ('1073','137','光村镇','3','0','g','guangcunzhen');

INSERT INTO `twotree_region` VALUES ('1074','137','木棠镇','3','0','m','mutangzhen');

INSERT INTO `twotree_region` VALUES ('1075','137','新州镇','3','0','x','xinzhouzhen');

INSERT INTO `twotree_region` VALUES ('1076','137','三都镇','3','0','s','sanduzhen');

INSERT INTO `twotree_region` VALUES ('1077','137','其他','3','0','q','qita');

INSERT INTO `twotree_region` VALUES ('1078','138','长安区','3','0','c','changanqu');

INSERT INTO `twotree_region` VALUES ('1079','138','桥东区','3','0','q','qiaodongqu');

INSERT INTO `twotree_region` VALUES ('1080','138','桥西区','3','0','q','qiaoxiqu');

INSERT INTO `twotree_region` VALUES ('1081','138','新华区','3','0','x','xinhuaqu');

INSERT INTO `twotree_region` VALUES ('1082','138','裕华区','3','0','y','yuhuaqu');

INSERT INTO `twotree_region` VALUES ('1083','138','井陉矿区','3','0','j','jingkuangqu');

INSERT INTO `twotree_region` VALUES ('1084','138','高新区','3','0','g','gaoxinqu');

INSERT INTO `twotree_region` VALUES ('1085','138','辛集市','3','0','x','xinjishi');

INSERT INTO `twotree_region` VALUES ('1086','138','藁城市','3','0','c','chengshi');

INSERT INTO `twotree_region` VALUES ('1087','138','晋州市','3','0','j','jinzhoushi');

INSERT INTO `twotree_region` VALUES ('1088','138','新乐市','3','0','x','xinleshi');

INSERT INTO `twotree_region` VALUES ('1089','138','鹿泉市','3','0','l','luquanshi');

INSERT INTO `twotree_region` VALUES ('1090','138','井陉县','3','0','j','jingxian');

INSERT INTO `twotree_region` VALUES ('1091','138','正定县','3','0','z','zhengdingxian');

INSERT INTO `twotree_region` VALUES ('1092','138','栾城县','3','0','c','chengxian');

INSERT INTO `twotree_region` VALUES ('1093','138','行唐县','3','0','x','xingtangxian');

INSERT INTO `twotree_region` VALUES ('1094','138','灵寿县','3','0','l','lingshouxian');

INSERT INTO `twotree_region` VALUES ('1095','138','高邑县','3','0','g','gaoyixian');

INSERT INTO `twotree_region` VALUES ('1096','138','深泽县','3','0','s','shenzexian');

INSERT INTO `twotree_region` VALUES ('1097','138','赞皇县','3','0','z','zanhuangxian');

INSERT INTO `twotree_region` VALUES ('1098','138','无极县','3','0','w','wujixian');

INSERT INTO `twotree_region` VALUES ('1099','138','平山县','3','0','p','pingshanxian');

INSERT INTO `twotree_region` VALUES ('1100','138','元氏县','3','0','y','yuanshixian');

INSERT INTO `twotree_region` VALUES ('1101','138','赵县','3','0','z','zhaoxian');

INSERT INTO `twotree_region` VALUES ('1102','139','新市区','3','0','x','xinshiqu');

INSERT INTO `twotree_region` VALUES ('1103','139','南市区','3','0','n','nanshiqu');

INSERT INTO `twotree_region` VALUES ('1104','139','北市区','3','0','b','beishiqu');

INSERT INTO `twotree_region` VALUES ('1105','139','涿州市','3','0','z','zhoushi');

INSERT INTO `twotree_region` VALUES ('1106','139','定州市','3','0','d','dingzhoushi');

INSERT INTO `twotree_region` VALUES ('1107','139','安国市','3','0','a','anguoshi');

INSERT INTO `twotree_region` VALUES ('1108','139','高碑店市','3','0','g','gaobeidianshi');

INSERT INTO `twotree_region` VALUES ('1109','139','满城县','3','0','m','manchengxian');

INSERT INTO `twotree_region` VALUES ('1110','139','清苑县','3','0','q','qingyuanxian');

INSERT INTO `twotree_region` VALUES ('1111','139','涞水县','3','0','s','shuixian');

INSERT INTO `twotree_region` VALUES ('1112','139','阜平县','3','0','f','fupingxian');

INSERT INTO `twotree_region` VALUES ('1113','139','徐水县','3','0','x','xushuixian');

INSERT INTO `twotree_region` VALUES ('1114','139','定兴县','3','0','d','dingxingxian');

INSERT INTO `twotree_region` VALUES ('1115','139','唐县','3','0','t','tangxian');

INSERT INTO `twotree_region` VALUES ('1116','139','高阳县','3','0','g','gaoyangxian');

INSERT INTO `twotree_region` VALUES ('1117','139','容城县','3','0','r','rongchengxian');

INSERT INTO `twotree_region` VALUES ('1118','139','涞源县','3','0','y','yuanxian');

INSERT INTO `twotree_region` VALUES ('1119','139','望都县','3','0','w','wangduxian');

INSERT INTO `twotree_region` VALUES ('1120','139','安新县','3','0','a','anxinxian');

INSERT INTO `twotree_region` VALUES ('1121','139','易县','3','0','y','yixian');

INSERT INTO `twotree_region` VALUES ('1122','139','曲阳县','3','0','q','quyangxian');

INSERT INTO `twotree_region` VALUES ('1123','139','蠡县','3','0','x','xian');

INSERT INTO `twotree_region` VALUES ('1124','139','顺平县','3','0','s','shunpingxian');

INSERT INTO `twotree_region` VALUES ('1125','139','博野县','3','0','b','boyexian');

INSERT INTO `twotree_region` VALUES ('1126','139','雄县','3','0','x','xiongxian');

INSERT INTO `twotree_region` VALUES ('1127','140','运河区','3','0','y','yunhequ');

INSERT INTO `twotree_region` VALUES ('1128','140','新华区','3','0','x','xinhuaqu');

INSERT INTO `twotree_region` VALUES ('1129','140','泊头市','3','0','b','botoushi');

INSERT INTO `twotree_region` VALUES ('1130','140','任丘市','3','0','r','renqiushi');

INSERT INTO `twotree_region` VALUES ('1131','140','黄骅市','3','0','h','huangshi');

INSERT INTO `twotree_region` VALUES ('1132','140','河间市','3','0','h','hejianshi');

INSERT INTO `twotree_region` VALUES ('1133','140','沧县','3','0','c','cangxian');

INSERT INTO `twotree_region` VALUES ('1134','140','青县','3','0','q','qingxian');

INSERT INTO `twotree_region` VALUES ('1135','140','东光县','3','0','d','dongguangxian');

INSERT INTO `twotree_region` VALUES ('1136','140','海兴县','3','0','h','haixingxian');

INSERT INTO `twotree_region` VALUES ('1137','140','盐山县','3','0','y','yanshanxian');

INSERT INTO `twotree_region` VALUES ('1138','140','肃宁县','3','0','s','suningxian');

INSERT INTO `twotree_region` VALUES ('1139','140','南皮县','3','0','n','nanpixian');

INSERT INTO `twotree_region` VALUES ('1140','140','吴桥县','3','0','w','wuqiaoxian');

INSERT INTO `twotree_region` VALUES ('1141','140','献县','3','0','x','xianxian');

INSERT INTO `twotree_region` VALUES ('1142','140','孟村','3','0','m','mengcun');

INSERT INTO `twotree_region` VALUES ('1143','141','双桥区','3','0','s','shuangqiaoqu');

INSERT INTO `twotree_region` VALUES ('1144','141','双滦区','3','0','s','shuangluanqu');

INSERT INTO `twotree_region` VALUES ('1145','141','鹰手营子矿区','3','0','y','yingshouyingzikuangqu');

INSERT INTO `twotree_region` VALUES ('1146','141','承德县','3','0','c','chengdexian');

INSERT INTO `twotree_region` VALUES ('1147','141','兴隆县','3','0','x','xinglongxian');

INSERT INTO `twotree_region` VALUES ('1148','141','平泉县','3','0','p','pingquanxian');

INSERT INTO `twotree_region` VALUES ('1149','141','滦平县','3','0','l','luanpingxian');

INSERT INTO `twotree_region` VALUES ('1150','141','隆化县','3','0','l','longhuaxian');

INSERT INTO `twotree_region` VALUES ('1151','141','丰宁','3','0','f','fengning');

INSERT INTO `twotree_region` VALUES ('1152','141','宽城','3','0','k','kuancheng');

INSERT INTO `twotree_region` VALUES ('1153','141','围场','3','0','w','weichang');

INSERT INTO `twotree_region` VALUES ('1154','142','从台区','3','0','c','congtaiqu');

INSERT INTO `twotree_region` VALUES ('1155','142','复兴区','3','0','f','fuxingqu');

INSERT INTO `twotree_region` VALUES ('1156','142','邯山区','3','0','h','hanshanqu');

INSERT INTO `twotree_region` VALUES ('1157','142','峰峰矿区','3','0','f','fengfengkuangqu');

INSERT INTO `twotree_region` VALUES ('1158','142','武安市','3','0','w','wuanshi');

INSERT INTO `twotree_region` VALUES ('1159','142','邯郸县','3','0','h','handanxian');

INSERT INTO `twotree_region` VALUES ('1160','142','临漳县','3','0','l','linzhangxian');

INSERT INTO `twotree_region` VALUES ('1161','142','成安县','3','0','c','chenganxian');

INSERT INTO `twotree_region` VALUES ('1162','142','大名县','3','0','d','damingxian');

INSERT INTO `twotree_region` VALUES ('1163','142','涉县','3','0','s','shexian');

INSERT INTO `twotree_region` VALUES ('1164','142','磁县','3','0','c','cixian');

INSERT INTO `twotree_region` VALUES ('1165','142','肥乡县','3','0','f','feixiangxian');

INSERT INTO `twotree_region` VALUES ('1166','142','永年县','3','0','y','yongnianxian');

INSERT INTO `twotree_region` VALUES ('1167','142','邱县','3','0','q','qiuxian');

INSERT INTO `twotree_region` VALUES ('1168','142','鸡泽县','3','0','j','jizexian');

INSERT INTO `twotree_region` VALUES ('1169','142','广平县','3','0','g','guangpingxian');

INSERT INTO `twotree_region` VALUES ('1170','142','馆陶县','3','0','g','guantaoxian');

INSERT INTO `twotree_region` VALUES ('1171','142','魏县','3','0','w','weixian');

INSERT INTO `twotree_region` VALUES ('1172','142','曲周县','3','0','q','quzhouxian');

INSERT INTO `twotree_region` VALUES ('1173','143','桃城区','3','0','t','taochengqu');

INSERT INTO `twotree_region` VALUES ('1174','143','冀州市','3','0','j','jizhoushi');

INSERT INTO `twotree_region` VALUES ('1175','143','深州市','3','0','s','shenzhoushi');

INSERT INTO `twotree_region` VALUES ('1176','143','枣强县','3','0','z','zaoqiangxian');

INSERT INTO `twotree_region` VALUES ('1177','143','武邑县','3','0','w','wuyixian');

INSERT INTO `twotree_region` VALUES ('1178','143','武强县','3','0','w','wuqiangxian');

INSERT INTO `twotree_region` VALUES ('1179','143','饶阳县','3','0','r','raoyangxian');

INSERT INTO `twotree_region` VALUES ('1180','143','安平县','3','0','a','anpingxian');

INSERT INTO `twotree_region` VALUES ('1181','143','故城县','3','0','g','guchengxian');

INSERT INTO `twotree_region` VALUES ('1182','143','景县','3','0','j','jingxian');

INSERT INTO `twotree_region` VALUES ('1183','143','阜城县','3','0','f','fuchengxian');

INSERT INTO `twotree_region` VALUES ('1184','144','安次区','3','0','a','anciqu');

INSERT INTO `twotree_region` VALUES ('1185','144','广阳区','3','0','g','guangyangqu');

INSERT INTO `twotree_region` VALUES ('1186','144','霸州市','3','0','b','bazhoushi');

INSERT INTO `twotree_region` VALUES ('1187','144','三河市','3','0','s','sanheshi');

INSERT INTO `twotree_region` VALUES ('1188','144','固安县','3','0','g','guanxian');

INSERT INTO `twotree_region` VALUES ('1189','144','永清县','3','0','y','yongqingxian');

INSERT INTO `twotree_region` VALUES ('1190','144','香河县','3','0','x','xianghexian');

INSERT INTO `twotree_region` VALUES ('1191','144','大城县','3','0','d','dachengxian');

INSERT INTO `twotree_region` VALUES ('1192','144','文安县','3','0','w','wenanxian');

INSERT INTO `twotree_region` VALUES ('1193','144','大厂','3','0','d','dachang');

INSERT INTO `twotree_region` VALUES ('1194','145','海港区','3','0','h','haigangqu');

INSERT INTO `twotree_region` VALUES ('1195','145','山海关区','3','0','s','shanhaiguanqu');

INSERT INTO `twotree_region` VALUES ('1196','145','北戴河区','3','0','b','beidaihequ');

INSERT INTO `twotree_region` VALUES ('1197','145','昌黎县','3','0','c','changlixian');

INSERT INTO `twotree_region` VALUES ('1198','145','抚宁县','3','0','f','funingxian');

INSERT INTO `twotree_region` VALUES ('1199','145','卢龙县','3','0','l','lulongxian');

INSERT INTO `twotree_region` VALUES ('1200','145','青龙','3','0','q','qinglong');

INSERT INTO `twotree_region` VALUES ('1201','146','路北区','3','0','l','lubeiqu');

INSERT INTO `twotree_region` VALUES ('1202','146','路南区','3','0','l','lunanqu');

INSERT INTO `twotree_region` VALUES ('1203','146','古冶区','3','0','g','guyequ');

INSERT INTO `twotree_region` VALUES ('1204','146','开平区','3','0','k','kaipingqu');

INSERT INTO `twotree_region` VALUES ('1205','146','丰南区','3','0','f','fengnanqu');

INSERT INTO `twotree_region` VALUES ('1206','146','丰润区','3','0','f','fengrunqu');

INSERT INTO `twotree_region` VALUES ('1207','146','遵化市','3','0','z','zunhuashi');

INSERT INTO `twotree_region` VALUES ('1208','146','迁安市','3','0','q','qiananshi');

INSERT INTO `twotree_region` VALUES ('1209','146','滦县','3','0','l','luanxian');

INSERT INTO `twotree_region` VALUES ('1210','146','滦南县','3','0','l','luannanxian');

INSERT INTO `twotree_region` VALUES ('1211','146','乐亭县','3','0','l','letingxian');

INSERT INTO `twotree_region` VALUES ('1212','146','迁西县','3','0','q','qianxixian');

INSERT INTO `twotree_region` VALUES ('1213','146','玉田县','3','0','y','yutianxian');

INSERT INTO `twotree_region` VALUES ('1214','146','唐海县','3','0','t','tanghaixian');

INSERT INTO `twotree_region` VALUES ('1215','147','桥东区','3','0','q','qiaodongqu');

INSERT INTO `twotree_region` VALUES ('1216','147','桥西区','3','0','q','qiaoxiqu');

INSERT INTO `twotree_region` VALUES ('1217','147','南宫市','3','0','n','nangongshi');

INSERT INTO `twotree_region` VALUES ('1218','147','沙河市','3','0','s','shaheshi');

INSERT INTO `twotree_region` VALUES ('1219','147','邢台县','3','0','x','xingtaixian');

INSERT INTO `twotree_region` VALUES ('1220','147','临城县','3','0','l','linchengxian');

INSERT INTO `twotree_region` VALUES ('1221','147','内丘县','3','0','n','neiqiuxian');

INSERT INTO `twotree_region` VALUES ('1222','147','柏乡县','3','0','b','baixiangxian');

INSERT INTO `twotree_region` VALUES ('1223','147','隆尧县','3','0','l','longyaoxian');

INSERT INTO `twotree_region` VALUES ('1224','147','任县','3','0','r','renxian');

INSERT INTO `twotree_region` VALUES ('1225','147','南和县','3','0','n','nanhexian');

INSERT INTO `twotree_region` VALUES ('1226','147','宁晋县','3','0','n','ningjinxian');

INSERT INTO `twotree_region` VALUES ('1227','147','巨鹿县','3','0','j','juluxian');

INSERT INTO `twotree_region` VALUES ('1228','147','新河县','3','0','x','xinhexian');

INSERT INTO `twotree_region` VALUES ('1229','147','广宗县','3','0','g','guangzongxian');

INSERT INTO `twotree_region` VALUES ('1230','147','平乡县','3','0','p','pingxiangxian');

INSERT INTO `twotree_region` VALUES ('1231','147','威县','3','0','w','weixian');

INSERT INTO `twotree_region` VALUES ('1232','147','清河县','3','0','q','qinghexian');

INSERT INTO `twotree_region` VALUES ('1233','147','临西县','3','0','l','linxixian');

INSERT INTO `twotree_region` VALUES ('1234','148','桥西区','3','0','q','qiaoxiqu');

INSERT INTO `twotree_region` VALUES ('1235','148','桥东区','3','0','q','qiaodongqu');

INSERT INTO `twotree_region` VALUES ('1236','148','宣化区','3','0','x','xuanhuaqu');

INSERT INTO `twotree_region` VALUES ('1237','148','下花园区','3','0','x','xiahuayuanqu');

INSERT INTO `twotree_region` VALUES ('1238','148','宣化县','3','0','x','xuanhuaxian');

INSERT INTO `twotree_region` VALUES ('1239','148','张北县','3','0','z','zhangbeixian');

INSERT INTO `twotree_region` VALUES ('1240','148','康保县','3','0','k','kangbaoxian');

INSERT INTO `twotree_region` VALUES ('1241','148','沽源县','3','0','g','guyuanxian');

INSERT INTO `twotree_region` VALUES ('1242','148','尚义县','3','0','s','shangyixian');

INSERT INTO `twotree_region` VALUES ('1243','148','蔚县','3','0','w','weixian');

INSERT INTO `twotree_region` VALUES ('1244','148','阳原县','3','0','y','yangyuanxian');

INSERT INTO `twotree_region` VALUES ('1245','148','怀安县','3','0','h','huaianxian');

INSERT INTO `twotree_region` VALUES ('1246','148','万全县','3','0','w','wanquanxian');

INSERT INTO `twotree_region` VALUES ('1247','148','怀来县','3','0','h','huailaixian');

INSERT INTO `twotree_region` VALUES ('1248','148','涿鹿县','3','0','l','luxian');

INSERT INTO `twotree_region` VALUES ('1249','148','赤城县','3','0','c','chichengxian');

INSERT INTO `twotree_region` VALUES ('1250','148','崇礼县','3','0','c','chonglixian');

INSERT INTO `twotree_region` VALUES ('1251','149','金水区','3','0','j','jinshuiqu');

INSERT INTO `twotree_region` VALUES ('1252','149','邙山区','3','0','s','shanqu');

INSERT INTO `twotree_region` VALUES ('1253','149','二七区','3','0','e','erqiqu');

INSERT INTO `twotree_region` VALUES ('1254','149','管城区','3','0','g','guanchengqu');

INSERT INTO `twotree_region` VALUES ('1255','149','中原区','3','0','z','zhongyuanqu');

INSERT INTO `twotree_region` VALUES ('1256','149','上街区','3','0','s','shangjiequ');

INSERT INTO `twotree_region` VALUES ('1257','149','惠济区','3','0','h','huijiqu');

INSERT INTO `twotree_region` VALUES ('1258','149','郑东新区','3','0','z','zhengdongxinqu');

INSERT INTO `twotree_region` VALUES ('1259','149','经济技术开发区','3','0','j','jingjijishukaifaqu');

INSERT INTO `twotree_region` VALUES ('1260','149','高新开发区','3','0','g','gaoxinkaifaqu');

INSERT INTO `twotree_region` VALUES ('1261','149','出口加工区','3','0','c','chukoujiagongqu');

INSERT INTO `twotree_region` VALUES ('1262','149','巩义市','3','0','g','gongyishi');

INSERT INTO `twotree_region` VALUES ('1263','149','荥阳市','3','0','y','yangshi');

INSERT INTO `twotree_region` VALUES ('1264','149','新密市','3','0','x','xinmishi');

INSERT INTO `twotree_region` VALUES ('1265','149','新郑市','3','0','x','xinzhengshi');

INSERT INTO `twotree_region` VALUES ('1266','149','登封市','3','0','d','dengfengshi');

INSERT INTO `twotree_region` VALUES ('1267','149','中牟县','3','0','z','zhongmouxian');

INSERT INTO `twotree_region` VALUES ('1268','150','西工区','3','0','x','xigongqu');

INSERT INTO `twotree_region` VALUES ('1269','150','老城区','3','0','l','laochengqu');

INSERT INTO `twotree_region` VALUES ('1270','150','涧西区','3','0','j','jianxiqu');

INSERT INTO `twotree_region` VALUES ('1271','150','瀍河回族区','3','0','0','null');

INSERT INTO `twotree_region` VALUES ('1272','150','洛龙区','3','0','l','luolongqu');

INSERT INTO `twotree_region` VALUES ('1273','150','吉利区','3','0','j','jiliqu');

INSERT INTO `twotree_region` VALUES ('1274','150','偃师市','3','0','s','shishi');

INSERT INTO `twotree_region` VALUES ('1275','150','孟津县','3','0','m','mengjinxian');

INSERT INTO `twotree_region` VALUES ('1276','150','新安县','3','0','x','xinanxian');

INSERT INTO `twotree_region` VALUES ('1277','150','栾川县','3','0','c','chuanxian');

INSERT INTO `twotree_region` VALUES ('1278','150','嵩县','3','0','x','xian');

INSERT INTO `twotree_region` VALUES ('1279','150','汝阳县','3','0','r','ruyangxian');

INSERT INTO `twotree_region` VALUES ('1280','150','宜阳县','3','0','y','yiyangxian');

INSERT INTO `twotree_region` VALUES ('1281','150','洛宁县','3','0','l','luoningxian');

INSERT INTO `twotree_region` VALUES ('1282','150','伊川县','3','0','y','yichuanxian');

INSERT INTO `twotree_region` VALUES ('1283','151','鼓楼区','3','0','g','gulouqu');

INSERT INTO `twotree_region` VALUES ('1284','151','龙亭区','3','0','l','longtingqu');

INSERT INTO `twotree_region` VALUES ('1285','151','顺河回族区','3','0','s','shunhehuizuqu');

INSERT INTO `twotree_region` VALUES ('1286','151','金明区','3','0','j','jinmingqu');

INSERT INTO `twotree_region` VALUES ('1287','151','禹王台区','3','0','y','yuwangtaiqu');

INSERT INTO `twotree_region` VALUES ('1288','151','杞县','3','0','x','xian');

INSERT INTO `twotree_region` VALUES ('1289','151','通许县','3','0','t','tongxuxian');

INSERT INTO `twotree_region` VALUES ('1290','151','尉氏县','3','0','w','weishixian');

INSERT INTO `twotree_region` VALUES ('1291','151','开封县','3','0','k','kaifengxian');

INSERT INTO `twotree_region` VALUES ('1292','151','兰考县','3','0','l','lankaoxian');

INSERT INTO `twotree_region` VALUES ('1293','152','北关区','3','0','b','beiguanqu');

INSERT INTO `twotree_region` VALUES ('1294','152','文峰区','3','0','w','wenfengqu');

INSERT INTO `twotree_region` VALUES ('1295','152','殷都区','3','0','y','yinduqu');

INSERT INTO `twotree_region` VALUES ('1296','152','龙安区','3','0','l','longanqu');

INSERT INTO `twotree_region` VALUES ('1297','152','林州市','3','0','l','linzhoushi');

INSERT INTO `twotree_region` VALUES ('1298','152','安阳县','3','0','a','anyangxian');

INSERT INTO `twotree_region` VALUES ('1299','152','汤阴县','3','0','t','tangyinxian');

INSERT INTO `twotree_region` VALUES ('1300','152','滑县','3','0','h','huaxian');

INSERT INTO `twotree_region` VALUES ('1301','152','内黄县','3','0','n','neihuangxian');

INSERT INTO `twotree_region` VALUES ('1302','153','淇滨区','3','0','b','binqu');

INSERT INTO `twotree_region` VALUES ('1303','153','山城区','3','0','s','shanchengqu');

INSERT INTO `twotree_region` VALUES ('1304','153','鹤山区','3','0','h','heshanqu');

INSERT INTO `twotree_region` VALUES ('1305','153','浚县','3','0','j','junxian');

INSERT INTO `twotree_region` VALUES ('1306','153','淇县','3','0','x','xian');

INSERT INTO `twotree_region` VALUES ('1307','154','济源市','3','0','j','jiyuanshi');

INSERT INTO `twotree_region` VALUES ('1308','155','解放区','3','0','j','jiefangqu');

INSERT INTO `twotree_region` VALUES ('1309','155','中站区','3','0','z','zhongzhanqu');

INSERT INTO `twotree_region` VALUES ('1310','155','马村区','3','0','m','macunqu');

INSERT INTO `twotree_region` VALUES ('1311','155','山阳区','3','0','s','shanyangqu');

INSERT INTO `twotree_region` VALUES ('1312','155','沁阳市','3','0','q','qinyangshi');

INSERT INTO `twotree_region` VALUES ('1313','155','孟州市','3','0','m','mengzhoushi');

INSERT INTO `twotree_region` VALUES ('1314','155','修武县','3','0','x','xiuwuxian');

INSERT INTO `twotree_region` VALUES ('1315','155','博爱县','3','0','b','boaixian');

INSERT INTO `twotree_region` VALUES ('1316','155','武陟县','3','0','w','wuxian');

INSERT INTO `twotree_region` VALUES ('1317','155','温县','3','0','w','wenxian');

INSERT INTO `twotree_region` VALUES ('1318','156','卧龙区','3','0','w','wolongqu');

INSERT INTO `twotree_region` VALUES ('1319','156','宛城区','3','0','w','wanchengqu');

INSERT INTO `twotree_region` VALUES ('1320','156','邓州市','3','0','d','dengzhoushi');

INSERT INTO `twotree_region` VALUES ('1321','156','南召县','3','0','n','nanzhaoxian');

INSERT INTO `twotree_region` VALUES ('1322','156','方城县','3','0','f','fangchengxian');

INSERT INTO `twotree_region` VALUES ('1323','156','西峡县','3','0','x','xixiaxian');

INSERT INTO `twotree_region` VALUES ('1324','156','镇平县','3','0','z','zhenpingxian');

INSERT INTO `twotree_region` VALUES ('1325','156','内乡县','3','0','n','neixiangxian');

INSERT INTO `twotree_region` VALUES ('1326','156','淅川县','3','0','c','chuanxian');

INSERT INTO `twotree_region` VALUES ('1327','156','社旗县','3','0','s','sheqixian');

INSERT INTO `twotree_region` VALUES ('1328','156','唐河县','3','0','t','tanghexian');

INSERT INTO `twotree_region` VALUES ('1329','156','新野县','3','0','x','xinyexian');

INSERT INTO `twotree_region` VALUES ('1330','156','桐柏县','3','0','t','tongbaixian');

INSERT INTO `twotree_region` VALUES ('1331','157','新华区','3','0','x','xinhuaqu');

INSERT INTO `twotree_region` VALUES ('1332','157','卫东区','3','0','w','weidongqu');

INSERT INTO `twotree_region` VALUES ('1333','157','湛河区','3','0','z','zhanhequ');

INSERT INTO `twotree_region` VALUES ('1334','157','石龙区','3','0','s','shilongqu');

INSERT INTO `twotree_region` VALUES ('1335','157','舞钢市','3','0','w','wugangshi');

INSERT INTO `twotree_region` VALUES ('1336','157','汝州市','3','0','r','ruzhoushi');

INSERT INTO `twotree_region` VALUES ('1337','157','宝丰县','3','0','b','baofengxian');

INSERT INTO `twotree_region` VALUES ('1338','157','叶县','3','0','y','yexian');

INSERT INTO `twotree_region` VALUES ('1339','157','鲁山县','3','0','l','lushanxian');

INSERT INTO `twotree_region` VALUES ('1340','157','郏县','3','0','x','xian');

INSERT INTO `twotree_region` VALUES ('1341','158','湖滨区','3','0','h','hubinqu');

INSERT INTO `twotree_region` VALUES ('1342','158','义马市','3','0','y','yimashi');

INSERT INTO `twotree_region` VALUES ('1343','158','灵宝市','3','0','l','lingbaoshi');

INSERT INTO `twotree_region` VALUES ('1344','158','渑池县','3','0','c','chixian');

INSERT INTO `twotree_region` VALUES ('1345','158','陕县','3','0','s','shanxian');

INSERT INTO `twotree_region` VALUES ('1346','158','卢氏县','3','0','l','lushixian');

INSERT INTO `twotree_region` VALUES ('1347','159','梁园区','3','0','l','liangyuanqu');

INSERT INTO `twotree_region` VALUES ('1348','159','睢阳区','3','0','y','yangqu');

INSERT INTO `twotree_region` VALUES ('1349','159','永城市','3','0','y','yongchengshi');

INSERT INTO `twotree_region` VALUES ('1350','159','民权县','3','0','m','minquanxian');

INSERT INTO `twotree_region` VALUES ('1351','159','睢县','3','0','x','xian');

INSERT INTO `twotree_region` VALUES ('1352','159','宁陵县','3','0','n','ninglingxian');

INSERT INTO `twotree_region` VALUES ('1353','159','虞城县','3','0','y','yuchengxian');

INSERT INTO `twotree_region` VALUES ('1354','159','柘城县','3','0','c','chengxian');

INSERT INTO `twotree_region` VALUES ('1355','159','夏邑县','3','0','x','xiayixian');

INSERT INTO `twotree_region` VALUES ('1356','160','卫滨区','3','0','w','weibinqu');

INSERT INTO `twotree_region` VALUES ('1357','160','红旗区','3','0','h','hongqiqu');

INSERT INTO `twotree_region` VALUES ('1358','160','凤泉区','3','0','f','fengquanqu');

INSERT INTO `twotree_region` VALUES ('1359','160','牧野区','3','0','m','muyequ');

INSERT INTO `twotree_region` VALUES ('1360','160','卫辉市','3','0','w','weihuishi');

INSERT INTO `twotree_region` VALUES ('1361','160','辉县市','3','0','h','huixianshi');

INSERT INTO `twotree_region` VALUES ('1362','160','新乡县','3','0','x','xinxiangxian');

INSERT INTO `twotree_region` VALUES ('1363','160','获嘉县','3','0','h','huojiaxian');

INSERT INTO `twotree_region` VALUES ('1364','160','原阳县','3','0','y','yuanyangxian');

INSERT INTO `twotree_region` VALUES ('1365','160','延津县','3','0','y','yanjinxian');

INSERT INTO `twotree_region` VALUES ('1366','160','封丘县','3','0','f','fengqiuxian');

INSERT INTO `twotree_region` VALUES ('1367','160','长垣县','3','0','c','changyuanxian');

INSERT INTO `twotree_region` VALUES ('1368','161','浉河区','3','0','0','null');

INSERT INTO `twotree_region` VALUES ('1369','161','平桥区','3','0','p','pingqiaoqu');

INSERT INTO `twotree_region` VALUES ('1370','161','罗山县','3','0','l','luoshanxian');

INSERT INTO `twotree_region` VALUES ('1371','161','光山县','3','0','g','guangshanxian');

INSERT INTO `twotree_region` VALUES ('1372','161','新县','3','0','x','xinxian');

INSERT INTO `twotree_region` VALUES ('1373','161','商城县','3','0','s','shangchengxian');

INSERT INTO `twotree_region` VALUES ('1374','161','固始县','3','0','g','gushixian');

INSERT INTO `twotree_region` VALUES ('1375','161','潢川县','3','0','c','chuanxian');

INSERT INTO `twotree_region` VALUES ('1376','161','淮滨县','3','0','h','huaibinxian');

INSERT INTO `twotree_region` VALUES ('1377','161','息县','3','0','x','xixian');

INSERT INTO `twotree_region` VALUES ('1378','162','魏都区','3','0','w','weiduqu');

INSERT INTO `twotree_region` VALUES ('1379','162','禹州市','3','0','y','yuzhoushi');

INSERT INTO `twotree_region` VALUES ('1380','162','长葛市','3','0','c','changgeshi');

INSERT INTO `twotree_region` VALUES ('1381','162','许昌县','3','0','x','xuchangxian');

INSERT INTO `twotree_region` VALUES ('1382','162','鄢陵县','3','0','l','lingxian');

INSERT INTO `twotree_region` VALUES ('1383','162','襄城县','3','0','x','xiangchengxian');

INSERT INTO `twotree_region` VALUES ('1384','163','川汇区','3','0','c','chuanhuiqu');

INSERT INTO `twotree_region` VALUES ('1385','163','项城市','3','0','x','xiangchengshi');

INSERT INTO `twotree_region` VALUES ('1386','163','扶沟县','3','0','f','fugouxian');

INSERT INTO `twotree_region` VALUES ('1387','163','西华县','3','0','x','xihuaxian');

INSERT INTO `twotree_region` VALUES ('1388','163','商水县','3','0','s','shangshuixian');

INSERT INTO `twotree_region` VALUES ('1389','163','沈丘县','3','0','s','shenqiuxian');

INSERT INTO `twotree_region` VALUES ('1390','163','郸城县','3','0','d','danchengxian');

INSERT INTO `twotree_region` VALUES ('1391','163','淮阳县','3','0','h','huaiyangxian');

INSERT INTO `twotree_region` VALUES ('1392','163','太康县','3','0','t','taikangxian');

INSERT INTO `twotree_region` VALUES ('1393','163','鹿邑县','3','0','l','luyixian');

INSERT INTO `twotree_region` VALUES ('1394','164','驿城区','3','0','c','chengqu');

INSERT INTO `twotree_region` VALUES ('1395','164','西平县','3','0','x','xipingxian');

INSERT INTO `twotree_region` VALUES ('1396','164','上蔡县','3','0','s','shangcaixian');

INSERT INTO `twotree_region` VALUES ('1397','164','平舆县','3','0','p','pingyuxian');

INSERT INTO `twotree_region` VALUES ('1398','164','正阳县','3','0','z','zhengyangxian');

INSERT INTO `twotree_region` VALUES ('1399','164','确山县','3','0','q','queshanxian');

INSERT INTO `twotree_region` VALUES ('1400','164','泌阳县','3','0','m','miyangxian');

INSERT INTO `twotree_region` VALUES ('1401','164','汝南县','3','0','r','runanxian');

INSERT INTO `twotree_region` VALUES ('1402','164','遂平县','3','0','s','suipingxian');

INSERT INTO `twotree_region` VALUES ('1403','164','新蔡县','3','0','x','xincaixian');

INSERT INTO `twotree_region` VALUES ('1404','165','郾城区','3','0','c','chengqu');

INSERT INTO `twotree_region` VALUES ('1405','165','源汇区','3','0','y','yuanhuiqu');

INSERT INTO `twotree_region` VALUES ('1406','165','召陵区','3','0','z','zhaolingqu');

INSERT INTO `twotree_region` VALUES ('1407','165','舞阳县','3','0','w','wuyangxian');

INSERT INTO `twotree_region` VALUES ('1408','165','临颍县','3','0','l','linxian');

INSERT INTO `twotree_region` VALUES ('1409','166','华龙区','3','0','h','hualongqu');

INSERT INTO `twotree_region` VALUES ('1410','166','清丰县','3','0','q','qingfengxian');

INSERT INTO `twotree_region` VALUES ('1411','166','南乐县','3','0','n','nanlexian');

INSERT INTO `twotree_region` VALUES ('1412','166','范县','3','0','f','fanxian');

INSERT INTO `twotree_region` VALUES ('1413','166','台前县','3','0','t','taiqianxian');

INSERT INTO `twotree_region` VALUES ('1414','166','濮阳县','3','0','y','yangxian');

INSERT INTO `twotree_region` VALUES ('1415','167','道里区','3','0','d','daoliqu');

INSERT INTO `twotree_region` VALUES ('1416','167','南岗区','3','0','n','nangangqu');

INSERT INTO `twotree_region` VALUES ('1417','167','动力区','3','0','d','dongliqu');

INSERT INTO `twotree_region` VALUES ('1418','167','平房区','3','0','p','pingfangqu');

INSERT INTO `twotree_region` VALUES ('1419','167','香坊区','3','0','x','xiangfangqu');

INSERT INTO `twotree_region` VALUES ('1420','167','太平区','3','0','t','taipingqu');

INSERT INTO `twotree_region` VALUES ('1421','167','道外区','3','0','d','daowaiqu');

INSERT INTO `twotree_region` VALUES ('1422','167','阿城区','3','0','a','achengqu');

INSERT INTO `twotree_region` VALUES ('1423','167','呼兰区','3','0','h','hulanqu');

INSERT INTO `twotree_region` VALUES ('1424','167','松北区','3','0','s','songbeiqu');

INSERT INTO `twotree_region` VALUES ('1425','167','尚志市','3','0','s','shangzhishi');

INSERT INTO `twotree_region` VALUES ('1426','167','双城市','3','0','s','shuangchengshi');

INSERT INTO `twotree_region` VALUES ('1427','167','五常市','3','0','w','wuchangshi');

INSERT INTO `twotree_region` VALUES ('1428','167','方正县','3','0','f','fangzhengxian');

INSERT INTO `twotree_region` VALUES ('1429','167','宾县','3','0','b','binxian');

INSERT INTO `twotree_region` VALUES ('1430','167','依兰县','3','0','y','yilanxian');

INSERT INTO `twotree_region` VALUES ('1431','167','巴彦县','3','0','b','bayanxian');

INSERT INTO `twotree_region` VALUES ('1432','167','通河县','3','0','t','tonghexian');

INSERT INTO `twotree_region` VALUES ('1433','167','木兰县','3','0','m','mulanxian');

INSERT INTO `twotree_region` VALUES ('1434','167','延寿县','3','0','y','yanshouxian');

INSERT INTO `twotree_region` VALUES ('1435','168','萨尔图区','3','0','s','saertuqu');

INSERT INTO `twotree_region` VALUES ('1436','168','红岗区','3','0','h','honggangqu');

INSERT INTO `twotree_region` VALUES ('1437','168','龙凤区','3','0','l','longfengqu');

INSERT INTO `twotree_region` VALUES ('1438','168','让胡路区','3','0','r','ranghuluqu');

INSERT INTO `twotree_region` VALUES ('1439','168','大同区','3','0','d','datongqu');

INSERT INTO `twotree_region` VALUES ('1440','168','肇州县','3','0','z','zhaozhouxian');

INSERT INTO `twotree_region` VALUES ('1441','168','肇源县','3','0','z','zhaoyuanxian');

INSERT INTO `twotree_region` VALUES ('1442','168','林甸县','3','0','l','lindianxian');

INSERT INTO `twotree_region` VALUES ('1443','168','杜尔伯特','3','0','d','duerbote');

INSERT INTO `twotree_region` VALUES ('1444','169','呼玛县','3','0','h','humaxian');

INSERT INTO `twotree_region` VALUES ('1445','169','漠河县','3','0','m','mohexian');

INSERT INTO `twotree_region` VALUES ('1446','169','塔河县','3','0','t','tahexian');

INSERT INTO `twotree_region` VALUES ('1447','170','兴山区','3','0','x','xingshanqu');

INSERT INTO `twotree_region` VALUES ('1448','170','工农区','3','0','g','gongnongqu');

INSERT INTO `twotree_region` VALUES ('1449','170','南山区','3','0','n','nanshanqu');

INSERT INTO `twotree_region` VALUES ('1450','170','兴安区','3','0','x','xinganqu');

INSERT INTO `twotree_region` VALUES ('1451','170','向阳区','3','0','x','xiangyangqu');

INSERT INTO `twotree_region` VALUES ('1452','170','东山区','3','0','d','dongshanqu');

INSERT INTO `twotree_region` VALUES ('1453','170','萝北县','3','0','l','luobeixian');

INSERT INTO `twotree_region` VALUES ('1454','170','绥滨县','3','0','s','suibinxian');

INSERT INTO `twotree_region` VALUES ('1455','171','爱辉区','3','0','a','aihuiqu');

INSERT INTO `twotree_region` VALUES ('1456','171','五大连池市','3','0','w','wudalianchishi');

INSERT INTO `twotree_region` VALUES ('1457','171','北安市','3','0','b','beianshi');

INSERT INTO `twotree_region` VALUES ('1458','171','嫩江县','3','0','n','nenjiangxian');

INSERT INTO `twotree_region` VALUES ('1459','171','逊克县','3','0','x','xunkexian');

INSERT INTO `twotree_region` VALUES ('1460','171','孙吴县','3','0','s','sunwuxian');

INSERT INTO `twotree_region` VALUES ('1461','172','鸡冠区','3','0','j','jiguanqu');

INSERT INTO `twotree_region` VALUES ('1462','172','恒山区','3','0','h','hengshanqu');

INSERT INTO `twotree_region` VALUES ('1463','172','城子河区','3','0','c','chengzihequ');

INSERT INTO `twotree_region` VALUES ('1464','172','滴道区','3','0','d','didaoqu');

INSERT INTO `twotree_region` VALUES ('1465','172','梨树区','3','0','l','lishuqu');

INSERT INTO `twotree_region` VALUES ('1466','172','虎林市','3','0','h','hulinshi');

INSERT INTO `twotree_region` VALUES ('1467','172','密山市','3','0','m','mishanshi');

INSERT INTO `twotree_region` VALUES ('1468','172','鸡东县','3','0','j','jidongxian');

INSERT INTO `twotree_region` VALUES ('1469','173','前进区','3','0','q','qianjinqu');

INSERT INTO `twotree_region` VALUES ('1470','173','郊区','3','0','j','jiaoqu');

INSERT INTO `twotree_region` VALUES ('1471','173','向阳区','3','0','x','xiangyangqu');

INSERT INTO `twotree_region` VALUES ('1472','173','东风区','3','0','d','dongfengqu');

INSERT INTO `twotree_region` VALUES ('1473','173','同江市','3','0','t','tongjiangshi');

INSERT INTO `twotree_region` VALUES ('1474','173','富锦市','3','0','f','fujinshi');

INSERT INTO `twotree_region` VALUES ('1475','173','桦南县','3','0','n','nanxian');

INSERT INTO `twotree_region` VALUES ('1476','173','桦川县','3','0','c','chuanxian');

INSERT INTO `twotree_region` VALUES ('1477','173','汤原县','3','0','t','tangyuanxian');

INSERT INTO `twotree_region` VALUES ('1478','173','抚远县','3','0','f','fuyuanxian');

INSERT INTO `twotree_region` VALUES ('1479','174','爱民区','3','0','a','aiminqu');

INSERT INTO `twotree_region` VALUES ('1480','174','东安区','3','0','d','donganqu');

INSERT INTO `twotree_region` VALUES ('1481','174','阳明区','3','0','y','yangmingqu');

INSERT INTO `twotree_region` VALUES ('1482','174','西安区','3','0','x','xianqu');

INSERT INTO `twotree_region` VALUES ('1483','174','绥芬河市','3','0','s','suifenheshi');

INSERT INTO `twotree_region` VALUES ('1484','174','海林市','3','0','h','hailinshi');

INSERT INTO `twotree_region` VALUES ('1485','174','宁安市','3','0','n','ninganshi');

INSERT INTO `twotree_region` VALUES ('1486','174','穆棱市','3','0','m','mulengshi');

INSERT INTO `twotree_region` VALUES ('1487','174','东宁县','3','0','d','dongningxian');

INSERT INTO `twotree_region` VALUES ('1488','174','林口县','3','0','l','linkouxian');

INSERT INTO `twotree_region` VALUES ('1489','175','桃山区','3','0','t','taoshanqu');

INSERT INTO `twotree_region` VALUES ('1490','175','新兴区','3','0','x','xinxingqu');

INSERT INTO `twotree_region` VALUES ('1491','175','茄子河区','3','0','q','qiezihequ');

INSERT INTO `twotree_region` VALUES ('1492','175','勃利县','3','0','b','bolixian');

INSERT INTO `twotree_region` VALUES ('1493','176','龙沙区','3','0','l','longshaqu');

INSERT INTO `twotree_region` VALUES ('1494','176','昂昂溪区','3','0','a','angangxiqu');

INSERT INTO `twotree_region` VALUES ('1495','176','铁峰区','3','0','t','tiefengqu');

INSERT INTO `twotree_region` VALUES ('1496','176','建华区','3','0','j','jianhuaqu');

INSERT INTO `twotree_region` VALUES ('1497','176','富拉尔基区','3','0','f','fulaerjiqu');

INSERT INTO `twotree_region` VALUES ('1498','176','碾子山区','3','0','n','nianzishanqu');

INSERT INTO `twotree_region` VALUES ('1499','176','梅里斯达斡尔区','3','0','m','meilisidawoerqu');

INSERT INTO `twotree_region` VALUES ('1500','176','讷河市','3','0','h','heshi');

INSERT INTO `twotree_region` VALUES ('1501','176','龙江县','3','0','l','longjiangxian');

INSERT INTO `twotree_region` VALUES ('1502','176','依安县','3','0','y','yianxian');

INSERT INTO `twotree_region` VALUES ('1503','176','泰来县','3','0','t','tailaixian');

INSERT INTO `twotree_region` VALUES ('1504','176','甘南县','3','0','g','gannanxian');

INSERT INTO `twotree_region` VALUES ('1505','176','富裕县','3','0','f','fuyuxian');

INSERT INTO `twotree_region` VALUES ('1506','176','克山县','3','0','k','keshanxian');

INSERT INTO `twotree_region` VALUES ('1507','176','克东县','3','0','k','kedongxian');

INSERT INTO `twotree_region` VALUES ('1508','176','拜泉县','3','0','b','baiquanxian');

INSERT INTO `twotree_region` VALUES ('1509','177','尖山区','3','0','j','jianshanqu');

INSERT INTO `twotree_region` VALUES ('1510','177','岭东区','3','0','l','lingdongqu');

INSERT INTO `twotree_region` VALUES ('1511','177','四方台区','3','0','s','sifangtaiqu');

INSERT INTO `twotree_region` VALUES ('1512','177','宝山区','3','0','b','baoshanqu');

INSERT INTO `twotree_region` VALUES ('1513','177','集贤县','3','0','j','jixianxian');

INSERT INTO `twotree_region` VALUES ('1514','177','友谊县','3','0','y','youyixian');

INSERT INTO `twotree_region` VALUES ('1515','177','宝清县','3','0','b','baoqingxian');

INSERT INTO `twotree_region` VALUES ('1516','177','饶河县','3','0','r','raohexian');

INSERT INTO `twotree_region` VALUES ('1517','178','北林区','3','0','b','beilinqu');

INSERT INTO `twotree_region` VALUES ('1518','178','安达市','3','0','a','andashi');

INSERT INTO `twotree_region` VALUES ('1519','178','肇东市','3','0','z','zhaodongshi');

INSERT INTO `twotree_region` VALUES ('1520','178','海伦市','3','0','h','hailunshi');

INSERT INTO `twotree_region` VALUES ('1521','178','望奎县','3','0','w','wangkuixian');

INSERT INTO `twotree_region` VALUES ('1522','178','兰西县','3','0','l','lanxixian');

INSERT INTO `twotree_region` VALUES ('1523','178','青冈县','3','0','q','qinggangxian');

INSERT INTO `twotree_region` VALUES ('1524','178','庆安县','3','0','q','qinganxian');

INSERT INTO `twotree_region` VALUES ('1525','178','明水县','3','0','m','mingshuixian');

INSERT INTO `twotree_region` VALUES ('1526','178','绥棱县','3','0','s','suilengxian');

INSERT INTO `twotree_region` VALUES ('1527','179','伊春区','3','0','y','yichunqu');

INSERT INTO `twotree_region` VALUES ('1528','179','带岭区','3','0','d','dailingqu');

INSERT INTO `twotree_region` VALUES ('1529','179','南岔区','3','0','n','nanchaqu');

INSERT INTO `twotree_region` VALUES ('1530','179','金山屯区','3','0','j','jinshantunqu');

INSERT INTO `twotree_region` VALUES ('1531','179','西林区','3','0','x','xilinqu');

INSERT INTO `twotree_region` VALUES ('1532','179','美溪区','3','0','m','meixiqu');

INSERT INTO `twotree_region` VALUES ('1533','179','乌马河区','3','0','w','wumahequ');

INSERT INTO `twotree_region` VALUES ('1534','179','翠峦区','3','0','c','cuiluanqu');

INSERT INTO `twotree_region` VALUES ('1535','179','友好区','3','0','y','youhaoqu');

INSERT INTO `twotree_region` VALUES ('1536','179','上甘岭区','3','0','s','shangganlingqu');

INSERT INTO `twotree_region` VALUES ('1537','179','五营区','3','0','w','wuyingqu');

INSERT INTO `twotree_region` VALUES ('1538','179','红星区','3','0','h','hongxingqu');

INSERT INTO `twotree_region` VALUES ('1539','179','新青区','3','0','x','xinqingqu');

INSERT INTO `twotree_region` VALUES ('1540','179','汤旺河区','3','0','t','tangwanghequ');

INSERT INTO `twotree_region` VALUES ('1541','179','乌伊岭区','3','0','w','wuyilingqu');

INSERT INTO `twotree_region` VALUES ('1542','179','铁力市','3','0','t','tielishi');

INSERT INTO `twotree_region` VALUES ('1543','179','嘉荫县','3','0','j','jiayinxian');

INSERT INTO `twotree_region` VALUES ('1544','180','江岸区','3','0','j','jianganqu');

INSERT INTO `twotree_region` VALUES ('1545','180','武昌区','3','0','w','wuchangqu');

INSERT INTO `twotree_region` VALUES ('1546','180','江汉区','3','0','j','jianghanqu');

INSERT INTO `twotree_region` VALUES ('1547','180','硚口区','3','0','0','null');

INSERT INTO `twotree_region` VALUES ('1548','180','汉阳区','3','0','h','hanyangqu');

INSERT INTO `twotree_region` VALUES ('1549','180','青山区','3','0','q','qingshanqu');

INSERT INTO `twotree_region` VALUES ('1550','180','洪山区','3','0','h','hongshanqu');

INSERT INTO `twotree_region` VALUES ('1551','180','东西湖区','3','0','d','dongxihuqu');

INSERT INTO `twotree_region` VALUES ('1552','180','汉南区','3','0','h','hannanqu');

INSERT INTO `twotree_region` VALUES ('1553','180','蔡甸区','3','0','c','caidianqu');

INSERT INTO `twotree_region` VALUES ('1554','180','江夏区','3','0','j','jiangxiaqu');

INSERT INTO `twotree_region` VALUES ('1555','180','黄陂区','3','0','h','huangqu');

INSERT INTO `twotree_region` VALUES ('1556','180','新洲区','3','0','x','xinzhouqu');

INSERT INTO `twotree_region` VALUES ('1557','180','经济开发区','3','0','j','jingjikaifaqu');

INSERT INTO `twotree_region` VALUES ('1558','181','仙桃市','3','0','x','xiantaoshi');

INSERT INTO `twotree_region` VALUES ('1559','182','鄂城区','3','0','e','echengqu');

INSERT INTO `twotree_region` VALUES ('1560','182','华容区','3','0','h','huarongqu');

INSERT INTO `twotree_region` VALUES ('1561','182','梁子湖区','3','0','l','liangzihuqu');

INSERT INTO `twotree_region` VALUES ('1562','183','黄州区','3','0','h','huangzhouqu');

INSERT INTO `twotree_region` VALUES ('1563','183','麻城市','3','0','m','machengshi');

INSERT INTO `twotree_region` VALUES ('1564','183','武穴市','3','0','w','wuxueshi');

INSERT INTO `twotree_region` VALUES ('1565','183','团风县','3','0','t','tuanfengxian');

INSERT INTO `twotree_region` VALUES ('1566','183','红安县','3','0','h','honganxian');

INSERT INTO `twotree_region` VALUES ('1567','183','罗田县','3','0','l','luotianxian');

INSERT INTO `twotree_region` VALUES ('1568','183','英山县','3','0','y','yingshanxian');

INSERT INTO `twotree_region` VALUES ('1569','183','浠水县','3','0','s','shuixian');

INSERT INTO `twotree_region` VALUES ('1570','183','蕲春县','3','0','c','chunxian');

INSERT INTO `twotree_region` VALUES ('1571','183','黄梅县','3','0','h','huangmeixian');

INSERT INTO `twotree_region` VALUES ('1572','184','黄石港区','3','0','h','huangshigangqu');

INSERT INTO `twotree_region` VALUES ('1573','184','西塞山区','3','0','x','xisaishanqu');

INSERT INTO `twotree_region` VALUES ('1574','184','下陆区','3','0','x','xialuqu');

INSERT INTO `twotree_region` VALUES ('1575','184','铁山区','3','0','t','tieshanqu');

INSERT INTO `twotree_region` VALUES ('1576','184','大冶市','3','0','d','dayeshi');

INSERT INTO `twotree_region` VALUES ('1577','184','阳新县','3','0','y','yangxinxian');

INSERT INTO `twotree_region` VALUES ('1578','185','东宝区','3','0','d','dongbaoqu');

INSERT INTO `twotree_region` VALUES ('1579','185','掇刀区','3','0','d','duodaoqu');

INSERT INTO `twotree_region` VALUES ('1580','185','钟祥市','3','0','z','zhongxiangshi');

INSERT INTO `twotree_region` VALUES ('1581','185','京山县','3','0','j','jingshanxian');

INSERT INTO `twotree_region` VALUES ('1582','185','沙洋县','3','0','s','shayangxian');

INSERT INTO `twotree_region` VALUES ('1583','186','沙市区','3','0','s','shashiqu');

INSERT INTO `twotree_region` VALUES ('1584','186','荆州区','3','0','j','jingzhouqu');

INSERT INTO `twotree_region` VALUES ('1585','186','石首市','3','0','s','shishoushi');

INSERT INTO `twotree_region` VALUES ('1586','186','洪湖市','3','0','h','honghushi');

INSERT INTO `twotree_region` VALUES ('1587','186','松滋市','3','0','s','songzishi');

INSERT INTO `twotree_region` VALUES ('1588','186','公安县','3','0','g','gonganxian');

INSERT INTO `twotree_region` VALUES ('1589','186','监利县','3','0','j','jianlixian');

INSERT INTO `twotree_region` VALUES ('1590','186','江陵县','3','0','j','jianglingxian');

INSERT INTO `twotree_region` VALUES ('1591','187','潜江市','3','0','q','qianjiangshi');

INSERT INTO `twotree_region` VALUES ('1592','188','神农架林区','3','0','s','shennongjialinqu');

INSERT INTO `twotree_region` VALUES ('1593','189','张湾区','3','0','z','zhangwanqu');

INSERT INTO `twotree_region` VALUES ('1594','189','茅箭区','3','0','m','maojianqu');

INSERT INTO `twotree_region` VALUES ('1595','189','丹江口市','3','0','d','danjiangkoushi');

INSERT INTO `twotree_region` VALUES ('1596','189','郧县','3','0','y','yunxian');

INSERT INTO `twotree_region` VALUES ('1597','189','郧西县','3','0','y','yunxixian');

INSERT INTO `twotree_region` VALUES ('1598','189','竹山县','3','0','z','zhushanxian');

INSERT INTO `twotree_region` VALUES ('1599','189','竹溪县','3','0','z','zhuxixian');

INSERT INTO `twotree_region` VALUES ('1600','189','房县','3','0','f','fangxian');

INSERT INTO `twotree_region` VALUES ('1601','190','曾都区','3','0','z','zengduqu');

INSERT INTO `twotree_region` VALUES ('1602','190','广水市','3','0','g','guangshuishi');

INSERT INTO `twotree_region` VALUES ('1603','191','天门市','3','0','t','tianmenshi');

INSERT INTO `twotree_region` VALUES ('1604','192','咸安区','3','0','x','xiananqu');

INSERT INTO `twotree_region` VALUES ('1605','192','赤壁市','3','0','c','chibishi');

INSERT INTO `twotree_region` VALUES ('1606','192','嘉鱼县','3','0','j','jiayuxian');

INSERT INTO `twotree_region` VALUES ('1607','192','通城县','3','0','t','tongchengxian');

INSERT INTO `twotree_region` VALUES ('1608','192','崇阳县','3','0','c','chongyangxian');

INSERT INTO `twotree_region` VALUES ('1609','192','通山县','3','0','t','tongshanxian');

INSERT INTO `twotree_region` VALUES ('1610','193','襄城区','3','0','x','xiangchengqu');

INSERT INTO `twotree_region` VALUES ('1611','193','樊城区','3','0','f','fanchengqu');

INSERT INTO `twotree_region` VALUES ('1612','193','襄阳区','3','0','x','xiangyangqu');

INSERT INTO `twotree_region` VALUES ('1613','193','老河口市','3','0','l','laohekoushi');

INSERT INTO `twotree_region` VALUES ('1614','193','枣阳市','3','0','z','zaoyangshi');

INSERT INTO `twotree_region` VALUES ('1615','193','宜城市','3','0','y','yichengshi');

INSERT INTO `twotree_region` VALUES ('1616','193','南漳县','3','0','n','nanzhangxian');

INSERT INTO `twotree_region` VALUES ('1617','193','谷城县','3','0','g','guchengxian');

INSERT INTO `twotree_region` VALUES ('1618','193','保康县','3','0','b','baokangxian');

INSERT INTO `twotree_region` VALUES ('1619','194','孝南区','3','0','x','xiaonanqu');

INSERT INTO `twotree_region` VALUES ('1620','194','应城市','3','0','y','yingchengshi');

INSERT INTO `twotree_region` VALUES ('1621','194','安陆市','3','0','a','anlushi');

INSERT INTO `twotree_region` VALUES ('1622','194','汉川市','3','0','h','hanchuanshi');

INSERT INTO `twotree_region` VALUES ('1623','194','孝昌县','3','0','x','xiaochangxian');

INSERT INTO `twotree_region` VALUES ('1624','194','大悟县','3','0','d','dawuxian');

INSERT INTO `twotree_region` VALUES ('1625','194','云梦县','3','0','y','yunmengxian');

INSERT INTO `twotree_region` VALUES ('1626','195','长阳','3','0','c','changyang');

INSERT INTO `twotree_region` VALUES ('1627','195','五峰','3','0','w','wufeng');

INSERT INTO `twotree_region` VALUES ('1628','195','西陵区','3','0','x','xilingqu');

INSERT INTO `twotree_region` VALUES ('1629','195','伍家岗区','3','0','w','wujiagangqu');

INSERT INTO `twotree_region` VALUES ('1630','195','点军区','3','0','d','dianjunqu');

INSERT INTO `twotree_region` VALUES ('1631','195','猇亭区','3','0','0','null');

INSERT INTO `twotree_region` VALUES ('1632','195','夷陵区','3','0','y','yilingqu');

INSERT INTO `twotree_region` VALUES ('1633','195','宜都市','3','0','y','yidushi');

INSERT INTO `twotree_region` VALUES ('1634','195','当阳市','3','0','d','dangyangshi');

INSERT INTO `twotree_region` VALUES ('1635','195','枝江市','3','0','z','zhijiangshi');

INSERT INTO `twotree_region` VALUES ('1636','195','远安县','3','0','y','yuananxian');

INSERT INTO `twotree_region` VALUES ('1637','195','兴山县','3','0','x','xingshanxian');

INSERT INTO `twotree_region` VALUES ('1638','195','秭归县','3','0','g','guixian');

INSERT INTO `twotree_region` VALUES ('1639','196','恩施市','3','0','e','enshishi');

INSERT INTO `twotree_region` VALUES ('1640','196','利川市','3','0','l','lichuanshi');

INSERT INTO `twotree_region` VALUES ('1641','196','建始县','3','0','j','jianshixian');

INSERT INTO `twotree_region` VALUES ('1642','196','巴东县','3','0','b','badongxian');

INSERT INTO `twotree_region` VALUES ('1643','196','宣恩县','3','0','x','xuanenxian');

INSERT INTO `twotree_region` VALUES ('1644','196','咸丰县','3','0','x','xianfengxian');

INSERT INTO `twotree_region` VALUES ('1645','196','来凤县','3','0','l','laifengxian');

INSERT INTO `twotree_region` VALUES ('1646','196','鹤峰县','3','0','h','hefengxian');

INSERT INTO `twotree_region` VALUES ('1647','197','岳麓区','3','0','y','yueluqu');

INSERT INTO `twotree_region` VALUES ('1648','197','芙蓉区','3','0','r','rongqu');

INSERT INTO `twotree_region` VALUES ('1649','197','天心区','3','0','t','tianxinqu');

INSERT INTO `twotree_region` VALUES ('1650','197','开福区','3','0','k','kaifuqu');

INSERT INTO `twotree_region` VALUES ('1651','197','雨花区','3','0','y','yuhuaqu');

INSERT INTO `twotree_region` VALUES ('1652','197','开发区','3','0','k','kaifaqu');

INSERT INTO `twotree_region` VALUES ('1653','197','浏阳市','3','0','y','yangshi');

INSERT INTO `twotree_region` VALUES ('1654','197','长沙县','3','0','c','changshaxian');

INSERT INTO `twotree_region` VALUES ('1655','197','望城县','3','0','w','wangchengxian');

INSERT INTO `twotree_region` VALUES ('1656','197','宁乡县','3','0','n','ningxiangxian');

INSERT INTO `twotree_region` VALUES ('1657','198','永定区','3','0','y','yongdingqu');

INSERT INTO `twotree_region` VALUES ('1658','198','武陵源区','3','0','w','wulingyuanqu');

INSERT INTO `twotree_region` VALUES ('1659','198','慈利县','3','0','c','cilixian');

INSERT INTO `twotree_region` VALUES ('1660','198','桑植县','3','0','s','sangzhixian');

INSERT INTO `twotree_region` VALUES ('1661','199','武陵区','3','0','w','wulingqu');

INSERT INTO `twotree_region` VALUES ('1662','199','鼎城区','3','0','d','dingchengqu');

INSERT INTO `twotree_region` VALUES ('1663','199','津市市','3','0','j','jinshishi');

INSERT INTO `twotree_region` VALUES ('1664','199','安乡县','3','0','a','anxiangxian');

INSERT INTO `twotree_region` VALUES ('1665','199','汉寿县','3','0','h','hanshouxian');

INSERT INTO `twotree_region` VALUES ('1666','199','澧县','3','0','x','xian');

INSERT INTO `twotree_region` VALUES ('1667','199','临澧县','3','0','l','linxian');

INSERT INTO `twotree_region` VALUES ('1668','199','桃源县','3','0','t','taoyuanxian');

INSERT INTO `twotree_region` VALUES ('1669','199','石门县','3','0','s','shimenxian');

INSERT INTO `twotree_region` VALUES ('1670','200','北湖区','3','0','b','beihuqu');

INSERT INTO `twotree_region` VALUES ('1671','200','苏仙区','3','0','s','suxianqu');

INSERT INTO `twotree_region` VALUES ('1672','200','资兴市','3','0','z','zixingshi');

INSERT INTO `twotree_region` VALUES ('1673','200','桂阳县','3','0','g','guiyangxian');

INSERT INTO `twotree_region` VALUES ('1674','200','宜章县','3','0','y','yizhangxian');

INSERT INTO `twotree_region` VALUES ('1675','200','永兴县','3','0','y','yongxingxian');

INSERT INTO `twotree_region` VALUES ('1676','200','嘉禾县','3','0','j','jiahexian');

INSERT INTO `twotree_region` VALUES ('1677','200','临武县','3','0','l','linwuxian');

INSERT INTO `twotree_region` VALUES ('1678','200','汝城县','3','0','r','ruchengxian');

INSERT INTO `twotree_region` VALUES ('1679','200','桂东县','3','0','g','guidongxian');

INSERT INTO `twotree_region` VALUES ('1680','200','安仁县','3','0','a','anrenxian');

INSERT INTO `twotree_region` VALUES ('1681','201','雁峰区','3','0','y','yanfengqu');

INSERT INTO `twotree_region` VALUES ('1682','201','珠晖区','3','0','z','zhuqu');

INSERT INTO `twotree_region` VALUES ('1683','201','石鼓区','3','0','s','shiguqu');

INSERT INTO `twotree_region` VALUES ('1684','201','蒸湘区','3','0','z','zhengxiangqu');

INSERT INTO `twotree_region` VALUES ('1685','201','南岳区','3','0','n','nanyuequ');

INSERT INTO `twotree_region` VALUES ('1686','201','耒阳市','3','0','y','yangshi');

INSERT INTO `twotree_region` VALUES ('1687','201','常宁市','3','0','c','changningshi');

INSERT INTO `twotree_region` VALUES ('1688','201','衡阳县','3','0','h','hengyangxian');

INSERT INTO `twotree_region` VALUES ('1689','201','衡南县','3','0','h','hengnanxian');

INSERT INTO `twotree_region` VALUES ('1690','201','衡山县','3','0','h','hengshanxian');

INSERT INTO `twotree_region` VALUES ('1691','201','衡东县','3','0','h','hengdongxian');

INSERT INTO `twotree_region` VALUES ('1692','201','祁东县','3','0','q','qidongxian');

INSERT INTO `twotree_region` VALUES ('1693','202','鹤城区','3','0','h','hechengqu');

INSERT INTO `twotree_region` VALUES ('1694','202','靖州','3','0','j','jingzhou');

INSERT INTO `twotree_region` VALUES ('1695','202','麻阳','3','0','m','mayang');

INSERT INTO `twotree_region` VALUES ('1696','202','通道','3','0','t','tongdao');

INSERT INTO `twotree_region` VALUES ('1697','202','新晃','3','0','x','xinhuang');

INSERT INTO `twotree_region` VALUES ('1698','202','芷江','3','0','j','jiang');

INSERT INTO `twotree_region` VALUES ('1699','202','沅陵县','3','0','l','lingxian');

INSERT INTO `twotree_region` VALUES ('1700','202','辰溪县','3','0','c','chenxixian');

INSERT INTO `twotree_region` VALUES ('1701','202','溆浦县','3','0','p','puxian');

INSERT INTO `twotree_region` VALUES ('1702','202','中方县','3','0','z','zhongfangxian');

INSERT INTO `twotree_region` VALUES ('1703','202','会同县','3','0','h','huitongxian');

INSERT INTO `twotree_region` VALUES ('1704','202','洪江市','3','0','h','hongjiangshi');

INSERT INTO `twotree_region` VALUES ('1705','203','娄星区','3','0','l','louxingqu');

INSERT INTO `twotree_region` VALUES ('1706','203','冷水江市','3','0','l','lengshuijiangshi');

INSERT INTO `twotree_region` VALUES ('1707','203','涟源市','3','0','l','lianyuanshi');

INSERT INTO `twotree_region` VALUES ('1708','203','双峰县','3','0','s','shuangfengxian');

INSERT INTO `twotree_region` VALUES ('1709','203','新化县','3','0','x','xinhuaxian');

INSERT INTO `twotree_region` VALUES ('1710','204','城步','3','0','c','chengbu');

INSERT INTO `twotree_region` VALUES ('1711','204','双清区','3','0','s','shuangqingqu');

INSERT INTO `twotree_region` VALUES ('1712','204','大祥区','3','0','d','daxiangqu');

INSERT INTO `twotree_region` VALUES ('1713','204','北塔区','3','0','b','beitaqu');

INSERT INTO `twotree_region` VALUES ('1714','204','武冈市','3','0','w','wugangshi');

INSERT INTO `twotree_region` VALUES ('1715','204','邵东县','3','0','s','shaodongxian');

INSERT INTO `twotree_region` VALUES ('1716','204','新邵县','3','0','x','xinshaoxian');

INSERT INTO `twotree_region` VALUES ('1717','204','邵阳县','3','0','s','shaoyangxian');

INSERT INTO `twotree_region` VALUES ('1718','204','隆回县','3','0','l','longhuixian');

INSERT INTO `twotree_region` VALUES ('1719','204','洞口县','3','0','d','dongkouxian');

INSERT INTO `twotree_region` VALUES ('1720','204','绥宁县','3','0','s','suiningxian');

INSERT INTO `twotree_region` VALUES ('1721','204','新宁县','3','0','x','xinningxian');

INSERT INTO `twotree_region` VALUES ('1722','205','岳塘区','3','0','y','yuetangqu');

INSERT INTO `twotree_region` VALUES ('1723','205','雨湖区','3','0','y','yuhuqu');

INSERT INTO `twotree_region` VALUES ('1724','205','湘乡市','3','0','x','xiangxiangshi');

INSERT INTO `twotree_region` VALUES ('1725','205','韶山市','3','0','s','shaoshanshi');

INSERT INTO `twotree_region` VALUES ('1726','205','湘潭县','3','0','x','xiangtanxian');

INSERT INTO `twotree_region` VALUES ('1727','206','吉首市','3','0','j','jishoushi');

INSERT INTO `twotree_region` VALUES ('1728','206','泸溪县','3','0','x','xixian');

INSERT INTO `twotree_region` VALUES ('1729','206','凤凰县','3','0','f','fenghuangxian');

INSERT INTO `twotree_region` VALUES ('1730','206','花垣县','3','0','h','huayuanxian');

INSERT INTO `twotree_region` VALUES ('1731','206','保靖县','3','0','b','baojingxian');

INSERT INTO `twotree_region` VALUES ('1732','206','古丈县','3','0','g','guzhangxian');

INSERT INTO `twotree_region` VALUES ('1733','206','永顺县','3','0','y','yongshunxian');

INSERT INTO `twotree_region` VALUES ('1734','206','龙山县','3','0','l','longshanxian');

INSERT INTO `twotree_region` VALUES ('1735','207','赫山区','3','0','h','heshanqu');

INSERT INTO `twotree_region` VALUES ('1736','207','资阳区','3','0','z','ziyangqu');

INSERT INTO `twotree_region` VALUES ('1737','207','沅江市','3','0','j','jiangshi');

INSERT INTO `twotree_region` VALUES ('1738','207','南县','3','0','n','nanxian');

INSERT INTO `twotree_region` VALUES ('1739','207','桃江县','3','0','t','taojiangxian');

INSERT INTO `twotree_region` VALUES ('1740','207','安化县','3','0','a','anhuaxian');

INSERT INTO `twotree_region` VALUES ('1741','208','江华','3','0','j','jianghua');

INSERT INTO `twotree_region` VALUES ('1742','208','冷水滩区','3','0','l','lengshuitanqu');

INSERT INTO `twotree_region` VALUES ('1743','208','零陵区','3','0','l','linglingqu');

INSERT INTO `twotree_region` VALUES ('1744','208','祁阳县','3','0','q','qiyangxian');

INSERT INTO `twotree_region` VALUES ('1745','208','东安县','3','0','d','donganxian');

INSERT INTO `twotree_region` VALUES ('1746','208','双牌县','3','0','s','shuangpaixian');

INSERT INTO `twotree_region` VALUES ('1747','208','道县','3','0','d','daoxian');

INSERT INTO `twotree_region` VALUES ('1748','208','江永县','3','0','j','jiangyongxian');

INSERT INTO `twotree_region` VALUES ('1749','208','宁远县','3','0','n','ningyuanxian');

INSERT INTO `twotree_region` VALUES ('1750','208','蓝山县','3','0','l','lanshanxian');

INSERT INTO `twotree_region` VALUES ('1751','208','新田县','3','0','x','xintianxian');

INSERT INTO `twotree_region` VALUES ('1752','209','岳阳楼区','3','0','y','yueyanglouqu');

INSERT INTO `twotree_region` VALUES ('1753','209','君山区','3','0','j','junshanqu');

INSERT INTO `twotree_region` VALUES ('1754','209','云溪区','3','0','y','yunxiqu');

INSERT INTO `twotree_region` VALUES ('1755','209','汨罗市','3','0','l','luoshi');

INSERT INTO `twotree_region` VALUES ('1756','209','临湘市','3','0','l','linxiangshi');

INSERT INTO `twotree_region` VALUES ('1757','209','岳阳县','3','0','y','yueyangxian');

INSERT INTO `twotree_region` VALUES ('1758','209','华容县','3','0','h','huarongxian');

INSERT INTO `twotree_region` VALUES ('1759','209','湘阴县','3','0','x','xiangyinxian');

INSERT INTO `twotree_region` VALUES ('1760','209','平江县','3','0','p','pingjiangxian');

INSERT INTO `twotree_region` VALUES ('1761','210','天元区','3','0','t','tianyuanqu');

INSERT INTO `twotree_region` VALUES ('1762','210','荷塘区','3','0','h','hetangqu');

INSERT INTO `twotree_region` VALUES ('1763','210','芦淞区','3','0','l','luqu');

INSERT INTO `twotree_region` VALUES ('1764','210','石峰区','3','0','s','shifengqu');

INSERT INTO `twotree_region` VALUES ('1765','210','醴陵市','3','0','l','lingshi');

INSERT INTO `twotree_region` VALUES ('1766','210','株洲县','3','0','z','zhuzhouxian');

INSERT INTO `twotree_region` VALUES ('1767','210','攸县','3','0','x','xian');

INSERT INTO `twotree_region` VALUES ('1768','210','茶陵县','3','0','c','chalingxian');

INSERT INTO `twotree_region` VALUES ('1769','210','炎陵县','3','0','y','yanlingxian');

INSERT INTO `twotree_region` VALUES ('1770','211','朝阳区','3','0','c','chaoyangqu');

INSERT INTO `twotree_region` VALUES ('1771','211','宽城区','3','0','k','kuanchengqu');

INSERT INTO `twotree_region` VALUES ('1772','211','二道区','3','0','e','erdaoqu');

INSERT INTO `twotree_region` VALUES ('1773','211','南关区','3','0','n','nanguanqu');

INSERT INTO `twotree_region` VALUES ('1774','211','绿园区','3','0','l','lvyuanqu');

INSERT INTO `twotree_region` VALUES ('1775','211','双阳区','3','0','s','shuangyangqu');

INSERT INTO `twotree_region` VALUES ('1776','211','净月潭开发区','3','0','j','jingyuetankaifaqu');

INSERT INTO `twotree_region` VALUES ('1777','211','高新技术开发区','3','0','g','gaoxinjishukaifaqu');

INSERT INTO `twotree_region` VALUES ('1778','211','经济技术开发区','3','0','j','jingjijishukaifaqu');

INSERT INTO `twotree_region` VALUES ('1779','211','汽车产业开发区','3','0','q','qichechanyekaifaqu');

INSERT INTO `twotree_region` VALUES ('1780','211','德惠市','3','0','d','dehuishi');

INSERT INTO `twotree_region` VALUES ('1781','211','九台市','3','0','j','jiutaishi');

INSERT INTO `twotree_region` VALUES ('1782','211','榆树市','3','0','y','yushushi');

INSERT INTO `twotree_region` VALUES ('1783','211','农安县','3','0','n','nonganxian');

INSERT INTO `twotree_region` VALUES ('1784','212','船营区','3','0','c','chuanyingqu');

INSERT INTO `twotree_region` VALUES ('1785','212','昌邑区','3','0','c','changyiqu');

INSERT INTO `twotree_region` VALUES ('1786','212','龙潭区','3','0','l','longtanqu');

INSERT INTO `twotree_region` VALUES ('1787','212','丰满区','3','0','f','fengmanqu');

INSERT INTO `twotree_region` VALUES ('1788','212','蛟河市','3','0','h','heshi');

INSERT INTO `twotree_region` VALUES ('1789','212','桦甸市','3','0','d','dianshi');

INSERT INTO `twotree_region` VALUES ('1790','212','舒兰市','3','0','s','shulanshi');

INSERT INTO `twotree_region` VALUES ('1791','212','磐石市','3','0','p','panshishi');

INSERT INTO `twotree_region` VALUES ('1792','212','永吉县','3','0','y','yongjixian');

INSERT INTO `twotree_region` VALUES ('1793','213','洮北区','3','0','b','beiqu');

INSERT INTO `twotree_region` VALUES ('1794','213','洮南市','3','0','n','nanshi');

INSERT INTO `twotree_region` VALUES ('1795','213','大安市','3','0','d','daanshi');

INSERT INTO `twotree_region` VALUES ('1796','213','镇赉县','3','0','z','zhenxian');

INSERT INTO `twotree_region` VALUES ('1797','213','通榆县','3','0','t','tongyuxian');

INSERT INTO `twotree_region` VALUES ('1798','214','江源区','3','0','j','jiangyuanqu');

INSERT INTO `twotree_region` VALUES ('1799','214','八道江区','3','0','b','badaojiangqu');

INSERT INTO `twotree_region` VALUES ('1800','214','长白','3','0','c','changbai');

INSERT INTO `twotree_region` VALUES ('1801','214','临江市','3','0','l','linjiangshi');

INSERT INTO `twotree_region` VALUES ('1802','214','抚松县','3','0','f','fusongxian');

INSERT INTO `twotree_region` VALUES ('1803','214','靖宇县','3','0','j','jingyuxian');

INSERT INTO `twotree_region` VALUES ('1804','215','龙山区','3','0','l','longshanqu');

INSERT INTO `twotree_region` VALUES ('1805','215','西安区','3','0','x','xianqu');

INSERT INTO `twotree_region` VALUES ('1806','215','东丰县','3','0','d','dongfengxian');

INSERT INTO `twotree_region` VALUES ('1807','215','东辽县','3','0','d','dongliaoxian');

INSERT INTO `twotree_region` VALUES ('1808','216','铁西区','3','0','t','tiexiqu');

INSERT INTO `twotree_region` VALUES ('1809','216','铁东区','3','0','t','tiedongqu');

INSERT INTO `twotree_region` VALUES ('1810','216','伊通','3','0','y','yitong');

INSERT INTO `twotree_region` VALUES ('1811','216','公主岭市','3','0','g','gongzhulingshi');

INSERT INTO `twotree_region` VALUES ('1812','216','双辽市','3','0','s','shuangliaoshi');

INSERT INTO `twotree_region` VALUES ('1813','216','梨树县','3','0','l','lishuxian');

INSERT INTO `twotree_region` VALUES ('1814','217','前郭尔罗斯','3','0','q','qianguoerluosi');

INSERT INTO `twotree_region` VALUES ('1815','217','宁江区','3','0','n','ningjiangqu');

INSERT INTO `twotree_region` VALUES ('1816','217','长岭县','3','0','c','changlingxian');

INSERT INTO `twotree_region` VALUES ('1817','217','乾安县','3','0','q','qiananxian');

INSERT INTO `twotree_region` VALUES ('1818','217','扶余县','3','0','f','fuyuxian');

INSERT INTO `twotree_region` VALUES ('1819','218','东昌区','3','0','d','dongchangqu');

INSERT INTO `twotree_region` VALUES ('1820','218','二道江区','3','0','e','erdaojiangqu');

INSERT INTO `twotree_region` VALUES ('1821','218','梅河口市','3','0','m','meihekoushi');

INSERT INTO `twotree_region` VALUES ('1822','218','集安市','3','0','j','jianshi');

INSERT INTO `twotree_region` VALUES ('1823','218','通化县','3','0','t','tonghuaxian');

INSERT INTO `twotree_region` VALUES ('1824','218','辉南县','3','0','h','huinanxian');

INSERT INTO `twotree_region` VALUES ('1825','218','柳河县','3','0','l','liuhexian');

INSERT INTO `twotree_region` VALUES ('1826','219','延吉市','3','0','y','yanjishi');

INSERT INTO `twotree_region` VALUES ('1827','219','图们市','3','0','t','tumenshi');

INSERT INTO `twotree_region` VALUES ('1828','219','敦化市','3','0','d','dunhuashi');

INSERT INTO `twotree_region` VALUES ('1829','219','珲春市','3','0','c','chunshi');

INSERT INTO `twotree_region` VALUES ('1830','219','龙井市','3','0','l','longjingshi');

INSERT INTO `twotree_region` VALUES ('1831','219','和龙市','3','0','h','helongshi');

INSERT INTO `twotree_region` VALUES ('1832','219','安图县','3','0','a','antuxian');

INSERT INTO `twotree_region` VALUES ('1833','219','汪清县','3','0','w','wangqingxian');

INSERT INTO `twotree_region` VALUES ('1834','220','玄武区','3','0','x','xuanwuqu');

INSERT INTO `twotree_region` VALUES ('1835','220','鼓楼区','3','0','g','gulouqu');

INSERT INTO `twotree_region` VALUES ('1836','220','白下区','3','0','b','baixiaqu');

INSERT INTO `twotree_region` VALUES ('1837','220','建邺区','3','0','j','jianqu');

INSERT INTO `twotree_region` VALUES ('1838','220','秦淮区','3','0','q','qinhuaiqu');

INSERT INTO `twotree_region` VALUES ('1839','220','雨花台区','3','0','y','yuhuataiqu');

INSERT INTO `twotree_region` VALUES ('1840','220','下关区','3','0','x','xiaguanqu');

INSERT INTO `twotree_region` VALUES ('1841','220','栖霞区','3','0','q','qixiaqu');

INSERT INTO `twotree_region` VALUES ('1842','220','浦口区','3','0','p','pukouqu');

INSERT INTO `twotree_region` VALUES ('1843','220','江宁区','3','0','j','jiangningqu');

INSERT INTO `twotree_region` VALUES ('1844','220','六合区','3','0','l','liuhequ');

INSERT INTO `twotree_region` VALUES ('1845','220','溧水县','3','0','s','shuixian');

INSERT INTO `twotree_region` VALUES ('1846','220','高淳县','3','0','g','gaochunxian');

INSERT INTO `twotree_region` VALUES ('1847','221','沧浪区','3','0','c','canglangqu');

INSERT INTO `twotree_region` VALUES ('1848','221','金阊区','3','0','j','jinqu');

INSERT INTO `twotree_region` VALUES ('1849','221','平江区','3','0','p','pingjiangqu');

INSERT INTO `twotree_region` VALUES ('1850','221','虎丘区','3','0','h','huqiuqu');

INSERT INTO `twotree_region` VALUES ('1851','221','吴中区','3','0','w','wuzhongqu');

INSERT INTO `twotree_region` VALUES ('1852','221','相城区','3','0','x','xiangchengqu');

INSERT INTO `twotree_region` VALUES ('1853','221','园区','3','0','y','yuanqu');

INSERT INTO `twotree_region` VALUES ('1854','221','新区','3','0','x','xinqu');

INSERT INTO `twotree_region` VALUES ('1855','221','常熟市','3','0','c','changshushi');

INSERT INTO `twotree_region` VALUES ('1856','221','张家港市','3','0','z','zhangjiagangshi');

INSERT INTO `twotree_region` VALUES ('1857','221','玉山镇','3','0','y','yushanzhen');

INSERT INTO `twotree_region` VALUES ('1858','221','巴城镇','3','0','b','bachengzhen');

INSERT INTO `twotree_region` VALUES ('1859','221','周市镇','3','0','z','zhoushizhen');

INSERT INTO `twotree_region` VALUES ('1860','221','陆家镇','3','0','l','lujiazhen');

INSERT INTO `twotree_region` VALUES ('1861','221','花桥镇','3','0','h','huaqiaozhen');

INSERT INTO `twotree_region` VALUES ('1862','221','淀山湖镇','3','0','d','dianshanhuzhen');

INSERT INTO `twotree_region` VALUES ('1863','221','张浦镇','3','0','z','zhangpuzhen');

INSERT INTO `twotree_region` VALUES ('1864','221','周庄镇','3','0','z','zhouzhuangzhen');

INSERT INTO `twotree_region` VALUES ('1865','221','千灯镇','3','0','q','qiandengzhen');

INSERT INTO `twotree_region` VALUES ('1866','221','锦溪镇','3','0','j','jinxizhen');

INSERT INTO `twotree_region` VALUES ('1867','221','开发区','3','0','k','kaifaqu');

INSERT INTO `twotree_region` VALUES ('1868','221','吴江市','3','0','w','wujiangshi');

INSERT INTO `twotree_region` VALUES ('1869','221','太仓市','3','0','t','taicangshi');

INSERT INTO `twotree_region` VALUES ('1870','222','崇安区','3','0','c','chonganqu');

INSERT INTO `twotree_region` VALUES ('1871','222','北塘区','3','0','b','beitangqu');

INSERT INTO `twotree_region` VALUES ('1872','222','南长区','3','0','n','nanchangqu');

INSERT INTO `twotree_region` VALUES ('1873','222','锡山区','3','0','x','xishanqu');

INSERT INTO `twotree_region` VALUES ('1874','222','惠山区','3','0','h','huishanqu');

INSERT INTO `twotree_region` VALUES ('1875','222','滨湖区','3','0','b','binhuqu');

INSERT INTO `twotree_region` VALUES ('1876','222','新区','3','0','x','xinqu');

INSERT INTO `twotree_region` VALUES ('1877','222','江阴市','3','0','j','jiangyinshi');

INSERT INTO `twotree_region` VALUES ('1878','222','宜兴市','3','0','y','yixingshi');

INSERT INTO `twotree_region` VALUES ('1879','223','天宁区','3','0','t','tianningqu');

INSERT INTO `twotree_region` VALUES ('1880','223','钟楼区','3','0','z','zhonglouqu');

INSERT INTO `twotree_region` VALUES ('1881','223','戚墅堰区','3','0','q','qishuyanqu');

INSERT INTO `twotree_region` VALUES ('1882','223','郊区','3','0','j','jiaoqu');

INSERT INTO `twotree_region` VALUES ('1883','223','新北区','3','0','x','xinbeiqu');

INSERT INTO `twotree_region` VALUES ('1884','223','武进区','3','0','w','wujinqu');

INSERT INTO `twotree_region` VALUES ('1885','223','溧阳市','3','0','y','yangshi');

INSERT INTO `twotree_region` VALUES ('1886','223','金坛市','3','0','j','jintanshi');

INSERT INTO `twotree_region` VALUES ('1887','224','清河区','3','0','q','qinghequ');

INSERT INTO `twotree_region` VALUES ('1888','224','清浦区','3','0','q','qingpuqu');

INSERT INTO `twotree_region` VALUES ('1889','224','楚州区','3','0','c','chuzhouqu');

INSERT INTO `twotree_region` VALUES ('1890','224','淮阴区','3','0','h','huaiyinqu');

INSERT INTO `twotree_region` VALUES ('1891','224','涟水县','3','0','l','lianshuixian');

INSERT INTO `twotree_region` VALUES ('1892','224','洪泽县','3','0','h','hongzexian');

INSERT INTO `twotree_region` VALUES ('1893','224','盱眙县','3','0','x','xian');

INSERT INTO `twotree_region` VALUES ('1894','224','金湖县','3','0','j','jinhuxian');

INSERT INTO `twotree_region` VALUES ('1895','225','新浦区','3','0','x','xinpuqu');

INSERT INTO `twotree_region` VALUES ('1896','225','连云区','3','0','l','lianyunqu');

INSERT INTO `twotree_region` VALUES ('1897','225','海州区','3','0','h','haizhouqu');

INSERT INTO `twotree_region` VALUES ('1898','225','赣榆县','3','0','g','ganyuxian');

INSERT INTO `twotree_region` VALUES ('1899','225','东海县','3','0','d','donghaixian');

INSERT INTO `twotree_region` VALUES ('1900','225','灌云县','3','0','g','guanyunxian');

INSERT INTO `twotree_region` VALUES ('1901','225','灌南县','3','0','g','guannanxian');

INSERT INTO `twotree_region` VALUES ('1902','226','崇川区','3','0','c','chongchuanqu');

INSERT INTO `twotree_region` VALUES ('1903','226','港闸区','3','0','g','gangzhaqu');

INSERT INTO `twotree_region` VALUES ('1904','226','经济开发区','3','0','j','jingjikaifaqu');

INSERT INTO `twotree_region` VALUES ('1905','226','启东市','3','0','q','qidongshi');

INSERT INTO `twotree_region` VALUES ('1906','226','如皋市','3','0','r','rugaoshi');

INSERT INTO `twotree_region` VALUES ('1907','226','通州市','3','0','t','tongzhoushi');

INSERT INTO `twotree_region` VALUES ('1908','226','海门市','3','0','h','haimenshi');

INSERT INTO `twotree_region` VALUES ('1909','226','海安县','3','0','h','haianxian');

INSERT INTO `twotree_region` VALUES ('1910','226','如东县','3','0','r','rudongxian');

INSERT INTO `twotree_region` VALUES ('1911','227','宿城区','3','0','s','suchengqu');

INSERT INTO `twotree_region` VALUES ('1912','227','宿豫区','3','0','s','suyuqu');

INSERT INTO `twotree_region` VALUES ('1913','227','宿豫县','3','0','s','suyuxian');

INSERT INTO `twotree_region` VALUES ('1914','227','沭阳县','3','0','y','yangxian');

INSERT INTO `twotree_region` VALUES ('1915','227','泗阳县','3','0','y','yangxian');

INSERT INTO `twotree_region` VALUES ('1916','227','泗洪县','3','0','h','hongxian');

INSERT INTO `twotree_region` VALUES ('1917','228','海陵区','3','0','h','hailingqu');

INSERT INTO `twotree_region` VALUES ('1918','228','高港区','3','0','g','gaogangqu');

INSERT INTO `twotree_region` VALUES ('1919','228','兴化市','3','0','x','xinghuashi');

INSERT INTO `twotree_region` VALUES ('1920','228','靖江市','3','0','j','jingjiangshi');

INSERT INTO `twotree_region` VALUES ('1921','228','泰兴市','3','0','t','taixingshi');

INSERT INTO `twotree_region` VALUES ('1922','228','姜堰市','3','0','j','jiangyanshi');

INSERT INTO `twotree_region` VALUES ('1923','229','云龙区','3','0','y','yunlongqu');

INSERT INTO `twotree_region` VALUES ('1924','229','鼓楼区','3','0','g','gulouqu');

INSERT INTO `twotree_region` VALUES ('1925','229','九里区','3','0','j','jiuliqu');

INSERT INTO `twotree_region` VALUES ('1926','229','贾汪区','3','0','j','jiawangqu');

INSERT INTO `twotree_region` VALUES ('1927','229','泉山区','3','0','q','quanshanqu');

INSERT INTO `twotree_region` VALUES ('1928','229','新沂市','3','0','x','xinyishi');

INSERT INTO `twotree_region` VALUES ('1929','229','邳州市','3','0','z','zhoushi');

INSERT INTO `twotree_region` VALUES ('1930','229','丰县','3','0','f','fengxian');

INSERT INTO `twotree_region` VALUES ('1931','229','沛县','3','0','p','peixian');

INSERT INTO `twotree_region` VALUES ('1932','229','铜山县','3','0','t','tongshanxian');

INSERT INTO `twotree_region` VALUES ('1933','229','睢宁县','3','0','n','ningxian');

INSERT INTO `twotree_region` VALUES ('1934','230','城区','3','0','c','chengqu');

INSERT INTO `twotree_region` VALUES ('1935','230','亭湖区','3','0','t','tinghuqu');

INSERT INTO `twotree_region` VALUES ('1936','230','盐都区','3','0','y','yanduqu');

INSERT INTO `twotree_region` VALUES ('1937','230','盐都县','3','0','y','yanduxian');

INSERT INTO `twotree_region` VALUES ('1938','230','东台市','3','0','d','dongtaishi');

INSERT INTO `twotree_region` VALUES ('1939','230','大丰市','3','0','d','dafengshi');

INSERT INTO `twotree_region` VALUES ('1940','230','响水县','3','0','x','xiangshuixian');

INSERT INTO `twotree_region` VALUES ('1941','230','滨海县','3','0','b','binhaixian');

INSERT INTO `twotree_region` VALUES ('1942','230','阜宁县','3','0','f','funingxian');

INSERT INTO `twotree_region` VALUES ('1943','230','射阳县','3','0','s','sheyangxian');

INSERT INTO `twotree_region` VALUES ('1944','230','建湖县','3','0','j','jianhuxian');

INSERT INTO `twotree_region` VALUES ('1945','231','广陵区','3','0','g','guanglingqu');

INSERT INTO `twotree_region` VALUES ('1946','231','维扬区','3','0','w','weiyangqu');

INSERT INTO `twotree_region` VALUES ('1947','231','邗江区','3','0','j','jiangqu');

INSERT INTO `twotree_region` VALUES ('1948','231','仪征市','3','0','y','yizhengshi');

INSERT INTO `twotree_region` VALUES ('1949','231','高邮市','3','0','g','gaoyoushi');

INSERT INTO `twotree_region` VALUES ('1950','231','江都市','3','0','j','jiangdushi');

INSERT INTO `twotree_region` VALUES ('1951','231','宝应县','3','0','b','baoyingxian');

INSERT INTO `twotree_region` VALUES ('1952','232','京口区','3','0','j','jingkouqu');

INSERT INTO `twotree_region` VALUES ('1953','232','润州区','3','0','r','runzhouqu');

INSERT INTO `twotree_region` VALUES ('1954','232','丹徒区','3','0','d','dantuqu');

INSERT INTO `twotree_region` VALUES ('1955','232','丹阳市','3','0','d','danyangshi');

INSERT INTO `twotree_region` VALUES ('1956','232','扬中市','3','0','y','yangzhongshi');

INSERT INTO `twotree_region` VALUES ('1957','232','句容市','3','0','j','jurongshi');

INSERT INTO `twotree_region` VALUES ('1958','233','东湖区','3','0','d','donghuqu');

INSERT INTO `twotree_region` VALUES ('1959','233','西湖区','3','0','x','xihuqu');

INSERT INTO `twotree_region` VALUES ('1960','233','青云谱区','3','0','q','qingyunpuqu');

INSERT INTO `twotree_region` VALUES ('1961','233','湾里区','3','0','w','wanliqu');

INSERT INTO `twotree_region` VALUES ('1962','233','青山湖区','3','0','q','qingshanhuqu');

INSERT INTO `twotree_region` VALUES ('1963','233','红谷滩新区','3','0','h','honggutanxinqu');

INSERT INTO `twotree_region` VALUES ('1964','233','昌北区','3','0','c','changbeiqu');

INSERT INTO `twotree_region` VALUES ('1965','233','高新区','3','0','g','gaoxinqu');

INSERT INTO `twotree_region` VALUES ('1966','233','南昌县','3','0','n','nanchangxian');

INSERT INTO `twotree_region` VALUES ('1967','233','新建县','3','0','x','xinjianxian');

INSERT INTO `twotree_region` VALUES ('1968','233','安义县','3','0','a','anyixian');

INSERT INTO `twotree_region` VALUES ('1969','233','进贤县','3','0','j','jinxianxian');

INSERT INTO `twotree_region` VALUES ('1970','234','临川区','3','0','l','linchuanqu');

INSERT INTO `twotree_region` VALUES ('1971','234','南城县','3','0','n','nanchengxian');

INSERT INTO `twotree_region` VALUES ('1972','234','黎川县','3','0','l','lichuanxian');

INSERT INTO `twotree_region` VALUES ('1973','234','南丰县','3','0','n','nanfengxian');

INSERT INTO `twotree_region` VALUES ('1974','234','崇仁县','3','0','c','chongrenxian');

INSERT INTO `twotree_region` VALUES ('1975','234','乐安县','3','0','l','leanxian');

INSERT INTO `twotree_region` VALUES ('1976','234','宜黄县','3','0','y','yihuangxian');

INSERT INTO `twotree_region` VALUES ('1977','234','金溪县','3','0','j','jinxixian');

INSERT INTO `twotree_region` VALUES ('1978','234','资溪县','3','0','z','zixixian');

INSERT INTO `twotree_region` VALUES ('1979','234','东乡县','3','0','d','dongxiangxian');

INSERT INTO `twotree_region` VALUES ('1980','234','广昌县','3','0','g','guangchangxian');

INSERT INTO `twotree_region` VALUES ('1981','235','章贡区','3','0','z','zhanggongqu');

INSERT INTO `twotree_region` VALUES ('1982','235','于都县','3','0','y','yuduxian');

INSERT INTO `twotree_region` VALUES ('1983','235','瑞金市','3','0','r','ruijinshi');

INSERT INTO `twotree_region` VALUES ('1984','235','南康市','3','0','n','nankangshi');

INSERT INTO `twotree_region` VALUES ('1985','235','赣县','3','0','g','ganxian');

INSERT INTO `twotree_region` VALUES ('1986','235','信丰县','3','0','x','xinfengxian');

INSERT INTO `twotree_region` VALUES ('1987','235','大余县','3','0','d','dayuxian');

INSERT INTO `twotree_region` VALUES ('1988','235','上犹县','3','0','s','shangyouxian');

INSERT INTO `twotree_region` VALUES ('1989','235','崇义县','3','0','c','chongyixian');

INSERT INTO `twotree_region` VALUES ('1990','235','安远县','3','0','a','anyuanxian');

INSERT INTO `twotree_region` VALUES ('1991','235','龙南县','3','0','l','longnanxian');

INSERT INTO `twotree_region` VALUES ('1992','235','定南县','3','0','d','dingnanxian');

INSERT INTO `twotree_region` VALUES ('1993','235','全南县','3','0','q','quannanxian');

INSERT INTO `twotree_region` VALUES ('1994','235','宁都县','3','0','n','ningduxian');

INSERT INTO `twotree_region` VALUES ('1995','235','兴国县','3','0','x','xingguoxian');

INSERT INTO `twotree_region` VALUES ('1996','235','会昌县','3','0','h','huichangxian');

INSERT INTO `twotree_region` VALUES ('1997','235','寻乌县','3','0','x','xunwuxian');

INSERT INTO `twotree_region` VALUES ('1998','235','石城县','3','0','s','shichengxian');

INSERT INTO `twotree_region` VALUES ('1999','236','安福县','3','0','a','anfuxian');

INSERT INTO `twotree_region` VALUES ('2000','236','吉州区','3','0','j','jizhouqu');

INSERT INTO `twotree_region` VALUES ('2001','236','青原区','3','0','q','qingyuanqu');

INSERT INTO `twotree_region` VALUES ('2002','236','井冈山市','3','0','j','jinggangshanshi');

INSERT INTO `twotree_region` VALUES ('2003','236','吉安县','3','0','j','jianxian');

INSERT INTO `twotree_region` VALUES ('2004','236','吉水县','3','0','j','jishuixian');

INSERT INTO `twotree_region` VALUES ('2005','236','峡江县','3','0','x','xiajiangxian');

INSERT INTO `twotree_region` VALUES ('2006','236','新干县','3','0','x','xinganxian');

INSERT INTO `twotree_region` VALUES ('2007','236','永丰县','3','0','y','yongfengxian');

INSERT INTO `twotree_region` VALUES ('2008','236','泰和县','3','0','t','taihexian');

INSERT INTO `twotree_region` VALUES ('2009','236','遂川县','3','0','s','suichuanxian');

INSERT INTO `twotree_region` VALUES ('2010','236','万安县','3','0','w','wananxian');

INSERT INTO `twotree_region` VALUES ('2011','236','永新县','3','0','y','yongxinxian');

INSERT INTO `twotree_region` VALUES ('2012','237','珠山区','3','0','z','zhushanqu');

INSERT INTO `twotree_region` VALUES ('2013','237','昌江区','3','0','c','changjiangqu');

INSERT INTO `twotree_region` VALUES ('2014','237','乐平市','3','0','l','lepingshi');

INSERT INTO `twotree_region` VALUES ('2015','237','浮梁县','3','0','f','fuliangxian');

INSERT INTO `twotree_region` VALUES ('2016','238','浔阳区','3','0','y','yangqu');

INSERT INTO `twotree_region` VALUES ('2017','238','庐山区','3','0','l','lushanqu');

INSERT INTO `twotree_region` VALUES ('2018','238','瑞昌市','3','0','r','ruichangshi');

INSERT INTO `twotree_region` VALUES ('2019','238','九江县','3','0','j','jiujiangxian');

INSERT INTO `twotree_region` VALUES ('2020','238','武宁县','3','0','w','wuningxian');

INSERT INTO `twotree_region` VALUES ('2021','238','修水县','3','0','x','xiushuixian');

INSERT INTO `twotree_region` VALUES ('2022','238','永修县','3','0','y','yongxiuxian');

INSERT INTO `twotree_region` VALUES ('2023','238','德安县','3','0','d','deanxian');

INSERT INTO `twotree_region` VALUES ('2024','238','星子县','3','0','x','xingzixian');

INSERT INTO `twotree_region` VALUES ('2025','238','都昌县','3','0','d','duchangxian');

INSERT INTO `twotree_region` VALUES ('2026','238','湖口县','3','0','h','hukouxian');

INSERT INTO `twotree_region` VALUES ('2027','238','彭泽县','3','0','p','pengzexian');

INSERT INTO `twotree_region` VALUES ('2028','239','安源区','3','0','a','anyuanqu');

INSERT INTO `twotree_region` VALUES ('2029','239','湘东区','3','0','x','xiangdongqu');

INSERT INTO `twotree_region` VALUES ('2030','239','莲花县','3','0','l','lianhuaxian');

INSERT INTO `twotree_region` VALUES ('2031','239','芦溪县','3','0','l','luxixian');

INSERT INTO `twotree_region` VALUES ('2032','239','上栗县','3','0','s','shanglixian');

INSERT INTO `twotree_region` VALUES ('2033','240','信州区','3','0','x','xinzhouqu');

INSERT INTO `twotree_region` VALUES ('2034','240','德兴市','3','0','d','dexingshi');

INSERT INTO `twotree_region` VALUES ('2035','240','上饶县','3','0','s','shangraoxian');

INSERT INTO `twotree_region` VALUES ('2036','240','广丰县','3','0','g','guangfengxian');

INSERT INTO `twotree_region` VALUES ('2037','240','玉山县','3','0','y','yushanxian');

INSERT INTO `twotree_region` VALUES ('2038','240','铅山县','3','0','q','qianshanxian');

INSERT INTO `twotree_region` VALUES ('2039','240','横峰县','3','0','h','hengfengxian');

INSERT INTO `twotree_region` VALUES ('2040','240','弋阳县','3','0','y','yangxian');

INSERT INTO `twotree_region` VALUES ('2041','240','余干县','3','0','y','yuganxian');

INSERT INTO `twotree_region` VALUES ('2042','240','波阳县','3','0','b','boyangxian');

INSERT INTO `twotree_region` VALUES ('2043','240','万年县','3','0','w','wannianxian');

INSERT INTO `twotree_region` VALUES ('2044','240','婺源县','3','0','y','yuanxian');

INSERT INTO `twotree_region` VALUES ('2045','241','渝水区','3','0','y','yushuiqu');

INSERT INTO `twotree_region` VALUES ('2046','241','分宜县','3','0','f','fenyixian');

INSERT INTO `twotree_region` VALUES ('2047','242','袁州区','3','0','y','yuanzhouqu');

INSERT INTO `twotree_region` VALUES ('2048','242','丰城市','3','0','f','fengchengshi');

INSERT INTO `twotree_region` VALUES ('2049','242','樟树市','3','0','z','zhangshushi');

INSERT INTO `twotree_region` VALUES ('2050','242','高安市','3','0','g','gaoanshi');

INSERT INTO `twotree_region` VALUES ('2051','242','奉新县','3','0','f','fengxinxian');

INSERT INTO `twotree_region` VALUES ('2052','242','万载县','3','0','w','wanzaixian');

INSERT INTO `twotree_region` VALUES ('2053','242','上高县','3','0','s','shanggaoxian');

INSERT INTO `twotree_region` VALUES ('2054','242','宜丰县','3','0','y','yifengxian');

INSERT INTO `twotree_region` VALUES ('2055','242','靖安县','3','0','j','jinganxian');

INSERT INTO `twotree_region` VALUES ('2056','242','铜鼓县','3','0','t','tongguxian');

INSERT INTO `twotree_region` VALUES ('2057','243','月湖区','3','0','y','yuehuqu');

INSERT INTO `twotree_region` VALUES ('2058','243','贵溪市','3','0','g','guixishi');

INSERT INTO `twotree_region` VALUES ('2059','243','余江县','3','0','y','yujiangxian');

INSERT INTO `twotree_region` VALUES ('2060','244','沈河区','3','0','s','shenhequ');

INSERT INTO `twotree_region` VALUES ('2061','244','皇姑区','3','0','h','huangguqu');

INSERT INTO `twotree_region` VALUES ('2062','244','和平区','3','0','h','hepingqu');

INSERT INTO `twotree_region` VALUES ('2063','244','大东区','3','0','d','dadongqu');

INSERT INTO `twotree_region` VALUES ('2064','244','铁西区','3','0','t','tiexiqu');

INSERT INTO `twotree_region` VALUES ('2065','244','苏家屯区','3','0','s','sujiatunqu');

INSERT INTO `twotree_region` VALUES ('2066','244','东陵区','3','0','d','donglingqu');

INSERT INTO `twotree_region` VALUES ('2067','244','沈北新区','3','0','s','shenbeixinqu');

INSERT INTO `twotree_region` VALUES ('2068','244','于洪区','3','0','y','yuhongqu');

INSERT INTO `twotree_region` VALUES ('2069','244','浑南新区','3','0','h','hunnanxinqu');

INSERT INTO `twotree_region` VALUES ('2070','244','新民市','3','0','x','xinminshi');

INSERT INTO `twotree_region` VALUES ('2071','244','辽中县','3','0','l','liaozhongxian');

INSERT INTO `twotree_region` VALUES ('2072','244','康平县','3','0','k','kangpingxian');

INSERT INTO `twotree_region` VALUES ('2073','244','法库县','3','0','f','fakuxian');

INSERT INTO `twotree_region` VALUES ('2074','245','西岗区','3','0','x','xigangqu');

INSERT INTO `twotree_region` VALUES ('2075','245','中山区','3','0','z','zhongshanqu');

INSERT INTO `twotree_region` VALUES ('2076','245','沙河口区','3','0','s','shahekouqu');

INSERT INTO `twotree_region` VALUES ('2077','245','甘井子区','3','0','g','ganjingziqu');

INSERT INTO `twotree_region` VALUES ('2078','245','旅顺口区','3','0','l','lvshunkouqu');

INSERT INTO `twotree_region` VALUES ('2079','245','金州区','3','0','j','jinzhouqu');

INSERT INTO `twotree_region` VALUES ('2080','245','开发区','3','0','k','kaifaqu');

INSERT INTO `twotree_region` VALUES ('2081','245','瓦房店市','3','0','w','wafangdianshi');

INSERT INTO `twotree_region` VALUES ('2082','245','普兰店市','3','0','p','pulandianshi');

INSERT INTO `twotree_region` VALUES ('2083','245','庄河市','3','0','z','zhuangheshi');

INSERT INTO `twotree_region` VALUES ('2084','245','长海县','3','0','c','changhaixian');

INSERT INTO `twotree_region` VALUES ('2085','246','铁东区','3','0','t','tiedongqu');

INSERT INTO `twotree_region` VALUES ('2086','246','铁西区','3','0','t','tiexiqu');

INSERT INTO `twotree_region` VALUES ('2087','246','立山区','3','0','l','lishanqu');

INSERT INTO `twotree_region` VALUES ('2088','246','千山区','3','0','q','qianshanqu');

INSERT INTO `twotree_region` VALUES ('2089','246','岫岩','3','0','y','yan');

INSERT INTO `twotree_region` VALUES ('2090','246','海城市','3','0','h','haichengshi');

INSERT INTO `twotree_region` VALUES ('2091','246','台安县','3','0','t','taianxian');

INSERT INTO `twotree_region` VALUES ('2092','247','本溪','3','0','b','benxi');

INSERT INTO `twotree_region` VALUES ('2093','247','平山区','3','0','p','pingshanqu');

INSERT INTO `twotree_region` VALUES ('2094','247','明山区','3','0','m','mingshanqu');

INSERT INTO `twotree_region` VALUES ('2095','247','溪湖区','3','0','x','xihuqu');

INSERT INTO `twotree_region` VALUES ('2096','247','南芬区','3','0','n','nanfenqu');

INSERT INTO `twotree_region` VALUES ('2097','247','桓仁','3','0','h','huanren');

INSERT INTO `twotree_region` VALUES ('2098','248','双塔区','3','0','s','shuangtaqu');

INSERT INTO `twotree_region` VALUES ('2099','248','龙城区','3','0','l','longchengqu');

INSERT INTO `twotree_region` VALUES ('2100','248','喀喇沁左翼蒙古族自治县','3','0','k','kalaqinzuoyimengguzuzizhixian');

INSERT INTO `twotree_region` VALUES ('2101','248','北票市','3','0','b','beipiaoshi');

INSERT INTO `twotree_region` VALUES ('2102','248','凌源市','3','0','l','lingyuanshi');

INSERT INTO `twotree_region` VALUES ('2103','248','朝阳县','3','0','c','chaoyangxian');

INSERT INTO `twotree_region` VALUES ('2104','248','建平县','3','0','j','jianpingxian');

INSERT INTO `twotree_region` VALUES ('2105','249','振兴区','3','0','z','zhenxingqu');

INSERT INTO `twotree_region` VALUES ('2106','249','元宝区','3','0','y','yuanbaoqu');

INSERT INTO `twotree_region` VALUES ('2107','249','振安区','3','0','z','zhenanqu');

INSERT INTO `twotree_region` VALUES ('2108','249','宽甸','3','0','k','kuandian');

INSERT INTO `twotree_region` VALUES ('2109','249','东港市','3','0','d','donggangshi');

INSERT INTO `twotree_region` VALUES ('2110','249','凤城市','3','0','f','fengchengshi');

INSERT INTO `twotree_region` VALUES ('2111','250','顺城区','3','0','s','shunchengqu');

INSERT INTO `twotree_region` VALUES ('2112','250','新抚区','3','0','x','xinfuqu');

INSERT INTO `twotree_region` VALUES ('2113','250','东洲区','3','0','d','dongzhouqu');

INSERT INTO `twotree_region` VALUES ('2114','250','望花区','3','0','w','wanghuaqu');

INSERT INTO `twotree_region` VALUES ('2115','250','清原','3','0','q','qingyuan');

INSERT INTO `twotree_region` VALUES ('2116','250','新宾','3','0','x','xinbin');

INSERT INTO `twotree_region` VALUES ('2117','250','抚顺县','3','0','f','fushunxian');

INSERT INTO `twotree_region` VALUES ('2118','251','阜新','3','0','f','fuxin');

INSERT INTO `twotree_region` VALUES ('2119','251','海州区','3','0','h','haizhouqu');

INSERT INTO `twotree_region` VALUES ('2120','251','新邱区','3','0','x','xinqiuqu');

INSERT INTO `twotree_region` VALUES ('2121','251','太平区','3','0','t','taipingqu');

INSERT INTO `twotree_region` VALUES ('2122','251','清河门区','3','0','q','qinghemenqu');

INSERT INTO `twotree_region` VALUES ('2123','251','细河区','3','0','x','xihequ');

INSERT INTO `twotree_region` VALUES ('2124','251','彰武县','3','0','z','zhangwuxian');

INSERT INTO `twotree_region` VALUES ('2125','252','龙港区','3','0','l','longgangqu');

INSERT INTO `twotree_region` VALUES ('2126','252','南票区','3','0','n','nanpiaoqu');

INSERT INTO `twotree_region` VALUES ('2127','252','连山区','3','0','l','lianshanqu');

INSERT INTO `twotree_region` VALUES ('2128','252','兴城市','3','0','x','xingchengshi');

INSERT INTO `twotree_region` VALUES ('2129','252','绥中县','3','0','s','suizhongxian');

INSERT INTO `twotree_region` VALUES ('2130','252','建昌县','3','0','j','jianchangxian');

INSERT INTO `twotree_region` VALUES ('2131','253','太和区','3','0','t','taihequ');

INSERT INTO `twotree_region` VALUES ('2132','253','古塔区','3','0','g','gutaqu');

INSERT INTO `twotree_region` VALUES ('2133','253','凌河区','3','0','l','linghequ');

INSERT INTO `twotree_region` VALUES ('2134','253','凌海市','3','0','l','linghaishi');

INSERT INTO `twotree_region` VALUES ('2135','253','北镇市','3','0','b','beizhenshi');

INSERT INTO `twotree_region` VALUES ('2136','253','黑山县','3','0','h','heishanxian');

INSERT INTO `twotree_region` VALUES ('2137','253','义县','3','0','y','yixian');

INSERT INTO `twotree_region` VALUES ('2138','254','白塔区','3','0','b','baitaqu');

INSERT INTO `twotree_region` VALUES ('2139','254','文圣区','3','0','w','wenshengqu');

INSERT INTO `twotree_region` VALUES ('2140','254','宏伟区','3','0','h','hongweiqu');

INSERT INTO `twotree_region` VALUES ('2141','254','太子河区','3','0','t','taizihequ');

INSERT INTO `twotree_region` VALUES ('2142','254','弓长岭区','3','0','g','gongchanglingqu');

INSERT INTO `twotree_region` VALUES ('2143','254','灯塔市','3','0','d','dengtashi');

INSERT INTO `twotree_region` VALUES ('2144','254','辽阳县','3','0','l','liaoyangxian');

INSERT INTO `twotree_region` VALUES ('2145','255','双台子区','3','0','s','shuangtaiziqu');

INSERT INTO `twotree_region` VALUES ('2146','255','兴隆台区','3','0','x','xinglongtaiqu');

INSERT INTO `twotree_region` VALUES ('2147','255','大洼县','3','0','d','dawaxian');

INSERT INTO `twotree_region` VALUES ('2148','255','盘山县','3','0','p','panshanxian');

INSERT INTO `twotree_region` VALUES ('2149','256','银州区','3','0','y','yinzhouqu');

INSERT INTO `twotree_region` VALUES ('2150','256','清河区','3','0','q','qinghequ');

INSERT INTO `twotree_region` VALUES ('2151','256','调兵山市','3','0','d','diaobingshanshi');

INSERT INTO `twotree_region` VALUES ('2152','256','开原市','3','0','k','kaiyuanshi');

INSERT INTO `twotree_region` VALUES ('2153','256','铁岭县','3','0','t','tielingxian');

INSERT INTO `twotree_region` VALUES ('2154','256','西丰县','3','0','x','xifengxian');

INSERT INTO `twotree_region` VALUES ('2155','256','昌图县','3','0','c','changtuxian');

INSERT INTO `twotree_region` VALUES ('2156','257','站前区','3','0','z','zhanqianqu');

INSERT INTO `twotree_region` VALUES ('2157','257','西市区','3','0','x','xishiqu');

INSERT INTO `twotree_region` VALUES ('2158','257','鲅鱼圈区','3','0','y','yuquanqu');

INSERT INTO `twotree_region` VALUES ('2159','257','老边区','3','0','l','laobianqu');

INSERT INTO `twotree_region` VALUES ('2160','257','盖州市','3','0','g','gaizhoushi');

INSERT INTO `twotree_region` VALUES ('2161','257','大石桥市','3','0','d','dashiqiaoshi');

INSERT INTO `twotree_region` VALUES ('2162','258','回民区','3','0','h','huiminqu');

INSERT INTO `twotree_region` VALUES ('2163','258','玉泉区','3','0','y','yuquanqu');

INSERT INTO `twotree_region` VALUES ('2164','258','新城区','3','0','x','xinchengqu');

INSERT INTO `twotree_region` VALUES ('2165','258','赛罕区','3','0','s','saihanqu');

INSERT INTO `twotree_region` VALUES ('2166','258','清水河县','3','0','q','qingshuihexian');

INSERT INTO `twotree_region` VALUES ('2167','258','土默特左旗','3','0','t','tumotezuoqi');

INSERT INTO `twotree_region` VALUES ('2168','258','托克托县','3','0','t','tuoketuoxian');

INSERT INTO `twotree_region` VALUES ('2169','258','和林格尔县','3','0','h','helingeerxian');

INSERT INTO `twotree_region` VALUES ('2170','258','武川县','3','0','w','wuchuanxian');

INSERT INTO `twotree_region` VALUES ('2171','259','阿拉善左旗','3','0','a','alashanzuoqi');

INSERT INTO `twotree_region` VALUES ('2172','259','阿拉善右旗','3','0','a','alashanyouqi');

INSERT INTO `twotree_region` VALUES ('2173','259','额济纳旗','3','0','e','ejinaqi');

INSERT INTO `twotree_region` VALUES ('2174','260','临河区','3','0','l','linhequ');

INSERT INTO `twotree_region` VALUES ('2175','260','五原县','3','0','w','wuyuanxian');

INSERT INTO `twotree_region` VALUES ('2176','260','磴口县','3','0','k','kouxian');

INSERT INTO `twotree_region` VALUES ('2177','260','乌拉特前旗','3','0','w','wulateqianqi');

INSERT INTO `twotree_region` VALUES ('2178','260','乌拉特中旗','3','0','w','wulatezhongqi');

INSERT INTO `twotree_region` VALUES ('2179','260','乌拉特后旗','3','0','w','wulatehouqi');

INSERT INTO `twotree_region` VALUES ('2180','260','杭锦后旗','3','0','h','hangjinhouqi');

INSERT INTO `twotree_region` VALUES ('2181','261','昆都仑区','3','0','k','kundulunqu');

INSERT INTO `twotree_region` VALUES ('2182','261','青山区','3','0','q','qingshanqu');

INSERT INTO `twotree_region` VALUES ('2183','261','东河区','3','0','d','donghequ');

INSERT INTO `twotree_region` VALUES ('2184','261','九原区','3','0','j','jiuyuanqu');

INSERT INTO `twotree_region` VALUES ('2185','261','石拐区','3','0','s','shiguaiqu');

INSERT INTO `twotree_region` VALUES ('2186','261','白云矿区','3','0','b','baiyunkuangqu');

INSERT INTO `twotree_region` VALUES ('2187','261','土默特右旗','3','0','t','tumoteyouqi');

INSERT INTO `twotree_region` VALUES ('2188','261','固阳县','3','0','g','guyangxian');

INSERT INTO `twotree_region` VALUES ('2189','261','达尔罕茂明安联合旗','3','0','d','daerhanmaominganlianheqi');

INSERT INTO `twotree_region` VALUES ('2190','262','红山区','3','0','h','hongshanqu');

INSERT INTO `twotree_region` VALUES ('2191','262','元宝山区','3','0','y','yuanbaoshanqu');

INSERT INTO `twotree_region` VALUES ('2192','262','松山区','3','0','s','songshanqu');

INSERT INTO `twotree_region` VALUES ('2193','262','阿鲁科尔沁旗','3','0','a','alukeerqinqi');

INSERT INTO `twotree_region` VALUES ('2194','262','巴林左旗','3','0','b','balinzuoqi');

INSERT INTO `twotree_region` VALUES ('2195','262','巴林右旗','3','0','b','balinyouqi');

INSERT INTO `twotree_region` VALUES ('2196','262','林西县','3','0','l','linxixian');

INSERT INTO `twotree_region` VALUES ('2197','262','克什克腾旗','3','0','k','keshiketengqi');

INSERT INTO `twotree_region` VALUES ('2198','262','翁牛特旗','3','0','w','wengniuteqi');

INSERT INTO `twotree_region` VALUES ('2199','262','喀喇沁旗','3','0','k','kalaqinqi');

INSERT INTO `twotree_region` VALUES ('2200','262','宁城县','3','0','n','ningchengxian');

INSERT INTO `twotree_region` VALUES ('2201','262','敖汉旗','3','0','a','aohanqi');

INSERT INTO `twotree_region` VALUES ('2202','263','东胜区','3','0','d','dongshengqu');

INSERT INTO `twotree_region` VALUES ('2203','263','达拉特旗','3','0','d','dalateqi');

INSERT INTO `twotree_region` VALUES ('2204','263','准格尔旗','3','0','z','zhungeerqi');

INSERT INTO `twotree_region` VALUES ('2205','263','鄂托克前旗','3','0','e','etuokeqianqi');

INSERT INTO `twotree_region` VALUES ('2206','263','鄂托克旗','3','0','e','etuokeqi');

INSERT INTO `twotree_region` VALUES ('2207','263','杭锦旗','3','0','h','hangjinqi');

INSERT INTO `twotree_region` VALUES ('2208','263','乌审旗','3','0','w','wushenqi');

INSERT INTO `twotree_region` VALUES ('2209','263','伊金霍洛旗','3','0','y','yijinhuoluoqi');

INSERT INTO `twotree_region` VALUES ('2210','264','海拉尔区','3','0','h','hailaerqu');

INSERT INTO `twotree_region` VALUES ('2211','264','莫力达瓦','3','0','m','molidawa');

INSERT INTO `twotree_region` VALUES ('2212','264','满洲里市','3','0','m','manzhoulishi');

INSERT INTO `twotree_region` VALUES ('2213','264','牙克石市','3','0','y','yakeshishi');

INSERT INTO `twotree_region` VALUES ('2214','264','扎兰屯市','3','0','z','zhalantunshi');

INSERT INTO `twotree_region` VALUES ('2215','264','额尔古纳市','3','0','e','eergunashi');

INSERT INTO `twotree_region` VALUES ('2216','264','根河市','3','0','g','genheshi');

INSERT INTO `twotree_region` VALUES ('2217','264','阿荣旗','3','0','a','arongqi');

INSERT INTO `twotree_region` VALUES ('2218','264','鄂伦春自治旗','3','0','e','elunchunzizhiqi');

INSERT INTO `twotree_region` VALUES ('2219','264','鄂温克族自治旗','3','0','e','ewenkezuzizhiqi');

INSERT INTO `twotree_region` VALUES ('2220','264','陈巴尔虎旗','3','0','c','chenbaerhuqi');

INSERT INTO `twotree_region` VALUES ('2221','264','新巴尔虎左旗','3','0','x','xinbaerhuzuoqi');

INSERT INTO `twotree_region` VALUES ('2222','264','新巴尔虎右旗','3','0','x','xinbaerhuyouqi');

INSERT INTO `twotree_region` VALUES ('2223','265','科尔沁区','3','0','k','keerqinqu');

INSERT INTO `twotree_region` VALUES ('2224','265','霍林郭勒市','3','0','h','huolinguoleshi');

INSERT INTO `twotree_region` VALUES ('2225','265','科尔沁左翼中旗','3','0','k','keerqinzuoyizhongqi');

INSERT INTO `twotree_region` VALUES ('2226','265','科尔沁左翼后旗','3','0','k','keerqinzuoyihouqi');

INSERT INTO `twotree_region` VALUES ('2227','265','开鲁县','3','0','k','kailuxian');

INSERT INTO `twotree_region` VALUES ('2228','265','库伦旗','3','0','k','kulunqi');

INSERT INTO `twotree_region` VALUES ('2229','265','奈曼旗','3','0','n','naimanqi');

INSERT INTO `twotree_region` VALUES ('2230','265','扎鲁特旗','3','0','z','zhaluteqi');

INSERT INTO `twotree_region` VALUES ('2231','266','海勃湾区','3','0','h','haibowanqu');

INSERT INTO `twotree_region` VALUES ('2232','266','乌达区','3','0','w','wudaqu');

INSERT INTO `twotree_region` VALUES ('2233','266','海南区','3','0','h','hainanqu');

INSERT INTO `twotree_region` VALUES ('2234','267','化德县','3','0','h','huadexian');

INSERT INTO `twotree_region` VALUES ('2235','267','集宁区','3','0','j','jiningqu');

INSERT INTO `twotree_region` VALUES ('2236','267','丰镇市','3','0','f','fengzhenshi');

INSERT INTO `twotree_region` VALUES ('2237','267','卓资县','3','0','z','zhuozixian');

INSERT INTO `twotree_region` VALUES ('2238','267','商都县','3','0','s','shangduxian');

INSERT INTO `twotree_region` VALUES ('2239','267','兴和县','3','0','x','xinghexian');

INSERT INTO `twotree_region` VALUES ('2240','267','凉城县','3','0','l','liangchengxian');

INSERT INTO `twotree_region` VALUES ('2241','267','察哈尔右翼前旗','3','0','c','chahaeryouyiqianqi');

INSERT INTO `twotree_region` VALUES ('2242','267','察哈尔右翼中旗','3','0','c','chahaeryouyizhongqi');

INSERT INTO `twotree_region` VALUES ('2243','267','察哈尔右翼后旗','3','0','c','chahaeryouyihouqi');

INSERT INTO `twotree_region` VALUES ('2244','267','四子王旗','3','0','s','siziwangqi');

INSERT INTO `twotree_region` VALUES ('2245','268','二连浩特市','3','0','e','erlianhaoteshi');

INSERT INTO `twotree_region` VALUES ('2246','268','锡林浩特市','3','0','x','xilinhaoteshi');

INSERT INTO `twotree_region` VALUES ('2247','268','阿巴嘎旗','3','0','a','abagaqi');

INSERT INTO `twotree_region` VALUES ('2248','268','苏尼特左旗','3','0','s','sunitezuoqi');

INSERT INTO `twotree_region` VALUES ('2249','268','苏尼特右旗','3','0','s','suniteyouqi');

INSERT INTO `twotree_region` VALUES ('2250','268','东乌珠穆沁旗','3','0','d','dongwuzhumuqinqi');

INSERT INTO `twotree_region` VALUES ('2251','268','西乌珠穆沁旗','3','0','x','xiwuzhumuqinqi');

INSERT INTO `twotree_region` VALUES ('2252','268','太仆寺旗','3','0','t','taipusiqi');

INSERT INTO `twotree_region` VALUES ('2253','268','镶黄旗','3','0','x','xianghuangqi');

INSERT INTO `twotree_region` VALUES ('2254','268','正镶白旗','3','0','z','zhengxiangbaiqi');

INSERT INTO `twotree_region` VALUES ('2255','268','正蓝旗','3','0','z','zhenglanqi');

INSERT INTO `twotree_region` VALUES ('2256','268','多伦县','3','0','d','duolunxian');

INSERT INTO `twotree_region` VALUES ('2257','269','乌兰浩特市','3','0','w','wulanhaoteshi');

INSERT INTO `twotree_region` VALUES ('2258','269','阿尔山市','3','0','a','aershanshi');

INSERT INTO `twotree_region` VALUES ('2259','269','科尔沁右翼前旗','3','0','k','keerqinyouyiqianqi');

INSERT INTO `twotree_region` VALUES ('2260','269','科尔沁右翼中旗','3','0','k','keerqinyouyizhongqi');

INSERT INTO `twotree_region` VALUES ('2261','269','扎赉特旗','3','0','z','zhateqi');

INSERT INTO `twotree_region` VALUES ('2262','269','突泉县','3','0','t','tuquanxian');

INSERT INTO `twotree_region` VALUES ('2263','270','西夏区','3','0','x','xixiaqu');

INSERT INTO `twotree_region` VALUES ('2264','270','金凤区','3','0','j','jinfengqu');

INSERT INTO `twotree_region` VALUES ('2265','270','兴庆区','3','0','x','xingqingqu');

INSERT INTO `twotree_region` VALUES ('2266','270','灵武市','3','0','l','lingwushi');

INSERT INTO `twotree_region` VALUES ('2267','270','永宁县','3','0','y','yongningxian');

INSERT INTO `twotree_region` VALUES ('2268','270','贺兰县','3','0','h','helanxian');

INSERT INTO `twotree_region` VALUES ('2269','271','原州区','3','0','y','yuanzhouqu');

INSERT INTO `twotree_region` VALUES ('2270','271','海原县','3','0','h','haiyuanxian');

INSERT INTO `twotree_region` VALUES ('2271','271','西吉县','3','0','x','xijixian');

INSERT INTO `twotree_region` VALUES ('2272','271','隆德县','3','0','l','longdexian');

INSERT INTO `twotree_region` VALUES ('2273','271','泾源县','3','0','y','yuanxian');

INSERT INTO `twotree_region` VALUES ('2274','271','彭阳县','3','0','p','pengyangxian');

INSERT INTO `twotree_region` VALUES ('2275','272','惠农县','3','0','h','huinongxian');

INSERT INTO `twotree_region` VALUES ('2276','272','大武口区','3','0','d','dawukouqu');

INSERT INTO `twotree_region` VALUES ('2277','272','惠农区','3','0','h','huinongqu');

INSERT INTO `twotree_region` VALUES ('2278','272','陶乐县','3','0','t','taolexian');

INSERT INTO `twotree_region` VALUES ('2279','272','平罗县','3','0','p','pingluoxian');

INSERT INTO `twotree_region` VALUES ('2280','273','利通区','3','0','l','litongqu');

INSERT INTO `twotree_region` VALUES ('2281','273','中卫县','3','0','z','zhongweixian');

INSERT INTO `twotree_region` VALUES ('2282','273','青铜峡市','3','0','q','qingtongxiashi');

INSERT INTO `twotree_region` VALUES ('2283','273','中宁县','3','0','z','zhongningxian');

INSERT INTO `twotree_region` VALUES ('2284','273','盐池县','3','0','y','yanchixian');

INSERT INTO `twotree_region` VALUES ('2285','273','同心县','3','0','t','tongxinxian');

INSERT INTO `twotree_region` VALUES ('2286','274','沙坡头区','3','0','s','shapotouqu');

INSERT INTO `twotree_region` VALUES ('2287','274','海原县','3','0','h','haiyuanxian');

INSERT INTO `twotree_region` VALUES ('2288','274','中宁县','3','0','z','zhongningxian');

INSERT INTO `twotree_region` VALUES ('2289','275','城中区','3','0','c','chengzhongqu');

INSERT INTO `twotree_region` VALUES ('2290','275','城东区','3','0','c','chengdongqu');

INSERT INTO `twotree_region` VALUES ('2291','275','城西区','3','0','c','chengxiqu');

INSERT INTO `twotree_region` VALUES ('2292','275','城北区','3','0','c','chengbeiqu');

INSERT INTO `twotree_region` VALUES ('2293','275','湟中县','3','0','z','zhongxian');

INSERT INTO `twotree_region` VALUES ('2294','275','湟源县','3','0','y','yuanxian');

INSERT INTO `twotree_region` VALUES ('2295','275','大通','3','0','d','datong');

INSERT INTO `twotree_region` VALUES ('2296','276','玛沁县','3','0','m','maqinxian');

INSERT INTO `twotree_region` VALUES ('2297','276','班玛县','3','0','b','banmaxian');

INSERT INTO `twotree_region` VALUES ('2298','276','甘德县','3','0','g','gandexian');

INSERT INTO `twotree_region` VALUES ('2299','276','达日县','3','0','d','darixian');

INSERT INTO `twotree_region` VALUES ('2300','276','久治县','3','0','j','jiuzhixian');

INSERT INTO `twotree_region` VALUES ('2301','276','玛多县','3','0','m','maduoxian');

INSERT INTO `twotree_region` VALUES ('2302','277','海晏县','3','0','h','haixian');

INSERT INTO `twotree_region` VALUES ('2303','277','祁连县','3','0','q','qilianxian');

INSERT INTO `twotree_region` VALUES ('2304','277','刚察县','3','0','g','gangchaxian');

INSERT INTO `twotree_region` VALUES ('2305','277','门源','3','0','m','menyuan');

INSERT INTO `twotree_region` VALUES ('2306','278','平安县','3','0','p','pinganxian');

INSERT INTO `twotree_region` VALUES ('2307','278','乐都县','3','0','l','leduxian');

INSERT INTO `twotree_region` VALUES ('2308','278','民和','3','0','m','minhe');

INSERT INTO `twotree_region` VALUES ('2309','278','互助','3','0','h','huzhu');

INSERT INTO `twotree_region` VALUES ('2310','278','化隆','3','0','h','hualong');

INSERT INTO `twotree_region` VALUES ('2311','278','循化','3','0','x','xunhua');

INSERT INTO `twotree_region` VALUES ('2312','279','共和县','3','0','g','gonghexian');

INSERT INTO `twotree_region` VALUES ('2313','279','同德县','3','0','t','tongdexian');

INSERT INTO `twotree_region` VALUES ('2314','279','贵德县','3','0','g','guidexian');

INSERT INTO `twotree_region` VALUES ('2315','279','兴海县','3','0','x','xinghaixian');

INSERT INTO `twotree_region` VALUES ('2316','279','贵南县','3','0','g','guinanxian');

INSERT INTO `twotree_region` VALUES ('2317','280','德令哈市','3','0','d','delinghashi');

INSERT INTO `twotree_region` VALUES ('2318','280','格尔木市','3','0','g','geermushi');

INSERT INTO `twotree_region` VALUES ('2319','280','乌兰县','3','0','w','wulanxian');

INSERT INTO `twotree_region` VALUES ('2320','280','都兰县','3','0','d','dulanxian');

INSERT INTO `twotree_region` VALUES ('2321','280','天峻县','3','0','t','tianjunxian');

INSERT INTO `twotree_region` VALUES ('2322','281','同仁县','3','0','t','tongrenxian');

INSERT INTO `twotree_region` VALUES ('2323','281','尖扎县','3','0','j','jianzhaxian');

INSERT INTO `twotree_region` VALUES ('2324','281','泽库县','3','0','z','zekuxian');

INSERT INTO `twotree_region` VALUES ('2325','281','河南蒙古族自治县','3','0','h','henanmengguzuzizhixian');

INSERT INTO `twotree_region` VALUES ('2326','282','玉树县','3','0','y','yushuxian');

INSERT INTO `twotree_region` VALUES ('2327','282','杂多县','3','0','z','zaduoxian');

INSERT INTO `twotree_region` VALUES ('2328','282','称多县','3','0','c','chengduoxian');

INSERT INTO `twotree_region` VALUES ('2329','282','治多县','3','0','z','zhiduoxian');

INSERT INTO `twotree_region` VALUES ('2330','282','囊谦县','3','0','n','nangqianxian');

INSERT INTO `twotree_region` VALUES ('2331','282','曲麻莱县','3','0','q','qumalaixian');

INSERT INTO `twotree_region` VALUES ('2332','283','市中区','3','0','s','shizhongqu');

INSERT INTO `twotree_region` VALUES ('2333','283','历下区','3','0','l','lixiaqu');

INSERT INTO `twotree_region` VALUES ('2334','283','天桥区','3','0','t','tianqiaoqu');

INSERT INTO `twotree_region` VALUES ('2335','283','槐荫区','3','0','h','huaiyinqu');

INSERT INTO `twotree_region` VALUES ('2336','283','历城区','3','0','l','lichengqu');

INSERT INTO `twotree_region` VALUES ('2337','283','长清区','3','0','c','changqingqu');

INSERT INTO `twotree_region` VALUES ('2338','283','章丘市','3','0','z','zhangqiushi');

INSERT INTO `twotree_region` VALUES ('2339','283','平阴县','3','0','p','pingyinxian');

INSERT INTO `twotree_region` VALUES ('2340','283','济阳县','3','0','j','jiyangxian');

INSERT INTO `twotree_region` VALUES ('2341','283','商河县','3','0','s','shanghexian');

INSERT INTO `twotree_region` VALUES ('2342','284','市南区','3','0','s','shinanqu');

INSERT INTO `twotree_region` VALUES ('2343','284','市北区','3','0','s','shibeiqu');

INSERT INTO `twotree_region` VALUES ('2344','284','城阳区','3','0','c','chengyangqu');

INSERT INTO `twotree_region` VALUES ('2345','284','四方区','3','0','s','sifangqu');

INSERT INTO `twotree_region` VALUES ('2346','284','李沧区','3','0','l','licangqu');

INSERT INTO `twotree_region` VALUES ('2347','284','黄岛区','3','0','h','huangdaoqu');

INSERT INTO `twotree_region` VALUES ('2348','284','崂山区','3','0','s','shanqu');

INSERT INTO `twotree_region` VALUES ('2349','284','胶州市','3','0','j','jiaozhoushi');

INSERT INTO `twotree_region` VALUES ('2350','284','即墨市','3','0','j','jimoshi');

INSERT INTO `twotree_region` VALUES ('2351','284','平度市','3','0','p','pingdushi');

INSERT INTO `twotree_region` VALUES ('2352','284','胶南市','3','0','j','jiaonanshi');

INSERT INTO `twotree_region` VALUES ('2353','284','莱西市','3','0','l','laixishi');

INSERT INTO `twotree_region` VALUES ('2354','285','滨城区','3','0','b','binchengqu');

INSERT INTO `twotree_region` VALUES ('2355','285','惠民县','3','0','h','huiminxian');

INSERT INTO `twotree_region` VALUES ('2356','285','阳信县','3','0','y','yangxinxian');

INSERT INTO `twotree_region` VALUES ('2357','285','无棣县','3','0','w','wuxian');

INSERT INTO `twotree_region` VALUES ('2358','285','沾化县','3','0','z','zhanhuaxian');

INSERT INTO `twotree_region` VALUES ('2359','285','博兴县','3','0','b','boxingxian');

INSERT INTO `twotree_region` VALUES ('2360','285','邹平县','3','0','z','zoupingxian');

INSERT INTO `twotree_region` VALUES ('2361','286','德城区','3','0','d','dechengqu');

INSERT INTO `twotree_region` VALUES ('2362','286','陵县','3','0','l','lingxian');

INSERT INTO `twotree_region` VALUES ('2363','286','乐陵市','3','0','l','lelingshi');

INSERT INTO `twotree_region` VALUES ('2364','286','禹城市','3','0','y','yuchengshi');

INSERT INTO `twotree_region` VALUES ('2365','286','宁津县','3','0','n','ningjinxian');

INSERT INTO `twotree_region` VALUES ('2366','286','庆云县','3','0','q','qingyunxian');

INSERT INTO `twotree_region` VALUES ('2367','286','临邑县','3','0','l','linyixian');

INSERT INTO `twotree_region` VALUES ('2368','286','齐河县','3','0','q','qihexian');

INSERT INTO `twotree_region` VALUES ('2369','286','平原县','3','0','p','pingyuanxian');

INSERT INTO `twotree_region` VALUES ('2370','286','夏津县','3','0','x','xiajinxian');

INSERT INTO `twotree_region` VALUES ('2371','286','武城县','3','0','w','wuchengxian');

INSERT INTO `twotree_region` VALUES ('2372','287','东营区','3','0','d','dongyingqu');

INSERT INTO `twotree_region` VALUES ('2373','287','河口区','3','0','h','hekouqu');

INSERT INTO `twotree_region` VALUES ('2374','287','垦利县','3','0','k','kenlixian');

INSERT INTO `twotree_region` VALUES ('2375','287','利津县','3','0','l','lijinxian');

INSERT INTO `twotree_region` VALUES ('2376','287','广饶县','3','0','g','guangraoxian');

INSERT INTO `twotree_region` VALUES ('2377','288','牡丹区','3','0','m','mudanqu');

INSERT INTO `twotree_region` VALUES ('2378','288','曹县','3','0','c','caoxian');

INSERT INTO `twotree_region` VALUES ('2379','288','单县','3','0','d','danxian');

INSERT INTO `twotree_region` VALUES ('2380','288','成武县','3','0','c','chengwuxian');

INSERT INTO `twotree_region` VALUES ('2381','288','巨野县','3','0','j','juyexian');

INSERT INTO `twotree_region` VALUES ('2382','288','郓城县','3','0','c','chengxian');

INSERT INTO `twotree_region` VALUES ('2383','288','鄄城县','3','0','c','chengxian');

INSERT INTO `twotree_region` VALUES ('2384','288','定陶县','3','0','d','dingtaoxian');

INSERT INTO `twotree_region` VALUES ('2385','288','东明县','3','0','d','dongmingxian');

INSERT INTO `twotree_region` VALUES ('2386','289','市中区','3','0','s','shizhongqu');

INSERT INTO `twotree_region` VALUES ('2387','289','任城区','3','0','r','renchengqu');

INSERT INTO `twotree_region` VALUES ('2388','289','曲阜市','3','0','q','qufushi');

INSERT INTO `twotree_region` VALUES ('2389','289','兖州市','3','0','z','zhoushi');

INSERT INTO `twotree_region` VALUES ('2390','289','邹城市','3','0','z','zouchengshi');

INSERT INTO `twotree_region` VALUES ('2391','289','微山县','3','0','w','weishanxian');

INSERT INTO `twotree_region` VALUES ('2392','289','鱼台县','3','0','y','yutaixian');

INSERT INTO `twotree_region` VALUES ('2393','289','金乡县','3','0','j','jinxiangxian');

INSERT INTO `twotree_region` VALUES ('2394','289','嘉祥县','3','0','j','jiaxiangxian');

INSERT INTO `twotree_region` VALUES ('2395','289','汶上县','3','0','s','shangxian');

INSERT INTO `twotree_region` VALUES ('2396','289','泗水县','3','0','s','shuixian');

INSERT INTO `twotree_region` VALUES ('2397','289','梁山县','3','0','l','liangshanxian');

INSERT INTO `twotree_region` VALUES ('2398','290','莱城区','3','0','l','laichengqu');

INSERT INTO `twotree_region` VALUES ('2399','290','钢城区','3','0','g','gangchengqu');

INSERT INTO `twotree_region` VALUES ('2400','291','东昌府区','3','0','d','dongchangfuqu');

INSERT INTO `twotree_region` VALUES ('2401','291','临清市','3','0','l','linqingshi');

INSERT INTO `twotree_region` VALUES ('2402','291','阳谷县','3','0','y','yangguxian');

INSERT INTO `twotree_region` VALUES ('2403','291','莘县','3','0','x','xian');

INSERT INTO `twotree_region` VALUES ('2404','291','茌平县','3','0','p','pingxian');

INSERT INTO `twotree_region` VALUES ('2405','291','东阿县','3','0','d','dongaxian');

INSERT INTO `twotree_region` VALUES ('2406','291','冠县','3','0','g','guanxian');

INSERT INTO `twotree_region` VALUES ('2407','291','高唐县','3','0','g','gaotangxian');

INSERT INTO `twotree_region` VALUES ('2408','292','兰山区','3','0','l','lanshanqu');

INSERT INTO `twotree_region` VALUES ('2409','292','罗庄区','3','0','l','luozhuangqu');

INSERT INTO `twotree_region` VALUES ('2410','292','河东区','3','0','h','hedongqu');

INSERT INTO `twotree_region` VALUES ('2411','292','沂南县','3','0','y','yinanxian');

INSERT INTO `twotree_region` VALUES ('2412','292','郯城县','3','0','c','chengxian');

INSERT INTO `twotree_region` VALUES ('2413','292','沂水县','3','0','y','yishuixian');

INSERT INTO `twotree_region` VALUES ('2414','292','苍山县','3','0','c','cangshanxian');

INSERT INTO `twotree_region` VALUES ('2415','292','费县','3','0','f','feixian');

INSERT INTO `twotree_region` VALUES ('2416','292','平邑县','3','0','p','pingyixian');

INSERT INTO `twotree_region` VALUES ('2417','292','莒南县','3','0','n','nanxian');

INSERT INTO `twotree_region` VALUES ('2418','292','蒙阴县','3','0','m','mengyinxian');

INSERT INTO `twotree_region` VALUES ('2419','292','临沭县','3','0','l','linxian');

INSERT INTO `twotree_region` VALUES ('2420','293','东港区','3','0','d','donggangqu');

INSERT INTO `twotree_region` VALUES ('2421','293','岚山区','3','0','s','shanqu');

INSERT INTO `twotree_region` VALUES ('2422','293','五莲县','3','0','w','wulianxian');

INSERT INTO `twotree_region` VALUES ('2423','293','莒县','3','0','x','xian');

INSERT INTO `twotree_region` VALUES ('2424','294','泰山区','3','0','t','taishanqu');

INSERT INTO `twotree_region` VALUES ('2425','294','岱岳区','3','0','y','yuequ');

INSERT INTO `twotree_region` VALUES ('2426','294','新泰市','3','0','x','xintaishi');

INSERT INTO `twotree_region` VALUES ('2427','294','肥城市','3','0','f','feichengshi');

INSERT INTO `twotree_region` VALUES ('2428','294','宁阳县','3','0','n','ningyangxian');

INSERT INTO `twotree_region` VALUES ('2429','294','东平县','3','0','d','dongpingxian');

INSERT INTO `twotree_region` VALUES ('2430','295','荣成市','3','0','r','rongchengshi');

INSERT INTO `twotree_region` VALUES ('2431','295','乳山市','3','0','r','rushanshi');

INSERT INTO `twotree_region` VALUES ('2432','295','环翠区','3','0','h','huancuiqu');

INSERT INTO `twotree_region` VALUES ('2433','295','文登市','3','0','w','wendengshi');

INSERT INTO `twotree_region` VALUES ('2434','296','潍城区','3','0','w','weichengqu');

INSERT INTO `twotree_region` VALUES ('2435','296','寒亭区','3','0','h','hantingqu');

INSERT INTO `twotree_region` VALUES ('2436','296','坊子区','3','0','f','fangziqu');

INSERT INTO `twotree_region` VALUES ('2437','296','奎文区','3','0','k','kuiwenqu');

INSERT INTO `twotree_region` VALUES ('2438','296','青州市','3','0','q','qingzhoushi');

INSERT INTO `twotree_region` VALUES ('2439','296','诸城市','3','0','z','zhuchengshi');

INSERT INTO `twotree_region` VALUES ('2440','296','寿光市','3','0','s','shouguangshi');

INSERT INTO `twotree_region` VALUES ('2441','296','安丘市','3','0','a','anqiushi');

INSERT INTO `twotree_region` VALUES ('2442','296','高密市','3','0','g','gaomishi');

INSERT INTO `twotree_region` VALUES ('2443','296','昌邑市','3','0','c','changyishi');

INSERT INTO `twotree_region` VALUES ('2444','296','临朐县','3','0','l','linxian');

INSERT INTO `twotree_region` VALUES ('2445','296','昌乐县','3','0','c','changlexian');

INSERT INTO `twotree_region` VALUES ('2446','297','芝罘区','3','0','z','zhiqu');

INSERT INTO `twotree_region` VALUES ('2447','297','福山区','3','0','f','fushanqu');

INSERT INTO `twotree_region` VALUES ('2448','297','牟平区','3','0','m','moupingqu');

INSERT INTO `twotree_region` VALUES ('2449','297','莱山区','3','0','l','laishanqu');

INSERT INTO `twotree_region` VALUES ('2450','297','开发区','3','0','k','kaifaqu');

INSERT INTO `twotree_region` VALUES ('2451','297','龙口市','3','0','l','longkoushi');

INSERT INTO `twotree_region` VALUES ('2452','297','莱阳市','3','0','l','laiyangshi');

INSERT INTO `twotree_region` VALUES ('2453','297','莱州市','3','0','l','laizhoushi');

INSERT INTO `twotree_region` VALUES ('2454','297','蓬莱市','3','0','p','penglaishi');

INSERT INTO `twotree_region` VALUES ('2455','297','招远市','3','0','z','zhaoyuanshi');

INSERT INTO `twotree_region` VALUES ('2456','297','栖霞市','3','0','q','qixiashi');

INSERT INTO `twotree_region` VALUES ('2457','297','海阳市','3','0','h','haiyangshi');

INSERT INTO `twotree_region` VALUES ('2458','297','长岛县','3','0','c','changdaoxian');

INSERT INTO `twotree_region` VALUES ('2459','298','市中区','3','0','s','shizhongqu');

INSERT INTO `twotree_region` VALUES ('2460','298','山亭区','3','0','s','shantingqu');

INSERT INTO `twotree_region` VALUES ('2461','298','峄城区','3','0','c','chengqu');

INSERT INTO `twotree_region` VALUES ('2462','298','台儿庄区','3','0','t','taierzhuangqu');

INSERT INTO `twotree_region` VALUES ('2463','298','薛城区','3','0','x','xuechengqu');

INSERT INTO `twotree_region` VALUES ('2464','298','滕州市','3','0','z','zhoushi');

INSERT INTO `twotree_region` VALUES ('2465','299','张店区','3','0','z','zhangdianqu');

INSERT INTO `twotree_region` VALUES ('2466','299','临淄区','3','0','l','linziqu');

INSERT INTO `twotree_region` VALUES ('2467','299','淄川区','3','0','z','zichuanqu');

INSERT INTO `twotree_region` VALUES ('2468','299','博山区','3','0','b','boshanqu');

INSERT INTO `twotree_region` VALUES ('2469','299','周村区','3','0','z','zhoucunqu');

INSERT INTO `twotree_region` VALUES ('2470','299','桓台县','3','0','h','huantaixian');

INSERT INTO `twotree_region` VALUES ('2471','299','高青县','3','0','g','gaoqingxian');

INSERT INTO `twotree_region` VALUES ('2472','299','沂源县','3','0','y','yiyuanxian');

INSERT INTO `twotree_region` VALUES ('2473','300','杏花岭区','3','0','x','xinghualingqu');

INSERT INTO `twotree_region` VALUES ('2474','300','小店区','3','0','x','xiaodianqu');

INSERT INTO `twotree_region` VALUES ('2475','300','迎泽区','3','0','y','yingzequ');

INSERT INTO `twotree_region` VALUES ('2476','300','尖草坪区','3','0','j','jiancaopingqu');

INSERT INTO `twotree_region` VALUES ('2477','300','万柏林区','3','0','w','wanbailinqu');

INSERT INTO `twotree_region` VALUES ('2478','300','晋源区','3','0','j','jinyuanqu');

INSERT INTO `twotree_region` VALUES ('2479','300','高新开发区','3','0','g','gaoxinkaifaqu');

INSERT INTO `twotree_region` VALUES ('2480','300','民营经济开发区','3','0','m','minyingjingjikaifaqu');

INSERT INTO `twotree_region` VALUES ('2481','300','经济技术开发区','3','0','j','jingjijishukaifaqu');

INSERT INTO `twotree_region` VALUES ('2482','300','清徐县','3','0','q','qingxuxian');

INSERT INTO `twotree_region` VALUES ('2483','300','阳曲县','3','0','y','yangquxian');

INSERT INTO `twotree_region` VALUES ('2484','300','娄烦县','3','0','l','loufanxian');

INSERT INTO `twotree_region` VALUES ('2485','300','古交市','3','0','g','gujiaoshi');

INSERT INTO `twotree_region` VALUES ('2486','301','城区','3','0','c','chengqu');

INSERT INTO `twotree_region` VALUES ('2487','301','郊区','3','0','j','jiaoqu');

INSERT INTO `twotree_region` VALUES ('2488','301','沁县','3','0','q','qinxian');

INSERT INTO `twotree_region` VALUES ('2489','301','潞城市','3','0','l','luchengshi');

INSERT INTO `twotree_region` VALUES ('2490','301','长治县','3','0','c','changzhixian');

INSERT INTO `twotree_region` VALUES ('2491','301','襄垣县','3','0','x','xiangyuanxian');

INSERT INTO `twotree_region` VALUES ('2492','301','屯留县','3','0','t','tunliuxian');

INSERT INTO `twotree_region` VALUES ('2493','301','平顺县','3','0','p','pingshunxian');

INSERT INTO `twotree_region` VALUES ('2494','301','黎城县','3','0','l','lichengxian');

INSERT INTO `twotree_region` VALUES ('2495','301','壶关县','3','0','h','huguanxian');

INSERT INTO `twotree_region` VALUES ('2496','301','长子县','3','0','c','changzixian');

INSERT INTO `twotree_region` VALUES ('2497','301','武乡县','3','0','w','wuxiangxian');

INSERT INTO `twotree_region` VALUES ('2498','301','沁源县','3','0','q','qinyuanxian');

INSERT INTO `twotree_region` VALUES ('2499','302','城区','3','0','c','chengqu');

INSERT INTO `twotree_region` VALUES ('2500','302','矿区','3','0','k','kuangqu');

INSERT INTO `twotree_region` VALUES ('2501','302','南郊区','3','0','n','nanjiaoqu');

INSERT INTO `twotree_region` VALUES ('2502','302','新荣区','3','0','x','xinrongqu');

INSERT INTO `twotree_region` VALUES ('2503','302','阳高县','3','0','y','yanggaoxian');

INSERT INTO `twotree_region` VALUES ('2504','302','天镇县','3','0','t','tianzhenxian');

INSERT INTO `twotree_region` VALUES ('2505','302','广灵县','3','0','g','guanglingxian');

INSERT INTO `twotree_region` VALUES ('2506','302','灵丘县','3','0','l','lingqiuxian');

INSERT INTO `twotree_region` VALUES ('2507','302','浑源县','3','0','h','hunyuanxian');

INSERT INTO `twotree_region` VALUES ('2508','302','左云县','3','0','z','zuoyunxian');

INSERT INTO `twotree_region` VALUES ('2509','302','大同县','3','0','d','datongxian');

INSERT INTO `twotree_region` VALUES ('2510','303','城区','3','0','c','chengqu');

INSERT INTO `twotree_region` VALUES ('2511','303','高平市','3','0','g','gaopingshi');

INSERT INTO `twotree_region` VALUES ('2512','303','沁水县','3','0','q','qinshuixian');

INSERT INTO `twotree_region` VALUES ('2513','303','阳城县','3','0','y','yangchengxian');

INSERT INTO `twotree_region` VALUES ('2514','303','陵川县','3','0','l','lingchuanxian');

INSERT INTO `twotree_region` VALUES ('2515','303','泽州县','3','0','z','zezhouxian');

INSERT INTO `twotree_region` VALUES ('2516','304','榆次区','3','0','y','yuciqu');

INSERT INTO `twotree_region` VALUES ('2517','304','介休市','3','0','j','jiexiushi');

INSERT INTO `twotree_region` VALUES ('2518','304','榆社县','3','0','y','yushexian');

INSERT INTO `twotree_region` VALUES ('2519','304','左权县','3','0','z','zuoquanxian');

INSERT INTO `twotree_region` VALUES ('2520','304','和顺县','3','0','h','heshunxian');

INSERT INTO `twotree_region` VALUES ('2521','304','昔阳县','3','0','x','xiyangxian');

INSERT INTO `twotree_region` VALUES ('2522','304','寿阳县','3','0','s','shouyangxian');

INSERT INTO `twotree_region` VALUES ('2523','304','太谷县','3','0','t','taiguxian');

INSERT INTO `twotree_region` VALUES ('2524','304','祁县','3','0','q','qixian');

INSERT INTO `twotree_region` VALUES ('2525','304','平遥县','3','0','p','pingyaoxian');

INSERT INTO `twotree_region` VALUES ('2526','304','灵石县','3','0','l','lingshixian');

INSERT INTO `twotree_region` VALUES ('2527','305','尧都区','3','0','y','yaoduqu');

INSERT INTO `twotree_region` VALUES ('2528','305','侯马市','3','0','h','houmashi');

INSERT INTO `twotree_region` VALUES ('2529','305','霍州市','3','0','h','huozhoushi');

INSERT INTO `twotree_region` VALUES ('2530','305','曲沃县','3','0','q','quwoxian');

INSERT INTO `twotree_region` VALUES ('2531','305','翼城县','3','0','y','yichengxian');

INSERT INTO `twotree_region` VALUES ('2532','305','襄汾县','3','0','x','xiangfenxian');

INSERT INTO `twotree_region` VALUES ('2533','305','洪洞县','3','0','h','hongdongxian');

INSERT INTO `twotree_region` VALUES ('2534','305','吉县','3','0','j','jixian');

INSERT INTO `twotree_region` VALUES ('2535','305','安泽县','3','0','a','anzexian');

INSERT INTO `twotree_region` VALUES ('2536','305','浮山县','3','0','f','fushanxian');

INSERT INTO `twotree_region` VALUES ('2537','305','古县','3','0','g','guxian');

INSERT INTO `twotree_region` VALUES ('2538','305','乡宁县','3','0','x','xiangningxian');

INSERT INTO `twotree_region` VALUES ('2539','305','大宁县','3','0','d','daningxian');

INSERT INTO `twotree_region` VALUES ('2540','305','隰县','3','0','x','xian');

INSERT INTO `twotree_region` VALUES ('2541','305','永和县','3','0','y','yonghexian');

INSERT INTO `twotree_region` VALUES ('2542','305','蒲县','3','0','p','puxian');

INSERT INTO `twotree_region` VALUES ('2543','305','汾西县','3','0','f','fenxixian');

INSERT INTO `twotree_region` VALUES ('2544','306','离石市','3','0','l','lishishi');

INSERT INTO `twotree_region` VALUES ('2545','306','离石区','3','0','l','lishiqu');

INSERT INTO `twotree_region` VALUES ('2546','306','孝义市','3','0','x','xiaoyishi');

INSERT INTO `twotree_region` VALUES ('2547','306','汾阳市','3','0','f','fenyangshi');

INSERT INTO `twotree_region` VALUES ('2548','306','文水县','3','0','w','wenshuixian');

INSERT INTO `twotree_region` VALUES ('2549','306','交城县','3','0','j','jiaochengxian');

INSERT INTO `twotree_region` VALUES ('2550','306','兴县','3','0','x','xingxian');

INSERT INTO `twotree_region` VALUES ('2551','306','临县','3','0','l','linxian');

INSERT INTO `twotree_region` VALUES ('2552','306','柳林县','3','0','l','liulinxian');

INSERT INTO `twotree_region` VALUES ('2553','306','石楼县','3','0','s','shilouxian');

INSERT INTO `twotree_region` VALUES ('2554','306','岚县','3','0','x','xian');

INSERT INTO `twotree_region` VALUES ('2555','306','方山县','3','0','f','fangshanxian');

INSERT INTO `twotree_region` VALUES ('2556','306','中阳县','3','0','z','zhongyangxian');

INSERT INTO `twotree_region` VALUES ('2557','306','交口县','3','0','j','jiaokouxian');

INSERT INTO `twotree_region` VALUES ('2558','307','朔城区','3','0','s','shuochengqu');

INSERT INTO `twotree_region` VALUES ('2559','307','平鲁区','3','0','p','pingluqu');

INSERT INTO `twotree_region` VALUES ('2560','307','山阴县','3','0','s','shanyinxian');

INSERT INTO `twotree_region` VALUES ('2561','307','应县','3','0','y','yingxian');

INSERT INTO `twotree_region` VALUES ('2562','307','右玉县','3','0','y','youyuxian');

INSERT INTO `twotree_region` VALUES ('2563','307','怀仁县','3','0','h','huairenxian');

INSERT INTO `twotree_region` VALUES ('2564','308','忻府区','3','0','x','xinfuqu');

INSERT INTO `twotree_region` VALUES ('2565','308','原平市','3','0','y','yuanpingshi');

INSERT INTO `twotree_region` VALUES ('2566','308','定襄县','3','0','d','dingxiangxian');

INSERT INTO `twotree_region` VALUES ('2567','308','五台县','3','0','w','wutaixian');

INSERT INTO `twotree_region` VALUES ('2568','308','代县','3','0','d','daixian');

INSERT INTO `twotree_region` VALUES ('2569','308','繁峙县','3','0','f','fanzhixian');

INSERT INTO `twotree_region` VALUES ('2570','308','宁武县','3','0','n','ningwuxian');

INSERT INTO `twotree_region` VALUES ('2571','308','静乐县','3','0','j','jinglexian');

INSERT INTO `twotree_region` VALUES ('2572','308','神池县','3','0','s','shenchixian');

INSERT INTO `twotree_region` VALUES ('2573','308','五寨县','3','0','w','wuzhaixian');

INSERT INTO `twotree_region` VALUES ('2574','308','岢岚县','3','0','x','xian');

INSERT INTO `twotree_region` VALUES ('2575','308','河曲县','3','0','h','hequxian');

INSERT INTO `twotree_region` VALUES ('2576','308','保德县','3','0','b','baodexian');

INSERT INTO `twotree_region` VALUES ('2577','308','偏关县','3','0','p','pianguanxian');

INSERT INTO `twotree_region` VALUES ('2578','309','城区','3','0','c','chengqu');

INSERT INTO `twotree_region` VALUES ('2579','309','矿区','3','0','k','kuangqu');

INSERT INTO `twotree_region` VALUES ('2580','309','郊区','3','0','j','jiaoqu');

INSERT INTO `twotree_region` VALUES ('2581','309','平定县','3','0','p','pingdingxian');

INSERT INTO `twotree_region` VALUES ('2582','309','盂县','3','0','y','yuxian');

INSERT INTO `twotree_region` VALUES ('2583','310','盐湖区','3','0','y','yanhuqu');

INSERT INTO `twotree_region` VALUES ('2584','310','永济市','3','0','y','yongjishi');

INSERT INTO `twotree_region` VALUES ('2585','310','河津市','3','0','h','hejinshi');

INSERT INTO `twotree_region` VALUES ('2586','310','临猗县','3','0','l','linxian');

INSERT INTO `twotree_region` VALUES ('2587','310','万荣县','3','0','w','wanrongxian');

INSERT INTO `twotree_region` VALUES ('2588','310','闻喜县','3','0','w','wenxixian');

INSERT INTO `twotree_region` VALUES ('2589','310','稷山县','3','0','s','shanxian');

INSERT INTO `twotree_region` VALUES ('2590','310','新绛县','3','0','x','xinxian');

INSERT INTO `twotree_region` VALUES ('2591','310','绛县','3','0','x','xian');

INSERT INTO `twotree_region` VALUES ('2592','310','垣曲县','3','0','y','yuanquxian');

INSERT INTO `twotree_region` VALUES ('2593','310','夏县','3','0','x','xiaxian');

INSERT INTO `twotree_region` VALUES ('2594','310','平陆县','3','0','p','pingluxian');

INSERT INTO `twotree_region` VALUES ('2595','310','芮城县','3','0','c','chengxian');

INSERT INTO `twotree_region` VALUES ('2596','311','莲湖区','3','0','l','lianhuqu');

INSERT INTO `twotree_region` VALUES ('2597','311','新城区','3','0','x','xinchengqu');

INSERT INTO `twotree_region` VALUES ('2598','311','碑林区','3','0','b','beilinqu');

INSERT INTO `twotree_region` VALUES ('2599','311','雁塔区','3','0','y','yantaqu');

INSERT INTO `twotree_region` VALUES ('2600','311','灞桥区','3','0','q','qiaoqu');

INSERT INTO `twotree_region` VALUES ('2601','311','未央区','3','0','w','weiyangqu');

INSERT INTO `twotree_region` VALUES ('2602','311','阎良区','3','0','y','yanliangqu');

INSERT INTO `twotree_region` VALUES ('2603','311','临潼区','3','0','l','linqu');

INSERT INTO `twotree_region` VALUES ('2604','311','长安区','3','0','c','changanqu');

INSERT INTO `twotree_region` VALUES ('2605','311','蓝田县','3','0','l','lantianxian');

INSERT INTO `twotree_region` VALUES ('2606','311','周至县','3','0','z','zhouzhixian');

INSERT INTO `twotree_region` VALUES ('2607','311','户县','3','0','h','huxian');

INSERT INTO `twotree_region` VALUES ('2608','311','高陵县','3','0','g','gaolingxian');

INSERT INTO `twotree_region` VALUES ('2609','312','汉滨区','3','0','h','hanbinqu');

INSERT INTO `twotree_region` VALUES ('2610','312','汉阴县','3','0','h','hanyinxian');

INSERT INTO `twotree_region` VALUES ('2611','312','石泉县','3','0','s','shiquanxian');

INSERT INTO `twotree_region` VALUES ('2612','312','宁陕县','3','0','n','ningshanxian');

INSERT INTO `twotree_region` VALUES ('2613','312','紫阳县','3','0','z','ziyangxian');

INSERT INTO `twotree_region` VALUES ('2614','312','岚皋县','3','0','g','gaoxian');

INSERT INTO `twotree_region` VALUES ('2615','312','平利县','3','0','p','pinglixian');

INSERT INTO `twotree_region` VALUES ('2616','312','镇坪县','3','0','z','zhenpingxian');

INSERT INTO `twotree_region` VALUES ('2617','312','旬阳县','3','0','x','xunyangxian');

INSERT INTO `twotree_region` VALUES ('2618','312','白河县','3','0','b','baihexian');

INSERT INTO `twotree_region` VALUES ('2619','313','陈仓区','3','0','c','chencangqu');

INSERT INTO `twotree_region` VALUES ('2620','313','渭滨区','3','0','w','weibinqu');

INSERT INTO `twotree_region` VALUES ('2621','313','金台区','3','0','j','jintaiqu');

INSERT INTO `twotree_region` VALUES ('2622','313','凤翔县','3','0','f','fengxiangxian');

INSERT INTO `twotree_region` VALUES ('2623','313','岐山县','3','0','s','shanxian');

INSERT INTO `twotree_region` VALUES ('2624','313','扶风县','3','0','f','fufengxian');

INSERT INTO `twotree_region` VALUES ('2625','313','眉县','3','0','m','meixian');

INSERT INTO `twotree_region` VALUES ('2626','313','陇县','3','0','l','longxian');

INSERT INTO `twotree_region` VALUES ('2627','313','千阳县','3','0','q','qianyangxian');

INSERT INTO `twotree_region` VALUES ('2628','313','麟游县','3','0','y','youxian');

INSERT INTO `twotree_region` VALUES ('2629','313','凤县','3','0','f','fengxian');

INSERT INTO `twotree_region` VALUES ('2630','313','太白县','3','0','t','taibaixian');

INSERT INTO `twotree_region` VALUES ('2631','314','汉台区','3','0','h','hantaiqu');

INSERT INTO `twotree_region` VALUES ('2632','314','南郑县','3','0','n','nanzhengxian');

INSERT INTO `twotree_region` VALUES ('2633','314','城固县','3','0','c','chengguxian');

INSERT INTO `twotree_region` VALUES ('2634','314','洋县','3','0','y','yangxian');

INSERT INTO `twotree_region` VALUES ('2635','314','西乡县','3','0','x','xixiangxian');

INSERT INTO `twotree_region` VALUES ('2636','314','勉县','3','0','m','mianxian');

INSERT INTO `twotree_region` VALUES ('2637','314','宁强县','3','0','n','ningqiangxian');

INSERT INTO `twotree_region` VALUES ('2638','314','略阳县','3','0','l','lueyangxian');

INSERT INTO `twotree_region` VALUES ('2639','314','镇巴县','3','0','z','zhenbaxian');

INSERT INTO `twotree_region` VALUES ('2640','314','留坝县','3','0','l','liubaxian');

INSERT INTO `twotree_region` VALUES ('2641','314','佛坪县','3','0','f','fopingxian');

INSERT INTO `twotree_region` VALUES ('2642','315','商州区','3','0','s','shangzhouqu');

INSERT INTO `twotree_region` VALUES ('2643','315','洛南县','3','0','l','luonanxian');

INSERT INTO `twotree_region` VALUES ('2644','315','丹凤县','3','0','d','danfengxian');

INSERT INTO `twotree_region` VALUES ('2645','315','商南县','3','0','s','shangnanxian');

INSERT INTO `twotree_region` VALUES ('2646','315','山阳县','3','0','s','shanyangxian');

INSERT INTO `twotree_region` VALUES ('2647','315','镇安县','3','0','z','zhenanxian');

INSERT INTO `twotree_region` VALUES ('2648','315','柞水县','3','0','z','zuoshuixian');

INSERT INTO `twotree_region` VALUES ('2649','316','耀州区','3','0','y','yaozhouqu');

INSERT INTO `twotree_region` VALUES ('2650','316','王益区','3','0','w','wangyiqu');

INSERT INTO `twotree_region` VALUES ('2651','316','印台区','3','0','y','yintaiqu');

INSERT INTO `twotree_region` VALUES ('2652','316','宜君县','3','0','y','yijunxian');

INSERT INTO `twotree_region` VALUES ('2653','317','临渭区','3','0','l','linweiqu');

INSERT INTO `twotree_region` VALUES ('2654','317','韩城市','3','0','h','hanchengshi');

INSERT INTO `twotree_region` VALUES ('2655','317','华阴市','3','0','h','huayinshi');

INSERT INTO `twotree_region` VALUES ('2656','317','华县','3','0','h','huaxian');

INSERT INTO `twotree_region` VALUES ('2657','317','潼关县','3','0','g','guanxian');

INSERT INTO `twotree_region` VALUES ('2658','317','大荔县','3','0','d','dalixian');

INSERT INTO `twotree_region` VALUES ('2659','317','合阳县','3','0','h','heyangxian');

INSERT INTO `twotree_region` VALUES ('2660','317','澄城县','3','0','c','chengchengxian');

INSERT INTO `twotree_region` VALUES ('2661','317','蒲城县','3','0','p','puchengxian');

INSERT INTO `twotree_region` VALUES ('2662','317','白水县','3','0','b','baishuixian');

INSERT INTO `twotree_region` VALUES ('2663','317','富平县','3','0','f','fupingxian');

INSERT INTO `twotree_region` VALUES ('2664','318','秦都区','3','0','q','qinduqu');

INSERT INTO `twotree_region` VALUES ('2665','318','渭城区','3','0','w','weichengqu');

INSERT INTO `twotree_region` VALUES ('2666','318','杨陵区','3','0','y','yanglingqu');

INSERT INTO `twotree_region` VALUES ('2667','318','兴平市','3','0','x','xingpingshi');

INSERT INTO `twotree_region` VALUES ('2668','318','三原县','3','0','s','sanyuanxian');

INSERT INTO `twotree_region` VALUES ('2669','318','泾阳县','3','0','y','yangxian');

INSERT INTO `twotree_region` VALUES ('2670','318','乾县','3','0','q','qianxian');

INSERT INTO `twotree_region` VALUES ('2671','318','礼泉县','3','0','l','liquanxian');

INSERT INTO `twotree_region` VALUES ('2672','318','永寿县','3','0','y','yongshouxian');

INSERT INTO `twotree_region` VALUES ('2673','318','彬县','3','0','b','binxian');

INSERT INTO `twotree_region` VALUES ('2674','318','长武县','3','0','c','changwuxian');

INSERT INTO `twotree_region` VALUES ('2675','318','旬邑县','3','0','x','xunyixian');

INSERT INTO `twotree_region` VALUES ('2676','318','淳化县','3','0','c','chunhuaxian');

INSERT INTO `twotree_region` VALUES ('2677','318','武功县','3','0','w','wugongxian');

INSERT INTO `twotree_region` VALUES ('2678','319','吴起县','3','0','w','wuqixian');

INSERT INTO `twotree_region` VALUES ('2679','319','宝塔区','3','0','b','baotaqu');

INSERT INTO `twotree_region` VALUES ('2680','319','延长县','3','0','y','yanchangxian');

INSERT INTO `twotree_region` VALUES ('2681','319','延川县','3','0','y','yanchuanxian');

INSERT INTO `twotree_region` VALUES ('2682','319','子长县','3','0','z','zichangxian');

INSERT INTO `twotree_region` VALUES ('2683','319','安塞县','3','0','a','ansaixian');

INSERT INTO `twotree_region` VALUES ('2684','319','志丹县','3','0','z','zhidanxian');

INSERT INTO `twotree_region` VALUES ('2685','319','甘泉县','3','0','g','ganquanxian');

INSERT INTO `twotree_region` VALUES ('2686','319','富县','3','0','f','fuxian');

INSERT INTO `twotree_region` VALUES ('2687','319','洛川县','3','0','l','luochuanxian');

INSERT INTO `twotree_region` VALUES ('2688','319','宜川县','3','0','y','yichuanxian');

INSERT INTO `twotree_region` VALUES ('2689','319','黄龙县','3','0','h','huanglongxian');

INSERT INTO `twotree_region` VALUES ('2690','319','黄陵县','3','0','h','huanglingxian');

INSERT INTO `twotree_region` VALUES ('2691','320','榆阳区','3','0','y','yuyangqu');

INSERT INTO `twotree_region` VALUES ('2692','320','神木县','3','0','s','shenmuxian');

INSERT INTO `twotree_region` VALUES ('2693','320','府谷县','3','0','f','fuguxian');

INSERT INTO `twotree_region` VALUES ('2694','320','横山县','3','0','h','hengshanxian');

INSERT INTO `twotree_region` VALUES ('2695','320','靖边县','3','0','j','jingbianxian');

INSERT INTO `twotree_region` VALUES ('2696','320','定边县','3','0','d','dingbianxian');

INSERT INTO `twotree_region` VALUES ('2697','320','绥德县','3','0','s','suidexian');

INSERT INTO `twotree_region` VALUES ('2698','320','米脂县','3','0','m','mizhixian');

INSERT INTO `twotree_region` VALUES ('2699','320','佳县','3','0','j','jiaxian');

INSERT INTO `twotree_region` VALUES ('2700','320','吴堡县','3','0','w','wubaoxian');

INSERT INTO `twotree_region` VALUES ('2701','320','清涧县','3','0','q','qingjianxian');

INSERT INTO `twotree_region` VALUES ('2702','320','子洲县','3','0','z','zizhouxian');

INSERT INTO `twotree_region` VALUES ('2703','321','长宁区','3','0','c','changningqu');

INSERT INTO `twotree_region` VALUES ('2704','321','闸北区','3','0','z','zhabeiqu');

INSERT INTO `twotree_region` VALUES ('2705','321','闵行区','3','0','x','xingqu');

INSERT INTO `twotree_region` VALUES ('2706','321','徐汇区','3','0','x','xuhuiqu');

INSERT INTO `twotree_region` VALUES ('2707','321','浦东新区','3','0','p','pudongxinqu');

INSERT INTO `twotree_region` VALUES ('2708','321','杨浦区','3','0','y','yangpuqu');

INSERT INTO `twotree_region` VALUES ('2709','321','普陀区','3','0','p','putuoqu');

INSERT INTO `twotree_region` VALUES ('2710','321','静安区','3','0','j','jinganqu');

INSERT INTO `twotree_region` VALUES ('2711','321','卢湾区','3','0','l','luwanqu');

INSERT INTO `twotree_region` VALUES ('2712','321','虹口区','3','0','h','hongkouqu');

INSERT INTO `twotree_region` VALUES ('2713','321','黄浦区','3','0','h','huangpuqu');

INSERT INTO `twotree_region` VALUES ('2714','321','南汇区','3','0','n','nanhuiqu');

INSERT INTO `twotree_region` VALUES ('2715','321','松江区','3','0','s','songjiangqu');

INSERT INTO `twotree_region` VALUES ('2716','321','嘉定区','3','0','j','jiadingqu');

INSERT INTO `twotree_region` VALUES ('2717','321','宝山区','3','0','b','baoshanqu');

INSERT INTO `twotree_region` VALUES ('2718','321','青浦区','3','0','q','qingpuqu');

INSERT INTO `twotree_region` VALUES ('2719','321','金山区','3','0','j','jinshanqu');

INSERT INTO `twotree_region` VALUES ('2720','321','奉贤区','3','0','f','fengxianqu');

INSERT INTO `twotree_region` VALUES ('2721','321','崇明县','3','0','c','chongmingxian');

INSERT INTO `twotree_region` VALUES ('2722','322','青羊区','3','0','q','qingyangqu');

INSERT INTO `twotree_region` VALUES ('2723','322','锦江区','3','0','j','jinjiangqu');

INSERT INTO `twotree_region` VALUES ('2724','322','金牛区','3','0','j','jinniuqu');

INSERT INTO `twotree_region` VALUES ('2725','322','武侯区','3','0','w','wuhouqu');

INSERT INTO `twotree_region` VALUES ('2726','322','成华区','3','0','c','chenghuaqu');

INSERT INTO `twotree_region` VALUES ('2727','322','龙泉驿区','3','0','l','longquanqu');

INSERT INTO `twotree_region` VALUES ('2728','322','青白江区','3','0','q','qingbaijiangqu');

INSERT INTO `twotree_region` VALUES ('2729','322','新都区','3','0','x','xinduqu');

INSERT INTO `twotree_region` VALUES ('2730','322','温江区','3','0','w','wenjiangqu');

INSERT INTO `twotree_region` VALUES ('2731','322','高新区','3','0','g','gaoxinqu');

INSERT INTO `twotree_region` VALUES ('2732','322','高新西区','3','0','g','gaoxinxiqu');

INSERT INTO `twotree_region` VALUES ('2733','322','都江堰市','3','0','d','dujiangyanshi');

INSERT INTO `twotree_region` VALUES ('2734','322','彭州市','3','0','p','pengzhoushi');

INSERT INTO `twotree_region` VALUES ('2735','322','邛崃市','3','0','s','shi');

INSERT INTO `twotree_region` VALUES ('2736','322','崇州市','3','0','c','chongzhoushi');

INSERT INTO `twotree_region` VALUES ('2737','322','金堂县','3','0','j','jintangxian');

INSERT INTO `twotree_region` VALUES ('2738','322','双流县','3','0','s','shuangliuxian');

INSERT INTO `twotree_region` VALUES ('2739','322','郫县','3','0','x','xian');

INSERT INTO `twotree_region` VALUES ('2740','322','大邑县','3','0','d','dayixian');

INSERT INTO `twotree_region` VALUES ('2741','322','蒲江县','3','0','p','pujiangxian');

INSERT INTO `twotree_region` VALUES ('2742','322','新津县','3','0','x','xinjinxian');

INSERT INTO `twotree_region` VALUES ('2743','322','都江堰市','3','0','d','dujiangyanshi');

INSERT INTO `twotree_region` VALUES ('2744','322','彭州市','3','0','p','pengzhoushi');

INSERT INTO `twotree_region` VALUES ('2745','322','邛崃市','3','0','s','shi');

INSERT INTO `twotree_region` VALUES ('2746','322','崇州市','3','0','c','chongzhoushi');

INSERT INTO `twotree_region` VALUES ('2747','322','金堂县','3','0','j','jintangxian');

INSERT INTO `twotree_region` VALUES ('2748','322','双流县','3','0','s','shuangliuxian');

INSERT INTO `twotree_region` VALUES ('2749','322','郫县','3','0','x','xian');

INSERT INTO `twotree_region` VALUES ('2750','322','大邑县','3','0','d','dayixian');

INSERT INTO `twotree_region` VALUES ('2751','322','蒲江县','3','0','p','pujiangxian');

INSERT INTO `twotree_region` VALUES ('2752','322','新津县','3','0','x','xinjinxian');

INSERT INTO `twotree_region` VALUES ('2753','323','涪城区','3','0','f','fuchengqu');

INSERT INTO `twotree_region` VALUES ('2754','323','游仙区','3','0','y','youxianqu');

INSERT INTO `twotree_region` VALUES ('2755','323','江油市','3','0','j','jiangyoushi');

INSERT INTO `twotree_region` VALUES ('2756','323','盐亭县','3','0','y','yantingxian');

INSERT INTO `twotree_region` VALUES ('2757','323','三台县','3','0','s','santaixian');

INSERT INTO `twotree_region` VALUES ('2758','323','平武县','3','0','p','pingwuxian');

INSERT INTO `twotree_region` VALUES ('2759','323','安县','3','0','a','anxian');

INSERT INTO `twotree_region` VALUES ('2760','323','梓潼县','3','0','x','xian');

INSERT INTO `twotree_region` VALUES ('2761','323','北川县','3','0','b','beichuanxian');

INSERT INTO `twotree_region` VALUES ('2762','324','马尔康县','3','0','m','maerkangxian');

INSERT INTO `twotree_region` VALUES ('2763','324','汶川县','3','0','c','chuanxian');

INSERT INTO `twotree_region` VALUES ('2764','324','理县','3','0','l','lixian');

INSERT INTO `twotree_region` VALUES ('2765','324','茂县','3','0','m','maoxian');

INSERT INTO `twotree_region` VALUES ('2766','324','松潘县','3','0','s','songpanxian');

INSERT INTO `twotree_region` VALUES ('2767','324','九寨沟县','3','0','j','jiuzhaigouxian');

INSERT INTO `twotree_region` VALUES ('2768','324','金川县','3','0','j','jinchuanxian');

INSERT INTO `twotree_region` VALUES ('2769','324','小金县','3','0','x','xiaojinxian');

INSERT INTO `twotree_region` VALUES ('2770','324','黑水县','3','0','h','heishuixian');

INSERT INTO `twotree_region` VALUES ('2771','324','壤塘县','3','0','r','rangtangxian');

INSERT INTO `twotree_region` VALUES ('2772','324','阿坝县','3','0','a','abaxian');

INSERT INTO `twotree_region` VALUES ('2773','324','若尔盖县','3','0','r','ruoergaixian');

INSERT INTO `twotree_region` VALUES ('2774','324','红原县','3','0','h','hongyuanxian');

INSERT INTO `twotree_region` VALUES ('2775','325','巴州区','3','0','b','bazhouqu');

INSERT INTO `twotree_region` VALUES ('2776','325','通江县','3','0','t','tongjiangxian');

INSERT INTO `twotree_region` VALUES ('2777','325','南江县','3','0','n','nanjiangxian');

INSERT INTO `twotree_region` VALUES ('2778','325','平昌县','3','0','p','pingchangxian');

INSERT INTO `twotree_region` VALUES ('2779','326','通川区','3','0','t','tongchuanqu');

INSERT INTO `twotree_region` VALUES ('2780','326','万源市','3','0','w','wanyuanshi');

INSERT INTO `twotree_region` VALUES ('2781','326','达县','3','0','d','daxian');

INSERT INTO `twotree_region` VALUES ('2782','326','宣汉县','3','0','x','xuanhanxian');

INSERT INTO `twotree_region` VALUES ('2783','326','开江县','3','0','k','kaijiangxian');

INSERT INTO `twotree_region` VALUES ('2784','326','大竹县','3','0','d','dazhuxian');

INSERT INTO `twotree_region` VALUES ('2785','326','渠县','3','0','q','quxian');

INSERT INTO `twotree_region` VALUES ('2786','327','旌阳区','3','0','y','yangqu');

INSERT INTO `twotree_region` VALUES ('2787','327','广汉市','3','0','g','guanghanshi');

INSERT INTO `twotree_region` VALUES ('2788','327','什邡市','3','0','s','shishi');

INSERT INTO `twotree_region` VALUES ('2789','327','绵竹市','3','0','m','mianzhushi');

INSERT INTO `twotree_region` VALUES ('2790','327','罗江县','3','0','l','luojiangxian');

INSERT INTO `twotree_region` VALUES ('2791','327','中江县','3','0','z','zhongjiangxian');

INSERT INTO `twotree_region` VALUES ('2792','328','康定县','3','0','k','kangdingxian');

INSERT INTO `twotree_region` VALUES ('2793','328','丹巴县','3','0','d','danbaxian');

INSERT INTO `twotree_region` VALUES ('2794','328','泸定县','3','0','d','dingxian');

INSERT INTO `twotree_region` VALUES ('2795','328','炉霍县','3','0','l','luhuoxian');

INSERT INTO `twotree_region` VALUES ('2796','328','九龙县','3','0','j','jiulongxian');

INSERT INTO `twotree_region` VALUES ('2797','328','甘孜县','3','0','g','ganzixian');

INSERT INTO `twotree_region` VALUES ('2798','328','雅江县','3','0','y','yajiangxian');

INSERT INTO `twotree_region` VALUES ('2799','328','新龙县','3','0','x','xinlongxian');

INSERT INTO `twotree_region` VALUES ('2800','328','道孚县','3','0','d','daoxian');

INSERT INTO `twotree_region` VALUES ('2801','328','白玉县','3','0','b','baiyuxian');

INSERT INTO `twotree_region` VALUES ('2802','328','理塘县','3','0','l','litangxian');

INSERT INTO `twotree_region` VALUES ('2803','328','德格县','3','0','d','degexian');

INSERT INTO `twotree_region` VALUES ('2804','328','乡城县','3','0','x','xiangchengxian');

INSERT INTO `twotree_region` VALUES ('2805','328','石渠县','3','0','s','shiquxian');

INSERT INTO `twotree_region` VALUES ('2806','328','稻城县','3','0','d','daochengxian');

INSERT INTO `twotree_region` VALUES ('2807','328','色达县','3','0','s','sedaxian');

INSERT INTO `twotree_region` VALUES ('2808','328','巴塘县','3','0','b','batangxian');

INSERT INTO `twotree_region` VALUES ('2809','328','得荣县','3','0','d','derongxian');

INSERT INTO `twotree_region` VALUES ('2810','329','广安区','3','0','g','guanganqu');

INSERT INTO `twotree_region` VALUES ('2811','329','华蓥市','3','0','h','huashi');

INSERT INTO `twotree_region` VALUES ('2812','329','岳池县','3','0','y','yuechixian');

INSERT INTO `twotree_region` VALUES ('2813','329','武胜县','3','0','w','wushengxian');

INSERT INTO `twotree_region` VALUES ('2814','329','邻水县','3','0','l','linshuixian');

INSERT INTO `twotree_region` VALUES ('2815','330','利州区','3','0','l','lizhouqu');

INSERT INTO `twotree_region` VALUES ('2816','330','元坝区','3','0','y','yuanbaqu');

INSERT INTO `twotree_region` VALUES ('2817','330','朝天区','3','0','c','chaotianqu');

INSERT INTO `twotree_region` VALUES ('2818','330','旺苍县','3','0','w','wangcangxian');

INSERT INTO `twotree_region` VALUES ('2819','330','青川县','3','0','q','qingchuanxian');

INSERT INTO `twotree_region` VALUES ('2820','330','剑阁县','3','0','j','jiangexian');

INSERT INTO `twotree_region` VALUES ('2821','330','苍溪县','3','0','c','cangxixian');

INSERT INTO `twotree_region` VALUES ('2822','331','峨眉山市','3','0','e','emeishanshi');

INSERT INTO `twotree_region` VALUES ('2823','331','乐山市','3','0','l','leshanshi');

INSERT INTO `twotree_region` VALUES ('2824','331','犍为县','3','0','w','weixian');

INSERT INTO `twotree_region` VALUES ('2825','331','井研县','3','0','j','jingyanxian');

INSERT INTO `twotree_region` VALUES ('2826','331','夹江县','3','0','j','jiajiangxian');

INSERT INTO `twotree_region` VALUES ('2827','331','沐川县','3','0','c','chuanxian');

INSERT INTO `twotree_region` VALUES ('2828','331','峨边','3','0','e','ebian');

INSERT INTO `twotree_region` VALUES ('2829','331','马边','3','0','m','mabian');

INSERT INTO `twotree_region` VALUES ('2830','332','西昌市','3','0','x','xichangshi');

INSERT INTO `twotree_region` VALUES ('2831','332','盐源县','3','0','y','yanyuanxian');

INSERT INTO `twotree_region` VALUES ('2832','332','德昌县','3','0','d','dechangxian');

INSERT INTO `twotree_region` VALUES ('2833','332','会理县','3','0','h','huilixian');

INSERT INTO `twotree_region` VALUES ('2834','332','会东县','3','0','h','huidongxian');

INSERT INTO `twotree_region` VALUES ('2835','332','宁南县','3','0','n','ningnanxian');

INSERT INTO `twotree_region` VALUES ('2836','332','普格县','3','0','p','pugexian');

INSERT INTO `twotree_region` VALUES ('2837','332','布拖县','3','0','b','butuoxian');

INSERT INTO `twotree_region` VALUES ('2838','332','金阳县','3','0','j','jinyangxian');

INSERT INTO `twotree_region` VALUES ('2839','332','昭觉县','3','0','z','zhaojuexian');

INSERT INTO `twotree_region` VALUES ('2840','332','喜德县','3','0','x','xidexian');

INSERT INTO `twotree_region` VALUES ('2841','332','冕宁县','3','0','m','mianningxian');

INSERT INTO `twotree_region` VALUES ('2842','332','越西县','3','0','y','yuexixian');

INSERT INTO `twotree_region` VALUES ('2843','332','甘洛县','3','0','g','ganluoxian');

INSERT INTO `twotree_region` VALUES ('2844','332','美姑县','3','0','m','meiguxian');

INSERT INTO `twotree_region` VALUES ('2845','332','雷波县','3','0','l','leiboxian');

INSERT INTO `twotree_region` VALUES ('2846','332','木里','3','0','m','muli');

INSERT INTO `twotree_region` VALUES ('2847','333','东坡区','3','0','d','dongpoqu');

INSERT INTO `twotree_region` VALUES ('2848','333','仁寿县','3','0','r','renshouxian');

INSERT INTO `twotree_region` VALUES ('2849','333','彭山县','3','0','p','pengshanxian');

INSERT INTO `twotree_region` VALUES ('2850','333','洪雅县','3','0','h','hongyaxian');

INSERT INTO `twotree_region` VALUES ('2851','333','丹棱县','3','0','d','danlengxian');

INSERT INTO `twotree_region` VALUES ('2852','333','青神县','3','0','q','qingshenxian');

INSERT INTO `twotree_region` VALUES ('2853','334','阆中市','3','0','z','zhongshi');

INSERT INTO `twotree_region` VALUES ('2854','334','南部县','3','0','n','nanbuxian');

INSERT INTO `twotree_region` VALUES ('2855','334','营山县','3','0','y','yingshanxian');

INSERT INTO `twotree_region` VALUES ('2856','334','蓬安县','3','0','p','penganxian');

INSERT INTO `twotree_region` VALUES ('2857','334','仪陇县','3','0','y','yilongxian');

INSERT INTO `twotree_region` VALUES ('2858','334','顺庆区','3','0','s','shunqingqu');

INSERT INTO `twotree_region` VALUES ('2859','334','高坪区','3','0','g','gaopingqu');

INSERT INTO `twotree_region` VALUES ('2860','334','嘉陵区','3','0','j','jialingqu');

INSERT INTO `twotree_region` VALUES ('2861','334','西充县','3','0','x','xichongxian');

INSERT INTO `twotree_region` VALUES ('2862','335','市中区','3','0','s','shizhongqu');

INSERT INTO `twotree_region` VALUES ('2863','335','东兴区','3','0','d','dongxingqu');

INSERT INTO `twotree_region` VALUES ('2864','335','威远县','3','0','w','weiyuanxian');

INSERT INTO `twotree_region` VALUES ('2865','335','资中县','3','0','z','zizhongxian');

INSERT INTO `twotree_region` VALUES ('2866','335','隆昌县','3','0','l','longchangxian');

INSERT INTO `twotree_region` VALUES ('2867','336','东  区','3','0','d','dongqu');

INSERT INTO `twotree_region` VALUES ('2868','336','西  区','3','0','x','xiqu');

INSERT INTO `twotree_region` VALUES ('2869','336','仁和区','3','0','r','renhequ');

INSERT INTO `twotree_region` VALUES ('2870','336','米易县','3','0','m','miyixian');

INSERT INTO `twotree_region` VALUES ('2871','336','盐边县','3','0','y','yanbianxian');

INSERT INTO `twotree_region` VALUES ('2872','337','船山区','3','0','c','chuanshanqu');

INSERT INTO `twotree_region` VALUES ('2873','337','安居区','3','0','a','anjuqu');

INSERT INTO `twotree_region` VALUES ('2874','337','蓬溪县','3','0','p','pengxixian');

INSERT INTO `twotree_region` VALUES ('2875','337','射洪县','3','0','s','shehongxian');

INSERT INTO `twotree_region` VALUES ('2876','337','大英县','3','0','d','dayingxian');

INSERT INTO `twotree_region` VALUES ('2877','338','雨城区','3','0','y','yuchengqu');

INSERT INTO `twotree_region` VALUES ('2878','338','名山县','3','0','m','mingshanxian');

INSERT INTO `twotree_region` VALUES ('2879','338','荥经县','3','0','j','jingxian');

INSERT INTO `twotree_region` VALUES ('2880','338','汉源县','3','0','h','hanyuanxian');

INSERT INTO `twotree_region` VALUES ('2881','338','石棉县','3','0','s','shimianxian');

INSERT INTO `twotree_region` VALUES ('2882','338','天全县','3','0','t','tianquanxian');

INSERT INTO `twotree_region` VALUES ('2883','338','芦山县','3','0','l','lushanxian');

INSERT INTO `twotree_region` VALUES ('2884','338','宝兴县','3','0','b','baoxingxian');

INSERT INTO `twotree_region` VALUES ('2885','339','翠屏区','3','0','c','cuipingqu');

INSERT INTO `twotree_region` VALUES ('2886','339','宜宾县','3','0','y','yibinxian');

INSERT INTO `twotree_region` VALUES ('2887','339','南溪县','3','0','n','nanxixian');

INSERT INTO `twotree_region` VALUES ('2888','339','江安县','3','0','j','jianganxian');

INSERT INTO `twotree_region` VALUES ('2889','339','长宁县','3','0','c','changningxian');

INSERT INTO `twotree_region` VALUES ('2890','339','高县','3','0','g','gaoxian');

INSERT INTO `twotree_region` VALUES ('2891','339','珙县','3','0','x','xian');

INSERT INTO `twotree_region` VALUES ('2892','339','筠连县','3','0','l','lianxian');

INSERT INTO `twotree_region` VALUES ('2893','339','兴文县','3','0','x','xingwenxian');

INSERT INTO `twotree_region` VALUES ('2894','339','屏山县','3','0','p','pingshanxian');

INSERT INTO `twotree_region` VALUES ('2895','340','雁江区','3','0','y','yanjiangqu');

INSERT INTO `twotree_region` VALUES ('2896','340','简阳市','3','0','j','jianyangshi');

INSERT INTO `twotree_region` VALUES ('2897','340','安岳县','3','0','a','anyuexian');

INSERT INTO `twotree_region` VALUES ('2898','340','乐至县','3','0','l','lezhixian');

INSERT INTO `twotree_region` VALUES ('2899','341','大安区','3','0','d','daanqu');

INSERT INTO `twotree_region` VALUES ('2900','341','自流井区','3','0','z','ziliujingqu');

INSERT INTO `twotree_region` VALUES ('2901','341','贡井区','3','0','g','gongjingqu');

INSERT INTO `twotree_region` VALUES ('2902','341','沿滩区','3','0','y','yantanqu');

INSERT INTO `twotree_region` VALUES ('2903','341','荣县','3','0','r','rongxian');

INSERT INTO `twotree_region` VALUES ('2904','341','富顺县','3','0','f','fushunxian');

INSERT INTO `twotree_region` VALUES ('2905','342','江阳区','3','0','j','jiangyangqu');

INSERT INTO `twotree_region` VALUES ('2906','342','纳溪区','3','0','n','naxiqu');

INSERT INTO `twotree_region` VALUES ('2907','342','龙马潭区','3','0','l','longmatanqu');

INSERT INTO `twotree_region` VALUES ('2908','342','泸县','3','0','x','xian');

INSERT INTO `twotree_region` VALUES ('2909','342','合江县','3','0','h','hejiangxian');

INSERT INTO `twotree_region` VALUES ('2910','342','叙永县','3','0','x','xuyongxian');

INSERT INTO `twotree_region` VALUES ('2911','342','古蔺县','3','0','g','guxian');

INSERT INTO `twotree_region` VALUES ('2912','343','和平区','3','0','h','hepingqu');

INSERT INTO `twotree_region` VALUES ('2913','343','河西区','3','0','h','hexiqu');

INSERT INTO `twotree_region` VALUES ('2914','343','南开区','3','0','n','nankaiqu');

INSERT INTO `twotree_region` VALUES ('2915','343','河北区','3','0','h','hebeiqu');

INSERT INTO `twotree_region` VALUES ('2916','343','河东区','3','0','h','hedongqu');

INSERT INTO `twotree_region` VALUES ('2917','343','红桥区','3','0','h','hongqiaoqu');

INSERT INTO `twotree_region` VALUES ('2918','343','东丽区','3','0','d','dongliqu');

INSERT INTO `twotree_region` VALUES ('2919','343','津南区','3','0','j','jinnanqu');

INSERT INTO `twotree_region` VALUES ('2920','343','西青区','3','0','x','xiqingqu');

INSERT INTO `twotree_region` VALUES ('2921','343','北辰区','3','0','b','beichenqu');

INSERT INTO `twotree_region` VALUES ('2922','343','塘沽区','3','0','t','tangguqu');

INSERT INTO `twotree_region` VALUES ('2923','343','汉沽区','3','0','h','hanguqu');

INSERT INTO `twotree_region` VALUES ('2924','343','大港区','3','0','d','dagangqu');

INSERT INTO `twotree_region` VALUES ('2925','343','武清区','3','0','w','wuqingqu');

INSERT INTO `twotree_region` VALUES ('2926','343','宝坻区','3','0','b','baoqu');

INSERT INTO `twotree_region` VALUES ('2927','343','经济开发区','3','0','j','jingjikaifaqu');

INSERT INTO `twotree_region` VALUES ('2928','343','宁河县','3','0','n','ninghexian');

INSERT INTO `twotree_region` VALUES ('2929','343','静海县','3','0','j','jinghaixian');

INSERT INTO `twotree_region` VALUES ('2930','343','蓟县','3','0','j','jixian');

INSERT INTO `twotree_region` VALUES ('2931','344','城关区','3','0','c','chengguanqu');

INSERT INTO `twotree_region` VALUES ('2932','344','林周县','3','0','l','linzhouxian');

INSERT INTO `twotree_region` VALUES ('2933','344','当雄县','3','0','d','dangxiongxian');

INSERT INTO `twotree_region` VALUES ('2934','344','尼木县','3','0','n','nimuxian');

INSERT INTO `twotree_region` VALUES ('2935','344','曲水县','3','0','q','qushuixian');

INSERT INTO `twotree_region` VALUES ('2936','344','堆龙德庆县','3','0','d','duilongdeqingxian');

INSERT INTO `twotree_region` VALUES ('2937','344','达孜县','3','0','d','dazixian');

INSERT INTO `twotree_region` VALUES ('2938','344','墨竹工卡县','3','0','m','mozhugongkaxian');

INSERT INTO `twotree_region` VALUES ('2939','345','噶尔县','3','0','g','gaerxian');

INSERT INTO `twotree_region` VALUES ('2940','345','普兰县','3','0','p','pulanxian');

INSERT INTO `twotree_region` VALUES ('2941','345','札达县','3','0','z','zhadaxian');

INSERT INTO `twotree_region` VALUES ('2942','345','日土县','3','0','r','rituxian');

INSERT INTO `twotree_region` VALUES ('2943','345','革吉县','3','0','g','gejixian');

INSERT INTO `twotree_region` VALUES ('2944','345','改则县','3','0','g','gaizexian');

INSERT INTO `twotree_region` VALUES ('2945','345','措勤县','3','0','c','cuoqinxian');

INSERT INTO `twotree_region` VALUES ('2946','346','昌都县','3','0','c','changduxian');

INSERT INTO `twotree_region` VALUES ('2947','346','江达县','3','0','j','jiangdaxian');

INSERT INTO `twotree_region` VALUES ('2948','346','贡觉县','3','0','g','gongjuexian');

INSERT INTO `twotree_region` VALUES ('2949','346','类乌齐县','3','0','l','leiwuqixian');

INSERT INTO `twotree_region` VALUES ('2950','346','丁青县','3','0','d','dingqingxian');

INSERT INTO `twotree_region` VALUES ('2951','346','察雅县','3','0','c','chayaxian');

INSERT INTO `twotree_region` VALUES ('2952','346','八宿县','3','0','b','basuxian');

INSERT INTO `twotree_region` VALUES ('2953','346','左贡县','3','0','z','zuogongxian');

INSERT INTO `twotree_region` VALUES ('2954','346','芒康县','3','0','m','mangkangxian');

INSERT INTO `twotree_region` VALUES ('2955','346','洛隆县','3','0','l','luolongxian');

INSERT INTO `twotree_region` VALUES ('2956','346','边坝县','3','0','b','bianbaxian');

INSERT INTO `twotree_region` VALUES ('2957','347','林芝县','3','0','l','linzhixian');

INSERT INTO `twotree_region` VALUES ('2958','347','工布江达县','3','0','g','gongbujiangdaxian');

INSERT INTO `twotree_region` VALUES ('2959','347','米林县','3','0','m','milinxian');

INSERT INTO `twotree_region` VALUES ('2960','347','墨脱县','3','0','m','motuoxian');

INSERT INTO `twotree_region` VALUES ('2961','347','波密县','3','0','b','bomixian');

INSERT INTO `twotree_region` VALUES ('2962','347','察隅县','3','0','c','chayuxian');

INSERT INTO `twotree_region` VALUES ('2963','347','朗县','3','0','l','langxian');

INSERT INTO `twotree_region` VALUES ('2964','348','那曲县','3','0','n','naquxian');

INSERT INTO `twotree_region` VALUES ('2965','348','嘉黎县','3','0','j','jialixian');

INSERT INTO `twotree_region` VALUES ('2966','348','比如县','3','0','b','biruxian');

INSERT INTO `twotree_region` VALUES ('2967','348','聂荣县','3','0','n','nierongxian');

INSERT INTO `twotree_region` VALUES ('2968','348','安多县','3','0','a','anduoxian');

INSERT INTO `twotree_region` VALUES ('2969','348','申扎县','3','0','s','shenzhaxian');

INSERT INTO `twotree_region` VALUES ('2970','348','索县','3','0','s','suoxian');

INSERT INTO `twotree_region` VALUES ('2971','348','班戈县','3','0','b','bangexian');

INSERT INTO `twotree_region` VALUES ('2972','348','巴青县','3','0','b','baqingxian');

INSERT INTO `twotree_region` VALUES ('2973','348','尼玛县','3','0','n','nimaxian');

INSERT INTO `twotree_region` VALUES ('2974','349','日喀则市','3','0','r','rikazeshi');

INSERT INTO `twotree_region` VALUES ('2975','349','南木林县','3','0','n','nanmulinxian');

INSERT INTO `twotree_region` VALUES ('2976','349','江孜县','3','0','j','jiangzixian');

INSERT INTO `twotree_region` VALUES ('2977','349','定日县','3','0','d','dingrixian');

INSERT INTO `twotree_region` VALUES ('2978','349','萨迦县','3','0','s','saxian');

INSERT INTO `twotree_region` VALUES ('2979','349','拉孜县','3','0','l','lazixian');

INSERT INTO `twotree_region` VALUES ('2980','349','昂仁县','3','0','a','angrenxian');

INSERT INTO `twotree_region` VALUES ('2981','349','谢通门县','3','0','x','xietongmenxian');

INSERT INTO `twotree_region` VALUES ('2982','349','白朗县','3','0','b','bailangxian');

INSERT INTO `twotree_region` VALUES ('2983','349','仁布县','3','0','r','renbuxian');

INSERT INTO `twotree_region` VALUES ('2984','349','康马县','3','0','k','kangmaxian');

INSERT INTO `twotree_region` VALUES ('2985','349','定结县','3','0','d','dingjiexian');

INSERT INTO `twotree_region` VALUES ('2986','349','仲巴县','3','0','z','zhongbaxian');

INSERT INTO `twotree_region` VALUES ('2987','349','亚东县','3','0','y','yadongxian');

INSERT INTO `twotree_region` VALUES ('2988','349','吉隆县','3','0','j','jilongxian');

INSERT INTO `twotree_region` VALUES ('2989','349','聂拉木县','3','0','n','nielamuxian');

INSERT INTO `twotree_region` VALUES ('2990','349','萨嘎县','3','0','s','sagaxian');

INSERT INTO `twotree_region` VALUES ('2991','349','岗巴县','3','0','g','gangbaxian');

INSERT INTO `twotree_region` VALUES ('2992','350','乃东县','3','0','n','naidongxian');

INSERT INTO `twotree_region` VALUES ('2993','350','扎囊县','3','0','z','zhanangxian');

INSERT INTO `twotree_region` VALUES ('2994','350','贡嘎县','3','0','g','gonggaxian');

INSERT INTO `twotree_region` VALUES ('2995','350','桑日县','3','0','s','sangrixian');

INSERT INTO `twotree_region` VALUES ('2996','350','琼结县','3','0','q','qiongjiexian');

INSERT INTO `twotree_region` VALUES ('2997','350','曲松县','3','0','q','qusongxian');

INSERT INTO `twotree_region` VALUES ('2998','350','措美县','3','0','c','cuomeixian');

INSERT INTO `twotree_region` VALUES ('2999','350','洛扎县','3','0','l','luozhaxian');

INSERT INTO `twotree_region` VALUES ('3000','350','加查县','3','0','j','jiachaxian');

INSERT INTO `twotree_region` VALUES ('3001','350','隆子县','3','0','l','longzixian');

INSERT INTO `twotree_region` VALUES ('3002','350','错那县','3','0','c','cuonaxian');

INSERT INTO `twotree_region` VALUES ('3003','350','浪卡子县','3','0','l','langkazixian');

INSERT INTO `twotree_region` VALUES ('3004','351','天山区','3','0','t','tianshanqu');

INSERT INTO `twotree_region` VALUES ('3005','351','沙依巴克区','3','0','s','shayibakequ');

INSERT INTO `twotree_region` VALUES ('3006','351','新市区','3','0','x','xinshiqu');

INSERT INTO `twotree_region` VALUES ('3007','351','水磨沟区','3','0','s','shuimogouqu');

INSERT INTO `twotree_region` VALUES ('3008','351','头屯河区','3','0','t','toutunhequ');

INSERT INTO `twotree_region` VALUES ('3009','351','达坂城区','3','0','d','dachengqu');

INSERT INTO `twotree_region` VALUES ('3010','351','米东区','3','0','m','midongqu');

INSERT INTO `twotree_region` VALUES ('3011','351','乌鲁木齐县','3','0','w','wulumuqixian');

INSERT INTO `twotree_region` VALUES ('3012','352','阿克苏市','3','0','a','akesushi');

INSERT INTO `twotree_region` VALUES ('3013','352','温宿县','3','0','w','wensuxian');

INSERT INTO `twotree_region` VALUES ('3014','352','库车县','3','0','k','kuchexian');

INSERT INTO `twotree_region` VALUES ('3015','352','沙雅县','3','0','s','shayaxian');

INSERT INTO `twotree_region` VALUES ('3016','352','新和县','3','0','x','xinhexian');

INSERT INTO `twotree_region` VALUES ('3017','352','拜城县','3','0','b','baichengxian');

INSERT INTO `twotree_region` VALUES ('3018','352','乌什县','3','0','w','wushixian');

INSERT INTO `twotree_region` VALUES ('3019','352','阿瓦提县','3','0','a','awatixian');

INSERT INTO `twotree_region` VALUES ('3020','352','柯坪县','3','0','k','kepingxian');

INSERT INTO `twotree_region` VALUES ('3021','353','阿拉尔市','3','0','a','alaershi');

INSERT INTO `twotree_region` VALUES ('3022','354','库尔勒市','3','0','k','kuerleshi');

INSERT INTO `twotree_region` VALUES ('3023','354','轮台县','3','0','l','luntaixian');

INSERT INTO `twotree_region` VALUES ('3024','354','尉犁县','3','0','w','weilixian');

INSERT INTO `twotree_region` VALUES ('3025','354','若羌县','3','0','r','ruoqiangxian');

INSERT INTO `twotree_region` VALUES ('3026','354','且末县','3','0','q','qiemoxian');

INSERT INTO `twotree_region` VALUES ('3027','354','焉耆','3','0','y','yan');

INSERT INTO `twotree_region` VALUES ('3028','354','和静县','3','0','h','hejingxian');

INSERT INTO `twotree_region` VALUES ('3029','354','和硕县','3','0','h','heshuoxian');

INSERT INTO `twotree_region` VALUES ('3030','354','博湖县','3','0','b','bohuxian');

INSERT INTO `twotree_region` VALUES ('3031','355','博乐市','3','0','b','boleshi');

INSERT INTO `twotree_region` VALUES ('3032','355','精河县','3','0','j','jinghexian');

INSERT INTO `twotree_region` VALUES ('3033','355','温泉县','3','0','w','wenquanxian');

INSERT INTO `twotree_region` VALUES ('3034','356','呼图壁县','3','0','h','hutubixian');

INSERT INTO `twotree_region` VALUES ('3035','356','米泉市','3','0','m','miquanshi');

INSERT INTO `twotree_region` VALUES ('3036','356','昌吉市','3','0','c','changjishi');

INSERT INTO `twotree_region` VALUES ('3037','356','阜康市','3','0','f','fukangshi');

INSERT INTO `twotree_region` VALUES ('3038','356','玛纳斯县','3','0','m','manasixian');

INSERT INTO `twotree_region` VALUES ('3039','356','奇台县','3','0','q','qitaixian');

INSERT INTO `twotree_region` VALUES ('3040','356','吉木萨尔县','3','0','j','jimusaerxian');

INSERT INTO `twotree_region` VALUES ('3041','356','木垒','3','0','m','mulei');

INSERT INTO `twotree_region` VALUES ('3042','357','哈密市','3','0','h','hamishi');

INSERT INTO `twotree_region` VALUES ('3043','357','伊吾县','3','0','y','yiwuxian');

INSERT INTO `twotree_region` VALUES ('3044','357','巴里坤','3','0','b','balikun');

INSERT INTO `twotree_region` VALUES ('3045','358','和田市','3','0','h','hetianshi');

INSERT INTO `twotree_region` VALUES ('3046','358','和田县','3','0','h','hetianxian');

INSERT INTO `twotree_region` VALUES ('3047','358','墨玉县','3','0','m','moyuxian');

INSERT INTO `twotree_region` VALUES ('3048','358','皮山县','3','0','p','pishanxian');

INSERT INTO `twotree_region` VALUES ('3049','358','洛浦县','3','0','l','luopuxian');

INSERT INTO `twotree_region` VALUES ('3050','358','策勒县','3','0','c','celexian');

INSERT INTO `twotree_region` VALUES ('3051','358','于田县','3','0','y','yutianxian');

INSERT INTO `twotree_region` VALUES ('3052','358','民丰县','3','0','m','minfengxian');

INSERT INTO `twotree_region` VALUES ('3053','359','喀什市','3','0','k','kashishi');

INSERT INTO `twotree_region` VALUES ('3054','359','疏附县','3','0','s','shufuxian');

INSERT INTO `twotree_region` VALUES ('3055','359','疏勒县','3','0','s','shulexian');

INSERT INTO `twotree_region` VALUES ('3056','359','英吉沙县','3','0','y','yingjishaxian');

INSERT INTO `twotree_region` VALUES ('3057','359','泽普县','3','0','z','zepuxian');

INSERT INTO `twotree_region` VALUES ('3058','359','莎车县','3','0','s','shachexian');

INSERT INTO `twotree_region` VALUES ('3059','359','叶城县','3','0','y','yechengxian');

INSERT INTO `twotree_region` VALUES ('3060','359','麦盖提县','3','0','m','maigaitixian');

INSERT INTO `twotree_region` VALUES ('3061','359','岳普湖县','3','0','y','yuepuhuxian');

INSERT INTO `twotree_region` VALUES ('3062','359','伽师县','3','0','s','shixian');

INSERT INTO `twotree_region` VALUES ('3063','359','巴楚县','3','0','b','bachuxian');

INSERT INTO `twotree_region` VALUES ('3064','359','塔什库尔干','3','0','t','tashikuergan');

INSERT INTO `twotree_region` VALUES ('3065','360','克拉玛依市','3','0','k','kelamayishi');

INSERT INTO `twotree_region` VALUES ('3066','361','阿图什市','3','0','a','atushishi');

INSERT INTO `twotree_region` VALUES ('3067','361','阿克陶县','3','0','a','aketaoxian');

INSERT INTO `twotree_region` VALUES ('3068','361','阿合奇县','3','0','a','aheqixian');

INSERT INTO `twotree_region` VALUES ('3069','361','乌恰县','3','0','w','wuqiaxian');

INSERT INTO `twotree_region` VALUES ('3070','362','石河子市','3','0','s','shihezishi');

INSERT INTO `twotree_region` VALUES ('3071','363','图木舒克市','3','0','t','tumushukeshi');

INSERT INTO `twotree_region` VALUES ('3072','364','吐鲁番市','3','0','t','tulufanshi');

INSERT INTO `twotree_region` VALUES ('3073','364','鄯善县','3','0','s','shanxian');

INSERT INTO `twotree_region` VALUES ('3074','364','托克逊县','3','0','t','tuokexunxian');

INSERT INTO `twotree_region` VALUES ('3075','365','五家渠市','3','0','w','wujiaqushi');

INSERT INTO `twotree_region` VALUES ('3076','366','阿勒泰市','3','0','a','aletaishi');

INSERT INTO `twotree_region` VALUES ('3077','366','布克赛尔','3','0','b','bukesaier');

INSERT INTO `twotree_region` VALUES ('3078','366','伊宁市','3','0','y','yiningshi');

INSERT INTO `twotree_region` VALUES ('3079','366','布尔津县','3','0','b','buerjinxian');

INSERT INTO `twotree_region` VALUES ('3080','366','奎屯市','3','0','k','kuitunshi');

INSERT INTO `twotree_region` VALUES ('3081','366','乌苏市','3','0','w','wusushi');

INSERT INTO `twotree_region` VALUES ('3082','366','额敏县','3','0','e','eminxian');

INSERT INTO `twotree_region` VALUES ('3083','366','富蕴县','3','0','f','fuyunxian');

INSERT INTO `twotree_region` VALUES ('3084','366','伊宁县','3','0','y','yiningxian');

INSERT INTO `twotree_region` VALUES ('3085','366','福海县','3','0','f','fuhaixian');

INSERT INTO `twotree_region` VALUES ('3086','366','霍城县','3','0','h','huochengxian');

INSERT INTO `twotree_region` VALUES ('3087','366','沙湾县','3','0','s','shawanxian');

INSERT INTO `twotree_region` VALUES ('3088','366','巩留县','3','0','g','gongliuxian');

INSERT INTO `twotree_region` VALUES ('3089','366','哈巴河县','3','0','h','habahexian');

INSERT INTO `twotree_region` VALUES ('3090','366','托里县','3','0','t','tuolixian');

INSERT INTO `twotree_region` VALUES ('3091','366','青河县','3','0','q','qinghexian');

INSERT INTO `twotree_region` VALUES ('3092','366','新源县','3','0','x','xinyuanxian');

INSERT INTO `twotree_region` VALUES ('3093','366','裕民县','3','0','y','yuminxian');

INSERT INTO `twotree_region` VALUES ('3094','366','和布克赛尔','3','0','h','hebukesaier');

INSERT INTO `twotree_region` VALUES ('3095','366','吉木乃县','3','0','j','jimunaixian');

INSERT INTO `twotree_region` VALUES ('3096','366','昭苏县','3','0','z','zhaosuxian');

INSERT INTO `twotree_region` VALUES ('3097','366','特克斯县','3','0','t','tekesixian');

INSERT INTO `twotree_region` VALUES ('3098','366','尼勒克县','3','0','n','nilekexian');

INSERT INTO `twotree_region` VALUES ('3099','366','察布查尔','3','0','c','chabuchaer');

INSERT INTO `twotree_region` VALUES ('3100','367','盘龙区','3','0','p','panlongqu');

INSERT INTO `twotree_region` VALUES ('3101','367','五华区','3','0','w','wuhuaqu');

INSERT INTO `twotree_region` VALUES ('3102','367','官渡区','3','0','g','guanduqu');

INSERT INTO `twotree_region` VALUES ('3103','367','西山区','3','0','x','xishanqu');

INSERT INTO `twotree_region` VALUES ('3104','367','东川区','3','0','d','dongchuanqu');

INSERT INTO `twotree_region` VALUES ('3105','367','安宁市','3','0','a','anningshi');

INSERT INTO `twotree_region` VALUES ('3106','367','呈贡县','3','0','c','chenggongxian');

INSERT INTO `twotree_region` VALUES ('3107','367','晋宁县','3','0','j','jinningxian');

INSERT INTO `twotree_region` VALUES ('3108','367','富民县','3','0','f','fuminxian');

INSERT INTO `twotree_region` VALUES ('3109','367','宜良县','3','0','y','yiliangxian');

INSERT INTO `twotree_region` VALUES ('3110','367','嵩明县','3','0','m','mingxian');

INSERT INTO `twotree_region` VALUES ('3111','367','石林县','3','0','s','shilinxian');

INSERT INTO `twotree_region` VALUES ('3112','367','禄劝','3','0','l','luquan');

INSERT INTO `twotree_region` VALUES ('3113','367','寻甸','3','0','x','xundian');

INSERT INTO `twotree_region` VALUES ('3114','368','兰坪','3','0','l','lanping');

INSERT INTO `twotree_region` VALUES ('3115','368','泸水县','3','0','s','shuixian');

INSERT INTO `twotree_region` VALUES ('3116','368','福贡县','3','0','f','fugongxian');

INSERT INTO `twotree_region` VALUES ('3117','368','贡山','3','0','g','gongshan');

INSERT INTO `twotree_region` VALUES ('3118','369','宁洱','3','0','n','ninger');

INSERT INTO `twotree_region` VALUES ('3119','369','思茅区','3','0','s','simaoqu');

INSERT INTO `twotree_region` VALUES ('3120','369','墨江','3','0','m','mojiang');

INSERT INTO `twotree_region` VALUES ('3121','369','景东','3','0','j','jingdong');

INSERT INTO `twotree_region` VALUES ('3122','369','景谷','3','0','j','jinggu');

INSERT INTO `twotree_region` VALUES ('3123','369','镇沅','3','0','z','zhen');

INSERT INTO `twotree_region` VALUES ('3124','369','江城','3','0','j','jiangcheng');

INSERT INTO `twotree_region` VALUES ('3125','369','孟连','3','0','m','menglian');

INSERT INTO `twotree_region` VALUES ('3126','369','澜沧','3','0','l','lancang');

INSERT INTO `twotree_region` VALUES ('3127','369','西盟','3','0','x','ximeng');

INSERT INTO `twotree_region` VALUES ('3128','370','古城区','3','0','g','guchengqu');

INSERT INTO `twotree_region` VALUES ('3129','370','宁蒗','3','0','n','ning');

INSERT INTO `twotree_region` VALUES ('3130','370','玉龙','3','0','y','yulong');

INSERT INTO `twotree_region` VALUES ('3131','370','永胜县','3','0','y','yongshengxian');

INSERT INTO `twotree_region` VALUES ('3132','370','华坪县','3','0','h','huapingxian');

INSERT INTO `twotree_region` VALUES ('3133','371','隆阳区','3','0','l','longyangqu');

INSERT INTO `twotree_region` VALUES ('3134','371','施甸县','3','0','s','shidianxian');

INSERT INTO `twotree_region` VALUES ('3135','371','腾冲县','3','0','t','tengchongxian');

INSERT INTO `twotree_region` VALUES ('3136','371','龙陵县','3','0','l','longlingxian');

INSERT INTO `twotree_region` VALUES ('3137','371','昌宁县','3','0','c','changningxian');

INSERT INTO `twotree_region` VALUES ('3138','372','楚雄市','3','0','c','chuxiongshi');

INSERT INTO `twotree_region` VALUES ('3139','372','双柏县','3','0','s','shuangbaixian');

INSERT INTO `twotree_region` VALUES ('3140','372','牟定县','3','0','m','moudingxian');

INSERT INTO `twotree_region` VALUES ('3141','372','南华县','3','0','n','nanhuaxian');

INSERT INTO `twotree_region` VALUES ('3142','372','姚安县','3','0','y','yaoanxian');

INSERT INTO `twotree_region` VALUES ('3143','372','大姚县','3','0','d','dayaoxian');

INSERT INTO `twotree_region` VALUES ('3144','372','永仁县','3','0','y','yongrenxian');

INSERT INTO `twotree_region` VALUES ('3145','372','元谋县','3','0','y','yuanmouxian');

INSERT INTO `twotree_region` VALUES ('3146','372','武定县','3','0','w','wudingxian');

INSERT INTO `twotree_region` VALUES ('3147','372','禄丰县','3','0','l','lufengxian');

INSERT INTO `twotree_region` VALUES ('3148','373','大理市','3','0','d','dalishi');

INSERT INTO `twotree_region` VALUES ('3149','373','祥云县','3','0','x','xiangyunxian');

INSERT INTO `twotree_region` VALUES ('3150','373','宾川县','3','0','b','binchuanxian');

INSERT INTO `twotree_region` VALUES ('3151','373','弥渡县','3','0','m','miduxian');

INSERT INTO `twotree_region` VALUES ('3152','373','永平县','3','0','y','yongpingxian');

INSERT INTO `twotree_region` VALUES ('3153','373','云龙县','3','0','y','yunlongxian');

INSERT INTO `twotree_region` VALUES ('3154','373','洱源县','3','0','e','eryuanxian');

INSERT INTO `twotree_region` VALUES ('3155','373','剑川县','3','0','j','jianchuanxian');

INSERT INTO `twotree_region` VALUES ('3156','373','鹤庆县','3','0','h','heqingxian');

INSERT INTO `twotree_region` VALUES ('3157','373','漾濞','3','0','y','yang');

INSERT INTO `twotree_region` VALUES ('3158','373','南涧','3','0','n','nanjian');

INSERT INTO `twotree_region` VALUES ('3159','373','巍山','3','0','w','weishan');

INSERT INTO `twotree_region` VALUES ('3160','374','潞西市','3','0','l','luxishi');

INSERT INTO `twotree_region` VALUES ('3161','374','瑞丽市','3','0','r','ruilishi');

INSERT INTO `twotree_region` VALUES ('3162','374','梁河县','3','0','l','lianghexian');

INSERT INTO `twotree_region` VALUES ('3163','374','盈江县','3','0','y','yingjiangxian');

INSERT INTO `twotree_region` VALUES ('3164','374','陇川县','3','0','l','longchuanxian');

INSERT INTO `twotree_region` VALUES ('3165','375','香格里拉县','3','0','x','xianggelilaxian');

INSERT INTO `twotree_region` VALUES ('3166','375','德钦县','3','0','d','deqinxian');

INSERT INTO `twotree_region` VALUES ('3167','375','维西','3','0','w','weixi');

INSERT INTO `twotree_region` VALUES ('3168','376','泸西县','3','0','x','xixian');

INSERT INTO `twotree_region` VALUES ('3169','376','蒙自县','3','0','m','mengzixian');

INSERT INTO `twotree_region` VALUES ('3170','376','个旧市','3','0','g','gejiushi');

INSERT INTO `twotree_region` VALUES ('3171','376','开远市','3','0','k','kaiyuanshi');

INSERT INTO `twotree_region` VALUES ('3172','376','绿春县','3','0','l','lvchunxian');

INSERT INTO `twotree_region` VALUES ('3173','376','建水县','3','0','j','jianshuixian');

INSERT INTO `twotree_region` VALUES ('3174','376','石屏县','3','0','s','shipingxian');

INSERT INTO `twotree_region` VALUES ('3175','376','弥勒县','3','0','m','milexian');

INSERT INTO `twotree_region` VALUES ('3176','376','元阳县','3','0','y','yuanyangxian');

INSERT INTO `twotree_region` VALUES ('3177','376','红河县','3','0','h','honghexian');

INSERT INTO `twotree_region` VALUES ('3178','376','金平','3','0','j','jinping');

INSERT INTO `twotree_region` VALUES ('3179','376','河口','3','0','h','hekou');

INSERT INTO `twotree_region` VALUES ('3180','376','屏边','3','0','p','pingbian');

INSERT INTO `twotree_region` VALUES ('3181','377','临翔区','3','0','l','linxiangqu');

INSERT INTO `twotree_region` VALUES ('3182','377','凤庆县','3','0','f','fengqingxian');

INSERT INTO `twotree_region` VALUES ('3183','377','云县','3','0','y','yunxian');

INSERT INTO `twotree_region` VALUES ('3184','377','永德县','3','0','y','yongdexian');

INSERT INTO `twotree_region` VALUES ('3185','377','镇康县','3','0','z','zhenkangxian');

INSERT INTO `twotree_region` VALUES ('3186','377','双江','3','0','s','shuangjiang');

INSERT INTO `twotree_region` VALUES ('3187','377','耿马','3','0','g','gengma');

INSERT INTO `twotree_region` VALUES ('3188','377','沧源','3','0','c','cangyuan');

INSERT INTO `twotree_region` VALUES ('3189','378','麒麟区','3','0','q','qu');

INSERT INTO `twotree_region` VALUES ('3190','378','宣威市','3','0','x','xuanweishi');

INSERT INTO `twotree_region` VALUES ('3191','378','马龙县','3','0','m','malongxian');

INSERT INTO `twotree_region` VALUES ('3192','378','陆良县','3','0','l','luliangxian');

INSERT INTO `twotree_region` VALUES ('3193','378','师宗县','3','0','s','shizongxian');

INSERT INTO `twotree_region` VALUES ('3194','378','罗平县','3','0','l','luopingxian');

INSERT INTO `twotree_region` VALUES ('3195','378','富源县','3','0','f','fuyuanxian');

INSERT INTO `twotree_region` VALUES ('3196','378','会泽县','3','0','h','huizexian');

INSERT INTO `twotree_region` VALUES ('3197','378','沾益县','3','0','z','zhanyixian');

INSERT INTO `twotree_region` VALUES ('3198','379','文山县','3','0','w','wenshanxian');

INSERT INTO `twotree_region` VALUES ('3199','379','砚山县','3','0','y','yanshanxian');

INSERT INTO `twotree_region` VALUES ('3200','379','西畴县','3','0','x','xichouxian');

INSERT INTO `twotree_region` VALUES ('3201','379','麻栗坡县','3','0','m','malipoxian');

INSERT INTO `twotree_region` VALUES ('3202','379','马关县','3','0','m','maguanxian');

INSERT INTO `twotree_region` VALUES ('3203','379','丘北县','3','0','q','qiubeixian');

INSERT INTO `twotree_region` VALUES ('3204','379','广南县','3','0','g','guangnanxian');

INSERT INTO `twotree_region` VALUES ('3205','379','富宁县','3','0','f','funingxian');

INSERT INTO `twotree_region` VALUES ('3206','380','景洪市','3','0','j','jinghongshi');

INSERT INTO `twotree_region` VALUES ('3207','380','勐海县','3','0','h','haixian');

INSERT INTO `twotree_region` VALUES ('3208','380','勐腊县','3','0','l','laxian');

INSERT INTO `twotree_region` VALUES ('3209','381','红塔区','3','0','h','hongtaqu');

INSERT INTO `twotree_region` VALUES ('3210','381','江川县','3','0','j','jiangchuanxian');

INSERT INTO `twotree_region` VALUES ('3211','381','澄江县','3','0','c','chengjiangxian');

INSERT INTO `twotree_region` VALUES ('3212','381','通海县','3','0','t','tonghaixian');

INSERT INTO `twotree_region` VALUES ('3213','381','华宁县','3','0','h','huaningxian');

INSERT INTO `twotree_region` VALUES ('3214','381','易门县','3','0','y','yimenxian');

INSERT INTO `twotree_region` VALUES ('3215','381','峨山','3','0','e','eshan');

INSERT INTO `twotree_region` VALUES ('3216','381','新平','3','0','x','xinping');

INSERT INTO `twotree_region` VALUES ('3217','381','元江','3','0','y','yuanjiang');

INSERT INTO `twotree_region` VALUES ('3218','382','昭阳区','3','0','z','zhaoyangqu');

INSERT INTO `twotree_region` VALUES ('3219','382','鲁甸县','3','0','l','ludianxian');

INSERT INTO `twotree_region` VALUES ('3220','382','巧家县','3','0','q','qiaojiaxian');

INSERT INTO `twotree_region` VALUES ('3221','382','盐津县','3','0','y','yanjinxian');

INSERT INTO `twotree_region` VALUES ('3222','382','大关县','3','0','d','daguanxian');

INSERT INTO `twotree_region` VALUES ('3223','382','永善县','3','0','y','yongshanxian');

INSERT INTO `twotree_region` VALUES ('3224','382','绥江县','3','0','s','suijiangxian');

INSERT INTO `twotree_region` VALUES ('3225','382','镇雄县','3','0','z','zhenxiongxian');

INSERT INTO `twotree_region` VALUES ('3226','382','彝良县','3','0','y','yiliangxian');

INSERT INTO `twotree_region` VALUES ('3227','382','威信县','3','0','w','weixinxian');

INSERT INTO `twotree_region` VALUES ('3228','382','水富县','3','0','s','shuifuxian');

INSERT INTO `twotree_region` VALUES ('3229','383','西湖区','3','0','x','xihuqu');

INSERT INTO `twotree_region` VALUES ('3230','383','上城区','3','0','s','shangchengqu');

INSERT INTO `twotree_region` VALUES ('3231','383','下城区','3','0','x','xiachengqu');

INSERT INTO `twotree_region` VALUES ('3232','383','拱墅区','3','0','g','gongshuqu');

INSERT INTO `twotree_region` VALUES ('3233','383','滨江区','3','0','b','binjiangqu');

INSERT INTO `twotree_region` VALUES ('3234','383','江干区','3','0','j','jiangganqu');

INSERT INTO `twotree_region` VALUES ('3235','383','萧山区','3','0','x','xiaoshanqu');

INSERT INTO `twotree_region` VALUES ('3236','383','余杭区','3','0','y','yuhangqu');

INSERT INTO `twotree_region` VALUES ('3237','383','市郊','3','0','s','shijiao');

INSERT INTO `twotree_region` VALUES ('3238','383','建德市','3','0','j','jiandeshi');

INSERT INTO `twotree_region` VALUES ('3239','383','富阳市','3','0','f','fuyangshi');

INSERT INTO `twotree_region` VALUES ('3240','383','临安市','3','0','l','linanshi');

INSERT INTO `twotree_region` VALUES ('3241','383','桐庐县','3','0','t','tongluxian');

INSERT INTO `twotree_region` VALUES ('3242','383','淳安县','3','0','c','chunanxian');

INSERT INTO `twotree_region` VALUES ('3243','384','吴兴区','3','0','w','wuxingqu');

INSERT INTO `twotree_region` VALUES ('3244','384','南浔区','3','0','n','nanqu');

INSERT INTO `twotree_region` VALUES ('3245','384','德清县','3','0','d','deqingxian');

INSERT INTO `twotree_region` VALUES ('3246','384','长兴县','3','0','c','changxingxian');

INSERT INTO `twotree_region` VALUES ('3247','384','安吉县','3','0','a','anjixian');

INSERT INTO `twotree_region` VALUES ('3248','385','南湖区','3','0','n','nanhuqu');

INSERT INTO `twotree_region` VALUES ('3249','385','秀洲区','3','0','x','xiuzhouqu');

INSERT INTO `twotree_region` VALUES ('3250','385','海宁市','3','0','h','hainingshi');

INSERT INTO `twotree_region` VALUES ('3251','385','嘉善县','3','0','j','jiashanxian');

INSERT INTO `twotree_region` VALUES ('3252','385','平湖市','3','0','p','pinghushi');

INSERT INTO `twotree_region` VALUES ('3253','385','桐乡市','3','0','t','tongxiangshi');

INSERT INTO `twotree_region` VALUES ('3254','385','海盐县','3','0','h','haiyanxian');

INSERT INTO `twotree_region` VALUES ('3255','386','婺城区','3','0','c','chengqu');

INSERT INTO `twotree_region` VALUES ('3256','386','金东区','3','0','j','jindongqu');

INSERT INTO `twotree_region` VALUES ('3257','386','兰溪市','3','0','l','lanxishi');

INSERT INTO `twotree_region` VALUES ('3258','386','市区','3','0','s','shiqu');

INSERT INTO `twotree_region` VALUES ('3259','386','佛堂镇','3','0','f','fotangzhen');

INSERT INTO `twotree_region` VALUES ('3260','386','上溪镇','3','0','s','shangxizhen');

INSERT INTO `twotree_region` VALUES ('3261','386','义亭镇','3','0','y','yitingzhen');

INSERT INTO `twotree_region` VALUES ('3262','386','大陈镇','3','0','d','dachenzhen');

INSERT INTO `twotree_region` VALUES ('3263','386','苏溪镇','3','0','s','suxizhen');

INSERT INTO `twotree_region` VALUES ('3264','386','赤岸镇','3','0','c','chianzhen');

INSERT INTO `twotree_region` VALUES ('3265','386','东阳市','3','0','d','dongyangshi');

INSERT INTO `twotree_region` VALUES ('3266','386','永康市','3','0','y','yongkangshi');

INSERT INTO `twotree_region` VALUES ('3267','386','武义县','3','0','w','wuyixian');

INSERT INTO `twotree_region` VALUES ('3268','386','浦江县','3','0','p','pujiangxian');

INSERT INTO `twotree_region` VALUES ('3269','386','磐安县','3','0','p','pananxian');

INSERT INTO `twotree_region` VALUES ('3270','387','莲都区','3','0','l','lianduqu');

INSERT INTO `twotree_region` VALUES ('3271','387','龙泉市','3','0','l','longquanshi');

INSERT INTO `twotree_region` VALUES ('3272','387','青田县','3','0','q','qingtianxian');

INSERT INTO `twotree_region` VALUES ('3273','387','缙云县','3','0','y','yunxian');

INSERT INTO `twotree_region` VALUES ('3274','387','遂昌县','3','0','s','suichangxian');

INSERT INTO `twotree_region` VALUES ('3275','387','松阳县','3','0','s','songyangxian');

INSERT INTO `twotree_region` VALUES ('3276','387','云和县','3','0','y','yunhexian');

INSERT INTO `twotree_region` VALUES ('3277','387','庆元县','3','0','q','qingyuanxian');

INSERT INTO `twotree_region` VALUES ('3278','387','景宁','3','0','j','jingning');

INSERT INTO `twotree_region` VALUES ('3279','388','海曙区','3','0','h','haishuqu');

INSERT INTO `twotree_region` VALUES ('3280','388','江东区','3','0','j','jiangdongqu');

INSERT INTO `twotree_region` VALUES ('3281','388','江北区','3','0','j','jiangbeiqu');

INSERT INTO `twotree_region` VALUES ('3282','388','镇海区','3','0','z','zhenhaiqu');

INSERT INTO `twotree_region` VALUES ('3283','388','北仑区','3','0','b','beilunqu');

INSERT INTO `twotree_region` VALUES ('3284','388','鄞州区','3','0','z','zhouqu');

INSERT INTO `twotree_region` VALUES ('3285','388','余姚市','3','0','y','yuyaoshi');

INSERT INTO `twotree_region` VALUES ('3286','388','慈溪市','3','0','c','cixishi');

INSERT INTO `twotree_region` VALUES ('3287','388','奉化市','3','0','f','fenghuashi');

INSERT INTO `twotree_region` VALUES ('3288','388','象山县','3','0','x','xiangshanxian');

INSERT INTO `twotree_region` VALUES ('3289','388','宁海县','3','0','n','ninghaixian');

INSERT INTO `twotree_region` VALUES ('3290','389','越城区','3','0','y','yuechengqu');

INSERT INTO `twotree_region` VALUES ('3291','389','上虞市','3','0','s','shangyushi');

INSERT INTO `twotree_region` VALUES ('3292','389','嵊州市','3','0','z','zhoushi');

INSERT INTO `twotree_region` VALUES ('3293','389','绍兴县','3','0','s','shaoxingxian');

INSERT INTO `twotree_region` VALUES ('3294','389','新昌县','3','0','x','xinchangxian');

INSERT INTO `twotree_region` VALUES ('3295','389','诸暨市','3','0','z','zhushi');

INSERT INTO `twotree_region` VALUES ('3296','390','椒江区','3','0','j','jiaojiangqu');

INSERT INTO `twotree_region` VALUES ('3297','390','黄岩区','3','0','h','huangyanqu');

INSERT INTO `twotree_region` VALUES ('3298','390','路桥区','3','0','l','luqiaoqu');

INSERT INTO `twotree_region` VALUES ('3299','390','温岭市','3','0','w','wenlingshi');

INSERT INTO `twotree_region` VALUES ('3300','390','临海市','3','0','l','linhaishi');

INSERT INTO `twotree_region` VALUES ('3301','390','玉环县','3','0','y','yuhuanxian');

INSERT INTO `twotree_region` VALUES ('3302','390','三门县','3','0','s','sanmenxian');

INSERT INTO `twotree_region` VALUES ('3303','390','天台县','3','0','t','tiantaixian');

INSERT INTO `twotree_region` VALUES ('3304','390','仙居县','3','0','x','xianjuxian');

INSERT INTO `twotree_region` VALUES ('3305','391','鹿城区','3','0','l','luchengqu');

INSERT INTO `twotree_region` VALUES ('3306','391','龙湾区','3','0','l','longwanqu');

INSERT INTO `twotree_region` VALUES ('3307','391','瓯海区','3','0','h','haiqu');

INSERT INTO `twotree_region` VALUES ('3308','391','瑞安市','3','0','r','ruianshi');

INSERT INTO `twotree_region` VALUES ('3309','391','乐清市','3','0','l','leqingshi');

INSERT INTO `twotree_region` VALUES ('3310','391','洞头县','3','0','d','dongtouxian');

INSERT INTO `twotree_region` VALUES ('3311','391','永嘉县','3','0','y','yongjiaxian');

INSERT INTO `twotree_region` VALUES ('3312','391','平阳县','3','0','p','pingyangxian');

INSERT INTO `twotree_region` VALUES ('3313','391','苍南县','3','0','c','cangnanxian');

INSERT INTO `twotree_region` VALUES ('3314','391','文成县','3','0','w','wenchengxian');

INSERT INTO `twotree_region` VALUES ('3315','391','泰顺县','3','0','t','taishunxian');

INSERT INTO `twotree_region` VALUES ('3316','392','定海区','3','0','d','dinghaiqu');

INSERT INTO `twotree_region` VALUES ('3317','392','普陀区','3','0','p','putuoqu');

INSERT INTO `twotree_region` VALUES ('3318','392','岱山县','3','0','s','shanxian');

INSERT INTO `twotree_region` VALUES ('3319','392','嵊泗县','3','0','x','xian');

INSERT INTO `twotree_region` VALUES ('3320','393','衢州市','3','0','z','zhoushi');

INSERT INTO `twotree_region` VALUES ('3321','393','江山市','3','0','j','jiangshanshi');

INSERT INTO `twotree_region` VALUES ('3322','393','常山县','3','0','c','changshanxian');

INSERT INTO `twotree_region` VALUES ('3323','393','开化县','3','0','k','kaihuaxian');

INSERT INTO `twotree_region` VALUES ('3324','393','龙游县','3','0','l','longyouxian');

INSERT INTO `twotree_region` VALUES ('3325','394','合川区','3','0','h','hechuanqu');

INSERT INTO `twotree_region` VALUES ('3326','394','江津区','3','0','j','jiangjinqu');

INSERT INTO `twotree_region` VALUES ('3327','394','南川区','3','0','n','nanchuanqu');

INSERT INTO `twotree_region` VALUES ('3328','394','永川区','3','0','y','yongchuanqu');

INSERT INTO `twotree_region` VALUES ('3329','394','南岸区','3','0','n','nananqu');

INSERT INTO `twotree_region` VALUES ('3330','394','渝北区','3','0','y','yubeiqu');

INSERT INTO `twotree_region` VALUES ('3331','394','万盛区','3','0','w','wanshengqu');

INSERT INTO `twotree_region` VALUES ('3332','394','大渡口区','3','0','d','dadukouqu');

INSERT INTO `twotree_region` VALUES ('3333','394','万州区','3','0','w','wanzhouqu');

INSERT INTO `twotree_region` VALUES ('3334','394','北碚区','3','0','b','beiqu');

INSERT INTO `twotree_region` VALUES ('3335','394','沙坪坝区','3','0','s','shapingbaqu');

INSERT INTO `twotree_region` VALUES ('3336','394','巴南区','3','0','b','bananqu');

INSERT INTO `twotree_region` VALUES ('3337','394','涪陵区','3','0','f','fulingqu');

INSERT INTO `twotree_region` VALUES ('3338','394','江北区','3','0','j','jiangbeiqu');

INSERT INTO `twotree_region` VALUES ('3339','394','九龙坡区','3','0','j','jiulongpoqu');

INSERT INTO `twotree_region` VALUES ('3340','394','渝中区','3','0','y','yuzhongqu');

INSERT INTO `twotree_region` VALUES ('3341','394','黔江开发区','3','0','q','qianjiangkaifaqu');

INSERT INTO `twotree_region` VALUES ('3342','394','长寿区','3','0','c','changshouqu');

INSERT INTO `twotree_region` VALUES ('3343','394','双桥区','3','0','s','shuangqiaoqu');

INSERT INTO `twotree_region` VALUES ('3344','394','綦江县','3','0','j','jiangxian');

INSERT INTO `twotree_region` VALUES ('3345','394','潼南县','3','0','n','nanxian');

INSERT INTO `twotree_region` VALUES ('3346','394','铜梁县','3','0','t','tongliangxian');

INSERT INTO `twotree_region` VALUES ('3347','394','大足县','3','0','d','dazuxian');

INSERT INTO `twotree_region` VALUES ('3348','394','荣昌县','3','0','r','rongchangxian');

INSERT INTO `twotree_region` VALUES ('3349','394','璧山县','3','0','s','shanxian');

INSERT INTO `twotree_region` VALUES ('3350','394','垫江县','3','0','d','dianjiangxian');

INSERT INTO `twotree_region` VALUES ('3351','394','武隆县','3','0','w','wulongxian');

INSERT INTO `twotree_region` VALUES ('3352','394','丰都县','3','0','f','fengduxian');

INSERT INTO `twotree_region` VALUES ('3353','394','城口县','3','0','c','chengkouxian');

INSERT INTO `twotree_region` VALUES ('3354','394','梁平县','3','0','l','liangpingxian');

INSERT INTO `twotree_region` VALUES ('3355','394','开县','3','0','k','kaixian');

INSERT INTO `twotree_region` VALUES ('3356','394','巫溪县','3','0','w','wuxixian');

INSERT INTO `twotree_region` VALUES ('3357','394','巫山县','3','0','w','wushanxian');

INSERT INTO `twotree_region` VALUES ('3358','394','奉节县','3','0','f','fengjiexian');

INSERT INTO `twotree_region` VALUES ('3359','394','云阳县','3','0','y','yunyangxian');

INSERT INTO `twotree_region` VALUES ('3360','394','忠县','3','0','z','zhongxian');

INSERT INTO `twotree_region` VALUES ('3361','394','石柱','3','0','s','shizhu');

INSERT INTO `twotree_region` VALUES ('3362','394','彭水','3','0','p','pengshui');

INSERT INTO `twotree_region` VALUES ('3363','394','酉阳','3','0','y','youyang');

INSERT INTO `twotree_region` VALUES ('3364','394','秀山','3','0','x','xiushan');

INSERT INTO `twotree_region` VALUES ('3365','395','沙田区','3','0','s','shatianqu');

INSERT INTO `twotree_region` VALUES ('3366','395','东区','3','0','d','dongqu');

INSERT INTO `twotree_region` VALUES ('3367','395','观塘区','3','0','g','guantangqu');

INSERT INTO `twotree_region` VALUES ('3368','395','黄大仙区','3','0','h','huangdaxianqu');

INSERT INTO `twotree_region` VALUES ('3369','395','九龙城区','3','0','j','jiulongchengqu');

INSERT INTO `twotree_region` VALUES ('3370','395','屯门区','3','0','t','tunmenqu');

INSERT INTO `twotree_region` VALUES ('3371','395','葵青区','3','0','k','kuiqingqu');

INSERT INTO `twotree_region` VALUES ('3372','395','元朗区','3','0','y','yuanlangqu');

INSERT INTO `twotree_region` VALUES ('3373','395','深水埗区','3','0','s','shenshui');

INSERT INTO `twotree_region` VALUES ('3374','395','西贡区','3','0','x','xigongqu');

INSERT INTO `twotree_region` VALUES ('3375','395','大埔区','3','0','d','dapuqu');

INSERT INTO `twotree_region` VALUES ('3376','395','湾仔区','3','0','w','wanziqu');

INSERT INTO `twotree_region` VALUES ('3377','395','油尖旺区','3','0','y','youjianwangqu');

INSERT INTO `twotree_region` VALUES ('3378','395','北区','3','0','b','beiqu');

INSERT INTO `twotree_region` VALUES ('3379','395','南区','3','0','n','nanqu');

INSERT INTO `twotree_region` VALUES ('3380','395','荃湾区','3','0','w','wanqu');

INSERT INTO `twotree_region` VALUES ('3381','395','中西区','3','0','z','zhongxiqu');

INSERT INTO `twotree_region` VALUES ('3382','395','离岛区','3','0','l','lidaoqu');

INSERT INTO `twotree_region` VALUES ('3383','396','澳门','3','0','a','aomen');

INSERT INTO `twotree_region` VALUES ('3384','397','台北','3','0','t','taibei');

INSERT INTO `twotree_region` VALUES ('3385','397','高雄','3','0','g','gaoxiong');

INSERT INTO `twotree_region` VALUES ('3386','397','基隆','3','0','j','jilong');

INSERT INTO `twotree_region` VALUES ('3387','397','台中','3','0','t','taizhong');

INSERT INTO `twotree_region` VALUES ('3388','397','台南','3','0','t','tainan');

INSERT INTO `twotree_region` VALUES ('3389','397','新竹','3','0','x','xinzhu');

INSERT INTO `twotree_region` VALUES ('3390','397','嘉义','3','0','j','jiayi');

INSERT INTO `twotree_region` VALUES ('3391','397','宜兰县','3','0','y','yilanxian');

INSERT INTO `twotree_region` VALUES ('3392','397','桃园县','3','0','t','taoyuanxian');

INSERT INTO `twotree_region` VALUES ('3393','397','苗栗县','3','0','m','miaolixian');

INSERT INTO `twotree_region` VALUES ('3394','397','彰化县','3','0','z','zhanghuaxian');

INSERT INTO `twotree_region` VALUES ('3395','397','南投县','3','0','n','nantouxian');

INSERT INTO `twotree_region` VALUES ('3396','397','云林县','3','0','y','yunlinxian');

INSERT INTO `twotree_region` VALUES ('3397','397','屏东县','3','0','p','pingdongxian');

INSERT INTO `twotree_region` VALUES ('3398','397','台东县','3','0','t','taidongxian');

INSERT INTO `twotree_region` VALUES ('3399','397','花莲县','3','0','h','hualianxian');

INSERT INTO `twotree_region` VALUES ('3400','397','澎湖县','3','0','p','penghuxian');

INSERT INTO `twotree_region` VALUES ('3401','3','合肥','2','0','h','hefei');

INSERT INTO `twotree_region` VALUES ('3402','3401','庐阳区','3','0','l','luyangqu');

INSERT INTO `twotree_region` VALUES ('3403','3401','瑶海区','3','0','y','yaohaiqu');

INSERT INTO `twotree_region` VALUES ('3404','3401','蜀山区','3','0','s','shushanqu');

INSERT INTO `twotree_region` VALUES ('3405','3401','包河区','3','0','b','baohequ');

INSERT INTO `twotree_region` VALUES ('3406','3401','长丰县','3','0','c','changfengxian');

INSERT INTO `twotree_region` VALUES ('3407','3401','肥东县','3','0','f','feidongxian');

INSERT INTO `twotree_region` VALUES ('3408','3401','肥西县','3','0','f','feixixian');

--
-- 数据表中的数据: `twotree_resale_config`
--

INSERT INTO `twotree_resale_config` VALUES ('1','65','35');

--
-- 数据表中的数据: `twotree_role`
--

INSERT INTO `twotree_role` VALUES ('1','Manege','null','1','系统管理员');

INSERT INTO `twotree_role` VALUES ('2','Editor','null','1','外部编辑');

INSERT INTO `twotree_role` VALUES ('3','Service','null','1','服务商');

--
-- 数据表中的数据: `twotree_role_user`
--

INSERT INTO `twotree_role_user` VALUES ('3','2');

--
-- 数据表中的数据: `twotree_school`
--

INSERT INTO `twotree_school` VALUES ('1','西安交通大学','24','311','2597','陕西','西安','新城区','1444654852');

INSERT INTO `twotree_school` VALUES ('2','西安电子科技大学','24','311','2599','陕西','西安','雁塔区','1444654884');

INSERT INTO `twotree_school` VALUES ('3','西北工业大学','24','311','2596','陕西','西安','莲湖区','1445915754');

--
-- 数据表中的数据: `twotree_score_log`
--

INSERT INTO `twotree_score_log` VALUES ('1','20','33','21','46','20','null','1432607087');

INSERT INTO `twotree_score_log` VALUES ('2','19','33','21','51','20','null','1432607087');

INSERT INTO `twotree_score_log` VALUES ('4','20','20','23','5','12','领导奖','1432632343');

INSERT INTO `twotree_score_log` VALUES ('5','19','20','23','5','12','领导奖','1432632343');

--
-- 数据表中的数据: `twotree_service`
--

INSERT INTO `twotree_service` VALUES ('1','fuwu001','96e79218965eb72c92a549dd5a330112','段哈哈','18710950674','shaaoboo@qq.com','null','null','2,52,500,501,502,503,504,505,506,507,508,509,510,511,512,513,514,515,516,517,3,36,398,399,400,401,402,403,404,405,406,407,408,37,409,410,411,412,413,414,415,38,416,417,418,419,420,39,421,422,423,424,40,425,426,427,428,429,430,431,432,41,433,434,435,436,437,438,439,440,441,442,443,444,42,445,446,447,448,43,449,450,451,452,453,454,44,455,456,457,458,459,460,461,45,462,463,464,465,466,467,468,46,469,470,471,472,47,473,474,475,476,477,48,478,479,480,481,49,482,483,484,485,486,487,488,50,489,490,491,492,493,494,495,51,496,497,498,499,3401,3402,3403,3404,3405,3406,3407,3408,','0','1438742999');

--
-- 数据表中的数据: `twotree_shop`
--

INSERT INTO `twotree_shop` VALUES ('1','null','1','24','311','2597','1','1','null','1','1','1444814995');

INSERT INTO `twotree_shop` VALUES ('2','null','6','24','311','2597','1','2','null','1','1','1445340744');

INSERT INTO `twotree_shop` VALUES ('3','null','21','24','311','2597','1','3','null','0','1','1445866682');

--
-- 数据表中的数据: `twotree_shop_level`
--

INSERT INTO `twotree_shop_level` VALUES ('1','金牌店铺','200000','销售总额达到100000元可升级为金牌店铺','null');

INSERT INTO `twotree_shop_level` VALUES ('2','银牌店铺','100000','销售总额达到100000元可升级为金牌店铺','null');

INSERT INTO `twotree_shop_level` VALUES ('3','铜牌店铺','50000','销售总额达到50000元可升级为金牌店铺','null');

--
-- 数据表中的数据: `twotree_sign`
--

INSERT INTO `twotree_sign` VALUES ('1','90','5','20151013','1444706455');

INSERT INTO `twotree_sign` VALUES ('2','null','5','20151014','1444798440');

INSERT INTO `twotree_sign` VALUES ('3','1','5','20151014','1444800048');

INSERT INTO `twotree_sign` VALUES ('4','1','5','20151015','1444887400');

INSERT INTO `twotree_sign` VALUES ('5','4','5','20151020','1445318695');

INSERT INTO `twotree_sign` VALUES ('6','2','5','20151020','1445330622');

INSERT INTO `twotree_sign` VALUES ('7','4','5','20151022','1445483944');

INSERT INTO `twotree_sign` VALUES ('8','4','5','20151026','1445825720');

INSERT INTO `twotree_sign` VALUES ('9','3','5','20151026','1445840242');

INSERT INTO `twotree_sign` VALUES ('10','2','5','20151026','1445841722');

INSERT INTO `twotree_sign` VALUES ('11','21','5','20151026','1445860877');

INSERT INTO `twotree_sign` VALUES ('12','9','5','20151026','1445867862');

INSERT INTO `twotree_sign` VALUES ('13','2','5','20151027','1445877426');

INSERT INTO `twotree_sign` VALUES ('14','2','5','20151028','1446047760');

--
-- 数据表中的数据: `twotree_slide`
--

INSERT INTO `twotree_slide` VALUES ('1','1','/Data/upload/image/20151011/20151011210352_16764.jpg','轮播1','http://m.idinggu.com/index.php?m=Index&a=product_list&cid=1');

INSERT INTO `twotree_slide` VALUES ('3','1','/Data/upload/image/20151011/20151011210352_16764.jpg','轮播2','null');

INSERT INTO `twotree_slide` VALUES ('4','1','/Data/upload/image/20151011/20151011210352_16764.jpg','轮播3','null');

INSERT INTO `twotree_slide` VALUES ('5','1','/Data/upload/image/20151011/20151011210352_16764.jpg','轮播4','null');

--
-- 数据表中的数据: `twotree_slide_category`
--

INSERT INTO `twotree_slide_category` VALUES ('1','首页','首页轮播图');

--
-- 数据表中的数据: `twotree_storage`
--

INSERT INTO `twotree_storage` VALUES ('1','华北仓库','null','null','null','2,52,500,501,502,503,504,505,506,507,508,509,510,511,512,513,514,515,516,517,');

INSERT INTO `twotree_storage` VALUES ('2','华南仓库','null','null','null','31,383,3229,3230,3231,3232,3233,3234,3235,3236,3237,3238,3239,3240,3241,3242,384,3243,3244,3245,3246,3247,385,3248,3249,3250,3251,3252,3253,3254,386,3255,3256,3257,3258,3259,3260,3261,3262,3263,3264,3265,3266,3267,3268,3269,387,3270,3271,3272,3273,3274,3275,3276,3277,3278,388,3279,3280,3281,3282,3283,3284,3285,3286,3287,3288,3289,389,3290,3291,3292,3293,3294,3295,390,3296,3297,3298,3299,3300,3301,3302,3303,3304,391,3305,3306,3307,3308,3309,3310,3311,3312,3313,3314,3315,392,3316,3317,3318,3319,393,3320,3321,3322,3323,3324,');

--
-- 数据表中的数据: `twotree_take_money`
--

INSERT INTO `twotree_take_money` VALUES ('1','1','0','1446130694','62220237006432','工商银行','0','0','null');

--
-- 数据表中的数据: `twotree_user`
--

INSERT INTO `twotree_user` VALUES ('1','admin','af8a9fc0b1ca6f1eb8186d72aa9cb794','1446171023','1.86.231.213','0','1','null');

INSERT INTO `twotree_user` VALUES ('2','sysadmin','4297f44b13955235245b2497399d7a93','1438485959','127.0.0.1','1','3','null');

--
-- 数据表中的数据: `twotree_user_data`
--

INSERT INTO `twotree_user_data` VALUES ('1','1','admin','刘昌','null','教授','西安交通大学医学院第一附属医院 副院长','null','null','null','null','西安交通大学第一附属医院肝胆外科','/Data/upload/icon/20140703173827_194.jpg','null','1404380307');

--
-- 数据表中的数据: `twotree_user_level`
--

INSERT INTO `twotree_user_level` VALUES ('1','4级','200000','累计消费金额达到100000元，可升级为钻石会员','null');

INSERT INTO `twotree_user_level` VALUES ('2','3级','100000','累计消费金额达到100000元，可升级为金牌会员','null');

INSERT INTO `twotree_user_level` VALUES ('3','2级','50000','累计消费金额达到50000元，可升级为店铺会员','null');

INSERT INTO `twotree_user_level` VALUES ('4','1级','10000','累计消费金额达到10000元，可升级为铜牌会员','null');

--
-- 数据表中的数据: `twotree_user_login_log`
--

INSERT INTO `twotree_user_login_log` VALUES ('0','90','1440727508');

--
-- 数据表中的数据: `twotree_user_relation`
--

INSERT INTO `twotree_user_relation` VALUES ('1','90','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('2','91','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('3','92','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('4','93','90','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('5','1','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('6','2','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('7','3','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('8','4','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('9','5','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('10','6','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('11','7','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('12','8','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('13','9','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('14','10','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('15','11','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('16','12','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('17','13','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('18','14','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('19','15','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('20','16','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('21','17','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('22','18','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('23','19','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('24','20','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('25','21','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('26','22','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('27','23','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('28','24','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('29','25','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('30','26','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('31','27','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('32','28','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('33','29','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('34','30','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('35','31','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('36','32','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('37','33','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('38','34','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('39','35','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('40','36','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('41','37','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('42','38','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('43','39','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('44','40','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('45','41','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('46','42','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('47','43','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('48','44','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('49','45','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('50','46','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('51','47','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('52','48','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('53','49','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('54','50','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('55','51','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('56','52','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('57','53','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('58','54','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('59','55','0','0','0','0','0');

INSERT INTO `twotree_user_relation` VALUES ('60','56','0','0','0','0','0');

--
-- 数据表中的数据: `twotree_wechat_config`
--

INSERT INTO `twotree_wechat_config` VALUES ('1','gh_b38acb2b4f1c','叮咕','1','dinggu','wx8c5b2610f8e96334','cd2bb90a660df91036d4c4cc25ded88f','1265531901','eca5fca40de8bc98a6d5f3e0c31a8f10');

--
-- 数据表中的数据: `twotree_wechat_menu`
--

INSERT INTO `twotree_wechat_menu` VALUES ('1','0','1','夜猫店','http://m.idinggu.com/','null','0','0','null');

INSERT INTO `twotree_wechat_menu` VALUES ('2','0','1','校园CEO','null','null','0','0','null');

INSERT INTO `twotree_wechat_menu` VALUES ('3','0','1','我的叮咕','http://m.idinggu.com/index.php?m=Ucenter&a=index','null','0','0','null');

INSERT INTO `twotree_wechat_menu` VALUES ('4','0','1','null','null','null','1','0','null');

INSERT INTO `twotree_wechat_menu` VALUES ('5','0','1','null','null','null','1','0','null');

--
-- 数据表中的数据: `twotree_wechat_resaler`
--

INSERT INTO `twotree_wechat_resaler` VALUES ('1','1','aux分销商','1','1','jack','4297f44b13955235245b2497399d7a93','1416282265');

--
-- 数据表中的数据: `twotree_wechat_shop`
--

INSERT INTO `twotree_wechat_shop` VALUES ('1','1','aux小店','green','3','1','1416282265');

--
-- 数据表中的数据: `twotree_wechat_user`
--

INSERT INTO `twotree_wechat_user` VALUES ('1','0','0','2','1','oKhP4wpwTkv2v-FHfLPh-g7TKlT8','0','null','0','段二','18710950666','0.00','上海市','上海市','长宁区','bruce','http://wx.qlogo.cn/mmopen/PiajxSqBRaEKpPp5UeVRFbLn30CAAnkbwwf4roCwvE1ia5dwOkAofXic0audxJErFDHfGqwe6wHDsv9e0kzraKGYg/0','1','610424','62220237006432','工商银行','0.00','0.03','44','0','0.00','null','null','default','null','null','bruce','96e79218965eb72c92a549dd5a330112','null','null','null','1444800037','2015-10-21','购物','7633034@qq.com','0');

INSERT INTO `twotree_wechat_user` VALUES ('2','0','0','1','1','oKhP4wuAccI1RLLhWGSEEUr4YE88','0','null','0','吴学松','15068143185','0.00','陕西省','西安市','雁塔区','Stephen Wu','http://wx.qlogo.cn/mmopen/w1F45jUwzWte0r3OricLrWZQKFoKH690zicElT5YlFbZ7eOWjqxYicQLiarwKbg1FbxhHZCicd04c5Zl3LIJFNiaYiaQ2pAc3BMicgiaI/0','1','null','null','null','0.01','0.00','20','0','0.00','null','null','default','null','null','null','null','null','null','null','1444807061','1991-03-12','呵呵','785971413@qq.com','0');

INSERT INTO `twotree_wechat_user` VALUES ('3','0','0','1','1','oKhP4wuNhPqWZo4D9OYso2-cp47Q','0','null','0','null','null','0.00','陕西','西安','null','李波','http://wx.qlogo.cn/mmopen/PiajxSqBRaEKOMibyG5tE08k4Uf3dFMGLrjoEHUsXbOPbEjhZbePLiamubZTE2CTylZfJGwH46mQbvGic7ibWOaBtzw/0','1','null','null','null','0.00','0.00','5','0','0.00','null','null','default','null','null','null','null','null','null','null','1445244315','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('4','0','0','2','1','oKhP4wnDC2OlBt7rtWZfepq62I1w','0','null','0','张强','18809546798','0.00','天津市','天津市','和平区','Paul','http://wx.qlogo.cn/mmopen/6XFhg7ldObzeicGuPWE7ByynnwVcNrBAFETNSZ7lMH7jBeKIeJG4IpWrCrpZSD3LiaOPSuWBY0Z8pnRd8q0gwoWQ/0','1','6422251988','12345678','民生','0.02','0.00','10','0','0.00','null','null','default','null','null','null','null','null','null','null','1445249307','2015-10-27','你好','zbl@unionsoft.cn','1');

INSERT INTO `twotree_wechat_user` VALUES ('5','0','0','1','1','oKhP4wjUFKps2vR8P0rQwMNLyMCg','0','null','0','null','null','0.00','陕西','西安','null','泛泛之辈','http://wx.qlogo.cn/mmopen/Q3auHgzwzM6ZrfsR0AbLL3OEicaNMVNibXBahF2u1llGtDEQC6s8xBdTc7bM6tBKfAIrdqRx1mVYa5MsA85Wwicv1cJibV9Xfe2hzG0lMiaAxhEk/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445249957','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('6','0','0','2','1','oKhP4wq4GJuwSg8moj3mMxRdR2SM','0','null','0','張亞強','18502983552','0.00','陕西','西安','null','空心病','http://wx.qlogo.cn/mmopen/ajNVdqHZLLCzibPDbqjhuTAOV9ic7xxJcSFnLmIcCJ8PoOwwpxTNTKDduz5ibc55mjmicHxkRKD36LACC0RiamZllibg/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','zhangyaqiang','cfab208d5257f928e91be127ba1ced04','null','null','null','1445311693','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('7','0','0','1','1','oKhP4wkyKj3XLPPiRw97kWbhs-qY','0','null','0','null','null','0.00','陕西','西安','null','app开发微信开发网站建设','http://wx.qlogo.cn/mmopen/4cZISwUDwo3QJEtmZuJXj4rOAtNKZbpibg0OsibibZicCmlBDW71N6ZaHrKQfC1JtQGKLOwVYBBNNx8wPNQd1k6y4jTXKV7Csx8N/0','2','null','null','null','0.01','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445320410','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('8','0','0','1','1','oKhP4wisLFmWA7hJ_dtllSbsVyOo','0','null','0','null','null','0.00','陕西','西安','null','马增飞','http://wx.qlogo.cn/mmopen/ajNVdqHZLLDTDgkvN1JIYKLYMZd6IDQsYLodYwlib2kaSMdcmR3xumnxrY1SxGlWSvy51wNtN03CE7JFJiaAIBOA/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445329551','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('9','0','0','1','1','oKhP4wid3EcrdN344lu43U3i0ks8','0','null','0','null','null','0.00','贵州','毕节','null','吴磊','http://wx.qlogo.cn/mmopen/PiajxSqBRaEK80DWauqAYC5GXQ866zJ3acibFKWY8E73Tc2NiczmcT91P1u61wfDiaic4laI6o1Bl6JepbZW4mxUpDA/0','1','null','null','null','0.00','0.00','5','0','0.00','null','null','default','null','null','null','null','null','null','null','1445331007','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('10','0','0','1','1','oKhP4wqnJ5PGAs-79pfB2i4B4kX4','0','null','0','null','null','0.00','陕西','西安','null','永恒的太阳','http://wx.qlogo.cn/mmopen/ajNVdqHZLLCjhQU9AWMmVYoThSG3jVu457vEKvnmwMfpTzHQe9ds3Zf7u0AlsPULFudgeA96tyrhpZUkskPdbg/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445422650','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('11','0','0','1','1','oKhP4wp7jzFlcxXi5agc7UGdB23s','0','null','0','null','null','0.00','陕西','西安','null','专注校园移动互联网（叮咕校园）','http://wx.qlogo.cn/mmopen/6XFhg7ldObyf9iaO5jaeHjNfDvsicWpAGDpb2Wa6OKZSgEEKhILugqBNlfIictNgLXg4nUyibQicHMibx9qP5erNB1Tw/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445433054','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('12','0','0','1','1','oKhP4wlv3TqjKBq9NF01dKw8SGq8','0','null','0','null','null','0.00','null','null','null','李美女','http://wx.qlogo.cn/mmopen/w1F45jUwzWte0r3OricLrWRdFUib2GGrcroiaBMxXJQef8Y8fLte11ZZicxPxBeAyoPkib7kB5ISgjjvqRug9K9LGP3a9M38g7DaQ/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445433118','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('13','0','0','1','1','oKhP4wtrOjjZK0KnQpSkZPCeU8qg','0','null','0','null','null','0.00','陕西','咸阳','null','海韵','http://wx.qlogo.cn/mmopen/SdCqugfHKeoz4T7QzzYCI3UQCQB1GZGY6dezzjD6IWLgudfAfpZBQ8KEySy8fV1UVOjm8zGAA7FEuUibTsEqWXia8mO7BJ3GS8/0','2','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445433545','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('14','0','0','1','1','oKhP4wtgzPHghqNcDRK9Q7C4xgcc','0','null','0','null','null','0.00','陕西','西安','null','杨爱笑。','http://wx.qlogo.cn/mmopen/6XFhg7ldObzeicZTuAC4rM4xCttobeo27D7nygZFNA4GHpd3VNMwvmCmqPCSW3st1aZTvfZcNYm1vh3v7kFnAWdZf5v83zKO3/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445433834','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('15','0','0','1','1','oKhP4wqvZju8IjMGD1xQ2Vdidrh4','0','null','0','null','null','0.00','陕西','西安','null','陈媛媛','http://wx.qlogo.cn/mmopen/SdCqugfHKeoz4T7QzzYCI6ul0CJ6Y2kHOrYhbztxL7Kk0qicheicrYAbe4HH2uJDPICzszDVznk87wIezW0bUoNTy4zrm8LlaM/0','2','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445434040','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('16','0','0','1','1','oKhP4wr5dTQEiTjTSUhuEEE8f4kw','0','null','0','null','null','0.00','陕西','咸阳','null','SUUK','http://wx.qlogo.cn/mmopen/4cZISwUDwo3QJEtmZuJXjy9nkcG1UcN5fcP4wPklCE98L9nthPkqu55erT5KJSLdSrcYKayM4ZQnnHkv5hWDzHk3ibZeEia8pK/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445434421','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('17','0','0','1','1','oKhP4wtEN0X9YKN2ma6umtfJIecY','0','null','0','null','null','0.00','陕西','安康','null','依岸','http://wx.qlogo.cn/mmopen/6XFhg7ldObyUaNeEoAoYU9UcO15An2bldQn1AjGXwQqScUHTdEbawmLsarRxibDqQt4LcHe3AxojwFLa1ic6OVG6Uz2NianZBqw/0','2','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445434920','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('18','0','0','1','1','oKhP4wv18P0uLDUhXRTJs7jZpQZo','0','null','0','null','null','0.00','null','null','null','テソド鱼摆摆','http://wx.qlogo.cn/mmopen/4cZISwUDwo3QJEtmZuJXj2sGqOmUMCprLMJ9ib86LibicakgcztyJxhqw9fdD0Z9Ng3gFoKImA3OjarBR4nQ9ahsVvWs2b6Lxcr/0','2','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445435366','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('19','0','0','1','1','oKhP4wsmRcEtEdY43pWuPVnZsWWU','0','null','0','null','null','0.00','null','null','null','余独好修以为长','http://wx.qlogo.cn/mmopen/SdCqugfHKeoz4T7QzzYCIxqt1AkWsQagBavmoqWXOfuFmN6DFxVR99iczILSbfBKYMXfAlhHwbzMNhaWtShrpIxf4A2a5p1QL/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445435938','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('20','0','0','1','1','oKhP4woJ3j6VCtBgEC-m1vQrwPwU','0','null','0','null','null','0.00','陕西','西安','null','憨娃子','http://wx.qlogo.cn/mmopen/4cZISwUDwo3QJEtmZuJXjic8T0msWqvcfKnT5MMKGFKibSC38REfMOeBlm692vnn8WRKvUsqTWeQH3FONqMS8WALNFFkldF21E/0','2','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445436219','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('21','0','0','1','1','oKhP4wsVFz_C17MDNaOV2uQie_eg','0','null','0','奇才','15068143185','本','陕西省','西安市','未央区','哈哈','http://wx.qlogo.cn/mmopen/w1F45jUwzWvLAnOycNiclfVbAE01vkJq7BUsVTCRaAGqLbtyDajP244icO0GzLLXSzUcN7ibZTR2ad73MTf8BT5r5We48Cxe8tX/0','1','null','null','null','0.00','0.00','25','0','0.00','null','null','default','null','null','785971413','99fa2dd2fffff2577c3dd19752d93588','null','null','null','1445437580','2015-10-27','9998','785971413','1');

INSERT INTO `twotree_wechat_user` VALUES ('22','0','0','1','1','oKhP4whs-_zXzYufRBKBy8t7FjKo','0','null','0','null','null','0.00','北京','null','null','A 雪域微商-免费招代理','http://wx.qlogo.cn/mmopen/4cZISwUDwo3QJEtmZuJXjyXlFXLDeqZibJeDu8R2qHfznIxjdwJ0Ff1wItk84F9BNDzxskH94zpm086oeC0LTribUNkY6A4hhE/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445444902','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('23','0','0','1','1','oKhP4wp8mSckNxE7N2XuvgOUHho4','0','null','0','null','null','0.00','陕西','西安','null','刘浩宇','http://wx.qlogo.cn/mmopen/PiajxSqBRaELMdjxsbsuKFxdAJgiarPRIJibtz1Q0xgbvWMFWhmCicsz8t2K2SX9Ww12OG3ibndYdIfXwATHhhqDxEA/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445446052','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('24','0','0','1','1','oKhP4wuSekV3gBiPX87Gey_MV5tU','0','null','0','null','null','0.00','null','null','null','D❁key','http://wx.qlogo.cn/mmopen/4cZISwUDwo1AdavibddCYgYJS2NhezFUDlgej8pBpHnnZ3bX6NNP75TWtlg6MZaWFdKOEOFE69sQG0KdPvu4SS008StYwnYSo/0','2','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445504733','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('25','0','0','1','1','oKhP4wpWQYY5Fy8JqgsWvlXT9YrQ','0','null','0','null','null','0.00','陕西','西安','null','阿凯  杨凯','http://wx.qlogo.cn/mmopen/6XFhg7ldObyZs9zXictt40h2uPm98I9K2GU0TwNdk7nZXWPIw6XSq6HqU2uqoNp96GLj6GJY7KNeXVJuECRMo3Q/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445509720','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('26','0','0','1','1','oKhP4wlRgI3AYa-434Ris9PsAr7M','0','null','0','null','null','0.00','陕西','西安','null','办公用品，打印机加粉','http://wx.qlogo.cn/mmopen/4cZISwUDwo3QJEtmZuJXj5CbUBJSMDRFGFib6WD5raY0ibicHVhFDOUgc4ric1HMDOzdeAlOJZ06byqecE0OQFMs75odK82wTGR2/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445509733','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('27','0','0','1','1','oKhP4wkNIeAjhXf-gu1-HfDnrJyY','0','null','0','null','null','0.00','null','null','null','mppresstest_00006','null','2','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445572240','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('28','0','0','1','1','oKhP4wvHoVjuk1KHIp0DCVu_EwpU','0','null','0','null','null','0.00','江西','南昌','null','Stefan','http://wx.qlogo.cn/mmopen/6XFhg7ldOby01lRWZ6zlLdKetSJHpxRaC7yDngia4uIxz9TOibib6zW9khiam8T3AkV0s2l1icTO0Zfj4fy7bLaoa2w/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445827107','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('29','0','0','1','1','oKhP4woOI8ovnbV5w5_A2GdD0Gg0','0','null','0','null','null','0.00','陕西','西安','null','周蛋蛋','http://wx.qlogo.cn/mmopen/1cTZlAsZMqCWuvm1GxOVA4u9NDZewptmjwINEvoyumvVjnXiaawDy8CZvm5yxj24DFIeuWhXQmPdzmz4IpiaXhEb1cmSjYtIqP/0','2','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445828329','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('30','0','0','1','1','oKhP4wvMmvsHwuq6_XR-5tuvGZg8','0','null','0','null','null','0.00','陕西','西安','null','AAA刘虎强','http://wx.qlogo.cn/mmopen/PiajxSqBRaEI945JTmGCsHicQ4NRUOL7u05BuibRjia1rq6xTkNa21bh4mu00xvibuLEhC3T3MJV6vghnsPbsckefiaQ/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445833236','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('31','0','0','1','1','oKhP4wua_X193u9izcA3Jy_ePCeo','0','null','0','null','null','0.00','陕西','西安','null','假如你是李华','http://wx.qlogo.cn/mmopen/VZeHOduzedd1nFvsrUBfoosYeib45ibsib3FUdGPEv7hHNCKXP0ZztHoy8SuyzKH89wNrIAohZGUKpqE0KnlpPicv2W6n6ia9plsb/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445839200','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('32','0','0','1','1','oKhP4wiL95EBy3fFm5_hvjW1e0-c','0','null','0','null','null','0.00','陕西','西安','null','马醒强','http://wx.qlogo.cn/mmopen/VZeHOduzedfIDzUqEyibtzTvXtzHjYSgBBaOasvs6JdY7Fr2gQwJYWMnv6ZEzxYwdUCCUzIbuhHAox2TLB2fWwKE6XhkGjtgf/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445841286','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('33','0','0','1','1','oKhP4wmsbZoLg8fLaUtpJSsBQsW0','0','null','0','null','null','0.00','陕西','宝鸡','null','逍遥子','http://wx.qlogo.cn/mmopen/6XFhg7ldObzwCjSIs6MRJSiacTcRC8ibQM53JBsficmwCEREDbtLB7VFVYnmcpTOYiatmxFcpxtyMamyK81bk9xRNZG98z3m8gjk/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445846453','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('34','0','0','1','1','oKhP4wqQ7A5-fxDavkXQ5bJ7kR5A','0','null','0','null','null','0.00','陕西','西安','null','刘维龙','http://wx.qlogo.cn/mmopen/VZeHOduzedd1nFvsrUBfosx8dkw6VL9q8eTAmF8OzTMVywLw9DtBzWEu7mZAr58l4icP4sI4Ij15nG4K8UMwZHSncbw0geT7f/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445847994','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('35','0','0','1','1','oKhP4wl2_hOJIc-zg2vtkAxYjJZw','0','null','0','null','null','0.00','陕西','咸阳','null','小桃子','http://wx.qlogo.cn/mmopen/zEZTpu7WQiazURmZ6d9koibTmGgjbXoNNrBQCQaMSDOLajQjUN4qPicjVI8haSGL41ialKnkfBIroozYtqVHQxIXovCiaV6eNJuXm/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445861684','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('36','0','0','1','1','oKhP4wt9hlUXxQMq7rF4iXs9llqY','0','null','0','null','null','0.00','陕西','安康','null','→超越☆♛↑( ͡° ͜ʖ ͡°)','http://wx.qlogo.cn/mmopen/VZeHOduzedd1nFvsrUBfoucs0MqUTVaWZhob1a0vZheCcZZ7F53mrIRczOrbK2o6hhQY8VN5eyRn5WqzkOIWWup2lPguuL1W/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445868682','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('37','0','0','1','1','oKhP4wgL1dTuSmvdafJYOzTVGDME','0','null','0','null','null','0.00','null','null','null','A*笑魇如花','http://wx.qlogo.cn/mmopen/6XFhg7ldObzeicZTuAC4rM0fNFribQ52tEib351SEQ28a5q1svW4qDYb1B6ZV2CPqEAvOCkUOWTuTVOpzAfDicQyExXROfXka0nP/0','2','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445870775','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('38','0','0','1','1','oKhP4wq2RWvrRIkQc_5HMQUqL12M','0','null','0','null','null','0.00','贵州','毕节','null','骑着自行车赶着毛驴儿奔向远方','http://wx.qlogo.cn/mmopen/4cZISwUDwo2Ucz1GWibXlMeAQAlmjLBgB5R0VmUIXFEH5I0Bw0fRP3Giafk6y5Rb2zMLyGdA12k0qwC1RSmKr5LiaShLVWZIVdo/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445914786','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('39','0','0','1','1','oKhP4wg8n4i821hkS-xAQ6lcfqGo','0','null','0','null','null','0.00','陕西','西安','null','Peter','http://wx.qlogo.cn/mmopen/w1F45jUwzWte0r3OricLrWfRo8LmZd7Picn4T1ShQhoM9iaj09JX108XJzQZ2X5gMzkG212rotsibeJOxPaRtFlnL4KgnwzWbMg0/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445928885','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('40','0','0','1','1','oKhP4wtubKzt_H3TLPkHE26l1L8Y','0','null','0','null','null','0.00','null','null','null','尘埃落定','http://wx.qlogo.cn/mmopen/4cZISwUDwo3QJEtmZuJXj3BS4icxExsNazXdar1p1SCyPc918qjYrUCWxzBYPIrHpnSpvCofL7UibpPoEhoDSUWf35kDVmaSb9/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445929245','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('41','0','0','1','1','oKhP4ws9l3PFaYH4964HRuU0lKd4','0','null','0','null','null','0.00','陕西','西安','null','朱乾-移动营销','http://wx.qlogo.cn/mmopen/VZeHOduzede42AgoqzIlVPk6nouHbibJ9ib8s4BGIiaue9xYKUnIrAvmmUjS1eCCbyXDqTqXKeGK4JS3tiaM528qHumfnzMaaHXl/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445931831','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('42','0','0','1','1','oKhP4wvOSZs84XZWfYe6C2qEDKuE','0','null','0','null','null','0.00','陕西','西安','null','对着回忆说@晚安','http://wx.qlogo.cn/mmopen/4cZISwUDwo1956sNUcpN6qdCULFgwt0I2a2J41MCFdqBmxd6RGM9M4TMlYBZILdeiaZbAassujAtBz2ribr3uI2cmXK6ggibF4Q/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445939406','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('43','0','0','1','1','oKhP4wtTo1Z6_9iy_KECSsVUivbY','0','null','0','null','null','0.00','新疆','克拉玛依','null','王全伟','http://wx.qlogo.cn/mmopen/VZeHOduzedd1nFvsrUBfopGbuKjX2rs4ZNNMicFBEOvFkd85Kd1Szu92mC9L1KV49s2IjQsVovibgP59gUIP68icAUQyZQoyjIJ/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1445959168','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('44','0','0','1','1','oKhP4wjUBd_C45Ytg4lhFzK7wyco','0','null','0','null','null','0.00','陕西','西安','null','soul','http://wx.qlogo.cn/mmopen/4cZISwUDwo3QJEtmZuJXj4q0IQLAt4RxrbwlZQeNibsFet62uXSlv8subdzibyl9Pzkib6L0pbtBibriaLXEWp2TjE4Lqzxrama7A/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1446005032','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('45','0','0','1','1','oKhP4wtaiDNE9GYT1I3dyV-6Yprc','0','null','0','null','null','0.00','吉林','长春','null','李洪亚','http://wx.qlogo.cn/mmopen/VZeHOduzedd1nFvsrUBfov0p9ahDacKqo4JhCn510wkKRPd0UJNPDibPicf953iaSktwcOfpj1KribTwKDlMzSNreQ1hiaFhdmVJu/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1446011131','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('46','0','0','1','1','oKhP4wh4Sm5V6QsxY0HdrtkH7AH8','0','null','0','null','null','0.00','山东','日照','null','先声科技','http://wx.qlogo.cn/mmopen/ajNVdqHZLLA9QOBZz7QnYWYicv47I9oTxQDSB3CDzcvCQdJiaHtaicyfDf1ia9KickDZWTbcEERgfticDwYYBItm41BQ/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1446027542','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('47','0','0','1','1','oKhP4wlL__bCZSoQUpimvKdhlph0','0','null','0','null','null','0.00','山东','日照','null','新昱','http://wx.qlogo.cn/mmopen/PiajxSqBRaEKSLkIm09XeMicQ65pZHWia7iaCvWKia2eThmMiaSEJaA1LxxSGW3n6GAYaicuoZEynib7TjRlB0sGGUlMCw/0','2','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1446028043','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('48','0','0','1','1','oKhP4wgil_64bjwDY1XAbuUPcYXk','0','null','0','null','null','0.00','陕西','西安','null','大道无门','http://wx.qlogo.cn/mmopen/VZeHOduzedf2IRBibS0YVz2sN3Dj6HRtwCico7oJRkXWb4ICAww2mYO1vppLLicy6dasajAjvC2waKhibaiaoDdAQMAVdCtrrDZ1ic/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1446037523','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('49','0','0','1','1','oKhP4wqBYHjFTv6d0FXa-z4PPUJc','0','null','0','null','null','0.00','陕西','西安','null','陈海梅','http://wx.qlogo.cn/mmopen/w1F45jUwzWte0r3OricLrWfkico5MWFHBBUtN2OIjN1k9abRLlPkP3sKldaWVcGC8eTkBn0av376jJdNibgjC8NrR0nmpeSUv0c/0','2','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1446041461','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('50','0','0','1','1','oKhP4wpjOfYP-oM5VqZa93BfW-F0','0','null','0','null','null','0.00','陕西','西安','null','飞妮','http://wx.qlogo.cn/mmopen/4cZISwUDwo1Qy4udWP9uMQqnnbdnfHicKDFuibsia89rKuhXWk9bj3WE3fMv7z3Y4sjKlcQGuzgkeQnuSAktBEJ7MYS8oEpQ3Be/0','2','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1446095722','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('51','0','0','1','1','oKhP4wgKWu-km3kD-12eB-fvgGAI','0','null','0','null','null','0.00','陕西','西安','null','景刘龙','http://wx.qlogo.cn/mmopen/VZeHOduzede0UgUvobSnP0nIBy2tNVNDGI6Hgt1Vc2icQcYDqZTwd6LTias5hZXs2XBbxFSIgC5TJiaPsRhafguZbkJTPvxH2EY/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1446103222','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('52','0','0','1','1','oKhP4wiXSQLyuZS6Av6lx7VqqVNs','0','null','0','null','null','0.00','安徽','芜湖','null','郑磊','http://wx.qlogo.cn/mmopen/VZeHOduzedd1nFvsrUBfohB1GBSrkO3XmXnp68EcMibxJMDH23nlHCj9Mtd9ibK448Jy7kBc4RQjt8A8NelgGSLiafBRq9Tm2eP/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1446129101','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('53','0','0','1','1','oKhP4wv7z249vNJ12IR5aI-c8YBU','0','null','0','null','null','0.00','安徽','宣城','null','up up up','http://wx.qlogo.cn/mmopen/4cZISwUDwo3QJEtmZuJXj9xkTdf0luMswOBKNIpHqUKb0vjiaFKickGAvFqZ7DhjlqZO8dDm0ibJ7GBDcWwIdic4LSDN7PD4GhCR/0','2','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1446135514','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('54','0','0','1','1','oKhP4wrFz2gt_HEnnvOayZ-7ufwQ','0','null','0','null','null','0.00','陕西','西安','null','Mo','http://wx.qlogo.cn/mmopen/ajNVdqHZLLBQiaq2lXsrbYSiaJuQTVfZ3ssnnpSDMF4XKaLjmleymhyVlM6ZPk4L4lfNREOjkHyxwZjsV7e1QAibw/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1446159851','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('55','0','0','1','1','oKhP4wrhXcoYGH49xr3_-TPa06D4','0','null','0','null','null','0.00','null','null','null','曾昭岩','http://wx.qlogo.cn/mmopen/SdCqugfHKeoz4T7QzzYCI8np1bnvl8PPGqVQCtyiaIZ72q0HZLCiaq7ywicxR8iaFss6uMawP1CwWjmVjacofIB4w3HLOziabnRke/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1446167248','null','null','null','0');

INSERT INTO `twotree_wechat_user` VALUES ('56','0','0','1','1','oKhP4wgF85DyC3B8XdCz0di8COY0','0','null','0','null','null','0.00','null','null','null','公子宇','http://wx.qlogo.cn/mmopen/6XFhg7ldObzeicZTuAC4rM06L719Ok3G7vzicUH5WZYpIrv3OG0bVhmGs6AI47G6o0fibPyczI8plaLAYEMELg8UibiaaUFhEbdQJ/0','1','null','null','null','0.00','0.00','0','0','0.00','null','null','default','null','null','null','null','null','null','null','1446168328','null','null','null','0');

--
-- 数据表中的数据: `twotree_yongji_config`
--

INSERT INTO `twotree_yongji_config` VALUES ('1','null','null','null');

